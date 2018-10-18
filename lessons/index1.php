<?php
session_start();
if ($_POST['name']){
    $_SESSION['name']=$_POST['name'];
}
if ($_SESSION['name']){
    echo "Приветствую на нашем сайте, ".$_SESSION['name'];
}
//session_unset();
//session_destroy();
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="name">
    <input type="submit" value="Отправить">
</form>

<a href="/user.php">Страница пользователя</a>


</body>
</html>