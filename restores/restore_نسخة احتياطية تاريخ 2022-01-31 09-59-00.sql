

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

INSERT INTO account_statements VALUES("1","200000","0","6","6","40001","accounts","اختصاص قهوة","2022-01-26","0","2022-01-26 09:50:13","2022-01-26 09:50:13");
INSERT INTO account_statements VALUES("2","300000","0","7","7","40002","accounts","","2022-01-26","0","2022-01-26 09:50:28","2022-01-26 09:50:28");
INSERT INTO account_statements VALUES("3","0","52136","1","2","1","mid_bonds","","2022-01-26","0","2022-01-26 09:53:03","2022-01-26 09:53:03");
INSERT INTO account_statements VALUES("4","52136","0","2","1","2","mid_bonds","","2022-01-26","0","2022-01-26 09:53:04","2022-01-26 09:53:04");
INSERT INTO account_statements VALUES("5","52136","52136","7","1","1","bills","","2022-01-26","0","2022-01-26 09:53:04","2022-01-26 09:53:04");
INSERT INTO account_statements VALUES("6","54880","0","6","3","3","mid_bonds","","2022-01-26","0","2022-01-26 09:53:04","2022-01-26 09:53:04");
INSERT INTO account_statements VALUES("7","0","54880","3","6","4","mid_bonds","","2022-01-26","0","2022-01-26 09:53:04","2022-01-26 09:53:04");
INSERT INTO account_statements VALUES("8","100000","0","1","6","1","catch_bonds","","2022-01-26","0","2022-01-26 09:55:19","2022-01-26 09:55:19");
INSERT INTO account_statements VALUES("9","0","100000","6","1","1","catch_bonds","","2022-01-26","0","2022-01-26 09:55:19","2022-01-26 09:55:19");
INSERT INTO account_statements VALUES("10","100000","0","1","7","2","catch_bonds","","2022-01-26","0","2022-01-26 10:57:36","2022-01-26 10:57:36");
INSERT INTO account_statements VALUES("11","0","100000","7","1","2","catch_bonds","","2022-01-26","0","2022-01-26 10:57:36","2022-01-26 10:57:36");
INSERT INTO account_statements VALUES("12","200000","0","8","8","40003","accounts","","2022-01-30","0","2022-01-30 13:12:35","2022-01-30 13:12:35");
INSERT INTO account_statements VALUES("13","0","2793","1","2","5","mid_bonds","","2022-01-30","0","2022-01-30 13:14:10","2022-01-30 13:14:10");
INSERT INTO account_statements VALUES("14","2793","0","2","1","6","mid_bonds","","2022-01-30","0","2022-01-30 13:14:10","2022-01-30 13:14:10");
INSERT INTO account_statements VALUES("15","2793","2793","6","1","2","bills","","2022-01-30","0","2022-01-30 13:14:10","2022-01-30 13:14:10");
INSERT INTO account_statements VALUES("16","2940","0","7","3","7","mid_bonds","","2022-01-30","0","2022-01-30 13:14:11","2022-01-30 13:14:11");
INSERT INTO account_statements VALUES("17","0","2940","3","7","8","mid_bonds","","2022-01-30","0","2022-01-30 13:14:11","2022-01-30 13:14:11");
INSERT INTO account_statements VALUES("18","0","1862","1","2","9","mid_bonds","","2022-01-30","0","2022-01-30 13:30:01","2022-01-30 13:30:01");
INSERT INTO account_statements VALUES("19","1862","0","2","1","10","mid_bonds","","2022-01-30","0","2022-01-30 13:30:01","2022-01-30 13:30:01");
INSERT INTO account_statements VALUES("20","1862","1862","9","1","3","bills","","2022-01-30","0","2022-01-30 13:30:01","2022-01-30 13:30:01");
INSERT INTO account_statements VALUES("21","1960","0","1","3","11","mid_bonds","","2022-01-30","0","2022-01-30 13:30:01","2022-01-30 13:30:01");
INSERT INTO account_statements VALUES("22","0","1960","3","1","12","mid_bonds","","2022-01-30","0","2022-01-30 13:30:01","2022-01-30 13:30:01");
INSERT INTO account_statements VALUES("23","1960","1960","8","1","3","bills","","2022-01-30","0","2022-01-30 13:30:01","2022-01-30 13:30:01");
INSERT INTO account_statements VALUES("24","0","1676","1","2","13","mid_bonds","","2022-01-30","0","2022-01-30 13:30:56","2022-01-30 13:30:56");
INSERT INTO account_statements VALUES("25","1676","0","2","1","14","mid_bonds","","2022-01-30","0","2022-01-30 13:30:56","2022-01-30 13:30:56");
INSERT INTO account_statements VALUES("26","1676","1676","10","1","4","bills","","2022-01-30","0","2022-01-30 13:30:56","2022-01-30 13:30:56");
INSERT INTO account_statements VALUES("27","1764","0","9","3","15","mid_bonds","","2022-01-30","0","2022-01-30 13:30:57","2022-01-30 13:30:57");
INSERT INTO account_statements VALUES("28","0","1764","3","9","16","mid_bonds","","2022-01-30","0","2022-01-30 13:30:57","2022-01-30 13:30:57");
INSERT INTO account_statements VALUES("29","100000","0","11","11","40006","accounts","","2022-01-30","0","2022-01-30 13:45:01","2022-01-30 13:45:01");
INSERT INTO account_statements VALUES("30","0","931","1","2","17","mid_bonds","","2022-01-30","0","2022-01-30 13:45:33","2022-01-30 13:45:33");
INSERT INTO account_statements VALUES("31","931","0","2","1","18","mid_bonds","","2022-01-30","0","2022-01-30 13:45:33","2022-01-30 13:45:33");
INSERT INTO account_statements VALUES("32","931","931","11","1","5","bills","","2022-01-30","0","2022-01-30 13:45:33","2022-01-30 13:45:33");
INSERT INTO account_statements VALUES("33","980","0","1","3","19","mid_bonds","","2022-01-30","0","2022-01-30 13:45:33","2022-01-30 13:45:33");
INSERT INTO account_statements VALUES("34","0","980","3","1","20","mid_bonds","","2022-01-30","0","2022-01-30 13:45:34","2022-01-30 13:45:34");
INSERT INTO account_statements VALUES("35","980","980","6","1","5","bills","","2022-01-30","0","2022-01-30 13:45:34","2022-01-30 13:45:34");
INSERT INTO account_statements VALUES("36","100000","0","1","6","3","catch_bonds","","2022-01-30","0","2022-01-30 13:49:09","2022-01-30 13:49:09");
INSERT INTO account_statements VALUES("37","0","100000","6","1","3","catch_bonds","","2022-01-30","0","2022-01-30 13:49:09","2022-01-30 13:49:09");
INSERT INTO account_statements VALUES("38","0","1862","1","2","21","mid_bonds","","2022-01-31","0","2022-01-31 10:38:09","2022-01-31 10:38:09");
INSERT INTO account_statements VALUES("39","1862","0","2","1","22","mid_bonds","","2022-01-31","0","2022-01-31 10:38:09","2022-01-31 10:38:09");
INSERT INTO account_statements VALUES("40","1862","1862","10","1","6","bills","","2022-01-31","0","2022-01-31 10:38:09","2022-01-31 10:38:09");
INSERT INTO account_statements VALUES("41","1960","0","1","3","23","mid_bonds","","2022-01-31","0","2022-01-31 10:38:09","2022-01-31 10:38:09");
INSERT INTO account_statements VALUES("42","0","1960","3","1","24","mid_bonds","","2022-01-31","0","2022-01-31 10:38:09","2022-01-31 10:38:09");
INSERT INTO account_statements VALUES("43","1960","1960","11","1","6","bills","","2022-01-31","0","2022-01-31 10:38:09","2022-01-31 10:38:09");
INSERT INTO account_statements VALUES("44","1000000","0","12","12","40007","accounts","","2022-01-31","0","2022-01-31 10:46:25","2022-01-31 10:46:25");
INSERT INTO account_statements VALUES("45","500000","0","1","6","4","catch_bonds","","2022-01-31","0","2022-01-31 10:48:20","2022-01-31 10:48:20");
INSERT INTO account_statements VALUES("46","0","500000","6","1","4","catch_bonds","","2022-01-31","0","2022-01-31 10:48:20","2022-01-31 10:48:20");



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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO accounts VALUES("1","1","الصندوق","","","","","0","","","","","0","","2022-01-13 19:15:36","2022-01-13 19:15:36");
INSERT INTO accounts VALUES("2","2","المشتريات","","","","","0","","","","","0","","2022-01-13 19:15:36","2022-01-13 19:15:36");
INSERT INTO accounts VALUES("3","3","المبيعات","","","","","0","","","","","0","","2022-01-13 19:15:36","2022-01-13 19:15:36");
INSERT INTO accounts VALUES("4","4","زبائن جبلة","","","","","0","","","","","0","","2022-01-26 09:49:15","2022-01-26 09:49:15");
INSERT INTO accounts VALUES("5","5","زبائن اللاذقية","","","","","0","","","","","0","","2022-01-26 09:49:24","2022-01-26 09:49:24");
INSERT INTO accounts VALUES("6","40001","أبو محمد الحلبي","200000","","0934523612","","4","جبلة","اللاذقية","شارع الملعب","اختصاص قهوة","0","","2022-01-26 09:50:13","2022-01-26 09:50:13");
INSERT INTO accounts VALUES("7","40002","حسان اسعد","300000","","","","4","","","","","0","","2022-01-26 09:50:28","2022-01-26 09:50:28");
INSERT INTO accounts VALUES("8","40003","احمد علي","200000","","","","4","","","","","0","","2022-01-30 13:12:35","2022-01-30 13:12:35");
INSERT INTO accounts VALUES("9","40004","حسام سعيد","","","","","4","","","","","0","","2022-01-30 13:29:06","2022-01-30 13:29:06");
INSERT INTO accounts VALUES("10","40005","زين علي","","","","","4","","","","","0","","2022-01-30 13:30:12","2022-01-30 13:30:12");
INSERT INTO accounts VALUES("11","40006","عهد","100000","","","","4","","","","","0","","2022-01-30 13:45:01","2022-01-30 13:45:01");
INSERT INTO accounts VALUES("12","40007","علي","1000000","","","","4","","","","","0","","2022-01-31 10:46:24","2022-01-31 10:46:24");
INSERT INTO accounts VALUES("13","40008","ممممم","","","","","4","","","","","0","","2022-01-31 10:47:15","2022-01-31 10:47:15");



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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO bill_item VALUES("1","1","3","1200","1176","5","5880","","0","2022-01-26 09:53:03","2022-01-26 09:53:03");
INSERT INTO bill_item VALUES("2","1","1","5000","4900","10","49000","","0","2022-01-26 09:53:03","2022-01-26 09:53:03");
INSERT INTO bill_item VALUES("3","2","2","300","294","10","2940","","0","2022-01-30 13:14:10","2022-01-30 13:14:10");
INSERT INTO bill_item VALUES("4","3","1","200","196","10","1960","","0","2022-01-30 13:30:01","2022-01-30 13:30:01");
INSERT INTO bill_item VALUES("5","4","2","300","294","6","1764","","0","2022-01-30 13:30:56","2022-01-30 13:30:56");
INSERT INTO bill_item VALUES("6","5","1","100","98","10","980","","0","2022-01-30 13:45:33","2022-01-30 13:45:33");
INSERT INTO bill_item VALUES("7","6","2","200","196","10","1960","","0","2022-01-31 10:38:09","2022-01-31 10:38:09");



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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO bills VALUES("1","1","6","7","agel","cash","","","54880","ليرة سورية","5","2744","52136","","0","2022-01-26","2022-01-26 09:53:03","2022-01-26 09:53:03");
INSERT INTO bills VALUES("2","2","7","6","agel","cash","","","2940","ليرة سورية","5","147","2793","","0","2022-01-30","2022-01-30 13:14:10","2022-01-30 13:14:10");
INSERT INTO bills VALUES("3","3","8","9","cash","cash","","","1960","ليرة سورية","5","98","1862","","0","2022-01-30","2022-01-30 13:30:00","2022-01-30 13:30:00");
INSERT INTO bills VALUES("4","4","9","10","agel","cash","","","1764","ليرة سورية","5","88","1676","","0","2022-01-30","2022-01-30 13:30:56","2022-01-30 13:30:56");
INSERT INTO bills VALUES("5","5","6","11","cash","cash","","","980","ليرة سورية","5","49","931","","0","2022-01-30","2022-01-30 13:45:33","2022-01-30 13:45:33");
INSERT INTO bills VALUES("6","6","11","10","cash","cash","","","1960","ليرة سورية","5","98","1862","","0","2022-01-31","2022-01-31 10:38:09","2022-01-31 10:38:09");



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO catch_bonds VALUES("1","1","1","6","100000","2022-01-26","ليرة سورية","","","0","2022-01-26 09:55:19","2022-01-26 09:55:19");
INSERT INTO catch_bonds VALUES("2","2","1","7","100000","2022-01-26","ليرة سورية","","","0","2022-01-26 10:57:36","2022-01-26 10:57:36");
INSERT INTO catch_bonds VALUES("3","3","1","6","100000","2022-01-30","ليرة سورية","","","0","2022-01-30 13:49:09","2022-01-30 13:49:09");
INSERT INTO catch_bonds VALUES("4","4","1","6","500000","2022-01-31","ليرة سورية","","","0","2022-01-31 10:48:19","2022-01-31 10:48:19");



CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO categories VALUES("1","خضار","1"," خضار شتوية","0","2022-01-26 09:46:35","2022-01-26 09:46:35");
INSERT INTO categories VALUES("2","فواكه","2"," فواكه اسوائية","0","2022-01-26 09:46:51","2022-01-26 09:46:51");
INSERT INTO categories VALUES("3","حمضيات","3"," ","0","2022-01-26 09:47:09","2022-01-26 09:47:09");
INSERT INTO categories VALUES("4","زيتون","4"," اسود","0","2022-01-31 10:35:37","2022-01-31 10:35:37");



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO items VALUES("1","خس","","كغ","","","","","","10001","1","","","","","","","0","2022-01-26 09:47:35","2022-01-26 09:47:35");
INSERT INTO items VALUES("2","فريز","","كغ","","","","","","20001","2","","","","","","","0","2022-01-26 09:47:51","2022-01-26 09:47:51");
INSERT INTO items VALUES("3","موز","","كغ","","","","","","20002","2","","","","","","","0","2022-01-26 09:47:55","2022-01-26 09:47:55");



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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO mid_bonds VALUES("1","1","1","2","1","52136","0","2022-01-26","","","0","2022-01-26 09:53:03","2022-01-26 09:53:03");
INSERT INTO mid_bonds VALUES("2","2","2","1","1","0","52136","2022-01-26","","","0","2022-01-26 09:53:03","2022-01-26 09:53:03");
INSERT INTO mid_bonds VALUES("3","3","6","3","1","0","54880","2022-01-26","","","0","2022-01-26 09:53:04","2022-01-26 09:53:04");
INSERT INTO mid_bonds VALUES("4","4","3","6","1","54880","0","2022-01-26","","","0","2022-01-26 09:53:04","2022-01-26 09:53:04");
INSERT INTO mid_bonds VALUES("5","5","1","2","2","2793","0","2022-01-30","","","0","2022-01-30 13:14:10","2022-01-30 13:14:10");
INSERT INTO mid_bonds VALUES("6","6","2","1","2","0","2793","2022-01-30","","","0","2022-01-30 13:14:10","2022-01-30 13:14:10");
INSERT INTO mid_bonds VALUES("7","7","7","3","2","0","2940","2022-01-30","","","0","2022-01-30 13:14:10","2022-01-30 13:14:10");
INSERT INTO mid_bonds VALUES("8","8","3","7","2","2940","0","2022-01-30","","","0","2022-01-30 13:14:11","2022-01-30 13:14:11");
INSERT INTO mid_bonds VALUES("9","9","1","2","3","1862","0","2022-01-30","","","0","2022-01-30 13:30:01","2022-01-30 13:30:01");
INSERT INTO mid_bonds VALUES("10","10","2","1","3","0","1862","2022-01-30","","","0","2022-01-30 13:30:01","2022-01-30 13:30:01");
INSERT INTO mid_bonds VALUES("11","11","1","3","3","0","1960","2022-01-30","","","0","2022-01-30 13:30:01","2022-01-30 13:30:01");
INSERT INTO mid_bonds VALUES("12","12","3","1","3","1960","0","2022-01-30","","","0","2022-01-30 13:30:01","2022-01-30 13:30:01");
INSERT INTO mid_bonds VALUES("13","13","1","2","4","1676","0","2022-01-30","","","0","2022-01-30 13:30:56","2022-01-30 13:30:56");
INSERT INTO mid_bonds VALUES("14","14","2","1","4","0","1676","2022-01-30","","","0","2022-01-30 13:30:56","2022-01-30 13:30:56");
INSERT INTO mid_bonds VALUES("15","15","9","3","4","0","1764","2022-01-30","","","0","2022-01-30 13:30:57","2022-01-30 13:30:57");
INSERT INTO mid_bonds VALUES("16","16","3","9","4","1764","0","2022-01-30","","","0","2022-01-30 13:30:57","2022-01-30 13:30:57");
INSERT INTO mid_bonds VALUES("17","17","1","2","5","931","0","2022-01-30","","","0","2022-01-30 13:45:33","2022-01-30 13:45:33");
INSERT INTO mid_bonds VALUES("18","18","2","1","5","0","931","2022-01-30","","","0","2022-01-30 13:45:33","2022-01-30 13:45:33");
INSERT INTO mid_bonds VALUES("19","19","1","3","5","0","980","2022-01-30","","","0","2022-01-30 13:45:33","2022-01-30 13:45:33");
INSERT INTO mid_bonds VALUES("20","20","3","1","5","980","0","2022-01-30","","","0","2022-01-30 13:45:33","2022-01-30 13:45:33");
INSERT INTO mid_bonds VALUES("21","21","1","2","6","1862","0","2022-01-31","","","0","2022-01-31 10:38:09","2022-01-31 10:38:09");
INSERT INTO mid_bonds VALUES("22","22","2","1","6","0","1862","2022-01-31","","","0","2022-01-31 10:38:09","2022-01-31 10:38:09");
INSERT INTO mid_bonds VALUES("23","23","1","3","6","0","1960","2022-01-31","","","0","2022-01-31 10:38:09","2022-01-31 10:38:09");
INSERT INTO mid_bonds VALUES("24","24","3","1","6","1960","0","2022-01-31","","","0","2022-01-31 10:38:09","2022-01-31 10:38:09");



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


