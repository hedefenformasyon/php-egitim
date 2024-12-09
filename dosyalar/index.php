<?php

$file = fopen("test.txt","r");
if($file)
{
    //echo file_get_contents("test.txt");
    echo "<br>";
    while(($line = fgets($file)) !== false){
        echo $line."<br>";
    }
    fclose($file);
}
else
{
    echo "Dosya açılamadı";
}


echo "<br><br>";
//log dosyası işlemleri
if(file_exists("log.txt"))
{
    $file = fopen("log.txt","a");
    fwrite($file,"işlem yapıldı");
    fclose($file);

    echo "Dosya boyutu: ". filesize("log.txt")."<br>";
    echo "Dosya Türü: ". mime_content_type("log.txt")."<br>";
    echo "Dosya Değişiklik Tarihi: ". date("Y-m-d H:i:s",filemtime("log.txt"))."<br>";
}
else
{
    echo "Dosya bulunamadı.";
}