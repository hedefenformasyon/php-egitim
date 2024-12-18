<?php
try {
    $dsn = 'mysql:host=localhost;dbname=daviva_hasta_takip';
    $username = 'root';
    $password = '';

    $pdo = new PDO($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

    $_SESSION['token'] = password_hash("123456", PASSWORD_DEFAULT);
    //echo 'Token -> '.$_SESSION['token'];

    
} catch (PDOException $e) {
    echo "Bağlantı hatası: ".$e->getMessage();
}