<?php

namespace App;

class CharacterFactory
{
	public static function create($name, $atk, $rank) {
		$rankClass = "App\\".$rank.'Character';
		if(class_exists($rankClass)) {
			return new $rankClass($name, $atk);
		}
		die('Không tồn tại class này !!!');
	}

}