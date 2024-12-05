<?php
session_start();
include 'nesneler.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marka Ekle</title>
</head>
<body>
    <form action="/daviva/arabalar/marka_ekle_post.php" method="post">
        <input type="text" name="ad" placeholder="Ad">
        <button type="submit">Kaydet</button>
    </form>
</body>
</html>