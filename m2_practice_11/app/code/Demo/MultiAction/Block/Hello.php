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

    public function __construct(Template\Context $context,
                                \Magento\Catalog\Model\Session $catalogSession,
                                \Magento\Customer\Model\Session $customerSession,
                                \Magento\Checkout\Model\Session $checkoutSession,
                                Registry $coreRegistry,
                                array $data = []) {

        parent::__construct($context, $data);
        $this->_coreRegistry = $coreRegistry;
        $this->_catalogSession = $catalogSession;
        $this->_customerSession = $customerSession;
        $this->_checkoutSession = $checkoutSession;
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

}
