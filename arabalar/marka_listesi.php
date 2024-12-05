<?php
session_start();
include 'nesneler.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markalar</title>
</head>
<body>
    <a href="/daviva/arabalar/marka_ekle.php" style="color:green;">Yeni Marka Ekle</a><br>
<?php
$yonetim = new AracYonetim();
$markalar = $yonetim->markaListele();
if (count($markalar) == 0) {
    echo 'Hiç marka yok!';
} else {
    ?>
<table>
        <thead>
            <tr>Id</tr>
            <tr>Ad</tr>
        </thead>
        <tbody>
            <?php
   
    foreach ($markalar as $marka) {
        echo '<tr>';
        echo "<td>{$marka->id}</td>";
        echo "<td>{$marka->ad}</td>";
        echo '</tr>';
    }
    ?>
        </tbody>
    </table>
        <?php
}
?>

<table>

</table>
</body>
</html>