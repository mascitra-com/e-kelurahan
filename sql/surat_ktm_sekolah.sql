-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2017 at 07:31 AM
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
-- Table structure for table `surat_ktm_sekolah`
--

CREATE TABLE `surat_ktm_sekolah` (
  `id` varchar(10) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
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
-- Dumping data for table `surat_ktm_sekolah`
--

INSERT INTO `surat_ktm_sekolah` (`id`, `no_surat`, `nik`, `id_organisasi`, `jurusan`, `asal_sekolah`, `tanggal_verif`, `status`, `keterangan`, `tanggal_ambil`, `nama_pengambil`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
('SKS0000001', NULL, '13241010101044', 2, 'IPA', 'SMA Negeri 5 Jember', '2017-03-22 17:00:00', '1', 'Surat ini sudah kami terima dengan baik', NULL, NULL, '2017-03-22 17:00:00', 2, '2017-03-22 17:00:00', 2, NULL, NULL),
('STSSKS0000', '29/1/02.002/2017', '123456789', 2, 'IPS', 'SMA 2', '2017-03-23 00:30:56', '1', '', '2017-03-23 00:31:24', 'Citra', '2017-03-23 00:18:43', 2, '2017-03-23 00:31:24', 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_ktm_sekolah`
--
ALTER TABLE `surat_ktm_sekolah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_surat` (`no_surat`),
  ADD KEY `id_organisasi` (`id_organisasi`),
  ADD KEY `nik` (`nik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
