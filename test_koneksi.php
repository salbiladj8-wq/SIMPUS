<?php
require_once __DIR__ . '/includes/koneksi.php';

echo "<h2>Status Koneksi Database</h2>";
try {
    $version = $pdo->query("SELECT version()")->fetchColumn();
    echo "<p style='color: green;'><strong>Koneksi ke Supabase BERHASIL!</strong></p>";
    echo "<p>Versi PostgreSQL: " . htmlspecialchars($version) . "</p>";

    $tables = $pdo->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public' ORDER BY table_name")->fetchAll(PDO::FETCH_COLUMN);
    echo "<p>Tabel yang ada di schema public: " . (!empty($tables) ? implode(", ", $tables) : "(belum ada tabel)") . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'><strong>Gagal query:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
}
