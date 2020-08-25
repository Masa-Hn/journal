-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 05:55 PM
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
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `leader_name` varchar(255) NOT NULL,
  `leader_link` varchar(255) NOT NULL,
  `team_link` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `num_of_members` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `leader_name`, `leader_link`, `team_link`, `gender`, `num_of_members`, `date`) VALUES
(29, 'asmkk', 'asmaa', 'lkdnsvlsn', 'female', 1, '2020-08-20 13:50:20'),
(30, 'asmkk', 'https://www.osboha180.com/evaluation/users/insertmarks?email=asmaa55hm@gmail.com&name=Asmaa%20Hamid', 'https://www.osboha180.com/evaluation/users/insertmarks?email=asmaa55hm@gmail.com&name=Asmaa%20Hamid', 'female', 1, '2020-08-25 14:49:44'),
(31, 'asmaa', 'https://www.osboha180.com/evaluation/users/insertmarks?email=asmaa55hm@gmail.com&name=Asmaa%20Hamid', 'https://www.osboha180.com/evaluation/users/insertmarks?email=asmaa55hm@gmail.com&name=Asmaa%20Hamid', 'female', 1, '2020-08-25 15:10:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
