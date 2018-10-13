<?php
$user=[
    'name'='John Doe',
    'login'='johndoe'
    ];

setcookie('user', serialize($user));
//setcookie('user', 'dshfkjfdh', time()+60*60*1000);

var_dump($_COOKIE['user']);

