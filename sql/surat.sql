-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2017 at 07:24 AM
-- Server version: 10.2.3-MariaDB-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekel_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `jenis` enum('0','1','2','3') NOT NULL COMMENT '0=Blanko KTP, 1=SKCK, 2=Ket Miskon, 3=Ket.Miskin(RT)',
  `tanggal_verif` timestamp NULL DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=menunggu, 1=disetujui, 2=ditolak',
  `keterangan` text DEFAULT NULL,
  `tanggal_ambil` timestamp NULL DEFAULT NULL,
  `nama_pengambil` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `no_surat`, `nik`, `id_organisasi`, `jenis`, `tanggal_verif`, `status`, `keterangan`, `tanggal_ambil`, `nama_pengambil`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(001, '23/1/02.002/2017', '13241010101044', 2, '0', '2017-03-21 04:22:22', '1', 'Oke', NULL, NULL, '2017-03-21 01:24:04', 3, '2017-03-21 04:22:22', 2, NULL, NULL),
(002, '23/3/02.002/2017', '123456789', 2, '0', '2017-03-21 02:22:19', '1', '', '2017-03-21 03:04:00', 'Citra', '2017-03-21 01:37:45', 4, '2017-03-21 03:04:00', 2, NULL, NULL),
(003, '23/2/02.002/2017', '123809123810938', 2, '0', '2017-03-21 01:57:16', '1', 'mohon dilengkapi', '2017-03-21 02:58:55', 'Budi', '2017-03-21 01:57:16', 2, '2017-03-21 02:58:55', 2, NULL, NULL),
(005, NULL, '13241010101044', 2, '1', NULL, '0', NULL, NULL, NULL, '2017-03-22 00:08:46', 3, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_surat` (`no_surat`),
  ADD KEY `id_organisasi` (`id_organisasi`),
  ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_ibfk_2` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
