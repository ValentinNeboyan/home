<?php
require_once 'app_config.php';


/*$link=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)
or die("<p>Ошибка подключения к базе данных: " . mysqli_error($link) . "</p>");*/

if (!$link=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)) {
    $user_error_message = "возникла проблема, связанная с " .
        "подключением к базе данных, " .
        "содержащей нужную информацию.";
    $system_error_message = mysqli_error($link);
    header("Location: ../scripts/show_error.php?" .
        "error_message={$user_error_message}&" .
        "system_error_message={$system_error_message}");
    exit();
}

//echo "<p>Вы подключились к MySQL!</p>";

//echo "<p>Вы подключены к MySQL с использованием базы данных " . DB_NAME . "!</p>";
