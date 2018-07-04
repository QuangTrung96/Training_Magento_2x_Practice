<?php

namespace TQT\Macfixit\Observer;

use Psr\Log\LoggerInterface;
use Magento\Framework\Event\ObserverInterface;

class Observer implements ObserverInterface
{
	protected $_logger;
   
    public function __construct(LoggerInterface $logger) 
    {
        $this->_logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $data = [];
        $name = $customer->getName();
        $email = $customer->getEmail();
        $data[] = $name;
        $data[] = $email;
        $this->_logger->addInfo("Trịnh Quang Trung", $data);
        exit();
    }
}