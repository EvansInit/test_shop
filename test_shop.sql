-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 06:35 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(60) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `categories` varchar(60) NOT NULL,
  `brand` int(11) NOT NULL,
  `description` text NOT NULL,
  `p_condition` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `image_one` varchar(255) NOT NULL,
  `image_two` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `user_id`, `title`, `price`, `categories`, `brand`, `description`, `p_condition`, `quantity`, `image_one`, `image_two`) VALUES
(1, 3, 'HP LAPTOP', '20000.00', 'LAPTOPS', 0, 'Brand new! 4GB RAM, 500GB HDD, CORE i5', 'Brand new', 1, '/p_images/hp_img_1.jpg', '/p_images/hp_img_2.jpg'),
(2, 3, 'Faiba', '6530.00', 'Laptops', 0, 'This is faiba.', 'Second-hand in good working condition', 2, '/p_images/faiba mi-fi.PNG', '/p_images/faiba.PNG'),
(3, 5, 'Pilau Nyama', '120.00', 'Clothes', 0, 'Karibuni Belle Enterprises, Shalakwa opp. Tuskys Supermkt. Hii pilau ni tamu!', 'New, slightly used', 50, 'p_images/IMG-20190115-WA0007.jpg', 'p_images/IMG-20190115-WA0008.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `name1st` varchar(60) NOT NULL,
  `name2nd` varchar(60) NOT NULL,
  `name_user` varchar(60) NOT NULL,
  `e_mail` varchar(60) NOT NULL,
  `mobile_no` bigint(13) NOT NULL,
  `security_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `name1st`, `name2nd`, `name_user`, `e_mail`, `mobile_no`, `security_key`) VALUES
(3, 'Esperos', 'Quitte', 'Esperos Marketers', 'esperos@gmail.com', 254719876543, '1dca71f5106ce4bb7cfd5bc8bd59765e'),
(5, 'Bella', 'Belle', 'Belle Enterprises', 'bellabelle@bmail.com', 25412000111, '90ad60f7445fa9e0b24f30a9c6d0e8be');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
