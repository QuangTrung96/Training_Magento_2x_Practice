<?php

namespace Object\Manager\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	
	public function __construct(Context $context, 
								PageFactory $pageFactory) {
		parent::__construct($context);
		$this->_pageFactory = $pageFactory;
	}

	public function execute() {
		return $this->_pageFactory->create();
	}

}