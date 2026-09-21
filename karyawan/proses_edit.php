<?php

session_start();

require __DIR__ . '/../includes/koneksi.php';

$id = $_POST['id'] ?? '';

$nama = trim($_POST['nama'] ?? '');
$noKaryawan = trim($_POST['no_karyawan'] ?? '');
$jabatan = trim($_POST['jabatan'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');

$errors = [];

if (!is_numeric($id)) {
    $errors[] = "ID karyawan tidak valid.";
}

if ($nama === '') {
    $errors[] = "Nama wajib diisi.";
}

if ($noKaryawan === '') {
    $errors[] = "No. Karyawan wajib diisi.";
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
    "UPDATE karyawan
     SET nama = :nama,
         no_karyawan = :no_karyawan,
         jabatan = :jabatan,
         no_hp = :no_hp
     WHERE id = :id"
);

$stmt->execute([
    'nama' => $nama,
    'no_karyawan' => $noKaryawan,
    'jabatan' => $jabatan,
    'no_hp' => $noHp,
    'id' => $id
]);

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Data karyawan berhasil diperbarui.'
];

header('Location: list.php');
exit;