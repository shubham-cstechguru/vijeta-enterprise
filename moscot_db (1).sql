-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 06:24 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moscot_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Admin', 'admin@example.com', '$2y$12$f1VHfYAzZdZ7HPA8ozeSJu1Q6WN.Huuh50dc8iZjbcIEw1zQLYGSG', '0G726PZr7UGkti2bg5c2A0cYjayXiJpEQFB8Wtyi6py0zjKnko5Wj2Btp27w', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lense_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mirror_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prod_var_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `lense_id`, `mirror_id`, `prod_var_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 17, 1, 1, 1, 1, 1, '2021-03-03 06:16:34', '2021-03-03 06:16:34'),
(2, 17, 1, 1, 1, 1, 1, '2021-03-03 06:16:35', '2021-03-03 06:16:35'),
(3, 17, 1, 1, 1, 1, 1, '2021-03-03 06:16:37', '2021-03-03 06:16:37'),
(4, 16, 1, 1, 1, 3, 1, '2021-03-03 06:17:15', '2021-03-03 06:17:15'),
(5, 16, 1, 1, 1, 3, 1, '2021-03-03 06:17:17', '2021-03-03 06:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `description`, `slug`, `seo_title`, `seo_keyword`, `seo_description`, `created_at`, `updated_at`) VALUES
(3, 'eyeglasses', 'q8BxytIjzbNAt6n8LDAXYUd3qRwk6e7N7KcFTX5c.jpg', '<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>', 'eyeglasses', NULL, NULL, NULL, '2021-02-02 02:29:01', '2021-02-03 22:39:32'),
(4, 'sunglasses', 'xc15BLGk3iZpcqiJYuvExrF1s5l82ZJ5MUa4oqI3.jpg', '<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>', 'sunglasses', NULL, NULL, NULL, '2021-02-02 03:35:39', '2021-02-03 22:39:44'),
(5, 'collections', 'YS2I2tSgMZ1K1E3QaQ3rmhvs5cQEWxmFsnqqVqMK.jpg', '<div>Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>', 'collections', NULL, NULL, NULL, '2021-02-02 23:42:39', '2021-02-03 22:40:00'),
(7, 'acessories', 'MSiwyMIcJpYqE0ouJCSshAP5rVKtNFnWP1UvZmEK.jpg', '<div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>', 'acessories', NULL, NULL, NULL, '2021-02-03 00:05:26', '2021-02-03 22:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `eye_numbers`
--

CREATE TABLE `eye_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `rightspherical` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rightclyindrical` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rightaxis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leftspherical` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leftclyindrical` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leftaxis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lenses`
--

CREATE TABLE `lenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lenses`
--

INSERT INTO `lenses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Single vision prescription', 'For Distance Reading', '2021-03-01 06:32:26', '2021-03-01 06:32:26'),
(2, 'for Progressive prescription', 'for distance, reading, and everything in between', '2021-03-01 06:33:27', '2021-03-01 06:33:27');

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
(4, '2021_01_29_073909_create_homes_table', 1),
(6, '2021_02_01_115248_create_admins_table', 1),
(10, '2021_02_01_142930_create_categories_table', 4),
(13, '2021_01_29_120015_create_products_table', 5),
(15, '2021_02_15_090230_create_sessions_table', 7),
(16, '2021_02_17_063420_create_lenses_table', 8),
(17, '2021_02_17_102437_create_mirrors_table', 8),
(18, '2021_02_17_114722_create_productvariants_table', 8),
(19, '2021_02_22_093827_create_productmirrors_table', 8),
(23, '2021_02_25_052415_create_eye_numbers_table', 10),
(24, '2021_02_11_131614_create_carts_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `mirrors`
--

CREATE TABLE `mirrors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mirrors`
--

INSERT INTO `mirrors` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'transitional', 'Want to make these transitional?\r\n(Lens changes from clear to sunglass)', '2021-03-01 06:34:32', '2021-03-01 06:34:32'),
(2, 'Digital Relief', 'Do you wear these in front of a computer?\r\n(Eliminates eye strain while viewing computers and digital devices)', '2021-03-01 06:35:09', '2021-03-01 06:35:09'),
(3, 'Hi - Index', 'Want to make these thinner?\r\n(The thinnest lens for prescriptions outside of +/-4.00 to ensure a comfortable fit)', '2021-03-01 06:35:43', '2021-03-01 06:35:43');

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
-- Table structure for table `productmirrors`
--

CREATE TABLE `productmirrors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_var` bigint(20) UNSIGNED NOT NULL,
  `mirror_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productmirrors`
--

INSERT INTO `productmirrors` (`id`, `prod_var`, `mirror_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 220, '2021-03-01 06:36:29', '2021-03-01 06:36:29'),
(2, 1, 2, 234, '2021-03-01 06:36:29', '2021-03-01 06:36:29'),
(3, 1, 3, 256, '2021-03-01 06:36:29', '2021-03-01 06:36:29'),
(4, 2, 1, 234, '2021-03-01 06:36:52', '2021-03-01 06:36:52'),
(5, 2, 2, 124, '2021-03-01 06:36:52', '2021-03-01 06:36:52'),
(6, 2, 3, 765, '2021-03-01 06:36:52', '2021-03-01 06:36:52'),
(7, 3, 1, 343, '2021-03-03 01:06:49', '2021-03-03 01:06:49'),
(8, 3, 2, 546, '2021-03-03 01:06:50', '2021-03-03 01:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `description`, `category_id`, `price`, `slug`, `seo_title`, `seo_keyword`, `seo_description`, `created_at`, `updated_at`) VALUES
(16, 'advanced vue-js search', '[\"prod1.jpg\",\"prod2.jpg\",\"product3.jpg\"]', '<div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letterset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br></div><div><br><br></div>', 5, 22212, 'advanced-vue-js-search', NULL, NULL, NULL, '2021-02-06 07:18:11', '2021-03-01 04:22:46'),
(17, 'optical', '[\"prod2.jpg\",\"product3.jpg\"]', '<div>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</div>', 7, 21221, 'optical', NULL, NULL, NULL, '2021-02-08 01:40:09', '2021-02-08 01:40:09'),
(18, 'laravel1.4', '[\"prod2.jpg\",\"prod1.jpg\",\"product3.jpg\"]', '<div>Font Awesome is a font and icon toolkit based on CSS and Less. It was made by Dave Gandy for use with Bootstrap, and later was incorporated into the BootstrapCDN. Font Awesome has a 38% market share among those websites that use third-party font scripts on their platform, ranking it second place after Google Fonts.</div>', 4, 21000, 'laravel14', NULL, NULL, NULL, '2021-02-08 04:36:26', '2021-02-08 04:36:26'),
(19, 'wordpress', '[\"prod1.jpg\",\"prod2.jpg\"]', '<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letterset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>', 3, 121122, 'wordpress', NULL, NULL, NULL, '2021-02-08 08:02:33', '2021-03-01 04:23:01'),
(22, 'vue-js search', '[\"prod2.jpg\",\"product3.jpg\"]', '<div>$img_name</div>', 3, 25000, 'vue-js-search', NULL, NULL, NULL, '2021-02-08 08:28:58', '2021-03-01 04:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `productvariants`
--

CREATE TABLE `productvariants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `lense_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productvariants`
--

INSERT INTO `productvariants` (`id`, `product_id`, `lense_id`, `created_at`, `updated_at`) VALUES
(1, 17, 1, '2021-03-01 06:36:29', '2021-03-01 06:36:29'),
(2, 17, 2, '2021-03-01 06:36:51', '2021-03-01 06:36:51'),
(3, 16, 1, '2021-03-03 01:06:49', '2021-03-03 01:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shubham Jajoo', 'shubham.jajoo@suncitytechno.com', NULL, '$2y$12$f1VHfYAzZdZ7HPA8ozeSJu1Q6WN.Huuh50dc8iZjbcIEw1zQLYGSG', NULL, NULL, NULL),
(13, 'pankaj', 'pankaj@gmail.com', NULL, '$2y$10$walIueNxkgwkJyNKr4lrE.kxdriezrwiXRIJ2fFUTrYSDasfKs8Xy', NULL, '2021-02-11 04:43:17', '2021-02-11 04:43:17'),
(14, 'Shubham Jajoo', 'jajooraghu@gmail.com', NULL, '$2y$10$3p/LyKu9.X0BrxpIARQ0MeGnfn.wyNB2KkHrmk0eh4L7zjxn458Cy', NULL, '2021-02-11 04:43:43', '2021-02-11 04:43:43'),
(15, 'Shubham Jajoo', 'jajooraghu@outlook.com', NULL, '$2y$10$wP0Z0P9gmLSASKrJ5EedV.Ux4wKtHXA5N2ivEOrgsflHmYG6V90Y6', NULL, '2021-02-11 04:56:20', '2021-02-11 04:56:20'),
(16, 'admin', 'admin@example.com', NULL, '$2y$10$nob53uIxCll0BPmq.Ami8.AvmT7BC3LHAJ1mRmBUypDEGP.vsYHhO', NULL, '2021-02-11 04:57:24', '2021-02-11 04:57:24');

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_lense_id_foreign` (`lense_id`),
  ADD KEY `carts_mirror_id_foreign` (`mirror_id`),
  ADD KEY `carts_prod_var_id_foreign` (`prod_var_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eye_numbers`
--
ALTER TABLE `eye_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eye_numbers_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lenses`
--
ALTER TABLE `lenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mirrors`
--
ALTER TABLE `mirrors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `productmirrors`
--
ALTER TABLE `productmirrors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productmirrors_prod_var_foreign` (`prod_var`),
  ADD KEY `productmirrors_mirror_id_foreign` (`mirror_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productvariants`
--
ALTER TABLE `productvariants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productvariants_product_id_foreign` (`product_id`),
  ADD KEY `productvariants_lense_id_foreign` (`lense_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `eye_numbers`
--
ALTER TABLE `eye_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lenses`
--
ALTER TABLE `lenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mirrors`
--
ALTER TABLE `mirrors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productmirrors`
--
ALTER TABLE `productmirrors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `productvariants`
--
ALTER TABLE `productvariants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_lense_id_foreign` FOREIGN KEY (`lense_id`) REFERENCES `lenses` (`id`),
  ADD CONSTRAINT `carts_mirror_id_foreign` FOREIGN KEY (`mirror_id`) REFERENCES `mirrors` (`id`),
  ADD CONSTRAINT `carts_prod_var_id_foreign` FOREIGN KEY (`prod_var_id`) REFERENCES `productvariants` (`id`),
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `eye_numbers`
--
ALTER TABLE `eye_numbers`
  ADD CONSTRAINT `eye_numbers_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`);

--
-- Constraints for table `productmirrors`
--
ALTER TABLE `productmirrors`
  ADD CONSTRAINT `productmirrors_mirror_id_foreign` FOREIGN KEY (`mirror_id`) REFERENCES `mirrors` (`id`),
  ADD CONSTRAINT `productmirrors_prod_var_foreign` FOREIGN KEY (`prod_var`) REFERENCES `productvariants` (`id`);

--
-- Constraints for table `productvariants`
--
ALTER TABLE `productvariants`
  ADD CONSTRAINT `productvariants_lense_id_foreign` FOREIGN KEY (`lense_id`) REFERENCES `lenses` (`id`),
  ADD CONSTRAINT `productvariants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
