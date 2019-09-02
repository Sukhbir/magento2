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
namespace Techno\Core\Observer;

use Magento\Framework\Event\ObserverInterface;

/**
 * Class PredispatchAdminActionControllerObserver
 * @package Techno\Core\Observer
 */
class PredispatchAdminActionControllerObserver implements ObserverInterface
{
	/**
	 * @type \Techno\Core\Model\FeedFactory
	 */
	protected $_feedFactory;

	/**
	 * @type \Magento\Backend\Model\Auth\Session
	 */
	protected $_backendAuthSession;

	/**
	 * @param \Techno\Core\Model\FeedFactory $feedFactory
	 * @param \Magento\Backend\Model\Auth\Session $backendAuthSession
	 */
	public function __construct(
		\Techno\Core\Model\FeedFactory $feedFactory,
		\Magento\Backend\Model\Auth\Session $backendAuthSession
	)
	{
		$this->_feedFactory        = $feedFactory;
		$this->_backendAuthSession = $backendAuthSession;
	}

	/**
	 * @param \Magento\Framework\Event\Observer $observer
	 */
	public function execute(\Magento\Framework\Event\Observer $observer)
	{
		if ($this->_backendAuthSession->isLoggedIn()) {
			/* @var $feedModel \Techno\Core\Model\Feed */
			$feedModel = $this->_feedFactory->create();
			$feedModel->checkUpdate();
		}
	}
}
