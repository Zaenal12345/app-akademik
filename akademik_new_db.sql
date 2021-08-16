-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Agu 2021 pada 13.39
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `nidn` varchar(30) DEFAULT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `foto_dosen` varchar(100) DEFAULT NULL,
  `jenis_kelamin_dosen` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir_dosen` varchar(50) NOT NULL,
  `tanggal_lahir_dosen` date NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `gelar` varchar(50) NOT NULL,
  `agama_dosen` varchar(50) NOT NULL,
  `alamat_dosen` text NOT NULL,
  `status_dosen` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nik`, `nidn`, `nama_dosen`, `foto_dosen`, `jenis_kelamin_dosen`, `tempat_lahir_dosen`, `tanggal_lahir_dosen`, `pendidikan`, `gelar`, `agama_dosen`, `alamat_dosen`, `status_dosen`) VALUES
(2, '1', '1', 'Zaenal Muttaqin', '610572d38ae74.jpg', 'Laki-laki', 'Bandung', '2021-07-31', 'S2 Teknik Informatika', 'S.Kom, M.Kom', 'asdsad', 'Bandung', 'Aktif'),
(4, '23', '', 'Sinta Cantika', '610598ee2cef6.jpg', 'Perempuan', 'Bandung', '2021-07-31', 'S2 Teknik Informatika', 'S.Kom, M.Kom', 'Islam', 'Kp.Babakan Kinim', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `kode_fakultas` varchar(50) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `kode_fakultas`, `nama_fakultas`) VALUES
(2, 'FAK-01222', 'Sastra'),
(3, 'FAK-01221', 'Ilmu Komputer'),
(4, 'KD003', 'Ekonomi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `kode_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `fakultas_id`, `kode_jurusan`, `nama_jurusan`) VALUES
(2, 2, 'J0002', 'Sastra Jepang'),
(3, 3, 'J0003', 'Akuntansi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_mahasiswa`
--

CREATE TABLE `kegiatan_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `gambar_utama` varchar(100) DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kegiatan_mahasiswa`
--

INSERT INTO `kegiatan_mahasiswa` (`id`, `nama_kegiatan`, `gambar_utama`, `tanggal_awal`, `tanggal_akhir`, `deskripsi`) VALUES
(11, 'PKKMB 2020', '61146adabddd4.png', '2021-08-10', '2021-08-11', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi, porro similique! Beatae vitae cumque fuga odit. Voluptates labore totam ad iusto consequuntur veniam dolore, necessitatibus voluptatem error, voluptas iste sapiente!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, '0120', 'Kelas Pagi', '2021-08-01 10:32:28', NULL),
(2, '123', 'Kelas Sore', '2021-08-01 10:32:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `nama_jurusan` varchar(30) DEFAULT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `sks_matakuliah` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `tahun_ajar_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id_kurikulum` int(11) NOT NULL,
  `matakuliah_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `tahun_ajar_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`id_kurikulum`, `matakuliah_id`, `dosen_id`, `jurusan_id`, `tahun_ajar_id`, `kelas_id`) VALUES
(1, 6, 4, 2, 2, NULL),
(2, 5, 2, 2, 2, NULL),
(3, 4, 4, 2, 2, NULL),
(4, 3, 2, 2, 2, NULL),
(5, 1, 2, 2, 2, NULL),
(6, 6, 4, 3, 2, NULL),
(7, 5, 2, 3, 2, NULL),
(8, 4, NULL, 3, 2, NULL),
(12, 6, 2, 2, 3, NULL),
(13, 5, 2, 2, 3, NULL),
(14, 4, NULL, 2, 3, NULL),
(15, 6, NULL, 3, 3, NULL),
(16, 3, 4, 2, 3, NULL),
(17, 1, NULL, 2, 3, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `status_mahasiswa` varchar(50) NOT NULL,
  `tahun_angkatan` varchar(10) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `jurusan_id`, `kelas_id`, `nama_mahasiswa`, `foto`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_mahasiswa`, `tahun_angkatan`, `alamat`) VALUES
(3, '020317108111', 2, 1, 'Zaenal Muttaqinnn', '61146929c7fd5.png', 'Laki-laki', 'Bandung Barat', '2021-08-01', 'Islamm', 'Tidak Aktif', '2018', 'Kp.Babakan Kinimmm'),
(4, '0203171082', 2, 1, 'SInta Cantika Lucu', '6114693751a82.png', 'Perempuan', 'Bandung', '2021-08-01', 'Islam', 'Aktif', '2017', 'wkwkwkw'),
(5, '0203171083', 2, 1, 'MUTTAQIN', '6114697172b4a.png', 'Laki-laki', 'Bandung', '2021-08-12', 'Islam', 'Aktif', '2016', 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `kode_matakuliah` varchar(50) NOT NULL,
  `nama_matakuliah` varchar(50) NOT NULL,
  `sks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `kode_matakuliah`, `nama_matakuliah`, `sks`) VALUES
(1, 'MT-001', 'Database I', '2'),
(3, 'MT-002', 'Database II', '3'),
(4, 'MT-003', 'Pengantar ', '3'),
(5, 'BAQW123', 'Logika Pemprogaman Bahasa C', '3'),
(6, 'TO-313', 'PKN', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `tahun_ajar_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `absen` decimal(10,0) DEFAULT NULL,
  `tugas` decimal(10,0) DEFAULT NULL,
  `uts` decimal(10,0) DEFAULT NULL,
  `uas` decimal(10,0) DEFAULT NULL,
  `nilai` decimal(11,0) DEFAULT NULL,
  `standard_nilai` int(11) DEFAULT NULL,
  `grade` enum('A','B','C','D','E') DEFAULT NULL,
  `keterangan` enum('Lulus','Tidak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajar`
--

CREATE TABLE `tahun_ajar` (
  `id_tahun_ajar` int(11) NOT NULL,
  `tahun_ajar` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tahun_ajar`
--

INSERT INTO `tahun_ajar` (`id_tahun_ajar`, `tahun_ajar`, `keterangan`, `status`) VALUES
(2, '2020/2021-1', 'Semester Ganjil', 'Aktif'),
(3, '2020/2021-2', 'Semester Genap', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$cCKZGve20EqLQiX8/dOdvOFp056aob0.b8IfzbXiuRSJdRUkU8QE6', '2021-07-31 20:28:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `fk_fakultas_id` (`fakultas_id`);

--
-- Indeks untuk tabel `kegiatan_mahasiswa`
--
ALTER TABLE `kegiatan_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `matakuliah_id` (`matakuliah_id`),
  ADD KEY `tahun_ajar_id` (`tahun_ajar_id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indeks untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`),
  ADD KEY `matakuliah_id` (`matakuliah_id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `jurusan_id` (`jurusan_id`),
  ADD KEY `tahun_ajar_id` (`tahun_ajar_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `fk_jurusan_id` (`jurusan_id`),
  ADD KEY `fk_kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `matakuliah_id` (`matakuliah_id`);

--
-- Indeks untuk tabel `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  ADD PRIMARY KEY (`id_tahun_ajar`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_mahasiswa`
--
ALTER TABLE `kegiatan_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  MODIFY `id_tahun_ajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `fk_fakultas_id` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah` (`id_matakuliah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_3` FOREIGN KEY (`tahun_ajar_id`) REFERENCES `tahun_ajar` (`id_tahun_ajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_4` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD CONSTRAINT `kurikulum_ibfk_1` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah` (`id_matakuliah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kurikulum_ibfk_2` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kurikulum_ibfk_3` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kurikulum_ibfk_4` FOREIGN KEY (`tahun_ajar_id`) REFERENCES `tahun_ajar` (`id_tahun_ajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kurikulum_ibfk_5` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_jurusan_id` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `fk_kelas_id` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah` (`id_matakuliah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
