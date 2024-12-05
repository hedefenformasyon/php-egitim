<?php
session_start();
include 'nesneler.php';

if(isset($_POST['ad']))
{
    $yonetim = new AracYonetim();
    $yonetim->markaEkle($_POST['ad']);
    header('location: /daviva/arabalar/marka_listesi.php');
    exit;
}