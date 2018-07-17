<?php

namespace OpenTechiz\Blog\Block\Index;

use OpenTechiz\Blog\Api\Data\PostInterface;
use OpenTechiz\Blog\Model\ResourceModel\Post\Collection as PostCollection;

class Index extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{

    protected $_postCollectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \OpenTechiz\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_postCollectionFactory = $postCollectionFactory;
    }

    public function getPosts()
    {
        // Check if posts has already been defined
        // makes our block nice and re-usable! We could
        // pass the 'posts' data to this block, with a collection
        // that has been filtered differently!
        // $tags = $this->getCacheTags();
        // print_r($tags);
        // die('123');

        if (!$this->hasData('posts')) {
            $posts = $this->_postCollectionFactory
                ->create()
                ->addFilter('is_active', 1)
                ->addOrder(
                    PostInterface::CREATION_TIME,
                    PostCollection::SORT_ORDER_DESC
                );
            $this->setData('posts', $posts);
        }
        return $this->getData('posts');
    }

    public function getIdentities()
    {
        $identities = [];
        $posts = $this->getPosts();
        foreach ($posts as $post) {
            $identities = array_merge($identities, $post->getIdentities());
        }
        $identities[] = \OpenTechiz\Blog\Model\Post::CACHE_TAG . '_' . 'blog_post';
        return $identities;

    }
}
