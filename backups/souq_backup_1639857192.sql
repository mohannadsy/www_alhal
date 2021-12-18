

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO accounts VALUES("1","acc_00000","Jablah Accounts","","","0","","","","","-","","2021-12-18 19:40:11","2021-12-18 20:32:16");
INSERT INTO accounts VALUES("2","acc_00001","Abo Ahamd","","","1","","","","new message update","-","","2021-12-18 19:43:27","2021-12-18 20:38:39");



CREATE TABLE `barcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) unsigned NOT NULL,
  `unit_type` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(10) unsigned NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `store_id` int(11) unsigned NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `number_of_units` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `payment_type` varchar(250) NOT NULL,
  `discount_amount` varchar(250) NOT NULL,
  `descount_type` varchar(250) NOT NULL,
  `currency` varchar(250) NOT NULL,
  `note` varchar(255) NOT NULL,
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




CREATE TABLE `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


