<?php
ini_set('display_errors', 1);

use Magento\Framework\App\Bootstrap;
require __DIR__.'/app/bootstrap.php';
$params = $_SERVER;
$bootstrap = Bootstrap::create(BP, $params);

$obj = $bootstrap->getObjectManager();
$state = $obj->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');

$objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // instance of object manager
$filesystem = $obj->create('Magento\Framework\Filesystem');

/** @var 
 \Magento\Framework\Filesystem\Directory\WriteInterface\ $mediaDirectory */

$mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
$mediaPath = $mediaDirectory->getAbsolutePath();

$productid = 18;

$product = $objectManager->create('Magento\Catalog\Model\Product')->load($productid);

$image_directory = $mediaPath.'/import/myimage.jpg';
$product->setMediaGallery(array('images' => array(), 'values' => array()))//media gallery initialization
->addImageToMediaGallery($image_directory, array('image', 'thumbnail', 'small_image'), false, false);//assigning image, thumb and small image to media gallery




try {
    $product->save();
    echo 'saved';
} catch (Exception $ex) {
    echo 'not saved';
}