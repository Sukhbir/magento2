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

$product = $objectManager->create('Magento\Catalog\Model\Product');

$product->setSku('exp1'); // Set your sku here
$product->setName('Sample Simple Product'); // Name of Product
$product->setAttributeSetId(4); // Attribute set id
$product->setStatus(1); // Status on product enabled/ disabled 1/0
$product->setWeight(10); // weight of product
$product->setVisibility(4); // visibilty of product (catalog / search / catalog, search / Not visible individually)
$product->setTaxClassId(0); // Tax class id
$product->setTypeId('simple'); // type of product (simple/virtual/downloadable/configurable)
$product->setPrice(100); // price of product
$product->setStockData(
                        array(
                            'use_config_manage_stock' => 0,
                            'manage_stock' => 1,
                            'is_in_stock' => 1,
                            'qty' => 999999999
                        )
                    );

try {
    $product->save();
    echo 'saved';
} catch (Exception $ex) {
    echo 'not saved';
}

?>