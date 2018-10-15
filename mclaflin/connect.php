<?php
require_once 'scripts/app_config.php';
require_once 'scripts/database_connection.php';

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