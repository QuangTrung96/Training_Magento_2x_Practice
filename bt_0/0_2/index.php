<?php

use App\models\Muser;
require "vendor/autoload.php";
$user = new Muser();
$user->insertUser();