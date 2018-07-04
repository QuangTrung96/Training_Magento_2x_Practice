<?php

namespace Object\Manager\Block;

use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\View\Element\Template;

class Hello extends Template
{
    private $productFactory;
    
    public function __construct(Template\Context $context,
        						ProductFactory $productFactory,
                                array $data = []) {
        parent::__construct($context, $data);
        $this->productFactory = $productFactory;
    }

    public function _prepareLayout() {
        parent::_prepareLayout();
    }

    public function getBySku($sku) {
    	$product = $this->productFactory->create();
    	return $product->load($product->getIdBySku($sku));
    }

}
