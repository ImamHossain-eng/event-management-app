-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 04:11 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Admin', 'admin@gmail.com', '$2y$10$dspg133nfCpClLzueGt86eFfpfRjrN9sOsUEDgyvKES9mf0USFGqu', 'TkVxYls5CvHhsuS0pyWy3OdaMYl2FmVjezQFHvm3nKCj3rC207NbC3PIJqyd', '2020-12-08 00:43:15', '2020-12-08 00:43:15'),
(13, 'sojib', 'sojib@gmail.com', '$2y$10$vobEXvfvtebPqx7XUWfbS./W83eeaTi.Dewmlijhqjxhb7hKoeqaa', NULL, '2020-12-24 09:32:49', '2020-12-24 09:32:49'),
(14, 'Roman', 'roman@gmail.com', '$2y$10$6CAgVLcRkgRlaL8SyZ5RqeYG99iwg/Zhw.wKdvPlQS9RtL7Egotq2', NULL, '2020-12-29 23:44:45', '2020-12-29 23:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `image`, `price`, `created_at`, `updated_at`, `details`) VALUES
(16, 'Set Menu-A', '1611713565.jpg', '180', '2021-01-21 23:29:25', '2021-01-27 05:43:08', '<ul>\r\n	<li>Fried&nbsp; Rice</li>\r\n	<li>Fried Chicken -1&nbsp;pic</li>\r\n	<li>Mix vegetable</li>\r\n	<li>Water&nbsp;&nbsp;</li>\r\n</ul>'),
(17, 'Set Menu-B', '1611713591.jpg', '170', '2021-01-21 23:40:40', '2021-01-26 20:13:11', '<ul>\r\n	<li>Polao</li>\r\n	<li>Chicken roast</li>\r\n	<li>drinks</li>\r\n</ul>'),
(18, 'Set Menu-C', '1611713685.jpg', '300', '2021-01-21 23:46:21', '2021-01-26 20:14:46', '<ul>\r\n	<li>Fried Rice</li>\r\n	<li>B.B.Q Chicken 1 pic</li>\r\n	<li>Beef Chilli</li>\r\n	<li>Mix Vegetable</li>\r\n	<li>Water</li>\r\n</ul>'),
(19, 'Set Menu-D', 'no_image.jpg', '420', '2021-01-21 23:53:28', '2021-01-21 23:53:28', '<ul>\r\n	<li>Polao</li>\r\n	<li>Beef</li>\r\n	<li>Chicken</li>\r\n	<li>Borhani /doi /drinks</li>\r\n	<li>Vegetable</li>\r\n	<li>Water</li>\r\n	<li>Salad</li>\r\n</ul>'),
(21, 'Kacchi biriyani', '1611725366.jpg', '160', '2021-01-26 23:29:27', '2021-01-26 23:29:27', NULL),
(22, 'Bhuna Khichiri (Chicken)', '1611726232.jpg', '120', '2021-01-26 23:43:52', '2021-01-26 23:43:52', NULL),
(23, 'Bhuna Khichiri (Beef)', '1611726444.jpg', '140', '2021-01-26 23:47:24', '2021-01-26 23:47:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000001_create_users_table', 1),
(2, '2014_10_12_100001_create_password_resets_table', 1),
(3, '2020_11_07_151311_create_admins_table', 1),
(4, '2020_12_24_101002_create_staff_table', 2),
(5, '2020_12_24_154859_create_feedback_table', 3),
(6, '2020_12_28_154410_create_venues_table', 4),
(7, '2020_12_28_154411_create_venues_table', 5),
(8, '2021_01_06_145431_create_photos_table', 6),
(9, '2021_01_07_162229_create_foods_table', 7),
(10, '2021_01_08_153428_create_photographies_table', 8),
(11, '2021_01_09_160809_create_sounds_table', 9),
(12, '2021_01_11_160930_add_details_to_foods', 10),
(13, '2021_01_12_135549_add_body_to_photographies', 11),
(14, '2021_01_12_142852_add_body2_to_sounds', 12),
(15, '2021_01_12_145011_create_stages_table', 13),
(16, '2021_01_12_153900_add_image_to_stages', 14),
(17, '2021_01_13_143753_add_address_to_users', 15),
(18, '2021_01_13_151423_create_orders_table', 16),
(19, '2021_01_14_153250_create_packages_table', 17),
(20, '2021_01_14_175500_add_people_to_packages', 18),
(21, '2021_01_15_165107_add_creator_to_packages', 19),
(22, '2021_01_16_033009_create_user_packs_table', 20),
(23, '2021_01_20_155030_add_sound_id_to_packages', 21),
(24, '2021_01_23_170852_create_orders_table', 22),
(25, '2021_01_28_172713_add_due_to_orders', 23),
(26, '2021_01_29_142658_add_pack_id_to_orders', 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `due` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pack_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`, `created_at`, `updated_at`, `due`, `pack_id`) VALUES
(12, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', '10', 'Customer Address', 'Pending', '600e4212d2c3e', 'BDT', NULL, NULL, '', ''),
(13, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', '10', 'Customer Address', 'Pending', '600e42b664b5d', 'BDT', NULL, NULL, '', ''),
(14, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', '10', 'Customer Address', 'Pending', '600e4c7b97e0e', 'BDT', NULL, NULL, '', ''),
(15, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', '10', 'Customer Address', 'Pending', '600e656768e08', 'BDT', NULL, NULL, '', ''),
(16, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', '10', 'Customer Address', 'Pending', '600e743aaf187', 'BDT', NULL, NULL, '', ''),
(17, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', '10', 'Customer Address', 'Pending', '600e86c9eb50a', 'BDT', NULL, NULL, '', ''),
(18, 'Sojib', 'roman@gmail.com', '01828665969', '6300', 'Gazaria', 'Processing', '600f0224a67ba', 'BDT', NULL, NULL, '', ''),
(19, 'Sojib', 'roman@gmail.com', '01828665969', '181220', 'Gazaria', 'Processing', '600ff858895cc', 'BDT', NULL, NULL, '', ''),
(20, 'Sojib', 'roman@gmail.com', '01828665969', '52000', 'Gazaria', 'Pending', '600ff9898a004', 'BDT', NULL, NULL, '', ''),
(21, 'Sojib', 'roman@gmail.com', '01828665969', '4760', 'Gazaria', 'Pending', '601006fdcf86e', 'BDT', NULL, NULL, '', ''),
(22, 'Sojib', 'roman@gmail.com', '01828665969', '4760', 'Gazaria', 'Failed', '6010073473db4', 'BDT', NULL, NULL, '', ''),
(23, 'Sojib', 'roman@gmail.com', '01828665969', '9000', 'Gazaria', 'Processing', '601009504ebcc', 'BDT', NULL, NULL, '', ''),
(24, 'Sojib', 'roman@gmail.com', '01828665969', '18000', 'Gazaria', 'Failed', '60100a7bb6d0a', 'BDT', NULL, NULL, '', ''),
(25, 'Sojib', 'roman@gmail.com', '01828665969', '88000', 'Gazaria', 'Canceled', '6010107bb0a5c', 'BDT', NULL, NULL, '', ''),
(26, 'rasel', 'rasel@gmail.com', '01312425371', '115800', 'Gazaria', 'Processing', '6010ce7bdb342', 'BDT', NULL, NULL, '', ''),
(27, 'Sojib', 'roman@gmail.com', '01828665969', '104200', 'Gazaria', 'Processing', '6011127c52e50', 'BDT', NULL, NULL, '', ''),
(28, 'Sojib', 'roman@gmail.com', '01828665969', '169010', 'Gazaria', 'Processing', '6011275da1a2a', 'BDT', NULL, NULL, '', ''),
(29, 'Sojib', 'rasel@gmail.com', '01828665969', '90000', 'Gazaria', 'Pending', '60114e171041d', 'BDT', NULL, NULL, '', ''),
(30, 'Sojib', 'roman@gmail.com', '01828665969', '89800', 'Gazaria', 'Pending', '60119e04dec2d', 'BDT', NULL, NULL, '', ''),
(31, 'Sojib', 'rasel@gmail.com', '01828665969', '50000', 'Gazaria', 'Pending', '60119ee277a0b', 'BDT', NULL, NULL, '', ''),
(32, 'Sojib', 'roman@gmail.com', '0172', '50000', 'Gazaria', 'Pending', '6012f6ca5a40a', 'BDT', NULL, NULL, '58700', ''),
(33, 'Sojib', 'roman@gmail.com', '0172', '35000', 'Gazaria', 'Processing', '6012fb254b106', 'BDT', NULL, NULL, '10220', ''),
(34, 'Sojib', 'roman@gmail.com', '0172', '100000', 'Gazaria', 'Pending', '6014268b1872b', 'BDT', NULL, NULL, NULL, NULL),
(35, 'Sojib', 'roman@gmail.com', '0172', '100000', 'Gazaria', 'Pending', '601426b656b93', 'BDT', NULL, NULL, NULL, NULL),
(36, 'Sojib', 'roman@gmail.com', '0172', '600000', 'Gazaria', 'Canceled', '601427207d52e', 'BDT', NULL, NULL, NULL, NULL),
(37, 'Sojib', 'roman@gmail.com', '0172', '20000', 'Gazaria', 'Canceled', '60142a089e3bb', 'BDT', NULL, NULL, '231510', '138'),
(38, 'Roman', 'roman@gmail.com', '0172', '90000', 'Gazaria', 'Failed', '60142bb8e7b6d', 'BDT', NULL, NULL, '109200', '139'),
(39, 'Sojib', 'roman@gmail.com', '0172', '10000', 'Gazaria', 'Canceled', '60144534cf810', 'BDT', NULL, NULL, '-4780', '153');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photography_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stages_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `people` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sound_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `type`, `food_id`, `venue_id`, `photography_id`, `stages_id`, `body`, `amount`, `created_at`, `updated_at`, `people`, `creator`, `sound_id`) VALUES
(42, '', '16', '5', '3', '2', NULL, '344510', '2021-01-22 10:14:28', '2021-01-22 10:14:28', '1000', 'admin', '1'),
(99, '2021-01-30', '19', '5', '4', '5', 'Rich', '806000', '2021-01-26 05:24:10', '2021-01-26 05:24:10', '1500', 'sojib@gmail.com', '4'),
(100, '2021-01-31', '19', '5', '4', '5', 'Rich', '806000', '2021-01-26 05:25:04', '2021-01-26 05:25:04', '1500', 'sojib@gmail.com', '4'),
(104, '2021-03-31', '0', '13', '0', '0', NULL, '75000', '2021-01-26 06:00:40', '2021-01-26 06:00:40', '100', 'sojib@gmail.com', '4'),
(112, '2021-12-31', '18', '13', '4', '5', NULL, '115800', '2021-01-26 20:21:54', '2021-01-26 20:21:54', '66', 'rasel@gmail.com', '4'),
(117, '2021-01-29', '16', '0', '4', '6', NULL, '29230', '2021-01-27 02:57:56', '2021-01-27 02:57:56', '54', 'sojib@gmail.com', '1'),
(120, '2021-01-31', '16', '13', '0', '0', NULL, '90000', '2021-01-27 05:26:17', '2021-01-27 05:26:17', '100', 'sojib@gmail.com', '9'),
(121, '2021-03-27', '16', '5', '0', '0', NULL, '155220', '2021-01-27 10:54:07', '2021-01-27 10:54:07', '29', 'sojib@gmail.com', '0'),
(122, '2021-04-18', '16', '13', '4', '2', NULL, '91420', '2021-01-27 11:03:19', '2021-01-27 11:03:19', '29', 'sojib@gmail.com', '2'),
(124, '2021-04-30', '16', '14', '4', '0', NULL, '89800', '2021-01-27 11:07:55', '2021-01-27 11:07:55', '210', 'rasel@gmail.com', '0'),
(125, '2021-03-30', '18', '14', '0', '0', NULL, '76000', '2021-01-27 11:11:30', '2021-01-27 11:11:30', '120', 'rasel@gmail.com', '0'),
(152, 'Sunday, 3 January, 2021', '16', '5', '0', '0', NULL, '186000', '2021-01-29 11:21:42', '2021-01-29 11:21:42', '200', 'roman@gmail.com', '0'),
(153, 'Sunday, 10 January, 2021', '16', '0', '0', '0', NULL, '5220', '2021-01-29 11:23:04', '2021-01-29 11:23:04', '29', 'roman@gmail.com', '0'),
(154, 'Sunday, 3 January, 2021', '16', '0', '0', '0', NULL, '7200', '2021-01-29 11:29:25', '2021-01-29 11:29:25', '40', 'roman@gmail.com', '0'),
(155, 'Sunday, 3 January, 2021', '16', '14', '0', '0', NULL, '47200', '2021-01-29 11:30:39', '2021-01-29 11:30:39', '40', 'roman@gmail.com', '0'),
(156, 'Sunday, 3 January, 2021', '16', '13', '0', '0', NULL, '75220', '2021-01-29 11:32:54', '2021-01-29 11:32:54', '29', 'roman@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('babubpx2762@gmail.com', '$2y$10$oI3IO6Ucx3FUEC2XMv0JZeYm6ejSnw8OUJQ1z7U7KoqILhN17atYa', '2020-11-12 01:55:57'),
('roman@gmail.com', '$2y$10$Gh1aUVQgJ4i0BG2XPrrt5Oci4wRnGCV4ItL2rKBab1qFqNXzoUQO2', '2021-01-25 00:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `photographies`
--

CREATE TABLE `photographies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photographies`
--

INSERT INTO `photographies` (`id`, `name`, `image`, `price`, `created_at`, `updated_at`, `body`) VALUES
(3, 'Photography', 'no_image.jpg', '9000', '2021-01-08 10:13:09', '2021-01-08 10:24:17', NULL),
(4, 'Dual Photography & Editing', 'no_image.jpg', '12000', '2021-01-08 10:25:00', '2021-01-11 04:27:02', NULL),
(5, 'Photography & Video', 'no_image.jpg', '10000', '2021-01-09 22:01:08', '2021-01-09 22:01:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `image`, `type`, `created_at`, `updated_at`) VALUES
(10, '1611376268.jpg', 'slider', '2021-01-22 22:31:09', '2021-01-22 22:31:09'),
(11, '1611376472.jpg', 'slider', '2021-01-22 22:34:33', '2021-01-22 22:34:33'),
(12, '1611376891.jpg', 'slider', '2021-01-22 22:41:32', '2021-01-22 22:41:32'),
(13, '1611377236.jpg', 'slider', '2021-01-22 22:47:16', '2021-01-22 22:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `sounds`
--

CREATE TABLE `sounds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body2` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sounds`
--

INSERT INTO `sounds` (`id`, `name`, `image`, `price`, `created_at`, `updated_at`, `body2`) VALUES
(1, 'Double Box', 'no_image.jpg', '2510', '2021-01-09 10:55:16', '2021-01-09 11:20:12', NULL),
(2, 'Single Box', 'no_image.jpg', '1200', '2021-01-09 10:59:43', '2021-01-09 10:59:43', NULL),
(4, 'Dual Box & Lighting', '1610250005.jpg', '5000', '2021-01-09 21:40:05', '2021-01-09 21:40:05', NULL),
(8, 'Lighting', 'no_image.jpg', '3000', '2021-01-17 23:50:42', '2021-01-17 23:50:42', NULL),
(9, 'Sample Box', 'no_image.jpg', '2000', '2021-01-21 12:12:46', '2021-01-21 12:12:46', '<p>bdghr</p>');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibility` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `designation`, `responsibility`, `mobile`, `email`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Johnny Steve', 'Web Developer', 'Website Development', 17, 'johnny@gmail.com', 'no_image.jpg', '2020-12-24 08:51:45', '2020-12-29 23:48:28'),
(2, 'Rebecca Flex', 'Event Manager', 'Manages overall work', 17, 'flex@gmail.com', 'no_image.jpg', '2020-12-24 08:52:42', '2020-12-24 08:53:05'),
(3, 'Jan Ringo', 'Accountants', NULL, 17, 'ringo@gmail.com', 'no_image.jpg', '2020-12-24 08:54:52', '2020-12-24 08:54:52'),
(4, 'sojib', 'Artist', NULL, 17, 'sojib@gmail.com', 'no_image.jpg', '2020-12-24 08:55:27', '2021-01-26 20:47:15'),
(5, 'Roman', 'Manager', 'Nothing', 11, 'roman@gmail.com', '1609930789.jpg', '2021-01-06 04:59:53', '2021-01-06 04:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `name`, `price`, `body`, `created_at`, `updated_at`, `image`) VALUES
(2, 'Stage', '3000', '<p>Hello there .......</p>', '2021-01-12 09:57:24', '2021-01-14 11:44:11', 'no_image.jpg'),
(5, 'Double Stage', '9000', '<p>dhdrh</p>', '2021-01-14 11:43:28', '2021-01-14 11:43:28', 'no_image.jpg'),
(6, 'Sample Data', '5000', '<p>67it67i</p>', '2021-01-21 12:15:02', '2021-01-21 12:15:55', 'no_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `address`) VALUES
(2, 'Roman', 'roman@gmail.com', '$2y$10$3VyGGCL2KBGRqaswDOaNDe9xVbSoDo1lbSFQfV/0K2VuzlgAcSrr.', 'JiD0RyaNAsARraWma9YoFdMRrIw2NeyTn8ojQ0OrknsnD7BJVE29t7e73UtU', '2021-01-13 09:07:46', '2021-01-13 09:07:46', NULL),
(3, 'Roman', 'hasan@gmail.com', '$2y$10$a0f2ddSdWtYQIof9EG6dMekENn3j1vXtpPtGnoTPXM6G9ieO3nB/K', 'K6arM8n7bYBXuZkCAeqRMUlyB6Ux4h05INitClOcZqfIjUhVcjJMg86bdVnl', '2021-01-14 23:37:59', '2021-01-14 23:37:59', NULL),
(4, 'sakib', 'sakib@gmail.com', '$2y$10$84m4tTpkEXyPo8n3CA15/OE9UDXNZbc1rcCrz4KFTj1ou2NxspnOK', 'ZpeO0dOoemSVCk7EK3rwyaqL3KYfacpl0g6oYP2n264dfKsc17Ndouwp6Ysl', '2021-01-15 22:29:57', '2021-01-15 22:29:57', NULL),
(5, 'Rubel', 'rubel@gmail.com', '$2y$10$T.vumPvokXnOv2iVxJxseeOOatb5b/p9jb9agV3LXEMBcPILMfBiW', '7uHpebQPauE1Ho4jyCYDfSbPO4FdpdJFJWbHcSv5xtThSjmlb7rCNurUk47Z', '2021-01-17 06:36:48', '2021-01-17 06:36:48', NULL),
(6, 'tannu', 'tannu@gmail.com', '$2y$10$qnAGD1Nsqc73bQ04Uu3J0eQcpJUYak6Nb3XyHZOcYyIM5YaVUHYSC', 'LdjLRv8AG85soq4qKUrxQmSOjC1XgTkrZuiIxD7f3hzCmTGlPyLhMCwRW5hq', '2021-01-17 23:32:32', '2021-01-17 23:32:32', NULL),
(7, 'Sojib', 'Sojib@gmail.com', '$2y$10$kCx/RX9Z6Ndb1ebEFTw.oeuCjHyfoP1EgVq4OeC9d62WVGXDUyM3.', NULL, '2021-01-22 00:18:29', '2021-01-22 00:18:29', NULL),
(8, 'Muna', 'Muna@gmail.com', '$2y$10$ij.Tw2lTheC3C/kNft4vKeYTLsotWVv.46bO2SWGLlkYu0B1caIlW', 'Q96F4rtBKIbf6AZGhhn5lU6yw73VHS7BwLLfTAQGb9aV9vTjBKCZSpQwGHFa', '2021-01-22 22:38:52', '2021-01-22 22:38:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `name`, `capacity`, `price`, `body`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Bashundhara Mall', '1000', '150000', NULL, '1611553307.jpg', '2020-12-29 01:20:14', '2021-01-24 23:41:47'),
(13, 'Megna village', '500', '70000', NULL, '1611554036.jpg', '2021-01-22 00:09:37', '2021-01-24 23:53:56'),
(14, 'kutubiya restaurant', '500', '40000', NULL, '1611730063.JPG', '2021-01-22 00:12:39', '2021-01-27 00:47:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photographies`
--
ALTER TABLE `photographies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sounds`
--
ALTER TABLE `sounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `photographies`
--
ALTER TABLE `photographies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sounds`
--
ALTER TABLE `sounds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
