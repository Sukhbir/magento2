<?php
namespace Product\Enquiry\Block\Adminhtml;
class Enquiry extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
        $this->_controller = 'adminhtml_enquiry';/*block grid.php directory*/
        $this->_blockGroup = 'Product_Enquiry';
        $this->_headerText = __('Enquiry');
        $this->_addButtonLabel = __('Add'); 
        parent::_construct();
		
    }
}
