<?php 
//? interface merupakn kelas absrak yg tidak memiliki implementasi
// template untuk kelas turunan
// tidak boleh ada property, hanya deklarasi method
// semua method harus dideklarasikan dengan visibility public
// boleh __construct();
// satu class boleh banyak implementasi interface



interface infoProdukk {
    public function getFullInfo();
}

abstract class produk {
    // protected agar bisa di akses di klas turunan
    protected $judul,
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
    abstract public function getFullInfo();
}

class manga extends produk implements infoProdukk{
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
    public function getFullInfo() {
        $str = "{$this->getLabel()} | {$this->penulis} | Rp{$this->harga}";
        return $str;
    }
    // dari pada menulis ulang variabel, kita bisa memanfaatkan function sebelumya yang sudah mempunyai variabel sebelumnya
    public function FullInfo(){
        $str = "Manga : " . $this->getFullInfo(). " | {$this->jmlHalaman} Halaman";
        return $str;
    }
}

class gameMobile extends produk implements infoProdukk{
    public $waktuMain;
    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain = "Main"){
        // 'parent' untuk memanggil func pada class parent
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }
    public function getFullInfo() {
        $str = "{$this->getLabel()} | {$this->penulis} | Rp{$this->harga}";
        return $str;
    }
    // dari pada menulis ulang variabel, kita bisa memanfaatkan function sebelumya yang sudah mempunyai variabel sebelumnya
    public function FullInfo(){
        $str = "Game mobile : " . $this->getFullInfo(). " | {$this->waktuMain}";
        // seperti ini, mengambil dari func getFullInfo(parent)
        return $str;
    }
}

// Kelas untuk mencetak informasi daftar produk
class infoProduk {
    // Menyimpan daftar produk dalam array
    public $daftarProduk = [];

    // Menambahkan produk ke daftar
    public function tambahProduk(produk $produk){
        $this->daftarProduk[] = $produk;
    }

    // Mencetak informasi semua produk dalam daftar
    public function cetak(){
        $info = "Daftar Produk: <br>";
        foreach ($this->daftarProduk as $produk) {
            $info .= "- {$produk->FullInfo()} <br>";
        }
        return $info;
    }
}

// Instansiasi objek Manga dan Game Mobile
$produk1 = new manga("Naruto", "Masashi Kishimoto", "Shonen Jump", 100000, 140);
$produk2 = new gameMobile("Free Fire", "Forrest Li", "Garena", 0, "Selamanya");

// Menambahkan produk ke daftar dan mencetak daftar produk
$cetakProduk = new infoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();