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

use Cryozonic\StripePayments\Helper;
use Cryozonic\StripePayments\Helper\Logger;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    public static $moduleName           = "Stripe Payments M2";
    public static $moduleVersion        = "1.8.8";
    public static $moduleUrl            = "https://store.cryozonic.com/magento-2/stripe-payments.html";

    // active
    // title
    // stripe_mode
    // stripe_test_sk
    // stripe_mode
    // stripe_test_pk
    // stripe_mode
    // stripe_live_sk
    // stripe_mode
    // stripe_live_pk
    // stripe_mode
    // stripe_js
    // payment_action
    // expired_authorizations
    // payment_action
    // avs
    // ccsave
    // order_status
    // card_autodetect
    // cctypes
    // card_autodetect
    // receipt_email
    // allowspecific
    // specificcountry
    // sort_order

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Helper\Generic $helper
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->helper = $helper;
        $this->initStripe();
    }

    public function initStripe()
    {
        \Stripe\Stripe::setApiKey($this->getSecretKey());
        \Stripe\Stripe::setAppInfo($this::$moduleName, $this::$moduleVersion, $this::$moduleUrl);
    }

    public static function module()
    {
        return self::$moduleName . " v" . self::$moduleVersion;
    }

    public function addOn($name, $version, $url = null)
    {
        $info = \Stripe\Stripe::getAppInfo();

        // Has been called twice
        if (strstr($info['version'], $name . '/' . $version) !== false)
            return;

        if ($name && $version)
            $info['version'] .= ' ' . $name . '/' . $version;

        if ($url)
            $info['url'] .= ', ' . $url;

        \Stripe\Stripe::setAppInfo($info['name'], $info['version'], $info['url']);
    }

    public function getConfigData($field)
    {
        $storeId = $this->helper->getStoreId();
        $data = $this->scopeConfig->getValue("payment/cryozonic_stripe/$field", ScopeInterface::SCOPE_STORE, $storeId);

        return $data;
    }

    public function getStripeMode()
    {
        return $this->getConfigData('stripe_mode');
    }

    public function getSecretKey()
    {
        $mode = $this->getStripeMode();
        return trim($this->getConfigData("stripe_{$mode}_sk"));
    }

    public function getPublishableKey()
    {
        $mode = $this->getStripeMode();
        return trim($this->getConfigData("stripe_{$mode}_pk"));
    }

    public function isAutomaticInvoicingEnabled()
    {
        return (bool)$this->getConfigData("automatic_invoicing");
    }

    public function isReceiptEmailEnabled()
    {
        return (bool)$this->getConfigData('receipt_email');
    }

    public function getSecurityMethod()
    {
        return (int)$this->getConfigData('stripe_js');
    }

    public function isStripeJsEnabled()
    {
        return $this->getSecurityMethod() == 1;
    }

    public function isStripeElementsEnabled()
    {
        return $this->getSecurityMethod() == 2;
    }

    public function isStripeRadarEnabled()
    {
        return (($this->getConfigData('radar_risk_level') > 0) && !$this->helper->isAdmin());
    }

    public function is3DSecureEnabled()
    {
        return $this->getConfigData('three_d_secure')
            && $this->isStripeElementsEnabled()
            && !$this->helper->hasSubscriptions()
            && !$this->helper->isMultiShipping();
    }

    public function isApplePayEnabled()
    {
        return $this->getConfigData('apple_pay_checkout')
            && ($this->isStripeJsEnabled() || $this->isStripeElementsEnabled())
            && !$this->helper->isAdmin();
    }

    public function isPaymentRequestButtonEnabled()
    {
        return $this->isApplePayEnabled() && $this->isStripeElementsEnabled();
    }

    public function useStoreCurrency()
    {
        return (bool)$this->getConfigData('use_store_currency');
    }

    public function getNewOrderStatus()
    {
        return $this->getConfigData('order_status');
    }

    public function getSaveCards()
    {
        return $this->getConfigData('ccsave');
    }

    public function retryWithSavedCard()
    {
        return $this->getConfigData('expired_authorizations') == 1;
    }

    public function setIsStripeAPIKeyError($isError)
    {
        $this->isStripeAPIKeyError = $isError;
    }

    public function getIsStripeAPIKeyError()
    {
        if (isset($this->isStripeAPIKeyError))
            return $this->isStripeAPIKeyError;

        return false;
    }

    public function get3DSecureParams($encode = true)
    {
        if (!$this->is3DSecureEnabled())
            return 'null';

        $quote = $this->helper->getSessionQuote();
        if (empty($quote))
            return 'null';

        $fields = $this->getAmountCurrencyFromQuote($quote);

        $params['amount'] = $fields["amount"];
        $params['currency'] = $fields["currency"];

        if ($encode)
            return json_encode($params);

        return $params;
    }

    // Use 3D Secure when
    // - Stripe Elements is enabled
    // - 3DS is enabled
    // - We've been passed a 3DS source from Stripe Elements
    // - Of type card, and which supports 3DS
    public function shouldUse3DSecure($source, $cardBrand = null)
    {
        if (!$this->is3DSecureEnabled())
            return false;

        // AmEx do not support 3DS, and we may select a saved card
        if ($cardBrand == 'American Express')
            return false;

        if (strpos($source, 'src_') === 0)
        {
            try
            {
                $source = $this->helper->retrieveSource($source);
                $config = $this->getConfigData('three_d_secure');

                $states = array("required");

                if ($config >= 2)
                    $states[] = "optional";

                if ($source->type == 'card' && in_array($source->card->three_d_secure, $states))
                    return true;
            }
            catch (\Exception $e)
            {
                return false;
            }
        }
        else if (strpos($source, 'card_') === 0)
        {
            return false; // For the time being we have no way of knowing whether the card requires 3DS or not
            // $card = $this->helper->retrieveCard($source);
        }

        // In other cases when we receive a regular token, don't trigger 3DS
        return false;
    }

    public function getAmountCurrencyFromQuote($quote, $useCents = true)
    {
        $params = array();
        $items = $quote->getAllItems();

        if ($this->useStoreCurrency())
        {
            $amount = $quote->getGrandTotal();
            $currency = $quote->getQuoteCurrencyCode();
        }
        else
        {
            $amount = $quote->getBaseGrandTotal();;
            $currency = $quote->getBaseCurrencyCode();
        }

        if ($useCents)
        {
            $cents = 100;
            if ($this->helper->isZeroDecimal($currency))
                $cents = 1;

            $fields["amount"] = round($amount * $cents);
        }
        else
        {
            // Used for Apple Pay only
            $fields["amount"] = number_format($amount, 2, '.', '');
        }

        $fields["currency"] = $currency;

        return $fields;
    }

}
