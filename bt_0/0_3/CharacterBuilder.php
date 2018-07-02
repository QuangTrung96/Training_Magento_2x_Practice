<?php
require_once 'CharacterFactory.php';
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

$c = new CharacterBuilder();
$c->register('Trịnh Quang Trung', '1996', 'Warrior');
echo 'Name: '.$c->getCharacter()->getName().'<br />';
echo 'Atk: '.$c->getCharacter()->getAtk().'<br />';
echo 'Rank: '.$c->getCharacter()->getRank().'<br />';

$c->register('Trịnh Quang Trung', '1996', 'Bishop');
echo 'Name: '.$c->getCharacter()->getName().'<br />';
echo 'Atk: '.$c->getCharacter()->getAtk().'<br />';
echo 'Rank: '.$c->getCharacter()->getRank().'<br />';

$c->register('Trịnh Quang Trung', '1996', 'Warriorrr');
echo 'Name: '.$c->getCharacter()->getName().'<br />';
echo 'Atk: '.$c->getCharacter()->getAtk().'<br />';
echo 'Rank: '.$c->getCharacter()->getRank();

