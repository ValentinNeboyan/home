<?php

spl_autoload_register(function($className) {
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

    if (file_exists($fileName)) {
        include(__DIR__ . '/../' . $fileName);

        if (class_exists($className)) {
            return true;
        }
    }

    return false;
});