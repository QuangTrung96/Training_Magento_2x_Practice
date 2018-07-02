<?php

namespace App;

class Character
{
	protected $name;
	protected $atk;
	protected $rank;

	public function __construct($name, $atk) {
		$this->name = $name;
		$this->atk = $atk;
	}

	public function getName() {
		return $this->name;
	}

	public function getAtk() {
		return $this->atk;
	}

	public function getRank() {
		return $this->rank;
	}

}