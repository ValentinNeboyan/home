<?php
require_once 'forms/Session.php';

if (Session::has('user')){
echo "Привет ". Session::get('user');
}else {
    echo "Закрытая страница. Убирайтесь";
}