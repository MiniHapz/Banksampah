-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 08:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_nasabah`
--

CREATE TABLE `data_nasabah` (
  `nik` int(16) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `dusun` varchar(255) NOT NULL,
  `rt` varchar(255) DEFAULT NULL,
  `rw` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `saldo` decimal(12,2) NOT NULL DEFAULT 0.00,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_nasabah`
--

INSERT INTO `data_nasabah` (`nik`, `nama_lengkap`, `no_telp`, `dusun`, `rt`, `rw`, `jenis_kelamin`, `tanggal_lahir`, `saldo`, `aktif`, `created_at`, `updated_at`) VALUES
(72537373, 'Siti Aminah', '089876543210', 'Mlinjo Wetan', '02', '01', 'Perempuan', '1985-11-25', 75000.00, 1, '2025-04-10 07:49:02', '2025-04-10 07:49:02'),
(128228393, 'Ahmad Sudrajat', '081234567890', 'Mlinjo Kulon', '01', '03', 'Laki-laki', '1990-05-10', 50000.00, 1, '2025-04-10 07:49:02', '2025-04-10 07:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `data_penarikan`
--

CREATE TABLE `data_penarikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nasabah_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_penarikan` decimal(10,2) NOT NULL,
  `tanggal_penarikan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Diproses','Selesai','Ditolak') NOT NULL DEFAULT 'Diproses',
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_sampah`
--

CREATE TABLE `data_sampah` (
  `sampah_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga_per_kg` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_sampah`
--

INSERT INTO `data_sampah` (`sampah_id`, `nama`, `kategori_id`, `satuan`, `harga_per_kg`, `created_at`, `updated_at`) VALUES
(1, 'ss', 1, 'kg', 2000.00, '2025-05-07 21:31:45', '2025-05-07 21:31:45'),
(2, 'Samoah', 4, 'kg', 1000.00, '2025-05-07 21:34:00', '2025-05-07 21:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `detail_setoran`
--

CREATE TABLE `detail_setoran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_transaksi` varchar(255) NOT NULL,
  `sampah_id` bigint(20) UNSIGNED NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `jumlah` decimal(12,2) NOT NULL,
  `sub_total` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_setoran`
--

INSERT INTO `detail_setoran` (`id`, `no_transaksi`, `sampah_id`, `harga`, `jumlah`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 'STR-00001', 1, 2000.00, 3.00, 6000.00, '2025-05-14 06:53:53', '2025-05-14 06:53:53'),
(2, 'STR-00002', 1, 2000.00, 2.00, 4000.00, '2025-05-14 07:21:43', '2025-05-14 07:21:43'),
(3, 'STR-00003', 1, 2000.00, 2.00, 4000.00, '2025-05-14 08:52:20', '2025-05-14 08:52:20'),
(4, 'STR-00004', 2, 1000.00, 3.00, 3000.00, '2025-05-14 10:54:48', '2025-05-14 10:54:48'),
(5, 'STR-00005', 1, 2000.00, 3.00, 6000.00, '2025-05-14 23:32:53', '2025-05-14 23:32:53'),
(6, 'STR-00005', 1, 2000.00, 2.00, 4000.00, '2025-05-14 23:32:53', '2025-05-14 23:32:53'),
(7, 'STR-00006', 1, 2000.00, 3.00, 6000.00, '2025-05-14 23:37:05', '2025-05-14 23:37:05'),
(8, 'STR-00007', 2, 1000.00, 3.00, 3000.00, '2025-05-15 00:28:27', '2025-05-15 00:28:27'),
(9, 'STR-00007', 1, 2000.00, 2.00, 4000.00, '2025-05-15 00:28:27', '2025-05-15 00:28:27'),
(10, 'STR-00008', 1, 2000.00, 2.00, 4000.00, '2025-05-15 00:34:21', '2025-05-15 00:34:21'),
(11, 'STR-00009', 1, 2000.00, 2.00, 4000.00, '2025-05-21 19:40:23', '2025-05-21 19:40:23'),
(12, 'STR-00009', 2, 1000.00, 33.00, 33000.00, '2025-05-21 19:40:23', '2025-05-21 19:40:23'),
(13, 'STR-00010', 1, 2000.00, 2.00, 4000.00, '2025-05-21 19:44:12', '2025-05-21 19:44:12'),
(14, 'STR-00010', 2, 1000.00, 21.00, 21000.00, '2025-05-21 19:44:12', '2025-05-21 19:44:12'),
(15, 'STR-00011', 1, 2000.00, 2.00, 3600.00, '2025-05-21 20:00:52', '2025-05-21 20:00:52'),
(16, 'STR-00011', 2, 1000.00, 14.00, 12600.00, '2025-05-21 20:00:52', '2025-05-21 20:00:52'),
(17, 'STR-00012', 1, 2000.00, 2.00, 3600.00, '2025-05-21 20:39:24', '2025-05-21 20:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `detail_tabungan`
--

CREATE TABLE `detail_tabungan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_tabungan` varchar(255) NOT NULL,
  `no_transaksi` varchar(255) NOT NULL,
  `total_kg` decimal(12,2) NOT NULL,
  `nominal_seluruh` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_tabungan`
--

INSERT INTO `detail_tabungan` (`id`, `no_tabungan`, `no_transaksi`, `total_kg`, `nominal_seluruh`, `created_at`, `updated_at`) VALUES
(1, 'TBG-682489DA294E3', 'STR-00001', 3.00, 6000.00, '2025-05-14 06:53:53', '2025-05-14 06:53:53'),
(2, 'TBG-682489DA294E3', 'STR-00002', 2.00, 4000.00, '2025-05-14 07:21:43', '2025-05-14 07:21:43'),
(3, 'TBG-682489DA294E3', 'STR-00003', 2.00, 4000.00, '2025-05-14 08:52:20', '2025-05-14 08:52:20'),
(4, 'TBG-682489DA294E3', 'STR-00004', 3.00, 3000.00, '2025-05-14 10:54:48', '2025-05-14 10:54:48'),
(5, 'TBG-682489DA294E3', 'STR-00005', 5.00, 10000.00, '2025-05-14 23:32:53', '2025-05-14 23:32:53'),
(6, 'TBG-68258B915F856', 'STR-00006', 3.00, 6000.00, '2025-05-14 23:37:05', '2025-05-14 23:37:05'),
(7, 'TBG-682489DA294E3', 'STR-00007', 5.00, 7000.00, '2025-05-15 00:28:27', '2025-05-15 00:28:27'),
(8, 'TBG-682489DA294E3', 'STR-00008', 2.00, 4000.00, '2025-05-15 00:34:21', '2025-05-15 00:34:21'),
(9, 'TBG-682489DA294E3', 'STR-00009', 35.00, 37000.00, '2025-05-21 19:40:23', '2025-05-21 19:40:23'),
(10, 'TBG-682489DA294E3', 'STR-00010', 23.00, 25000.00, '2025-05-21 19:44:12', '2025-05-21 19:44:12'),
(11, 'TBG-682489DA294E3', 'STR-00011', 16.00, 16200.00, '2025-05-21 20:00:52', '2025-05-21 20:00:52'),
(12, 'TBG-68258B915F856', 'STR-00012', 2.00, 3600.00, '2025-05-21 20:39:24', '2025-05-21 20:39:24');

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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`kategori_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Plastik', NULL, NULL),
(2, 'Kertas', NULL, NULL),
(3, 'Logam', NULL, NULL),
(4, 'Kaca', NULL, NULL),
(5, 'Organik', NULL, NULL),
(6, 'Elektronik', NULL, NULL),
(7, 'Plastik', NULL, NULL),
(8, 'Kertas', NULL, NULL),
(9, 'Logam', NULL, NULL),
(10, 'Kaca', NULL, NULL),
(11, 'Organik', NULL, NULL),
(12, 'Elektronik', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_04_195557_add_role_to_users_table', 1),
(6, '2025_04_10_062709_create_kategoris_table', 1),
(7, '2025_04_10_065203_create_permission_tables', 1),
(8, '2025_04_10_072626_create_data_nasabah_table', 1),
(12, '2025_05_04_072621_create_tabungan_table', 2),
(13, '2025_05_07_030658_create_setoran', 3),
(14, '2025_05_07_034221_create_detail_setoran_table', 4),
(15, '2025_05_07_173037_create_detail_tabungan_table', 5),
(16, '2025_05_08_012247_add_timestamps_to_tabungan_table', 6),
(17, '2025_05_08_024328_add_foreign_key_to_data_sampah_table', 7),
(18, '2025_05_14_133555_drop_total_per_kg_from_setoran', 8);

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

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-04-10 07:43:54', '2025-04-10 07:43:54');

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
-- Table structure for table `setoran`
--

CREATE TABLE `setoran` (
  `no_transaksi` varchar(255) NOT NULL,
  `no_tabungan` varchar(255) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_kasar` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setoran`
--

INSERT INTO `setoran` (`no_transaksi`, `no_tabungan`, `tanggal_transaksi`, `total_kasar`, `created_at`, `updated_at`) VALUES
('STR-00001', 'TBG-682489DA294E3', '2025-05-14', 3.00, '2025-05-14 06:53:53', '2025-05-14 06:53:53'),
('STR-00002', 'TBG-682489DA294E3', '2025-05-14', 2.00, '2025-05-14 07:21:43', '2025-05-14 07:21:43'),
('STR-00003', 'TBG-682489DA294E3', '2025-05-14', 2.00, '2025-05-14 08:52:20', '2025-05-14 08:52:20'),
('STR-00004', 'TBG-682489DA294E3', '2025-05-14', 3.00, '2025-05-14 10:54:48', '2025-05-14 10:54:48'),
('STR-00005', 'TBG-682489DA294E3', '2025-05-15', 10000.00, '2025-05-14 23:32:53', '2025-05-14 23:32:53'),
('STR-00006', 'TBG-68258B915F856', '2025-05-15', 6000.00, '2025-05-14 23:37:05', '2025-05-14 23:37:05'),
('STR-00007', 'TBG-682489DA294E3', '2025-05-09', 7000.00, '2025-05-15 00:28:27', '2025-05-15 00:28:27'),
('STR-00008', 'TBG-682489DA294E3', '2025-05-15', 4000.00, '2025-05-15 00:34:21', '2025-05-15 00:34:21'),
('STR-00009', 'TBG-682489DA294E3', '2025-05-22', 37000.00, '2025-05-21 19:40:23', '2025-05-21 19:40:23'),
('STR-00010', 'TBG-682489DA294E3', '2025-05-22', 25000.00, '2025-05-21 19:44:12', '2025-05-21 19:44:12'),
('STR-00011', 'TBG-682489DA294E3', '2025-05-22', 16200.00, '2025-05-21 20:00:52', '2025-05-21 20:00:52'),
('STR-00012', 'TBG-68258B915F856', '2025-05-22', 3600.00, '2025-05-21 20:39:24', '2025-05-21 20:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `no_tabungan` varchar(255) NOT NULL,
  `nik` int(11) NOT NULL,
  `total_tabungan` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`no_tabungan`, `nik`, `total_tabungan`, `created_at`, `updated_at`) VALUES
('TBG-682489DA294E3', 72537373, 0.00, '2025-05-14 05:17:30', '2025-05-14 05:17:30'),
('TBG-68258B915F856', 128228393, 0.00, '2025-05-14 23:37:05', '2025-05-14 23:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin1', 'admin1@example.com', 'admin', NULL, '$2y$10$nhtmuWp32kqggJf/PWk/AuTbCVBe4G.yczVEDWCuu69dhKuSq2Mza', NULL, '2025-04-10 07:44:21', '2025-04-10 07:44:21'),
(4, 'admin1', 'admin1@gmail.com', 'admin', '2025-05-06 19:22:11', '$2y$10$ybLytJpItPp4bjscmwKHjeo0Xnw6Wd2v9aQ6mdOC.5XnkBhhkNq5u', '1idCqRnO5udTGXeWh2gpDyouXVrPaChyP32MgcKsgP0WT0uNPWosMqaKSjpt', '2025-05-06 19:22:12', '2025-05-06 19:22:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_nasabah`
--
ALTER TABLE `data_nasabah`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `data_penarikan`
--
ALTER TABLE `data_penarikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_sampah`
--
ALTER TABLE `data_sampah`
  ADD PRIMARY KEY (`sampah_id`),
  ADD KEY `data_sampah_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `detail_setoran`
--
ALTER TABLE `detail_setoran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_setoran_no_transaksi_foreign` (`no_transaksi`),
  ADD KEY `detail_setoran_sampah_id_foreign` (`sampah_id`);

--
-- Indexes for table `detail_tabungan`
--
ALTER TABLE `detail_tabungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_tabungan_no_tabungan_foreign` (`no_tabungan`),
  ADD KEY `detail_tabungan_no_transaksi_foreign` (`no_transaksi`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`kategori_id`);

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
-- Indexes for table `setoran`
--
ALTER TABLE `setoran`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `setoran_no_tabungan_foreign` (`no_tabungan`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`no_tabungan`),
  ADD KEY `tabungan_nik_foreign` (`nik`);

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
-- AUTO_INCREMENT for table `data_penarikan`
--
ALTER TABLE `data_penarikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_sampah`
--
ALTER TABLE `data_sampah`
  MODIFY `sampah_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_setoran`
--
ALTER TABLE `detail_setoran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_tabungan`
--
ALTER TABLE `detail_tabungan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `kategori_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_sampah`
--
ALTER TABLE `data_sampah`
  ADD CONSTRAINT `data_sampah_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`kategori_id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_setoran`
--
ALTER TABLE `detail_setoran`
  ADD CONSTRAINT `detail_setoran_no_transaksi_foreign` FOREIGN KEY (`no_transaksi`) REFERENCES `setoran` (`no_transaksi`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_setoran_sampah_id_foreign` FOREIGN KEY (`sampah_id`) REFERENCES `data_sampah` (`sampah_id`);

--
-- Constraints for table `detail_tabungan`
--
ALTER TABLE `detail_tabungan`
  ADD CONSTRAINT `detail_tabungan_no_tabungan_foreign` FOREIGN KEY (`no_tabungan`) REFERENCES `tabungan` (`no_tabungan`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_tabungan_no_transaksi_foreign` FOREIGN KEY (`no_transaksi`) REFERENCES `setoran` (`no_transaksi`) ON DELETE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setoran`
--
ALTER TABLE `setoran`
  ADD CONSTRAINT `setoran_no_tabungan_foreign` FOREIGN KEY (`no_tabungan`) REFERENCES `tabungan` (`no_tabungan`) ON DELETE CASCADE;

--
-- Constraints for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD CONSTRAINT `tabungan_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `data_nasabah` (`nik`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
