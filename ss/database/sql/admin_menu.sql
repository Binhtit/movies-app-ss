-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 07:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_app_ss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', 'fa-bar-chart', '/', NULL, NULL, NULL),
(2, 0, 8, 'Admin', 'fa-tasks', '', NULL, NULL, '2021-07-19 10:08:54'),
(3, 2, 9, 'Users', 'fa-users', 'auth/users', NULL, NULL, '2021-07-19 10:08:54'),
(4, 2, 10, 'Roles', 'fa-user', 'auth/roles', NULL, NULL, '2021-07-19 10:08:54'),
(5, 2, 11, 'Permission', 'fa-ban', 'auth/permissions', NULL, NULL, '2021-07-19 10:08:54'),
(6, 2, 12, 'Menu', 'fa-bars', 'auth/menu', NULL, NULL, '2021-07-19 10:08:54'),
(7, 2, 13, 'Operation log', 'fa-history', 'auth/logs', NULL, NULL, '2021-07-19 10:08:54'),
(8, 0, 4, 'Film Category', 'fa-film', 'film-categories', '*', '2021-07-18 21:31:44', '2021-07-19 10:17:54'),
(9, 0, 3, 'Film', 'fa-play', 'films', '*', '2021-07-19 00:57:26', '2021-07-19 10:17:29'),
(10, 0, 2, 'Episode', 'fa-play-circle-o', 'episodes', '*', '2021-07-19 01:09:52', '2021-07-19 10:17:05'),
(11, 0, 6, 'Country', 'fa-flag', 'countries', '*', '2021-07-19 01:21:11', '2021-07-19 10:18:46'),
(12, 0, 7, 'Ad', 'fa-tv', 'ads', '*', '2021-07-19 01:21:43', '2021-07-19 10:20:17'),
(13, 0, 5, 'Type', 'fa-file-movie-o', 'types', '*', '2021-07-19 01:29:50', '2021-07-19 10:16:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
