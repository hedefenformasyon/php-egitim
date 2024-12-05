<?php
session_start();
include 'nesneler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arabalar</title>
</head>
<body>
<a href="/daviva/arabalar/araba_ekle.php" style="color:green;">Yeni Araba Ekle</a><br>
    <?php
$yonetim = new AracYonetim();
$arabalar = $yonetim->arabaListele();
if (count($arabalar) == 0) {
    echo 'Hiç araba yok!';
} else {
    ?>
<table>
        <thead>
            <tr>Id</tr>
            <tr>Ad</tr>
            <tr>Marka</tr>
            <tr>Model</tr>
            <tr>Yıl</tr>
        </thead>
        <tbody>
            <?php
   
    foreach ($arabalar as $key => $araba) {
        echo '<tr>';
        echo "<td>{$araba->id}</td>";
        echo "<td>{$araba->ad}</td>";
        echo "<td>{$yonetim->markaAdi($araba->markaId)}</td>";
        echo "<td>{$araba->model}</td>";
        echo "<td>{$araba->yil}</td>";
        echo '</tr>';
    }
    ?>
        </tbody>
    </table>
        <?php
}
?>

</body>
</html>