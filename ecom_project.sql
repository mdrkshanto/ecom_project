-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 05:10 AM
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
-- Database: `ecom_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `featured_status` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `featured_status` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `featured_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Books', 'books', NULL, NULL, '0', '1', '2023-09-07 21:39:01', '2023-09-07 21:39:01'),
(2, 'Electronics', 'electronics', NULL, NULL, '0', '1', '2023-09-07 21:39:12', '2023-09-07 21:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` text NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `date_of_birth` text DEFAULT NULL,
  `blood_group` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `password`, `image`, `date_of_birth`, `blood_group`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '01234567891', NULL, NULL, NULL, NULL, '2023-09-08 05:01:28', '2023-09-08 05:01:28');

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
(69, '2014_10_12_000000_create_users_table', 1),
(70, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(71, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(72, '2019_08_19_000000_create_failed_jobs_table', 1),
(73, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(74, '2023_08_11_102614_create_sessions_table', 1),
(75, '2023_08_11_150123_create_categories_table', 1),
(76, '2023_08_12_053533_create_subcategories_table', 1),
(77, '2023_08_12_085607_create_brands_table', 1),
(78, '2023_08_12_113503_create_units_table', 1),
(79, '2023_08_13_031909_create_products_table', 1),
(84, '2023_08_13_120317_create_other_images_table', 2),
(85, '2023_09_06_042733_create_customers_table', 2),
(88, '2023_09_06_042744_create_orders_table', 3),
(89, '2023_09_06_042754_create_order_details_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_number` bigint(20) NOT NULL,
  `order_total` int(11) NOT NULL,
  `tax_total` int(11) NOT NULL,
  `shipping_total` int(11) NOT NULL,
  `order_date` text NOT NULL,
  `order_timestamps` text NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `shipping_name` varchar(255) NOT NULL,
  `shipping_mobile` varchar(255) NOT NULL,
  `delivery_address` text NOT NULL,
  `delivery_status` text NOT NULL DEFAULT 'pending',
  `payment_type` varchar(255) NOT NULL,
  `payment_amount` int(11) NOT NULL DEFAULT 0,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'BDT',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_number`, `order_total`, `tax_total`, `shipping_total`, `order_date`, `order_timestamps`, `order_status`, `shipping_name`, `shipping_mobile`, `delivery_address`, `delivery_status`, `payment_type`, `payment_amount`, `payment_status`, `transaction_id`, `currency`, `created_at`, `updated_at`) VALUES
(1, 1, 202300000001, 250, 38, 100, '2023-09-09', '1694217600', 'pending', 'Admin', '01234567891', 'Admin', 'pending', 'online', 0, 'pending', NULL, 'BDT', '2023-09-08 19:41:12', '2023-09-08 19:41:12'),
(2, 1, 202300000002, 250, 38, 100, '2023-09-09', '1694217600', 'pending', 'Admin', '01234567891', 'Admin', 'pending', 'online', 0, 'pending', NULL, 'BDT', '2023-09-08 19:45:15', '2023-09-08 19:45:15'),
(3, 1, 202300000003, 250, 38, 100, '2023-09-09', '1694217600', 'pending', 'Admin', '01234567891', 'Admin', 'pending', 'online', 0, 'pending', NULL, 'BDT', '2023-09-08 21:04:52', '2023-09-08 21:04:52'),
(4, 1, 202300000004, 250, 38, 100, '2023-09-09', '1694217600', 'pending', 'Admin', '01234567891', 'Admin', 'pending', 'cod', 0, 'pending', NULL, 'BDT', '2023-09-08 21:07:37', '2023-09-08 21:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sathkahon', 'images/product/1776465758100900.jpg', 250, 1, '2023-09-08 19:41:12', '2023-09-08 19:41:12'),
(2, 2, 1, 'Sathkahon', 'images/product/1776465758100900.jpg', 250, 1, '2023-09-08 19:45:15', '2023-09-08 19:45:15'),
(3, 4, 1, 'Sathkahon', 'images/product/1776465758100900.jpg', 250, 1, '2023-09-08 21:07:37', '2023-09-08 21:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `other_images`
--

CREATE TABLE `other_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_images`
--

INSERT INTO `other_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'images/product/other/1776465645872113.jpg', '2023-09-08 04:41:00', '2023-09-08 04:41:00'),
(2, 3, 'images/product/other/1776465646031855.jpg', '2023-09-08 04:41:00', '2023-09-08 04:41:00'),
(3, 3, 'images/product/other/1776465646181355.jpg', '2023-09-08 04:41:00', '2023-09-08 04:41:00'),
(4, 3, 'images/product/other/1776465646328519.jpg', '2023-09-08 04:41:01', '2023-09-08 04:41:01'),
(5, 3, 'images/product/other/1776465646528291.jpg', '2023-09-08 04:41:01', '2023-09-08 04:41:01'),
(6, 3, 'images/product/other/1776465646719595.jpg', '2023-09-08 04:41:01', '2023-09-08 04:41:01'),
(7, 3, 'images/product/other/1776465646866489.jpg', '2023-09-08 04:41:01', '2023-09-08 04:41:01'),
(8, 3, 'images/product/other/1776465647021959.jpg', '2023-09-08 04:41:02', '2023-09-08 04:41:02'),
(9, 3, 'images/product/other/1776465647509335.jpg', '2023-09-08 04:41:02', '2023-09-08 04:41:02'),
(10, 3, 'images/product/other/1776465647768649.png', '2023-09-08 04:41:02', '2023-09-08 04:41:02'),
(11, 3, 'images/product/other/1776465648127962.jpg', '2023-09-08 04:41:02', '2023-09-08 04:41:02'),
(12, 3, 'images/product/other/1776465648308717.jpg', '2023-09-08 04:41:02', '2023-09-08 04:41:02'),
(13, 3, 'images/product/other/1776465648495676.jpg', '2023-09-08 04:41:03', '2023-09-08 04:41:03'),
(14, 3, 'images/product/other/1776465648716347.jpg', '2023-09-08 04:41:03', '2023-09-08 04:41:03'),
(15, 3, 'images/product/other/1776465648855642.jpg', '2023-09-08 04:41:03', '2023-09-08 04:41:03'),
(16, 3, 'images/product/other/1776465649190884.jpg', '2023-09-08 04:41:03', '2023-09-08 04:41:03'),
(17, 3, 'images/product/other/1776465649453843.jpg', '2023-09-08 04:41:04', '2023-09-08 04:41:04'),
(18, 3, 'images/product/other/1776465649771451.png', '2023-09-08 04:41:04', '2023-09-08 04:41:04'),
(19, 3, 'images/product/other/1776465650118378.png', '2023-09-08 04:41:04', '2023-09-08 04:41:04'),
(20, 2, 'images/product/other/1776465733433185.webp', '2023-09-08 04:42:24', '2023-09-08 04:42:24'),
(21, 2, 'images/product/other/1776465733823097.webp', '2023-09-08 04:42:24', '2023-09-08 04:42:24'),
(22, 2, 'images/product/other/1776465733996989.webp', '2023-09-08 04:42:24', '2023-09-08 04:42:24'),
(23, 2, 'images/product/other/1776465734163604.webp', '2023-09-08 04:42:24', '2023-09-08 04:42:24');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `regular_price` int(11) DEFAULT NULL,
  `selling_price` int(11) NOT NULL,
  `stock_amount` int(11) NOT NULL DEFAULT 0,
  `reorder_label` int(11) NOT NULL DEFAULT 0,
  `image` text NOT NULL,
  `sales_count` int(11) NOT NULL DEFAULT 0,
  `hit_count` int(11) NOT NULL DEFAULT 0,
  `featured_status` enum('0','1') NOT NULL DEFAULT '0',
  `carousel_status` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `unit_id`, `name`, `slug`, `code`, `short_description`, `long_description`, `regular_price`, `selling_price`, `stock_amount`, `reorder_label`, `image`, `sales_count`, `hit_count`, `featured_status`, `carousel_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 2, 'Sathkahon', 'sathkahon', '202300000001', '<p>Sathkahon By Samaresh Majumder<br></p>', '<p>Sathkahon By Samaresh Majumder<br></p>', 300, 250, 2, 1, 'images/product/1776465758100900.jpg', 0, 0, '1', '0', '1', '2023-09-07 21:44:17', '2023-09-08 21:07:37'),
(2, 2, 3, NULL, 3, 'Samsung Galaxy S21 FE (8/128 GB)', 'samsung-galaxy-s21-fe-8-128-gb', '202300000002', '<p>Samsung Galaxy S21 FE (8/128 GB)<br></p>', '<p>Samsung Galaxy S21 FE (8/128 GB)<br></p>', 90000, 89500, 4, 1, 'images/product/1776465733180815.webp', 0, 0, '1', '0', '1', '2023-09-07 21:47:13', '2023-09-08 04:42:23'),
(3, 2, 2, NULL, 3, 'Galaxy Watch5 Pro', 'galaxy-watch5-pro', '202300000003', '<p>Galaxy Watch5 Pro<br></p>', '<p>Galaxy Watch5 Pro<br></p>', 9000, 8950, 7, 1, 'images/product/1776465645613340.png', 0, 0, '1', '0', '1', '2023-09-07 21:49:04', '2023-09-08 05:01:28');

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
('hDdkNlSloeCvgSOF0bYrMSNNGykVctfA4R1VerZQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlowZHRldDdyWEEyRnJyMDhFWnVkV1d6NnJpQ0EzQWIyMW9NSTNReCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zYXRoa2Fob24vcHJvZHVjdC9kZXRhaWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1694228863);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `featured_status` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `description`, `image`, `featured_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bangla Books', 'bangla-books', NULL, NULL, '0', '1', '2023-09-07 21:39:43', '2023-09-07 21:39:43'),
(2, 2, 'Gadgets', 'gadgets', NULL, NULL, '0', '1', '2023-09-07 21:45:03', '2023-09-07 21:45:03'),
(3, 2, 'Mobiles', 'mobiles', NULL, NULL, '0', '1', '2023-09-07 21:45:18', '2023-09-07 21:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KG', 'kg', NULL, '1', '2023-09-07 21:40:03', '2023-09-07 21:40:03'),
(2, 'Pice', 'pice', NULL, '1', '2023-09-07 21:40:14', '2023-09-07 21:40:14'),
(3, 'Box', 'box', NULL, '1', '2023-09-07 21:40:23', '2023-09-07 21:40:23');

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
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$n1Be65H3MdX1rw.jjF9Z2eOPC.g3KG/nAjCWLg/9d2hh6mfLTfhgC', NULL, NULL, NULL, '6LibDmwawX2mk1cKzVEbUjlvgcIj2iymIWLURlZZEXEob4mZwr41Zki9m3Va', NULL, NULL, '2023-09-07 20:58:03', '2023-09-07 20:58:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_mobile_unique` (`mobile`) USING HASH;

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_images`
--
ALTER TABLE `other_images`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_code_unique` (`code`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_name_unique` (`name`),
  ADD UNIQUE KEY `subcategories_slug_unique` (`slug`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_name_unique` (`name`),
  ADD UNIQUE KEY `units_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `other_images`
--
ALTER TABLE `other_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
