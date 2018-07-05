<?php

namespace OpenTechiz\Blog\Block;

use OpenTechiz\Blog\Api\Data\CommentInterface;
use OpenTechiz\Blog\Model\ResourceModel\Comment\Collection as CommentCollection;

class CommentList extends \Magento\Framework\View\Element\Template
{

    protected $_request;
    protected $_commentCollectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \OpenTechiz\Blog\Model\ResourceModel\Comment\CollectionFactory $commentCollectionFactory,
        \Magento\Framework\App\RequestInterface $request,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_request = $request;
        $this->_commentCollectionFactory = $commentCollectionFactory;
    }

    public function getPostId() {
        $comment_id = $this->_request->getParam('post_id', false);
        return $comment_id;
    }

    public function getComments()
    {
        // Check if comments has already been defined
        // makes our block nice and re-usable! We could
        // pass the 'comments' data to this block, with a collection
        // that has been filtered differently!
        $post_id = $this->getPostId();
        if (!$this->hasData('comments')) {
            $comments = $this->_commentCollectionFactory
                ->create()
                ->addFilter('post_id', $post_id)
                ->addOrder(
                    CommentInterface::CREATION_TIME,
                    CommentCollection::SORT_ORDER_DESC
                );
            $this->setData('comments', $comments);
        }
        return $this->getData('comments');
    }
}
