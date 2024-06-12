-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 04:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_mulai_cuti` date NOT NULL,
  `tgl_selesai_cuti` date NOT NULL,
  `deskripsi_cuti` varchar(255) DEFAULT NULL,
  `status_pengajuan_cuti` enum('Disetujui','Ditolak','Menunggu') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `karyawan_id`, `tgl_mulai_cuti`, `tgl_selesai_cuti`, `deskripsi_cuti`, `status_pengajuan_cuti`, `created_at`, `updated_at`) VALUES
(1, 5, '2023-06-14', '2023-06-20', 'Nonton coldplay', 'Disetujui', NULL, '2023-06-25 03:37:57'),
(2, 6, '2023-06-08', '2023-06-16', 'Mau liburan', 'Disetujui', NULL, '2023-06-25 03:09:03'),
(3, 5, '2023-06-13', '2023-06-26', 'sakit', 'Menunggu', '2023-06-25 02:40:06', '2023-06-25 02:40:06'),
(5, 1, '2023-06-26', '2023-06-30', 'Pusing', 'Menunggu', '2023-06-25 12:58:09', '2023-06-25 12:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departement_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `departement_name`, `created_at`, `updated_at`) VALUES
(1, 'House Keeping', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(2, 'Front Office', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(3, 'F&B Service', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(4, 'F&B Production', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(5, 'Production', '2023-06-24 23:01:17', '2023-06-24 23:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan_name`, `created_at`, `updated_at`) VALUES
(1, 'Chief', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(2, 'Manager', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(3, 'Supervisor', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(4, 'Head', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(5, 'Helper', '2023-06-02 08:22:10', '2023-06-24 22:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `email_karyawan` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kota_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text DEFAULT NULL,
  `kota_asal` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha','Konghucu') NOT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status_karyawan` enum('Tetap','Kontrak','Magang') NOT NULL,
  `tgl_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_karyawan`, `email_karyawan`, `nik`, `jabatan_id`, `departement_id`, `users_id`, `kota_lahir`, `tgl_lahir`, `alamat`, `kota_asal`, `jenis_kelamin`, `agama`, `telepon`, `photo`, `status_karyawan`, `tgl_masuk`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '337204', 1, 2, 1, 'Surakarta', '2002-02-28', 'Jl Bima No 88', 'Surakarta', 'Laki-laki', 'Islam', '0822321731', 'images/photo_admin.jpg', 'Tetap', '2023-06-02', '2023-06-02 08:22:10', '2023-06-22 11:02:15'),
(2, 'direktur', 'direktur@gmail.com', '337203', 2, 3, 2, 'Surakarta', '2023-06-02', 'Jl Arjuna No 88', 'Surakarta', 'Laki-laki', 'Islam', '08123456789', 'images/photo_direktur.jpeg', 'Tetap', '2023-06-02', '2023-06-02 08:22:10', '2023-06-25 13:12:43'),
(3, 'hrd', 'hrd@gmail.com', '337202', 1, 3, 3, 'Surakarta', '2023-06-02', 'Jl Sadewa No 88', 'Surakarta', 'Perempuan', 'Katolik', '08123226789', NULL, 'Magang', '2023-06-02', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(4, 'karyawan', 'karyawan@gmail.com', '337201', 1, 4, 4, 'Surakarta', '2023-06-02', 'Jl Wekudara No 88', 'Surakarta', 'Laki-laki', 'Budha', '08123426789', NULL, 'Magang', '2023-06-02', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(5, 'Yusuf Fahrul', 'fahrul@gmail.com', '31893918928129', 3, 4, 5, 'Boyolali', '2001-12-04', 'Kalioso', 'Boyolali', 'Laki-laki', 'Kristen', '9283923828', 'images/photo_pitecan1.jpeg', 'Tetap', '2020-12-27', '2023-06-02 19:31:58', '2023-06-25 13:35:54'),
(6, 'Wulan Nur Layli', 'wulan@gmail.com', '33720129129238983', 1, 4, 6, 'Jakarta', '2002-02-28', 'Klaten', 'Klaten', 'Laki-laki', 'Katolik', '1821928', 'images/photo_Wulan Nur Layli.jpeg', 'Magang', '2023-06-21', '2023-06-21 03:03:59', '2023-06-26 19:21:03'),
(7, 'Bagas Herlambang', 'bagas@gmail.com', '337212192', 2, 1, 7, 'Wonogiri', '2002-06-11', 'Wonogiri', 'WOnogiri', 'Laki-laki', 'Islam', '01921092', 'images/photo_Bagas Herlambang.jpeg', 'Tetap', '2023-06-20', '2023-06-26 19:14:41', '2023-06-26 19:22:54'),
(8, 'Abiyyu Setrayana', 'abisetra@gmail.com', '337201281928198291', 1, 4, 8, 'Surakarta', '2002-02-28', 'Surakarta', 'Surakarta', 'Laki-laki', 'Islam', '085878527986', 'images/photo_Abiyyu Setrayana.png', 'Tetap', '2023-06-14', '2023-06-26 19:16:56', '2023-06-26 19:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_keluarga` varchar(255) NOT NULL,
  `pekerjaan_keluarga` varchar(255) NOT NULL,
  `no_telp_keluarga` varchar(255) NOT NULL,
  `alamat_keluarga` varchar(255) NOT NULL,
  `hubungan_keluarga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id`, `karyawan_id`, `nama_keluarga`, `pekerjaan_keluarga`, `no_telp_keluarga`, `alamat_keluarga`, `hubungan_keluarga`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dominic Toretto', 'Pembalap Karung', '081922', 'Los Angeles', 'Paman', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_24_121234_create_permission_tables', 1),
(6, '2023_05_24_144056_create_users_table', 1),
(7, '2023_05_25_061619_create_departement_table', 1),
(8, '2023_05_25_061719_create_jabatan_table', 1),
(9, '2023_05_25_061729_create_karyawan_table', 1),
(10, '2023_06_02_142945_create_teguran_table', 1),
(11, '2023_06_02_150225_create_cuti_table', 1),
(12, '2023_06_05_001435_create_keluarga_table', 2),
(13, '2023_06_05_001442_create_riwayat_pendidikan_table', 2),
(14, '2023_06_05_001448_create_riwayat_pekerjaan_table', 2),
(15, '2023_06_20_160500_create_websettings_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `tahun_resign` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pekerjaan`
--

INSERT INTO `riwayat_pekerjaan` (`id`, `karyawan_id`, `nama_perusahaan`, `departement`, `jabatan`, `tahun_resign`, `created_at`, `updated_at`) VALUES
(1, 1, 'PT Telkom', 'Teknisi', 'Supervisor', '2020', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`id`, `karyawan_id`, `tingkat`, `jurusan`, `nama_sekolah`, `tahun_lulus`, `created_at`, `updated_at`) VALUES
(1, 1, 'SMK', 'TKJ', 'SMK Negeri 2 Surakarta', '2002', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', 'Administrator', '2023-06-02 08:22:10', '2023-06-21 23:56:31'),
(2, 'direktur', 'web', 'Direktur', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(3, 'hrd', 'web', 'HRD', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(4, 'karyawan', 'web', 'Karyawan', '2023-06-02 08:22:10', '2023-06-02 08:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teguran`
--

CREATE TABLE `teguran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `perihal_teguran` varchar(255) NOT NULL,
  `tgl_teguran` date NOT NULL,
  `deskripsi_teguran` varchar(255) NOT NULL,
  `tgl_selesai_teguran` date DEFAULT NULL,
  `status_teguran` enum('Diproses','Ditutup') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teguran`
--

INSERT INTO `teguran` (`id`, `karyawan_id`, `perihal_teguran`, `tgl_teguran`, `deskripsi_teguran`, `tgl_selesai_teguran`, `status_teguran`, `created_at`, `updated_at`) VALUES
(1, 6, 'Teguran', '2023-06-01', 'Kabur njir', '2023-06-08', 'Diproses', NULL, NULL),
(2, 5, 'Teguran', '2023-06-01', 'Nguawor', '2023-06-25', 'Ditutup', NULL, '2023-06-25 05:17:40'),
(3, 2, 'Safety', '2023-06-25', 'Tidak menggunakan sepatu safety', NULL, 'Diproses', '2023-06-25 04:26:39', '2023-06-25 04:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', NULL, '$2y$10$UldwHCwlQM5nZA7UUXIQR.T6Sv2xeXbN7f5ZdA9CXFIKbQGGppY5q', '4yYVjz5dE1tyIlKN7i6fUcpqWmibF5yp5EmBgYmZAHMur6VWyg157B1MX0qu', '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(2, 2, 'direktur', 'direktur@gmail.com', NULL, '$2y$10$tZfvFQonPkBbnbHZkCtfyempMoPm3SXmylv9LVPonnEp/enGHUkhK', NULL, '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(3, 3, 'hrd', 'hrd@gmail.com', NULL, '$2y$10$gLTPB6ixqzLd71vrzowf9.MIw5e3J7xjbwg8EJtgJlmD5xESP98SG', NULL, '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(4, 4, 'karyawan', 'karyawan@gmail.com', NULL, '$2y$10$MHxJRl4DJVELG1EDhGu1.OAPvIPSZ1igPWzVWF5vp3wA.czW6UKaW', NULL, '2023-06-02 08:22:10', '2023-06-02 08:22:10'),
(5, 4, 'yusuf', 'yusuf@gmail.com', NULL, '$2y$10$JJjH8gaNqzQU.A/665Wxz.wqRIYt1hptd/LJzXdHRPKMxAzbC8tSS', NULL, '2023-06-02 19:31:58', '2023-06-02 19:31:58'),
(6, 4, 'wulan', 'wulan@gmail.com', NULL, '$2y$10$iqBHU0A5XhgdBMtEpm7vIeIPwz.mwZwwcxFwL3A0nlwdgwOoM5UqW', NULL, '2023-06-21 03:03:59', '2023-06-21 03:03:59'),
(7, 4, 'Bagas Herlambang', 'bagas@gmail.com', NULL, '$2y$10$3SaPYtelXYr1ZAPjg7zqa.zJ7kGHHb5wzUYCX8mgNi/ECZV4tZRHK', NULL, '2023-06-26 19:14:41', '2023-06-26 19:14:41'),
(8, 1, 'Abiyyu Setrayana', 'abisetra@gmail.com', NULL, '$2y$10$9dOtb9XhpYr0bjYHyuOSqeNYfPkiLGvXY4ozEWDPP..wShp54hqjy', NULL, '2023-06-26 19:16:56', '2023-06-26 19:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `websettings`
--

CREATE TABLE `websettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_web` varchar(255) NOT NULL,
  `subnama_web` varchar(255) NOT NULL,
  `logo_web` varchar(255) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `alamat_instansi` varchar(255) NOT NULL,
  `telp_instansi` varchar(255) NOT NULL,
  `web_instansi` varchar(255) NOT NULL,
  `email_instansi` varchar(255) NOT NULL,
  `hr_instansi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websettings`
--

INSERT INTO `websettings` (`id`, `nama_web`, `subnama_web`, `logo_web`, `nama_instansi`, `alamat_instansi`, `telp_instansi`, `web_instansi`, `email_instansi`, `hr_instansi`, `created_at`, `updated_at`) VALUES
(1, 'SIMANIS', 'Sistem Manajemen Karyawan', 'images/logo_web.png', 'PT. Mekar Jaya Abadi', 'Jl Punokawan88, Laweyan, Surakarta 57701', '021 722 6969', 'www.mekarjayaselalu.com', 'mekarjayaabadi@gmail.com', 'Abiyyu Setrayana', '2023-06-22 17:12:11', '2023-06-26 19:03:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuti_karyawan_id_foreign` (`karyawan_id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawan_email_karyawan_unique` (`email_karyawan`),
  ADD UNIQUE KEY `karyawan_nik_unique` (`nik`),
  ADD KEY `karyawan_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `karyawan_departement_id_foreign` (`departement_id`),
  ADD KEY `karyawan_users_id_foreign` (`users_id`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keluarga_karyawan_id_foreign` (`karyawan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `teguran`
--
ALTER TABLE `teguran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teguran_karyawan_id_foreign` (`karyawan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `websettings`
--
ALTER TABLE `websettings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teguran`
--
ALTER TABLE `teguran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `websettings`
--
ALTER TABLE `websettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD CONSTRAINT `riwayat_pekerjaan_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD CONSTRAINT `riwayat_pendidikan_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teguran`
--
ALTER TABLE `teguran`
  ADD CONSTRAINT `teguran_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
