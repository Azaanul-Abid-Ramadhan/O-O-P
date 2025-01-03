<?php 
// menciptakan hubungan antar class (parent & child)
// child class-
// mewarisi semua properti dan method dari parent(yang visible aja)
// memperluas (extend) funsionalitas dari parent

// -- studi kasus: bagaimana menambahkan fitur baru dari yang sudah ada
class produk {
    // class parent
    public $judul,
           $penulis,
           $penerbit,
           $harga,
           $jmlHalaman,
           $waktuMain;

    // contruktor method yg otomatis dijalankan
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = null, $waktuMain = null) {
        // nilai default pindah ke construktor
         $this->judul = $judul;
         $this->penulis = $penulis;
         $this->penerbit = $penerbit;
         $this->harga = $harga;
         $this->jmlHalaman = $jmlHalaman;
         $this->waktuMain = $waktuMain;
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

class komik extends produk {
    // class child
    public function getFullInfo(){
        $str = "Komik : {$this->getLabel()} | {$this->penulis} | Rp{$this->harga} | {$this->jmlHalaman} Halaman";
        return $str;
    }
}

class gameMobile extends produk {
    public function getFullInfo(){
        $str = "Game mobile : {$this->getLabel()} | {$this->penulis} | Rp{$this->harga} | {$this->waktuMain} Jam";
        return $str;
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
$produk1 = new komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 100000, 13.968, "");
$produk2 = new gameMobile("Free Fire", "Forrest Li", "Garena", 0, "",  "30");
$produk3 = new produk();

var_dump($produk1);
echo '<br>';
var_dump($produk2);

echo '<hr>';
echo $produk1->getFullInfo();
echo '<br>';
echo $produk2->getFullInfo();