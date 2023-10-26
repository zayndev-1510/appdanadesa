-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2023 at 10:26 AM
-- Server version: 8.0.34-0ubuntu0.22.04.1
-- PHP Version: 8.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dana_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_kegiatan`
--

CREATE TABLE `anggaran_kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kegiatan` int NOT NULL DEFAULT '0',
  `lokasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_perangkat_desa` int NOT NULL DEFAULT '0',
  `keluaran` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagu` double NOT NULL,
  `tahun_anggaran` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggaran_kegiatan`
--

INSERT INTO `anggaran_kegiatan` (`id`, `id_kegiatan`, `lokasi`, `waktu`, `id_perangkat_desa`, `keluaran`, `volume`, `pagu`, `tahun_anggaran`, `created_at`, `updated_at`) VALUES
(18, 2, 'Desa Kakunawe', '12', 21, 'Terbayaranya SILAP Dan Tunjangan Kepala Desa', '12 Bulan', 300000000, 2, '2023-10-22 18:43:31', '2023-10-24 11:38:24'),
(19, 3, 'Desa Kakunawe', '12', 23, 'Terbayaranya SILAP Dan Tunjangan Perangkat Desa', '12 Bulan', 50000000, 2, '2023-10-22 11:12:51', '2023-10-22 11:12:51'),
(20, 8, 'Desa Kakunawe', '12', 21, 'Penyediaan Insentif/Operasional RT/RW', '12 Bulan', 80000000, 2, '2023-10-24 07:01:40', '2023-10-24 07:01:40'),
(21, 61, 'Desa Kakunawe', '12', 21, 'Tersedianya Sarana Perkantoran Pemerintahan', '12 Bulan', 60000000, 2, '2023-10-24 07:23:34', '2023-10-24 07:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_bidang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `keterangan`, `created_at`, `updated_at`, `kode_bidang`) VALUES
(2, 'Bidang Penyelenggaraan Pemerintahan Desa', '2023-08-02 08:21:37', '2023-08-27 06:17:55', '1'),
(3, 'Bidang Pelaksanaan Pembangunan Desa', '2023-08-02 08:37:22', '2023-08-27 06:18:03', '2'),
(4, 'Bidang Pembinaan Kemasyarakatan Desa', '2023-08-02 08:37:34', '2023-08-27 06:18:10', '3'),
(5, 'Bidang Pemberdayaan Masyarakat Desa', '2023-08-02 08:37:45', '2023-08-27 06:18:16', '4'),
(6, 'Bidang Penanggulanggan Bencana, Keadaan Darurat, dan Mendesak Desa.', '2023-08-02 08:38:03', '2023-08-27 06:18:24', '5');

-- --------------------------------------------------------

--
-- Table structure for table `detail_anggaran_kegiatan`
--

CREATE TABLE `detail_anggaran_kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_anggaran_kegiatan` int NOT NULL,
  `nama_paket` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` float NOT NULL DEFAULT '0',
  `id_pola_kegiatan` int NOT NULL DEFAULT '0',
  `target` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sumber_dana` int NOT NULL,
  `sifat_kegiatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_kegiatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_anggaran_kegiatan`
--

INSERT INTO `detail_anggaran_kegiatan` (`id`, `id_anggaran_kegiatan`, `nama_paket`, `nilai`, `id_pola_kegiatan`, `target`, `uraian`, `satuan`, `id_sumber_dana`, `sifat_kegiatan`, `lokasi_kegiatan`, `created_at`, `updated_at`) VALUES
(19, 18, 'SILTAP Desa', 200000000, 5, 'Terbayarnya SILTAP Kepala Desa', 'SILTAP Desa', 'OB', 4, 'NON FISIK LAINNYA', 'Tes', '2023-10-22 18:45:52', '2023-10-24 11:39:05'),
(20, 19, 'Tunjangan Perangkat Desa', 50000000, 5, 'Tunjangan Perangkat Desa', 'Tunjangan Perangkat Desa', 'OB', 4, 'NON FISIK LAINNYA', 'Desa Kakunawe', '2023-10-22 11:13:44', '2023-10-22 11:13:44'),
(21, 18, 'Terbayar Tunjangan Kepala Desa', 100000000, 5, 'Terbayar Tunjangan Kepala Desa', 'Terbayar Tunjangan Kepala Desa', 'OB', 4, 'NON FISIK LAINNYA', 'Desa Kakunawe', '2023-10-24 11:39:50', '2023-10-24 11:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `detail_rap`
--

CREATE TABLE `detail_rap` (
  `id` bigint UNSIGNED NOT NULL,
  `no_urut` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rap` int NOT NULL DEFAULT '0',
  `id_sumber` int NOT NULL DEFAULT '0',
  `jumlah_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_rap`
--

INSERT INTO `detail_rap` (`id`, `no_urut`, `uraian`, `id_rap`, `id_sumber`, `jumlah_satuan`, `harga_satuan`, `total`, `created_at`, `updated_at`) VALUES
(19, '001', 'Dana Desa', 3, 2, '1 Tahun', 650000000, 650000000, '2023-10-21 11:17:23', '2023-10-21 11:17:23'),
(20, '001', 'Alokasi Dana Desa', 11, 4, '1 Tahun', 1500000000, 1500000000, '2023-10-21 13:00:41', '2023-10-21 13:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_desa`
--

CREATE TABLE `jabatan_desa` (
  `id` bigint UNSIGNED NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan_desa`
--

INSERT INTO `jabatan_desa` (`id`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Desa', '2023-07-26 08:27:18', '2023-07-26 08:27:18'),
(2, 'Sekretaris Desa', '2023-07-26 08:27:41', '2023-07-26 08:27:41'),
(8, 'Kasi Kesejataraan  Dan Pelayanan', '2023-07-31 09:06:38', '2023-07-31 09:06:38'),
(9, 'Kasi Pemerintahan', '2023-07-31 09:07:17', '2023-07-31 09:07:17'),
(10, 'Kaur Keuangan', '2023-07-31 09:07:59', '2023-07-31 09:07:59'),
(11, 'Kaur Umum Dan Perencanaan', '2023-07-31 09:08:14', '2023-07-31 09:08:14'),
(12, 'Kepala Dusun', '2023-07-31 09:08:51', '2023-07-31 09:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_belanja_desa`
--

CREATE TABLE `jenis_belanja_desa` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kelompok` int NOT NULL,
  `kode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_belanja_desa`
--

INSERT INTO `jenis_belanja_desa` (`id`, `id_kelompok`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 5, '1', 'Penghasilan Tetap Dan Tunjangan Kepala Desa', '2023-09-12 18:54:55', '2023-09-12 18:54:55'),
(4, 5, '2', 'Penghasilan Tetap Dan Tunjangan Perangkat Desa', '2023-09-12 18:59:26', '2023-09-12 18:59:26'),
(5, 5, '3', 'Jaminan Sosial Kepala Desa Dan Perangkat Desa', '2023-09-12 18:59:51', '2023-09-12 18:59:51'),
(6, 5, '4', 'Tunjangan BPD', '2023-09-12 19:01:40', '2023-09-12 19:01:47'),
(7, 6, '1', 'Belanja Barang Perlengkapan', '2023-09-13 09:05:29', '2023-09-13 09:05:29'),
(8, 6, '2', 'Belanja Jasa Honorarium', '2023-09-13 09:06:04', '2023-09-13 09:06:04'),
(9, 6, '3', 'Belanja Perjalanan Desa', '2023-09-13 09:06:38', '2023-09-13 09:06:38'),
(10, 6, '4', 'Belanja Jasa Sewa', '2023-09-13 09:06:53', '2023-09-13 09:06:53'),
(11, 6, '5', 'Belanja Operasional Perkantoran', '2023-09-13 09:07:19', '2023-09-13 09:07:19'),
(12, 6, '6', 'Belanja Pemeliharaan', '2023-09-13 09:07:42', '2023-09-13 09:07:42'),
(13, 6, '7', 'Belanja Barang Dan Jasa yang diserahkan kepada Masyarakaat', '2023-09-13 09:08:14', '2023-09-13 09:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pendapatan_desa`
--

CREATE TABLE `jenis_pendapatan_desa` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kelompok` int NOT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_pendapatan_desa`
--

INSERT INTO `jenis_pendapatan_desa` (`id`, `id_kelompok`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 2, '1', 'Hasil Usaha Desa', '2023-09-23 23:57:53', '2023-09-23 23:57:53'),
(3, 2, '2', 'Hasil Aset Desa', '2023-09-23 23:58:14', '2023-09-23 23:58:14'),
(4, 2, '3', 'Swadata, Partisipasi Dan Gotong Royong', '2023-09-23 23:58:44', '2023-09-23 23:58:44'),
(5, 2, '4', 'Lain-Lain Pendapatan Asli Desa', '2023-09-23 23:59:07', '2023-09-23 23:59:07'),
(6, 3, '1', 'Dana Desa', '2023-09-24 02:46:15', '2023-09-24 02:46:15'),
(7, 3, '2', 'Bagi Hasil Pajak Dan Redribusi', '2023-09-24 02:47:21', '2023-09-24 02:47:21'),
(8, 3, '3', 'Alokasi Dana Desa', '2023-09-24 02:47:45', '2023-09-24 02:47:45'),
(9, 3, '4', 'Bantuan Keuangan Provinsi', '2023-09-24 02:57:35', '2023-09-24 02:57:35'),
(10, 3, '5', 'Bantuan Keuangan Kabupaten/Kota', '2023-09-24 03:06:38', '2023-09-24 03:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_bidang` int NOT NULL,
  `id_sub_bidang` int NOT NULL,
  `kode_kegiatan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `id_bidang`, `id_sub_bidang`, `kode_kegiatan`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 2, 5, '1', 'Penyediaan Penghasilan Tetap dan Tunjangan Kepala Desa', '2023-08-28 05:53:50', '2023-08-28 05:53:50'),
(3, 2, 5, '2', 'Penyediaan Penghasilan Tetap dan Tunjangan Perangkat Desa', '2023-08-28 06:09:31', '2023-08-28 06:17:14'),
(4, 2, 5, '3', 'Penyediaan Jaminan Sosial bagi Kepala Desa dan Perangkat Desa', '2023-08-28 06:18:25', '2023-08-28 06:18:25'),
(5, 2, 5, '4', 'Penyediaan Operasional Pemerintah Desa (ATK, Honorarium PKPKD dan PPKD, perlengkapan perkantoran, pakaian dinas/atribut, listrik/telpon, dll)', '2023-08-28 06:18:46', '2023-08-28 06:18:46'),
(6, 2, 5, '5', 'Penyediaan Tunjangan BPD', '2023-08-28 06:19:32', '2023-08-28 06:19:32'),
(7, 2, 5, '6', 'Penyediaan Operasional BPD (Rapat-rapat (ATK, makan-minum), perlengkapan perkantoran, Pakaian Seragam, perjalanan dinas, listrik/telpon, dll)', '2023-08-28 06:19:49', '2023-08-28 06:19:49'),
(8, 2, 5, '7', 'Penyediaan Insentif/Operasional RT/RW', '2023-08-28 06:20:03', '2023-08-28 06:20:03'),
(10, 2, 5, '8', 'Penyediaan Operasional Pemerintahan Desa Yang Bersumber Dari Dana Desa', '2023-09-18 19:27:15', '2023-09-18 19:27:48'),
(11, 2, 5, '90', 'Penyediaan Jaminan Sosial Bagi BPD', '2023-09-18 19:28:22', '2023-09-18 19:28:22'),
(12, 2, 5, '91', 'Penyediaan Tambahan Tunjangan Kepala Desa Dan Perangkat Desa', '2023-09-18 19:29:07', '2023-09-18 19:29:07'),
(13, 2, 5, '99', 'Lain-lain Sub Bidang SILTAP Dan Operasional Pemerintahan Desa', '2023-09-18 19:29:50', '2023-09-18 19:29:50'),
(14, 3, 12, '1', 'Penyelenggaraan PAUD/TK/TPA/TKA/TPQ/Madrasah Non-Formal Milik Desa** (Bantuan Honor Pengajar, Pakaian Seragam, Operasional, dst)', '2023-10-02 07:00:47', '2023-10-02 07:00:47'),
(15, 3, 12, '2', 'Dukungan Penyelenggaraan PAUD (APE, Sarana PAUD, dst)', '2023-10-02 07:01:45', '2023-10-02 07:01:45'),
(16, 3, 12, '3', 'Penyuluhan dan Pelatihan Pendidikan bagi Masyarakat', '2023-10-02 07:02:03', '2023-10-02 07:02:03'),
(17, 3, 12, '4', 'Pemeliharaan Sarana dan Prasarana Perpustakaan/Taman Bacaan Desa/ Sanggar Belajar Milik Desa **', '2023-10-02 07:02:20', '2023-10-02 07:02:20'),
(18, 3, 12, '5', 'Pemeliharaan Sarana dan Prasarana PAUD/TK/TPA/TKA/TPQ/Madrasah Non- Formal Milik Desa**', '2023-10-02 07:02:33', '2023-10-02 07:02:33'),
(19, 3, 12, '6', 'Pembangunan/Rehabilitasi/Peningkatan/Pengadaan Sarana/Prasarana/Alat Peraga Edukatif (APE) PAUD/ TK/TPA/TKA/TPQ/Madrasah Non-Formal Milik Desa**', '2023-10-02 07:02:46', '2023-10-02 07:02:46'),
(20, 3, 12, '7', 'Pembangunan/Rehabilitasi/Peningkatan Sarana Prasarana Perpustakaan/Taman Bacaan Desa/ Sanggar Belajar Milik Desa**', '2023-10-02 07:03:01', '2023-10-02 07:03:01'),
(21, 3, 12, '8', 'Pengelolaan Perpustakaan Milik Desa (Pengadaan Buku-buku Bacaan, Honor Penjaga untuk Perpustakaan/Taman Bacaan Desa)', '2023-10-02 07:03:18', '2023-10-02 07:03:18'),
(22, 3, 12, '9', 'Pengembangan dan Pembinaan Sanggar Seni dan Belajar', '2023-10-02 07:03:30', '2023-10-02 07:03:30'),
(23, 3, 12, '10', 'Dukungan Pendidikan bagi Siswa Miskin/Berprestasi', '2023-10-02 07:03:42', '2023-10-02 07:03:42'),
(24, 3, 12, '90-99', 'lain-lain kegiatan sub bidang pendidikan*', '2023-10-02 07:03:54', '2023-10-02 07:03:54'),
(25, 3, 13, '1', 'Penyelenggaraan Pos Kesehatan Desa (PKD)/Polindes Milik Desa (Obat-obatan; Tambahan Insentif Bidan Desa/Perawat Desa; Penyediaan Pelayanan KB dan Alat Kontrasepsi bagi Keluarga Miskin, dst)', '2023-10-02 07:04:15', '2023-10-02 07:14:00'),
(26, 3, 13, '2', 'Penyelenggaraan Posyandu (Makanan Tambahan, Kelas Ibu Hamil, Kelas Lansia, Insentif Kader Posyandu)', '2023-10-02 07:04:28', '2023-10-02 07:04:28'),
(27, 3, 13, '3', 'Penyuluhan dan Pelatihan Bidang Kesehatan (untuk Masyarakat, Tenaga Kesehatan, Kader Kesehatan, dll)', '2023-10-02 07:15:11', '2023-10-02 07:15:11'),
(28, 3, 13, '4', 'Penyelenggaraan Desa Siaga Kesehatan', '2023-10-02 07:15:25', '2023-10-02 07:15:25'),
(29, 3, 13, '5', 'Pembinaan Palang Merah Remaja (PMR) tingkat desa', '2023-10-02 07:15:38', '2023-10-02 07:15:38'),
(30, 3, 13, '6', 'Pengasuhan Bersama atau Bina Keluarga Balita (BKB)', '2023-10-02 07:15:52', '2023-10-02 07:15:52'),
(31, 3, 13, '7', 'Pembinaan dan Pengawasan Upaya Kesehatan Tradisional', '2023-10-02 07:16:05', '2023-10-02 07:16:05'),
(32, 3, 13, '8', 'Pemeliharaan Sarana/Prasarana Posyandu/Polindes/PKD', '2023-10-02 07:16:16', '2023-10-02 07:16:16'),
(33, 3, 13, '9', 'Pembangunan/Rehabilitasi/Peningkatan/Pengadaan Sarana/Prasarana Posyandu/Polindes/PKD **', '2023-10-02 07:18:13', '2023-10-02 07:18:13'),
(34, 3, 13, '90-99', 'lain-lain kegiatan sub bidang kesehatan*', '2023-10-02 07:18:31', '2023-10-02 07:18:31'),
(35, 3, 14, '1', 'Pemeliharaan Jalan Desa', '2023-10-02 07:20:56', '2023-10-02 07:20:56'),
(36, 3, 14, '2', 'Pemeliharaan Jalan Lingkungan Permukiman/Gang', '2023-10-02 07:28:40', '2023-10-02 07:28:40'),
(37, 3, 14, '3', 'Pemeliharaan Jalan Usaha Tani', '2023-10-02 07:28:54', '2023-10-02 07:28:54'),
(38, 3, 14, '4', 'Pemeliharaan Jembatan Milik Desa', '2023-10-02 07:29:11', '2023-10-02 07:29:11'),
(39, 3, 14, '5', 'Pemeliharaan Prasarana Jalan Desa (Gorong-gorong, Selokan, Box/Slab Culvert, Drainase, Prasarana Jalan lain)', '2023-10-02 07:29:26', '2023-10-02 07:29:26'),
(40, 3, 14, '6', 'Pemeliharaan Gedung/Prasarana Balai Desa/Balai Kemasyarakatan', '2023-10-02 07:29:39', '2023-10-02 07:29:39'),
(41, 3, 14, '7', 'Pemeliharaan Pemakaman Milik Desa/Situs Bersejarah Milik Desa/Petilasan Milik', '2023-10-02 07:29:52', '2023-10-02 07:29:52'),
(42, 3, 14, '8', 'Pemeliharaan Embung Milik Desa', '2023-10-02 07:30:02', '2023-10-02 07:30:02'),
(43, 3, 14, '9', 'Pemeliharaan Monumen/Gapura/Batas Desa', '2023-10-02 07:31:16', '2023-10-02 07:31:16'),
(44, 3, 14, '10', 'Pembangunan/Rehabilitasi/Peningkatan/Pengerasan Jalan Desa **', '2023-10-02 07:31:34', '2023-10-02 07:31:34'),
(45, 3, 14, '11', 'Pembangunan/Rehabilitasi/Peningkatan/Pengerasan Jalan Lingkungan Permukiman/Gang **', '2023-10-02 07:31:49', '2023-10-02 07:31:49'),
(46, 3, 14, '12', 'Pembangunan/Rehabilitasi/Peningkatan/Pengerasan Jalan Usaha Tani **', '2023-10-02 07:32:01', '2023-10-02 07:32:01'),
(47, 3, 14, '13', 'Pembangunan/Rehabilitasi/Peningkatan/Pengerasan Jembatan Milik Desa **', '2023-10-02 07:32:20', '2023-10-02 07:32:20'),
(48, 3, 14, '14', 'Pembangunan/Rehabilitasi/Peningkatan Prasarana Jalan Desa (Gorong-gorong, Selokan, Box/Slab Culvert, Drainase, Prasarana Jalan lain) **', '2023-10-02 07:32:43', '2023-10-02 07:32:43'),
(49, 3, 14, '15', 'Pembangunan/Rehabilitasi/Peningkatan Balai Desa/Balai Kemasyarakatan**', '2023-10-02 07:32:55', '2023-10-02 07:32:55'),
(50, 3, 14, '16', 'Pembangunan/Rehabilitasi/Peningkatan Pemakaman Milik Desa/Situs Bersejarah Milik Desa/Petilasan', '2023-10-02 07:33:06', '2023-10-02 07:33:06'),
(51, 3, 14, '17', 'Pembuatan/Pemutakhiran Peta Wilayah dan Sosial Desa **', '2023-10-02 07:33:18', '2023-10-02 07:33:18'),
(52, 3, 14, '18', 'Penyusunan Dokumen Perencanaan Tata Ruang Desa', '2023-10-02 07:33:32', '2023-10-02 07:33:32'),
(53, 3, 14, '19', 'Pembangunan/Rehabilitasi/Peningkatan Embung Desa **', '2023-10-02 07:33:42', '2023-10-02 07:33:42'),
(54, 3, 14, '20', 'Pembangunan/Rehabilitasi/Peningkatan Monumen/Gapura/Batas Desa **', '2023-10-02 07:33:53', '2023-10-02 07:33:53'),
(55, 3, 14, '90-99', 'lain-lain kegiatan sub bidang pekerjaan umum dan penataan ruang*', '2023-10-02 07:34:07', '2023-10-02 07:34:07'),
(56, 3, 15, '1', 'Dukungan pelaksanaan program Pembangunan/Rehab Rumah Tidak Layak Huni (RTLH) GAKIN (pemetaan, validasi, dll)', '2023-10-02 07:36:08', '2023-10-02 07:36:08'),
(57, 3, 15, '2', 'Pemeliharaan Sumur Resapan Milik Desa', '2023-10-02 07:36:21', '2023-10-02 07:36:21'),
(58, 3, 15, '3', 'Pemeliharaan Sumber Air Bersih Milik Desa (Mata Air/Tandon Penampungan Air Hujan/Sumur Bor, dll)', '2023-10-02 07:36:34', '2023-10-02 07:36:34'),
(59, 3, 15, '4', 'Pemeliharaan Sambungan Air Bersih ke Rumah Tangga (pipanisasi, dll)', '2023-10-02 07:36:48', '2023-10-02 07:36:48'),
(60, 3, 15, '5', 'Pemeliharaan Sanitasi Permukiman (Gorong-gorong, Selokan, Parit, dll., diluar prasarana jalan)', '2023-10-02 07:37:14', '2023-10-02 07:37:14'),
(61, 2, 6, '1', 'Penyediaan Sarana (Aset Tetap) Perkantoran/Pemerintahan Pemeliharaan Gedung/Prasarana Kantor Desa', '2023-10-24 07:07:20', '2023-10-24 07:07:20'),
(62, 2, 6, '2', 'Pembangunan/Rehabilitasi/Peningkatan Gedung/Prasarana Kantor Desa **', '2023-10-24 07:07:45', '2023-10-24 07:07:45'),
(63, 2, 6, '99', 'Lain-lain Sub Bidang Sarana Prasarana Pemerintahan Des', '2023-10-24 07:08:08', '2023-10-24 07:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_belanja_desa`
--

CREATE TABLE `kelompok_belanja_desa` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelompok_belanja_desa`
--

INSERT INTO `kelompok_belanja_desa` (`id`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
(5, '5.1', 'Belanja Pegawai', '2023-09-12 18:52:33', '2023-09-12 18:52:33'),
(6, '5.2', 'Belanja Barang Dan Jasa', '2023-09-12 18:52:43', '2023-09-12 18:52:43'),
(7, '5.3', 'Belanja Modal', '2023-09-12 18:52:54', '2023-09-12 18:53:15'),
(8, '5.4', 'Belanja Tidak Terduga', '2023-09-12 18:53:06', '2023-09-12 18:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_pendapatan_desa`
--

CREATE TABLE `kelompok_pendapatan_desa` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelompok_pendapatan_desa`
--

INSERT INTO `kelompok_pendapatan_desa` (`id`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, '4.1', 'Pendapatan Asli Desa', '2023-09-22 04:25:36', '2023-09-22 04:25:36'),
(3, '4.2', 'Pendapatan Transfer', '2023-09-23 23:31:05', '2023-09-23 23:31:05'),
(4, '4.3', 'Pendapatan Lain-Lain', '2023-09-23 23:31:22', '2023-09-23 23:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_25_125544_add_role', 2),
(6, '2023_07_25_131325_add_username', 3),
(7, '2023_07_25_131409_add_username', 4),
(8, '2023_07_25_131728_add_id_pengguna_username', 5),
(9, '2023_07_25_132609_create_perangkat_desa', 6),
(10, '2023_07_25_132708_create_jabatan_desa', 6),
(11, '2023_06_09_033127_create_table_mahasiswa', 7),
(12, '2023_06_09_095417_periode_kkn', 7),
(13, '2023_06_09_100403_create_tbl_fakultas', 7),
(14, '2023_06_09_100554_create_tbl_jurusan', 7),
(15, '2023_06_19_042647_create_tbl_calon_kkn', 7),
(16, '2023_06_19_051949_create_tbl_berkas_calon_kkn', 7),
(17, '2023_06_22_091632_create_tbl_berita', 8),
(18, '2023_06_22_093217_add_waktu', 8),
(19, '2023_07_07_050732_add_id_periode', 8),
(20, '2023_07_08_174034_create_table_desa', 8),
(21, '2023_07_09_124856_create_tbl_dpl', 8),
(22, '2023_08_01_050939_create_profil_desa', 8),
(23, '2023_08_01_072028_remove_nama', 9),
(24, '2023_08_01_072253_removenama', 10),
(25, '2023_08_01_150015_add_foto', 11),
(26, '2023_08_01_172042_create_sumber_dana', 12),
(27, '2023_08_02_155746_create_bidang', 13),
(28, '2023_08_02_172557_add_kode_sumber', 14),
(29, '2023_08_27_140638_add_kode_bidang', 15),
(30, '2023_08_27_152539_create_sub_bidang', 16),
(31, '2023_08_28_124237_create_kegiatan', 17),
(32, '2023_09_11_024118_create_pola_kegiatan', 18),
(33, '2023_09_11_154305_create_rkd', 19),
(34, '2023_09_12_033246_create_jenis_belanja_desa', 20),
(35, '2023_09_12_034051_create_jenis_belanja_desa', 21),
(36, '2023_09_12_141623_create_objek_belanja_desa', 22),
(37, '2023_09_13_011520_create_objek_belanja_desa', 23),
(38, '2023_09_17_064531_create_anggaran_kegiatan', 24),
(39, '2023_09_18_033223_create_tahun_setting', 25),
(40, '2023_09_22_082718_create_jenis_pendapatan_desa', 26),
(41, '2023_09_22_082748_create_kelompok_pendapatan_desa', 26),
(42, '2023_09_22_082755_create_objek_pendapatan_desa', 26),
(43, '2023_09_25_122711_create_rap', 27),
(44, '2023_09_25_123632_create_detail_rap', 28),
(45, '2023_09_30_181723_create_pengaturan', 29),
(46, '2023_10_13_063229_create_detail_anggaran_kegiatan', 30),
(47, '2023_10_17_084216_create_rab', 31),
(48, '2023_10_20_072450_create_rab_rinci', 32),
(49, '2023_10_22_122831_create_tahun_anggaran', 33);

-- --------------------------------------------------------

--
-- Table structure for table `objek_belanja_desa`
--

CREATE TABLE `objek_belanja_desa` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kelompok` int NOT NULL,
  `id_jenis` int NOT NULL,
  `kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `objek_belanja_desa`
--

INSERT INTO `objek_belanja_desa` (`id`, `id_kelompok`, `id_jenis`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 5, 3, '01', 'Penghasilan Tetap Kepala Desa', '2023-09-12 19:13:29', '2023-09-12 19:13:29'),
(3, 5, 3, '02', 'Tunjangan Kepala Desa', '2023-09-12 19:19:22', '2023-09-12 19:19:22'),
(4, 5, 3, '03', 'Penerimaan Lain-lain Kepala Desa yang sah', '2023-09-12 19:20:52', '2023-09-12 19:20:52'),
(5, 5, 4, '01', 'Penghasilan Tetap Perangkat Desa', '2023-09-12 19:22:08', '2023-09-12 19:22:08'),
(6, 5, 4, '02', 'Tunjangan Perangkat Desa', '2023-09-12 19:23:03', '2023-09-12 19:23:03'),
(7, 5, 4, '03', 'Penerimaan Lain-lain Perangkat Desa yang sah', '2023-09-12 19:23:27', '2023-09-12 19:23:27'),
(8, 6, 9, '01', 'Belanja Perjalan Desa Kabupaten/Kota', '2023-09-13 09:10:26', '2023-09-13 09:10:26'),
(9, 6, 9, '02', 'Belanja Perjalan Diluar Kabupate/kota', '2023-09-13 09:11:05', '2023-09-13 09:11:05'),
(10, 6, 9, '03', 'Belanja Kursus Pelatihan', '2023-09-13 09:11:28', '2023-09-13 09:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `objek_pendapatan_desa`
--

CREATE TABLE `objek_pendapatan_desa` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kelompok` int NOT NULL,
  `id_jenis` int NOT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `objek_pendapatan_desa`
--

INSERT INTO `objek_pendapatan_desa` (`id`, `id_kelompok`, `id_jenis`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '01', 'Bagi Hasil BUMDES', '2023-09-24 00:43:09', '2023-10-21 12:27:06'),
(3, 2, 3, '01', 'Pengelolaan Tanah Kas Desa', '2023-09-24 00:44:06', '2023-10-21 12:31:00'),
(4, 2, 3, '02', 'Tambahan Perahu', '2023-09-24 00:44:36', '2023-10-21 12:31:16'),
(5, 2, 3, '03', 'Pasar Desa', '2023-09-24 00:44:55', '2023-10-21 12:31:26'),
(6, 2, 3, '04', 'Tempat Pemandian Desa', '2023-09-24 00:45:23', '2023-10-21 12:31:37'),
(7, 2, 3, '05', 'Jaringan Irigasi Desa', '2023-09-24 00:45:47', '2023-10-21 12:31:47'),
(8, 2, 3, '06', 'Pelelangan Ikan Milik Desa', '2023-09-24 00:46:08', '2023-10-21 12:31:57'),
(9, 2, 3, '07', 'Hasil Kios Milik Desa', '2023-09-24 00:46:35', '2023-10-21 12:32:15'),
(11, 2, 3, '99', 'Lain-lain Hasil Aset Desa', '2023-09-24 00:47:43', '2023-10-21 12:22:04'),
(12, 3, 6, '01', 'Dana Desa', '2023-09-25 05:07:48', '2023-10-21 12:37:12'),
(13, 3, 8, '01', 'Alokasi Dana Desa', '2023-10-21 11:22:21', '2023-10-21 11:22:21'),
(14, 2, 2, '02', 'Bagi Hasil BUMDES Bersama', '2023-10-21 12:30:40', '2023-10-21 12:30:40'),
(15, 2, 3, '08', 'Pemanfaatan Sarana/Prasarana Olahraga', '2023-10-21 12:33:20', '2023-10-21 12:33:56'),
(16, 2, 3, '09', 'Gedung/Bangunan Milik Desa', '2023-10-21 12:34:19', '2023-10-21 12:34:19'),
(17, 2, 3, '91', 'Pengelolaan Tanah Bengkok', '2023-10-21 12:34:56', '2023-10-21 12:34:56'),
(18, 2, 3, '92', 'Hasil Mata Air Desa/Sarana Air Bersih Desa', '2023-10-21 12:35:48', '2023-10-21 12:35:48'),
(19, 3, 7, '01', 'Bagi Hasil Pajak Daerah Kabupaten/Kota', '2023-10-21 12:38:28', '2023-10-21 12:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` bigint UNSIGNED NOT NULL,
  `judul_aplikasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_login` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `logo_rel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `judul_aplikasi`, `logo_login`, `logo_rel`, `created_at`, `updated_at`) VALUES
(1, 'APLIKASI MANAJEMEN DANA DESA KAKUNAWE', '1696164541_png', '1696164541_png', '2023-09-30 18:34:57', '2023-10-01 04:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_desa`
--

CREATE TABLE `perangkat_desa` (
  `id` bigint UNSIGNED NOT NULL,
  `id_jabatan` int DEFAULT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','W') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_sk` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `no_handphone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perangkat_desa`
--

INSERT INTO `perangkat_desa` (`id`, `id_jabatan`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `no_sk`, `tgl_sk`, `no_handphone`, `created_at`, `updated_at`, `foto`) VALUES
(19, 1, 'Munarwis S.Pd', 'Baubau', '1987-09-09', 'L', 'SK-01/01/2009', '2009-09-09', '081234567890', NULL, NULL, 'default.jpg'),
(21, 8, 'Maskut', 'Baubau', '1987-09-01', 'L', 'SK-830238', '2009-01-07', '081234567890', NULL, NULL, 'default.jpg'),
(22, 9, 'Sulaiman', 'Baubau', '2001-09-09', 'L', 'SK-4930493', '2001-09-09', '081234567890', NULL, NULL, 'default.jpg'),
(23, 10, 'Nur Asmira S.Ak', 'Baubau', '2001-01-01', 'W', 'SK-4903493', '2007-07-07', '081234567890', NULL, NULL, 'default.jpg'),
(24, 2, 'Andi Arif', 'Baubau', '1988-09-09', 'L', '12345678', '2023-07-25', '082297886738', NULL, NULL, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pola_kegiatan`
--

CREATE TABLE `pola_kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pola_kegiatan`
--

INSERT INTO `pola_kegiatan` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(5, 'Swakelola', '2023-09-10 20:08:00', '2023-09-10 20:08:00'),
(6, 'Kerja Sama', '2023-09-10 20:08:07', '2023-09-10 20:08:07'),
(7, 'Pihak Kegiatan', '2023-09-10 20:08:20', '2023-09-10 20:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id` bigint UNSIGNED NOT NULL,
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pengisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil_desa`
--

INSERT INTO `profil_desa` (`id`, `provinsi`, `kecamatan`, `kabupaten`, `desa`, `id_pengisi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Sulawesi Tenggara', 'Lasalimu', 'buton', 'Kakunawe', '23', '1696164541_png', '2023-08-01 07:25:07', '2023-09-07 12:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `rab`
--

CREATE TABLE `rab` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kegiatan` int NOT NULL DEFAULT '0',
  `paket_kegiatan` int NOT NULL,
  `kode` int NOT NULL DEFAULT '0',
  `anggaran` float NOT NULL DEFAULT '0',
  `tahun_anggaran` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rab`
--

INSERT INTO `rab` (`id`, `id_kegiatan`, `paket_kegiatan`, `kode`, `anggaran`, `tahun_anggaran`, `created_at`, `updated_at`) VALUES
(17, 18, 19, 2, 200000000, 2, '2023-10-24 11:40:29', '2023-10-24 11:57:40'),
(18, 18, 21, 3, 100000000, 2, '2023-10-24 11:40:40', '2023-10-24 11:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `rab_rinci`
--

CREATE TABLE `rab_rinci` (
  `id` bigint UNSIGNED NOT NULL,
  `rab` int NOT NULL,
  `nomor_urut` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rab_rinci`
--

INSERT INTO `rab_rinci` (`id`, `rab`, `nomor_urut`, `uraian`, `jumlah`, `harga`, `sumber_dana`, `created_at`, `updated_at`) VALUES
(13, 17, '0000001', 'Terbayar Tunjangan Kepala Desa', '10  OB', '20000000', 4, '2023-10-24 11:57:40', '2023-10-24 11:57:40'),
(14, 18, '0000001', 'Terbayar Tunjangan Kepala Desa', '10 OB', '10000000', 4, '2023-10-24 11:58:11', '2023-10-24 11:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `rap`
--

CREATE TABLE `rap` (
  `id` bigint UNSIGNED NOT NULL,
  `id_objek` int NOT NULL DEFAULT '0',
  `total` double NOT NULL,
  `tahun_anggaran` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rap`
--

INSERT INTO `rap` (`id`, `id_objek`, `total`, `tahun_anggaran`, `created_at`, `updated_at`) VALUES
(3, 12, 650000000, 2, '2023-10-21 10:50:06', '2023-10-23 08:46:24'),
(11, 13, 1500000000, 2, '2023-10-21 13:00:02', '2023-10-21 13:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `rkd`
--

CREATE TABLE `rkd` (
  `id` bigint UNSIGNED NOT NULL,
  `id_bidang` int NOT NULL,
  `id_sub_bidang` int NOT NULL,
  `id_kegiatan` int NOT NULL,
  `lokasi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluaran` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manfaat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_pelaksanaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pelaksanaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_bidang`
--

CREATE TABLE `sub_bidang` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_sub_bidang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bidang` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_bidang`
--

INSERT INTO `sub_bidang` (`id`, `kode_sub_bidang`, `id_bidang`, `keterangan`, `created_at`, `updated_at`) VALUES
(5, '1', 2, 'Sub Bidang Penyelenggaraan Belanja Penghasilan Tetap, Tunjangan dan Operasional Pemerintahan Desa', '2023-08-28 05:23:55', '2023-08-28 05:23:55'),
(6, '2', 2, 'Sub Bidang Sarana dan Prasarana Pemerintahan Desa', '2023-08-28 05:24:23', '2023-08-28 05:24:23'),
(7, '3', 2, 'Sub Bidang Administrasi Kependudukan, Pencatatan Sipil, Statistik dan Kearsipan', '2023-08-28 05:24:56', '2023-08-28 05:24:56'),
(8, '4', 2, 'Sub Bidang Tata Praja Pemerintahan, Perencanaan, Keuangan dan Pelaporan', '2023-08-28 05:25:13', '2023-08-28 05:25:13'),
(9, '5', 2, 'Sub Bidang Pertanahan', '2023-08-28 05:25:41', '2023-08-28 05:25:41'),
(11, '2', 2, 'Sub Bidang Kesehatan', '2023-08-28 05:26:30', '2023-08-28 05:26:30'),
(12, '1', 3, 'Sub BIdang Pendidikan', '2023-09-19 23:23:09', '2023-09-19 23:23:09'),
(13, '2', 3, 'Sub Bidang Kesehatan', '2023-09-19 23:23:49', '2023-09-19 23:23:49'),
(14, '3', 3, 'Sub Bidang Pekerjaan Umum dan Penataan Ruang', '2023-09-19 23:24:11', '2023-09-19 23:24:11'),
(15, '4', 3, 'Sub Bidang Kawasan Permukiman', '2023-09-19 23:24:43', '2023-09-19 23:24:43'),
(16, '5', 3, 'Sub Bidang Kehutanan dan Lingkungan Hidup', '2023-09-19 23:24:57', '2023-09-19 23:24:57'),
(19, '6', 3, 'Sub Bidang Perhubungan, Komunikasi, dan Informatika', '2023-09-19 23:45:50', '2023-09-19 23:45:50'),
(20, '7', 3, 'Sub Bidang Energi dan Sumber Daya Mineral', '2023-09-19 23:46:25', '2023-09-19 23:46:25'),
(21, '8', 3, 'Sub Bidang Pariwisata', '2023-09-19 23:46:43', '2023-09-19 23:46:43'),
(22, '1', 4, 'Sub Bidang Ketenteraman, Ketertiban Umum, dan Pelindungan Masyarakat', '2023-09-20 01:39:12', '2023-09-20 01:39:12'),
(23, '2', 4, 'Sub Bidang Kebudayaan dan Keagamaan', '2023-09-20 01:39:34', '2023-09-20 01:39:34'),
(24, '3', 4, 'Sub Bidang Kepemudaan dan Olah Raga', '2023-09-20 01:39:56', '2023-09-20 01:39:56'),
(25, '4', 4, 'Sub Bidang Kelembagaan Masyarakat', '2023-09-20 01:40:16', '2023-09-20 01:40:16'),
(26, '1', 5, 'Sub Bidang Kelautan dan Perikanan', '2023-09-20 01:59:24', '2023-09-20 01:59:24'),
(27, '2', 5, 'Sub Bidang Pertanian dan Peternakan', '2023-09-20 01:59:47', '2023-09-20 01:59:47'),
(28, '3', 5, 'Sub Bidang Peningkatan Kapasitas Aparatur Desa', '2023-09-20 02:00:05', '2023-09-20 02:00:05'),
(29, '4', 5, 'Sub Bidang Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga', '2023-09-20 02:00:20', '2023-09-20 02:00:20'),
(30, '5', 5, 'Sub Bidang Koperasi, Usaha Mikro Kecil dan Menengah (UMKM)', '2023-09-20 02:00:35', '2023-09-20 02:00:35'),
(31, '6', 5, 'Sub Bidang Dukungan Penanaman Modal', '2023-09-20 02:00:51', '2023-09-20 02:00:51'),
(32, '7', 5, 'Sub Bidang Perdagangan dan Perindustrian', '2023-09-20 02:01:46', '2023-09-20 02:01:46'),
(33, '1', 6, 'Sub Bidang Penanggulangan Bencana', '2023-09-20 02:02:05', '2023-09-20 02:02:05'),
(34, '2', 6, 'Sub Bidang Keadaan Darurat', '2023-09-20 02:02:23', '2023-09-20 02:02:23'),
(35, '3', 6, 'Sub Bidang Keadaan Mendesak', '2023-09-20 02:02:43', '2023-09-20 02:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `sumber_dana`
--

CREATE TABLE `sumber_dana` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_sumber` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sumber_dana`
--

INSERT INTO `sumber_dana` (`id`, `jenis`, `created_at`, `updated_at`, `kode_sumber`) VALUES
(2, 'Dana Desa (APBN)', '2023-08-01 22:16:18', '2023-08-02 09:32:40', 'DDS'),
(4, 'Alokasi Dana Desa', '2023-08-01 22:17:59', '2023-08-02 09:32:19', 'ADD'),
(5, 'Penerimaan Bagi Hasil Pajak//Retribusi Daerah', '2023-08-02 09:23:24', '2023-08-02 09:32:53', 'PBH'),
(6, 'Penerimaan Bantuan Keuangan Kab/Kota', '2023-08-02 09:23:47', '2023-08-02 09:33:09', 'PBK'),
(7, 'Penerimaan Bantuan Keuangan Provinsi', '2023-08-02 09:24:03', '2023-08-02 09:33:27', 'PBP'),
(8, 'Pendapatan Asli Desa', '2023-08-02 09:33:53', '2023-08-02 09:33:53', 'PAD');

-- --------------------------------------------------------

--
-- Table structure for table `table_desa`
--

CREATE TABLE `table_desa` (
  `id_desa` bigint UNSIGNED NOT NULL,
  `kabupaten` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_anggaran`
--

CREATE TABLE `tahun_anggaran` (
  `id` bigint UNSIGNED NOT NULL,
  `tahun` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_anggaran`
--

INSERT INTO `tahun_anggaran` (`id`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(2, '2023', 1, '2023-10-22 05:32:24', '2023-10-23 08:07:29'),
(4, '2022', 0, '2023-10-22 07:32:02', '2023-10-22 07:32:02'),
(5, '2021', 0, '2023-10-22 07:32:13', '2023-10-22 07:32:13'),
(6, '2020', 0, '2023-10-22 07:32:20', '2023-10-22 07:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_setting`
--

CREATE TABLE `tahun_setting` (
  `id` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_setting`
--

INSERT INTO `tahun_setting` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '1 Bulan', NULL, NULL),
(2, '2 Bulan', NULL, NULL),
(3, '3 Bulan', NULL, NULL),
(4, '4 Bulan', NULL, NULL),
(5, '5 Bulan', NULL, NULL),
(6, '6 Bulan', NULL, NULL),
(7, '7 Bulan', NULL, NULL),
(8, '8 Bulan', NULL, NULL),
(9, '9 Bulan', NULL, NULL),
(10, '10 Bulan', NULL, NULL),
(11, '11 Bulan', NULL, NULL),
(12, '12 Bulan', NULL, NULL),
(13, '1 Minggu', NULL, NULL),
(14, '2 Minggu', NULL, NULL),
(15, '3 Minggu', NULL, NULL),
(16, '4 Minggu', NULL, NULL),
(17, '5 Minggu', NULL, NULL),
(18, '6 Minggu', NULL, NULL),
(19, '7 Minggu', NULL, NULL),
(20, '8 Minggu', NULL, NULL),
(21, '9 Minggu', NULL, NULL),
(22, '10 Minggu', NULL, NULL),
(23, '11 Minggu', NULL, NULL),
(24, '12 Minggu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pengguna` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_pengguna`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(14, 19, 'munarwis01', 'Munarwis S.Pd', 'munarwis@gmail.com', NULL, '$2y$10$GxiVNGVORd69CADBeECHzOZ8fiPdLCJrXhMUHiAfMFOv2NeJ9FRG6', NULL, NULL, NULL, 'perangkat'),
(16, 21, 'maskut03', 'Maskut', 'maskut@gmail.com', NULL, '$2y$10$vtT83hbCfs3sQoyrXwxKJ.D20RL2nDRUurSKLFaXYm4VPRc0gaLJe', NULL, NULL, NULL, 'perangkat'),
(17, 22, 'sulaiman04', 'Sulaiman', 'sulaiman@gmail.com', NULL, '$2y$10$mhohbFyUyc0Eaj3BM6DOS.EySSDVUQxW7meRkz3IL1LgQi816TkcW', NULL, NULL, NULL, 'admin'),
(18, 23, 'nurasmira05', 'Nur Asmira S.Ak', 'nurasmira@gmail.com', NULL, '$2y$10$yv/qyr/I6Duj334A3QJDeOUXDe9QhFHq/LJ4P1t/h9iCtSITDgHmO', NULL, NULL, NULL, 'perangkat'),
(19, 24, 'andiarif1510', 'Andi Arif', 'kopralgamers1510@gmail.com', NULL, '$2y$10$PMfu90rGCYJGspnrAjyoJegyuyxiMEfgVR0PlJvOULpHNv38SaCsu', NULL, NULL, NULL, 'perangkat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran_kegiatan`
--
ALTER TABLE `anggaran_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_anggaran_kegiatan`
--
ALTER TABLE `detail_anggaran_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_rap`
--
ALTER TABLE `detail_rap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatan_desa`
--
ALTER TABLE `jabatan_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_belanja_desa`
--
ALTER TABLE `jenis_belanja_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pendapatan_desa`
--
ALTER TABLE `jenis_pendapatan_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_belanja_desa`
--
ALTER TABLE `kelompok_belanja_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_pendapatan_desa`
--
ALTER TABLE `kelompok_pendapatan_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objek_belanja_desa`
--
ALTER TABLE `objek_belanja_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objek_pendapatan_desa`
--
ALTER TABLE `objek_pendapatan_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pola_kegiatan`
--
ALTER TABLE `pola_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_desa`
--
ALTER TABLE `profil_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab`
--
ALTER TABLE `rab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rab_rinci`
--
ALTER TABLE `rab_rinci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rap`
--
ALTER TABLE `rap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rkd`
--
ALTER TABLE `rkd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_bidang`
--
ALTER TABLE `sub_bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_desa`
--
ALTER TABLE `table_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tahun_anggaran`
--
ALTER TABLE `tahun_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_setting`
--
ALTER TABLE `tahun_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran_kegiatan`
--
ALTER TABLE `anggaran_kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_anggaran_kegiatan`
--
ALTER TABLE `detail_anggaran_kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `detail_rap`
--
ALTER TABLE `detail_rap`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan_desa`
--
ALTER TABLE `jabatan_desa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jenis_belanja_desa`
--
ALTER TABLE `jenis_belanja_desa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jenis_pendapatan_desa`
--
ALTER TABLE `jenis_pendapatan_desa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `kelompok_belanja_desa`
--
ALTER TABLE `kelompok_belanja_desa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelompok_pendapatan_desa`
--
ALTER TABLE `kelompok_pendapatan_desa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `objek_belanja_desa`
--
ALTER TABLE `objek_belanja_desa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `objek_pendapatan_desa`
--
ALTER TABLE `objek_pendapatan_desa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pola_kegiatan`
--
ALTER TABLE `pola_kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rab`
--
ALTER TABLE `rab`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rab_rinci`
--
ALTER TABLE `rab_rinci`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rap`
--
ALTER TABLE `rap`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rkd`
--
ALTER TABLE `rkd`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_bidang`
--
ALTER TABLE `sub_bidang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_desa`
--
ALTER TABLE `table_desa`
  MODIFY `id_desa` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_anggaran`
--
ALTER TABLE `tahun_anggaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tahun_setting`
--
ALTER TABLE `tahun_setting`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
