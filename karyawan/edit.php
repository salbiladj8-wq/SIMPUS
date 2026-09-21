<?php

$page_title = "Edit Karyawan";

require __DIR__ . '/../includes/koneksi.php';
include __DIR__ . '/../includes/header.php';

$id = $_GET['id'] ?? '';

if (!is_numeric($id)) {

    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => 'ID karyawan tidak valid.'
    ];

    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare(
    "SELECT * FROM karyawan WHERE id = :id"
);

$stmt->execute([
    'id' => $id
]);

$karyawan = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$karyawan) {

    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => 'Data karyawan tidak ditemukan.'
    ];

    header('Location: list.php');
    exit;
}

?>

<section>

    <div class="section-title">
        <span>Karyawan</span>
        <h2>Edit Karyawan</h2>
    </div>

    <form method="post" action="proses_edit.php">

        <input
            type="hidden"
            name="id"
            value="<?php echo $karyawan['id']; ?>"
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
                value="<?php echo htmlspecialchars($karyawan['nama']); ?>"
                required
            >

        </p>

        <p>

            <label for="no_karyawan">
                No. Karyawan
            </label>

            <br>

            <input
                type="text"
                id="no_karyawan"
                name="no_karyawan"
                value="<?php echo htmlspecialchars($karyawan['no_karyawan']); ?>"
                required
            >

        </p>

        <p>

            <label for="jabatan">
                Jabatan
            </label>

            <br>

            <select
                id="jabatan"
                name="jabatan"
            >

                <option
                    value="Stylist"
                    <?php echo $karyawan['jabatan'] === 'Stylist' ? 'selected' : ''; ?>
                >
                    Stylist
                </option>

                <option
                    value="Beautician"
                    <?php echo $karyawan['jabatan'] === 'Beautician' ? 'selected' : ''; ?>
                >
                    Beautician
                </option>

                <option
                    value="Nail Artist"
                    <?php echo $karyawan['jabatan'] === 'Nail Artist' ? 'selected' : ''; ?>
                >
                    Nail Artist
                </option>

                <option
                    value="Kasir"
                    <?php echo $karyawan['jabatan'] === 'Kasir' ? 'selected' : ''; ?>
                >
                    Kasir
                </option>

            </select>

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
                value="<?php echo htmlspecialchars($karyawan['no_hp']); ?>"
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