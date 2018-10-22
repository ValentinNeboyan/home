<?php
require '../scripts/app_config.php';
error_reporting(E_ALL);
echo "Привет, {$first_name}\n\n";
$query = "SELECT * FROM users WHERE first_name = {$first_name}";
echo "{$query}\n\n";
?>