<?php
// ============================================
// HALAMAN TENTANG TOKO
// ============================================
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/fungsi.php';

$judulHalaman = "Tentang";
$halamanAktif = "tentang.php";

$profil = [
    "Alamat"      => "Jl.  menuju kesuksesan di instiki No. 12, Bali",
    "Jam buka"    => "Senin - Sabtu, 08.00 - 20.00 WITA",
    "Telepon"     => "(0361) 123-456",
    "Email"       => "halo@tintakita.example",
];

$layanan = [
    ["✏️", "Alat Tulis Lengkap", "Dari pulpen hingga pensil gambar untuk sekolah dan kantor."],
    ["📦", "Pesan Antar",        "Pengiriman area kota dengan biaya terjangkau."],
    ["🖨️", "Fotokopi & Jilid",   "Layanan cetak, fotokopi, dan jilid dokumen cepat."],
    ["🏷️", "Harga Grosir",       "Potongan khusus untuk pembelian dalam jumlah besar."],
];

require __DIR__ . '/includes/header.php';
?>

<h1 class="text-3xl font-bold mb-1">Tentang <?= e($namaToko) ?></h1>
<p class="text-slate-500 mb-6">Toko alat tulis dan perlengkapan kantor terpercaya sejak 2015.</p>

<div class="grid md:grid-cols-2 gap-6">
    <section class="bg-white rounded-xl shadow p-5">
        <h2 class="font-semibold text-lg mb-3">Informasi Toko</h2>
        <dl class="space-y-2 text-sm">
            <?php foreach ($profil as $label => $isi): ?>
                <div class="flex gap-3">
                    <dt class="w-24 text-slate-500"><?= e($label) ?></dt>
                    <dd class="flex-1"><?= e($isi) ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>
    </section>

    <section class="bg-white rounded-xl shadow p-5">
        <h2 class="font-semibold text-lg mb-3">Layanan Kami</h2>
        <ul class="space-y-3 text-sm">
            <?php foreach ($layanan as [$ikon, $judul, $deskripsi]): ?>
                <li class="flex gap-3">
                    <span class="text-2xl"><?= $ikon ?></span>
                    <div>
                        <p class="font-medium"><?= e($judul) ?></p>
                        <p class="text-slate-500"><?= e($deskripsi) ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
