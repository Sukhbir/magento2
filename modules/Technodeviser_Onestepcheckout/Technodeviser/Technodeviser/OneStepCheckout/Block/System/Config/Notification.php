<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Technodeviser\OneStepCheckout\Block\System\Config;

/**
 * class FieldPosition
 *
 * @category Technodeviser
 * @package  Technodeviser_OneStepCheckout
 * @module   OneStepCheckout
 * @author   Technodeviser Developer
 */
class Notification extends \Magento\Config\Block\System\Config\Form\Fieldset
{
    /**
     * {@inheritdoc}
     */
    protected function _prepareLayout()
    {
        $this->addChild('notification_block', 'Technodeviser\OneStepCheckout\Block\Adminhtml\Widget\System\Config\Notification');

        return parent::_prepareLayout();
    }

    /**
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     *
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return $this->getChildHtml('notification_block');
    }
}