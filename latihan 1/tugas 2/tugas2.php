<?php

// 1. Buat 1 parent class yang berisikan 2 method
class orang_tua{
    function memarahi(){
        echo "kamu beban keluarga" . PHP_EOL;
    }

    function memuji(){
        echo "kamu kebanggaan keluarga" . PHP_EOL;
    }
}

// $wongtuo = new orang_tua();
// $wongtuo->memarahi();
// $wongtuo->memuji();

// 2. Buat 1 abstract class yang berisikan 2 abstract method.
abstract class orang_tua_abstrak {
    abstract function nama_anak($name);
    abstract function nama_cucu($name);
}

// 3. Buat 1 child class yang mengextend abstract class yang telah dibuat.

class anak extends orang_tua_abstrak{
    public function nama_anak($name){
        echo "anak ini namanya : " . $name . PHP_EOL;
    }

    public function nama_cucu($name){
        echo "cucu ini namanya : " . $name . PHP_EOL;
    }
}

// $class = new anak();
// $class->nama_anak("jonathan");
// $class->nama_cucu("joseph");

// 4. Buat trait untuk masing-masing abstract method yang telah dibuattadi.
trait trait_orang_tua{
    public function nama_anak($name){
        echo "oalah, anak ini namanya : " . $name . PHP_EOL;
    }

    public function nama_cucu($name){
        echo "oalah, cucu ini namanya : " . $name . PHP_EOL;
    }
}

class anak1{
    use trait_orang_tua;
}

class anak2{
    use trait_orang_tua;
}

$class1 = new anak1();
$class1->nama_anak("jonathan");
$class1->nama_cucu("joseph");

$class2 = new anak2();
$class2->nama_anak("Joko");
$class2->nama_cucu("Sugeng");