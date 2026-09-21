<?php

$host = "aws-0-ap-southeast-1.pooler.supabase.com";
$port = "5432"; // atau 6543
$db   = "postgres";
$user = "postgres.miqwkcgjrjvqivmrluve";
$pass = "Salbila2506";

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}