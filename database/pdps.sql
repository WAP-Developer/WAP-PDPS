-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2020 pada 03.46
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Aldiwap', 'a7d1eaaa5c3e616ffa54f061ad2ec587', 'Aldi Wiguna', '', '2020-04-17', '2020-04-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_kk`
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
-- Dumping data untuk tabel `anggota_kk`
--

INSERT INTO `anggota_kk` (`id`, `kk_id`, `nama`, `nik`, `jk`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `pekerjaan`, `golongan_darah`, `status_nikah`, `tgl_nikah`, `hubungan`, `kewarganegaraan`, `paspor`, `kitap`, `ayah`, `ibu`, `created_at`, `updated_at`) VALUES
(15, 16, 'Aldi', '1516564165156165', 'Laki-Laki', 'Subang', '1999-06-13', 'Islam', 'SMA Sederajat', 'Wiraswasta', 'A', 'Kawin', '13-Juni-20', 'Anak Kandung', 'WNI', '-', '-', 'Wacim', 'Uun', '0000-00-00 00:00:00', '2020-04-28 20:49:31'),
(16, 16, 'Birul Walidaen', '3213131309990003', 'Laki-Laki', 'dasdad', '2020-04-29', 'Islam', 'SD', 'Laki-Laki', 'A', 'Kawin', '20-13-1999', 'Anak Kandung', 'WNI', '-', '-', 'Wacim', 'Uun', '2020-04-28 21:19:38', '2020-05-04 22:12:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `domisili_perusahaan`
--

CREATE TABLE `domisili_perusahaan` (
  `id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `bidang` varchar(128) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `nama_perusahaan` varchar(128) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `penanggung` varchar(50) NOT NULL,
  `pendirian` varchar(50) NOT NULL,
  `status_bangunan` varchar(50) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `domisili_perusahaan`
--

INSERT INTO `domisili_perusahaan` (`id`, `anggota_kk_id`, `alamat_perusahaan`, `bidang`, `masa_berlaku`, `nama_perusahaan`, `no_surat`, `penanggung`, `pendirian`, `status_bangunan`, `tanggal_surat`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 15, 'fasdfdsfsdfsdfsdf', 'sdfsdfsdf', '2020-05-06', 'fsdfsdf', 'sdfsf', 'sdfsdf', 'sdfsfsdf', 'sdfsdfsd', '2020-05-06', 0, '2020-05-06 00:00:00', '2020-05-06 00:00:00'),
(2, 15, 'asdasd', 'asdasd', '2020-05-06', 'aasdad', 'asdas', 'asdas', 'dasasd', 'asdsad', '2020-05-06', 0, '2020-05-06 00:00:00', '2020-05-06 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `domisili_usaha`
--

CREATE TABLE `domisili_usaha` (
  `id` int(11) NOT NULL,
  `alamat_usaha` text NOT NULL,
  `jenis_usaha` varchar(128) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `mulai_usaha` date NOT NULL,
  `nik_umum` varchar(16) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `domisili_warga`
--

CREATE TABLE `domisili_warga` (
  `id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `tanggal_srat` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
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
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nip`, `nama`, `jabatan`, `password`, `foto`, `ttd`, `created_at`, `updated_at`) VALUES
(1, '15645584756', 'Tengku Fadilah', 'CEO', '25d55ad283aa400af464c76d713c07ad', 'default.png', '', '2020-04-14', '2020-05-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian`
--

CREATE TABLE `kematian` (
  `id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `jam` time NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `penyebab` varchar(128) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kk`
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
-- Dumping data untuk tabel `kk`
--

INSERT INTO `kk` (`id`, `nokk`, `kepalakk`, `jmlanggota`, `alamat`, `rtrw`, `desa`, `kecamatan`, `kabupaten`, `kodepos`, `provinsi`, `created_at`, `updated_at`) VALUES
(16, '3213131309990001', 'Wacim Topik', '4', 'Dsn. Tanjung Baru', '02/03', 'Blanakan', 'Blanakan', 'Subang', '41259', 'Jawa Barat', '2020-04-19 05:25:49', '2020-04-26 20:42:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindah`
--

CREATE TABLE `pindah` (
  `id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `alasan` text NOT NULL,
  `desa_tujuan` varchar(50) NOT NULL,
  `jenis_kepindahan` varchar(70) NOT NULL,
  `kabupaten_tujuan` varchar(50) NOT NULL,
  `kecamatan_tujuan` varchar(128) NOT NULL,
  `klasifikasi` varchar(128) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `rt_tujuan` varchar(6) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindah_detail`
--

CREATE TABLE `pindah_detail` (
  `id` int(11) NOT NULL,
  `pindah_id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sktm`
--

CREATE TABLE `sktm` (
  `id` int(11) NOT NULL,
  `anggota_kk_id` int(11) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `anggota_kk`
--
ALTER TABLE `anggota_kk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `domisili_perusahaan`
--
ALTER TABLE `domisili_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `domisili_usaha`
--
ALTER TABLE `domisili_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `domisili_warga`
--
ALTER TABLE `domisili_warga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nokk` (`nokk`);

--
-- Indeks untuk tabel `pindah`
--
ALTER TABLE `pindah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pindah_detail`
--
ALTER TABLE `pindah_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `anggota_kk`
--
ALTER TABLE `anggota_kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `domisili_perusahaan`
--
ALTER TABLE `domisili_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `domisili_usaha`
--
ALTER TABLE `domisili_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `domisili_warga`
--
ALTER TABLE `domisili_warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kk`
--
ALTER TABLE `kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `pindah`
--
ALTER TABLE `pindah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pindah_detail`
--
ALTER TABLE `pindah_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
