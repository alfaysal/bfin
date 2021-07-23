-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 23, 2021 at 05:57 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bfin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_super` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super@gmail.com', '$2y$10$LQd2zrWl2WqAzts02OFti.JZGbzSLMgQkOgk5LqAFTr9Ymm.C//ra', 0, NULL, NULL),
(2, 'Admin', 'admin@gmail.com', '$2y$10$TgqXLdlL9yI8AksWhPgy0eZve1Mx8Wn5oge9YCvxnposoA3BkynsG', 0, '2021-07-23 11:54:06', '2021-07-23 11:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `section_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `caption` text COLLATE utf8_unicode_ci NOT NULL,
  `is_blocked` tinyint(4) NOT NULL DEFAULT '0',
  `is_published` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blogs_section_id_foreign` (`section_id`),
  KEY `blogs_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `section_id`, `user_id`, `title`, `body`, `image`, `caption`, `is_blocked`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '00s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but', 'nia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very po', 'front-end/stories-image/1627062926Screenshot (52).png', 'This is caption', 0, 0, '2021-07-23 11:55:26', '2021-07-23 11:55:26'),
(2, 2, 1, 'e many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or rando', 'tor on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore alw', 'front-end/stories-image/1627062957Screenshot (55).png', 'three caption', 0, 0, '2021-07-23 11:55:57', '2021-07-23 11:55:57'),
(3, 1, 2, 'glish. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', 'of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32', 'front-end/stories-image/1627063032report.PNG', 'This is caption two', 0, 0, '2021-07-23 11:57:12', '2021-07-23 11:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

DROP TABLE IF EXISTS `blog_tags`;
CREATE TABLE IF NOT EXISTS `blog_tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_tags_blog_id_foreign` (`blog_id`),
  KEY `blog_tags_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-07-23 11:55:26', '2021-07-23 11:55:26'),
(2, 1, 3, '2021-07-23 11:55:26', '2021-07-23 11:55:26'),
(3, 2, 1, '2021-07-23 11:55:57', '2021-07-23 11:55:57'),
(4, 2, 2, '2021-07-23 11:55:57', '2021-07-23 11:55:57'),
(5, 3, 2, '2021-07-23 11:57:12', '2021-07-23 11:57:12'),
(6, 3, 4, '2021-07-23 11:57:12', '2021-07-23 11:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_blog_id_foreign` (`blog_id`),
  KEY `comments_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

DROP TABLE IF EXISTS `comment_replies`;
CREATE TABLE IF NOT EXISTS `comment_replies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reply` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_replies_comment_id_foreign` (`comment_id`),
  KEY `comment_replies_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_19_161546_create_sections_table', 1),
(5, '2021_07_19_172256_create_admins_table', 1),
(6, '2021_07_20_153452_create_blogs_table', 1),
(7, '2021_07_22_035326_create_tags_table', 1),
(8, '2021_07_22_115825_create_blog_tags_table', 1),
(9, '2021_07_22_162757_create_comments_table', 1),
(10, '2021_07_22_163007_create_comment_replies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Section One', '2021-07-23 11:52:08', '2021-07-23 11:52:08'),
(2, 'Section Two', '2021-07-23 11:52:15', '2021-07-23 11:52:15'),
(3, 'Section Three', '2021-07-23 11:52:23', '2021-07-23 11:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Travel', '2021-07-23 11:48:30', '2021-07-23 11:48:30'),
(2, 'Biography', '2021-07-23 11:48:38', '2021-07-23 11:48:38'),
(3, 'Food', '2021-07-23 11:48:47', '2021-07-23 11:48:47'),
(4, 'Study', '2021-07-23 11:48:54', '2021-07-23 11:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `d_o_b` date NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_blocked` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `d_o_b`, `phone`, `gender`, `image`, `email_verified_at`, `password`, `is_blocked`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AL Faysal', 'alfaysal7752@gmail.com', '2021-07-23', '0174900926', 'male', 'front-end/user-image/1627062496gettyimages-867533698-2048x2048.jpg', NULL, '$2y$10$LQd2zrWl2WqAzts02OFti.JZGbzSLMgQkOgk5LqAFTr9Ymm.C//ra', 0, NULL, '2021-07-23 11:48:16', '2021-07-23 11:48:16'),
(2, 'abu hasan', 'hasanakash0215@gmail.com', '2021-07-23', '0174900926', 'male', 'front-end/user-image/1627063001report.PNG', NULL, '$2y$10$3qKMwy1NMr.1mSVG5jYHL.XpUy09RBPDhKrtmA0dEVsQEG7DtZB9.', 0, NULL, '2021-07-23 11:56:41', '2021-07-23 11:56:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
