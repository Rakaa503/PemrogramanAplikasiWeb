<?php
declare(strict_types=1);

$nama = "Budi Santoso";
$umur = 20;
$ipk = 3.75;
$aktif = true;

// Interpolasi variabel di dalam string ganda
echo "Nama  : $nama\n";
echo "Umur  : $umur tahun\n";
echo "IPK   : $ipk\n";
echo "Aktif : " . ($aktif ? "ya" : "tidak") . "\n";

// Konkatenasi
echo 'Halo, ' . $nama . '!';
