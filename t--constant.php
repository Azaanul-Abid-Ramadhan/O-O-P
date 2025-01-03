<?php 
// constant untuk menyinpan nilai, seperti variabel? oh tidakk, costant nilainya tetap(tidak dapt berubah)

// tidak dapat dimasukkan di dalam class
define('NAMA', 'Saya');
echo NAMA;

echo "<hr>";
// bisaaa
const UMUR = 500 . ' Tahun';
echo UMUR;

echo "<hr>";
class eConstant {
    const NAMA = 'Muhamad Abdul';
}
echo eConstant::NAMA;

echo "<hr>";

echo __LINE__ . "<br>"; //sesuai line
echo __FILE__ . "<br>"; //sesuai file
echo __DIR__ . "<br>"; //sesuai direktori
echo __FUNCTION__ . "<br>"; //sesuai fungsi
echo __CLASS__ . "<br>"; //sesuai class
echo __TRAIT__ . "<br>"; //sesuai trait
echo __METHOD__ . "<br>"; //sesuai method
echo __NAMESPACE__ . "<br>"; //sesuai namespace

function apaan(){
    return __FUNCTION__;
}
echo apaan();