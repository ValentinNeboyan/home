<?php
declare(strict_types=1);

define('PUBLIC_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/public');

$template = isset($_GET['page']) ? $_GET['page'] : 'home';

if (!file_exists(__DIR__ . "/templates/{$template}.php")) {
    $template = '404';
}

require_once(__DIR__ . "/templates/{$template}.php");