

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO account_statements VALUES("1","0","10000","10","10","40003","accounts","ملاحظات مهند","2022-01-29","0","2022-01-29 11:25:10","2022-01-29 11:26:35");
INSERT INTO account_statements VALUES("2","100000","0","11","11","40004","accounts","ملاحظات سارة جبلة","2022-01-29","0","2022-01-29 11:29:11","2022-01-29 11:29:11");
INSERT INTO account_statements VALUES("3","0","200000","15","15","60001","accounts","ملاحظات كلودا اللاذقية","2022-01-29","0","2022-01-29 11:34:23","2022-01-29 11:34:23");
INSERT INTO account_statements VALUES("4","50000","0","17","17","70002","accounts","ملاحظات احمد راس العين","2022-01-29","0","2022-01-29 11:35:50","2022-01-29 11:35:50");
INSERT INTO account_statements VALUES("5","0","188160","1","2","1","mid_bonds","","2022-02-08","0","2022-02-08 11:08:35","2022-02-08 11:08:35");
INSERT INTO account_statements VALUES("6","188160","0","2","1","2","mid_bonds","","2022-02-08","0","2022-02-08 11:08:35","2022-02-08 11:08:35");
INSERT INTO account_statements VALUES("7","188160","188160","8","1","1","bills","","2022-02-08","0","2022-02-08 11:08:35","2022-02-08 11:08:35");
INSERT INTO account_statements VALUES("8","196000","0","1","3","3","mid_bonds","","2022-02-08","0","2022-02-08 11:08:35","2022-02-08 11:08:35");
INSERT INTO account_statements VALUES("9","0","196000","3","1","4","mid_bonds","","2022-02-08","0","2022-02-08 11:08:35","2022-02-08 11:08:35");
INSERT INTO account_statements VALUES("10","196000","196000","9","1","1","bills","","2022-02-08","0","2022-02-08 11:08:35","2022-02-08 11:08:35");



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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO accounts VALUES("1","1","الصندوق","","","","","0","","","","","0","","2022-01-29 11:10:08","2022-01-29 11:10:08");
INSERT INTO accounts VALUES("2","2","المشتريات","","","","","0","","","","","0","","2022-01-29 11:10:08","2022-01-29 11:10:08");
INSERT INTO accounts VALUES("3","3","المبيعات","","","","","0","","","","","0","","2022-01-29 11:10:08","2022-01-29 11:10:08");
INSERT INTO accounts VALUES("4","4","حسابات جبلة","","","","","0","","","","","0","","2022-01-29 11:18:16","2022-01-29 11:18:16");
INSERT INTO accounts VALUES("5","5","حسابات بانياس","","","","","0","","","","","0","","2022-01-29 11:23:28","2022-01-29 11:23:28");
INSERT INTO accounts VALUES("6","6","حسابات اللاذقية","","","","","0","","","","","0","","2022-01-29 11:23:42","2022-01-29 11:23:42");
INSERT INTO accounts VALUES("7","7","حسابات رأس العين","","","","","0","","","","","0","","2022-01-29 11:23:50","2022-01-29 11:23:50");
INSERT INTO accounts VALUES("8","40001","علي جبلة","","","40001","","4","جبلة","اللاذقية ","جبلة 2","ملاحظات علي جبلة","0","","2022-01-29 11:24:12","2022-01-29 11:26:19");
INSERT INTO accounts VALUES("9","40002","احمد جبلة","","","40002","","4","جبلة","اللاذقية","جبلة 1","ملاحظات احمد جبلة","0","","2022-01-29 11:24:23","2022-01-29 11:26:27");
INSERT INTO accounts VALUES("10","40003","مهند جبلة","0","10000","40003","","4","جبلة","اللاذقية","جبلة","ملاحظات مهند","0","","2022-01-29 11:25:10","2022-01-29 11:26:35");
INSERT INTO accounts VALUES("11","40004","سارة جبلة","100000","","40004","","4","جبلة","اللاذقية","جبلة 2","ملاحظات سارة جبلة","0","","2022-01-29 11:29:11","2022-01-29 11:29:11");
INSERT INTO accounts VALUES("12","50001","نور بانياس","","","50001","","5","بانياس","طرطوس","بانياس1","ملاحظات نور بانياس","0","","2022-01-29 11:31:03","2022-01-29 11:31:03");
INSERT INTO accounts VALUES("13","50002","رغد بانياس","","","50002","","5","بانياس","طرطوس","بانياس2","ملاحظات رغد بانياس","0","","2022-01-29 11:31:37","2022-01-29 11:31:37");
INSERT INTO accounts VALUES("14","50003","علي بانياس للحذف","","","50003","","5","بانياس","طرطوس","بانياس3","ملاحظات بانياس للحذف","0","","2022-01-29 11:33:11","2022-01-29 11:33:11");
INSERT INTO accounts VALUES("15","60001","كلودا اللاذقية","","200000","60001","","6","اللاذقية","اللاذقية","اللاذقية1","ملاحظات كلودا اللاذقية","0","","2022-01-29 11:34:23","2022-01-29 11:34:23");
INSERT INTO accounts VALUES("16","70001","أبي راس العين","","","70001","","7","جبلة","اللاذقية","راس العين","ملاحظات ابي راس العين","0","","2022-01-29 11:34:55","2022-01-29 11:34:55");
INSERT INTO accounts VALUES("17","70002","احمد راس العين","50000","","70002","","7","جبلة","اللاذقية","راس العين","ملاحظات احمد راس العين","0","","2022-01-29 11:35:49","2022-01-29 11:35:49");



CREATE TABLE `bill_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `total_weight` varchar(250) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `real_weight` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `total_item_price` varchar(250) DEFAULT NULL,
  `bill_item_note` varchar(250) DEFAULT NULL,
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO bill_item VALUES("1","1","1","500","2","490","400","196000","","0","2022-02-08 11:08:35","2022-02-08 11:08:35");



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

INSERT INTO bills VALUES("1","1","9","8","cash","cash","","","196000","ليرة سورية","4","7840","188160","","0","2022-02-08","2022-02-08 11:08:35","2022-02-08 11:08:35");



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO categories VALUES("1","ليمون","1","ملاحظات ليمون ","0","2022-01-29 11:36:22","2022-01-29 11:36:22");
INSERT INTO categories VALUES("2","بندورة","2","ملاحظات بندورة ","0","2022-01-29 11:36:43","2022-01-29 11:36:43");
INSERT INTO categories VALUES("3","فواكه","3"," ملاحظات فواكه","0","2022-01-29 11:37:01","2022-01-29 11:37:01");
INSERT INTO categories VALUES("4","خضار","4"," ملاحظات خضار","0","2022-01-29 11:37:10","2022-01-29 11:37:10");



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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO items VALUES("1","كرمنتينا","","كغ","","","","","ملاحطات كرمنتينا","10001","1","","","","","","","0","2022-01-29 11:37:52","2022-01-29 11:37:52");
INSERT INTO items VALUES("2","بلنصيا","","كغ","","","","","ملاحظات بلنصيا","10002","1","","","","","","","0","2022-01-29 11:38:05","2022-01-29 11:38:05");
INSERT INTO items VALUES("3","ساستوما","","كغ","","","","","ملاحظات ساستوما","10003","1","","","","","","","0","2022-01-29 11:38:18","2022-01-29 11:38:18");
INSERT INTO items VALUES("4","ماوردي","","كغ","","","","","ملاحظات ماوردي","10004","1","","","","","","","0","2022-01-29 11:38:34","2022-01-29 11:38:34");
INSERT INTO items VALUES("5","ابوميلو","","كغ","","","","","ملاحظات ابوميلو","10005","1","","","","","","","0","2022-01-29 11:39:05","2022-01-29 11:39:05");
INSERT INTO items VALUES("6","يافاوي","","كغ","","","","","ملاحظات يافاوي","10006","1","","","","","","","0","2022-01-29 11:39:16","2022-01-29 11:39:16");
INSERT INTO items VALUES("7","ابوصرة","","كغ","","","","","ملاحظات ابوصرة","10007","1","","","","","","","0","2022-01-29 11:39:29","2022-01-29 11:39:29");
INSERT INTO items VALUES("8","بستونا","","كغ","","","","","ملاحظات بستونا","20001","2","","","","","","","0","2022-01-29 11:39:48","2022-01-29 11:39:48");
INSERT INTO items VALUES("9","يسرى","","كغ","","","","","ملاحظات يسرى","20002","2","","","","","","","0","2022-01-29 11:40:06","2022-01-29 11:40:06");
INSERT INTO items VALUES("10","مندلون","","كغ","","","","","ملاحظات مندلون","20003","2","","","","","","","0","2022-01-29 11:40:22","2022-01-29 11:40:22");
INSERT INTO items VALUES("11","درعاوية","","كغ","","","","","ملاحظات درعاوية","20004","2","","","","","","","0","2022-01-29 11:40:34","2022-01-29 11:40:34");
INSERT INTO items VALUES("12","موز","","كغ","","","","","ملاحظات موز","30001","3","","","","","","","0","2022-01-29 11:40:47","2022-01-29 11:40:47");
INSERT INTO items VALUES("13","كرز","","كغ","","","","","ملاحظات كرز","30002","3","","","","","","","0","2022-01-29 11:40:57","2022-01-29 11:40:57");
INSERT INTO items VALUES("14","فريز","","كغ","","","","","ملاحظات فريز","30003","3","","","","","","","0","2022-01-29 11:41:06","2022-01-29 11:41:06");
INSERT INTO items VALUES("15","بطاطا","","كغ","","","","","ملاحظات بطاطا","40001","4","","","","","","","0","2022-01-29 11:41:32","2022-01-29 11:41:32");
INSERT INTO items VALUES("16","خيار","","كغ","","","","","ملاحظات خيار","40002","4","","","","","","","0","2022-01-29 11:41:41","2022-01-29 11:41:41");
INSERT INTO items VALUES("17","خس","","كغ","","","","","ملاحظات خس","40003","4","","","","","","","0","2022-01-29 11:41:48","2022-01-29 11:41:48");
INSERT INTO items VALUES("18","ملفوف","","كغ","","","","","ملاحظات ملفوف","40004","4","","","","","","","0","2022-01-29 11:41:57","2022-01-29 11:41:57");



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

INSERT INTO mid_bonds VALUES("1","1","1","2","1","188160","0","2022-02-08","","","0","2022-02-08 11:08:35","2022-02-08 11:08:35");
INSERT INTO mid_bonds VALUES("2","2","2","1","1","0","188160","2022-02-08","","","0","2022-02-08 11:08:35","2022-02-08 11:08:35");
INSERT INTO mid_bonds VALUES("3","3","1","3","1","0","196000","2022-02-08","","","0","2022-02-08 11:08:35","2022-02-08 11:08:35");
INSERT INTO mid_bonds VALUES("4","4","3","1","1","196000","0","2022-02-08","","","0","2022-02-08 11:08:35","2022-02-08 11:08:35");



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


