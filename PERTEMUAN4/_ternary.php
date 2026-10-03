<?php

declare(strict_types=1);

$a = 10;
$b = 20;

$maks = $a > $b ? $a : $b;

echo "Maksimum: $maks<br>";

$nilai = 80;

$status = $nilai >= 75 ? 'LULUS' : 'TIDAK LULUS';

echo "Status: $status<br>";

// Elvis operator vs null coalescing

$input = "0";

// Elvis ?: -> "0" dianggap falsy
echo "Elvis ?: " . ($input ?: 'default') . "<br>";

// Null coalescing ?? -> hanya mengecek null
echo "Null ?? : " . ($input ?? 'default') . "<br>";

// Mengambil parameter umur dari URL
$umur = $_GET['umur'] ?? 0;

echo "Umur: $umur<br>";