<?php
include '../connect.php';
include 'auth.php';

if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['hasta_id']))
{

    $query = $pdo->prepare("SELECT * FROM hastalar h where h.hasta_id = :hasta_id");
    $query->bindParam(':hasta_id',$_GET['hasta_id']);
    $query->execute();

    if($query->rowCount() > 0)
    {
        $query = $pdo->prepare("DELETE FROM hastalar where hasta_id = :hasta_id");
        $query->bindParam(':hasta_id',$_GET['hasta_id']);
        $query->execute();
    }
    header("location: /daviva/hasta-takip-uygulamasi/hastalar.php");
}