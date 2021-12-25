

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `account_id` int(11) NOT NULL DEFAULT 0,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `fund` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO accounts VALUES("1","acc_00000","jablah","","","0","","","","","0","","2021-12-22 09:32:36","2021-12-22 09:32:36");
INSERT INTO accounts VALUES("2","acc_00001","ahmad","","","1","","","","","-20000","","2021-12-22 09:32:54","2021-12-22 11:43:37");
INSERT INTO accounts VALUES("3","acc_00002","ali","","","1","","","","","0","","2021-12-22 09:33:03","2021-12-22 09:33:03");
INSERT INTO accounts VALUES("4","acc_00003","New","","","1","","","","","-70000","","2021-12-22 11:44:19","2021-12-22 11:48:57");



CREATE TABLE `bill_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `total_weight` varchar(250) DEFAULT NULL,
  `real_weight` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `total_item_price` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(10) unsigned NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `buyer_type_pay` varchar(250) DEFAULT NULL,
  `seller_type_pay` varchar(250) DEFAULT NULL,
  `buyer_note` varchar(250) DEFAULT NULL,
  `seller_note` varchar(250) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `currency` varchar(250) DEFAULT NULL,
  `com_ratio` varchar(250) DEFAULT NULL,
  `com_value` varchar(250) DEFAULT NULL,
  `real_price` varchar(250) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `catch_bonds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) DEFAULT NULL,
  `main_account_id` int(11) NOT NULL,
  `other_account_id` int(11) NOT NULL,
  `maden` varchar(250) NOT NULL,
  `date` date DEFAULT NULL,
  `currency` varchar(250) DEFAULT NULL,
  `note` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO catch_bonds VALUES("2","00001","1","5","50000","2022-01-26","ليرة سورية"," قبضنا 50000","2021-12-25 18:50:27","2021-12-25 18:50:27");



CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `commissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `ratio` varchar(255) NOT NULL,
  `profit` varchar(250) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `fund_movements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_box` varchar(250) NOT NULL,
  `out_box` varchar(250) NOT NULL,
  `current` varchar(250) NOT NULL,
  `bond_id` int(11) NOT NULL,
  `note` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `unit_2` varchar(250) NOT NULL,
  `unit_operator` varchar(250) NOT NULL,
  `unit_3` varchar(250) NOT NULL,
  `unit2_operator` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price_wholesale` varchar(250) NOT NULL,
  `price_retail` varchar(250) NOT NULL,
  `price_customer` varchar(250) NOT NULL,
  `price_distribution` varchar(250) NOT NULL,
  `cost` varchar(250) NOT NULL,
  `price_policy` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `payment_bonds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) DEFAULT NULL,
  `main_account_id` int(11) NOT NULL,
  `other_account_id` int(11) NOT NULL,
  `daen` varchar(250) NOT NULL,
  `date` date DEFAULT NULL,
  `currency` varchar(250) DEFAULT NULL,
  `note` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


