<?php

class Marka{
    public $id;
    public $ad;

    public function __construct($id,$ad) {
        $this->id = $id;
        $this->ad = $ad;
    }
}

class Araba {
    public $id;
    public $ad;
    public $model;
    public $yil;
    public $markaId;

    public function __construct($id,$ad,$model,$yil,$markaId) {
        $this->id = $id;
        $this->ad = $ad;
        $this->model = $model;
        $this->yil = $yil;
        $this->markaId = $markaId;
    }
}

class AracYonetim{
    private $markalar = [];
    private $arabalar = [];
    public function __construct() {
        //array_map methodu ile bir array yapısının her elemanını tek tek dönerek nesneye çeviriyoruz
        $this->markalar = array_map(function ($item) {
            return new Marka($item['id'], $item['ad']); // sessiondan gelen her bir veri $item içerisinde geldiği için bunların id,ad bilgilerine ulaşabiliriz
        }, $_SESSION['markalar'] ?? []); // sessionda bulunan array yapısındaki verileri nesneye çevirip sistem değişkeni içerisine atıyoruz

        $this->arabalar = array_map(function ($item) {
            return new Araba($item['id'], $item['ad'],$item['model'],$item['yil'],$item['markaId']);
        }, $_SESSION['arabalar'] ?? []);
    }

    public function markaEkle($ad)
    {
        $id = count($this->markalar)+1;
        $this->markalar[$id] = new Marka($id,$ad); // sistem değişkeni içerisinde markaları nesne olarak tutabiliriz
        $_SESSION['markalar'][$id] = ['id' => $id,'ad' => $ad]; // session içinde nesne tutamayacağımız için verileri dizi olarak depoluyoruz
    }
    public function arabaEkle($ad,$model,$yil,$markaId)
    {
        $id = count($this->arabalar)+1;
        $this->arabalar[$id] = new Araba($id,$ad,$model,$yil,$markaId);
        $_SESSION['arabalar'][$id] = ['id' => $id,'ad' => $ad,'model' => $model,'yil' => $yil,'markaId' => $markaId];
    }

    public function markaListele()
    {
        return $this->markalar;
    }
    public function arabaListele()
    {
        return $this->arabalar;
    }
    public function markaAdi($markaId)
    {
        $data = $this->markalar[$markaId];
        return isset($data) ? $data->ad : "Marka Yok";
    }
}