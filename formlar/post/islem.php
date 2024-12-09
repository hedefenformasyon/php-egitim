<?php

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $isim = $_POST['isim'];
    $yas = $_POST['yas'];

    echo "İsim ".htmlspecialchars($isim)."<br>";
    echo "Yaş ".htmlspecialchars($yas)."<br>";
}