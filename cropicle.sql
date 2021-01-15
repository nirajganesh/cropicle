-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 11:56 AM
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
-- Database: `cropicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img_src` varchar(500) NOT NULL,
  `img_src480w` varchar(500) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `img_src`, `img_src480w`, `text`) VALUES
(1, '1.jpg', '11.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories_master`
--

CREATE TABLE `categories_master` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `img_src` varchar(500) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_master`
--

INSERT INTO `categories_master` (`id`, `category_name`, `img_src`, `is_active`, `created`, `modified`) VALUES
(1, 'Fruits & vegetables', 'veg.jpg', 1, '2020-06-30 09:55:48', '2020-09-01 01:46:12'),
(2, 'Flowers', 'flower.jpg', 1, '2020-08-31 09:55:48', '2020-12-22 01:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `customer_demands`
--

CREATE TABLE `customer_demands` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `demand_amount` varchar(100) NOT NULL,
  `location_id` int(11) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `customer_remarks` varchar(500) NOT NULL,
  `admin_remarks` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `is_delivered` int(11) NOT NULL DEFAULT 0,
  `is_processed` int(11) NOT NULL DEFAULT 0,
  `notify` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_demands`
--

INSERT INTO `customer_demands` (`id`, `user_id`, `demand_amount`, `location_id`, `phone_no`, `address`, `customer_remarks`, `admin_remarks`, `status`, `is_delivered`, `is_processed`, `notify`, `created`, `modified`) VALUES
(11, 40, '340', 0, '4444444444', '', 'fgdfhtg', '', 'APPROVED', 1, 1, 0, '2020-07-31 14:04:31', '2020-09-10 09:35:12'),
(15, 13, '165', 1, '7894561230', 'fbf', '', '', 'APPROVED', 1, 0, 0, '2020-08-04 14:56:41', '2020-09-10 09:35:21'),
(17, 13, '0', 1, '7894561230', 'jygg', '', '', 'APPROVED', 0, 0, 1, '2020-08-05 11:44:54', '2020-08-05 11:44:54'),
(18, 13, '125', 1, '7894561230', 'vsvds', '', '', 'APPROVED', 0, 0, 1, '2020-08-05 11:46:59', '2020-08-05 11:46:59'),
(20, 13, '160', 1, '7894561230', '', '', '', 'REJECTED', 0, 0, 1, '2020-08-05 11:57:16', '2020-08-05 11:57:16'),
(23, 13, '40', 1, '7894561230', 'dsvs', '', '', 'APPROVED', 0, 0, 1, '2020-08-05 12:26:40', '2020-08-05 12:26:40'),
(24, 13, '30', 1, '7894561230', 'sdgsfdgsgsd', '', '', 'APPROVED', 0, 0, 1, '2020-08-05 12:27:21', '2020-08-05 12:27:21'),
(26, 1, '170', 0, '8888888888', 'gfd', 'Customer name & no. : ss (7897897897)', '', 'APPROVED', 0, 1, 1, '2020-09-07 16:33:46', '2020-09-07 16:33:46'),
(27, 1, '180', 0, '8888888888', 'dgergreg', 'Customer name & no. : dd (7897987987)', '', 'APPROVED', 1, 1, 1, '2020-09-07 18:05:00', '2020-09-10 09:44:51'),
(28, 40, '90', 4, '4444444444', 'c vfd', '', '', 'APPROVED', 0, 1, 1, '2020-09-15 14:05:17', '2020-09-15 14:05:17'),
(29, 40, '40', 4, '4444444444', 'c vfd', '7894567666. Unchecked profile number update. ', '', 'APPROVED', 0, 1, 1, '2020-09-15 14:30:29', '2020-09-15 14:30:29'),
(30, 40, '20', 4, '4444444444', 'c vfd', '', '', 'APPROVED', 1, 1, 1, '2020-09-15 14:31:37', '2020-09-15 13:46:01'),
(31, 40, '30', 4, '4444444444', 'c vfd', '', '', 'APPROVED', 0, 0, 1, '2020-09-15 14:32:03', '2020-09-15 14:32:03'),
(32, 40, '30', 2, '4444444444', 'c vfd', '', '', 'APPROVED', 1, 1, 1, '2020-09-15 14:34:16', '2020-09-15 13:41:07'),
(33, 40, '40', 2, '4444444444', 'c vfd', '', '', 'APPROVED', 1, 1, 1, '2020-09-15 14:35:28', '2020-09-15 13:41:03'),
(34, 40, '40', 2, '5555555555', 'c vfd', '', '', 'APPROVED', 1, 1, 1, '2020-09-15 14:35:55', '2020-09-15 13:38:50'),
(35, 1, '30', 0, '4564564545', 'fg', 'Customer name & no. : ff (4564564545)', '', 'PENDING', 1, 1, 1, '2020-09-17 10:18:40', '2020-09-17 06:58:00'),
(36, 1, '120', 0, '9896968686', '698', 'Customer name & no. : gfg (9896968686)', 'again 36\r\n', 'APPROVED', 0, 0, 1, '2020-09-17 11:24:30', '2020-09-17 11:24:30'),
(37, 1, '20', 0, '9874564321', 'dfd', 'Customer name & no. : Testing (9874564321)', '', 'PENDING', 0, 0, 0, '2020-09-18 05:58:06', '2020-09-18 05:58:06'),
(38, 1, '80', 0, '8798787878', 'df', 'Customer name & no. : fvfg (8798787878)', '', 'PENDING', 0, 0, 0, '2020-09-18 07:08:08', '2020-09-18 07:08:08'),
(39, 1, '1800', 0, '2354345358', 'ght', 'Customer name & no. : fgh (2354345358)', '', 'PENDING', 0, 0, 0, '2020-09-18 07:46:28', '2020-09-18 07:46:28'),
(40, 41, '65', 1, '6549876546', 'kjn', 'Customer name & no. : jj (6549876546)', '', 'PENDING', 0, 0, 0, '2020-09-21 05:23:44', '2020-09-21 05:23:44'),
(41, 41, '90', 2, '9876547845', 'dht', '', '', 'PENDING', 0, 0, 0, '2020-09-21 06:02:30', '2020-09-21 06:02:30'),
(42, 41, '190', 4, '8877998877', 'gbgth', '', '', 'REJECTED', 0, 0, 0, '2020-09-21 06:16:18', '2020-09-21 06:16:18'),
(43, 41, '22.5', 4, '3233333333', 'hng', '', '', 'REJECTED', 0, 0, 0, '2020-09-21 06:16:49', '2020-09-21 06:16:49'),
(44, 41, '22.5', 4, '4444444444', 'yj', '', '', 'APPROVED', 0, 0, 0, '2020-09-21 06:17:33', '2020-09-21 06:17:33'),
(45, 41, '380', 2, '4444444444', 'gheyjdsxooefiupfi3', '', 'maan ja bhai', 'APPROVED', 1, 1, 0, '2020-12-22 05:47:46', '2020-12-22 01:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `customer_demand_details`
--

CREATE TABLE `customer_demand_details` (
  `id` int(11) NOT NULL,
  `customer_demand_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_price_customer` varchar(100) NOT NULL,
  `item_quantity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_demand_details`
--

INSERT INTO `customer_demand_details` (`id`, `customer_demand_id`, `item_id`, `item_price_customer`, `item_quantity`) VALUES
(31, 11, 10, '45', '1'),
(32, 11, 9, '80', '1'),
(33, 11, 8, '40', '1'),
(34, 11, 2, '30', '1'),
(35, 11, 1, '145', '1'),
(45, 15, 8, '40', '1'),
(46, 15, 9, '80', '1'),
(47, 15, 10, '45', '1'),
(52, 18, 10, '45', '1'),
(53, 18, 9, '80', '1'),
(54, 20, 5, '160', '1'),
(57, 23, 3, '40', '1'),
(58, 24, 2, '30', '1'),
(59, 26, 3, '40', '2'),
(60, 26, 2, '30', '1'),
(61, 26, 11, '120', '0.5'),
(62, 27, 12, '80', '0.25'),
(63, 27, 5, '160', '1'),
(64, 28, 2, '30', '1'),
(65, 28, 3, '40', '1'),
(66, 28, 5, '20', '1'),
(67, 29, 3, '40', '1'),
(68, 30, 5, '20', '1'),
(69, 31, 2, '30', '1'),
(70, 32, 11, '120', '0.25'),
(71, 33, 3, '40', '1'),
(72, 34, 8, '40', '1'),
(73, 35, 11, '120', '0.25'),
(74, 36, 11, '120', '1'),
(75, 37, 12, '80', '0.25'),
(76, 38, 9, '80', '1'),
(77, 39, 9, '80', '22'),
(78, 39, 5, '20', '2'),
(79, 40, 12, '80', '0.25'),
(80, 40, 6, '45', '1'),
(81, 41, 2, '30', '1'),
(82, 41, 3, '40', '1'),
(83, 41, 5, '20', '1'),
(84, 42, 1, '190', '1'),
(85, 43, 6, '45', '0.5'),
(86, 44, 6, '45', '0.5'),
(87, 45, 1, '190', '2');

-- --------------------------------------------------------

--
-- Table structure for table `demand_lists`
--

CREATE TABLE `demand_lists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(50) NOT NULL,
  `modified_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demand_lists`
--

INSERT INTO `demand_lists` (`id`, `user_id`, `name`, `is_active`, `is_deleted`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(36, 14, 'tdb', 1, 0, '2020-08-01 07:59:43', '2020-08-01 07:59:43', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `demand_lists_details`
--

CREATE TABLE `demand_lists_details` (
  `id` int(11) NOT NULL,
  `demand_list_id` int(11) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `qty` float NOT NULL,
  `unit_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(50) NOT NULL,
  `modified_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demand_lists_details`
--

INSERT INTO `demand_lists_details` (`id`, `demand_list_id`, `item_id`, `qty`, `unit_id`, `is_active`, `is_deleted`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(84, 30, '1', 8, 1, 1, 0, '2020-07-27 10:33:07', '2020-07-27 10:33:07', '', ''),
(85, 30, '3', 10, 1, 1, 0, '2020-07-27 10:33:07', '2020-07-27 10:33:07', '', ''),
(86, 31, '3', 8, 1, 1, 0, '2020-08-01 07:22:27', '2020-08-01 07:22:27', '', ''),
(87, 32, '8', 5, 1, 1, 0, '2020-08-01 07:22:33', '2020-08-01 07:22:33', '', ''),
(88, 33, '6', 5, 1, 1, 0, '2020-08-01 07:22:39', '2020-08-01 07:22:39', '', ''),
(89, 34, '4', 8, 1, 1, 0, '2020-08-01 07:22:54', '2020-08-01 07:22:54', '', ''),
(90, 35, '7', 4, 1, 1, 0, '2020-08-01 07:26:48', '2020-08-01 07:26:48', '', ''),
(91, 36, '3', 8, 1, 1, 0, '2020-08-01 07:59:43', '2020-08-01 07:59:43', '', ''),
(92, 36, '7', 4, 1, 1, 0, '2020-08-01 07:59:43', '2020-08-01 07:59:43', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `items_master`
--

CREATE TABLE `items_master` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 1,
  `max_order_qty` varchar(100) NOT NULL,
  `buying_qtys` varchar(500) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_img` varchar(500) NOT NULL,
  `unit_id` int(11) NOT NULL DEFAULT 1,
  `item_price_kart` varchar(100) NOT NULL,
  `item_price_customer` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `category_active` int(11) NOT NULL DEFAULT 1,
  `admin_item` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_master`
--

INSERT INTO `items_master` (`id`, `category_id`, `max_order_qty`, `buying_qtys`, `item_name`, `item_img`, `unit_id`, `item_price_kart`, `item_price_customer`, `is_active`, `category_active`, `admin_item`, `created`, `modified`) VALUES
(1, 1, '8', '1|2|3|4|5', 'Apple', 'apple.jpg', 3, '170', '190', 1, 1, 0, '2020-06-30 07:41:52', '2020-12-22 01:30:42'),
(2, 1, '8', '1|2|3|4|5', 'Potato', 'potato.jpeg', 1, '20', '30', 1, 1, 0, '2020-06-30 07:41:52', '2020-07-17 09:39:30'),
(3, 1, '8', '1|2|3|4|5', 'Tomato', 'tomato.jpg', 1, '25', '40', 1, 1, 0, '2020-06-30 07:42:30', '2020-07-17 09:44:52'),
(5, 1, '2', '1|2|3|4', 'Coriander', 'Coriander.jpg', 4, '15', '20', 1, 1, 0, '2020-06-30 07:43:07', '2020-07-17 09:40:16'),
(6, 1, '5', '0.5|1|1.5|2|2.5', 'Carrot', 'carrots.jpg', 1, '40', '45', 1, 1, 0, '2020-06-30 07:43:07', '2020-07-17 09:39:40'),
(7, 1, '4', '0.5|1|2|3|4', 'Grapes', 'grapes.jpg', 1, '80', '90', 1, 1, 0, '2020-06-30 07:43:59', '2020-07-17 09:45:20'),
(8, 1, '5', '1|2|3|4|5|6|7', 'Banana', 'defaultItem.jpg', 1, '30', '40', 0, 1, 0, '2020-06-30 07:43:59', '2020-12-22 01:36:29'),
(9, 1, '8', '0.25|0.5|1|2|3|4', 'Onion', 'Onion.jpg', 1, '60', '80', 1, 1, 0, '2020-06-30 07:44:51', '2020-07-17 09:39:51'),
(10, 1, '5', '1|2|3', 'Watermelon', 'watermelon.jpg', 1, '40', '45', 1, 1, 0, '2020-06-30 07:44:51', '2020-06-30 07:44:51'),
(11, 1, '3', '0.2|0.4|0.5|0.75|1|2|3', 'Ginger', 'ginger.jpg', 1, '90', '120', 0, 1, 0, '2020-06-30 07:45:29', '2020-09-18 06:32:15'),
(12, 1, '3', '0.1|0.25|0.5|0.75|1|1.5|2', 'Garlic', 'garlic.jpg', 1, '50', '80', 1, 1, 0, '2020-06-30 07:45:29', '2020-07-17 09:45:52'),
(17, 2, '10', '0.1|0.25|0.5|0.75|1|1.5|2', 'Marigold', 'defaultItem.jpg', 1, '30', '50', 1, 1, 0, '2020-08-31 13:56:59', '2020-12-22 01:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `locations_master`
--

CREATE TABLE `locations_master` (
  `id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin_code` varchar(15) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations_master`
--

INSERT INTO `locations_master` (`id`, `area`, `city`, `state`, `pin_code`, `is_active`, `created`, `modified`) VALUES
(1, 'Budhapara', 'Raipur', 'CG', '492001', 1, '2020-07-08 07:29:24', '2020-08-06 05:18:56'),
(2, 'Shankar nagar', 'Raipur', 'CG', '492007', 1, '2020-07-08 07:29:24', '2020-07-08 07:29:24'),
(4, 'Avanti', 'Raipur', 'CG', '492003', 1, '2020-07-08 09:41:14', '2020-07-08 06:14:37'),
(5, 'VIP Road', 'Raipur', 'CG', '492000', 1, '2020-07-08 09:42:23', '2020-07-08 09:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `notice_ribbon`
--

CREATE TABLE `notice_ribbon` (
  `id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice_ribbon`
--

INSERT INTO `notice_ribbon` (`id`, `text`, `is_active`) VALUES
(4, '<strong>IMPORTANT NOTICE: </strong> Delivery schedules for all orders can be affected due to Janta Curfew on the following dates: 19/09/2020 and 20/09/2020', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_qty` varchar(100) NOT NULL,
  `total_amt` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `updated_by_hawker` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_qty`, `total_amt`, `date`, `payment_type`, `status`, `updated_by_hawker`, `is_deleted`) VALUES
(27, 14, '18', '1370', '2020-07-27', 'CASH', 'DELIVERED', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL DEFAULT 1,
  `qty` varchar(100) NOT NULL,
  `remaining_qty` varchar(100) NOT NULL,
  `item_price_kart` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `unit_id`, `qty`, `remaining_qty`, `item_price_kart`, `created`, `updated`) VALUES
(117, 27, 3, 1, '10.00', '2.00', '25', '2020-07-27 10:35:04', '2020-07-27 10:35:34'),
(118, 27, 1, 1, '8.00', '1', '140', '2020-07-27 10:35:04', '2020-07-27 10:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `api_payment_id` varchar(1000) NOT NULL,
  `api_order_id` varchar(1000) NOT NULL,
  `api_signature` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) DEFAULT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'KART ADMIN'),
(2, 'KART'),
(3, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `unit_short_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `unit_short_name`) VALUES
(1, 'kilogram', 'kg'),
(2, 'piece', 'pc'),
(3, 'dozen', 'dzn'),
(4, 'bunch', 'bunch'),
(5, 'litre', 'L'),
(6, 'quintal', 'qntl'),
(7, 'bora', 'bora'),
(8, 'grams', 'gm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login_oauth_uid` varchar(200) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `is_verified` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `otp_verified` int(11) NOT NULL,
  `pwd_reset_token` varchar(100) NOT NULL,
  `token_expire_at` date NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login_oauth_uid`, `role_id`, `name`, `mobile_no`, `email`, `password`, `is_verified`, `otp`, `otp_verified`, `pwd_reset_token`, `token_expire_at`, `is_active`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, NULL, 1, 'Admin', '8888888888', 'admin@cropicle.com', '$2y$10$IenBYZcELmjIdfY1i8cuv.AOOqHDi713h51w0hL.JvcFji4FdHBVi', 1, '', 1, '', '0000-00-00', 1, '2020-07-06 05:22:59', '2020-07-06 05:22:59', 0, 0),
(13, NULL, 3, 'Ankur', '7894561230', 'dcd@sds.c', '$2y$10$LHKBCjBcqoxtFJmODWwmAeP0QQnsW4a4FhqSNpTXXvVbUorsWiuiO', 1, '', 1, '', '0000-00-00', 1, '2020-07-27 10:23:16', '2020-08-06 05:19:30', 0, 0),
(14, NULL, 2, 'Kart Ankur', '7894561231', '', '$2y$10$hPwNXEQkmA0KDArcp3AmZOMmIe0hjZ6rUSodQdH0QyMJFzdVgjYGG', 0, '', 0, '', '0000-00-00', 1, '2020-07-27 10:30:17', '2020-08-06 05:19:09', 0, 0),
(40, '100529833051623983135', 3, 'Ankur Agrawal', '4444444444', 'ankbiz32@gmail.com', '', 0, '', 0, '', '0000-00-00', 1, '2020-07-31 10:29:16', '2020-09-15 11:03:41', 0, 0),
(41, '104462354514848636575', 3, 'Ankur Agrawal', '4444444444', 'ankur.agr32@gmail.com', '', 0, '', 0, '', '0000-00-00', 1, '2020-07-31 15:41:06', '2020-07-31 19:11:06', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aadhaar_license` varchar(100) NOT NULL,
  `capacity_kart` int(11) NOT NULL,
  `sales_qty_daily` float NOT NULL,
  `source_purchase` varchar(500) NOT NULL,
  `bank_name` varchar(500) NOT NULL,
  `holder_name` varchar(100) NOT NULL,
  `acc_no` varchar(100) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `profile_img` varchar(500) NOT NULL,
  `location_id` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(20) NOT NULL,
  `modified_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `email`, `aadhaar_license`, `capacity_kart`, `sales_qty_daily`, `source_purchase`, `bank_name`, `holder_name`, `acc_no`, `ifsc_code`, `latitude`, `longitude`, `profile_img`, `location_id`, `address`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(8, 13, '', '', 0, 0, '', '', '', '', '', '', '', 'user.png', 1, '', '2020-07-27 10:23:29', '2020-08-04 11:24:49', '', ''),
(9, 14, '', '', 200, 0, '', '', '', '', '', '', '', '', 1, '', '2020-07-27 10:30:17', '2020-07-27 10:32:49', '', ''),
(21, 40, '', '', 0, 0, '', '', '', '', '', '', '', 'user.png', 2, 'c vfd', '2020-07-31 13:59:16', '2020-09-15 11:03:41', '', ''),
(22, 41, '', '', 0, 0, '', '', '', '', '', '', '', 'user.png', 0, '', '2020-07-31 19:11:06', '2020-07-31 19:11:06', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `login_time` timestamp NULL DEFAULT current_timestamp(),
  `logout_time` timestamp NULL DEFAULT NULL,
  `is_logged_in` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `role_id`, `login_time`, `logout_time`, `is_logged_in`, `ip_address`, `is_active`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(71, 14, 2, '2020-07-27 10:31:48', NULL, 1, '122168', 0, 0, 0, 0, 0),
(72, 1, 1, '2020-07-29 03:17:59', NULL, 1, '0', 0, 0, 0, 0, 0),
(73, 1, 1, '2020-07-29 04:17:42', NULL, 1, '0', 0, 0, 0, 0, 0),
(74, 1, 1, '2020-08-01 03:33:28', '2020-08-01 07:37:14', 0, '0', 0, 0, 0, 0, 0),
(75, 14, 2, '2020-08-01 03:34:48', NULL, 1, '0', 0, 0, 0, 0, 0),
(76, 1, 1, '2020-08-04 11:22:19', NULL, 1, '0', 0, 0, 0, 0, 0),
(77, 1, 1, '2020-08-05 08:14:05', NULL, 1, '0', 0, 0, 0, 0, 0),
(78, 1, 1, '2020-08-06 03:39:07', NULL, 1, '0', 0, 0, 0, 0, 0),
(79, 14, 2, '2020-08-06 06:17:15', NULL, 1, '0', 0, 0, 0, 0, 0),
(80, 1, 1, '2020-08-07 13:09:46', NULL, 1, '0', 0, 0, 0, 0, 0),
(81, 1, 1, '2020-08-08 15:03:10', NULL, 1, '0', 0, 0, 0, 0, 0),
(82, 1, 1, '2020-08-15 00:59:37', NULL, 1, '0', 0, 0, 0, 0, 0),
(83, 1, 1, '2020-08-31 04:32:35', NULL, 1, '::1', 0, 0, 0, 0, 0),
(84, 1, 1, '2020-08-31 08:42:38', NULL, 1, '::1', 0, 0, 0, 0, 0),
(85, 1, 1, '2020-09-01 03:07:45', NULL, 1, '::1', 0, 0, 0, 0, 0),
(86, 1, 1, '2020-09-02 13:28:08', NULL, 1, '::1', 0, 0, 0, 0, 0),
(87, 1, 1, '2020-09-03 03:31:41', NULL, 1, '::1', 0, 0, 0, 0, 0),
(88, 1, 1, '2020-09-03 04:16:26', NULL, 1, '::1', 0, 0, 0, 0, 0),
(89, 1, 1, '2020-09-03 13:37:55', NULL, 1, '::1', 0, 0, 0, 0, 0),
(90, 1, 1, '2020-09-05 11:05:40', NULL, 1, '::1', 0, 0, 0, 0, 0),
(91, 1, 1, '2020-09-07 05:54:14', NULL, 1, '::1', 0, 0, 0, 0, 0),
(92, 14, 2, '2020-09-07 06:03:28', NULL, 1, '::1', 0, 0, 0, 0, 0),
(93, 1, 1, '2020-09-07 07:59:32', NULL, 1, '::1', 0, 0, 0, 0, 0),
(94, 14, 2, '2020-09-07 08:00:19', NULL, 1, '::1', 0, 0, 0, 0, 0),
(95, 1, 1, '2020-09-08 14:42:35', NULL, 1, '::1', 0, 0, 0, 0, 0),
(96, 1, 1, '2020-09-10 06:07:25', NULL, 1, '::1', 0, 0, 0, 0, 0),
(97, 1, 1, '2020-09-10 08:29:28', NULL, 1, '::1', 0, 0, 0, 0, 0),
(98, 1, 1, '2020-09-12 10:13:17', NULL, 1, '::1', 0, 0, 0, 0, 0),
(99, 1, 1, '2020-09-15 10:29:23', NULL, 1, '::1', 0, 0, 0, 0, 0),
(100, 1, 1, '2020-09-15 10:59:02', NULL, 1, '::1', 0, 0, 0, 0, 0),
(101, 1, 1, '2020-09-15 11:04:24', NULL, 1, '::1', 0, 0, 0, 0, 0),
(102, 1, 1, '2020-09-15 13:03:39', NULL, 1, '::1', 0, 0, 0, 0, 0),
(103, 1, 1, '2020-09-16 06:24:08', NULL, 1, '::1', 0, 0, 0, 0, 0),
(104, 1, 1, '2020-09-17 02:17:59', NULL, 1, '::1', 0, 0, 0, 0, 0),
(105, 1, 1, '2020-09-17 06:44:02', NULL, 1, '::1', 0, 0, 0, 0, 0),
(106, 1, 1, '2020-09-18 01:45:48', NULL, 1, '::1', 0, 0, 0, 0, 0),
(107, 1, 1, '2020-09-18 02:27:41', NULL, 1, '::1', 0, 0, 0, 0, 0),
(108, 1, 1, '2020-09-18 08:09:58', NULL, 1, '::1', 0, 0, 0, 0, 0),
(109, 1, 1, '2020-09-18 09:21:29', NULL, 1, '::1', 0, 0, 0, 0, 0),
(110, 1, 1, '2020-09-19 01:55:54', NULL, 1, '::1', 0, 0, 0, 0, 0),
(111, 1, 1, '2020-09-19 07:08:38', NULL, 1, '::1', 0, 0, 0, 0, 0),
(112, 1, 1, '2020-09-21 01:53:04', NULL, 1, '::1', 0, 0, 0, 0, 0),
(113, 1, 1, '2020-09-21 02:45:28', NULL, 1, '::1', 0, 0, 0, 0, 0),
(114, 1, 1, '2020-09-21 02:49:44', NULL, 1, '::1', 0, 0, 0, 0, 0),
(115, 1, 1, '2020-12-22 01:10:20', '2020-12-22 01:48:54', 0, '::1', 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_master`
--
ALTER TABLE `categories_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_demands`
--
ALTER TABLE `customer_demands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_demand_details`
--
ALTER TABLE `customer_demand_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand_lists`
--
ALTER TABLE `demand_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand_lists_details`
--
ALTER TABLE `demand_lists_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_master`
--
ALTER TABLE `items_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations_master`
--
ALTER TABLE `locations_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_ribbon`
--
ALTER TABLE `notice_ribbon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories_master`
--
ALTER TABLE `categories_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_demands`
--
ALTER TABLE `customer_demands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `customer_demand_details`
--
ALTER TABLE `customer_demand_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `demand_lists`
--
ALTER TABLE `demand_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `demand_lists_details`
--
ALTER TABLE `demand_lists_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `items_master`
--
ALTER TABLE `items_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `locations_master`
--
ALTER TABLE `locations_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notice_ribbon`
--
ALTER TABLE `notice_ribbon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
