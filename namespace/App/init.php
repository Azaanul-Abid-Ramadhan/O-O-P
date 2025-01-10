<?php 
// require_once 'Produk/infoProdukk.php';
// require_once 'Produk/produk.php';
// require_once 'Produk/manga.php';
// require_once 'Produk/gameMobile.php';
// require_once 'Produk/infoProduk.php';
// require_once 'Produk/user.php';
// require_once 'service/user.php';
//! REALLY??


spl_autoload_register(function($class) {
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/Produk/' . $class . '.php'; 
});

spl_autoload_register(function($class) {
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/service/' . $class . '.php'; 
});