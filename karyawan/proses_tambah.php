<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$nama = trim($_POST['nama'] ?? '');
$noKaryawan = trim($_POST['no_karyawan'] ?? '');
$jabatan = trim($_POST['jabatan'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');

$errors = [];

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

    header('Location: tambah.php');
    exit;
}

$stmt = $pdo->prepare(
    "INSERT INTO karyawan (nama, no_karyawan, jabatan, no_hp)
     VALUES (:nama, :no_karyawan, :jabatan, :no_hp)
     RETURNING id"
);

$stmt->execute([
    'nama' => $nama,
    'no_karyawan' => $noKaryawan,
    'jabatan' => $jabatan,
    'no_hp' => $noHp
]);

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Karyawan berhasil ditambahkan.'
];

header('Location: list.php');
exit;