<?php 
include 'connect.php';
include 'islemler/auth.php';
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
    $query = $pdo->prepare("SELECT r.*,CONCAT(d.ad,' ',d.soyad) as doktor, k.ad as klinik, CONCAT(h.ad,' ',h.soyad) as hasta FROM receteler r 
        JOIN doktorlar d ON r.doktor_id = d.doktor_id
        JOIN klinikler k ON k.klinik_id = r.klinik_id
        JOIN hastalar h ON h.hasta_id = r.hasta_id
    ");
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
                <th>Klinik</th>
                <th>Doktor</th>
                <th>Hasta</th>
                <th>İlaçlar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($receteler as $recete_key => $recete) {

                $query = $pdo->prepare("SELECT ri.*, i.ad as ilac FROM recete_ilaclari ri JOIN  ilaclar i ON i.ilac_id = ri.ilac_id where ri.recete_id = {$recete['recete_id']}");
                $query->execute();
                $recete_ilaclar = $query->fetchAll();

                $new_array = [];
                foreach ($recete_ilaclar as $key => $recete_ilac) {
                    $new_array[] = $recete_ilac['ilac']. " ({$recete_ilac['adet']})";
                }
                echo "<tr>";
                echo "<td>{$recete['recete_id']}</td>";
                echo "<td>{$recete['tur']}</td>";
                echo "<td>{$recete['tarih']}</td>";
                echo "<td>{$recete['klinik']}</td>";
                echo "<td>{$recete['doktor']}</td>";
                echo "<td>{$recete['hasta']}</td>";
                echo "<td>".implode(", ",$new_array)."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>