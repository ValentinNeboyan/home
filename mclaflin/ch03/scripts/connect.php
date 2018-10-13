<?php
require '../../scripts/app_config.php';


$link=mysqli_connect(DB_HOST,  DB_USERNAME, DB_PASSWORD, DB_NAME)
or die("<p>Ошибка подключения к базе данных: " .
    mysqli_error() . "</p>");
echo "<p>Вы подключились к MySQL!</p>";

$result = mysqli_query($link,"SHOW TABLES;");
if (!$result) {
    die("<p>Ошибка при выводе перечня таблиц: " . mysqli_error() . "</p>");
}
echo "<p>Таблицы, имеющиеся в базе данных:</p>";
echo "<ul>";
while ($row = mysqli_fetch_row($result)) {
    echo "<li>Таблица: {$row[0]}</li>";
}
echo "</ul>";
?>