-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2018 at 02:51 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `date`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2018_03_23_211652_create_posts_table', 2),
(8, '2018_04_01_095941_add_user_id_to_posts', 3),
(9, '2018_04_02_095650_add_posts_cover_image_', 4),
(10, '2018_04_04_150737_create_table_rooms', 5),
(12, '2018_04_07_145744_add_user_admin_field', 6),
(13, '2018_04_08_030115_add_userid1_to_room', 7),
(14, '2018_04_08_132205_add_room_user2_id', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('b.jani93@yahoo.com', '$2y$10$P8iBYLmYwONGHiBFj3kMoux9aJ8WUfa79GfRkd2nUMXZYoJtl7PpK', '2018-04-01 01:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`) VALUES
(21, 'Post without img', '<p>no img</p> gg', '2018-04-02 06:00:27', '2018-04-17 08:34:15', 2, 'noimage.jpg'),
(20, 'Agosha 123', '<p>Aigerim hhh</p>', '2018-04-02 04:40:01', '2018-04-17 08:42:29', 2, 'Desert_1522672801.jpg'),
(24, 'First post', '<p>post 1</p>\r\n\r\n<p>&nbsp;</p>', '2018-04-17 09:17:44', '2018-04-17 09:17:44', 2, 'noimage.jpg'),
(26, 'Post 2', '<p>Post 2</p>', '2018-04-18 19:31:05', '2018-04-18 19:31:05', 1, 'noimage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `place`, `fee`, `created_at`, `updated_at`, `user1_id`, `user2_id`) VALUES
(9, 'Shangrilla', 5000, '2018-04-08 04:17:29', '2018-04-08 06:21:16', 3, 2),
(10, 'Restaurant', 20000, '2018-04-08 08:08:00', '2018-04-13 01:56:17', 1, 2),
(11, 'Room 3', 500000, '2018-04-08 08:08:54', '2018-04-25 08:14:58', 2, 0),
(12, 'Room 4', 9800, '2018-04-08 08:09:07', '2018-04-25 08:16:58', 2, 0),
(14, 'Shangrilla 2', 400000, '2018-04-25 04:31:08', '2018-04-25 04:33:32', 1, 2),
(15, 'Ub Zoog', 25000, '2018-04-25 08:46:35', '2018-04-25 08:48:43', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `admin_role`) VALUES
(1, 'Jani', 'b.jani93@yahoo.com', '$2y$10$eOZheQlQ8Nvo.9CzcHZ74OXl3HEA4/ePMp.hnJT5aoV9wPCeNBWku', 'QeqGV4cfaE32aG31OM4wxoVLcG7YWXwJBO5CQG4vhrLRAe5hfeZbnBdck44A', '2018-03-31 23:27:07', '2018-03-31 23:27:07', 'admin'),
(2, 'Fatikha', 'b.jani94@yahoo.com', '$2y$10$qi2KasHbg0n/FcaV6Hjdvud0Bk3D2B9WO.PdBg0mjaes9qQEosBaa', 'mYksa93qrpFsUEwqZgJd0IZCGPOc6btEma9ftCvsToeVDww5ReidVlUte1pC', '2018-04-01 18:33:51', '2018-04-01 18:33:51', ''),
(3, 'agosh', 'baavga@yahoo.com', '$2y$10$NbKDOFUrbsnVaBoc.I.g1.g27ZMJMMPFrT8ZuA0RLJtZe5.Gd71Km', 'qRl6L24Ah5LcI4dkYTHwYqmOUlTp6t6NoUZ8bS6MedyAW8aHFZ91Pu3M3NrJ', '2018-04-08 05:53:45', '2018-04-08 05:53:45', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
