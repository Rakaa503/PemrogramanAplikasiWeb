<?php
declare(strict_types=1);
require ROOT_PATH . '/app/views/layouts/header.php';
?>

<div class="page-heading">
    <div>
        <h1>Data Barang</h1>
        <p>Kelola inventaris barang yang tersimpan di database.</p>
    </div>
    <a class="button" href="<?= e(url('items/create')) ?>">+ Tambah Barang</a>
</div>

<?php if ($message = ($_SESSION['flash'] ?? null)): ?>
    <div class="alert">
        <?= e($message['message'] ?? $message['text'] ?? '') ?>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<form method="get" action="<?= e(url('items')) ?>" class="filter-form">
    <input
        type="text"
        name="search"
        placeholder="Cari nama atau kode barang..."
        value="<?= e($search ?? '') ?>"
    >

    <select name="category_id">
        <option value="">Semua kategori</option>
        <?php foreach ($categories as $category): ?>
            <option
                value="<?= (int) $category['id'] ?>"
                <?= (string) ($selectedCategory ?? '') === (string) $category['id'] ? 'selected' : '' ?>
            >
                <?= e($category['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Cari</button>
    <a href="<?= e(url('items')) ?>">Reset</a>
</form>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Stok Minimum</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($items)): ?>
            <tr>
                <td colspan="7">Belum ada barang yang cocok dengan pencarian.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= e($item['code']) ?></td>
                    <td><?= e($item['name']) ?></td>
                    <td><?= e($item['category_name'] ?? 'Tanpa kategori') ?></td>
                    <td>
                        <?= (int) $item['stock'] ?> <?= e($item['unit']) ?>
                        <?php if ((int) $item['stock'] <= (int) $item['minimum_stock']): ?>
                            <span class="status-low">Stok rendah</span>
                        <?php endif; ?>
                    </td>
                    <td><?= (int) $item['minimum_stock'] ?></td>
                    <td>Rp <?= number_format((float) $item['price'], 0, ',', '.') ?></td>
                    <td class="actions">
                        <a href="<?= e(url('items/edit/' . (int) $item['id'])) ?>">Edit</a>
                        <form method="post"
                              action="<?= e(url('items/delete/' . (int) $item['id'])) ?>"
                              onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                            <button type="submit" class="button-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require ROOT_PATH . '/app/views/layouts/footer.php'; ?>