<?php
session_start();

$base = '';

if (
    strpos($_SERVER['SCRIPT_NAME'], '/layanan/') !== false ||
    strpos($_SERVER['SCRIPT_NAME'], '/pelanggan/') !== false ||
    strpos($_SERVER['SCRIPT_NAME'], '/karyawan/') !== false
) {
    $base = '../';
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        SISALON<?php echo isset($page_title) ? ' | ' . $page_title : ''; ?>
    </title>

    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css?v=1">
</head>

<body>

<header>

    <div class="brand">
        <div>
            <h1>SISALON</h1>
            <p>Salon Management Sederhana</p>
        </div>
    </div>

    <button
        type="button"
        id="nav-toggle-btn"
        class="nav-toggle-label"
        aria-label="Menu"
    >
        &#9776;
    </button>

    <nav>
        <ul>
            <li>
                <a href="<?php echo $base; ?>index.php">
                    Beranda
                </a>
            </li>

            <li>
                <a href="<?php echo $base; ?>layanan/list.php">
                    Daftar Layanan
                </a>
            </li>

            <li>
                <a href="<?php echo $base; ?>layanan/tambah.php">
                    Tambah Layanan
                </a>
            </li>

            <li>
                <a href="<?php echo $base; ?>pelanggan/list.php">
                    Daftar Pelanggan
                </a>
            </li>

            <li>
                <a href="<?php echo $base; ?>pelanggan/tambah.php">
                    Tambah Pelanggan
                </a>
            </li>

            <li>
                <a href="<?php echo $base; ?>karyawan/list.php">
                    Daftar Karyawan
                </a>
            </li>

            <li>
                <a href="<?php echo $base; ?>karyawan/tambah.php">
                    Tambah Karyawan
                </a>
            </li>
        </ul>
    </nav>

</header>

<main>