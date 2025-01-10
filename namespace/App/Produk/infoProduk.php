<?php 
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