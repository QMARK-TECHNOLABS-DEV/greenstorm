-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 01:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `green_storm_db`
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
  `max_upload_limit` double(8,2) NOT NULL DEFAULT 0.00,
  `prizes_described` text DEFAULT NULL,
  `vote_date` datetime DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `prize_announcement_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `title`, `year`, `period`, `max_upload_limit`, `prizes_described`, `vote_date`, `status`, `prize_announcement_date`, `created_at`, `updated_at`) VALUES
(1, 'Competition 1', '2023', '2022-2023', 5.00, '[{\"category\":\"CATEGORY 1\",\"prizes\":[{\"position\":\"Winner\",\"amount\":\"10,000 USD\"},{\"position\":\"Runner-up\",\"amount\":\"5,000 USD\"},{\"position\":\"Second Runner-up\",\"amount\":\"3,000 USD\"},{\"position\":\"Three Special Mentions\",\"amount\":\"3 x 1,000 USD\"}]},{\"category\":\"CATEGORY 2\",\"prizes\":[{\"position\":\"Winner\",\"amount\":\"3,000 USD\"},{\"position\":\"Runner-up\",\"amount\":\"2,000 USD\"},{\"position\":\"Second Runner-up\",\"amount\":\"1,000 USD\"}]}]', NULL, 'active', NULL, '2023-07-19 03:23:29', '2023-07-19 03:23:29');

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
(7, 1, 1, NULL, NULL),
(9, 1, 2, NULL, NULL);

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
(8, '2023_07_11_104738_add_unique_id_field_to_photographs_table', 2),
(9, '2023_07_12_063001_create_subscriptions_table', 3),
(10, '2023_07_12_113553_create_contacts_table', 4),
(21, '2023_07_18_101332_create_photo_category_table', 5),
(22, '2023_07_18_111513_add_photo_category_fields_to_photographs', 6),
(26, '2023_07_19_052734_create_competitions_table', 7),
(28, '2023_07_19_054141_add_competition_id_field_to_photographs', 8),
(29, '2023_07_20_051247_create_competition_category_table', 8);

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
(1, 2, 1, NULL, '2023-07-19 03:49:08', '2023-07-19 03:49:08');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photographs`
--

INSERT INTO `photographs` (`id`, `user_id`, `photo_unique_id`, `photo_category`, `competition_id`, `device`, `captured_location`, `year`, `month`, `description`, `image`, `is_tc_accepted`, `created_at`, `updated_at`) VALUES
(1, 2, 'GGPF-2023-101', 1, 1, 'CANON 5D', 'Kochi', '2016', 'September', 'Participants from financially sanctioned countries will re', 'https://vividreal-greenstorm.s3.ap-south-1.amazonaws.com/images/P2Ws5xu9nYGesdonhPNSLFfH7fPR1HxEwT5eg8Mz.jpg', 1, '2023-07-21 02:00:38', '2023-07-21 02:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `photo_categories`
--

CREATE TABLE `photo_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_categories`
--

INSERT INTO `photo_categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Camera Photography<small>( Category 1 )</small>', 'Entries submitted by professional and amateur photographers using DSLR/Mirrorless cameras.', NULL, NULL),
(2, 'Mobile Photography<small>( Category 2 )</small>', 'Entries submitted by students below 18 years of age using mobile phones.', NULL, NULL);

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
  `mobile` varchar(255) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `secondary_contact_number` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) DEFAULT NULL,
  `signup_through` enum('normal','google','facebook','twitter') NOT NULL,
  `is_conditions_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `mobile`, `avatar`, `secondary_contact_number`, `dob`, `city`, `country`, `zipcode`, `address`, `timezone`, `email_verified_at`, `role`, `password`, `signup_through`, `is_conditions_accepted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin@greenstorm.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '$2y$10$OMhlZz6fnFv.nFjFM4FRfu12Vmy0cPqLb8.pk8qIhZCB7f5gC1MHW', 'normal', 0, NULL, '2023-07-18 07:13:50', '2023-07-18 07:13:50'),
(2, 'Safir Vivid-real', 'Vivid-real', 'safirvividreal@gmail.com', '9875253648', 'https://lh3.googleusercontent.com/a/AAcHTteebyTjWpwtt244ax4e90m798sMuyD2FrI20pWIN4oB=s96-c', '9875253646', '1990-01-30', 'Trivandrum', 'IN', '695551', 'Shameer Manzil VIthura', NULL, '2023-07-19 01:50:37', 'photographer', '$2y$10$TbXAL1Wdmr/SZ8Q6qSPnoeKL..qRwKnRfcIc6Jjbxs/i.eglKW9RW', 'google', 0, NULL, '2023-07-19 01:50:37', '2023-07-19 03:49:07');

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photo_categories`
--
ALTER TABLE `photo_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `competition_category`
--
ALTER TABLE `competition_category`
  ADD CONSTRAINT `competition_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `photo_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `competition_category_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
