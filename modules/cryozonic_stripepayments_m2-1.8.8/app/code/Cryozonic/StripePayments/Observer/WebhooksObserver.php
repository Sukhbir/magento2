<?php
/**
 * Copyright © Cryozonic Ltd. All rights reserved.
 *
 * @package    Cryozonic_StripePayments
 * @copyright  Copyright © Cryozonic Ltd (http://cryozonic.com)
 * @license    Commercial (See http://cryozonic.com/licenses/stripe.html for details)
 */

namespace Cryozonic\StripePayments\Observer;

use Magento\Framework\Event\ObserverInterface;
use Cryozonic\StripePayments\Helper\Logger;
use Cryozonic\StripePayments\Exception\WebhookException;

class WebhooksObserver implements ObserverInterface
{
    public function __construct(
        \Cryozonic\StripePayments\Helper\Webhooks $webhooksHelper,
        \Cryozonic\StripePayments\Helper\Generic $paymentsHelper,
        \Cryozonic\StripePayments\Model\Config $config,
        \Cryozonic\StripePayments\Model\Method\ThreeDSecure $threeDSecure
    )
    {
        $this->webhooksHelper = $webhooksHelper;
        $this->paymentsHelper = $paymentsHelper;
        $this->config = $config;
        $this->threeDSecure = $threeDSecure;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $eventName = $observer->getEvent()->getName();
        $arrEvent = $observer->getData('arrEvent');
        $stdEvent = $observer->getData('stdEvent');
        $object = $observer->getData('object');

        $order = $this->webhooksHelper->loadOrderFromEvent($arrEvent);

        switch ($eventName) {
            case 'cryozonic_stripe_webhook_source_chargeable_three_d_secure':

                $this->threeDSecure->charge($order, $arrEvent['data']['object']);
                break;

            case 'cryozonic_stripe_webhook_charge_failed_three_d_secure':

                $order->addStatusHistoryComment("Charge failed.");
                $this->paymentsHelper->cancelOrCloseOrder($order);
                break;

            case 'cryozonic_stripe_webhook_source_canceled_three_d_secure':
            case 'cryozonic_stripe_webhook_source_failed_three_d_secure':

                $order->addStatusHistoryComment("Authorization failed.");
                $this->paymentsHelper->cancelOrCloseOrder($order);
                break;

            default:
                # code...
                break;
        }
    }
}