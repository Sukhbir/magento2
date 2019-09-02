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
namespace Techno\Core\Model;

/**
 * Class Feed
 * @package Techno\Core\Model
 */
class Feed extends \Magento\AdminNotification\Model\Feed
{
    /**
     * @inheritdoc
     */
    const Techno_FEED_URL = 'www.Techno.com/notifications.xml';

    /**
     * @inheritdoc
     */
    public function getFeedUrl()
    {
        $httpPath = $this->_backendConfig->isSetFlag(self::XML_USE_HTTPS_PATH) ? 'https://' : 'http://';
        if ($this->_feedUrl === null) {
            $this->_feedUrl = $httpPath . self::Techno_FEED_URL;
        }
        return $this->_feedUrl;
    }

    /**
     * @inheritdoc
     */
    public function getLastUpdate()
    {
        return $this->_cacheManager->load('Techno_notifications_lastcheck');
    }

    /**
     * @inheritdoc
     */
    public function setLastUpdate()
    {
        $this->_cacheManager->save(time(), 'Techno_notifications_lastcheck');
        return $this;
    }

}
