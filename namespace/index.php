<?php 
require_once 'App/init.php';

// Instansiasi objek Manga dan Game Mobile
$produk1 = new manga("Naruto", "Masashi Kishimoto", "Shonen Jump", 100000, 140);
$produk2 = new gameMobile("Free Fire", "Forrest Li", "Garena", 0, "Selamanya");

// Menambahkan produk ke daftar dan mencetak daftar produk
$cetakProduk = new infoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();

echo '<hr>';

//? dengan 'use ... as' agar lebih singkat dan tidak terduplikat
use App\Produk\user as produk;
//! tanpa 'as' namun bisa saja terduplikat
use App\service\user;

new produk();
new user();