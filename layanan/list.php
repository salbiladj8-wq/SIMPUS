<?php

$page_title = "Daftar Layanan";

include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarLayanan = $pdo->query(
    "SELECT * FROM layanan ORDER BY id DESC"
)->fetchAll(PDO::FETCH_ASSOC);

?>

<section>

    <div class="section-title">
        <span>Layanan</span>
        <h2>Daftar Layanan</h2>
    </div>

    <?php if ($flash): ?>

        <p class="flash flash-<?php echo $flash['type']; ?>">
            <?php echo htmlspecialchars($flash['pesan']); ?>
        </p>

    <?php endif; ?>

    <div class="search-box">

        <label for="search-input">
            Cari Nama Layanan
        </label>

        <input
            type="text"
            id="search-input"
            placeholder="Ketik nama layanan..."
        >

    </div>

    <div class="table-responsive">

        <table>

            <thead>

                <tr>
                    <th>Nama Layanan</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                <?php if (empty($daftarLayanan)): ?>

                    <tr>

                        <td colspan="5">
                            Belum ada data layanan.
                            Silakan tambah lewat menu
                            "Tambah Layanan".
                        </td>

                    </tr>

                <?php else: ?>

                    <?php foreach ($daftarLayanan as $layanan): ?>

                        <tr>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $layanan['nama_layanan']
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $layanan['kategori']
                                );
                                ?>
                            </td>

                            <td>
                                Rp
                                <?php
                                echo number_format(
                                    $layanan['harga'],
                                    0,
                                    ',',
                                    '.'
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo $layanan['durasi'];
                                ?>
                                menit
                            </td>

                            <td>

                                <a
                                    href="edit.php?id=<?php echo $layanan['id']; ?>"
                                    class="btn-edit"
                                >
                                    Edit
                                </a>

                                <a
                                    href="proses_hapus.php?id=<?php echo $layanan['id']; ?>"
                                    class="btn-hapus"
                                    onclick="return confirm('Yakin ingin menghapus layanan ini?');"
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