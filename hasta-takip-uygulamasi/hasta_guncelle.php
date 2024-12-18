<?php 
include 'connect.php';

    if(isset($_GET['hasta_id']))
    {
        $hasta_id = $_GET['hasta_id'];

        $query = $pdo->prepare("SELECT * FROM hastalar h where h.hasta_id = :hasta_id");
        $query->bindParam(":hasta_id",$hasta_id);
        $query->execute();

        if($query->rowCount() > 0)
        {
            $hasta = $query->fetch();
        }
        else
        {
            echo "Kayıt yok.";
            exit;
        }
    }
    else
    {
        echo "Kayıt yok.";
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasta Güncelle</title>
</head>
<body>
    
    <form action="islemler/hasta_guncelle.php" method="POST">
        <input type="hidden" name="hasta_id" value="<?php echo $hasta['hasta_id'] ?>">
        <input type="text" name="ad" placeholder="Adı" value="<?php echo $hasta['ad'] ?>">
        <input type="text" name="soyad" placeholder="Soyad" value="<?php echo $hasta['soyad'] ?>">
        <input type="date" name="dogum_tarihi" placeholder="Doğum Tarihi" value="<?php echo $hasta['dogum_tarihi'] ?>">

        <select name="cinsiyet">
            <option value="">Seçiniz</option>
            <option value="1" <?php echo $hasta['cinsiyet'] == 1 ? 'selected' : '' ?>>Erkek</option>
            <option value="2" <?php echo $hasta['cinsiyet'] == 2 ? 'selected' : '' ?>>Kadın</option>
        </select>       

        <button type="submit"> Kaydet</button>
    </form>
</body>
</html>