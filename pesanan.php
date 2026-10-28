<?php
// ============================================
// HALAMAN NOTA PESANAN
// ============================================
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/fungsi.php';

$judulHalaman = "Pesanan";
$halamanAktif = "pesanan.php";

$subtotal = 0;
$baris = [];
foreach ($keranjang as $kode => $qty) {
    if (!isset($produk[$kode])) continue;
    $item      = $produk[$kode];
    $hargaSatu = hargaSetelahDiskon($item["harga"], $item["diskon"]);
    $jumlah    = $hargaSatu * $qty;
    $subtotal += $jumlah;
    $baris[] = ["kode" => $kode, "nama" => $item["nama"], "harga" => $hargaSatu, "qty" => $qty, "jumlah" => $jumlah];
}

// Diskon belanja tambahan
$persenDiskonBelanja = 0;
if ($subtotal >= 200000)      $persenDiskonBelanja = 10;
elseif ($subtotal >= 100000)  $persenDiskonBelanja = 5;

$potongan  = $subtotal * $persenDiskonBelanja / 100;
$totalBayar = $subtotal - $potongan;

require __DIR__ . '/includes/header.php';
?>

<h1 class="text-3xl font-bold mb-1">Nota Pesanan</h1>
<p class="text-slate-500 mb-6">Tanggal: <?= date("d-m-Y") ?></p>

<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-left text-slate-500">
            <tr>
                <th class="p-3">Kode</th>
                <th class="p-3">Produk</th>
                <th class="p-3 text-right">Harga</th>
                <th class="p-3 text-center">Qty</th>
                <th class="p-3 text-right">Jumlah</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($baris as $b): ?>
            <tr class="border-t">
                <td class="p-3"><?= e($b["kode"]) ?></td>
                <td class="p-3"><?= e($b["nama"]) ?></td>
                <td class="p-3 text-right"><?= formatRupiah($b["harga"]) ?></td>
                <td class="p-3 text-center"><?= $b["qty"] ?></td>
                <td class="p-3 text-right"><?= formatRupiah($b["jumlah"]) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot class="border-t">
            <tr>
                <td colspan="4" class="p-3 text-right text-slate-500">Subtotal</td>
                <td class="p-3 text-right"><?= formatRupiah($subtotal) ?></td>
            </tr>
            <tr>
                <td colspan="4" class="p-3 text-right text-slate-500">Diskon belanja (<?= $persenDiskonBelanja ?>%)</td>
                <td class="p-3 text-right text-red-600">- <?= formatRupiah($potongan) ?></td>
            </tr>
            <tr class="bg-emerald-50">
                <td colspan="4" class="p-3 text-right font-bold">Total bayar</td>
                <td class="p-3 text-right font-bold text-emerald-700 text-lg"><?= formatRupiah($totalBayar) ?></td>
            </tr>
        </tfoot>
    </table>
</div>

<p class="text-xs text-slate-500 mt-3">* Belanja &ge; Rp 100.000 diskon 5%, &ge; Rp 200.000 diskon 10%.</p>

<?php require __DIR__ . '/includes/footer.php'; ?>
