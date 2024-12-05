<?php
class Araba
{
    public $marka = ["toyota","honda","bmw"];
    public $model = ["corolla","civic","520"];
    public $yil = [2020,2023,2024];
}
$araba = new Araba();

foreach ($araba as $ozellik => $deger) {
    echo "$ozellik: ".implode(",",$deger)."<br>";
}

?>