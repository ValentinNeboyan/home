<?php

use App\Router;

require_once (__DIR__ . '/bootstrap/autoload.php');
$routes = require_once (__DIR__ . '/routes/web.php');

(new Router($routes))->get('/about', ['template' => 'page']);