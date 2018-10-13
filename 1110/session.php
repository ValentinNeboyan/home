<?php



session_start();

$_SESSION['user']='John';

var_dump($_SESSION);

session_destroy();