<?php 
include 'connect.php';
include 'islemler/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
</head>
<body>
    <form action="islemler/giris-yap.php" method="POST">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" >
        <input type="text" name="eposta" placeholder="Eposta" required>
        <input type="password" name="sifre" placeholder="****" required>
        <button type="submit">Giriş Yap</button>
        <?php 
        if(isset($_GET['hata']) && $_GET['hata'] == 1)
        {
            echo '<span style="color:red;">Eposta veya şifre hatalı.</span>';
        }
        ?>
    </form>
</body>
</html>