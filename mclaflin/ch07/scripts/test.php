<?php
echo "Корневой каталог ".$_SERVER['DOCUMENT_ROOT'];
$image_sample_path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/1312128274-james_roday.jpg";

$web_image_path=str_replace($_SERVER['DOCUMENT_ROOT'], '',$image_sample_path );
echo "<br>";
echo $web_image_path;