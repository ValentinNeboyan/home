<?php
require '../../scripts/database_connection.php';

$query_text = $_REQUEST['query'];
$result = mysqli_query($link, $query_text);
if (!$result) {
    die("<p>Ошибка при выполнении SQL-запроса" . $query_text . ": " . mysqli_error($link) . "</p>");
}
$return_rows = false;
$uppercase_query_text = strtoupper($query_text);
$location = strpos($uppercase_query_text, "CREATE");
if ($location === false) {
    $location = strpos($uppercase_query_text, "INSERT");
    if ($location === false) {
        $location = strpos($uppercase_query_text, "UPDATE");
        if ($location === false) {
            $location = strpos($uppercase_query_text, "DELETE");
            if ($location === false) {
                $location = strpos($uppercase_query_text, "DROP");
                if ($location === false) {
// Если выполнение кода добралось до этого места,
// значит этот запрос не CREATE, INSERT, UPDATE, DELETE
// или DROP. Он должен вернуть строки.
                    $return_rows = true;
                }
            }
        }
    }
}
if ($return_rows) {
// имеются строки для показа в качестве результата запроса
    echo "<p>Результаты вашего запроса:</p>";
    echo "<ul>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<li>{$row[0]}</li>";
    }
    echo "</ul>";
} else {

// Строки отсутствуют. Вывод простого отчета о том,
// работал запрос или нет.
    echo "<p>Следующий запрос был обработан успешно:</p>";
echo "<p>{$query_text}</p>";
}

?>
