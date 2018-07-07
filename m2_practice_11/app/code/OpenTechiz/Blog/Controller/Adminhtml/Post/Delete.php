<?php

namespace OpenTechiz\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;

class Delete extends Action
{
	public function execute()
	{
		$id = $this->getRequest()->getParam("id");
		if($id) {
			$model = $this->_objectManager->create("OpenTechiz\Blog\Model\Post");
			$model->load($id);
			if($model->getId()) {
				$model->delete();
				$this->messageManager->addSuccess(__("This has been delete"));
				return $this->_redirect("*/*/");
			}
			$this->messageManager->addSuccess(__("This post no longer exists"));
			return $this->_redirect("*/*/");

		} 

		$this->messageManager->addError(__("We can not find any id to delete"));
		return $this->_redirect("*/*/");
		
	}

}