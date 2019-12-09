-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2017 at 09:45 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `id_memeber` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `id_memeber`) VALUES
(1, 'welcome to our class', 3),
(3, 'mobiles', 1),
(4, 'sport15400', 1),
(5, 'dassddsdsadsadsdasdsadsasd', 1),
(6, 'dasddasads', 1),
(7, 'addssd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `memeber`
--

CREATE TABLE IF NOT EXISTS `memeber` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `job_type` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memeber`
--

INSERT INTO `memeber` (`id`, `username`, `password`, `email`, `job_type`) VALUES
(1, 'ahmedsss', 'ssssssssssss', 'ahmed.fathi.g@gmail.comssssss', 0),
(3, 'sssssssssssssssssssss', 'rrrrrrrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrr', 0),
(6, 'xx', '9336ebf25087d91c818ee6e9ec29f8c1', 'xx', 1),
(8, 'kamal', '5454544', 'aaaaaaa@aaa.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `title` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `id_memeber` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_category`, `title`, `image`, `id_memeber`, `description`) VALUES
(5, 5, 'acer aspire 2700d', '1449914135Desert.jpg', 6, 'xxxxxxx'),
(7, 7, 'acer aspite788888', '1483696509controls.png', 1, 'acer aspite  acer aspitexxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `title` varchar(300) DEFAULT NULL,
  `keywords` text,
  `description` text,
  `open_close_site` int(1) DEFAULT NULL,
  `message_close_site` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`title`, `keywords`, `description`, `open_close_site`, `message_close_site`) VALUES
('shoppingd', '                                                                                                                                                                                                                                                                                                                                                                                                                                            ssssssssssssssssssssssssssssssssss                                                                                                                                                                                                                                                                                                                                                                                                ', '                                                                                                                                                                                                                                                                                                                                                                                                            ddkdlkdlkdlkd                                                                                                                                                                                                                                                                                                                                                                ', 1, '                                    welcome                                ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id_memeber` (`id_memeber`);

--
-- Indexes for table `memeber`
--
ALTER TABLE `memeber`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_memeber` (`id_memeber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `memeber`
--
ALTER TABLE `memeber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_memeber`) REFERENCES `memeber` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_memeber`) REFERENCES `memeber` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
