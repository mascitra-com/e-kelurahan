-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2017 at 08:58 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tanggal_agenda` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(16) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(16) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `kode_aktivasi` varchar(40) DEFAULT NULL,
  `kode_lupa_password` varchar(40) DEFAULT NULL,
  `waktu_lupa_password` int(10) UNSIGNED DEFAULT NULL,
  `kode_pengingat` varchar(40) DEFAULT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `id_organisasi`, `ip_address`, `username`, `password`, `salt`, `kode_aktivasi`, `kode_lupa_password`, `waktu_lupa_password`, `kode_pengingat`, `last_login`, `active`, `created_on`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, '', 'admin@kecamatan', '$2y$10$AMHHt36SU/nDMfPQ.VPFG.E2SXIipPQF/crjrwkVhFYO0PC10eAJS', NULL, NULL, NULL, NULL, NULL, 1487483759, 1, '2017-02-17 17:00:00', 0, NULL, NULL, NULL, NULL),
(2, 2, '127.0.0.1', 'Kelurahan-tompokerso@lumajang', '$2y$08$l1Taj8cY4fsLXlnjqzdAQ.hP69enNVE4NrWXv6CDAAvRhx0xk3obe', NULL, NULL, NULL, NULL, NULL, 1487488376, 1, '2017-02-17 23:03:29', 1, '2017-02-18 23:10:12', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` varchar(20) NOT NULL DEFAULT 'default.jpg' COMMENT 'nama gambar, disimpan dengan prefix',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=aktif, 1=tidak aktif, 2=draft',
  `tipe` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=umum, 1=headline',
  `count` int(11) NOT NULL,
  `tanggal_publish` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'jika terisi timestamp, berita dipindah ke bagian arsip',
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_kartu_keluarga`
--

CREATE TABLE `detail_kartu_keluarga` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(40) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `status_keluarga` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_tingkatan`
--

CREATE TABLE `detail_tingkatan` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_akun` int(11) UNSIGNED NOT NULL,
  `id_tingkatan` int(10) UNSIGNED NOT NULL,
  `menu` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tingkatan`
--

INSERT INTO `detail_tingkatan` (`id`, `id_akun`, `id_tingkatan`, `menu`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(2, 2, 2, '', '2017-02-18 06:03:29', 0, NULL, NULL, NULL, NULL),
(4, 1, 1, '', '2017-02-18 06:12:02', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe` enum('0','1') NOT NULL COMMENT '0 = Foto, 1= Video',
  `link` text DEFAULT NULL COMMENT 'isi null jika foto & video merupakan file yg diupload',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galeri_kategori`
--

CREATE TABLE `galeri_kategori` (
  `id` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_organisasi`
--

CREATE TABLE `info_organisasi` (
  `id` int(11) NOT NULL,
  `id_organisasi` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `pos` int(11) NOT NULL COMMENT 'urutan menu',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pekerjaan`
--

CREATE TABLE `jenis_pekerjaan` (
  `id_jenispekerjaan` int(11) NOT NULL,
  `pekerjaan` varchar(150) NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id_jenispekerjaan`, `pekerjaan`, `status_delete`) VALUES
(1, 'Pelajar/Mahasiswa', 0),
(2, 'Buruh Harian', 0),
(3, 'Petani', 0),
(4, 'Wiraswasta', 0),
(5, 'PNS', 0),
(6, 'Angkatan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pendidikan`
--

CREATE TABLE `jenis_pendidikan` (
  `id_jenispendidikan` int(11) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pendidikan`
--

INSERT INTO `jenis_pendidikan` (`id_jenispendidikan`, `pendidikan`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Tidak Sekolah', '2017-02-18 09:45:24', 0, NULL, NULL, NULL, NULL),
(2, 'SD / Sederajat', '2017-02-18 09:45:24', 0, NULL, NULL, NULL, NULL),
(3, 'SMP / Sederajat', '2017-02-18 09:45:24', 0, NULL, NULL, NULL, NULL),
(4, 'SMA / Sederajat', '2017-02-18 09:45:24', 0, NULL, NULL, NULL, NULL),
(5, 'Diploma 1', '2017-02-18 09:45:24', 0, NULL, NULL, NULL, NULL),
(6, 'Diploma 2', '2017-02-18 09:45:24', 0, NULL, NULL, NULL, NULL),
(7, 'Diploma 3', '2017-02-18 09:45:24', 0, NULL, NULL, NULL, NULL),
(8, 'Diploma 4 / Strata 1', '2017-02-18 09:45:24', 0, NULL, NULL, NULL, NULL),
(9, 'Strata 2', '2017-02-18 09:45:24', 0, NULL, NULL, NULL, NULL),
(10, 'Strata 3', '2017-02-18 09:45:24', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `no` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `nama_kepala_keluarga` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt` int(3) UNSIGNED ZEROFILL NOT NULL,
  `rw` int(3) UNSIGNED ZEROFILL NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelahiran`
--

CREATE TABLE `kelahiran` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(250) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_ayah` varchar(250) NOT NULL,
  `nama_ibu` varchar(250) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt` int(3) UNSIGNED ZEROFILL NOT NULL,
  `rw` int(3) UNSIGNED ZEROFILL NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meninggal`
--

CREATE TABLE `meninggal` (
  `id` int(11) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `sebab` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_keluar`
--

CREATE TABLE `mutasi_keluar` (
  `id` int(11) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `alamat_tujuan` varchar(100) NOT NULL,
  `rt_tujuan` varchar(100) NOT NULL,
  `rw_tujuan` varchar(100) NOT NULL,
  `kec_tujuan` varchar(100) NOT NULL,
  `kab_tujuan` varchar(100) NOT NULL,
  `prop_tujuan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_masuk`
--

CREATE TABLE `mutasi_masuk` (
  `id` int(11) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `alamat_asal` varchar(100) NOT NULL,
  `rt_asal` varchar(100) NOT NULL,
  `rw_asal` varchar(100) NOT NULL,
  `kec_asal` varchar(100) NOT NULL,
  `kab_asal` varchar(100) NOT NULL,
  `prop_asal` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('0','1','2') DEFAULT '0' COMMENT '0=menunggu, 1=disetujui, 2=ditolak',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id`, `nama`, `slug`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Kecamatan Lumajang', 'kecamatan-lumajang', '1', '2017-02-17 17:00:00', 0, NULL, NULL, NULL, NULL),
(2, 'Tompokerso', 'tompokerso', '1', '2017-02-17 17:00:00', 1, NULL, NULL, NULL, NULL),
(3, 'Patrang', 'patrang', '0', '2017-02-17 17:00:00', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `golongan_darah` varchar(2) NOT NULL,
  `status_nikah` tinyint(1) NOT NULL,
  `pendidikan` tinyint(4) NOT NULL,
  `nama_ibu` varchar(200) NOT NULL,
  `jenis_kelamin` enum('0','1') NOT NULL,
  `tanggal_lahir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `agama` tinyint(4) NOT NULL,
  `pekerjaan` tinyint(4) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `rt` int(3) UNSIGNED ZEROFILL NOT NULL,
  `rw` int(3) UNSIGNED ZEROFILL NOT NULL,
  `kewarganegaraan` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT curtime(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `prioritas` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = Penting, 1= Umum',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `percobaan_login`
--

CREATE TABLE `percobaan_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `alamat_ip` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `waktu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pindahrt`
--

CREATE TABLE `pindahrt` (
  `id` int(11) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `rt_tujuan` int(11) NOT NULL,
  `rw_tujuan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_organisasi`
--

CREATE TABLE `profil_organisasi` (
  `no` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_keluarga`
--

CREATE TABLE `status_keluarga` (
  `id_statuskeluarga` int(11) NOT NULL,
  `nama_statuskeluarga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_keluarga`
--

INSERT INTO `status_keluarga` (`id_statuskeluarga`, `nama_statuskeluarga`) VALUES
(1, 'Suami'),
(2, 'Istri'),
(3, 'Anak'),
(4, 'Cucu'),
(5, 'Orang Tua'),
(6, 'Mertua'),
(7, 'Family Lain');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal2` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `keperluan` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkatan`
--

INSERT INTO `tingkatan` (`id`, `name`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Admin Kecamatan', 'Mengakses semua fitur kecamatan', '2017-02-17 17:00:00', 0, NULL, NULL, NULL, NULL),
(2, 'Operator', 'Operator Kelurahan', '2017-02-17 17:00:00', 0, NULL, NULL, NULL, NULL),
(3, 'mem', 'mem', '2017-02-18 06:12:10', 0, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id_organisasi` (`id_organisasi`),
  ADD KEY `agenda_ibfk_3` (`updated_by`),
  ADD KEY `agenda_ibfk_4` (`deleted_by`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik_2` (`username`),
  ADD KEY `nik` (`username`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `detail_kartu_keluarga`
--
ALTER TABLE `detail_kartu_keluarga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_kk` (`no_kk`),
  ADD KEY `nik` (`nik`),
  ADD KEY `status_keluarga` (`status_keluarga`);

--
-- Indexes for table `detail_tingkatan`
--
ALTER TABLE `detail_tingkatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`,`created_by`,`updated_by`,`deleted_by`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `galeri_kategori`
--
ALTER TABLE `galeri_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `info_organisasi`
--
ALTER TABLE `info_organisasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id_organisasi` (`id_organisasi`,`created_by`,`updated_by`,`deleted_by`);

--
-- Indexes for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  ADD PRIMARY KEY (`id_jenispekerjaan`);

--
-- Indexes for table `jenis_pendidikan`
--
ALTER TABLE `jenis_pendidikan`
  ADD PRIMARY KEY (`id_jenispendidikan`);

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD KEY `pendidikan` (`pendidikan`),
  ADD KEY `pekerjaan` (`pekerjaan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
