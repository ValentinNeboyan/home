<?php

require_once('bootstrap/autoload.php');

use App\Models\Asus;
use App\Models\MacBook;

$asus = new Asus();
$macbook = new MacBook();

$asus->identifyComputer();
//$macbook->identifyComputer();

