<?php
namespace Td\Abundantcart\Controller\cart;
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
            
        )
    {
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
        $_ObjectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $this->ObjectManager = $_ObjectManager;
        
    }
    public function getStoreEmail()
    {
        return $this->_scopeConfig->getValue(
            'trans_email/ident_support/email',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    public function execute()
    { 
        $post = $this->getRequest()->getPost();  
        $customerSession = $this->ObjectManager->get('\Magento\Customer\Model\Session');
		$cart = $this->ObjectManager->get('\Magento\Checkout\Model\Cart');  
		$subTotal = $cart->getQuote()->getSubtotal();
        // if($customerSession->getCoupon()!='')
        // {
            // $couponcode = $customerSession->getCoupon();
            // echo "You can use <strong id='coupan-code'>$couponcode</strong> code for free shipping";
            // exit;
        // }
        
        //if($post['email'] && $customerSession->getCoupon()=='')
        if($post['email'])
        {
			$data = $itemsName = Array();
            $couponcode = $this->generateCoupon();
            $customerSession->setPopup('13');
            $customerSession->setCoupon($couponcode);
            $customerSession->setCuscartprice($subTotal);
            $to = $post['email'];
            $from = $this->getStoreEmail();
            $store = $this->storeManager->getStore()->getId();
            $transport = $this->_transportBuilder->setTemplateIdentifier('abundant_cart_email_template')
                ->setTemplateOptions(['area' => 'frontend', 'store' => $store])
                ->setTemplateVars(['store' => $this->storeManager->getStore(),
                        'coupon_code' => $couponcode
                ])
            ->setFrom('general')
            ->addTo($to, 'Integralaudio')
            ->getTransport();
            $transport->sendMessage();
			$cart = $this->ObjectManager->get('\Magento\Checkout\Model\Cart'); 
			$itemsVisible = $cart->getQuote()->getAllVisibleItems();
			foreach($itemsVisible as $item) {
				$itemsName[] = $item->getName();           
			}
			$model = $this->_objectManager->create('Td\Abundantcart\Model\Index');
			$data['email'] = $post['email'];
			$data['cus_coupon_code'] = $couponcode;
			$data['order_id'] = "";
			$data['items'] = implode(", ",$itemsName);
			$model->setData($data);
			$model->save();
			//print_r($sku);
            echo "You can use <strong id='coupan-code'>$couponcode</strong> code for free shipping";
            exit;
        }
        else
        {
            echo "Please enter your email";
            exit;
        }
    }
    
    public function generateCoupon()
    {
        $obj =  \Magento\Framework\App\ObjectManager::getInstance();
		//$state = $obj->get('Magento\Framework\App\State');
		//$state->setAreaCode('frontend');  
		
		$objDate = $obj->create('Magento\Framework\Stdlib\DateTime\DateTime');
		$timeStamp = strtotime($objDate->gmtDate());
		$cart = $obj->get('\Magento\Checkout\Model\Cart');  
		$subTotal = $cart->getQuote()->getSubtotal();

		$coupon['name'] = 'customCoupon'.$timeStamp;
		date_default_timezone_set('America/Detroit');
		$coupon['start'] = Date('Y-m-d');
		$coupon['end'] = '';
		$coupon['max_redemptions'] = 1;
		$coupon['flag_is_free_shipping'] = 'no';
		$coupon['redemptions'] = 1;
		$coupon['code'] ='INT-'.mt_rand(100000, 999999);

		if ($subTotal<500){
			$coupon['desc'] = 'Free Shipping.';
			$coupon['discount_type'] ='by_percent';
			$coupon['discount_amount'] = 0;
			$condition = $obj->create('Magento\SalesRule\Model\Rule\Condition\Address')
						->setType('Magento\SalesRule\Model\Rule\Condition\Address')
						->setAttribute('base_subtotal')
						->setOperator('<')
						->setValue('500');
		} else if ($subTotal>=500 && $subTotal<= 2000){
			$coupon['desc'] = '20% Discount.';
			$coupon['discount_type'] ='by_percent';
			$coupon['discount_amount'] = 20;
			$condition = $obj->create('Magento\SalesRule\Model\Rule\Condition\Address')
							->setType('Magento\SalesRule\Model\Rule\Condition\Address')
							->setAttribute('base_subtotal')
							->setOperator('>=')
							->setValue('500');
			$condition1 = $obj->create('Magento\SalesRule\Model\Rule\Condition\Address')
							->setType('Magento\SalesRule\Model\Rule\Condition\Address')
							->setAttribute('base_subtotal')
							->setOperator('<=')
							->setValue('2000');
		} else if ($subTotal> 2000) {
			$coupon['desc'] = '$500 Discount.';
			$coupon['discount_type'] ='cart_fixed';
			$coupon['discount_amount'] = 500;
			$condition = $obj->create('Magento\SalesRule\Model\Rule\Condition\Address')
							->setType('Magento\SalesRule\Model\Rule\Condition\Address')
							->setAttribute('base_subtotal')
							->setOperator('>=')
							->setValue('2000');
		}


		$shoppingCartPriceRule = $obj->create('Magento\SalesRule\Model\Rule');
		$shoppingCartPriceRule->setName($coupon['name'])
				->setDescription($coupon['desc'])
				->setFromDate($coupon['start'])
				->setToDate($coupon['end'])
				->setUsesPerCustomer($coupon['max_redemptions'])
				->setCustomerGroupIds(array('0','1','2','3',))
				->setIsActive(1)
				->setSimpleAction($coupon['discount_type'])
				->setDiscountAmount($coupon['discount_amount'])
				->setDiscountQty(0)
				->setApplyToShipping($coupon['flag_is_free_shipping'])
				->setTimesUsed($coupon['redemptions'])
				->setWebsiteIds(array('1'))
				->setCouponType(2)
				->setCouponCode($coupon['code'])
				->setUsesPerCoupon(NULL);
		$shoppingCartPriceRule->getConditions()->addCondition($condition);
		if ($subTotal<500){
			$condition1 = $obj->create('Magento\SalesRule\Model\Rule\Condition\Product')
							->setType('Magento\SalesRule\Model\Rule\Condition\Product')
							->setAttribute('quote_item_price')
							->setOperator('<')
							->setValue('500');
			$shoppingCartPriceRule->getActions()->addCondition($condition1);
			$shoppingCartPriceRule->setSimpleFreeShipping(1);
		}
		if ($subTotal>=500 && $subTotal<= 2000) {
			$shoppingCartPriceRule->getConditions()->addCondition($condition1);
		}
		$shoppingCartPriceRule->save() or die('not created');
        return $coupon['code'];
		
    }  
}