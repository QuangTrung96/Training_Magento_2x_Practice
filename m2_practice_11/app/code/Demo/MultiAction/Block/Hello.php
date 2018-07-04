<?php

namespace Demo\MultiAction\Block;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

class Hello extends Template
{
    protected $_coreRegistry;
    protected $_catalogSession;
    protected $_customerSession;
    protected $_checkoutSession;
    protected $_productCollectionFactory;

    public function __construct(Template\Context $context,
                                \Magento\Catalog\Model\Session $catalogSession,
                                \Magento\Customer\Model\Session $customerSession,
                                \Magento\Checkout\Model\Session $checkoutSession,
                                \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
                                Registry $coreRegistry,
                                array $data = []) {

        parent::__construct($context, $data);
        $this->_coreRegistry = $coreRegistry;
        $this->_catalogSession = $catalogSession;
        $this->_customerSession = $customerSession;
        $this->_checkoutSession = $checkoutSession;
        $this->_productCollectionFactory = $productCollectionFactory;
    }

    public function _prepareLayout() {
        $trungtq = $this->_coreRegistry->registry("tqt");
        $this->assign("trungtq", $trungtq);
        parent::_prepareLayout();
    }

    public function getCatalogSession() {
        return $this->_catalogSession;
    }

    public function getCustomerSession() {
        return $this->_customerSession;
    }

    public function getCheckoutSession() {
        return $this->_checkoutSession;
    }

    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection->getData();
    }

}
