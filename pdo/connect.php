<?php
try {
    $dsn = 'mysql:host=localhost;dbname=daviva_yayinevi';
    $username = 'root';
    $password = '';

    $pdo = new PDO($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    echo "Bağlantı başarılı<br>";
} catch (PDOException $e) {
    echo "Bağlantı hatası: ".$e->getMessage();
}