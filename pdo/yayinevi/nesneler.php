<?php
include '../connect.php';

class YayinEvi {
    public $id;
    public $ad;

    public function __construct($id, $ad) {
        $this->id = $id;
        $this->ad = $ad;
    }
}

class Kitap {
    public $id;
    public $ad;
    public $yayinEviId;
    public $yayinEvi;

    public function __construct($id,$ad,$yayinEviId,$yayinEvi) {
        $this->id = $id;
        $this->ad = $ad;
        $this->yayinEviId = $yayinEviId;
        $this->yayinEvi = $yayinEvi;
    }
}

class KitapYonetim {
    public function yayinEviEkle($ad)
    {
        global $pdo;
        $query = $pdo->prepare("INSERT INTO yayinevleri (name) VALUES(:ad)");
        $query->bindParam(":ad",$ad);
        $query->execute();
        echo "Yayinevi eklendi: $ad <br>";
        return $pdo->lastInsertId();
    }
    public function kitapEkle($ad,$yayinEviId)
    {
        global $pdo;
        $query = $pdo->prepare("INSERT INTO kitaplar (name,yayin_evi_id ) VALUES(:ad,:yayinevi)");
        $query->bindParam(":ad",$ad);
        $query->bindParam(":yayinevi",$yayinEviId);
        $query->execute();
        echo "Kitap eklendi: $ad <br>";
        return $pdo->lastInsertId();
    }

    public function yayinEviListele()
    {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM yayinevleri");
        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC) ?? [];
        return array_map(function($row){
            return new YayinEvi($row['id'],$row['name']);
        },$data);
    }

    public function kitapListele()
    {
        global $pdo;
        $query = $pdo->prepare("SELECT k.id,k.name,k.yayin_evi_id,ye.name as yayinevi FROM kitaplar k JOIN yayinevleri ye ON ye.id = k.yayin_evi_id");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC) ?? [];
 
        return array_map(function($row){
            return new Kitap($row['id'],$row['name'],$row['yayin_evi_id'],$row['yayinevi']);
        },$data);
    }
}