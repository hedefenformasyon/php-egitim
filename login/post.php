<?php
session_start();

include 'auth_conf.php';

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    if($email == $auth_email && $password == $auth_password)
    {
        $_SESSION['user'] = json_encode(['email' => $email]);
        header("location: /daviva/login/index.php");
        exit;
    }
    else
    {
        header("location: /daviva/login/login.php?error=1");
        exit;
    }
}