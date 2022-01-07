

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

INSERT INTO account_statements VALUES("1","0","95000","1","2","1","mid_bonds","Array","2022-01-05","2022-01-05 14:40:53","2022-01-05 14:40:53");
INSERT INTO account_statements VALUES("2","95000","0","2","1","2","mid_bonds","x cash","2022-01-05","2022-01-05 14:40:53","2022-01-05 14:40:53");
INSERT INTO account_statements VALUES("3","95000","95000","6","1","1","bills","x cash","2022-01-05","2022-01-05 14:40:53","2022-01-05 14:40:53");
INSERT INTO account_statements VALUES("4","100000","0","1","3","3","mid_bonds","y cash","2022-01-05","2022-01-05 14:40:53","2022-01-05 14:40:53");
INSERT INTO account_statements VALUES("5","0","100000","3","1","4","mid_bonds","y cash","2022-01-05","2022-01-05 14:40:53","2022-01-05 14:40:53");
INSERT INTO account_statements VALUES("6","100000","100000","7","1","1","bills","y cash","2022-01-05","2022-01-05 14:40:53","2022-01-05 14:40:53");
INSERT INTO account_statements VALUES("7","0","48500","1","2","5","mid_bonds","Array","2022-01-05","2022-01-05 14:44:57","2022-01-05 14:44:57");
INSERT INTO account_statements VALUES("8","48500","0","2","1","6","mid_bonds","a cash","2022-01-05","2022-01-05 14:44:58","2022-01-05 14:44:58");
INSERT INTO account_statements VALUES("9","48500","48500","8","1","2","bills","a cash","2022-01-05","2022-01-05 14:44:58","2022-01-05 14:44:58");
INSERT INTO account_statements VALUES("10","50000","0","1","3","7","mid_bonds","b cash","2022-01-05","2022-01-05 14:44:58","2022-01-05 14:44:58");
INSERT INTO account_statements VALUES("11","0","50000","3","1","8","mid_bonds","b cash","2022-01-05","2022-01-05 14:44:58","2022-01-05 14:44:58");
INSERT INTO account_statements VALUES("12","50000","50000","9","1","2","bills","b cash","2022-01-05","2022-01-05 14:44:58","2022-01-05 14:44:58");
INSERT INTO account_statements VALUES("13","0","9800","1","2","9","mid_bonds","Array","2022-01-05","2022-01-05 14:47:03","2022-01-05 14:47:03");
INSERT INTO account_statements VALUES("14","9800","0","2","1","10","mid_bonds","","2022-01-05","2022-01-05 14:47:03","2022-01-05 14:47:03");
INSERT INTO account_statements VALUES("15","9800","9800","10","1","3","bills","","2022-01-05","2022-01-05 14:47:03","2022-01-05 14:47:03");
INSERT INTO account_statements VALUES("16","10000","0","11","3","11","mid_bonds","","2022-01-05","2022-01-05 14:47:03","2022-01-05 14:47:03");
INSERT INTO account_statements VALUES("17","0","10000","3","11","12","mid_bonds","","2022-01-05","2022-01-05 14:47:03","2022-01-05 14:47:03");
INSERT INTO account_statements VALUES("18","0","20000","1","6","1","payment_bonds","x notes","2022-01-05","2022-01-05 18:41:14","2022-01-05 18:41:14");
INSERT INTO account_statements VALUES("19","0","50000","1","7","1","payment_bonds","y notes","2022-01-05","2022-01-05 18:41:14","2022-01-05 18:41:14");
INSERT INTO account_statements VALUES("20","0","80000","1","8","1","payment_bonds","a notes","2022-01-05","2022-01-05 18:41:14","2022-01-05 18:41:14");
INSERT INTO account_statements VALUES("21","0","100000","1","6","2","payment_bonds","x notes","2022-01-05","2022-01-05 18:42:53","2022-01-05 18:42:53");
INSERT INTO account_statements VALUES("22","100000","0","6","1","2","payment_bonds","x notes","2022-01-05","2022-01-05 18:42:53","2022-01-05 18:42:53");
INSERT INTO account_statements VALUES("23","0","90000","1","7","2","payment_bonds","y notes","2022-01-05","2022-01-05 18:42:53","2022-01-05 18:42:53");
INSERT INTO account_statements VALUES("24","90000","0","7","1","2","payment_bonds","y notes","2022-01-05","2022-01-05 18:42:53","2022-01-05 18:42:53");
INSERT INTO account_statements VALUES("25","0","80000","1","8","2","payment_bonds","a notes","2022-01-05","2022-01-05 18:42:54","2022-01-05 18:42:54");
INSERT INTO account_statements VALUES("26","80000","0","8","1","2","payment_bonds","a notes","2022-01-05","2022-01-05 18:42:54","2022-01-05 18:42:54");
INSERT INTO account_statements VALUES("27","0","80000","1","6","3","payment_bonds","x notes","2022-01-05","2022-01-05 18:45:39","2022-01-05 18:45:39");
INSERT INTO account_statements VALUES("28","80000","0","6","1","3","payment_bonds","x notes","2022-01-05","2022-01-05 18:45:39","2022-01-05 18:45:39");
INSERT INTO account_statements VALUES("29","0","70000","1","11","3","payment_bonds","d notes","2022-01-05","2022-01-05 18:45:39","2022-01-05 18:45:39");
INSERT INTO account_statements VALUES("30","70000","0","11","1","3","payment_bonds","d notes","2022-01-05","2022-01-05 18:45:39","2022-01-05 18:45:39");
INSERT INTO account_statements VALUES("31","100000","0","1","6","1","catch_bonds","x notes catch","2022-01-05","2022-01-05 20:34:02","2022-01-05 20:34:02");
INSERT INTO account_statements VALUES("32","0","100000","6","1","1","catch_bonds","x notes catch","2022-01-05","2022-01-05 20:34:02","2022-01-05 20:34:02");
INSERT INTO account_statements VALUES("33","50000","0","1","7","1","catch_bonds","y notes catch","2022-01-05","2022-01-05 20:34:03","2022-01-05 20:34:03");
INSERT INTO account_statements VALUES("34","0","50000","7","1","1","catch_bonds","y notes catch","2022-01-05","2022-01-05 20:34:03","2022-01-05 20:34:03");
INSERT INTO account_statements VALUES("35","0","39200","1","2","13","mid_bonds","Array","2022-01-06","2022-01-06 07:18:33","2022-01-06 07:18:33");
INSERT INTO account_statements VALUES("36","39200","0","2","1","14","mid_bonds","","2022-01-06","2022-01-06 07:18:33","2022-01-06 07:18:33");
INSERT INTO account_statements VALUES("37","39200","39200","6","1","4","bills","","2022-01-06","2022-01-06 07:18:33","2022-01-06 07:18:33");
INSERT INTO account_statements VALUES("38","49000","0","1","3","15","mid_bonds","","2022-01-06","2022-01-06 07:18:34","2022-01-06 07:18:34");
INSERT INTO account_statements VALUES("39","0","49000","3","1","16","mid_bonds","","2022-01-06","2022-01-06 07:18:34","2022-01-06 07:18:34");
INSERT INTO account_statements VALUES("40","49000","49000","7","1","4","bills","","2022-01-06","2022-01-06 07:18:34","2022-01-06 07:18:34");
INSERT INTO account_statements VALUES("41","0","2205000","1","2","17","mid_bonds","Array","2022-01-06","2022-01-06 08:11:10","2022-01-06 08:11:10");
INSERT INTO account_statements VALUES("42","2205000","0","2","1","18","mid_bonds","","2022-01-06","2022-01-06 08:11:11","2022-01-06 08:11:11");
INSERT INTO account_statements VALUES("43","2205000","2205000","7","1","5","bills","","2022-01-06","2022-01-06 08:11:11","2022-01-06 08:11:11");
INSERT INTO account_statements VALUES("44","2450000","0","1","3","19","mid_bonds","","2022-01-06","2022-01-06 08:11:11","2022-01-06 08:11:11");
INSERT INTO account_statements VALUES("45","0","2450000","3","1","20","mid_bonds","","2022-01-06","2022-01-06 08:11:11","2022-01-06 08:11:11");
INSERT INTO account_statements VALUES("46","2450000","2450000","6","1","5","bills","","2022-01-06","2022-01-06 08:11:11","2022-01-06 08:11:11");
INSERT INTO account_statements VALUES("47","0","2979200","1","2","21","mid_bonds","Array","2022-01-06","2022-01-06 21:31:04","2022-01-06 21:31:04");
INSERT INTO account_statements VALUES("48","2979200","0","2","1","22","mid_bonds","","2022-01-06","2022-01-06 21:31:04","2022-01-06 21:31:04");
INSERT INTO account_statements VALUES("49","2979200","2979200","6","1","6","bills","","2022-01-06","2022-01-06 21:31:04","2022-01-06 21:31:04");
INSERT INTO account_statements VALUES("50","3136000","0","8","3","23","mid_bonds","","2022-01-06","2022-01-06 21:47:59","2022-01-06 21:47:59");
INSERT INTO account_statements VALUES("51","0","3136000","3","8","24","mid_bonds","","2022-01-06","2022-01-06 21:48:00","2022-01-06 21:48:00");
INSERT INTO account_statements VALUES("52","3136000","0","1","3","25","mid_bonds","","2022-01-06","2022-01-06 21:48:29","2022-01-06 21:48:29");
INSERT INTO account_statements VALUES("53","0","3136000","3","1","26","mid_bonds","","2022-01-06","2022-01-06 21:48:29","2022-01-06 21:48:29");
INSERT INTO account_statements VALUES("54","3136000","3136000","3","1","6","bills","","2022-01-06","2022-01-06 21:48:29","2022-01-06 21:48:29");
INSERT INTO account_statements VALUES("55","3136000","0","1","3","27","mid_bonds","","2022-01-06","2022-01-06 21:52:18","2022-01-06 21:52:18");
INSERT INTO account_statements VALUES("56","0","3136000","3","1","28","mid_bonds","","2022-01-06","2022-01-06 21:52:19","2022-01-06 21:52:19");
INSERT INTO account_statements VALUES("57","3136000","3136000","3","1","6","bills","","2022-01-06","2022-01-06 21:52:19","2022-01-06 21:52:19");
INSERT INTO account_statements VALUES("58","3136000","0","8","3","29","mid_bonds","","2022-01-06","2022-01-06 21:52:31","2022-01-06 21:52:31");
INSERT INTO account_statements VALUES("59","0","3136000","3","8","30","mid_bonds","","2022-01-06","2022-01-06 21:52:31","2022-01-06 21:52:31");
INSERT INTO account_statements VALUES("60","0","88200","1","2","31","mid_bonds","Array","2022-01-06","2022-01-06 21:53:20","2022-01-06 21:53:20");
INSERT INTO account_statements VALUES("61","88200","0","2","1","32","mid_bonds","","2022-01-06","2022-01-06 21:53:21","2022-01-06 21:53:21");
INSERT INTO account_statements VALUES("62","88200","88200","10","1","7","bills","","2022-01-06","2022-01-06 21:53:21","2022-01-06 21:53:21");
INSERT INTO account_statements VALUES("63","98000","0","1","3","33","mid_bonds","","2022-01-06","2022-01-06 21:54:34","2022-01-06 21:54:34");
INSERT INTO account_statements VALUES("64","0","98000","3","1","34","mid_bonds","","2022-01-06","2022-01-06 21:54:34","2022-01-06 21:54:34");
INSERT INTO account_statements VALUES("65","98000","98000","3","1","7","bills","","2022-01-06","2022-01-06 21:54:34","2022-01-06 21:54:34");



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
  `type` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO accounts VALUES("1","1","الصندوق","","","","","0","","","","","","2022-01-04 18:54:08","2022-01-04 18:54:08");
INSERT INTO accounts VALUES("2","2","المشتريات","","","","","0","","","","","","2022-01-04 18:54:08","2022-01-04 18:54:08");
INSERT INTO accounts VALUES("3","3","المبيعات","","","","","0","","","","","","2022-01-04 18:54:27","2022-01-04 18:54:27");
INSERT INTO accounts VALUES("4","4","جبلة","","","","","0","","","","","","2022-01-05 14:20:05","2022-01-05 14:20:05");
INSERT INTO accounts VALUES("6","40001","x","","","","","4","","","","","","2022-01-05 14:20:46","2022-01-05 14:20:46");
INSERT INTO accounts VALUES("7","40002","y","","","","","4","","","","","","2022-01-05 14:20:56","2022-01-05 14:20:56");
INSERT INTO accounts VALUES("8","40003","a","","","","","4","","","","","","2022-01-05 14:43:43","2022-01-05 14:43:43");
INSERT INTO accounts VALUES("9","40004","b","","","","","4","","","","","","2022-01-05 14:43:49","2022-01-05 14:43:49");
INSERT INTO accounts VALUES("10","40005","c","","","","","4","","","","","","2022-01-05 14:46:10","2022-01-05 14:46:10");
INSERT INTO accounts VALUES("11","40006","d","","","","","4","","","","","","2022-01-05 14:46:15","2022-01-05 14:46:15");



CREATE TABLE `bill_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `total_weight` varchar(250) DEFAULT NULL,
  `real_weight` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `total_item_price` varchar(250) DEFAULT NULL,
  `bill_item_note` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO bill_item VALUES("1","1","2","102","100","500","50000","");
INSERT INTO bill_item VALUES("2","1","1","51","50","1000","50000","");
INSERT INTO bill_item VALUES("3","2","3","31","30","1000","30000","");
INSERT INTO bill_item VALUES("4","2","4","41","40","500","20000","");
INSERT INTO bill_item VALUES("5","3","5","10","10","1000","10000","");
INSERT INTO bill_item VALUES("6","4","5","500","490","100","49000","");
INSERT INTO bill_item VALUES("7","5","3","500","490","5000","2450000","");
INSERT INTO bill_item VALUES("8","6","4","8000","7840","400","3136000","nnnnn");
INSERT INTO bill_item VALUES("9","7","3","500","490","200","98000","");



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
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO bills VALUES("1","1","7","6","cash","cash","y cash","x cash","100000","ليرة سورية","5","5000","95000","","2022-01-05","2022-01-05 14:40:52","2022-01-05 14:40:52");
INSERT INTO bills VALUES("2","2","9","8","cash","cash","b cash","a cash","50000","ليرة سورية","3","1500","48500","","2022-01-05","2022-01-05 14:44:57","2022-01-05 14:44:57");
INSERT INTO bills VALUES("3","3","11","10","agel","cash","","","10000","ليرة سورية","2","200","9800","","2022-01-05","2022-01-05 14:47:02","2022-01-05 14:47:02");
INSERT INTO bills VALUES("4","4","7","6","cash","cash","","","49000","ليرة سورية","20","9800","39200","","2022-01-06","2022-01-06 07:18:33","2022-01-06 07:18:33");
INSERT INTO bills VALUES("5","5","6","7","cash","cash","","","2450000","ليرة سورية","10","245000","2205000","","2022-01-06","2022-01-06 08:11:10","2022-01-06 08:11:10");
INSERT INTO bills VALUES("6","6","8","6","agel","cash","helooooo","","3136000","ليرة سورية","5","156800","2979200","","2022-01-06","2022-01-06 21:31:04","2022-01-06 21:52:30");
INSERT INTO bills VALUES("7","7","8","10","cash","cash","","","98000","ليرة سورية","10","9800","88200","","2022-01-06","2022-01-06 21:53:20","2022-01-06 21:54:33");



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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO catch_bonds VALUES("1","1","1","6","100000","2022-01-05","syrian-bounds","x notes catch","all notes","2022-01-05 20:34:02","2022-01-05 20:34:02");
INSERT INTO catch_bonds VALUES("2","1","1","7","50000","2022-01-05","syrian-bounds","y notes catch","all notes","2022-01-05 20:34:03","2022-01-05 20:34:03");



CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO categories VALUES("1","خضار","1"," ملاحظات خضار","2022-01-05 14:21:22","2022-01-05 14:21:22");
INSERT INTO categories VALUES("2","فواكة","2"," ملاحظات فواكة","2022-01-05 14:21:39","2022-01-05 14:21:39");



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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO items VALUES("1","موز","","كغ","","","","","ملاحظات موز","20001","2","","","","","","","2022-01-05 14:22:11","2022-01-05 14:22:11");
INSERT INTO items VALUES("2","بندورة","","كغ","","","","","ملاحظات بندورة","10001","1","","","","","","","2022-01-05 14:22:32","2022-01-05 14:22:32");
INSERT INTO items VALUES("3","فريز","","كغ","","","","","ملاحظات فريز","20002","2","","","","","","","2022-01-05 14:23:02","2022-01-05 14:23:02");
INSERT INTO items VALUES("4","خيار","","كغ","","","","","ملاحظات خيار","10002","1","","","","","","","2022-01-05 14:24:06","2022-01-05 14:24:06");
INSERT INTO items VALUES("5","تفاح","","كغ","","","","","ملاحظات تفاح","20003","2","","","","","","","2022-01-05 14:26:35","2022-01-05 14:26:35");



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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

INSERT INTO mid_bonds VALUES("1","1","1","2","1","95000","0","2022-01-05","","Array","2022-01-05 14:40:52","2022-01-05 14:40:52");
INSERT INTO mid_bonds VALUES("2","2","2","1","1","0","95000","2022-01-05","","x cash","2022-01-05 14:40:53","2022-01-05 14:40:53");
INSERT INTO mid_bonds VALUES("3","3","1","3","1","0","100000","2022-01-05","","y cash","2022-01-05 14:40:53","2022-01-05 14:40:53");
INSERT INTO mid_bonds VALUES("4","4","3","1","1","100000","0","2022-01-05","","y cash","2022-01-05 14:40:53","2022-01-05 14:40:53");
INSERT INTO mid_bonds VALUES("5","5","1","2","2","48500","0","2022-01-05","","Array","2022-01-05 14:44:57","2022-01-05 14:44:57");
INSERT INTO mid_bonds VALUES("6","6","2","1","2","0","48500","2022-01-05","","a cash","2022-01-05 14:44:57","2022-01-05 14:44:57");
INSERT INTO mid_bonds VALUES("7","7","1","3","2","0","50000","2022-01-05","","b cash","2022-01-05 14:44:58","2022-01-05 14:44:58");
INSERT INTO mid_bonds VALUES("8","8","3","1","2","50000","0","2022-01-05","","b cash","2022-01-05 14:44:58","2022-01-05 14:44:58");
INSERT INTO mid_bonds VALUES("9","9","1","2","3","9800","0","2022-01-05","","Array","2022-01-05 14:47:03","2022-01-05 14:47:03");
INSERT INTO mid_bonds VALUES("10","10","2","1","3","0","9800","2022-01-05","","","2022-01-05 14:47:03","2022-01-05 14:47:03");
INSERT INTO mid_bonds VALUES("11","11","11","3","3","0","10000","2022-01-05","","","2022-01-05 14:47:03","2022-01-05 14:47:03");
INSERT INTO mid_bonds VALUES("12","12","3","11","3","10000","0","2022-01-05","","","2022-01-05 14:47:03","2022-01-05 14:47:03");
INSERT INTO mid_bonds VALUES("13","13","1","2","4","39200","0","2022-01-06","","Array","2022-01-06 07:18:33","2022-01-06 07:18:33");
INSERT INTO mid_bonds VALUES("14","14","2","1","4","0","39200","2022-01-06","","","2022-01-06 07:18:33","2022-01-06 07:18:33");
INSERT INTO mid_bonds VALUES("15","15","1","3","4","0","49000","2022-01-06","","","2022-01-06 07:18:34","2022-01-06 07:18:34");
INSERT INTO mid_bonds VALUES("16","16","3","1","4","49000","0","2022-01-06","","","2022-01-06 07:18:34","2022-01-06 07:18:34");
INSERT INTO mid_bonds VALUES("17","17","1","2","5","2205000","0","2022-01-06","","Array","2022-01-06 08:11:10","2022-01-06 08:11:10");
INSERT INTO mid_bonds VALUES("18","18","2","1","5","0","2205000","2022-01-06","","","2022-01-06 08:11:11","2022-01-06 08:11:11");
INSERT INTO mid_bonds VALUES("19","19","1","3","5","0","2450000","2022-01-06","","","2022-01-06 08:11:11","2022-01-06 08:11:11");
INSERT INTO mid_bonds VALUES("20","20","3","1","5","2450000","0","2022-01-06","","","2022-01-06 08:11:11","2022-01-06 08:11:11");
INSERT INTO mid_bonds VALUES("21","21","1","2","6","2979200","0","2022-01-06","","Array","2022-01-06 21:31:04","2022-01-06 21:31:04");
INSERT INTO mid_bonds VALUES("22","22","2","1","6","0","2979200","2022-01-06","","","2022-01-06 21:31:04","2022-01-06 21:31:04");
INSERT INTO mid_bonds VALUES("23","23","8","3","","0","3136000","2022-01-06","","","2022-01-06 21:47:59","2022-01-06 21:47:59");
INSERT INTO mid_bonds VALUES("24","24","3","8","","3136000","0","2022-01-06","","","2022-01-06 21:48:00","2022-01-06 21:48:00");
INSERT INTO mid_bonds VALUES("25","25","1","3","","0","3136000","2022-01-06","","","2022-01-06 21:48:29","2022-01-06 21:48:29");
INSERT INTO mid_bonds VALUES("26","26","3","1","","3136000","0","2022-01-06","","","2022-01-06 21:48:29","2022-01-06 21:48:29");
INSERT INTO mid_bonds VALUES("27","27","1","3","","0","3136000","2022-01-06","","","2022-01-06 21:52:18","2022-01-06 21:52:18");
INSERT INTO mid_bonds VALUES("28","28","3","1","","3136000","0","2022-01-06","","","2022-01-06 21:52:18","2022-01-06 21:52:18");
INSERT INTO mid_bonds VALUES("29","29","8","3","","0","3136000","2022-01-06","","","2022-01-06 21:52:31","2022-01-06 21:52:31");
INSERT INTO mid_bonds VALUES("30","30","3","8","","3136000","0","2022-01-06","","","2022-01-06 21:52:31","2022-01-06 21:52:31");
INSERT INTO mid_bonds VALUES("31","31","1","2","7","88200","0","2022-01-06","","Array","2022-01-06 21:53:20","2022-01-06 21:53:20");
INSERT INTO mid_bonds VALUES("32","32","2","1","7","0","88200","2022-01-06","","","2022-01-06 21:53:20","2022-01-06 21:53:20");
INSERT INTO mid_bonds VALUES("33","33","1","3","","0","98000","2022-01-06","","","2022-01-06 21:54:34","2022-01-06 21:54:34");
INSERT INTO mid_bonds VALUES("34","34","3","1","","98000","0","2022-01-06","","","2022-01-06 21:54:34","2022-01-06 21:54:34");



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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO payment_bonds VALUES("1","1","1","6","20000","2022-01-05","syrian-bounds","x notes","","2022-01-05 18:41:14","2022-01-05 18:41:14");
INSERT INTO payment_bonds VALUES("2","1","1","7","50000","2022-01-05","syrian-bounds","y notes","","2022-01-05 18:41:14","2022-01-05 18:41:14");
INSERT INTO payment_bonds VALUES("3","1","1","8","80000","2022-01-05","syrian-bounds","a notes","","2022-01-05 18:41:14","2022-01-05 18:41:14");
INSERT INTO payment_bonds VALUES("4","2","1","6","100000","2022-01-05","syrian-bounds","x notes","Array","2022-01-05 18:42:53","2022-01-05 18:42:53");
INSERT INTO payment_bonds VALUES("5","2","1","7","90000","2022-01-05","syrian-bounds","y notes","Array","2022-01-05 18:42:53","2022-01-05 18:42:53");
INSERT INTO payment_bonds VALUES("6","2","1","8","80000","2022-01-05","syrian-bounds","a notes","Array","2022-01-05 18:42:54","2022-01-05 18:42:54");
INSERT INTO payment_bonds VALUES("7","3","1","6","80000","2022-01-05","syrian-bounds","x notes","all notes","2022-01-05 18:45:39","2022-01-05 18:45:39");
INSERT INTO payment_bonds VALUES("8","3","1","11","70000","2022-01-05","syrian-bounds","d notes","all notes","2022-01-05 18:45:39","2022-01-05 18:45:39");

