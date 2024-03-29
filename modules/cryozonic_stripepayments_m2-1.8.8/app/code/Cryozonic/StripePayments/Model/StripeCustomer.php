<?php
/**
 * Copyright © Cryozonic Ltd. All rights reserved.
 *
 * @package    Cryozonic_StripePayments
 * @copyright  Copyright © Cryozonic Ltd (http://cryozonic.com)
 * @license    Commercial (See http://cryozonic.com/licenses/stripe.html for details)
 */

namespace Cryozonic\StripePayments\Model;

require_once dirname(__DIR__) . "/lib/autoload.php";

use Cryozonic\StripePayments\Helper\Logger;
use Cryozonic\StripePayments\Exception;

class StripeCustomer extends \Magento\Framework\Model\AbstractModel
{
    // This is the Customer object, retrieved through the Stripe API
    var $_stripeCustomer = null;

    // The loaded Magento customer object
    var $_magentoCustomer = null;

    public $customerCard = null;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Cryozonic\StripePayments\Model\Config $config,
        \Cryozonic\StripePayments\Helper\Generic $helper,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->_config = $config;
        $this->_helper = $helper;
        $this->_customerSession = $customerSession;
        $this->_registry = $registry;
        $this->_appState = $context->getAppState();
        $this->_eventManager = $context->getEventDispatcher();
        $this->_cacheManager = $context->getCacheManager();
        $this->_resource = $resource;
        $this->_resourceCollection = $resourceCollection;
        $this->_logger = $context->getLogger();
        $this->_actionValidator = $context->getActionValidator();

        if (method_exists($this->_resource, 'getIdFieldName')
            || $this->_resource instanceof \Magento\Framework\DataObject
        ) {
            $this->_idFieldName = $this->_getResource()->getIdFieldName();
        }

        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
        $this->_construct();
    }

    protected function _construct()
    {
        $this->_init('Cryozonic\StripePayments\Model\ResourceModel\StripeCustomer');

        \Stripe\Stripe::setApiKey($this->_config->getSecretKey());

        $this->_magentoCustomerId = $this->_helper->getCustomerId();

        if (is_numeric($this->_magentoCustomerId) && !$this->getStripeId())
        {
            $this->load($this->_magentoCustomerId, 'customer_id');
            $this->updateSessionId();

            // If the customer has registered an account *after* they placed an order,
            // then they will have a Stripe account associated with a Magento customer ID of 0.
            // In this case, try to load the account again by email address. We only do this for the admin area
            // as there is a security risk for people registering with other people's email addresses
            // and taking over their saved cards from Stripe.
            $magentoEmail = $this->_helper->getCustomerEmail(); // This should never return a guest's email address because of _magentoCustomerId
            if (!$this->getStripeId() && $this->_helper->isAdmin() && $magentoEmail)
            {
                $this->load($magentoEmail, 'customer_email');
                if ($this->getId())
                {
                    $this->setCustomerId($this->_magentoCustomerId);
                    $this->save();
                }
            }
        }

        if (!$this->_stripeCustomer && ($this->_config->getSaveCards()))
        {
            try
            {
                $this->createStripeCustomerIfNotExists();
            }
            catch (\Cryozonic\StripePayments\Exception\SilentException $e)
            {
                return;
            }
        }

        // $this->_magentoCustomer = $this->_customerSession->getCustomer();
    }

    protected function updateSessionId()
    {
        if (!$this->getStripeId()) return;
        if ($this->_helper->isAdmin()) return;

        $sessionId = $this->_customerSession->getSessionId();
        if ($sessionId != $this->getSessionId())
        {
            $this->setSessionId($sessionId);
            $this->save();
        }
    }

    // Loads the customer from the Stripe API
    public function createStripeCustomerIfNotExists($noCache = false)
    {
        // If the payment method has not yet been selected, skip this step
        // $quote = $this->_helper->checkoutSession;
        // $paymentMethod = $quote->getPayment()->getMethod();
        // if (empty($paymentMethod) || $paymentMethod != "cryozonic_stripe") return;

        $retrievedSecondsAgo = (time() - $this->getLastRetrieved());

        if (!$this->getStripeId())
        {
            $this->createStripeCustomer();
        }
        // if the customer was retrieved from Stripe in the last 10 minutes, we're good to go
        // otherwise retrieve them now to make sure they were not deleted from Stripe somehow
        else if ($retrievedSecondsAgo > (60 * 10) || $noCache)
        {
            if (!$this->retrieveByStripeID($this->getStripeId()))
            {
                $this->createStripeCustomer();
            }
        }

        return $this->_stripeCustomer;
    }

    public function createStripeCustomer($order = null)
    {
        $customer = $this->_helper->getMagentoCustomer();

        if ($customer)
        {
            // Registered Magento customers
            $customerFirstname = $customer->getFirstname();
            $customerLastname = $customer->getLastname();
            $customerEmail = $customer->getEmail();
            $customerId = $customer->getEntityId();
        }
        else if ($order)
        {
            // Guest customers
            $address = $this->_helper->getAddressFrom($order, 'billing');
            $customerFirstname = $address->getFirstname();
            $customerLastname = $address->getLastname();
            $customerEmail = $address->getEmail();
            $customerId = 0;
        }
        else
            return;

        // This may happen if we are creating an order from the back office
        if (empty($customerId) && empty($customerEmail))
            return;

        // When we are in guest or new customer checkout, we may have already created this customer
        // if ($this->getCustomerStripeIdByEmail() !== false)
        //     return;

        // This is the case for new customer registrations and guest checkouts
        // if (empty($customerId))
        //     $customerId = -1;

        return $this->createNewStripeCustomer($customerFirstname, $customerLastname, $customerEmail, $customerId);
    }

    public function createNewStripeCustomer($customerFirstname, $customerLastname, $customerEmail, $customerId)
    {
        try
        {
            $this->_stripeCustomer = \Stripe\Customer::create([
              "description" => "$customerFirstname $customerLastname",
              "email" => $customerEmail
            ]);
            $this->_stripeCustomer->save();

            $this->setStripeId($this->_stripeCustomer->id);
            $this->setCustomerId($customerId);
            $this->setLastRetrieved(time());
            $this->setCustomerEmail($customerEmail);
            $this->updateSessionId();

            $this->save();

            return $this->_stripeCustomer;
        }
        catch (\Exception $e)
        {
            if ($this->_helper->isStripeAPIKeyError($e->getMessage()))
            {
                $this->_config->setIsStripeAPIKeyError(true);
                throw new \Cryozonic\StripePayments\Exception\SilentException(__($e->getMessage()));
            }
            $this->_logger->addError('Could not set up customer profile: '.$e->getMessage());
            $this->_helper->dieWithError(__('Could not set up customer profile: ' . $e->getMessage()), $e);
        }
    }

    public function addSavedCard($newcard)
    {
        if (!$this->_stripeCustomer)
            $this->_stripeCustomer = $this->retrieveByStripeID($this->getStripeId());

        if (!$this->_stripeCustomer)
            $this->_helper->dieWithError("Could not save the customer's card because the customer could not be created in Stripe!");

        $customer = $this->_stripeCustomer;

        $card = $this->_helper->addSavedCard($customer, $newcard);

        if (!empty($card))
            $this->setCustomerCard($card);

        return $card;
    }

    public function retrieveByStripeID($id = null)
    {
        if (isset($this->_stripeCustomer))
            return $this->_stripeCustomer;

        if (empty($id))
            $id = $this->_magentoCustomerId;

        if (empty($id))
            return false;

        try
        {
            $this->_stripeCustomer = \Stripe\Customer::retrieve($id);
            $this->setLastRetrieved(time());
            $this->save();

            if (!$this->_stripeCustomer || ($this->_stripeCustomer && isset($this->_stripeCustomer->deleted) && $this->_stripeCustomer->deleted))
                return false;

            return $this->_stripeCustomer;
        }
        catch (\Exception $e)
        {
            if (strpos($e->getMessage(), "No such customer") === 0)
            {
                return $this->createStripeCustomer();
            }
            else
            {
                $this->_logger->addError('Could not retrieve customer profile: '.$e->getMessage());
                return false;
            }
        }
    }

    public function setCustomerCard($card)
    {
        if (is_object($card) && get_class($card) == 'Stripe\Card')
        {
            $this->customerCard = array(
                "last4" => $card->last4,
                "brand" => $card->brand
            );
        }
    }

    public function addCard($source)
    {
        if (!$this->_stripeCustomer)
            $this->_stripeCustomer = $this->retrieveByStripeID($this->getStripeId());

        if (!$this->_stripeCustomer)
            throw new \Exception("Customer with ID " . $this->getStripeId() . " could not be retrieved from Stripe.");

        $source = $this->_helper->getAvsFields($source);

        return $this->_stripeCustomer->sources->create(array("source" => $source));
    }

    public function deleteCard($token)
    {
        if (!$this->_stripeCustomer)
            $this->_stripeCustomer = $this->retrieveByStripeID($this->getStripeId());

        if (!$this->_stripeCustomer)
            throw new \Exception("Customer with ID " . $this->getStripeId() . " could not be retrieved from Stripe.");

        $card = $this->_stripeCustomer->sources->retrieve($token);
        $obj = clone $card;
        $card->delete();
        return $obj;
    }

    public function listCards($params = array())
    {
        try
        {
            return $this->_helper->listCards($this->_stripeCustomer, $params);
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    // Used in the html templates to generate the customer's saved cards options
    public function getCustomerCards($isAdmin = false, $customerId = null)
    {
        if (!$this->_config->getSaveCards() && !$isAdmin)
            return array();

        if (!$customerId)
            $customerId = $this->getCustomerId();

        if (!$this->getStripeId())
            return array();


        if (!$this->_stripeCustomer)
            $this->_stripeCustomer = $this->retrieveByStripeID($this->getStripeId());

        if (!$this->_stripeCustomer)
            return null;

        return $this->listCards();
    }

    public function getDefaultSavedCardFrom(\Magento\Payment\Model\InfoInterface $payment)
    {
        $card = $payment->getAdditionalInformation('token');

        if (strstr($card, 'card_') !== false)
            return $card;

        if (strstr($card, 'card_') === false)
        {
            // $cards will be NULL if the customer has no cards
            $cards = $this->listCards();
            if (is_array($cards) && !empty($cards[0]))
                return $cards[0]->id;
        }

        return null;
    }

    public function getSubscriptions($params = null)
    {
        if (!$this->getStripeId())
            return null;

        $params['customer'] = $this->getStripeId();
        $params['limit'] = 100;

        $collection = \Stripe\Subscription::all($params);

        if (!isset($this->_subscriptions))
            $this->_subscriptions = [];

        foreach ($collection->data as $subscription)
        {
            $this->_subscriptions[$subscription->id] = $subscription;
        }

        return $this->_subscriptions;
    }

    public function getSubscription($id)
    {
        if (isset($this->_subscriptions) && !empty($this->_subscriptions[$id]))
            return $this->_subscriptions[$id];

        return \Stripe\Subscription::retrieve($id);
    }
}