

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

INSERT INTO account_statements VALUES("1","0","10000","10","10","40003","accounts","ملاحظات مهند","2022-01-29","0","2022-01-29 11:25:10","2022-01-29 11:26:35");
INSERT INTO account_statements VALUES("2","100000","0","11","11","40004","accounts","ملاحظات سارة جبلة","2022-01-29","0","2022-01-29 11:29:11","2022-01-29 11:29:11");
INSERT INTO account_statements VALUES("3","0","200000","15","15","60001","accounts","ملاحظات كلودا اللاذقية","2022-01-29","0","2022-01-29 11:34:23","2022-01-29 11:34:23");
INSERT INTO account_statements VALUES("4","50000","0","17","17","70002","accounts","ملاحظات احمد راس العين","2022-01-29","0","2022-01-29 11:35:50","2022-01-29 11:35:50");
INSERT INTO account_statements VALUES("5","0","133000","1","2","1","mid_bonds","","2022-02-02","0","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO account_statements VALUES("6","133000","0","2","1","2","mid_bonds","","2022-02-02","0","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO account_statements VALUES("7","133000","133000","11","1","1","bills","","2022-02-02","0","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO account_statements VALUES("8","140000","0","15","3","3","mid_bonds","","2022-02-02","0","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO account_statements VALUES("9","0","140000","3","15","4","mid_bonds","","2022-02-02","0","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO account_statements VALUES("10","0","150670","1","2","5","mid_bonds","","2022-02-02","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO account_statements VALUES("11","150670","0","2","1","6","mid_bonds","","2022-02-02","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO account_statements VALUES("12","150670","150670","13","1","2","bills","","2022-02-02","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO account_statements VALUES("13","158600","0","1","3","7","mid_bonds","","2022-02-02","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO account_statements VALUES("14","0","158600","3","1","8","mid_bonds","","2022-02-02","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO account_statements VALUES("15","158600","158600","9","1","2","bills","","2022-02-02","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO account_statements VALUES("16","100000","0","1","8","1","catch_bonds","","2022-02-02","0","2022-02-02 11:30:51","2022-02-02 11:30:51");
INSERT INTO account_statements VALUES("17","0","100000","8","1","1","catch_bonds","","2022-02-02","0","2022-02-02 11:30:51","2022-02-02 11:30:51");
INSERT INTO account_statements VALUES("18","0","1000000","1","18","1","payment_bonds","حساب راس العين","2022-02-03","0","2022-02-03 12:08:59","2022-02-03 12:08:59");
INSERT INTO account_statements VALUES("19","1000000","0","18","1","1","payment_bonds","حساب راس العين","2022-02-03","0","2022-02-03 12:08:59","2022-02-03 12:08:59");
INSERT INTO account_statements VALUES("20","0","428260","1","2","9","mid_bonds","","2022-02-08","0","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO account_statements VALUES("21","428260","0","2","1","10","mid_bonds","","2022-02-08","0","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO account_statements VALUES("22","428260","428260","10","1","3","bills","","2022-02-08","0","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO account_statements VALUES("23","450800","0","13","3","11","mid_bonds","","2022-02-08","0","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO account_statements VALUES("24","0","450800","3","13","12","mid_bonds","","2022-02-08","0","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO account_statements VALUES("25","0","83790","1","2","13","mid_bonds","","2022-02-10","0","2022-02-09 15:23:39","2022-02-09 15:23:39");
INSERT INTO account_statements VALUES("26","83790","0","2","1","14","mid_bonds","","2022-02-10","0","2022-02-09 15:23:39","2022-02-09 15:23:39");
INSERT INTO account_statements VALUES("27","83790","83790","8","1","4","bills","","2022-02-10","0","2022-02-09 15:23:39","2022-02-09 15:23:39");
INSERT INTO account_statements VALUES("28","88200","0","10","3","15","mid_bonds","","2022-02-10","0","2022-02-09 15:23:39","2022-02-09 15:23:39");
INSERT INTO account_statements VALUES("29","0","88200","3","10","16","mid_bonds","","2022-02-10","0","2022-02-09 15:23:39","2022-02-09 15:23:39");
INSERT INTO account_statements VALUES("30","0","880175","15","2","17","mid_bonds","note","2022-02-10","0","2022-02-09 15:25:07","2022-02-09 15:25:07");
INSERT INTO account_statements VALUES("31","880175","0","2","15","18","mid_bonds","note","2022-02-10","0","2022-02-09 15:25:07","2022-02-09 15:25:07");
INSERT INTO account_statements VALUES("32","926500","0","16","3","19","mid_bonds","","2022-02-10","0","2022-02-09 15:25:07","2022-02-09 15:25:07");
INSERT INTO account_statements VALUES("33","0","926500","3","16","20","mid_bonds","","2022-02-10","0","2022-02-09 15:25:07","2022-02-09 15:25:07");
INSERT INTO account_statements VALUES("34","0","763420","1","2","21","mid_bonds","","2022-02-10","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO account_statements VALUES("35","763420","0","2","1","22","mid_bonds","","2022-02-10","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO account_statements VALUES("36","763420","763420","18","1","6","bills","","2022-02-10","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO account_statements VALUES("37","803600","0","1","3","23","mid_bonds","","2022-02-10","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO account_statements VALUES("38","0","803600","3","1","24","mid_bonds","","2022-02-10","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO account_statements VALUES("39","803600","803600","17","1","6","bills","","2022-02-10","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO account_statements VALUES("40","0","297920","1","2","25","mid_bonds","","2022-02-10","0","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO account_statements VALUES("41","297920","0","2","1","26","mid_bonds","","2022-02-10","0","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO account_statements VALUES("42","297920","297920","17","1","7","bills","","2022-02-10","0","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO account_statements VALUES("43","313600","0","1","3","27","mid_bonds","","2022-02-10","0","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO account_statements VALUES("44","0","313600","3","1","28","mid_bonds","","2022-02-10","0","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO account_statements VALUES("45","313600","313600","9","1","7","bills","","2022-02-10","0","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO account_statements VALUES("46","0","1033410","1","2","29","mid_bonds","","2022-02-10","0","2022-02-09 15:27:26","2022-02-09 15:27:26");
INSERT INTO account_statements VALUES("47","1033410","0","2","1","30","mid_bonds","","2022-02-10","0","2022-02-09 15:27:26","2022-02-09 15:27:26");
INSERT INTO account_statements VALUES("48","1033410","1033410","15","1","8","bills","","2022-02-10","0","2022-02-09 15:27:26","2022-02-09 15:27:26");
INSERT INTO account_statements VALUES("49","1087800","0","1","3","31","mid_bonds","","2022-02-10","0","2022-02-09 15:27:26","2022-02-09 15:27:26");
INSERT INTO account_statements VALUES("50","0","1087800","3","1","32","mid_bonds","","2022-02-10","0","2022-02-09 15:27:26","2022-02-09 15:27:26");
INSERT INTO account_statements VALUES("51","1087800","1087800","8","1","8","bills","","2022-02-10","0","2022-02-09 15:27:26","2022-02-09 15:27:26");



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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

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
INSERT INTO accounts VALUES("18","70003","عبدالعزير محمد صالح البدوي","","","","","7","","","","","0","","2022-02-03 12:08:22","2022-02-03 12:08:22");



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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO bill_item VALUES("1","1","7","100","2","98","800","78400","","0","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO bill_item VALUES("2","1","4","90","2","88","700","61600","","0","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO bill_item VALUES("3","2","4","100","2","98","900","88200","","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO bill_item VALUES("4","2","14","90","2","88","800","70400","","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO bill_item VALUES("5","3","1","200","2","196","800","156800","","0","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO bill_item VALUES("6","3","8","300","2","294","1000","294000","","0","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO bill_item VALUES("7","4","3","100","2","98","900","88200","","0","2022-02-09 15:23:39","2022-02-09 15:23:39");
INSERT INTO bill_item VALUES("8","5","12","500","2","490","1000","490000","","0","2022-02-09 15:25:07","2022-02-09 15:25:07");
INSERT INTO bill_item VALUES("9","5","11","900","3","873","500","436500","","0","2022-02-09 15:25:07","2022-02-09 15:25:07");
INSERT INTO bill_item VALUES("10","6","8","900","2","882","200","176400","","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO bill_item VALUES("11","6","12","800","2","784","800","627200","","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO bill_item VALUES("12","7","4","400","2","392","800","313600","","0","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO bill_item VALUES("13","8","5","1000","2","980","300","294000","","0","2022-02-09 15:27:26","2022-02-09 15:27:26");
INSERT INTO bill_item VALUES("14","8","11","900","2","882","900","793800","","0","2022-02-09 15:27:26","2022-02-09 15:27:26");



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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO bills VALUES("1","1","15","11","agel","cash","","","140000","ليرة سورية","5","7000","133000","","0","2022-02-02","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO bills VALUES("2","2","9","13","cash","cash","","","158600","ليرة سورية","5","7930","150670","","0","2022-02-02","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO bills VALUES("3","3","13","10","agel","cash","","","450800","ليرة سورية","5","22540","428260","","0","2022-02-08","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO bills VALUES("4","4","10","8","agel","cash","","","88200","ليرة سورية","5","4410","83790","","0","2022-02-10","2022-02-09 15:23:39","2022-02-09 15:23:39");
INSERT INTO bills VALUES("5","5","16","15","agel","agel","","note","926500","ليرة سورية","5","46325","880175","","0","2022-02-10","2022-02-09 15:25:07","2022-02-09 15:25:07");
INSERT INTO bills VALUES("6","6","17","18","cash","cash","","","803600","ليرة سورية","5","40180","763420","","0","2022-02-10","2022-02-09 15:25:49","2022-02-09 15:25:49");
INSERT INTO bills VALUES("7","7","9","17","cash","cash","","","313600","ليرة سورية","5","15680","297920","","0","2022-02-10","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO bills VALUES("8","8","8","15","cash","cash","","","1087800","ليرة سورية","5","54390","1033410","","0","2022-02-10","2022-02-09 15:27:26","2022-02-09 15:27:26");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO catch_bonds VALUES("1","1","1","8","100000","2022-02-02","ليرة سورية","","","0","2022-02-02 11:30:51","2022-02-02 11:30:51");



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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

INSERT INTO mid_bonds VALUES("1","1","1","2","1","133000","0","2022-02-02","","","0","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO mid_bonds VALUES("2","2","2","1","1","0","133000","2022-02-02","","","0","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO mid_bonds VALUES("3","3","15","3","1","0","140000","2022-02-02","","","0","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO mid_bonds VALUES("4","4","3","15","1","140000","0","2022-02-02","","","0","2022-02-02 10:39:51","2022-02-02 10:39:51");
INSERT INTO mid_bonds VALUES("5","5","1","2","2","150670","0","2022-02-02","","","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO mid_bonds VALUES("6","6","2","1","2","0","150670","2022-02-02","","","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO mid_bonds VALUES("7","7","1","3","2","0","158600","2022-02-02","","","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO mid_bonds VALUES("8","8","3","1","2","158600","0","2022-02-02","","","0","2022-02-02 10:42:32","2022-02-02 10:42:32");
INSERT INTO mid_bonds VALUES("9","9","1","2","3","428260","0","2022-02-08","","","0","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO mid_bonds VALUES("10","10","2","1","3","0","428260","2022-02-08","","","0","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO mid_bonds VALUES("11","11","13","3","3","0","450800","2022-02-08","","","0","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO mid_bonds VALUES("12","12","3","13","3","450800","0","2022-02-08","","","0","2022-02-08 10:56:10","2022-02-08 10:56:10");
INSERT INTO mid_bonds VALUES("13","13","1","2","4","83790","0","2022-02-10","","","0","2022-02-09 15:23:39","2022-02-09 15:23:39");
INSERT INTO mid_bonds VALUES("14","14","2","1","4","0","83790","2022-02-10","","","0","2022-02-09 15:23:39","2022-02-09 15:23:39");
INSERT INTO mid_bonds VALUES("15","15","10","3","4","0","88200","2022-02-10","","","0","2022-02-09 15:23:39","2022-02-09 15:23:39");
INSERT INTO mid_bonds VALUES("16","16","3","10","4","88200","0","2022-02-10","","","0","2022-02-09 15:23:39","2022-02-09 15:23:39");
INSERT INTO mid_bonds VALUES("17","17","15","2","5","0","0","2022-02-10","","note","0","2022-02-09 15:25:07","2022-02-09 15:25:07");
INSERT INTO mid_bonds VALUES("18","18","2","15","5","880175","0","2022-02-10","","note","0","2022-02-09 15:25:07","2022-02-09 15:25:07");
INSERT INTO mid_bonds VALUES("19","19","16","3","5","0","926500","2022-02-10","","","0","2022-02-09 15:25:07","2022-02-09 15:25:07");
INSERT INTO mid_bonds VALUES("20","20","3","16","5","926500","0","2022-02-10","","","0","2022-02-09 15:25:07","2022-02-09 15:25:07");
INSERT INTO mid_bonds VALUES("21","21","1","2","6","763420","0","2022-02-10","","","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO mid_bonds VALUES("22","22","2","1","6","0","763420","2022-02-10","","","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO mid_bonds VALUES("23","23","1","3","6","0","803600","2022-02-10","","","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO mid_bonds VALUES("24","24","3","1","6","803600","0","2022-02-10","","","0","2022-02-09 15:25:50","2022-02-09 15:25:50");
INSERT INTO mid_bonds VALUES("25","25","1","2","7","297920","0","2022-02-10","","","0","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO mid_bonds VALUES("26","26","2","1","7","0","297920","2022-02-10","","","0","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO mid_bonds VALUES("27","27","1","3","7","0","313600","2022-02-10","","","0","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO mid_bonds VALUES("28","28","3","1","7","313600","0","2022-02-10","","","0","2022-02-09 15:26:12","2022-02-09 15:26:12");
INSERT INTO mid_bonds VALUES("29","29","1","2","8","1033410","0","2022-02-10","","","0","2022-02-09 15:27:26","2022-02-09 15:27:26");
INSERT INTO mid_bonds VALUES("30","30","2","1","8","0","1033410","2022-02-10","","","0","2022-02-09 15:27:26","2022-02-09 15:27:26");
INSERT INTO mid_bonds VALUES("31","31","1","3","8","0","1087800","2022-02-10","","","0","2022-02-09 15:27:26","2022-02-09 15:27:26");
INSERT INTO mid_bonds VALUES("32","32","3","1","8","1087800","0","2022-02-10","","","0","2022-02-09 15:27:26","2022-02-09 15:27:26");



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

INSERT INTO payment_bonds VALUES("1","1","1","18","1000000","2022-02-03","ليرة سورية","حساب راس العين","","0","2022-02-03 12:08:59","2022-02-03 12:08:59");

