-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2016 at 03:52 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smktb`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--
-- Creation: Feb 23, 2016 at 03:22 PM
--

CREATE TABLE `content` (
  `id_content` int(11) NOT NULL,
  `id_box` int(11) NOT NULL,
  `type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `content`:
--   `id_box`
--       `main` -> `id_box`
--

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id_content`, `id_box`, `type`, `title`, `content`, `uploaded`, `status`) VALUES
(1, 1, '1', '', 'box1-1.mp4', '2016-02-23 15:24:14', '1'),
(2, 1, '2', '', 'box1-1.jpg', '2016-02-23 15:24:22', '1'),
(3, 1, '3', 'box1.1', 'blablabla doang box1', '2016-02-23 15:23:17', '1'),
(4, 2, '1', '', 'box2-1.mp4', '2016-02-23 15:24:29', '1'),
(5, 2, '2', '', 'box2-1.jpg', '2016-02-23 15:24:38', '1'),
(6, 2, '3', 'box2.1', 'blablabla box2', '2016-02-23 15:23:28', '1'),
(7, 3, '1', '', 'box3-1.mp4', '2016-02-23 15:24:43', '1'),
(8, 3, '2', '', 'box3-1.jpg', '2016-02-23 15:24:49', '1'),
(9, 3, '3', 'box3.1', 'blablabla doang box3', '2016-02-23 15:23:34', '1'),
(10, 4, '1', '', 'box4-1.mp4', '2016-02-23 15:25:03', '1'),
(11, 1, '1', '', 'box1-2.mp4', '2016-02-23 15:25:09', '1'),
(12, 1, '2', '', 'box1-2.jpg', '2016-02-23 15:25:12', '1'),
(13, 1, '3', 'box1.2', 'blablabla doang box1', '2016-02-23 15:23:42', '1'),
(14, 2, '1', '', 'box2-2.mp4', '2016-02-23 15:25:16', '1'),
(15, 2, '2', '', 'box2-2.jpg', '2016-02-23 15:25:19', '1'),
(16, 2, '3', 'box2.2', 'blablabla box2', '2016-02-23 15:23:51', '1'),
(17, 3, '1', '', 'box3-2.mp4', '2016-02-23 15:25:27', '1'),
(18, 3, '2', '', 'box3-2.jpg', '2016-02-23 15:25:32', '1'),
(19, 3, '3', 'box3.2', 'blablabla doang box3', '2016-02-23 15:23:59', '1'),
(20, 4, '1', '', 'box4-2.mp4', '2016-02-23 15:25:41', '1');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--
-- Creation: Feb 23, 2016 at 08:49 AM
--

CREATE TABLE `main` (
  `id_box` int(11) NOT NULL,
  `type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `main`:
--

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`id_box`, `type`) VALUES
(1, '1'),
(2, '3'),
(3, '3'),
(4, '2');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--
-- Creation: Feb 20, 2016 at 02:16 PM
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `news`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`),
  ADD KEY `id_box` (`id_box`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id_box`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`id_box`) REFERENCES `main` (`id_box`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
