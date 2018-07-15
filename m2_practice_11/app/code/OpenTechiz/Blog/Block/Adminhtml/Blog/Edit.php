<?php

namespace OpenTechiz\Blog\Block\Adminhtml\Blog;

use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container
{
	protected function _construct(){
		$this->_blockGroup="OpenTechiz_Blog";
		$this->_controller="adminhtml_blog";
		$this->_objectId="id";
		parent::_construct();
	}

}