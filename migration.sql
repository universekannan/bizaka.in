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
ALTER TABLE users AUTO_INCREMENT=2;


