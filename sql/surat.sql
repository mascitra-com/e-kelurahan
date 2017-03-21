-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2017 at 07:13 AM
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

INSERT INTO `surat` (`id`, `no_surat`, `nik`, `id_organisasi`, `jenis`, `tanggal_verif`, `status`, `keterangan`, `nama_pengambil`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(002, '23/2/02.002/2017', '3764289649123', 2, '0', '2017-02-28 03:33:07', '2', NULL, NULL, '2017-02-28 03:33:08', 2, NULL, NULL, NULL, NULL),
(003, '23/7/02.002/2017', '389475932753034750954', 2, '0', '2017-03-15 02:50:51', '1', NULL, NULL, '2017-03-02 03:40:28', 2, '2017-03-15 02:50:51', 2, NULL, 2),
(004, '24/1/02.002/2017', '389475932753034750954', 2, '1', '2017-02-28 01:45:40', '1', NULL, NULL, '2017-02-28 01:45:40', 2, NULL, NULL, NULL, NULL),
(005, '24/2/02.002/2017', '3764289649123', 2, '1', '2017-02-28 01:49:22', '1', NULL, NULL, '2017-02-28 01:49:22', 2, NULL, NULL, NULL, NULL),
(006, '25/1/02.002/2017', '83740927349074', 2, '2', '2017-02-28 01:56:21', '1', NULL, NULL, '2017-02-28 01:56:21', 2, NULL, NULL, NULL, NULL),
(007, '26/1/02.002/2017', '7289379132', 2, '3', '2017-02-28 02:10:12', '1', NULL, NULL, '2017-02-28 02:10:12', 2, NULL, NULL, NULL, NULL),
(009, '23/4/02.002/2017', '123809123810938', 2, '0', '2017-03-03 01:36:13', '1', NULL, NULL, '2017-03-03 01:36:13', 2, NULL, NULL, NULL, NULL),
(010, NULL, '3764289649123', 2, '0', NULL, '0', NULL, NULL, '2017-03-03 02:56:49', 2, NULL, NULL, NULL, NULL),
(011, '23/5/02.002/2017', '83740927349074', 2, '0', '2017-03-15 02:48:59', '1', NULL, NULL, '2017-03-15 02:48:59', 2, NULL, NULL, NULL, NULL),
(012, '23/6/02.002/2017', '7289379132', 2, '0', '2017-03-15 02:49:21', '1', NULL, NULL, '2017-03-15 02:49:21', 2, NULL, NULL, NULL, NULL),
(013, NULL, '389475932753034750954', 2, '0', NULL, '0', NULL, NULL, '2017-03-15 02:54:03', 2, NULL, NULL, NULL, NULL),
(014, '23/8/02.002/2017', '13241010101044', 2, '0', '2017-03-15 19:16:45', '1', NULL, NULL, '2017-03-16 01:18:17', 3, '2017-03-16 07:16:45', 2, NULL, NULL),
(015, NULL, '13241010101044', 2, '0', NULL, '0', NULL, NULL, '2017-03-16 07:53:03', 3, NULL, NULL, NULL, NULL),
(016, NULL, '13241010101044', 2, '2', NULL, '0', NULL, NULL, '2017-03-16 07:54:14', 3, NULL, NULL, NULL, NULL),
(017, NULL, '13241010101044', 2, '2', NULL, '0', NULL, NULL, '2017-03-16 07:56:27', 3, NULL, NULL, NULL, NULL),
(018, NULL, '13241010101044', 2, '2', NULL, '0', NULL, NULL, '2017-03-16 07:56:53', 3, NULL, NULL, NULL, NULL);

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
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
