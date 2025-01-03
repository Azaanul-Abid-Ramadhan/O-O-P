<?php
// class--
// class adalah blueprint untuk object
// class mendefinisikan object
// menyimpan data dan prilaku yg disebut dengan property dan method
// object --
// object adalah instance dari class
// banyak object dari 1 class

// property = data
// method = prilaku
class Produk {
    // public=visiblity
    public $judul = 'judul',
           $penulis = 'penulis',
           $penerbit = 'penerbit',
           $harga = 0;

    // method = function di dalam kelas
    public function getLabel() {
        // this untuk mengambil property di dalam class
        return "$this->judul, $this->penerbit";
        // this = instans yg bersangkutan
    }
}

// instansiasi
$produk1 = new Produk();
$produk1->judul = 'Bleach';
var_dump($produk1);

$produk2 = new Produk();
$produk2->judul = 'Free Fire';
// jika property berbeda maka akan menambah property
$produk2->tambahProperty = 'Giv alok';
var_dump($produk2);

echo "<hr>";
$produk3 = new Produk();
$produk3->judul = 'Naruto';
$produk3->penulis = 'Masashi Kishimoto';
$produk3->penerbit = 'Shounen Jump';
$produk3->harga = 100000;
// var_dump($produk3);

$produk4 = new Produk();
$produk4->judul = 'Free Fire';
$produk4->penulis = 'Forrest Li';
$produk4->penerbit = 'Garena';
$produk4->harga = 'Free';

echo "Manga: " . $produk3->getLabel();
echo "<br>";
echo "Game: " . $produk4->getLabel();