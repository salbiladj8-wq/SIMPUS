<?php

session_start();

require __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? '';

if (!is_numeric($id)) {

    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => 'ID pelanggan tidak valid.'
    ];

    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare(
    "DELETE FROM pelanggan WHERE id = :id"
);

$stmt->execute([
    'id' => $id
]);

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Pelanggan berhasil dihapus.'
];

header('Location: list.php');
exit;