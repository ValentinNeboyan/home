<?php
require 'app_config.php';
$link=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)
or die("<p>Ошибка подключения к базе данных: " .
    /* mysqli_error() .*/ "</p>");
//echo "<p>Вы подключились к MySQL!</p>";

//echo "<p>Вы подключены к MySQL с использованием базы данных " . DB_NAME . "!</p>";
