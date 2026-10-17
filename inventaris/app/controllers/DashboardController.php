<?php
declare(strict_types=1);

class DashboardController extends Controller
{
    public function index(): void
    {
        $pdo = Database::getInstance()->pdo();

        $stats = [
            'items' => (int) $pdo->query('SELECT COUNT(*) FROM items')->fetchColumn(),
            'categories' => (int) $pdo->query('SELECT COUNT(*) FROM categories')->fetchColumn(),
            'transactions' => (int) $pdo->query('SELECT COUNT(*) FROM transactions')->fetchColumn(),
            'lowStock' => (int) $pdo->query(
                'SELECT COUNT(*) FROM items WHERE stock <= minimum_stock'
            )->fetchColumn(),
        ];

        $items = $pdo->query(
            'SELECT i.name, i.code, i.stock, i.minimum_stock, i.unit,
                    c.name AS category_name
             FROM items i
             LEFT JOIN categories c ON c.id = i.category_id
             ORDER BY i.name'
        )->fetchAll(PDO::FETCH_ASSOC);

        $this->view('dashboard/index', [
            'stats' => $stats,
            'items' => $items,
        ]);
    }
}