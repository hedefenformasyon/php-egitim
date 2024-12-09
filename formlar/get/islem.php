<?php

if($_SERVER['REQUEST_METHOD'] === "GET")
{
    $isim = $_GET['isim'];
    $yas = $_GET['yas'];

    echo "İsim ".htmlspecialchars($isim)."<br>";
    echo "Yaş ".htmlspecialchars($yas)."<br>";
}