<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        header('location: /daviva/login/index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Ekranı</title>
</head>
<body>
    <form action="/daviva/login/post.php" method="post">
    <input type="email" name="email" require placeholder="Email">
    <input type="password" name="password" require placeholder="Parola">
    <button type="submit">Giriş Yap</button>

    <?php
    if(isset($_GET['error']) && $_GET['error'] == 1)
    {
        echo '<span style="color:red;">Hatalı kullanıcı adı veya şifre.</span>';
    }
    ?>
    </form>
</body>
</html>