-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2025 at 06:15 PM
-- Server version: 8.0.41-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

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
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1744396151),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1744396151;', 1744396151),
('admin@gmail.com|127.0.0.1', 'i:1;', 1739022851),
('admin@gmail.com|127.0.0.1:timer', 'i:1739022851;', 1739022851),
('admin4@gmail.com|127.0.0.1', 'i:1;', 1744980809),
('admin4@gmail.com|127.0.0.1:timer', 'i:1744980809;', 1744980809),
('fe2ef495a1152561572949784c16bf23abb28057', 'i:1;', 1744393434),
('fe2ef495a1152561572949784c16bf23abb28057:timer', 'i:1744393434;', 1744393434);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(10, 'Witting, Renner and Padberg', '4853 Streich Mission Apt. 439\nNorth Virginieland, NJ 83563', 'kkuvalis@example.net', '2024-12-20 13:28:26', '2024-12-20 13:28:26'),
(11, 'Gottlieb, Kovacek and DuBuque', '37780 Kovacek Lane Suite 706\nPort Katheryn, WV 41342-3150', 'ralph77@example.org', '2025-03-03 17:46:15', '2025-03-03 17:46:15'),
(12, 'Luettgen-Rosenbaum', '92522 Elijah Springs Suite 975\nConnville, AK 80213-3666', 'kskiles@example.org', '2025-03-03 17:46:15', '2025-03-03 17:46:15'),
(13, 'Beatty Ltd', '491 Rohan Glens\nRicehaven, DC 70578-3744', 'ethyl.labadie@example.org', '2025-03-03 17:46:15', '2025-03-03 17:46:15'),
(14, 'Gerhold LLC', '6448 Marley Rapid Suite 768\nVerdiemouth, NH 77832-8388', 'alexane64@example.net', '2025-03-03 17:46:15', '2025-03-03 17:46:15'),
(15, 'O\'Hara Ltd', '3748 Blick Villages Suite 869\nNew Delta, WI 38055', 'zokuneva@example.com', '2025-03-03 17:46:15', '2025-03-03 17:46:15'),
(16, 'O\'Hara, Graham and Mueller', '3436 Carolanne Prairie\nWest Keiraville, SD 89741-9771', 'preinger@example.com', '2025-03-03 17:46:15', '2025-03-03 17:46:15'),
(17, 'Harvey PLC', '81500 Blanca Expressway Suite 037\nEast Jaida, ND 13661-5462', 'lucie.torp@example.org', '2025-03-03 17:46:15', '2025-03-03 17:46:15'),
(18, 'Sauer Group', '53895 Agustina Streets\nLake Patiencemouth, IA 17038', 'collins.jarrod@example.com', '2025-03-03 17:46:15', '2025-03-03 17:46:15'),
(19, 'Schiller PLC', '7617 Roxane Mills\nNorth Timmyland, SC 42313-1479', 'slemke@example.org', '2025-03-03 17:46:15', '2025-03-03 17:46:15'),
(20, 'Gerhold LLC', '9241 Kennedy Club\nCronintown, WI 59484-4799', 'pat.williamson@example.com', '2025-03-03 17:46:15', '2025-03-03 17:46:15');

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
-- Table structure for table `homepage_contents`
--

CREATE TABLE `homepage_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_contents`
--

INSERT INTO `homepage_contents` (`id`, `section`, `content`, `created_at`, `updated_at`) VALUES
(1, 'header', '{\"image\": \"images/cAr9835JGTkxYOfFl19C5DFDUVFflXZJK0OdjqRQ.png\", \"title\": \"Experience the Real World 8 Weeks of Hands-On Learning\", \"subtitle\": \"Field Training Program\", \"description\": \"The Field Training Course is an 8-week program totaling 240 hours, giving students hands-on experience in real-world projects. It’s a chance to apply what you’ve learned in class, build practical skills, and work with professionals to prepare for your future career.\"}', '2025-02-28 19:15:18', '2025-03-03 18:19:00'),
(2, 'features', '{\"title\": \"Training That Makes a Difference\", \"feature1\": \"Student Support\", \"feature2\": \"Trainer Management\", \"feature3\": \"Supervisor Dashboard\", \"sub_title\": \"Experience a comprehensive training program designed to bridge the gap between academia and industry\", \"feature1_description\": \"Get personalized guidance and support throughout your training journey. Our platform makes it easy to track progress and stay connected with mentors.\", \"feature2_description\": \"Efficient coordination between trainers and students ensures optimal learning outcomes. Monitor progress and provide timely feedback.\", \"feature3_description\": \"Comprehensive oversight tools for university supervisors to monitor student progress and ensure training quality standards.\"}', '2025-02-28 19:15:18', '2025-03-03 18:01:18'),
(3, 'mission', '{\"image\": \"images/7QFCWUaDusRuxh6m7FClVxlcObCOSvczvgkobrFa.jpg\", \"title\": \"Education and Industry\", \"mission1\": \"practical skill development\", \"mission2\": \"Industry networking\", \"mission3\": \"Career preparation\", \"description\": \"we\'re committed to creating seamless connections between academic learning and practical industry experience, ensuring students are well-prepared for their professional careers.\"}', '2025-02-28 19:15:18', '2025-03-03 18:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_company_table', 1),
(2, '0001_01_01_000000_create_roles_table', 1),
(3, '0001_01_01_000000_create_users_table', 1),
(4, '0001_01_01_000001_create_cache_table', 1),
(5, '0001_01_01_000002_create_jobs_table', 1),
(6, '2024_12_20_144559_create_trainings_table', 1),
(7, '2025_02_28_213914_create_homepage_contents_table', 2),
(8, '2025_03_18_211816_add_tbook_and_notes_to_trainings', 3),
(9, '2025_04_11_173828_add_evaluation_file', 4),
(10, '2025_04_18_130628_tasks', 5);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('57Efawb3xEu3Bnrl56ZuRffDN0nRhJmMK7IUv2kZ', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWd0T21oMlpIcThsWURJaUE5Q3lFOWFwRldnc0FIbmYwUUdyREVXeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745693341),
('fL00u1eOBQN9Ah4Ryf4jSqzE2sSJ77crxgYELud9', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiY2pCaDEwVFU5RGdzQzNKWXczak1vUlYzN1RNMDBQRlpQRDEwMEtocSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFpbmluZ3MiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0NTY5MzgyOTt9fQ==', 1745693979),
('frtgRYSsQGnbjqFwm1pivX9rP3RCUAz6Yo0FkD9L', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMktKeEpRSnRjeDJDVFdBQVJGd3BTbkpHd0lXMjVDYnR0TDczWjlwdiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3RyYWluaW5ncy8yMC90YXNrcy8zIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFpbmluZ3MvMjAvdGFza3MvMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745693341);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `training_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` date NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `training_id`, `created_by`, `title`, `description`, `due_date`, `status`, `created_at`, `updated_at`) VALUES
(3, 20, 47, 'World 8 Weeks of Hands-On Learning', 'do this task', '2025-04-28', 2, '2025-04-26 15:24:15', '2025-04-26 15:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `task_attachments`
--

CREATE TABLE `task_attachments` (
  `id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED DEFAULT NULL,
  `submission_id` bigint UNSIGNED DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_attachments`
--

INSERT INTO `task_attachments` (`id`, `task_id`, `submission_id`, `file_name`, `file_path`, `file_type`, `created_at`, `updated_at`) VALUES
(6, 3, NULL, 'Ai Stylist(1).docx', 'task-attachments/RW5cNXquvy1BmROrmSNbueNSySB3wZ9uNgb31gSD.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2025-04-26 15:24:15', '2025-04-26 15:24:15'),
(7, NULL, 4, 'Assignment_2_SA_24-25 (1).docx', 'submission-attachments/zbBb99FH5dxlcuAEDv9gkPPIERcu73A9ZIzIoSwj.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2025-04-26 15:25:43', '2025-04-26 15:25:43'),
(8, 3, NULL, 'Assignment#1-technical writing-1.pdf', 'task-attachments/4T9ar1OdSTjQfAonmftUSleZMooTxGDTafltcB1f.pdf', 'application/pdf', '2025-04-26 15:48:51', '2025-04-26 15:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `task_submissions`
--

CREATE TABLE `task_submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `submission_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_submissions`
--

INSERT INTO `task_submissions` (`id`, `task_id`, `student_id`, `submission_content`, `feedback`, `status`, `created_at`, `updated_at`) VALUES
(4, 3, 33, 'submission', 'very good', 2, '2025-04-26 15:25:43', '2025-04-26 15:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `trainer_id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `training_book` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Additional_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `student_id`, `trainer_id`, `admin_id`, `company_id`, `status`, `created_at`, `updated_at`, `training_book`, `Additional_notes`, `evaluation`) VALUES
(1, 2, 13, 29, 10, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27', NULL, NULL, NULL),
(2, 3, 17, 29, 2, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27', NULL, NULL, NULL),
(3, 4, 16, 26, 4, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27', NULL, NULL, NULL),
(4, 5, 13, 27, 10, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27', NULL, NULL, NULL),
(5, 6, 14, 28, 9, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27', NULL, NULL, NULL),
(6, 7, 17, 29, 2, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27', NULL, NULL, NULL),
(7, 8, 17, 27, 2, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27', NULL, NULL, NULL),
(8, 9, 17, 22, 2, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27', NULL, NULL, NULL),
(9, 10, 19, 26, 3, 0, '2024-12-20 13:28:27', '2024-12-20 13:28:27', NULL, NULL, NULL),
(11, 6, 17, 24, 2, 1, '2024-12-20 13:31:08', '2024-12-20 13:31:08', NULL, NULL, NULL),
(12, 8, 18, 23, 3, 0, '2024-12-20 13:31:38', '2024-12-20 13:31:38', NULL, NULL, NULL),
(13, 2, 12, 23, 2, 0, '2024-12-20 13:48:40', '2024-12-20 13:48:40', NULL, NULL, NULL),
(14, 3, 18, 23, 3, 0, '2024-12-20 13:51:50', '2024-12-20 13:51:50', NULL, NULL, NULL),
(15, 2, 18, 23, 3, 0, '2024-12-20 13:59:26', '2024-12-20 13:59:26', NULL, NULL, NULL),
(16, 3, 18, 25, 3, 1, '2024-12-20 14:03:19', '2024-12-20 14:03:19', NULL, NULL, NULL),
(17, 5, 45, 25, 7, 1, '2024-12-21 10:17:50', '2024-12-21 10:17:50', NULL, NULL, NULL),
(18, 3, 40, 46, 8, 1, '2025-03-18 17:18:23', '2025-04-11 14:42:55', 'training_files/Training_book/aRsHeUYntRWXRLYGL8hRCXeqXCgJL9kbgV3ms7D2.docx', ' rana', 'training_files/Evaluation/HrtJ5mASf0MCzenmPrfvSKWmW9r8nlLTKRo2kzbT.docx'),
(19, 33, 47, 34, 20, 1, '2025-04-11 14:54:40', '2025-04-11 15:28:15', 'training_files/Training_book/IUb00ldW9SzsXkYwMiHmKIEdmq95hFKtcQZuFm3B.pdf', 'hiiiii', 'training_files/Evaluation/50DkFa71B5kvN1cddCESuSeo97ckbBJWsuyRaFvK.docx'),
(20, 33, 47, 46, 20, 1, '2025-04-18 11:14:11', '2025-04-18 11:14:11', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `company_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'superadmin@superadmin.com', '2024-12-20 13:28:27', '$2y$12$X9bWvKHrC4pm0AB7TF1dXei5tB9P/F.aaaeqeYmTxfEiDouNRU5Ga', 1, NULL, 1, 'fBbbbg3N9eMeptt2Lx8Rn6aFiRsv4Vwfs1KhB3hcwBVo4o0MJbxuXaAM9uar', '2024-12-20 13:28:27', '2025-03-18 17:17:44'),
(2, 'Marianna Barrow', 'qhomenick@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 1, 'Scg7a1gmWt', '2024-12-20 13:28:27', '2025-02-08 11:13:41'),
(3, 'Estelle Braun', 'denesik.gregory@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 1, 'mEv9Qdsb13', '2024-12-20 13:28:27', '2024-12-21 11:33:52'),
(4, 'Levi Langworth', 'marjolaine60@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 1, 'ZkWtgf6TQj', '2024-12-20 13:28:27', '2024-12-21 11:33:54'),
(5, 'Alek Abernathy', 'meredith.lynch@example.net', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 1, 'plGeOWXW6k', '2024-12-20 13:28:27', '2025-02-08 11:54:14'),
(6, 'Nicholas Crist DDS', 'rey85@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 1, 'VlLhdZxuL2', '2024-12-20 13:28:27', '2025-01-18 10:03:41'),
(7, 'Leonardo Lynch', 'chase22@example.net', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 1, 'GTyJCYbRql', '2024-12-20 13:28:27', '2025-02-08 11:45:52'),
(8, 'Lera Schmitt', 'odickens@example.org', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 0, 'ZzWtAdnR1L', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(9, 'Clotilde Maggio', 'ambrose.hansen@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 0, 'DucfTzoXuQ', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
(10, 'Freeda Glover', 'johnnie58@example.com', '2024-12-20 13:28:27', '$2y$12$geDqEJUZhBKgCnuVBqsFNeyBKwpstLjwn4DxR.GTjpybvhHFRHvjq', 3, NULL, 0, '6BfByuSPfn', '2024-12-20 13:28:27', '2024-12-20 13:28:27'),
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
(45, 'gggggggggg', 'ggggg@hhh.com', NULL, '$2y$12$4cC5iIMDVg35wb1kRhiwze7Fyca3kxbEzhBb9EahBwP2TT.8zt096', 4, 7, 1, NULL, '2024-12-21 10:09:15', '2024-12-21 10:09:15'),
(46, 'new admin', 'admin@admin.com', NULL, '$2y$12$lI.I/Sl6f1Hb9I7HwOa84uKrbuhnKqfEdN6LGX/5sgegBKhKvmqHi', 2, NULL, 1, NULL, '2025-03-18 16:56:57', '2025-03-18 17:31:27'),
(47, 'test trainer', 'trainer5@trainer.com', NULL, '$2y$12$NW0oPkhNJYK4d3/VgPJDA.zCElkeBtNGNNj6PGqltB6q7M2u4s05W', 4, 20, 1, NULL, '2025-04-11 14:53:35', '2025-04-11 14:53:35');

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
-- Indexes for table `homepage_contents`
--
ALTER TABLE `homepage_contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `homepage_contents_section_unique` (`section`);

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_training_id_foreign` (`training_id`),
  ADD KEY `tasks_created_by_foreign` (`created_by`);

--
-- Indexes for table `task_attachments`
--
ALTER TABLE `task_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_attachments_task_id_foreign` (`task_id`),
  ADD KEY `task_attachments_submission_id_foreign` (`submission_id`);

--
-- Indexes for table `task_submissions`
--
ALTER TABLE `task_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_submissions_task_id_foreign` (`task_id`),
  ADD KEY `task_submissions_student_id_foreign` (`student_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homepage_contents`
--
ALTER TABLE `homepage_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task_attachments`
--
ALTER TABLE `task_attachments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task_submissions`
--
ALTER TABLE `task_submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_training_id_foreign` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_attachments`
--
ALTER TABLE `task_attachments`
  ADD CONSTRAINT `task_attachments_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `task_submissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_attachments_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_submissions`
--
ALTER TABLE `task_submissions`
  ADD CONSTRAINT `task_submissions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_submissions_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

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
