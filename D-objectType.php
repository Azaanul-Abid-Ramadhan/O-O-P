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
        return "$this->judul, 
                $this->penerbit";
    }
}

class infoProduk {
    public function cetak(produk $produk){
        // tambahkan type class "produk"
        $str = "{$produk->getLabel()} | {$produk->penulis} (Rp{$produk->harga})";
        return $str;
    }
}

// instansiasi
$produk1 = new produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 100000);
$produk2 = new produk("Free Fire", "Forrest Li", "Garena");
$produk3 = new produk();

echo "Manga: " . $produk1 ->getLabel() . "<br>";
echo "Game: " . $produk2->getLabel() . "<br>";
echo "Default: " . $produk3->getLabel() . "<br>";
echo '<hr>';

$infoProduk1 = new infoProduk();
echo $infoProduk1->cetak($produk1) . "<br>";
