<?php

declare(strict_types=1);

$sudahLogin = true;
$peran = 'admin';

if ($sudahLogin) {
    if ($peran === 'admin') {
        echo "Selamat datang, Admin. Akses penuh.<br>";
    } elseif ($peran === 'operator') {
        echo "Selamat datang, Operator. Akses terbatas.<br>";
    } else {
        echo "Peran tidak dikenal.<br>";
    }
} else {
    echo "Silakan login terlebih dahulu.<br>";
}


// Alternatif datar menggunakan &&
$terverifikasi = true;
$saldo = 120000;

if ($sudahLogin && $terverifikasi && $saldo >= 100000) {
    echo "Transaksi besar diizinkan.<br>";
} else {
    echo "Transaksi besar tidak diizinkan.<br>";
}