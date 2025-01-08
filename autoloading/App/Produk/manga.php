<?php 
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