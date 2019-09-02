<?php
/**
 * Created by wilson.sun330@gmail.com
 * Date: 13/05/2015
 * Time: 5:02 PM
 */
namespace Td\Product\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action
{
    public function execute($coreRoute = null)
    {
      $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
      
      if($_POST['id'])
      {
          $response = '';
          $passid = $_POST['id'];
          $attrcode = $_POST['code'];
          $attrvalue = $_POST['index'];
          $json =  $_POST['json'];
          $json_decode = json_decode($json);
          $OptionCollection = array();
          $productCollectionFactory = $objectManager->get('\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
          $collection = $productCollectionFactory->create();
          $collection->addAttributeToSelect('*');
          $collection->addStoreFilter();
         
          foreach($json_decode as $ObjectData)
          {
              $attr_code = $ObjectData->code;
              $attr_val = $ObjectData->index;
              
              $collection->addFieldToFilter($attr_code, array('eq' => $attr_val));
          }
          $collection->load();
          if($collection)
          { 
            foreach ($collection as $product)
            {
               $parentIds = $objectManager->get('Magento\ConfigurableProduct\Model\Product\Type\Configurable')->getParentIdsByChild($product->getId());
                $parentId = array_shift($parentIds);
                if($passid == $parentId )
                { 
                    $result =  array('url'=>$product->getProductUrl(),'stock'=> 'In Stock');
                    $response = json_encode($result);
                    echo $response;
                }
            }
            if(!$response)
            {
                $result =  array('url'=>'','stock'=> 'Out of Stock');
                $response = json_encode($result);
                echo $response;
            }
          }
       }

    }
} 

