-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 07:32 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aaranetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_id` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `to_id` varchar(10) DEFAULT NULL,
  `amount` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `pay_id` int(11) DEFAULT NULL,
  `service_status` varchar(20) DEFAULT NULL,
  `ad_info` varchar(100) DEFAULT NULL,
  `ad_info2` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `paydate` varchar(50) DEFAULT NULL,
  `log_id` int(11) DEFAULT NULL,
  `k_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `from_id`, `to_id`, `amount`, `customer_id`, `service_id`, `pay_id`, `service_status`, `ad_info`, `ad_info2`, `time`, `paydate`, `log_id`, `k_status`) VALUES
(1, '1', '1', '1000000', NULL, NULL, NULL, 'IN Payment', 'Fund Transfer', NULL, '16:52:37', '2023-07-11', 1, 1),
(2, '1', '2', '1500', NULL, NULL, 2, 'IN Payment', 'Fund Transfer', NULL, '16:53:02', '2023-07-11', 1, 1),
(3, '2', '1', '1500', NULL, NULL, 2, 'Out Payment', 'Fund Transfer', NULL, '16:53:02', '2023-07-11', 1, 1),
(4, '1', '3', '1500', NULL, NULL, 4, 'IN Payment', 'Fund Transfer', NULL, '16:54:03', '2023-07-11', 1, 1),
(5, '3', '1', '1500', NULL, NULL, 4, 'Out Payment', 'Fund Transfer', NULL, '16:54:03', '2023-07-11', 1, 1),
(6, '1', '3', '300', NULL, NULL, NULL, 'Out Payment', 'Activation', NULL, '16:54:24', '2023-07-11', 3, 1),
(7, '3', '1', '300', NULL, NULL, NULL, 'In Payment', 'Commission', NULL, '16:54:24', '2023-07-11', 3, 1),
(8, '1', '2', '300', NULL, NULL, NULL, 'Out Payment', 'Activation', NULL, '16:57:20', '2023-07-11', 2, 1),
(9, '2', '1', '300', NULL, NULL, NULL, 'In Payment', 'Commission', NULL, '16:57:20', '2023-07-11', 2, 1),
(10, '2', '4', '300', NULL, NULL, 10, 'IN Payment', 'Fund Transfer', NULL, '17:05:59', '2023-07-11', 2, 1),
(11, '4', '2', '300', NULL, NULL, 10, 'Out Payment', 'Fund Transfer', NULL, '17:05:59', '2023-07-11', 2, 1),
(12, '2', '4', '300', NULL, NULL, NULL, 'Out Payment', 'Activation', NULL, '17:06:35', '2023-07-11', 2, 1),
(13, '4', '2', '150', NULL, NULL, NULL, 'In Payment', 'Commission', NULL, '17:06:35', '2023-07-11', 2, 1),
(14, '2', '1', '150', NULL, NULL, NULL, 'In Payment', 'Commission', NULL, '17:06:35', '2023-07-11', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_payment`
--

CREATE TABLE `request_payment` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `req_time` varchar(20) DEFAULT NULL,
  `req_date` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `req_image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `plain_password` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `maritial_status` varchar(20) DEFAULT NULL,
  `aadhar_no` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `wallet` varchar(50) DEFAULT '0',
  `upi` varchar(50) DEFAULT NULL,
  `payment_qr_oode` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype_id` int(11) DEFAULT 0,
  `login_id` int(11) DEFAULT NULL,
  `referral_id` varchar(255) DEFAULT NULL,
  `joined_date` varchar(20) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `email`, `email_verified_at`, `plain_password`, `password`, `dob`, `status`, `maritial_status`, `aadhar_no`, `phone`, `gender`, `address`, `remember_token`, `wallet`, `upi`, `payment_qr_oode`, `created_at`, `updated_at`, `usertype_id`, `login_id`, `referral_id`, `joined_date`, `photo`) VALUES
(1, 0, 'Administrator', 'administrator@gmail.com', NULL, '12345678', '$2y$10$gMKkB0s2IF/iUDcIhThk9esA0QKrU/g3/yQqv4lOtqN/trTrhjOwq', NULL, 2, NULL, NULL, '9047736314', NULL, NULL, NULL, '997750', NULL, NULL, '2023-06-25 18:30:20', '2023-06-25 18:30:20', 1, 1, '6499395e27c48', NULL, NULL),
(2, 1, 'SUHAIL SYED', 'ziyagroups06@gmail.com', NULL, 'Suhail@06', '$2y$10$QPTWZXtpUVWDdR8sqqKDD.sVvaljdZWF49koSL48xbSxUEGDxNxn.', NULL, 2, NULL, NULL, '8270826067', NULL, NULL, NULL, '1050', NULL, NULL, '2023-07-11 16:47:41', '2023-07-11 16:56:23', 2, NULL, '64ad3a55916ab', NULL, NULL),
(3, 1, 'Galaxy Kannan', 'universekannan@gmail.com', NULL, '12345678', '$2y$10$8LaADHeafG0Ueh4Ggwde2.II.qK21FuTw7NUmF1nojLjRiJzXtjDe', NULL, 2, NULL, NULL, '9443587282', NULL, NULL, NULL, '1200', NULL, NULL, '2023-07-11 16:47:50', NULL, 2, NULL, '64ad3a5e6f505', NULL, NULL),
(4, 2, 'nisha', 'nisha@gmail.com', NULL, '6053', '$2y$10$6yc9uDQlsgOIBiMyIG8.leTdnH9F47W9e8P3tMOWAT2uMcVIZZYNe', NULL, 2, NULL, NULL, '1234567890', NULL, NULL, NULL, '0', NULL, NULL, '2023-07-11 17:03:59', NULL, 2, NULL, '64ad3e2776092', NULL, NULL),
(5, 2, 'hyder', 'hyder@gmail.com', NULL, '1701', '$2y$10$V30ER5v9L5.QYX/taMtXXekIOI6wIpmulFkLPr4VwqY.Evm5WtLvW', NULL, 1, NULL, NULL, '9876543210', NULL, NULL, NULL, '0', NULL, NULL, '2023-07-11 17:04:44', NULL, 2, NULL, '64ad3e5407ee7', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `usertype_name` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `usertype_name`, `status`) VALUES
(1, 'Admin', 1),
(2, 'Member', 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `req_time` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `pay_image` varchar(20) DEFAULT NULL,
  `paid_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_payment`
--
ALTER TABLE `request_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `request_payment`
--
ALTER TABLE `request_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
