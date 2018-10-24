<?php
session_start();

require "connect.php";



if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users1 WHERE username='$username' and password='$password'";
    $result=$db->query($query) or die(mysqli_error($db));
    $count=mysqli_num_rows($result);

    if ($count==1){
        $_SESSION['username']=$username;
    }else{
        $fsmsg="Ошибка";
    }
    if (isset($_SESSION['username'])){

        echo "Привет ". $_SESSION['username']."! ";
        echo "Вы вошли. ";
        echo "<a href='logout.php' class='btn.btn-lg.btn-primary.btn-block'>Выход</a>";
    }


}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Авторизация</title>
</head>
<body>

<div class="container">
    <form action="" class="form-signin" method="post">
        <h2>Авторизация</h2>
        <input type="text" name="username" placeholder="Введите имя" class="form-control" required>
        <input type="password" name="password" placeholder="Введите пароль" class="form-control" required>
        <button class="btn btn-lg btn-primary btn-block">Авторизация</button>
        <a href="index.php" class="btn btn-lg btn-primary btn-block">Регистрация</a>
    </form>
</div>

</body>
</html>