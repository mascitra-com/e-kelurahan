-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 22 Mar 2017 pada 09.13
-- Versi Server: 10.2.3-MariaDB-log
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
-- Struktur dari tabel `surat_ijin_usaha`
--

CREATE TABLE `surat_ijin_usaha` (
  `id` varchar(10) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_usaha` varchar(255) NOT NULL,
  `umur` tinyint(3) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pengambilan` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1','2') DEFAULT '0' COMMENT '0=menunggu, 1=disetujui, 2=ditolak',
  `tanggal_verif` timestamp NULL DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal_ambil` timestamp NULL DEFAULT NULL,
  `nama_pengambil` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_ijin_usaha`
--
ALTER TABLE `surat_ijin_usaha`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
