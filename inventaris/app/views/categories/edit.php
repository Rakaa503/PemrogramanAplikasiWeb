<?php
$pageTitle = 'Edit Kategori';
require ROOT_PATH . '/app/views/layouts/header.php';
?>
<section class="panel">
    <h2>Edit Kategori</h2>
    <form method="post" action="<?= e(url('categories/update/' . $category['id'])) ?>">
        <label for="name">Nama kategori</label>
        <input id="name" name="name" maxlength="100" required value="<?= e($category['name']) ?>">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" rows="4"><?= e($category['description'] ?? '') ?></textarea>
        <button type="submit">Simpan Perubahan</button>
        <a class="button" href="<?= e(url('categories')) ?>">Batal</a>
    </form>
</section>
<?php require ROOT_PATH . '/app/views/layouts/footer.php'; ?>