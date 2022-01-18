

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO account_statements VALUES("1","5000","0","5","5","40001","accounts","","2022-01-17","0","2022-01-17 09:37:16","2022-01-17 09:37:16");
INSERT INTO account_statements VALUES("2","0","9000","6","6","40002","accounts","","2022-01-17","0","2022-01-17 09:37:25","2022-01-17 09:37:25");
INSERT INTO account_statements VALUES("3","0","2000","1","6","1","payment_bonds","ma","2022-01-17","0","2022-01-17 09:38:15","2022-01-17 09:38:15");
INSERT INTO account_statements VALUES("4","2000","0","6","1","1","payment_bonds","ma","2022-01-17","0","2022-01-17 09:38:15","2022-01-17 09:38:15");
INSERT INTO account_statements VALUES("5","0","381710","1","2","1","mid_bonds","  ","2022-01-17","0","2022-01-17 09:41:35","2022-01-17 09:41:35");
INSERT INTO account_statements VALUES("6","381710","0","2","1","2","mid_bonds","","2022-01-17","0","2022-01-17 09:41:35","2022-01-17 09:41:35");
INSERT INTO account_statements VALUES("7","381710","381710","5","1","1","bills","","2022-01-17","0","2022-01-17 09:41:35","2022-01-17 09:41:35");
INSERT INTO account_statements VALUES("8","401800","0","6","3","3","mid_bonds","","2022-01-17","0","2022-01-17 09:41:35","2022-01-17 09:41:35");
INSERT INTO account_statements VALUES("9","0","401800","3","6","4","mid_bonds","","2022-01-17","0","2022-01-17 09:41:36","2022-01-17 09:41:36");



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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO accounts VALUES("1","1","الصندوق","","","","","0","","","","","0","","2022-01-17 09:36:54","2022-01-17 09:36:54");
INSERT INTO accounts VALUES("2","2","المشتريات","","","","","0","","","","","0","","2022-01-17 09:36:54","2022-01-17 09:36:54");
INSERT INTO accounts VALUES("3","3","المبيعات","","","","","0","","","","","0","","2022-01-17 09:36:54","2022-01-17 09:36:54");
INSERT INTO accounts VALUES("4","4","jablah","","","","","0","","","","","0","","2022-01-17 09:37:05","2022-01-17 09:37:05");
INSERT INTO accounts VALUES("5","40001","obai","5000","","","","4","","","","","0","","2022-01-17 09:37:16","2022-01-17 09:37:16");
INSERT INTO accounts VALUES("6","40002","mohannd","","9000","","","4","","","","","0","","2022-01-17 09:37:25","2022-01-17 09:37:25");



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO bill_item VALUES("1","1","1","100","98","500","49000"," ","0","2022-01-17 09:41:35","2022-01-17 09:41:35");
INSERT INTO bill_item VALUES("2","1","2","600","588","600","352800"," ","0","2022-01-17 09:41:35","2022-01-17 09:41:35");



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

INSERT INTO bills VALUES("1","1","6","5","agel","cash","","","401800","ليرة سورية","5","20090","381710","","0","2022-01-17","2022-01-17 09:41:34","2022-01-17 09:41:34");



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO categories VALUES("1","fruits","1","a ","0","2022-01-17 09:39:59","2022-01-17 09:39:59");



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO items VALUES("1","apple","","كغ","","","","","","10001","1","","","","","","","0","2022-01-17 09:40:09","2022-01-17 09:40:09");
INSERT INTO items VALUES("2","banana","","كغ","","","","","","10002","1","","","","","","","0","2022-01-17 09:40:19","2022-01-17 09:40:19");



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO mid_bonds VALUES("1","1","1","2","1","381710","0","2022-01-17","","  ","0","2022-01-17 09:41:35","2022-01-17 09:41:35");
INSERT INTO mid_bonds VALUES("2","2","2","1","1","0","381710","2022-01-17","","","0","2022-01-17 09:41:35","2022-01-17 09:41:35");
INSERT INTO mid_bonds VALUES("3","3","6","3","1","0","401800","2022-01-17","","","0","2022-01-17 09:41:35","2022-01-17 09:41:35");
INSERT INTO mid_bonds VALUES("4","4","3","6","1","401800","0","2022-01-17","","","0","2022-01-17 09:41:36","2022-01-17 09:41:36");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO payment_bonds VALUES("1","1","1","6","2000","2022-01-17","ليرة سورية","ma","","0","2022-01-17 09:38:15","2022-01-17 09:38:15");

