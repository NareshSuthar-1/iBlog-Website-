-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 08:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(250) NOT NULL,
  `c_name` varchar(250) COLLATE tis620_bin NOT NULL,
  `post` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `c_name`, `post`) VALUES
(1, 'Spots', 2),
(2, 'Politics', 0),
(3, 'Entertenments', 2),
(4, 'Health', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(250) NOT NULL,
  `name` varchar(250) COLLATE tis620_bin NOT NULL,
  `password` varchar(250) COLLATE tis620_bin NOT NULL,
  `u_role` varchar(250) COLLATE tis620_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_bin;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `password`, `u_role`) VALUES
(1, 'naresh', 'admin', '1'),
(2, 'dev', 'dev', '0'),
(3, 'Naresh', 'a', '1'),
(4, 'ggg', 'hh', '1');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(250) NOT NULL,
  `title` varchar(250) COLLATE tis620_bin NOT NULL,
  `descriptions` varchar(250) COLLATE tis620_bin NOT NULL,
  `catry` varchar(250) COLLATE tis620_bin NOT NULL,
  `post_date` varchar(250) COLLATE tis620_bin NOT NULL,
  `author` varchar(250) COLLATE tis620_bin NOT NULL,
  `post_img` varchar(250) COLLATE tis620_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_bin;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `descriptions`, `catry`, `post_date`, `author`, `post_img`) VALUES
(2, 'naresh1', 'naresh 1111111', '1', '21 Jun,2021', '1', 'inside.jpg'),
(3, 'naresh222', 'naresh222', '3', '21 Jun,2021', '1', 'Land Rover Range Rover.jpg'),
(5, 'naresh333', 'naresh333', '4', '21 Jun,2021', '1', 'BMW 3 Series.jpg'),
(6, 'helll', 'loresmmm', '3', '23 Jun,2021', '1', 'antenna-80.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
