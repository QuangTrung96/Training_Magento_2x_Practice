<?php

namespace OpenTechiz\Blog\Block\Adminhtml\Blog\Edit;

use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use OpenTechiz\Blog\Model\Config\IsActive;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Form\Generic;

class Form extends Generic
{

	protected $_formFactory;
	protected $_postIsActive;
	protected $_coreRegistry;

	public function __construct(
        Context $context,
        Registry $registry,
        IsActive $postIsActive,
        FormFactory $formFactory,
        array $data = []
    ) {
		$this->_coreRegistry = $registry;
		$this->_formFactory = $formFactory;
		$this->_postIsActive = $postIsActive;
		parent::__construct($context, $registry, $formFactory, $data);
	}
	protected function _prepareForm() {
		$model = $this->_coreRegistry->registry("post");
		$form=$this->_formFactory->create(
				[
					"data" => [
						"id" => "edit_form",
						"action" => $this->getData("action"), 
						"method" => "post"
					]
				]
			);

		$fieldset=$form->addFieldset(
				"base_fieldset",
				["legend"=>__("General Information"),"class"=>"fieldset-wide"]
			);

		if($model->getId()){
			$fieldset->addField(
					"post_id",
					"hidden",
					["name" => "post_id"]
				);
		}

		$fieldset->addField(
				"url_key",
				"text",
				[
					"name" => "url_key",
					"label" => __("Url Key"),
					"required" => false,
				]
			);

		$fieldset->addField(
				"title",
				"text",
				[
					"name" => "title",
					"label" => __("Title"),
					"required" => true,
				]
			);

		$fieldset->addField(
				"content",
				"editor",
				[
					"name" => "content",
					"label" => __("Content"),
					"style" => "height:36em",
					"required" => true,
				]
			);	

		$fieldset->addField(
				"is_active",
				"select",
				[
					"name" => "is_active",
					"label" => __("Status"),
					"required" => true,
					"options" => $this->_postIsActive->toOptionArray()
				]
			);
		$data = $model->getData();
		$form->setValues($data);
		$form->setHtmlIdPrefix("blog_main_");	
		$form->setUseContainer(true);
		$this->setForm($form);
		return parent::_prepareForm();
	}
	
}