<?php

namespace QTO\HelloWorld\Plugin;

class ExamplePlugin {

	public function beforeSetTitle(\QTO\HelloWorld\Controller\Index\Index $subject, $title)
	{
		$title = $title . " to ";
		echo __METHOD__ . "</br>";

		return [$title];
	}

	public function afterGetTitle(\QTO\HelloWorld\Controller\Index\Index $subject, $result)
	{

		echo __METHOD__ . "</br>";

		return '<h1>'. $result . 'Trung.com' .'</h1>';

	}


	public function aroundGetTitle(\QTO\HelloWorld\Controller\Index\Index $subject, callable $proceed)
	{

		echo __METHOD__ . " - Before proceed() </br>";
		 $result = $proceed();
		echo __METHOD__ . " - After proceed() </br>";


		return $result;
	}

}
