<?php

function selamla($isim = "Misafir",$soyisim = "Soyad")
{
    echo "Merhaba, $isim $soyisim!";
}

//selamla("Enes","Taşdemir");
selamla("Test");


function satirAtla(){
    echo "<br><br>";
}

satirAtla();

function faktoriyel($sayi){
    if($sayi <= 1)
    {
        return 1;
    }
    return $sayi * faktoriyel($sayi -1);
}

echo faktoriyel(2);


satirAtla();
function kareAl(int $sayi) : int {
    return $sayi * $sayi;
}

echo kareAl(4);

satirAtla();
echo substr("Merhaba Dünya!",8,4);

satirAtla();
//array diff methodu
$meyveler = ["Elma", "Armut", "Çilek","Muz"];
$meyveler2 = ["Elma", "Armut",  "Karpuz"];

$farklar = array_diff($meyveler,$meyveler2);

foreach ($farklar as $fark ) {
    echo $fark. " <br>";
}

//array unique
satirAtla();

$dizi = ["ahmet","ali","ayşe","ali"];
function temizle($item){
    return array_unique($item);
}

$degerler = temizle($dizi);

foreach ($degerler as $deger) {
    echo $deger. "<br>";
}


satirAtla();

echo ceil(3.4);

satirAtla();
$sayilar = [1,2,3,4,5,6,7,8,9,10];

echo "En Büyük ".max($sayilar). " <br>";
echo "En Küçük ".min($sayilar);


satirAtla();

print_r(getdate());