<?php
namespace Product\Enquiry\Block\Adminhtml\Enquiry\Edit\Tab;
class ProductEnquiry extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = array()
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
		/* @var $model \Magento\Cms\Model\Page */
        $model = $this->_coreRegistry->registry('enquiry_enquiry');
		$isElementDisabled = false;
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => __('Product Enquiry')));

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id'));
        }

		$fieldset->addField(
            'product_name',
            'text',
            array(
                'name' => 'product_name',
                'label' => __('Product Name'),
                'title' => __('product name'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'product_code',
            'text',
            array(
                'name' => 'product_code',
                'label' => __('product code'),
                'title' => __('product code'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'first_name',
            'text',
            array(
                'name' => 'first_name',
                'label' => __('First Name'),
                'title' => __('first name'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'last_name',
            'text',
            array(
                'name' => 'last_name',
                'label' => __('Last Name'),
                'title' => __('last name'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'email',
            'text',
            array(
                'name' => 'email',
                'label' => __('Email Address'),
                'title' => __('email address'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'phone_number',
            'text',
            array(
                'name' => 'phone_number',
                'label' => __('Phone Number'),
                'title' => __('phone number'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'institution',
            'text',
            array(
                'name' => 'institution',
                'label' => __('Institution / Company'),
                'title' => __('institution / company'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'message',
            'text',
            array(
                'name' => 'message',
                'label' => __('Your Enquiry'),
                'title' => __('your enquiry'),
                /*'required' => true,*/
            )
        );
		/*{{CedAddFormField}}*/
        
        if (!$model->getId()) {
            $model->setData('status', $isElementDisabled ? '2' : '1');
        }

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();   
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Product Enquiry');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Product Enquiry');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
