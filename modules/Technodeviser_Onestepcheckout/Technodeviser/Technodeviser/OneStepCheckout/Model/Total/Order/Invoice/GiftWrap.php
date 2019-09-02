<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */

namespace Technodeviser\OneStepCheckout\Model\Total\Order\Invoice;

/**
 * Class GiftWrap
 *
 * @category Technodeviser
 * @package  Technodeviser_OneStepCheckout
 * @module   OneStepCheckout
 * @author   Technodeviser Developer
 */
class GiftWrap extends \Magento\Sales\Model\Order\Total\AbstractTotal
{
    /**
     * @param \Magento\Sales\Model\Order\Invoice $invoice
     *
     * @return $this
     */
    public function collect(\Magento\Sales\Model\Order\Invoice $invoice)
    {
        $invoice->setOnestepcheckoutGiftwrapAmount(0);
        $giftWrapAmount = $invoice->getOrder()->getOnestepcheckoutGiftwrapAmount();
        $baseGiftWrapAmount = $invoice->getOrder()->getOnestepcheckoutBaseGiftwrapAmount();
        if ($giftWrapAmount) {
            $invoice->setOnestepcheckoutGiftwrapAmount($giftWrapAmount);
            $invoice->setOnestepcheckoutBaseGiftwrapAmount($baseGiftWrapAmount);
            $invoice->setGrandTotal($invoice->getGrandTotal() + $giftWrapAmount);
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $baseGiftWrapAmount);
        }

        return $this;
    }
}
