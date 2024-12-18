<?php 
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reçete Ekle</title>
</head>
<body>
    <form action="islemler/recete_ekle.php" method="POST">
        <input type="text" name="no" placeholder="No">
        <input type="text" name="tur" placeholder="Tür">
        <input type="date" name="tarih" placeholder="Tarih">

        <select name="doktor_id" style="display:none;">
            <option value="">Seçiniz</option>
            <?php 
                $query = $pdo->prepare("SELECT * FROM doktorlar");
                $query->execute();
                $doktorlar = $query->fetchAll();
                foreach ($doktorlar as $key => $doktor) {
                    echo "<option value=\"{$doktor['doktor_id']}\">{$doktor['ad']}</option>";
                }
            ?>
        </select>

        <select name="klinik_id" style="display:none;">
            <option value="">Seçiniz</option>
            <?php 
                $query = $pdo->prepare("SELECT * FROM klinikler");
                $query->execute();
                $klinikler = $query->fetchAll();
                foreach ($klinikler as $key => $klinik) {
                    echo "<option value=\"{$klinik['klinik_id']}\">{$klinik['ad']}</option>";
                }
            ?>
        </select>


        <select name="ilac[1][id]">
            <option value="">Seçiniz</option>
            <?php 
                $query = $pdo->prepare("SELECT * FROM ilaclar");
                $query->execute();
                $ilaclar = $query->fetchAll();
                foreach ($ilaclar as $key => $ilac) {
                    echo "<option value=\"{$ilac['ilac_id']}\">{$ilac['ad']}</option>";
                }
            ?>
        </select>

        <input type="number" name="ilac[1][adet]" placeholder="İlac Adedi">


        <select name="ilac[2][id]">
            <option value="">Seçiniz</option>
            <?php 
                $query = $pdo->prepare("SELECT * FROM ilaclar");
                $query->execute();
                $ilaclar = $query->fetchAll();
                foreach ($ilaclar as $key => $ilac) {
                    echo "<option value=\"{$ilac['ilac_id']}\">{$ilac['ad']}</option>";
                }
            ?>
        </select>

        <input type="number" name="ilac[2][adet]" placeholder="İlac Adedi">

        <button type="submit"> Kaydet</button>
    </form>
</body>
</html>