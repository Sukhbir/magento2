<?php namespace RealizeOnline\Postorder\Observer; 
use Magento\Framework\Event\ObserverInterface; 

class Observer implements ObserverInterface { 
    protected $_messageFactory;
    protected $connector; 
    protected $scopeConfig;
     
    const XML_PATH_STATUS = 'postorder/general/enable';
    const XML_PATH_FTP_HOST = 'postorder/general/ftp_host';
    const XML_PATH_FTP_PORT = 'postorder/general/ftp_port';
    const XML_PATH_FTP_USERNAME = 'postorder/general/ftp_username';
    const XML_PATH_FTP_PASS = 'postorder/general/ftp_password';
    const XML_PATH_FTP_SOURCE_PATH = 'postorder/general/ftp_source_path';
    const XML_PATH_DESTINATION_PATH = 'postorder/general/ftp_destination_path';
    
    public function __construct(
        \Magento\GiftMessage\Model\MessageFactory $messageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_messageFactory = $messageFactory;
        $this->scopeConfig = $scopeConfig;
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); 
    }

    public function execute(\Magento\Framework\Event\Observer $observer) { 
        
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $status = $this->scopeConfig->getValue(self::XML_PATH_STATUS, $storeScope);
        if($status)
        {
            /**************  FTP Details & Connection  ****************/
            $ManifestOfOrder = $getManifestOfItem = $allD = '';
         
            /*$ftp_host = '110.145.140.98';
            $ftp_username = 'Imate';
            $ftp_port = '24';
            $ftp_password = 'H@mpers)(*';
            $ftp_source_path = '/order_uploads/';
            $ftp_destination_path = '/order_uploads/';*/

            $ftp_port = '';
            $ftp_host = $this->scopeConfig->getValue(self::XML_PATH_FTP_HOST, $storeScope);
            $ftp_username = $this->scopeConfig->getValue(self::XML_PATH_FTP_USERNAME, $storeScope);
            $ftp_password = $this->scopeConfig->getValue(self::XML_PATH_FTP_PASS, $storeScope);
            $ftp_source_path = $this->scopeConfig->getValue(self::XML_PATH_FTP_SOURCE_PATH, $storeScope);
            $ftp_destination_path = $this->scopeConfig->getValue(self::XML_PATH_DESTINATION_PATH, $storeScope);
            $ftp_port = $this->scopeConfig->getValue(self::XML_PATH_FTP_PORT, $storeScope);

            $ftp_conn = ftp_connect($ftp_host,$ftp_port) or die("Could not connect to $ftp_host");
            $login = ftp_login($ftp_conn, $ftp_username, $ftp_password);

            /**************  Upload order file on current server  ****************/
            $ManifestOfOrder = $this->getManifestOfOrder($observer);
            $ordernumber = $ManifestOfOrder[1];
            $ManifestOfOrder = implode('|',$ManifestOfOrder);
            
            $filename = $_SERVER["DOCUMENT_ROOT"].$ftp_source_path.$ordernumber.'.txt';
            $source_file = fopen($filename, "a") or die("Unable to open file!");
            $txt = $ManifestOfOrder;
            fwrite($source_file, "$txt\n");
            
            $getManifestOfItem = $this->getManifestOfItem($observer);
                        
            foreach($getManifestOfItem as $dataofItems)
            {
                $allD[] =  $dataofItems[0];
                $allshsd[] =  array($dataofItems[1],$dataofItems[2]);
            }
            
            foreach($allD as $allDdataofItems)
            {
                $source_file = fopen($filename, "a") or die("Unable to open file!"); 
                fwrite($source_file, "$allDdataofItems\n");
            }
    
            foreach($allshsd as $allshsddataofItems)
            {
                $source_file = fopen($filename, "a") or die("Unable to open file!"); 
                fwrite($source_file, "$allshsddataofItems[0]\n");
                
                $source_file = fopen($filename, "a") or die("Unable to open file!"); 
                fwrite($source_file, "$allshsddataofItems[1]\n");
            }
            
            fclose($source_file);
            
            /**************  Upload order file on third party server  ****************/
            ftp_put($ftp_conn, $ftp_destination_path.$ordernumber.'.txt', $filename, FTP_ASCII);

            ftp_close($ftp_conn);
            
        }
        
    }
        
    public function getManifestOfOrder($observer)
    { 
        $order = $observer->getEvent()->getOrder();
        $address = $order->getBillingAddress();
        $streetaddress = $address->getStreet();
        if(count($streetaddress)>1)
        {
            $street1 = $streetaddress[0];
            $street2 = $streetaddress[1];
        }
        else
        {
            $street1 = $streetaddress[0];
            $street2 = '';
        }

        return array('H',
                $order->getIncrementId(),
                '',
                '',
                $address->getFirstname(),
                $address->getLastname(),
                $address->getCompany(),
                $street1,
                $street2,
                $address->getCity(),
                $address->getPostcode(),
                $address->getRegion(),
                $address->getEmail(),
                $this->filterPhone($address->getTelephone()),
                $address->getFax(),
                date('d/m/Y'),
                '0.00',
                '',
                ''
                );
    }
    public function getManifestOfItem($observer)
    {
        $allDetails = array();
        $discount_amount=$coupon_code= '';
        $order = $observer->getEvent()->getOrder();
        if($order->getCouponCode())
        {
            //$discount_amount = $order->getDiscountAmount();
            $coupon_code = $order->getCouponCode();
        }
        
        //$totalitems =  $discount_amount/count($order->getAllItems());
        //$peritemdiscount =  str_replace("-","",$totalitems);
        
        foreach($order->getAllItems() as $item)
        {
           // echo "<pre>"; print_r($item->getData()); exit;
            $itemamount = $item->getPrice()*$item->getQtyOrdered();
            $rowtotalamount = $itemamount+$item->getTaxAmount();
            $rowtotal = $rowtotalamount-$item->getDiscountAmount();
            $peritemdiscount = $item->getDiscountAmount();
            $giftmessageid = $item->getGiftMessageId();
            $giftMessageObject = $this->_messageFactory->create()->load($giftmessageid);
                
            $getManifestOfItem = array( 'D',
                $order->getIncrementId(),
                $item->getSKU(),
                $item->getQtyOrdered(),
                number_format($item->getPrice(), 2),
                $coupon_code,
                '',
                $item->getBaseTaxAmount(),
                $peritemdiscount,
                number_format($rowtotal, 2),
                '','','','','','','','',''
            );
            
            
            $getManifestOfItem = implode('|',$getManifestOfItem);
            
            $getManifestOfRecipient = $this->getManifestOfRecipient($observer);
            $getManifestOfRecipient = implode('|',$getManifestOfRecipient);
            
            $getManifestOfRecipientInstruction = $this->getManifestOfRecipientInstruction($observer,$item,$giftMessageObject);
            $getManifestOfRecipientInstruction = implode('|',$getManifestOfRecipientInstruction);
            
            $allDetails[] = array($getManifestOfItem,$getManifestOfRecipient,$getManifestOfRecipientInstruction);
        }
        return $allDetails;
    }
    
    public function getManifestOfRecipient($observer)
    { 
        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
        $request = $objectManager->get('\Magento\Framework\App\Request\Http');
        $modulename = $request->getModuleName();
        
        $order = $observer->getOrder();
        $deliverydate = '';
        $shippingdeliverydate = '';
        
        if($modulename=='multishipping')
        {
            if($order->getShippingArrivalDate())
            {
                $shippingdeliverydate = $order->getShippingArrivalDate();
            }
            if($shippingdeliverydate)
            {
                $formatdate = explode('-',$shippingdeliverydate);
                $reversedate = array_reverse($formatdate);
                $changeformatdate =  implode('/',$reversedate);
                $deliverydate = $changeformatdate;
            }
        }
        else
        {
            if($order->getDeliveryDate())
            {
                $onestepdeliverydate = $order->getDeliveryDate();
            }
            
            if($onestepdeliverydate)
            {
                $deliveryformat = substr($onestepdeliverydate, 0, strrpos($onestepdeliverydate, ' '));
                $formatdate = explode('-',$deliveryformat);
                $reversedate = array_reverse($formatdate);
                $changeformatdate =  implode('/',$reversedate);
                $deliverydate = $changeformatdate;
            }
        }
        
        
        $order = $observer->getEvent()->getOrder();
        $recipient = $order->getShippingAddress();
        $streetaddress = $recipient->getStreet();
        if(count($streetaddress)>1)
        {
            $street1 = $streetaddress[0];
            $street2 = $streetaddress[1];
        }
        else
        {
            $street1 = $streetaddress[0];
            $street2 = '';
        }
        
        return array('SH',
                $order->getIncrementId(),
                $recipient->getFirstName(),
                $recipient->getLastName(),
                $recipient->getCompany(),
                $street1,
                $street2,
                $recipient->getCity(),
                $recipient->getPostCode(),
                $recipient->getRegion(),
                $deliverydate,
                $this->filterPhone($recipient->getTelephone()),
                '','','','','','',''
        );
    }
    
    public function getManifestOfRecipientInstruction($observer,$item,$giftMessageObject)
    {
        $giftMessage = $giftMessageObject->getMessage();
        $reciever = $giftMessageObject->getRecipient();
        $sender = $giftMessageObject->getSender();
        $order = $observer->getEvent()->getOrder();
        $recipient = $order->getShippingAddress();
        return array('SD',
            $order->getIncrementId(),
            $item->getSKU(),
            $item->getQtyOrdered(),
            $recipient->getCompany(),
            $reciever,
            $giftMessage,
            '','','','','','','','','','','',''
        );
    }
    
    
    public function filterPhone($phone)
    {
        return preg_replace('/\D+/', '', $phone);
    }
    
}