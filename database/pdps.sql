-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2020 at 09:16 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Aldiwap', 'a7d1eaaa5c3e616ffa54f061ad2ec587', 'Admin', '', '2020-04-17', '2020-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kk`
--

CREATE TABLE `anggota_kk` (
  `id` int(11) NOT NULL,
  `kk_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `golongan_darah` varchar(2) NOT NULL,
  `status_nikah` varchar(40) NOT NULL,
  `tgl_nikah` varchar(10) NOT NULL,
  `hubungan` varchar(35) NOT NULL,
  `kewarganegaraan` varchar(30) NOT NULL,
  `paspor` varchar(25) NOT NULL,
  `kitap` varchar(30) NOT NULL,
  `ayah` varchar(30) NOT NULL,
  `ibu` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anggota_kk`
--

INSERT INTO `anggota_kk` (`id`, `kk_id`, `nama`, `nik`, `jk`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `pekerjaan`, `golongan_darah`, `status_nikah`, `tgl_nikah`, `hubungan`, `kewarganegaraan`, `paspor`, `kitap`, `ayah`, `ibu`, `created_at`, `updated_at`) VALUES
(15, 16, 'Aldi', '1516564165156165', 'Laki-Laki', 'Subang', '1999-06-13', 'Islam', 'SMA Sederajat', 'Wiraswasta', 'A', 'Kawin', '13-06-20', 'Anak Kandung', 'WNI', '-', '-', 'Wacim', 'Uun', '0000-00-00 00:00:00', '2020-06-15 11:00:58'),
(16, 16, 'Birul Walidaen', '3213131309990003', 'Laki-Laki', 'dasdad', '2020-04-28', 'Islam', 'SD', 'Digital', 'B', 'Kawin', '20-13-1999', 'Anak Kandung', 'WNI', '-', '-', 'Wacim', 'Uun', '2020-04-28 21:19:38', '2020-06-03 10:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `detail_desa`
--

CREATE TABLE `detail_desa` (
  `id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `kab` varchar(20) NOT NULL,
  `kec` varchar(30) NOT NULL,
  `kel` varchar(30) NOT NULL,
  `prov` varchar(50) NOT NULL,
  `kodepos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_desa`
--

INSERT INTO `detail_desa` (`id`, `alamat`, `kab`, `kec`, `kel`, `prov`, `kodepos`) VALUES
(2, 'Jalan Raya Makmurjaya No. 14', 'Karawang', 'Jayakerta', 'Makmurjaya', 'Jawa Barat', '41351');

-- --------------------------------------------------------

--
-- Table structure for table `domisili_perusahaan`
--

CREATE TABLE `domisili_perusahaan` (
  `id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(128) NOT NULL,
  `bidang` varchar(128) NOT NULL,
  `status_bangunan` varchar(50) NOT NULL,
  `pendirian` date NOT NULL,
  `penanggung` varchar(50) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `tanggal_surat` date NOT NULL,
  `masa_berlaku` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domisili_perusahaan`
--

INSERT INTO `domisili_perusahaan` (`id`, `anggota_kk_id`, `no_surat`, `nama_perusahaan`, `bidang`, `status_bangunan`, `pendirian`, `penanggung`, `alamat_perusahaan`, `tanggal_surat`, `masa_berlaku`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 15, '001/2020/SKDP/Kel', 'fdghfgd', 'dfgfdg', 'dfgdg', '2020-06-18', 'dfgfdg', 'dfgdfg', '2020-06-17', '2020-09-17', 1, '2020-06-17 12:03:38', '2020-06-17 12:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `domisili_usaha`
--

CREATE TABLE `domisili_usaha` (
  `id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `alamat_usaha` text NOT NULL,
  `jenis_usaha` varchar(128) NOT NULL,
  `mulai_usaha` date NOT NULL,
  `masa_berlaku` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domisili_usaha`
--

INSERT INTO `domisili_usaha` (`id`, `anggota_kk_id`, `no_surat`, `alamat_usaha`, `jenis_usaha`, `mulai_usaha`, `masa_berlaku`, `tanggal_surat`, `created_by`, `created_at`, `updated_at`) VALUES
(8, 15, '001/2020/SKDU/Kel', 'Jl. Diponegoro No. 48', 'Marketing', '2020-06-19', '2020-09-19', '2020-06-19', 1, '2020-06-19 07:53:34', '2020-06-19 07:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `domisili_warga`
--

CREATE TABLE `domisili_warga` (
  `id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domisili_warga`
--

INSERT INTO `domisili_warga` (`id`, `anggota_kk_id`, `no_surat`, `masa_berlaku`, `tanggal_surat`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 15, 'DMW110', '2020-05-28', '2020-05-28', NULL, '2020-05-28 00:00:00', '2020-05-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(35) NOT NULL,
  `password` varchar(128) NOT NULL,
  `foto` text NOT NULL,
  `ttd` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nip`, `nama`, `jabatan`, `password`, `foto`, `ttd`, `created_at`, `updated_at`) VALUES
(1, '15645584756', 'Tengku Fadilah', 'Lurah', '25d55ad283aa400af464c76d713c07ad', 'default.png', '', '2020-04-14', '2020-06-15'),
(2, '54654544551225', 'Aldi Wiguna', 'Sekretaris', '4fc3c257e0d226cb146d9990af31b021', '1592754683_338e891edb720efcb6da.jpg', '1592751956_0a948b0fa4b34edd1496.jpeg', '2020-06-20', '2020-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `kematian`
--

CREATE TABLE `kematian` (
  `id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `nik_meninggal` varchar(16) NOT NULL,
  `bin` varchar(16) NOT NULL,
  `hari` varchar(16) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `hubungan` varchar(128) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kematian`
--

INSERT INTO `kematian` (`id`, `anggota_kk_id`, `nik_meninggal`, `bin`, `hari`, `tanggal`, `jam`, `lokasi`, `no_surat`, `hubungan`, `tanggal_surat`, `created_by`, `created_at`, `updated_at`) VALUES
(10, 15, '3213131309990003', 'Topik', 'Kapan', '2020-06-19', '12:00:00', 'Mana Aja', '001/2020/SKK/Kel', 'Saudara', '2020-06-19', 1, '2020-06-19 02:18:03', '2020-06-19 02:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE `kk` (
  `id` int(11) NOT NULL,
  `nokk` varchar(16) NOT NULL,
  `kepalakk` varchar(35) NOT NULL,
  `jmlanggota` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `rtrw` varchar(10) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`id`, `nokk`, `kepalakk`, `jmlanggota`, `alamat`, `rtrw`, `desa`, `kecamatan`, `kabupaten`, `kodepos`, `provinsi`, `created_at`, `updated_at`) VALUES
(16, '3213131309990001', 'Wacim Topik', '4', 'Dsn. Tanjung Baru', '02/03', 'Blanakan', 'Blanakan', 'Subang', '41259', 'Jawa Barat', '2020-04-19 05:25:49', '2020-06-03 10:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `pindah`
--

CREATE TABLE `pindah` (
  `id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `alasan` text NOT NULL,
  `klasifikasi` varchar(128) NOT NULL,
  `jenis_kepindahan` varchar(70) NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `desa_tujuan` varchar(50) NOT NULL,
  `kabupaten_tujuan` varchar(50) NOT NULL,
  `kecamatan_tujuan` varchar(128) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `rt_tujuan` varchar(6) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pindah`
--

INSERT INTO `pindah` (`id`, `anggota_kk_id`, `no_surat`, `alasan`, `klasifikasi`, `jenis_kepindahan`, `alamat_tujuan`, `desa_tujuan`, `kabupaten_tujuan`, `kecamatan_tujuan`, `provinsi`, `rt_tujuan`, `tanggal_pindah`, `tanggal_surat`, `created_by`, `created_at`, `updated_at`) VALUES
(21, 15, '001/2020/SKP/Kel', 'sdfsf', 'sdfsf', 'sdfdsf', 'sdfsf', 'sdfsf', 'sdfsf', 'sdfsf', 'sdfs', 'sdfsf', '2020-06-17', '2020-06-17', 1, '2020-06-17 11:50:28', '2020-06-17 11:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `pindah_anggota`
--

CREATE TABLE `pindah_anggota` (
  `id` int(11) NOT NULL,
  `pindah_id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `hdk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pindah_anggota`
--

INSERT INTO `pindah_anggota` (`id`, `pindah_id`, `nik`, `nama`, `jk`, `status`, `hdk`) VALUES
(3, 21, '1516564165156165', 'Aldi', 'Laki-Laki', 'Kawin', 'Anak Kandung'),
(4, 21, '3213131309990003', 'Birul Walidaen', 'Laki-Laki', 'Kawin', 'Anak Kandung');

-- --------------------------------------------------------

--
-- Table structure for table `sktm`
--

CREATE TABLE `sktm` (
  `id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sktm`
--

INSERT INTO `sktm` (`id`, `anggota_kk_id`, `no_surat`, `tanggal_surat`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 16, 'CCKKL', '2020-05-28', 0, '2020-05-28 00:00:00', '2020-05-28 00:00:00'),
(2, 16, '002/2020/SKTM/Kel', '2020-06-11', 1, '2020-06-11 11:51:53', '2020-06-11 11:51:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota_kk`
--
ALTER TABLE `anggota_kk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_desa`
--
ALTER TABLE `detail_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domisili_perusahaan`
--
ALTER TABLE `domisili_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domisili_usaha`
--
ALTER TABLE `domisili_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domisili_warga`
--
ALTER TABLE `domisili_warga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nokk` (`nokk`);

--
-- Indexes for table `pindah`
--
ALTER TABLE `pindah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pindah_anggota`
--
ALTER TABLE `pindah_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota_kk`
--
ALTER TABLE `anggota_kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detail_desa`
--
ALTER TABLE `detail_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `domisili_perusahaan`
--
ALTER TABLE `domisili_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `domisili_usaha`
--
ALTER TABLE `domisili_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `domisili_warga`
--
ALTER TABLE `domisili_warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kk`
--
ALTER TABLE `kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pindah`
--
ALTER TABLE `pindah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pindah_anggota`
--
ALTER TABLE `pindah_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
