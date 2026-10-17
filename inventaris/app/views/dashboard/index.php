<?php
declare(strict_types=1);

function dashboardEscape(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Inventaris</title>
    <style>
        *{box-sizing:border-box}
        body{margin:0;background:#f4f7fb;color:#172033;font:15px/1.6 Arial,sans-serif}
        header{background:#173b72;color:white;padding:24px 6%}
        header h1{margin:0;font-size:25px}
        header p{margin:4px 0 0;color:#dbeafe}
        main{max-width:1100px;margin:32px auto;padding:0 20px}
        .stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(190px,1fr));gap:16px}
        .card{background:white;border-radius:12px;padding:22px;box-shadow:0 3px 14px #1720330d}
        .label{color:#64748b;font-size:14px}
        .number{font-size:32px;font-weight:700;margin-top:5px}
        h2{font-size:20px;margin:30px 0 14px}
        .table-wrap{overflow-x:auto;background:white;border-radius:12px}
        table{width:100%;border-collapse:collapse;min-width:650px}
        th,td{text-align:left;padding:13px 16px;border-bottom:1px solid #e8edf4}
        th{background:#edf3fb;color:#334155}
        .low{color:#b42318;font-weight:700}
        .normal{color:#18794e;font-weight:700}
        footer{text-align:center;padding:24px;color:#64748b}
    </style>
</head>
<body>
<header>
    <h1>Inventaris</h1>
    <p>Dashboard manajemen barang dan stok</p>
</header>
<main>
    <section class="stats">
        <div class="card"><div class="label">Total Barang</div><div class="number"><?= dashboardEscape($stats['items']) ?></div></div>
        <div class="card"><div class="label">Kategori</div><div class="number"><?= dashboardEscape($stats['categories']) ?></div></div>
        <div class="card"><div class="label">Transaksi</div><div class="number"><?= dashboardEscape($stats['transactions']) ?></div></div>
        <div class="card"><div class="label">Barang Stok Rendah</div><div class="number"><?= dashboardEscape($stats['lowStock']) ?></div></div>
    </section>

    <h2>Daftar Barang</h2>
    <div class="table-wrap">
        <table>
            <thead><tr><th>Kode</th><th>Nama Barang</th><th>Kategori</th><th>Stok</th><th>Minimum</th><th>Status</th></tr></thead>
            <tbody>
            <?php foreach ($items as $item): ?>
                <?php $isLow = (int) $item['stock'] <= (int) $item['minimum_stock']; ?>
                <tr>
                    <td><?= dashboardEscape($item['code']) ?></td>
                    <td><?= dashboardEscape($item['name']) ?></td>
                    <td><?= dashboardEscape($item['category_name'] ?? '-') ?></td>
                    <td><?= dashboardEscape($item['stock']) ?> <?= dashboardEscape($item['unit']) ?></td>
                    <td><?= dashboardEscape($item['minimum_stock']) ?></td>
                    <td class="<?= $isLow ? 'low' : 'normal' ?>"><?= $isLow ? 'Stok Rendah' : 'Aman' ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<footer>Inventaris · PHP MVC · MySQL</footer>
</body>
</html>