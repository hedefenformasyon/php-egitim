<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Değişken ve Veri Türleri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
        }

        ul {
            list-style: square;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Kullanıcı Bilgileri</h1>
        <?php
        // PHP değişkenlerini tanımlıyoruz
        $isim = "Ahmet"; // String veri türü
        $yas = 25; // Integer veri türü
        $aktifMi = true; // Boolean veri türü
        $hobiler = array("Kitap Okuma", "Bisiklet Sürme", "Yüzme"); // Array veri türü

        // PHP koduyla bilgileri ekrana yazdırıyoruz
        echo "<p><strong>Ad:</strong> $isim</p>";
        echo "<p><strong>Yaş:</strong> $yas</p>";
        // Boolean kontrolü
        if ($aktifMi) {
            echo "<p><strong>Durum:</strong> Aktif</p>";
        } else {
            echo "<p><strong>Durum:</strong> Pasif</p>";
        }
        // Hobi listesini yazdırıyoruz
        echo "<p><strong>Hobiler:</strong></p>";
        echo "<ul>";
        foreach ($hobiler as $hobi) {
            echo "<li>$hobi</li>";
        }
        echo "</ul>";
        ?>
    </div>
</body>

</html>