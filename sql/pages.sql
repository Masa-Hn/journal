-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2020 at 01:17 AM
-- Server version: 5.7.31-cll-lve
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
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `viewers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `viewers`) VALUES
(1, 'Ù‡Ù„ ØªØ¹Ù„Ù…', 179),
(2, 'Ø§Ù„ØªØ¹Ù„ÙŠÙ… Ø§Ù„Ù…Ø³ØªÙ…Ø±', 141),
(3, 'Ù…Ù‡Ù…Ø© Ø§Ù„Ø³ÙÙŠØ±', 63),
(4, 'Ø¹Ù„Ø§Ù…Ø© Ø§Ù„Ù‚Ø±Ø§Ø¡Ø©', 59),
(5, 'Ø³Ø¤Ø§Ù„ Ø¹Ø¯Ø¯ Ø§Ù„ØµÙØ­Ø§Øª', 60),
(6, 'Ø³Ø¤Ø§Ù„ ØªÙ‚Ø³ÙŠÙ… Ø§Ù„Ù‚Ø±Ø§Ø¡Ø©', 54),
(7, 'ÙƒÙŠÙ ØªØ³ØªÙÙŠØ¯ Ù…Ù† Ù‚Ø±Ø§Ø¡ØªÙƒ', 54),
(8, 'Ø³Ø¤Ø§Ù„ Ø£ÙŠ Ø§Ù„Ø·Ø±Ù‚ ØªÙØ¶Ù„', 52),
(9, 'ÙƒØªØ¨ Ø§Ù„Ù…Ø´Ø±ÙˆØ¹', 51),
(10, 'Ø³Ø¤Ø§Ù„ ÙØ¦Ø§Øª Ø§Ù„ÙƒØªØ¨', 51),
(11, 'ÙØ¹Ø§Ù„ÙŠØ§Øª Ø§Ù„Ù…Ø´Ø±ÙˆØ¹', 47),
(12, 'ØªØ³Ø¬ÙŠÙ„ Ø§Ù„ÙÙŠØ³Ø¨ÙˆÙƒ', 48),
(13, 'Ø§Ù„ØµÙØ­Ø© Ø§Ù„Ø£Ø®ÙŠØ±Ø©', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
