<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */

namespace Technodeviser\OneStepCheckout\Model\ResourceModel;

/**
 * Class Delivery
 *
 * @category Technodeviser
 * @package  Technodeviser_OneStepCheckout
 * @module   OneStepCheckout
 * @author   Technodeviser Developer
 */
class Delivery extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * {@inheritdoc}
     */
    public function _construct()
    {
        $this->_init('onestepcheckout_delivery', 'delivery_id');
    }
}