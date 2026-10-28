<?php
// ============================================
// FUNGSI-FUNGSI BANTU
// ============================================

function formatRupiah(float $angka): string
{
    return "Rp " . number_format($angka, 0, ",", ".");
}

function hargaSetelahDiskon(float $harga, int $diskon): float
{
    return $harga - ($harga * $diskon / 100);
}

function labelStok(int $stok): string
{
    if ($stok === 0) return "Stok habis";
    if ($stok <= 10) return "Stok menipis ($stok)";
    return "Tersedia ($stok)";
}

function warnaStok(int $stok): string
{
    if ($stok === 0) return "bg-red-100 text-red-700";
    if ($stok <= 10) return "bg-amber-100 text-amber-700";
    return "bg-green-100 text-green-700";
}

function hitungProdukDiskon(array $produk): int
{
    $jumlah = 0;
    foreach ($produk as $item) {
        if ($item["diskon"] > 0) $jumlah++;
    }
    return $jumlah;
}

function hitungNilaiStok(array $produk): float
{
    $total = 0;
    foreach ($produk as $item) {
        $total += hargaSetelahDiskon($item["harga"], $item["diskon"]) * $item["stok"];
    }
    return $total;
}

function cariProdukTermurah(array $produk): array
{
    $termurah = null;
    foreach ($produk as $item) {
        $akhir = hargaSetelahDiskon($item["harga"], $item["diskon"]);
        if ($termurah === null || $akhir < hargaSetelahDiskon($termurah["harga"], $termurah["diskon"])) {
            $termurah = $item;
        }
    }
    return $termurah;
}

function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, "UTF-8");
}
