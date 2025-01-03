<?php 
class produk {
    // public=visiblity
    public $judul,
           $penulis,
           $penerbit,
           $harga;

    // contruktor method yg otomatis dijalankan
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        // nilai default pindah ke construktor
         $this->judul = $judul;
         $this->penulis = $penulis;
         $this->penerbit = $penerbit;
         $this->harga = $harga;
    }
    public function getLabel() {
        // return mengembalikan nilai agar bisa di echo
        return "$this->judul, $this->penerbit";

    }
}

// instansiasi
$produk1 = new produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 100000);
$produk2 = new produk("Free Fire", "Forrest Li", "Garena");
$produk3 = new produk();

echo "Manga: " . $produk1 ->getLabel() . "<br>";
echo "Game: " . $produk2->getLabel() . "<br>";
echo "Default: " . $produk3->getLabel() . "<br>";
?>