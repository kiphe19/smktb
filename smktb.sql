-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2016 at 05:09 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smktb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `change_pos` (IN `id_content` INT(11), IN `pos` INT(11), IN `type` ENUM('up','down') CHARSET utf8, IN `id_box` INT(11), IN `content_type` INT(1))  if type = 'up' then
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `chng_pos` (IN `id_c` INT, IN `id_b` INT, IN `cont_type` ENUM('1','2','3'), IN `pos` INT, IN `pos_type` CHAR(5))  NO SQL
BEGIN
	DECLARE new_pos INT;
    
    IF pos_type = 'up' THEN  
    SET new_pos = pos - 1;
    ELSE SET new_pos = pos + 1;
    END IF;
    
    UPDATE content SET position = new_pos
    	WHERE id_content = id_c;
    UPDATE content SET position = pos
    	WHERE id_box = id_b
    	AND type = cont_type
    	AND position = new_pos
        AND id_content != id_c;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chps` (IN `id_content` INT, IN `pos` INT, IN `type` ENUM('up','down'), IN `id_box` INT, IN `content_type` ENUM('1','2','3'))  BEGIN

declare poss INT;

if `type` = "up" then
	set poss = pos + 1;

else 
	set poss = pos - 1;
    
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_pos` (IN `id_c` INT, `id_b` INT, `cont_type` ENUM('1','2','3'), `pos` INT)  BEGIN
	DECLARE new_pos INT;
    SET new_pos = pos - 1;
    UPDATE content SET position = new_pos WHERE id_content = id_c;
    UPDATE content SET position = pos WHERE id_box = id_b AND `type` = cont_type AND `position` = new_pos;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id_content` int(11) NOT NULL,
  `id_box` int(11) NOT NULL,
  `type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT '1',
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

INSERT INTO `content` (`id_content`, `id_box`, `type`, `title`, `content`, `position`, `uploaded`, `status`) VALUES
(35, 3, '3', '1', '<p>11111234<br></p>', 1, '2016-03-23 14:12:17', '1'),
(37, 3, '3', '3', '<p>333345<br></p>', 2, '2016-03-23 14:12:17', '1'),
(72, 1, '1', '', 'C_Tutorial_54-_How_to_Make_a_Simple_HTML_Editor.mp4', 1, '2016-03-23 15:33:23', '0'),
(75, 1, '1', '', 'C_Tutorial_54-_How_to_Make_a_Simple_HTML_Editor1.mp4', 2, '2016-03-23 15:33:23', '0'),
(80, 3, '2', '', 'Desert2.jpg', 1, '2016-03-23 16:20:53', '0'),
(81, 3, '2', '', 'Jellyfish11.jpg', 3, '2016-03-23 16:20:54', '0'),
(82, 3, '2', '', 'Desert11.jpg', 2, '2016-03-23 16:20:54', '0'),
(87, 4, '3', 'PT. Daun Biru', '<h3><span style="font-family: "open sans","Helvetica Neue",Helvetica,Arial,sans-serif;">Daftar Kerja Sama Perusahaan</span></h3><h1 style=" text-align: center;"><span style="font-family: "open sans","Helvetica Neue",Helvetica,Arial,sans-serif;">PT. Daun Biru Engineering</span></h1><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br></p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p><p><br></p>', 1, '2016-03-23 16:33:08', '1'),
(88, 4, '3', 'PT. Reliefe', '<h3><span style="font-family: " open="" sans","helvetica="" neue",helvetica,arial,sans-serif;"="">Daftar Kerja Sama Perusahaan</span></h3><h1 style="text-align: center;"><span style="font-family: " open="" sans","helvetica="" neue",helvetica,arial,sans-serif;"="">PT. Reliefe Property <br></span></h1><p style="text-align: justify;"><span style="font-family: " open="" sans","helvetica="" neue",helvetica,arial,sans-serif;"=""></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, \nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo \nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit \nesse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat \ncupidatat non proident, sunt in culpa qui officia deserunt mollit anim \nid est laborum.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \nveniam, \nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo \nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit \nesse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat \ncupidatat non proident, sunt in culpa qui officia deserunt mollit anim \nid est laborum.</p>', 3, '2016-03-24 04:05:26', '1'),
(89, 4, '3', 'MNC Media', '<h3><span style="font-family: " open="">Daftar Kerja Sama Perusahaan</span></h3><h1 style="text-align: center;"><span style="font-family: " open="">MNC Media<br></span></h1><p style="text-align: justify;"><span style="font-family: " open=""></span>Lorem\n ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod \ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \nveniam, \nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo \nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit \nesse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat \ncupidatat non proident, sunt in culpa qui officia deserunt mollit anim \nid est laborum.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim \nveniam, \nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo \nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit \nesse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat \ncupidatat non proident, sunt in culpa qui officia deserunt mollit anim \nid est laborum.</p>', 2, '2016-03-24 04:05:26', '1'),
(90, 2, '2', '', 'alps_meadow_germany-wallpaper-1366x768.jpg', 1, '2016-03-23 16:41:20', '0'),
(91, 2, '2', '', 'landscape_5-wallpaper-1366x768.jpg', 2, '2016-03-23 16:41:21', '0'),
(92, 2, '2', '', 'beach_hdr_3-wallpaper-1366x768.jpg', 3, '2016-03-23 16:41:21', '0'),
(93, 2, '2', '', 'tree_7-wallpaper-1366x768.jpg', 4, '2016-03-23 16:41:21', '0');

-- --------------------------------------------------------

--
-- Table structure for table `main`
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
(2, '2'),
(3, '2'),
(4, '3');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `news`:
--

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `content`) VALUES
(1, 'Selamat Datang siswa dan siswi tahun ajaran baru di SMK Taruna Bhakti Depok. Jaga kesopanan dan jangan lupa buanglah sampah pada tempatnya');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pict` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `pict`) VALUES
(1, 'admin', 'starbhak', 'tarunabhakti.png');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
