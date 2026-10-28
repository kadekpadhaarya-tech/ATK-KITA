<?php
$menu = [
    "index.php"   => "Katalog",
    "pesanan.php" => "Pesanan",
    "tentang.php" => "Tentang",
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($judulHalaman) ?> | <?= e($namaToko) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen flex flex-col">
<nav class="bg-white shadow">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
        <a href="index.php" class="text-xl font-bold text-emerald-700">✏️ <?= e($namaToko) ?></a>
        <ul class="flex gap-4 text-sm font-medium">
            <?php foreach ($menu as $file => $label): ?>
                <li>
                    <a href="<?= $file ?>"
                       class="px-3 py-1.5 rounded-lg <?= $file === $halamanAktif ? 'bg-emerald-600 text-white' : 'hover:bg-slate-100' ?>">
                        <?= $label ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
<main class="max-w-6xl mx-auto px-4 py-8 flex-1 w-full">
