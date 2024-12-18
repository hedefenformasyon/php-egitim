<?php
include '../connect.php';
include 'auth.php';

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['no']) && isset($_POST['tur']) && isset($_POST['tarih']))
{
    $no2 = $_POST['no'];
    $tur = $_POST['tur'];
    $tarih = $_POST['tarih'];
    $doktor_id = $kullanici['doktor_id'];
    $klinik_id = $kullanici['klinik_id'];

    $query = $pdo->prepare("INSERT INTO receteler (no,tur,tarih,doktor_id,klinik_id) VALUES('$no2','$tur','$tarih','$doktor_id','$klinik_id')");
    $query->execute();

    $recete_id = $pdo->lastInsertId();
    $ilaclar = $_POST['ilac'] ?? [];

    foreach ($ilaclar as $key => $ilac) {
        $query = $pdo->prepare("INSERT INTO recete_ilaclari (recete_id,ilac_id,adet) VALUES($recete_id,{$ilac['id']},{$ilac['adet']})");
        $query->execute();
    }

    header("location: /daviva/hasta-takip-uygulamasi/receteler.php");
    exit;
}