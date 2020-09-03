-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2020 at 05:47 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambassador`
--

CREATE TABLE `ambassador` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `readBefore` tinyint(1) NOT NULL,
  `nameOfReadBook` varchar(255) DEFAULT NULL,
  `code` int(11) NOT NULL,
  `leaderGender` varchar(50) NOT NULL,
  `requestId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambassador`
--
ALTER TABLE `ambassador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ambassador_ibfk_1` (`requestId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambassador`
--
ALTER TABLE `ambassador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambassador`
--
ALTER TABLE `ambassador`
  ADD CONSTRAINT `ambassador_ibfk_1` FOREIGN KEY (`requestId`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
