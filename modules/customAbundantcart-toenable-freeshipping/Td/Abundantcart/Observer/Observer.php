<?php
namespace Td\Abundantcart\Observer;
use Magento\Framework\Event\ObserverInterface;

class Observer implements ObserverInterface {
    public function execute(\Magento\Framework\Event\Observer $observer) {
		$order = $observer->getEvent()->getOrder();        
        if($order->getCouponCode()) {
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$couponData = $objectManager->get('Td\Abundantcart\Model\Index')->getCollection();
			if($couponData){
				foreach($couponData as $data){
					if($data->getData('cus_coupon_code') == $order->getCouponCode()){
						$data->setOrderId($order->getIncrementId());
						$data->save();
					}
				}
			}
		}
		return true;
        exit;
    }
}
?>