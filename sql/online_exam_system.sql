-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 04:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam_system`
--

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
(5, '2021_02_19_225454_create_oex_categories_table', 2),
(7, '2021_02_19_230757_create_oex_students_table', 2),
(9, '2021_02_19_230140_create_oex_exam_masters_table', 4),
(10, '2021_02_19_231614_create_oex__portals_table', 5),
(11, '2021_03_01_073244_create_questions_table', 6),
(12, '2021_03_04_161512_create_results_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `oex_categories`
--

CREATE TABLE `oex_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_categories`
--

INSERT INTO `oex_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(22, 'Quiz test 1', 1, '2021-02-25 12:15:57', '2021-02-25 12:15:57'),
(23, 'Class Test 1', 1, '2021-02-28 12:16:19', '2021-02-25 12:16:19'),
(24, 'Class Test 2', 1, '2021-02-28 12:16:31', '2021-02-25 12:16:31'),
(26, 'Mid', 1, '2021-03-01 16:20:03', '2021-03-01 16:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `oex_exam_masters`
--

CREATE TABLE `oex_exam_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_exam_masters`
--

INSERT INTO `oex_exam_masters` (`id`, `title`, `category`, `exam_date`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Exam 3', '9', '2021-03-13', '1', '2021-02-22 14:31:38', '2021-02-22 14:41:45'),
(4, 'Exam 2', '9', '2021-03-16', '1', '2021-02-22 18:32:23', '2021-02-22 20:10:23'),
(5, 'CSE 111', '22', '2021-02-28', '1', '2021-02-25 12:17:21', '2021-02-25 12:17:21'),
(6, 'Math 101', '25', '2021-02-07', '1', '2021-02-25 12:17:45', '2021-02-25 12:17:45'),
(7, 'CSE 121', NULL, NULL, '1', '2021-02-25 12:18:11', '2021-02-26 15:58:23'),
(8, 'ECO 101', '24', '2021-02-23', '1', '2021-02-25 12:18:47', '2021-02-25 12:28:28'),
(9, 'CSE 100', '24', '2021-03-06', '1', '2021-02-28 09:41:54', '2021-02-28 09:41:54'),
(10, 'math100', '22', '2021-03-05', '1', '2021-03-01 00:35:58', '2021-03-01 00:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `oex_students`
--

CREATE TABLE `oex_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_students`
--

INSERT INTO `oex_students` (`id`, `name`, `email`, `mobile_no`, `dob`, `exam`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rashed', 'rashedvirus00@gmail.com', '01827801715', '2021-02-16', '3', '66586', '1', '2021-02-23 11:31:20', '2021-02-23 15:55:12'),
(4, 'rakib sharif', 'rakib@gmail.com', '01827801715', '2021-02-17', '4', '654321', '1', '2021-02-23 14:29:02', '2021-02-24 08:55:18'),
(5, 'virus', 'virus00@gmail.com', '01824801020', '2021-02-25', '7', '1234566', '1', '2021-02-26 17:13:45', '2021-02-26 17:13:45'),
(6, 'virus', 'virus00@gmail.com', '01824801020', '2021-02-25', '7', '1234566', '1', '2021-02-26 17:18:15', '2021-02-26 17:18:15'),
(7, 'virus', 'virus00@gmail.com', '01824801020', '2021-02-25', '7', '1234566', '1', '2021-02-26 17:18:43', '2021-02-26 17:18:43'),
(8, 'qwertyio', '1@gmail.com', '123456789', '2021-02-25', '7', '123456789', '1', '2021-02-26 17:22:31', '2021-02-26 17:22:31'),
(9, 'qwertyio', '1@gmail.com', '123456789', '2021-02-25', '7', '123456789', '1', '2021-02-26 17:25:55', '2021-02-26 17:25:55'),
(10, 'qwertyio', '1@gmail.com', '123456789', '2021-02-25', '7', '123456789', '1', '2021-02-26 17:26:18', '2021-02-26 17:26:18'),
(11, 'Rashedul Aziz Rashed', 'rnrashedrn@gmail.com', '01824801020', '2021-02-24', '5', '123456789', NULL, '2021-02-27 11:16:49', '2021-02-27 11:16:49'),
(12, 'Rashedul Aziz Rashed', '12a@gmail.com', '01827801715', '1995-05-06', '9', '123456', NULL, '2021-02-28 09:43:49', '2021-02-28 11:30:46'),
(13, 'Rashed', 'ra@gmail.com', '01827801715', '1995-05-06', '12', '123456', NULL, '2021-02-28 10:01:47', '2021-02-28 10:01:47'),
(14, 'Rashed', 'ra@gmail.com', '01827801715', '1995-05-06', '12', '123456', NULL, '2021-02-28 10:04:53', '2021-02-28 10:04:53'),
(15, 'Rashed', 'rash@gmail.com', '01827801715', '1995-05-06', '12', '123456', NULL, '2021-02-28 10:07:41', '2021-02-28 10:07:41'),
(16, 'Rashed', 'ra@gmail.com', '01827801715', '1995-05-06', '12', '123456', NULL, '2021-02-28 10:10:14', '2021-02-28 10:10:14'),
(17, 'Rashed', 'ra@gmail.com', '01827801715', '1995-05-06', '12', '123456', NULL, '2021-02-28 10:13:43', '2021-02-28 10:13:43'),
(18, 'Rashed', 'ra@gmail.com', '01827801715', '1995-05-06', '12', '123456', NULL, '2021-02-28 10:19:14', '2021-02-28 10:19:14'),
(19, 'Rashed', 'ras@gmail.com', '01827801715', '1995-05-06', '12', '123456', NULL, '2021-02-28 10:22:18', '2021-02-28 10:22:18'),
(20, 'Rashedul Aziz Rashed', 'rashedvirus00@gmail.com', '01827801715', '2021-03-17', '10', '123456', '1', '2021-03-01 00:37:02', '2021-03-01 00:37:02'),
(21, 'RASHEDUL AZIZ RASHED', 'abc@gmail.com', '01306537695', '2021-03-04', '9', '654321', '1', '2021-03-03 02:05:03', '2021-03-03 02:05:03'),
(22, 'Rakib', 'rakib@gmail.com', '1234560-', '2021-03-25', '9', '123456', '1', '2021-03-04 13:01:59', '2021-03-04 13:01:59'),
(23, 'Rashedul Aziz Rashed', 'rashed@gmail.com', '123457', '2021-03-17', '9', '12345678', '1', '2021-03-04 13:34:34', '2021-03-04 13:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `oex__portals`
--

CREATE TABLE `oex__portals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex__portals`
--

INSERT INTO `oex__portals` (`id`, `name`, `email`, `mobile_no`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rashedul Aziz Rashed', 'rashedvirus00@gmail.com', '01827801715', '66586', '1', '2021-02-24 09:50:52', '2021-02-24 10:19:56'),
(4, 'rakib', 'rakib@gmail.com', '01824801020', '1234566', '1', '2021-02-24 13:39:46', '2021-02-24 13:44:34'),
(5, 'Rashed', 'rashed@gmail.com', '01827801715', '12345678', '1', '2021-02-24 14:37:04', '2021-02-24 14:37:04'),
(6, 'rakib bura', 'ra@gmail.com', '01827801715', '123456789', '1', '2021-02-24 14:56:40', '2021-02-25 12:20:15');

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
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question`, `ans`, `options`, `status`, `created_at`, `updated_at`) VALUES
(7, '10', 'BBB', 'AB', '{\"option1\":\"ABC\",\"option2\":\"AB\",\"option3\":\"A\",\"option4\":\"B\"}', '1', '2021-03-02 13:23:43', '2021-03-03 02:02:31'),
(9, '9', 'AAAA', 'C', '{\"option1\":\"A\",\"option2\":\"B\",\"option3\":\"C\",\"option4\":\"D\"}', '1', '2021-03-03 03:23:07', '2021-03-03 03:23:07'),
(10, '10', 'ABC', 'A', '{\"option1\":\"A\",\"option2\":\"B\",\"option3\":\"C\",\"option4\":\"D\"}', '1', '2021-03-04 10:56:28', '2021-03-04 10:56:28'),
(11, '8', 'a', 'aa', '{\"option1\":\"a\",\"option2\":\"aaaa\",\"option3\":\"aaa\",\"option4\":\"aa\"}', '1', '2021-03-04 13:03:57', '2021-03-04 13:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yes_ans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_json` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `exam_id`, `user_id`, `yes_ans`, `no_ans`, `result_json`, `created_at`, `updated_at`) VALUES
(7, '10', '20', '1', '1', '{\"7\":\"Yes\",\"10\":\"No\"}', '2021-03-05 09:12:59', '2021-03-05 09:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Rashedul Aziz', 'Rashed', 'Rashed', 'rnrashedrn@gmail.com', '$2y$10$B0CozzbEiH8S9KtH1x.MmuOqbRfxEKRnGzHkyjpGV9N6JvI5ouhq2', '01827801715', 'jB6QOEZUQ4VrFoJ84h8CGHmoRlRIXrNyM1JK0JGmayZqLu4oz82pHzwQ3IDL', '2021-02-19 13:40:51', '2021-02-19 13:40:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_categories`
--
ALTER TABLE `oex_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_exam_masters`
--
ALTER TABLE `oex_exam_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_students`
--
ALTER TABLE `oex_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex__portals`
--
ALTER TABLE `oex__portals`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `oex_categories`
--
ALTER TABLE `oex_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `oex_exam_masters`
--
ALTER TABLE `oex_exam_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oex_students`
--
ALTER TABLE `oex_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `oex__portals`
--
ALTER TABLE `oex__portals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
