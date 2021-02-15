-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2021 at 02:11 AM
-- Server version: 5.7.32-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osbohaco_rack`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `copy` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ambassador`
--

DROP TABLE IF EXISTS `ambassador`;
CREATE TABLE IF NOT EXISTS `ambassador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `leader_gender` varchar(50) NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `profile_link` varchar(255) NOT NULL,
  `fb_id` varchar(255) NOT NULL,
  `messenger_id` varchar(255) NOT NULL DEFAULT '0',
  `is_joined` tinyint(1) NOT NULL DEFAULT '0',
  `join_following_team` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `display` tinyint(2) NOT NULL DEFAULT '1',
  `code_button` tinyint(1) NOT NULL DEFAULT '0',
  `team_link_button` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `request_id` (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41715 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `article` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `writer` tinytext NOT NULL,
  `brief` text NOT NULL,
  `pic` text NOT NULL,
  `post` text NOT NULL,
  `link` text NOT NULL,
  `resofrate` int(11) NOT NULL,
  `numofrate` int(11) NOT NULL,
  `numdownload` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `uploadname` varchar(100) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=553 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

DROP TABLE IF EXISTS `certificate`;
CREATE TABLE IF NOT EXISTS `certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(255) NOT NULL,
  `activity_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `certificate_ibfk_1` (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1725 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `title`, `pic`) VALUES
(35, '28/01/2021', '7bbfbb47e2d92541ad921595e7ae4d47.png'),
(36, '04/02/2021', ''),
(37, '04/02/2021', '1ebbc6bf56891206db86dd7ce553bf05.png'),
(38, '11/02/2021', '3328dcdf47aee7721dd81fbf2aec565e.png');

-- --------------------------------------------------------

--
-- Table structure for table `infographic`
--

DROP TABLE IF EXISTS `infographic`;
CREATE TABLE IF NOT EXISTS `infographic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pic` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `section` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `series_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leader_info`
--

DROP TABLE IF EXISTS `leader_info`;
CREATE TABLE IF NOT EXISTS `leader_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leader_name` varchar(255) NOT NULL,
  `leader_link` varchar(255) NOT NULL,
  `messenger_id` varchar(255) NOT NULL,
  `team_link` varchar(255) NOT NULL,
  `leader_email` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `leader_gender` varchar(10) NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `leaders_team_name` varchar(100) DEFAULT NULL,
  `leader_rank` varchar(50) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1978 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leader_request`
--

DROP TABLE IF EXISTS `leader_request`;
CREATE TABLE IF NOT EXISTS `leader_request` (
  `Rid` int(11) NOT NULL AUTO_INCREMENT,
  `members_num` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `leader_id` int(11) NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `send_to_leader` tinyint(1) NOT NULL DEFAULT '0',
  `current_team_count` int(11) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Rid`),
  KEY `leader_id` (`leader_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9558 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `viewers` int(11) NOT NULL,
  `page_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `viewers`, `page_order`) VALUES
(1, 'Ù‡Ù„ ØªØ¹Ù„Ù…', 0, 0),
(2, 'Ø§Ù„ØªØ¹Ù„ÙŠÙ… Ø§Ù„Ù…Ø³ØªÙ…Ø±', 0, 1),
(3, 'Ù…Ù‡Ù…Ø© Ø§Ù„Ø³ÙÙŠØ±', 0, 2),
(4, 'Ø¹Ù„Ø§Ù…Ø© Ø§Ù„Ù‚Ø±Ø§Ø¡Ø©', 0, 3),
(5, 'Ø³Ø¤Ø§Ù„ Ø¹Ø¯Ø¯ Ø§Ù„ØµÙØ­Ø§Øª', 0, 4),
(6, 'Ø³Ø¤Ø§Ù„ ØªÙ‚Ø³ÙŠÙ… Ø§Ù„Ù‚Ø±Ø§Ø¡Ø©', 0, 5),
(7, 'ÙƒÙŠÙ ØªØ³ØªÙÙŠØ¯ Ù…Ù† Ù‚Ø±Ø§Ø¡ØªÙƒ', 0, 6),
(8, 'Ø³Ø¤Ø§Ù„ Ø£ÙŠ Ø§Ù„Ø·Ø±Ù‚ ØªÙØ¶Ù„', 0, 7),
(9, 'ÙƒØªØ¨ Ø§Ù„Ù…Ø´Ø±ÙˆØ¹', 0, 8),
(10, 'Ø³Ø¤Ø§Ù„ ÙØ¦Ø§Øª Ø§Ù„ÙƒØªØ¨', 0, 9),
(11, 'ÙØ¹Ø§Ù„ÙŠØ§Øª Ø§Ù„Ù…Ø´Ø±ÙˆØ¹', 0, 10),
(12, 'ÙÙˆØ±Ù… Ø§Ù„ØªØ³Ø¬ÙŠÙ„', 0, 11),
(13, 'ÙƒÙˆØ¯ Ø§Ù„ÙØ±ÙŠÙ‚', 0, 12),
(14, 'Ø§Ù„Ø¥Ù†Ø¶Ù…Ø§Ù… Ù„ÙØ±ÙŠÙ‚ Ø§Ù„Ù…ØªØ§Ø¨Ø¹Ø©', 0, 13);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pic` varchar(255) NOT NULL,
  `num_of_photos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

DROP TABLE IF EXISTS `statistics`;
CREATE TABLE IF NOT EXISTS `statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitors` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1499 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion_book`
--

DROP TABLE IF EXISTS `suggestion_book`;
CREATE TABLE IF NOT EXISTS `suggestion_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `writer` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `brief` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `found` int(11) NOT NULL,
  `link` tinytext CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=751 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regstatus` tinyint(1) NOT NULL DEFAULT '0',
  `team` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_times` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `visit_times`) VALUES
(1, 131920);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambassador`
--
ALTER TABLE `ambassador`
  ADD CONSTRAINT `ambassador_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `leader_request` (`Rid`);

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `statistics_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leader_request`
--
ALTER TABLE `leader_request`
  ADD CONSTRAINT `leader_request_ibfk_1` FOREIGN KEY (`leader_id`) REFERENCES `leader_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
