-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 05:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty_salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','confirmed','cancelled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `message` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cash',
  `parlour_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `status`, `message`, `date_time`, `payment_status`, `parlour_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'pending', NULL, '2024-11-27 17:04:00', 'cash', 5, 3, '2024-11-25 15:06:53', '2024-11-25 15:06:53'),
(2, 7, 'pending', NULL, '2024-11-28 21:41:00', 'cash', 6, 4, '2024-11-26 14:41:59', '2024-11-26 14:41:59'),
(3, 7, 'confirmed', NULL, '2024-12-05 16:42:00', 'cash', 1, 1, '2024-11-26 14:42:19', '2024-11-27 12:45:50'),
(4, 5, 'cancelled', NULL, '2024-12-07 17:44:00', 'cash', 1, 1, '2024-11-26 15:44:38', '2024-11-27 12:46:02'),
(5, 5, 'pending', NULL, '2024-11-28 22:48:00', 'cash', 1, 6, '2024-11-26 20:49:10', '2024-11-26 20:49:10'),
(7, 5, 'pending', NULL, '2024-11-30 16:24:00', 'cash', 4, 2, '2024-11-27 14:24:53', '2024-11-27 14:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1),
(25, '2020_01_07_093648_create_parlours_table', 1),
(26, '2020_01_07_093744_create_services_table', 1),
(27, '2020_01_07_093816_create_products_table', 1),
(28, '2020_01_07_122411_slider_image', 2),
(30, '2020_01_07_143103_create_payments_table', 4),
(31, '2020_01_07_122411_slider__image', 5),
(32, '2020_01_07_122411_slider_images', 6),
(33, '2020_01_07_122411_slider__images', 7),
(34, '2020_01_07_135339_create_appointments_table', 8),
(35, '2020_11_26_180304_add_is_active_to_services_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `parlours`
--

CREATE TABLE `parlours` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_f_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_l_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `location_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about_parlour` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `availability` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parlours`
--

INSERT INTO `parlours` (`id`, `user_id`, `name`, `image`, `owner_f_name`, `owner_l_name`, `address`, `gender`, `city`, `mobile`, `location_url`, `about_parlour`, `availability`, `created_at`, `updated_at`) VALUES
(1, 2, 'Beautic', '1579288336.jpg', 'Bhumi', 'Boricha', 'Tagor RoadNear om complex,Ahmedabad', 'Female', 'Ahmedabad', '6351672807', 'https://goo.gl/maps/urdQB3YaPKmpToNT7', 'It is most visited and most searched parlour in ahmedabad', 'available', '2020-01-17 13:42:16', '2024-11-27 13:59:21'),
(4, 4, 'Milan Salon', '1579513259.jpg', 'Milan', 'Valsur', 'F-102, Near Time Square, 150 fits ring road,Rajkot', 'Male', 'Rajkot', '8596741425', 'https://goo.gl/maps/ppmY89G7xNqqu5ccA', 'Milan Salon And Day Spa is an upscale, full service spa and salon for more than 15 years in El Paso . We offer hair, nail, massage and skin care services for men and women', 'available', '2020-01-20 04:10:59', '2020-01-20 04:10:59'),
(5, 3, 'RK Salon', '1579537628.jpg', 'Romil', 'Khokhani', 'A85 , Siddharth nagar, simada gaam', 'Male', 'Surat', '8200925624', 'https://goo.gl/maps/mjX4bD36dR4phzJS7', 'My palour is very big in varachha area', 'available', '2020-01-20 10:57:08', '2020-01-20 10:57:08'),
(6, 6, 'Smart Palour', '1579586857.jpg', 'Romil', 'Khokhani', 'A-202, Near Limda chowk', 'Male', 'Jetpur', '8200925625', 'https://www.google.com/search?client=firefox-b-e&q=google+map', 'very good parlour', 'available', '2020-01-21 00:37:37', '2020-01-21 00:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('borichab656@gmail.com', '$2y$10$rMdBOuuxb9vJ1cdztoifdeKWDFHPQpVDXWCzvbgVWwZRW6cLRnmNW', '2024-11-24 16:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `appointment_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parlour_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `parlour_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `parlour_id`, `name`, `image`, `description`, `category`, `duration`, `price`, `discount`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 1, 'Facial', '1579334145.jpg', 'A facial is a family of skin care treatments for the face, including steam, exfoliation, extraction, creams, lotions, facial masks, peels, and massage.', 'Woman', '20', 600.00, 10.00, '2020-01-18 02:25:45', '2024-11-27 14:15:29', 1),
(2, 4, 'Hair Cutting', '1579514104.jpg', 'Hair trimming is intended to maintain a specific shape & form. There are ways to trim one\'s own hair but usually another person is enlisted to perform the process, as it is difficult to maintain symmetry while cutting hair at the back of one\'s head.', 'Man', '00:30:00', 120.00, 0.00, '2020-01-20 04:25:04', '2020-01-20 04:25:04', 1),
(3, 5, 'Shaving', '1579537820.jpg', 'Hairdresser shaving an old-fashioned razor of satisfied client..', 'Man', '00:20:00', 500.00, 0.00, '2020-01-20 11:00:20', '2020-01-20 11:00:20', 1),
(4, 6, 'Leg wax', '1579586966.jpg', 'leg wax', 'Woman', '00:40:00', 1000.00, 0.00, '2020-01-21 00:39:26', '2020-01-21 00:39:26', 1),
(6, 1, 'Body Massage', 'service5.jpg', 'Relaxing Body Massage', 'Man & Woman', '01:00:00', 2000.00, 10.00, '2024-11-26 16:50:30', '2024-11-26 17:15:08', 1),
(7, 1, 'Hair styling', '1732646085.jpg', 'Get your stylized hair', 'Man & Woman', '00:30:00', 100.00, 0.00, '2024-11-26 17:34:45', '2024-11-27 14:05:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `mobile`, `role`, `sex`, `dob`, `photo`, `city`, `email_verified_at`, `mobile_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bharat', 'Boricha', 'borichab656@gmail.com', '7600642639', 'Super Admin', 'Male', '1998-11-22', '1579248281.JPG', 'Rajkot', NULL, NULL, '$2y$10$9/yxoeF4tS74s0hmOhmXAuuKKrfiixWVBd5.NOgnRUF5Xk0XWam.W', 'zOOnAd7BhlMY19wcXeUvzsJKLmJ48XLmFnLG1rJ3IpCXADAbLw9DrMtpDCHI', '2020-01-17 02:34:41', '2020-01-17 02:34:41'),
(2, 'Bhumi', 'Makwana', 'bhumi@gmail.com', '6351672807', 'Admin', 'Female', '1998-06-23', '1579285464.jpg', 'Ahmedabad', NULL, NULL, '$2y$10$9/yxoeF4tS74s0hmOhmXAuuKKrfiixWVBd5.NOgnRUF5Xk0XWam.W', NULL, '2020-01-17 12:54:24', '2020-01-17 13:09:36'),
(3, 'Neha', 'Choudhary', 'neha@gmail.com', '7896541235', 'Admin', 'Female', '1996-01-15', '1579285625.jpg', 'Jamnagar', NULL, NULL, '$2y$10$9/yxoeF4tS74s0hmOhmXAuuKKrfiixWVBd5.NOgnRUF5Xk0XWam.W', NULL, '2020-01-17 12:57:05', '2020-01-20 10:51:21'),
(4, 'Milan', 'Valsur', 'milan@gmail.com', '7548962157', 'Admin', 'Male', '1988-12-14', '1579338573.jpg', 'Mumbai', NULL, NULL, '$2y$10$u/F9SfuZu0GJo1340SpLyeVcWuf/CymXPRhHgV.XblKVEn5TBJvg6', NULL, '2020-01-18 03:39:34', '2020-01-20 04:00:54'),
(5, 'Sachin', 'Mehta', 'sachin@gmail.com', '9879489583', 'Customer', 'Male', '1990-02-23', '1579338669.png', 'Delhi', NULL, NULL, '$2y$10$9/yxoeF4tS74s0hmOhmXAuuKKrfiixWVBd5.NOgnRUF5Xk0XWam.W', NULL, '2020-01-18 03:41:09', '2020-01-21 00:23:45'),
(6, 'Siddharth', 'Sojitra', 'siddharth@gmail.com', '9876543210', 'Admin', 'Male', '1998-12-25', '1579586505.jpg', 'Jetpur', NULL, NULL, '$2y$10$FsWAAPg9T0Yo5j7zLB4Uou1iyzNWUhRCowkd6wyFkytFoLkVnBL6S', NULL, '2020-01-21 00:31:45', '2020-01-21 00:32:57'),
(7, 'Bhartkumar', 'Boricha', 'bhartpboricha@gmail.com', '015781719021', 'Customer', 'Male', '1998-11-22', '1732468099.jpg', 'Schmalkalden', NULL, NULL, '$2y$10$9/yxoeF4tS74s0hmOhmXAuuKKrfiixWVBd5.NOgnRUF5Xk0XWam.W', NULL, '2024-11-24 16:08:20', '2024-11-24 16:08:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_parlour_id_foreign` (`parlour_id`),
  ADD KEY `appointments_service_id_foreign` (`service_id`);

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
-- Indexes for table `parlours`
--
ALTER TABLE `parlours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `parlours_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_service_id_foreign` (`service_id`),
  ADD KEY `payments_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_parlour_id_foreign` (`parlour_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_parlour_id_foreign` (`parlour_id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_images_service_id_foreign` (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `parlours`
--
ALTER TABLE `parlours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_parlour_id_foreign` FOREIGN KEY (`parlour_id`) REFERENCES `parlours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parlours`
--
ALTER TABLE `parlours`
  ADD CONSTRAINT `parlours_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `payments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_parlour_id_foreign` FOREIGN KEY (`parlour_id`) REFERENCES `parlours` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_parlour_id_foreign` FOREIGN KEY (`parlour_id`) REFERENCES `parlours` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD CONSTRAINT `slider_images_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
