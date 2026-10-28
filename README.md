# Katalog Produk Toko Alat Tulis "Tinta Kita"

Aplikasi web katalog produk dengan **PHP Native** dan **Tailwind CSS (CDN)**.

## Fitur
- Katalog produk dinamis (stok, badge diskon, harga akhir)
- Ringkasan: jumlah produk, produk diskon, nilai stok, produk termurah, rata-rata harga
- Filter kategori via GET (`index.php?kategori=Buku`) + jumlah produk per kategori
- Nota pesanan dengan diskon belanja bertingkat
- Halaman Tentang Toko

## Menjalankan
```
php -S localhost:8000
```
Lalu buka http://localhost:8000

## Struktur
```
includes/  data.php, fungsi.php, header.php, footer.php
assets/products/  gambar produk
index.php  pesanan.php  tentang.php
```
