<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */

namespace Technodeviser\OneStepCheckout\Block\Order\Invoice;

/**
 * Class Totals
 * @package Technodeviser\OneStepCheckout\Block\Order\Invoice
 */
class Totals extends \Magento\Framework\View\Element\AbstractBlock
{
    /**
     * Init totals
     *
     */
    public function initTotals()
    {
        $orderTotalsBlock = $this->getParentBlock();
        $order = $orderTotalsBlock->getInvoice();
        if ($order->getOnestepcheckoutGiftwrapAmount() > 0) {
            $orderTotalsBlock->addTotal(new \Magento\Framework\DataObject([
                'code'       => 'gift_wrap',
                'label'      => __('Gift Wrap'),
                'value'      => $order->getOnestepcheckoutGiftwrapAmount(),
                'base_value' => $order->getOnestepcheckoutBaseGiftwrapAmount(),
            ]), 'subtotal');
        }
    }

}