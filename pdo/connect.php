<?php
try {
    $dsn = 'mysql:host=localhost;dbname=daviva_pdo';
    $username = 'root';
    $password = '';

    $pdo = new PDO($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

    echo "Bağlantı başarılı<br>";
} catch (PDOException $e) {
    echo "Bağlantı hatası: ".$e->getMessage();
}