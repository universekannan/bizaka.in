CREATE TABLE `purchase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `member_id` int NOT NULL ,
  `amount` decimal(10,2) NOT NULL,
  `purchase_date` date NOT NULL,
  added_datetime datetime not null,
  `log_id` int NOT NULL,
  PRIMARY KEY (`id`)
)  =InnoDB;