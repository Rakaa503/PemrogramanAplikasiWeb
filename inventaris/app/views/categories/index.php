<?php
$pageTitle = 'Kategori';
require ROOT_PATH . '/app/views/layouts/header.php';
?>
<section class="panel">
    <h2>Tambah Kategori</h2>
    <form method="post" action="<?= e(url('categories/create')) ?>">
        <label for="name">Nama kategori</label>
        <input id="name" name="name" maxlength="100" required>
        <label for="description">Deskripsi (opsional)</label>
        <textarea id="description" name="description" rows="3"></textarea>
        <button type="submit">Tambah Kategori</button>
    </form>
</section>

<section class="panel">
    <h2>Daftar Kategori</h2>
    <p class="muted">Kategori yang sudah ada tetap dipertahankan.</p>
    <div class="table-wrap">
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Deskripsi</th><th>Aksi</th></tr></thead>
            <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= e($category['id']) ?></td>
                    <td><?= e($category['name']) ?></td>
                    <td><?= e($category['description'] ?? '-') ?></td>
                    <td>
                        <a class="button" href="<?= e(url('categories/edit/' . $category['id'])) ?>">Edit</a>
                        <form method="post" action="<?= e(url('categories/delete/' . $category['id'])) ?>" style="display:inline" onsubmit="return confirm('Hapus kategori ini?')">
                            <button class="danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (!$categories): ?>
                <tr><td colspan="4">Belum ada kategori.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
<?php require ROOT_PATH . '/app/views/layouts/footer.php'; ?>