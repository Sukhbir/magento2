<?php
use Magento\Framework\App\Bootstrap;
require __DIR__ . '/app/bootstrap.php';
$params = $_SERVER;
$bootstrap = Bootstrap::create(BP, $params);
$obj = $bootstrap->getObjectManager();
$state = $obj->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');

$objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // instance of object manager
$file = fopen("Product_Dimension.csv","r");
create_log('Execustion Starts........');
while(!feof($file))
{
    $obj = fgetcsv($file);
    $ean_code = $obj[0];
    $product_group = $obj[1];
    $height = $obj[2];
    $width = $obj[3];
    $depth = $obj[4];
    $weight = $obj[5];
    $basecode = $obj[6];
    $cubicval = ($height/100)*($width/100)*($depth/100);
    if($basecode!='BASE Code')
    {
        
        $product = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection')->addFieldToFilter('sku', array($basecode));
        if($product->getsize())
        {
            $productdata = $product->getData();
            $_product = $objectManager->create('\Magento\Catalog\Model\Product')->load($productdata[0]['entity_id']);
            $_product->setEanCode($ean_code);
            $_product->setProductGroup($product_group);
            $_product->setHeight($height);
            $_product->setWidth($width);
            $_product->setDepth($depth);
            $_product->setWeight($weight);
            $_product->setCubic($cubicval);
            $_product->save();
            create_log('Sku Done: '.$basecode);
        }
        else
        {
            create_log('Sku not existing: '.$basecode);
        }
    }
    
}
create_log('Execustion Ends........');
exit;
function create_log($content)
{ 
    $destination = $_SERVER["DOCUMENT_ROOT"] . "/attributes.log";
    $file = fopen($destination,"a");
    fwrite($file,"$content\n");
    fclose($file);
    return true;
}

