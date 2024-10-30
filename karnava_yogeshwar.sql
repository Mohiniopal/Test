-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2024 at 08:01 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karnava_yogeshwar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `profile_img`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, '1666240437_profile_img.jpg', 'Mohini', 'Maurya', 'admin@gmail.com', '$2y$12$pTiiEWAYqdqtIp8YSH3F4OAqOWLdwEtWm0YfE7tQLS95XCKFYJgdS', '2022-10-19 23:03:57', '2024-10-23 01:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` longtext COLLATE utf8mb4_general_ci,
  `alt_tag` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `orderby` bigint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `slug`, `img`, `alt_tag`, `orderby`, `created_at`, `updated_at`) VALUES
(11, 'Chips', 'chips', NULL, NULL, 0, '2024-10-25 12:42:16', '2024-10-25 12:42:16'),
(12, 'Wafers', 'wafers', NULL, NULL, 0, '2024-10-25 12:42:26', '2024-10-25 12:42:26'),
(13, 'Crackers', 'crackers', NULL, NULL, 0, '2024-10-25 12:42:33', '2024-10-25 12:42:33'),
(14, 'Popcorn', 'popcorn', NULL, NULL, 0, '2024-10-25 12:42:41', '2024-10-25 12:42:41'),
(15, 'Extruded Snacks', 'extruded-snacks', NULL, NULL, 0, '2024-10-25 12:42:46', '2024-10-25 12:42:46'),
(16, 'Processed Nuts', 'processed-nuts', NULL, NULL, 0, '2024-10-25 12:42:51', '2024-10-25 12:42:51'),
(17, 'Namkeen', 'namkeen', NULL, NULL, 0, '2024-10-25 12:42:57', '2024-10-25 12:42:57'),
(18, 'Snacks and Sticks', 'snacks-and-sticks', NULL, NULL, 0, '2024-10-25 12:43:07', '2024-10-25 12:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `application_product`
--

CREATE TABLE `application_product` (
  `id` bigint NOT NULL,
  `application_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_product`
--

INSERT INTO `application_product` (`id`, `application_id`, `product_id`, `created_at`, `updated_at`) VALUES
(145, 11, 3, '2024-10-30 07:37:13', '2024-10-30 07:37:13'),
(146, 12, 3, '2024-10-30 07:37:13', '2024-10-30 07:37:13'),
(147, 13, 3, '2024-10-30 07:37:13', '2024-10-30 07:37:13'),
(148, 14, 3, '2024-10-30 07:37:13', '2024-10-30 07:37:13'),
(149, 15, 3, '2024-10-30 07:37:13', '2024-10-30 07:37:13'),
(150, 16, 3, '2024-10-30 07:37:13', '2024-10-30 07:37:13'),
(151, 17, 3, '2024-10-30 07:37:13', '2024-10-30 07:37:13'),
(152, 18, 3, '2024-10-30 07:37:13', '2024-10-30 07:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int NOT NULL,
  `banner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_sub_heading` longtext COLLATE utf8mb4_unicode_ci,
  `banner_desc` text COLLATE utf8mb4_unicode_ci,
  `banner_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desktop_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_name`, `banner_sub_heading`, `banner_desc`, `banner_link`, `desktop_image`, `mobile_image`, `alt_tag`, `orderby`, `created_at`, `updated_at`) VALUES
(4, 'Banner 1', '<p><br></p>', '<p><br></p>', NULL, '1730210048150487.png', '1730210048515358.jpg', NULL, 0, '2024-10-29 13:54:08', '2024-10-29 13:54:08'),
(5, 'Banner 2', '<p><br></p>', '<p><br></p>', NULL, '1730210057154698.png', '1730210057119765.jpg', NULL, 0, '2024-10-29 13:54:17', '2024-10-29 13:54:17'),
(6, 'Banner 3', '<p><br></p>', '<p><br></p>', NULL, '1730210068459572.png', '1730210068765551.jpg', NULL, 0, '2024-10-29 13:54:28', '2024-10-29 13:54:28'),
(7, 'Banner 4', '<p><br></p>', '<p><br></p>', NULL, '1730210083204293.png', '1730210083767955.jpg', NULL, 0, '2024-10-29 13:54:43', '2024-10-29 13:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `job_experience` varchar(255) DEFAULT NULL,
  `document` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `full_name`, `email`, `phone_number`, `qualification`, `job_experience`, `document`, `created_at`, `updated_at`) VALUES
(1, 'John', 'john@gm.com', '9879879877', 'MCA', '5 Years', '1729828514260003.pdf', '2024-10-25 03:55:14', '2024-10-25 03:55:14'),
(2, 'Rb', 'rb@gm.com', '9879879877', 'MCA', '5 Yr', '1730117189502381.pdf', '2024-10-28 12:06:29', '2024-10-28 12:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int NOT NULL,
  `parent_id` bigint NOT NULL DEFAULT '0',
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_order` int DEFAULT '0',
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_desc` text COLLATE utf8mb4_unicode_ci,
  `rubric` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `parent_id`, `cat_name`, `cat_img`, `color`, `slug`, `home`, `cat_order`, `subtitle`, `alt_tag`, `full_desc`, `rubric`, `meta_title`, `meta_keyword`, `meta_desc`, `created_at`, `updated_at`) VALUES
(1, 0, 'Snacks and Chips', '1729850047207908.jpg', '#ef2b5f', 'snacks-and-chips', '1', 0, NULL, NULL, NULL, '<p>Combination of different material from 2 layers to 4 layers depending upon the shelf-life of the product</p>\r\n<p>Various combination of PET, METPET, BOPP, METALIZED BOPP, ALUMINUM FOIL, METALIZED CPP, LDPE (EXTRUSION GRADE), LDPE FILM are used as per requirement</p>', NULL, NULL, NULL, '2024-10-22 22:47:49', '2024-10-28 07:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` longtext COLLATE utf8mb4_unicode_ci,
  `orderby` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `name`, `image`, `alt_tag`, `pdf`, `orderby`, `created_at`, `updated_at`) VALUES
(2, 'Star Export House', '172975019328.jpg', 'Star Export House', NULL, 1, '2024-10-24 06:09:53', '2024-10-24 06:09:53'),
(3, 'ISO 9001: 2015 Certificate', '172975021386.jpg', 'ISO 9001: 2015 Certificate', NULL, 2, '2024-10-24 06:10:13', '2024-10-24 06:10:13'),
(4, 'IIP Certificate', '172975023437.jpg', 'IIP Certificate', NULL, 3, '2024-10-24 06:10:34', '2024-10-24 06:10:34'),
(5, 'GSPMA Certificate', '172975025619.jpg', 'GSPMA Certificate', NULL, 4, '2024-10-24 06:10:56', '2024-10-24 06:10:56'),
(6, 'FIEO Certificate', '172975028351.jpg', 'FIEO Certificate', NULL, 5, '2024-10-24 06:11:23', '2024-10-24 06:11:23'),
(7, 'ISO 22000:2018 Certificate', '172975031166.jpg', 'ISO 22000:2018 Certificate', NULL, 6, '2024-10-24 06:11:51', '2024-10-24 06:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int NOT NULL,
  `category_id` bigint DEFAULT NULL,
  `export_client` enum('1','0') NOT NULL DEFAULT '0',
  `client_title` varchar(255) DEFAULT NULL,
  `alt_tag` varchar(255) DEFAULT NULL,
  `home` enum('0','1') NOT NULL DEFAULT '0',
  `client_logo` varchar(255) DEFAULT NULL,
  `orderby` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `category_id`, `export_client`, `client_title`, `alt_tag`, `home`, `client_logo`, `orderby`, `created_at`, `updated_at`) VALUES
(1, 3, '0', 'vadilal', NULL, '1', '172976160271.jpg', 0, '2024-10-22 23:12:59', '2024-10-28 07:44:36'),
(2, 1, '0', 'mass', NULL, '0', '172976144674.jpg', 1, '2024-10-24 09:17:26', '2024-10-24 09:17:39'),
(3, 1, '0', 'vijayshri', NULL, '0', '172976148219.jpg', 2, '2024-10-24 09:18:02', '2024-10-24 09:18:02'),
(4, 1, '0', 'sai package', NULL, '0', '172976151259.jpg', 3, '2024-10-24 09:18:32', '2024-10-24 09:18:32'),
(5, 1, '0', 'Samrat', NULL, '1', '172976153475.jpg', 5, '2024-10-24 09:18:54', '2024-10-28 07:44:49'),
(7, 2, '0', 'J K Paper Ltd.', NULL, '1', '172983170127.jpg', 0, '2024-10-25 04:48:21', '2024-10-29 14:17:14'),
(8, 4, '0', 'Cadila', NULL, '0', '172983172489.jpg', 0, '2024-10-25 04:48:44', '2024-10-25 04:48:44'),
(9, 5, '0', 'Colgate', NULL, '1', '172983174649.jpg', 0, '2024-10-25 04:49:06', '2024-10-29 14:17:16'),
(10, 6, '0', 'MRF', NULL, '0', '172983176366.jpg', 0, '2024-10-25 04:49:23', '2024-10-25 04:49:23'),
(11, 7, '0', 'Bilt', NULL, '1', '172983178260.jpg', 0, '2024-10-25 04:49:42', '2024-10-29 14:17:20'),
(12, NULL, '1', 'Export 1', NULL, '0', '172984727016.jpg', 0, '2024-10-25 09:07:50', '2024-10-25 09:07:50'),
(13, NULL, '1', 'Export 2', NULL, '0', '172984728397.jpg', 0, '2024-10-25 09:08:03', '2024-10-25 09:08:03'),
(14, NULL, '1', 'Export 3', NULL, '0', '172984730225.jpg', 0, '2024-10-25 09:08:22', '2024-10-25 09:08:22'),
(15, NULL, '1', 'Export 4', NULL, '1', '172984731677.jpg', 0, '2024-10-25 09:08:36', '2024-10-29 14:17:27'),
(16, NULL, '1', 'Export 5', NULL, '0', '172984732864.jpg', 0, '2024-10-25 09:08:48', '2024-10-25 09:08:48'),
(17, NULL, '1', 'Export 6', NULL, '1', '172984734090.jpg', 0, '2024-10-25 09:09:00', '2024-10-29 14:17:31'),
(18, NULL, '1', 'Export 7', NULL, '0', '172984735292.jpg', 0, '2024-10-25 09:09:12', '2024-10-25 09:09:12'),
(19, NULL, '1', 'Export 8', NULL, '0', '172984736411.jpg', 0, '2024-10-25 09:09:24', '2024-10-25 09:09:24'),
(20, NULL, '1', 'Export 9', NULL, '1', '172984737628.jpg', 0, '2024-10-25 09:09:36', '2024-10-29 14:17:24'),
(21, NULL, '1', 'Export 10', NULL, '0', '172984738715.jpg', 0, '2024-10-25 09:09:47', '2024-10-25 09:09:47'),
(22, NULL, '1', 'Export 11', NULL, '0', '172984739780.jpg', 0, '2024-10-25 09:09:57', '2024-10-25 09:09:57'),
(23, NULL, '1', 'Export 12', NULL, '0', '172984740718.jpg', 0, '2024-10-25 09:10:07', '2024-10-25 09:10:07'),
(24, NULL, '1', 'Export 13', NULL, '0', '172984741713.jpg', 0, '2024-10-25 09:10:17', '2024-10-25 09:10:17'),
(25, NULL, '1', 'Export 14', NULL, '0', '172984742874.jpg', 0, '2024-10-25 09:10:28', '2024-10-25 09:10:28'),
(27, NULL, '1', 'Client export', NULL, '0', '173010642386.jpg', 0, '2024-10-28 09:07:03', '2024-10-28 09:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `client_industry`
--

CREATE TABLE `client_industry` (
  `id` bigint NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `orderby` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client_industry`
--

INSERT INTO `client_industry` (`id`, `category_name`, `slug`, `orderby`, `created_at`, `updated_at`) VALUES
(1, 'Food & Consumable Sector', 'food-consumable-sector', 0, '2024-10-25 05:44:24', '2024-10-25 05:44:24'),
(2, 'Paper Manufacturing Industries', 'paper-manufacturing-industries', 1, '2024-10-25 05:45:09', '2024-10-25 05:46:13'),
(3, 'Icecream Industries', 'icecream-industries', 2, '2024-10-25 05:45:20', '2024-10-25 05:46:21'),
(4, 'Pharmacueticals Sector', 'pharmacueticals-sector', 3, '2024-10-25 05:45:31', '2024-10-25 05:46:29'),
(5, 'Soap Manufacturing Sector', 'soap-manufacturing-sector', 4, '2024-10-25 05:45:41', '2024-10-25 05:46:35'),
(6, 'Tyre Industries', 'tyre-industries', 5, '2024-10-25 05:45:51', '2024-10-25 05:45:51'),
(7, 'Kraft paper', 'kraft-paper', 6, '2024-10-25 05:46:02', '2024-10-25 08:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `address` longtext,
  `products` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `phone_number`, `email`, `message`, `address`, `products`, `created_at`, `updated_at`) VALUES
(1, 'Mohini', '1425369547', 'opal966@opal.in', '', NULL, NULL, '2024-10-24 05:58:06', '2024-10-24 05:58:06'),
(2, 'Mohini', '1425369547', 'opal966@opal.in', '', NULL, NULL, '2024-10-24 06:00:03', '2024-10-24 06:00:03'),
(3, 'Mohini', '1425369547', 'opal966@opal.in', 'test', NULL, NULL, '2024-10-24 12:45:45', '2024-10-24 12:45:45'),
(4, 'test', '9879879877', 'test@gm.c', 'This is test', NULL, NULL, '2024-10-28 11:59:04', '2024-10-28 11:59:04'),
(5, 'RB', '9879879877', 'rb@gm.com', 'This is test', NULL, NULL, '2024-10-28 12:01:35', '2024-10-28 12:01:35'),
(6, 'Raj', '9879879877', 'raj@gm.com', 'This is test', NULL, NULL, '2024-10-28 12:03:49', '2024-10-28 12:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt_tag` varchar(255) DEFAULT NULL,
  `orderby` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure`
--

CREATE TABLE `infrastructure` (
  `id` bigint NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `alt_tag` varchar(255) DEFAULT NULL,
  `orderby` bigint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `infrastructure`
--

INSERT INTO `infrastructure` (`id`, `image`, `alt_tag`, `orderby`, `created_at`, `updated_at`) VALUES
(9, '1730091268-18.jpg', NULL, 0, '2024-10-28 04:54:28', '2024-10-28 04:54:28'),
(10, '1730091283-89.jpg', NULL, 0, '2024-10-28 04:54:43', '2024-10-28 04:54:43'),
(11, '1730091300-62.jpg', NULL, 0, '2024-10-28 04:55:00', '2024-10-28 04:55:00'),
(12, '1730091312-84.jpg', NULL, 0, '2024-10-28 04:55:12', '2024-10-28 04:55:12'),
(13, '1730091331-69.jpg', NULL, 0, '2024-10-28 04:55:31', '2024-10-28 04:55:31'),
(14, '1730091331-38.jpg', NULL, 0, '2024-10-28 04:55:31', '2024-10-28 04:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `inquirey`
--

CREATE TABLE `inquirey` (
  `id` int NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `address` text,
  `message` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pg_id` int NOT NULL,
  `pg_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shrt_desc` text COLLATE utf8mb4_general_ci,
  `full_desc` text COLLATE utf8mb4_general_ci,
  `page_footer` enum('0','1') COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `rubric` text COLLATE utf8mb4_general_ci,
  `alt_tag` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8mb4_general_ci,
  `banner_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile_banner` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pg_id`, `pg_name`, `slug`, `shrt_desc`, `full_desc`, `page_footer`, `rubric`, `alt_tag`, `meta_title`, `meta_keyword`, `meta_desc`, `banner_image`, `mobile_banner`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', NULL, '<div class=\"inner-page-wrap inner-sec-margin\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-lg-7 col-md-7 col-sm-12 col-12\">\r\n				<h3 class=\"Plus-bold font-30 color-red position-relative\">Innovative Packaging Solutions<div class=\" text-shadow Plus-bold\">Company</div></h3>\r\n				<p class=\"text-justyfy\">Since 1984, Yogeshwar Polymers has been pioneering and offering packaging solutions to satisfy the diverse needs of multiple sectors. Based in India, we specialize in PE-coated paper, board, and printed flexible laminates. Our enriched knowledge and versatile experience in manufacturing and exporting products to over 27 countries provide both standard and customized flexible packaging solutions. Our expertise is evident as we innovate and deliver total value to our esteemed clientele.</p>\r\n				<p class=\"text-justyfy\">With the growing demand for end-to-end modern-day packaging, regular plant expansions occurred, alongside the development of world-class manufacturing facilities in line with the trends of the demanding industry.</p>\r\n			</div>\r\n			<div class=\"col-lg-5 col-md-5 col-sm-12 col-12\">\r\n				<img src=\"assets/images/aboutus-image.png\" class=\"img-fluid w-100 ps-3 ps-md-4\">\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<div class=\"about-us-second-wrap inner-sec-margin\">\r\n	<div class=\"container\">\r\n		<div class=\"row justify-content-center\">\r\n			<div class=\"col-lg-9 col-md-9 col-sm-12 col-12\">\r\n				<div class=\"about-middle-content\">\r\n					<div class=\"d-inline-block\">\r\n						<h3 class=\"Plus-bold font-30 color-blue position-relative mb-3 mb-md-4\">\r\n							Leading from the Front in Packaging Trends\r\n							<div class=\"text-shadow Plus-bold\">Trendsetting Packaging</div>\r\n						</h3>\r\n						<p>Our product range includes PE-coated paper/board, specialty Packaging( Paper and Aluminum Laminates ), Printed Flexible Material( Polyester/Bopp/Bopa Laminates),and 3 layered and 5-layered packaging widely demanded across more than 20 countries for the functionality, durability and high tolerance they provide. We also have Carton Liners, Specialty Packaging for butter products, turret liners for the tyre industry, and registered matt coating for various other industries. The highly effective packaging protects all the products from any kind of contamination soiling or any other damage. The versatility we offer is amazing which helps in spreading our international presence continually and in an expanding mode.</p>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<div class=\"about-us-thir-wrap inner-sec-margin\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-lg-12 col-md-12 col-sm-12 col-12\">\r\n				<h3 class=\"Plus-bold font-30 color-red position-relative mb-3 mb-md-4\">\r\n					Quality, Vision, Infrastructure\r\n					<div class=\"text-shadow Plus-bold\">Core Pillars</div>\r\n				</h3>\r\n			</div>\r\n			<div class=\"col-lg-5 col-md-5 col-sm-12 col-12 vision-mision-col\">\r\n				<div class=\"vision-mision-box\">\r\n					<div class=\"vision-mission-wrap vision-wrap\">\r\n						<h3>Vision</h3>\r\n						<p>Our Vision is to satisfy all our clients by meeting their specific and custom needs in terms of expertise, quality, management, innovative technology, and scientific-based research.</p>\r\n					</div>\r\n					<div class=\"vision-mission-wrap mission-wrap\">\r\n						<h3>Infrastructure</h3>\r\n						<p>We have state-of-the-art manufacturing facilities based in Ahmedabad that cater to high-volume production and all the services along with timely delivery.</p>\r\n					</div>\r\n				</div>\r\n			</div>\r\n			<div class=\"col-lg-7 col-md-7 col-sm-12 col-12\">\r\n				<p>The products are certified as per international standards and are made in a clean and hygienic environment.</p>\r\n				<div class=\"quality-box-wrap\">\r\n					<div class=\"qtlty-ico\"><img src=\"assets/images/box2.png\" class=\"img-fluid\"></div>\r\n					<div class=\"qtlty-text\">\r\n						<h3>Commitment to Quality and Innovation</h3>\r\n						<p>We ensure that quality products are supplied to customers with a continual focus on improvements, innovation, and development.</p>\r\n					</div>\r\n				</div>\r\n				<div class=\"quality-box-wrap\">\r\n					<div class=\"qtlty-ico\"><img src=\"assets/images/box1.png\" class=\"img-fluid\"></div>\r\n					<div class=\"qtlty-text\">\r\n						<h3>Cost-Effective Resource Utilization</h3>\r\n						<p>At Yogeshwar Polymers optimum utilization of resources and cost effectiveness is guaranteed.</p>\r\n					</div>\r\n				</div>\r\n				<div class=\"quality-box-wrap\">\r\n					<div class=\"qtlty-ico\"><img src=\"assets/images/box4.png\" class=\"img-fluid\"></div>\r\n					<div class=\"qtlty-text\">\r\n						<h3>Skilled and Motivated Team</h3>\r\n						<p>The team is adequately trained, developed, and motivated to bring out the best talent.</p>\r\n					</div>\r\n				</div>\r\n				<div class=\"quality-box-wrap\">\r\n					<div class=\"qtlty-ico\"><img src=\"assets/images/box5.png\" class=\"img-fluid\"></div>\r\n					<div class=\"qtlty-text\">\r\n						<h3>Timely Fulfillment of Customer Needs</h3>\r\n						<p>We are equipped to meet all the domestic and international customer specifications on time and every time.</p>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<div class=\"about-us-last-wrap inner-sec-margin mb-3\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-lg-5 col-md-5 col-sm-12 col-12 abt-last-col\">\r\n				<img src=\"assets/images/iif10.png\" class=\"img-fluid w-100\">\r\n			</div>\r\n			<div class=\"col-lg-7 col-md-7 col-sm-12 col-12 ps-md-5 ps-3 align-self-center\">\r\n				<h3 class=\"Plus-bold font-30 color-red position-relative mb-3 mb-md-4\">\r\n					Delivering Distinct Value in Every Aspect\r\n					<div class=\"text-shadow Plus-bold\">Unique Proposition</div>\r\n				</h3>\r\n				<p>Integration is exquisitely done with all our customers and business partners so that our clients receive the most flexible and adaptable solutions with customization par excellence. With all the facilities and infrastructure under one roof, we produce diverse product ranges like PE-coated paper, board, and printed flexible laminates. We also ensure that our clientele takes advantage of the latest technology available to reap their best benefits in business.</p>\r\n				<p>The professionally managed team at Yogeshwar Polymers promises a stringent and multilevel quality check which makes the products stand out across the industry. We have a strong export mechanism that helps us sustain and grow exports in more than 20 countries in the world.</p>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', '1', '<p><br></p>', 'About Us', 'About Us', NULL, NULL, '1730271304.jpg', '1730271304mobile.jpg', '2024-06-11 23:49:42', '2024-10-30 07:54:19'),
(6, 'Certificates', 'certificates', '<p><br></p>', '<p><br></p>', '1', '<p><br></p>', 'Certificates', 'Certificates', NULL, NULL, '1730271339.jpg', '1730271339mobile.jpg', '2024-10-24 06:14:42', '2024-10-30 06:55:39'),
(7, 'Clientele', 'clientele', '<p><br></p>', '<p><br></p>', '1', '<p><br></p>', 'Clientele', 'Clientele', 'Clientele', NULL, '1730271367.jpg', '1730271367mobile.jpg', '2024-10-24 10:50:22', '2024-10-30 06:56:07'),
(9, 'Inquiry', 'inquiry', '<p><br></p>', '<p><br></p>', '1', '<p><br></p>', 'Inquiry', 'Inquiry', 'Inquiry', NULL, '1730271383.jpg', '1730271383mobile.jpg', '2024-10-24 12:40:39', '2024-10-30 06:56:23'),
(10, 'Industries', 'industries', '<p><br></p>', '<p><br></p>', '1', '<p><br></p>', 'Industries', 'Industries', 'Industries', NULL, '1729843783.png', NULL, '2024-10-25 08:09:43', '2024-10-25 08:10:50'),
(11, 'Career', 'career', '<p><br></p>', '<p><br></p>', '1', '<p><br></p>', 'Career', 'Career', 'Career', NULL, '1730271396.jpg', '1730271396mobile.jpg', '2024-10-25 09:15:00', '2024-10-30 06:56:36'),
(12, 'Contact Us', 'contact-us', '<p><br></p>', '<p><br></p>', '1', '<p><br></p>', 'Contact Us', 'Contact Us', 'Contact Us', NULL, '1730271420.jpg', '1730271420mobile.jpg', '2024-10-25 09:22:20', '2024-10-30 06:57:00'),
(13, 'Export', 'export', '<p><br></p>', '<p><br></p>', '1', '<p><br></p>', 'Export', 'Export', 'Export', NULL, '1730271435.jpg', '1730271435mobile.jpg', '2024-10-25 09:29:08', '2024-10-30 06:57:15'),
(14, 'Infrastructure', 'infrastructure', '<p><br></p>', '<p><br></p>', '1', '<p><br></p>', 'Infrastructure', 'Infrastructure', NULL, NULL, '1730271446.jpg', '1730271446mobile.jpg', '2024-10-25 10:04:26', '2024-10-30 06:57:26'),
(15, 'Home', 'home', '<p><br></p>', '<h3 class=\"Plus-bold font-30 color-red position-relative\">Reliable power through <br>\r\n          the best packaging solutions- <br>\r\n          Define your world\r\n          <div class=\" text-shadow Plus-bold\">About Us</div>\r\n        </h3>\r\n        <p class=\"Plus-light font-14 pt-2\">\r\n          Since 1984, Yogeshwar Polymers has been pioneering and offering packaging solutions to satisfy\r\n          the diverse needs of multiple sectors. Based in India, we specialize in PE-coated paper, board,\r\n          and printed flexible laminates. Our enriched knowledge and versatile experience in manufacturing\r\n          and exporting products to over 27 countries provide both standard and customized flexible\r\n          packaging solutions. Our expertise is evident as we innovate and deliver total value to our\r\n          esteemed clientele.\r\n        </p>\r\n        <div class=\"p-4\">\r\n        </div>\r\n        <a href=\"/about-us\" class=\"font-14 Plus-bold readmore-button \">Read More <span class=\"ms-2\"><i class=\"fa-solid fa-arrow-right\"></i></span></a>', '1', '<p><br></p>', 'Home - Yogeshwar Polymers', 'Home - Yogeshwar Polymers', NULL, NULL, NULL, NULL, '2024-10-28 07:02:16', '2024-10-28 07:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `orderby` bigint DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_general_ci,
  `alt_tag` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `banner_img` longtext COLLATE utf8mb4_general_ci,
  `mobile_banner` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `banner_alt` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rubric` longtext COLLATE utf8mb4_general_ci,
  `desc` longtext COLLATE utf8mb4_general_ci,
  `property` longtext COLLATE utf8mb4_general_ci,
  `solubility` longtext COLLATE utf8mb4_general_ci,
  `specification` longtext COLLATE utf8mb4_general_ci,
  `meta_title` longtext COLLATE utf8mb4_general_ci,
  `meta_keyword` longtext COLLATE utf8mb4_general_ci,
  `meta_desc` longtext COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `subtitle`, `category_id`, `orderby`, `slug`, `image`, `alt_tag`, `banner_img`, `mobile_banner`, `banner_alt`, `rubric`, `desc`, `property`, `solubility`, `specification`, `meta_title`, `meta_keyword`, `meta_desc`, `created_at`, `updated_at`) VALUES
(3, 'Gourmet packing for all types of snacks and chips', 'Snacks and Chips', 1, 0, 'gourmet-packing-for-all-types-of-snacks-and-chips', '172986035210.png', 'Gourmet packing for all types of snacks and chips', '173027245271banner.jpg', '173027381764mobile.jpg', 'Gourmet packing for all types of snacks and chips', '<p>Indulge in Impeccable Quality of Snacks and Chips Packaging with its various uses in-</p>', '<h4 class=\"font-24 Plus-bold pt-4\">Material Combinations and Technical Specifications</h4>\r\n<p class=\"pt-1 font-14 Plus-light\">We offer customized packaging that range from two to four layers depending on the specification and shelf life expected. The various combinations available are PET, METPET, BOPP, Metalized BOPP, Metalized CPP, Aluminum Foil, LDPE (Extrusion grade), 3 to 5 Layer LDPE Film, BOPA and outstanding conventional packaging films.</p>\r\n<h4 class=\"font-24 Plus-bold pt-3\">Consumer Benefits – On the Go</h4>\r\n<ul class=\"pt-3 right-list row gap-2 font-14 Plus-light\">\r\n    <li>When it comes to innovation, Yogeshwar Polymers offers a wide range of special and innovative packaging solutions, including various options of laminate structures.</li>\r\n    <li>According to the product and shelf life, a total customized solution in reel and pouch form is available.</li>\r\n    <li>Tailor-made and versatile packaging solutions in printed as well as plain rolls can easily be run on all types of packaging machines.</li>\r\n    <li>Appealing packaging with options of various colours and materials available.</li>\r\n    <li> The multilayered laminates can preserve the products perfectly retaining their desired aroma, flavor and on counter life.</li>\r\n    <li>Protect your snacks and chips by opting for the superior moisture retaining, oxygen/gas barrier properties in the packing films and increase the stability of the snacks and Namkeen.</li>\r\n</ul>', '<p><br></p>', '<p><br></p>', '<p><br></p>', 'Gourmet Packing for All types of Snacks and Chips', NULL, NULL, '2024-10-25 11:04:37', '2024-10-30 07:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint NOT NULL,
  `product_id` bigint DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_general_ci,
  `alt_tag` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `orderby` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `alt_tag`, `orderby`, `created_at`, `updated_at`) VALUES
(1, 1, 'LOGO_1-37.png', NULL, NULL, '2024-10-23 00:50:05', '2024-10-23 00:50:05'),
(3, 1, 'symphony-surround-bldc-tower-fan-47.png', 'test', 3, '2024-10-23 00:50:24', '2024-10-23 00:51:31'),
(5, 3, 'product-Image-1-90.png', NULL, NULL, '2024-10-25 12:59:46', '2024-10-25 12:59:46'),
(6, 3, 'product-Images-50.png', NULL, NULL, '2024-10-25 12:59:46', '2024-10-25 12:59:46'),
(7, 3, 'product-Image-2-82.png', NULL, NULL, '2024-10-25 12:59:46', '2024-10-25 12:59:46'),
(8, 3, 'product-Image-3-87.png', NULL, NULL, '2024-10-25 12:59:47', '2024-10-25 12:59:47'),
(9, 3, 'product-Image-4-59.png', NULL, NULL, '2024-10-25 12:59:47', '2024-10-25 12:59:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_product`
--
ALTER TABLE `application_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_industry`
--
ALTER TABLE `client_industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infrastructure`
--
ALTER TABLE `infrastructure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquirey`
--
ALTER TABLE `inquirey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `application_product`
--
ALTER TABLE `application_product`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `client_industry`
--
ALTER TABLE `client_industry`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `infrastructure`
--
ALTER TABLE `infrastructure`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pg_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
