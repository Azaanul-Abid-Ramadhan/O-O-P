<?php 
//? class abstrak = sebuah class yg tidak dapat di instansiasi (tidak bisa membuat object)
// mendefiniskan interface untuk class lain yg menjadi turunannya
// berperan sebagai kerangka dasar (interface)
// memiliki minimal 1 method abstrak
// semua turunan harus mengimplementasikan method abstak yg ada di kelas abstraknya
//* kelas abstrak boleh memiliki property / method regular (public, private, protected), dan static

//! Kelas abstrak produk sebagai kelas dasar untuk berbagai jenis produk
abstract class produk {
    // Properti private hanya bisa diakses di dalam kelas ini
    private $judul, $penulis, $penerbit;
    
    // Properti protected dapat diakses di kelas ini dan kelas turunan
    protected $harga, $diskon = 0;

    // Konstruktor untuk menginisialisasi properti
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Setter untuk mengubah nilai properti judul
    public function setJudul($judul){
        $this->judul = $judul;
    }

    // Getter untuk mengambil nilai properti judul
    public function getJudul(){
        return $this->judul;
    }

    // Setter untuk mengubah nilai properti penulis
    public function setPenulis($penulis){
        $this->penulis = $penulis;
    }

    // Getter untuk mengambil nilai properti penulis
    public function getPenulis(){
        return $this->penulis;
    }

    // Getter untuk mengambil nilai properti penerbit
    public function getPenerbit(){
        return $this->penerbit;
    }

    // Mengembalikan label produk (judul dan penerbit)
    public function getLabel() {
        return "{$this->judul}, {$this->penerbit}";
    }

    // Metode abstrak yang harus diimplementasikan di kelas turunan
    abstract public function getInfoP();

    // Mengembalikan informasi lengkap produk (digunakan oleh kelas turunan)
    public function getFullInfo() {
        $str = "{$this->getLabel()} | {$this->penulis} | Rp{$this->harga}";
        return $str;
    }
}

// Kelas turunan produk khusus untuk Manga
class manga extends produk {
    // Properti tambahan khusus untuk Manga
    public $jmlHalaman;

    // Konstruktor untuk inisialisasi properti, termasuk properti tambahan
    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman = 0){
        // Memanggil konstruktor dari kelas induk
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    // Menghitung harga setelah diskon
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    // Mengatur nilai diskon
    public function setDiskon($diskon = null){
        $this->diskon = $diskon;
    }

    // Implementasi metode abstrak dari kelas produk
    public function getInfoP(){
        return "Manga: {$this->getLabel()} | {$this->getPenulis()}";
    }

    // Menampilkan informasi lengkap Manga termasuk jumlah halaman
    public function getFullInfo(){
        $str = $this->getInfoP() . " | Rp{$this->harga} | {$this->jmlHalaman} Halaman";
        return $str;
    }
}

// Kelas turunan produk khusus untuk Game Mobile
class gameMobile extends produk {
    // Properti tambahan khusus untuk Game Mobile
    public $waktuMain;

    // Konstruktor untuk inisialisasi properti, termasuk properti tambahan
    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain = "Selamanya"){
        // Memanggil konstruktor dari kelas induk
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    // Implementasi metode abstrak dari kelas produk
    public function getInfoP(){
        return "Game Mobile: {$this->getLabel()} | {$this->getpenulis()}";
    }

    // Menampilkan informasi lengkap Game Mobile termasuk waktu main
    public function getFullInfo(){
        $str = $this->getInfoP() . " | Rp{$this->harga} | {$this->waktuMain} Jam";
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
            $info .= "- {$produk->getFullInfo()} <br>";
        }
        return $info;
    }
}

// Instansiasi objek Manga dan Game Mobile
$produk1 = new manga("Naruto", "Masashi Kishimoto", "Shonen Jump", 100000, 140);
$produk2 = new gameMobile("Free Fire", "Forrest Li", "Garena", 0);

// Menambahkan produk ke daftar dan mencetak daftar produk
$cetakProduk = new infoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();
