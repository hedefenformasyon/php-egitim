<?php

$meyveler = ["Elma", "Armut", "Çilek", "Muz"];

$meyveler[] = "Karpuz";

foreach ($meyveler as $meyve) {
    echo $meyve . " <br>";
}

echo "<br><br>";
array_push($meyveler, "Ananas");

foreach ($meyveler as $meyve) {
    echo $meyve . " <br>";
}

echo "<br><br>";

array_pop($meyveler);
foreach ($meyveler as $meyve) {
    echo $meyve . " <br>";
}

$agaclar = ["Çam", "Çınar"];
echo "<br><br>";
$birlesim = array_merge($meyveler, $agaclar);

foreach ($birlesim as $item) {
    echo $item . " <br>";
}

echo "<br><br>";
$keys = array_keys($meyveler);
foreach ($keys as $key) {
    echo $key . " <br>";
}

echo "<br><br>";
$values = array_values(array_merge($meyveler, $agaclar));
foreach ($values as $value) {
    echo $value . " <br>";
}

echo "<br><br>";
$renkler = ["Bir" => "kırmızı", "İki" => "Mavi", "Üç" => "Yeşil"];
$anahtarlar = array_keys($renkler);
$degerler = array_values($renkler);
print_r($anahtarlar);
echo "<br>";
print_r($degerler);



echo "<br><br>";
$personel = [
    'isim'      => "Mehmet",
    'departman' => "IT",
    'yas'       => 30,
];
foreach ($personel as $anahtar => $deger) {
    echo "$anahtar: $deger<br>";
}
