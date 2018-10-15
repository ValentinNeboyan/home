<?php
define("DEBUG_MODE", true);
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "homework");

function debug_print($message) {
    if (DEBUG_MODE) {
        echo $message;
    }
}

if (DEBUG_MODE) {
    error_reporting(E_ALL);
} else {
// Выключение выдачи отчетов об ошибках
    error_reporting(0);


}