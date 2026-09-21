<?php

session_start();

require __DIR__ . '/../includes/koneksi.php';

$id = $_POST['id'] ?? '';

$namaLayanan = trim($_POST['nama_layanan'] ?? '');
$kategori = trim($_POST['kategori'] ?? '');
$harga = $_POST['harga'] ?? '';
$durasi = $_POST['durasi'] ?? '';

$errors = [];

if (!is_numeric($id)) {
    $errors[] = "ID layanan tidak valid.";
}

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

    header('Location: edit.php?id=' . urlencode($id));
    exit;
}

$stmt = $pdo->prepare(
    "UPDATE layanan
     SET nama_layanan = :nama_layanan,
         kategori = :kategori,
         harga = :harga,
         durasi = :durasi
     WHERE id = :id"
);

$stmt->execute([
    'nama_layanan' => $namaLayanan,
    'kategori' => $kategori,
    'harga' => (int) $harga,
    'durasi' => (int) $durasi,
    'id' => $id
]);

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Data layanan berhasil diperbarui.'
];

header('Location: list.php');
exit;