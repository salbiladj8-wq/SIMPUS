# Wireframe & User Flow — SIMPUS-Mini

SIMPUS-Mini merupakan aplikasi perpustakaan sederhana untuk mengelola data buku dan anggota perpustakaan. Pada Jobsheet 8, aplikasi dikembangkan dengan menghubungkan data buku dan anggota ke database PostgreSQL sehingga data dapat tersimpan secara permanen.

## 1. Struktur Navigasi

```text
                    [ Beranda ]
                         |
          +--------------+--------------+
          |                             |
    [ Daftar Buku ]               [ Daftar Anggota ]
          |                             |
    [ Tambah Buku ]              [ Tambah Anggota ]
```

Menu utama:

* Beranda
* Daftar Buku
* Tambah Buku
* Daftar Anggota
* Tambah Anggota

---

## 2. User Flow — Tambah Buku

```text
[ Beranda / Daftar Buku ]
            |
            v
      [ Tambah Buku ]
            |
            v
        [ Isi Form ]
            |
            v
       [ Klik Simpan ]
            |
            v
      [ Validasi PHP ]
         /       \
      Gagal     Berhasil
        |           |
        v           v
 [Flash Error] [INSERT Buku]
                    |
                    v
             [ Database PostgreSQL ]
                    |
                    v
              [ Daftar Buku ]
```

Proses tambah buku:

1. Pengguna membuka halaman Tambah Buku.
2. Pengguna mengisi data buku.
3. Data dikirim menggunakan metode `POST`.
4. Data divalidasi oleh PHP.
5. Jika data tidak valid, ditampilkan flash message error.
6. Jika valid, data disimpan ke tabel `buku` pada PostgreSQL menggunakan `INSERT` dan prepared statement.
7. Setelah berhasil, pengguna diarahkan ke halaman Daftar Buku.

---

## 3. User Flow — Tambah Anggota

```text
[ Beranda / Daftar Anggota ]
             |
             v
      [ Tambah Anggota ]
             |
             v
         [ Isi Form ]
             |
             v
        [ Klik Simpan ]
             |
             v
       [ Validasi PHP ]
          /       \
       Gagal     Berhasil
         |           |
         v           v
  [Flash Error] [INSERT Anggota]
                     |
                     v
              [ Database PostgreSQL ]
                     |
                     v
              [ Daftar Anggota ]
```

Proses tambah anggota:

1. Pengguna membuka halaman Tambah Anggota.
2. Pengguna mengisi data anggota.
3. Data dikirim menggunakan metode `POST`.
4. Data divalidasi oleh PHP.
5. Jika data tidak valid, ditampilkan flash message error.
6. Jika valid, data disimpan ke tabel `anggota` pada PostgreSQL menggunakan `INSERT` dan prepared statement.
7. Setelah berhasil, pengguna diarahkan ke halaman Daftar Anggota.

---

## 4. Wireframe — Beranda

```text
+------------------------------------------------------+
| SIMPUS-Mini       Beranda | Buku | Anggota           |
+------------------------------------------------------+
|                                                      |
|                         👋                           |
|            Selamat Datang di Perpustakaan            |
|      Aplikasi sederhana untuk mengelola data         |
|           buku dan anggota perpustakaan.             |
|                                                      |
|               Informasi Perpustakaan                 |
|                                                      |
|  +------------+ +------------+ +------------+       |
|  | Total Buku | |   Total    | |   Sedang   |       |
|  |     10     | |  Anggota 7 | |  Dipinjam  |       |
|  +------------+ +------------+ +------------+       |
|                                                      |
+------------------------------------------------------+
```

Pada Jobsheet 8, jumlah **Total Buku** dan **Total Anggota** diambil langsung dari database PostgreSQL menggunakan query `COUNT(*)`.

Alur data:

```text
[ Database PostgreSQL ]
          |
     +----+----+
     |         |
     v         v
[COUNT buku] [COUNT anggota]
     |         |
     v         v
[ Total Buku ][ Total Anggota ]
          |
          v
       [Beranda]
```

---

## 5. Wireframe — Daftar Buku

```text
+------------------------------------------------------+
| SIMPUS-Mini       Beranda | Buku | Anggota           |
+------------------------------------------------------+
|                                                      |
|                    Daftar Buku                       |
|                                                      |
| Cari Judul Buku                                      |
| [_______________________________________________]    |
|                                                      |
| +------------------------------------------------+   |
| | Judul | Pengarang | Tahun | Stok | Aksi        |   |
| +------------------------------------------------+   |
| | Laskar Pelangi | Andrea Hirata | 2005 | 4 | ...|   |
| | Bumi Manusia   | Pramoedya     | 1980 | 2 | ...|   |
| | ...            | ...           | ...  | ...| ...|   |
| +------------------------------------------------+   |
|                                                      |
+------------------------------------------------------+
```

Pada Jobsheet 8, data buku tidak lagi diambil dari `$_SESSION['buku']`, tetapi dari tabel `buku` pada PostgreSQL.

Alur data:

```text
[ Database PostgreSQL ]
          |
          v
[ SELECT * FROM buku
  ORDER BY id DESC ]
          |
          v
    [ Daftar Buku ]
```

Kolom `id` ikut diambil dari database meskipun belum ditampilkan pada tabel. ID tersebut akan digunakan untuk fitur Edit dan Hapus pada Jobsheet berikutnya.

---

## 6. Wireframe — Tambah Buku

```text
+------------------------------------------------------+
|                    Tambah Buku                       |
+------------------------------------------------------+
|                                                      |
| Judul      [____________________________________]    |
| Pengarang  [____________________________________]    |
| Tahun      [____________________________________]    |
| ISBN       [____________________________________]    |
| Stok       [____________________________________]    |
| Kategori   [___________________________v]            |
|                                                      |
|                  [ Simpan ]                          |
|                                                      |
+------------------------------------------------------+
```

Data yang diisi:

* Judul
* Pengarang
* Tahun Terbit
* ISBN
* Stok
* Kategori

Alur penyimpanan:

```text
[ Form Tambah Buku ]
          |
          v
      [ POST Data ]
          |
          v
    [ Validasi PHP ]
       /       \
    Gagal     Berhasil
      |           |
      v           v
[Flash Error] [Prepared Statement]
                  |
                  v
             [INSERT INTO buku]
                  |
                  v
        [Database PostgreSQL]
                  |
                  v
           [Daftar Buku]
```

---

## 7. Wireframe — Daftar Anggota

```text
+------------------------------------------------------+
| SIMPUS-Mini       Beranda | Buku | Anggota           |
+------------------------------------------------------+
|                                                      |
|                  Daftar Anggota                      |
|                                                      |
| Cari Nama Anggota                                    |
| [_______________________________________________]    |
|                                                      |
| +------------------------------------------------+   |
| | No. Anggota | Nama | Alamat | No. HP | Aksi    |   |
| +------------------------------------------------+   |
| | A001 | Siti Aminah  | Malang | 0812xxxx | ... |   |
| | A002 | Budi Santoso | Batu   | 0813xxxx | ... |   |
| | ...  | ...          | ...    | ...       | ... |   |
| +------------------------------------------------+   |
|                                                      |
+------------------------------------------------------+
```

Pada Jobsheet 8, data anggota diambil langsung dari tabel `anggota` pada PostgreSQL.

Alur data:

```text
[ Database PostgreSQL ]
          |
          v
[ SELECT * FROM anggota
  ORDER BY id DESC ]
          |
          v
   [ Daftar Anggota ]
```

Kolom `id` ikut diambil dari database meskipun belum ditampilkan pada tabel. ID tersebut akan digunakan untuk fitur Edit dan Hapus pada Jobsheet berikutnya.

---

## 8. Wireframe — Tambah Anggota

```text
+------------------------------------------------------+
|                   Tambah Anggota                     |
+------------------------------------------------------+
|                                                      |
| Nama         [_________________________________]     |
| No. Anggota  [_________________________________]     |
| Alamat       [_________________________________]     |
| No. HP       [_________________________________]     |
|                                                      |
|                  [ Simpan ]                          |
|                                                      |
+------------------------------------------------------+
```

Data yang diisi:

* Nama
* No. Anggota
* Alamat
* No. HP

Alur penyimpanan:

```text
[ Form Tambah Anggota ]
           |
           v
       [ POST Data ]
           |
           v
     [ Validasi PHP ]
        /       \
     Gagal     Berhasil
       |           |
       v           v
 [Flash Error] [Prepared Statement]
                   |
                   v
          [INSERT INTO anggota]
                   |
                   v
         [Database PostgreSQL]
                   |
                   v
          [Daftar Anggota]
```

---

## 9. Alur Koneksi Database

Pada Jobsheet 8 ditambahkan file `includes/koneksi.php` sebagai penghubung aplikasi PHP dengan PostgreSQL.

```text
[ Aplikasi PHP ]
       |
       v
[ includes/koneksi.php ]
       |
       v
[ PDO PostgreSQL ]
       |
       v
[ Database simpus_mini ]
       |
       +------------------+
       |                  |
       v                  v
 [ Tabel buku ]     [ Tabel anggota ]
```

Koneksi database digunakan oleh halaman yang membutuhkan akses data, seperti:

* `buku/list.php`
* `buku/proses_tambah.php`
* `anggota/list.php`
* `anggota/proses_tambah.php`
* `index.php`

---

## 10. Struktur Database

Database yang digunakan pada Jobsheet 8 adalah PostgreSQL dengan nama:

```text
simpus_mini
```

Tabel utama:

```text
+-------------------+
|       buku        |
+-------------------+
| id                |
| judul             |
| pengarang         |
| tahun             |
| isbn              |
| stok              |
| kategori          |
+-------------------+

+-------------------+
|      anggota      |
+-------------------+
| id                |
| no_anggota        |
| nama              |
| alamat            |
| no_hp             |
+-------------------+
```

Relasi dasar yang digunakan pada Jobsheet 8:

```text
        PostgreSQL
             |
      +------+------+
      |             |
      v             v
   [ buku ]     [ anggota ]
```

Pada Jobsheet 8, tabel `buku` dan `anggota` masih berdiri sendiri. Relasi peminjaman belum dibuat dan akan dikembangkan pada tahap berikutnya.

---

## 11. Catatan Implementasi

* Data buku yang sebelumnya disimpan menggunakan `$_SESSION['buku']` sekarang disimpan pada tabel `buku` di PostgreSQL.
* Data anggota yang sebelumnya disimpan menggunakan `$_SESSION['anggota']` sekarang disimpan pada tabel `anggota` di PostgreSQL.
* Koneksi database menggunakan PDO dengan driver PostgreSQL (`pgsql`).
* Data dari form tetap dikirim menggunakan metode `POST`.
* Data tetap divalidasi menggunakan PHP sebelum disimpan.
* Query `INSERT` menggunakan prepared statement dengan parameter seperti `:judul`, `:nama`, dan lainnya.
* Data pada halaman daftar diambil menggunakan `SELECT * FROM ... ORDER BY id DESC`.
* Statistik Total Buku dan Total Anggota pada halaman Beranda menggunakan `SELECT COUNT(*)`.
* Data sekarang bersifat persisten sehingga tetap tersimpan meskipun browser ditutup dan dibuka kembali.
* Kolom `id` dari database sudah ikut diambil untuk persiapan fitur Edit dan Hapus pada Jobsheet 9.
* Fitur Edit dan Hapus belum diimplementasikan pada Jobsheet 8.
* Tampilan dan desain SIMPUS-Mini tetap menggunakan desain Jobsheet 7.
* Tampilan tetap dibuat responsif untuk desktop dan perangkat dengan layar lebih kecil.