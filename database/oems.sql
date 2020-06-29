-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2020 at 04:10 PM
-- Server version: 8.0.20-0ubuntu0.20.04.1
-- PHP Version: 7.2.31-1+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `ans_id` bigint UNSIGNED NOT NULL,
  `exam_id` int NOT NULL,
  `qn_id` int NOT NULL,
  `opt_a` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_b` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_c` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_d` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_ans` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(32, 44, 32, 'o', 'o', 'o', 'oo', 'a', '2020-05-02 19:57:48'),
(33, 45, 33, 'k', 'k', 'k', 'k', 'a', '2020-05-08 16:05:56'),
(34, 46, 34, 'l', 'l', 'l', 'l', 'a', '2020-05-09 09:21:26'),
(35, 47, 35, 'h', 'hjg', 'hjg', 'hjg', 'a', '2020-05-18 05:19:56'),
(36, 48, 36, '3', '3', '33', '3', 'a', '2020-05-18 17:15:29'),
(37, 49, 37, 'l', 'l', 'l', 'l', 'a', '2020-05-20 15:55:47'),
(38, 50, 38, 'option one a', 'option one b', 'option one c', 'option one d', 'a', '2020-05-31 16:34:16'),
(39, 50, 39, 'option two a', 'option one b', 'option two c', 'option two d', 'b', '2020-05-31 16:34:16'),
(40, 50, 40, 'option three a', 'option three b', 'option three c', 'option three d', 'c', '2020-05-31 16:34:17'),
(41, 50, 41, 'option four a', 'option four b', 'option four c', 'option four d', 'd', '2020-05-31 16:34:18'),
(42, 50, 42, 'option five a', 'option five b', 'option five c', 'option five d', 'a', '2020-05-31 16:34:19'),
(43, 57, 43, 'option one a', 'option one b', 'option one c', 'option one d', 'a', '2020-06-10 16:09:35'),
(44, 57, 44, 'option two a', 'option one b', 'option two c', 'option two d', 'b', '2020-06-10 16:09:35'),
(45, 57, 45, 'option three a', 'option three b', 'option three c', 'option three d', 'c', '2020-06-10 16:09:35'),
(46, 57, 46, 'option four a', 'option four b', 'option four c', 'option four d', 'd', '2020-06-10 16:09:35'),
(47, 57, 47, 'option five a', 'option five b', 'option five c', 'option five d', 'a', '2020-06-10 16:09:35'),
(48, 57, 48, 'option six a', 'option six b', 'option six c', 'option six d', 'b', '2020-06-10 16:09:36'),
(49, 58, 49, 'l', 'l', 'l', 'l', 'a', '2020-06-10 16:17:10'),
(50, 58, 50, 'k', 'k', 'k', 'k', 'a', '2020-06-10 16:17:10'),
(51, 58, 51, 'j', 'j', 'j', 'j', 'a', '2020-06-10 16:17:11'),
(52, 58, 52, 'p', 'p', 'p', 'p', 'a', '2020-06-10 16:17:11'),
(53, 58, 53, 'u', 'u', 'u', 'u', 'a', '2020-06-10 16:17:11'),
(54, 59, 54, 'kjbkjb', 'jkbjkbkj', 'kjbkjb', 'kjbkjb', 'a', '2020-06-29 07:16:42'),
(55, 59, 55, 'jhvjhvb', 'hbhjbjhb', 'jhbjhbjh', 'jhbjhb', 'b', '2020-06-29 07:16:42'),
(56, 59, 56, 'kjhbhbmb', 'mnb', 'mnbm', 'nb', 'c', '2020-06-29 07:16:42'),
(57, 59, 57, 'kgkjhkjhkjh', 'jkhj', 'khjkhjkhjk', 'hkjhkjhjk', 'd', '2020-06-29 07:16:42'),
(58, 59, 58, 'jgjhgjhgjh', 'hj', 'ghjghjghjg', 'hgjhghjg', 'a', '2020-06-29 07:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int NOT NULL,
  `cat_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Computer'),
(2, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

CREATE TABLE `exam_master` (
  `id` bigint UNSIGNED NOT NULL,
  `exam_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_start_time` timestamp NULL DEFAULT NULL,
  `exam_end_time` timestamp NULL DEFAULT NULL,
  `total_questions` int DEFAULT NULL,
  `right_mark` int NOT NULL,
  `wrong_mark` int NOT NULL,
  `pass_mark` int NOT NULL,
  `category` int NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`id`, `exam_name`, `exam_start_time`, `exam_end_time`, `total_questions`, `right_mark`, `wrong_mark`, `pass_mark`, `category`, `is_active`, `created_at`) VALUES
(59, 'syama_exam', '2020-06-29 07:15:01', '2020-07-01 07:16:01', 5, 1, 0, 3, 1, 1, '2020-06-29 07:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qn_id` bigint UNSIGNED NOT NULL,
  `exam_id` int NOT NULL,
  `qn_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qn_id`, `exam_id`, `qn_name`, `created_at`) VALUES
(24, 40, 'Question one', '2020-05-02 19:13:55'),
(25, 40, 'Question two', '2020-05-02 19:13:55'),
(26, 40, 'Question three', '2020-05-02 19:13:55'),
(27, 40, 'Question four', '2020-05-02 19:13:55'),
(28, 40, 'Question five', '2020-05-02 19:13:55'),
(29, 41, 'k', '2020-05-02 19:34:23'),
(30, 42, 'l', '2020-05-02 19:38:27'),
(31, 43, 'j', '2020-05-02 19:57:17'),
(32, 44, 'o', '2020-05-02 19:57:48'),
(33, 45, 'k', '2020-05-08 16:05:56'),
(34, 46, 'lLlllLl', '2020-05-09 09:21:26'),
(35, 47, 'jhghjh', '2020-05-18 05:19:56'),
(36, 48, '3', '2020-05-18 17:15:29'),
(37, 49, 'l', '2020-05-20 15:55:47'),
(38, 50, 'Question one', '2020-05-31 16:34:15'),
(39, 50, 'Question two', '2020-05-31 16:34:16'),
(40, 50, 'Question three', '2020-05-31 16:34:17'),
(41, 50, 'Question four', '2020-05-31 16:34:18'),
(42, 50, 'Question five', '2020-05-31 16:34:18'),
(43, 57, 'Question one', '2020-06-10 16:09:35'),
(44, 57, 'Question two', '2020-06-10 16:09:35'),
(45, 57, 'Question three', '2020-06-10 16:09:35'),
(46, 57, 'Question four', '2020-06-10 16:09:35'),
(47, 57, 'Question five', '2020-06-10 16:09:35'),
(48, 57, 'Question six', '2020-06-10 16:09:35'),
(49, 58, 'Question one', '2020-06-10 16:17:10'),
(50, 58, 'Question two', '2020-06-10 16:17:10'),
(51, 58, 'Question three', '2020-06-10 16:17:10'),
(52, 58, 'Question four', '2020-06-10 16:17:11'),
(53, 58, 'Question five', '2020-06-10 16:17:11'),
(54, 59, 'qn 1', '2020-06-29 07:16:42'),
(55, 59, 'qn 2', '2020-06-29 07:16:42'),
(56, 59, 'qn 3', '2020-06-29 07:16:42'),
(57, 59, 'qn 4', '2020-06-29 07:16:42'),
(58, 59, 'qn 5', '2020-06-29 07:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `res_id` int NOT NULL,
  `candidate_id` int NOT NULL,
  `exam_id` int NOT NULL,
  `qn_id` int NOT NULL,
  `ans_opt` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`res_id`, `candidate_id`, `exam_id`, `qn_id`, `ans_opt`, `created_at`) VALUES
(11, 12, 59, 54, 'a', '2020-06-29 08:51:34'),
(12, 12, 59, 55, 'a', '2020-06-29 08:51:35'),
(13, 12, 59, 56, 'a', '2020-06-29 08:51:35'),
(14, 12, 59, 57, 'a', '2020-06-29 08:51:35'),
(15, 12, 59, 58, 'a', '2020-06-29 08:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `cat_id` int DEFAULT NULL,
  `exam_id` int DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `is_admin`, `cat_id`, `exam_id`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 1, 1, NULL, '$2y$10$CTOc2vZuqmlngwnOu5HaKuAexDGt0gr4iXLntKopvZ16MfeXJxNEe', '2020-04-25 10:20:29', '2020-04-25 10:20:29'),
(12, 'syama', 'syama', 0, 1, NULL, '$2y$10$cGpbezVYHNLgq5yYal3tzuqL1Ihy/IyVJwbXVOXEI94XyHAA1EaYi', '2020-06-29 07:14:48', NULL);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qn_id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`res_id`);

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
  MODIFY `ans_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_master`
--
ALTER TABLE `exam_master`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qn_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `res_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
