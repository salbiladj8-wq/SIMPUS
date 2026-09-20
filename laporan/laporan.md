# Laporan Perubahan Jobsheet 7 ke Jobsheet 8

## 1. Tujuan Perubahan

Pada Jobsheet 7, data buku dan anggota masih disimpan menggunakan `$_SESSION`. Pada Jobsheet 8, data diubah agar tersimpan secara permanen pada database PostgreSQL. Koneksi database menggunakan PDO dan data dikelola dengan perintah SQL seperti `INSERT`, `SELECT`, dan `COUNT`.

---

## 2. Penambahan File `sql/01_buku_anggota.sql`

File ini digunakan untuk membuat tabel database yang dibutuhkan oleh SIMPUS-Mini, yaitu tabel `buku` dan `anggota`.

Perubahan utama:

* Menambahkan tabel `buku`.
* Menambahkan tabel `anggota`.
* Menentukan struktur kolom dan tipe data.
* `id` digunakan sebagai identitas data.

Dengan adanya file ini, database dapat digunakan untuk menyimpan data buku dan anggota.

---

## 3. Penambahan File `includes/koneksi.php`

File `koneksi.php` digunakan untuk menghubungkan aplikasi PHP dengan PostgreSQL menggunakan PDO.

Perubahan utama:

* Menggunakan `PDO`.
* Menggunakan driver `pgsql`.
* Terhubung ke database `simpus_mini`.
* Menyediakan koneksi yang dapat digunakan oleh file PHP lainnya.

Jadi, pada JS8 aplikasi tidak lagi hanya menggunakan session sebagai tempat penyimpanan data.

---

## 4. Perubahan `buku/proses_tambah.php`

Pada JS7, data buku disimpan ke dalam session menggunakan:

```php
$_SESSION['buku'][] = [
    ...
];
```

Pada JS8, bagian tersebut diganti dengan perintah `INSERT` ke database.

Perubahan utama:

* Data dari form tetap diambil menggunakan `$_POST`.
* Validasi judul, pengarang, tahun, dan stok tetap digunakan.
* Data disimpan menggunakan prepared statement.
* Data dimasukkan ke tabel `buku`.
* `RETURNING id` digunakan untuk mendapatkan ID data yang baru ditambahkan.

Dengan demikian, data buku tetap tersimpan walaupun session berakhir.

---

## 5. Perubahan `anggota/proses_tambah.php`

Pada JS7, data anggota ditambahkan ke session:

```php
$_SESSION['anggota'][] = [
    ...
];
```

Pada JS8, data anggota disimpan langsung ke tabel `anggota` menggunakan `INSERT`.

Perubahan utama:

* Data tetap diperoleh dari `$_POST`.
* Validasi nama dan nomor anggota tetap digunakan.
* Data disimpan menggunakan prepared statement.
* Data dimasukkan ke database PostgreSQL.
* ID data yang baru dibuat dapat diperoleh menggunakan `RETURNING id`.

---

## 6. Perubahan `buku/list.php`

Pada JS7, daftar buku berasal dari:

```php
$daftarBuku = $_SESSION['buku'];
```

Pada JS8, data diambil dari database menggunakan:

```sql
SELECT * FROM buku ORDER BY id DESC
```

Perubahan utama:

* Tidak lagi membuat data awal menggunakan `$_SESSION['buku']`.
* Data buku diambil langsung dari PostgreSQL.
* Data diurutkan berdasarkan `id` dari yang terbaru.
* Tampilan tabel, pencarian, tombol Edit dan Hapus tetap mengikuti JS7.

Jadi, yang berubah hanya sumber datanya, sedangkan desain halaman tetap sama.

---

## 7. Perubahan `anggota/list.php`

Pada JS7, daftar anggota menggunakan:

```php
$daftarAnggota = $_SESSION['anggota'];
```

Pada JS8, daftar anggota diambil dari database menggunakan:

```sql
SELECT * FROM anggota ORDER BY id DESC
```

Perubahan utama:

* Data session anggota dihapus.
* Data diambil langsung dari PostgreSQL.
* Data ditampilkan berdasarkan ID terbaru.
* Tampilan tabel dan fitur pencarian tetap menggunakan desain JS7.

---

## 8. Perubahan `index.php`

Pada JS7, jumlah buku dan anggota dihitung dari session:

```php
$totalBuku = count($_SESSION['buku'] ?? []);
$totalAnggota = count($_SESSION['anggota'] ?? []);
```

Pada JS8, jumlah data dihitung langsung dari database menggunakan:

```sql
SELECT COUNT(*) FROM buku
```

dan

```sql
SELECT COUNT(*) FROM anggota
```

Perubahan ini membuat jumlah pada halaman Beranda sesuai dengan data yang sebenarnya tersimpan di database.

Bagian tampilan seperti **Selamat Datang**, kartu **Total Buku**, **Total Anggota**, dan **Sedang Dipinjam** tetap dipertahankan.

---

## 9. File yang Tidak Berubah

Beberapa file dari JS7 tidak perlu diubah karena tidak berhubungan langsung dengan penyimpanan data, yaitu:

* `buku/tambah.php`
* `anggota/tambah.php`
* `includes/header.php`
* `includes/footer.php`
* `assets/css/style.css`
* `assets/js/app.js`

Form tetap mengirim data menggunakan `POST`, sedangkan desain, warna, navigasi, validasi JavaScript, dan tampilan aplikasi tetap menggunakan hasil dari JS7.

---

## 10. Kesimpulan

Perubahan utama dari JS7 ke JS8 adalah **sumber penyimpanan data**. JS7 menggunakan `$_SESSION`, sedangkan JS8 menggunakan **database PostgreSQL**.

Alur JS8 menjadi:

**Form → PHP → Validasi → PDO → PostgreSQL → SELECT → Tampilan**

Dengan perubahan ini, data buku dan anggota menjadi lebih permanen dan dapat digunakan kembali ketika aplikasi dijalankan.