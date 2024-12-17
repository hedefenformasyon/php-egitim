<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reçeteler</title>
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
    $query = $pdo->prepare("SELECT r.*,d.ad as doktor FROM receteler r JOIN doktorlar d ON r.doktor_id = d.doktor_id");
    $query->execute();

    $receteler = $query->fetchAll();

    //$pdo = null;
    ?>
    <a href="recete_ekle.php">Reçete Ekle</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tür</th>
                <th>Tarih</th>
                <th>Doktor</th>
                <th>İlaçlar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($receteler as $recete_key => $recete) {
                echo "<tr>";
                echo "<td>{$recete['recete_id']}</td>";
                echo "<td>{$recete['tur']}</td>";
                echo "<td>{$recete['tarih']}</td>";
                echo "<td>{$recete['doktor']}</td>";
                echo "<td>{$recete['ilaclar']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>