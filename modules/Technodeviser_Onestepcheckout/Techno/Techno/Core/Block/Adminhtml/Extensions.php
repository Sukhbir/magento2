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

namespace Techno\Core\Block\Adminhtml;

/**
 * Class Extensions
 */
class Extensions extends \Magento\Framework\View\Element\Template
{
	/**
	 * @var \Magento\Framework\Module\FullModuleList
	 */
	private $moduleList;

	/**
	 * @var \Magento\Framework\App\CacheInterface
	 */
	protected $_cache;

	/**
	 * Extensions constructor.
	 * @param \Magento\Framework\View\Element\Template\Context $context
	 * @param \Magento\Framework\Module\FullModuleList $moduleList
	 * @param array $data
	 */
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Framework\Module\FullModuleList $moduleList,
		array $data = []
	)
	{
		parent::__construct($context, $data);

		$this->moduleList = $moduleList;
		$this->_cache     = $context->getCache();
	}

	/**
	 * @return array
	 */
	public function getInstalledModules()
	{
		$mageplza_modules = array();
		foreach ($this->moduleList->getAll() as $moduleName => $info) {
			if (strpos($moduleName, 'Techno') !== false) {
				$mageplza_modules[$moduleName] = $info['setup_version'];
			}
		}

		return $mageplza_modules;
	}

	/**
	 * @return bool|mixed|string
	 */
	public function getAvailableModules()
	{
		$url    = 'https://www.Techno.com/api/getVersions.json';
		$result = $this->_cache->load('Techno_extensions');
		if ($result) {
			try {
				$jsonData = file_get_contents($url);
			} catch (\Exception $e) {
				return false;
			}
			$this->_cache->save($jsonData, 'Techno_extensions');
			$result = $this->_cache->load('Techno_extensions');
		}
		$result = json_decode($result, true); //true return array otherwise object

		return $result;
	}
}
