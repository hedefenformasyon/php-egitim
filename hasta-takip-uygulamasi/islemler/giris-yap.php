<?php
session_start();
include '../connect.php';

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['eposta']) && isset($_POST['sifre']) && isset($_POST['token']) && $_SESSION['token'] == $_POST['token'])
{
    $query = $pdo->prepare("SELECT * FROM kullanicilar where eposta = :eposta and sifre = :sifre");
    $query->bindParam(':eposta',$_POST['eposta']);
    $query->bindParam(':sifre',$_POST['sifre']);
    $query->execute();

    if($query->rowCount() > 0)
    {
        $_SESSION['kullanici'] = $query->fetch()['kullanici_id'];
        header("location: /daviva/hasta-takip-uygulamasi/receteler.php");
        exit;
    }
    else
    {
        header("location: /daviva/hasta-takip-uygulamasi/giris-yap.php?hata=1");
        exit;
    }
}
