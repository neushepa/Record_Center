-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2025 at 12:22 PM
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
(1, '10501068', 'Allesha Andrianto', 'Pimpinan', '25d55ad283aa400af464c76d713c07ad', 'Admin'),
(2, '10501069', 'Nuraini Azizah', 'Staff', '25d55ad283aa400af464c76d713c07ad', 'Admin'),
(6, '10501070', 'Joe Satriani', 'Pimpinan', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `rc_user`
--
ALTER TABLE `rc_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
