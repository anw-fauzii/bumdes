-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 06:20 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumdess`
--

-- --------------------------------------------------------

--
-- Table structure for table `bumdes`
--

CREATE TABLE `bumdes` (
  `id` int(20) UNSIGNED NOT NULL,
  `user_id` int(20) UNSIGNED DEFAULT NULL,
  `rtrw` varchar(191) DEFAULT NULL,
  `dusun` varchar(191) DEFAULT NULL,
  `desa` varchar(191) DEFAULT NULL,
  `kabupaten_id` int(20) UNSIGNED DEFAULT NULL,
  `kecamatan_id` int(20) UNSIGNED DEFAULT NULL,
  `perdes` varchar(191) DEFAULT NULL,
  `tahun` int(20) DEFAULT NULL,
  `ketua` varchar(191) DEFAULT NULL,
  `jenis_usaha` varchar(191) DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  `keterangan` varchar(191) DEFAULT NULL,
  `kontak` bigint(20) DEFAULT NULL,
  `lat` varchar(191) DEFAULT NULL,
  `long` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bumdes`
--

INSERT INTO `bumdes` (`id`, `user_id`, `rtrw`, `dusun`, `desa`, `kabupaten_id`, `kecamatan_id`, `perdes`, `tahun`, `ketua`, `jenis_usaha`, `status`, `keterangan`, `kontak`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(1, 9, '01/02', 'Bebas', 'Terlarang', 4, 5, NULL, NULL, NULL, '[\"Bebas\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 8, '001/002', 'Rancamaya', 'Sukabakti', 1, 1, '01/Perdes/2022', 2012, 'Awenk Guludug', '[\"Perdagangan\",\"Jasa\"]', NULL, NULL, 6289234444321, '-6.744630087440179', '107.90325163652344', '2021-06-21 07:23:54', '2021-06-22 13:53:31'),
(4, 3, '001/001', 'Rancamaya', 'Sukabakti', 1, 3, '21/perdes/A/2012', 2020, 'Awenk Guludug', '[\"Perdagangan\",\"Wisata\"]', 'Aktif', NULL, 89234444321, '-7.2574049899381885', '108.12572478105469', '2021-06-21 07:27:11', '2021-06-22 13:56:14'),
(8, 15, '001/001', 'Korodok', 'Batu', 2, 2, '01/Perdes/2022', 2021, 'Wawan Tungir', '[\"Pemberdayaan\"]', 'Tidak Aktif', NULL, 98234231321, '-6.744630087440179', '108.12572478105469', '2021-06-22 14:16:57', '2021-06-22 14:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `foto1` text COLLATE utf8mb4_unicode_ci,
  `foto2` text COLLATE utf8mb4_unicode_ci,
  `foto3` text COLLATE utf8mb4_unicode_ci,
  `foto4` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `user_id`, `foto1`, `foto2`, `foto3`, `foto4`, `created_at`, `updated_at`) VALUES
(1, 3, 'Foto/IElS3qu8zwxGJs1U3fZtfb8RGF4oMWGV5yYIhlbT.jpg', 'Foto/zDeCYu3xgqwi7E6tSlOWayKafnurVXYeunbrVnBf.jpg', 'Foto/ttRepGCJJZ50uyhY9OuiBeFI86dHbmfY4hQGEwx2.jpg', 'Foto/QdVmi03iJq2MezDyGiJsRhR8KNhJ8OpsPAa0wKAS.png', '2021-06-18 13:02:58', '2021-06-19 00:48:24'),
(2, 8, NULL, NULL, NULL, NULL, '2021-06-19 02:55:39', '2021-06-19 02:55:39'),
(3, 9, NULL, NULL, NULL, NULL, '2021-06-22 14:12:49', '2021-06-22 14:12:49'),
(4, 15, 'Foto/UeszmsyKwBeRvyF95EvtAFvxgSATN98Ig3F82ZHf.jpg', 'Foto/VzLAD4CragtvHK29qamHIhYNQHv09iz9UHe8ILfz.jpg', 'Foto/595LgqGbIJpia1f9fTJcv3wSSd2jC8KmVabbfxQz.jpg', 'Foto/JgWdWNk9du9thmcybz86DaE9JRO8rlW7UkJZ1lCU.jpg', '2021-06-22 14:16:57', '2021-06-22 14:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `nama`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(1, 'Garutto', '-7.2574049899381885', '108.27953337480469', '2021-06-15 03:17:00', '2021-06-15 03:52:14'),
(2, 'Bandung', '-7.2146480157322745', '107.63134001542969', '2021-06-15 03:24:43', '2021-06-15 03:24:43'),
(3, 'Bogor', '-7.2574049899381885', '107.54619597246094', '2021-06-19 02:56:06', '2021-06-19 02:56:06'),
(4, 'Jakartans', '-7.2574049899381885', '108.12572478105469', '2021-06-21 02:07:32', '2021-06-21 02:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten_id` int(10) UNSIGNED NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `kabupaten_id`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(1, 'Tarogong Kidul', 1, '-7.2574049899381885', '107.54619597246094', '2021-06-15 03:59:59', '2021-06-15 03:59:59'),
(2, 'Ujung Berung', 2, '-7.92389012', '107.247112424', NULL, NULL),
(3, 'Samarang', 1, '-7.217982139', '107.987412471', NULL, NULL),
(4, 'Andir', 2, '-7.147214281', '107.37878312', NULL, NULL),
(5, 'Bungbulanga', 1, '-7.39062041304559', '107.95269011308594', '2021-06-15 09:28:08', '2021-06-15 09:28:36'),
(6, 'Cisarua', 3, '-6.744630087440179', '107.54619597246094', '2021-06-19 02:56:38', '2021-06-19 02:56:38'),
(7, 'Tanah Abang', 4, '-7.214490841594822', '107.63134001542969', '2021-06-21 02:08:08', '2021-06-21 02:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_05_27_023105_create_kabupaten_table', 1),
(3, '2021_05_27_023514_create_kecamatan_table', 1),
(4, '2021_05_28_000000_create_users_table', 1),
(5, '2021_05_28_100000_create_password_resets_table', 1),
(6, '2021_05_29_224136_create_sessions_table', 1),
(7, '2021_05_29_230435_create_permission_tables', 1),
(8, '2021_05_30_023620_create_jenis_usaha_table', 1),
(9, '2021_05_30_024836_create_shu_table', 1),
(10, '2021_06_15_085412_create_foto_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-06-15 02:19:11', '2021-06-15 02:19:11'),
(2, 'bumdes', 'web', '2021-06-15 02:19:11', '2021-06-15 02:19:11');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8oHHy1unTm25ksqAJJ5ZwqeU7MgXslg8v8aWAndQ', 15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiT1JsUGg0ZUJDTE5Rb21CUURtRmhEZkNGYklmdWhFdDJETkNiazZ1QyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE1O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkbC9wQ3Y2T29WS25iYUtBd21EWElPLnJpeC9RQWtCbVp2VzFjU1BESVQzWkNxdzNLRjkuVWEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGwvcEN2Nk9vVktuYmFLQXdtRFhJTy5yaXgvUUFrQm1adlcxY1NQRElUM1pDcXczS0Y5LlVhIjt9', 1624373575),
('cX3r9O0IZGsKpa1NJjjA7iZMxOM5yael1axe26p5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVENlY2gzZVFPdmJDbWVqRnJiUVl3Y0szbWpZdEh4STZJN3JhSzk1ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1624420226),
('OOCbwL2wzNkqeWNGdNxwtRyUH8OnKZtrE5bUIqh7', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOVpFd2U2d294RUtzNk9JbDg1ME1TOVZ3aTJKUlVMdVlNeUJTMDlmcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRRc1B0QXBOYjBGcmlMc2t5ZWUvTGhPV3F0cjJ1UFcxVExucHgwTWVGOUhTZzE5ZGpwMkxWRyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkUXNQdEFwTmIwRnJpTHNreWVlL0xoT1dxdHIydVBXMVRMbnB4ME1lRjlIU2cxOWRqcDJMVkciO30=', 1624421888);

-- --------------------------------------------------------

--
-- Table structure for table `shu`
--

CREATE TABLE `shu` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shu`
--

INSERT INTO `shu` (`id`, `user_id`, `nilai`, `status`, `keterangan`, `tanggal`, `created_at`, `updated_at`) VALUES
(9, 3, NULL, 'Tidak Aktif', 'Tidak Ada Alasan', NULL, '2021-06-19 01:29:23', '2021-06-19 01:29:23'),
(10, 3, '800000', 'Aktif', NULL, '2021-06-21 17:00:00', '2021-06-19 02:48:56', '2021-06-19 02:48:56'),
(11, 3, '2000', 'Aktif', NULL, '2021-06-14 17:00:00', '2021-06-22 13:56:14', '2021-06-22 13:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `logo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_seen`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, NULL, '$2y$10$QsPtApNb0FriLskyee/LhOWqtr2uPW1TLnpx0MeF9HSg19djp2LVG', NULL, '2021-06-15 02:19:11', '2021-06-23 04:18:08', '2021-06-23 04:18:08'),
(3, 'Hahaasa', 'haha@gmail.com', 'Logo/kAer39lJglx7faJVUDiGuvpQBTtJE5K0xQ7JxegB.jpg', NULL, '$2y$10$YY9Rjipgnd5XAYwIHXhmauTdaR8F2QpMKyXX71MGCdIgtnX89CbSK', NULL, '2021-06-21 07:27:11', '2021-06-22 14:16:32', '2021-06-22 14:16:32'),
(8, 'Bumdes Garut', 'bumdes@gmail.com', NULL, NULL, '$2y$10$GXlrs1p1y8WFH4rW2CvUueppd8rFWPuhPEXKzUl7zWHH.nxUUP6Ci', NULL, '2021-06-21 02:22:00', '2021-06-22 12:50:10', '2021-06-22 12:50:10'),
(9, 'Anwar Fauzi', 'anwar.fauzy18@gmail.com', NULL, NULL, '$2y$10$KT92ITciHtR.dO5n7sWET.pB9JsNNUPEc61TPRdmFP5UPWY.vi6Ya', 'qAS14X20zmU6pmQmBT1cwaNElYM4uyDczt8YUu8gfTS116iLbfnLL2md8kBe', '2021-06-21 02:42:12', '2021-06-21 07:21:19', '2021-06-21 07:21:19'),
(11, 'Bumdes Mamank', 'mamank@gmail.com', NULL, NULL, '$2y$10$uhBtg2Vstt7HAAFW6mJfZuP82Q8QSM9.Af9aOKdARVDiFydF8kZjC', NULL, '2021-06-22 14:10:17', '2021-06-22 14:15:06', '2021-06-22 14:15:06'),
(13, 'Anwar Fauzi', 'asep@gmail.com', NULL, NULL, '$2y$10$m6igBTmkzP09XszlG6w6QOO45ovnfI4bwYt.8i/yM9xpq0Xfi1H6S', NULL, '2021-06-22 14:11:02', '2021-06-22 14:11:02', NULL),
(14, 'as', 'sadmin@example.com', NULL, NULL, '$2y$10$C/ollNKzN.c1WIWYp6nv4eilt5S6w.iBzR9BoyLcfBedttezdb19i', NULL, '2021-06-22 14:12:48', '2021-06-22 14:12:48', NULL),
(15, 'qwq', 'admin@example.com', 'Logo/Qpsm7BKea0VJWx8lnX5Xetc1itcFMPqqUEiAajam.png', NULL, '$2y$10$l/pCv6OoVKnbaKAwmDXIO.rix/QAkBmZvW1cSPDIT3ZCqw3KF9.Ua', NULL, '2021-06-22 14:16:57', '2021-06-22 14:52:54', '2021-06-22 14:52:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bumdes`
--
ALTER TABLE `bumdes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_kecamatan_id` (`kabupaten_id`),
  ADD KEY `foreign_key_kabupaten_id` (`kecamatan_id`),
  ADD KEY `foreign_key_user_id` (`user_id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_user_id_foreign` (`user_id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_kabupaten_id_foreign` (`kabupaten_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shu`
--
ALTER TABLE `shu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shu_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `bumdes`
--
ALTER TABLE `bumdes`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shu`
--
ALTER TABLE `shu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bumdes`
--
ALTER TABLE `bumdes`
  ADD CONSTRAINT `foreign_key_kabupaten_id` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `foreign_key_kecamatan_id` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `foreign_key_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `shu`
--
ALTER TABLE `shu`
  ADD CONSTRAINT `shu_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
