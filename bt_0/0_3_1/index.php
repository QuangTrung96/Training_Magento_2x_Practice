<?php
	
use App\CharacterBuilder;
require "vendor/autoload.php";

$c = new CharacterBuilder();
$c->register('Trịnh Quang Trung', '1996', 'Warrior');
echo 'Name: '.$c->getCharacter()->getName().'<br />';
echo 'Atk: '.$c->getCharacter()->getAtk().'<br />';
echo 'Rank: '.$c->getCharacter()->getRank().'<br />';

$c->register('Trịnh Công Sơn', '1939', 'Bishop');
echo 'Name: '.$c->getCharacter()->getName().'<br />';
echo 'Atk: '.$c->getCharacter()->getAtk().'<br />';
echo 'Rank: '.$c->getCharacter()->getRank().'<br />';

$c->register('Trịnh Quang Trung', '1996', 'Warriorrr');
echo 'Name: '.$c->getCharacter()->getName().'<br />';
echo 'Atk: '.$c->getCharacter()->getAtk().'<br />';
echo 'Rank: '.$c->getCharacter()->getRank().'<br />';

