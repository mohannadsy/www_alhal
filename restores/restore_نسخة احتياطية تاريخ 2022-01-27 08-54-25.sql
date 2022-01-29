

CREATE TABLE `account_statements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maden` varchar(250) NOT NULL DEFAULT '0',
  `daen` varchar(250) NOT NULL DEFAULT '0',
  `main_account_id` int(11) NOT NULL,
  `other_account_id` int(11) NOT NULL,
  `code_number` varchar(250) DEFAULT NULL,
  `code_type` varchar(250) NOT NULL,
  `note` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

INSERT INTO account_statements VALUES("13","0","95000","1","2","1","mid_bonds","ملاحظات احمد جبلة","2022-01-25","0","2022-01-25 14:22:39","2022-01-25 14:22:39");
INSERT INTO account_statements VALUES("14","95000","0","2","1","2","mid_bonds","ملاحظات احمد جبلة","2022-01-25","0","2022-01-25 14:22:39","2022-01-25 14:22:39");
INSERT INTO account_statements VALUES("15","95000","95000","6","1","1","bills","ملاحظات احمد جبلة","2022-01-25","0","2022-01-25 14:22:39","2022-01-25 14:22:39");
INSERT INTO account_statements VALUES("16","100000","0","1","3","3","mid_bonds","ملاحظات علي جبلة","2022-01-25","0","2022-01-25 14:22:40","2022-01-25 14:22:40");
INSERT INTO account_statements VALUES("17","0","100000","3","1","4","mid_bonds","ملاحظات علي جبلة","2022-01-25","0","2022-01-25 14:22:40","2022-01-25 14:22:40");
INSERT INTO account_statements VALUES("18","100000","100000","7","1","1","bills","ملاحظات علي جبلة","2022-01-25","0","2022-01-25 14:22:40","2022-01-25 14:22:40");
INSERT INTO account_statements VALUES("23","0","50000","1","8","1","payment_bonds","l","2022-01-25","0","2022-01-25 20:55:11","2022-01-25 20:55:11");
INSERT INTO account_statements VALUES("24","50000","0","8","1","1","payment_bonds","l","2022-01-25","0","2022-01-25 20:55:12","2022-01-25 20:55:12");
INSERT INTO account_statements VALUES("25","0","10000","1","9","1","payment_bonds","","2022-01-25","0","2022-01-25 20:55:12","2022-01-25 20:55:12");
INSERT INTO account_statements VALUES("26","10000","0","9","1","1","payment_bonds","","2022-01-25","0","2022-01-25 20:55:12","2022-01-25 20:55:12");
INSERT INTO account_statements VALUES("27","100000","0","1","6","1","catch_bonds","","2022-01-25","1","2022-01-25 20:56:42","2022-01-25 20:56:42");
INSERT INTO account_statements VALUES("28","0","100000","6","1","1","catch_bonds","","2022-01-25","1","2022-01-25 20:56:42","2022-01-25 20:56:42");
INSERT INTO account_statements VALUES("29","100000","0","1","11","1","catch_bonds","","2022-01-25","0","2022-01-25 20:56:53","2022-01-25 20:56:53");
INSERT INTO account_statements VALUES("30","0","100000","11","1","1","catch_bonds","","2022-01-25","0","2022-01-25 20:56:53","2022-01-25 20:56:53");
INSERT INTO account_statements VALUES("31","0","80000","1","7","2","payment_bonds","notes","2022-01-26","0","2022-01-26 11:13:09","2022-01-26 11:13:09");
INSERT INTO account_statements VALUES("32","80000","0","7","1","2","payment_bonds","notes","2022-01-26","0","2022-01-26 11:13:09","2022-01-26 11:13:09");



CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `maden` varchar(250) DEFAULT NULL,
  `daen` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `account_id` int(11) NOT NULL DEFAULT 0,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `type` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO accounts VALUES("1","1","الصندوق","","","","","0","","","","","0","","2022-01-25 13:14:53","2022-01-25 13:14:53");
INSERT INTO accounts VALUES("2","2","المشتريات","","","","","0","","","","","0","","2022-01-25 13:14:53","2022-01-25 13:14:53");
INSERT INTO accounts VALUES("3","3","المبيعات","","","","","0","","","","","0","","2022-01-25 13:14:53","2022-01-25 13:14:53");
INSERT INTO accounts VALUES("4","4","حسابات جبلة","","","","","0","","","","","0","","2022-01-25 13:15:19","2022-01-25 13:15:19");
INSERT INTO accounts VALUES("5","5","حسابات بانياس","","","","","0","","","","","0","","2022-01-25 13:15:49","2022-01-25 13:15:49");
INSERT INTO accounts VALUES("6","40001","احمد جبلة","","","","","4","","","","","0","","2022-01-25 13:16:10","2022-01-25 13:16:10");
INSERT INTO accounts VALUES("7","40002","علي جبلة","","","","","4","","","","","0","","2022-01-25 13:17:00","2022-01-25 13:17:00");
INSERT INTO accounts VALUES("8","50001","مجد بانياس","","","","","5","","اللاذقية","","","0","","2022-01-25 13:17:55","2022-01-25 20:40:28");
INSERT INTO accounts VALUES("9","50002","مهند بانياس","","","","","5","","","","","0","","2022-01-25 13:18:16","2022-01-25 13:18:16");
INSERT INTO accounts VALUES("10","40003","نور جبلة","","","","","4","","","","","0","","2022-01-25 13:18:44","2022-01-25 13:18:44");
INSERT INTO accounts VALUES("11","40004","رغد جبلة","","","40004","","4","جبلة","اللاذقية","جبلة","ملاحظات رغد","0","","2022-01-25 13:19:47","2022-01-25 13:30:22");
INSERT INTO accounts VALUES("12","40005","تجربة جبلة","","","","","4","","","","","0","","2022-01-25 20:44:07","2022-01-25 20:44:07");



CREATE TABLE `bill_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `total_weight` varchar(250) DEFAULT NULL,
  `real_weight` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `total_item_price` varchar(250) DEFAULT NULL,
  `bill_item_note` varchar(250) DEFAULT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO bill_item VALUES("5","1","3","102","100","500","50000","ملاحظات بندورة","0","2022-01-25 14:22:39","2022-01-25 14:22:39");
INSERT INTO bill_item VALUES("6","1","1","51","50","1000","50000","ملاحظات موز","0","2022-01-25 14:22:39","2022-01-25 14:22:39");



CREATE TABLE `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) DEFAULT NULL,
  `buyer_id` int(10) unsigned NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `buyer_type_pay` varchar(250) DEFAULT NULL,
  `seller_type_pay` varchar(250) DEFAULT NULL,
  `buyer_note` varchar(250) DEFAULT NULL,
  `seller_note` varchar(250) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `currency` varchar(250) NOT NULL DEFAULT 'ليرة سورية',
  `com_ratio` varchar(250) DEFAULT NULL,
  `com_value` varchar(250) DEFAULT NULL,
  `real_price` varchar(250) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO bills VALUES("1","1","7","6","cash","cash","ملاحظات علي جبلة","ملاحظات احمد جبلة","100000","ليرة سورية","5","5000","95000","","0","2022-01-25","2022-01-25 14:22:14","2022-01-25 14:22:38");



CREATE TABLE `catch_bonds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) DEFAULT NULL,
  `main_account_id` int(11) NOT NULL,
  `other_account_id` int(11) NOT NULL,
  `maden` varchar(250) NOT NULL,
  `date` date DEFAULT NULL,
  `currency` varchar(250) DEFAULT NULL,
  `note` varchar(250) NOT NULL,
  `main_note` varchar(250) DEFAULT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO catch_bonds VALUES("1","1","1","6","100000","2022-01-25","ليرة سورية","","","1","2022-01-25 20:56:42","2022-01-25 20:56:42");
INSERT INTO catch_bonds VALUES("2","1","1","11","100000","2022-01-25","ليرة سورية","","","0","2022-01-25 20:56:53","2022-01-25 20:56:53");



CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO categories VALUES("1","خضار","1","ملاحظات خضار","0","2022-01-25 13:20:20","2022-01-25 13:21:28");
INSERT INTO categories VALUES("2","فواكه","2","ملاحظات فواكة","0","2022-01-25 13:20:30","2022-01-25 13:20:53");



CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `unit` varchar(250) DEFAULT NULL,
  `unit_2` varchar(250) DEFAULT NULL,
  `unit_operator` varchar(250) DEFAULT NULL,
  `unit_3` varchar(250) DEFAULT NULL,
  `unit2_operator` varchar(250) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `code` varchar(250) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price_wholesale` varchar(250) DEFAULT NULL,
  `price_retail` varchar(250) DEFAULT NULL,
  `price_customer` varchar(250) DEFAULT NULL,
  `price_distribution` varchar(250) DEFAULT NULL,
  `cost` varchar(250) DEFAULT NULL,
  `price_policy` varchar(250) DEFAULT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO items VALUES("1","موز","","كغ","","","","","ملاحظات موز","20001","2","","","","","","","0","2022-01-25 13:34:21","2022-01-25 13:34:21");
INSERT INTO items VALUES("2","بندورة","","كغ","","","","","ملاحظات بندورة","20002","2","","","","","","","1","2022-01-25 13:34:45","2022-01-25 13:41:59");
INSERT INTO items VALUES("3","بندورة","","كغ","","","","","","10001","1","","","","","","","1","2022-01-25 14:18:23","2022-01-25 14:18:23");
INSERT INTO items VALUES("4","فريز","","كغ","","","","","","20002","2","","","","","","","0","2022-01-25 14:18:36","2022-01-25 14:18:36");
INSERT INTO items VALUES("5","خيار","","كغ","","","","","ملاحظات خيار","10002","1","","","","","","","1","2022-01-25 14:18:48","2022-01-25 14:18:48");
INSERT INTO items VALUES("6","تفاح","","كغ","","","","","","20003","2","","","","","","","0","2022-01-25 14:19:09","2022-01-25 14:19:09");



CREATE TABLE `mid_bonds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) DEFAULT NULL,
  `main_account_id` int(11) NOT NULL,
  `other_account_id` int(11) NOT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `daen` varchar(250) NOT NULL DEFAULT '0',
  `maden` varchar(250) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `currency` varchar(250) DEFAULT NULL,
  `note` varchar(250) NOT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO mid_bonds VALUES("9","1","1","2","1","95000","0","2022-01-25","","ملاحظات احمد جبلة","0","2022-01-25 14:22:39","2022-01-25 14:22:39");
INSERT INTO mid_bonds VALUES("10","2","2","1","1","0","95000","2022-01-25","","ملاحظات احمد جبلة","0","2022-01-25 14:22:39","2022-01-25 14:22:39");
INSERT INTO mid_bonds VALUES("11","3","1","3","1","0","100000","2022-01-25","","ملاحظات علي جبلة","0","2022-01-25 14:22:39","2022-01-25 14:22:39");
INSERT INTO mid_bonds VALUES("12","4","3","1","1","100000","0","2022-01-25","","ملاحظات علي جبلة","0","2022-01-25 14:22:40","2022-01-25 14:22:40");



CREATE TABLE `payment_bonds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) DEFAULT NULL,
  `main_account_id` int(11) NOT NULL,
  `other_account_id` int(11) NOT NULL,
  `daen` varchar(250) NOT NULL,
  `date` date DEFAULT NULL,
  `currency` varchar(250) DEFAULT NULL,
  `note` varchar(250) NOT NULL,
  `main_note` varchar(250) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO payment_bonds VALUES("3","1","1","8","50000","2022-01-25","ليرة سورية","l","","0","2022-01-25 20:55:11","2022-01-25 20:55:11");
INSERT INTO payment_bonds VALUES("4","1","1","9","10000","2022-01-25","ليرة سورية","","","0","2022-01-25 20:55:12","2022-01-25 20:55:12");
INSERT INTO payment_bonds VALUES("5","2","1","7","80000","2022-01-26","ليرة سورية","notes","all","0","2022-01-26 11:13:09","2022-01-26 11:13:09");

