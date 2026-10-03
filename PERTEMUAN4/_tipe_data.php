<?php

declare(strict_types=1);

$bulat = 42;
$pecahan = 3.14;
$teks = "Halo";
$benar = true;
$kosong = null;
$daftar = [1, 2, 3];

echo "== Tipe Data ==<br>";

var_dump($bulat);
var_dump($pecahan);
var_dump($teks);
var_dump($benar);
var_dump($kosong);
var_dump($daftar);

echo "<br>== Pemeriksaan Tipe ==<br>";

var_dump(is_int($bulat));
var_dump(is_string($teks));
var_dump(is_array($daftar));
var_dump(is_null($kosong));