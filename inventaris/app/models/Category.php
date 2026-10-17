<?php

declare(strict_types=1);

require_once __DIR__ . '/../../config.php';
require_once ROOT_PATH . '/core/Database.php';
require_once ROOT_PATH . '/core/Model.php';

final class Category extends Model
{
    public function getAll(): array
    {
        $sql = '
            SELECT id, name, description, created_at, updated_at
            FROM categories
            ORDER BY name ASC
        ';

        return $this->db->query($sql)->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $sql = '
            SELECT id, name, description, created_at, updated_at
            FROM categories
            WHERE id = :id
            LIMIT 1
        ';

        $statement = $this->db->prepare($sql);
        $statement->execute(['id' => $id]);

        $category = $statement->fetch();

        return $category === false ? null : $category;
    }

    public function create(
        string $name,
        ?string $description = null
    ): int {
        $sql = '
            INSERT INTO categories (name, description)
            VALUES (:name, :description)
        ';

        $statement = $this->db->prepare($sql);
        $statement->execute([
            'name' => trim($name),
            'description' => $description,
        ]);

        return (int) $this->db->lastInsertId();
    }

    public function update(
        int $id,
        string $name,
        ?string $description = null
    ): bool {
        $sql = '
            UPDATE categories
            SET name = :name,
                description = :description
            WHERE id = :id
        ';

        $statement = $this->db->prepare($sql);
        $statement->execute([
            'id' => $id,
            'name' => trim($name),
            'description' => $description,
        ]);

        return $statement->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $sql = '
            DELETE FROM categories
            WHERE id = :id
        ';

        $statement = $this->db->prepare($sql);
        $statement->execute(['id' => $id]);

        return $statement->rowCount() > 0;
    }
}
