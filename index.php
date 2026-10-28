<?php
// ============================================
// HALAMAN KATALOG PRODUK
// ============================================
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/fungsi.php';

$judulHalaman = "Katalog";
$halamanAktif = "index.php";

// Ringkasan toko
$jumlahProduk  = count($produk);
$jumlahDiskon  = hitungProdukDiskon($produk);
$nilaiStok     = hitungNilaiStok($produk);
$rataRataHarga = array_sum(array_column($produk, 'harga')) / count($produk);
$termurah      = cariProdukTermurah($produk);

// Filter kategori via GET (?kategori=Buku)
$kategoriDipilih = $_GET['kategori'] ?? "";

// Jumlah produk per kategori
$jumlahPerKategori = [];
foreach ($produk as $item) {
    $kat = $item["kategori"];
    $jumlahPerKategori[$kat] = ($jumlahPerKategori[$kat] ?? 0) + 1;
}

require __DIR__ . '/includes/header.php';
?>

<h1 class="text-3xl font-bold mb-1">Katalog Produk</h1>
<p class="text-slate-500 mb-2">Lengkapi kebutuhan menulis, belajar, dan bekerja Anda.</p>
<p class="text-sm text-slate-600 mb-6">
    Rata-rata harga produk: <span class="font-semibold text-emerald-700"><?= formatRupiah($rataRataHarga) ?></span>
</p>

<!-- Ringkasan -->
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-xl shadow p-4">
        <p class="text-sm text-slate-500">Jumlah produk</p>
        <p class="text-2xl font-bold"><?= $jumlahProduk ?></p>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
        <p class="text-sm text-slate-500">Sedang diskon</p>
        <p class="text-2xl font-bold"><?= $jumlahDiskon ?> produk</p>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
        <p class="text-sm text-slate-500">Total nilai stok</p>
        <p class="text-2xl font-bold"><?= formatRupiah($nilaiStok) ?></p>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
        <p class="text-sm text-slate-500">Produk termurah</p>
        <p class="text-lg font-bold"><?= e($termurah['nama']) ?></p>
    </div>
</div>

<!-- Filter kategori -->
<div class="mb-6 text-sm text-slate-600 font-medium flex flex-wrap items-center gap-x-2 gap-y-1">
    <span>Kategori:</span>
    <?php foreach ($jumlahPerKategori as $kategori => $jumlah): ?>
        <a href="?kategori=<?= urlencode($kategori) ?>"
           class="hover:underline <?= $kategori === $kategoriDipilih ? 'text-emerald-700 font-bold' : '' ?>">
            <?= e($kategori) ?> (<?= $jumlah ?>)
        </a>
        <span>&middot;</span>
    <?php endforeach; ?>
    <a href="index.php" class="px-2 py-0.5 rounded-full <?= $kategoriDipilih !== '' ? 'text-red-700 bg-red-100' : 'text-slate-500 bg-slate-200' ?>">
        <?= $kategoriDipilih !== '' ? '&times; Reset' : 'Semua' ?>
    </a>
</div>

<!-- Daftar produk -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
<?php foreach ($produk as $kode => $item): ?>
    <?php
    if ($kategoriDipilih !== "" && $kategoriDipilih !== $item['kategori']) continue;
    $hargaAkhir = hargaSetelahDiskon($item["harga"], $item["diskon"]);
    ?>
    <article class="bg-white rounded-xl shadow overflow-hidden flex flex-col">
        <div class="bg-slate-50 relative h-48">
            <img src="<?= e($item["ikon"]) ?>" alt="<?= e($item["nama"]) ?>" class="w-full h-full object-cover">
            <?php if ($item["diskon"] > 0): ?>
                <span class="absolute top-3 left-3 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                    -<?= $item["diskon"] ?>%
                </span>
            <?php endif; ?>
        </div>
        <div class="p-4 flex flex-col flex-1">
            <p class="text-xs text-slate-500"><?= e($kode) ?> &middot; <?= e($item["kategori"]) ?></p>
            <h2 class="font-semibold text-lg mb-2"><?= e($item["nama"]) ?></h2>
            <?php if ($item["diskon"] > 0): ?>
                <p class="text-sm text-slate-400 line-through"><?= formatRupiah($item["harga"]) ?></p>
            <?php endif; ?>
            <p class="text-xl font-bold text-emerald-700 mb-3"><?= formatRupiah($hargaAkhir) ?></p>
            <span class="mt-auto self-start text-xs font-semibold px-2 py-1 rounded-full <?= warnaStok($item["stok"]) ?>">
                <?= labelStok($item["stok"]) ?>
            </span>
        </div>
    </article>
<?php endforeach; ?>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
