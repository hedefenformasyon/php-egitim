<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başvuru Formu</title>
    <style>
        input,select{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="basvuru_post.php" method="POST">
        <input type="hidden" name="csrf_token" value="12345">
        <input type="text" name="ad" placeholder="Adınız"><br>
        <input type="text" name="soyad" placeholder="Soyadınız"><br>
        <input type="email" name="email" placeholder="Mail adresiniz"><br>
        <input type="text" name="tel" placeholder="Telefon Numaranız"><br>
        <input type="radio" name="cinsiyet" value="1"> Erkek
        <input type="radio" name="cinsiyet" value="2"> Kadın<br>
        <label for="askerlik">Askerlik Durumu</label>
        <select name="askerlik" id="askerlik">
            <option value="">Seçiniz</option>
            <option value="1">Yapıldı</option>
            <option value="2">Muaf</option>
            <option value="3">Tecilli</option>
        </select><br>
        <button type="submit">Gönder</button>
    </form>

    <?php 
        if(isset($_SESSION['hatalar']))
        {
            foreach ($_SESSION['hatalar'] as $hata) {
                echo "<p style='color:white; background-color:red; padding:5px 15px;'>$hata</p>";
            }
            unset($_SESSION['hatalar']); //oturum sıfırlandı
        }
    ?>
</body>
</html>