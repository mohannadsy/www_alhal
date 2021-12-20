

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO accounts VALUES("1","acc_00000","Jablah Accounts","","","0","","","","","-","","2021-12-18 19:40:11","2021-12-18 20:32:16");
INSERT INTO accounts VALUES("2","acc_00001","Abo Ahamd","0364654","","1","jablah","latakia","Q","abo ahmad","-40000","","2021-12-18 19:43:27","2021-12-19 23:36:06");
INSERT INTO accounts VALUES("3","acc_00002","Banias Accounts","","","0","","","","","-","","2021-12-19 09:57:03","2021-12-19 09:57:03");
INSERT INTO accounts VALUES("4","acc_00003","Be in Banias","","","0","","","","","-","","2021-12-19 09:58:05","2021-12-19 09:58:05");
INSERT INTO accounts VALUES("5","acc_00004","sAMER","","","1","","","","","-","","2021-12-19 10:43:58","2021-12-19 10:43:58");
INSERT INTO accounts VALUES("6","acc_00005","ahmad","","","1","","","","","-","","2021-12-19 18:04:53","2021-12-19 18:04:53");
INSERT INTO accounts VALUES("7","acc_00006","ali","","","1","","","","","-","","2021-12-19 18:05:11","2021-12-19 18:05:11");



CREATE TABLE `barcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) unsigned NOT NULL,
  `unit_type` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `bill_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(10) unsigned NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `store_id` int(11) unsigned DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `number_of_units` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `payment_type` varchar(250) DEFAULT NULL,
  `discount_amount` varchar(250) DEFAULT NULL,
  `descount_type` varchar(250) DEFAULT NULL,
  `currency` varchar(250) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `bonds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `partial_payment` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO categories VALUES("1","fruit","cat_00000","fruit notes","2021-12-19 23:02:21","2021-12-19 23:02:21");



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




CREATE TABLE `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


