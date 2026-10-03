<?php

declare(strict_types=1);

$pilihan = 2;

switch ($pilihan) {
    case 1:
        echo "Lihat saldo<br>";
        break;

    case 2:
        echo "Transfer<br>";
        break;

    case 3:
        echo "Bayar tagihan<br>";
        break;

    default:
        echo "Pilihan tidak valid<br>";
}


// Fall-through yang disengaja
$jawab = 'y';

switch ($jawab) {
    case 'y':
    case 'Y':
        echo "Anda menjawab YA<br>";
        break;

    case 'n':
    case 'N':
        echo "Anda menjawab TIDAK<br>";
        break;

    default:
        echo "Jawaban tidak dikenali<br>";
}


// Tanpa break = fall-through
$k = 1;

echo "Tanpa break: ";

switch ($k) {
    case 1:
        echo "Satu ";
    // Tidak ada break, sehingga lanjut ke case 2

    case 2:
        echo "Dua ";
    // Tidak ada break, sehingga lanjut ke case 3

    case 3:
        echo "Tiga ";
        break;
}

echo "<br>";