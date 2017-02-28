-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 28 Feb 2017 pada 08.54
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `id_organisasi`, `ip_address`, `username`, `password`, `salt`, `kode_aktivasi`, `kode_lupa_password`, `waktu_lupa_password`, `kode_pengingat`, `last_login`, `active`, `created_on`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 0, '', 'superadmin@super', '$2y$08$l1Taj8cY4fsLXlnjqzdAQ.hP69enNVE4NrWXv6CDAAvRhx0xk3obe', NULL, NULL, NULL, NULL, NULL, 1488257314, 1, '2017-02-17 17:00:00', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
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
-- Struktur dari tabel `akun`
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
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `id_organisasi`, `ip_address`, `username`, `password`, `salt`, `kode_aktivasi`, `kode_lupa_password`, `waktu_lupa_password`, `kode_pengingat`, `last_login`, `active`, `created_on`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, '', 'admin@kecamatan', '$2y$10$AMHHt36SU/nDMfPQ.VPFG.E2SXIipPQF/crjrwkVhFYO0PC10eAJS', NULL, NULL, NULL, NULL, NULL, 1487680998, 1, '2017-02-17 17:00:00', 0, NULL, NULL, NULL, NULL),
(2, 2, '127.0.0.1', 'Kelurahan-tompokerso@lumajang', '$2y$08$46rOdKNvNo/R34H0vvSSaOux55TCV9BO2B4BH4MQTxK7bzMRY/oji', NULL, NULL, NULL, NULL, NULL, 1488271936, 1, '2017-02-17 23:03:29', 1, '2017-02-21 02:32:29', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
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
  `tanggal_publish` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'jika terisi timestamp, berita dipindah ke bagian arsip',
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kartu_keluarga`
--

CREATE TABLE `detail_kartu_keluarga` (
  `id` int(11) UNSIGNED NOT NULL,
  `no_kk` varchar(40) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `status_keluarga` int(11) NOT NULL DEFAULT 1,
  `no_urut_kk` int(11) UNSIGNED NOT NULL DEFAULT 1,
  `no_paspor` varchar(30) DEFAULT NULL,
  `no_kitap` varchar(40) DEFAULT NULL,
  `ayah` varchar(255) DEFAULT NULL,
  `ibu` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_kartu_keluarga`
--

INSERT INTO `detail_kartu_keluarga` (`id`, `no_kk`, `nik`, `id_pendidikan`, `status_keluarga`, `no_urut_kk`, `no_paspor`, `no_kitap`, `ayah`, `ibu`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(2, '123', '389475932753034750954', 8, 1, 1, 'edit', '', '', '', '2017-02-20 05:29:09', 2, '2017-02-21 05:25:49', 2, NULL, NULL),
(3, '678', '83740927349074', 7, 1, 1, '', '', '', '', '2017-02-20 23:01:08', 2, '2017-02-21 05:23:14', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tingkatan`
--

CREATE TABLE `detail_tingkatan` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_akun` int(11) UNSIGNED NOT NULL,
  `id_tingkatan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_tingkatan`
--

INSERT INTO `detail_tingkatan` (`id`, `id_akun`, `id_tingkatan`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(2, 2, 2, '2017-02-18 06:03:29', 0, NULL, NULL, NULL, NULL),
(4, 1, 1, '2017-02-18 06:12:02', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
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
-- Struktur dari tabel `galeri_kategori`
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
-- Struktur dari tabel `golongan_pegawai`
--

CREATE TABLE `golongan_pegawai` (
  `id` int(2) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `golongan` char(3) NOT NULL,
  `ruang` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan_pegawai`
--

INSERT INTO `golongan_pegawai` (`id`, `nama`, `golongan`, `ruang`) VALUES
(1, 'Pembina Utama', 'IV', 'e'),
(2, 'Pembina Utama Madya', 'IV', 'd'),
(3, 'Pembina Utama Muda', 'IV', 'c'),
(4, 'Pembina Tingkat I', 'IV', 'b'),
(5, 'Pembina', 'IV', 'a'),
(6, 'Penata Tingkat I', 'III', 'd'),
(7, 'Penata', 'III', 'c'),
(8, 'Penata Muda Tingkat I', 'III', 'b'),
(9, 'Penata Muda', 'III', 'a'),
(10, 'Pengatur Tingkat I', 'II', 'd'),
(11, 'Pengatur ', 'II', 'c'),
(12, 'Pengatur Muda Tingkat I', 'II', 'b'),
(13, 'Pengatur Muda', 'II', 'a'),
(14, 'Juru Tingkat I', 'I', 'd'),
(15, 'Juru', 'I', 'c'),
(16, 'Juru Muda Tingkat I', 'I', 'b'),
(17, 'Juru Muda', 'I', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_organisasi`
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
-- Struktur dari tabel `jenis_pekerjaan`
--

CREATE TABLE `jenis_pekerjaan` (
  `id_jenispekerjaan` int(11) NOT NULL,
  `pekerjaan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id_jenispekerjaan`, `pekerjaan`) VALUES
(1, 'Belum / Tidak Bekerja'),
(2, 'Mengurus Rumah Tangga'),
(3, 'Pelajar / Mahasiswa'),
(4, 'Pensiunan'),
(5, 'Pegawai Negeri Sipil'),
(6, 'Tentara Nasional Indonesia'),
(7, 'Kepolisian RI'),
(8, 'Perdagangan'),
(9, 'Petani / Pekebun'),
(10, 'Peternak'),
(11, 'Nelayan / Perikanan'),
(12, 'Industri'),
(13, 'Konstruksi'),
(14, 'Transportasi'),
(15, 'Karyawan Swasta'),
(16, 'Karyawan BUMN'),
(17, 'Karyawan BUMD'),
(18, 'Karyawan Honorer'),
(19, 'Buruh Harian Lepas'),
(20, 'Buruh Tani / Perkebunan'),
(21, 'Buruh Nelayan / Perikanan'),
(22, 'Buruh Peternakan'),
(23, 'Pembantu Rumah Tangga'),
(24, 'Tukang Cukur'),
(25, 'Tukang Listrik'),
(26, 'Tukang Batu'),
(27, 'Tukang Kayu'),
(28, 'Tukang Sol Sepatu'),
(29, 'Tukang Las / Pandai Besi'),
(30, 'Tukang Jahit'),
(31, 'Penata Rambut'),
(32, 'Penata Rias'),
(33, 'Penata Busana'),
(34, 'Mekanik'),
(35, 'Tukang Gigi'),
(36, 'Seniman'),
(37, 'Tabib'),
(38, 'Paraji'),
(39, 'Perancang Busana'),
(40, 'Penterjemah'),
(41, 'Imam Masjid'),
(42, 'Pendeta'),
(43, 'Pastur'),
(44, 'Wartawan'),
(45, 'Ustadz / Mubaligh'),
(46, 'Juru Masak'),
(47, 'Promotor Acara'),
(48, 'Anggota DPR-RI'),
(49, 'Anggota DPD'),
(50, 'Anggota BPK'),
(51, 'Presiden'),
(52, 'Wakil Presiden'),
(53, 'Anggota Mahkamah Konstitusi'),
(54, 'Anggota Kabinet / Kementerian'),
(55, 'Duta Besar'),
(56, 'Gubernur'),
(57, 'Wakil Gubernur'),
(58, 'Bupati'),
(59, 'Wakil Bupati'),
(60, 'Walikota'),
(61, 'Wakil Walikota'),
(62, 'Anggota DPRD Propinsi'),
(63, 'Anggota DPRD Kabupaten / Kota'),
(64, 'Dosen'),
(65, 'Guru'),
(66, 'Pilot'),
(67, 'Pengacara'),
(68, 'Notaris'),
(69, 'Arsitek'),
(70, 'Akuntan'),
(71, 'Konsultan'),
(72, 'Dokter'),
(73, 'Bidan'),
(74, 'Perawat'),
(75, 'Apoteker'),
(76, 'Psikiater / Psikolog'),
(77, 'Penyiar Televisi'),
(78, 'Penyiar Radio'),
(79, 'Pelaut'),
(80, 'Peneliti'),
(81, 'Sopir'),
(82, 'Pialang'),
(83, 'Paranormal'),
(84, 'Pedagang'),
(85, 'Perangkat Desa'),
(86, 'Kepala Desa'),
(87, 'Biarawati'),
(88, 'Wiraswasta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pendidikan`
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
-- Dumping data untuk tabel `jenis_pendidikan`
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
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu_keluarga`
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
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelahiran`
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
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `no` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt` int(3) UNSIGNED ZEROFILL NOT NULL,
  `rw` int(3) UNSIGNED ZEROFILL NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`no`, `id_organisasi`, `nik`, `alamat`, `rt`, `rw`, `kode_pos`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
('123', 2, '389475932753034750954', 'Lorem ipsum dolor sit amet, consectetur.', 002, 011, '68118', '2017-02-20 05:29:09', 2, '2017-02-20 23:15:28', 2, NULL, NULL),
('678', 2, '83740927349074', 'Lorem ipsum dolor sit amet, consectetur.', 001, 009, '68118', '2017-02-20 23:01:07', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` bigint(20) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meninggal`
--

CREATE TABLE `meninggal` (
  `id` int(11) UNSIGNED NOT NULL,
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
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `link`) VALUES
(1, 'dashboard/index'),
(2, 'kelurahan/index'),
(3, 'kelurahan/simpan'),
(4, 'keluarga/ubah'),
(5, 'kelurahan/nonaktifkan'),
(6, 'kelurahan/aktifkan'),
(7, 'kelurahan/batal'),
(8, 'penduduk/index'),
(9, 'penduduk/search'),
(10, 'penduduk/page'),
(11, 'penduduk/refresh'),
(12, 'penduduk/urut'),
(13, 'penduduk/tambah'),
(14, 'penduduk/simpan'),
(15, 'penduduk/detail'),
(16, 'penduduk/ubah'),
(17, 'penduduk/hapus'),
(18, 'keluarga/index');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi_keluar`
--

CREATE TABLE `mutasi_keluar` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `no_surat` int(11) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `alamat_asal` text NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `rt_tujuan` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `rw_tujuan` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `id_prov_tujuan` int(11) NOT NULL,
  `id_kab_tujuan` int(11) NOT NULL,
  `id_kec_tujuan` int(11) NOT NULL,
  `id_kel_tujuan` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mutasi_keluar`
--

INSERT INTO `mutasi_keluar` (`id`, `id_organisasi`, `no_surat`, `nik`, `alamat_asal`, `alamat_tujuan`, `rt_tujuan`, `rw_tujuan`, `id_prov_tujuan`, `id_kab_tujuan`, `id_kec_tujuan`, `id_kel_tujuan`, `keterangan`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 2, 18, '389475932753034750954', 'Jalan Bungur 130', 'Jalan Blimbing 52', 011, 004, 11, 1101, 1101010, 1101010001, 'Ketahuan istri pertama', '2017-02-21 17:00:00', 2, NULL, NULL, NULL, 2),
(2, 2, 19, '83740927349074', 'Jalan Asal', 'Jalan Tujuan', 000, 000, 11, 1101, 1101010, 1101010001, 'Tengkar', '2017-02-24 01:41:43', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi_keluar_detail`
--

CREATE TABLE `mutasi_keluar_detail` (
  `id` int(11) NOT NULL,
  `id_mutasi` int(11) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mutasi_keluar_detail`
--

INSERT INTO `mutasi_keluar_detail` (`id`, `id_mutasi`, `nik`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, '3764289649123', '2017-02-21 17:00:00', 2, NULL, NULL, NULL, 2),
(2, 1, '83740927349074', '2017-02-22 17:00:00', 2, NULL, NULL, NULL, NULL),
(3, 2, '389475932753034750954', '2017-02-24 01:41:43', 2, '2017-02-24 08:41:43', NULL, '2017-02-24 08:41:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi_masuk`
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
-- Struktur dari tabel `organisasi`
--

CREATE TABLE `organisasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama_pimpinan` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=menunggu, 1=disetujui, 2=ditolak',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `organisasi`
--

INSERT INTO `organisasi` (`id`, `nama`, `nip`, `nama_pimpinan`, `slug`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Lumajang', '123402302003121002', 'Paimin, AP', 'kecamatan-lumajang', '1', '2017-02-17 17:00:00', 0, NULL, NULL, NULL, NULL),
(2, 'Tompokerso', '198503302003121002', 'Samsul, SH', 'tompokerso', '1', '2017-02-17 17:00:00', 1, NULL, NULL, NULL, NULL),
(3, 'Patrang edit', 'belum diisi', 'belum diisi', 'patrang-edit', '0', '2017-02-17 17:00:00', 1, '2017-02-19 01:26:50', 1, NULL, NULL),
(4, 'Deket lapangan', 'belum diisi', 'belum diisi', 'deket-lapangan', '0', '2017-02-19 00:50:15', 1, '2017-02-19 01:03:34', 1, '2017-02-19 01:44:45', 1),
(5, 'Deket lapangan', 'belum diisi', 'belum diisi', 'deket-lapangan-1', '0', '2017-02-20 04:48:43', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `golongan_darah` varchar(2) NOT NULL,
  `status_nikah` tinyint(1) NOT NULL,
  `jenis_kelamin` enum('0','1') NOT NULL,
  `tanggal_lahir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `agama` tinyint(4) NOT NULL,
  `pekerjaan` tinyint(4) NOT NULL,
  `rt` int(3) UNSIGNED ZEROFILL NOT NULL,
  `rw` int(3) UNSIGNED ZEROFILL NOT NULL,
  `kewarganegaraan` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`nik`, `id_organisasi`, `nama`, `tempat_lahir`, `golongan_darah`, `status_nikah`, `jenis_kelamin`, `tanggal_lahir`, `agama`, `pekerjaan`, `rt`, `rw`, `kewarganegaraan`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
('123809123810938', 2, 'Kepala Keluarga A', 'Jember', 'O', 1, '0', '1980-02-26 17:00:00', 1, 1, 011, 001, '0', '2017-02-26 17:00:00', 1, NULL, NULL, NULL, NULL),
('3764289649123', 2, 'Rizki', 'Sumenep', 'AB', 0, '0', '1993-01-06 17:00:00', 0, 1, 002, 001, '0', '2017-02-19 02:43:22', 2, '2017-02-19 03:06:21', 2, NULL, NULL),
('389475932753034750954', 2, 'Farida', 'Sumenep', 'O', 2, '1', '1970-02-23 07:38:04', 1, 4, 002, 001, '0', '2017-02-19 23:08:40', 2, NULL, NULL, NULL, NULL),
('7289379132', 2, 'Anggota Keluarga A1', 'Jember', 'O', 1, '0', '1980-02-26 17:00:00', 1, 1, 011, 001, '0', '2017-02-26 17:00:00', 1, NULL, NULL, NULL, NULL),
('83740927349074', 2, 'Rizki Herdatullah', 'Sumenep', 'O', 0, '0', '1992-02-19 17:00:00', 0, 1, 002, 001, '0', '2017-02-19 23:06:40', 2, '2017-02-19 23:10:13', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
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
-- Struktur dari tabel `percobaan_login`
--

CREATE TABLE `percobaan_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `alamat_ip` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `waktu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindahrt`
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
-- Struktur dari tabel `profil_organisasi`
--

CREATE TABLE `profil_organisasi` (
  `no` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `nip` int(11) DEFAULT NULL,
  `nama_lurah` varchar(255) DEFAULT NULL,
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
  `deleted_by` int(11) DEFAULT NULL,
  `golongan` int(11) DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil_organisasi`
--

INSERT INTO `profil_organisasi` (`no`, `id_organisasi`, `nip`, `nama_lurah`, `deskripsi`, `alamat`, `telepon`, `email`, `kode_pos`, `facebook`, `twitter`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `golongan`, `id_golongan`) VALUES
(1, 2, 2147483647, 'Rizki', 'Deskripsi Tompo', 'Alamat', '08243243', 'rizkiherda@gmail.com', '32343', 'rizki.herdatullah', 'herdatullah', '2017-02-27 23:17:35', 2, '2017-02-28 01:52:57', 2, NULL, NULL, 1, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_keluarga`
--

CREATE TABLE `status_keluarga` (
  `id_statuskeluarga` int(11) NOT NULL,
  `nama_statuskeluarga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_keluarga`
--

INSERT INTO `status_keluarga` (`id_statuskeluarga`, `nama_statuskeluarga`) VALUES
(1, 'Kepala Keluarga'),
(2, 'Suami'),
(3, 'Istri'),
(4, 'Anak'),
(5, 'Cucu'),
(6, 'Orang Tua'),
(7, 'Mertua'),
(8, 'Family Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `no_surat` varchar(50) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `jenis` enum('0','1','2','3') NOT NULL COMMENT '0=Blanko KTP, 1=SKCK, 2=Ket Miskon, 3=Ket.Miskin(RT)',
  `tanggal_verif` timestamp NULL DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=menunggu, 1=disetujui, 2=ditolak',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `deleted_by` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tingkatan`
--

INSERT INTO `tingkatan` (`id`, `name`, `description`, `menu`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Admin Kecamatan', 'Mengakses semua fitur kecamatan', '1:2:3:4:5:6:7', '2017-02-17 17:00:00', 0, NULL, NULL, NULL, NULL),
(2, 'Operator', 'Operator Kelurahan', '1:8:9:10:11:12:13:14:15:16:17:18', '2017-02-17 17:00:00', 0, NULL, NULL, NULL, NULL),
(3, 'mem', 'mem', '', '2017-02-18 06:12:10', 0, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik_2` (`username`),
  ADD KEY `nik` (`username`);

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
  ADD KEY `status_keluarga` (`status_keluarga`),
  ADD KEY `id_pendidikan` (`id_pendidikan`);

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
-- Indexes for table `golongan_pegawai`
--
ALTER TABLE `golongan_pegawai`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id_jenispendidikan`),
  ADD KEY `id_jenispendidikan` (`id_jenispendidikan`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indexes for table `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD KEY `no_kk` (`no_kk`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_organisasi` (`id_organisasi`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `meninggal`
--
ALTER TABLE `meninggal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_keluar`
--
ALTER TABLE `mutasi_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_organisasi` (`id_organisasi`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `mutasi_keluar_detail`
--
ALTER TABLE `mutasi_keluar_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mutasi` (`id_mutasi`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `created_by` (`created_by`,`updated_by`,`deleted_by`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_organisasi` (`id_organisasi`),
  ADD KEY `pekerjaan` (`pekerjaan`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id_organisasi` (`id_organisasi`,`created_by`,`updated_by`,`deleted_by`);

--
-- Indexes for table `percobaan_login`
--
ALTER TABLE `percobaan_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_organisasi`
--
ALTER TABLE `profil_organisasi`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_organisasi` (`id_organisasi`,`created_by`,`updated_by`,`deleted_by`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_keluarga`
--
ALTER TABLE `status_keluarga`
  ADD PRIMARY KEY (`id_statuskeluarga`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`no_surat`),
  ADD KEY `id_organisasi` (`id_organisasi`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tingkatan`
--
ALTER TABLE `tingkatan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_kartu_keluarga`
--
ALTER TABLE `detail_kartu_keluarga`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_tingkatan`
--
ALTER TABLE `detail_tingkatan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galeri_kategori`
--
ALTER TABLE `galeri_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `golongan_pegawai`
--
ALTER TABLE `golongan_pegawai`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `info_organisasi`
--
ALTER TABLE `info_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  MODIFY `id_jenispekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `meninggal`
--
ALTER TABLE `meninggal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `mutasi_keluar`
--
ALTER TABLE `mutasi_keluar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mutasi_keluar_detail`
--
ALTER TABLE `mutasi_keluar_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `percobaan_login`
--
ALTER TABLE `percobaan_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profil_organisasi`
--
ALTER TABLE `profil_organisasi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_tingkatan`
--
ALTER TABLE `detail_tingkatan`
  ADD CONSTRAINT `detail_tingkatan_ibfk_1` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_tingkatan_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_ibfk_2` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
