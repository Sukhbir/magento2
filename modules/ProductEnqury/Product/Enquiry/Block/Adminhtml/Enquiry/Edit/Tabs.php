<?php
namespace Product\Enquiry\Block\Adminhtml\Enquiry\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
		
        parent::_construct();
        $this->setId('checkmodule_enquiry_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Enquiry Information'));
    }
}