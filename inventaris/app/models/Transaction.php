<?php

declare(strict_types=1);

require_once __DIR__ . '/../../config.php';
require_once ROOT_PATH . '/core/Database.php';
require_once ROOT_PATH . '/core/Model.php';

final class Transaction extends Model
{
    public function getAll(): array
    {
        $sql = '
            SELECT
                t.id,
                t.item_id,
                t.user_id,
                t.type,
                t.quantity,
                t.transaction_date,
                t.notes,
                t.created_at,
                i.code AS item_code,
                i.name AS item_name,
                u.name AS user_name
            FROM transactions t
            INNER JOIN items i ON i.id = t.item_id
            LEFT JOIN users u ON u.id = t.user_id
            ORDER BY t.transaction_date DESC, t.id DESC
        ';

        return $this->db->query($sql)->fetchAll();
    }

    public function create(
        int $itemId,
        ?int $userId,
        string $type,
        int $quantity,
        ?string $notes = null
    ): int {
        if (!in_array($type, ['in', 'out'], true)) {
            throw new InvalidArgumentException(
                'Tipe transaksi harus in atau out.'
            );
        }

        if ($quantity <= 0) {
            throw new InvalidArgumentException(
                'Jumlah transaksi harus lebih besar dari nol.'
            );
        }

        $this->db->beginTransaction();

        try {
            $statement = $this->db->prepare(
                'SELECT id, stock FROM items WHERE id = :id FOR UPDATE'
            );

            $statement->execute(['id' => $itemId]);
            $item = $statement->fetch();

            if ($item === false) {
                throw new RuntimeException('Barang tidak ditemukan.');
            }

            $currentStock = (int) $item['stock'];

            if ($type === 'out' && $currentStock < $quantity) {
                throw new RuntimeException(
                    'Stok tidak mencukupi untuk transaksi keluar.'
                );
            }

            $newStock = $type === 'in'
                ? $currentStock + $quantity
                : $currentStock - $quantity;

            $update = $this->db->prepare(
                'UPDATE items SET stock = :stock WHERE id = :id'
            );

            $update->execute([
                'stock' => $newStock,
                'id' => $itemId,
            ]);

            $insert = $this->db->prepare(
                'INSERT INTO transactions (
                    item_id,
                    user_id,
                    type,
                    quantity,
                    transaction_date,
                    notes
                ) VALUES (
                    :item_id,
                    :user_id,
                    :type,
                    :quantity,
                    :transaction_date,
                    :notes
                )'
            );

            $insert->execute([
                'item_id' => $itemId,
                'user_id' => $userId,
                'type' => $type,
                'quantity' => $quantity,
                'transaction_date' => date('Y-m-d H:i:s'),
                'notes' => $notes,
            ]);

            $transactionId = (int) $this->db->lastInsertId();

            $this->db->commit();

            return $transactionId;
        } catch (Throwable $exception) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            throw $exception;
        }
    }
}
