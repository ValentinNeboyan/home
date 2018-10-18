<?php

$userinfo=[
    'username' => 'Valentin',
    'password' => '1111'
];

if ($_POST){
    $username=isset($_POST['username']) ? $_POST['username'] : NULL;
    $password=isset($_POST['password']) ? $_POST['password'] : NULL;
}/*elseif ($_COOKIE){
    $username=isset($_COOKIE['username']) ? $_COOKIE['username'] : NULL;
    $password=isset($_COOKIE['password']) ? $_COOKIE['password'] : NULL;
}*/ else{
    die ("Закрытая страница для просмотра!!!");
}

foreach ($userinfo as $k=>$v){

    $status=$$k===$v;
}

if ($status){
    if (isset($_POST['remember'])){
        setcookie("username", $username,time()+60*60*24*365);
        setcookie("password", $password, time()+60*60*24*365);
            }
            echo "Вход выполнен!";
    
}else{
    echo "Неудача";

}