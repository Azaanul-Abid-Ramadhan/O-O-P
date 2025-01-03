<?php 
// menciptakan hubungan antar class (parent & child)
// child class-
// mewarisi semua properti dan method dari parent(yang visible aja)
// memperluas (extend) funsionalitas dari parent

// -- studi kasus: bagaimana menambahkan fitur baru dari yang sudah ada
class produk {
    // public=visiblity
    public $judul,
           $penulis,
           $penerbit,
           $harga,
           $jmlHalaman,
           $waktuMain,
           $tipe;

    // contruktor method yg otomatis dijalankan
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = null, $waktuMain = null, $tipe = "abcd") {
        // nilai default pindah ke construktor
         $this->judul = $judul;
         $this->penulis = $penulis;
         $this->penerbit = $penerbit;
         $this->harga = $harga;
         $this->jmlHalaman = $jmlHalaman;
         $this->waktuMain = $waktuMain;
         $this->tipe = $tipe;
    }
    public function getLabel() {
        return "$this->judul, 
                $this->penerbit";
    }
    public function getFullInfo() {
        $str = "{$this->tipe} : {$this->getLabel()} | {$this->penulis} | Rp{$this->harga}";
        if($this->tipe == 'Manga'){
            $str .= " | {$this->jmlHalaman} Halaman";
        } elseif ($this->tipe == 'Game Mobile') {
            $str .= " | {$this->waktuMain} Jam";
        }

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
$produk1 = new produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 100000, 13.968, "", "Manga");
$produk2 = new produk("Free Fire", "Forrest Li", "Garena", 0, "",  "30menit", "Game mobile");
$produk3 = new produk();

var_dump($produk1);
echo '<br>';
var_dump($produk2);

echo '<hr>';
echo $produk1->getFullInfo();
echo '<br>';
echo $produk2->getFullInfo();