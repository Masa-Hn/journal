-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 10:03 PM
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
-- Table structure for table `leader_info`
--

CREATE TABLE `leader_info` (
  `id` int(11) NOT NULL,
  `leader_name` varchar(255) DEFAULT NULL,
  `leader_link` varchar(255) DEFAULT NULL,
  `team_link` varchar(255) DEFAULT NULL,
  `leader_email` varchar(255) DEFAULT NULL,
  `team_name` varchar(255) DEFAULT NULL,
  `leader_gender` varchar(10) DEFAULT NULL,
  `uniqid` varchar(100) NOT NULL,
  `messenger_id` varchar(255) NOT NULL DEFAULT '0',
  `leaders_team_name` varchar(100) DEFAULT NULL,
  `leader_rank` int(11) DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leader_info`
--
ALTER TABLE `leader_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leader_info`
--
ALTER TABLE `leader_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
