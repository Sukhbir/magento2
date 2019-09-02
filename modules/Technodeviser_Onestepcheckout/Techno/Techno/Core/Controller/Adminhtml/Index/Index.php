<?php
/**
 * Techno
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Techno.com license that is
 * available through the world-wide-web at this URL:
 * https://www.Techno.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Techno
 * @package     Techno_Core
 * @copyright   Copyright (c) 2016 Techno (http://www.Techno.com/)
 * @license     https://www.Techno.com/LICENSE.txt
 */
namespace Techno\Core\Controller\Adminhtml\Index;

/**
 * Class Index
 * @package Techno\Core\Controller\Adminhtml\Index
 */
class Index extends \Magento\Backend\App\Action
{
	/**
	 * @var \Magento\Framework\View\Result\PageFactory
	 */
	protected $resultPageFactory;

	/**
	 * @param \Magento\Backend\App\Action\Context $context
	 * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
	 */
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		$this->resultPageFactory = $resultPageFactory;

		parent::__construct($context);
	}

	/**
	 * @return \Magento\Backend\Model\View\Result\Page
	 */
	public function execute()
	{
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
		$resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Techno_Core::partners');
		$resultPage->addBreadcrumb(__('Partners'), __('Partners'));
		$resultPage->getConfig()->getTitle()->prepend(__('Techno.com Marketplace'));

		return $resultPage;
	}

	/**
	 * Check for is allowed
	 *
	 * @return boolean
	 */
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Techno_Core::partners');
	}
}
