-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 09:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenstorm`
--

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `period` varchar(255) NOT NULL,
  `prizes_described` text DEFAULT NULL,
  `vote_date` datetime DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `is_published_for_vote` tinyint(1) DEFAULT 0,
  `vote_published_date` datetime DEFAULT NULL,
  `vote_last_published_date` datetime DEFAULT NULL,
  `is_public_vote_completed` tinyint(1) DEFAULT 0,
  `public_vote_completed_date` date DEFAULT NULL,
  `vote_publish_count` int(11) NOT NULL DEFAULT 0,
  `prize_announcement_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `title`, `year`, `period`, `prizes_described`, `vote_date`, `status`, `is_published_for_vote`, `vote_published_date`, `vote_last_published_date`, `is_public_vote_completed`, `public_vote_completed_date`, `vote_publish_count`, `prize_announcement_date`, `created_at`, `updated_at`) VALUES
(1, 'Competition 1', 2025, '2022-2023', '[{\"category\":\"CATEGORY 1\",\"prizes\":[{\"position\":\"Winner\",\"amount\":\"10,000 USD\"},{\"position\":\"Runner-up\",\"amount\":\"5,000 USD\"},{\"position\":\"Second Runner-up\",\"amount\":\"3,000 USD\"},{\"position\":\"Three Special Mentions\",\"amount\":\"3 x 1,000 USD\"}]},{\"category\":\"CATEGORY 2\",\"prizes\":[{\"position\":\"Winner\",\"amount\":\"3,000 USD\"},{\"position\":\"Runner-up\",\"amount\":\"2,000 USD\"},{\"position\":\"Second Runner-up\",\"amount\":\"1,000 USD\"}]}]', NULL, 'active', 0, NULL, NULL, 0, NULL, 0, NULL, '2025-01-26 14:53:33', '2025-01-26 14:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `competition_category`
--

CREATE TABLE `competition_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competition_category`
--

INSERT INTO `competition_category` (`id`, `competition_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elimination`
--

CREATE TABLE `elimination` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `stage_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `reviewer_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `eliminate` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_verifications`
--

CREATE TABLE `email_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_verifications`
--

INSERT INTO `email_verifications` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 2, 'rTBz9jsE16WKGHga4vY0ZU0JJvl2g7QjlMLn6F8pFo4XfOF7kCHtGkHnLr6S8e2I', '2025-01-26 14:54:16', '2025-01-26 14:54:16');

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
(5, '2023_06_27_071211_create_photographers_table', 1),
(6, '2023_06_27_112805_create_photographs_table', 1),
(7, '2023_07_11_104738_add_unique_id_field_to_photographs_table', 1),
(8, '2023_07_12_063001_create_subscriptions_table', 1),
(9, '2023_07_12_113553_create_contacts_table', 1),
(10, '2023_07_18_101332_create_photo_category_table', 1),
(11, '2023_07_18_111513_add_photo_category_fields_to_photographs', 1),
(12, '2023_07_19_052734_create_competitions_table', 1),
(13, '2023_07_19_054141_add_competition_id_field_to_photographs', 1),
(14, '2023_07_20_051247_create_competition_category_table', 1),
(15, '2023_07_24_065644_add_status_fields_to_users_table', 1),
(16, '2023_07_28_044934_create_stages_table', 1),
(17, '2023_07_28_110743_create_stage_reviewers_table', 1),
(18, '2023_08_04_121416_add_delete_at_field_to_photographs_table', 1),
(19, '2023_08_04_185706_add_finish_field_to_stages_table', 1),
(20, '2023_08_07_093224_create_elimination_table', 1),
(21, '2023_08_07_095815_create_validation_table', 1),
(22, '2023_08_15_010150_create_stage_review_table', 1),
(23, '2023_08_21_100852_add_verification_token_to_users_table', 1),
(24, '2023_08_22_092523_create_notifications_table', 1),
(25, '2023_08_26_063754_add_country_code_to_users_table', 1),
(26, '2023_08_28_172551_add_dial_code_alt_to_users_table', 1),
(27, '2023_08_28_180058_add_social_links_to_users_table', 1),
(28, '2023_08_31_105409_add_additional_fields_to_users_table', 1),
(29, '2023_09_02_165142_add_is_student_fields_to_users_table', 1),
(30, '2023_09_07_103504_add_cert_token_field_to_users_table', 1),
(31, '2023_09_10_173054_create_email_verifications_table', 1),
(32, '2023_09_21_002016_add_index_to_users_id', 1),
(33, '2023_09_21_094936_update_eliminate_column_nullable_in_elimination', 1),
(34, '2023_10_08_235254_add_institution_to_users', 1),
(35, '2023_10_20_120120_add_category_field_to_elimination_table', 1),
(36, '2023_10_25_021741_add_category_reviewers_field_to_stages_table', 1),
(37, '2024_01_05_222155_create_voting_table', 1),
(38, '2024_01_05_223319_create_user_votes_table', 1),
(39, '2024_01_08_093126_add_vote_to_competitions_table', 1),
(40, '2024_01_24_092958_create_publish_winners_table', 1),
(41, '2024_01_29_091342_add_winner_published_fields_to_competitions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `type` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notifiable_type`, `notifiable_id`, `data`, `type`, `read_at`, `created_at`, `updated_at`) VALUES
('71edd52e-7c92-4411-a072-2aafd12b9fd4', 'App\\Models\\User', 2, '{\"message\":\"Your profile details has been updated!\",\"description\":\"We are pleased to inform you that your profile setup for the 15th edition of Greenstorm Global Photography Festival is now complete. Thank you for providing the necessary details. We kindly request you to proceed with uploading your photos. Your photographs will not only inspire others but also contribute to building a vibrant and collaborative community.\",\"action\":\"Click your frame to global fame.\"}', 'App\\Notifications\\ProfileCompletionNotification', NULL, '2025-01-26 14:56:33', '2025-01-26 14:56:33');

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
-- Table structure for table `photographers`
--

CREATE TABLE `photographers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `photographer_category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photographers`
--

INSERT INTO `photographers` (`id`, `user_id`, `is_verified`, `photographer_category`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, '2025-01-26 14:56:33', '2025-01-26 14:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `photographs`
--

CREATE TABLE `photographs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `photo_unique_id` text DEFAULT NULL,
  `photo_category` bigint(20) UNSIGNED NOT NULL,
  `competition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `captured_location` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `is_tc_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_categories`
--

CREATE TABLE `photo_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `max_upload_limit` double(8,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_categories`
--

INSERT INTO `photo_categories` (`id`, `title`, `max_upload_limit`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Category 1 <small>( Camera )</small>', 3.00, 'Images clicked using DSLR/Mirrorless cameras.', NULL, NULL),
(2, 'Category 2 <small>( Mobile )</small>', 3.00, 'Images clicked using mobile/smartphone cameras.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publish_winners`
--

CREATE TABLE `publish_winners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `photo_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `place` enum('first_runner_up','second_runner_up','special_jury_mention') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` enum('elimination','validation') DEFAULT NULL,
  `competition_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `category_reviewers` text DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stage_reviewers`
--

CREATE TABLE `stage_reviewers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stage_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stage_review_status`
--

CREATE TABLE `stage_review_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `stage_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `reviewer_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `eliminate` tinyint(1) DEFAULT NULL,
  `score` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `cert_token` text DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other','not_to_say') DEFAULT NULL,
  `is_professional` tinyint(1) DEFAULT NULL,
  `is_student` tinyint(1) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `secondary_contact_number` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `dial_code` varchar(255) DEFAULT NULL,
  `dial_code_alt` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) DEFAULT NULL,
  `signup_through` enum('normal','google','facebook','twitter') NOT NULL,
  `is_conditions_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `facebook_link` text DEFAULT NULL,
  `instagram_link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `cert_token`, `age`, `gender`, `is_professional`, `is_student`, `institution`, `mobile`, `avatar`, `secondary_contact_number`, `dob`, `city`, `country`, `dial_code`, `dial_code_alt`, `zipcode`, `address`, `timezone`, `email_verified_at`, `verification_token`, `role`, `password`, `signup_through`, `is_conditions_accepted`, `remember_token`, `status`, `facebook_link`, `instagram_link`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'green@greenstorm.green', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '$2y$10$VNIjAeSYiyyMYMCzc/UV.uDV6vdCbVNy9nrB5OJGhSfbesAxu6Psy', 'normal', 0, NULL, 1, NULL, NULL, '2025-01-26 14:53:32', '2025-01-26 14:53:32'),
(2, 'Akhil', NULL, 'akhilvinodav@gmail.com', NULL, NULL, 'male', NULL, 0, NULL, '8075370767', NULL, NULL, '2000-01-02', NULL, 'IN', '+91', NULL, NULL, NULL, 'Asia/Calcutta', '2025-01-29 20:25:52', NULL, 'photographer', '$2y$10$rxgErGuZWyWXaDcAA5fTZejS87g1y8ijp0tV7ruRWSF2y7DYxdS8m', 'normal', 1, NULL, 1, NULL, NULL, '2025-01-26 14:54:16', '2025-01-26 14:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_votes`
--

CREATE TABLE `user_votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `photo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `validation`
--

CREATE TABLE `validation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `stage_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `reviewer_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `grade` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `photo_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_published` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competition_category`
--
ALTER TABLE `competition_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competition_category_competition_id_foreign` (`competition_id`),
  ADD KEY `competition_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elimination`
--
ALTER TABLE `elimination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elimination_photo_id_foreign` (`photo_id`),
  ADD KEY `elimination_stage_id_foreign` (`stage_id`),
  ADD KEY `elimination_reviewer_id_foreign` (`reviewer_id`),
  ADD KEY `elimination_category_id_foreign` (`category_id`);

--
-- Indexes for table `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `photographers`
--
ALTER TABLE `photographers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photographers_user_id_foreign` (`user_id`);

--
-- Indexes for table `photographs`
--
ALTER TABLE `photographs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photographs_user_id_foreign` (`user_id`),
  ADD KEY `fk_photographs_photo_category` (`photo_category`),
  ADD KEY `photographs_competition_id_foreign` (`competition_id`);

--
-- Indexes for table `photo_categories`
--
ALTER TABLE `photo_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publish_winners`
--
ALTER TABLE `publish_winners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publish_winners_competition_id_foreign` (`competition_id`),
  ADD KEY `publish_winners_photo_id_foreign` (`photo_id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stages_competition_id_foreign` (`competition_id`);

--
-- Indexes for table `stage_reviewers`
--
ALTER TABLE `stage_reviewers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stage_reviewers_stage_id_foreign` (`stage_id`),
  ADD KEY `stage_reviewers_user_id_foreign` (`user_id`);

--
-- Indexes for table `stage_review_status`
--
ALTER TABLE `stage_review_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stage_review_status_photo_id_foreign` (`photo_id`),
  ADD KEY `stage_review_status_stage_id_foreign` (`stage_id`),
  ADD KEY `stage_review_status_reviewer_id_foreign` (`reviewer_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_index` (`id`);

--
-- Indexes for table `user_votes`
--
ALTER TABLE `user_votes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_votes_user_id_photo_id_unique` (`user_id`,`photo_id`),
  ADD KEY `user_votes_photo_id_foreign` (`photo_id`);

--
-- Indexes for table `validation`
--
ALTER TABLE `validation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `validation_photo_id_foreign` (`photo_id`),
  ADD KEY `validation_stage_id_foreign` (`stage_id`),
  ADD KEY `validation_reviewer_id_foreign` (`reviewer_id`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voting_competition_id_foreign` (`competition_id`),
  ADD KEY `voting_photo_id_foreign` (`photo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `competition_category`
--
ALTER TABLE `competition_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elimination`
--
ALTER TABLE `elimination`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_verifications`
--
ALTER TABLE `email_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photographers`
--
ALTER TABLE `photographers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photographs`
--
ALTER TABLE `photographs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_categories`
--
ALTER TABLE `photo_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publish_winners`
--
ALTER TABLE `publish_winners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stage_reviewers`
--
ALTER TABLE `stage_reviewers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stage_review_status`
--
ALTER TABLE `stage_review_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_votes`
--
ALTER TABLE `user_votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `validation`
--
ALTER TABLE `validation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competition_category`
--
ALTER TABLE `competition_category`
  ADD CONSTRAINT `competition_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `photo_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `competition_category_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `elimination`
--
ALTER TABLE `elimination`
  ADD CONSTRAINT `elimination_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `photo_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `elimination_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photographs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `elimination_reviewer_id_foreign` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `elimination_stage_id_foreign` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photographers`
--
ALTER TABLE `photographers`
  ADD CONSTRAINT `photographers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photographs`
--
ALTER TABLE `photographs`
  ADD CONSTRAINT `fk_photographs_photo_category` FOREIGN KEY (`photo_category`) REFERENCES `photo_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `photographs_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `photographs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `publish_winners`
--
ALTER TABLE `publish_winners`
  ADD CONSTRAINT `publish_winners_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `publish_winners_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photographs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stages`
--
ALTER TABLE `stages`
  ADD CONSTRAINT `stages_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stage_reviewers`
--
ALTER TABLE `stage_reviewers`
  ADD CONSTRAINT `stage_reviewers_stage_id_foreign` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stage_reviewers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stage_review_status`
--
ALTER TABLE `stage_review_status`
  ADD CONSTRAINT `stage_review_status_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photographs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stage_review_status_reviewer_id_foreign` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stage_review_status_stage_id_foreign` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_votes`
--
ALTER TABLE `user_votes`
  ADD CONSTRAINT `user_votes_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photographs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_votes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `validation`
--
ALTER TABLE `validation`
  ADD CONSTRAINT `validation_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photographs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `validation_reviewer_id_foreign` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `validation_stage_id_foreign` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voting`
--
ALTER TABLE `voting`
  ADD CONSTRAINT `voting_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voting_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photographs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
