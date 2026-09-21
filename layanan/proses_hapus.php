<?php

session_start();

require __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? '';

if (!is_numeric($id)) {

    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => 'ID layanan tidak valid.'
    ];

    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare(
    "DELETE FROM layanan WHERE id = :id"
);

$stmt->execute([
    'id' => $id
]);

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Layanan berhasil dihapus.'
];

header('Location: list.php');
exit;