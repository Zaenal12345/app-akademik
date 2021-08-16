-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Agu 2020 pada 02.19
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'zaenal123', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_dosen`
--

CREATE TABLE `tabel_dosen` (
  `nidn` char(15) NOT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `jenis_kelamin` char(10) DEFAULT NULL,
  `gelar` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(15) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `alamat` text,
  `no_telp` char(16) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_dosen`
--

INSERT INTO `tabel_dosen` (`nidn`, `nama_dosen`, `jenis_kelamin`, `gelar`, `pendidikan`, `status`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `foto`) VALUES
('12345', 'Zaenal Muttaqin', 'Laki-laki', 'S.Kom, M.Kom', 'S2', 'Tetap', 'Bandung', '1999-12-18', 'Islam', '', '081224339290', '5f163ccceac76.JPG'),
('23456', 'Sinta Cantika', 'Perempuan', 'S.Kom, M.Kom', 'S2', 'Tetap', 'Bandung Barat', '1999-08-23', 'Islam', '', '082123123123', '5f163cae5b878.jpg'),
('34567', 'Guntur Bagja', 'Laki-laki', 'S.Kom, M.Kom', 'S2', 'Tetap', 'Bandung', '2020-07-21', 'Islam', '', '12345678', 'default.png'),
('56789', 'Muhammad Ilham Nur Fauzan', 'Laki-laki', 'S.Kom, M.Kom', 'S2', 'Tetap', 'Bandung', '2020-07-21', 'Islam', '', '082123123123', 'default.png'),
('67890', 'Herdiana', 'Laki-laki', 'S.Kom, M.Kom', 'S2', 'Tetap', 'Cianjur', '2020-07-21', 'Islam', '', '12345678', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_fakultas`
--

CREATE TABLE `tabel_fakultas` (
  `id_fakultas` char(10) NOT NULL,
  `nama_fakultas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_fakultas`
--

INSERT INTO `tabel_fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
('01', 'EKONOMI'),
('02', 'SASTRA'),
('03', 'PSIKOLOGI'),
('04', 'ILMU KOMPUTER'),
('05', 'TEKNIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jurusan`
--

CREATE TABLE `tabel_jurusan` (
  `id_jurusan` char(10) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL,
  `id_fakultas` char(10) DEFAULT NULL,
  `akreditasi` char(5) DEFAULT NULL,
  `jenjang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_jurusan`
--

INSERT INTO `tabel_jurusan` (`id_jurusan`, `nama_jurusan`, `id_fakultas`, `akreditasi`, `jenjang`) VALUES
('55201', 'Teknik Informatika', '04', '', 'S1'),
('57401', 'Manajemen Informatika', '04', '', 'D3'),
('61201', 'Manajemen', '01', '', 'S1'),
('62201', 'Akuntansi', '01', '', 'S1'),
('73201', 'Psikologi', '03', '', 'S1'),
('79204', 'Bahasa Jepang', '02', '', 'D3'),
('79402', 'Bahasa Inggris', '02', '', 'D3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kelas`
--

CREATE TABLE `tabel_kelas` (
  `id_kelas` char(2) NOT NULL,
  `nama_kelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_kelas`
--

INSERT INTO `tabel_kelas` (`id_kelas`, `nama_kelas`) VALUES
('1', 'Reguler Pagi'),
('2', 'Reguler Sore'),
('3', 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_krs`
--

CREATE TABLE `tabel_krs` (
  `id` int(11) NOT NULL,
  `nim` char(15) DEFAULT NULL,
  `id_matakuliah` char(10) DEFAULT NULL,
  `tahun_ajaran` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_krs`
--

INSERT INTO `tabel_krs` (`id`, `nim`, `id_matakuliah`, `tahun_ajaran`) VALUES
(1, '0203171081', '10', '20201'),
(2, '0203171081', '11', '20201'),
(3, '0203171081', '7', '20201'),
(4, '0203171081', '8', '20201'),
(5, '0203171081', '9', '20201'),
(6, '0203171086', '10', '20201'),
(7, '0203171086', '11', '20201'),
(8, '0203171086', '9', '20201'),
(9, '0203171086', '8', '20201'),
(10, '0203171086', '7', '20201'),
(11, '0203171081', '1', '20192'),
(12, '0203171081', '2', '20192'),
(13, '0203171081', '6', '20192'),
(14, '0203171081', '4', '20192'),
(15, '0203171081', '5', '20192'),
(16, '0203171081', '3', '20192'),
(17, '0203171086', '1', '20192'),
(18, '0203171086', '2', '20192'),
(19, '0203171086', '3', '20192'),
(20, '0203171086', '4', '20192'),
(21, '0203171086', '5', '20192'),
(22, '0203171086', '6', '20192');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kurikulum`
--

CREATE TABLE `tabel_kurikulum` (
  `tahun_ajaran` char(15) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_kurikulum`
--

INSERT INTO `tabel_kurikulum` (`tahun_ajaran`, `keterangan`) VALUES
('20201', 'Semester ganjil'),
('20192', 'Semester Genap'),
('20191', 'Semester ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `nim` char(15) NOT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `prodi` char(10) DEFAULT NULL,
  `jenis_kelamin` char(10) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(16) DEFAULT NULL,
  `kewarnegaraan` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kelas` char(2) DEFAULT NULL,
  `status_mahasiswa` char(10) DEFAULT NULL,
  `tahun_angkatan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`nim`, `nama_mahasiswa`, `prodi`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `kewarnegaraan`, `email`, `kelas`, `status_mahasiswa`, `tahun_angkatan`) VALUES
('0203171081', 'ZAENAL MUTTAQIN', '55201', 'Laki-laki', 'Bandung', '1999-12-18', 'Islam', '', '081224339290', 'Indonesia', 'zenm176@gmail.com', '1', 'Non Aktif', '2020'),
('0203171083', 'Panji', '62201', 'Laki-laki', 'Bandung', '2020-08-30', 'Islam', '', '081224339290', 'Moonton Empire', 'gm426491@gmail.com', '1', 'Aktif', NULL),
('0203171086', 'SINTA CANTIKA', '55201', 'Perempuan', 'Bandung', '1999-08-23', 'Islam', '', '081224339290', 'Indonesia', 'cantika023@gmail.com', '1', 'Aktif', '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_matakuliah`
--

CREATE TABLE `tabel_matakuliah` (
  `id_matakuliah` char(10) NOT NULL,
  `nama_matakuliah` varchar(50) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  `semester` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_matakuliah`
--

INSERT INTO `tabel_matakuliah` (`id_matakuliah`, `nama_matakuliah`, `sks`, `semester`) VALUES
('1', 'PENGANTAR BISNIS', 2, '1'),
('10', 'STRUKTUR DATA', 3, '2'),
('11', 'PEMPROGAMAN VISUAL I', 3, '2'),
('2', 'PENGANTAR AKUNTANSI', 2, '1'),
('3', 'FISIKA', 2, '1'),
('4', 'KALKULUS I', 3, '1'),
('5', 'PENGENALAN INSTALASI KOMPUTER', 3, '1'),
('6', 'PENGERTIAN PENGOLAHAN DATA ELEKTRONIK', 3, '1'),
('7', 'AL-JABAR LINEAR', 3, '2'),
('8', 'BASIS DATA I', 3, '2'),
('9', 'PROTEKS I', 3, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_nilai`
--

CREATE TABLE `tabel_nilai` (
  `id` int(11) NOT NULL,
  `id_matakuliah` char(10) DEFAULT NULL,
  `nim` char(15) DEFAULT NULL,
  `kehadiran` int(11) DEFAULT '0',
  `tugas` int(11) DEFAULT '0',
  `UTS` int(11) DEFAULT '0',
  `UAS` int(11) DEFAULT '0',
  `nilai_akhir` int(11) DEFAULT '0',
  `mutu` char(2) DEFAULT '',
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_nilai`
--

INSERT INTO `tabel_nilai` (`id`, `id_matakuliah`, `nim`, `kehadiran`, `tugas`, `UTS`, `UAS`, `nilai_akhir`, `mutu`, `status`) VALUES
(1, '10', '0203171081', 100, 100, 90, 90, 93, 'A', NULL),
(2, '10', '0203171086', 100, 100, 100, 90, 96, 'A', NULL),
(3, '11', '0203171081', 100, 90, 90, 90, 91, 'B', NULL),
(4, '11', '0203171086', 100, 90, 90, 100, 95, 'A', NULL),
(5, '7', '0203171081', 100, 100, 70, 75, 81, 'B', NULL),
(6, '7', '0203171086', 100, 100, 80, 80, 86, 'A', NULL),
(7, '8', '0203171081', 100, 100, 90, 90, 93, 'A', NULL),
(8, '8', '0203171086', 100, 100, 100, 100, 100, 'A', NULL),
(9, '9', '0203171081', 100, 100, 100, 90, 96, 'A', NULL),
(10, '9', '0203171086', 100, 100, 100, 100, 100, 'A', NULL),
(11, '1', '0203171081', 100, 100, 90, 85, 91, 'A', NULL),
(12, '1', '0203171086', 100, 100, 90, 90, 93, 'A', NULL),
(13, '3', '0203171081', 100, 100, 90, 90, 93, 'A', NULL),
(14, '3', '0203171086', 100, 100, 90, 90, 93, 'A', NULL),
(15, '2', '0203171081', 100, 100, 90, 90, 93, 'A', NULL),
(16, '2', '0203171086', 100, 100, 90, 9, 61, 'C', NULL),
(17, '4', '0203171081', 100, 100, 80, 76, 84, 'A', NULL),
(18, '4', '0203171086', 100, 100, 80, 80, 86, 'A', NULL),
(19, '5', '0203171081', 100, 100, 90, 90, 93, 'A', NULL),
(20, '5', '0203171086', 100, 100, 90, 90, 93, 'A', NULL),
(21, '6', '0203171081', 100, 100, 100, 90, 96, 'A', NULL),
(22, '6', '0203171086', 100, 100, 100, 100, 100, 'A', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_perkuliahan`
--

CREATE TABLE `tabel_perkuliahan` (
  `id_perkuliahan` int(11) NOT NULL,
  `tahun_ajaran` char(15) DEFAULT NULL,
  `kelas` char(2) DEFAULT NULL,
  `nidn` char(15) DEFAULT NULL,
  `id_matakuliah` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_perkuliahan`
--

INSERT INTO `tabel_perkuliahan` (`id_perkuliahan`, `tahun_ajaran`, `kelas`, `nidn`, `id_matakuliah`) VALUES
(1, '20201', '1', '67890', '9'),
(2, '20201', '1', '56789', '8'),
(3, '20201', '1', '34567', '7'),
(4, '20201', '1', '23456', '10'),
(5, '20201', '1', '12345', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_tahun_ajar`
--

CREATE TABLE `tabel_tahun_ajar` (
  `tahun_ajaran` char(15) NOT NULL,
  `status` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_tahun_ajar`
--

INSERT INTO `tabel_tahun_ajar` (`tahun_ajaran`, `status`) VALUES
('20191', 'Tidak Aktif'),
('20192', 'Tidak Aktif'),
('20201', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `nik` char(15) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `password_user` varchar(300) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`nik`, `nama_user`, `password_user`, `email_user`, `foto`) VALUES
('0203171081', 'Admin Akademik 123', '$2y$10$ZwjNXM0diyad.i5/86bLlOX3TYr/mWYaR9ivZ.VJVsKHbjIUUQlIi', 'akademik@gmail.com', '5f25233039ad7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_dosen`
--
ALTER TABLE `tabel_dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indeks untuk tabel `tabel_fakultas`
--
ALTER TABLE `tabel_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tabel_jurusan`
--
ALTER TABLE `tabel_jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tabel_krs`
--
ALTER TABLE `tabel_krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_matakuliah` (`id_matakuliah`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indeks untuk tabel `tabel_kurikulum`
--
ALTER TABLE `tabel_kurikulum`
  ADD KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indeks untuk tabel `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `tabel_mahasiswa_ibfk_3` (`prodi`);

--
-- Indeks untuk tabel `tabel_matakuliah`
--
ALTER TABLE `tabel_matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indeks untuk tabel `tabel_nilai`
--
ALTER TABLE `tabel_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_matakuliah` (`id_matakuliah`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `tabel_perkuliahan`
--
ALTER TABLE `tabel_perkuliahan`
  ADD PRIMARY KEY (`id_perkuliahan`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `id_matakuliah` (`id_matakuliah`);

--
-- Indeks untuk tabel `tabel_tahun_ajar`
--
ALTER TABLE `tabel_tahun_ajar`
  ADD PRIMARY KEY (`tahun_ajaran`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_krs`
--
ALTER TABLE `tabel_krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tabel_nilai`
--
ALTER TABLE `tabel_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tabel_perkuliahan`
--
ALTER TABLE `tabel_perkuliahan`
  MODIFY `id_perkuliahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabel_jurusan`
--
ALTER TABLE `tabel_jurusan`
  ADD CONSTRAINT `tabel_jurusan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `tabel_fakultas` (`id_fakultas`);

--
-- Ketidakleluasaan untuk tabel `tabel_krs`
--
ALTER TABLE `tabel_krs`
  ADD CONSTRAINT `tabel_krs_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tabel_mahasiswa` (`nim`),
  ADD CONSTRAINT `tabel_krs_ibfk_2` FOREIGN KEY (`id_matakuliah`) REFERENCES `tabel_matakuliah` (`id_matakuliah`),
  ADD CONSTRAINT `tabel_krs_ibfk_3` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tabel_tahun_ajar` (`tahun_ajaran`);

--
-- Ketidakleluasaan untuk tabel `tabel_kurikulum`
--
ALTER TABLE `tabel_kurikulum`
  ADD CONSTRAINT `tabel_kurikulum_ibfk_1` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tabel_tahun_ajar` (`tahun_ajaran`);

--
-- Ketidakleluasaan untuk tabel `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD CONSTRAINT `tabel_mahasiswa_ibfk_2` FOREIGN KEY (`kelas`) REFERENCES `tabel_kelas` (`id_kelas`),
  ADD CONSTRAINT `tabel_mahasiswa_ibfk_3` FOREIGN KEY (`prodi`) REFERENCES `tabel_jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `tabel_nilai`
--
ALTER TABLE `tabel_nilai`
  ADD CONSTRAINT `tabel_nilai_ibfk_1` FOREIGN KEY (`id_matakuliah`) REFERENCES `tabel_matakuliah` (`id_matakuliah`),
  ADD CONSTRAINT `tabel_nilai_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tabel_mahasiswa` (`nim`);

--
-- Ketidakleluasaan untuk tabel `tabel_perkuliahan`
--
ALTER TABLE `tabel_perkuliahan`
  ADD CONSTRAINT `tabel_perkuliahan_ibfk_1` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tabel_tahun_ajar` (`tahun_ajaran`),
  ADD CONSTRAINT `tabel_perkuliahan_ibfk_2` FOREIGN KEY (`kelas`) REFERENCES `tabel_kelas` (`id_kelas`),
  ADD CONSTRAINT `tabel_perkuliahan_ibfk_3` FOREIGN KEY (`nidn`) REFERENCES `tabel_dosen` (`nidn`),
  ADD CONSTRAINT `tabel_perkuliahan_ibfk_4` FOREIGN KEY (`id_matakuliah`) REFERENCES `tabel_matakuliah` (`id_matakuliah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
