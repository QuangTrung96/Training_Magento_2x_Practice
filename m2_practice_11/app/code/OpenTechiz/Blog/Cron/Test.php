<?php

namespace OpenTechiz\Blog\Cron;

class Test {

    protected $_sendEmail;
    protected $_userCollection;
    protected $_commentCollectionFactory;

    public function __construct(
        \OpenTechiz\Blog\Model\ResourceModel\Comment\CollectionFactory $commentCollectionFactory,
        \Magento\User\Model\ResourceModel\User\CollectionFactory $userCollection,
        \OpenTechiz\Blog\Helper\SendEmail $sendEmail
    ) 
    {
        $this->_commentCollectionFactory = $commentCollectionFactory;
        $this->_userCollection = $userCollection;
        $this->_sendEmail = $sendEmail;
    }

/**
   * Write to system.log
   *
   * @return void
   */

    public function execute() {
        $to = date("Y-m-d h:i:s"); // current date
        $from = strtotime('-1 day', strtotime($to));
        $from = date('Y-m-d h:i:s', $from); // 1 days before
        $comments = $this->_commentCollectionFactory
                ->create()
                ->addFieldToFilter('status', 0)
                ->addFieldToFilter('creation_time', ["lteq" => $from]);
        // var_dump($comments->getData());
        // die();
        $commentCount = $comments->count();
        // get admins list
        $admins = $this->_userCollection->create();
        if($commentCount>0 && $admins->count()>0)
        {
            foreach ($admins as $admin) {
                $email = $admin->getEmail();
                $name = $admin->getUserName();
                $this->_sendEmail->reminderEmail($commentCount, $email, $name);
            }
        }
    }

}