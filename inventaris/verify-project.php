<?php
declare(strict_types=1);

require __DIR__ . '/config.php';
require __DIR__ . '/core/Database.php';
require __DIR__ . '/core/Model.php';
require __DIR__ . '/app/Models/Category.php';
require __DIR__ . '/app/Models/Item.php';
require __DIR__ . '/app/Models/Transaction.php';

try {
    $pdo = Database::getInstance()->pdo();

    $categories = (new Category())->getAll();
    $items = (new Item())->getAll();
    $transactions = (new Transaction())->getAll();

    echo "Koneksi PDO: BERHASIL\n";
    echo "Jumlah kategori: " . count($categories) . "\n";
    echo "Jumlah barang: " . count($items) . "\n";
    echo "Jumlah transaksi: " . count($transactions) . "\n";

    echo "\n--- Daftar barang ---\n";
    foreach ($items as $item) {
        printf(
            "%s | Stok: %d | Minimum: %d | %s\n",
            $item['name'],
            (int) $item['stock'],
            (int) $item['minimum_stock'],
            (int) $item['stock'] <= (int) $item['minimum_stock']
                ? 'STOK RENDAH'
                : 'AMAN'
        );
    }

    echo "\nTES MODEL: BERHASIL\n";
} catch (Throwable $e) {
    fwrite(STDERR, "TES GAGAL: " . $e->getMessage() . "\n");
    exit(1);
}
