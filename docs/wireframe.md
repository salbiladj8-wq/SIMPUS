# Wireframe SIMPUS-Mini

Sub-CPMK: Merancang UI/UX aplikasi (proyek).

Wireframe ini digunakan untuk membuat gambaran sederhana mengenai halaman dan fitur yang akan dikembangkan pada SIMPUS-Mini. Fitur yang dirancang adalah Login, Dashboard, Peminjaman, Pengembalian, dan Riwayat.

## 1. Pengguna

SIMPUS-Mini memiliki dua jenis pengguna:

- **Tamu**, dapat melihat halaman utama dan daftar buku.
- **Petugas**, dapat masuk ke sistem dan mengelola data perpustakaan.

## 2. Alur Penggunaan

```text
              MULAI
                |          
                v          
             [Login] <-----+     
                |          |
          +-----+-----+    |
          |           |    |
       Berhasil     Gagal  |
          |           |    |
          v           |    |
      [Dashboard]     +----+
          |
     +----+----+--------+
     |         |        |
     v         v        v
 [Buku]   [Anggota] [Transaksi]
                       |
                 +-----+-----+
                 |           |
                 v           v
            [Peminjaman] [Pengembalian]
                 |
                 v
             [Riwayat]
````

Alur tersebut menunjukkan halaman yang dapat diakses petugas setelah berhasil login.

## 3. Wireframe Login

```text
+---------------------------+
|       SIMPUS-Mini         |
|                           |
|    Masuk ke Sistem        |
|                           |
| Username                  |
| [____________________]    |
|                           |
| Password                  |
| [____________________]    |
|                           |
|       [ MASUK ]           |
+---------------------------+
```

Halaman login digunakan petugas untuk masuk ke sistem.

## 4. Wireframe Dashboard

```text
+-----------------------------------+
| SIMPUS-Mini             Logout    |
+-----------------------------------+
| Beranda | Buku | Anggota | Transaksi |
+-----------------------------------+
|                                   |
| Halo, Petugas!                    |
|                                   |
| Buku       : 10                   |
| Anggota    : 7                    |
| Dipinjam   : 3                    |
|                                   |
| [ Peminjaman ] [ Pengembalian ]   |
|                                   |
+-----------------------------------+
```

Dashboard menampilkan informasi singkat mengenai kondisi perpustakaan dan tombol untuk transaksi.

## 5. Wireframe Peminjaman

```text
+-------------------------------+
|      Peminjaman Buku          |
+-------------------------------+
| Pilih Anggota                 |
| [____________________]        |
|                               |
| Pilih Buku                    |
| [____________________]        |
|                               |
| Tanggal                       |
| [____________________]        |
|                               |
| [ Simpan ]   [ Batal ]        |
+-------------------------------+
```

Form digunakan petugas untuk memasukkan data peminjaman buku.

## 6. Wireframe Pengembalian

```text
+--------------------------------+
|       Pengembalian Buku        |
+--------------------------------+
| Masukkan data peminjaman       |
| [________________________]     |
|                                |
| Nama : Salbila Dwi Juniar      |
| Buku : Pemrograman Web         |
|                                |
|       [ Kembalikan ]           |
+--------------------------------+
```

Halaman ini digunakan untuk mencari dan mencatat buku yang sudah dikembalikan.

## 7. Wireframe Riwayat

```text
+------------------------------------------+
|             Riwayat Buku                 |
+------------------------------------------+
| [ Cari nama / buku __________ ] [Cari]   |
|                                          |
| Anggota       Buku          Status       |
| Salbila Dwi   Buku Web      Selesai      |
| Dewfan        Java          Dipinjam     |
|                                          |
+------------------------------------------+
```

Halaman riwayat digunakan untuk melihat data transaksi yang sudah dilakukan.

## 8. Kesimpulan

Wireframe ini menjadi gambaran awal untuk pengembangan fitur SIMPUS-Mini pada Jobsheet berikutnya. Rancangan dibuat sederhana agar lebih mudah diterapkan ke dalam HTML, CSS, dan JavaScript.