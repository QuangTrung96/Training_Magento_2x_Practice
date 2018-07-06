<?php

namespace OpenTechiz\Blog\Controller\Comment;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;


class Add extends Action
{

    public function execute()
    {
        $post = (array) $this->getRequest()->getPost();
        if (!empty($post)) {
            $content       = $post['content'];
            $author        = 'Trung';
            $post_id       = $post['post_id'];
            $creation_time = $post['creation_time'];
            $currentUrl = $this->_redirect->getRefererUrl();
            if(trim($content) == "") {
                $this->messageManager->addError(__("Please enter comment !."));
            } else {
                $comment = $this->_objectManager->create("OpenTechiz\Blog\Model\Comment");
                $comment->addData([
                    "content"       => $content,
                    "author"        => $author,
                    "post_id"       => $post_id,
                    "creation_time" => $creation_time

                ])->save();
                $this->messageManager->addSuccessMessage(__("Send Comment Success !"));
            }
            
            return $this->_redirect($currentUrl);
        
        }
    }
}