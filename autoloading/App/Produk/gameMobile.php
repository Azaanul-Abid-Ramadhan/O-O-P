<?php 
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