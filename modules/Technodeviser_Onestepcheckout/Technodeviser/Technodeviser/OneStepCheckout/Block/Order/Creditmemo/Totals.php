<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */

namespace Technodeviser\OneStepCheckout\Block\Order\Creditmemo;

/**
 * Class Totals
 * @package Technodeviser\OneStepCheckout\Block\Order\Creditmemo
 */
class Totals extends \Magento\Framework\View\Element\AbstractBlock
{
    /**
     * Init totals
     *
     */
    public function initTotals()
    {
        $creditmemoTotalBlock = $this->getParentBlock();
        $creditmemo = $creditmemoTotalBlock->getCreditmemo();
        if ($creditmemo->getOnestepcheckoutGiftwrapAmount() > 0) {
            $creditmemoTotalBlock->addTotal(new \Magento\Framework\DataObject([
                'code'       => 'gift_wrap',
                'label'      => __('Gift Wrap'),
                'value'      => $creditmemo->getOnestepcheckoutGiftwrapAmount(),
                'base_value' => $creditmemo->getOnestepcheckoutBaseGiftwrapAmount(),
            ]), 'subtotal');
        }
    }

}