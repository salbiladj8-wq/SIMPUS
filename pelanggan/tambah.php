<?php
$page_title = "Tambah Pelanggan";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<section>
    <div class="section-title">
        <span>Pelanggan</span>
        <h2>Tambah Pelanggan</h2>
    </div>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>">
            <?php echo htmlspecialchars($flash['pesan']); ?>
        </p>
    <?php endif; ?>

    <form id="form-tambah" method="post" action="proses_tambah.php">
        <p>
            <label for="nama">Nama</label><br>
            <input type="text" id="nama" name="nama" required>
        </p>

        <p>
            <label for="no_pelanggan">No. Pelanggan</label><br>
            <input type="text" id="no_pelanggan" name="no_pelanggan" required>
        </p>

        <p>
            <label for="alamat">Alamat</label><br>
            <input type="text" id="alamat" name="alamat">
        </p>

        <p>
            <label for="no_hp">No. HP</label><br>
            <input type="text" id="no_hp" name="no_hp">
        </p>

        <p>
            <button type="submit">Simpan</button>
        </p>
    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>