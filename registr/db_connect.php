<?php
$link=mysqli_connect('localhost', 'root', '', 'homework')
or die("<p>Ошибка подключения к базе данных: " . mysqli_error($link) . "</p>");