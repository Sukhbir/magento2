<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Technodeviser\OneStepCheckout\Block\System\Config;

class GeoIpGuide extends \Magento\Config\Block\System\Config\Form\Fieldset
{
    /**
     * {@inheritdoc}
     */
    protected function _prepareLayout()
    {
        $this->addChild('geoip_guide_block', 'Technodeviser\OneStepCheckout\Block\Adminhtml\Widget\System\Config\GeoIpGuide');

        return parent::_prepareLayout();
    }

    /**
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     *
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return $this->getChildHtml('geoip_guide_block');
    }
}