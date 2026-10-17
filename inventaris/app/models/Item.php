<?php

declare(strict_types=1);

require_once __DIR__ . '/../../config.php';
require_once ROOT_PATH . '/core/Database.php';
require_once ROOT_PATH . '/core/Model.php';

final class Item extends Model
{
    public function getAll(
        string $search = '',
        ?int $categoryId = null
    ): array {
        $sql = '
            SELECT
                i.id,
                i.category_id,
                i.code,
                i.name,
                i.description,
                i.stock,
                i.minimum_stock,
                i.unit,
                i.price,
                i.created_at,
                i.updated_at,
                c.name AS category_name
            FROM items i
            LEFT JOIN categories c ON c.id = i.category_id
            WHERE (
                i.name LIKE :search_name
                OR i.code LIKE :search_code
            )
        ';

        $params = [
            'search_name' => '%' . $search . '%',
            'search_code' => '%' . $search . '%',
        ];

        if ($categoryId !== null) {
            $sql .= ' AND i.category_id = :category_id';
            $params['category_id'] = $categoryId;
        }

        $sql .= ' ORDER BY i.name ASC';

        $statement = $this->db->prepare($sql);
        $statement->execute($params);

        return $statement->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $sql = '
            SELECT
                i.*,
                c.name AS category_name
            FROM items i
            LEFT JOIN categories c ON c.id = i.category_id
            WHERE i.id = :id
            LIMIT 1
        ';

        $statement = $this->db->prepare($sql);
        $statement->execute(['id' => $id]);

        $item = $statement->fetch();

        return $item === false ? null : $item;
    }

    public function create(array $data): int
    {
        $sql = '
            INSERT INTO items (
                category_id,
                code,
                name,
                description,
                stock,
                minimum_stock,
                unit,
                price
            ) VALUES (
                :category_id,
                :code,
                :name,
                :description,
                :stock,
                :minimum_stock,
                :unit,
                :price
            )
        ';

        $statement = $this->db->prepare($sql);
        $statement->execute([
            'category_id' => $data['category_id'] ?? null,
            'code' => trim($data['code']),
            'name' => trim($data['name']),
            'description' => $data['description'] ?? null,
            'stock' => $data['stock'],
            'minimum_stock' => $data['minimum_stock'],
            'unit' => trim($data['unit']),
            'price' => $data['price'],
        ]);

        return (int) $this->db->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $sql = '
            UPDATE items
            SET category_id = :category_id,
                code = :code,
                name = :name,
                description = :description,
                stock = :stock,
                minimum_stock = :minimum_stock,
                unit = :unit,
                price = :price
            WHERE id = :id
        ';

        $statement = $this->db->prepare($sql);
        $statement->execute([
            'id' => $id,
            'category_id' => $data['category_id'] ?? null,
            'code' => trim($data['code']),
            'name' => trim($data['name']),
            'description' => $data['description'] ?? null,
            'stock' => $data['stock'],
            'minimum_stock' => $data['minimum_stock'],
            'unit' => trim($data['unit']),
            'price' => $data['price'],
        ]);

        return $statement->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $statement = $this->db->prepare(
            'DELETE FROM items WHERE id = :id'
        );

        $statement->execute(['id' => $id]);

        return $statement->rowCount() > 0;
    }
}
