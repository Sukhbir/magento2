<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Technodeviser\OneStepCheckout\Block\Adminhtml\Order\Creditmemo;

/**
 * Class GiftWrap
 * @package Technodeviser\OneStepCheckout\Block\Adminhtml\Order\Creditmemo
 */
class GiftWrap extends \Magento\Sales\Block\Adminhtml\Totals
{
    /**
     * Init totals
     */
    public function initTotals()
    {
        $totalsBlock = $this->getParentBlock();
        $creditmemo = $totalsBlock->getCreditmemo();
        $giftWrapAmount = $creditmemo->getOnestepcheckoutGiftwrapAmount();
        $baseGiftWrapAmount = $creditmemo->getOnestepcheckoutBaseGiftwrapAmount();
        if ($giftWrapAmount > 0) {
            $totalsBlock->addTotal(new \Magento\Framework\DataObject([
                'code'       => 'gift_wrap',
                'label'      => __('Gift Wrap'),
                'value'      => $giftWrapAmount,
                'base_value' => $baseGiftWrapAmount,
            ]), 'subtotal');
        }
    }
}