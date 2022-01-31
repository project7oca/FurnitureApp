-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 07:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project7`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'All Products'),
(2, 'Bedroom'),
(3, 'Decore'),
(4, 'Dining Room'),
(5, 'Kitchen'),
(6, 'Living Room');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_desc` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `stars` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) NOT NULL,
  `totalprice` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `address`, `totalprice`, `user_id`) VALUES
(66, '2022-01-31 17:36:56', 'Voluptate assumenda ', 450, 1),
(67, '2022-01-31 17:38:27', 'Officiis magnam cupi', 450, 1),
(68, '2022-01-31 17:53:18', 'Sit commodi elit du', 450, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(96, 67, 1, 1),
(97, 67, 2, 1),
(98, 67, 3, 1),
(99, 68, 1, 1),
(100, 68, 2, 1),
(101, 68, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `discount` int(20) NOT NULL,
  `stock` int(20) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_desc`, `discount`, `stock`, `product_image`, `category_id`) VALUES
(1, 'bedroom desk', 50, 'Every household has a designated remote control holder', 15, 28, 'bed1.jpg', 2),
(2, 'bedroom sofa', 100, 'Every household has a designated remote control holder', 0, 13, 'bed2.jpg', 2),
(3, 'bed', 300, 'Every household has a designated remote control holder', 0, 8, 'bed3.jpg', 2),
(4, 'bed sofa', 150, 'Every household has a designated remote control holder', 0, 15, 'bed4.jpg', 2),
(5, 'closet', 400, 'Every household has a designated remote control holder', 0, 50, 'bed5.jpg', 2),
(6, 'table lamb', 50, 'Every household has a designated remote control holder', 50, 20, 'dec1.jpg', 3),
(7, 'table mirror', 60, 'Every household has a designated remote control holder', 0, 20, 'dec2.jpg', 3),
(8, 'table lamb', 45, 'Every household has a designated remote control holder', 0, 30, 'dec3.jpg', 3),
(9, 'table lamb', 75, 'Every household has a designated remote control holder', 0, 20, 'dec4.jpg', 3),
(10, 'clock', 100, 'Every household has a designated remote control holder', 0, 10, 'dec5.jpg', 3),
(11, 'table', 60, 'Every household has a designated remote control holder', 30, 20, 'din1.jpg', 4),
(12, 'table', 80, 'Every household has a designated remote control holder', 0, 12, 'din2.jpg', 4),
(13, 'table', 60, 'Every household has a designated remote control holder', 0, 50, 'din3.jpg', 4),
(14, 'chair', 45, 'Every household has a designated remote control holder', 0, 19, 'din4.jpg', 4),
(15, 'table', 75, 'Every household has a designated remote control holder', 0, 20, 'din5.jpg', 4),
(16, 'kitchen island', 60, 'Every household has a designated remote control holder', 25, 20, 'kit1.jpg', 5),
(17, 'food pantries', 80, 'Every household has a designated remote control holder', 0, 12, 'kit2.jpg', 5),
(18, 'kitchen pantries', 60, 'Every household has a designated remote control holder', 0, 50, 'kit3.jpg', 5),
(19, 'kitchen island', 45, 'Every household has a designated remote control holder', 0, 19, 'kit4.jpg', 5),
(20, 'kitchen island', 75, 'Every household has a designated remote control holder', 0, 20, 'kit5.jpg', 5),
(21, 'corner', 200, 'Every household has a designated remote control holder', 60, 20, 'liv1.jpg', 6),
(22, 'sofa', 80, 'Every household has a designated remote control holder', 0, 12, 'liv2.jpg', 6),
(23, 'corner', 60, 'Every household has a designated remote control holder', 0, 50, 'liv3.jpg', 6),
(24, 'green sofa', 45, 'Every household has a designated remote control holder', 0, 19, 'liv4.jpg', 6),
(25, 'sofa', 75, 'Every household has a designated remote control holder', 0, 20, 'liv5.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `password`, `userRole`) VALUES
(1, 'admin', 'admin@admin.com', '+1 (187) 656-8054', '25f9e794323b453885f5181f1b624d0b', 1),
(2, 'user', 'user@test.com', '+1 (376) 135-9118', '25f9e794323b453885f5181f1b624d0b', 0),
(3, 'user2', 'user2@test.com', '+1 (376) 135-9118', '25f9e794323b453885f5181f1b624d0b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comments` (`product_id`),
  ADD KEY `user_comments` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_orders` (`user_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order` (`order_id`),
  ADD KEY `products` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `product_comments` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `user_comments` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_orders` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
