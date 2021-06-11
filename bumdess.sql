-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 08:30 AM
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
-- Table structure for table `jenis_usaha`
--

CREATE TABLE `jenis_usaha` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_usaha`
--

INSERT INTO `jenis_usaha` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pertanian', '2021-06-03 23:47:38', '2021-06-03 23:47:38'),
(2, 'Makanan', '2021-06-03 23:47:43', '2021-06-03 23:47:43'),
(3, 'Kesehatan', '2021-06-03 23:47:50', '2021-06-03 23:47:50'),
(4, 'beas', '2021-06-07 00:12:19', '2021-06-07 00:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_usaha_profil_bumdes`
--

CREATE TABLE `jenis_usaha_profil_bumdes` (
  `id` int(10) UNSIGNED NOT NULL,
  `profil_bumdes_id` int(10) UNSIGNED NOT NULL,
  `jenis_usaha_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_usaha_profil_bumdes`
--

INSERT INTO `jenis_usaha_profil_bumdes` (`id`, `profil_bumdes_id`, `jenis_usaha_id`, `created_at`, `updated_at`) VALUES
(5, 5, 3, NULL, NULL),
(6, 5, 2, NULL, NULL),
(7, 2, 1, NULL, NULL);

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
(1, 'Garut', '-7.2574049899381885', '108.27953337480469', '2021-06-03 23:43:08', '2021-06-03 23:43:08'),
(2, 'Bandung', '-7.39197198379123', '107.112124124617', NULL, NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `kabupaten_id`, `lat`, `long`, `updated_at`, `created_at`) VALUES
(1, 'Tarogong Kidul', 1, '-6.744630087440179', '107.54619597246094', '2021-06-03 23:44:34', '2021-06-03 23:44:34'),
(2, 'Ujung Berung', 2, '-7.104533769239746', '107.91149138261719', '2021-06-07 01:01:06', '2021-06-07 01:01:06'),
(4, 'Wanaraja', 1, '12123', '123131', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_05_29_224136_create_sessions_table', 1),
(5, '2021_05_29_230435_create_permission_tables', 1),
(6, '2021_05_30_023105_create_kabupaten_table', 1),
(7, '2021_05_30_023514_create_kecamatan_table', 1),
(8, '2021_05_30_023520_create_profil_bumdes_table', 1),
(9, '2021_05_30_023620_create_jenis_usaha_table', 1),
(10, '2021_05_30_024836_create_shu_table', 1),
(11, '2021_06_03_102205_create_bumdes_jenis_table', 1),
(12, '2021_06_03_102206_create_bumdes_jenis_table', 2),
(13, '2021_06_03_102207_create_bumdes_jenis_table', 3);

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
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5);

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
-- Table structure for table `profil_bumdes`
--

CREATE TABLE `profil_bumdes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_id` int(10) UNSIGNED DEFAULT NULL,
  `kabupaten_id` int(10) UNSIGNED DEFAULT NULL,
  `telepon` bigint(20) DEFAULT NULL,
  `foto1` text COLLATE utf8mb4_unicode_ci,
  `foto2` text COLLATE utf8mb4_unicode_ci,
  `foto3` text COLLATE utf8mb4_unicode_ci,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil_bumdes`
--

INSERT INTO `profil_bumdes` (`id`, `nama`, `alamat`, `desa`, `kecamatan_id`, `kabupaten_id`, `telepon`, `foto1`, `foto2`, `foto3`, `logo`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(2, 'Bumdes 2', 'Pakuwon', 'Bebas', 1, 1, 101010, NULL, NULL, NULL, NULL, '-7.21435555', '107.903228121', NULL, NULL),
(5, 'Bumdes 1', 'Bebas', 'Sukabakti', 1, 1, 8989898, NULL, NULL, NULL, NULL, '-7.2146480157322745', '107.90325163652344', '2021-06-04 10:45:19', '2021-06-04 10:45:19'),
(6, 'Bumdes Ujung Berung', 'Ujung Berung', 'Ujung Berung', 2, 2, 89812345645, NULL, NULL, NULL, NULL, '-7.39062041304559', '107.81810759355469', '2021-06-07 01:05:16', '2021-06-07 01:17:36');

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
(1, 'admin', 'web', '2021-06-03 23:41:24', '2021-06-03 23:41:24'),
(2, 'bumdes', 'web', '2021-06-03 23:41:24', '2021-06-03 23:41:24');

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
('7ZHo3qlt5GKeX7jEtOYhCkSmZpbRB2RgxMdZ1WKe', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidzk3cnJMUmFWaEFlampBcmM4cXp3WmFnNlFvdU1jTmYwczZncWU0bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTI2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc2h1P19tZXRob2Q9cG9zdCZfdG9rZW49dzk3cnJMUmFWaEFlampBcmM4cXp3WmFnNlFvdU1jTmYwczZncWU0bSZidWxhbj0wNSZuYW1hS2FiPTEmbmFtYUtlYz0xJnRhaHVuPTIwMjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkU3hHMmxHcDhEMklLY01SdXJLelVydWIxbzEzc1FDNWpmR1gwQXFXa0Y0dWVjdy5QVmx3T0MiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFN4RzJsR3A4RDJJS2NNUnVyS3pVcnViMW8xM3NRQzVqZkdYMEFxV2tGNHVlY3cuUFZsd09DIjt9', 1623392984);

-- --------------------------------------------------------

--
-- Table structure for table `shu`
--

CREATE TABLE `shu` (
  `id` int(10) UNSIGNED NOT NULL,
  `bumdes_id` int(10) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shu`
--

INSERT INTO `shu` (`id`, `bumdes_id`, `nilai`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 5, 500000, '2021-06-06', NULL, NULL),
(6, 6, 100000, '10-06-2021', '2021-06-10 02:55:14', '2021-06-10 02:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_bumdes_id` int(11) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profil_bumdes_id`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 0, NULL, '$2y$10$SxG2lGp8D2IKcMRurKzUrub1o13sQC5jfGX0AqWkF4uecw.PVlwOC', NULL, NULL, NULL, '2021-06-03 23:41:25', '2021-06-03 23:41:25'),
(3, '12121212@aqw', 'admin@gmail.comaa', 0, NULL, '$2y$10$/E4jreSfzL1S9r0S8Ny9RefQYdrH4KtThlGmGCiK.EgIP4z7IvaYi', NULL, NULL, NULL, '2021-06-04 08:38:33', '2021-06-04 08:42:26'),
(4, 'Bumdes', 'bumdes@gmail.com', 5, NULL, '$2y$10$dKIRAcl4DMCD11i2b60xpuoGLPWI6OQHa/QqHfsJcvRw1PMmOIoOK', NULL, NULL, NULL, '2021-06-04 10:45:20', '2021-06-04 11:27:35'),
(5, 'Ujung Berung', 'b.bandung@gmail.com', 6, NULL, '$2y$10$70GayBibkRAXPCndr0ObleBI9FLICknnWMDsdx9MTZwwJwe0cX7DG', NULL, NULL, NULL, '2021-06-07 01:05:16', '2021-06-07 01:05:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_usaha`
--
ALTER TABLE `jenis_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_usaha_profil_bumdes`
--
ALTER TABLE `jenis_usaha_profil_bumdes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_usaha_profil_bumdes_jenis_id_foreign` (`jenis_usaha_id`),
  ADD KEY `jenis_usaha_profil_bumdes_bumdes_id_foreign` (`profil_bumdes_id`);

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
-- Indexes for table `profil_bumdes`
--
ALTER TABLE `profil_bumdes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profil_bumdes_kabupaten_id_foreign` (`kabupaten_id`),
  ADD KEY `profil_bumdes_kecamatan_id_foreign` (`kecamatan_id`);

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
  ADD KEY `shu_bumdes_id_foreign` (`bumdes_id`);

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
-- AUTO_INCREMENT for table `jenis_usaha`
--
ALTER TABLE `jenis_usaha`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_usaha_profil_bumdes`
--
ALTER TABLE `jenis_usaha_profil_bumdes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- AUTO_INCREMENT for table `profil_bumdes`
--
ALTER TABLE `profil_bumdes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shu`
--
ALTER TABLE `shu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jenis_usaha_profil_bumdes`
--
ALTER TABLE `jenis_usaha_profil_bumdes`
  ADD CONSTRAINT `jenis_usaha_profil_bumdes_bumdes_id_foreign` FOREIGN KEY (`profil_bumdes_id`) REFERENCES `profil_bumdes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jenis_usaha_profil_bumdes_jenis_id_foreign` FOREIGN KEY (`jenis_usaha_id`) REFERENCES `jenis_usaha` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `profil_bumdes`
--
ALTER TABLE `profil_bumdes`
  ADD CONSTRAINT `profil_bumdes_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `profil_bumdes_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `shu_bumdes_id_foreign` FOREIGN KEY (`bumdes_id`) REFERENCES `profil_bumdes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
