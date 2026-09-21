<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$namaLayanan = trim($_POST['nama_layanan'] ?? '');
$kategori = trim($_POST['kategori'] ?? '');
$harga = $_POST['harga'] ?? '';
$durasi = $_POST['durasi'] ?? '';

$errors = [];

if ($namaLayanan === '') {
    $errors[] = "Nama layanan wajib diisi.";
}

if (!is_numeric($harga) || $harga < 0) {
    $errors[] = "Harga tidak boleh negatif.";
}

if (!is_numeric($durasi) || $durasi < 1) {
    $errors[] = "Durasi harus lebih dari 0 menit.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => implode(' ', $errors)
    ];

    header('Location: tambah.php');
    exit;
}

$stmt = $pdo->prepare(
    "INSERT INTO layanan (nama_layanan, kategori, harga, durasi)
     VALUES (:nama_layanan, :kategori, :harga, :durasi)
     RETURNING id"
);

$stmt->execute([
    'nama_layanan' => $namaLayanan,
    'kategori' => $kategori,
    'harga' => (int) $harga,
    'durasi' => (int) $durasi
]);

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Layanan berhasil ditambahkan.'
];

header('Location: list.php');
exit;