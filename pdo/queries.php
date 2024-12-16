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
    /*$query = $pdo->prepare("UPDATE users SET name= 'Misafir' WHERE age > 35");
    $query->execute();*/


    $stmt = $pdo->prepare("SELECT * FROM users where id = :id");
    $stmt->bindValue(':id',1,PDO::PARAM_INT);
    $stmt->execute([':id' => 1]);

    $user = $stmt->fetch();
    print_r($user);
} catch (PDOException $th) {
    echo "Hata : ". $th->getMessage();
}