<?php
$count=isset($_COOKIE['count']) ? $_COOKIE['count'] : 0;
$count++;

if ($_POST['name'] && $_POST['surname'] && $_POST['age']){
    $name=trim($_POST['name']);
    $surname=trim($_POST['surname']);
    $age=$_POST['age'];
}
setcookie("count", $count, time()+3600);
setcookie("name", $name, time()+60);
setcookie("surname", $surname, time()+60);
setcookie("age", $age, time()+20);
setcookie("some", 'text');
//header("Location: index2.php");


var_dump($_POST);
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
    <input type="text" name="name" placeholder="Введите имя">
    <input type="text" name="surname" placeholder="Введите фамилию">
    <input type="text" name="age" placeholder="Введите возраст">
    <input type="submit" value="Отправить">
</form>

<? if ($_COOKIE['name']&&$_COOKIE['surname']&&$_COOKIE['age']) : ?>
<d>
    <p>Привет <?=$_COOKIE['name']." ".$_COOKIE['surname'].". Тебе ".$_COOKIE['age']." лет."?></p>
</d>
<? else :?>
<d>
    <p>Привет <?=$_COOKIE['name']." ".$_COOKIE['surname']?>.</p>
</d>
<?endif;?>
<d>
    <p>Вы посещяли эту страницу <?=$_COOKIE['count']?></p>
</d>
</body>
</html>
