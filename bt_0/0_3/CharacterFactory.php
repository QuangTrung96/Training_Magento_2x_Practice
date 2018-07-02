<?php
require_once 'BishopCharacter.php';
require_once 'WarriorCharacter.php';
class CharacterFactory
{
	public static function create($name, $atk, $rank) {
		$rankClass = $rank.'Character';
		if(class_exists($rankClass)) {
			return new $rankClass($name, $atk);
		}
		die('Không tồn tại class này !!!');
	}

}