<?php

$page_title = "Edit Layanan";

require __DIR__ . '/../includes/koneksi.php';
include __DIR__ . '/../includes/header.php';

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
    "SELECT * FROM layanan WHERE id = :id"
);

$stmt->execute([
    'id' => $id
]);

$layanan = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$layanan) {

    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => 'Data layanan tidak ditemukan.'
    ];

    header('Location: list.php');
    exit;
}

?>

<section>

    <div class="section-title">
        <span>Layanan</span>
        <h2>Edit Layanan</h2>
    </div>

    <form method="post" action="proses_edit.php">

        <input
            type="hidden"
            name="id"
            value="<?php echo $layanan['id']; ?>"
        >

        <p>

            <label for="nama_layanan">
                Nama Layanan
            </label>

            <br>

            <input
                type="text"
                id="nama_layanan"
                name="nama_layanan"
                value="<?php echo htmlspecialchars($layanan['nama_layanan']); ?>"
                required
            >

        </p>

        <p>

            <label for="kategori">
                Kategori
            </label>

            <br>

            <select
                id="kategori"
                name="kategori"
            >

                <option
                    value="Rambut"
                    <?php echo $layanan['kategori'] === 'Rambut' ? 'selected' : ''; ?>
                >
                    Rambut
                </option>

                <option
                    value="Perawatan"
                    <?php echo $layanan['kategori'] === 'Perawatan' ? 'selected' : ''; ?>
                >
                    Perawatan
                </option>

                <option
                    value="Wajah"
                    <?php echo $layanan['kategori'] === 'Wajah' ? 'selected' : ''; ?>
                >
                    Wajah
                </option>

                <option
                    value="Kuku"
                    <?php echo $layanan['kategori'] === 'Kuku' ? 'selected' : ''; ?>
                >
                    Kuku
                </option>

            </select>

        </p>

        <p>

            <label for="harga">
                Harga
            </label>

            <br>

            <input
                type="number"
                id="harga"
                name="harga"
                min="0"
                value="<?php echo $layanan['harga']; ?>"
                required
            >

        </p>

        <p>

            <label for="durasi">
                Durasi (menit)
            </label>

            <br>

            <input
                type="number"
                id="durasi"
                name="durasi"
                min="1"
                value="<?php echo $layanan['durasi']; ?>"
                required
            >

        </p>

        <p>

            <button type="submit">
                Simpan Perubahan
            </button>

        </p>

    </form>

</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>