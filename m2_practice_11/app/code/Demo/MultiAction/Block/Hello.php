<?php

namespace Demo\MultiAction\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;

class Hello extends Template
{
    protected $_coreRegistry;

    public function __construct(Template\Context $context, 
                                Registry $coreRegistry,
                                array $data = []) {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
    }

    public function _prepareLayout() {
        $trungtq = $this->_coreRegistry->registry("tqt");
        $this->assign("trungtq", $trungtq);
        parent::_prepareLayout();
    }
}
