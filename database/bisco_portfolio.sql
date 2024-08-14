-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 12:47 AM
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
-- Database: `bisco_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_informations`
--

CREATE TABLE `company_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `details_ar` text DEFAULT NULL,
  `details_en` text DEFAULT NULL,
  `address_ar` varchar(255) DEFAULT NULL,
  `address_en` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_informations`
--

INSERT INTO `company_informations` (`id`, `name_ar`, `name_en`, `details_ar`, `details_en`, `address_ar`, `address_en`, `phone`, `mobile`, `email`, `whatsapp`, `facebook_url`, `youtube_url`, `linkedin_url`, `twitter_url`, `instagram_url`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ءءءسسء', 'سءءسسءسءش', 'ءسسءءسءسش', 'ءسسءسءسءسء', 'سءسءسشءسءس', 'سءسءسءسء', 'سءسءسءسء', '01016856433', 'ahmednassag@gmail.com', '01016856430', 'https://www.facebook.com/', 'https://www.youtubr.com/', 'https://www.linkedin.com/in/ahmednassag/', 'https://www.twitter.com/', 'https://www.instagram.com/', '1717357090.jpg', '2024-06-01 19:25:44', '2024-06-02 18:38:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_items`
--

CREATE TABLE `course_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `author_ar` varchar(255) DEFAULT NULL,
  `author_en` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_items`
--

INSERT INTO `course_items` (`id`, `name_ar`, `name_en`, `author_ar`, `author_en`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dcdcdcdcdc', 'dccddccddc', 'cdcdcdccd', 'dcdcdcdcdc', '1717266017.jpg', '2024-06-01 17:20:17', '2024-06-01 17:21:48', '2024-06-01 17:21:48'),
(2, 'wwwwwwwwwwww', 'wwwwwwwwwww', 'wwwwwwwwwwww', 'wwwwwwwwwwww', '1717266091.jpg', '2024-06-01 17:21:02', '2024-06-01 17:21:41', '2024-06-01 17:21:41'),
(3, 'aaaa', 'Golden Package', 'gtgtyh', 'yheyheyh', '1717531323.jpg', '2024-06-04 19:02:03', '2024-06-04 19:02:03', NULL);

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_03_092203_create_products_table', 1),
(6, '2023_08_06_035011_create_notifications_table', 1),
(7, '2023_08_07_003110_create_permission_tables', 1),
(8, '2024_05_28_230542_create_sliders_table', 2),
(9, '2024_05_29_213558_create_slider_footers_table', 3),
(10, '2024_05_29_220049_create_who_we_are_contents_table', 4),
(11, '2024_05_29_220627_create_who_we_are_sides_table', 4),
(12, '2024_05_29_225031_create_who_we_are_details_table', 5),
(13, '2024_05_30_001758_create_who_we_are_faqs_table', 6),
(14, '2024_05_30_012045_create_service_details_table', 7),
(15, '2024_06_01_163739_create_service_items_table', 8),
(16, '2024_06_01_172254_create_project_details_table', 9),
(17, '2024_06_01_172311_create_project_items_table', 9),
(18, '2024_06_01_194719_create_course_items_table', 10),
(20, '2024_06_01_204733_create_company_informations_table', 11),
(21, '2024_06_01_223935_create_messages_table', 12),
(22, '2024_06_04_232336_create_parteners_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('072e4e33-7b4e-400b-99dc-0de5eb38d647', 'App\\Notifications\\WhoWeAreFaqAdded', 'App\\Models\\User', 2, '{\"route\":\"who-we-are-faqShowNotification\\/1\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0633\\u0624\\u0627\\u0644 \\u0648\\u0625\\u062c\\u0627\\u0628\\u0629 \\u0645\\u0646 \\u0646\\u062d\\u0646 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 21:50:13', '2024-05-29 21:50:13'),
('099c5f67-51c7-4423-9814-9aae0f0b90d7', 'App\\Notifications\\SliderFooterAdded', 'App\\Models\\User', 2, '{\"route\":\"slider-footerShowNotification\\/2\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0623\\u0633\\u0641\\u0644 \\u0648\\u0627\\u062c\\u0647\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 18:48:17', '2024-05-29 18:48:17'),
('12506524-2d99-4a59-9d7a-8bfafbec075f', 'App\\Notifications\\WhoWeAreDetailAdded', 'App\\Models\\User', 2, '{\"route\":\"who-we-are-detailShowNotification\\/2\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u0645\\u0646 \\u0646\\u062d\\u0646 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 20:16:06', '2024-05-29 20:16:06'),
('12b3de95-68f3-44b2-9927-fb272f475d97', 'App\\Notifications\\WhoWeAreDetailAdded', 'App\\Models\\User', 2, '{\"route\":\"who-we-are-detailShowNotification\\/1\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u0645\\u0646 \\u0646\\u062d\\u0646 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 20:15:41', '2024-05-29 20:15:41'),
('1a4a7227-d4e8-4d55-aa3c-1a0839fdaa32', 'App\\Notifications\\ServiceItemAdded', 'App\\Models\\User', 2, '{\"route\":\"service-itemShowNotification\\/3\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0639\\u0646\\u0635\\u0631 \\u062e\\u062f\\u0645\\u0627\\u062a\\u0646\\u0627 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-01 14:04:04', '2024-06-01 14:04:04'),
('1ef5cab8-23aa-4243-a224-959d0c3e15fd', 'App\\Notifications\\CompanyInformationAdded', 'App\\Models\\User', 2, '{\"route\":\"company-informationShowNotification\\/1\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-01 19:25:44', '2024-06-01 19:25:44'),
('1f35d6f7-ce42-4597-97df-defd53aa2a57', 'App\\Notifications\\SliderFooterAdded', 'App\\Models\\User', 2, '{\"route\":\"slider-footerShowNotification\\/1\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0623\\u0633\\u0641\\u0644 \\u0648\\u0627\\u062c\\u0647\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 18:47:59', '2024-05-29 18:47:59'),
('2', 'App\\Notifications\\UserAdded', 'App\\Models\\User', 2, '{\"route\":\"usersShowNotification\\/2\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-28 19:41:02', '2024-05-28 19:41:02'),
('263f4397-6ca4-42d8-bd44-69603bdfa3a7', 'App\\Notifications\\SliderFooterAdded', 'App\\Models\\User', 2, '{\"route\":\"slider-footerShowNotification\\/3\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0623\\u0633\\u0641\\u0644 \\u0648\\u0627\\u062c\\u0647\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 18:50:02', '2024-05-29 18:50:02'),
('29d06903-d493-4e12-9db2-3058fde64f6d', 'App\\Notifications\\ProjectItemAdded', 'App\\Models\\User', 2, '{\"route\":\"project-itemShowNotification\\/2\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0639\\u0646\\u0635\\u0631 \\u0645\\u0634\\u0627\\u0631\\u064a\\u0639\\u0646\\u0627 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-01 14:44:36', '2024-06-01 14:44:36'),
('2c3262b2-504b-430d-987a-a532450a92d1', 'App\\Notifications\\ProjectItemAdded', 'App\\Models\\User', 2, '{\"route\":\"project-itemShowNotification\\/3\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0639\\u0646\\u0635\\u0631 \\u0645\\u0634\\u0627\\u0631\\u064a\\u0639\\u0646\\u0627 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-01 14:44:57', '2024-06-01 14:44:57'),
('300e6844-d31b-4288-9d23-bf5a1efed86f', 'App\\Notifications\\SliderAdded', 'App\\Models\\User', 2, '{\"route\":\"sliderShowNotification\\/3\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0648\\u0627\\u062c\\u0647\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-28 21:19:45', '2024-05-28 21:19:45'),
('37ba12c8-8a1a-4f4e-a6e6-ed95ab2057d5', 'App\\Notifications\\PartenerAdded', 'App\\Models\\User', 2, '{\"route\":\"partenerShowNotification\\/3\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0634\\u0631\\u064a\\u0643 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-04 20:47:54', '2024-06-04 20:47:54'),
('4072e08d-31f7-4929-854a-cbb71447f67e', 'App\\Notifications\\SliderAdded', 'App\\Models\\User', 2, '{\"route\":\"sliderShowNotification\\/5\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0648\\u0627\\u062c\\u0647\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-04 18:47:28', '2024-06-04 18:47:28'),
('46357442-b6b6-461a-8b90-bb69100f573c', 'App\\Notifications\\WhoWeAreSideAdded', 'App\\Models\\User', 2, '{\"route\":\"who-we-are-sideShowNotification\\/5\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u062c\\u0627\\u0646\\u0628\\u064a \\u0645\\u0646 \\u0646\\u062d\\u0646 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 19:44:36', '2024-05-29 19:44:36'),
('4d9de634-46fa-44ce-944e-ead836379edb', 'App\\Notifications\\CourseItemAdded', 'App\\Models\\User', 2, '{\"route\":\"course-itemShowNotification\\/3\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-04 19:02:04', '2024-06-04 19:02:04'),
('4eea2893-be70-40bd-943d-7dfec9c01eb8', 'App\\Notifications\\PartenerAdded', 'App\\Models\\User', 2, '{\"route\":\"partenerShowNotification\\/2\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0634\\u0631\\u064a\\u0643 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-04 20:47:34', '2024-06-04 20:47:34'),
('4fcb6885-fa5b-4990-8ac7-da4007d395d7', 'App\\Notifications\\PartenerAdded', 'App\\Models\\User', 2, '{\"route\":\"partenerShowNotification\\/4\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0634\\u0631\\u064a\\u0643 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-04 20:54:53', '2024-06-04 20:54:53'),
('5fc5e442-d8e7-4f92-9afe-ad2ac2e437c4', 'App\\Notifications\\ServiceDetailAdded', 'App\\Models\\User', 2, '{\"route\":\"service-detailShowNotification\\/2\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u062e\\u062f\\u0645\\u0627\\u062a\\u0646\\u0627 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 22:45:30', '2024-05-29 22:45:30'),
('72fed8c0-32c6-4e71-b722-0b105a1bd41f', 'App\\Notifications\\WhoWeAreFaqAdded', 'App\\Models\\User', 2, '{\"route\":\"who-we-are-faqShowNotification\\/3\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0633\\u0624\\u0627\\u0644 \\u0648\\u0625\\u062c\\u0627\\u0628\\u0629 \\u0645\\u0646 \\u0646\\u062d\\u0646 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 21:52:03', '2024-05-29 21:52:03'),
('730b9da7-8724-4d66-95a8-b6997429ecd5', 'App\\Notifications\\ProductAdded', 'App\\Models\\User', 2, '{\"route\":\"productShowNotification\\/8\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0646\\u062a\\u062c \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-28 19:53:14', '2024-05-28 19:53:14'),
('85396f60-5e2a-4e68-9c20-5ff0b3475c59', 'App\\Notifications\\ServiceDetailAdded', 'App\\Models\\User', 2, '{\"route\":\"service-detailShowNotification\\/1\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u062e\\u062f\\u0645\\u0627\\u062a\\u0646\\u0627 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 22:45:09', '2024-05-29 22:45:09'),
('86250ab9-e585-401e-aa65-3ac23737759f', 'App\\Notifications\\ProjectDetailAdded', 'App\\Models\\User', 2, '{\"route\":\"project-detailShowNotification\\/2\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u0645\\u0634\\u0627\\u0631\\u064a\\u0639\\u0646\\u0627 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-01 14:43:24', '2024-06-01 14:43:24'),
('8e567106-ebf6-4f5f-9eb9-b7f2248d6afe', 'App\\Notifications\\WhoWeAreFaqAdded', 'App\\Models\\User', 2, '{\"route\":\"who-we-are-faqShowNotification\\/2\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0633\\u0624\\u0627\\u0644 \\u0648\\u0625\\u062c\\u0627\\u0628\\u0629 \\u0645\\u0646 \\u0646\\u062d\\u0646 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 21:51:37', '2024-05-29 21:51:37'),
('93cdac87-8450-4e96-8d39-3fedb7a94c44', 'App\\Notifications\\ProjectDetailAdded', 'App\\Models\\User', 2, '{\"route\":\"project-detailShowNotification\\/3\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u0645\\u0634\\u0627\\u0631\\u064a\\u0639\\u0646\\u0627 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-01 14:43:39', '2024-06-01 14:43:39'),
('99d8a08a-0144-4145-bb45-bd5a3beb250c', 'App\\Notifications\\CourseItemAdded', 'App\\Models\\User', 2, '{\"route\":\"course-itemShowNotification\\/2\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-01 17:21:02', '2024-06-01 17:21:02'),
('b53315bf-ce59-4b15-a283-d8c769ae5308', 'App\\Notifications\\ProductAdded', 'App\\Models\\User', 1, '{\"route\":\"productShowNotification\\/7\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0646\\u062a\\u062c \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', '2024-05-28 19:54:52', '2024-05-28 19:52:41', '2024-05-28 19:54:52'),
('b9578bb5-3ae1-4eec-b4b7-a3868ebc80fc', 'App\\Notifications\\PartenerAdded', 'App\\Models\\User', 2, '{\"route\":\"partenerShowNotification\\/1\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0634\\u0631\\u064a\\u0643 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-04 20:46:57', '2024-06-04 20:46:57'),
('babbb15a-602e-4014-87a5-30c52dcab1e9', 'App\\Notifications\\ProductAdded', 'App\\Models\\User', 2, '{\"route\":\"productShowNotification\\/7\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0646\\u062a\\u062c \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-28 19:52:41', '2024-05-28 19:52:41'),
('bc6da920-2b14-45c9-81b2-a55db2d5f828', 'App\\Notifications\\ProjectDetailAdded', 'App\\Models\\User', 2, '{\"route\":\"project-detailShowNotification\\/1\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u0645\\u0634\\u0627\\u0631\\u064a\\u0639\\u0646\\u0627 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-01 14:42:56', '2024-06-01 14:42:56'),
('d26336ce-5b31-47f5-9c1b-7834793317d8', 'App\\Notifications\\ProductAdded', 'App\\Models\\User', 2, '{\"route\":\"productShowNotification\\/6\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0646\\u062a\\u062c \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-28 19:51:37', '2024-05-28 19:51:37'),
('d275790d-dc20-4edb-ada8-5bb28e02bc78', 'App\\Notifications\\SliderAdded', 'App\\Models\\User', 2, '{\"route\":\"sliderShowNotification\\/4\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0648\\u0627\\u062c\\u0647\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 19:40:01', '2024-05-29 19:40:01'),
('d4edfae8-be44-4832-a759-fd4a143da30f', 'App\\Notifications\\ProductAdded', 'App\\Models\\User', 1, '{\"route\":\"productShowNotification\\/8\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0646\\u062a\\u062c \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', '2024-05-28 19:54:34', '2024-05-28 19:53:14', '2024-05-28 19:54:34'),
('dbdaa822-efb0-4cb5-85e5-78886570de87', 'App\\Notifications\\ProjectItemAdded', 'App\\Models\\User', 2, '{\"route\":\"project-itemShowNotification\\/1\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0639\\u0646\\u0635\\u0631 \\u0645\\u0634\\u0627\\u0631\\u064a\\u0639\\u0646\\u0627 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-01 14:44:10', '2024-06-01 14:44:10'),
('de65b7bc-811d-4e0d-9dbe-471a71c5c64e', 'App\\Notifications\\CourseItemAdded', 'App\\Models\\User', 2, '{\"route\":\"course-itemShowNotification\\/1\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u062d\\u0627\\u0636\\u0631\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-06-01 17:20:17', '2024-06-01 17:20:17'),
('e3e0addc-6ba0-4958-ae73-1793e78084c0', 'App\\Notifications\\ServiceDetailAdded', 'App\\Models\\User', 2, '{\"route\":\"service-detailShowNotification\\/3\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u062e\\u062f\\u0645\\u0627\\u062a\\u0646\\u0627 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 22:45:41', '2024-05-29 22:45:41'),
('fa9705b6-00d6-4997-ab52-f42a1dcddb4a', 'App\\Notifications\\WhoWeAreDetailAdded', 'App\\Models\\User', 2, '{\"route\":\"who-we-are-detailShowNotification\\/3\",\"title\":\"\\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u0629 \\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u0645\\u0646 \\u0646\\u062d\\u0646 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629\",\"user\":\"Ahmed Nabil\"}', NULL, '2024-05-29 20:16:17', '2024-05-29 20:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `parteners`
--

CREATE TABLE `parteners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parteners`
--

INSERT INTO `parteners` (`id`, `name_ar`, `name_en`, `url`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'wwwwwwwwwwwww', 'wwwwwwww', 'https://concept.prime-coding.com/', '1717537636.jpg', '2024-06-04 20:46:57', '2024-06-04 20:47:23', '2024-06-04 20:47:23'),
(2, 'asdasdsadsda', 'sdasdasadsdasd', 'https://concept.prime-coding.com/', '1717537654.jpg', '2024-06-04 20:47:34', '2024-06-04 20:47:41', '2024-06-04 20:47:41'),
(3, 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaa', 'https://concept.prime-coding.com/', '1717537674.jpg', '2024-06-04 20:47:54', '2024-06-04 20:47:54', NULL),
(4, 'ffsdfsddfssdfsdfsdfsdf', 'fssdffsdfdsdfsdf', 'https://raitotec.com/contact', '1717538093.jpg', '2024-06-04 20:54:53', '2024-06-04 20:54:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'المستخدمين', 'web', '2024-05-28 17:40:26', '2024-05-28 17:40:26'),
(2, 'قائمة المستخدمين', 'web', '2024-05-28 17:40:26', '2024-05-28 17:40:26'),
(3, 'صلاحيات المستخدمين', 'web', '2024-05-28 17:40:26', '2024-05-28 17:40:26'),
(4, 'إضافة مستخدم', 'web', '2024-05-28 17:40:26', '2024-05-28 17:40:26'),
(5, 'تعديل مستخدم', 'web', '2024-05-28 17:40:26', '2024-05-28 17:40:26'),
(6, 'حذف مستخدم', 'web', '2024-05-28 17:40:27', '2024-05-28 17:40:27'),
(7, 'عرض صلاحية', 'web', '2024-05-28 17:40:27', '2024-05-28 17:40:27'),
(8, 'إضافة صلاحية', 'web', '2024-05-28 17:40:27', '2024-05-28 17:40:27'),
(9, 'تعديل صلاحية', 'web', '2024-05-28 17:40:27', '2024-05-28 17:40:27'),
(10, 'حذف صلاحية', 'web', '2024-05-28 17:40:27', '2024-05-28 17:40:27'),
(11, 'الإشعارات', 'web', '2024-05-28 17:40:27', '2024-05-28 17:40:27');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'sdadasda', 'sadsdasadsda', '234234243', '1716927044.jpg', '2024-05-28 19:03:15', '2024-05-28 19:10:44', NULL),
(3, 'sadsdaasd', 'sdadasdsasd', '1111', '1716927510.jpg', '2024-05-28 19:18:30', '2024-05-28 19:38:38', '2024-05-28 19:38:38'),
(4, 'sdaasddsasda', 'sdasdasdasda', '651651', '1716928732.jpg', '2024-05-28 19:38:52', '2024-05-28 21:26:46', '2024-05-28 21:26:46'),
(5, 'sdasdasdasda', 'sdasdasdasda', '98984985', '1716928769.jpg', '2024-05-28 19:39:12', '2024-05-28 21:26:46', '2024-05-28 21:26:46'),
(6, 'dasd', 'weqqweew', '1111', '1716929497.jpg', '2024-05-28 19:51:37', '2024-05-28 19:51:37', NULL),
(7, 'sdasdasda', 'sdasdsdsda', '1111', '1716929561.jpg', '2024-05-28 19:52:41', '2024-05-28 21:26:58', '2024-05-28 21:26:58'),
(8, 'sdasdasdarwrewer', 'asdsasadsda', '1222', '1716929594.jpg', '2024-05-28 19:53:14', '2024-05-28 21:26:58', '2024-05-28 21:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details_ar` text DEFAULT NULL,
  `details_en` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`id`, `details_ar`, `details_en`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'yyyyyyy', 'yyyyyyy', '2024-06-01 14:42:55', '2024-06-01 14:43:15', '2024-06-01 14:43:15'),
(2, 'bbjkbkjbj', 'bkbkjbjk', '2024-06-01 14:43:24', '2024-06-01 14:43:30', '2024-06-01 14:43:30'),
(3, 'nmn mn m', 'nm nm n', '2024-06-01 14:43:39', '2024-06-01 14:43:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_items`
--

CREATE TABLE `project_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `details_ar` text DEFAULT NULL,
  `details_en` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_items`
--

INSERT INTO `project_items` (`id`, `name_ar`, `name_en`, `details_ar`, `details_en`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aaaa', 'product', 'vdfdvvvffv', 'vdvfvdfvffv', '1717256650.jpg', '2024-06-01 14:44:10', '2024-06-01 14:44:18', '2024-06-01 14:44:18'),
(2, 'wwww', 'fvvfdddddddddd', 'dfffffffffffffffff', 'vddddddddddddddd', '1717256676.jpg', '2024-06-01 14:44:36', '2024-06-01 14:44:36', NULL),
(3, 'fvvvvvvvvvvvvv', 'vfffffffffffff', 'dvvvvvvvvvvvvvf', 'ddddddddddddf', '1717256697.jpg', '2024-06-01 14:44:57', '2024-06-01 14:45:03', '2024-06-01 14:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-05-28 17:40:28', '2024-05-28 17:40:28'),
(2, 'employee', 'web', '2024-05-28 19:42:35', '2024-05-28 19:42:35');

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
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_details`
--

CREATE TABLE `service_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details_ar` text DEFAULT NULL,
  `details_en` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_details`
--

INSERT INTO `service_details` (`id`, `details_ar`, `details_en`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '111111111111', '1111111111111111111', '2024-05-29 22:45:09', '2024-05-29 22:45:25', '2024-05-29 22:45:25'),
(2, 'eqwwwwwwwww', 'qewwwwwwwww', '2024-05-29 22:45:30', '2024-05-29 22:45:34', '2024-05-29 22:45:34'),
(3, 'qweeeeeee', 'qewwwwwwwwwwwww', '2024-05-29 22:45:41', '2024-05-29 22:45:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

CREATE TABLE `service_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `details_ar` text DEFAULT NULL,
  `details_en` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_items`
--

INSERT INTO `service_items` (`id`, `name_ar`, `name_en`, `details_ar`, `details_en`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aaaa', 'product', 'bkjbkjbkjb', 'hhjvjhvj', '1717254053.jpg', '2024-06-01 14:00:53', '2024-06-01 14:00:53', NULL),
(2, 'aaaakn', 'productknk', 'bkjbkjbkjb', 'hhjvjhvj', '1717254122.jpg', '2024-06-01 14:02:02', '2024-06-01 14:05:18', '2024-06-01 14:05:18'),
(3, 'ccccc', 'ccccccccc', 'ccccccccccc', 'ccccccccc', '1717254272.jpg', '2024-06-01 14:04:04', '2024-06-01 14:05:10', '2024-06-01 14:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `details_ar` text DEFAULT NULL,
  `details_en` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name_ar`, `name_en`, `details_ar`, `details_en`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'الباقة الذهبيةسيشسيشسشي', 'productسيشسيشسيش', 'gvhvghسيشسيشسشي', 'yuguygyuسيشسشيسشي', '1716934931.jpg', '2024-05-28 21:12:46', '2024-05-28 21:22:17', '2024-05-28 21:22:17'),
(2, 'uhiuh', 'yguyg', 'yguygyu', 'ygyufguy', '1716934415.jpg', '2024-05-28 21:13:35', '2024-05-28 21:13:35', NULL),
(3, 'سيشسيسيش', 'سشيسيشسيش', 'سيشسشيسيش', 'سيشسشيسيشسيش', '1716934785.jpg', '2024-05-28 21:19:45', '2024-05-28 21:26:05', '2024-05-28 21:26:05'),
(4, 'asasdddas', 'concept', 'فرفغرفغ', 'لرالرلارلا', '1717015200.jpg', '2024-05-29 19:40:00', '2024-05-29 19:40:00', NULL),
(5, 'wwww', 'test product', 'tfctcrtc', 'v ytvtyvt7', '1717530447.jpg', '2024-06-04 18:47:27', '2024-06-04 18:47:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider_footers`
--

CREATE TABLE `slider_footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `details_ar` text DEFAULT NULL,
  `details_en` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_footers`
--

INSERT INTO `slider_footers` (`id`, `name_ar`, `name_en`, `details_ar`, `details_en`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aaaa', 'product', 'vdsvssdv', 'dsvsvdvsdsdv', '1717012078.jpg', '2024-05-29 18:47:58', '2024-05-29 18:47:58', NULL),
(2, 'الباقة الذهبية2222222222', 'test product', 'dsvvcdsv', 'dvsvsd', '1717012097.jpg', '2024-05-29 18:48:17', '2024-05-29 18:49:48', '2024-05-29 18:49:48'),
(3, 'Jemima Sexton', 'Ursa Prince', 'Laboris dolore est e', 'Id in voluptates max', '1717012202.jpg', '2024-05-29 18:50:02', '2024-05-29 18:50:08', '2024-05-29 18:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `roles_name` text NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `mobile`, `password`, `photo`, `roles_name`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Nabil', 'ahmednassag@gmail.com', NULL, '01016856433', '$2y$10$5ruBfcdU0uHlQGUZkSYYcuJTcb4HwBVJrGsqB5cupixboSv2PjY9y', 'avatar.jpg', '[\"Admin\"]', 1, NULL, '2024-05-28 17:40:27', '2024-05-28 17:40:27'),
(2, 'sdasdasdasda', 'bisco@email.com', NULL, '01141090116', '$2y$10$LY8TCgaN5094Nig9ZJ37h.lq6lI8/6hEf/dl29BQnh8NZlcdxLi6W', NULL, '[\"Admin\"]', 1, NULL, '2024-05-28 19:41:01', '2024-05-28 19:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `who_we_are_contents`
--

CREATE TABLE `who_we_are_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `who_we_are_details`
--

CREATE TABLE `who_we_are_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details_ar` text DEFAULT NULL,
  `details_en` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `who_we_are_details`
--

INSERT INTO `who_we_are_details` (`id`, `details_ar`, `details_en`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dasddadsdssaddddddd', 'sdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasda', '2024-05-29 20:15:41', '2024-05-29 20:15:59', '2024-05-29 20:15:59'),
(2, 'sadddddddd', 'asdddddddddddddddddd', '2024-05-29 20:16:05', '2024-05-29 20:16:10', '2024-05-29 20:16:10'),
(3, 'sdaaaaaaaaaaa', 'sadddddddddddddddddddddddddd', '2024-05-29 20:16:17', '2024-05-29 20:16:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `who_we_are_faqs`
--

CREATE TABLE `who_we_are_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `details_ar` text DEFAULT NULL,
  `details_en` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `who_we_are_faqs`
--

INSERT INTO `who_we_are_faqs` (`id`, `name_ar`, `name_en`, `details_ar`, `details_en`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'السؤال باللغة العربية 1', 'السؤال باللغة الإنجليزية 1', 'الإجابة باللغة العربية 1', 'الإجابة باللغة الإنجليزية 1', '2024-05-29 21:50:13', '2024-05-29 21:51:12', NULL),
(2, 'السؤال باللغة العربية 2', 'السؤال باللغة الإنجليزية 2', 'الإجابة باللغة العربية 2', 'الإجابة باللغة الإنجليزية 2', '2024-05-29 21:51:37', '2024-05-29 21:52:14', '2024-05-29 21:52:14'),
(3, 'السؤال باللغة العربية 3', 'السؤال باللغة الإنجليزية 3', 'الإجابة باللغة العربية 3', 'الإجابة باللغة الإنجليزية 3', '2024-05-29 21:52:03', '2024-05-29 21:52:09', '2024-05-29 21:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `who_we_are_sides`
--

CREATE TABLE `who_we_are_sides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `details_ar` text DEFAULT NULL,
  `details_en` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `who_we_are_sides`
--

INSERT INTO `who_we_are_sides` (`id`, `name_ar`, `name_en`, `details_ar`, `details_en`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aaaa', 'product', 'لغرلا', 'لرلار', '1717015028.jpg', '2024-05-29 19:37:08', '2024-05-29 19:37:08', NULL),
(2, 'الباقة الذهبيةلرلار', 'Golden Package', 'رلرع', 'لاراعرتا', '1717015084.jpg', '2024-05-29 19:38:04', '2024-05-29 19:38:21', NULL),
(3, 'asasdddas', 'test product', 'لااتلاتالا', 'رلارالرلا', '1717015275.jpg', '2024-05-29 19:41:15', '2024-05-29 19:45:05', '2024-05-29 19:45:05'),
(4, 'asasdddasتا لاتا', 'test productتا لاتن', 'لااتلاتالا', 'رلارالرلا', '1717015290.jpg', '2024-05-29 19:41:30', '2024-05-29 19:45:06', '2024-05-29 19:45:06'),
(5, 'لارارلا7777', 'الرلرلار', 'تالارتالارتار', 'تالارتارتار', '1717015476.jpg', '2024-05-29 19:44:36', '2024-05-29 19:44:56', '2024-05-29 19:44:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_informations`
--
ALTER TABLE `company_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_items`
--
ALTER TABLE `course_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `parteners`
--
ALTER TABLE `parteners`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_items`
--
ALTER TABLE `project_items`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `service_details`
--
ALTER TABLE `service_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_footers`
--
ALTER TABLE `slider_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `who_we_are_contents`
--
ALTER TABLE `who_we_are_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `who_we_are_details`
--
ALTER TABLE `who_we_are_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `who_we_are_faqs`
--
ALTER TABLE `who_we_are_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `who_we_are_sides`
--
ALTER TABLE `who_we_are_sides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_informations`
--
ALTER TABLE `company_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_items`
--
ALTER TABLE `course_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `parteners`
--
ALTER TABLE `parteners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_items`
--
ALTER TABLE `project_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_details`
--
ALTER TABLE `service_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider_footers`
--
ALTER TABLE `slider_footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `who_we_are_contents`
--
ALTER TABLE `who_we_are_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `who_we_are_details`
--
ALTER TABLE `who_we_are_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `who_we_are_faqs`
--
ALTER TABLE `who_we_are_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `who_we_are_sides`
--
ALTER TABLE `who_we_are_sides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
