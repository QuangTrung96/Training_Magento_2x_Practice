<?php

namespace App;

use App\CharacterFactory;

class CharacterBuilder
{
	protected $character;

	public function register($name, $atk, $rank) {
		$this->character = CharacterFactory::create($name, $atk, $rank);
	}

	public function getCharacter() {
		return $this->character;
	}

}


