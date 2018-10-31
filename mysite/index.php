<?php

/*$string='25-10-2018';

$pattern='/((0-9){2}-(0-9){2}-(0-9){4})/';

$replace='Год $3, месяц $2, день $1';

 echo $date=preg_replace($pattern, $replace, $string);*/

//FRONT CONTROLLER

//1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);


//2. Подключение файлов системы

define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Router.php');
require_once ROOT.'/components/DB.php';

//3. Установка соединения с БД


//4. Вызов Router

$router=new Router();
$router->run();