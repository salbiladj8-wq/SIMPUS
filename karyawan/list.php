<?php

$page_title = "Daftar Karyawan";

include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarKaryawan = $pdo->query(
    "SELECT * FROM karyawan ORDER BY id DESC"
)->fetchAll(PDO::FETCH_ASSOC);

?>

<section>

    <div class="section-title">
        <span>Karyawan</span>
        <h2>Daftar Karyawan</h2>
    </div>

    <?php if ($flash): ?>

        <p class="flash flash-<?php echo $flash['type']; ?>">
            <?php echo htmlspecialchars($flash['pesan']); ?>
        </p>

    <?php endif; ?>

    <div class="search-box">

        <label for="search-input">
            Cari Nama Karyawan
        </label>

        <input
            type="text"
            id="search-input"
            placeholder="Ketik nama karyawan..."
        >

    </div>

    <div class="table-responsive">

        <table>

            <thead>

                <tr>
                    <th>No. Karyawan</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                <?php if (empty($daftarKaryawan)): ?>

                    <tr>

                        <td colspan="5">
                            Belum ada data karyawan.
                            Silakan tambah lewat menu
                            "Tambah Karyawan".
                        </td>

                    </tr>

                <?php else: ?>

                    <?php foreach ($daftarKaryawan as $karyawan): ?>

                        <tr>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $karyawan['no_karyawan']
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $karyawan['nama']
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $karyawan['jabatan']
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $karyawan['no_hp']
                                );
                                ?>
                            </td>

                            <td>

                                <a
                                    href="edit.php?id=<?php echo $karyawan['id']; ?>"
                                    class="btn-edit"
                                >
                                    Edit
                                </a>

                                <a
                                    href="proses_hapus.php?id=<?php echo $karyawan['id']; ?>"
                                    class="btn-hapus"
                                    onclick="return confirm('Yakin ingin menghapus karyawan ini?');"
                                >
                                    Hapus
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>