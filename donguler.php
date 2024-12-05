<?php
for ($i=1; $i <= 10; $i++) { 
    if($i == 5)
    {
        break;
    }
    echo "Değişken değeriniz: " . $i . "<br>";
}


echo "<br><br>";

for ($i=1; $i <= 10; $i++) { 
    if($i == 5)
    {
        continue;
    }
    echo "Değişken değeriniz: " . $i . "<br>";
}


?>