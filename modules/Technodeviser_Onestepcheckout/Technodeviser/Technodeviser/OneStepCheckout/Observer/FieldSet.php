<?php
/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */
namespace Technodeviser\OneStepCheckout\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class FieldSet
 * @package Technodeviser\OneStepCheckout\Observer
 */
class FieldSet implements ObserverInterface
{

    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();
        $order->setOnestepcheckoutGiftwrapAmount($quote->getOnestepcheckoutGiftwrapAmount())
            ->setOnestepcheckoutBaseGiftwrapAmount($quote->getOnestepcheckoutBaseGiftwrapAmount());

        return $this;
    }
}