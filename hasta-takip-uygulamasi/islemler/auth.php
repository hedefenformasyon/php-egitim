<?php
session_start();

if(!isset($_SESSION['kullanici']))
{
    header("location: /daviva/hasta-takip-uygulamasi/giris-yap.php");
    exit;
}


$kullanici_id = $_SESSION['kullanici'];

$query = $pdo->prepare("SELECT k.*,d.klinik_id FROM kullanicilar k JOIN doktorlar d ON d.doktor_id = k.doktor_id where k.kullanici_id = :id");
$query->bindParam(':id',$kullanici_id);
$query->execute();

$kullanici = $query->fetch();