<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *  
 */

namespace Technodeviser\OneStepCheckout\Block\Layout;

/**
 * Class Style
 * @package Technodeviser\OneStepCheckout\Block\Layout
 */
class Style extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Technodeviser\OneStepCheckout\Helper\Config
     */
    protected $_configHelper;

    /**
     * Style constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Technodeviser\OneStepCheckout\Helper\Config $configHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Technodeviser\OneStepCheckout\Helper\Config $configHelper,
        array $data
    ){
        $this->_configHelper = $configHelper;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed|string
     */
    public function getStyleColor()
    {
        return $this->_configHelper->getStyleColor();
    }

    /**
     * @return mixed|string
     */
    public function getButtonColor()
    {
        return $this->_configHelper->getButtonColor();
    }

}