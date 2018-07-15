<?php

namespace OpenTechiz\Blog\Controller\Adminhtml\Comment;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use OpenTechiz\Blog\Model\CommentFactory;

class InlineEdit extends \Magento\Backend\App\Action
{

    protected $commentFactory;
    protected $jsonFactory;
    public function __construct(
        Context $context,
        CommentFactory $commentFactory,
        JsonFactory $jsonFactory
    )
    {
        parent::__construct($context);
        $this->commentFactory = $commentFactory;
        $this->jsonFactory = $jsonFactory;
    }
    
    public function execute()
    {

        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];
        $postItems = $this->getRequest()->getParam('items', []);
      
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }
        // Save data to database
        foreach (array_keys($postItems) as $commentId) {
            try {
                $comment = $this->commentFactory->create();
                $comment->load($commentId);
                $comment->setData($postItems[(string)$commentId]);
                $comment->save();
            } catch (\Exception $e) {
                $messages[] = __('Something went wrong while saving the image.');
                $error = true;
            }
        }
        //var_dump("dfsfs");
        // Return result Json
        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
