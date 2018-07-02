<?php

namespace TQT\Macfixit\Observer;

use Magento\Framework\Event\ObserverInterface;

class Observer implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        echo "Customer LoggedIn<br />";
        $customer = $observer->getEvent()->getCustomer();
        echo $customer->getName(); //Get customer name
        exit();
    }
}
