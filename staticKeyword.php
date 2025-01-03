<?php 
// member masih terikat dari class
// nilai static selalu tetap

// contoh tanpa static
class contoh {
    public $angka =1;

    public function halo() {
        return "Halo " . $this->angka++ . " kali. <br>";
    }
}
$obj = new contoh;
echo $obj->halo();
echo $obj->halo();
echo $obj->halo() . "<hr>";
$obj1 = new contoh;
echo $obj1->halo();
echo $obj1->halo();
echo $obj1->halo();

echo  "<hr>";
echo  "with static";
echo  "<br>";
// contoh dengan static
class contoh1 {
    public static $nmbr =1;

    public function halo1() {
        return "Halo " . self::$nmbr++ . " kali. <br>";
    }
}
$obj = new contoh1;
echo $obj->halo1();
echo $obj->halo1();
echo $obj->halo1() . "<hr>";
$obj1 = new contoh1;
echo $obj1->halo1();
echo $obj1->halo1();
echo $obj1->halo1();