-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2020 at 08:13 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.2.30-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oems`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `qn_id` int(11) NOT NULL,
  `opt_a` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_b` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_c` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_d` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_ans` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `exam_id`, `qn_id`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `correct_ans`, `created_at`) VALUES
(24, 40, 24, 'l', 'l', 'l', 'l', 'a', '2020-05-02 19:13:55'),
(25, 40, 25, 'k', 'k', 'k', 'k', 'a', '2020-05-02 19:13:55'),
(26, 40, 26, 'j', 'j', 'j', 'j', 'a', '2020-05-02 19:13:55'),
(27, 40, 27, 'p', 'p', 'p', 'p', 'a', '2020-05-02 19:13:55'),
(28, 40, 28, 'u', 'u', 'u', 'u', 'a', '2020-05-02 19:13:55'),
(29, 41, 29, 'k', 'k', 'k', 'k', 'a', '2020-05-02 19:34:23'),
(30, 42, 30, 'l', 'l', 'l', 'l', 'a', '2020-05-02 19:38:27'),
(31, 43, 31, 'j', 'j', 'j', 'jj', 'a', '2020-05-02 19:57:17'),
(32, 44, 32, 'o', 'o', 'o', 'oo', 'a', '2020-05-02 19:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Computer'),
(2, 'ffgdfhdf');

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

CREATE TABLE `exam_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_start_time` timestamp NULL DEFAULT NULL,
  `exam_end_time` timestamp NULL DEFAULT NULL,
  `total_questions` int(11) DEFAULT NULL,
  `right_mark` int(11) NOT NULL,
  `wrong_mark` int(11) NOT NULL,
  `pass_mark` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`id`, `exam_name`, `exam_start_time`, `exam_end_time`, `total_questions`, `right_mark`, `wrong_mark`, `pass_mark`, `category`, `is_active`, `created_at`) VALUES
(40, 'exam', '2020-05-02 19:12:54', '2020-05-09 19:12:16', 5, 0, -1, 0, 1, 1, '2020-05-02 19:13:03'),
(41, 'k', '2020-05-02 19:34:07', '2020-05-09 19:33:59', 1, 1, 1, 1, 1, 1, '2020-05-02 19:34:15'),
(42, 'o', '2020-05-02 19:38:16', '2020-05-09 19:38:07', 1, 0, -1, 0, 1, 1, '2020-05-02 19:38:21'),
(43, 'k', '2020-05-02 19:57:05', '2020-05-09 19:57:01', 1, 0, -1, 0, 1, 1, '2020-05-02 19:57:12'),
(44, 'o', '2020-05-02 19:57:35', '2020-05-09 19:57:30', 1, 0, -1, 0, 1, 1, '2020-05-02 19:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_25_153828_create_exam_master', 1),
(5, '2020_04_25_153908_create_questions', 1),
(6, '2020_04_25_153920_create_answers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qn_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `qn_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qn_id`, `exam_id`, `qn_name`, `created_at`) VALUES
(24, 40, 'l', '2020-05-02 19:13:55'),
(25, 40, 'k', '2020-05-02 19:13:55'),
(26, 40, 'j', '2020-05-02 19:13:55'),
(27, 40, 'p', '2020-05-02 19:13:55'),
(28, 40, 'u', '2020-05-02 19:13:55'),
(29, 41, 'k', '2020-05-02 19:34:23'),
(30, 42, 'l', '2020-05-02 19:38:27'),
(31, 43, 'j', '2020-05-02 19:57:17'),
(32, 44, 'o', '2020-05-02 19:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `cat_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `is_admin`, `cat_id`, `exam_id`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 1, 1, NULL, '$2y$10$CTOc2vZuqmlngwnOu5HaKuAexDGt0gr4iXLntKopvZ16MfeXJxNEe', '2020-04-25 10:20:29', '2020-04-25 10:20:29'),
(4, 'Hari', 'hari', 0, 1, NULL, '$2y$10$ENs..76eFHbHZO..3BQd2.hXHean59Pp05r8tQVXPjcH19JieLPZm', '2020-04-25 18:01:12', NULL),
(5, 'ghghgh', 'dfgdfgdfg', 0, 2, NULL, '$2y$10$ZZnSu3XHjVcHU.zDkvB5R.Qfsow938H9hseL/yCZ/L.tCZbJnBRR2', '2020-04-26 04:43:09', NULL),
(7, 'dfgdfg', 'dfgdg', 0, 2, NULL, '$2y$10$Tl9ZtS81MtFjwAF4CWMkOOKr2OpXfoBvfy7ufV.q58Muh6UdSpUam', '2020-04-26 08:03:24', NULL),
(8, 'xfbbfbfd', 'dfgdfgd', 0, NULL, NULL, '$2y$10$buGW4GQq8d5EDETDQa1UuOm1YoJ2dDouedyCApyV3lMQ4wi5AVyfS', '2020-04-26 08:04:35', NULL),
(9, 'aaaa', 'sdfgdfg', 0, NULL, NULL, '$2y$10$QnatAwvYsl9Bh0R4Jf287O1YKCd672WZhUmrjdGnhi/90N1B60RfW', '2020-04-26 08:51:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `exam_master`
--
ALTER TABLE `exam_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qn_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam_master`
--
ALTER TABLE `exam_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qn_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
