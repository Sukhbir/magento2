<?php
/**
 * Copyright © 2015 Product. All rights reserved.
 */
namespace Product\Enquiry\Model\ResourceModel;

/**
 * Enquiry resource
 */
class Enquiry extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('enquiry_enquiry', 'id');
    }

  
}
