<?php

namespace OpenTechiz\Blog\Controller\Comment;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class Add extends Action
{
    protected $resultPageFactory;
    protected $resultJsonFactory;
    protected $_inlineTranslation;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
        PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_inlineTranslation = $inlineTranslation;
        parent::__construct($context);
    }

    public function execute()
    {
        $error = false;
        $message = '';
        $postData = (array) $this->getRequest()->getPostValue();
        if(!$postData)
        {
            $error = true;
            $message = "Your submission is not valid. Please try again!";
        }
        $this->_inlineTranslation->suspend();
        $postObject = new \Magento\Framework\DataObject();
        $postObject->setData($postData);

        if(!\Zend_Validate::is(trim($postData['content']), 'NotEmpty'))
        {
            $error = true;
            $message = "Content can not be empty!";
        }

        $jsonResultResponse = $this->resultJsonFactory->create();

        if(!$error)
        {
            $content       = $postData['content'];
            $author        = 'Trung';
            $post_id       = $postData['post_id'];
            $creation_time = $postData['creation_time'];
            $currentUrl = $this->_redirect->getRefererUrl();
            
            $comment = $this->_objectManager->create("OpenTechiz\Blog\Model\Comment");
            $comment->addData($postData)->save();
            $this->messageManager->addSuccessMessage(__("Send Comment Success !"));
            $jsonResultResponse->setData([
                'result' => 'success',
                'message' => 'Thank you for your submission. Our Admins will review and approve shortly'
            ]);

        } else {
            $jsonResultResponse->setData([
                'result' => 'error',
                'message' => $message
            ]);    
        }

        return $jsonResultResponse;

        // $result = $this->resultJsonFactory->create();
        // if ($this->getRequest()->isAjax()) 
        // {
        //     $test=Array
        //     (
        //         'Firstname' => 'What is your firstname',
        //         'Email' => 'What is your emailId',
        //         'Lastname' => 'What is your lastname',
        //         'Country' => 'Your Country'
        //     );
        //     return $result->setData($test);
        // }
        
        // $responseData = $this->resultJsonFactory->create();
        // $resultJson = $this->resultPageFactory->create(ResultFactory::TYPE_JSON);
        // $resultJson->setData($responseData);
        // return $resultJson;

        // $post = (array) $this->getRequest()->getPost();
        // if (!empty($post)) {
        //     $content       = $post['content'];
        //     $author        = 'Trung';
        //     $post_id       = $post['post_id'];
        //     $creation_time = $post['creation_time'];
        //     $currentUrl = $this->_redirect->getRefererUrl();
        //     if(trim($content) == "") {
        //         $this->messageManager->addError(__("Please enter comment !."));
        //     } else {
        //         $comment = $this->_objectManager->create("OpenTechiz\Blog\Model\Comment");
        //         $comment->addData([
        //             "content"       => $content,
        //             "author"        => $author,
        //             "post_id"       => $post_id,
        //             "creation_time" => $creation_time

        //         ])->save();
        //         $this->messageManager->addSuccessMessage(__("Send Comment Success !"));
        //     }
            
        //     return $this->_redirect($currentUrl);
        
        // }
    }
}