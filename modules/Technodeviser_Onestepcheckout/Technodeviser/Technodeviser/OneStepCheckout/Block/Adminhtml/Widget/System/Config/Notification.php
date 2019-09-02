<?php

/**
 * *
 *  Copyright © 2016 Technodeviser. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Technodeviser\OneStepCheckout\Block\Adminhtml\Widget\System\Config;
use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * Class Notification
 * @package Technodeviser\OneStepCheckout\Block\Adminhtml\Widget\System\Config
 */
class Notification extends \Technodeviser\OneStepCheckout\Block\Adminhtml\Widget\System\Config\ConfigAbstract
{
    /**
     * @var string
     */
    protected $_template = 'Technodeviser_OneStepCheckout::system/config/notification.phtml';


    /**
     * @return bool
     */
    public function isHasLibrary()
    {
        if (class_exists('\GeoIp2\Database\Reader')) {
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * @return bool
     */
    public function isHasGeoIpDataFile()
    {
        $directory = $this->fileSystem->getDirectoryRead(DirectoryList::MEDIA);
        if ($directory->isFile('Technodeviser/osc/GeoLite2-City.mmdb')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getGeoIpDataFile() {
        $mediaDirectory = $this->fileSystem->getDirectoryRead(DirectoryList::MEDIA);
        $url = $mediaDirectory->getAbsolutePath('Technodeviser/osc/GeoLite2-City.mmdb');
        return $url;
    }

}