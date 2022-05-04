<?php
session_start();
require('../helpers.php');
$_SESSION=[];
$isAuth = false;
$user_active=null;
$page = include_template('index.php', [
    'user_active' => $user_active,
    'isAuth' => $isAuth
]);

print($page);
header('Location:/');


