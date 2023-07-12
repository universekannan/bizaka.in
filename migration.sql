CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `plain_password` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `status` int DEFAULT '1',
  `maritial_status` varchar(20) DEFAULT NULL,
  `aadhar_no` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype_id` int DEFAULT '0',
  `login_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1;

insert into users (id,name,email,plain_password,password,status,created_at,updated_at,usertype_id,login_id) values (1,'Administrator','administrator@gmail.com','12345678','$2y$10$gMKkB0s2IF/iUDcIhThk9esA0QKrU/g3/yQqv4lOtqN/trTrhjOwq',1,'2023-06-26 00:00:20','2023-06-26 00:00:20',1,1);

CREATE TABLE `user_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usertype_name` varchar(20) DEFAULT NULL,
  `status` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1;

INSERT INTO `user_type` VALUES (1,'Admin',1),(2,'Member',1);

alter table users add referral_id varchar(255) DEFAULT NULL;
alter table users add parent_id int DEFAULT 0 after id;
alter table users add photo varchar(20) DEFAULT NULL;







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
(1, '1', '2', '100000', NULL, NULL, NULL, 'IN Payment', NULL, NULL, NULL, NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;


ALTER TABLE `users` ADD `wallet` VARCHAR(50)  DEFAULT 0 AFTER `remember_token`;
ALTER TABLE `users` ADD `upi` VARCHAR(50) NULL DEFAULT NULL AFTER `wallet`;
ALTER TABLE `users` ADD `payment_qr_oode` VARCHAR(50) NULL DEFAULT NULL AFTER `upi`;

ALTER TABLE users AUTO_INCREMENT=2;


drop TABLE `withdrawal` ;
CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `req_date` date DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `status` varchar(20) NDEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;