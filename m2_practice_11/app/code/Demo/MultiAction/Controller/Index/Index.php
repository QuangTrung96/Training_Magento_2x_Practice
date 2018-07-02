<?php

namespace Demo\MultiAction\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_request;

	public function __construct(Context $context, 
								RequestInterface $request) {
		parent::__construct($context);
		$this->_request = $request;
	}

	public function execute() {
		$fullRequest = $this->getInfo();
		$module = $fullRequest[0];
		$controller = $fullRequest[1];
		$action = $fullRequest[2];
		echo "<h1>$module Module - $controller Controller - $action Action</h1>";
		exit();
	}

	public function getInfo() {
		$requestName = $this->_request->getFullActionName();
		$result = explode('_', $requestName);
		return $result;
	}
	
}