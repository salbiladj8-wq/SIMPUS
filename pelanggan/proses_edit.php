<?php

session_start();

require __DIR__ . '/../includes/koneksi.php';

$id = $_POST['id'] ?? '';

$nama = trim($_POST['nama'] ?? '');
$noPelanggan = trim($_POST['no_pelanggan'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');

$errors = [];

if (!is_numeric($id)) {
    $errors[] = "ID pelanggan tidak valid.";
}

if ($nama === '') {
    $errors[] = "Nama wajib diisi.";
}

if ($noPelanggan === '') {
    $errors[] = "No. Pelanggan wajib diisi.";
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
    "UPDATE pelanggan
     SET nama = :nama,
         no_pelanggan = :no_pelanggan,
         alamat = :alamat,
         no_hp = :no_hp
     WHERE id = :id"
);

$stmt->execute([
    'nama' => $nama,
    'no_pelanggan' => $noPelanggan,
    'alamat' => $alamat,
    'no_hp' => $noHp,
    'id' => $id
]);

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Data pelanggan berhasil diperbarui.'
];

header('Location: list.php');
exit;