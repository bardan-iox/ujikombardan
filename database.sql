-- ============================================================
-- Database: smkn4_bogor
-- Website Company Profile SMKN 4 Bogor (Ujian Kompetensi RPL)
-- ============================================================

CREATE DATABASE IF NOT EXISTS smkn4_bogor CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE smkn4_bogor;

-- Tabel admin (untuk login halaman admin)
CREATE TABLE admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  nama_lengkap VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- password default: admin123 (sudah di-hash dengan password_hash PHP)
INSERT INTO admin (username, password, nama_lengkap) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator SMKN 4 Bogor');

-- Tabel produk / jurusan (Program Keahlian)
CREATE TABLE produk (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_jurusan VARCHAR(150) NOT NULL,
  singkatan VARCHAR(20) NOT NULL,
  deskripsi TEXT NOT NULL,
  icon VARCHAR(50) DEFAULT 'code',
  gambar VARCHAR(255) DEFAULT NULL,
  urutan INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO produk (nama_jurusan, singkatan, deskripsi, icon, urutan) VALUES
('Rekayasa Perangkat Lunak', 'RPL', 'Pelajari pengembangan aplikasi, web, dan sistem cerdas dengan standar industri teknologi modern.', 'code', 1),
('Teknik Komputer & Jaringan', 'TKJ', 'Membangun infrastruktur jaringan dan keamanan siber yang handal.', 'network', 2),
('Multimedia / DKV', 'MM', 'Wujudkan kreativitasmu dalam desain grafis, animasi, dan produksi konten digital.', 'palette', 3),
('Akuntansi & Keuangan', 'AK', 'Kuasai manajemen keuangan dan audit dengan tools modern untuk karir di sektor korporat.', 'wallet', 4);

-- Tabel artikel / berita
CREATE TABLE artikel (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(200) NOT NULL,
  kategori VARCHAR(50) NOT NULL,
  ringkasan TEXT NOT NULL,
  isi TEXT NOT NULL,
  gambar VARCHAR(255) DEFAULT NULL,
  penulis VARCHAR(100) DEFAULT 'Admin',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO artikel (judul, kategori, ringkasan, isi, penulis) VALUES
('SMKN 4 Bogor Juara 1 Nasional Robotika 2024', 'Prestasi', 'Tim robotika kami berhasil menyisihkan ribuan peserta dalam ajang bergengsi tingkat nasional.', 'Tim robotika SMKN 4 Bogor berhasil meraih Juara 1 pada ajang Kompetisi Robotika Nasional 2024 setelah bersaing dengan ribuan peserta dari seluruh Indonesia. Prestasi ini menjadi bukti nyata komitmen sekolah dalam mengembangkan kompetensi siswa di bidang teknologi.', 'Humas Sekolah'),
('Kerjasama Strategis dengan Google Cloud Indonesia', 'Kemitraan', 'Langkah baru dalam meningkatkan kompetensi cloud computing bagi seluruh siswa jurusan RPL.', 'SMKN 4 Bogor menjalin kerjasama strategis dengan Google Cloud Indonesia untuk memberikan pelatihan cloud computing bersertifikat kepada siswa jurusan Rekayasa Perangkat Lunak, sebagai bagian dari upaya menjembatani kebutuhan industri digital.', 'Humas Sekolah'),
('Juara 1 Web Technologies Tingkat Provinsi', 'Prestasi', 'Lomba Kompetensi Siswa (LKS) tingkat provinsi berhasil dimenangkan oleh siswa RPL.', 'Siswa jurusan Rekayasa Perangkat Lunak SMKN 4 Bogor meraih Juara 1 pada bidang lomba Web Technologies dalam ajang Lomba Kompetensi Siswa (LKS) tingkat Provinsi Jawa Barat.', 'Humas Sekolah');

-- Tabel galeri
CREATE TABLE galeri (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(150) NOT NULL,
  kategori VARCHAR(50) DEFAULT 'Kegiatan',
  gambar VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO galeri (judul, kategori, gambar) VALUES
('Lab Robotika', 'Fasilitas', 'lab-robotika.jpg'),
('Workshop Otomotif', 'Fasilitas', 'workshop-otomotif.jpg'),
('Perpustakaan & Digital Lab', 'Fasilitas', 'perpustakaan.jpg'),
('Lomba Kompetensi Siswa 2024', 'Kegiatan', 'lks-2024.jpg');

-- Tabel pesan kontak (dari form kontak)
CREATE TABLE pesan_kontak (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  subjek VARCHAR(150) NOT NULL,
  pesan TEXT NOT NULL,
  dibaca TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
