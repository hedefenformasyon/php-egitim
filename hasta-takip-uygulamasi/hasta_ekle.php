<?php 
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasta Ekle</title>
</head>
<body>
    <form action="islemler/hasta_ekle.php" method="POST">
        <input type="text" name="ad" placeholder="Adı">
        <input type="text" name="soyad" placeholder="Soyad">
        <input type="date" name="dogum_tarihi" placeholder="Doğum Tarihi">

        <select name="cinsiyet">
            <option value="">Seçiniz</option>
            <option value="1">Erkek</option>
            <option value="2">Kadın</option>
        </select>       

        <button type="submit"> Kaydet</button>
    </form>
</body>
</html>