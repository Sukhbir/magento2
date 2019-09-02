<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */

namespace Technodeviser\OneStepCheckout\Model\System\Config\Source;
/**
 * Class GiftWrap
 * @package Technodeviser\OneStepCheckout\Model\System\Config\Source
 */
class GiftWrap implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return [
            0 => __('Per Order'),
            1 => __('Per Item'),
        ];
    }
}