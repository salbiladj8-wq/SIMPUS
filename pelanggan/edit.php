<?php

$page_title = "Edit Pelanggan";

require __DIR__ . '/../includes/koneksi.php';
include __DIR__ . '/../includes/header.php';

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
    "SELECT * FROM pelanggan WHERE id = :id"
);

$stmt->execute([
    'id' => $id
]);

$pelanggan = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pelanggan) {

    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => 'Data pelanggan tidak ditemukan.'
    ];

    header('Location: list.php');
    exit;
}

?>

<section>

    <div class="section-title">
        <span>Pelanggan</span>
        <h2>Edit Pelanggan</h2>
    </div>

    <form method="post" action="proses_edit.php">

        <input
            type="hidden"
            name="id"
            value="<?php echo $pelanggan['id']; ?>"
        >

        <p>

            <label for="nama">
                Nama
            </label>

            <br>

            <input
                type="text"
                id="nama"
                name="nama"
                value="<?php echo htmlspecialchars($pelanggan['nama']); ?>"
                required
            >

        </p>

        <p>

            <label for="no_pelanggan">
                No. Pelanggan
            </label>

            <br>

            <input
                type="text"
                id="no_pelanggan"
                name="no_pelanggan"
                value="<?php echo htmlspecialchars($pelanggan['no_pelanggan']); ?>"
                required
            >

        </p>

        <p>

            <label for="alamat">
                Alamat
            </label>

            <br>

            <input
                type="text"
                id="alamat"
                name="alamat"
                value="<?php echo htmlspecialchars($pelanggan['alamat']); ?>"
            >

        </p>

        <p>

            <label for="no_hp">
                No. HP
            </label>

            <br>

            <input
                type="text"
                id="no_hp"
                name="no_hp"
                value="<?php echo htmlspecialchars($pelanggan['no_hp']); ?>"
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