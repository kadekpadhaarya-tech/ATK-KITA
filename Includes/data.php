<?php
// ============================================
// DATA PRODUK (array multidimensi)
// Key = kode produk
// ============================================

$namaToko = "Tinta Kita";

$produk = [
    "ATK-001" => ["nama" => "Pulpen Gel 0.5mm (Hitam)",  "kategori" => "Alat Tulis", "harga" => 5000,   "diskon" => 0,  "stok" => 120, "ikon" => "assets/products/pulpen-gel.svg"],
    "ATK-002" => ["nama" => "Pensil 2B (Isi 12)",        "kategori" => "Alat Tulis", "harga" => 28000,  "diskon" => 10, "stok" => 45,  "ikon" => "assets/products/pensil-2b.svg"],
    "BKU-001" => ["nama" => "Buku Tulis A5 80 Lembar",   "kategori" => "Buku",       "harga" => 12000,  "diskon" => 0,  "stok" => 8,   "ikon" => "assets/products/buku-tulis.svg"],
    "BKU-002" => ["nama" => "Binder Notebook B5",        "kategori" => "Buku",       "harga" => 65000,  "diskon" => 15, "stok" => 0,   "ikon" => "assets/products/binder.svg"],
    "KTR-001" => ["nama" => "Stapler Besar + Isi",       "kategori" => "Perlengkapan Kantor", "harga" => 45000, "diskon" => 0, "stok" => 22, "ikon" => "assets/products/stapler.svg"],
    "KTR-002" => ["nama" => "Map Plastik Folder (Isi 10)", "kategori" => "Perlengkapan Kantor", "harga" => 35000, "diskon" => 20, "stok" => 5, "ikon" => "assets/products/map-folder.svg"],
    "SNI-001" => ["nama" => "Set Cat Air 12 Warna",      "kategori" => "Seni",       "harga" => 55000,  "diskon" => 0,  "stok" => 30,  "ikon" => "assets/products/cat-air.svg"],
    "SNI-002" => ["nama" => "Spidol Warna (Isi 24)",     "kategori" => "Seni",       "harga" => 90000,  "diskon" => 25, "stok" => 14,  "ikon" => "assets/products/spidol.svg"],
];

// Contoh isi keranjang untuk halaman pesanan: kode => jumlah
$keranjang = [
    "ATK-001" => 10,
    "BKU-001" => 5,
    "KTR-001" => 2,
    "SNI-002" => 1,
];
