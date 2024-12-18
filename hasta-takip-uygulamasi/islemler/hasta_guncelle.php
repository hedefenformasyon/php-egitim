<?php
include '../connect.php';
include 'auth.php';

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['ad']) && isset($_POST['soyad']) && isset($_POST['dogum_tarihi']) && isset($_POST['cinsiyet']))
{
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $dogum_tarihi = $_POST['dogum_tarihi'];
    $cinsiyet = $_POST['cinsiyet'];

    $query = $pdo->prepare("SELECT * FROM hastalar h where h.hasta_id = :hasta_id");
    $query->bindParam(":hasta_id",$_POST['hasta_id']);
    $query->execute();

    if($query->rowCount() > 0)
    {
        $query = $pdo->prepare("UPDATE hastalar SET ad = :ad, soyad = :soyad, dogum_tarihi = :dogum_tarihi, cinsiyet = :cinsiyet where hasta_id = :hasta_id");
        $query->bindParam(':ad',$ad);
        $query->bindParam(':soyad',$soyad);
        $query->bindParam(':dogum_tarihi',$dogum_tarihi);
        $query->bindParam(':cinsiyet',$cinsiyet);
        $query->bindParam(':hasta_id',$_POST['hasta_id']);
        $query->execute();
    }
    
    header("location: /daviva/hasta-takip-uygulamasi/hastalar.php");
    exit;
}