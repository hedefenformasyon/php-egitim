<?php
session_start();
include 'nesneler.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araba Ekle</title>
</head>
<body>
    <form action="/daviva/arabalar/araba_ekle_post.php" method="post">
        <input type="text" name="ad" placeholder="Ad">
        <input type="text" name="model" placeholder="Model">
        <input type="text" name="yil" placeholder="Yıl">
        <select name="markaId">
            <option value="">Seçiniz</option>
        <?php
        $yonetim = new AracYonetim();
        foreach ($yonetim->markaListele() as $key => $marka) {
            echo '<option value="'.($marka->id).'">'.($marka->ad).'</option>';
        }
        ?>
        </select>
        <button type="submit">Kaydet</button>
    </form>
</body>
</html>