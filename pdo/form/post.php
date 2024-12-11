<?php
include '../connect.php';


if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['ad']) && isset($_POST['soyad']) && isset($_POST['tel']) && isset($_POST['age']))
{
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $tel = $_POST['tel'];
    $age = $_POST['age'];

    try {
        $query = $pdo->prepare("INSERT INTO users (name,surname,tel,age) VALUES(:ad,:soyad,:tel,:age)");

        $query->bindParam(":ad",$ad);
        $query->bindParam(":soyad",$soyad);
        $query->bindParam(":tel",$tel);
        $query->bindParam(":age",$age);

        $query->execute();

        header("location: /daviva/pdo/users.php");
        exit;
    } catch (PDOException $th) {
        echo "Kayıt başarısız ". $th->getMessage();
    }
}