<?php

namespace Object\Manager\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;

class Hello extends Template
{
    private $productFactory;
    private $productRepository;
    protected $_productRepository;
    
    public function __construct(Template\Context $context,
    							ProductInterfaceFactory $productFactory,
        						ProductRepositoryInterface $productRepository,
                                array $data = []) {
        parent::__construct($context, $data);
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
    }

    public function _prepareLayout() {
        parent::_prepareLayout();
    }

    public function loadMyProduct($sku) {
    	return $this->productRepository->get($sku);
    }

    public function createProduct() {
    	$product = $this->productFactory->create();
    	$product->setSku('MyNewProduct');
    	$this->productRepository->save($product);
    }

}
