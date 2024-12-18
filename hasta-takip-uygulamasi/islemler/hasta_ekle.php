<?php
include '../connect.php';
include 'auth.php';

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['ad']) && isset($_POST['soyad']) && isset($_POST['dogum_tarihi']) && isset($_POST['cinsiyet']))
{
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $dogum_tarihi = $_POST['dogum_tarihi'];
    $cinsiyet = $_POST['cinsiyet'];
    $klinik_id = $kullanici['klinik_id'];

    $query = $pdo->prepare("INSERT INTO hastalar (ad,soyad,dogum_tarihi,cinsiyet,klinik_id) VALUES('$ad','$soyad','$dogum_tarihi','$cinsiyet','$klinik_id')");
    $query->execute();

    header("location: /daviva/hasta-takip-uygulamasi/hastalar.php");
    exit;
}