<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
</head>
<body>
<?php
require "connect.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $query = "INSERT INTO users1 (id, username, email, password) VALUES ( null ,'$username', '$email', '$password')";
    $result = $db->query($query)or die(mysqli_error($db));

    if ($result) {
        $smsg = "Регистрация прошла успешно";
    } else {
        $fsmsg = "Неудача";
    }
}
?>
<div class="container">
    <form action="" class="form-signin" method="post">
        <h2>Регистрация</h2>
        <? if (isset($smsg)) {?> <div class="alert alert-success" role="alert"> <?=$smsg ; ?> </div><?}?>
        <? if (isset($fsmsg)) {?> <div class="alert alert-danger" role="alert"> <?=$fsmsg ; ?> </div><?}?>
        <input type="text" name="username" placeholder="Введите имя" class="form-control" required>
        <input type="text" name="email" placeholder="Введите почту" class="form-control" required>
        <input type="password" name="password" placeholder="Введите пароль" class="form-control" required>
        <button class="btn btn-lg btn-primary btn-block">Регистрация</button>
        <a href="login.php" class="btn btn-lg btn-primary btn-block">Авторизация</a>
    </form>
</div>

</body>
</html>