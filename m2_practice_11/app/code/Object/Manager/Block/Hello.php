<?php

namespace Object\Manager\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ProductRepository;
class Hello extends Template
{
    protected $_productRepository;

    public function __construct(Template\Context $context,
                                ProductRepository $productRepository,
                                array $data = []) {

        parent::__construct($context, $data);
        $this->_productRepository = $productRepository;
    }

    public function _prepareLayout() {
        parent::_prepareLayout();
    }

    public function getProductById($id) {
        return $this->_productRepository->getById($id);
    }
  
    public function getProductBySku($sku) {
        return $this->_productRepository->get($sku);
    }

}
