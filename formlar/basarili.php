<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başarılı</title>
</head>
<body>
    <h1>İşlem başarıyla tamamlandı</h1>
    <?php
        if(isset($_SESSION['veriler']))
        {
            foreach ($_SESSION['veriler'] as $key => $veri) {
                echo "$key: ".htmlspecialchars($veri)." <br>";
            }
            unset($_SESSION['veriler']);
        }
    ?>
</body>
</html>