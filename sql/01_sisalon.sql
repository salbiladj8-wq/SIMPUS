CREATE DATABASE sisalon;

CREATE TABLE layanan (
    id SERIAL PRIMARY KEY,
    nama_layanan VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    harga INTEGER NOT NULL CHECK (harga >= 0),
    durasi INTEGER NOT NULL CHECK (durasi > 0)
);

CREATE TABLE pelanggan (
    id SERIAL PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    no_pelanggan VARCHAR(30) NOT NULL,
    alamat VARCHAR(150),
    no_hp VARCHAR(30)
);

CREATE TABLE karyawan (
    id SERIAL PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    no_karyawan VARCHAR(30) NOT NULL,
    jabatan VARCHAR(50) NOT NULL,
    no_hp VARCHAR(30)
);

INSERT INTO layanan (nama_layanan, kategori, harga, durasi) VALUES
('Hair Cut', 'Rambut', 50000, 45),
('Hair Spa', 'Perawatan', 100000, 60),
('Basic Manicure', 'Kuku', 75000, 45);

INSERT INTO pelanggan (nama, no_pelanggan, alamat, no_hp) VALUES
('Salbila', 'PLG001', 'Malang', '0817xxx'),
('Citra', 'PLG002', 'Malang', '0823xxx');

INSERT INTO karyawan (nama, no_karyawan, jabatan, no_hp) VALUES
('Najwa', 'KRY001', 'Stylist', '0811xxx'),
('Bebe', 'KRY002', 'Beautician', '0822xxx');