<?php
/**
 * Copyright © 2015 Td. All rights reserved.
 */
namespace Td\Abundantcart\Model\ResourceModel;

/**
 * Index resource
 */
class Index extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('abundantcart_index', 'id');
    }

  
}
