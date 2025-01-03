<?php 
// Metode setter dan getter digunakan untuk mengontrol akses terhadap properti private
class produk {
    // public=visiblity
    private $judul,
           $penulis,
           $penerbit;
    // protected hanya di class dan turunanny
    protected $harga,
              $diskon = 0;

    // contruktor method yg otomatis dijalankan
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        // nilai default pindah ke construktor
         $this->judul = $judul;
         $this->penulis = $penulis;
         $this->penerbit = $penerbit;
         $this->harga = $harga;
    }
    // setter
    public function setJudul($judul){
        $this->judul = $judul;
    }
    // getter
    public function getJudul(){
        return $this->judul;
    }
    // setter
    public function setPenulis($penulis){
        $this->penulis = $penulis;
    }
    // getter
    public function getPenulis(){
        return $this->penulis;
    }
    public function getPenerbit(){
        return $this->penerbit;
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

class manga extends produk {
    public $jmlHalaman;
    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman = null){
        // 'parent' untuk memanggil func pada class parent
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }
    // func untuk memanggil protected harga
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
    public function setDiskon($diskon = null){
        return $this->diskon = $diskon;
    }
    // dari pada menulis ulang variabel, kita bisa memanfaatkan function sebelumya yang sudah mempunyai variabel sebelumnya
    public function getFullInfo(){
        $str = "Manga : " . parent::getfullInfo(). " | {$this->jmlHalaman} Halaman";
        // seperti ini, mengambil dari func getFullInfo(parent)
        return $str;
    }
}

class gameMobile extends produk {
    public $waktuMain;
    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain = "Selamanya"){
        // 'parent' untuk memanggil func pada class parent
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }
    // dari pada menulis ulang variabel, kita bisa memanfaatkan function sebelumya yang sudah mempunyai variabel sebelumnya
    public function getFullInfo(){
        $str = "Game mobile : " . parent::getfullInfo(). " | {$this->waktuMain}";
        // seperti ini, mengambil dari func getFullInfo(parent)
        return $str;
    }
}

class infoProduk {
    public function cetak(produk $produk){
        $str = "{$produk->getLabel()} | {$produk->penulis} (Rp{$produk->harga})";
        return $str;
    }
}

$produk1 = new manga("Naruto", "Masashi Kishimoto", "Shonen Jump", 100000, 13.968);
$produk2 = new gameMobile("Free Fire", "Forrest Li", "Garena", 0,);
$produk3 = new produk();

// var_dump($produk1);
// echo '<br>';
// var_dump($produk2);

echo '<hr>';
echo $produk1->getFullInfo();
echo '<br>';
echo $produk2->getFullInfo();
echo '<hr>';

// rill
echo $produk1->getHarga();
echo '<br>';
echo $produk1->getPenerbit();
echo '<br>';
$produk1->setDiskon(10);

echo '<hr>';
// setter
$produk1->setJudul("Sambalado");
// getter
echo $produk1->getJudul() . "<br>";
echo $produk1->getPenulis() . "<br>";