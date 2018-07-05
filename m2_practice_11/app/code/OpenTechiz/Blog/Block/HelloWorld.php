<?php

namespace OpenTechiz\Blog\Block;

class Helloworld extends \Magento\Framework\View\Element\Template
{

	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
   	}

    public function getHelloWorldTxt()
    {
        return 'Hello world!';

    }

}