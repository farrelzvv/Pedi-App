-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2025 at 11:45 PM
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
-- Database: `pedi-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempt_answers`
--

CREATE TABLE `attempt_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kuis_attempt_id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan_id` bigint(20) UNSIGNED NOT NULL,
  `pilihan_jawaban_id` bigint(20) UNSIGNED NOT NULL,
  `is_benar` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attempt_answers`
--

INSERT INTO `attempt_answers` (`id`, `kuis_attempt_id`, `pertanyaan_id`, `pilihan_jawaban_id`, `is_benar`, `created_at`, `updated_at`) VALUES
(16, 11, 13, 49, 1, '2025-06-05 11:19:29', '2025-06-05 11:19:29'),
(17, 12, 13, 49, 1, '2025-06-05 13:25:16', '2025-06-05 13:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id`, `user_id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(6, 2, 'Pehaman Etika Digital Cuy', 'Ini kuis pertama kita ya!', '2025-06-05 10:03:07', '2025-06-05 10:24:25'),
(7, 2, 'Pemograman Frontend', 'Pemograman Frontend adalah ilmu merancang code untuk bagian antarmuka', '2025-06-05 10:32:38', '2025-06-05 10:32:38'),
(8, 2, 'Seni Budaya', 'Yaudah', '2025-06-05 10:33:21', '2025-06-05 10:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `kuis_attempts`
--

CREATE TABLE `kuis_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kuis_id` bigint(20) UNSIGNED NOT NULL,
  `skor` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuis_attempts`
--

INSERT INTO `kuis_attempts` (`id`, `user_id`, `kuis_id`, `skor`, `created_at`, `updated_at`) VALUES
(11, 1, 8, 100, '2025-06-05 11:19:29', '2025-06-05 11:19:29'),
(12, 1, 8, 100, '2025-06-05 13:25:16', '2025-06-05 13:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `materis`
--

CREATE TABLE `materis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi_singkat` text DEFAULT NULL,
  `konten` longtext DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `tipe_materi` varchar(50) DEFAULT 'teks',
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materis`
--

INSERT INTO `materis` (`id`, `user_id`, `judul`, `deskripsi_singkat`, `konten`, `file_path`, `tipe_materi`, `is_published`, `created_at`, `updated_at`) VALUES
(5, 2, 'Pemahaman Etika Digital', 'Pertemuan 1 tentang pemahaman etika digital ya kids', NULL, 'materi_files/uzDKnN7MF3AoW4o0DSGNLLiggI5paVGQevUO4U9H.pdf', 'file', 1, '2025-06-03 01:55:22', '2025-06-03 01:55:58'),
(6, 2, 'Pemograman Frontend', 'Hi Anak Anak, ini untuk pemograman Frontend ya', 'Frontend adalah bagian penting dalam pengembangan aplikasi web yang fokus pada tampilan dan interaksi dengan pengguna. Ini mencakup elemen-elemen seperti tata letak, tampilan, dan interaksi yang langsung berhubungan dengan pengalaman pengguna. Dalam artikel ini, kita akan menjelajahi pengertian dasar tentang frontend, berbagai jenis komponen yang terlibat seperti HTML, CSS, dan JavaScript, serta teknik-teknik yang dapat digunakan untuk menciptakan antarmuka pengguna yang menarik dan responsif. Namun, kita juga akan membahas tantangan yang mungkin dihadapi dalam pengembangan frontend, seperti kompatibilitas lintas browser, pengelolaan tata letak yang kompleks, dan perubahan kebutuhan pengguna. Dengan memahami hal-hal ini, kita dapat mengoptimalkan pengembangan frontend untuk memberikan pengalaman pengguna yang lebih baik dan memenuhi kebutuhan yang terus berkembang.', NULL, 'teks', 1, '2025-06-04 07:35:31', '2025-06-04 07:37:01');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_02_173709_add_role_to_users_table', 2),
(5, '2025_06_02_181517_create_kuis_table', 3),
(6, '2025_06_02_181535_create_pertanyaans_table', 3),
(7, '2025_06_02_181545_create_pilihan_jawabans_table', 3),
(8, '2025_06_02_182858_create_personal_access_tokens_table', 4),
(9, '2025_06_02_200655_create_kuis_attempts_table', 5),
(10, '2025_06_02_200716_create_attempt_answers_table', 5),
(11, '2025_06_03_040921_create_materis_table', 6),
(12, '2025_06_04_080619_create_refleksi_posts_table', 7);

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
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kuis_id` bigint(20) UNSIGNED NOT NULL,
  `teks_pertanyaan` text NOT NULL,
  `tipe_pertanyaan` varchar(255) NOT NULL DEFAULT 'pilihan_ganda',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `kuis_id`, `teks_pertanyaan`, `tipe_pertanyaan`, `created_at`, `updated_at`) VALUES
(12, 6, 'Contoh', 'pilihan_ganda', '2025-06-05 10:08:56', '2025-06-05 10:08:56'),
(13, 8, 'Manakah yang benar di bawah ini?', 'pilihan_ganda', '2025-06-05 10:47:28', '2025-06-05 10:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_jawaban`
--

CREATE TABLE `pilihan_jawaban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan_id` bigint(20) UNSIGNED NOT NULL,
  `teks_pilihan` text NOT NULL,
  `is_benar` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pilihan_jawaban`
--

INSERT INTO `pilihan_jawaban` (`id`, `pertanyaan_id`, `teks_pilihan`, `is_benar`, `created_at`, `updated_at`) VALUES
(45, 12, 'Benar', 1, '2025-06-05 10:08:56', '2025-06-05 10:08:56'),
(46, 12, 'Salah', 0, '2025-06-05 10:08:56', '2025-06-05 10:08:56'),
(47, 12, 'Salah', 0, '2025-06-05 10:08:56', '2025-06-05 10:08:56'),
(48, 12, 'Salah', 0, '2025-06-05 10:08:56', '2025-06-05 10:08:56'),
(49, 13, 'Benar', 1, '2025-06-05 10:47:28', '2025-06-05 10:47:28'),
(50, 13, 'Salah', 0, '2025-06-05 10:47:28', '2025-06-05 10:47:28'),
(51, 13, 'Salah', 0, '2025-06-05 10:47:28', '2025-06-05 10:47:28'),
(52, 13, 'Salah', 0, '2025-06-05 10:47:28', '2025-06-05 10:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `refleksi_posts`
--

CREATE TABLE `refleksi_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `konten_teks` text DEFAULT NULL,
  `gambar_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refleksi_posts`
--

INSERT INTO `refleksi_posts` (`id`, `user_id`, `parent_id`, `konten_teks`, `gambar_path`, `created_at`, `updated_at`) VALUES
(7, 2, NULL, 'Hai nak, bagaimana kabarnya?', NULL, '2025-06-04 02:22:48', '2025-06-04 02:22:48'),
(8, 1, NULL, 'dalem bu, baik bu', NULL, '2025-06-04 02:23:06', '2025-06-04 02:23:06'),
(10, 1, NULL, 'Bu, agus lapar bu:9', NULL, '2025-06-04 02:24:27', '2025-06-04 02:24:27'),
(11, 2, NULL, 'Iya nak, ibu lapar juga', NULL, '2025-06-04 02:24:46', '2025-06-04 02:24:46'),
(12, 2, NULL, 'Halo nak', NULL, '2025-06-04 07:13:26', '2025-06-04 07:13:26'),
(13, 2, NULL, 'Halo nak', NULL, '2025-06-05 10:58:03', '2025-06-05 10:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('SlU4Glp4yWcgHAU30srUssSLu20tMeyqZI4acDQu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiemNudnlWblJBd2ZCRlI1ektRZWlBdEdzeGVyMHBDN2U5RmtjU2NaUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1749159626),
('tviKvZjNUTepSTNuvT45jTgoKzmcIgm0cmDjKOjd', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiczJTNDNIOUdEZWdHSDZPUk1Jb1dqUnNZQWdlYk9DWTZ4ZWxmNkw4QiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tdXJpZC9tYXRlcmkiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1749155808);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: Guru, 1: Murid',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Farel', 'fzulviano@gmail.com', NULL, '$2y$12$meZYBMEp1kbvdOjuVA1XC.Al67dWSP37AHrbm8XE0gbCo9ZJUD6AK', 1, NULL, '2025-06-02 10:50:58', '2025-06-02 10:50:58'),
(2, 'guru', 'guru@gmail.com', NULL, '$2y$12$F/bXcP0QUEHDGksAxXpf/u5HtTWMKb1yn2CFXynB.C4AcCPZ9NDUC', 0, NULL, '2025-06-02 10:56:36', '2025-06-02 10:56:36'),
(3, 'nabila', 'nabila@gmail.com', NULL, '$2y$12$FD33fk2qGLYM4xW/IkUbgeitvHjYIVewGXBjU2xHZ9SMM9r8H8lJe', 1, NULL, '2025-06-03 01:32:32', '2025-06-03 01:32:32'),
(4, 'Muhammad Farrel Zulviano', 'farrelganteng@gmail.com', NULL, '$2y$12$MyhGxGvzJrH5OJaWOOZ.8eqLdtFrD3E3SEWpMPkQQJSOHdpMX7X8m', 1, NULL, '2025-06-03 01:43:27', '2025-06-03 01:43:27'),
(5, 'daffa', 'daffa@gmail.com', NULL, '$2y$12$mCqoIVYxoQrZXHmRXWIVqeJkWFpae8S4zsMOzcLhC61IaKPq.Xgp6', 1, NULL, '2025-06-03 01:46:07', '2025-06-03 01:46:07'),
(6, 'kak nabila', 'kaknabila@gmail.com', NULL, '$2y$12$HnStcpejhZIp/SR4SXViOO87cQTGmG5m2MpSXiK3mrS9gmA.MIyAy', 1, NULL, '2025-06-03 01:50:42', '2025-06-03 01:50:42'),
(7, 'kak nabila unj', 'nabilaunj@gmail.com', NULL, '$2y$12$KQrXVm5jBzI9SGA8GMeWVeUh4QQYe2eTBG0cxsZijJDHWivLrfL3m', 1, NULL, '2025-06-03 01:53:22', '2025-06-03 01:53:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempt_answers`
--
ALTER TABLE `attempt_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attempt_answers_kuis_attempt_id_foreign` (`kuis_attempt_id`),
  ADD KEY `attempt_answers_pertanyaan_id_foreign` (`pertanyaan_id`),
  ADD KEY `attempt_answers_pilihan_jawaban_id_foreign` (`pilihan_jawaban_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuis_user_id_foreign` (`user_id`);

--
-- Indexes for table `kuis_attempts`
--
ALTER TABLE `kuis_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuis_attempts_user_id_foreign` (`user_id`),
  ADD KEY `kuis_attempts_kuis_id_foreign` (`kuis_id`);

--
-- Indexes for table `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materis_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaan_kuis_id_foreign` (`kuis_id`);

--
-- Indexes for table `pilihan_jawaban`
--
ALTER TABLE `pilihan_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pilihan_jawaban_pertanyaan_id_foreign` (`pertanyaan_id`);

--
-- Indexes for table `refleksi_posts`
--
ALTER TABLE `refleksi_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refleksi_posts_user_id_foreign` (`user_id`),
  ADD KEY `refleksi_posts_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `attempt_answers`
--
ALTER TABLE `attempt_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kuis_attempts`
--
ALTER TABLE `kuis_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `materis`
--
ALTER TABLE `materis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pilihan_jawaban`
--
ALTER TABLE `pilihan_jawaban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `refleksi_posts`
--
ALTER TABLE `refleksi_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attempt_answers`
--
ALTER TABLE `attempt_answers`
  ADD CONSTRAINT `attempt_answers_kuis_attempt_id_foreign` FOREIGN KEY (`kuis_attempt_id`) REFERENCES `kuis_attempts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attempt_answers_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attempt_answers_pilihan_jawaban_id_foreign` FOREIGN KEY (`pilihan_jawaban_id`) REFERENCES `pilihan_jawaban` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kuis`
--
ALTER TABLE `kuis`
  ADD CONSTRAINT `kuis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kuis_attempts`
--
ALTER TABLE `kuis_attempts`
  ADD CONSTRAINT `kuis_attempts_kuis_id_foreign` FOREIGN KEY (`kuis_id`) REFERENCES `kuis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kuis_attempts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materis`
--
ALTER TABLE `materis`
  ADD CONSTRAINT `materis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_kuis_id_foreign` FOREIGN KEY (`kuis_id`) REFERENCES `kuis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pilihan_jawaban`
--
ALTER TABLE `pilihan_jawaban`
  ADD CONSTRAINT `pilihan_jawaban_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refleksi_posts`
--
ALTER TABLE `refleksi_posts`
  ADD CONSTRAINT `refleksi_posts_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `refleksi_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `refleksi_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
