-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 04:59 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET latin1 NOT NULL,
  `copy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `is_joined` tinyint(1) NOT NULL DEFAULT '0',
  `join_following_team` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `display` tinyint(2) NOT NULL DEFAULT '1',
  `code_button` tinyint(1) NOT NULL DEFAULT '0',
  `team_link_button` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `article` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `article`, `writer`, `date`, `pic`) VALUES
(1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consequat nisl et malesuada iaculis. Integer in leo sed ex molestie fermentum non vitae risus. Mauris et felis hendrerit, porttitor orci non, pharetra lectus. In hac habitasse platea dictumst. Etiam efficitur, sapien sed egestas malesuada, nisl diam gravida risus, vel scelerisque elit nibh nec ex. Phasellus dapibus interdum fringilla. Sed nec lorem bibendum, ornare nunc in, euismod eros.\r\n', 'Lorem Ipsum', '2020-07-10 18:43:33', 'maqal.jpg'),
(2, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consequat nisl et malesuada iaculis. Integer in leo sed ex molestie fermentum non vitae risus. Mauris et felis hendrerit, porttitor orci non, pharetra lectus. In hac habitasse platea dictumst. Etiam efficitur, sapien sed egestas malesuada, nisl diam gravida risus, vel scelerisque elit nibh nec ex. Phasellus dapibus interdum fringilla. Sed nec lorem bibendum, ornare nunc in, euismod eros.\r\n\r\nFusce metus nisi, feugiat quis libero at, varius gravida sapien. Ut id tellus vel mi tempus fermentum varius non elit. Aliquam non pharetra elit. Praesent sodales, lectus eu pellentesque porta, enim sapien maximus erat, a viverra tortor leo ac mi. Nunc lacinia nec elit nec elementum. Etiam leo dui, posuere et dolor dapibus, molestie venenatis nulla. Vivamus pulvinar leo nec urna venenatis finibus. Vestibulum rutrum consequat sodales. Donec congue ornare tortor, pretium tristique mauris aliquam eget. Donec luctus, tellus non hendrerit ultrices, urna metus molestie dui, eu volutpat metus est non turpis. Ut quis dignissim velit, eget porta tellus. Mauris suscipit mi vel metus tempus, at fringilla nunc pretium. Integer posuere nec nunc non egestas. Curabitur et odio sit amet tellus pellentesque rutrum. Vestibulum imperdiet, nibh id vehicula viverra, magna leo molestie est, at vehicula urna augue non nulla.\r\n\r\n', 'Lorem Ipsum', '2020-07-10 18:43:33', 'maqal2.jpg'),
(3, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consequat nisl et malesuada iaculis. Integer in leo sed ex molestie fermentum non vitae risus. Mauris et felis hendrerit, porttitor orci non, pharetra lectus. In hac habitasse platea dictumst. Etiam efficitur, sapien sed egestas malesuada, nisl diam gravida risus, vel scelerisque elit nibh nec ex. Phasellus dapibus interdum fringilla. Sed nec lorem bibendum, ornare nunc in, euismod eros.\r\n', 'Lorem Ipsum', '2020-07-10 18:43:33', 'maqal3.jpg'),
(4, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consequat nisl et malesuada iaculis. Integer in leo sed ex molestie fermentum non vitae risus. Mauris et felis hendrerit, porttitor orci non, pharetra lectus. In hac habitasse platea dictumst. Etiam efficitur, sapien sed egestas malesuada, nisl diam gravida risus, vel scelerisque elit nibh nec ex. Phasellus dapibus interdum fringilla. Sed nec lorem bibendum, ornare nunc in, euismod eros.\r\n', 'Lorem Ipsum', '2020-07-10 18:43:33', 'maqal2.jpg'),
(5, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consequat nisl et malesuada iaculis. Integer in leo sed ex molestie fermentum non vitae risus. Mauris et felis hendrerit, porttitor orci non, pharetra lectus. In hac habitasse platea dictumst. Etiam efficitur, sapien sed egestas malesuada, nisl diam gravida risus, vel scelerisque elit nibh nec ex. Phasellus dapibus interdum fringilla. Sed nec lorem bibendum, ornare nunc in, euismod eros.\r\n\r\nFusce metus nisi, feugiat quis libero at, varius gravida sapien. Ut id tellus vel mi tempus fermentum varius non elit. Aliquam non pharetra elit. Praesent sodales, lectus eu pellentesque porta, enim sapien maximus erat, a viverra tortor leo ac mi. Nunc lacinia nec elit nec elementum. Etiam leo dui, posuere et dolor dapibus, molestie venenatis nulla. Vivamus pulvinar leo nec urna venenatis finibus. Vestibulum rutrum consequat sodales. Donec congue ornare tortor, pretium tristique mauris aliquam eget. Donec luctus, tellus non hendrerit ultrices, urna metus molestie dui, eu volutpat metus est non turpis. Ut quis dignissim velit, eget porta tellus. Mauris suscipit mi vel metus tempus, at fringilla nunc pretium. Integer posuere nec nunc non egestas. Curabitur et odio sit amet tellus pellentesque rutrum. Vestibulum imperdiet, nibh id vehicula viverra, magna leo molestie est, at vehicula urna augue non nulla.\r\n\r\n', 'Lorem Ipsum', '2020-07-10 18:43:33', 'maqal.jpg'),
(6, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consequat nisl et malesuada iaculis. Integer in leo sed ex molestie fermentum non vitae risus. Mauris et felis hendrerit, porttitor orci non, pharetra lectus. In hac habitasse platea dictumst. Etiam efficitur, sapien sed egestas malesuada, nisl diam gravida risus, vel scelerisque elit nibh nec ex. Phasellus dapibus interdum fringilla. Sed nec lorem bibendum, ornare nunc in, euismod eros.\r\n\r\nFusce metus nisi, feugiat quis libero at, varius gravida sapien. Ut id tellus vel mi tempus fermentum varius non elit. Aliquam non pharetra elit. Praesent sodales, lectus eu pellentesque porta, enim sapien maximus erat, a viverra tortor leo ac mi. Nunc lacinia nec elit nec elementum. Etiam leo dui, posuere et dolor dapibus, molestie venenatis nulla. Vivamus pulvinar leo nec urna venenatis finibus. Vestibulum rutrum consequat sodales. Donec congue ornare tortor, pretium tristique mauris aliquam eget. Donec luctus, tellus non hendrerit ultrices, urna metus molestie dui, eu volutpat metus est non turpis. Ut quis dignissim velit, eget porta tellus. Mauris suscipit mi vel metus tempus, at fringilla nunc pretium. Integer posuere nec nunc non egestas. Curabitur et odio sit amet tellus pellentesque rutrum. Vestibulum imperdiet, nibh id vehicula viverra, magna leo molestie est, at vehicula urna augue non nulla.\r\n\r\n', 'Lorem Ipsum', '2020-07-10 18:43:33', 'maqal3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8_bin NOT NULL,
  `writer` tinytext COLLATE utf8_bin NOT NULL,
  `brief` text COLLATE utf8_bin NOT NULL,
  `pic` text COLLATE utf8_bin NOT NULL,
  `post` text COLLATE utf8_bin NOT NULL,
  `link` tinytext COLLATE utf8_bin NOT NULL,
  `resofrate` int(11) NOT NULL,
  `numofrate` int(11) NOT NULL,
  `numdownload` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `section` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type` varchar(100) COLLATE utf8_bin NOT NULL,
  `uploadname` varchar(100) COLLATE utf8_bin NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `infographic`
--

CREATE TABLE `infographic` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `section` varchar(255) CHARACTER SET latin1 NOT NULL,
  `series_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `leader_rank` varchar(100) DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leader_request`
--

CREATE TABLE `leader_request` (
  `Rid` int(11) NOT NULL,
  `members_num` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `leader_id` int(11) NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `send_to_leader` tinyint(1) NOT NULL DEFAULT '0',
  `current_team_count` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `viewers` int(11) NOT NULL,
  `page_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pic` varchar(255) NOT NULL,
  `num_of_photos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `visitors` int(11) NOT NULL DEFAULT '0',
  `page_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion_book`
--

CREATE TABLE `suggestion_book` (
  `id` int(11) NOT NULL,
  `book_name` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `writer` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `brief` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `found` int(11) NOT NULL,
  `link` tinytext CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regstatus` tinyint(1) NOT NULL DEFAULT '0',
  `team` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambassador`
--
ALTER TABLE `ambassador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infographic`
--
ALTER TABLE `infographic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leader_info`
--
ALTER TABLE `leader_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leader_request`
--
ALTER TABLE `leader_request`
  ADD PRIMARY KEY (`Rid`),
  ADD KEY `leader_id` (`leader_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestion_book`
--
ALTER TABLE `suggestion_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambassador`
--
ALTER TABLE `ambassador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leader_info`
--
ALTER TABLE `leader_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leader_request`
--
ALTER TABLE `leader_request`
  MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suggestion_book`
--
ALTER TABLE `suggestion_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambassador`
--
ALTER TABLE `ambassador`
  ADD CONSTRAINT `ambassador_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `leader_request` (`Rid`);

--
-- Constraints for table `leader_request`
--
ALTER TABLE `leader_request`
  ADD CONSTRAINT `leader_request_ibfk_1` FOREIGN KEY (`leader_id`) REFERENCES `leader_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
