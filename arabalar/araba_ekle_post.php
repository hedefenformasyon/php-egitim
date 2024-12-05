<?php
session_start();
include 'nesneler.php';

if(isset($_POST['ad']) && isset($_POST['model']) && isset($_POST['yil']) && isset($_POST['markaId']))
{
    $yonetim = new AracYonetim();
    $yonetim->arabaEkle($_POST['ad'],$_POST['model'],$_POST['yil'],$_POST['markaId']);
    header('location: /daviva/arabalar/araba_listesi.php');
    exit;
}