<?php 
include 'connect.php';
include 'islemler/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hastalar</title>
    <style>
        table tr td, table th{
            border: 1px solid #e2e2e2;
            padding: 4px 8px;
            text-align: center;
        }
        a.button{
            background-color: green;
            color:white; padding: 4px 10px; margin-bottom: 5px; text-align:center; display:inline-block;
        }
    </style>
</head>
<body>
    <?php
    $query = $pdo->prepare("SELECT h.*, k.ad as klinik, DATEDIFF(now(),h.dogum_tarihi) / 365 as yas FROM hastalar h JOIN klinikler k ON k.klinik_id = h.klinik_id where h.klinik_id = :klinik_id");
    $query->bindParam(':klinik_id',$kullanici['klinik_id']);
    $query->execute();

    $hastalar = $query->fetchAll();

    //$pdo = null;
    ?>
    <a href="hasta_ekle.php" class="button">Hasta Ekle</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Ad Soyad</th>
                <th>Klinik</th>
                <th>Doğum Tarih</th>
                <th>Cinsiyet</th>
                <th>Yaş</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($hastalar as $hasta_key => $hasta) {

                $cinsiyet = '';
                if($hasta['cinsiyet'] == 1) $cinsiyet = 'Erkek';
                elseif($hasta['cinsiyet'] == 2) $cinsiyet = 'Kadın';
                echo "<tr>";
                echo "<td>{$hasta['hasta_id']}</td>";
                echo "<td>".($hasta['ad'].' '.$hasta['soyad'])."</td>";
                echo "<td>{$hasta['klinik']}</td>";
                echo "<td>{$hasta['dogum_tarihi']}</td>";
                echo "<td>{$cinsiyet}</td>";
                echo "<td>".(int)$hasta['yas']."</td>";
                echo '<td> <a href="hasta_guncelle.php?hasta_id='.$hasta['hasta_id'].'" class="button">Güncelle</a> <a href="islemler/hasta_sil.php?hasta_id='.$hasta['hasta_id'].'" class="button" style="background-color:red;">Sil</a></td>';
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>