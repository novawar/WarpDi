-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 01:42 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warpdi`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `topic_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `create_date` datetime NOT NULL,
  `info` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `author_id` int(5) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `topic_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `topic` varchar(120) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `warp` varchar(125) NOT NULL,
  `category` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `author_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `view` int(5) NOT NULL,
  `reply` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `db_users`
--

CREATE TABLE `db_users` (
  `u_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_lastname` varchar(50) NOT NULL,
  `u_username` varchar(50) NOT NULL,
  `u_password` varchar(50) NOT NULL,
  `u_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_users`
--

INSERT INTO `db_users` (`u_id`, `u_name`, `u_lastname`, `u_username`, `u_password`, `u_status`) VALUES
(00001, 'admin', 'admin', 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `topic_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `db_users`
--
ALTER TABLE `db_users`
  MODIFY `u_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
