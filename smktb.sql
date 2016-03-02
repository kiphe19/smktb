-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2016 at 12:40 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smktb`
--
CREATE DATABASE IF NOT EXISTS `smktb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `smktb`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `change_pos`(IN `id_content` INT(11), IN `pos` INT(11), IN `type` ENUM('up','down') CHARSET utf8, IN `id_box` INT(11), IN `content_type` INT(1))
if type = 'up' then
	set @pa = pos - 1;

	update `content` set `position` = case
	when
    	`position` = @pa then pos
	when
		`id_content` = id_content then @pa
	else `position` end
	where `id_box` = id_box and `type` = content_type;
    
else
	
    set @pa = pos + 1;
    update `content` set `position` = case
	when
    	`position` = @pa then pos
	when
		`id_content` = id_content then @pa
	else `position` end
	where `id_box` = id_box and `type` = content_type;
    
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chps`(IN `id_content` INT, IN `pos` INT, IN `type` ENUM('up','down'), IN `id_box` INT, IN `content_type` ENUM('1','2','3'))
BEGIN

declare poss INT;

if `type` = "up" then
	set poss = pos - 1;

else 
	set poss = pos + 1;
    
end if;


	UPDATE `content` 
SET 
    `position` = CASE
        WHEN `position` = poss THEN pos
        WHEN `id_content` = id_content THEN poss
        ELSE `position`
    END
WHERE
    `id_box` = id_box
    
    AND `type` = "'"+content_type+"'";


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
`id_content` int(11) NOT NULL,
  `id_box` int(11) NOT NULL,
  `type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT '1',
  `uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id_content`, `id_box`, `type`, `title`, `content`, `position`, `uploaded`, `status`) VALUES
(25, 1, '1', '', '11958858_947643425276827_1368693301_n.mp4', 2, '2016-03-02 05:49:02', '0'),
(26, 1, '1', '', 'oploverz_-_731_mp4_360p.mp4', 1, '2016-03-02 05:49:02', '0'),
(27, 1, '3', 'Testing', '<span style="font-weight: bold;">jdasdhsadhsahda</span><p><br></p>', 1, '2016-03-02 05:48:42', '1');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE IF NOT EXISTS `main` (
  `id_box` int(11) NOT NULL,
  `type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`id_box`, `type`) VALUES
(1, '1'),
(2, '3'),
(3, '3'),
(4, '3');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id_content`), ADD KEY `id_box` (`id_box`);

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
MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
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
