-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 10:56 AM
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
  `country` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `leader_gender` varchar(50) NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `profile_link` varchar(255) NOT NULL,
  `fb_id` varchar(255) NOT NULL,
  `messenger_id` varchar(255) NOT NULL DEFAULT '0',
  `is_joined` tinyint(1) NOT NULL DEFAULT 0,
  `join_following_team` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `display` tinyint(2) NOT NULL DEFAULT 1,
  `code_button` tinyint(1) NOT NULL DEFAULT 0,
  `team_link_button` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambassador`
--
ALTER TABLE `ambassador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`);

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
  ADD CONSTRAINT `ambassador_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `leader_request` (`Rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
