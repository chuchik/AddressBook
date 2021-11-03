<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
// Animal
// uni verjuitner
// utum e inch vor ban
// uni sirt
// karoxanum e sharjvel
class Animal {
    protected $verjuitneriQanakutiun;
    public $utumEInchVorban;
    public $srtiZarkeriQanakutiun;
    private function sharjvel(){
        echo "es bazv klas em<br>";
    }
}

// trchun
class Trchun extends Animal{

    public function sharjvel(){
        echo "e ha inch es el trchun em hoktemberianic<br>";
    }
}

// katnasun
class Katnasun extends Animal{

    public function sharjvel(){
        echo "Es el halal zulal mors katy kerac ez em<br>";
    }
}
// jrain
class Jrain extends Animal{

    public function sharjvel(){
        echo "Bul bul<br>";
    }
}

$citik = new Trchun();
$ez = new Katnasun();
$cugik = new Jrain();

$citik->sharjvel();
$ez->sharjvel();
$cugik->sharjvel();