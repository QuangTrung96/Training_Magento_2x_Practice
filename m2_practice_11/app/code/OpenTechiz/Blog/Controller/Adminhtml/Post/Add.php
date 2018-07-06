<?php

namespace OpenTechiz\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;

class Add extends Action
{
	
    public function execute()
    {
        return $this->_forward("edit");
    }

}
