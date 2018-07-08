<?php

namespace OpenTechiz\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;

class Add extends Action
{
	const ADMIN_RESOURCE = 'OpenTechiz_Blog::save';
	
    public function execute()
    {
        return $this->_forward("edit");
    }

}
