<?php

namespace OpenTechiz\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;

class Delete extends Action
{
	const ADMIN_RESOURCE = 'OpenTechiz_Blog::post_delete';
	
	public function execute()
	{
		$id = $this->getRequest()->getParam("id");
		if($id) {
			try {
				$model = $this->_objectManager->create("OpenTechiz\Blog\Model\Post");
				$model->load($id);
				$model->delete();
				$this->messageManager->addSuccess(__("This post has been delete"));
				return $this->_redirect("*/*/");

			} catch(\Exception $e) {
				$this->messageManager->addError($e->getMessage());
				return $this->_redirect("*/*/");
			}

		} 

		$this->messageManager->addError(__('We can\'t find a page to delete.'));
		return $this->_redirect("*/*/");
		
	}

}
