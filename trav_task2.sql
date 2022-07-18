-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 12:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trav_task2`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `name`, `email`, `license_no`, `Location`, `Contact_no`, `manager_id`, `amount`, `credit_limit`, `created_at`, `updated_at`) VALUES
(1, 'TravelWorld', 'travalworld12@gmail.com', '76655544', 'Peshawar', '03439433654', '5', '800001', '110000', '2022-07-07 14:56:56', '2022-07-18 16:24:30'),
(2, 'Malak group', 'malak12@gmail.com', '4565476', 'Islamabad', '03112343597', '10', '4200000', '700000', '2022-07-07 14:59:43', '2022-07-18 16:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `agent_news`
--

CREATE TABLE `agent_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balance_requests`
--

CREATE TABLE `balance_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `req_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_req_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 for approved req and 2 for rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balance_requests`
--

INSERT INTO `balance_requests` (`id`, `req_amount`, `balance_req_type`, `agency_id`, `admin_id`, `agency_name`, `admin_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '400000', 'add', '1', '5', 'TravelWorld', 'Haseeb Mabood', '1', '2022-07-05 16:17:40', '2022-07-06 14:16:28'),
(2, '100000', 'subt', '1', '5', 'TravelWorld', 'Haseeb Mabood', '1', '2022-07-05 17:13:49', '2022-07-06 14:17:51'),
(3, '500000', 'subt', '2', '10', 'Malak group', 'Waqas khan', '1', '2022-07-05 17:24:14', '2022-07-06 14:27:15'),
(4, '150000', 'add', '1', '5', 'TravelWorld', 'Haseeb Mabood', '2', '2022-07-06 14:28:41', '2022-07-06 14:41:37'),
(5, '240000', 'add', '1', '5', 'TravelWorld', 'Haseeb Mabood', '1', '2022-07-06 14:44:14', '2022-07-06 14:44:24'),
(6, '200000', 'add', '1', '5', 'TravelWorld', 'Haseeb Mabood', '1', '2022-07-18 14:12:55', '2022-07-18 14:13:20'),
(7, '500000', 'subt', '1', '5', 'TravelWorld', 'Haseeb Mabood', '2', '2022-07-18 14:40:59', '2022-07-18 14:41:13'),
(8, '400000', 'subt', '1', '5', 'TravelWorld', 'Haseeb Mabood', '1', '2022-07-18 16:19:30', '2022-07-18 16:19:46'),
(9, '19999', 'subt', '1', '5', 'TravelWorld', 'Haseeb Mabood', '1', '2022-07-18 16:20:57', '2022-07-18 16:21:10'),
(10, '180000', 'subt', '1', '5', 'TravelWorld', 'Haseeb Mabood', '1', '2022-07-18 16:23:35', '2022-07-18 16:23:46'),
(11, '800000', 'add', '1', '5', 'TravelWorld', 'Haseeb Mabood', '1', '2022-07-18 16:24:22', '2022-07-18 16:24:30'),
(12, '500000', 'subt', '2', '10', 'Malak group', 'Waqas khan', '1', '2022-07-18 16:25:33', '2022-07-18 16:25:57'),
(13, '200000', 'add', '2', '10', 'Malak group', 'Waqas khan', '1', '2022-07-18 16:26:45', '2022-07-18 16:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `credit_requests`
--

CREATE TABLE `credit_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `req_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_req_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credit_requests`
--

INSERT INTO `credit_requests` (`id`, `req_amount`, `credit_req_type`, `agency_id`, `admin_id`, `agency_name`, `admin_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '150000', 'add', '1', '5', 'TravelWorld', 'Haseeb Mabood', '2', '2022-07-07 16:07:30', '2022-07-07 16:31:32'),
(2, '240000', 'subt', '1', '5', 'TravelWorld', 'Haseeb Mabood', '1', '2022-07-07 16:33:03', '2022-07-07 16:33:18'),
(3, '150000', 'add', '1', '5', 'TravelWorld', 'Haseeb Mabood', '1', '2022-07-07 16:34:47', '2022-07-07 16:35:04'),
(4, '400000', 'subt', '2', '10', 'Malak group', 'Waqas khan', '1', '2022-07-18 16:43:46', '2022-07-18 16:43:56'),
(5, '200000', 'add', '2', '10', 'Malak group', 'Waqas khan', '1', '2022-07-18 16:44:43', '2022-07-18 16:44:58'),
(6, '400000', 'add', '2', '10', 'Malak group', 'Waqas khan', '1', '2022-07-18 16:46:44', '2022-07-18 16:47:03');

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
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_08_055632_create_permission_tables', 2),
(7, '2014_10_12_000000_create_users_table', 3),
(8, '2022_06_17_060109_create_sub_admins_table', 4),
(10, '2022_06_17_060213_create_managers_table', 4),
(17, '2022_06_17_092154_create_agents_table', 8),
(19, '2022_06_19_082920_create_agent_news_table', 9),
(20, '2022_06_17_060156_create_agencies_table', 10),
(24, '2022_06_27_094942_create_sub_agencies_table', 11),
(29, '2022_07_01_072325_create_balance_requests_table', 13),
(30, '2022_06_29_061822_create_sub_agency_users_table', 14),
(31, '2022_07_07_061414_create_credit_requests_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 6),
(7, 'App\\Models\\User', 5),
(7, 'App\\Models\\User', 9),
(7, 'App\\Models\\User', 10);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create user', 'Can create user', 'web', '2022-06-10 14:31:52', '2022-07-06 16:03:13'),
(2, 'update user', 'Can update user', 'web', '2022-06-10 14:32:04', '2022-06-10 14:32:04'),
(3, 'delete user', 'Can delete user', 'web', '2022-06-10 14:32:20', '2022-06-10 14:32:20'),
(4, 'action', 'Can perform action like update, delete etc', 'web', '2022-06-10 18:03:49', '2022-06-10 18:03:49'),
(8, 'create agents', 'Can create agents', 'web', '2022-06-17 15:23:32', '2022-06-17 15:24:09'),
(9, 'assign role', 'Can assign role to user', 'web', '2022-06-17 16:15:08', '2022-06-17 16:15:08');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'web', '2022-06-08 13:26:58', '2022-06-08 13:26:58'),
(7, 'agency admin', 'web', '2022-06-20 14:44:55', '2022-06-27 16:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(8, 2),
(8, 7),
(9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_admins`
--

CREATE TABLE `sub_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_agencies`
--

CREATE TABLE `sub_agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_agency_id` bigint(20) UNSIGNED NOT NULL,
  `manager_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_agencies`
--

INSERT INTO `sub_agencies` (`id`, `name`, `email`, `license_no`, `location`, `contact_no`, `parent_agency_id`, `manager_id`, `created_at`, `updated_at`) VALUES
(1, 'travcont', 'travcont123@gmail.com', '9646787', 'Peshawar', '03107823946', 1, '5', '2022-07-07 15:01:53', '2022-07-07 15:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `sub_agency_users`
--

CREATE TABLE `sub_agency_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subagency_id` bigint(20) UNSIGNED NOT NULL,
  `manager_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_agency_users`
--

INSERT INTO `sub_agency_users` (`id`, `name`, `email`, `system_id`, `phone`, `address`, `subagency_id`, `manager_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad ali', 'ahmadali123@gmail.com', '7856757', '03331298107', 'peshawar', 1, '5', '1657180961.jpg', '2022-07-07 15:02:41', '2022-07-07 15:02:41');

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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `image`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Haseeb Mabood', 'haseebmabood2017@gmail.com', NULL, '$2y$10$d5vbasu0A24ETQerPQvLnOSljxz/Pg3zLgdAfVCC3OLuXvnjrjx8i', '03029876354', 'Defence colony, Shahbaz Garhi, Mardan', '1654846938.jpg', 0, 'Zh0RoDPakPJc71N4bMtemBJshrDD3xpAl7FWapRwBKZdbZ9akbGXLpwVAIzR', '2022-06-09 17:08:43', '2022-06-11 18:59:47'),
(6, 'Admin', 'admin123@gmail.com', NULL, '$2y$10$pCarU8mzLRDaXhB6PLojs.HLrQkuFh9KOK.42vsQ/UfwYX3zvOn/.', '03331298745', 'Karachi', '1654950855.jpeg', 1, 'eLgL4RdgSbtynZalCQArEeO6THQhac4CaobYtz2El71d5UhVaht8F3FQrL7w', '2022-06-09 17:21:45', '2022-06-23 12:52:58'),
(9, 'Manager2', 'manager222@gmail.com', NULL, '$2y$10$kZbME/GVkYEBj/Bl7eZdSugX.Q9uy6Dn17shzu6IsB7sj2SmBGRjy', '03029876354', 'Rawalpindi', '1655964288.jpg', 0, NULL, '2022-06-16 16:17:40', '2022-06-23 13:04:49'),
(10, 'Waqas khan', 'waqaskhan123@gmail.com', NULL, '$2y$10$MU3qE8F8oB8dsVDdGxYDtuetvjhXHiZELyWuALOqMt2rZp1ogdQJ2', '03331298745', 'Mardan', '1655965131.jpg', 0, NULL, '2022-06-20 16:23:25', '2022-06-23 13:18:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agencies_email_unique` (`email`);

--
-- Indexes for table `agent_news`
--
ALTER TABLE `agent_news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agent_news_email_unique` (`email`),
  ADD KEY `agent_news_manager_id_foreign` (`manager_id`);

--
-- Indexes for table `balance_requests`
--
ALTER TABLE `balance_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_requests`
--
ALTER TABLE `credit_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sub_admins`
--
ALTER TABLE `sub_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_agencies`
--
ALTER TABLE `sub_agencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_agencies_email_unique` (`email`),
  ADD UNIQUE KEY `sub_agencies_contact_no_unique` (`contact_no`),
  ADD KEY `sub_agencies_parent_agency_id_foreign` (`parent_agency_id`);

--
-- Indexes for table `sub_agency_users`
--
ALTER TABLE `sub_agency_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_agency_users_email_unique` (`email`),
  ADD UNIQUE KEY `sub_agency_users_system_id_unique` (`system_id`),
  ADD UNIQUE KEY `sub_agency_users_phone_unique` (`phone`),
  ADD KEY `sub_agency_users_subagency_id_foreign` (`subagency_id`);

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
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agent_news`
--
ALTER TABLE `agent_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balance_requests`
--
ALTER TABLE `balance_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `credit_requests`
--
ALTER TABLE `credit_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_admins`
--
ALTER TABLE `sub_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_agencies`
--
ALTER TABLE `sub_agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_agency_users`
--
ALTER TABLE `sub_agency_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent_news`
--
ALTER TABLE `agent_news`
  ADD CONSTRAINT `agent_news_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_agencies`
--
ALTER TABLE `sub_agencies`
  ADD CONSTRAINT `sub_agencies_parent_agency_id_foreign` FOREIGN KEY (`parent_agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_agency_users`
--
ALTER TABLE `sub_agency_users`
  ADD CONSTRAINT `sub_agency_users_subagency_id_foreign` FOREIGN KEY (`subagency_id`) REFERENCES `sub_agencies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
