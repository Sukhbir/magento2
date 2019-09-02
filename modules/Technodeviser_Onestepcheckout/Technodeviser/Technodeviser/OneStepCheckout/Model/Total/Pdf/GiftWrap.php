<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */

namespace Technodeviser\OneStepCheckout\Model\Total\Pdf;

/**
 * Class GiftWrap
 *
 * @category Technodeviser
 * @package  Technodeviser_OneStepCheckout
 * @module   OneStepCheckout
 * @author   Technodeviser Developer
 */
class GiftWrap extends \Magento\Sales\Model\Order\Pdf\Total\DefaultTotal
{

    /**
     * @return array
     */
    public function getTotalsForDisplay()
    {

        $amount = $this->getOrder()->formatPriceTxt($this->getOrder()->getOnestepcheckoutGiftwrapAmount());
        $fontSize = $this->getFontSize() ? $this->getFontSize() : 7;
        $totals = [[
            'label'     => __('Gift Wrap:'),
            'amount'    => $amount,
            'font_size' => $fontSize,]];

        return $totals;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->getOrder()->getOnestepcheckoutGiftwrapAmount();
    }

}
