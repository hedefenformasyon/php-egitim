<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doktorlar</title>
    <style>
        table tr td, table th{
            border: 1px solid #e2e2e2;
            padding: 4px 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    $query = $pdo->prepare("SELECT d.*,k.ad as klinik FROM doktorlar d JOIN klinikler k ON d.klinik_id = k.klinik_id");
    $query->execute();

    $doktorlar = $query->fetchAll();

    //$pdo = null;
    ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Ad</th>
                <th>Soyad</th>
                <th>Başlık</th>
                <th>Klinik</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($doktorlar as $doktor_key => $doktor) {
                echo "<tr>";
                echo "<td>{$doktor['doktor_id']}</td>";
                echo "<td>{$doktor['ad']}</td>";
                echo "<td>{$doktor['soyad']}</td>";
                echo "<td>{$doktor['title']}</td>";
                echo "<td>{$doktor['klinik']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>