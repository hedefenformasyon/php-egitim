<?php
include 'nesneler.php';


$yonetim = new KitapYonetim();

try {
    $yayinevi1 = $yonetim->yayinEviEkle("Yayın Evi 1");
    $yayinevi2 = $yonetim->yayinEviEkle("Yayin Evi 2");

    $kitap1 = $yonetim->kitapEkle("Kitap 1",$yayinevi1);
    $kitap2 = $yonetim->kitapEkle("Kitap 2",$yayinevi2);
} catch (PDOException $th) {
    echo "Hata ". $th->getMessage();
}


echo "<h1>Yayınevleri: </h1>";
foreach ($yonetim->yayinEviListele() as $yayinevi) {
    echo "ID: {$yayinevi->id} Ad: {$yayinevi->ad} <br>";
}

echo "<h1>Kitaplar</h1>";
foreach ($yonetim->kitapListele() as $kitap) {
    echo "ID: {$kitap->id} Ad: {$kitap->ad}, YayınEvi Ad: {$kitap->yayinEvi} <br>";
}