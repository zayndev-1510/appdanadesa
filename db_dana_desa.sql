-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2023 at 06:47 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
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
(24, 2, 'Desa kakunawe', '12', 24, 'Tebayarnya Gaji Kepala Desa', '12 Bulan', 60000000, 2, '2023-11-12 09:24:43', '2023-11-12 09:24:43');

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
(26, 24, 'Paket Siltap', 60000000, 5, 'Terbayaranya SIltap', 'Terbayaranya SIltap', '12 Bulan', 4, 'NON FISIK LAINNYA', 'Desa Kakunawe', '2023-11-12 09:25:04', '2023-11-12 09:25:04');

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
(49, '2023_10_22_122831_create_tahun_anggaran', 33),
(50, '2016_06_01_000001_create_oauth_auth_codes_table', 34),
(51, '2016_06_01_000002_create_oauth_access_tokens_table', 34),
(52, '2016_06_01_000003_create_oauth_refresh_tokens_table', 34),
(53, '2016_06_01_000004_create_oauth_clients_table', 34),
(54, '2016_06_01_000005_create_oauth_personal_access_clients_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('00e58bde68b641c77900d2d88597e2e0f68dc66931460013172e62d5cacffc6daec9ea1db403f21a', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:21:44', '2023-10-25 23:21:44', '2024-10-26 07:21:44'),
('017520d19955a3a32838a7d469bfd87280f63bdb1e55687cadf54b9fd8a247278ba1798864aa6845', 17, 1, 'myApp', '[]', 0, '2023-10-26 00:55:30', '2023-10-26 00:55:30', '2023-10-26 09:05:30'),
('03424e55c7f45f4f2169459a36de76143907da01161069c1ce927d51ce73dc633a4c25335ec0780b', 17, 1, 'myApp', '[]', 0, '2023-10-26 00:55:30', '2023-10-26 00:55:30', '2023-10-26 09:05:30'),
('0828191d9555aeb83bcd7a8fc0a06327cf2285e2e029411ed4fa9172d620370a48ab83ed53417bbd', 17, 1, 'myApp', '[]', 0, '2023-10-25 20:20:01', '2023-10-25 20:20:01', '2024-10-26 04:20:01'),
('082f85017405c1e570c38a1d9594f92cb4c7197ad13e98fe78bd7440f9ca2f2e2631cba23e5dcebd', 17, 1, 'myApp', '[]', 0, '2023-11-05 21:48:52', '2023-11-05 21:48:52', '2023-11-06 12:48:52'),
('09c51e840e75bdf273eda6b03d0ccc6c050026b4e3a6296c1894379bcde177f4eb8a1acf85ae72bd', 17, 1, 'myApp', '[]', 0, '2023-11-05 19:46:40', '2023-11-05 19:46:40', '2023-11-06 03:56:40'),
('09f10bb8ed1d0afc63532247e20ebc82e4b7393731ee08be4ab4ad4d4107bc8eac12bfb3212e3d77', 17, 1, 'myApp', '[]', 0, '2023-10-26 00:49:14', '2023-10-26 00:49:14', '2023-10-26 08:59:14'),
('0a33f53b0f64611a22034fd9ab357645d358645d64448f97da816977c2dda9b2ba1dd76703e7f049', 17, 1, 'myApp', '[]', 0, '2023-10-25 20:26:42', '2023-10-25 20:26:42', '2024-10-26 04:26:42'),
('0b083b6e3242444f9523434681ba46bf95d10875824b47ee5f47f1e88458ca50bf96f0f5d53aff3e', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:48:02', '2023-10-25 23:48:02', '2023-10-26 08:48:02'),
('0c0c8858c2ea36a952b75e14e5ceb57229780d230806e50e7babd12f2eecc02112a97d177c4618c8', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:35:20', '2023-10-25 23:35:20', '2023-10-26 12:35:20'),
('0c3378e4bb4bdcd5dcf1734d8246ab6aec165b21af2d618b865d6d408a6d5c869f5604c673888684', 17, 1, 'myApp', '[]', 0, '2023-11-05 22:25:34', '2023-11-05 22:25:34', '2023-11-06 13:25:34'),
('0f2f86376303e7bd961ffd22ac5d762ad2f0413ae4f2a06765f45441c571012a1e99f116995b4b55', 17, 1, 'myApp', '[]', 0, '2023-11-12 08:21:53', '2023-11-12 08:21:53', '2023-11-12 23:21:53'),
('1a5daaaab52969f5eeceaa9ed4640a682f91e0363a1f596f8a5efd228c6270abbd138827ed98a0e0', 17, 1, 'myApp', '[]', 0, '2023-11-12 07:55:40', '2023-11-12 07:55:40', '2023-11-12 22:55:40'),
('1c8b3c006d4520bf5471430351f9be2b39fbdee3958a5f087055001f5b535f236127127bb68cd00e', 17, 1, 'myApp', '[]', 0, '2023-10-25 21:26:19', '2023-10-25 21:26:19', '2024-10-26 05:26:19'),
('1ef2642fddc7ddd1d30dd3ec4cff62d43c481b35c0bfd98faf108b06a8c59a872651003cda294e7d', 17, 1, 'myApp', '[]', 0, '2023-11-05 19:36:27', '2023-11-05 19:36:27', '2023-11-06 03:46:27'),
('20b8e4deee1efd8ec1aa59d06103e3dbf844d2a653de0b3e4803aff3f4de20d093826ce291565091', 17, 1, 'myApp', '[]', 0, '2023-11-12 06:46:49', '2023-11-12 06:46:49', '2023-11-12 21:46:49'),
('236c2be13db733ab4d2cb5c806631a19ca5677c984badab71236f2dfc269085d9539fff4ae66d65f', 17, 1, 'myApp', '[]', 0, '2023-11-12 07:56:55', '2023-11-12 07:56:55', '2023-11-12 22:56:55'),
('26c0d877c28b17c7ca10d4c7f0f4252aa940a88595b97342bb5764431a4829038a4d257314ee1793', 17, 1, 'myApp', '[]', 0, '2023-10-25 21:26:01', '2023-10-25 21:26:01', '2024-10-26 05:26:01'),
('2ca20be0a50316467f23419af15edfbec11148be5fecf8b94d37f7cabe29540f40e757bbf1337930', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:48:42', '2023-10-25 23:48:42', '2023-10-26 08:48:42'),
('307064d4c120bb2dba1d9e0ac2ee684039a98131e19f4aa654c44fb27cc514861d36498802609775', 17, 1, 'myApp', '[]', 0, '2023-11-12 06:46:49', '2023-11-12 06:46:49', '2023-11-12 21:46:49'),
('319ea0e90010bc596608152e2b75e1feb2d4fc71f58650e42d0f7895d5b41e065baf21307de47dfd', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:48:25', '2023-10-25 23:48:25', '2023-10-26 08:48:25'),
('31d2c7c9d3ff7f09e3db67f5a824fec2d2be008df43929eaa92549b14773df22c7a2a280703a918c', 17, 1, 'myApp', '[]', 0, '2023-11-05 19:47:26', '2023-11-05 19:47:26', '2023-11-06 10:47:26'),
('3283980d25fb49c3da8e749854720642187e806a2ef1870d371556bbd97c3f939fd3d2dce5a24742', 17, 1, 'myApp', '[]', 0, '2023-11-05 20:49:06', '2023-11-05 20:49:06', '2023-11-06 11:49:06'),
('36bce1e0e6636a8b12c84995041da2fc0d1b810dd353326550bae13e01c1655395e965e5b88dab39', 17, 1, 'myApp', '[]', 0, '2023-11-12 07:55:08', '2023-11-12 07:55:08', '2023-11-12 22:55:08'),
('3ab7790d15744c14b6cb70c6dec65dfa347040fb50b875eca7ed9e5b3b61fb37deb78230b97e4f4e', 17, 1, 'myApp', '[]', 0, '2023-11-12 08:20:05', '2023-11-12 08:20:05', '2023-11-12 23:20:05'),
('3bce9e5a7b81e2f547b502089f178f3ad7642e57605660555fa44089d57601bf9f86b0f1d2e2cc7a', 17, 1, 'myApp', '[]', 0, '2023-11-05 18:55:03', '2023-11-05 18:55:03', '2023-11-06 03:05:03'),
('3c788dcf35a91c69d22f30b3860ff1f850fff4d967357ddfb6684b501867d7d0a50de9319ac5820d', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:35:09', '2023-10-25 23:35:09', '2023-10-26 12:35:09'),
('3f989f888e8b743ebf7d1633bc9c80bb8e42140d37b117d8107a24806f164ebef35726f03ba0f232', 17, 1, 'myApp', '[]', 0, '2023-11-12 09:11:56', '2023-11-12 09:11:56', '2023-11-13 00:11:56'),
('41684440e3ced6c7fec08db1f74fa84eddad60fb5a1a11e586355bfaeb0bb3d054f0e8dd8f568fee', 17, 1, 'myApp', '[]', 0, '2023-11-05 18:55:03', '2023-11-05 18:55:03', '2023-11-06 03:05:03'),
('4dd08c8244cc41c5791b7d5e48bd28df40728eead5b8059aa0385bde557b5cf574ea903b34484624', 17, 1, 'myApp', '[]', 0, '2023-10-26 00:53:11', '2023-10-26 00:53:11', '2023-10-26 09:03:11'),
('52cffa5f7d9cc77dccae459ef80d484a43560cbfa1614e1655d87a37f9e19ae50e3d2b4c821ef8af', 17, 1, 'myApp', '[]', 0, '2023-11-05 22:35:53', '2023-11-05 22:35:53', '2023-11-06 13:35:53'),
('53c6f54ce444b63a4bae9aa8f66508069048497719a501c67dbe9db3afd77569c747a0217604f357', 17, 1, 'myApp', '[]', 0, '2023-11-05 19:58:58', '2023-11-05 19:58:58', '2023-11-06 10:58:58'),
('553d7b76629e2ad78e38e27f85584341102fef9a1f3ec996981c40de774baabefdcb6ea0f0747e8b', 17, 1, 'myApp', '[]', 0, '2023-10-25 21:25:56', '2023-10-25 21:25:56', '2024-10-26 05:25:56'),
('5cf5619f8de6357dab1f39549e4d6d6996b924d711ffb06c4edbcf6781544bb453860b22c419a91c', 17, 1, 'myApp', '[]', 0, '2023-10-25 21:08:03', '2023-10-25 21:08:03', '2024-10-26 05:08:03'),
('62cf20eaea44946763af09037d5f6212a5ab0448b19f59f98c0a8e998544904b48818bc99cc393f4', 17, 1, 'myApp', '[]', 0, '2023-10-26 01:20:56', '2023-10-26 01:20:56', '2023-10-26 09:30:56'),
('630a4ff047b660b708ab98c5b1dbcad51d74a17dbeac7f5a911f134608d5b645ba7ef08512079ddc', 17, 1, 'myApp', '[]', 0, '2023-11-05 22:52:24', '2023-11-05 22:52:24', '2023-11-06 13:52:24'),
('65be572f4e7741861bd2685291b344696c8e1a4e76f1cdd22665b7efa3be8217d2d2ef05a1b22e83', 17, 1, 'myApp', '[]', 0, '2023-11-12 09:22:11', '2023-11-12 09:22:11', '2023-11-13 00:22:11'),
('672f1a2c1ff17c39e20128524e2c8edde4374e00568339849e3310ec5faa623fd5d47288d59b3759', 17, 1, 'myApp', '[]', 0, '2023-10-26 00:53:11', '2023-10-26 00:53:11', '2023-10-26 09:03:11'),
('689d3ba87c748f6bfba1ba930d90cbbab9b17a2add21ad7c92b88f4c4d816b49f3183f65d515e0d8', 17, 1, 'myApp', '[]', 0, '2023-10-26 03:23:55', '2023-10-26 03:23:55', '2023-10-26 11:33:55'),
('6a2df370290baf1d9f75069008ec967a8c325bb4a42833a19188a96294e9ffc56cfe460047bb658b', 17, 1, 'myApp', '[]', 0, '2023-11-12 07:55:40', '2023-11-12 07:55:40', '2023-11-12 22:55:40'),
('6db0f56914e0c5d5f45c0a464f387a1fa56fa93d62e038217519f40f0b046a36fe7b262ae1242440', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:48:24', '2023-10-25 23:48:24', '2023-10-26 08:48:24'),
('6fb4e5dbedc2acb007ab10e2d5993fc282e718fa6f740639d136ac29682a1d8caadfce4ea8bf492f', 17, 1, 'myApp', '[]', 0, '2023-11-06 01:51:20', '2023-11-06 01:51:20', '2023-11-06 16:51:20'),
('7127e14c817adc1b244ff82d357d1b60c96f4acf109ff6142333def0847255d3699e15338f9d9aaf', 17, 1, 'myApp', '[]', 0, '2023-11-05 21:19:07', '2023-11-05 21:19:07', '2023-11-06 12:19:07'),
('740461a0a9d0105bd9ef7ecf341f6630656a996adb29c5217e396d372bb0a00629ba6f157eef3be8', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:36:47', '2023-10-25 23:36:47', '2023-10-26 12:36:47'),
('7ab91ecaa95255782042eef7942da127e36fceb06df717857af0962fe4d99aaa60a92bcb59b3556d', 17, 1, 'myApp', '[]', 0, '2023-11-12 07:56:55', '2023-11-12 07:56:55', '2023-11-12 22:56:55'),
('8346901fad3953fa8bed4179f6d4d60ae7e7052d0712ae2864e85b91ff07ff90c571586e7aa78cf8', 17, 1, 'myApp', '[]', 0, '2023-11-12 08:21:53', '2023-11-12 08:21:53', '2023-11-12 23:21:53'),
('8ae5efc75c83fb09bb4b01cbe90fa2752dd84a13abc0f6ac97466499193e653697dc72a669cd3b8e', 17, 1, 'myApp', '[]', 0, '2023-11-05 22:45:55', '2023-11-05 22:45:55', '2023-11-06 13:45:55'),
('8b63031cb78fbc15e15341572157583040314dc4a4f52e59d53c81c39182d0171ecf9f676a5445d6', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:48:42', '2023-10-25 23:48:42', '2023-10-26 08:48:42'),
('8b759604acdc8c897700d41b810e3366b1fdd8f7ade776c77b7875782733ed80c4a5c5d82f4dd8db', 17, 1, 'myApp', '[]', 0, '2023-10-25 21:25:58', '2023-10-25 21:25:58', '2024-10-26 05:25:58'),
('8d250d41c308d157b986ca59748da0ec1d951380bc17f53c2030064e0721a15a3883e3700d54c98b', 17, 1, 'myApp', '[]', 0, '2023-10-26 01:02:15', '2023-10-26 01:02:15', '2023-10-26 09:12:15'),
('a0c6ecc18f7323c64b9eb1e24f2b5a083cefe07e8fc2fe7e2fb185c4b392ed2410abe2ddd6865870', 17, 1, 'myApp', '[]', 0, '2023-10-25 20:31:31', '2023-10-25 20:31:31', '2024-10-26 04:31:31'),
('a23e34c4c97282290f5a36a653887587204dd356a7b78204eef8f5eb9d8b736d8086135db4b17125', 17, 1, 'myApp', '[]', 0, '2023-10-25 21:24:17', '2023-10-25 21:24:17', '2024-10-26 05:24:17'),
('a54c40b34881e9505f15a06f9a2a5c3917563751205d2e9ad052440d777ce9a69aca668a5bcd68b4', 17, 1, 'myApp', '[]', 0, '2023-11-05 23:02:31', '2023-11-05 23:02:31', '2023-11-06 14:02:31'),
('a5ce11e694ac706e6c21a7b5c254183a8c21eea68dec8edaec355a203ef7808b5ed9be09e39457cc', 17, 1, 'myApp', '[]', 0, '2023-11-06 02:19:33', '2023-11-06 02:19:33', '2023-11-06 17:19:33'),
('a9d50b8a65384da92a7cb56d6ea51982c68ab71908d6c93c5787b865dd0be515ff17299927e8cdc8', 17, 1, 'myApp', '[]', 0, '2023-11-13 02:44:19', '2023-11-13 02:44:19', '2023-11-13 17:44:19'),
('aaac0cfeb8e1756eaa5c0bf8edada1df2fa03638c0fab9d75146cabf59c640fc04a903500bd25504', 17, 1, 'myApp', '[]', 0, '2023-11-05 19:47:26', '2023-11-05 19:47:27', '2023-11-06 10:47:26'),
('ac771fe2bc3f983d6d4ebacbd6f755870166b1d1eccf0dbee83080b4357bb5c1dc64effb07b20975', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:49:12', '2023-10-25 23:49:12', '2023-10-26 07:51:12'),
('ac88bba4e1eb79ee6849643f2efc78cbc7629137ea043304f12ff2bcc8d14ed60688bdb97e3ac3b0', 17, 1, 'myApp', '[]', 0, '2023-11-06 01:51:20', '2023-11-06 01:51:20', '2023-11-06 16:51:20'),
('ae000aaa30fd2c92ef278451cbe359605376fe35599ff09753c7320a034f6d4f94c70819089cab20', 17, 1, 'myApp', '[]', 0, '2023-11-05 22:52:24', '2023-11-05 22:52:24', '2023-11-06 13:52:24'),
('b6397241b1092ef02841a9f0fc8644c406fb544c1f502f483ef35e141e77c0f687a696b18b276adf', 17, 1, 'myApp', '[]', 0, '2023-11-05 20:22:41', '2023-11-05 20:22:41', '2023-11-06 11:22:41'),
('b83005425b900fea9b5d7da0497418bd3938911fe54e7b3633dc8b42aab05d5ca05d1ac354385230', 17, 1, 'myApp', '[]', 0, '2023-11-13 02:44:19', '2023-11-13 02:44:19', '2023-11-13 17:44:19'),
('bc8969b62a2d3bb24c9cd091b68ec7fa38838b9e4bf6550e28e553c564b7cd4d3bddb00aca86c881', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:46:36', '2023-10-25 23:46:36', '2023-10-26 08:46:36'),
('c630799006a47207ca6533776eb610fa01a0add3250fe0395993f0871159761a086cafb0dc601043', 17, 1, 'myApp', '[]', 0, '2023-10-25 21:08:53', '2023-10-25 21:08:53', '2024-10-26 05:08:53'),
('c8067880db8cb5f663cbb87625ff3f0433baa938d9cf3db7468f26458cc26cd23f0fab77f3a378b4', 17, 1, 'myApp', '[]', 0, '2023-10-26 01:10:29', '2023-10-26 01:10:29', '2023-10-26 09:20:29'),
('ce3cd1c3db397dc56558eeb79b3d2c8921284572e76012a4278677f488359a286c1fec379caef86e', 17, 1, 'myApp', '[]', 0, '2023-10-25 20:19:58', '2023-10-25 20:19:58', '2024-10-26 04:19:58'),
('d3fd4534ffea0045ff3aa2891c8c2c77e3a3f41899d3f93266787858645a5b85cdb3d4ed933a76ae', 17, 1, 'myApp', '[]', 0, '2023-10-26 01:09:02', '2023-10-26 01:09:02', '2023-10-26 09:19:02'),
('d8baa461cdd988ecb517a90af81b85234062b1a74225acda3c60e381b97a1e68d4fc65752fd5f489', 17, 1, 'myApp', '[]', 0, '2023-11-12 09:01:52', '2023-11-12 09:01:52', '2023-11-13 00:01:52'),
('de22516f82675a229cc5e11eba0e15e1b4e7fa99af1d96c8c1517d834ec74b2bb9efb14426663ab6', 17, 1, 'myApp', '[]', 0, '2023-11-05 22:15:26', '2023-11-05 22:15:26', '2023-11-06 13:15:26'),
('ebbce5c9c546428c728c2262695033fc6811d75f0c2094194a1b2bf93772faf9fb46238a6b79443e', 17, 1, 'myApp', '[]', 0, '2023-10-25 20:26:13', '2023-10-25 20:26:13', '2024-10-26 04:26:13'),
('ee461ec010ca732a942ff247e937d1dcaa7fe5f77bb9a3817598142fe88a4998fd11acb12ccf7a06', 17, 1, 'myApp', '[]', 0, '2023-10-25 20:21:28', '2023-10-25 20:21:28', '2024-10-26 04:21:28'),
('ee946975b1f7c5d13a87f39db6c20b553c228d75e691534b2025a98e5fbe7d7eed89e83737704fbf', 17, 1, 'myApp', '[]', 0, '2023-10-26 01:10:29', '2023-10-26 01:10:29', '2023-10-26 09:20:29'),
('f0696630b8352cafec034f53d8fe8ec2f28739435031cfabc9cd18eaf77c63e69f7d666568ec67f3', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:49:12', '2023-10-25 23:49:12', '2023-10-26 07:51:12'),
('f277f5fea869628d8f3a275accb051cf214276d7379c6cdede63c715da6294ed27c4025de36f01f6', 17, 1, 'myApp', '[]', 0, '2023-10-25 20:20:07', '2023-10-25 20:20:07', '2024-10-26 04:20:07'),
('f4246e201e22447a1b935547c93943a9c53a6910f928215d0bc642cac28af554aa1b6fca4bf1707a', 17, 1, 'myApp', '[]', 0, '2023-10-25 23:46:25', '2023-10-25 23:46:25', '2023-10-26 08:46:25'),
('f56aa2df20ccda835d4ee0bac2216b05a34569362ff5ecce545d937e6cfa511e0041713ad8f567b2', 17, 1, 'myApp', '[]', 0, '2023-10-26 01:08:52', '2023-10-26 01:08:52', '2023-10-26 09:18:52'),
('f68bc8e66d4c138dc494e05d952fdaeb0565d6e29891c2453d00782a2d065c54dee718e50235ad33', 17, 1, 'myApp', '[]', 0, '2023-10-26 00:49:14', '2023-10-26 00:49:14', '2023-10-26 08:59:14'),
('fe643ec8934e2f12ebc539a99f4c773adcbed70633798231d35f9ced96ca34d45a86c3e5027f0aa4', 17, 1, 'myApp', '[]', 0, '2023-10-26 01:08:25', '2023-10-26 01:08:25', '2023-10-26 09:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'QZUP1tx53QIsob6dVi3mFp3dgBbKN7rLeVYfnNH3', NULL, 'http://localhost', 1, 0, 0, '2023-10-25 19:59:06', '2023-10-25 19:59:06'),
(2, NULL, 'Laravel Password Grant Client', '5xvMy4MorjCxJRb9WAZXl8zjWlAEegwESfRCehHl', 'users', 'http://localhost', 0, 1, 0, '2023-10-25 19:59:06', '2023-10-25 19:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-10-25 19:59:06', '2023-10-25 19:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(22, 24, 26, 2, 60000000, 2, '2023-11-12 09:25:18', '2023-11-12 09:25:41');

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
(17, 22, '0000001', 'Terbayaranya SIltap', '12 Bulan', '5000000', 4, '2023-11-12 09:25:41', '2023-11-12 09:25:41');

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
(2, '2023', 1, '2023-10-22 05:32:24', '2023-11-05 19:36:33'),
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
(17, 22, 'sulaiman07', 'Sulaiman', 'sulaiman@gmail.com', NULL, '$2y$10$GxiVNGVORd69CADBeECHzOZ8fiPdLCJrXhMUHiAfMFOv2NeJ9FRG6', NULL, NULL, NULL, 'admin'),
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_anggaran_kegiatan`
--
ALTER TABLE `detail_anggaran_kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rab_rinci`
--
ALTER TABLE `rab_rinci`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
