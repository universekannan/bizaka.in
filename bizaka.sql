-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 06:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bizaka`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `from_id`, `to_id`, `amount`, `customer_id`, `service_id`, `pay_id`, `service_status`, `ad_info`, `ad_info2`, `time`, `paydate`, `log_id`, `k_status`) VALUES
(1, '1', '2', '100.00', NULL, NULL, 9, 'IN Payment', 'Fund Transfer', NULL, '17:54:30', '2023-08-05', 1, 1),
(2, '2', '1', '100.00', NULL, NULL, 9, 'Out Payment', 'Fund Transfer', NULL, '17:54:30', '2023-08-05', 1, 1),
(3, '2', '4', '100.00', NULL, NULL, 10, 'IN Payment', 'Fund Transfer', NULL, '17:55:28', '2023-08-05', 2, 1),
(4, '4', '2', '100.00', NULL, NULL, 10, 'Out Payment', 'Fund Transfer', NULL, '17:55:28', '2023-08-05', 2, 1),
(5, '2', '8', '300', NULL, NULL, 5, 'IN Payment', 'Fund Transfer', NULL, '17:57:29', '2023-08-05', 2, 1),
(6, '8', '2', '300', NULL, NULL, 5, 'Out Payment', 'Fund Transfer', NULL, '17:57:29', '2023-08-05', 2, 1),
(7, '8', '8', '300', NULL, NULL, NULL, 'Out Payment', 'Activation', NULL, '17:57:44', '2023-08-05', 8, 1),
(8, '8', '2', '150', NULL, NULL, NULL, 'In Payment', 'Activation', NULL, '17:57:44', '2023-08-05', 8, 1),
(9, '2', '1', '150', NULL, NULL, NULL, 'In Payment', 'Activation', NULL, '17:57:44', '2023-08-05', 8, 1),
(10, '1', '8', '1000', NULL, NULL, 10, 'IN Payment', 'Fund Transfer', NULL, '18:11:00', '2023-08-05', 1, 1),
(11, '8', '1', '1000', NULL, NULL, 10, 'Out Payment', 'Fund Transfer', NULL, '18:11:00', '2023-08-05', 1, 1),
(12, '8', '12', '500', NULL, NULL, 12, 'IN Payment', 'Fund Transfer', NULL, '18:11:13', '2023-08-05', 8, 1),
(13, '12', '8', '500', NULL, NULL, 12, 'Out Payment', 'Fund Transfer', NULL, '18:11:13', '2023-08-05', 8, 1),
(14, '12', '12', '300', NULL, NULL, NULL, 'Out Payment', 'Activation', NULL, '18:11:56', '2023-08-05', 12, 1),
(15, '12', '8', '150', NULL, NULL, NULL, 'In Payment', 'Activation', NULL, '18:11:56', '2023-08-05', 12, 1),
(16, '8', '2', '10', NULL, NULL, NULL, 'In Payment', 'Activation', NULL, '18:11:56', '2023-08-05', 12, 1),
(17, '2', '1', '140', NULL, NULL, NULL, 'In Payment', 'Activation', NULL, '18:11:56', '2023-08-05', 12, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `request_payment`
--

INSERT INTO `request_payment` (`id`, `from_id`, `to_id`, `amount`, `req_time`, `req_date`, `status`, `req_image`) VALUES
(1, 2, 1, 100.00, '2023-07-22 16:07:26', '2023-07-22', 'Approved', '1.jpg'),
(2, 4, 2, 100.00, '2023-07-22 17:13:15', '2023-07-22', 'Approved', '2.jpg'),
(3, 2, 1, 1000.00, '2023-07-22 17:27:58', '2023-07-22', 'Approved', '3.webp'),
(4, 6, 1, 100.00, '2023-07-22 17:31:01', '2023-07-22', 'Approved', '4.webp'),
(5, 2, 1, 100.00, '2023-08-05 15:37:06', '2023-08-05', 'Approved', '5.jpg'),
(6, 2, 1, 350.00, '2023-08-05 16:37:03', '2023-08-05', 'Approved', '6.jpg'),
(7, 4, 2, 100.00, '2023-08-05 16:52:00', '2023-08-05', 'Approved', '7.psd'),
(8, 2, 1, 100.00, '2023-08-05 17:52:31', '2023-08-05', 'Approved', '8.jpg'),
(9, 2, 1, 100.00, '2023-08-05 17:54:19', '2023-08-05', 'Approved', '9.jpg'),
(10, 4, 2, 100.00, '2023-08-05 17:55:17', '2023-08-05', 'Approved', '10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
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
  `joined_date` varchar(20) DEFAULT NULL,
  `usertype_id` int(11) DEFAULT 0,
  `login_id` int(11) DEFAULT NULL,
  `referral_id` varchar(255) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `email`, `email_verified_at`, `plain_password`, `password`, `dob`, `status`, `maritial_status`, `aadhar_no`, `phone`, `gender`, `address`, `remember_token`, `wallet`, `upi`, `payment_qr_oode`, `created_at`, `updated_at`, `joined_date`, `usertype_id`, `login_id`, `referral_id`, `photo`) VALUES
(1, 0, 'Administrator', 'administrator@gmail.com', NULL, '123', '$2y$10$cIrs0d3SNe/KnrQyFHx5P./uLaV3wCjCQnR3dHupI3ayHzXffVp6C', NULL, 2, NULL, NULL, '9047736314', NULL, NULL, NULL, '992090', NULL, '1.png', '2023-06-25 13:00:20', '2023-06-25 13:00:20', NULL, 1, 1, '6499395e27c48', NULL),
(3, 1, 'Dexter', NULL, NULL, '7410', '$2y$10$QIZYfVdmtlIN2FIrRIE5o.Dma1FUOVTs/Si0ufpydmUCTe0sodmPe', NULL, 1, NULL, NULL, '9047736314', NULL, 'Test', NULL, '0', NULL, NULL, '2023-09-20 07:59:14', '2023-09-20 08:05:46', NULL, 3, NULL, '43663537', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `usertype_name` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `usertype_name`, `status`) VALUES
(1, 'Admin', 1),
(2, 'Staff', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `user_id`, `amount`, `req_time`, `status`, `pay_image`, `paid_time`) VALUES
(1, 2, 100.00, '2023-07-21 13:50:58', 'Completed', '1.jpg', '2023-07-21 13:51:14'),
(2, 2, 350.00, '2023-07-21 15:06:39', 'Completed', '2.jpg', '2023-07-21 15:07:52'),
(3, 2, 100.00, '2023-07-21 15:25:59', 'Completed', '3.jpg', '2023-07-21 15:26:42'),
(4, 2, 200.00, '2023-07-21 15:27:24', 'Completed', '4.webp', '2023-07-21 15:27:53'),
(5, 2, 100.00, '2023-07-22 14:54:32', 'Pending', NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request_payment`
--
ALTER TABLE `request_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
