<?php

namespace OpenTechiz\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use OpenTechiz\Blog\Model\PostFactory;
use Magento\Framework\Stdlib\DateTime\DateTime;

class Save extends Action
{

    protected $_datetime;
    protected $_postFactory;

    public function __construct(
        Action\Context $context,
        DateTime $datetime,
        PostFactory $postFactory
    ) {
        parent::__construct($context);
        $this->_datetime = $datetime;
        $this->_postFactory = $postFactory;
    }

    public function execute()
    {
        $request = $this->getRequest();
        if($request->getPost()) {
            $formData = $request->getPostValue();
            $postId = $request->getParam("post_id");
            $postModel = $this->_postFactory->create();
            $currentTime = $this->_datetime->gmtDate();
            if($postId) {
               $postModel->load($postId);
               $postModel->setUpdateTime($currentTime);
            }

            // $postModel->setUrlKey($formData["url_key"]);
            // $postModel->setTitle($formData["title"]);
            // $postModel->setContent($formData["content"]);
            // $postModel->setIsActive($formData["is_active"]);

            $postModel->setData($formData);
            
            if(!$postId) {
                $postModel->setCreationTime($currentTime);
            }

            $postModel->save();
            $this->messageManager->addSuccess(__("The post information has been saved"));
            return $this->_redirect("*/*/edit", ["id" => $postModel->getId()]);
        }
        
    }


}
