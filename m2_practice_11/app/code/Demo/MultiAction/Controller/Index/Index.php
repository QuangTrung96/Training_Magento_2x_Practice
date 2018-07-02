<?php

namespace Demo\MultiAction\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_request;
	protected $_pageFactory;
	protected $_coreRegistry;

	public function __construct(Context $context, 
								RequestInterface $request, 
								PageFactory $pageFactory,
								Registry $coreRegistry) {
		parent::__construct($context);
		$this->_request = $request;
		$this->_pageFactory = $pageFactory;
		$this->_coreRegistry = $coreRegistry;
	}

	public function execute() {
		/*$fullRequest = $this->getInfo();
		$module = $fullRequest[0];
		$controller = $fullRequest[1];
		$action = $fullRequest[2];
		echo "<h1>$module Module - $controller Controller - $action Action</h1>";
		exit();*/
		$this->_coreRegistry->register('tqt', 'Trịnh Quang Trung');
		return $this->_pageFactory->create();
	}

	public function getInfo() {
		$requestName = $this->_request->getFullActionName();
		$result = explode('_', $requestName);
		return $result;
	}
	
}