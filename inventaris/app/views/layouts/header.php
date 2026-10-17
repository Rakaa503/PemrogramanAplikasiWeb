<?php
$pageTitle = $pageTitle ?? 'Inventaris';
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?> | Inventaris</title>
    <style>
        *{box-sizing:border-box}
        body{margin:0;background:#f4f7fb;color:#172033;font:15px/1.6 Arial,sans-serif}
        header{background:#173b72;color:white;padding:18px 5%}
        header h1{margin:0;font-size:23px}
        nav{display:flex;gap:18px;flex-wrap:wrap;margin-top:10px}
        nav a{color:white;text-decoration:none}
        nav a:hover{text-decoration:underline}
        main{max-width:1100px;margin:28px auto;padding:0 20px}
        .panel{background:white;padding:22px;border-radius:12px;box-shadow:0 3px 14px #1720330d;margin-bottom:20px}
        .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:18px}
        input,textarea{width:100%;padding:11px;border:1px solid #cbd5e1;border-radius:7px;margin:5px 0 14px;font:inherit}
        button,.button{display:inline-block;background:#173b72;color:white;border:0;padding:10px 15px;border-radius:7px;text-decoration:none;cursor:pointer;font:inherit}
        .danger{background:#b42318}.muted{color:#64748b}
        .alert{padding:12px 16px;border-radius:8px;margin-bottom:18px;background:#e8f7ed;color:#17663a}
        .alert.error{background:#fff0f0;color:#a61b1b}
        .table-wrap{overflow-x:auto}
        table{width:100%;border-collapse:collapse;min-width:550px}
        th,td{text-align:left;padding:12px;border-bottom:1px solid #e8edf4}
        th{background:#edf3fb}
        footer{text-align:center;padding:24px;color:#64748b}
    </style>
</head>
<body>
<header>
    <h1>Inventaris</h1>
    <nav>
        <a href="<?= e(url('dashboard')) ?>">Dashboard</a>
        <a href="<?= e(url('categories')) ?>">Kategori</a>
        <a href="<?= e(url('items')) ?>">Barang</a>
        <a href="<?= e(url('transactions')) ?>">Transaksi</a>
    </nav>
</header>
<main>
<?php if (is_array($flash)): ?>
    <div class="alert <?= ($flash['type'] ?? '') === 'error' ? 'error' : '' ?>">
        <?= e($flash['message'] ?? '') ?>
    </div>
<?php endif; ?>