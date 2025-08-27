-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2025 at 06:44 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `record_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_jenis_arsip`
--

CREATE TABLE `a_jenis_arsip` (
  `id_a` int NOT NULL,
  `kategori` enum('Substantif','Fasilitatif') NOT NULL,
  `kode_j_a` varchar(20) NOT NULL,
  `nama_j_a` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `a_jenis_arsip`
--

INSERT INTO `a_jenis_arsip` (`id_a`, `kategori`, `kode_j_a`, `nama_j_a`) VALUES
(1, 'Substantif', 'TM', 'Penerimaan Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `b_jenis_arsip`
--

CREATE TABLE `b_jenis_arsip` (
  `id_b` int NOT NULL,
  `id_a` int NOT NULL,
  `kode_j_b` varchar(20) NOT NULL,
  `nama_j_b` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `b_jenis_arsip`
--

INSERT INTO `b_jenis_arsip` (`id_b`, `id_a`, `kode_j_b`, `nama_j_b`) VALUES
(1, 1, 'TM.00', 'Penerimaan Mahasiswa Baru (PMB)');

-- --------------------------------------------------------

--
-- Table structure for table `c_jenis_arsip`
--

CREATE TABLE `c_jenis_arsip` (
  `id_c` int NOT NULL,
  `id_a` int NOT NULL,
  `id_b` int NOT NULL,
  `kode_j_c` varchar(20) NOT NULL,
  `nama_j_c` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `c_jenis_arsip`
--

INSERT INTO `c_jenis_arsip` (`id_c`, `id_a`, `id_b`, `kode_j_c`, `nama_j_c`) VALUES
(1, 1, 1, 'TM.00.00', 'Daya Tampung Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_arsip`
--

CREATE TABLE `klasifikasi_arsip` (
  `id` int NOT NULL,
  `id_c` int NOT NULL,
  `kode_klasifikasi` varchar(50) NOT NULL,
  `klasifikasi_keamanan` enum('Terbuka','Terbatas','Rahasia') NOT NULL,
  `akses_penentu_kebijakan` tinyint(1) DEFAULT '0',
  `akses_pelaksana_kebijakan` tinyint(1) DEFAULT '0',
  `akses_pengawas` tinyint(1) DEFAULT '0',
  `akses_publik` tinyint(1) DEFAULT '0',
  `akses_penegak_hukum` tinyint(1) DEFAULT '0',
  `akses_kantor_arsip` tinyint(1) DEFAULT '0',
  `hak_akses` text,
  `dasar_pertimbangan` text,
  `dasar_hukum` varchar(100) DEFAULT NULL,
  `unit_pengolah_utama` varchar(100) DEFAULT NULL,
  `unit_pengolah_pendukung` varchar(100) DEFAULT NULL,
  `jangka_waktu_aktif` int DEFAULT NULL,
  `jangka_waktu_inaktif` int DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `klasifikasi_arsip`
--

INSERT INTO `klasifikasi_arsip` (`id`, `id_c`, `kode_klasifikasi`, `klasifikasi_keamanan`, `akses_penentu_kebijakan`, `akses_pelaksana_kebijakan`, `akses_pengawas`, `akses_publik`, `akses_penegak_hukum`, `akses_kantor_arsip`, `hak_akses`, `dasar_pertimbangan`, `dasar_hukum`, `unit_pengolah_utama`, `unit_pengolah_pendukung`, `jangka_waktu_aktif`, `jangka_waktu_inaktif`, `keterangan`) VALUES
(1, 1, 'TM.00.00', 'Terbuka', 1, 1, 1, 1, 1, 1, 'Pengelola yang ditetapkan dan bertanggungjawab kepada Rektor sesuai dengan bidangnya', 'Tidak memiliki dampak yang mengganggu kinerja Universitas Padjadjaran', 'Terbatas', ' Unit yang membidangi bidang akademik', 'Organ Pengelola yang ditugaskan pada bidangnya.', 2, 3, 'Musnah, kecuali penetapan rekapitulasi daya tampung Permanen ');

-- --------------------------------------------------------

--
-- Table structure for table `rc_user`
--

CREATE TABLE `rc_user` (
  `id` int NOT NULL,
  `nip` varchar(50) NOT NULL DEFAULT '0',
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rc_user`
--

INSERT INTO `rc_user` (`id`, `nip`, `nama_lengkap`, `jabatan`, `password`, `hak_akses`) VALUES
(1, '10501068', 'Allesha', 'Pimpinan', '25d55ad283aa400af464c76d713c07ad', 'Admin'),
(2, '10501069', 'Nuraini Azizah', 'Staff', '25d55ad283aa400af464c76d713c07ad', 'Admin'),
(6, '10501070', 'Joe Satriani', 'Pimpinan', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin'),
(7, '10501071', 'Rhatista', 'Staff', '985b7f539465890cb0c3eac6dc54d869', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_jenis_arsip`
--
ALTER TABLE `a_jenis_arsip`
  ADD PRIMARY KEY (`id_a`);

--
-- Indexes for table `b_jenis_arsip`
--
ALTER TABLE `b_jenis_arsip`
  ADD PRIMARY KEY (`id_b`),
  ADD KEY `id_a` (`id_a`);

--
-- Indexes for table `c_jenis_arsip`
--
ALTER TABLE `c_jenis_arsip`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `id_a` (`id_a`),
  ADD KEY `id_b` (`id_b`);

--
-- Indexes for table `klasifikasi_arsip`
--
ALTER TABLE `klasifikasi_arsip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_c` (`id_c`);

--
-- Indexes for table `rc_user`
--
ALTER TABLE `rc_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_jenis_arsip`
--
ALTER TABLE `a_jenis_arsip`
  MODIFY `id_a` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `b_jenis_arsip`
--
ALTER TABLE `b_jenis_arsip`
  MODIFY `id_b` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `c_jenis_arsip`
--
ALTER TABLE `c_jenis_arsip`
  MODIFY `id_c` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klasifikasi_arsip`
--
ALTER TABLE `klasifikasi_arsip`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rc_user`
--
ALTER TABLE `rc_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `b_jenis_arsip`
--
ALTER TABLE `b_jenis_arsip`
  ADD CONSTRAINT `b_jenis_arsip_ibfk_1` FOREIGN KEY (`id_a`) REFERENCES `a_jenis_arsip` (`id_a`) ON DELETE CASCADE;

--
-- Constraints for table `c_jenis_arsip`
--
ALTER TABLE `c_jenis_arsip`
  ADD CONSTRAINT `c_jenis_arsip_ibfk_1` FOREIGN KEY (`id_a`) REFERENCES `a_jenis_arsip` (`id_a`) ON DELETE CASCADE,
  ADD CONSTRAINT `c_jenis_arsip_ibfk_2` FOREIGN KEY (`id_b`) REFERENCES `b_jenis_arsip` (`id_b`) ON DELETE CASCADE;

--
-- Constraints for table `klasifikasi_arsip`
--
ALTER TABLE `klasifikasi_arsip`
  ADD CONSTRAINT `klasifikasi_arsip_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `c_jenis_arsip` (`id_c`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
