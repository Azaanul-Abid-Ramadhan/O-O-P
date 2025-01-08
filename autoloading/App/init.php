<?php 
// require_once 'Produk/infoProdukk.php';
// require_once 'Produk/produk.php';
// require_once 'Produk/manga.php';
// require_once 'Produk/gameMobile.php';
// require_once 'Produk/infoProduk.php';
//! REALLY??


spl_autoload_register(function($class) {
    require_once __DIR__ . '/Produk/' . $class . '.php'; 
});