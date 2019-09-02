<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Technodeviser\OneStepCheckout\Model\Total\Order\Creditmemo;

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
    public function collect(\Magento\Sales\Model\Order\Creditmemo $creditmemo)
    {
        $creditmemo->setOnestepcheckoutGiftwrapAmount(0);
        $giftWrapAmount = $creditmemo->getOrder()->getOnestepcheckoutGiftwrapAmount();
        $baseGiftWrapAmount = $creditmemo->getOrder()->getOnestepcheckoutBaseGiftwrapAmount();
        if ($giftWrapAmount) {
            $creditmemo->setOnestepcheckoutGiftwrapAmount($giftWrapAmount);
            $creditmemo->setOnestepcheckoutBaseGiftwrapAmount($baseGiftWrapAmount);
            $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $giftWrapAmount);
            $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $baseGiftWrapAmount);
        }

        return $this;
    }
}
