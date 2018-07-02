<?php
 
namespace Focus\EventsObservers\Observer\Product;

use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\ObserverInterface;

 
class Data implements ObserverInterface
 
{
    protected $_logger;
    protected $_request;

    public function __construct(LoggerInterface $logger, RequestInterface $request) 
    {
        $this->_logger = $logger;
        $this->_request = $request;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getProduct();
        $originalName = $product->getName();
        $modifiedName = $originalName . ' - Modified by Magento 2 Events and Observers';
        $product->setName($modifiedName);

        $requestName = $this->getInfo();
        // $module      = $requestName[0];
        // $controller  = $requestName[1];
        // $action      = $requestName[2];

        $this->_logger->addInfo("Trịnh Quang Trung", $requestName);
        $this->_logger->addDebug('My debug log');
        $this->_logger->addNotice('My notice log');
        $this->_logger->addWarning('My warning log');
        $this->_logger->addError('My error log');
        $this->_logger->addCritical('My critical log');
        $this->_logger->addAlert('My alert log');
        $this->_logger->addEmergency('My emergency log');
        var_dump(get_class($this->_logger));
    }

    public function getInfo() {
        $requestFull = $this->_request->getFullActionName();
        $result = explode("_", $requestFull);
        return $result;
    }
 
}