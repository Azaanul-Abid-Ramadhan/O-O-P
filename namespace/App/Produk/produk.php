<?php
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