-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2017 at 11:18 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wesal`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(12, 4, 'KFDHpHpb2vdinWJeE3dFYoeh6Exkk4QQ', 1, '2017-05-12 18:05:03', '2017-05-12 18:05:03', '2017-05-12 18:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الألبوم الأول 1', NULL, '2017-06-05 19:07:33'),
(4, 'الألبوم الثالث معدل', '2017-05-06 18:49:48', '2017-05-06 18:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'تصنيف أول', NULL, NULL),
(2, 'تصنيف ثاني', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MainCodetb_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `albums_Id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `albums_Id`, `created_at`, `updated_at`, `filename`, `original_name`) VALUES
(685, 'الهروب الماكر', 1, '2017-06-02 09:48:44', '2017-06-02 09:48:44', '24background---copy-377d5.jpg', '24background - Copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `maincodetb`
--

CREATE TABLE `maincodetb` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maincodetb`
--

INSERT INTO `maincodetb` (`id`, `name_ar`, `name_en`, `active`, `created_at`, `updated_at`) VALUES
(1, 'رئيسي', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_04_28_002718_create_Albumes_table', 1),
(2, '2017_05_01_144425_create_Images_table', 2),
(3, '2014_07_02_230147_migration_cartalyst_sentinel', 3),
(4, '2017_06_08_202404_create_settings_table', 4),
(10, '2017_06_09_082759_create_news_table', 7),
(8, '2017_06_10_080116_create_categories_table', 6),
(11, '2017_06_12_201533_create_staticPages_table', 8),
(14, '2017_06_12_215856_create_Codes_table', 10),
(13, '2017_06_12_220020_create_MainCodetb_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `navs`
--

CREATE TABLE `navs` (
  `id` int(11) NOT NULL COMMENT 'الرقم التسلسي',
  `name` varchar(500) COLLATE utf16_unicode_ci DEFAULT NULL COMMENT 'اسم الصفحة في المنيو',
  `page_view` varchar(1000) COLLATE utf16_unicode_ci DEFAULT NULL COMMENT 'رابط الصفحة',
  `page_rout` varchar(400) COLLATE utf16_unicode_ci DEFAULT NULL,
  `order_num` int(11) NOT NULL DEFAULT '0' COMMENT 'الترتيب',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'رقم صفحة الأب',
  `show_flag` int(1) NOT NULL DEFAULT '1' COMMENT 'يظهر بالصفحة',
  `icon` varchar(500) COLLATE utf16_unicode_ci DEFAULT NULL COMMENT 'ايقونة المنيو',
  `has_children` int(1) NOT NULL DEFAULT '0' COMMENT 'له أبناء',
  `is_deleted` int(1) NOT NULL DEFAULT '0' COMMENT 'السجل محذوف'
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `navs`
--

INSERT INTO `navs` (`id`, `name`, `page_view`, `page_rout`, `order_num`, `parent_id`, `show_flag`, `icon`, `has_children`, `is_deleted`) VALUES
(1, 'الصور', '#', NULL, 2, 0, 1, 'fa fa-picture-o', 1, 0),
(2, 'الرئيسية', 'WELCOME', 'admin', 1, 0, 1, 'icon-home', 0, 0),
(4, 'إدارة الألبومات', 'ALBUMS', 'admin/album', 3, 1, 1, NULL, 0, 0),
(5, 'إدارة الصور', 'Images', 'admin/image', 4, 1, 1, NULL, 0, 0),
(6, 'بيانات الصور', 'ADDEDITALBUM', 'album/crate', 3, 1, 0, NULL, 0, 0),
(7, 'رفع الصور', 'ImageMultiUpload', 'image/create', 0, 1, 0, NULL, 0, 0),
(8, 'المستخدمين', NULL, NULL, 3, 0, 1, 'fa fa-user-o', 1, 0),
(9, 'اضافة مستخدم', 'AddEditUser', 'register/create', 0, 8, 0, NULL, 0, 0),
(10, 'إدارة المستخدمين', 'Register', 'register', 0, 8, 1, NULL, 0, 0),
(11, 'إرسال بريد إلكتروني', 'SendMail', 'user/SendMail', 0, 8, 1, NULL, 0, 0),
(12, 'الإعدادت', NULL, NULL, 99, 0, 1, 'fa fa-cog', 0, 0),
(15, 'المقالات', 'News', 'admin/myNews', 4, 0, 1, 'fa fa-rss', 1, 0),
(14, 'إعدادت الموقع', 'setting', 'admin/setting', 1, 12, 1, NULL, 0, 0),
(16, 'بيانات المقال', 'AddEditNews', 'admin/myNews/create', 0, 15, 0, NULL, 0, 0),
(17, 'الصفحات الثابتة\r\n', 'StaticPage', 'admin/staticPage', 5, 12, 1, NULL, 0, 0),
(18, 'بيانات الصفحة الثابتة', 'AddEditStaticPage', 'admin/staticPage/create', 1, 12, 0, NULL, 0, 0),
(19, 'أكواد النظام', 'Code', 'admin/code', 6, 12, 1, NULL, 0, 0),
(20, 'بيانات الأكواد', 'AddEditeCode', 'admin/code/create', 0, 12, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `main` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `summary`, `tags`, `details`, `image`, `categorie_id`, `active`, `main`, `created_at`, `updated_at`) VALUES
(5, 'العنوان الرئيسي عربي', 'الملخص  الملخص  الملخص  الملخص  الملخص', 'ds,es', '<p>zsdcd</p>', '1334656616314650971745862257157343266563915n.jpg', 2, 1, 1, '2017-06-10 19:25:48', '2017-06-12 17:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 4, 'FAahffmnrL3U3CdZ021ugbGbzkQEWoFV', '2017-05-13 05:21:24', '2017-05-13 05:21:24'),
(2, 4, 'hASQuFKmBM6smUrn7T397jGLNmcnbnAO', '2017-05-13 05:34:58', '2017-05-13 05:34:58'),
(3, 4, 'aOSg6npybtTgxt1pvRE4UtopsVubmTg3', '2017-06-02 05:52:27', '2017-06-02 05:52:27'),
(4, 4, '2m4MskpRYM6wRBJgtInsTxFf4P6uRRNR', '2017-06-02 06:00:31', '2017-06-02 06:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(4, 4, 'CRXdypE4hkEld1rqxseY4kWFpGwb0z6X', 1, '2017-06-02 06:00:24', '2017-06-02 05:59:14', '2017-06-02 06:00:24'),
(5, 4, 'pm0bwL4TJNHG1ED6zekzBQ8XrHA8CS8z', 1, '2017-06-02 06:01:35', '2017-06-02 06:01:01', '2017-06-02 06:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL),
(2, 'manger', 'manger', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL),
(4, 2, '2017-05-12 14:22:42', '2017-05-12 14:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `webSite_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `webSite_name`) VALUES
(2, 'موقع وصال');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `Longtude` double(8,2) NOT NULL,
  `Latitude` double(8,2) NOT NULL,
  `title_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title_ar`, `title_en`, `about_ar`, `about_en`, `facebook`, `twitter`, `youtube`, `email`, `fax`, `tel`, `mobile`, `Longtude`, `Latitude`, `title_place`, `maintenance`, `created_at`, `updated_at`) VALUES
(3, 'موقع وصال', 'ad', 'ad', 'ad', 'ad', 'awd', 'ad', 'ad', 'ad', 5, 5, 51.00, 561.00, 'dw', 0, NULL, '2017-06-10 18:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `staticpages`
--

CREATE TABLE `staticpages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2017-05-13 05:16:39', '2017-05-13 05:16:39'),
(2, NULL, 'ip', '127.0.0.1', '2017-05-13 05:16:39', '2017-05-13 05:16:39'),
(3, NULL, 'global', NULL, '2017-05-13 05:16:55', '2017-05-13 05:16:55'),
(4, NULL, 'ip', '127.0.0.1', '2017-05-13 05:16:55', '2017-05-13 05:16:55'),
(5, NULL, 'global', NULL, '2017-05-13 05:17:04', '2017-05-13 05:17:04'),
(6, NULL, 'ip', '127.0.0.1', '2017-05-13 05:17:04', '2017-05-13 05:17:04'),
(7, NULL, 'global', NULL, '2017-05-13 05:17:13', '2017-05-13 05:17:13'),
(8, NULL, 'ip', '127.0.0.1', '2017-05-13 05:17:13', '2017-05-13 05:17:13'),
(9, NULL, 'global', NULL, '2017-05-13 05:25:18', '2017-05-13 05:25:18'),
(10, NULL, 'ip', '127.0.0.1', '2017-05-13 05:25:18', '2017-05-13 05:25:18'),
(11, NULL, 'global', NULL, '2017-05-13 05:30:15', '2017-05-13 05:30:15'),
(12, NULL, 'ip', '127.0.0.1', '2017-05-13 05:30:15', '2017-05-13 05:30:15'),
(13, 2, 'user', NULL, '2017-05-13 05:30:15', '2017-05-13 05:30:15'),
(14, NULL, 'global', NULL, '2017-05-13 05:32:58', '2017-05-13 05:32:58'),
(15, NULL, 'ip', '127.0.0.1', '2017-05-13 05:32:58', '2017-05-13 05:32:58'),
(16, NULL, 'global', NULL, '2017-05-13 05:33:20', '2017-05-13 05:33:20'),
(17, NULL, 'ip', '127.0.0.1', '2017-05-13 05:33:20', '2017-05-13 05:33:20'),
(18, NULL, 'global', NULL, '2017-06-02 05:10:48', '2017-06-02 05:10:48'),
(19, NULL, 'ip', '127.0.0.1', '2017-06-02 05:10:48', '2017-06-02 05:10:48'),
(20, NULL, 'global', NULL, '2017-06-02 05:10:57', '2017-06-02 05:10:57'),
(21, NULL, 'ip', '127.0.0.1', '2017-06-02 05:10:57', '2017-06-02 05:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reagion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `reagion`, `created_at`, `updated_at`) VALUES
(4, 'moutaz_90@outlook.com', '$2y$10$dMTXCCZJkgtnM308znaLaeZORyn5c572j5.CJ17rlDahqKyGXyRwq', NULL, '2017-06-02 06:00:31', 'moutaz2', 'moutaz2', '0', '2017-05-12 12:10:19', '2017-06-02 06:01:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codes_maincodetb_id_foreign` (`MainCodetb_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maincodetb`
--
ALTER TABLE `maincodetb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navs`
--
ALTER TABLE `navs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_categorie_id_foreign` (`categorie_id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staticpages`
--
ALTER TABLE `staticpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

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
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=686;
--
-- AUTO_INCREMENT for table `maincodetb`
--
ALTER TABLE `maincodetb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `navs`
--
ALTER TABLE `navs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'الرقم التسلسي', AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `staticpages`
--
ALTER TABLE `staticpages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
