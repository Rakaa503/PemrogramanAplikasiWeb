<?php
declare(strict_types=1);

class ItemsController extends Controller
{
    public function index(): void
    {
        $itemModel = $this->model('Item');
        $categoryModel = $this->model('Category');

        $search = trim((string) ($_GET['search'] ?? ''));
        $categoryId = isset($_GET['category_id']) && $_GET['category_id'] !== ''
            ? (int) $_GET['category_id']
            : null;

        $this->view('items/index', [
            'items' => $itemModel->getAll($search, $categoryId),
            'categories' => $categoryModel->getAll(),
            'search' => $search,
            'selectedCategory' => $categoryId,
        ]);
    }

    public function create(): void
    {
        $categories = $this->model('Category')->getAll();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->view('items/create', ['categories' => $categories]);
            return;
        }

        $data = $this->validatedData();

        if (isset($data['error'])) {
            $this->flash('error', $data['error']);
            $this->redirect('items/create');
        }

        try {
            $this->model('Item')->create($data);
            $this->flash('success', 'Barang berhasil ditambahkan.');
            $this->redirect('items');
        } catch (PDOException $exception) {
            $this->flash(
                'error',
                (string) $exception->getCode() === '23000'
                    ? 'Kode barang sudah digunakan atau kategori tidak valid.'
                    : 'Barang gagal disimpan. Periksa data yang dimasukkan.'
            );
            $this->redirect('items/create');
        }
    }

    public function edit(string $id = ''): void
    {
        $item = $this->model('Item')->findById((int) $id);

        if (!$item) {
            http_response_code(404);
            echo 'Barang tidak ditemukan.';
            return;
        }

        $this->view('items/edit', [
            'item' => $item,
            'categories' => $this->model('Category')->getAll(),
        ]);
    }

    public function update(string $id = ''): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('items');
        }

        $id = (int) $id;
        $data = $this->validatedData();

        if ($id < 1 || isset($data['error'])) {
            $this->flash('error', $data['error'] ?? 'ID barang tidak valid.');
            $this->redirect('items');
        }

        try {
            $this->model('Item')->update($id, $data);
            $this->flash('success', 'Data barang berhasil diperbarui.');
        } catch (PDOException $exception) {
            $this->flash(
                'error',
                (string) $exception->getCode() === '23000'
                    ? 'Kode barang sudah digunakan atau kategori tidak valid.'
                    : 'Data barang gagal diperbarui.'
            );
        }

        $this->redirect('items');
    }

    public function delete(string $id = ''): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('items');
        }

        $id = (int) $id;

        if ($id < 1) {
            $this->flash('error', 'ID barang tidak valid.');
            $this->redirect('items');
        }

        try {
            $deleted = $this->model('Item')->delete($id);
            $this->flash(
                $deleted ? 'success' : 'error',
                $deleted ? 'Barang berhasil dihapus.' : 'Barang tidak ditemukan.'
            );
        } catch (PDOException $exception) {
            $this->flash(
                'error',
                'Barang tidak bisa dihapus karena memiliki transaksi terkait.'
            );
        }

        $this->redirect('items');
    }

    private function validatedData(): array
    {
        $code = trim((string) ($_POST['code'] ?? ''));
        $name = trim((string) ($_POST['name'] ?? ''));
        $categoryInput = trim((string) ($_POST['category_id'] ?? ''));
        $description = trim((string) ($_POST['description'] ?? ''));
        $stockInput = trim((string) ($_POST['stock'] ?? '0'));
        $minimumInput = trim((string) ($_POST['minimum_stock'] ?? '0'));
        $unit = trim((string) ($_POST['unit'] ?? ''));
        $priceInput = trim((string) ($_POST['price'] ?? '0'));

        if ($code === '' || $name === '' || $unit === '') {
            return ['error' => 'Kode, nama barang, dan satuan wajib diisi.'];
        }

        if (strlen($code) > 50 || strlen($name) > 150 || strlen($unit) > 30) {
            return ['error' => 'Kode, nama, atau satuan melebihi batas karakter.'];
        }

        if (!ctype_digit($stockInput) || !ctype_digit($minimumInput)) {
            return ['error' => 'Stok dan stok minimum harus berupa bilangan bulat nonnegatif.'];
        }

        if (!is_numeric($priceInput) || (float) $priceInput < 0) {
            return ['error' => 'Harga harus berupa angka nonnegatif.'];
        }

        $categoryId = null;

        if ($categoryInput !== '') {
            if (!ctype_digit($categoryInput) || (int) $categoryInput < 1) {
                return ['error' => 'Kategori tidak valid.'];
            }

            $categoryId = (int) $categoryInput;
        }

        return [
            'category_id' => $categoryId,
            'code' => $code,
            'name' => $name,
            'description' => $description !== '' ? $description : null,
            'stock' => (int) $stockInput,
            'minimum_stock' => (int) $minimumInput,
            'unit' => $unit,
            'price' => (float) $priceInput,
        ];
    }
}