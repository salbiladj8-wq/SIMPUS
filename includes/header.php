<?php
session_start();

$base = '';
if (strpos($_SERVER['SCRIPT_NAME'], '/buku/') !== false || strpos($_SERVER['SCRIPT_NAME'], '/anggota/') !== false) {
    $base = '../';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMPUS-Mini<?php echo isset($page_title) ? ' | ' . $page_title : ''; ?></title>
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css?v=2">
</head>
<body>

<header>
    <div class="brand">
        <div class="brand-icon"></div>
        <div>
            <h1>SIMPUS-Mini</h1>
            <p>Perpustakaan Digital Sederhana</p>
        </div>
    </div>

    <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">
        &#9776;
    </button>

    <nav>
        <ul>
            <li>
                <a href="<?php echo $base; ?>index.php">Beranda</a>
            </li>
            <li>
                <a href="<?php echo $base; ?>buku/list.php">Daftar Buku</a>
            </li>
            <li>
                <a href="<?php echo $base; ?>buku/tambah.php">Tambah Buku</a>
            </li>
            <li>
                <a href="<?php echo $base; ?>anggota/list.php">Daftar Anggota</a>
            </li>
            <li>
                <a href="<?php echo $base; ?>anggota/tambah.php">Tambah Anggota</a>
            </li>
        </ul>
    </nav>
</header>

<main>