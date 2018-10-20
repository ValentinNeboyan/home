<?php
session_start();
require_once 'forms/Session.php';
Session::destroy();
header('location: index.php?msg=Вы успешно вошли');

