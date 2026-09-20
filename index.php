<?php
$page_title = "Beranda";
include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/koneksi.php';

$totalBuku = $pdo->query("SELECT COUNT(*) FROM buku")->fetchColumn();
$totalAnggota = $pdo->query("SELECT COUNT(*) FROM anggota")->fetchColumn();
?>

<section class="welcome-section">
    <span class="welcome-label">SIMPUS-Mini</span>
    <h2>Selamat Datang di Perpustakaan</h2>
    <p>
        Aplikasi sederhana untuk mengelola data buku
        dan anggota perpustakaan dengan lebih mudah.
    </p>
</section>

<section class="summary-section">
    <div class="section-title">
        <span>Ringkasan</span>
        <h2>Informasi Perpustakaan</h2>
    </div>

    <div class="summary-list">
        <article class="summary-card">
            <div>
                <h3>Total Buku</h3>
                <p><?php echo $totalBuku; ?></p>
            </div>
        </article>

        <article class="summary-card">
            <div>
                <h3>Total Anggota</h3>
                <p><?php echo $totalAnggota; ?></p>
            </div>
        </article>

        <article class="summary-card">
            <div>
                <h3>Sedang Dipinjam</h3>
                <p>0</p>
            </div>
        </article>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>