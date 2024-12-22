-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 08:04 PM
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
-- Database: `ftaau`
--

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
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `location`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Huels, Hyatt and Leuschke', '75855 Yasmin Hills\nNew Domingoberg, SC 13719-1049', 'rae34@example.net', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(2, 'Purdy-Grantt', '16387 Breanne FallHoweshire, NY 82838', 'adrien.thompson@example.com', '2024-12-20 13:28:26', '2024-12-21 10:47:00'),
(3, 'Mayert Inc', '95643 Idell Orchard\nAlishashire, MO 23181-4250', 'nlakin@example.com', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(4, 'Rohan, Zemlak and Cole', '10068 Maximus Key\nPort Sanford, NJ 43143', 'fwill@example.net', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(5, 'Medhurst, Gutkowski and Lehner', '377 Coralie Terrace Suite 089\nLake Theresiastad, TX 31546-4253', 'boehm.amy@example.net', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(6, 'Bednar-Ratke', '986 Johann Mews\nWolffbury, CA 83957', 'adooley@example.net', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(7, 'Marks-Runolfsson', '54235 Bosco Forest Suite 485\nLake Leanneland, SD 92436', 'bergstrom.ian@example.com', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(8, 'Rice-Tremblay', '84458 Ilene Locks\nGardnershire, OK 31682', 'gordon48@example.org', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(9, 'Nader, Baumbach and Stanton', '5773 Renner Crescent\nBodechester, MN 28092', 'brain.klein@example.net', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(10, 'Witting, Renner and Padberg', '4853 Streich Mission Apt. 439\nNorth Virginieland, NJ 83563', 'kkuvalis@example.net', '2024-12-20 13:28:26', '2024-12-20 13:28:26');

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
(1, '0001_01_01_000000_create_company_table', 1),
(2, '0001_01_01_000000_create_roles_table', 1),
(3, '0001_01_01_000000_create_users_table', 1),
(4, '0001_01_01_000001_create_cache_table', 1),
(5, '0001_01_01_000002_create_jobs_table', 1),
(6, '2024_12_20_144559_create_trainings_table', 1);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(2, 'admin', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(3, 'student', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(4, 'trainer', '2024-12-20 13:28:26', '2024-12-20 13:28:26');

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
('Pf1F78gXAHwFUtvW35v8XQAwjlrYrcH3kWmlFCMI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzNidGVyaDcxc3lxc3JkUzFqdWZMMGRrN2g1Sllnb3RUMU1xNlVTTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1734808493),
('U6HknS1x7Dn6QSW1VVK7nLTBofX1RrVNI2XGUDvj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZTR6UWxQOWMyZkg0bVdpVVBWc2x6SkRiUTNrdnZZZVRmSHlXT1RCMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzM0NzkyNzM0O319', 1734794571);

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `student_id`, `trainer_id`, `admin_id`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 13, 29, 10, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(2, 3, 17, 29, 2, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(3, 4, 16, 26, 4, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(4, 5, 13, 27, 10, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(5, 6, 14, 28, 9, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(6, 7, 17, 29, 2, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(7, 8, 17, 27, 2, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(8, 9, 17, 22, 2, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(9, 10, 19, 26, 3, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(10, 11, 14, 24, 9, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(11, 6, 17, 24, 2, 1, '2024-12-20 13:31:08', '2024-12-20 13:31:08'),
(12, 8, 18, 23, 3, 0, '2024-12-20 13:31:38', '2024-12-20 13:31:38'),
(13, 2, 12, 23, 2, 0, '2024-12-20 13:48:40', '2024-12-20 13:48:40'),
(14, 3, 18, 23, 3, 0, '2024-12-20 13:51:50', '2024-12-20 13:51:50'),
(15, 2, 18, 23, 3, 0, '2024-12-20 13:59:26', '2024-12-20 13:59:26'),
(16, 3, 18, 25, 3, 1, '2024-12-20 14:03:19', '2024-12-20 14:03:19'),
(17, 5, 45, 25, 7, 1, '2024-12-21 10:17:50', '2024-12-21 10:17:50');

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
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `company_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '2024-12-20 13:28:27', '$2y$12$X9bWvKHrC4pm0AB7TF1dXei5tB9P/F.aaaeqeYmTxfEiDouNRU5Ga', 1, NULL, 1, 'KoKSQQlOkpkp8RsmcOIqYfcKYIsaocaZWy6qSQ3ZAchCcaFTDwIurBCMQmpH', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(2, 'Marianna Barrows', 'qhomenick@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 1, 'Scg7a1gmWt', '2024-12-20 13:28:27', '2024-12-21 06:57:12'),
(3, 'Estelle Braun', 'denesik.gregory@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 1, 'mEv9Qdsb13', '2024-12-20 13:28:27', '2024-12-21 11:33:52'),
(4, 'Levi Langworth', 'marjolaine60@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 1, 'ZkWtgf6TQj', '2024-12-20 13:28:27', '2024-12-21 11:33:54'),
(5, 'Alek Abernathy', 'meredith.lynch@example.net', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 1, 'plGeOWXW6k', '2024-12-20 13:28:27', '2024-12-21 11:35:50'),
(6, 'Nicholas Crist DDS', 'rey85@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 0, 'VlLhdZxuL2', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(7, 'Leonardo Lynch', 'chase22@example.net', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 0, 'GTyJCYbRql', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(8, 'Lera Schmitt', 'odickens@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 0, 'ZzWtAdnR1L', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(9, 'Clotilde Maggio', 'ambrose.hansen@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 0, 'DucfTzoXuQ', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(10, 'Freeda Glover', 'johnnie58@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 0, '6BfByuSPfn', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(11, 'Richie Little', 'haley.santa@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 0, 'w7GS4bd9IX', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(12, 'Nona Cassin', 'patrick.runte@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 4, 2, 0, 'SUfDJ2rbJB', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(13, 'Edyth Mraz PhD', 'junius.gusikowski@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 4, 10, 0, 'x53F5jJmN4', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(14, 'Cielo Kuvalis', 'kling.lucius@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 4, 9, 0, 'tqfFXr9j0b', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(15, 'Jaleel Green', 'bud58@example.net', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 4, 5, 0, 'SxQZw2WpJD', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(16, 'Ms. Alice Emard', 'ronaldo.rutherford@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 4, 4, 0, 'YlHt79e1wu', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(17, 'Mr. Emmanuel Stokes V', 'ilittel@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 4, 2, 0, 'LFezdDjcDE', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(18, 'Monserrate Blick V', 'boyle.oda@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 4, 3, 0, '530NbKIkP6', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(19, 'Kailee Streich DDS', 'elvera40@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 4, 3, 0, 'pQlQ0G2VLz', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(20, 'Shaun Mayer', 'fspinka@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 4, 6, 0, 'Li57qobbUR', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(21, 'Delbert Kunde', 'xconnelly@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 4, 4, 0, 'AZG6jXbDFl', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(22, 'Cierra Dooley', 'zdavis@example.net', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 2, NULL, 0, 'W0X83oq8Kz', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(23, 'Prof. Brielle Corwin IV', 'marquise35@example.net', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 2, NULL, 0, 'xRX3FO24G4', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(24, 'Freddy Grimes', 'pagac.parker@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 2, NULL, 0, 'ZMdMkvLKr0', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(25, 'Bria Mayer', 'candace86@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 2, NULL, 0, 'YOWl1cIT8u', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(26, 'Johnathan Pagac', 'micaela.gleichner@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 2, NULL, 0, 'nbAocTLvOv', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(27, 'Lionel Oberbrunner', 'etorphy@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 2, NULL, 0, 'P6HDahWhY5', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(28, 'Emmanuelle Boyle', 'ellie00@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 2, NULL, 0, 'HpTiHN490X', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(29, 'Gloria Mayert', 'kolby55@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 2, NULL, 0, 'i7fcbrZttO', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(30, 'Arnold Fahey DVM', 'flatley.chloe@example.net', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 2, NULL, 0, 'EzPpBB6nkk', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(31, 'Miss Amina Gusikowski', 'zmosciski@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 2, NULL, 0, 'pEZe8p3QZr', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(32, 'super Admin', 'super@super.com', NULL, '$2y$12$2vc13R1ksNkQqoj5t5P1wuvdCvUKM4G13TithLnDDNspYC307iGMy', 1, NULL, 1, NULL, '2024-12-21 07:58:24', '2024-12-21 07:58:24'),
(33, 'Student', 'student@student.com', NULL, '$2y$12$pQ/E/Zjt5RJU1HmuM9IgE..jLJMux7plZ9CG1puoUGm8w6FGO9nhS', 3, NULL, 1, NULL, '2024-12-21 07:59:02', '2024-12-21 07:59:02'),
(34, 'Admin', 'admin2@admin.com', NULL, '$2y$12$b4TVjYeBwoCBJpfOUBh9yuQtte2gOqxm.ke7qDWdhSCwZL5XOwUtq', 2, NULL, 1, NULL, '2024-12-21 07:59:36', '2024-12-21 07:59:36'),
(35, 'trainer', 'trainer@trainer.com', NULL, '$2y$12$jdwFfZLYb2HBqboxPEKGrexxNnZua/Xf1.3B7lwS5LdyfMD2czbsm', 4, NULL, 0, NULL, '2024-12-21 08:00:03', '2024-12-21 08:00:17'),
(36, 'qwe', 'eqwe@gmail.com', NULL, '$2y$12$rTD2XFw3Ytaj6Y8BAbecsuP.boxTan047AUvUxbPjN5drAf6r5NJK', 4, 5, 1, NULL, '2024-12-21 08:01:54', '2024-12-21 08:36:30'),
(37, 'dddd', 'ddd@ddd.com', NULL, '$2y$12$MQD7/PDQLAwzOvTDB/5qc.EDWTCt7u/ZFN9HZji8WEfxwBQcBepW6', 4, 3, 1, NULL, '2024-12-21 08:37:04', '2024-12-21 10:09:57'),
(38, 'qqqqq', 'qqq@qqq.com', NULL, '$2y$12$2FfBYYyvagjp4kHj9EMGj.2UCwRHskcyW3Fil7FgrBqn4NBx9TWZi', 4, 2, 1, NULL, '2024-12-21 08:38:04', '2024-12-21 08:38:04'),
(39, 'Student1', 'stirden1@gmail.com', NULL, '$2y$12$vJAKVSDXvqv./6/lmThnWegtSaOoD9.u9lewsFquZeYt1X8bhYJe2', 4, 1, 1, NULL, '2024-12-21 08:56:47', '2024-12-21 08:56:47'),
(40, 'trainer2', 'trainer2@gmail.com', NULL, '$2y$12$8slKreuEnclwC1s/UFc6Ye6ZLatyMas2Q7Haa3WCBexKBLxZ3DTZi', 4, 8, 1, NULL, '2024-12-21 09:12:03', '2024-12-21 09:12:03'),
(41, 'sdasdad', 'asdad@dasda.com', NULL, '$2y$12$b5iGqmtueeP5tXo0U7eZGuNiH7vugtQk0bKkCl3l9lkWy6OnPEptm', 4, 9, 1, NULL, '2024-12-21 09:46:18', '2024-12-21 09:46:18'),
(42, 'lksdfkls', 'asdjkadn@askjnda.com', NULL, '$2y$12$dPeZkm0WVT/WhQCNp0aL0uP1z/UB/laASUE5.Zp3bzpInbQHWxd3a', 4, 7, 1, NULL, '2024-12-21 09:58:00', '2024-12-21 09:58:00'),
(43, 'asdasd', 'asdadas@gmail.com', NULL, '$2y$12$49Fu3biFdS.0Rxg24NaFHuXn3cMCFJ45NSHrv2ibB7zSRuBWAu7g6', 2, NULL, 1, NULL, '2024-12-21 10:00:27', '2024-12-21 10:00:27'),
(44, 'asdasdasdasd', 'asdasdd@das.com', NULL, '$2y$12$uYqEZbxAI6QtcIhNvFrwR.cHz9j7gza8bOBECpzPZCbKzNJLZ3iIS', 2, NULL, 1, NULL, '2024-12-21 10:08:42', '2024-12-21 10:08:42'),
(45, 'gggggggggg', 'ggggg@hhh.com', NULL, '$2y$12$4cC5iIMDVg35wb1kRhiwze7Fyca3kxbEzhBb9EahBwP2TT.8zt096', 4, 7, 1, NULL, '2024-12-21 10:09:15', '2024-12-21 10:09:15');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_student_id_foreign` (`student_id`),
  ADD KEY `trainings_trainer_id_foreign` (`trainer_id`),
  ADD KEY `trainings_admin_id_foreign` (`admin_id`),
  ADD KEY `trainings_company_id_foreign` (`company_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_company_id_foreign` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trainings_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `trainings_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trainings_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
