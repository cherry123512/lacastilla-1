-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 10:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lacastilla`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `curator_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `curator_id`, `title`, `Note`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Carousel 1', 'Note 1', 'carousel_1.png', '2022-08-14 16:48:22', '2022-08-14 16:48:22'),
(2, 2, 'Title 2', 'Note 2', 'carousel_2.png', '2022-08-14 16:48:30', '2022-08-14 16:48:30');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `curator_id` bigint(20) UNSIGNED NOT NULL,
  `type_of_object` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_of_object` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_pieces` int(11) NOT NULL,
  `length` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_and_material` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maker_artist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_of_signation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `location_of_date_on_object` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writing_other_than_signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_collected` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_received` date DEFAULT NULL,
  `original_as_shown` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_original_used` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition_of_object` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_or_received` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_story_of_this_object` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventory_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `curator_id`, `type_of_object`, `location_of_object`, `description_title`, `number_of_pieces`, `length`, `width`, `dimension`, `medium_and_material`, `maker_artist`, `location_of_signation`, `date_of_birth`, `location_of_date_on_object`, `writing_other_than_signature`, `place_of_origin`, `place_collected`, `date_received`, `original_as_shown`, `object_original_used`, `receipt`, `item_description`, `condition_of_object`, `history`, `purchase_or_received`, `personal_story_of_this_object`, `inventory_image`, `created_at`, `updated_at`) VALUES
(1, 2, 'w', 'w', 'w', 1, 'q', 'qw', 'w', 'w', 'w', 'w', '0001-01-01', 'w', 'w', 'w', 'w', '2022-08-05', 'w', 'w', 'w', 'w', 'w', 'w', 'w', 'Personal Story \r\n                                w', 'asdasdasd.png', '2022-08-11 19:19:35', '2022-08-11 19:19:35'),
(2, 2, 'w', 'w', 'w', 1, 'q', 'qw', 'w', 'w', 'w', 'w', '0001-01-01', 'w', 'w', 'w', 'w', '2022-08-05', 'w', 'w', 'w', 'w', 'w', 'w', 'w', 'Personal Story \r\n                                w', 'gdfgsdfag.jpg', '2022-08-11 19:21:07', '2022-08-11 19:21:07'),
(3, 2, 'w', 'w', 'w', 1, '1', '1', '1', '1', '1', '1', '0001-01-01', '1', '1', '1', '1', '0001-01-01', '1', '1', '1', '1', '1', '1', '1', '1                                    Personal Story', 'gdfgqwe.jpg', '2022-08-11 19:21:48', '2022-08-11 19:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `curator_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curator_reply` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `curator_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `curator_id`, `name`, `email`, `subject`, `message`, `remarks`, `curator_reply`, `created_at`, `updated_at`, `curator_subject`) VALUES
(1, 2, 'Sidney', 'salazarjohnsidney@gmail.com', 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'replied', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2022-08-14 21:18:10', '2022-08-16 00:31:43', '');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_12_022004_create_inventories_table', 2),
(6, '2022_08_15_001258_create_carousels_table', 3),
(7, '2022_08_15_002838_create_services_table', 4),
(8, '2022_08_15_044521_create_messages_table', 5),
(9, '2022_08_16_002856_add_column_to_message', 6),
(10, '2022_08_16_004939_create_schedules_table', 7),
(11, '2022_08_16_005139_create_schedule_details_table', 8),
(12, '2022_08_24_111757_create_reservations_table', 9),
(13, '2022_08_24_112145_create_reservation_details_table', 9),
(14, '2022_08_24_125631_add_column_reservations', 9);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_persons` int(11) NOT NULL,
  `validation_date` date DEFAULT NULL,
  `curator_id` bigint(20) DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `schedule_id`, `user_id`, `reservation_date`, `reservation_time`, `number_of_persons`, `validation_date`, `curator_id`, `remarks`, `status`, `created_at`, `updated_at`, `image`) VALUES
(1, 1, 3, '2022-08-25', '07:56:39 am', 40, NULL, NULL, 'Pending Approval', 'Pending Approval', '2022-08-24 23:56:39', '2022-08-24 23:56:39', ''),
(2, 1, 3, '2022-08-25', '08:00:54 am', 35, NULL, NULL, 'Pending Approval', 'Pending Approval', '2022-08-25 00:00:54', '2022-08-25 00:00:54', ''),
(3, 1, 3, '2022-08-25', '08:01:00 am', 10, NULL, NULL, 'Pending Approval', 'Pending Approval', '2022-08-25 00:01:00', '2022-08-25 00:01:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_details`
--

CREATE TABLE `reservation_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_details`
--

INSERT INTO `reservation_details` (`id`, `reservation_id`, `service_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, '2', 0.00, '2022-08-24 23:56:39', '2022-08-24 23:56:39'),
(2, 1, '3', 0.00, '2022-08-24 23:56:39', '2022-08-24 23:56:39'),
(3, 2, '2', 0.00, '2022-08-25 00:00:54', '2022-08-25 00:00:54'),
(4, 2, '3', 0.00, '2022-08-25 00:00:54', '2022-08-25 00:00:54'),
(5, 3, '2', 0.00, '2022-08-25 00:01:00', '2022-08-25 00:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `curator_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `curator_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '', '2022-08-15 17:00:54', '2022-08-15 17:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_details`
--

CREATE TABLE `schedule_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `time_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_details`
--

INSERT INTO `schedule_details` (`id`, `schedule_id`, `date`, `time_from`, `time_to`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-08-16', '09:00', '12:00', '', '2022-08-15 17:00:54', '2022-08-15 17:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `curator_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(15,2) NOT NULL,
  `service_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `curator_id`, `title`, `description`, `amount`, `service_image`, `created_at`, `updated_at`) VALUES
(2, 2, 'Service 2', 'Sample Service', 5000.00, 'services_2.png', '2022-08-15 19:13:10', '2022-08-15 19:13:10'),
(3, 2, 'Service 1', 'Sample', 1000.00, 'service_1.png', '2022-08-15 19:14:52', '2022-08-15 19:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact_number`, `user_type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Cherry Del Rosario', '09533844872', 'admin', 'lacastilla.official@gmail.com', '2022-08-11 17:17:52', '$2y$10$3LN6saR/5I1IMPBAkAxJTeap7y4YarUs/rkjCOf85EtEil.sH3gpi', 'PXutCVD1tL4kDFCJ9zCKH3zxmcPCCs0jBmjbqxFpNaGD6pH6fE8UwuKr6T14', '2022-08-11 17:15:10', '2022-08-11 17:17:52'),
(3, 'Sidney Salazar', '09533844872', 'client', 'salazarjohnsidney@gmail.com', '2022-08-24 15:54:42', '$2y$10$wBWyZdh8T3cmEI3fVaJJeuaQp9UNixVaM0ZLNz5ntQr37aWz.0TGO', NULL, '2022-08-24 15:54:05', '2022-08-24 15:54:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carousels_curator_id_index` (`curator_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_curator_id_index` (`curator_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_details`
--
ALTER TABLE `reservation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_curator_id_index` (`curator_id`);

--
-- Indexes for table `schedule_details`
--
ALTER TABLE `schedule_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_details_schedule_id_index` (`schedule_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_curator_id_index` (`curator_id`);

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
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation_details`
--
ALTER TABLE `reservation_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule_details`
--
ALTER TABLE `schedule_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carousels`
--
ALTER TABLE `carousels`
  ADD CONSTRAINT `carousels_curator_id_foreign` FOREIGN KEY (`curator_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_curator_id_foreign` FOREIGN KEY (`curator_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_curator_id_foreign` FOREIGN KEY (`curator_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `schedule_details`
--
ALTER TABLE `schedule_details`
  ADD CONSTRAINT `schedule_details_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_curator_id_foreign` FOREIGN KEY (`curator_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
