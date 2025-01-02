<?php 
// membuat method di kelas child yang memilik nama func yang sama dengan kelas parent
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
    public function getFullInfo() {
        $str = "{$this->getLabel()} | {$this->penulis} | Rp{$this->harga}";
        return $str;
    }
}
// dengan overriding
class komik extends produk {
    public $jmlHalaman;
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = null){
        parent::__construct($judul, $penulis, $penerbit, $harga , $jmlHalaman);
        $this->jmlHalaman = $jmlHalaman;
    }
    // dari pada menulis ulang variabel, kita bisa memanfaatkan function sebelumya yang sudah mempunyai variabel sebelumnya
    public function getFullInfo(){
        $str = "Komik : " . parent::getfullInfo(). " | {$this->jmlHalaman} Halaman";
        // seperti ini, mengambil dari func getFullInfo(parent)
        return $str;
    }
}
// tanpa overiiding
class gameMobile extends produk {
    public function getFullInfo(){
        $str = "Game mobile : {$this->getLabel()} | {$this->penulis} | Rp{$this->harga} | {$this->waktuMain} Jam";
        return $str;
    }
}

class infoProduk {
    public function cetak(produk $produk){
        $str = "{$produk->getLabel()} | {$produk->penulis} (Rp{$produk->harga})";
        return $str;
    }
}

$produk1 = new komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 100000, 13.968);
// $produk2 = new gameMobile("Free Fire", "Forrest Li", "Garena", 0, "",  "30");
$produk3 = new produk();

var_dump($produk1);
echo '<br>';
// var_dump($produk2);

echo '<hr>';
echo $produk1->getFullInfo();
echo '<br>';
// echo $produk2->getFullInfo();