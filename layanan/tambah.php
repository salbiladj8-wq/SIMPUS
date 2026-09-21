<?php
$page_title = "Tambah Layanan";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<section>
    <div class="section-title">
        <span>Layanan</span>
        <h2>Tambah Layanan</h2>
    </div>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>">
            <?php echo htmlspecialchars($flash['pesan']); ?>
        </p>
    <?php endif; ?>

    <form id="form-tambah" method="post" action="proses_tambah.php">
        <p>
            <label for="nama_layanan">Nama Layanan</label><br>
            <input type="text" id="nama_layanan" name="nama_layanan" required>
        </p>

        <p>
            <label for="kategori">Kategori</label><br>
            <select id="kategori" name="kategori">
                <option value="Rambut">Rambut</option>
                <option value="Perawatan">Perawatan</option>
                <option value="Wajah">Wajah</option>
                <option value="Kuku">Kuku</option>
            </select>
        </p>

        <p>
            <label for="harga">Harga</label><br>
            <input type="number" id="harga" name="harga" min="0" required>
        </p>

        <p>
            <label for="durasi">Durasi (menit)</label><br>
            <input type="number" id="durasi" name="durasi" min="1" required>
        </p>

        <p>
            <button type="submit">Simpan</button>
        </p>
    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>