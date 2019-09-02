<?php
/**
 *
 * Copyright © 2015 Productcommerce. All rights reserved.
 */
namespace Product\Enquiry\Controller\Enquiry;
use Magento\Contact\Model\MailInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    const XML_PATH_EMAIL_RECIPIENT = 'trans_email/ident_support/email';
    protected $scopeConfig;
	/**
     * @var \Magento\Framework\App\Cache\TypeListInterface
     */
    protected $_cacheTypeList;

    /**
     * @var \Magento\Framework\App\Cache\StateInterface
     */
    protected $_cacheState;

    /**
     * @var \Magento\Framework\App\Cache\Frontend\Pool
     */
    protected $_cacheFrontendPool;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $inlineTranslation;
    protected $_transportBuilder;
    protected $storeManager;
    protected $_escaper; 
    /**
     * @param Action\Context $context
     * @param \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList
     * @param \Magento\Framework\App\Cache\StateInterface $cacheState
     * @param \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
        \Magento\Framework\App\Cache\StateInterface $cacheState,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Escaper $escaper
    ) {
        parent::__construct($context);
        $this->_transportBuilder = $transportBuilder;
        $this->inlineTranslation = $inlineTranslation;
        $this->_cacheTypeList = $cacheTypeList;        
        $this->_cacheState = $cacheState;
        $this->_cacheFrontendPool = $cacheFrontendPool;
        $this->resultPageFactory = $resultPageFactory;
        $this->_scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
        $this->_escaper = $escaper;
    }
    public function getStoreEmail()
    {
        return $this->_scopeConfig->getValue(
            'trans_email/ident_support/email',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    
    /**
     * Flush cache storage
     *
     */
    public function execute()
    {
        

        $post = $this->getRequest()->getPost();  
        $data = $this->getRequest()->getParams();
        //echo "<pre>"; print_r( $data); exit;
        $post1 = $this->getRequest()->getPostValue();        
        $this->inlineTranslation->suspend();
        $email = $this->getStoreEmail();
        $url =$data['product_url'];
        if (!$data['email']) {
         $this->messageManager->addError(__('Fill the form properly.'));
        $this->_redirect($url);
        return;
        }
        if ($data) {
            $model = $this->_objectManager->create('Product\Enquiry\Model\Enquiry');
        
            /* if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
                try {
                        $uploader = $this->_objectManager->create('Magento\Core\Model\File\Uploader', array('fileId' => 'image'));
                        $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
                        $uploader->setAllowRenameFiles(true);
                        $uploader->setFilesDispersion(true);
                        $mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
                            ->getDirectoryRead(DirectoryList::MEDIA);
                        $config = $this->_objectManager->get('Magento\Bannerslider\Model\Banner');
                        $result = $uploader->save($mediaDirectory->getAbsolutePath('bannerslider/images'));
                        unset($result['tmp_name']);
                        unset($result['path']);
                        $data['image'] = $result['file'];
                } catch (Exception $e) {
                    $data['image'] = $_FILES['image']['name'];
                }
            }
            else{
                $data['image'] = $data['image']['value'];
            } */
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }
            
            $model->setData($data);
            
            try {


                 $to =  $email;
                //print_r($to);exit;              
                $store = $this->storeManager->getStore()->getId();
                // print_r( $this->_transportBuilder->addTo($to, $data["first_name"]));exit;
        $transport = $this->_transportBuilder->setTemplateIdentifier('enquiry_email_email_template')
            ->setTemplateOptions(['area' => 'frontend', 'store' => $store])
            ->setTemplateVars(['store' => $this->storeManager->getStore(),
                'product_name' => $data["product_name"],
                'product_code'=>$data["product_code"],
                'first_name' => $data["first_name"] ,
                'last_name'   => $data["last_name"],
                'email' => $data["email"],
                'phone_number' => $data["phone_number"],
                'institution' => $data["institution"],
                'message'=> $data["message"]

            ])
            ->setFrom('general')
            ->addTo($to, $data["first_name"])
            ->addBcc($data["email"])
            ->getTransport();
            $transport->sendMessage();
             $model->save();
                
                $this->messageManager->addSuccess(__('Your enquiry has been submitted.')); 
                $this->_redirect($url);
           
                return;
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving.'));
                $this->_redirect($url);

            }

           
        }
       
      //$resultRedirect->setPath('home');    
        
    }
    
}
