-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 07:13 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cropicle_android`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img_src` varchar(500) NOT NULL,
  `text` varchar(500) NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Fruits', 'fruits_cartoon_image__1_-removebg-preview.png', 1, '2020-06-30 09:55:48', '2021-01-18 00:57:48'),
(2, 'Vegetable', 'vegetable_cartoon_image-removebg-preview.png', 1, '2021-01-16 10:21:36', '2021-01-18 00:58:31'),
(7, 'Bakery', 'bakery_image-removebg-preview.png', 1, '2021-01-18 05:29:03', '2021-01-18 05:29:03'),
(8, 'Drink', 'drink_image-removebg-preview_(1).png', 1, '2021-01-18 05:29:18', '2021-01-18 05:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(800) NOT NULL,
  `disc_type` varchar(100) NOT NULL,
  `disc_value` varchar(500) NOT NULL,
  `min_order_amt` varchar(500) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items_master`
--

CREATE TABLE `items_master` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 1,
  `max_order_qty` varchar(100) NOT NULL DEFAULT '10',
  `item_name` varchar(100) NOT NULL,
  `item_img` varchar(500) NOT NULL,
  `unit_id` int(11) DEFAULT 1,
  `item_price_kart` float DEFAULT NULL,
  `item_price_customer` float NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `category_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_master`
--

INSERT INTO `items_master` (`id`, `category_id`, `max_order_qty`, `item_name`, `item_img`, `unit_id`, `item_price_kart`, `item_price_customer`, `is_active`, `is_deleted`, `category_active`, `created_at`, `updated_at`) VALUES
(1, 1, '8', 'Apple', 'apple.jpg', 3, 170, 180, 0, 0, 1, '2020-06-30 07:41:52', '2020-12-22 01:30:42'),
(2, 1, '8', 'Potato', 'potato.jpeg', 1, 20, 30, 1, 0, 1, '2020-06-30 07:41:52', '2020-07-17 09:39:30'),
(3, 1, '8', 'Tomato', 'tomato.jpg', 1, 25, 40, 1, 0, 1, '2020-06-30 07:42:30', '2020-07-17 09:44:52'),
(5, 1, '2', 'Coriander', 'Coriander.jpg', 4, 15, 20, 1, 0, 1, '2020-06-30 07:43:07', '2020-07-17 09:40:16'),
(6, 1, '5', 'Carrot', 'carrots.jpg', 1, 40, 45, 1, 0, 1, '2020-06-30 07:43:07', '2020-07-17 09:39:40'),
(7, 1, '4', 'Grapes', 'grapes.jpg', 1, 80, 90, 1, 0, 1, '2020-06-30 07:43:59', '2020-07-17 09:45:20'),
(8, 1, '5', 'Banana', 'banana-removebg-preview.png', 1, 30, 40, 1, 0, 1, '2020-06-30 07:43:59', '2021-01-18 01:00:58'),
(9, 1, '8', 'Onion', 'Onion.jpg', 1, 60, 80, 1, 0, 1, '2020-06-30 07:44:51', '2020-07-17 09:39:51'),
(10, 1, '5', 'Watermelon', 'watermelon.jpg', 1, 40, 45, 1, 0, 1, '2020-06-30 07:44:51', '2020-06-30 07:44:51'),
(11, 1, '3', 'Ginger', 'ginger.jpg', 1, 90, 120, 1, 0, 1, '2020-06-30 07:45:29', '2021-01-18 02:14:53'),
(12, 1, '3', 'Garlic', 'garlic.jpg', 1, 50, 80, 1, 0, 1, '2020-06-30 07:45:29', '2020-07-17 09:45:52'),
(17, 2, '10', 'Marigold', 'defaultItem.jpg', 1, 30, 50, 1, 0, 1, '2020-08-31 13:56:59', '2020-12-22 01:15:07'),
(23, 1, '8', 'Gold - 1gm', 'defaultItem.jpg', 1, NULL, 5100, 1, 0, 1, '2021-01-15 07:47:16', '2021-01-15 03:18:23'),
(24, 7, '9', 'Cookies', 'bakery_cookies-removebg-preview.png', 1, NULL, 50, 1, 0, 1, '2021-01-18 05:33:08', '2021-01-18 05:33:08');

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
  `total_no_of_items` varchar(100) NOT NULL,
  `total_amt` varchar(100) NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_disc` varchar(500) DEFAULT NULL,
  `payable_amt` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `house_no` varchar(500) NOT NULL,
  `landmark` varchar(500) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `additional_notes` varchar(1000) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `admin_remarks` varchar(500) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_no_of_items`, `total_amt`, `coupon_id`, `coupon_disc`, `payable_amt`, `date`, `name`, `mobile_no`, `house_no`, `landmark`, `city`, `state`, `pincode`, `additional_notes`, `payment_type`, `status`, `admin_remarks`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, '2', '425', 0, NULL, '425', '2021-01-15', '', '', 'bhudhapara', 'share khan office', 'Raipur', 'CG', '492001', 'nothing', 'cash', 'REJECTED', 'Nahi bataunga', 0, '2021-01-15 06:17:19', '2021-01-15 06:17:19'),
(31, 44, '3', '405', NULL, NULL, '405', '19-01-2021', 'ramesh,', '7999107995', '101,', 'kushalpur', 'Raipur', 'Chhattisgarh', '492001', 'mast', 'COD', 'REJECTED', '', 0, '2021-01-19 12:16:41', '2021-01-19 12:16:41'),
(32, 44, '2', '360', NULL, NULL, '360', '20-01-2021', 'Raju', '7999107995', '101', 'kushalpur', 'Raipur', 'Chhattisgarh', '492001', 'Nice', 'COD', 'PENDING', '', 0, '2021-01-20 05:01:04', '2021-01-20 05:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `item_price_customer` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `qty`, `item_price_customer`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '160', '2021-01-15 12:26:24', '2021-01-15 12:26:24'),
(2, 1, 2, '3', '40', '2021-01-15 12:26:24', '2021-01-15 12:26:24'),
(122, 31, 2, '4', '30', '2021-01-19 12:16:41', '2021-01-19 12:16:41'),
(123, 31, 6, '1', '45', '2021-01-19 12:16:41', '2021-01-19 12:16:41'),
(124, 31, 9, '3', '80', '2021-01-19 12:16:41', '2021-01-19 12:16:41'),
(125, 32, 2, '4', '30', '2021-01-20 05:01:04', '2021-01-20 05:01:04'),
(126, 32, 9, '3', '80', '2021-01-20 05:01:04', '2021-01-20 05:01:04');

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
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
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
  `password` varchar(500) NOT NULL,
  `is_verified` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `otp_verified` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login_oauth_uid`, `role_id`, `name`, `mobile_no`, `password`, `is_verified`, `otp`, `otp_verified`, `is_active`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Admin', '8888888888', '$2y$10$IenBYZcELmjIdfY1i8cuv.AOOqHDi713h51w0hL.JvcFji4FdHBVi', 1, '', 1, 1, '2020-07-06 05:22:59', '2020-07-06 05:22:59'),
(13, NULL, 3, 'Ankur', '7894561230', '$2y$10$LHKBCjBcqoxtFJmODWwmAeP0QQnsW4a4FhqSNpTXXvVbUorsWiuiO', 1, '', 1, 1, '2020-07-27 10:23:16', '2020-08-06 05:19:30'),
(14, NULL, 2, 'Kart Ankur', '7894561231', '$2y$10$hPwNXEQkmA0KDArcp3AmZOMmIe0hjZ6rUSodQdH0QyMJFzdVgjYGG', 0, '', 0, 1, '2020-07-27 10:30:17', '2020-08-06 05:19:09'),
(40, '100529833051623983135', 3, 'Ankur Agrawal', '4444444441', '', 0, '', 0, 1, '2020-07-31 10:29:16', '2021-01-15 03:24:03'),
(42, NULL, 3, 'name_intent', '6549873210', '$2y$10$kFWXuBf975Q2oW0qQytJuu13n8ub6mEEYwqNS7dTxoYldvvm1cFDS', 1, '', 0, 1, '2021-01-18 08:00:24', '2021-01-18 08:00:24'),
(44, NULL, 3, 'Kamlesh', '7999107995', '$2y$10$VekZXpdEOLcpso.uesUxOuTA3CIdQBBCPa7HVdmgS3V5HrOFjf8wm', 1, '', 0, 1, '2021-01-18 10:11:30', '2021-01-19 08:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `house_no` varchar(500) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `name`, `mobile_no`, `house_no`, `landmark`, `city`, `state`, `pincode`, `is_default`, `created_at`, `updated_at`) VALUES
(4, 44, 'Pa', '7999107995', '101', 'kushalpur', 'Raipur', 'Chhattisgarh', '492001', 1, '2021-01-18 11:32:59', '2021-01-18 11:32:59'),
(5, 44, 'Ganesh', '8889358492', '103', 'Kushalpur', 'Raipur', 'Chhattisgarh', '492001', 1, '2021-01-18 12:24:06', '2021-01-18 12:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_token` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `profile_img` varchar(500) NOT NULL DEFAULT 'defaultUserImage.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `device_token`, `email`, `profile_img`, `created_at`, `updated_at`) VALUES
(8, 1, '', '', 'user.png', '2020-07-27 10:23:29', '2020-08-04 11:24:49'),
(9, 14, '', '', 'defaultUserImage.png', '2020-07-27 10:30:17', '2020-07-27 10:32:49'),
(21, 40, '', '', 'user.png', '2020-07-31 13:59:16', '2020-09-15 11:03:41'),
(23, 42, 'phoneintent', 'email_intent', 'defaultUserImage.png', '2021-01-18 08:00:25', '2021-01-18 08:00:25'),
(25, 44, 'djETwySZRvCKeTpde3mV7y:APA91bHooPSQJAxxiiIhUiZmldO_1VsaS3nNkI0Qly7U-bKst-LdO4nocSLBK-YdQdHiFXN7M-NlarfMyO4i3eDc6k3gcVTzk8eb7glf_aK6KvQX4pnZz6T9lieJ2b3Kc2onLVQDhQ2w', 'dundun@gmail.com', 'defaultUserImage.png', '2021-01-18 10:11:30', '2021-01-18 10:11:30');

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
(116, 1, 1, '2021-01-15 01:19:01', NULL, 1, '::1', 0, 0, 0, 0, 0),
(117, 1, 1, '2021-01-16 00:41:09', NULL, 1, '::1', 0, 0, 0, 0, 0),
(118, 1, 1, '2021-01-16 06:00:53', NULL, 1, '::1', 0, 0, 0, 0, 0),
(119, 1, 1, '2021-01-16 06:06:22', NULL, 1, '::1', 0, 0, 0, 0, 0),
(120, 1, 1, '2021-01-18 00:57:23', NULL, 1, '::1', 0, 0, 0, 0, 0),
(121, 1, 1, '2021-01-19 07:47:14', NULL, 1, '::1', 0, 0, 0, 0, 0),
(122, 1, 1, '2021-01-20 00:31:46', NULL, 1, '::1', 0, 0, 0, 0, 0);

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
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories_master`
--
ALTER TABLE `categories_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items_master`
--
ALTER TABLE `items_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
