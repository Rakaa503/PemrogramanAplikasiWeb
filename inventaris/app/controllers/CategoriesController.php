<?php
declare(strict_types=1);

class CategoriesController extends Controller
{
    public function index(): void
    {
        $categories = $this->model('Category')->getAll();

        $this->view('categories/index', [
            'categories' => $categories,
            'error' => null,
        ]);
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('categories');
        }

        $name = trim((string) ($_POST['name'] ?? ''));
        $description = trim((string) ($_POST['description'] ?? ''));

        if ($name === '' || mb_strlen($name) > 100) {
            $this->flash('error', 'Nama kategori wajib diisi, maksimal 100 karakter.');
            $this->redirect('categories');
        }

        try {
            $this->model('Category')->create(
                $name,
                $description !== '' ? $description : null
            );
            $this->flash('success', 'Kategori berhasil ditambahkan.');
        } catch (PDOException $exception) {
            $this->flash(
                'error',
                (string) $exception->getCode() === '23000'
                    ? 'Nama kategori sudah digunakan.'
                    : 'Kategori gagal disimpan.'
            );
        }

        $this->redirect('categories');
    }

    public function edit(string $id = ''): void
    {
        $category = $this->model('Category')->findById((int) $id);

        if (!$category) {
            http_response_code(404);
            echo 'Kategori tidak ditemukan.';
            return;
        }

        $this->view('categories/edit', ['category' => $category]);
    }

    public function update(string $id = ''): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('categories');
        }

        $id = (int) $id;
        $name = trim((string) ($_POST['name'] ?? ''));
        $description = trim((string) ($_POST['description'] ?? ''));

        if ($id < 1 || $name === '' || mb_strlen($name) > 100) {
            $this->flash('error', 'ID atau nama kategori tidak valid.');
            $this->redirect('categories');
        }

        try {
            $updated = $this->model('Category')->update(
                $id,
                $name,
                $description !== '' ? $description : null
            );

            $this->flash(
                $updated ? 'success' : 'error',
                $updated
                    ? 'Kategori berhasil diperbarui.'
                    : 'Tidak ada perubahan atau kategori tidak ditemukan.'
            );
        } catch (PDOException $exception) {
            $this->flash(
                'error',
                (string) $exception->getCode() === '23000'
                    ? 'Nama kategori sudah digunakan.'
                    : 'Kategori gagal diperbarui.'
            );
        }

        $this->redirect('categories');
    }

    public function delete(string $id = ''): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('categories');
        }

        $id = (int) $id;

        if ($id < 1) {
            $this->flash('error', 'ID kategori tidak valid.');
            $this->redirect('categories');
        }

        try {
            $deleted = $this->model('Category')->delete($id);
            $this->flash(
                $deleted ? 'success' : 'error',
                $deleted ? 'Kategori berhasil dihapus.' : 'Kategori tidak ditemukan.'
            );
        } catch (PDOException $exception) {
            $this->flash(
                'error',
                'Kategori tidak bisa dihapus karena masih digunakan barang.'
            );
        }

        $this->redirect('categories');
    }
}