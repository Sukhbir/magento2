<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */

namespace Technodeviser\OneStepCheckout\Observer;

use Magento\Framework\Event\ObserverInterface;

/**
 * Class QuoteSubmitSuccess
 * @package Technodeviser\OneStepCheckout\Observer
 */
class QuoteSubmitSuccess implements ObserverInterface
{
    /**
     * @var \Technodeviser\OneStepCheckout\Helper\Data
     */
    protected $_helper;


    /**
     * QuoteSubmitSuccess constructor.
     *
     * @param \Technodeviser\OneStepCheckout\Helper\Data $helper
     */
    public function __construct(\Technodeviser\OneStepCheckout\Helper\Data $helper)
    {
        $this->_helper = $helper;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     *
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var \Magento\Sales\Model\Order $order */
        $order = $observer->getEvent()->getOrder();
        $this->_helper->sendNewOrderEmail($order);
    }
}
