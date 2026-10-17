<?php
declare(strict_types=1);
require ROOT_PATH . '/app/views/layouts/header.php';
?>

<div class="page-heading">
    <div>
        <h1>Edit Barang</h1>
        <p>Perbarui informasi barang.</p>
    </div>
    <a href="<?= e(url('items')) ?>">← Kembali</a>
</div>

<form method="post" action="<?= e(url('items/update/' . (int) $item['id'])) ?>" class="item-form">
    <label for="code">Kode Barang *</label>
    <input id="code" name="code" maxlength="50" required value="<?= e($item['code']) ?>">

    <label for="name">Nama Barang *</label>
    <input id="name" name="name" maxlength="150" required value="<?= e($item['name']) ?>">

    <label for="category_id">Kategori</label>
    <select id="category_id" name="category_id">
        <option value="">Tanpa kategori</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= (int) $category['id'] ?>"
                <?= (string) ($item['category_id'] ?? '') === (string) $category['id'] ? 'selected' : '' ?>>
                <?= e($category['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="description">Deskripsi</label>
    <textarea id="description" name="description" rows="3"><?= e($item['description'] ?? '') ?></textarea>

    <div class="form-grid">
        <div>
            <label for="stock">Stok *</label>
            <input id="stock" type="number" name="stock" min="0" required value="<?= (int) $item['stock'] ?>">
        </div>
        <div>
            <label for="minimum_stock">Stok minimum *</label>
            <input id="minimum_stock" type="number" name="minimum_stock" min="0" required value="<?= (int) $item['minimum_stock'] ?>">
        </div>
        <div>
            <label for="unit">Satuan *</label>
            <input id="unit" name="unit" maxlength="30" required value="<?= e($item['unit']) ?>">
        </div>
        <div>
            <label for="price">Harga satuan (Rp) *</label>
            <input id="price" type="number" name="price" min="0" step="0.01" required value="<?= e($item['price']) ?>">
        </div>
    </div>

    <div class="form-actions">
        <button type="submit">Simpan Perubahan</button>
        <a href="<?= e(url('items')) ?>">Batal</a>
    </div>
</form>

<?php require ROOT_PATH . '/app/views/layouts/footer.php'; ?>