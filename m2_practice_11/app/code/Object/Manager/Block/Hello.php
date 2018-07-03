<?php

namespace Object\Manager\Block;

use Magento\Framework\View\Element\Template;

class Hello extends Template
{
    protected $_productRepository;

    public function __construct(Template\Context $context,
                                array $data = []) {
        parent::__construct($context, $data);
    }

    public function _prepareLayout() {
        parent::_prepareLayout();
    }

}
