<?php

declare(strict_types=1);

$nilai = 82;

if ($nilai >= 85) {
    $huruf = 'A';
} elseif ($nilai >= 75) {
    $huruf = 'B';
} elseif ($nilai >= 65) {
    $huruf = 'C';
} elseif ($nilai >= 50) {
    $huruf = 'D';
} else {
    $huruf = 'E';
}

echo "Nilai $nilai -> huruf mutu $huruf<br>";


// Contoh urutan yang salah
$n = 90;

if ($n >= 50) {
    $salah = 'D';
} elseif ($n >= 85) {
    $salah = 'A';
} else {
    $salah = 'E';
}

echo "Urutan salah menghasilkan: $salah (seharusnya A)<br>";


// Urutan yang benar
if ($n >= 85) {
    $benar = 'A';
} elseif ($n >= 75) {
    $benar = 'B';
} elseif ($n >= 65) {
    $benar = 'C';
} elseif ($n >= 50) {
    $benar = 'D';
} else {
    $benar = 'E';
}

echo "Urutan benar menghasilkan: $benar";