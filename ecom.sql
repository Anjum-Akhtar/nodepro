-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2024 at 08:55 AM
-- Server version: 5.7.40
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `address_optional` text,
  `city` varchar(255) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `address_optional`, `city`, `state`, `pincode`, `country`, `create_date`, `update_date`) VALUES
(1, 'Anjum', 'Akhtar', 'sweetangelanjum115@gmail.com', '7018216542', 'street test624', '', 'Gurugram', 'Delhi', '122022', 'india', '2023-08-04 19:49:17', '2023-08-04 19:49:17'),
(2, 'anu', 'Dummy', 'anjum@example.com', '7459151276', 'steer1234', '', 'gurugram', 'Haryana', '122022', 'india', '2023-08-08 07:31:42', '2023-08-08 07:31:42'),
(3, 'Arshad', 'khan', 'arshad.khan@livpure.com', '77859151276', 'steer1234', '', 'gurugram', 'Delhi', '122022', 'india', '2023-08-14 18:33:52', '2023-08-14 18:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `status`, `added_date`) VALUES
(1, 'angel', 'pari', 'anjum@livpure.com', '$2y$10$oOhYmM7XLJBRMXpplcAHVeppf2jMTl6ReIjEwDqIosNO9NU.IKZze', '7018216542', 1, '2023-05-26 10:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pro_id`, `quantity`, `date`) VALUES
(52, '8v9v81d7fchddi2la01vve1tar', 5, 3, '2023-07-10 02:01:18'),
(53, '8v9v81d7fchddi2la01vve1tar', 4, 4, '2023-07-10 02:01:23'),
(54, '8v9v81d7fchddi2la01vve1tar', 6, 1, '2023-07-10 02:01:26'),
(51, 'bqif786d8a0699aa81s56kmav7', 4, 4, '2023-07-09 08:55:14'),
(50, 'bqif786d8a0699aa81s56kmav7', 3, 5, '2023-07-09 08:55:12'),
(55, '8v9v81d7fchddi2la01vve1tar', 3, 5, '2023-07-10 02:08:44'),
(57, '1v7c67r8cndbca7c07j0vuq8qo', 3, 5, '2023-07-21 06:41:26'),
(58, 'si1loe6clb77mc3vdto9si6isf', 4, 4, '2023-07-21 09:32:48'),
(92, 't6bn8s4pcm4ta5i5rshiq9rq47', 6, 1, '2023-07-31 11:34:42'),
(93, 't6bn8s4pcm4ta5i5rshiq9rq47', 3, 5, '2023-07-31 05:49:13'),
(127, 'a7him0p8jmii4jggdrvue2j7a8', 3, 2, '2023-10-02 09:29:09'),
(126, 'tpcavqp8vvi6emk899r7hc08u5', 6, 1, '2023-09-19 08:05:50'),
(128, 'b188bucl7o8jjgqru473aecpjb', 5, 1, '2024-02-06 10:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `cat_url` varchar(100) NOT NULL,
  `cat_image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added_by` varchar(100) NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_url`, `cat_image`, `status`, `added_by`, `update_by`, `added_date`, `update_date`) VALUES
(1, 'Children', 'children', 'children.jpg', 1, 'anjum@livpure.com', 'anjum@livpure.com', '2023-06-15 10:18:17', '2023-06-15 10:18:17'),
(2, ' Men', 'men', 'men.jpg', 1, 'anjum@livpure.com', 'anjum@livpure.com', '2023-06-15 10:18:23', '2023-06-15 10:18:23'),
(3, ' Women', 'women', 'women.jpg', 1, 'anjum@livpure.com', 'anjum@livpure.com', '2023-06-15 10:18:28', '2023-06-15 10:18:28'),
(4, ' food', 'food', NULL, 1, 'anjum@livpure.com', 'anjum@livpure.com', '2023-07-24 10:01:46', '2023-07-24 10:01:46'),
(5, ' shoes', 'shoes', NULL, 1, 'anjum@livpure.com', 'anjum@livpure.com', '2023-07-24 10:03:22', '2023-07-24 10:03:22'),
(6, ' saree', 'saree', NULL, 1, 'anjum@livpure.com', 'anjum@livpure.com', '2023-07-24 10:03:27', '2023-07-24 10:03:27'),
(7, ' toys', 'toys', NULL, 1, 'anjum@livpure.com', 'anjum@livpure.com', '2023-07-24 10:03:38', '2023-07-24 10:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `created_date`) VALUES
(1, 'anu', 'anjum@example.com', '9459151276', 'fghj', '2023-07-14 07:22:15'),
(2, 'anu', 'anjum@example.com', '9459151276', 'fghj', '2023-07-14 07:23:20'),
(3, 'anu', 'anjum@example.com', '9459151276', 'ttttttttt', '2023-07-14 07:23:42'),
(4, 'Anjum Akhtar', 'sweet@gmail.com', '7018766666', 'ghj', '2023-07-14 07:36:01'),
(5, 'Anjum Akhtar', 'sweet@gmail.com', '7018766666', 'ghj', '2023-07-14 07:36:36'),
(6, 'Anjum Akhtar', 'sweet@gmail.com', '7018766666', 'ghj', '2023-07-14 07:36:54'),
(7, 'Anjum Akhtar', 'sweet@gmail.com', '7018766666', 'ghj', '2023-07-14 07:37:04'),
(8, 'Anjum Akhtar', 'sweet@gmail.com', '7018766666', 'ghj', '2023-07-14 07:37:12'),
(9, 'Anjum Akhtar', 'sweet@gmail.com', '7018766666', 'ghj', '2023-07-14 07:37:13'),
(10, 'Anjum Akhtar', 'sweet@gmail.com', '7018766666', 'ghj', '2023-07-14 07:37:18'),
(11, 'Anjum Akhtar', 'sweet@gmail.com', '7018766666', 'ghj', '2023-07-14 07:37:25'),
(12, 'Anjum Akhtar', 'sweet@gmail.com', '7018766666', 'ghj', '2023-07-14 07:37:43'),
(13, 'Anjum Akhtar', 'sweet@gmail.com', '7018766666', 'ghj', '2023-07-14 07:37:50'),
(14, 'anu', 'anjum@example.com', '0945915127', 'dcd', '2023-07-14 08:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(100) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `discount_type` varchar(100) DEFAULT NULL,
  `cart_min_value` varchar(100) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `discount`, `discount_type`, `cart_min_value`, `create_date`, `update_date`) VALUES
(1, 'new10', '10', 'percent', '', '2023-07-28 13:31:47', '2023-07-28 13:31:47'),
(2, 'holiday', '500', 'flat', NULL, '2023-07-28 13:32:33', '2023-07-28 13:32:33'),
(3, 'anay', '500', 'flat', '6000', '2023-07-28 13:33:20', '2023-07-28 13:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_apply`
--

DROP TABLE IF EXISTS `coupon_apply`;
CREATE TABLE IF NOT EXISTS `coupon_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(50) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `value` varchar(20) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_apply`
--

INSERT INTO `coupon_apply` (`id`, `coupon_code`, `user_id`, `value`, `create_date`) VALUES
(1, 'new10', 'lei0k119rcgbl5a1mpgfqhqae3', '336', '2023-08-14 01:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_orders`
--

DROP TABLE IF EXISTS `coupon_orders`;
CREATE TABLE IF NOT EXISTS `coupon_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `cart_min_value` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_name` varchar(100) NOT NULL,
  `alt` text,
  `media_content` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `media_name`, `alt`, `media_content`, `create_date`, `update_date`) VALUES
(65, '41Vd+DgFn7L-1688538076.jpg', 'ye kaam hai Teacher Ji ka :-)', 'test', '2023-07-05 06:21:16', '2023-07-05 06:21:16'),
(54, 'women-1688374823.jpg', 'test imagem', '', '2023-07-03 09:00:23', '2023-07-03 09:00:23'),
(55, 'blog_1-1688376317.jpg', NULL, NULL, '2023-07-03 09:25:17', '2023-07-03 09:25:17'),
(56, 'children-1688376317.jpg', NULL, NULL, '2023-07-03 09:25:17', '2023-07-03 09:25:17'),
(57, 'cloth_1-1688376317.jpg', NULL, NULL, '2023-07-03 09:25:17', '2023-07-03 09:25:17'),
(58, 'cloth_2-1688376317.jpg', NULL, NULL, '2023-07-03 09:25:17', '2023-07-03 09:25:17'),
(59, 'cloth_3-1688376317.jpg', 'test imagem', '', '2023-07-03 09:25:17', '2023-07-03 09:25:17'),
(60, 'hero_1-1688376317.jpg', 'dqiq', '', '2023-07-03 09:25:17', '2023-07-03 09:25:17'),
(61, 'men-1688376317.jpg', NULL, NULL, '2023-07-03 09:25:17', '2023-07-03 09:25:17'),
(62, 'shoe_1-1688376317.jpg', NULL, NULL, '2023-07-03 09:25:17', '2023-07-03 09:25:17'),
(63, 'women-1688376317.jpg', NULL, NULL, '2023-07-03 09:25:17', '2023-07-03 09:25:17'),
(64, 'photos-viral-1688537691.jpg', NULL, NULL, '2023-07-05 06:14:51', '2023-07-05 06:14:51'),
(66, 'images (1)-1688538210.jpg', NULL, NULL, '2023-07-05 06:23:30', '2023-07-05 06:23:30'),
(67, 'images-1688538210.jpg', NULL, NULL, '2023-07-05 06:23:30', '2023-07-05 06:23:30'),
(68, 'download-1688538210.jpg', '', '', '2023-07-05 06:23:30', '2023-07-05 06:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `added_date`) VALUES
(1, 'anjum@livpure.com', '2023-06-16 17:15:05'),
(2, 'nn@nkmm', '2023-06-16 17:18:21'),
(3, 'ee@ff', '2023-06-16 17:18:32'),
(4, 'anjum@livpure.com', '2023-06-18 22:22:37'),
(5, 'anjum@livpure.com', '2023-06-18 22:23:13'),
(6, 'anjum@livpure.com', '2023-06-18 22:33:35'),
(7, 'anjum@livpure.com', '2023-06-18 22:33:43'),
(8, 'anjum@livpure.com', '2023-06-18 22:47:49'),
(9, 'mm@h', '2023-06-19 12:15:56'),
(10, 'ttm@gmail.com', '2023-06-28 17:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `email_notify` tinyint(4) NOT NULL DEFAULT '1',
  `pro_notify` tinyint(4) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_email`, `email_notify`, `pro_notify`, `date`) VALUES
(1, 'arshadjkhan1996@gmail.com', 1, 0, '2023-08-09 06:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `address_optional` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `order_notes` text NOT NULL,
  `order_price` float NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `payment_signature` varchar(255) DEFAULT NULL,
  `payment_status` varchar(50) NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `address_optional`, `city`, `state`, `pincode`, `country`, `company_name`, `ip_address`, `order_notes`, `order_price`, `payment_type`, `payment_id`, `payment_signature`, `payment_status`, `order_status`, `added_date`) VALUES
(1, 'Anjum', 'Akhtar', 'sweetangelanjum115@gmail.com', '7018216542', 'street test624', '', 'Gurugram', 'Delhi', '122022', 'india', 'Test company', '::1', 'This is test note.', 1800, 'cod', NULL, NULL, 'success', 1, '2023-08-04 19:49:17'),
(2, 'Anjum', 'Akhtar', 'sweetangelanjum115@gmail.com', '7018216542', 'street test624', '', 'Gurugram', 'Delhi', '122022', 'india', '', '::1', '', 500, 'prepaid', NULL, NULL, 'pending', 0, '2023-08-04 20:10:41'),
(3, 'anu', 'Dummy', 'anjum@example.com', '7459151276', 'steer1234', '', 'gurugram', 'Haryana', '122022', 'india', '', '::1', '', 500, 'prepaid', 'pay_MNUifOtcT1N4av', '59b3eeb9e23fea3af0056b3dfcd760d9bbd426cb674ae523e449d0402eab46a1', 'success', 1, '2023-08-08 07:31:42'),
(4, 'Arshad', 'khan', 'arshad.khan@livpure.com', '77859151276', 'steer1234', '', 'gurugram', 'Delhi', '122022', 'india', '', '::1', '', 3360, 'prepaid', NULL, NULL, 'pending', 0, '2023-08-14 18:33:52'),
(5, 'test', 'Akhtar', 'anjum@example.com', '08859151276', 'test111', '', 'gurugram', 'Delhi', '122022', 'india', 'ecom', '::1', '', 1000, 'cod', NULL, NULL, 'success', 1, '2023-09-12 17:28:07'),
(6, 'test', 'Akhtar', 'anjum@example.com', '08859151276', 'steer1234', 'road NH21', 'gurugram', 'Delhi', '122022', 'india', 'ecom', '::1', '', 500, 'prepaid', NULL, NULL, 'pending', 0, '2023-09-12 17:33:07'),
(7, 'Anjum', 'Akhtar', 'sweetangelanjum115@gmail.com', '7018216542', 'street test624', '', 'Gurugram', 'Delhi', '122022', 'india', '', '::1', '', 980, 'cod', NULL, NULL, 'success', 1, '2023-09-14 16:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_price` varchar(50) NOT NULL,
  `pro_sale_price` varchar(50) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `pro_id`, `pro_price`, `pro_sale_price`, `qty`) VALUES
(1, 1, 5, '1000', '800', 1),
(2, 1, 4, '600', '500', 1),
(3, 1, 3, '600', '500', 1),
(4, 2, 4, '600', '500', 1),
(5, 3, 3, '600', '500', 1),
(6, 4, 6, '600', '480', 7),
(7, 5, 3, '600', '500', 2),
(8, 6, 3, '600', '500', 1),
(9, 7, 6, '600', '480', 1),
(10, 7, 3, '600', '500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` text NOT NULL,
  `pro_slug` text NOT NULL,
  `long_desc` text,
  `short_desc` text,
  `reg_price` float DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `cat` varchar(255) DEFAULT NULL,
  `sub_cat` varchar(255) DEFAULT NULL,
  `pro_img` varchar(255) DEFAULT NULL,
  `pro_gallery` text,
  `stock` int(11) DEFAULT NULL,
  `pro_status` tinyint(4) NOT NULL DEFAULT '0',
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` varchar(100) NOT NULL,
  `update_by` varchar(100) DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_slug`, `long_desc`, `short_desc`, `reg_price`, `sale_price`, `cat`, `sub_cat`, `pro_img`, `pro_gallery`, `stock`, `pro_status`, `added_date`, `added_by`, `update_by`, `update_date`) VALUES
(3, 'top', 'top', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s.&amp;nbsp;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s&lt;/p&gt;', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s&lt;/p&gt;', 600, 500, 'women', '', 'cloth_1-1688376317.jpg', 'children-1688376317.jpg,cloth_3-1688376317.jpg,photos-viral-1688537691.jpg,cloth_1-1688376317.jpg,cloth_2-1688376317.jpg', 100, 0, '2023-06-05 13:01:12', 'anjum@livpure.com', 'anjum@livpure.com', '2023-06-05 13:01:12'),
(4, 'Tank Top Lorem IpsumÂ is simply dummy text.', 'tank-top', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s.&amp;nbsp;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s&lt;/p&gt;', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s.&lt;/p&gt;', 600, 500, 'children,women', '', '41Vd+DgFn7L-1688538076.jpg', 'children-1688376317.jpg,cloth_3-1688376317.jpg,photos-viral-1688537691.jpg,cloth_1-1688376317.jpg,cloth_2-1688376317.jpg', 60, 0, '2023-06-15 12:24:10', 'anjum@livpure.com', 'anjum@livpure.com', '2023-06-15 12:24:10'),
(5, 'Corater Lorem IpsumÂ is simply dummy text.', 'corater', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry.&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry.&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry.&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry.&lt;/p&gt;', '&lt;p&gt;Finding perfect t-shirtFinding perfect t-shirtFinding perfect t-shirtFinding perfect t-shirtFinding perfect t-shirtFinding perfect t-shirt.&lt;/p&gt;', 1000, 800, 'men,women', '', 'images (1)-1688538210.jpg', NULL, 40, 0, '2023-06-15 12:24:18', 'anjum@livpure.com', 'anjum@livpure.com', '2023-06-15 12:24:18'),
(6, 'Polo Shirt Lorem IpsumÂ is simply dummy text.', 'polo-shirt', '&lt;p&gt;Finding perfect products.&amp;nbsp;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry.&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry.&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry.&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry.&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry.&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry.&lt;/p&gt;', '&lt;p&gt;Finding perfect products&amp;nbsp;Finding perfect products&amp;nbsp;Finding perfect products&amp;nbsp;Finding perfect products&amp;nbsp;Finding perfect products&amp;nbsp;Finding perfect products&amp;nbsp;Finding perfect products&amp;nbsp;Finding perfect products&lt;/p&gt;', 600, 480, 'men', '', 'children-1688376317.jpg', NULL, 100, 0, '2023-06-15 12:24:25', 'anjum@livpure.com', 'anjum@livpure.com', '2023-06-15 12:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `notifications` tinyint(4) NOT NULL DEFAULT '1',
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `email`, `phone`, `gender`, `password`, `notifications`, `date`) VALUES
(1, 'Arshad', 'Jkhan', 'arshadjkhan1996@gmail.com', '9877666666', 'male', '$2y$10$gkhn2oIOV04hNAfg6mx2A.zTkylGObZNDPLky8IpJBdROVGfg7P9u', 1, '05-08-2023 00:43:17am'),
(2, 'Anjum', 'Akhtar', 'sweetangelanjum115@gmail.com', '7018216542', 'female', '$2y$10$ueb.d1AkhtinKxJdfiXp3.Mfh4XocNymRRSj.UdEobYSwGYZh.4be', 1, '05-08-2023 00:43:45am'),
(3, '', '', '', '', NULL, '$2y$10$9OL/szK.rc5tPRjT/Fc.VuOD51Cp1A/5wLmAlcgybRxda28vZkY2m', 1, '14-08-2023 23:56:32pm'),
(4, 'vfchg', 'vcnhc', 'fxgn', 'o987856454', NULL, '$2y$10$4d8p/1p8Ov5CLRkTuQvLZO.oMX/wj7VGeRo4Go2EB3It2CN3Zk2CC', 1, '14-08-2023 23:57:07pm'),
(5, 'Rubina', 'Tarannum', 'rubina.tarannum@livpure.com', '9876543226', NULL, '$2y$10$tS6ajUSJY4diuC2ZGr3zXunpQoykFy/Iw6QGDz3W/eLhw7oY7ib.a', 1, '12-02-2024 16:12:37pm'),
(6, 'Rubina1', 'Tarannum1', 'rubina.tarannum@livpure.com1', '9876543224', NULL, '$2y$10$6qjONG.T9Tro3ofZK.ILSuz5IcxKg00guoTiCLiH9hi7lSHFk1AEe', 1, '12-02-2024 16:14:53pm');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_cat_name` varchar(100) NOT NULL,
  `s_cat_url` varchar(100) NOT NULL,
  `cat_url` varchar(100) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `s_cat_name`, `s_cat_url`, `cat_url`, `added_by`, `update_by`, `added_date`, `update_date`) VALUES
(15, ' kitchen utensils', 'kitchen-utensils', 'food', 'anjum@livpure.com', 'anjum@livpure.com', '2023-07-25 04:24:32', '2023-07-25 04:24:32'),
(14, ' car', 'car', 'toys', 'anjum@livpure.com', 'anjum@livpure.com', '2023-07-25 04:24:13', '2023-07-25 04:24:13'),
(13, ' Heels', 'heels', 'shoes', 'anjum@livpure.com', 'anjum@livpure.com', '2023-07-25 04:24:04', '2023-07-25 04:24:04'),
(12, ' net saree', 'net-saree', 'saree', 'anjum@livpure.com', 'anjum@livpure.com', '2023-07-25 04:23:48', '2023-07-25 04:23:48'),
(11, ' jeans', 'jeans', 'clothes', 'anjum@livpure.com', 'anjum@livpure.com', '2023-05-29 07:15:02', '2023-05-29 07:15:02'),
(10, ' qwqw', 'qwqw', 'catnew', 'anjum@livpure.com', 'anjum@livpure.com', '2023-05-26 13:07:54', '2023-05-26 13:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `email`, `pro_id`, `date`) VALUES
(34, 'arshadjkhan1996@gmail.com', 4, '2023-08-08 09:50:10'),
(56, 'anjum@example.com', 6, '2023-09-20 07:06:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
