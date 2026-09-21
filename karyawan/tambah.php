<?php
$page_title = "Tambah Karyawan";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<section>
    <div class="section-title">
        <span>Karyawan</span>
        <h2>Tambah Karyawan</h2>
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
            <label for="no_karyawan">No. Karyawan</label><br>
            <input type="text" id="no_karyawan" name="no_karyawan" required>
        </p>

        <p>
            <label for="jabatan">Jabatan</label><br>
            <select id="jabatan" name="jabatan">
                <option value="Stylist">Stylist</option>
                <option value="Beautician">Beautician</option>
                <option value="Nail Artist">Nail Artist</option>
                <option value="Kasir">Kasir</option>
            </select>
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