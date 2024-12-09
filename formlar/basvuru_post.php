<?php
session_start();
if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] != "12345") {
    exit;
}

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $ad = $_POST['ad'] ?? '';
    $soyad = $_POST['soyad'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $cinsiyet = $_POST['cinsiyet'] ?? '';
    $askerlik = $_POST['askerlik'] ?? '';

    $hatalar = [];

    if(strlen($ad) < 3 || strlen($ad) > 16)
    {
        $hatalar[] ="Adınız 3 - 16 karakter uzunluğunda olmalıdır.<br>";
    }
    if(strlen($soyad) < 2 || strlen($soyad) > 16)
    {
        $hatalar[] = "Soyadınız 2 - 16 karakter uzunluğunda olmalıdır.<br>";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $hatalar[] = "Geçersiz E-Posta adresi. <br>";
    }
    if(strlen($tel) != 11)
    {
        $hatalar[] = "Telefon numaranız 11 karakterli olmalı. <br>";
    }
    if(empty($cinsiyet))
    {
        $hatalar[] = "Cinsiyetinizi seçiniz. <br>";
    }

    if(!empty($hatalar))
    {
        /*
        echo '<div style="color:red;">';
        foreach ($hatalar as $hata) {
            echo " Hata -> $hata <br>";
        }
        echo '</div>';
        */
        $_SESSION['hatalar'] = $hatalar;
        header('location: basvuru.php');
        exit;
    }
    else{
        //echo "İşlem başarılı";
        $_SESSION['veriler'] = [
            'ad' => $ad,
            'soyad' => $soyad,
            'email' => $email,
            'tel' => $tel,
            'cinsiyet' => $cinsiyet,
            'askerlik' => $askerlik,
        ];

        $basvuru_text = "Yeni Başvuru:";
        $basvuru_text .= "Ad: $ad\n";
        $basvuru_text .= "Soyad: $soyad\n";
        $basvuru_text .= "Email: $email\n";
        $basvuru_text .= "Telefon: $tel\n";
        $basvuru_text .= "----------------\n";

        $dosya = fopen("basvurular.txt","a");
        fwrite($dosya,$basvuru_text);
        fclose($dosya);
        header('location: basarili.php');
        exit;
    }
}