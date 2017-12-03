-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2017 at 05:13 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmland`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `address_id` int(5) NOT NULL AUTO_INCREMENT,
  `lot_number` varchar(10) NOT NULL,
  `address_line` varchar(1000) NOT NULL,
  `town` varchar(100) NOT NULL,
  `region` varchar(10) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `lot_number`, `address_line`, `town`, `region`) VALUES
(26, 'abc', 'xyz', 'Georgetown', '1'),
(27, 'xyz ', 'abc', 'New town', '3'),
(28, 'axc', 'cxa', 'Old town', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `units` int(11) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `image` varchar(3000) NOT NULL,
  `seller` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ava_amt` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Fruits'),
(2, 'Meat/Seafood'),
(3, 'Dairy/Cheese'),
(4, 'Legumes/Nuts/Seeds'),
(5, 'Green Leafy Vegetables'),
(6, 'Fruit Vegetables'),
(7, 'Root Vegetables'),
(8, 'Onion/Shallots/Garlic'),
(9, 'Beverages'),
(10, 'Herbs/Spices'),
(11, 'Ground Provision');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(5) NOT NULL AUTO_INCREMENT,
  `likes` int(5) NOT NULL,
  `dislikes` int(5) NOT NULL,
  `body` varchar(3000) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `makes_comment`
--

DROP TABLE IF EXISTS `makes_comment`;
CREATE TABLE IF NOT EXISTS `makes_comment` (
  `makes_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`makes_comment_id`),
  KEY `user_id` (`user_id`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category_id` int(5) NOT NULL,
  `image` varchar(3000) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category_id`, `image`) VALUES
(46, 'carrots', 6, 'img/product_pics/72d5ec5cbe5e550736d144a21261ab86d7f3d072.jpg'),
(47, 'potatoes', 11, 'img/product_pics/f16ed6810f6cb68f19ee6d4097ba316ae95dce17.jpg'),
(48, 'tulips', 5, 'img/product_pics/b57caea937a697d66940b4c8a6a721cd79fc10d6.jpg'),
(49, 'jellyfish', 2, 'img/product_pics/48427d72f66c0ce4e8e6d09fcc9b607acd644e94.jpg'),
(50, 'pumpkin', 6, 'img/product_pics/19ec2dcf7f3eb1fed570e66fc342aaff28f806b3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products_for_sale`
--

DROP TABLE IF EXISTS `products_for_sale`;
CREATE TABLE IF NOT EXISTS `products_for_sale` (
  `product_for_sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_listed` date NOT NULL,
  `price` decimal(65,2) NOT NULL,
  PRIMARY KEY (`product_for_sale_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_for_sale`
--

INSERT INTO `products_for_sale` (`product_for_sale_id`, `user_id`, `product_id`, `amount`, `date_listed`, `price`) VALUES
(19, 15, 46, 0, '2017-12-02', '10.00'),
(20, 15, 47, 935, '2017-12-02', '20.00'),
(21, 15, 48, -6, '2017-12-02', '33.00'),
(22, 13, 49, 15, '2017-12-02', '100.00'),
(23, 13, 50, 53, '2017-12-02', '33.00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

DROP TABLE IF EXISTS `purchase_product`;
CREATE TABLE IF NOT EXISTS `purchase_product` (
  `purchase_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_purchased` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `total` decimal(64,2) NOT NULL,
  `seller_id` int(11) NOT NULL,
  PRIMARY KEY (`purchase_product_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sell_product`
--

DROP TABLE IF EXISTS `sell_product`;
CREATE TABLE IF NOT EXISTS `sell_product` (
  `sell_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_sold` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `total` decimal(64,2) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  PRIMARY KEY (`sell_product_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `cash` decimal(65,2) UNSIGNED NOT NULL,
  `profile_picture` varchar(5000) NOT NULL,
  `address_id` int(5) NOT NULL,
  `account_type` varchar(10) NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `address_id` (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='This table stores the user data ';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `phone`, `username`, `password`, `email`, `cash`, `profile_picture`, `address_id`, `account_type`) VALUES
(13, 'Sean', 'Singh', '222-222-2222', 'sean', '2alSlJaAzeyyk', 'sean@sean.com', '1000000.00', 'img/profilePics/chappie.jpg', 26, 'admin'),
(14, 'John', 'Doe', '222-000-0002', 'john', '2aQC12FCJC7N.', 'john@john.com', '1000000.00', 'img/profilePics/chappie.jpg', 27, 'customer'),
(15, 'Mary', 'Jane', '222-333-3333', 'mary', '2axhNOORCIRxM', 'mary@mary.com', '1000000.00', 'img/profilePics/chappie.jpg', 28, 'customer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `makes_comment`
--
ALTER TABLE `makes_comment`
  ADD CONSTRAINT `makes_comment_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `makes_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `products_for_sale`
--
ALTER TABLE `products_for_sale`
  ADD CONSTRAINT `products_for_sale_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_for_sale_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD CONSTRAINT `purchase_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sell_product`
--
ALTER TABLE `sell_product`
  ADD CONSTRAINT `sell_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sell_product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
