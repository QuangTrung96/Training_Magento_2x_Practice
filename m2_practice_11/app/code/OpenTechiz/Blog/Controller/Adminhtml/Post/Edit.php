<?php

namespace OpenTechiz\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use OpenTechiz\Blog\Model\PostFactory;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action
{

    protected $_postFactory;
    protected $_resultPageFactory;

    public function __construct(
        Action\Context $context,
        PostFactory $postFactory,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->_postFactory = $postFactory;
        $this->_resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $postId = $this->getRequest()->getParam("id");
        $model = $this->_postFactory->create();
        if($postId) {
            $model->load($postId);
            if(!$model->getId()) {
                $this->messageManager->addError(__("Not found this post !"));
                return $this->_redirect("*/*/");
            }
            $title = "Edit A Post: " . $model->getTitle();
        } else {
            $title = "A New A Post";
        }
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__($title));
        return $resultPage;   
    }


}
