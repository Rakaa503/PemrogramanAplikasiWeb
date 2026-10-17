<?php

require __DIR__ . '/config.php';
require __DIR__ . '/core/Database.php';

$pdo = Database::getInstance()->pdo();

$tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

foreach ($tables as $table) {
    echo PHP_EOL . "=== {$table} ===" . PHP_EOL;

    $statement = $pdo->query("DESCRIBE `{$table}`");

    foreach ($statement->fetchAll() as $column) {
        echo sprintf(
            "%s | %s | %s | %s\n",
            $column['Field'],
            $column['Type'],
            $column['Null'],
            $column['Key']
        );
    }

    $count = $pdo->query("SELECT COUNT(*) FROM `{$table}`")->fetchColumn();

    echo "Jumlah data: {$count}" . PHP_EOL;
}
