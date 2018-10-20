<?php
require_once ('forms/LoginForm.php');
require_once ('forms/DB_class.php');
require_once ('forms/Password.php');
$db=new DB;
$msg="";
$form=new LoginForm($POST);

if ($POST){
    if($form->validate()){
        echo 'OK';
    }else{
        $msg = "Заполните все поля!";
    }
}

$username=$db->escape($form->getUsername());
$password=new Password($db->eccape($form->getPassword()));
$res= $db->query("SELECT * FROM usersReg WHERE username='{$username}' AND password='{$password}'");

if(!$res){
    $msg='Не найден такой пользователь';
     } else {
    $user=$res[0]['username'];
    Session ::set('user', $user);
    header('location: index.php&msg= Вы успешно вошли');

     }
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
    <input type="text" name="username" value="<?=$form->getUsername()?>" placeholder="Логин"><br>
    <input type="password" name="password" placeholder="Пароль"><br>
    <input type="submit" value="Отправить">

</form>

</body>
</html>