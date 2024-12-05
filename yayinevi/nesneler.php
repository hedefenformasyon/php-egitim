<?php
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

    public function __construct($id,$ad,$yayinEviId) {
        $this->id = $id;
        $this->ad = $ad;
        $this->yayinEviId = $yayinEviId;
    }
}

class KitapYonetim {
    private $kitaplar = array();
    private $yayinevleri = array();

    public function yayinEviEkle($ad)
    {
        $id = count($this->yayinevleri) + 1;
        $this->yayinevleri[$id] = new YayinEvi($id,$ad);
        echo "Yayinevi eklendi: $ad <br>";
        return $id;
    }
    public function kitapEkle($ad,$yayinEviId)
    {
        $id = count($this->kitaplar) + 1;
        $this->kitaplar[$id] = new Kitap($id,$ad,$yayinEviId);
        echo "Kitap eklendi: $ad <br>";
        return $id;
    }
    public function yayinEviAdi($yayinEviId)
    {
        $data = $this->yayinevleri[$yayinEviId];
        return isset($data) ? $data->ad : "Yayın evi bulunamadı";
    }

    public function yayinEviListele()
    {
        return $this->yayinevleri;
    }

    public function kitapListele()
    {
        return $this->kitaplar;
    }
}