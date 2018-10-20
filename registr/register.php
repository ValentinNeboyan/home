<?php
require_once ('forms/RegistrationFormClass.php');

$msg='';
$form= new RegistrationForm($_POST);

if ($_POST){
    if ($form->validate()){
        echo "OK";
    }else{
        $msg=$form->passwordMatch() ? "Пожалуйста заполните поля!" : "Пароли не совпадают!";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
<h1>Регистрация нового пользователя</h1>

<b><?=$msg; ?></b>

<br/>

<form action="" method="post">
    <input type="email" name="email" value="<?=$form->getEmail(); ?>" placeholder="Введите email" ><br><br>
    <input type="text" name="username" value="<?=$form->getUsername(); ?>" placeholder="Имя пользователя"><br><br>
    <input type="password" name="password" placeholder="Пароль"> <br><br>
    <input type="password" name="passwordConfirm" placeholder="Повторите пароль"><br><br>
    <input type="submit" value="Отправить">

</form>

</body>
</html>
<?php
//require_once 'forms/Password.php';
require_once 'forms/DB_class.php';

$db= new DB;


if ($form->validate()) {
    $email = $db->escape($form->getEmail());
    $username = $db->escape($form->getUsername());
    $password =/* new Password(*/ $db->escape($form->getPassword())/* )*/;

    $res = $db->query("SELECT * FROM usersReg WHERE username = '{$username}'");
    if ($res) {
        $msg = 'Such user already exists!';
    } else {
        $db->query("INSERT INTO usersReg (email, username, password) VALUES ('{$email}','{$username}','{$password}')");
        //header('location: index.php?msg=You have been registered');
    }
}
?>