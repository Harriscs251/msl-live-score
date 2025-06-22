-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 04:10 PM
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
-- Database: `msl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'Norshahrul Idlan Talaha', 1, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(2, 1, 'Safiq Rahim', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(3, 1, 'Mohd Faiz Subri', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(4, 1, 'Kedah Darul Aman FC\'s player', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(5, 2, 'Selangor FC', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(6, 2, 'Johor Darul Ta\'zim (JDT)', 1, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(7, 2, 'Perak FC', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(8, 2, 'Kedah Darul Aman FC', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(9, 3, 'Bukit Jalil National Stadium', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(10, 3, 'Shah Alam Stadium', 1, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(11, 3, 'Sultan Ibrahim Stadium', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(12, 3, 'Stadium Darul Aman', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(13, 4, 'Perak FC', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(14, 4, 'Kuala Lumpur City FC', 1, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(15, 4, 'Johor Darul Ta\'zim (JDT)', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(16, 4, 'Selangor FC', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(17, 5, 'Safiq Rahim', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(18, 5, 'Mohd Faiz Subri', 1, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(19, 5, 'Norshahrul Idlan Talaha', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(20, 5, 'Khairul Fahmi Che Mat', 0, '2025-05-06 22:15:53', '2025-05-06 22:15:53');

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
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `blocked_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`id`, `user_id`, `subject`, `content`, `is_blocked`, `blocked_reason`, `created_at`, `updated_at`) VALUES
(1, 4, 'Liverpool win insyallah', 'liver pool mana pernah kalah team kuat kot', 0, NULL, '2025-05-04 20:43:12', '2025-05-04 20:43:12'),
(2, 5, 'saya benci itam', 'saya benci maguire', 1, 'rude', '2025-05-04 22:53:12', '2025-05-06 22:07:46'),
(3, 7, 'admin gay', 'Suka raba orang lain', 0, NULL, '2025-05-07 19:33:40', '2025-05-07 19:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_replies`
--

CREATE TABLE `discussion_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discussion_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `blocked_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discussion_replies`
--

INSERT INTO `discussion_replies` (`id`, `discussion_id`, `user_id`, `content`, `is_blocked`, `blocked_reason`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'sabar', 0, NULL, '2025-05-06 22:05:45', '2025-05-06 22:05:45'),
(2, 3, 1, 'mohong', 0, NULL, '2025-05-10 22:58:14', '2025-05-10 22:58:14');

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
-- Table structure for table `fantasy_leaderboards`
--

CREATE TABLE `fantasy_leaderboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fantasy_leaderboards`
--

INSERT INTO `fantasy_leaderboards` (`id`, `user_id`, `points`, `created_at`, `updated_at`) VALUES
(1, 7, 10, '2025-05-07 21:35:22', '2025-05-08 00:47:24'),
(2, 1, 50, '2025-05-08 00:54:21', '2025-05-08 00:54:55'),
(3, 8, 11, '2025-05-13 04:56:58', '2025-05-13 06:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_teams`
--

CREATE TABLE `fantasy_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `budget` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fantasy_teams`
--

INSERT INTO `fantasy_teams` (`id`, `user_id`, `name`, `budget`, `created_at`, `updated_at`) VALUES
(2, 5, 'lapaqketam\'s Team', 50.00, '2025-05-04 22:57:07', '2025-05-04 22:57:07'),
(7, 7, 'Pedro\'s Team', 50.00, '2025-05-07 21:35:22', '2025-05-07 21:35:22'),
(8, 1, 'MUHAMMAD HARRIS BIN PAIRUS\'s Team', 50.00, '2025-05-08 00:54:21', '2025-05-08 00:54:21'),
(9, 8, 'haziq\'s Team', 50.00, '2025-05-13 04:56:58', '2025-05-13 04:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_team_players`
--

CREATE TABLE `fantasy_team_players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fantasy_team_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `is_captain` tinyint(1) NOT NULL DEFAULT 0,
  `is_vice_captain` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fantasy_team_players`
--

INSERT INTO `fantasy_team_players` (`id`, `fantasy_team_id`, `player_id`, `is_captain`, `is_vice_captain`, `created_at`, `updated_at`) VALUES
(8, 2, 521, 0, 0, '2025-05-04 22:57:07', '2025-05-04 22:57:07'),
(9, 2, 624, 0, 0, '2025-05-04 22:57:07', '2025-05-04 22:57:07'),
(10, 2, 626, 0, 0, '2025-05-04 22:57:07', '2025-05-04 22:57:07'),
(11, 2, 941, 0, 0, '2025-05-04 22:57:07', '2025-05-04 22:57:07'),
(12, 2, 1631, 0, 0, '2025-05-04 22:57:07', '2025-05-04 22:57:07'),
(13, 2, 1631, 0, 0, '2025-05-04 22:57:07', '2025-05-04 22:57:07'),
(14, 2, 1631, 0, 0, '2025-05-04 22:57:07', '2025-05-04 22:57:07'),
(43, 7, 5, 0, 0, '2025-05-07 21:35:22', '2025-05-07 21:35:22'),
(44, 7, 37, 0, 0, '2025-05-07 21:35:22', '2025-05-07 21:35:22'),
(45, 7, 78, 0, 0, '2025-05-07 21:35:22', '2025-05-07 21:35:22'),
(46, 7, 15, 1, 0, '2025-05-07 21:35:22', '2025-05-07 21:35:22'),
(47, 7, 56, 0, 1, '2025-05-07 21:35:22', '2025-05-07 21:35:22'),
(48, 7, 85, 0, 0, '2025-05-07 21:35:22', '2025-05-07 21:35:22'),
(49, 7, 20, 0, 0, '2025-05-07 21:35:22', '2025-05-07 21:35:22'),
(50, 8, 5, 1, 0, '2025-05-08 00:54:21', '2025-05-08 00:54:21'),
(51, 8, 15, 0, 0, '2025-05-08 00:54:21', '2025-05-08 00:54:21'),
(52, 8, 78, 0, 1, '2025-05-08 00:54:21', '2025-05-08 00:54:21'),
(53, 8, 7, 0, 0, '2025-05-08 00:54:21', '2025-05-08 00:54:21'),
(54, 8, 53, 0, 0, '2025-05-08 00:54:21', '2025-05-08 00:54:21'),
(55, 8, 56, 0, 0, '2025-05-08 00:54:21', '2025-05-08 00:54:21'),
(56, 8, 8, 0, 0, '2025-05-08 00:54:21', '2025-05-08 00:54:21'),
(57, 9, 653, 1, 0, '2025-05-13 04:56:58', '2025-05-13 04:56:58'),
(58, 9, 643, 0, 0, '2025-05-13 04:56:58', '2025-05-13 04:56:58'),
(59, 9, 714, 0, 0, '2025-05-13 04:56:58', '2025-05-13 04:56:58'),
(60, 9, 886, 0, 0, '2025-05-13 04:56:58', '2025-05-13 04:56:58'),
(61, 9, 1771, 0, 0, '2025-05-13 04:56:58', '2025-05-13 04:56:58'),
(62, 9, 2467, 0, 1, '2025-05-13 04:56:58', '2025-05-13 04:56:58'),
(63, 9, 2674, 0, 0, '2025-05-13 04:56:58', '2025-05-13 04:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_teams`
--

CREATE TABLE `favorite_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `comment`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 'good', 5, '2025-05-10 23:02:00', '2025-05-10 23:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `fpl_matches`
--

CREATE TABLE `fpl_matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team1` varchar(255) NOT NULL,
  `team2` varchar(255) NOT NULL,
  `score1` int(11) NOT NULL,
  `score2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `match_polls`
--

CREATE TABLE `match_polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fixture_id` bigint(20) NOT NULL,
  `vote` enum('home','away','draw') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `match_polls`
--

INSERT INTO `match_polls` (`id`, `user_id`, `fixture_id`, `vote`, `created_at`, `updated_at`) VALUES
(1, 1, 1208368, 'away', '2025-05-04 17:56:12', '2025-05-04 17:56:12'),
(2, 2, 1208368, 'away', '2025-05-04 18:40:11', '2025-05-04 18:40:11'),
(3, 3, 1208368, 'home', '2025-05-04 20:27:55', '2025-05-04 20:27:55'),
(4, 4, 1208368, 'draw', '2025-05-04 20:34:31', '2025-05-04 20:34:31'),
(5, 5, 1208368, 'home', '2025-05-04 22:57:50', '2025-05-04 22:57:50'),
(6, 1, 1208374, 'home', '2025-05-06 16:52:09', '2025-05-06 16:52:09'),
(7, 6, 1208374, 'draw', '2025-05-07 19:09:10', '2025-05-07 19:09:10'),
(8, 7, 1208374, 'away', '2025-05-07 19:21:05', '2025-05-07 19:21:05'),
(9, 1, 1208378, 'away', '2025-05-10 22:58:25', '2025-05-10 22:58:25');

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
(4, '2025_04_03_134214_add_is_admin_to_users_table', 1),
(5, '2025_04_03_134844_create_news_table', 1),
(6, '2025_04_07_022542_create_user_logins_table', 1),
(7, '2025_04_07_032656_update_news_table_structure', 1),
(8, '2025_04_14_113011_create_favorite_teams_table', 1),
(9, '2025_04_14_113947_create_discussions_table', 1),
(10, '2025_04_14_113955_create_discussion_replies_table', 1),
(11, '2025_04_17_180350_create_match_polls_table', 1),
(12, '2025_04_24_032218_create_quizzes_table', 1),
(13, '2025_04_24_032219_create_questions_table', 1),
(14, '2025_04_24_032220_create_answers_table', 1),
(15, '2025_04_24_032220_create_user_scores_table', 1),
(16, '2025_04_24_162625_add_points_to_users_table', 1),
(17, '2025_04_29_145223_create_fantasy_teams_table', 1),
(18, '2025_04_29_145226_create_fantasy_team_players_table', 2),
(19, '2025_04_29_150823_create_teams_table', 3),
(20, '2025_04_29_145224_create_players_table', 4),
(23, '2025_05_04_133521_create_feedbacks_table', 5),
(24, '2025_05_04_150049_create_feedbacks_table', 6),
(26, '2025_05_04_161548_create_feedback_table', 8),
(28, '2025_05_04_173840_create_feedbacks_table', 9),
(29, '2025_05_04_180835_create_feedbacks_table', 10),
(30, '2025_05_04_181510_create_feedbacks_table', 11),
(40, '2025_04_30_050747_create_user_answers_table', 12),
(41, '2025_05_01_022859_create_fantasy_leaderboards_table', 12),
(42, '2025_05_04_160306_create_fpl_matches_table', 12),
(43, '2025_05_04_182508_create_feedbacks_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('harriskacak9@gmail.com', '$2y$12$y7WfdoV3gCy3.0it4KfrkeA11NyyHfu5WH9yJznnwIx7cskct8kTu', '2025-05-07 18:23:06'),
('harrisnice32@gmail.com', '$2y$12$VW1ZRxDUAAEcBB/rm8N1R.FZQeYYTz3BOQoge9XRT7q0n11tfaGz.', '2025-05-07 19:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `total_points` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `team_id`, `name`, `position`, `price`, `total_points`, `created_at`, `updated_at`) VALUES
(5, 15, 'M. Akanji', 'Unknown', 9.7, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(7, 13, 'A. Diallo', 'MID', 9.7, 5, '2025-05-04 08:02:08', '2025-05-04 08:04:38'),
(8, 27, 'Raphaël Guerreiro', 'Unknown', 7.1, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(15, 21, 'T. Delaney', 'Unknown', 5, 0, '2025-05-04 08:04:45', '2025-05-07 21:31:26'),
(18, 33, 'J. Sancho', 'Unknown', 9.8, 0, '2025-05-04 08:04:56', '2025-05-04 08:04:56'),
(20, 1, 'A. Witsel', 'Unknown', 9.7, 0, '2025-05-04 08:01:57', '2025-05-07 21:30:53'),
(23, 9, 'Sergio Gómez', 'Unknown', 11.7, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(30, 8, 'S. Arias', 'Unknown', 8.6, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(37, 26, 'N. Pérez', 'Unknown', 10.7, 0, '2025-05-04 08:04:50', '2025-05-04 08:04:50'),
(53, 26, 'Á. Correa', 'Unknown', 6.4, 0, '2025-05-04 08:04:50', '2025-05-07 21:31:35'),
(56, 2, 'A. Griezmann', 'Unknown', 5.1, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(59, 9, 'Álvaro Morata', 'Unknown', 8.2, 0, '2025-05-07 21:13:02', '2025-05-07 21:31:05'),
(74, 33, 'S. Amrabat', 'Unknown', 10.8, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:48'),
(78, 1, 'H. Vanaken', 'Unknown', 4, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(80, 38, 'E. Dennis', 'Unknown', 6.3, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:57'),
(81, 13, 'K. Diatta', 'Unknown', 7.7, 0, '2025-05-07 21:13:08', '2025-05-07 21:31:12'),
(85, 1, 'C. Ngonge', 'Unknown', 5, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(104, 36, 'Carlos Vinícius', 'Unknown', 5, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:53'),
(105, 36, 'F. Ballo-Touré', 'Unknown', 11.7, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:53'),
(109, 4, 'A. Golovin', 'Unknown', 10.7, 0, '2025-05-07 21:12:55', '2025-05-07 21:30:58'),
(127, 25, 'M. ter Stegen', 'Unknown', 9.4, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:34'),
(130, 27, 'Nélson Semedo', 'Unknown', 11.4, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(138, 2, 'J. Todibo', 'Unknown', 8.1, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(154, 26, 'L. Messi', 'Unknown', 8.4, 0, '2025-05-04 08:04:50', '2025-05-04 08:04:50'),
(170, 1, 'J. Vertonghen', 'Unknown', 5.5, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(174, 21, 'C. Eriksen', 'Unknown', 10.2, 0, '2025-05-07 21:13:22', '2025-05-07 21:31:26'),
(184, 10, 'H. Kane', 'Unknown', 7.9, 0, '2025-05-07 21:13:04', '2025-05-07 21:31:07'),
(186, 17, 'Son Heung-Min', 'Unknown', 4, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(201, 3, 'M. Brozović', 'Unknown', 4.8, 0, '2025-05-04 08:01:59', '2025-05-04 08:04:29'),
(207, 3, 'I. Perišić', 'Unknown', 9.1, 0, '2025-05-04 08:01:59', '2025-05-04 08:04:29'),
(217, 26, 'Lautaro Martínez', 'Unknown', 6.7, 0, '2025-05-07 21:13:30', '2025-05-07 21:31:35'),
(225, 20, 'A. Behich', 'Unknown', 7.6, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:25'),
(248, 16, 'H. Lozano', 'Unknown', 9.5, 0, '2025-05-04 08:02:11', '2025-05-04 08:04:40'),
(253, 2, 'A. Areola', 'Unknown', 9.6, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(266, 26, 'Á. Di María', 'Unknown', 6.1, 0, '2025-05-04 08:04:50', '2025-05-04 08:04:50'),
(269, 2, 'C. Nkunku', 'Unknown', 5.5, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(271, 26, 'L. Paredes', 'Unknown', 8.5, 0, '2025-05-07 21:13:30', '2025-05-07 21:31:35'),
(277, 2, 'M. Diaby', 'Unknown', 8, 0, '2025-05-04 08:01:58', '2025-05-04 08:04:28'),
(278, 2, 'Kylian Mbappé', 'Unknown', 8.8, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(286, 40, 'J. Matip', 'Unknown', 7.5, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(292, 10, 'J. Henderson', 'Unknown', 5.5, 0, '2025-05-04 08:02:05', '2025-05-04 08:04:35'),
(304, 13, 'S. Mané', 'Unknown', 10.1, 0, '2025-05-04 08:02:08', '2025-05-04 08:04:38'),
(318, 13, 'K. Koulibaly', 'Unknown', 10.6, 0, '2025-05-04 08:02:08', '2025-05-04 08:04:38'),
(329, 24, 'P. Zieliński', 'Unknown', 12, 0, '2025-05-07 21:13:27', '2025-05-07 21:31:31'),
(333, 24, 'A. Milik', 'Unknown', 5.4, 0, '2025-05-07 21:13:27', '2025-05-07 21:31:31'),
(340, 14, 'S. Babić', 'Unknown', 12, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(341, 14, 'M. Gajić', 'Unknown', 12.2, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(349, 14, 'A. Terzić', 'Unknown', 6.6, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(369, 27, 'Diogo Costa', 'Unknown', 6.4, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(372, 6, 'Éder Militão', 'Unknown', 11.3, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:01'),
(373, 27, 'Pepe', 'Unknown', 6, 0, '2025-05-04 08:04:51', '2025-05-07 21:31:37'),
(380, 27, 'Otávio', 'Unknown', 10.4, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(381, 27, 'Danilo Pereira', 'Unknown', 8.7, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(403, 14, 'M. Nastasić', 'Unknown', 4.1, 0, '2025-05-04 08:02:09', '2025-05-07 21:31:14'),
(412, 31, 'A. Harit', 'Unknown', 6, 0, '2025-05-07 21:13:38', '2025-05-07 21:31:44'),
(421, 15, 'B. Embolo', 'Unknown', 5.6, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(476, 4, 'D. Barinov', 'Unknown', 11.1, 0, '2025-05-04 08:02:00', '2025-05-04 08:04:29'),
(484, 4, 'A. Miranchuk', 'Unknown', 4.6, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(497, 25, 'M. Neuer', 'Unknown', 7.8, 0, '2025-05-07 21:13:29', '2025-05-07 21:31:34'),
(502, 25, 'J. Kimmich', 'Unknown', 11.9, 0, '2025-05-07 21:13:29', '2025-05-07 21:31:34'),
(507, 40, 'Thiago Alcântara', 'Unknown', 10.8, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(508, 2, 'K. Coman', 'Unknown', 10.7, 0, '2025-05-07 21:12:52', '2025-05-07 21:30:54'),
(510, 25, 'S. Gnabry', 'Unknown', 4.1, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:34'),
(511, 25, 'L. Goretzka', 'Unknown', 7.7, 0, '2025-05-07 21:13:29', '2025-05-07 21:31:34'),
(512, 17, 'Jeong Woo-Yeong', 'Unknown', 9.1, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(517, 8, 'J. Rodríguez', 'Unknown', 5.7, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:04'),
(521, 24, 'R. Lewandowski', 'Unknown', 11.4, 0, '2025-05-04 08:04:48', '2025-05-07 21:31:31'),
(522, 25, 'T. Müller', 'Unknown', 4.5, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:34'),
(533, 21, 'R. Kristensen', 'Unknown', 12.2, 0, '2025-05-07 21:13:22', '2025-05-07 21:31:26'),
(545, 31, 'N. Mazraoui', 'Unknown', 4.2, 0, '2025-05-07 21:13:38', '2025-05-07 21:31:44'),
(547, 33, 'D. van de Beek', 'Unknown', 7.6, 0, '2025-05-04 08:04:56', '2025-05-04 08:04:56'),
(548, 31, 'H. Ziyech', 'Unknown', 11.2, 0, '2025-05-04 08:04:54', '2025-05-04 08:04:54'),
(550, 21, 'K. Dolberg', 'Unknown', 4.4, 0, '2025-05-04 08:04:45', '2025-05-04 08:04:45'),
(567, 27, 'Rúben Dias', 'Unknown', 10.2, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(617, 6, 'Ederson', 'Unknown', 12.4, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(618, 6, 'Danilo', 'Unknown', 7.1, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(624, 26, 'N. Otamendi', 'Unknown', 11.7, 0, '2025-05-04 08:04:50', '2025-05-04 08:04:50'),
(626, 10, 'J. Stones', 'Unknown', 8.2, 0, '2025-05-04 08:02:05', '2025-05-04 08:04:35'),
(629, 1, 'K. De Bruyne', 'Unknown', 6.5, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(631, 10, 'P. Foden', 'Unknown', 6.2, 0, '2025-05-04 08:02:05', '2025-05-04 08:04:35'),
(633, 25, 'İ. Gündoğan', 'Unknown', 11.5, 0, '2025-05-04 08:04:49', '2025-05-04 08:04:49'),
(636, 27, 'Bernardo Silva', 'Unknown', 6.5, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(643, 6, 'Gabriel Jesus', 'Unknown', 6.6, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(644, 25, 'L. Sané', 'Unknown', 8.6, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:34'),
(653, 2, 'F. Mendy', 'Unknown', 7.3, 11, '2025-05-04 08:01:58', '2025-05-13 06:10:03'),
(714, 25, 'N. Amiri', 'Unknown', 8, 0, '2025-05-07 21:13:29', '2025-05-07 21:31:34'),
(723, 6, 'Joelinton', 'Unknown', 12.3, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(726, 3, 'A. Kramarić', 'Unknown', 8.1, 0, '2025-05-07 21:12:53', '2025-05-07 21:30:56'),
(727, 36, 'R. Nelson', 'Unknown', 10.4, 0, '2025-05-04 08:04:58', '2025-05-04 08:04:58'),
(730, 1, 'T. Courtois', 'Unknown', 10.3, 0, '2025-05-04 08:01:57', '2025-05-07 21:30:53'),
(739, 33, 'Reguilón', 'Unknown', 4.6, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(742, 33, 'R. Varane', 'Unknown', 12.1, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(744, 31, 'Brahim Díaz', 'Unknown', 5.1, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:44'),
(747, 6, 'Casemiro', 'Unknown', 5, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(752, 25, 'T. Kroos', 'Unknown', 9, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:33'),
(753, 9, 'Marcos Llorente', 'Unknown', 11.7, 0, '2025-05-04 08:02:04', '2025-05-04 08:04:34'),
(754, 3, 'L. Modrić', 'Unknown', 8, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(762, 6, 'Vinícius Júnior', 'Unknown', 9.4, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:01'),
(766, 5, 'R. Olsen', 'Unknown', 5.5, 0, '2025-05-07 21:12:56', '2025-05-07 21:30:59'),
(792, 35, 'J. Kluivert', 'Unknown', 5.6, 0, '2025-05-07 21:13:44', '2025-05-07 21:31:52'),
(843, 4, 'F. Chalov', 'Unknown', 6.5, 0, '2025-05-07 21:12:55', '2025-05-07 21:30:58'),
(851, 24, 'W. Szczęsny', 'Unknown', 6.7, 0, '2025-05-04 08:04:48', '2025-05-07 21:31:31'),
(874, 27, 'Cristiano Ronaldo', 'Unknown', 7.2, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(875, 26, 'P. Dybala', 'Unknown', 8.8, 0, '2025-05-07 21:13:30', '2025-05-07 21:25:14'),
(886, 27, 'Diogo Dalot', 'Unknown', 4.5, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(889, 5, 'V. Lindelöf', 'Unknown', 6.1, 0, '2025-05-07 21:12:56', '2025-05-07 21:30:59'),
(891, 10, 'L. Shaw', 'Unknown', 11.4, 0, '2025-05-07 21:13:04', '2025-05-07 21:31:07'),
(897, 33, 'M. Greenwood', 'Unknown', 9.6, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(899, 6, 'Andreas Pereira', 'Unknown', 4, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(908, 33, 'A. Martial', 'Unknown', 9.9, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(918, 9, 'José Gayà', 'Unknown', 4.9, 0, '2025-05-07 21:13:02', '2025-05-07 21:31:05'),
(925, 39, 'Gonçalo Guedes', 'Unknown', 7.4, 0, '2025-05-04 08:05:01', '2025-05-04 08:05:01'),
(927, 17, 'Lee Kang-In', 'Unknown', 7.4, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(941, 15, 'L. Benito', 'Unknown', 11.1, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(946, 36, 'K. Mbabu', 'Unknown', 9.1, 0, '2025-05-04 08:02:10', '2025-05-07 21:31:53'),
(950, 15, 'G. Wüthrich', 'Unknown', 6.8, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(970, 6, 'Wendell', 'Unknown', 10.7, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(972, 25, 'J. Tah', 'Unknown', 8.7, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:34'),
(978, 25, 'K. Havertz', 'Unknown', 7.3, 0, '2025-05-04 08:04:49', '2025-05-04 08:04:49'),
(987, 6, 'Paulinho', 'Unknown', 8.5, 0, '2025-05-04 08:02:02', '2025-05-04 08:02:02'),
(1101, 12, 'T. Minamino', 'Unknown', 4.9, 0, '2025-05-07 21:13:07', '2025-05-07 21:31:10'),
(1145, 2, 'I. Konaté', 'Unknown', 9, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(1149, 2, 'D. Upamecano', 'Unknown', 5.1, 0, '2025-05-07 21:12:52', '2025-05-07 21:30:54'),
(1152, 5, 'E. Forsberg', 'Unknown', 6.1, 0, '2025-05-04 08:02:01', '2025-05-04 08:04:30'),
(1163, 27, 'Bruma', 'Unknown', 9.6, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(1165, 39, 'Matheus Cunha', 'Unknown', 10.5, 0, '2025-05-04 08:05:01', '2025-05-04 08:05:01'),
(1212, 4, 'D. Kuzyaev', 'Unknown', 6.3, 0, '2025-05-07 21:12:55', '2025-05-07 21:30:58'),
(1221, 22, 'S. Azmoun', 'Unknown', 4.5, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(1257, 2, 'J. Koundé', 'Unknown', 5.7, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(1264, 13, 'Y. Sabaly', 'Unknown', 10, 0, '2025-05-04 08:02:08', '2025-05-07 21:31:12'),
(1271, 2, 'A. Tchouaméni', 'Unknown', 9.9, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(1276, 38, 'S. Kalu', 'Unknown', 9.4, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(1305, 3, 'D. Livaković', 'Unknown', 4.3, 0, '2025-05-04 08:01:59', '2025-05-04 08:04:29'),
(1311, 22, 'S. Moharrami', 'Unknown', 4.7, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(1321, 3, 'L. Majer', 'Unknown', 4.5, 0, '2025-05-07 21:12:53', '2025-05-07 21:30:56'),
(1330, 3, 'M. Oršić', 'Unknown', 4.4, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(1331, 3, 'B. Petković', 'Unknown', 7.1, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(1417, 1, 'A. Saelemaekers', 'Unknown', 6.6, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(1422, 1, 'J. Doku', 'Unknown', 9.5, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(1427, 1, 'A. Sambi Lokonga', 'Unknown', 4.6, 0, '2025-05-04 08:01:57', '2025-05-07 21:30:53'),
(1438, 25, 'B. Leno', 'Unknown', 9.2, 0, '2025-05-04 08:04:49', '2025-05-04 08:04:49'),
(1452, 32, 'Mohamed Elneny', 'Unknown', 6.3, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(1454, 2, 'M. Guendouzi', 'Unknown', 8.1, 0, '2025-05-07 21:12:52', '2025-05-07 21:30:54'),
(1455, 36, 'A. Iwobi', 'Unknown', 10.2, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:53'),
(1464, 15, 'G. Xhaka', 'Unknown', 6.1, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(1476, 8, 'C. Borja', 'Unknown', 11.2, 0, '2025-05-07 21:13:01', '2025-05-07 21:31:04'),
(1479, 27, 'Tiago Djaló', 'Unknown', 10.3, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(1485, 27, 'Bruno Fernandes', 'Unknown', 10.8, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(1489, 14, 'N. Gudelj', 'Unknown', 8.7, 0, '2025-05-04 08:02:09', '2025-05-07 21:31:14'),
(1493, 26, 'M. Acuña', 'Unknown', 10.2, 0, '2025-05-04 08:04:50', '2025-05-04 08:04:50'),
(1496, 6, 'Raphinha', 'Unknown', 7.7, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:01'),
(1578, 26, 'G. Lo Celso', 'Unknown', 4, 0, '2025-05-04 08:04:50', '2025-05-07 21:31:36'),
(1589, 4, 'Y. Lodygin', 'Unknown', 7.2, 0, '2025-05-07 21:12:55', '2025-05-07 21:30:58'),
(1590, 27, 'José Sá', 'Unknown', 8.9, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(1597, 28, 'Y. Meriah', 'Unknown', 6.1, 0, '2025-05-04 08:04:51', '2025-05-07 21:31:39'),
(1605, 39, 'Daniel Podence', 'Unknown', 8.6, 0, '2025-05-04 08:05:01', '2025-05-04 08:05:01'),
(1631, 15, 'R. Rodríguez', 'Unknown', 7.1, 0, '2025-05-04 08:02:10', '2025-05-07 21:31:16'),
(1646, 6, 'Lucas Paquetá', 'Unknown', 8.2, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(1651, 24, 'K. Piątek', 'Unknown', 6.3, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(1696, 19, 'S. Chukwueze', 'Unknown', 9.8, 0, '2025-05-07 21:13:19', '2025-05-07 21:31:23'),
(1707, 9, 'Gerard Moreno', 'Unknown', 6.8, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(1771, 6, 'Ayrton Lucas', 'Unknown', 8.5, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(1800, 25, 'K. Trapp', 'Unknown', 4, 0, '2025-05-07 21:13:29', '2025-05-07 21:31:34'),
(1828, 14, 'L. Jović', 'Unknown', 12.5, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(1864, 27, 'Pedro Neto', 'Unknown', 10.6, 0, '2025-05-04 08:05:01', '2025-05-07 21:31:37'),
(1904, 2, 'B. Kamara', 'Unknown', 11.6, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(1920, 14, 'N. Radonjić', 'Unknown', 6.1, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(1929, 8, 'J. Lucumí', 'Unknown', 7.8, 0, '2025-05-07 21:13:01', '2025-05-07 21:31:04'),
(1937, 1, 'B. Heynen', 'Unknown', 7.8, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(1939, 24, 'J. Piotrowski', 'Unknown', 6.1, 0, '2025-05-04 08:04:48', '2025-05-07 21:31:31'),
(1942, 12, 'J. Ito', 'Unknown', 11.5, 0, '2025-05-07 21:13:07', '2025-05-07 21:31:10'),
(1946, 1, 'L. Trossard', 'Unknown', 11.7, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(1972, 34, 'L. Karius', 'Unknown', 8.8, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(2010, 29, 'P. Arboine', 'Unknown', 5, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(2038, 6, 'Guilherme Arana', 'Unknown', 10.3, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(2045, 21, 'S. Kjær', 'Unknown', 12.2, 0, '2025-05-04 08:04:45', '2025-05-07 21:31:26'),
(2054, 9, 'Jesús Navas', 'Unknown', 7, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(2068, 4, 'M. Safonov', 'Unknown', 9.3, 0, '2025-05-07 21:12:55', '2025-05-07 21:30:58'),
(2080, 5, 'V. Claesson', 'Unknown', 4.9, 0, '2025-05-04 08:02:01', '2025-05-07 21:30:59'),
(2086, 5, 'K. Olsson', 'Unknown', 4.2, 0, '2025-05-04 08:02:01', '2025-05-07 21:30:59'),
(2098, 16, 'G. Ochoa', 'Unknown', 11.6, 0, '2025-05-04 08:02:11', '2025-05-04 08:04:40'),
(2207, 2, 'E. Camavinga', 'Unknown', 5, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(2218, 13, 'I. Sarr', 'Unknown', 5.7, 0, '2025-05-04 08:02:08', '2025-05-07 21:31:12'),
(2274, 24, 'M. Bułka', 'Unknown', 4.3, 0, '2025-05-07 21:13:27', '2025-05-07 21:31:31'),
(2282, 21, 'A. Christensen', 'Unknown', 7.7, 0, '2025-05-04 08:04:45', '2025-05-07 21:31:26'),
(2285, 25, 'A. Rüdiger', 'Unknown', 12.3, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:34'),
(2290, 2, 'N. Kanté', 'Unknown', 10.3, 0, '2025-05-04 08:01:58', '2025-05-04 08:04:28'),
(2291, 3, 'M. Kovačić', 'Unknown', 12.2, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(2294, 36, 'Willian', 'Unknown', 8.2, 0, '2025-05-04 08:04:58', '2025-05-04 08:04:58'),
(2295, 2, 'O. Giroud', 'Unknown', 10.7, 0, '2025-05-04 08:01:58', '2025-05-04 08:04:28'),
(2320, 18, 'W. Willumsson', 'Unknown', 10.2, 0, '2025-05-07 21:13:17', '2025-05-07 21:31:21'),
(2413, 6, 'Richarlison', 'Unknown', 5.5, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(2415, 30, 'C. Cáceda', 'Unknown', 9.1, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(2419, 30, 'L. Advíncula', 'Unknown', 9.3, 0, '2025-05-04 08:04:53', '2025-05-04 08:04:53'),
(2422, 30, 'A. Corzo', 'Unknown', 8.4, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(2424, 30, 'M. Trauco', 'Unknown', 7.8, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(2428, 30, 'C. Cueva', 'Unknown', 6.1, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(2429, 30, 'É. Flores', 'Unknown', 7.3, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(2431, 30, 'M. López', 'Unknown', 11.1, 0, '2025-05-07 21:13:36', '2025-05-07 21:31:43'),
(2433, 30, 'R. Tapia', 'Unknown', 10.7, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(2436, 30, 'A. Polo', 'Unknown', 11.9, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(2463, 26, 'F. Armani', 'Unknown', 6.6, 0, '2025-05-04 08:04:50', '2025-05-04 08:04:50'),
(2467, 26, 'Lisandro Martínez', 'Unknown', 6.1, 0, '2025-05-07 21:13:30', '2025-05-07 21:31:36'),
(2468, 26, 'G. Montiel', 'Unknown', 8.9, 0, '2025-05-04 08:04:50', '2025-05-04 08:04:50'),
(2469, 26, 'G. Pezzella', 'Unknown', 6.8, 0, '2025-05-04 08:04:50', '2025-05-04 08:04:50'),
(2472, 26, 'R. De Paul', 'Unknown', 4.6, 0, '2025-05-04 08:04:50', '2025-05-07 21:31:36'),
(2476, 26, 'G. Rodríguez', 'Unknown', 7.1, 0, '2025-05-04 08:04:50', '2025-05-07 21:31:36'),
(2483, 8, 'D. Machado', 'Unknown', 8.3, 0, '2025-05-07 21:13:01', '2025-05-07 21:31:04'),
(2484, 8, 'Y. Mina', 'Unknown', 9.9, 0, '2025-05-07 21:13:01', '2025-05-07 21:31:04'),
(2489, 8, 'L. Díaz', 'Unknown', 6.3, 0, '2025-05-07 21:13:01', '2025-05-07 21:31:04'),
(2490, 8, 'J. Lerma', 'Unknown', 11.8, 0, '2025-05-07 21:13:01', '2025-05-07 21:31:04'),
(2597, 12, 'T. Tomiyasu', 'Unknown', 10.2, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(2598, 12, 'R. Dōan', 'Unknown', 8.7, 0, '2025-05-07 21:13:07', '2025-05-07 21:31:10'),
(2647, 32, 'Mohamed Abou Gabal', 'Unknown', 4.2, 0, '2025-05-04 08:04:55', '2025-05-07 21:25:25'),
(2649, 32, 'Ahmed Abou El Fotouh', 'Unknown', 6.8, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(2654, 32, 'Mohamed Hany', 'Unknown', 7.7, 0, '2025-05-07 21:13:39', '2025-05-07 21:31:46'),
(2664, 32, 'Trézéguet', 'Unknown', 6, 0, '2025-05-04 08:04:55', '2025-05-04 08:04:55'),
(2674, 27, 'Rui Patrício', 'Unknown', 8.1, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(2678, 27, 'Diogo Jota', 'Unknown', 8.7, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(2681, 22, 'P. Niazmand', 'Unknown', 8.6, 0, '2025-05-07 21:13:23', '2025-05-07 21:31:28'),
(2682, 22, 'A. Beiranvand', 'Unknown', 12.5, 0, '2025-05-07 21:13:23', '2025-05-07 21:31:28'),
(2683, 22, 'R. Cheshmi', 'Unknown', 10.3, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(2685, 22, 'E. Hajisafi', 'Unknown', 5.7, 0, '2025-05-04 08:04:46', '2025-05-04 08:04:46'),
(2686, 22, 'M. Hosseini', 'Unknown', 10.9, 0, '2025-05-04 08:04:46', '2025-05-04 08:04:46'),
(2687, 22, 'H. Kanani', 'Unknown', 4.4, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(2688, 22, 'M. Mohammadi', 'Unknown', 7.5, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(2691, 22, 'R. Rezaeian', 'Unknown', 10.2, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(2694, 22, 'O. Ebrahimi', 'Unknown', 4.8, 0, '2025-05-04 08:04:46', '2025-05-04 08:04:46'),
(2697, 22, 'M. Torabi', 'Unknown', 7.2, 0, '2025-05-07 21:13:23', '2025-05-07 21:25:07'),
(2698, 22, 'K. Ansarifard', 'Unknown', 7.5, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(2699, 22, 'S. Ghoddos', 'Unknown', 11.9, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(2700, 22, 'A. Jahanbakhsh', 'Unknown', 10.9, 0, '2025-05-04 08:04:46', '2025-05-04 08:04:46'),
(2701, 31, 'Y. Bounou', 'Unknown', 11.8, 0, '2025-05-04 08:04:54', '2025-05-04 08:04:54'),
(2702, 31, 'M. Mohamedi', 'Unknown', 9.2, 0, '2025-05-07 21:13:38', '2025-05-07 21:31:44'),
(2710, 31, 'S. Boufal', 'Unknown', 8.2, 0, '2025-05-04 08:04:54', '2025-05-04 08:04:54'),
(2716, 31, 'R. Saïss', 'Unknown', 5.5, 0, '2025-05-04 08:04:54', '2025-05-04 08:04:54'),
(2724, 2, 'L. Digne', 'Unknown', 7.4, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(2729, 21, 'J. Andersen', 'Unknown', 7.4, 0, '2025-05-07 21:13:22', '2025-05-07 21:31:26'),
(2731, 21, 'M. Jørgensen', 'Unknown', 8.3, 0, '2025-05-04 08:04:45', '2025-05-04 08:04:45'),
(2733, 21, 'J. Stryger Larsen', 'Unknown', 5.7, 0, '2025-05-04 08:04:45', '2025-05-04 08:04:45'),
(2741, 20, 'M. Ryan', 'Unknown', 6.4, 0, '2025-05-07 21:13:20', '2025-05-07 21:31:25'),
(2742, 20, 'M. Degenek', 'Unknown', 4.8, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(2749, 20, 'J. Irvine', 'Unknown', 5.5, 0, '2025-05-07 21:13:20', '2025-05-07 21:25:03'),
(2752, 20, 'M. Luongo', 'Unknown', 4.9, 0, '2025-05-07 21:13:20', '2025-05-07 21:31:25'),
(2755, 20, 'A. Mabil', 'Unknown', 11.7, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(2763, 3, 'M. Pašalić', 'Unknown', 7.3, 0, '2025-05-07 21:12:53', '2025-05-07 21:30:56'),
(2768, 19, 'J. Collins', 'Unknown', 10.2, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:43'),
(2771, 19, 'O. Aina', 'Unknown', 9.4, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:23'),
(2772, 19, 'K. Omeruo', 'Unknown', 11.9, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:23'),
(2773, 19, 'W. Troost-Ekong', 'Unknown', 7.5, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:43'),
(2778, 19, 'K. Ịheanachọ', 'Unknown', 11.9, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:43'),
(2779, 19, 'A. Musa', 'Unknown', 10.2, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:23'),
(2780, 19, 'V. Osimhen', 'Unknown', 9.8, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:43'),
(2781, 19, 'M. Simon', 'Unknown', 8.5, 0, '2025-05-07 21:13:19', '2025-05-07 21:31:23'),
(2790, 18, 'J. Guðmunds­son', 'Unknown', 11.1, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:42'),
(2792, 18, 'A. Gunnarsson', 'Unknown', 11.8, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:42'),
(2795, 18, 'G. Sigurðsson', 'Unknown', 10.8, 0, '2025-05-07 21:13:17', '2025-05-07 21:31:21'),
(2797, 18, 'A. Finnbogason', 'Unknown', 8.9, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:21'),
(2801, 15, 'J. Omlin', 'Unknown', 12.4, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(2802, 15, 'Y. Sommer', 'Unknown', 6.8, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(2803, 15, 'N. Elvedi', 'Unknown', 8.9, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(2806, 15, 'F. Schär', 'Unknown', 11.9, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(2809, 15, 'R. Steffen', 'Unknown', 9.3, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(2810, 15, 'D. Zakaria', 'Unknown', 5.6, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(2811, 15, 'S. Zuber', 'Unknown', 12, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(2817, 14, 'N. Milenković', 'Unknown', 8.8, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(2821, 14, 'M. Veljković', 'Unknown', 8.9, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(2823, 14, 'S. Lukić', 'Unknown', 9.1, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(2833, 29, 'G. González', 'Unknown', 10.5, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(2852, 5, 'L. Augustinsson', 'Unknown', 7.3, 0, '2025-05-04 08:02:01', '2025-05-04 08:04:30'),
(2854, 5, 'F. Helander', 'Unknown', 9.4, 0, '2025-05-04 08:02:01', '2025-05-07 21:30:59'),
(2860, 38, 'K. Sema', 'Unknown', 10.8, 0, '2025-05-04 08:02:01', '2025-05-07 21:31:58'),
(2869, 16, 'E. Álvarez', 'Unknown', 11.8, 0, '2025-05-04 08:02:11', '2025-05-07 21:31:18'),
(2873, 16, 'C. Montes', 'Unknown', 12.5, 0, '2025-05-04 08:02:11', '2025-05-04 08:04:40'),
(2887, 16, 'R. Jiménez', 'Unknown', 11.3, 0, '2025-05-04 08:02:11', '2025-05-07 21:31:18'),
(2890, 17, 'Jo Hyeon-Woo', 'Unknown', 4.7, 0, '2025-05-07 21:13:15', '2025-05-07 21:31:19'),
(2892, 17, 'Kim Seung-Gyu', 'Unknown', 4.2, 0, '2025-05-04 08:02:12', '2025-05-04 08:04:41'),
(2895, 17, 'Jung Seung-Hyun', 'Unknown', 12, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(2896, 17, 'Kim Jin-Su', 'Unknown', 10.2, 0, '2025-05-04 08:02:12', '2025-05-04 08:04:41'),
(2897, 17, 'Kim Min-Jae', 'Unknown', 11.9, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(2898, 17, 'Kim Young-Gwon', 'Unknown', 7.3, 0, '2025-05-07 21:13:15', '2025-05-07 21:31:19'),
(2901, 17, 'Hwang In-Beom', 'Unknown', 6.3, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(2906, 17, 'Lee Jae-Sung', 'Unknown', 5.3, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(2918, 1, 'K. Casteels', 'Unknown', 6.3, 0, '2025-05-04 08:01:57', '2025-05-04 08:01:57'),
(2919, 1, 'M. Sels', 'Unknown', 6.8, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(2920, 1, 'T. Castagne', 'Unknown', 10.5, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(2923, 1, 'Y. Carrasco', 'Unknown', 4.1, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(2926, 1, 'Y. Tielemans', 'Unknown', 8.7, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(2927, 1, 'M. Batshuayi', 'Unknown', 5.2, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(2932, 10, 'J. Pickford', 'Unknown', 9.7, 0, '2025-05-04 08:02:05', '2025-05-07 21:31:07'),
(2933, 10, 'B. Chilwell', 'Unknown', 5.4, 0, '2025-05-04 08:02:05', '2025-05-07 21:31:07'),
(2935, 10, 'H. Maguire', 'Unknown', 7.5, 0, '2025-05-07 21:13:04', '2025-05-07 21:31:07'),
(2941, 28, 'M. Hassen', 'Unknown', 12.2, 0, '2025-05-04 08:04:51', '2025-05-07 21:31:39'),
(2946, 28, 'O. Haddadi', 'Unknown', 10.6, 0, '2025-05-04 08:04:51', '2025-05-07 21:31:39'),
(2947, 28, 'A. Maâloul', 'Unknown', 7.8, 0, '2025-05-07 21:13:33', '2025-05-07 21:31:39'),
(2954, 28, 'W. Kechrida', 'Unknown', 11.7, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(2958, 28, 'N. Sliti', 'Unknown', 8.7, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(2959, 28, 'B. Srarfi', 'Unknown', 6.9, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(2964, 28, 'Y. Msakni', 'Unknown', 9.4, 0, '2025-05-04 08:04:52', '2025-05-04 08:04:52'),
(2967, 11, 'L. Mejía', 'Unknown', 6.5, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(2970, 11, 'É. Davis', 'Unknown', 11.4, 0, '2025-05-07 21:13:05', '2025-05-07 21:31:08'),
(2975, 11, 'C. Blackman', 'Unknown', 10.2, 0, '2025-05-04 08:02:06', '2025-05-04 08:04:36'),
(2978, 11, 'A. Quintero', 'Unknown', 9.1, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(2986, 13, 'É. Mendy', 'Unknown', 11.9, 0, '2025-05-04 08:02:08', '2025-05-04 08:04:38'),
(2990, 13, 'I. Gueye', 'Unknown', 9.9, 0, '2025-05-04 08:02:08', '2025-05-07 21:31:12'),
(2991, 13, 'C. Kouyaté', 'Unknown', 8.1, 0, '2025-05-04 08:02:08', '2025-05-07 21:31:12'),
(2998, 24, 'Ł. Skorupski', 'Unknown', 8.5, 0, '2025-05-07 21:13:27', '2025-05-07 21:31:31'),
(2999, 24, 'J. Bednarek', 'Unknown', 10.5, 0, '2025-05-07 21:13:27', '2025-05-07 21:31:31'),
(3007, 24, 'P. Frankowski', 'Unknown', 10.1, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(3012, 24, 'K. Grosicki', 'Unknown', 9.9, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(5923, 8, 'M. Cassierra', 'Unknown', 4.3, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(5994, 8, 'J. Carrascal', 'Unknown', 8.8, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(5996, 26, 'E. Fernández', 'Unknown', 7.4, 0, '2025-05-04 08:04:50', '2025-05-07 21:31:36'),
(6000, 26, 'L. Martínez', 'Unknown', 9.6, 0, '2025-05-04 08:04:50', '2025-05-04 08:04:50'),
(6002, 26, 'E. Palacios', 'Unknown', 11.1, 0, '2025-05-07 21:13:30', '2025-05-07 21:31:36'),
(6009, 26, 'J. Álvarez', 'Unknown', 9.1, 0, '2025-05-04 08:04:50', '2025-05-07 21:31:36'),
(6011, 8, 'R. Borré', 'Unknown', 11.3, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(6503, 26, 'N. Molina', 'Unknown', 8.6, 0, '2025-05-04 08:04:50', '2025-05-07 21:31:36'),
(6610, 26, 'M. Senesi', 'Unknown', 9.6, 0, '2025-05-04 08:04:50', '2025-05-07 21:31:36'),
(6716, 26, 'A. Mac Allister', 'Unknown', 12.3, 0, '2025-05-04 08:04:50', '2025-05-07 21:31:36'),
(6820, 20, 'A. Redmayne', 'Unknown', 11.5, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:25'),
(6845, 20, 'L. Thomas', 'Unknown', 8.8, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:25'),
(6885, 20, 'R. Strain', 'Unknown', 6.7, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(6888, 20, 'C. Goodwin', 'Unknown', 10.1, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(6904, 20, 'C. Metcalfe', 'Unknown', 11.5, 0, '2025-05-07 21:13:20', '2025-05-07 21:31:25'),
(6908, 20, 'N. Atkinson', 'Unknown', 8.2, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(6913, 20, 'R. McGree', 'Unknown', 8.1, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(6918, 20, 'B. Fornaroli', 'Unknown', 8.8, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:25'),
(6984, 20, 'K. Baccus', 'Unknown', 11.3, 0, '2025-05-07 21:13:20', '2025-05-07 21:31:25'),
(7029, 20, 'J. Gauci', 'Unknown', 7, 0, '2025-05-07 21:13:20', '2025-05-07 21:31:25'),
(7037, 20, 'L. Miller', 'Unknown', 5.5, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(7038, 20, 'K. Rowles', 'Unknown', 6.1, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(7050, 20, 'A. O&apos;Neill', 'Unknown', 5.3, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(7332, 3, 'L. Sučić', 'Unknown', 7.6, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(7712, 21, 'M. Hjulmand', 'Unknown', 6.3, 0, '2025-05-04 08:04:45', '2025-05-04 08:04:45'),
(7722, 39, 'S. Kalajdzic', 'Unknown', 5.1, 0, '2025-05-04 08:05:01', '2025-05-04 08:05:01'),
(8450, 13, 'A. Seck', 'Unknown', 5.4, 0, '2025-05-07 21:13:08', '2025-05-07 21:31:12'),
(8500, 12, 'W. Endo', 'Unknown', 7.1, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(8564, 22, 'A. Gholizadeh', 'Unknown', 6.1, 0, '2025-05-04 08:04:46', '2025-05-04 08:04:46'),
(8587, 31, 'S. Amallah', 'Unknown', 5.8, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:44'),
(8673, 1, 'O. Deman', 'Unknown', 7.3, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(8694, 1, 'W. Faes', 'Unknown', 12.5, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(8782, 24, 'B. Kapustka', 'Unknown', 11.2, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(8918, 31, 'T. Tissoudali', 'Unknown', 8.1, 0, '2025-05-04 08:04:54', '2025-05-07 21:25:23'),
(9920, 6, 'Raphael Veiga', 'Unknown', 4.3, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(9933, 8, 'M. Borja', 'Unknown', 5.6, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:04'),
(9971, 33, 'Antony', 'Unknown', 9.6, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(10009, 6, 'Rodrygo', 'Unknown', 6.1, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:01'),
(10081, 6, 'Rafael', 'Unknown', 12.3, 0, '2025-05-04 08:02:02', '2025-05-04 08:02:02'),
(10083, 6, 'Murilo', 'Unknown', 8.7, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(10089, 6, 'Fabrício Bruno', 'Unknown', 5.4, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(10122, 6, 'Renan Lodi', 'Unknown', 7.4, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(10135, 6, 'Bruno Guimarães', 'Unknown', 12, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(10297, 7, 'G. de Amores', 'Unknown', 11.4, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(10306, 6, 'Nino', 'Unknown', 8.4, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(10329, 6, 'João Pedro', 'Unknown', 5, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(10401, 30, 'P. Guerrero', 'Unknown', 7.1, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(10500, 6, 'Pepê Aquino', 'Unknown', 11.2, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(13151, 8, 'J. Portilla', 'Unknown', 10.2, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:04'),
(13289, 8, 'A. Reyes', 'Unknown', 5.2, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(13310, 8, 'S. Gómez', 'Unknown', 4.9, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:04'),
(13572, 8, 'G. Fuentes', 'Unknown', 9.5, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(13708, 8, 'J. Arias', 'Unknown', 12, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(13736, 8, 'D. Muñoz', 'Unknown', 6.2, 0, '2025-05-07 21:13:01', '2025-05-07 21:31:04'),
(13880, 29, 'Y. Salinas', 'Unknown', 10.9, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(13916, 29, 'K. Porras', 'Unknown', 9.4, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(13949, 29, 'Y. Salas', 'Unknown', 6.3, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(14081, 29, 'J. Daly', 'Unknown', 9.9, 0, '2025-05-07 21:13:35', '2025-05-07 21:31:41'),
(14104, 29, 'F. Faerrón', 'Unknown', 4.4, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(14146, 29, 'J. Brenes', 'Unknown', 11.6, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(14297, 3, 'I. Ivušić', 'Unknown', 4.2, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(14330, 3, 'J. Juranović', 'Unknown', 7.8, 0, '2025-05-07 21:12:53', '2025-05-07 21:30:56'),
(14394, 3, 'L. Ivanušec', 'Unknown', 11.4, 0, '2025-05-04 08:01:59', '2025-05-04 08:04:29'),
(14395, 3, 'K. Jakić', 'Unknown', 8.8, 0, '2025-05-07 21:12:53', '2025-05-07 21:30:56'),
(14553, 3, 'N. Labrović', 'Unknown', 6, 0, '2025-05-07 21:12:53', '2025-05-07 21:30:56'),
(14701, 3, 'J. Šutalo', 'Unknown', 9.8, 0, '2025-05-04 08:01:59', '2025-05-04 08:04:29'),
(15396, 19, 'F. Uzoho', 'Unknown', 4.3, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:23'),
(15623, 21, 'A. Bah', 'Unknown', 9.2, 0, '2025-05-04 08:04:45', '2025-05-04 08:04:45'),
(15683, 5, 'G. Nilsson', 'Unknown', 10, 0, '2025-05-04 08:02:01', '2025-05-04 08:04:30'),
(15797, 5, 'J. Cajuste', 'Unknown', 9.7, 0, '2025-05-07 21:12:56', '2025-05-07 21:30:59'),
(15799, 19, 'F. Onyeka', 'Unknown', 8.3, 0, '2025-05-07 21:13:19', '2025-05-07 21:31:23'),
(15812, 19, 'P. Onuachu', 'Unknown', 6.7, 0, '2025-05-07 21:13:19', '2025-05-07 21:31:23'),
(15870, 21, 'M. Hermansen', 'Unknown', 5.4, 0, '2025-05-07 21:13:22', '2025-05-07 21:31:26'),
(15884, 21, 'J. Lindstrøm', 'Unknown', 9.7, 0, '2025-05-07 21:13:22', '2025-05-07 21:31:26'),
(15897, 21, 'P. Vindahl', 'Unknown', 11.5, 0, '2025-05-04 08:04:45', '2025-05-07 21:31:26'),
(16105, 21, 'A. Hansen', 'Unknown', 11.4, 0, '2025-05-04 08:04:45', '2025-05-07 21:31:26'),
(16126, 38, 'M. Rajović', 'Unknown', 6.5, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(16804, 32, 'Yasser Ibrahim', 'Unknown', 7.9, 0, '2025-05-07 21:13:39', '2025-05-07 21:31:46'),
(16811, 32, 'Hussein El Shahat', 'Unknown', 6.3, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(16813, 32, 'Hamdi Fathy', 'Unknown', 4.8, 0, '2025-05-04 08:04:55', '2025-05-04 08:04:55'),
(16843, 32, 'Mohamed Magdi Kafsha', 'Unknown', 4.8, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(16871, 32, 'Zizo', 'Unknown', 8.4, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(16933, 28, 'S. Jaziri', 'Unknown', 8.5, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(16991, 32, 'Mohamed El Shamy', 'Unknown', 4.4, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(17047, 32, 'Akram Tawfik', 'Unknown', 11.3, 0, '2025-05-07 21:13:39', '2025-05-07 21:31:46'),
(17104, 32, 'Mahmoud Hamada', 'Unknown', 4.4, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(17143, 32, 'Ahmed Ramadan', 'Unknown', 10.2, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(17190, 32, 'Mohamed Sobhi', 'Unknown', 10.8, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(17269, 32, 'Emam Ashour', 'Unknown', 7.3, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(17461, 20, 'G. Jones', 'Unknown', 6.1, 0, '2025-05-07 21:13:20', '2025-05-07 21:31:25'),
(17661, 10, 'J. Branthwaite', 'Unknown', 12.1, 0, '2025-05-04 08:02:05', '2025-05-07 21:31:07'),
(18592, 13, 'I. Ndiaye', 'Unknown', 4.5, 0, '2025-05-04 08:02:08', '2025-05-07 21:31:12'),
(18744, 39, 'M. Kilman', 'Unknown', 11.8, 0, '2025-05-04 08:05:01', '2025-05-07 21:31:59'),
(18748, 27, 'Pote', 'Unknown', 6.6, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(18753, 36, 'Adama Traoré', 'Unknown', 6.4, 0, '2025-05-04 08:04:58', '2025-05-04 08:04:58'),
(18767, 19, 'A. Lookman', 'Unknown', 11.7, 0, '2025-05-07 21:13:19', '2025-05-07 21:31:23'),
(18784, 10, 'J. Maddison', 'Unknown', 9.4, 0, '2025-05-07 21:13:04', '2025-05-07 21:31:07'),
(18786, 19, 'W. Ndidi', 'Unknown', 5.3, 0, '2025-05-07 21:13:19', '2025-05-07 21:31:23'),
(18812, 40, 'Adrián', 'Unknown', 5.5, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(18815, 35, 'R. Fredericks', 'Unknown', 7.1, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(18860, 35, 'M. Travers', 'Unknown', 9.7, 0, '2025-05-04 08:04:57', '2025-05-04 08:04:57'),
(18873, 34, 'R. Fraser', 'Unknown', 9.5, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(18883, 35, 'D. Solanke', 'Unknown', 4.3, 0, '2025-05-07 21:13:04', '2025-05-07 21:31:52'),
(18892, 34, 'P. Dummett', 'Unknown', 5.9, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(18899, 34, 'I. Hayden', 'Unknown', 4.2, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(18903, 34, 'M. Ritchie', 'Unknown', 11.4, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(18906, 9, 'Ayoze Pérez', 'Unknown', 7.6, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(18907, 9, 'Joselu', 'Unknown', 6.6, 0, '2025-05-04 08:02:04', '2025-05-04 08:04:34'),
(18943, 21, 'J. Vestergaard', 'Unknown', 8.4, 0, '2025-05-07 21:13:22', '2025-05-07 21:31:26'),
(18947, 39, 'M. Lemina', 'Unknown', 8.4, 0, '2025-05-04 08:05:01', '2025-05-04 08:05:01'),
(18979, 5, 'V. Gyökeres', 'Unknown', 7.4, 0, '2025-05-04 08:02:01', '2025-05-04 08:04:30'),
(19004, 36, 'B. De Cordova-Reid', 'Unknown', 11.7, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:53'),
(19010, 37, 'D. Ward', 'Unknown', 5.4, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(19023, 36, 'T. Ream', 'Unknown', 6.8, 0, '2025-05-04 08:04:58', '2025-05-04 08:04:58'),
(19038, 38, 'B. Hamer', 'Unknown', 10.3, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(19043, 36, 'T. Kongolo', 'Unknown', 7.7, 0, '2025-05-04 08:04:58', '2025-05-04 08:04:58'),
(19070, 35, 'M. Aarons', 'Unknown', 6.6, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(19076, 38, 'J. Lewis', 'Unknown', 5.9, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(19088, 10, 'D. Henderson', 'Unknown', 8, 0, '2025-05-07 21:13:04', '2025-05-07 21:31:07'),
(19130, 10, 'K. Phillips', 'Unknown', 9.1, 0, '2025-05-04 08:02:05', '2025-05-07 21:31:07'),
(19142, 38, 'J. Bond', 'Unknown', 10.4, 0, '2025-05-04 08:05:00', '2025-05-04 08:05:00'),
(19143, 10, 'S. Johnstone', 'Unknown', 12.4, 0, '2025-05-04 08:02:05', '2025-05-07 21:31:07'),
(19145, 36, 'T. Adarabioyo', 'Unknown', 6.9, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:53'),
(19149, 32, 'Ahmed Hegazy', 'Unknown', 9.6, 0, '2025-05-04 08:04:55', '2025-05-04 08:04:55'),
(19160, 38, 'J. Livermore', 'Unknown', 9, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(19187, 10, 'J. Grealish', 'Unknown', 7.5, 0, '2025-05-04 08:02:05', '2025-05-04 08:04:35'),
(19229, 35, 'D. Randolph', 'Unknown', 12.2, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(19263, 35, 'L. Kelly', 'Unknown', 7.7, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(19281, 35, 'A. Semenyo', 'Unknown', 5.3, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(19298, 24, 'M. Cash', 'Unknown', 11.5, 0, '2025-05-07 21:13:27', '2025-05-07 21:31:31'),
(19343, 18, 'P. Gunnarsson', 'Unknown', 9.2, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:42'),
(19345, 21, 'M. Bech', 'Unknown', 10.7, 0, '2025-05-04 08:04:45', '2025-05-07 21:31:26'),
(19356, 35, 'E. Marcondes', 'Unknown', 10.8, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(19428, 10, 'J. Bowen', 'Unknown', 4.1, 0, '2025-05-04 08:02:05', '2025-05-07 21:31:07'),
(19496, 37, 'T. Edwards', 'Unknown', 4.2, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(19586, 10, 'E. Eze', 'Unknown', 9, 0, '2025-05-04 08:02:05', '2025-05-07 21:31:07'),
(19588, 19, 'B. Osayi-Samuel', 'Unknown', 11.3, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:43'),
(19591, 24, 'P. Wszołek', 'Unknown', 8.5, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(19599, 26, 'E. Martínez', 'Unknown', 9.4, 0, '2025-05-04 08:04:50', '2025-05-07 21:31:36'),
(19614, 22, 'S. Ezatolahi', 'Unknown', 8.2, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(19617, 2, 'M. Olise', 'Unknown', 11.5, 0, '2025-05-07 21:12:52', '2025-05-07 21:30:54'),
(19657, 36, 'M. Rodák', 'Unknown', 5.1, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:53'),
(19804, 35, 'K. Moore', 'Unknown', 5.3, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(19825, 19, 'J. Aribo', 'Unknown', 5, 0, '2025-05-07 21:13:19', '2025-05-07 21:25:02'),
(19974, 10, 'I. Toney', 'Unknown', 6.9, 0, '2025-05-04 08:02:05', '2025-05-04 08:04:35'),
(20079, 20, 'H. Souttar', 'Unknown', 7.1, 0, '2025-05-07 21:13:20', '2025-05-07 21:31:25'),
(20355, 10, 'A. Ramsdale', 'Unknown', 7.3, 0, '2025-05-07 21:13:04', '2025-05-07 21:31:07'),
(20415, 37, 'F. Ladapo', 'Unknown', 12.5, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(20457, 20, 'C. Burgess', 'Unknown', 4, 0, '2025-05-07 21:13:20', '2025-05-07 21:31:25'),
(20535, 13, 'H. Diallo', 'Unknown', 9.2, 0, '2025-05-04 08:02:08', '2025-05-04 08:04:38'),
(20696, 13, 'P. Gueye', 'Unknown', 5.6, 0, '2025-05-04 08:02:08', '2025-05-07 21:31:12'),
(21694, 31, 'N. Aguerd', 'Unknown', 4.3, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:44'),
(21998, 2, 'A. Disasi', 'Unknown', 12.1, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(21999, 1, 'B. Engels', 'Unknown', 7, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(22015, 13, 'B. Dia', 'Unknown', 7.3, 0, '2025-05-07 21:13:08', '2025-05-07 21:31:12'),
(22090, 2, 'W. Saliba', 'Unknown', 6.8, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(22094, 2, 'W. Fofana', 'Unknown', 9.1, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(22157, 26, 'W. Benítez', 'Unknown', 11.7, 0, '2025-05-04 08:04:50', '2025-05-04 08:04:50'),
(22224, 6, 'Gabriel Magalhães', 'Unknown', 12.4, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(24760, 40, 'G. Mamardashvili', 'Unknown', 11, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(24810, 8, 'J. Córdoba', 'Unknown', 6.6, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(24882, 1, 'O. Mangala', 'Unknown', 9, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(24888, 17, 'Hwang Hee-Chan', 'Unknown', 11.7, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(24903, 25, 'R. Andrich', 'Unknown', 6.7, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:34'),
(24985, 21, 'A. Sørensen', 'Unknown', 7.1, 0, '2025-05-04 08:04:45', '2025-05-07 21:31:26'),
(25004, 25, 'S. Ortega', 'Unknown', 5, 0, '2025-05-04 08:04:49', '2025-05-04 08:04:49'),
(25282, 15, 'G. Kobel', 'Unknown', 7.7, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(25313, 25, 'J. Beste', 'Unknown', 5.5, 0, '2025-05-07 21:13:29', '2025-05-07 21:31:34'),
(25375, 12, 'T. Asano', 'Unknown', 6.2, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(25391, 25, 'N. Füllkrug', 'Unknown', 4.3, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:34'),
(25458, 1, 'D. Lukebakio', 'Unknown', 8.9, 0, '2025-05-04 08:01:57', '2025-05-07 21:30:53'),
(25464, 25, 'M. Ducksch', 'Unknown', 9, 0, '2025-05-04 08:04:49', '2025-05-04 08:04:49'),
(25635, 25, 'J. Hofmann', 'Unknown', 11, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:34'),
(26238, 25, 'R. Koch', 'Unknown', 9.9, 0, '2025-05-07 21:13:29', '2025-05-07 21:31:34'),
(26253, 20, 'B. Borello', 'Unknown', 4.8, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:25'),
(26315, 26, 'N. González', 'Unknown', 12.4, 0, '2025-05-07 21:13:30', '2025-05-07 21:31:36'),
(26519, 17, 'Hong Hyun-Seok', 'Unknown', 10.7, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(28646, 18, 'K. Finnsson', 'Unknown', 5.7, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:42'),
(28700, 18, 'B. Bjarkason', 'Unknown', 8.1, 0, '2025-05-07 21:13:17', '2025-05-07 21:31:21'),
(28733, 18, 'B. Willumsson', 'Unknown', 4.6, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:42'),
(28744, 18, 'Þ. Helgason', 'Unknown', 11.9, 0, '2025-05-07 21:13:17', '2025-05-07 21:31:21'),
(28775, 18, 'B. Bjarnason', 'Unknown', 7, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:42'),
(28806, 18, 'L. Tómasson', 'Unknown', 8.9, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:42'),
(29704, 22, 'S. Khalilzadeh', 'Unknown', 12.1, 0, '2025-05-07 21:13:23', '2025-05-07 21:31:28'),
(29755, 22, 'H. Hosseini', 'Unknown', 6.1, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(29781, 22, 'M. Ghaedi', 'Unknown', 10.6, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(29932, 22, 'R. Asadi', 'Unknown', 11.8, 0, '2025-05-07 21:13:23', '2025-05-07 21:31:28'),
(30413, 3, 'M. Pjaca', 'Unknown', 9.5, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(30415, 14, 'D. Vlahović', 'Unknown', 8.7, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(30435, 5, 'D. Kulusevski', 'Unknown', 9.6, 0, '2025-05-07 21:12:56', '2025-05-07 21:30:59'),
(30765, 35, 'I. Radu', 'Unknown', 12.3, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(30776, 26, 'C. Romero', 'Unknown', 5.6, 0, '2025-05-07 21:13:30', '2025-05-07 21:31:36'),
(30921, 24, 'P. Dawidowicz', 'Unknown', 9.7, 0, '2025-05-07 21:13:27', '2025-05-07 21:31:31'),
(30996, 5, 'M. Rohdén', 'Unknown', 5.1, 0, '2025-05-04 08:02:01', '2025-05-07 21:30:59'),
(31033, 7, 'N. Schiappacasse', 'Unknown', 7.2, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(31047, 21, 'J. Rasmussen', 'Unknown', 4.6, 0, '2025-05-04 08:04:45', '2025-05-07 21:31:26'),
(31156, 14, 'V. Milinković-Savić', 'Unknown', 11.7, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(31406, 19, 'U. Sadiq', 'Unknown', 8.2, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:23'),
(32858, 12, 'T. Watanabe', 'Unknown', 7.7, 0, '2025-05-04 08:02:07', '2025-05-04 08:04:37'),
(32862, 12, 'T. Kubo', 'Unknown', 11.2, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(32882, 12, 'H. Fujii', 'Unknown', 10, 0, '2025-05-04 08:02:07', '2025-05-04 08:04:37'),
(32887, 12, 'Y. Sugawara', 'Unknown', 10.8, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(32893, 12, 'H. Ito', 'Unknown', 4.9, 0, '2025-05-07 21:13:07', '2025-05-07 21:31:10'),
(32923, 12, 'R. Ito', 'Unknown', 10.2, 0, '2025-05-04 08:02:07', '2025-05-04 08:04:37'),
(32954, 12, 'S. Taniguchi', 'Unknown', 11.7, 0, '2025-05-04 08:02:07', '2025-05-04 08:04:37'),
(32960, 12, 'H. Morita', 'Unknown', 4.8, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(32966, 12, 'A. Tanaka', 'Unknown', 11.1, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(33067, 12, 'K. Machida', 'Unknown', 8.7, 0, '2025-05-04 08:02:07', '2025-05-04 08:04:37'),
(33224, 12, 'D. Maeda', 'Unknown', 5.1, 0, '2025-05-04 08:02:07', '2025-05-04 08:04:37'),
(33321, 12, 'Keito Nakamura', 'Unknown', 9.1, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(33615, 12, 'M. Hosoya', 'Unknown', 11.6, 0, '2025-05-07 21:13:07', '2025-05-07 21:31:10'),
(33889, 12, 'K. Sano', 'Unknown', 9.4, 0, '2025-05-07 21:13:07', '2025-05-07 21:31:10'),
(33910, 12, 'T. Kawamura', 'Unknown', 8.7, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(34211, 17, 'Cho Gue-Sung', 'Unknown', 12.4, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(34374, 17, 'Song Bum-Keun', 'Unknown', 8.3, 0, '2025-05-07 21:13:15', '2025-05-07 21:31:19'),
(34392, 17, 'Moon Seon-Min', 'Unknown', 8.4, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(34417, 17, 'Kim Tae-Hwan', 'Unknown', 5.6, 0, '2025-05-07 21:13:15', '2025-05-07 21:31:19'),
(34435, 17, 'Park Yong-Woo', 'Unknown', 8.8, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(34496, 17, 'Kim Ju-Sung', 'Unknown', 6.1, 0, '2025-05-04 08:02:12', '2025-05-04 08:04:41'),
(34710, 17, 'Oh Hyeon-Gyu', 'Unknown', 12, 0, '2025-05-04 08:02:12', '2025-05-04 08:04:41'),
(35532, 16, 'J. Quiñones', 'Unknown', 9.1, 0, '2025-05-04 08:02:11', '2025-05-04 08:04:40'),
(35542, 16, 'G. Sánchez', 'Unknown', 5.6, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(35544, 16, 'J. Vásquez', 'Unknown', 10.3, 0, '2025-05-04 08:02:11', '2025-05-07 21:31:18'),
(35576, 16, 'O. Pineda', 'Unknown', 9.5, 0, '2025-05-04 08:02:11', '2025-05-04 08:04:40'),
(35690, 16, 'L. Chávez', 'Unknown', 4.8, 0, '2025-05-04 08:02:11', '2025-05-04 08:04:40'),
(35769, 16, 'C. Acevedo', 'Unknown', 12.3, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(35797, 16, 'A. Rodríguez', 'Unknown', 9.9, 0, '2025-05-04 08:02:11', '2025-05-04 08:04:40'),
(35830, 16, 'A. Gómez', 'Unknown', 5.9, 0, '2025-05-04 08:02:11', '2025-05-04 08:04:40'),
(35850, 16, 'J. Márquez', 'Unknown', 10.5, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(35943, 16, 'R. Meraz', 'Unknown', 4.2, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(35993, 16, 'J. González', 'Unknown', 11.9, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(36111, 16, 'C. Huerta', 'Unknown', 6.9, 0, '2025-05-04 08:02:11', '2025-05-04 08:04:40'),
(36540, 31, 'A. Dari', 'Unknown', 8.2, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:44'),
(36579, 31, 'S. Rahimi', 'Unknown', 4.3, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:44'),
(36922, 40, 'S. van den Berg', 'Unknown', 10.2, 0, '2025-05-07 21:13:52', '2025-05-07 21:32:01'),
(37145, 33, 'T. Malacia', 'Unknown', 8.5, 0, '2025-05-04 08:04:56', '2025-05-04 08:04:56'),
(37161, 8, 'L. Sinisterra', 'Unknown', 7, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:04'),
(37186, 19, 'C. Dessers', 'Unknown', 9.9, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:43'),
(37242, 37, 'D. Burgzorg', 'Unknown', 12.1, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(37246, 25, 'J. Blaswich', 'Unknown', 12, 0, '2025-05-04 08:04:49', '2025-05-04 08:04:49'),
(37880, 18, 'M. Anderson', 'Unknown', 6.3, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:21'),
(38114, 12, 'K. Itakura', 'Unknown', 7.8, 0, '2025-05-07 21:13:07', '2025-05-07 21:31:10'),
(39071, 19, 'V. Boniface', 'Unknown', 5.7, 0, '2025-05-07 21:13:19', '2025-05-07 21:31:23'),
(39195, 18, 'D. Þór­halls­son', 'Unknown', 6.1, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:42'),
(39639, 30, 'P. Reyna', 'Unknown', 8.9, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(39778, 30, 'R. Solis', 'Unknown', 11.9, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(39800, 30, 'G. Távara', 'Unknown', 4.9, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(39919, 30, 'J. Rivera', 'Unknown', 4.1, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43');
INSERT INTO `players` (`id`, `team_id`, `name`, `position`, `price`, `total_points`, `created_at`, `updated_at`) VALUES
(40224, 24, 'P. Bochniewicz', 'Unknown', 8.3, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(40403, 24, 'S. Szymański', 'Unknown', 11.6, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(40495, 37, 'M. Helik', 'Unknown', 7.4, 0, '2025-05-04 08:04:59', '2025-05-04 08:04:59'),
(40534, 24, 'B. Slisz', 'Unknown', 10.6, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(40560, 24, 'J. Kamiński', 'Unknown', 6.1, 0, '2025-05-07 21:13:27', '2025-05-07 21:25:11'),
(40582, 24, 'S. Walukiewicz', 'Unknown', 7.5, 0, '2025-05-07 21:13:27', '2025-05-07 21:31:31'),
(40594, 24, 'A. Buksa', 'Unknown', 4.2, 0, '2025-05-04 08:04:48', '2025-05-07 21:31:31'),
(40809, 24, 'M. Skóraś', 'Unknown', 9.9, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(40911, 24, 'J. Moder', 'Unknown', 10.2, 0, '2025-05-04 08:04:48', '2025-05-07 21:31:31'),
(41103, 27, 'Ricardo Horta', 'Unknown', 6.8, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(41104, 36, 'João Palhinha', 'Unknown', 6.9, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:54'),
(41112, 27, 'Trincão', 'Unknown', 12.1, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(41169, 6, 'Léo Jardim', 'Unknown', 4.8, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(41197, 6, 'Galeno', 'Unknown', 4.7, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(41552, 13, 'P. Ciss', 'Unknown', 10.4, 0, '2025-05-04 08:02:08', '2025-05-07 21:31:12'),
(41577, 27, 'Nuno Tavares', 'Unknown', 10, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(41606, 27, 'Toti Gomes', 'Unknown', 6.1, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(41621, 27, 'Matheus Nunes', 'Unknown', 11.5, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(41734, 27, 'João Mário', 'Unknown', 9.6, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(41960, 27, 'Ricardo Velho', 'Unknown', 7.4, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(42012, 28, 'E. Achouri', 'Unknown', 10.1, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(42315, 22, 'M. Taremi', 'Unknown', 4.9, 0, '2025-05-07 21:13:23', '2025-05-07 21:31:28'),
(43246, 28, 'A. Laïdouni', 'Unknown', 8.1, 0, '2025-05-04 08:04:52', '2025-05-04 08:04:52'),
(43443, 4, 'D. Vorobjev', 'Unknown', 9.7, 0, '2025-05-04 08:02:00', '2025-05-04 08:04:29'),
(43483, 4, 'A. Soldatenkov', 'Unknown', 7.4, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(43734, 4, 'M. Osipenko', 'Unknown', 11.8, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(43847, 4, 'I. Vakhania', 'Unknown', 8.3, 0, '2025-05-04 08:02:00', '2025-05-07 21:24:39'),
(44329, 23, 'Mohammed Al Burayk', 'Unknown', 9.6, 0, '2025-05-04 08:04:47', '2025-05-04 08:04:47'),
(44331, 23, 'Yasir Al Shahrani', 'Unknown', 8.6, 0, '2025-05-07 21:13:25', '2025-05-07 21:31:29'),
(44332, 23, 'Ali Al Bulayhi', 'Unknown', 11.1, 0, '2025-05-07 21:13:25', '2025-05-07 21:31:29'),
(44335, 23, 'Hassan Kadesh', 'Unknown', 5.9, 0, '2025-05-04 08:04:47', '2025-05-07 21:31:29'),
(44340, 23, 'Salem Al Dawsari', 'Unknown', 8.7, 0, '2025-05-07 21:13:25', '2025-05-07 21:31:30'),
(44341, 23, 'Salman Al Faraj', 'Unknown', 8.1, 0, '2025-05-04 08:04:47', '2025-05-04 08:04:47'),
(44349, 23, 'Mohamed Kanno', 'Unknown', 9.4, 0, '2025-05-07 21:13:25', '2025-05-07 21:31:30'),
(44362, 23, 'Hassan Tambakti', 'Unknown', 4.6, 0, '2025-05-07 21:13:25', '2025-05-07 21:31:30'),
(44411, 23, 'Mohammed Al Owais', 'Unknown', 7.7, 0, '2025-05-07 21:13:25', '2025-05-07 21:31:30'),
(44474, 32, 'Mohamed Awad', 'Unknown', 6.1, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(44475, 23, 'Abdulelah Al Amri', 'Unknown', 5.2, 0, '2025-05-04 08:04:47', '2025-05-07 21:31:30'),
(44485, 23, 'Fawaz Al Saqour', 'Unknown', 12.2, 0, '2025-05-04 08:04:47', '2025-05-07 21:31:30'),
(44551, 23, 'Saleh Al Shehri', 'Unknown', 11.3, 0, '2025-05-04 08:04:47', '2025-05-07 21:31:30'),
(44574, 23, 'Hamed Al Ghamdi', 'Unknown', 6.6, 0, '2025-05-04 08:04:47', '2025-05-07 21:31:30'),
(44594, 23, 'Saud Abdulhamid', 'Unknown', 6.8, 0, '2025-05-07 21:13:25', '2025-05-07 21:31:30'),
(44603, 23, 'Muhannad Al Shanqiti', 'Unknown', 12.4, 0, '2025-05-04 08:04:47', '2025-05-07 21:31:30'),
(44709, 23, 'Mohammed Al Yami', 'Unknown', 10.2, 0, '2025-05-07 21:13:25', '2025-05-07 21:31:30'),
(44754, 23, 'Ali Al Asmari', 'Unknown', 10.4, 0, '2025-05-04 08:04:47', '2025-05-07 21:31:30'),
(44843, 20, 'M. Boyle', 'Unknown', 10.2, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(45017, 21, 'A. Dreyer', 'Unknown', 12.3, 0, '2025-05-04 08:04:45', '2025-05-04 08:04:45'),
(45021, 13, 'S. Dieng', 'Unknown', 10.1, 0, '2025-05-04 08:02:08', '2025-05-04 08:04:38'),
(45788, 14, 'N. Čumić', 'Unknown', 5.1, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(45804, 14, 'V. Birmančević', 'Unknown', 4.7, 0, '2025-05-04 08:02:09', '2025-05-07 21:31:14'),
(45826, 14, 'S. Pavlović', 'Unknown', 8.5, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(45831, 14, 'S. Zdjelar', 'Unknown', 5.7, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(45950, 14, 'D. Zukić', 'Unknown', 12, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(46170, 14, 'I. Ilić', 'Unknown', 4.9, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(46653, 9, 'David García', 'Unknown', 8.7, 0, '2025-05-04 08:02:04', '2025-05-04 08:04:34'),
(46672, 27, 'Rui Silva', 'Unknown', 6.2, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(46746, 3, 'A. Budimir', 'Unknown', 8.5, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(46777, 14, 'Đ. Jovanović', 'Unknown', 5.9, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(46813, 31, 'A. Abqar', 'Unknown', 7.9, 100, '2025-05-04 08:04:54', '2025-05-13 05:58:53'),
(47269, 9, 'Álex Remiro', 'Unknown', 8.9, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(47270, 9, 'Unai Simón', 'Unknown', 10.7, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(47278, 9, 'Dani Vivian', 'Unknown', 4.8, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(47315, 9, 'Martín Zubimendi', 'Unknown', 5.5, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(47323, 9, 'Mikel Oyarzabal', 'Unknown', 11.3, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(47422, 31, 'Y. En-Nesyri', 'Unknown', 10.5, 0, '2025-05-04 08:04:54', '2025-05-04 08:04:54'),
(47430, 38, 'W. Hoedt', 'Unknown', 11.1, 0, '2025-05-04 08:05:00', '2025-05-04 08:05:00'),
(47463, 9, 'Pepelu', 'Unknown', 9.7, 0, '2025-05-07 21:13:02', '2025-05-07 21:31:05'),
(47499, 35, 'E. Ünal', 'Unknown', 10.2, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(47558, 14, 'A. Jovanović', 'Unknown', 6, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(47582, 8, 'C. Hernández', 'Unknown', 10.1, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:04'),
(47903, 5, 'H. Ekdal', 'Unknown', 11.3, 0, '2025-05-04 08:02:01', '2025-05-04 08:04:30'),
(47960, 5, 'E. Kurtulus', 'Unknown', 11.6, 0, '2025-05-04 08:02:01', '2025-05-07 21:30:59'),
(47988, 5, 'C. Starfelt', 'Unknown', 4.1, 0, '2025-05-04 08:02:01', '2025-05-07 21:30:59'),
(47998, 19, 'A. Yusuf', 'Unknown', 4.9, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:43'),
(48057, 5, 'O. Pettersson', 'Unknown', 6.1, 0, '2025-05-04 08:02:01', '2025-05-04 08:04:30'),
(48150, 5, 'A. Salétros', 'Unknown', 8.5, 0, '2025-05-04 08:02:01', '2025-05-04 08:04:30'),
(48185, 5, 'H. Castegren', 'Unknown', 10.8, 0, '2025-05-07 21:12:56', '2025-05-07 21:30:59'),
(48190, 18, 'A. Sampsted', 'Unknown', 6.4, 0, '2025-05-07 21:13:17', '2025-05-07 21:31:21'),
(48201, 18, 'G. Þórarinsson', 'Unknown', 10.2, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:21'),
(48372, 15, 'E. Cömert', 'Unknown', 8.6, 0, '2025-05-04 08:02:10', '2025-05-07 21:31:16'),
(48378, 15, 'S. Widmer', 'Unknown', 4.3, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(48379, 30, 'C. Zambrano', 'Unknown', 5.6, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(48389, 15, 'N. Okafor', 'Unknown', 4.1, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(48465, 15, 'F. Ugrinic', 'Unknown', 10.1, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(48471, 15, 'R. Vargas', 'Unknown', 9.3, 0, '2025-05-04 08:02:10', '2025-05-07 21:31:16'),
(48481, 15, 'L. Stergiou', 'Unknown', 12.4, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(48574, 15, 'C. Zesiger', 'Unknown', 11.9, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(48610, 15, 'K. Duah', 'Unknown', 11.4, 0, '2025-05-04 08:02:10', '2025-05-07 21:31:16'),
(48649, 15, 'A. Zeqiri', 'Unknown', 7.5, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(49419, 28, 'H. Jouini', 'Unknown', 5.4, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(49424, 28, 'A. Dahmen', 'Unknown', 8.3, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(49432, 28, 'H. Mathlouthi', 'Unknown', 7.8, 0, '2025-05-07 21:13:33', '2025-05-07 21:31:39'),
(49439, 28, 'A. Ghram', 'Unknown', 10.7, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(49442, 28, 'H. Jelassi', 'Unknown', 11.1, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(49610, 28, 'B. Ben Saïd', 'Unknown', 8, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(49636, 28, 'Houssem Teka', 'Unknown', 10.1, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(50026, 19, 'C. Awaziem', 'Unknown', 9, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:43'),
(50758, 29, 'J. Mora', 'Unknown', 5.1, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(50931, 30, 'C. Ascues', 'Unknown', 5.9, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(51051, 16, 'J. Araujo', 'Unknown', 9.9, 0, '2025-05-04 08:02:11', '2025-05-07 21:31:18'),
(51068, 16, 'E. Álvarez', 'Unknown', 6.7, 0, '2025-05-04 08:02:11', '2025-05-04 08:02:11'),
(51357, 7, 'M. Brasil', 'Unknown', 10.6, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(51360, 7, 'N. Furtado', 'Unknown', 8.9, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(51748, 7, 'J. Neris', 'Unknown', 7.6, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(51778, 7, 'F. Ginella', 'Unknown', 4.2, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(51833, 7, 'F. Pizzichillo', 'Unknown', 4.5, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(52022, 7, 'Facundo Nahuel Pérez Bertinat', 'Unknown', 8.9, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(53488, 4, 'A. Nigmatullin', 'Unknown', 9.6, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(53550, 4, 'E. Kharin', 'Unknown', 4.4, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(53552, 4, 'L. Sadulaev', 'Unknown', 4, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(53690, 4, 'A. Zinkovskiy', 'Unknown', 11.8, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(57141, 18, 'D. Grétarsson', 'Unknown', 5.1, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:21'),
(57667, 11, 'J. Ramos', 'Unknown', 4.7, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(57725, 11, 'E. Roberts', 'Unknown', 5.1, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(57736, 11, 'A. Ayarza', 'Unknown', 5.7, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(57803, 11, 'J. Gutiérrez', 'Unknown', 8.5, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(57910, 11, 'T. Rodríguez', 'Unknown', 5.8, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(57933, 11, 'S. Ramírez', 'Unknown', 8, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(61411, 14, 'E. Mašović', 'Unknown', 8.2, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(61431, 24, 'J. Kiwior', 'Unknown', 8.6, 0, '2025-05-07 21:13:27', '2025-05-07 21:25:11'),
(61489, 18, 'R. Sigurgeirsson', 'Unknown', 10.5, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:42'),
(61558, 18, 'S. Magnússon', 'Unknown', 4.6, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:21'),
(61641, 18, 'J. Svanþórsson', 'Unknown', 8.9, 0, '2025-05-07 21:13:17', '2025-05-07 21:31:21'),
(61742, 18, 'H. Valdimarsson', 'Unknown', 11.7, 0, '2025-05-07 21:13:17', '2025-05-07 21:31:21'),
(61774, 18, 'O. Óskarsson', 'Unknown', 8.2, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:21'),
(63979, 30, 'M. Succar', 'Unknown', 4, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(64268, 8, 'J. Mojica', 'Unknown', 8.7, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:04'),
(64622, 29, 'G. Leiva', 'Unknown', 10, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(67889, 18, 'H. Haraldsson', 'Unknown', 11.8, 0, '2025-05-07 21:13:17', '2025-05-07 21:31:21'),
(67971, 10, 'M. Guéhi', 'Unknown', 4.7, 0, '2025-05-07 21:13:04', '2025-05-07 21:31:07'),
(67972, 10, 'C. Gallagher', 'Unknown', 12.1, 0, '2025-05-04 08:02:05', '2025-05-07 21:31:07'),
(68041, 20, 'M. Tilio', 'Unknown', 4.6, 0, '2025-05-04 08:02:14', '2025-05-07 21:25:03'),
(68127, 34, 'K. Watts', 'Unknown', 4.7, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(69971, 19, 'T. Moffi', 'Unknown', 11.3, 0, '2025-05-07 21:13:19', '2025-05-07 21:31:23'),
(70077, 7, 'A. Machado', 'Unknown', 7.3, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(72155, 12, 'A. Ueda', 'Unknown', 8.4, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(78583, 23, 'Ahmed Al Ghamdi', 'Unknown', 12.4, 0, '2025-05-04 08:04:47', '2025-05-04 08:04:47'),
(82483, 37, 'D. Charles', 'Unknown', 7.2, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(84658, 28, 'F. Mannai', 'Unknown', 9.1, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(89520, 18, 'M. Ellertsson', 'Unknown', 4.9, 0, '2025-05-07 21:13:17', '2025-05-07 21:31:21'),
(89754, 18, 'E. Ólafsson', 'Unknown', 12.1, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:21'),
(89768, 18, 'K. Ingason', 'Unknown', 5.3, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:21'),
(89982, 22, 'S. Moghanlou', 'Unknown', 6, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(92189, 4, 'I. Sergeev', 'Unknown', 5.2, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(94360, 35, 'A. Paulsen', 'Unknown', 4.9, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(94562, 16, 'S. Giménez', 'Unknown', 8.7, 0, '2025-05-04 08:02:11', '2025-05-07 21:31:18'),
(95047, 11, 'Josiel Núñez', 'Unknown', 9.6, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(95105, 11, 'E. Guerrero', 'Unknown', 5.3, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(97567, 14, 'S. Mijailović', 'Unknown', 11.7, 0, '2025-05-04 08:02:09', '2025-05-07 21:31:14'),
(99211, 17, 'Park Jin-Seop', 'Unknown', 7.6, 0, '2025-05-07 21:13:15', '2025-05-07 21:31:19'),
(99540, 17, 'Lee Ki-Je', 'Unknown', 5.4, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(104601, 4, 'A. Adamov', 'Unknown', 4, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(106835, 12, 'K. Mitoma', 'Unknown', 5.9, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(107197, 30, 'B. Reyna', 'Unknown', 11.2, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(107230, 5, 'S. Brolin', 'Unknown', 8, 0, '2025-05-04 08:02:01', '2025-05-07 21:30:59'),
(115588, 15, 'B. Okoh', 'Unknown', 10.6, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(118307, 14, 'Đ. Petrović', 'Unknown', 10.9, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(119762, 24, 'K. Piątkowski', 'Unknown', 9.7, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(119860, 29, 'J. Valverde', 'Unknown', 7.5, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(123468, 15, 'M. Keller', 'Unknown', 7.4, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(123469, 15, 'Z. Amdouni', 'Unknown', 10.8, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(125171, 3, 'J. Stanišić', 'Unknown', 10.4, 0, '2025-05-07 21:12:53', '2025-05-07 21:30:56'),
(125646, 24, 'K. Struski', 'Unknown', 4.3, 0, '2025-05-04 08:04:48', '2025-05-07 21:31:31'),
(125674, 8, 'J. Cabal', 'Unknown', 9.5, 0, '2025-05-07 21:13:01', '2025-05-07 21:31:04'),
(125708, 15, 'U. Bislimi', 'Unknown', 8.2, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(126654, 29, 'Y. Molina', 'Unknown', 10.2, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(126690, 36, 'K. Bowie', 'Unknown', 8.8, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:54'),
(126872, 20, 'S. Silvera', 'Unknown', 6.6, 0, '2025-05-07 21:13:20', '2025-05-07 21:31:25'),
(126899, 19, 'Z. Sanusi', 'Unknown', 7.9, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:43'),
(127119, 37, 'B. Jackson', 'Unknown', 8.2, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(127228, 16, 'J. Lozano', 'Unknown', 11, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(127418, 1, 'K. Sardella', 'Unknown', 7.6, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(127634, 38, 'João Ferreira', 'Unknown', 12, 0, '2025-05-04 08:05:00', '2025-05-04 08:05:00'),
(127769, 6, 'Gabriel Martinelli', 'Unknown', 9.6, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(128342, 13, 'R. Ndiaye', 'Unknown', 5.9, 0, '2025-05-07 21:13:08', '2025-05-07 21:31:12'),
(128398, 9, 'Oihan Sancet', 'Unknown', 5.1, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(128499, 18, 'L. Róbertsson', 'Unknown', 9.6, 0, '2025-05-04 08:02:13', '2025-05-07 21:31:21'),
(128640, 24, 'M. Kochalski', 'Unknown', 12.5, 0, '2025-05-04 08:04:48', '2025-05-07 21:31:31'),
(129033, 3, 'J. Gvardiol', 'Unknown', 6.7, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(129682, 31, 'A. Adli', 'Unknown', 7.6, 0, '2025-05-07 21:13:38', '2025-05-07 21:31:44'),
(129705, 36, 'L. Ashby-Hammond', 'Unknown', 12.5, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:54'),
(129718, 10, 'J. Bellingham', 'Unknown', 7.1, 0, '2025-05-04 08:02:05', '2025-05-07 21:31:07'),
(129791, 27, 'Fábio Silva', 'Unknown', 12.1, 0, '2025-05-04 08:04:51', '2025-05-07 21:31:37'),
(129941, 16, 'R. Fernández', 'Unknown', 8.8, 0, '2025-05-04 08:02:11', '2025-05-04 08:04:40'),
(130298, 4, 'D. Volk', 'Unknown', 10.3, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(130416, 35, 'G. Kilkenny', 'Unknown', 4, 0, '2025-05-07 21:13:44', '2025-05-07 21:31:52'),
(133403, 14, 'N. Stojić', 'Unknown', 8.3, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(134217, 22, 'M. Mohebi', 'Unknown', 4.4, 0, '2025-05-04 08:04:46', '2025-05-04 08:04:46'),
(135505, 5, 'S. Dahl', 'Unknown', 4.3, 0, '2025-05-04 08:02:01', '2025-05-04 08:04:30'),
(135525, 40, 'C. Ramsay', 'Unknown', 7.5, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(135836, 31, 'Y. Attiat-Allah', 'Unknown', 10, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:44'),
(136117, 9, 'Rodrigo Riquelme', 'Unknown', 11.5, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(136723, 10, 'N. Madueke', 'Unknown', 6.4, 0, '2025-05-04 08:02:05', '2025-05-04 08:04:35'),
(137721, 5, 'G. Lagerbielke', 'Unknown', 11.1, 0, '2025-05-04 08:02:01', '2025-05-04 08:04:30'),
(138792, 37, 'B. Radulović', 'Unknown', 6.5, 0, '2025-05-04 08:04:59', '2025-05-04 08:04:59'),
(138822, 36, 'A. Broja', 'Unknown', 5.6, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:54'),
(138895, 37, 'T. Simpson', 'Unknown', 10, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(138908, 34, 'E. Anderson', 'Unknown', 8.8, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(141901, 27, 'Jota Silva', 'Unknown', 10.1, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(144729, 10, 'T. Harwood-Bellis', 'Unknown', 10.2, 0, '2025-05-07 21:13:04', '2025-05-07 21:31:07'),
(144736, 37, 'Peter Thomas', 'Unknown', 8, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(144740, 19, 'F. Dele-Bashiru', 'Unknown', 6.8, 0, '2025-05-07 21:13:19', '2025-05-07 21:31:23'),
(144741, 39, 'L. Moulden', 'Unknown', 4.5, 0, '2025-05-04 08:05:01', '2025-05-07 21:31:59'),
(144879, 31, 'M. Benabid', 'Unknown', 9.1, 0, '2025-05-07 21:13:38', '2025-05-07 21:31:44'),
(147859, 1, 'C. De Ketelaere', 'Unknown', 12, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(147911, 18, 'A. Lúðvíksson', 'Unknown', 9, 0, '2025-05-07 21:13:17', '2025-05-07 21:25:00'),
(148270, 24, 'O. Zych', 'Unknown', 12.4, 0, '2025-05-07 21:13:27', '2025-05-07 21:31:31'),
(152786, 14, 'A. Ćirković', 'Unknown', 9.7, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(152856, 6, 'Evanilson', 'Unknown', 9.2, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:01'),
(152953, 10, 'L. Colwill', 'Unknown', 6.4, 0, '2025-05-04 08:02:05', '2025-05-04 08:04:35'),
(152967, 19, 'C. Bassey', 'Unknown', 5.2, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:23'),
(152976, 40, 'Thomas Daniel Hill', 'Unknown', 8.4, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(152979, 40, 'James Barry Norris', 'Unknown', 6.5, 0, '2025-05-07 21:13:52', '2025-05-07 21:32:01'),
(152982, 10, 'C. Palmer', 'Unknown', 9.5, 0, '2025-05-04 08:02:05', '2025-05-04 08:04:35'),
(153066, 40, 'Fábio Carvalho', 'Unknown', 11.7, 0, '2025-05-07 21:13:52', '2025-05-07 21:32:01'),
(153166, 32, 'Mohamed Awwad', 'Unknown', 5.8, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(153420, 36, 'G. Wickens', 'Unknown', 4.6, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:54'),
(153427, 37, 'K. Phillips', 'Unknown', 6.3, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(153430, 5, 'A. Elanga', 'Unknown', 11.9, 0, '2025-05-07 21:12:56', '2025-05-07 21:30:59'),
(153434, 33, 'W. Fish', 'Unknown', 11.2, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(153603, 20, 'A. Toure', 'Unknown', 9.8, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:25'),
(156537, 5, 'J. Tolinsson', 'Unknown', 6.7, 0, '2025-05-04 08:02:01', '2025-05-07 21:30:59'),
(158121, 13, 'I. Jakobs', 'Unknown', 7.6, 0, '2025-05-04 08:02:08', '2025-05-04 08:04:38'),
(158432, 39, 'C. Campbell', 'Unknown', 5.9, 0, '2025-05-07 21:13:50', '2025-05-07 21:31:59'),
(158693, 40, 'O. Beck', 'Unknown', 11.3, 0, '2025-05-04 08:05:02', '2025-05-04 08:05:02'),
(158700, 5, 'V. Johansson', 'Unknown', 12.3, 0, '2025-05-07 21:12:56', '2025-05-07 21:30:59'),
(158710, 21, 'V. Kristiansen', 'Unknown', 6.8, 0, '2025-05-07 21:13:22', '2025-05-07 21:31:26'),
(161585, 27, 'Francisco Conceição', 'Unknown', 10.7, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(161638, 38, 'F. Ebosele', 'Unknown', 8.2, 0, '2025-05-04 08:05:00', '2025-05-04 08:05:00'),
(161897, 31, 'I. Saibari', 'Unknown', 6.5, 0, '2025-05-04 08:04:54', '2025-05-04 08:04:54'),
(161939, 27, 'Tomás Araújo', 'Unknown', 10.5, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(161956, 14, 'K. Belić', 'Unknown', 8.8, 0, '2025-05-04 08:02:09', '2025-05-07 21:31:14'),
(162007, 1, 'M. De Cuyper', 'Unknown', 11.8, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(162171, 4, 'K. Shchetinin', 'Unknown', 5.3, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(162189, 21, 'M. Bidstrup', 'Unknown', 6.9, 0, '2025-05-04 08:04:45', '2025-05-04 08:04:45'),
(162219, 19, 'R. Onyedika', 'Unknown', 10.9, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:43'),
(162236, 13, 'F. Mendy', 'Unknown', 11.8, 0, '2025-05-04 08:02:08', '2025-05-04 08:04:38'),
(162414, 15, 'A. Amenda', 'Unknown', 5.1, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(162445, 14, 'F. Stanković', 'Unknown', 8.4, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(162453, 2, 'L. Chevalier', 'Unknown', 9.4, 0, '2025-05-04 08:01:58', '2025-05-04 08:04:28'),
(162489, 10, 'J. Trafford', 'Unknown', 9.7, 0, '2025-05-04 08:02:05', '2025-05-04 08:04:35'),
(162511, 1, 'S. Lammens', 'Unknown', 7.2, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(162595, 27, 'Samuel Soares', 'Unknown', 10.8, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(162687, 40, 'V. Jaroš', 'Unknown', 11.9, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(162712, 9, 'Óscar Mingueza', 'Unknown', 5, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(162714, 1, 'A. Onana', 'Unknown', 8.1, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(162904, 40, 'R. Williams', 'Unknown', 5.3, 0, '2025-05-07 21:13:52', '2025-05-07 21:32:01'),
(163032, 15, 'F. Rieder', 'Unknown', 9.7, 0, '2025-05-07 21:13:12', '2025-05-07 21:31:16'),
(163836, 29, 'L. Flores', 'Unknown', 7.2, 0, '2025-05-07 21:13:35', '2025-05-07 21:31:41'),
(166840, 4, 'S. Pinyaev', 'Unknown', 7.3, 0, '2025-05-04 08:02:00', '2025-05-04 08:04:30'),
(167250, 37, 'J. Headley', 'Unknown', 10.4, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(170876, 38, 'M. Roberts', 'Unknown', 4.3, 0, '2025-05-07 21:13:49', '2025-05-07 21:31:58'),
(171035, 39, 'T. Chirewa', 'Unknown', 12.1, 0, '2025-05-07 21:13:50', '2025-05-07 21:31:59'),
(174918, 2, 'L. Badé', 'Unknown', 11.8, 0, '2025-05-04 08:01:58', '2025-05-07 21:30:54'),
(174927, 13, 'A. Sangante', 'Unknown', 4.6, 0, '2025-05-07 21:13:08', '2025-05-07 21:31:12'),
(177649, 20, 'J. Iredale', 'Unknown', 9.1, 0, '2025-05-07 21:13:20', '2025-05-07 21:31:25'),
(178077, 25, 'K. Schade', 'Unknown', 11.1, 0, '2025-05-04 08:04:49', '2025-05-04 08:04:49'),
(178696, 29, 'A. Lezcano', 'Unknown', 8.1, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(178749, 14, 'L. Samardžić', 'Unknown', 9.2, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(179651, 37, 'J. Taylor', 'Unknown', 12.5, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(180728, 19, 'S. Nwabali', 'Unknown', 4.3, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:43'),
(180758, 12, 'R. Hatate', 'Unknown', 4.1, 0, '2025-05-04 08:02:07', '2025-05-04 08:04:37'),
(180769, 37, 'J. Austerfield', 'Unknown', 5.4, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(180866, 40, 'Marcelo', 'Unknown', 6.1, 0, '2025-05-04 08:05:02', '2025-05-04 08:05:02'),
(181421, 31, 'A. Ezzalzouli', 'Unknown', 5.3, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:44'),
(181812, 25, 'J. Musiala', 'Unknown', 7.2, 0, '2025-05-07 21:13:29', '2025-05-07 21:31:34'),
(182219, 9, 'Álex Baena', 'Unknown', 5.5, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(182280, 24, 'K. UrbaÅski', 'Unknown', 4.6, 0, '2025-05-07 21:13:27', '2025-05-07 21:31:31'),
(182434, 3, 'D. Beljo', 'Unknown', 8.6, 0, '2025-05-04 08:01:59', '2025-05-04 08:04:29'),
(182656, 16, 'A. Sánchez', 'Unknown', 9.7, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(183799, 9, 'Nico Williams', 'Unknown', 8.3, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(183849, 9, 'Aitor Paredes', 'Unknown', 9.1, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(184226, 9, 'Yeremy Pino', 'Unknown', 4.6, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(190485, 27, 'Samú Costa', 'Unknown', 12.4, 0, '2025-05-04 08:04:51', '2025-05-07 21:31:37'),
(190575, 32, 'Marwan Attia', 'Unknown', 10.7, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(191879, 18, 'K. Hlynsson', 'Unknown', 7.3, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:42'),
(191971, 36, 'J. Stansfield', 'Unknown', 11.7, 0, '2025-05-07 21:13:46', '2025-05-07 21:31:54'),
(193288, 23, 'Nawaf Al Aqidi', 'Unknown', 8.5, 0, '2025-05-04 08:04:47', '2025-05-04 08:04:47'),
(194572, 31, 'M. Chibi', 'Unknown', 10.9, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:44'),
(195098, 30, 'J. Grimaldo', 'Unknown', 8.7, 0, '2025-05-07 21:13:36', '2025-05-07 21:31:43'),
(195103, 6, 'João Gomes', 'Unknown', 11.5, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(195104, 8, 'R. Rios', 'Unknown', 11.7, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(195704, 16, 'J. Carrillo', 'Unknown', 8.6, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(195717, 8, 'Y. Mosquera', 'Unknown', 6.8, 0, '2025-05-07 21:13:01', '2025-05-07 21:31:04'),
(195718, 8, 'J. Fory', 'Unknown', 6.1, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(195940, 30, 'D. Romero', 'Unknown', 7.1, 0, '2025-05-04 08:04:53', '2025-05-04 08:04:53'),
(195962, 39, 'Chiquinho', 'Unknown', 9, 0, '2025-05-04 08:05:01', '2025-05-07 21:31:59'),
(196456, 11, 'E. Carrasquilla', 'Unknown', 5.5, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(196480, 29, 'C. Mora', 'Unknown', 8.2, 0, '2025-05-04 08:04:52', '2025-05-04 08:04:52'),
(196678, 30, 'A. Valera', 'Unknown', 4.7, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(197784, 24, 'J. Kałuziński', 'Unknown', 11.7, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(197913, 8, 'J. Mosquera', 'Unknown', 10, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(197985, 17, 'Seol Young-Woo', 'Unknown', 6.4, 0, '2025-05-04 08:02:12', '2025-05-04 08:04:41'),
(198352, 20, 'M. Touré', 'Unknown', 4.2, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:25'),
(199141, 30, 'E. Noriega', 'Unknown', 10.2, 0, '2025-05-04 08:04:53', '2025-05-07 21:31:43'),
(199150, 12, 'R. Morishita', 'Unknown', 10.5, 0, '2025-05-04 08:02:07', '2025-05-04 08:04:37'),
(199310, 28, 'A. Ben Slimane', 'Unknown', 8.1, 0, '2025-05-07 21:13:33', '2025-05-07 21:31:39'),
(199578, 12, 'Z. Suzuki', 'Unknown', 6.6, 0, '2025-05-07 21:13:07', '2025-05-07 21:31:10'),
(199793, 12, 'S. Maikuma', 'Unknown', 10.2, 0, '2025-05-04 08:02:07', '2025-05-07 21:31:10'),
(201749, 29, 'S. Acuña', 'Unknown', 4.7, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(202381, 23, 'Moteb Al Harbi', 'Unknown', 11.3, 0, '2025-05-07 21:13:25', '2025-05-07 21:31:30'),
(202696, 3, 'I. Matanović', 'Unknown', 8, 0, '2025-05-07 21:12:53', '2025-05-07 21:30:56'),
(202951, 3, 'F. Ivanović', 'Unknown', 6.5, 0, '2025-05-04 08:01:59', '2025-05-04 08:04:29'),
(203224, 25, 'F. Wirtz', 'Unknown', 6.3, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:34'),
(203468, 13, 'D. Lopy', 'Unknown', 4.2, 0, '2025-05-04 08:02:08', '2025-05-04 08:04:38'),
(203474, 24, 'N. Zalewski', 'Unknown', 11.4, 0, '2025-05-07 21:13:27', '2025-05-07 21:31:31'),
(204033, 39, 'J. Hodge', 'Unknown', 12.4, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:59'),
(204043, 1, 'A. Theate', 'Unknown', 6.3, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(204109, 18, 'A. Guðjohnsen', 'Unknown', 12.2, 0, '2025-05-04 08:02:13', '2025-05-04 08:04:42'),
(206404, 28, 'Samy Olivier Chouchane', 'Unknown', 4, 0, '2025-05-07 21:13:33', '2025-05-07 21:31:39'),
(210198, 28, 'M. Zaddem', 'Unknown', 11.1, 0, '2025-05-07 21:13:33', '2025-05-07 21:31:39'),
(231029, 19, 'N. Tella', 'Unknown', 9.5, 0, '2025-05-07 21:13:19', '2025-05-07 21:31:23'),
(237129, 13, 'P. Sarr', 'Unknown', 11.1, 0, '2025-05-04 08:02:08', '2025-05-07 21:31:12'),
(237249, 13, 'M. Faye', 'Unknown', 10.1, 0, '2025-05-07 21:13:08', '2025-05-07 21:24:52'),
(260865, 3, 'M. Pašalić', 'Unknown', 4.1, 0, '2025-05-04 08:01:59', '2025-05-04 08:04:29'),
(263177, 21, 'A. Grønbæk', 'Unknown', 7.5, 0, '2025-05-07 21:13:22', '2025-05-07 21:31:26'),
(263331, 29, 'I. Lawrence', 'Unknown', 12.1, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(264419, 28, 'S. Ltaief', 'Unknown', 7.6, 0, '2025-05-04 08:04:52', '2025-05-04 08:04:52'),
(264705, 15, 'A. Jashari', 'Unknown', 4.1, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(265595, 27, 'Gonçalo Inácio', 'Unknown', 12.3, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(265710, 17, 'Lee Soon-Min', 'Unknown', 5.7, 0, '2025-05-07 21:13:15', '2025-05-07 21:31:19'),
(265784, 6, 'André', 'Unknown', 8.1, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(265820, 5, 'Y. Ayari', 'Unknown', 4.2, 0, '2025-05-07 21:12:56', '2025-05-07 21:30:59'),
(266657, 6, 'Sávio', 'Unknown', 7.8, 0, '2025-05-07 21:12:58', '2025-05-07 21:31:01'),
(268960, 4, 'A. Zakharyan', 'Unknown', 10.9, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(269163, 5, 'W. Swedberg', 'Unknown', 4.7, 0, '2025-05-04 08:02:01', '2025-05-07 21:30:59'),
(269506, 7, 'L. Morales', 'Unknown', 5.4, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(269539, 20, 'P. Yazbek', 'Unknown', 6.9, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(270354, 32, 'Mohamed Shokry', 'Unknown', 9.5, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(270497, 29, 'D. Sequeira', 'Unknown', 6.3, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(270498, 29, 'W. Madrigal', 'Unknown', 9.7, 0, '2025-05-04 08:04:52', '2025-05-04 08:04:52'),
(271983, 24, 'D. Marczuk', 'Unknown', 5, 0, '2025-05-04 08:04:48', '2025-05-04 08:04:48'),
(277862, 15, 'Joël Monteiro', 'Unknown', 10, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(278453, 15, 'A. Hajdari', 'Unknown', 5.8, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(278898, 31, 'C. Riad', 'Unknown', 8.6, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:44'),
(280683, 40, 'James Balagizi', 'Unknown', 12, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(280687, 39, 'Hugo Bueno', 'Unknown', 8.6, 0, '2025-05-04 08:05:01', '2025-05-04 08:05:01'),
(281795, 38, 'Y. Asprilla', 'Unknown', 11.2, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:58'),
(282125, 1, 'R. Lavia', 'Unknown', 12.4, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(282126, 39, 'Carlos Forbs', 'Unknown', 8.6, 0, '2025-05-04 08:05:01', '2025-05-04 08:05:01'),
(282133, 33, 'J. Hugill', 'Unknown', 5, 0, '2025-05-07 21:13:41', '2025-05-07 21:31:48'),
(282770, 39, 'Rodrigo Gomes', 'Unknown', 9.1, 0, '2025-05-04 08:05:01', '2025-05-04 08:05:01'),
(283058, 13, 'N. Jackson', 'Unknown', 11.5, 0, '2025-05-04 08:02:08', '2025-05-07 21:31:12'),
(283298, 4, 'V. Paltsev', 'Unknown', 9.1, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(284072, 13, 'B. Dieng', 'Unknown', 9.8, 0, '2025-05-07 21:13:08', '2025-05-07 21:31:12'),
(284099, 14, 'M. Gluščević', 'Unknown', 4, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(284230, 10, 'R. Lewis', 'Unknown', 9, 0, '2025-05-04 08:02:05', '2025-05-04 08:04:35'),
(284236, 39, 'Temple Ojinnaka', 'Unknown', 11.3, 0, '2025-05-07 21:13:50', '2025-05-07 21:31:59'),
(284242, 33, 'O. Forson', 'Unknown', 11.5, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(284247, 40, 'H. Blair', 'Unknown', 12.5, 0, '2025-05-04 08:05:02', '2025-05-04 08:05:02'),
(284259, 39, 'Ty Kimoni Barnett', 'Unknown', 10, 0, '2025-05-07 21:13:50', '2025-05-07 21:31:59'),
(284262, 39, 'H. Griffiths', 'Unknown', 4.8, 0, '2025-05-07 21:13:50', '2025-05-07 21:31:59'),
(284278, 34, 'M. Ndiweni', 'Unknown', 9.8, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(284287, 40, 'Mateusz Konrad Musiałowski', 'Unknown', 8.5, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(284291, 34, 'J. Turner-Cooke', 'Unknown', 9.6, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(284305, 34, 'Jamie Miley', 'Unknown', 7.3, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(284307, 33, 'Ethan Ennis', 'Unknown', 6.2, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(284322, 10, 'K. Mainoo', 'Unknown', 9.7, 0, '2025-05-07 21:13:04', '2025-05-07 21:31:07'),
(284324, 26, 'A. Garnacho', 'Unknown', 5.8, 0, '2025-05-07 21:13:30', '2025-05-07 21:31:36'),
(284357, 39, 'Aaron Keto-Diyawa', 'Unknown', 9.8, 0, '2025-05-07 21:13:50', '2025-05-07 21:31:59'),
(284359, 39, 'Justin Quincy Hubner', 'Unknown', 10.3, 0, '2025-05-07 21:13:50', '2025-05-07 21:31:59'),
(284361, 33, 'R. Vítek', 'Unknown', 11.3, 0, '2025-05-04 08:04:56', '2025-05-04 08:04:56'),
(284363, 33, 'R. Bennett', 'Unknown', 12, 0, '2025-05-07 21:13:41', '2025-05-07 21:31:48'),
(284366, 40, 'L. Chambers', 'Unknown', 7.9, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(284367, 40, 'Luca Stephenson', 'Unknown', 10.2, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(284391, 33, 'S. Murray', 'Unknown', 7.2, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(284470, 36, 'M. Dibley-Dias', 'Unknown', 5.2, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:54'),
(284475, 36, 'L. Harris', 'Unknown', 4.7, 0, '2025-05-07 21:13:46', '2025-05-07 21:31:54'),
(284559, 36, 'Alexander Paul Borto', 'Unknown', 10, 0, '2025-05-07 21:13:46', '2025-05-07 21:31:54'),
(284797, 35, 'D. Ouattara', 'Unknown', 11.8, 0, '2025-05-07 21:13:44', '2025-05-07 21:31:52'),
(284869, 3, 'T. Fruk', 'Unknown', 6.5, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(286639, 9, 'Bryan Zaragoza', 'Unknown', 4.7, 0, '2025-05-04 08:02:04', '2025-05-07 21:31:05'),
(287111, 40, 'Fabian Mrozek', 'Unknown', 10.2, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(288006, 21, 'R. Højlund', 'Unknown', 4.9, 0, '2025-05-07 21:13:22', '2025-05-07 21:31:26'),
(288097, 18, 'L. Petersson', 'Unknown', 7.1, 0, '2025-05-07 21:13:17', '2025-05-07 21:31:21'),
(288102, 10, 'A. Wharton', 'Unknown', 11.4, 0, '2025-05-04 08:02:05', '2025-05-07 21:31:07'),
(288112, 33, 'Willy Kambwala Ndengushi', 'Unknown', 4.5, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(289449, 16, 'L. Martínez Dupuy', 'Unknown', 11, 0, '2025-05-04 08:02:11', '2025-05-07 21:31:18'),
(289592, 8, 'K. Castaño', 'Unknown', 6.5, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:04'),
(289618, 37, 'Alex Matos', 'Unknown', 6.4, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(290549, 1, 'J. Bakayoko', 'Unknown', 8.8, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(290740, 31, 'Ilias Akhomach', 'Unknown', 5.8, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:44'),
(291530, 7, 'F. Catarozzi', 'Unknown', 4.2, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(292695, 32, 'Ahmed Koka', 'Unknown', 10.4, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(292703, 4, 'A. Langovich', 'Unknown', 7, 0, '2025-05-04 08:02:00', '2025-05-07 21:30:58'),
(295026, 3, 'M. Baturina', 'Unknown', 9.1, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(295131, 32, 'Mostafa Shalaby', 'Unknown', 12.1, 0, '2025-05-04 08:04:55', '2025-05-07 21:31:46'),
(295228, 29, 'J. Peraza', 'Unknown', 10.2, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(295397, 19, 'O. Ojo', 'Unknown', 7.7, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:23'),
(296311, 28, 'G. Zaalouni', 'Unknown', 12.5, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(296458, 38, 'D. Jebbison', 'Unknown', 5.4, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:58'),
(296656, 23, 'Abbas Al Hassan', 'Unknown', 6.4, 0, '2025-05-04 08:04:47', '2025-05-04 08:04:47'),
(296660, 22, 'S. Fallah', 'Unknown', 10, 0, '2025-05-04 08:04:46', '2025-05-07 21:31:28'),
(297145, 16, 'J. Rodríguez', 'Unknown', 7, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(297635, 36, 'Devan Austin Tanton Pedraza', 'Unknown', 8.2, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:54'),
(297750, 7, 'D. Romero', 'Unknown', 8.3, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(298060, 35, 'Z. Silcott-Duberry', 'Unknown', 9.4, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(298062, 33, 'Louis Jackson', 'Unknown', 11.9, 0, '2025-05-07 21:13:41', '2025-05-07 21:31:48'),
(301526, 23, 'Abdullah Radif', 'Unknown', 11.3, 0, '2025-05-04 08:04:47', '2025-05-04 08:04:47'),
(301763, 14, 'P. Ratkov', 'Unknown', 7.8, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(303010, 33, 'Daniel Gore', 'Unknown', 8.3, 0, '2025-05-07 21:13:41', '2025-05-07 21:31:48'),
(303016, 33, 'M. Oyedele', 'Unknown', 4.8, 0, '2025-05-04 08:04:48', '2025-05-07 21:31:48'),
(303017, 33, 'Samuel Mather', 'Unknown', 4, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(303019, 39, 'N. Fraser', 'Unknown', 5.4, 0, '2025-05-04 08:05:01', '2025-05-07 21:31:59'),
(304057, 11, 'O. Davis', 'Unknown', 9.6, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(304228, 1, 'Z. Debast', 'Unknown', 7.3, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(304958, 17, 'Yang Hyun-Jun', 'Unknown', 10.4, 0, '2025-05-04 08:02:12', '2025-05-04 08:04:41'),
(304984, 1, 'J. Spileers', 'Unknown', 7.1, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(305698, 11, 'H. Hurtado', 'Unknown', 7.6, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(305821, 38, 'Matheus Martins', 'Unknown', 6.2, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(308161, 38, 'J. Cabezas', 'Unknown', 9.1, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(308798, 7, 'L. Villalba', 'Unknown', 8.4, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(310186, 40, 'C. Scanlon', 'Unknown', 12.1, 0, '2025-05-04 08:05:02', '2025-05-07 21:32:01'),
(310187, 40, 'Stefan Bajčetić', 'Unknown', 4.9, 0, '2025-05-04 08:05:02', '2025-05-04 08:05:02'),
(310199, 16, 'R. Huescas', 'Unknown', 7.5, 0, '2025-05-04 08:02:11', '2025-05-07 21:31:18'),
(310307, 7, 'I. Sosa', 'Unknown', 10.3, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(311334, 26, 'F. Buonanotte', 'Unknown', 5.6, 0, '2025-05-07 21:13:30', '2025-05-07 21:25:14'),
(313383, 16, 'O. Vargas', 'Unknown', 9.4, 0, '2025-05-04 08:02:11', '2025-05-04 08:04:40'),
(313671, 34, 'Ciaran Thompson', 'Unknown', 4.2, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(313732, 6, 'Pablo Maia', 'Unknown', 12.5, 0, '2025-05-04 08:02:02', '2025-05-04 08:04:31'),
(313773, 11, 'R. Mosquera', 'Unknown', 10.7, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(313941, 21, 'A. Gaaei', 'Unknown', 11.5, 0, '2025-05-04 08:04:45', '2025-05-04 08:04:45'),
(314377, 14, 'S. Baždar', 'Unknown', 6.7, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(319519, 15, 'C. Witzig', 'Unknown', 4.4, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(320122, 15, 'P. Loretz', 'Unknown', 10.6, 0, '2025-05-04 08:02:10', '2025-05-04 08:04:40'),
(321838, 7, 'R. Chagas', 'Unknown', 11, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:02'),
(322180, 14, 'V. Ilić', 'Unknown', 7.8, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(322304, 34, 'Cathal Heffernan', 'Unknown', 4.1, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(324113, 29, 'S. Cárdenas', 'Unknown', 4.8, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(324420, 4, 'A. Karpukas', 'Unknown', 6.8, 0, '2025-05-04 08:02:00', '2025-05-04 08:04:30'),
(325293, 29, 'J. Bennette', 'Unknown', 6.9, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:41'),
(326982, 23, 'Saad Al Mosa', 'Unknown', 10.1, 0, '2025-05-04 08:04:47', '2025-05-07 21:31:30'),
(327738, 36, 'L. De Fougerolles', 'Unknown', 8, 0, '2025-05-07 21:13:46', '2025-05-07 21:31:54'),
(328033, 25, 'A. Pavlović', 'Unknown', 5.9, 0, '2025-05-04 08:04:49', '2025-05-07 21:31:34'),
(328046, 38, 'I. Koné', 'Unknown', 4.8, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(328107, 40, 'L. Koumas', 'Unknown', 6.8, 0, '2025-05-04 08:05:02', '2025-05-04 08:05:02'),
(328118, 39, 'Matthew Whittingham', 'Unknown', 8, 0, '2025-05-07 21:13:50', '2025-05-07 21:31:59'),
(328225, 25, 'B. Gruda', 'Unknown', 6.6, 0, '2025-05-04 08:04:49', '2025-05-04 08:04:49'),
(328403, 23, 'Mohammed Al Qahtani', 'Unknown', 7.5, 0, '2025-05-07 21:13:25', '2025-05-07 21:31:30'),
(329359, 38, 'James Andrew Clarridge', 'Unknown', 11.1, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(330636, 33, 'Sonny Aljofree', 'Unknown', 5.4, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(331832, 27, 'António Silva', 'Unknown', 5.6, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(333856, 16, 'A. Herrera', 'Unknown', 5.8, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(334725, 35, 'D. Sadi', 'Unknown', 10, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(334729, 40, 'B. Clark', 'Unknown', 10.4, 0, '2025-05-04 08:05:02', '2025-05-04 08:05:02'),
(335094, 5, 'H. Larsson', 'Unknown', 10.4, 0, '2025-05-07 21:12:56', '2025-05-07 21:30:59'),
(335116, 36, 'K. Šekularac', 'Unknown', 10.9, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:54'),
(336526, 11, 'K. Lenis', 'Unknown', 10.1, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(336671, 27, 'Renato Veiga', 'Unknown', 12.1, 0, '2025-05-07 21:13:32', '2025-05-07 21:31:37'),
(337587, 20, 'J. Bos', 'Unknown', 5.5, 0, '2025-05-04 08:02:14', '2025-05-04 08:04:44'),
(338856, 39, 'N. Lemina', 'Unknown', 11.2, 0, '2025-05-04 08:05:01', '2025-05-07 21:31:59'),
(338947, 5, 'Olof Matteo Perez Vinlöf', 'Unknown', 10.4, 0, '2025-05-04 08:02:01', '2025-05-04 08:04:30'),
(340246, 40, 'Trent Toure Kone Doherty', 'Unknown', 10.6, 0, '2025-05-07 21:13:52', '2025-05-07 21:32:01'),
(340573, 31, 'B. El Khannouss', 'Unknown', 10.9, 0, '2025-05-07 21:13:38', '2025-05-07 21:31:44'),
(340919, 34, 'Ellis Stanton', 'Unknown', 6.4, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(341233, 23, 'Abdulmalik Al Oyayari', 'Unknown', 8.4, 0, '2025-05-04 08:04:47', '2025-05-04 08:04:47'),
(341234, 21, 'E. Jelert', 'Unknown', 10, 0, '2025-05-04 08:04:45', '2025-05-04 08:04:45'),
(341646, 26, 'V. Carboni', 'Unknown', 9.6, 0, '2025-05-07 21:13:30', '2025-05-07 21:31:36'),
(342320, 14, 'K. Nedeljković', 'Unknown', 10.2, 0, '2025-05-07 21:13:10', '2025-05-07 21:31:14'),
(342433, 38, 'A. Tikvić', 'Unknown', 11.1, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(343320, 31, 'E. Ben Seghir', 'Unknown', 8.1, 0, '2025-05-07 21:13:38', '2025-05-07 21:31:44'),
(343405, 22, 'A. Yousefi', 'Unknown', 12.2, 0, '2025-05-07 21:13:23', '2025-05-07 21:31:28'),
(343576, 40, 'B. Doak', 'Unknown', 9.6, 0, '2025-05-04 08:05:02', '2025-05-04 08:05:02'),
(344233, 34, 'J. Emerson', 'Unknown', 9.9, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(344707, 37, 'C. Marshall', 'Unknown', 7.7, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(344813, 13, 'M. Camara', 'Unknown', 9.8, 0, '2025-05-07 21:13:08', '2025-05-07 21:31:12'),
(345748, 8, 'A. Gómez', 'Unknown', 11.4, 0, '2025-05-07 21:13:01', '2025-05-07 21:31:04'),
(346866, 1, 'S. Mbangula', 'Unknown', 7.5, 0, '2025-05-07 21:12:50', '2025-05-07 21:30:53'),
(347316, 5, 'L. Bergvall', 'Unknown', 10.4, 0, '2025-05-07 21:12:56', '2025-05-07 21:30:59'),
(347374, 38, 'A. Coyne', 'Unknown', 4.6, 0, '2025-05-07 21:13:49', '2025-05-07 21:31:58'),
(348205, 3, 'P. Sučić', 'Unknown', 12, 0, '2025-05-04 08:01:59', '2025-05-07 21:30:56'),
(348568, 20, 'A. Circati', 'Unknown', 6.5, 0, '2025-05-07 21:13:20', '2025-05-07 21:31:25'),
(350927, 8, 'Henry Mosquera', 'Unknown', 11.4, 0, '2025-05-04 08:02:03', '2025-05-04 08:04:33'),
(352210, 34, 'Dylan Charlton', 'Unknown', 6.4, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(356115, 11, 'A. Modelo', 'Unknown', 4.2, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(356237, 17, 'Kim Ji-Soo', 'Unknown', 10.6, 0, '2025-05-04 08:02:12', '2025-05-07 21:31:19'),
(359386, 36, 'M. Godo', 'Unknown', 11.9, 0, '2025-05-04 08:04:58', '2025-05-07 21:31:54'),
(361384, 31, 'Yusi', 'Unknown', 9.9, 0, '2025-05-04 08:04:54', '2025-05-07 21:31:44'),
(362270, 33, 'E. Wheatley', 'Unknown', 8.3, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(365664, 33, 'Ethan Williams', 'Unknown', 11.2, 0, '2025-05-04 08:04:56', '2025-05-07 21:31:48'),
(365988, 34, 'Aidan Harris', 'Unknown', 7.5, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(374058, 13, 'L. Camara', 'Unknown', 9.1, 0, '2025-05-07 21:13:08', '2025-05-07 21:31:12'),
(375586, 16, 'E.  Águila', 'Unknown', 10.7, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(375974, 1, 'J. Seys', 'Unknown', 6.2, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(377009, 1, 'M. Smets', 'Unknown', 11.1, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(377122, 6, 'Endrick', 'Unknown', 6.3, 0, '2025-05-04 08:02:02', '2025-05-07 21:31:01'),
(380276, 37, 'C. Ashia', 'Unknown', 7.6, 0, '2025-05-07 21:13:47', '2025-05-07 21:31:56'),
(380653, 39, 'L. Chiwome', 'Unknown', 4.9, 0, '2025-05-04 08:05:01', '2025-05-07 21:31:59'),
(380657, 40, 'R. Young', 'Unknown', 5.6, 0, '2025-05-07 21:13:52', '2025-05-07 21:32:01'),
(382160, 35, 'D. Adu-Adjei', 'Unknown', 10.3, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(382166, 35, 'C. Plain', 'Unknown', 7.5, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(382344, 34, 'A. Munda', 'Unknown', 8.6, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(382345, 34, 'Alfie Harrison', 'Unknown', 12.2, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(382452, 21, 'P. Dorgu', 'Unknown', 9.4, 0, '2025-05-07 21:13:22', '2025-05-07 21:31:26'),
(383685, 34, 'Y. Minteh', 'Unknown', 10.1, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(385482, 37, 'L. Daley', 'Unknown', 11.1, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(385726, 39, 'E. González', 'Unknown', 9.9, 0, '2025-05-04 08:05:01', '2025-05-04 08:05:01'),
(388872, 21, 'Victor Mow Froholdt', 'Unknown', 7.9, 0, '2025-05-04 08:04:45', '2025-05-07 21:31:26'),
(389302, 39, 'T. Edozie', 'Unknown', 4.3, 0, '2025-05-07 21:13:51', '2025-05-07 21:31:59'),
(392441, 37, 'M. Stone', 'Unknown', 11.9, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(394871, 7, 'L. Pino', 'Unknown', 10.2, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:02'),
(396193, 21, 'L. Høgsberg', 'Unknown', 8.3, 0, '2025-05-04 08:04:45', '2025-05-07 21:31:26'),
(398190, 14, 'M. CvetkoviÄ', 'Unknown', 9.8, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(398192, 14, 'A. MaksimoviÄ', 'Unknown', 5.3, 0, '2025-05-04 08:02:09', '2025-05-04 08:04:39'),
(398933, 39, 'F. Holman', 'Unknown', 8, 0, '2025-05-07 21:13:51', '2025-05-07 21:31:59'),
(400694, 37, 'Tom Iorpenda', 'Unknown', 6.4, 0, '2025-05-07 21:13:47', '2025-05-07 21:31:56'),
(401073, 4, 'A. Batrakov', 'Unknown', 8.2, 0, '2025-05-04 08:02:00', '2025-05-04 08:04:30'),
(402432, 35, 'Ben Winterburn', 'Unknown', 5.5, 0, '2025-05-04 08:04:57', '2025-05-04 08:04:57'),
(402434, 35, 'Remy Rees-Dottin', 'Unknown', 4.7, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:52'),
(402467, 38, 'Albert Eames', 'Unknown', 6.9, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(402504, 39, 'L. Benjamin', 'Unknown', 8.6, 0, '2025-05-04 08:05:01', '2025-05-07 21:31:59'),
(402524, 34, 'A. Harrison', 'Unknown', 5.6, 0, '2025-05-04 08:04:57', '2025-05-07 21:31:50'),
(403063, 38, 'M. Adu-Poku', 'Unknown', 11.3, 0, '2025-05-07 21:13:49', '2025-05-07 21:31:58'),
(404539, 38, 'Kayky Almeida', 'Unknown', 4.8, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(405124, 7, 'K. Martínez', 'Unknown', 4, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:02'),
(407527, 11, 'Ã. DÃ­az', 'Unknown', 7, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(407597, 11, 'M. Krug', 'Unknown', 11, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(408219, 13, 'S. Sano', 'Unknown', 4.7, 0, '2025-05-04 08:02:08', '2025-05-04 08:04:38'),
(408551, 28, 'A. Memmich', 'Unknown', 10.6, 0, '2025-05-04 08:04:52', '2025-05-07 21:31:39'),
(409419, 22, 'M. Hosseinnezhad', 'Unknown', 10.6, 0, '2025-05-04 08:04:46', '2025-05-04 08:04:46'),
(413060, 16, 'R. Árciga', 'Unknown', 10.2, 0, '2025-05-07 21:13:13', '2025-05-07 21:31:18'),
(415155, 7, 'J. Rodríguez', 'Unknown', 5.7, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:02'),
(417861, 13, 'A. Diouf', 'Unknown', 11.2, 0, '2025-05-04 08:02:08', '2025-05-07 21:31:12'),
(419582, 27, 'Geovany Tcherno Quenda', 'Unknown', 8.2, 0, '2025-05-04 08:04:51', '2025-05-04 08:04:51'),
(419916, 21, 'C. Harder', 'Unknown', 7, 0, '2025-05-04 08:04:45', '2025-05-04 08:04:45'),
(423690, 23, 'Talal Haji', 'Unknown', 6, 0, '2025-05-04 08:04:47', '2025-05-04 08:04:47'),
(431891, 23, 'Abdulelah', 'Unknown', 7.9, 0, '2025-05-04 08:04:47', '2025-05-07 21:31:30'),
(433873, 38, 'J. Collins', 'Unknown', 8, 0, '2025-05-04 08:05:00', '2025-05-07 21:31:58'),
(434126, 19, 'B. Tanimu', 'Unknown', 5.9, 0, '2025-05-04 08:02:14', '2025-05-07 21:31:23'),
(436879, 39, 'E. Ballard-Matthews', 'Unknown', 11.8, 0, '2025-05-07 21:13:51', '2025-05-07 21:31:59'),
(440696, 23, 'Thamer Al Khaibri', 'Unknown', 10.7, 0, '2025-05-04 08:04:47', '2025-05-04 08:04:47'),
(442322, 23, 'Ayman Fallatah\\t', 'Unknown', 9.2, 0, '2025-05-04 08:04:47', '2025-05-04 08:04:47'),
(443829, 1, 'J. Mokio', 'Unknown', 5.9, 0, '2025-05-04 08:01:57', '2025-05-04 08:04:27'),
(449232, 37, 'Daniel Vost', 'Unknown', 11.7, 0, '2025-05-04 08:04:59', '2025-05-07 21:31:56'),
(450674, 23, 'Hamed Abdullah Yousef', 'Unknown', 6.9, 0, '2025-05-04 08:04:47', '2025-05-07 21:31:30'),
(452685, 40, 'R. Ngumoha', 'Unknown', 10.3, 0, '2025-05-07 21:13:52', '2025-05-07 21:32:01'),
(456206, 39, 'M. Mane', 'Unknown', 7, 0, '2025-05-04 08:05:01', '2025-05-07 21:31:59'),
(458846, 11, 'JD Gunn', 'Unknown', 6.5, 0, '2025-05-04 08:02:06', '2025-05-07 21:31:08'),
(461487, 7, 'T. Viera', 'Unknown', 7.5, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:02'),
(461489, 7, 'F. Bonilla', 'Unknown', 4.3, 0, '2025-05-04 08:02:03', '2025-05-07 21:31:02'),
(482605, 16, 'G. Mora', 'Unknown', 5.4, 0, '2025-05-04 08:02:11', '2025-05-07 21:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `created_at`, `updated_at`) VALUES
(1, 1, 'Who is the all-time top scorer for the Malaysian national football team?', '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(2, 1, 'Which football club has won the most Malaysian Super League (MSL) titles?', '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(3, 1, 'Which stadium is the home ground for Selangor FC?', '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(4, 1, 'Who won the Malaysia FA Cup in 2020?', '2025-05-06 22:15:53', '2025-05-06 22:15:53'),
(5, 1, 'Which Malaysian footballer won the FIFA Puskás Award in 2016?', '2025-05-06 22:15:53', '2025-05-06 22:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Fun Quiz: Malaysian Footbal', '2025-05-06 22:15:53', '2025-05-06 22:15:53');

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
('ewn3EMUDunXn3Izte6gWi8ThBQw9NYIOX4w3p3tj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFZRbXZ4ZHRhVkpOd0xzSVhsdnlnZ2lFS0h5RGM2cGJXakcyNXUxViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1746757831),
('T4yJ3RTzcAyKKfBInt9IA7xSocm3w1e2cl8tL78x', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS0JyYURZbGRpUDRZbDB3OUpuT0hJZXoxNm4wZFJXTzFNQ1FvWmpIWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDt9', 1747145434),
('tbqS0W6JNiD6iBbn7DoZtXjiXApkgjUpmQC31JO0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiZHQ1dmFpYVlrZW1pcnBsZU5SaGJ2b2NONEtzNzdoUWJEMjlNbHhSOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YToxOntpOjA7czo1OiJiYWRnZSI7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NDY5NDY2MjI7fXM6MjE6ImxlYWRlcmJvYXJkX3dpbl9zaG93biI7YjoxO3M6NToiYmFkZ2UiO3M6MTQ6IvCfpYcgMXN0IFBsYWNlIjt9', 1746946932);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `short_name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Manchester United', 'MUN', 'https://media.api-sports.io/football/teams/33.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(2, 'Newcastle', 'NEW', 'https://media.api-sports.io/football/teams/34.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(3, 'Bournemouth', 'BOU', 'https://media.api-sports.io/football/teams/35.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(4, 'Fulham', 'FUL', 'https://media.api-sports.io/football/teams/36.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(5, 'Wolves', 'WOL', 'https://media.api-sports.io/football/teams/39.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(6, 'Liverpool', 'LIV', 'https://media.api-sports.io/football/teams/40.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(7, 'Southampton', 'SOU', 'https://media.api-sports.io/football/teams/41.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(8, 'Arsenal', 'ARS', 'https://media.api-sports.io/football/teams/42.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(9, 'Everton', 'EVE', 'https://media.api-sports.io/football/teams/45.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(10, 'Leicester', 'LEI', 'https://media.api-sports.io/football/teams/46.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(11, 'Tottenham', 'TOT', 'https://media.api-sports.io/football/teams/47.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(12, 'West Ham', 'WES', 'https://media.api-sports.io/football/teams/48.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(13, 'Chelsea', 'CHE', 'https://media.api-sports.io/football/teams/49.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(14, 'Manchester City', 'MAC', 'https://media.api-sports.io/football/teams/50.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(15, 'Brighton', 'BRI', 'https://media.api-sports.io/football/teams/51.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(16, 'Crystal Palace', 'CRY', 'https://media.api-sports.io/football/teams/52.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(17, 'Brentford', 'BRE', 'https://media.api-sports.io/football/teams/55.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(18, 'Ipswich', 'IPS', 'https://media.api-sports.io/football/teams/57.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(19, 'Nottingham Forest', 'NOT', 'https://media.api-sports.io/football/teams/65.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(20, 'Aston Villa', 'AST', 'https://media.api-sports.io/football/teams/66.png', '2025-05-04 08:01:55', '2025-05-04 08:01:55'),
(21, 'Manchester United', 'MUN', 'https://media.api-sports.io/football/teams/33.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(22, 'Newcastle', 'NEW', 'https://media.api-sports.io/football/teams/34.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(23, 'Bournemouth', 'BOU', 'https://media.api-sports.io/football/teams/35.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(24, 'Fulham', 'FUL', 'https://media.api-sports.io/football/teams/36.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(25, 'Wolves', 'WOL', 'https://media.api-sports.io/football/teams/39.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(26, 'Liverpool', 'LIV', 'https://media.api-sports.io/football/teams/40.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(27, 'Southampton', 'SOU', 'https://media.api-sports.io/football/teams/41.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(28, 'Arsenal', 'ARS', 'https://media.api-sports.io/football/teams/42.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(29, 'Everton', 'EVE', 'https://media.api-sports.io/football/teams/45.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(30, 'Leicester', 'LEI', 'https://media.api-sports.io/football/teams/46.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(31, 'Tottenham', 'TOT', 'https://media.api-sports.io/football/teams/47.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(32, 'West Ham', 'WES', 'https://media.api-sports.io/football/teams/48.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(33, 'Chelsea', 'CHE', 'https://media.api-sports.io/football/teams/49.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(34, 'Manchester City', 'MAC', 'https://media.api-sports.io/football/teams/50.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(35, 'Brighton', 'BRI', 'https://media.api-sports.io/football/teams/51.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(36, 'Crystal Palace', 'CRY', 'https://media.api-sports.io/football/teams/52.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(37, 'Brentford', 'BRE', 'https://media.api-sports.io/football/teams/55.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(38, 'Ipswich', 'IPS', 'https://media.api-sports.io/football/teams/57.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(39, 'Nottingham Forest', 'NOT', 'https://media.api-sports.io/football/teams/65.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26'),
(40, 'Aston Villa', 'AST', 'https://media.api-sports.io/football/teams/66.png', '2025-05-04 08:04:26', '2025-05-04 08:04:26');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `points` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `points`) VALUES
(1, 'MUHAMMAD HARRIS BIN PAIRUS', 'harrisnice32@gmail.com', NULL, '$2y$12$KGQ7Ad1vWq91x9tprw3FaeENJOfobh8/wUvjl86p7Xx/2Q6hKGrmK', NULL, '2025-05-04 08:09:17', '2025-05-06 22:16:33', 1, 5),
(2, 'ali', 'ali@gmail.com', NULL, '$2y$12$Mne9TQkLvPrFrFBr5yFV.eTsaX13g9KhgphukYxKxWLD7sRp1RezC', NULL, '2025-05-04 18:40:01', '2025-05-04 18:40:01', 0, 0),
(3, 'Azman', 'azman@gmail.com', NULL, '$2y$12$uj5315nIIj1XqNM07t62ue3mALVRoQpj.BlI4h1cCZM1sq1F..jKu', NULL, '2025-05-04 20:27:42', '2025-05-04 20:27:42', 0, 0),
(4, 'abu', 'abu@gmail.com', NULL, '$2y$12$6bhzOAIii17Rkd.56n3Nq.ih09Gleanlp10S.dwhpEu552jJqsene', NULL, '2025-05-04 20:34:22', '2025-05-04 20:34:22', 0, 0),
(5, 'lapaqketam', 'lpq@gmail.com', NULL, '$2y$12$ZWXbeZB9h78itghq94gUjeSDLdxMCnE5BagESFx92R762241Mg2gu', NULL, '2025-05-04 22:52:04', '2025-05-04 22:52:04', 0, 0),
(6, 'Harris kacak', 'harriskacak9@gmail.com', NULL, '$2y$12$wFUVuf/e33yge8S0jDBx4Or6snKfLvshIQdyPKnYWr7P6X9w.n3y.', NULL, '2025-05-07 18:22:35', '2025-05-07 18:22:35', 0, 0),
(7, 'Pedro', 'pedro@gmail.com', NULL, '$2y$12$QnM4Cp7VE.PhoEgzPL/p4u9VmVz8pGC6.BlPOYvd5VoSx.HbEUzaq', NULL, '2025-05-07 19:20:26', '2025-05-07 19:22:51', 0, 3),
(8, 'haziq', 'haziq@gmail.com', NULL, '$2y$12$gJB964XoySIAj2QfzCYu.e5Fov6Ez2l4ZPKvi6ZS8uKsOY.qCMRAW', NULL, '2025-05-13 04:40:26', '2025-05-13 04:40:26', 0, 0),
(9, 'Test User', 'test@example.com', '2025-05-13 04:43:06', '$2y$12$3GLN42tKwopa60/fHGSHVOKgFqQvsQcGNdmDhfUuzqgoThUB4zzwG', 'pm9TjqCT3f', '2025-05-13 04:43:07', '2025-05-13 04:43:07', 0, 0),
(10, 'admin', 'admin@gmail.com', NULL, '$2y$12$gWnXJiSmaKG1c7hSQv6zHeLIozSorTY3a.KSba2wFFtzs1NogMSjm', NULL, '2025-05-13 05:13:13', '2025-05-13 05:13:13', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer_id` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 08:09:17', '2025-05-04 08:09:17'),
(2, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 08:36:57', '2025-05-04 08:36:57'),
(3, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 08:40:06', '2025-05-04 08:40:06'),
(4, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 09:04:32', '2025-05-04 09:04:32'),
(5, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 09:08:00', '2025-05-04 09:08:00'),
(6, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 09:11:00', '2025-05-04 09:11:00'),
(7, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 09:14:12', '2025-05-04 09:14:12'),
(8, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 09:42:00', '2025-05-04 09:42:00'),
(9, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 10:35:18', '2025-05-04 10:35:18'),
(10, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 10:41:58', '2025-05-04 10:41:58'),
(11, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 10:45:24', '2025-05-04 10:45:24'),
(12, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 11:01:56', '2025-05-04 11:01:56'),
(13, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 17:55:31', '2025-05-04 17:55:31'),
(14, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 18:31:12', '2025-05-04 18:31:12'),
(15, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 18:40:01', '2025-05-04 18:40:01'),
(16, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 19:57:00', '2025-05-04 19:57:00'),
(17, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 20:05:51', '2025-05-04 20:05:51'),
(18, 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 20:27:42', '2025-05-04 20:27:42'),
(19, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 20:34:22', '2025-05-04 20:34:22'),
(20, 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', '2025-05-04 22:52:04', '2025-05-04 22:52:04'),
(21, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 23:00:12', '2025-05-04 23:00:12'),
(22, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-04 23:04:51', '2025-05-04 23:04:51'),
(23, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-05 04:34:59', '2025-05-05 04:34:59'),
(24, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-05 04:37:31', '2025-05-05 04:37:31'),
(25, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-06 16:49:47', '2025-05-06 16:49:47'),
(26, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-06 18:39:51', '2025-05-06 18:39:51'),
(27, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-06 18:43:14', '2025-05-06 18:43:14'),
(28, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-06 21:40:01', '2025-05-06 21:40:01'),
(29, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-07 02:32:07', '2025-05-07 02:32:07'),
(30, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-07 04:04:03', '2025-05-07 04:04:03'),
(31, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-07 17:54:39', '2025-05-07 17:54:39'),
(32, 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-07 18:22:35', '2025-05-07 18:22:35'),
(33, 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-07 19:09:00', '2025-05-07 19:09:00'),
(34, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-07 19:09:43', '2025-05-07 19:09:43'),
(35, 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-07 19:20:26', '2025-05-07 19:20:26'),
(36, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-07 19:39:12', '2025-05-07 19:39:12'),
(37, 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-07 19:41:50', '2025-05-07 19:41:50'),
(38, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-08 00:44:40', '2025-05-08 00:44:40'),
(39, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-08 00:47:10', '2025-05-08 00:47:10'),
(40, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-08 01:03:51', '2025-05-08 01:03:51'),
(41, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-08 04:58:39', '2025-05-08 04:58:39'),
(42, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-08 05:16:56', '2025-05-08 05:16:56'),
(43, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-08 05:20:06', '2025-05-08 05:20:06'),
(44, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-08 05:23:06', '2025-05-08 05:23:06'),
(45, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-08 17:09:56', '2025-05-08 17:09:56'),
(46, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-05-08 17:10:42', '2025-05-08 17:10:42'),
(47, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-10 22:57:02', '2025-05-10 22:57:02'),
(48, 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', '2025-05-13 05:13:13', '2025-05-13 05:13:13'),
(49, 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', '2025-05-13 05:13:45', '2025-05-13 05:13:45'),
(50, 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', '2025-05-13 05:13:58', '2025-05-13 05:13:58'),
(51, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', '2025-05-13 05:41:54', '2025-05-13 05:41:54'),
(52, 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', '2025-05-13 05:48:54', '2025-05-13 05:48:54'),
(53, 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', '2025-05-13 06:09:28', '2025-05-13 06:09:28'),
(54, 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', '2025-05-13 06:10:28', '2025-05-13 06:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_scores`
--

CREATE TABLE `user_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

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
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussions_user_id_foreign` (`user_id`);

--
-- Indexes for table `discussion_replies`
--
ALTER TABLE `discussion_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion_replies_discussion_id_foreign` (`discussion_id`),
  ADD KEY `discussion_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fantasy_leaderboards`
--
ALTER TABLE `fantasy_leaderboards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fantasy_leaderboards_user_id_foreign` (`user_id`);

--
-- Indexes for table `fantasy_teams`
--
ALTER TABLE `fantasy_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fantasy_teams_user_id_foreign` (`user_id`);

--
-- Indexes for table `fantasy_team_players`
--
ALTER TABLE `fantasy_team_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fantasy_team_players_fantasy_team_id_foreign` (`fantasy_team_id`),
  ADD KEY `fantasy_team_players_player_id_foreign` (`player_id`);

--
-- Indexes for table `favorite_teams`
--
ALTER TABLE `favorite_teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorite_teams_user_id_team_id_unique` (`user_id`,`team_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_user_id_foreign` (`user_id`);

--
-- Indexes for table `fpl_matches`
--
ALTER TABLE `fpl_matches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `match_polls`
--
ALTER TABLE `match_polls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `match_polls_user_id_fixture_id_unique` (`user_id`,`fixture_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_team_id_foreign` (`team_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_answers_user_id_foreign` (`user_id`),
  ADD KEY `user_answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_logins_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_scores_user_id_foreign` (`user_id`),
  ADD KEY `user_scores_quiz_id_foreign` (`quiz_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discussion_replies`
--
ALTER TABLE `discussion_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_leaderboards`
--
ALTER TABLE `fantasy_leaderboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fantasy_teams`
--
ALTER TABLE `fantasy_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fantasy_team_players`
--
ALTER TABLE `fantasy_team_players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `favorite_teams`
--
ALTER TABLE `favorite_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fpl_matches`
--
ALTER TABLE `fpl_matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `match_polls`
--
ALTER TABLE `match_polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482606;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_scores`
--
ALTER TABLE `user_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discussion_replies`
--
ALTER TABLE `discussion_replies`
  ADD CONSTRAINT `discussion_replies_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discussion_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fantasy_leaderboards`
--
ALTER TABLE `fantasy_leaderboards`
  ADD CONSTRAINT `fantasy_leaderboards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fantasy_teams`
--
ALTER TABLE `fantasy_teams`
  ADD CONSTRAINT `fantasy_teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fantasy_team_players`
--
ALTER TABLE `fantasy_team_players`
  ADD CONSTRAINT `fantasy_team_players_fantasy_team_id_foreign` FOREIGN KEY (`fantasy_team_id`) REFERENCES `fantasy_teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fantasy_team_players_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorite_teams`
--
ALTER TABLE `favorite_teams`
  ADD CONSTRAINT `favorite_teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedbacks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `match_polls`
--
ALTER TABLE `match_polls`
  ADD CONSTRAINT `match_polls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD CONSTRAINT `user_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_scores`
--
ALTER TABLE `user_scores`
  ADD CONSTRAINT `user_scores_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_scores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
