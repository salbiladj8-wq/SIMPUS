<?php

$page_title = "Daftar Pelanggan";

include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$daftarPelanggan = $pdo->query(
    "SELECT * FROM pelanggan ORDER BY id DESC"
)->fetchAll(PDO::FETCH_ASSOC);

?>

<section>

    <div class="section-title">
        <span>Pelanggan</span>
        <h2>Daftar Pelanggan</h2>
    </div>

    <?php if ($flash): ?>

        <p class="flash flash-<?php echo $flash['type']; ?>">
            <?php echo htmlspecialchars($flash['pesan']); ?>
        </p>

    <?php endif; ?>

    <div class="search-box">

        <label for="search-input">
            Cari Nama Pelanggan
        </label>

        <input
            type="text"
            id="search-input"
            placeholder="Ketik nama pelanggan..."
        >

    </div>

    <div class="table-responsive">

        <table>

            <thead>

                <tr>
                    <th>No. Pelanggan</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                <?php if (empty($daftarPelanggan)): ?>

                    <tr>

                        <td colspan="5">
                            Belum ada data pelanggan.
                            Silakan tambah lewat menu
                            "Tambah Pelanggan".
                        </td>

                    </tr>

                <?php else: ?>

                    <?php foreach ($daftarPelanggan as $pelanggan): ?>

                        <tr>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $pelanggan['no_pelanggan']
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $pelanggan['nama']
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $pelanggan['alamat']
                                );
                                ?>
                            </td>

                            <td>
                                <?php
                                echo htmlspecialchars(
                                    $pelanggan['no_hp']
                                );
                                ?>
                            </td>

                            <td>

                                <a
                                    href="edit.php?id=<?php echo $pelanggan['id']; ?>"
                                    class="btn-edit"
                                >
                                    Edit
                                </a>

                                <a
                                    href="proses_hapus.php?id=<?php echo $pelanggan['id']; ?>"
                                    class="btn-hapus"
                                    onclick="return confirm('Yakin ingin menghapus pelanggan ini?');"
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