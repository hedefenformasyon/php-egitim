<?php
include 'connect.php';


try {
    /* INSERT
    $query = $pdo->prepare("INSERT INTO users (name,surname,tel,age) VALUES

        ('Ahmet','Doğru','05485467841','50'),
        ('Kerem','Sever','05351423161','35')
    ");
    $query->execute();*/

    //update
    $query = $pdo->prepare("UPDATE users SET name= 'Misafir' WHERE age > 35");
    $query->execute();
    echo "İşlem başarılı<br>";
} catch (PDOException $th) {
    echo "Hata : ". $th->getMessage();
}