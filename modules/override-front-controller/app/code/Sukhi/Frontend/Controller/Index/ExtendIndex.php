<?php
/**
 * Created by wilson.sun330@gmail.com
 * Date: 13/05/2015
 * Time: 5:02 PM
 */
namespace Sukhi\Frontend\Controller\Index;
class ExtendIndex extends \Magento\Framework\App\Action\Action
{
    public function execute($coreRoute = null)
    {
       $block_id = $_POST['blockid'];
       $block = $this->_view->getLayout()->createBlock('Magento\Cms\Block\Block')->setBlockId($block_id)->toHtml();
       $html =array('html'=>$block);
       if(empty($html))
       {
          $html = array('html'=>'<h3>No Content Here</h3');
       }
       echo json_encode($html);

    }
} 

