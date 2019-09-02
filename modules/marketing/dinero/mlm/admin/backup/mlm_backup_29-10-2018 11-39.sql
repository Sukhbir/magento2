

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("1","","","admin","123456");



CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `account_no` varchar(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `ifsc` varchar(20) NOT NULL,
  `aadhar_no` varchar(20) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

INSERT INTO bank VALUES("1","ssc000003","Jatin Vinodray Garach","32088678590","State Bank Of India","SBIN0030142","","","");
INSERT INTO bank VALUES("2","ssc000012","Jatin Vinodray Garach","32088678590","State Bank Of India","SBIN0030142","","","");
INSERT INTO bank VALUES("3","ssc000012","Jatin Vinodray Garach","32088678590","State Bank Of India","SBIN0030142","","","");
INSERT INTO bank VALUES("4","ssc000005","Jatin Vinodray Garach","32088678590","State Bank Of India","SBIN0030142","","","");
INSERT INTO bank VALUES("5","ssc000009","Jatin Vinodray Garach","32088678590","State Bank Of India","SBIN0030142","","","");
INSERT INTO bank VALUES("6","ssc000020","Jatin Vinodray Garach","32088678590","State Bank Of India","SBIN0030142","","","");
INSERT INTO bank VALUES("7","ssc000016","Jatin Vinodray Garach","32088678590","State Bank Of India","SBIN0030142","","","");
INSERT INTO bank VALUES("8","ssc000027","Jatin Vinodray Garach","32088678590","State Bank Of India","SBIN0030142","","","");
INSERT INTO bank VALUES("9","ssc000036","Kruti Dipan thaker","59010031347","Dena Bank","BKDN0110590","","","");
INSERT INTO bank VALUES("10","ssc000038","Purva Dipan thaker","59010032800","Dena Bank","BKDN0110590","","","");
INSERT INTO bank VALUES("11","ssc000032","Dipan Rameshchhandra Thaker","45701505171","Icici Bank","ICIC0000457","","","");
INSERT INTO bank VALUES("12","ssc000035","Dipan Rameshchhandra Thaker","45701505171","Icici Bank","ICIC0000457","","","");
INSERT INTO bank VALUES("13","ssc000033","Vidhita Dipankumar Thakar","624401522669","Icici Bank","ICIC0006244","","","");
INSERT INTO bank VALUES("14","ssc000037","Vidhita Dipankumar Thakar","624401522669","Icici Bank","ICIC0006244","","","");
INSERT INTO bank VALUES("15","ssc000015","Paurvi Jatin Garach","20184361434","State Bank Of India","SBIN0011791","","","");
INSERT INTO bank VALUES("16","ssc000028","Paurvi Jatin Garach","20184361434","State Bank Of India","SBIN0011791","","","");
INSERT INTO bank VALUES("17","ssc000031","Paurvi Jatin Garach","20184361434","State Bank Of India","SBIN0011791","","","");
INSERT INTO bank VALUES("18","ssc000039","Dineshchandra Babulal Barot","6401515248","Icici Bank","ICIC0000640","","","");
INSERT INTO bank VALUES("19","ssc000040","Dineshchandra Babulal Barot","6401515248","Icici Bank","ICIC0000640","","","");
INSERT INTO bank VALUES("20","ssc000041","Dineshchandra Babulal Barot","6401515248","Icici Bank","ICIC0000640","","","");
INSERT INTO bank VALUES("21","ssc000034","Dipan Rameshchhandra Thaker","45701505171","Icici Bank","ICIC0000457","","","");
INSERT INTO bank VALUES("22","ssc000052","VirenKumar Dasharathbhai Ghamande ","15671140008469","HDFC Bank ","HDFC0001567","","","");
INSERT INTO bank VALUES("23","ssc000053","VirenKumar Dasharathbhai Ghamande ","15671140008469","HDFC Bank ","HDFC0001567","","","");
INSERT INTO bank VALUES("24","ssc000062","HIRABEN KAMLESHKUMAR LAKUM","50100146243182","HDFC","HDFC0000956","","","");
INSERT INTO bank VALUES("25","SSC000074","BABUBHAI BIPINBHAI MAKWANA ","595602010007073","UNION BANK ","UBIN0559563","","","");
INSERT INTO bank VALUES("27","SSC000001","Karan N Zala","000001","Xyz","0000","000000","000000","");
INSERT INTO bank VALUES("28","ssc000054","VirenKumar Dasharathbhai Ghamande ","15671140008469","HDFC Bank ","HDFC0001567","862614929383","AFZPC4719E","");
INSERT INTO bank VALUES("29","ssc000093","CHETAN KUMAR M PATEL","286104000028273","IDBI BANK","IBKL0000286","860482029694","ajcpp7209h","");
INSERT INTO bank VALUES("30","SSC000129","Bansibhai ambalal ravat","003010100961226","Axis","UTIB0000003 ","449151303472","CZFPS7519L","");
INSERT INTO bank VALUES("31","SSC000129","Bansibhai ambalal ravat","003010100961226","Axis","UTIB0000003 ","449151303472","CZFPS7519L","");
INSERT INTO bank VALUES("32","SSC000130","BHANUBHAI AMBALAL SHENVA","912010023595832","AXIS BANK ","UTIB0000003","748965753408","CYXPS2394Q","");
INSERT INTO bank VALUES("33","Ssc000069","Zala Geeta ","30984202732","State bank of india","SBIN0003805","359858777873","ABAPZ7288A","");
INSERT INTO bank VALUES("34","ssc000002","sasasasas","505011815104510","sdsfdfddf","44045FDsdf","123456565555","555555555555","67, Meman Colony, Sakariya Society");



CREATE TABLE `dally_flush` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `todate` date NOT NULL,
  `capping` int(1) NOT NULL,
  `backup` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO dally_flush VALUES("1","2018-10-29","1","1");



CREATE TABLE `e_pin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `e_pin` int(7) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO e_pin VALUES("1","SSC000098","3861435","0");
INSERT INTO e_pin VALUES("2","SSC000101","5076214","1");
INSERT INTO e_pin VALUES("3","Ssc000093","1438169","1");
INSERT INTO e_pin VALUES("4","Ssc000093","2577708","0");



CREATE TABLE `e_pin_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `amount` int(7) NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO e_pin_request VALUES("1","ssc000046","5000","2018-09-27","0");
INSERT INTO e_pin_request VALUES("2","ssc000001","5000","2018-09-27","0");
INSERT INTO e_pin_request VALUES("3","ssc000062","0","2018-10-02","0");
INSERT INTO e_pin_request VALUES("4","Ssc000093","5000","2018-10-05","1");
INSERT INTO e_pin_request VALUES("5","Ssc000093","5000","2018-10-05","1");
INSERT INTO e_pin_request VALUES("6","SSC000098","5000","2018-10-05","1");
INSERT INTO e_pin_request VALUES("7","SSC000101","5000","2018-10-05","1");
INSERT INTO e_pin_request VALUES("8","ssc000039","0","2018-10-07","0");
INSERT INTO e_pin_request VALUES("9","ssc000001","5000","2018-10-07","0");
INSERT INTO e_pin_request VALUES("10","Ssc000020","5000","2018-10-11","0");



CREATE TABLE `e_pin_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_pin_values` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO e_pin_setting VALUES("1","5000");



CREATE TABLE `e_wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `current_bal` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

INSERT INTO e_wallet VALUES("1","SSC000001","5000");
INSERT INTO e_wallet VALUES("2","SSC000002","0");
INSERT INTO e_wallet VALUES("3","SSC000003","0");
INSERT INTO e_wallet VALUES("4","SSC000004","0");
INSERT INTO e_wallet VALUES("5","SSC000005","0");
INSERT INTO e_wallet VALUES("6","SSC000006","0");
INSERT INTO e_wallet VALUES("7","SSC000007","0");
INSERT INTO e_wallet VALUES("8","SSC000008","0");
INSERT INTO e_wallet VALUES("9","SSC000009","0");
INSERT INTO e_wallet VALUES("10","SSC000010","0");
INSERT INTO e_wallet VALUES("11","SSC000011","0");
INSERT INTO e_wallet VALUES("12","SSC000012","0");
INSERT INTO e_wallet VALUES("13","SSC000013","0");
INSERT INTO e_wallet VALUES("14","SSC000014","0");
INSERT INTO e_wallet VALUES("15","SSC000015","0");
INSERT INTO e_wallet VALUES("16","SSC000016","0");
INSERT INTO e_wallet VALUES("17","SSC000017","0");
INSERT INTO e_wallet VALUES("18","SSC000018","0");
INSERT INTO e_wallet VALUES("19","SSC000019","0");
INSERT INTO e_wallet VALUES("20","SSC000020","0");
INSERT INTO e_wallet VALUES("21","SSC000021","0");
INSERT INTO e_wallet VALUES("22","SSC000022","0");
INSERT INTO e_wallet VALUES("23","SSC000023","0");
INSERT INTO e_wallet VALUES("24","SSC000024","0");
INSERT INTO e_wallet VALUES("25","SSC000025","0");
INSERT INTO e_wallet VALUES("26","SSC000026","0");
INSERT INTO e_wallet VALUES("27","SSC000027","0");
INSERT INTO e_wallet VALUES("28","SSC000028","0");
INSERT INTO e_wallet VALUES("29","SSC000029","0");
INSERT INTO e_wallet VALUES("30","SSC000030","0");
INSERT INTO e_wallet VALUES("31","SSC000031","0");
INSERT INTO e_wallet VALUES("32","SSC000032","0");
INSERT INTO e_wallet VALUES("33","SSC000033","0");
INSERT INTO e_wallet VALUES("34","SSC000034","0");
INSERT INTO e_wallet VALUES("35","SSC000035","0");
INSERT INTO e_wallet VALUES("36","SSC000036","0");
INSERT INTO e_wallet VALUES("37","SSC000037","0");
INSERT INTO e_wallet VALUES("38","SSC000038","0");
INSERT INTO e_wallet VALUES("39","SSC000039","0");
INSERT INTO e_wallet VALUES("40","SSC000040","0");
INSERT INTO e_wallet VALUES("41","SSC000041","0");
INSERT INTO e_wallet VALUES("42","SSC000042","0");
INSERT INTO e_wallet VALUES("43","SSC000043","0");
INSERT INTO e_wallet VALUES("44","SSC000044","0");
INSERT INTO e_wallet VALUES("45","SSC000045","0");
INSERT INTO e_wallet VALUES("46","SSC000046","0");
INSERT INTO e_wallet VALUES("47","SSC000047","0");
INSERT INTO e_wallet VALUES("48","SSC000048","0");
INSERT INTO e_wallet VALUES("49","SSC000049","0");
INSERT INTO e_wallet VALUES("50","SSC000050","0");
INSERT INTO e_wallet VALUES("51","SSC000051","0");
INSERT INTO e_wallet VALUES("52","SSC000052","0");
INSERT INTO e_wallet VALUES("53","SSC000053","0");
INSERT INTO e_wallet VALUES("54","SSC000054","0");
INSERT INTO e_wallet VALUES("55","SSC000055","0");
INSERT INTO e_wallet VALUES("56","SSC000056","0");
INSERT INTO e_wallet VALUES("57","SSC000057","0");
INSERT INTO e_wallet VALUES("58","SSC000058","0");
INSERT INTO e_wallet VALUES("59","SSC000059","0");
INSERT INTO e_wallet VALUES("60","SSC000060","0");
INSERT INTO e_wallet VALUES("61","SSC000061","0");
INSERT INTO e_wallet VALUES("62","SSC000062","0");
INSERT INTO e_wallet VALUES("63","SSC000063","0");
INSERT INTO e_wallet VALUES("64","SSC000064","0");
INSERT INTO e_wallet VALUES("65","SSC000065","0");
INSERT INTO e_wallet VALUES("66","SSC000066","0");
INSERT INTO e_wallet VALUES("67","SSC000067","0");
INSERT INTO e_wallet VALUES("68","SSC000068","0");
INSERT INTO e_wallet VALUES("69","SSC000069","0");
INSERT INTO e_wallet VALUES("70","SSC000070","0");
INSERT INTO e_wallet VALUES("71","SSC000071","0");
INSERT INTO e_wallet VALUES("72","SSC000072","0");
INSERT INTO e_wallet VALUES("73","SSC000073","0");
INSERT INTO e_wallet VALUES("74","SSC000074","0");
INSERT INTO e_wallet VALUES("75","SSC000075","0");
INSERT INTO e_wallet VALUES("76","SSC000076","0");
INSERT INTO e_wallet VALUES("77","SSC000077","0");
INSERT INTO e_wallet VALUES("78","SSC000078","0");
INSERT INTO e_wallet VALUES("79","SSC000079","0");
INSERT INTO e_wallet VALUES("80","SSC000080","0");
INSERT INTO e_wallet VALUES("81","SSC000081","0");
INSERT INTO e_wallet VALUES("82","SSC000082","0");
INSERT INTO e_wallet VALUES("83","SSC000083","0");
INSERT INTO e_wallet VALUES("84","SSC000084","0");
INSERT INTO e_wallet VALUES("85","SSC000085","0");
INSERT INTO e_wallet VALUES("86","SSC000086","0");
INSERT INTO e_wallet VALUES("87","SSC000087","0");
INSERT INTO e_wallet VALUES("88","SSC000088","0");
INSERT INTO e_wallet VALUES("89","SSC000089","0");
INSERT INTO e_wallet VALUES("90","SSC000090","0");
INSERT INTO e_wallet VALUES("91","SSC000091","0");
INSERT INTO e_wallet VALUES("92","SSC000092","0");
INSERT INTO e_wallet VALUES("93","SSC000093","0");
INSERT INTO e_wallet VALUES("94","SSC000094","0");
INSERT INTO e_wallet VALUES("95","SSC000095","0");
INSERT INTO e_wallet VALUES("96","SSC000096","0");
INSERT INTO e_wallet VALUES("97","SSC000097","0");
INSERT INTO e_wallet VALUES("98","SSC000098","0");
INSERT INTO e_wallet VALUES("99","SSC000099","0");
INSERT INTO e_wallet VALUES("100","SSC000100","0");
INSERT INTO e_wallet VALUES("101","SSC000101","0");
INSERT INTO e_wallet VALUES("102","SSC000102","0");
INSERT INTO e_wallet VALUES("103","SSC000103","0");
INSERT INTO e_wallet VALUES("104","SSC000104","0");
INSERT INTO e_wallet VALUES("106","SSC000105","0");
INSERT INTO e_wallet VALUES("107","SSC000106","0");
INSERT INTO e_wallet VALUES("108","SSC000107","0");
INSERT INTO e_wallet VALUES("109","SSC000108","0");
INSERT INTO e_wallet VALUES("110","SSC000109","0");
INSERT INTO e_wallet VALUES("111","SSC000110","0");
INSERT INTO e_wallet VALUES("112","SSC000111","0");
INSERT INTO e_wallet VALUES("113","SSC000112","0");
INSERT INTO e_wallet VALUES("114","SSC000113","0");
INSERT INTO e_wallet VALUES("115","SSC000114","0");
INSERT INTO e_wallet VALUES("116","SSC000115","0");
INSERT INTO e_wallet VALUES("117","SSC000116","0");
INSERT INTO e_wallet VALUES("118","SSC000117","0");
INSERT INTO e_wallet VALUES("119","SSC000118","0");
INSERT INTO e_wallet VALUES("120","SSC000119","0");
INSERT INTO e_wallet VALUES("121","SSC000120","0");
INSERT INTO e_wallet VALUES("122","SSC000121","0");
INSERT INTO e_wallet VALUES("123","SSC000122","0");
INSERT INTO e_wallet VALUES("124","SSC000123","0");
INSERT INTO e_wallet VALUES("125","SSC000124","0");
INSERT INTO e_wallet VALUES("126","SSC000125","0");
INSERT INTO e_wallet VALUES("127","SSC000126","0");
INSERT INTO e_wallet VALUES("128","SSC000127","0");
INSERT INTO e_wallet VALUES("129","SSC000128","0");
INSERT INTO e_wallet VALUES("130","SSC000129","0");
INSERT INTO e_wallet VALUES("131","SSC000130","0");
INSERT INTO e_wallet VALUES("132","SSC000131","0");
INSERT INTO e_wallet VALUES("133","SSC000132","0");
INSERT INTO e_wallet VALUES("134","SSC000133","0");
INSERT INTO e_wallet VALUES("135","SSC000134","0");
INSERT INTO e_wallet VALUES("136","SSC000135","0");
INSERT INTO e_wallet VALUES("137","SSC000136","0");
INSERT INTO e_wallet VALUES("138","SSC000137","0");
INSERT INTO e_wallet VALUES("139","SSC000138","0");
INSERT INTO e_wallet VALUES("140","SSC000139","0");
INSERT INTO e_wallet VALUES("141","SSC000140","0");
INSERT INTO e_wallet VALUES("142","SSC000141","0");
INSERT INTO e_wallet VALUES("143","SSC000142","0");
INSERT INTO e_wallet VALUES("144","SSC000143","0");
INSERT INTO e_wallet VALUES("145","SSC000144","0");
INSERT INTO e_wallet VALUES("146","SSC000145","0");
INSERT INTO e_wallet VALUES("147","SSC000146","0");
INSERT INTO e_wallet VALUES("148","SSC000147","0");
INSERT INTO e_wallet VALUES("149","SSC000148","0");
INSERT INTO e_wallet VALUES("150","SSC000149","0");
INSERT INTO e_wallet VALUES("151","SSC000150","0");
INSERT INTO e_wallet VALUES("152","SSC000151","0");
INSERT INTO e_wallet VALUES("153","SSC000152","0");
INSERT INTO e_wallet VALUES("155","SSC000153","0");
INSERT INTO e_wallet VALUES("156","SSC000154","0");
INSERT INTO e_wallet VALUES("157","SSC000155","0");
INSERT INTO e_wallet VALUES("158","SSC000156","0");
INSERT INTO e_wallet VALUES("159","SSC000157","0");
INSERT INTO e_wallet VALUES("160","SSC000158","0");
INSERT INTO e_wallet VALUES("161","SSC000159","0");
INSERT INTO e_wallet VALUES("162","SSC000160","0");
INSERT INTO e_wallet VALUES("163","SSC000161","0");



CREATE TABLE `e_wallet_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `amount` int(8) NOT NULL,
  `debit_credit` varchar(6) NOT NULL,
  `remark` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO e_wallet_transactions VALUES("1","ssc000001","2018-09-15","5000","credit","
		You Added Fund in E-Wallet");
INSERT INTO e_wallet_transactions VALUES("2","ssc000001","2018-09-18","5000","debit","You Transfer Fund to ssc000001");
INSERT INTO e_wallet_transactions VALUES("3","ssc000001","2018-09-18","5000","credit","You Got Fund from ssc000001");
INSERT INTO e_wallet_transactions VALUES("4","ssc000046","2018-09-27","5000","credit","
		You Added Fund in E-Wallet");
INSERT INTO e_wallet_transactions VALUES("5","ssc000046","2018-09-27","5000","debit","You Requested New E-Pin");
INSERT INTO e_wallet_transactions VALUES("6","ssc000001","2018-09-27","5000","credit","
		You Added Fund in E-Wallet");
INSERT INTO e_wallet_transactions VALUES("7","ssc000001","2018-09-27","5000","debit","You Requested New E-Pin");
INSERT INTO e_wallet_transactions VALUES("8","ssc000062","2018-10-02","0","debit","You Requested New E-Pin");
INSERT INTO e_wallet_transactions VALUES("9","Ssc000093","2018-10-05","5000","credit","
		You Added Fund in E-Wallet");
INSERT INTO e_wallet_transactions VALUES("10","Ssc000093","2018-10-05","5000","debit","You Requested New E-Pin");
INSERT INTO e_wallet_transactions VALUES("11","Ssc000093","2018-10-05","5000","credit","
		You Added Fund in E-Wallet");
INSERT INTO e_wallet_transactions VALUES("12","Ssc000093","2018-10-05","5000","debit","You Requested New E-Pin");
INSERT INTO e_wallet_transactions VALUES("13","SSC000098","2018-10-05","5000","credit","
		You Added Fund in E-Wallet");
INSERT INTO e_wallet_transactions VALUES("14","SSC000098","2018-10-05","5000","debit","You Requested New E-Pin");
INSERT INTO e_wallet_transactions VALUES("15","SSC000101","2018-10-05","5000","credit","
		You Added Fund in E-Wallet");
INSERT INTO e_wallet_transactions VALUES("16","SSC000101","2018-10-05","5000","debit","You Requested New E-Pin");
INSERT INTO e_wallet_transactions VALUES("17","SSC000098","2018-10-06","0","credit","
		You Added Fund in E-Wallet");
INSERT INTO e_wallet_transactions VALUES("18","ssc000039","2018-10-07","0","debit","You Requested New E-Pin");
INSERT INTO e_wallet_transactions VALUES("19","ssc000001","2018-10-07","5000","credit","
		You Added Fund in E-Wallet");
INSERT INTO e_wallet_transactions VALUES("20","ssc000001","2018-10-07","5000","debit","You Requested New E-Pin");
INSERT INTO e_wallet_transactions VALUES("21","Ssc000020","2018-10-11","5000","credit","
		You Added Fund in E-Wallet");
INSERT INTO e_wallet_transactions VALUES("22","Ssc000020","2018-10-11","5000","debit","You Requested New E-Pin");



CREATE TABLE `ec_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `product_id` int(8) NOT NULL,
  `qty` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `ec_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `ec_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `ec_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` int(5) NOT NULL,
  `image1` varchar(300) NOT NULL,
  `image2` varchar(300) NOT NULL,
  `image3` varchar(300) NOT NULL,
  `mrp` int(6) NOT NULL,
  `price` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `ec_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `enrollment_pack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enrollment_title` varchar(20) NOT NULL,
  `enrollment_price` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO enrollment_pack VALUES("1","Package","5000");



CREATE TABLE `income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `day_bal` int(6) NOT NULL,
  `current_bal` int(6) NOT NULL,
  `total_bal` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

INSERT INTO income VALUES("1","SSC000001","0","7200","15200");
INSERT INTO income VALUES("2","SSC000002","0","7200","7200");
INSERT INTO income VALUES("3","SSC000003","0","14400","14400");
INSERT INTO income VALUES("4","SSC000004","0","2400","2400");
INSERT INTO income VALUES("5","SSC000005","0","6400","6400");
INSERT INTO income VALUES("6","SSC000006","0","2400","2400");
INSERT INTO income VALUES("7","SSC000007","0","2400","2400");
INSERT INTO income VALUES("8","SSC000008","0","800","800");
INSERT INTO income VALUES("9","SSC000009","0","800","800");
INSERT INTO income VALUES("10","SSC000010","0","800","800");
INSERT INTO income VALUES("11","SSC000011","0","800","800");
INSERT INTO income VALUES("12","SSC000012","0","800","800");
INSERT INTO income VALUES("13","SSC000013","0","8800","8800");
INSERT INTO income VALUES("14","SSC000014","0","800","800");
INSERT INTO income VALUES("15","SSC000015","0","11200","11200");
INSERT INTO income VALUES("16","SSC000016","0","0","0");
INSERT INTO income VALUES("17","SSC000017","0","0","0");
INSERT INTO income VALUES("18","SSC000018","0","800","800");
INSERT INTO income VALUES("19","SSC000019","0","2400","2400");
INSERT INTO income VALUES("20","SSC000020","0","4000","4000");
INSERT INTO income VALUES("21","SSC000021","0","0","0");
INSERT INTO income VALUES("22","SSC000022","0","0","0");
INSERT INTO income VALUES("23","SSC000023","0","0","0");
INSERT INTO income VALUES("24","SSC000024","0","0","0");
INSERT INTO income VALUES("25","SSC000025","0","0","0");
INSERT INTO income VALUES("26","SSC000026","0","0","0");
INSERT INTO income VALUES("27","SSC000027","0","0","0");
INSERT INTO income VALUES("28","SSC000028","0","0","0");
INSERT INTO income VALUES("29","SSC000029","0","0","0");
INSERT INTO income VALUES("30","SSC000030","0","0","0");
INSERT INTO income VALUES("31","SSC000031","0","0","0");
INSERT INTO income VALUES("32","SSC000032","0","6400","6400");
INSERT INTO income VALUES("33","SSC000033","0","1600","1600");
INSERT INTO income VALUES("34","SSC000034","0","2400","2400");
INSERT INTO income VALUES("35","SSC000035","0","800","800");
INSERT INTO income VALUES("36","SSC000036","0","800","800");
INSERT INTO income VALUES("37","SSC000037","0","800","800");
INSERT INTO income VALUES("38","SSC000038","0","0","0");
INSERT INTO income VALUES("39","SSC000039","0","2400","2400");
INSERT INTO income VALUES("40","SSC000040","0","800","800");
INSERT INTO income VALUES("41","SSC000041","0","0","0");
INSERT INTO income VALUES("42","SSC000042","0","2400","2400");
INSERT INTO income VALUES("43","SSC000043","0","800","800");
INSERT INTO income VALUES("44","SSC000044","0","800","800");
INSERT INTO income VALUES("45","SSC000045","0","0","0");
INSERT INTO income VALUES("46","SSC000046","0","800","800");
INSERT INTO income VALUES("47","SSC000047","0","800","800");
INSERT INTO income VALUES("48","SSC000048","0","0","0");
INSERT INTO income VALUES("49","SSC000049","0","0","0");
INSERT INTO income VALUES("50","SSC000050","0","0","0");
INSERT INTO income VALUES("51","SSC000051","0","0","0");
INSERT INTO income VALUES("52","SSC000052","0","800","800");
INSERT INTO income VALUES("53","SSC000053","0","0","0");
INSERT INTO income VALUES("54","SSC000054","0","0","0");
INSERT INTO income VALUES("55","SSC000055","0","0","0");
INSERT INTO income VALUES("56","SSC000056","0","800","800");
INSERT INTO income VALUES("57","SSC000057","0","800","800");
INSERT INTO income VALUES("58","SSC000058","0","0","0");
INSERT INTO income VALUES("59","SSC000059","0","0","0");
INSERT INTO income VALUES("60","SSC000060","0","0","0");
INSERT INTO income VALUES("61","SSC000061","0","0","0");
INSERT INTO income VALUES("62","SSC000062","0","5600","5600");
INSERT INTO income VALUES("63","SSC000063","0","3200","3200");
INSERT INTO income VALUES("64","SSC000064","0","800","800");
INSERT INTO income VALUES("65","SSC000065","0","800","800");
INSERT INTO income VALUES("66","SSC000066","0","3200","3200");
INSERT INTO income VALUES("67","SSC000067","0","800","800");
INSERT INTO income VALUES("68","SSC000068","0","800","800");
INSERT INTO income VALUES("69","SSC000069","0","800","800");
INSERT INTO income VALUES("70","SSC000070","0","0","0");
INSERT INTO income VALUES("71","SSC000071","0","0","0");
INSERT INTO income VALUES("72","SSC000072","0","0","0");
INSERT INTO income VALUES("73","SSC000073","0","800","800");
INSERT INTO income VALUES("74","SSC000074","0","0","0");
INSERT INTO income VALUES("75","SSC000075","0","0","0");
INSERT INTO income VALUES("76","SSC000076","0","0","0");
INSERT INTO income VALUES("77","SSC000077","0","0","0");
INSERT INTO income VALUES("78","SSC000078","0","0","0");
INSERT INTO income VALUES("79","SSC000079","0","0","0");
INSERT INTO income VALUES("80","SSC000080","0","0","0");
INSERT INTO income VALUES("81","SSC000081","0","7200","7200");
INSERT INTO income VALUES("82","SSC000082","0","3200","3200");
INSERT INTO income VALUES("83","SSC000083","0","4000","4000");
INSERT INTO income VALUES("84","SSC000084","0","800","800");
INSERT INTO income VALUES("85","SSC000085","0","2400","2400");
INSERT INTO income VALUES("86","SSC000086","0","0","0");
INSERT INTO income VALUES("87","SSC000087","0","800","800");
INSERT INTO income VALUES("88","SSC000088","0","800","800");
INSERT INTO income VALUES("89","SSC000089","0","0","0");
INSERT INTO income VALUES("90","SSC000090","0","800","800");
INSERT INTO income VALUES("91","SSC000091","0","0","0");
INSERT INTO income VALUES("92","SSC000092","0","0","0");
INSERT INTO income VALUES("93","SSC000093","0","0","0");
INSERT INTO income VALUES("94","SSC000094","0","0","0");
INSERT INTO income VALUES("95","SSC000095","0","0","0");
INSERT INTO income VALUES("96","SSC000096","0","0","0");
INSERT INTO income VALUES("97","SSC000097","0","0","0");
INSERT INTO income VALUES("98","SSC000098","0","6400","6400");
INSERT INTO income VALUES("99","SSC000099","0","800","800");
INSERT INTO income VALUES("100","SSC000100","0","3200","3200");
INSERT INTO income VALUES("101","SSC000101","0","800","800");
INSERT INTO income VALUES("102","SSC000102","0","0","0");
INSERT INTO income VALUES("103","SSC000103","0","0","0");
INSERT INTO income VALUES("104","SSC000104","0","0","0");
INSERT INTO income VALUES("106","SSC000105","0","0","0");
INSERT INTO income VALUES("107","SSC000106","0","800","800");
INSERT INTO income VALUES("108","SSC000107","0","0","0");
INSERT INTO income VALUES("109","SSC000108","0","0","0");
INSERT INTO income VALUES("110","SSC000109","0","0","0");
INSERT INTO income VALUES("111","SSC000110","0","800","800");
INSERT INTO income VALUES("112","SSC000111","0","0","0");
INSERT INTO income VALUES("113","SSC000112","0","0","0");
INSERT INTO income VALUES("114","SSC000113","0","0","0");
INSERT INTO income VALUES("115","SSC000114","0","0","0");
INSERT INTO income VALUES("116","SSC000115","0","800","800");
INSERT INTO income VALUES("117","SSC000116","0","0","0");
INSERT INTO income VALUES("118","SSC000117","0","0","0");
INSERT INTO income VALUES("119","SSC000118","0","0","0");
INSERT INTO income VALUES("120","SSC000119","0","800","800");
INSERT INTO income VALUES("121","SSC000120","0","0","0");
INSERT INTO income VALUES("122","SSC000121","0","0","0");
INSERT INTO income VALUES("123","SSC000122","0","0","0");
INSERT INTO income VALUES("124","SSC000123","0","800","800");
INSERT INTO income VALUES("125","SSC000124","0","0","0");
INSERT INTO income VALUES("126","SSC000125","0","0","0");
INSERT INTO income VALUES("127","SSC000126","0","800","800");
INSERT INTO income VALUES("128","SSC000127","0","0","0");
INSERT INTO income VALUES("129","SSC000128","0","0","0");
INSERT INTO income VALUES("130","SSC000129","0","800","800");
INSERT INTO income VALUES("131","SSC000130","0","0","0");
INSERT INTO income VALUES("132","SSC000131","0","0","0");
INSERT INTO income VALUES("133","SSC000132","0","0","0");
INSERT INTO income VALUES("134","SSC000133","0","0","0");
INSERT INTO income VALUES("135","SSC000134","0","1600","1600");
INSERT INTO income VALUES("136","SSC000135","0","0","0");
INSERT INTO income VALUES("137","SSC000136","0","800","800");
INSERT INTO income VALUES("138","SSC000137","0","0","0");
INSERT INTO income VALUES("139","SSC000138","0","0","0");
INSERT INTO income VALUES("140","SSC000139","0","0","0");
INSERT INTO income VALUES("141","SSC000140","0","800","800");
INSERT INTO income VALUES("142","SSC000141","0","0","0");
INSERT INTO income VALUES("143","SSC000142","0","0","0");
INSERT INTO income VALUES("144","SSC000143","0","800","800");
INSERT INTO income VALUES("145","SSC000144","0","0","0");
INSERT INTO income VALUES("146","SSC000145","0","0","0");
INSERT INTO income VALUES("147","SSC000146","0","0","0");
INSERT INTO income VALUES("148","SSC000147","0","0","0");
INSERT INTO income VALUES("149","SSC000148","0","800","800");
INSERT INTO income VALUES("150","SSC000149","0","0","0");
INSERT INTO income VALUES("151","SSC000150","0","0","0");
INSERT INTO income VALUES("152","SSC000151","0","0","0");
INSERT INTO income VALUES("153","SSC000152","0","0","0");
INSERT INTO income VALUES("155","SSC000153","0","0","0");
INSERT INTO income VALUES("156","SSC000154","0","0","0");
INSERT INTO income VALUES("157","SSC000155","0","0","0");
INSERT INTO income VALUES("158","SSC000156","0","0","0");
INSERT INTO income VALUES("159","SSC000157","0","0","0");
INSERT INTO income VALUES("160","SSC000158","0","0","0");
INSERT INTO income VALUES("161","SSC000159","0","0","0");
INSERT INTO income VALUES("162","SSC000160","0","0","0");
INSERT INTO income VALUES("163","SSC000161","0","0","0");



CREATE TABLE `income_received` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `amount` int(8) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO income_received VALUES("1","SSC000001","4000","2018-09-26");
INSERT INTO income_received VALUES("2","SSC000001","4000","2018-09-29");



CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `uname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `enrollement_fee` int(5) NOT NULL,
  `sponsor` varchar(20) NOT NULL,
  `position` varchar(6) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `role` varchar(10) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

INSERT INTO member VALUES("1","Karan N","Zala","SSC000001","karannzala@gmail.com","7778020767","1","","","123456","1","user","2018-09-14 08:25:00");
INSERT INTO member VALUES("2","Ajit","Chawda","SSC000002","ajitchawda001@gmail.com","9876543210","1","SSC000001","right","123456","1","user","2018-09-14 08:47:57");
INSERT INTO member VALUES("3","Jatin","Garach","SSC000003","jatingarach@gmail.com","9408830584","1","SSC000001","left","123456","1","user","2018-09-14 09:09:54");
INSERT INTO member VALUES("4","Rupaben N","Zala","SSC000004","rupabennzala@gmail.com","9876543210","1","SSC000002","right","123456","1","user","2018-09-14 10:38:38");
INSERT INTO member VALUES("5","Jatin","Garach","SSC000005","jatingarach001@gmail.com","9408830584","1","SSC000002","left","123456","1","user","2018-09-14 10:42:44");
INSERT INTO member VALUES("6","Ajit","Chawda","SSC000006","ajitchawda@gmail.com","9632587410","1","SSC000003","right","123456","1","user","2018-09-14 10:57:29");
INSERT INTO member VALUES("7","Navnit V","Zala","SSC000007","Navnitzala001@gmail.com","9874563210","1","SSC000003","left","123456","1","user","2018-09-14 10:58:30");
INSERT INTO member VALUES("8","Ajit","Chawda","SSC000008","ajitchawda002@gmail.com","9874563210","1","SSC000004","right","123456","1","user","2018-09-14 11:30:18");
INSERT INTO member VALUES("9","Jatin","Garach","SSC000009","jatingarach002@gmail.com","9408830584","1","SSC000004","left","123456","1","user","2018-09-14 11:35:18");
INSERT INTO member VALUES("10","Karan N","Zala","SSC000010","karannzala001@gmail.com","7412589630","1","SSC000005","right","123456","1","user","2018-09-14 11:37:26");
INSERT INTO member VALUES("11","Ajit","Chawda","SSC000011","ajitchawda003@gmail.com","7894561230","1","SSC000005","left","123456","1","user","2018-09-14 11:39:43");
INSERT INTO member VALUES("12","Jatin","Garach","SSC000012","jatingarach003@gmail.com","7845123698","1","SSC000006","right","123456","1","user","2018-09-14 11:43:44");
INSERT INTO member VALUES("13","Rupa N","Zala","SSC000013","rupanzala004@gmail.com","7896321450","1","SSC000006","left","123456","1","user","2018-09-14 11:44:47");
INSERT INTO member VALUES("14","Suryaben A ","Chavda","SSC000014","ajitchavda252@gmail.com","982476505","1","SSC000007","right","123456","1","user","2018-09-14 01:21:43");
INSERT INTO member VALUES("15","Paurvi J ","Garach","SSC000015","jatingarach@yahoo.co.in","9408830584","1","SSC000007","left","123456","1","user","2018-09-14 01:23:11");
INSERT INTO member VALUES("16","Jatin V","Garach","SSC000016","jatingarach@yahoo.co.in","9408830584","1","SSC000014","right","123456","1","user","2018-09-14 01:33:08");
INSERT INTO member VALUES("17","laxmi R ","Zala","SSC000017","jatingarach@yahoo.co.in","9898156593","1","SSC000014","left","123456","1","user","2018-09-14 01:34:52");
INSERT INTO member VALUES("18","harshadbhai L","Chavda","SSC000018","ajitchavda252@gmail.com","9913261128","1","SSC000015","left","123456","1","user","2018-09-14 01:38:45");
INSERT INTO member VALUES("19","Navnitbhai V ","Zala","SSC000019","ajitchavda252@gmail.com","9898098744","1","SSC000015","right","123456","1","user","2018-09-14 01:40:08");
INSERT INTO member VALUES("20","Jatin V","Garach","SSC000020","jatingarach@yahoo.co.in","9408830584","1","SSC000013","left","123456","1","user","2018-09-14 01:41:58");
INSERT INTO member VALUES("21","laxmanbhai  U","chavda","SSC000021","ajitchavda252@gmail.com","9913261128","1","SSC000013","right","123456","1","user","2018-09-14 01:55:22");
INSERT INTO member VALUES("22","Rupaben N","zala","SSC000022","ajitchavda252@gmail.com","9898098744","1","SSC000012","left","123456","1","user","2018-09-14 02:04:05");
INSERT INTO member VALUES("23","Rajesh ","Zala","SSC000023","ajitchavda252@gmail.com","9898156593","1","SSC000012","right","123456","1","user","2018-09-14 02:05:11");
INSERT INTO member VALUES("24","laxmi R ","Zala","SSC000024","ajitchavda252@gmail.com","9898156593","1","SSC000010","left","123456","1","user","2018-09-14 02:07:28");
INSERT INTO member VALUES("25","Karan N","Zala","SSC000025","ajitchavda252@gmail.com","7778020767","1","SSC000010","right","123456","1","user","2018-09-14 02:08:59");
INSERT INTO member VALUES("26","Ajitkumar L","Chavda","SSC000026","ajitchavda252@gmail.com","9824765505","1","SSC000011","left","123456","1","user","2018-09-14 02:34:08");
INSERT INTO member VALUES("27","Jatin V","Garach","SSC000027","ajitchavda252@gmail.com","9408830584","1","SSC000011","right","123456","1","user","2018-09-14 02:35:43");
INSERT INTO member VALUES("28","Paurvi J ","Garach","SSC000028","jatingarach@yahoo.co.in","9408830584","1","SSC000009","left","123456","1","user","2018-09-14 02:37:30");
INSERT INTO member VALUES("29","Navnitbhai V ","Zala","SSC000029","jatingarach@yahoo.co.in","9898098744","1","SSC000009","right","123456","1","user","2018-09-14 02:42:07");
INSERT INTO member VALUES("30","Rajesh V ","Zala","SSC000030","ajitchavda252@gmail.com","9898156593","1","SSC000008","left","123456","1","user","2018-09-14 02:43:38");
INSERT INTO member VALUES("31","Paurvi J ","Garach","SSC000031","jatingarach@yahoo.co.in","9408830584","1","SSC000008","right","123456","1","user","2018-09-14 02:44:30");
INSERT INTO member VALUES("32","DIPAN RAMESHCHA","THAKER","SSC000032","jatingarach@yahoo.co.in","9824019410","1","SSC000020","left","123456","1","user","2018-09-26 01:53:44");
INSERT INTO member VALUES("33","VIDHITA DIPANKU","THAKER","SSC000033","jatingarach@yahoo.co.in","9327117180","1","SSC000032","left","123456","1","user","2018-09-26 01:57:14");
INSERT INTO member VALUES("34","DIPAN RAMESHCHA","THAKER","SSC000034","jatingarach@yahoo.co.in","9824019410","1","SSC000032","right","123456","1","user","2018-09-26 01:58:31");
INSERT INTO member VALUES("35","DIPAN RAMESHCHA","THAKER","SSC000035","jatingarach@yahoo.co.in","9824019410","1","SSC000034","right","123456","1","user","2018-09-26 02:02:36");
INSERT INTO member VALUES("36","KRUTI DIPANKUMA","THAKER\","SSC000036","jatingarach@yahoo.co.in","9925039410","1","SSC000034","left","123456","1","user","2018-09-26 02:04:13");
INSERT INTO member VALUES("37","VIDHITA DIPANKU","THAKER","SSC000037","jatingarach@yahoo.co.in","9327117180","1","SSC000033","left","123456","1","user","2018-09-26 02:05:55");
INSERT INTO member VALUES("38","PURVA DIPANKUMA","THAKER","SSC000038","jatingarach@yahoo.co.in","9824019410","1","SSC000033","right","123456","1","user","2018-09-26 02:08:52");
INSERT INTO member VALUES("39","DINESHCHANDRA ","BAROT","SSC000039","dineshbarot1977@gmail.com","9825626292","1","SSC000035","left","123456","1","user","2018-09-26 02:16:53");
INSERT INTO member VALUES("40","DINESHCHANDRA B","BAROT","SSC000040","jatingarach@yahoo.co.in","9574093260","1","SSC000039","left","123456","1","user","2018-09-26 02:20:32");
INSERT INTO member VALUES("41","DINESHCHANDRA B","BAROT","SSC000041","jatingarach@yahoo.co.in","9574093260","1","SSC000039","right","123456","1","user","2018-09-26 02:21:21");
INSERT INTO member VALUES("42","MANIBEN BABUBHA","SOLANKI","SSC000042","jatingarach@yahoo.co.in","9429025411","1","ssc000040","left","123456","1","user","2018-09-26 02:32:02");
INSERT INTO member VALUES("43","SHILPABEN R ","GOHIL","SSC000043","navnitzala1972@gmail.com","9737310621","1","SSC000025","left","123456","1","user","2018-09-27 02:36:04");
INSERT INTO member VALUES("44","SHILPABEN R ","GOHIL","SSC000044","navnitzala1972@gmail.com","9737310621","1","SSC000043","left","123456","1","user","2018-09-27 02:37:08");
INSERT INTO member VALUES("45","SHILPABEN R ","GOHIL","SSC000045","navnitzala1972@gmail.com","9737310621","1","SSC000043","right","123456","1","user","2018-09-27 02:37:53");
INSERT INTO member VALUES("46","BENJAMIN H ","PARMAR","SSC000046","benjaminparmar06@gmail.com","9033307618","1","SSC000044","left","123456","1","user","2018-09-27 02:40:38");
INSERT INTO member VALUES("47","BENJAMIN H ","PARMAR","SSC000047","benjaminparmar06@gmail.com","9033307618","1","ssc000046","left","123456","1","user","2018-09-27 02:41:39");
INSERT INTO member VALUES("48","BENJAMIN H ","PARMAR","SSC000048","benjaminparmar06@gmail.com","9033307618","1","SSC000046","right","123456","1","user","2018-09-27 02:43:20");
INSERT INTO member VALUES("49","SURESHBHAI S","VAGHELA","SSC000049","benjaminparmar06@gmail.com","9998219872","1","SSC000047","left","123456","1","user","2018-09-27 02:48:14");
INSERT INTO member VALUES("50","SULOCHNABEN DIP","SOLANKI","SSC000050","benjaminparmar06@gmail.com","9228764978","1","SSC000047","right","123456","1","user","2018-09-27 02:50:20");
INSERT INTO member VALUES("51","BABUBHAI L ","ROHIT","SSC000051","navnitzala1972@gmail.com","8401821421","1","SSC000044","right","123456","1","user","2018-09-27 02:56:46");
INSERT INTO member VALUES("52","VIRENKUMAR DASH","GHAMANDE","SSC000052","viren1784@gmail.com","9978993390","1","SSC000037","left","123456","1","user","2018-09-29 08:56:36");
INSERT INTO member VALUES("53","VIRENKUMAR DASH","GHAMANDE","SSC000053","viren1784@gmail.com","9978993390","1","SSC000052","left","123456","1","user","2018-09-29 08:59:38");
INSERT INTO member VALUES("54","VIRENKUMAR DASH","GHAMANDE","SSC000054","viren1784@gmail.com","9978993390","1","SSC000052","right","123456","1","user","2018-09-29 09:00:21");
INSERT INTO member VALUES("55","MITHABHAI PARAG","MAHERIYA","SSC000055","jatingarach@yahoo.co.in","8160511959","1","SSC000037","right","123456","1","user","2018-09-29 09:05:02");
INSERT INTO member VALUES("56","MANIBEN BABUBHA","SOLANKI","SSC000056","jatingarach@yahoo.co.in","9429025411","1","SSC000042","left","123456","1","user","2018-09-29 09:11:33");
INSERT INTO member VALUES("57","MANIBEN BABUBHA","SOLANKI","SSC000057","jatingarach@yahoo.co.in","9429025411","1","SSC000042","right","123456","1","user","2018-09-29 09:12:21");
INSERT INTO member VALUES("58","MANIBEN BABUBHA","SOLANKI","SSC000058","jatingarach@yahoo.co.in","9429025411","1","SSC000056","left","123456","1","user","2018-09-29 09:13:31");
INSERT INTO member VALUES("59","MANIBEN BABUBHA","SOLANKI ","SSC000059","jatingarach@yahoo.co.in","9429025411","1","SSC000056","right","123456","1","user","2018-09-29 09:14:14");
INSERT INTO member VALUES("60","MANIBEN BABUBHA","SOLANKI","SSC000060","jatingarach@yahoo.co.in","9429025411","1","SSC000057","left","123456","1","user","2018-09-29 09:15:35");
INSERT INTO member VALUES("61","MANIBEN BABUBHA","SOLANKI","SSC000061","jatingarach@yahoo.co.in","9429025411","1","SSC000057","right","123456","1","user","2018-09-29 09:16:05");
INSERT INTO member VALUES("62","HIRABEN KAMLESH","LAKUM","SSC000062","HEERA161981@GMAIL.COM","8160890650","1","SSC000018","left","123456","1","user","2018-10-02 04:45:56");
INSERT INTO member VALUES("63","SUNITABEN ASHOK","MAKWANA","SSC000063","ASHOKMAKWANA0202@GMAIL.COM","9913500586","1","SSC000062","left","123456","1","user","2018-10-02 05:05:15");
INSERT INTO member VALUES("64","SUNITABEN ASHOK","MAKWANA","SSC000064","ASHOKMAKWANA0202@GMAIL.COM","9913500586","1","SSC000063","left","123456","1","user","2018-10-02 05:07:07");
INSERT INTO member VALUES("65","SUNITABEN ASHOK","MAKWANA","SSC000065","ASHOKMAKWANA0202@GMAIL.COM","9913500586","1","SSC000063","right","123456","1","user","2018-10-02 05:08:12");
INSERT INTO member VALUES("66","VAJUBHAI MULJIB","CHAUHAN","SSC000066","CHAVDAK@YAHOO.COM","9601939032","1","SSC000062","right","123456","1","user","2018-10-02 05:10:36");
INSERT INTO member VALUES("67","VAJUBHAI MULJIB","CHAUHAN","SSC000067","CHAVDAK@YAHOO.COM","9601939032","1","SSC000066","left","123456","1","user","2018-10-02 05:12:17");
INSERT INTO member VALUES("68","VAJUBHAI MULJIB","CHAUHAN","SSC000068","CHAVDAK@YAHOO.COM","9601939032","1","SSC000066","right","123456","1","user","2018-10-02 05:13:16");
INSERT INTO member VALUES("69","GEETABEN KALPES","CHAVDA","SSC000069","CHAVDAK@YAHOO.COM","9998500321","1","SSC000068","left","123456","1","user","2018-10-02 05:17:19");
INSERT INTO member VALUES("70","GEETABEN KALPES","CHAVDA","SSC000070","CHAVDAK@YAHOO.COM","9998500321","1","SSC000069","left","123456","1","user","2018-10-02 05:18:13");
INSERT INTO member VALUES("71","GEETABEN KALPES","CHAVDA","SSC000071","CHAVDAK@YAHOO.COM","9998500321","1","SSC000069","right","123456","1","user","2018-10-02 05:18:52");
INSERT INTO member VALUES("72","SUDARSHANKUMAR ","LAKUM","SSC000072","LAKUMSUDARSHAN@GMAIL.COM","8401257937","1","SSC000064","left","123456","1","user","2018-10-03 02:08:12");
INSERT INTO member VALUES("73","MAKWANA ","PREMILABEN BABU","SSC000073","ajitchavda252@gmail.com","9624479551","1","SSC000031","right","123456","1","user","2018-10-03 02:32:28");
INSERT INTO member VALUES("74","MAKWANA ","BABUBHAI BIPINB","SSC000074","ajitchavda252@gmail.com","9624479551","1","SSC000073","left","123456","1","user","2018-10-03 02:33:36");
INSERT INTO member VALUES("75","MAKWANA ","BABUBHAI BIPINB","SSC000075","ajitchavda252@gmail.com","9624479551","1","SSC000073","right","123456","1","user","2018-10-03 02:34:17");
INSERT INTO member VALUES("76","ZALA ","DILIPKUMARISHVA","SSC000076","navnitzala1972@gmail.com","8488847084","1","SSC000075","left","123456","1","user","2018-10-03 02:36:33");
INSERT INTO member VALUES("77","SATISHBHAI ATMA","VANIYA","SSC000077","ASHOKMAKWANA0202@GMAIL.COM","9099862518","1","SSC000064","right","123456","1","user","2018-10-03 03:24:22");
INSERT INTO member VALUES("78","NATUBHAI ISHVAR","MAKWANA ","SSC000078","ASHOKMAKWANA0202@GMAIL.COM","8733040757","1","SSC000065","right","123456","1","user","2018-10-03 03:26:03");
INSERT INTO member VALUES("79","GOPALBHAI RADHE","TIVARI","SSC000079","CHAVDAK@YAHOO.COM","9724442861","1","SSC000065","left","123456","1","user","2018-10-04 05:26:30");
INSERT INTO member VALUES("80","HEENABEN DIPAKB","PARMAR","SSC000080","CHAVDAK@YAHOO.COM","9879723992","1","SSC000067","left","123456","1","user","2018-10-04 05:29:57");
INSERT INTO member VALUES("81","SURESHBHAI GALA","MAKWANA ","SSC000081","navnitzala1972@gmail.com","9374343430","1","SSC000019","left","123456","1","user","2018-10-04 07:04:45");
INSERT INTO member VALUES("82","SURESHBHAI GALA","MAKWANA","SSC000082","navnitzala1972@gmail.com","9374343430","1","SSC000081","left","123456","1","user","2018-10-04 07:06:05");
INSERT INTO member VALUES("83","SURESHBHAI GALA","MAKWANA","SSC000083","navnitzala1972@gmail.com","9374343430","1","SSC000081","right","123456","1","user","2018-10-04 07:07:02");
INSERT INTO member VALUES("84","PARESHKUMAR ANU","JADAV","SSC000084","navnitzala1972@gmail.com","9724172534","1","SSC000083","left","123456","1","user","2018-10-04 07:09:48");
INSERT INTO member VALUES("85","PARESHBHAI ANUB","JADAV","SSC000085","navnitzala1972@gmail.com","9724172534","1","SSC000084","left","123456","1","user","2018-10-04 07:10:57");
INSERT INTO member VALUES("86","PARESHKUMAR ANU","JADAV","SSC000086","navnitzala1972@gmail.com","9724172534","1","SSC000084","right","123456","1","user","2018-10-04 07:13:49");
INSERT INTO member VALUES("87","DARSHIL KANTIBH","SOLANKI","SSC000087","navnitzala1972@gmail.com","9924372839","1","SSC000083","right","123456","1","user","2018-10-04 07:17:28");
INSERT INTO member VALUES("88","DARSHIL KANTIBH","SOLANKI","SSC000088","navnitzala1972@gmail.com","9924372839","1","SSC000087","left","123456","1","user","2018-10-04 07:19:03");
INSERT INTO member VALUES("89","DARSHIL KANTIBH","SOLANKI","SSC000089","navnitzala1972@gmail.com","9924372839","1","SSC000087","right","123456","1","user","2018-10-04 07:19:55");
INSERT INTO member VALUES("90","DEEPAKKUMAR KAN","SONARA","SSC000090","ajitchavda252@gmail.com","9426317171","1","SSC000082","left","123456","1","user","2018-10-04 07:28:38");
INSERT INTO member VALUES("91","DEEPAKKUMAR KAK","SONARA","SSC000091","ajitchavda252@gmail.com","9426317171","0","SSC000090","left","123456","1","user","2018-10-04 07:34:28");
INSERT INTO member VALUES("92","DEEPAKKUMAR KAK","SONARA","SSC000092","ajitchavda252@gmail.com","9426317171","1","SSC000090","right","123456","1","user","2018-10-04 07:35:14");
INSERT INTO member VALUES("93","Chetankumar M","Patel","SSC000093","colorhunt2011@gmail.com","9879019876","1","ssc000041","right","123456","1","user","2018-10-05 03:48:29");
INSERT INTO member VALUES("94","Jatin A","Kareliya","SSC000094","Jatin.karelia@yahoo.in","9016179074","1","ssc000035","right","123456","1","user","2018-10-05 05:09:37");
INSERT INTO member VALUES("95","Foram V","Parmar","SSC000095","vparmar_1510@yahoo.com","7567096254","1","ssc000038","right","123456","1","user","2018-10-05 05:12:51");
INSERT INTO member VALUES("96","Yogesh Bhikhabh","Patel","SSC000096","dipanthaker1005@yahoo.com","9974052700","1","ssc000036","right","123456","1","user","2018-10-05 05:17:54");
INSERT INTO member VALUES("97","UMA DHARMESH","KARELIYA","SSC000097","dipanthaker1005@yahoo.com","6359698558","1","ssc000036","left","123456","1","user","2018-10-05 05:21:07");
INSERT INTO member VALUES("98","GAUTAMBHAI GALA","ZALA","SSC000098","GAUTAMZALA76@GMAIL.COM","8140309231","1","SSC000021","left","123456","1","user","2018-10-05 06:06:32");
INSERT INTO member VALUES("99","GAUTAMBHAI GALA","ZALA","SSC000099","GAUTAMZALA76@GMAIL.COM","8140309231","1","SSC000098","left","123456","1","user","2018-10-05 06:08:30");
INSERT INTO member VALUES("100","GAUTAMBHAI GALA","ZALA","SSC000100","GAUTAMZALA76@GMAIL.COM","8140309231","1","SSC000098","right","123456","1","user","2018-10-05 06:10:52");
INSERT INTO member VALUES("101","GAUTAMBHAI GALA","ZALA","SSC000101","GAUTAMZALA76@GMAIL.COM","8140309231","1","SSC000099","left","123456","1","user","2018-10-05 06:19:06");
INSERT INTO member VALUES("102","GAUTAMBHAI GALA","Zala","SSC000102","GAUTAMZALA76@GMAIL.COM","8140309231","1","SSC000099","right","123456","1","user","2018-10-05 06:19:56");
INSERT INTO member VALUES("103","GAUTAMBHAI GALA","ZALA","SSC000103","GAUTAMZALA76@GMAIL.COM","8140309231","1","SSC000100","left","123456","1","user","2018-10-05 06:21:45");
INSERT INTO member VALUES("104","GAUTAMBHAI GALA","ZALA","SSC000104","GAUTAMZALA76@GMAIL.COM","8140309231","1","SSC000100","right","123456","1","user","2018-10-05 06:22:53");
INSERT INTO member VALUES("106","ASHOKKUMAR KHOD","CHAVDA","SSC000105","ajitchavda252@gmail.com","9878442554","1","SSC000101","right","123456","1","user","2018-10-05 08:50:12");
INSERT INTO member VALUES("107","KIRANKUMAR KANU","PATEL","SSC000106","ajitchavda252@gmail.com","9998074936","1","SSC000105","right","123456","1","user","2018-10-05 09:45:50");
INSERT INTO member VALUES("108","NANDESHKUMAR KA","PATEL","SSC000107","ajitchavda252@gmail.com","9974853031","1","SSC000106","left","123456","1","user","2018-10-05 09:49:07");
INSERT INTO member VALUES("109","JAYSHREEBEN KIR","PATEL","SSC000108","ajitchavda252@gmail.com","9998074936","1","SSC000106","right","123456","1","user","2018-10-05 09:51:13");
INSERT INTO member VALUES("110","JAGDISHBHAI HAR","RATHOD","SSC000109","CHAVDAK@YAHOO.COM","9974269428","1","SSC000068","right","123456","1","user","2018-10-05 09:54:58");
INSERT INTO member VALUES("111","SANTABEN UMEDBH","MAKWANA","SSC000110","navnitzala1972@gmail.com","9879832907","1","SSC000082","right","123456","1","user","2018-10-06 01:18:41");
INSERT INTO member VALUES("112","SANTABEN UMEDBH","MAKWANA ","SSC000111","navnitzala1972@gmail.com","9879832907","1","SSC000110","left","123456","1","user","2018-10-06 01:21:16");
INSERT INTO member VALUES("113","SANTABEN UMEDBH","MAKWANA","SSC000112","navnitzala1972@gmail.com","9879832907","1","SSC000110","right","123456","1","user","2018-10-06 01:21:52");
INSERT INTO member VALUES("114","Shrilekhaben K","Dhanak","SSC000113","chandni.chatwani@gmail.com","7600531520","1","ssc000020","right","123456","1","user","2018-10-06 01:48:36");
INSERT INTO member VALUES("115","Nileshkumar M","Patel","SSC000114","nileshpatel900@yahoo.com","9824664555","1","ssc000113","left","123456","1","user","2018-10-06 01:51:52");
INSERT INTO member VALUES("116","Sukhiben Motila","Patel","SSC000115","patelhiteshk1971@gmail.com","9998153278","1","ssc000114","left","123456","1","user","2018-10-06 01:54:32");
INSERT INTO member VALUES("117","RAMILABEN SAKAR","MAKWANA","SSC000116","MAKWANARAMILA1982@GMAIL.COM","6353075937","0","SSC000104","right","123456","1","user","2018-10-06 04:45:19");
INSERT INTO member VALUES("118","SANJAYKUMAR HAR","CHAVDA","SSC000117","ajitchavda252@gmail.com","9824977286","1","SSC000108","right","123456","1","user","2018-10-06 04:50:40");
INSERT INTO member VALUES("119","GAUTAMBHAI DANA","ZALA","SSC000118","ajitchavda252@gmail.com","9723226530","1","SSC000117","right","123456","1","user","2018-10-06 04:52:10");
INSERT INTO member VALUES("120","HIMATBHAI BECHA","ZALA","SSC000119","zalahimat1982@gmail.com","9723829044","1","SSC000116","right","123456","1","user","2018-10-06 05:11:54");
INSERT INTO member VALUES("121","CHAMPABEN HIMAT","ZALA","SSC000120","zalachampa32@gmail.com","9723829044","1","ssc000119","right","123456","1","user","2018-10-06 05:13:07");
INSERT INTO member VALUES("122","SURESHBHAI CHHA","SOLANKI","SSC000121","suressolanki1239090@gmail.com","9723829044","1","ssc000119","left","123456","1","user","2018-10-06 05:14:54");
INSERT INTO member VALUES("123","SURESH ","SOLANKI","SSC000122","sureshsolanki1982@gmail.com","9924280481","1","ssc000120","right","123456","1","user","2018-10-06 05:15:59");
INSERT INTO member VALUES("124","PRADIPKUMAR B ","CHAUHAN","SSC000123","navnitzala1972@gmail.com","9909009282","1","SSC000085","right","123456","1","user","2018-10-06 05:48:51");
INSERT INTO member VALUES("125","PRADIPKUMAR B ","CHAUHAN","SSC000124","navnitzala1972@gmail.com","9909009282","1","SSC000123","left","123456","1","user","2018-10-06 05:49:50");
INSERT INTO member VALUES("126","PRADIPKUMAR B ","CHAUHAN","SSC000125","navnitzala1972@gmail.com","9909009282","1","SSC000123","right","123456","1","user","2018-10-06 05:51:15");
INSERT INTO member VALUES("127","TARANG KARSHANB","SHAH","SSC000126","navnitzala1972@gmail.com","8200331667","1","SSC000085","left","123456","1","user","2018-10-06 07:03:39");
INSERT INTO member VALUES("128","TARANG KARSHANB","SHAH","SSC000127","navnitzala1972@gmail.com","8200331667","1","SSC000126","left","123456","1","user","2018-10-06 07:04:41");
INSERT INTO member VALUES("129","TARANG KARSHANB","SHAH","SSC000128","navnitzala1972@gmail.com","8200331667","1","SSC000126","right","123456","1","user","2018-10-06 07:06:20");
INSERT INTO member VALUES("130","BANSIBHAI AMBAL","RAVAT","SSC000129","BANSIBHAI1979@GMAIL.COM","9723338632","1","SSC000103","left","123456","3","user","2018-10-07 07:46:01");
INSERT INTO member VALUES("131","BHANUBHAI AMBAL","SENVA","SSC000130","BHANUBAS1983@GMAIL.COM","9714074428","1","SSC000129","left","123456","1","user","2018-10-07 07:48:23");
INSERT INTO member VALUES("132","NITABEN BANSIBH","RAVAT","SSC000131","BANSIBHAI1979@GMAIL.COM","9723338632","1","SSC000129","right","123456","3","user","2018-10-07 07:50:28");
INSERT INTO member VALUES("133","SHAILESHBHAI DA","PATEL","SSC000132","rimriya7377@gmail.com","9408432901","1","ssc000115","left","123456","1","user","2018-10-07 07:56:54");
INSERT INTO member VALUES("134","Dayalbhai Ranch","Patel","SSC000133","rimriya7377@gmail.com","9408432901","1","ssc000115","right","123456","1","user","2018-10-08 09:53:39");
INSERT INTO member VALUES("135","PARIMAL NATVARB","SOLANKI","SSC000134","navnitzala1972@gmail.com","9265425669","1","SSC000027","left","123456","1","user","2018-10-08 12:30:08");
INSERT INTO member VALUES("136","BHARTIBEN TULSI","PARMAR","SSC000135","navnitzala1972@gmail.com","9978783140","1","ssc000018","right","123456","1","user","2018-10-08 01:00:04");
INSERT INTO member VALUES("137","NATVARBHAI MAFA","SOLANKI","SSC000136","navnitzala1972@gmail.com","7383759015","1","SSC000134","left","123456","1","user","2018-10-08 01:02:22");
INSERT INTO member VALUES("138","RATANBEN NATVAR","SOLANKI","SSC000137","navnitzala1972@gmail.com","9727653032","1","SSC000134","right","123456","1","user","2018-10-08 01:04:16");
INSERT INTO member VALUES("139","KAMLESH MOHANBH","SOLANKI","SSC000138","navnitzala1972@gmail.com","9998010205","1","SSC000137","left","123456","1","user","2018-10-08 01:35:31");
INSERT INTO member VALUES("140","kanubhai dalpat","zala","SSC000139","kanuzala1982@gmail.com","7359519524","1","ssc000101","left","123456","1","user","2018-10-08 06:17:49");
INSERT INTO member VALUES("141","LALITKUMAR CHHA","MAKWANA","SSC000140","lalitmakwana1708@gamil.com","9879075870","1","ssc000118","right","123456","1","user","2018-10-08 06:54:50");
INSERT INTO member VALUES("142","LALITKUMAR CHHA","MAKWANA","SSC000141","lalitmakwana1708@gamil.com","9879075870","1","SSC000140","left","123456","1","user","2018-10-08 06:55:54");
INSERT INTO member VALUES("143","LALITKUMAR CHHA","MAKWANA ","SSC000142","lalitmakwana1708@gamil.com","9879075870","1","SSC000140","right","123456","1","user","2018-10-08 06:56:34");
INSERT INTO member VALUES("144","ALPESHKUMAR DIN","ZALA","SSC000143","alpeshzala033@gmail.com","9712845343","1","ssc000142","right","123456","1","user","2018-10-08 06:58:33");
INSERT INTO member VALUES("145","ALPESHKUMAR DIN","ZALA","SSC000144","alpeshzala033@gmail.com","9712845343","1","SSC000143","left","123456","1","user","2018-10-08 07:01:24");
INSERT INTO member VALUES("146","ALPESHKUMAR DIN","ZALA","SSC000145","alpeshzala033@gmail.com","9712845343","1","ssc000143","right","123456","1","user","2018-10-08 07:02:47");
INSERT INTO member VALUES("147","ASHISH","VEGDA","SSC000146","navnitzala1972@gmail.com","9173941533","1","SSC000136","left","123456","1","user","2018-10-09 12:54:35");
INSERT INTO member VALUES("148","NAYNABEN KANCHA","PATEL","SSC000147","kanchanbhaipatel564@gmail.com","9909455235","1","ssc000132","right","123456","1","user","2018-10-09 07:16:51");
INSERT INTO member VALUES("149","Nitaben Prakash","Thakkar","SSC000148","dharambhakti64@gmail.com","8849525990","1","ssc000019","right","123456","1","user","2018-10-10 01:00:20");
INSERT INTO member VALUES("150","Nitaben Prakash","Thakkar","SSC000149","dharambhakti64@gmail.com","8849525990","1","ssc000148","left","123456","1","user","2018-10-10 01:06:49");
INSERT INTO member VALUES("151","Nitaben Prakash","Thakkar","SSC000150","dharambhakti64@gmail.com","8849525990","1","ssc000148","right","123456","1","user","2018-10-10 01:08:27");
INSERT INTO member VALUES("152","PRATAPSINGH GAM","PARMAR","SSC000151","navnitzala1972@gmail.com","9638616172","1","SSC000067","right","123456","1","user","2018-10-10 03:31:51");
INSERT INTO member VALUES("153","VARSHABEN MUKES","PARMAR","SSC000152","jatingarach@yahoo.co.in","9724328391","1","SSC000136","right","123456","1","user","2018-10-10 03:45:14");
INSERT INTO member VALUES("155","SHARDHABEN MANU","PARMAR","SSC000153","abhimanagement01@gmail.com","9879691111","1","SSC000091","left","123456","1","user","2018-10-11 11:22:06");
INSERT INTO member VALUES("156","Tarunkumar Nanj","Solanki ","SSC000154","abc@yahoo.com","9824789944","1","Ssc000088","left","123456","1","user","2018-10-11 03:06:09");
INSERT INTO member VALUES("157","Manish punjabha","Parmar ","SSC000155","manishparmar301@gmail.com","9510064026","1","Ssc000111","left","123456","1","user","2018-10-11 05:50:37");
INSERT INTO member VALUES("158","Ajitkumar galab","Makwana ","SSC000156","Ajitkumarmakwana182@gmail.com","9586491666","1","Ssc000153","left","123456","1","user","2018-10-11 06:38:22");
INSERT INTO member VALUES("159","Bharatbhai kali","Zala ","SSC000157","bkzala@gmail.com","9998908168","1","Ssc000088","right","123456","1","user","2018-10-11 06:47:09");
INSERT INTO member VALUES("160","Mukeshji jaynti","Chauhan ","SSC000158","Thakormukesh6295@gamial.com","7016580002","1","Ssc000040","right","123456","1","user","2018-10-13 01:46:14");
INSERT INTO member VALUES("161","Rajeshkumar vas","Chamar ","SSC000159","Rajubhaicauhan@gamail.com","9723859834","1","Ssc000078","left","123456","1","user","2018-10-14 03:22:28");
INSERT INTO member VALUES("162","Mahendrakumar k","Parmar ","SSC000160","chavdak@yahu.com","9974362673","1","Ssc000077","left","123456","1","user","2018-10-14 03:32:22");
INSERT INTO member VALUES("163","bullet ","singh","SSC000161","navnitzala1972@gmail.com","9904241431","1","ssc000080","left","123456","1","user","2018-10-14 03:34:37");



CREATE TABLE `pending_commision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `balance` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=645 DEFAULT CHARSET=latin1;

INSERT INTO pending_commision VALUES("1","2018-10-16","SSC000001","15200");
INSERT INTO pending_commision VALUES("2","2018-10-16","SSC000002","7200");
INSERT INTO pending_commision VALUES("3","2018-10-16","SSC000003","14400");
INSERT INTO pending_commision VALUES("4","2018-10-16","SSC000004","2400");
INSERT INTO pending_commision VALUES("5","2018-10-16","SSC000005","6400");
INSERT INTO pending_commision VALUES("6","2018-10-16","SSC000006","2400");
INSERT INTO pending_commision VALUES("7","2018-10-16","SSC000007","2400");
INSERT INTO pending_commision VALUES("8","2018-10-16","SSC000008","800");
INSERT INTO pending_commision VALUES("9","2018-10-16","SSC000009","800");
INSERT INTO pending_commision VALUES("10","2018-10-16","SSC000010","800");
INSERT INTO pending_commision VALUES("11","2018-10-16","SSC000011","800");
INSERT INTO pending_commision VALUES("12","2018-10-16","SSC000012","800");
INSERT INTO pending_commision VALUES("13","2018-10-16","SSC000013","8800");
INSERT INTO pending_commision VALUES("14","2018-10-16","SSC000014","800");
INSERT INTO pending_commision VALUES("15","2018-10-16","SSC000015","11200");
INSERT INTO pending_commision VALUES("16","2018-10-16","SSC000016","0");
INSERT INTO pending_commision VALUES("17","2018-10-16","SSC000017","0");
INSERT INTO pending_commision VALUES("18","2018-10-16","SSC000018","800");
INSERT INTO pending_commision VALUES("19","2018-10-16","SSC000019","2400");
INSERT INTO pending_commision VALUES("20","2018-10-16","SSC000020","4000");
INSERT INTO pending_commision VALUES("21","2018-10-16","SSC000021","0");
INSERT INTO pending_commision VALUES("22","2018-10-16","SSC000022","0");
INSERT INTO pending_commision VALUES("23","2018-10-16","SSC000023","0");
INSERT INTO pending_commision VALUES("24","2018-10-16","SSC000024","0");
INSERT INTO pending_commision VALUES("25","2018-10-16","SSC000025","0");
INSERT INTO pending_commision VALUES("26","2018-10-16","SSC000026","0");
INSERT INTO pending_commision VALUES("27","2018-10-16","SSC000027","0");
INSERT INTO pending_commision VALUES("28","2018-10-16","SSC000028","0");
INSERT INTO pending_commision VALUES("29","2018-10-16","SSC000029","0");
INSERT INTO pending_commision VALUES("30","2018-10-16","SSC000030","0");
INSERT INTO pending_commision VALUES("31","2018-10-16","SSC000031","0");
INSERT INTO pending_commision VALUES("32","2018-10-16","SSC000032","6400");
INSERT INTO pending_commision VALUES("33","2018-10-16","SSC000033","1600");
INSERT INTO pending_commision VALUES("34","2018-10-16","SSC000034","2400");
INSERT INTO pending_commision VALUES("35","2018-10-16","SSC000035","800");
INSERT INTO pending_commision VALUES("36","2018-10-16","SSC000036","800");
INSERT INTO pending_commision VALUES("37","2018-10-16","SSC000037","800");
INSERT INTO pending_commision VALUES("38","2018-10-16","SSC000038","0");
INSERT INTO pending_commision VALUES("39","2018-10-16","SSC000039","2400");
INSERT INTO pending_commision VALUES("40","2018-10-16","SSC000040","800");
INSERT INTO pending_commision VALUES("41","2018-10-16","SSC000041","0");
INSERT INTO pending_commision VALUES("42","2018-10-16","SSC000042","2400");
INSERT INTO pending_commision VALUES("43","2018-10-16","SSC000043","800");
INSERT INTO pending_commision VALUES("44","2018-10-16","SSC000044","800");
INSERT INTO pending_commision VALUES("45","2018-10-16","SSC000045","0");
INSERT INTO pending_commision VALUES("46","2018-10-16","SSC000046","800");
INSERT INTO pending_commision VALUES("47","2018-10-16","SSC000047","800");
INSERT INTO pending_commision VALUES("48","2018-10-16","SSC000048","0");
INSERT INTO pending_commision VALUES("49","2018-10-16","SSC000049","0");
INSERT INTO pending_commision VALUES("50","2018-10-16","SSC000050","0");
INSERT INTO pending_commision VALUES("51","2018-10-16","SSC000051","0");
INSERT INTO pending_commision VALUES("52","2018-10-16","SSC000052","800");
INSERT INTO pending_commision VALUES("53","2018-10-16","SSC000053","0");
INSERT INTO pending_commision VALUES("54","2018-10-16","SSC000054","0");
INSERT INTO pending_commision VALUES("55","2018-10-16","SSC000055","0");
INSERT INTO pending_commision VALUES("56","2018-10-16","SSC000056","800");
INSERT INTO pending_commision VALUES("57","2018-10-16","SSC000057","800");
INSERT INTO pending_commision VALUES("58","2018-10-16","SSC000058","0");
INSERT INTO pending_commision VALUES("59","2018-10-16","SSC000059","0");
INSERT INTO pending_commision VALUES("60","2018-10-16","SSC000060","0");
INSERT INTO pending_commision VALUES("61","2018-10-16","SSC000061","0");
INSERT INTO pending_commision VALUES("62","2018-10-16","SSC000062","5600");
INSERT INTO pending_commision VALUES("63","2018-10-16","SSC000063","3200");
INSERT INTO pending_commision VALUES("64","2018-10-16","SSC000064","800");
INSERT INTO pending_commision VALUES("65","2018-10-16","SSC000065","800");
INSERT INTO pending_commision VALUES("66","2018-10-16","SSC000066","3200");
INSERT INTO pending_commision VALUES("67","2018-10-16","SSC000067","800");
INSERT INTO pending_commision VALUES("68","2018-10-16","SSC000068","800");
INSERT INTO pending_commision VALUES("69","2018-10-16","SSC000069","800");
INSERT INTO pending_commision VALUES("70","2018-10-16","SSC000070","0");
INSERT INTO pending_commision VALUES("71","2018-10-16","SSC000071","0");
INSERT INTO pending_commision VALUES("72","2018-10-16","SSC000072","0");
INSERT INTO pending_commision VALUES("73","2018-10-16","SSC000073","800");
INSERT INTO pending_commision VALUES("74","2018-10-16","SSC000074","0");
INSERT INTO pending_commision VALUES("75","2018-10-16","SSC000075","0");
INSERT INTO pending_commision VALUES("76","2018-10-16","SSC000076","0");
INSERT INTO pending_commision VALUES("77","2018-10-16","SSC000077","0");
INSERT INTO pending_commision VALUES("78","2018-10-16","SSC000078","0");
INSERT INTO pending_commision VALUES("79","2018-10-16","SSC000079","0");
INSERT INTO pending_commision VALUES("80","2018-10-16","SSC000080","0");
INSERT INTO pending_commision VALUES("81","2018-10-16","SSC000081","7200");
INSERT INTO pending_commision VALUES("82","2018-10-16","SSC000082","3200");
INSERT INTO pending_commision VALUES("83","2018-10-16","SSC000083","4000");
INSERT INTO pending_commision VALUES("84","2018-10-16","SSC000084","800");
INSERT INTO pending_commision VALUES("85","2018-10-16","SSC000085","2400");
INSERT INTO pending_commision VALUES("86","2018-10-16","SSC000086","0");
INSERT INTO pending_commision VALUES("87","2018-10-16","SSC000087","800");
INSERT INTO pending_commision VALUES("88","2018-10-16","SSC000088","800");
INSERT INTO pending_commision VALUES("89","2018-10-16","SSC000089","0");
INSERT INTO pending_commision VALUES("90","2018-10-16","SSC000090","800");
INSERT INTO pending_commision VALUES("91","2018-10-16","SSC000091","0");
INSERT INTO pending_commision VALUES("92","2018-10-16","SSC000092","0");
INSERT INTO pending_commision VALUES("93","2018-10-16","SSC000093","0");
INSERT INTO pending_commision VALUES("94","2018-10-16","SSC000094","0");
INSERT INTO pending_commision VALUES("95","2018-10-16","SSC000095","0");
INSERT INTO pending_commision VALUES("96","2018-10-16","SSC000096","0");
INSERT INTO pending_commision VALUES("97","2018-10-16","SSC000097","0");
INSERT INTO pending_commision VALUES("98","2018-10-16","SSC000098","6400");
INSERT INTO pending_commision VALUES("99","2018-10-16","SSC000099","800");
INSERT INTO pending_commision VALUES("100","2018-10-16","SSC000100","3200");
INSERT INTO pending_commision VALUES("101","2018-10-16","SSC000101","800");
INSERT INTO pending_commision VALUES("102","2018-10-16","SSC000102","0");
INSERT INTO pending_commision VALUES("103","2018-10-16","SSC000103","0");
INSERT INTO pending_commision VALUES("104","2018-10-16","SSC000104","0");
INSERT INTO pending_commision VALUES("105","2018-10-16","SSC000105","0");
INSERT INTO pending_commision VALUES("106","2018-10-16","SSC000106","800");
INSERT INTO pending_commision VALUES("107","2018-10-16","SSC000107","0");
INSERT INTO pending_commision VALUES("108","2018-10-16","SSC000108","0");
INSERT INTO pending_commision VALUES("109","2018-10-16","SSC000109","0");
INSERT INTO pending_commision VALUES("110","2018-10-16","SSC000110","800");
INSERT INTO pending_commision VALUES("111","2018-10-16","SSC000111","0");
INSERT INTO pending_commision VALUES("112","2018-10-16","SSC000112","0");
INSERT INTO pending_commision VALUES("113","2018-10-16","SSC000113","0");
INSERT INTO pending_commision VALUES("114","2018-10-16","SSC000114","0");
INSERT INTO pending_commision VALUES("115","2018-10-16","SSC000115","800");
INSERT INTO pending_commision VALUES("116","2018-10-16","SSC000116","0");
INSERT INTO pending_commision VALUES("117","2018-10-16","SSC000117","0");
INSERT INTO pending_commision VALUES("118","2018-10-16","SSC000118","0");
INSERT INTO pending_commision VALUES("119","2018-10-16","SSC000119","800");
INSERT INTO pending_commision VALUES("120","2018-10-16","SSC000120","0");
INSERT INTO pending_commision VALUES("121","2018-10-16","SSC000121","0");
INSERT INTO pending_commision VALUES("122","2018-10-16","SSC000122","0");
INSERT INTO pending_commision VALUES("123","2018-10-16","SSC000123","800");
INSERT INTO pending_commision VALUES("124","2018-10-16","SSC000124","0");
INSERT INTO pending_commision VALUES("125","2018-10-16","SSC000125","0");
INSERT INTO pending_commision VALUES("126","2018-10-16","SSC000126","800");
INSERT INTO pending_commision VALUES("127","2018-10-16","SSC000127","0");
INSERT INTO pending_commision VALUES("128","2018-10-16","SSC000128","0");
INSERT INTO pending_commision VALUES("129","2018-10-16","SSC000129","800");
INSERT INTO pending_commision VALUES("130","2018-10-16","SSC000130","0");
INSERT INTO pending_commision VALUES("131","2018-10-16","SSC000131","0");
INSERT INTO pending_commision VALUES("132","2018-10-16","SSC000132","0");
INSERT INTO pending_commision VALUES("133","2018-10-16","SSC000133","0");
INSERT INTO pending_commision VALUES("134","2018-10-16","SSC000134","1600");
INSERT INTO pending_commision VALUES("135","2018-10-16","SSC000135","0");
INSERT INTO pending_commision VALUES("136","2018-10-16","SSC000136","800");
INSERT INTO pending_commision VALUES("137","2018-10-16","SSC000137","0");
INSERT INTO pending_commision VALUES("138","2018-10-16","SSC000138","0");
INSERT INTO pending_commision VALUES("139","2018-10-16","SSC000139","0");
INSERT INTO pending_commision VALUES("140","2018-10-16","SSC000140","800");
INSERT INTO pending_commision VALUES("141","2018-10-16","SSC000141","0");
INSERT INTO pending_commision VALUES("142","2018-10-16","SSC000142","0");
INSERT INTO pending_commision VALUES("143","2018-10-16","SSC000143","800");
INSERT INTO pending_commision VALUES("144","2018-10-16","SSC000144","0");
INSERT INTO pending_commision VALUES("145","2018-10-16","SSC000145","0");
INSERT INTO pending_commision VALUES("146","2018-10-16","SSC000146","0");
INSERT INTO pending_commision VALUES("147","2018-10-16","SSC000147","0");
INSERT INTO pending_commision VALUES("148","2018-10-16","SSC000148","800");
INSERT INTO pending_commision VALUES("149","2018-10-16","SSC000149","0");
INSERT INTO pending_commision VALUES("150","2018-10-16","SSC000150","0");
INSERT INTO pending_commision VALUES("151","2018-10-16","SSC000151","0");
INSERT INTO pending_commision VALUES("152","2018-10-16","SSC000152","0");
INSERT INTO pending_commision VALUES("153","2018-10-16","SSC000153","0");
INSERT INTO pending_commision VALUES("154","2018-10-16","SSC000154","0");
INSERT INTO pending_commision VALUES("155","2018-10-16","SSC000155","0");
INSERT INTO pending_commision VALUES("156","2018-10-16","SSC000156","0");
INSERT INTO pending_commision VALUES("157","2018-10-16","SSC000157","0");
INSERT INTO pending_commision VALUES("158","2018-10-16","SSC000158","0");
INSERT INTO pending_commision VALUES("159","2018-10-16","SSC000159","0");
INSERT INTO pending_commision VALUES("160","2018-10-16","SSC000160","0");
INSERT INTO pending_commision VALUES("161","2018-10-16","SSC000161","0");
INSERT INTO pending_commision VALUES("162","2018-10-18","SSC000001","0");
INSERT INTO pending_commision VALUES("163","2018-10-18","SSC000002","0");
INSERT INTO pending_commision VALUES("164","2018-10-18","SSC000003","0");
INSERT INTO pending_commision VALUES("165","2018-10-18","SSC000004","0");
INSERT INTO pending_commision VALUES("166","2018-10-18","SSC000005","0");
INSERT INTO pending_commision VALUES("167","2018-10-18","SSC000006","0");
INSERT INTO pending_commision VALUES("168","2018-10-18","SSC000007","0");
INSERT INTO pending_commision VALUES("169","2018-10-18","SSC000008","0");
INSERT INTO pending_commision VALUES("170","2018-10-18","SSC000009","0");
INSERT INTO pending_commision VALUES("171","2018-10-18","SSC000010","0");
INSERT INTO pending_commision VALUES("172","2018-10-18","SSC000011","0");
INSERT INTO pending_commision VALUES("173","2018-10-18","SSC000012","0");
INSERT INTO pending_commision VALUES("174","2018-10-18","SSC000013","0");
INSERT INTO pending_commision VALUES("175","2018-10-18","SSC000014","0");
INSERT INTO pending_commision VALUES("176","2018-10-18","SSC000015","0");
INSERT INTO pending_commision VALUES("177","2018-10-18","SSC000016","0");
INSERT INTO pending_commision VALUES("178","2018-10-18","SSC000017","0");
INSERT INTO pending_commision VALUES("179","2018-10-18","SSC000018","0");
INSERT INTO pending_commision VALUES("180","2018-10-18","SSC000019","0");
INSERT INTO pending_commision VALUES("181","2018-10-18","SSC000020","0");
INSERT INTO pending_commision VALUES("182","2018-10-18","SSC000021","0");
INSERT INTO pending_commision VALUES("183","2018-10-18","SSC000022","0");
INSERT INTO pending_commision VALUES("184","2018-10-18","SSC000023","0");
INSERT INTO pending_commision VALUES("185","2018-10-18","SSC000024","0");
INSERT INTO pending_commision VALUES("186","2018-10-18","SSC000025","0");
INSERT INTO pending_commision VALUES("187","2018-10-18","SSC000026","0");
INSERT INTO pending_commision VALUES("188","2018-10-18","SSC000027","0");
INSERT INTO pending_commision VALUES("189","2018-10-18","SSC000028","0");
INSERT INTO pending_commision VALUES("190","2018-10-18","SSC000029","0");
INSERT INTO pending_commision VALUES("191","2018-10-18","SSC000030","0");
INSERT INTO pending_commision VALUES("192","2018-10-18","SSC000031","0");
INSERT INTO pending_commision VALUES("193","2018-10-18","SSC000032","0");
INSERT INTO pending_commision VALUES("194","2018-10-18","SSC000033","0");
INSERT INTO pending_commision VALUES("195","2018-10-18","SSC000034","0");
INSERT INTO pending_commision VALUES("196","2018-10-18","SSC000035","0");
INSERT INTO pending_commision VALUES("197","2018-10-18","SSC000036","0");
INSERT INTO pending_commision VALUES("198","2018-10-18","SSC000037","0");
INSERT INTO pending_commision VALUES("199","2018-10-18","SSC000038","0");
INSERT INTO pending_commision VALUES("200","2018-10-18","SSC000039","0");
INSERT INTO pending_commision VALUES("201","2018-10-18","SSC000040","0");
INSERT INTO pending_commision VALUES("202","2018-10-18","SSC000041","0");
INSERT INTO pending_commision VALUES("203","2018-10-18","SSC000042","0");
INSERT INTO pending_commision VALUES("204","2018-10-18","SSC000043","0");
INSERT INTO pending_commision VALUES("205","2018-10-18","SSC000044","0");
INSERT INTO pending_commision VALUES("206","2018-10-18","SSC000045","0");
INSERT INTO pending_commision VALUES("207","2018-10-18","SSC000046","0");
INSERT INTO pending_commision VALUES("208","2018-10-18","SSC000047","0");
INSERT INTO pending_commision VALUES("209","2018-10-18","SSC000048","0");
INSERT INTO pending_commision VALUES("210","2018-10-18","SSC000049","0");
INSERT INTO pending_commision VALUES("211","2018-10-18","SSC000050","0");
INSERT INTO pending_commision VALUES("212","2018-10-18","SSC000051","0");
INSERT INTO pending_commision VALUES("213","2018-10-18","SSC000052","0");
INSERT INTO pending_commision VALUES("214","2018-10-18","SSC000053","0");
INSERT INTO pending_commision VALUES("215","2018-10-18","SSC000054","0");
INSERT INTO pending_commision VALUES("216","2018-10-18","SSC000055","0");
INSERT INTO pending_commision VALUES("217","2018-10-18","SSC000056","0");
INSERT INTO pending_commision VALUES("218","2018-10-18","SSC000057","0");
INSERT INTO pending_commision VALUES("219","2018-10-18","SSC000058","0");
INSERT INTO pending_commision VALUES("220","2018-10-18","SSC000059","0");
INSERT INTO pending_commision VALUES("221","2018-10-18","SSC000060","0");
INSERT INTO pending_commision VALUES("222","2018-10-18","SSC000061","0");
INSERT INTO pending_commision VALUES("223","2018-10-18","SSC000062","0");
INSERT INTO pending_commision VALUES("224","2018-10-18","SSC000063","0");
INSERT INTO pending_commision VALUES("225","2018-10-18","SSC000064","0");
INSERT INTO pending_commision VALUES("226","2018-10-18","SSC000065","0");
INSERT INTO pending_commision VALUES("227","2018-10-18","SSC000066","0");
INSERT INTO pending_commision VALUES("228","2018-10-18","SSC000067","0");
INSERT INTO pending_commision VALUES("229","2018-10-18","SSC000068","0");
INSERT INTO pending_commision VALUES("230","2018-10-18","SSC000069","0");
INSERT INTO pending_commision VALUES("231","2018-10-18","SSC000070","0");
INSERT INTO pending_commision VALUES("232","2018-10-18","SSC000071","0");
INSERT INTO pending_commision VALUES("233","2018-10-18","SSC000072","0");
INSERT INTO pending_commision VALUES("234","2018-10-18","SSC000073","0");
INSERT INTO pending_commision VALUES("235","2018-10-18","SSC000074","0");
INSERT INTO pending_commision VALUES("236","2018-10-18","SSC000075","0");
INSERT INTO pending_commision VALUES("237","2018-10-18","SSC000076","0");
INSERT INTO pending_commision VALUES("238","2018-10-18","SSC000077","0");
INSERT INTO pending_commision VALUES("239","2018-10-18","SSC000078","0");
INSERT INTO pending_commision VALUES("240","2018-10-18","SSC000079","0");
INSERT INTO pending_commision VALUES("241","2018-10-18","SSC000080","0");
INSERT INTO pending_commision VALUES("242","2018-10-18","SSC000081","0");
INSERT INTO pending_commision VALUES("243","2018-10-18","SSC000082","0");
INSERT INTO pending_commision VALUES("244","2018-10-18","SSC000083","0");
INSERT INTO pending_commision VALUES("245","2018-10-18","SSC000084","0");
INSERT INTO pending_commision VALUES("246","2018-10-18","SSC000085","0");
INSERT INTO pending_commision VALUES("247","2018-10-18","SSC000086","0");
INSERT INTO pending_commision VALUES("248","2018-10-18","SSC000087","0");
INSERT INTO pending_commision VALUES("249","2018-10-18","SSC000088","0");
INSERT INTO pending_commision VALUES("250","2018-10-18","SSC000089","0");
INSERT INTO pending_commision VALUES("251","2018-10-18","SSC000090","0");
INSERT INTO pending_commision VALUES("252","2018-10-18","SSC000091","0");
INSERT INTO pending_commision VALUES("253","2018-10-18","SSC000092","0");
INSERT INTO pending_commision VALUES("254","2018-10-18","SSC000093","0");
INSERT INTO pending_commision VALUES("255","2018-10-18","SSC000094","0");
INSERT INTO pending_commision VALUES("256","2018-10-18","SSC000095","0");
INSERT INTO pending_commision VALUES("257","2018-10-18","SSC000096","0");
INSERT INTO pending_commision VALUES("258","2018-10-18","SSC000097","0");
INSERT INTO pending_commision VALUES("259","2018-10-18","SSC000098","0");
INSERT INTO pending_commision VALUES("260","2018-10-18","SSC000099","0");
INSERT INTO pending_commision VALUES("261","2018-10-18","SSC000100","0");
INSERT INTO pending_commision VALUES("262","2018-10-18","SSC000101","0");
INSERT INTO pending_commision VALUES("263","2018-10-18","SSC000102","0");
INSERT INTO pending_commision VALUES("264","2018-10-18","SSC000103","0");
INSERT INTO pending_commision VALUES("265","2018-10-18","SSC000104","0");
INSERT INTO pending_commision VALUES("266","2018-10-18","SSC000105","0");
INSERT INTO pending_commision VALUES("267","2018-10-18","SSC000106","0");
INSERT INTO pending_commision VALUES("268","2018-10-18","SSC000107","0");
INSERT INTO pending_commision VALUES("269","2018-10-18","SSC000108","0");
INSERT INTO pending_commision VALUES("270","2018-10-18","SSC000109","0");
INSERT INTO pending_commision VALUES("271","2018-10-18","SSC000110","0");
INSERT INTO pending_commision VALUES("272","2018-10-18","SSC000111","0");
INSERT INTO pending_commision VALUES("273","2018-10-18","SSC000112","0");
INSERT INTO pending_commision VALUES("274","2018-10-18","SSC000113","0");
INSERT INTO pending_commision VALUES("275","2018-10-18","SSC000114","0");
INSERT INTO pending_commision VALUES("276","2018-10-18","SSC000115","0");
INSERT INTO pending_commision VALUES("277","2018-10-18","SSC000116","0");
INSERT INTO pending_commision VALUES("278","2018-10-18","SSC000117","0");
INSERT INTO pending_commision VALUES("279","2018-10-18","SSC000118","0");
INSERT INTO pending_commision VALUES("280","2018-10-18","SSC000119","0");
INSERT INTO pending_commision VALUES("281","2018-10-18","SSC000120","0");
INSERT INTO pending_commision VALUES("282","2018-10-18","SSC000121","0");
INSERT INTO pending_commision VALUES("283","2018-10-18","SSC000122","0");
INSERT INTO pending_commision VALUES("284","2018-10-18","SSC000123","0");
INSERT INTO pending_commision VALUES("285","2018-10-18","SSC000124","0");
INSERT INTO pending_commision VALUES("286","2018-10-18","SSC000125","0");
INSERT INTO pending_commision VALUES("287","2018-10-18","SSC000126","0");
INSERT INTO pending_commision VALUES("288","2018-10-18","SSC000127","0");
INSERT INTO pending_commision VALUES("289","2018-10-18","SSC000128","0");
INSERT INTO pending_commision VALUES("290","2018-10-18","SSC000129","0");
INSERT INTO pending_commision VALUES("291","2018-10-18","SSC000130","0");
INSERT INTO pending_commision VALUES("292","2018-10-18","SSC000131","0");
INSERT INTO pending_commision VALUES("293","2018-10-18","SSC000132","0");
INSERT INTO pending_commision VALUES("294","2018-10-18","SSC000133","0");
INSERT INTO pending_commision VALUES("295","2018-10-18","SSC000134","0");
INSERT INTO pending_commision VALUES("296","2018-10-18","SSC000135","0");
INSERT INTO pending_commision VALUES("297","2018-10-18","SSC000136","0");
INSERT INTO pending_commision VALUES("298","2018-10-18","SSC000137","0");
INSERT INTO pending_commision VALUES("299","2018-10-18","SSC000138","0");
INSERT INTO pending_commision VALUES("300","2018-10-18","SSC000139","0");
INSERT INTO pending_commision VALUES("301","2018-10-18","SSC000140","0");
INSERT INTO pending_commision VALUES("302","2018-10-18","SSC000141","0");
INSERT INTO pending_commision VALUES("303","2018-10-18","SSC000142","0");
INSERT INTO pending_commision VALUES("304","2018-10-18","SSC000143","0");
INSERT INTO pending_commision VALUES("305","2018-10-18","SSC000144","0");
INSERT INTO pending_commision VALUES("306","2018-10-18","SSC000145","0");
INSERT INTO pending_commision VALUES("307","2018-10-18","SSC000146","0");
INSERT INTO pending_commision VALUES("308","2018-10-18","SSC000147","0");
INSERT INTO pending_commision VALUES("309","2018-10-18","SSC000148","0");
INSERT INTO pending_commision VALUES("310","2018-10-18","SSC000149","0");
INSERT INTO pending_commision VALUES("311","2018-10-18","SSC000150","0");
INSERT INTO pending_commision VALUES("312","2018-10-18","SSC000151","0");
INSERT INTO pending_commision VALUES("313","2018-10-18","SSC000152","0");
INSERT INTO pending_commision VALUES("314","2018-10-18","SSC000153","0");
INSERT INTO pending_commision VALUES("315","2018-10-18","SSC000154","0");
INSERT INTO pending_commision VALUES("316","2018-10-18","SSC000155","0");
INSERT INTO pending_commision VALUES("317","2018-10-18","SSC000156","0");
INSERT INTO pending_commision VALUES("318","2018-10-18","SSC000157","0");
INSERT INTO pending_commision VALUES("319","2018-10-18","SSC000158","0");
INSERT INTO pending_commision VALUES("320","2018-10-18","SSC000159","0");
INSERT INTO pending_commision VALUES("321","2018-10-18","SSC000160","0");
INSERT INTO pending_commision VALUES("322","2018-10-18","SSC000161","0");
INSERT INTO pending_commision VALUES("323","2018-10-22","SSC000001","0");
INSERT INTO pending_commision VALUES("324","2018-10-22","SSC000002","0");
INSERT INTO pending_commision VALUES("325","2018-10-22","SSC000003","0");
INSERT INTO pending_commision VALUES("326","2018-10-22","SSC000004","0");
INSERT INTO pending_commision VALUES("327","2018-10-22","SSC000005","0");
INSERT INTO pending_commision VALUES("328","2018-10-22","SSC000006","0");
INSERT INTO pending_commision VALUES("329","2018-10-22","SSC000007","0");
INSERT INTO pending_commision VALUES("330","2018-10-22","SSC000008","0");
INSERT INTO pending_commision VALUES("331","2018-10-22","SSC000009","0");
INSERT INTO pending_commision VALUES("332","2018-10-22","SSC000010","0");
INSERT INTO pending_commision VALUES("333","2018-10-22","SSC000011","0");
INSERT INTO pending_commision VALUES("334","2018-10-22","SSC000012","0");
INSERT INTO pending_commision VALUES("335","2018-10-22","SSC000013","0");
INSERT INTO pending_commision VALUES("336","2018-10-22","SSC000014","0");
INSERT INTO pending_commision VALUES("337","2018-10-22","SSC000015","0");
INSERT INTO pending_commision VALUES("338","2018-10-22","SSC000016","0");
INSERT INTO pending_commision VALUES("339","2018-10-22","SSC000017","0");
INSERT INTO pending_commision VALUES("340","2018-10-22","SSC000018","0");
INSERT INTO pending_commision VALUES("341","2018-10-22","SSC000019","0");
INSERT INTO pending_commision VALUES("342","2018-10-22","SSC000020","0");
INSERT INTO pending_commision VALUES("343","2018-10-22","SSC000021","0");
INSERT INTO pending_commision VALUES("344","2018-10-22","SSC000022","0");
INSERT INTO pending_commision VALUES("345","2018-10-22","SSC000023","0");
INSERT INTO pending_commision VALUES("346","2018-10-22","SSC000024","0");
INSERT INTO pending_commision VALUES("347","2018-10-22","SSC000025","0");
INSERT INTO pending_commision VALUES("348","2018-10-22","SSC000026","0");
INSERT INTO pending_commision VALUES("349","2018-10-22","SSC000027","0");
INSERT INTO pending_commision VALUES("350","2018-10-22","SSC000028","0");
INSERT INTO pending_commision VALUES("351","2018-10-22","SSC000029","0");
INSERT INTO pending_commision VALUES("352","2018-10-22","SSC000030","0");
INSERT INTO pending_commision VALUES("353","2018-10-22","SSC000031","0");
INSERT INTO pending_commision VALUES("354","2018-10-22","SSC000032","0");
INSERT INTO pending_commision VALUES("355","2018-10-22","SSC000033","0");
INSERT INTO pending_commision VALUES("356","2018-10-22","SSC000034","0");
INSERT INTO pending_commision VALUES("357","2018-10-22","SSC000035","0");
INSERT INTO pending_commision VALUES("358","2018-10-22","SSC000036","0");
INSERT INTO pending_commision VALUES("359","2018-10-22","SSC000037","0");
INSERT INTO pending_commision VALUES("360","2018-10-22","SSC000038","0");
INSERT INTO pending_commision VALUES("361","2018-10-22","SSC000039","0");
INSERT INTO pending_commision VALUES("362","2018-10-22","SSC000040","0");
INSERT INTO pending_commision VALUES("363","2018-10-22","SSC000041","0");
INSERT INTO pending_commision VALUES("364","2018-10-22","SSC000042","0");
INSERT INTO pending_commision VALUES("365","2018-10-22","SSC000043","0");
INSERT INTO pending_commision VALUES("366","2018-10-22","SSC000044","0");
INSERT INTO pending_commision VALUES("367","2018-10-22","SSC000045","0");
INSERT INTO pending_commision VALUES("368","2018-10-22","SSC000046","0");
INSERT INTO pending_commision VALUES("369","2018-10-22","SSC000047","0");
INSERT INTO pending_commision VALUES("370","2018-10-22","SSC000048","0");
INSERT INTO pending_commision VALUES("371","2018-10-22","SSC000049","0");
INSERT INTO pending_commision VALUES("372","2018-10-22","SSC000050","0");
INSERT INTO pending_commision VALUES("373","2018-10-22","SSC000051","0");
INSERT INTO pending_commision VALUES("374","2018-10-22","SSC000052","0");
INSERT INTO pending_commision VALUES("375","2018-10-22","SSC000053","0");
INSERT INTO pending_commision VALUES("376","2018-10-22","SSC000054","0");
INSERT INTO pending_commision VALUES("377","2018-10-22","SSC000055","0");
INSERT INTO pending_commision VALUES("378","2018-10-22","SSC000056","0");
INSERT INTO pending_commision VALUES("379","2018-10-22","SSC000057","0");
INSERT INTO pending_commision VALUES("380","2018-10-22","SSC000058","0");
INSERT INTO pending_commision VALUES("381","2018-10-22","SSC000059","0");
INSERT INTO pending_commision VALUES("382","2018-10-22","SSC000060","0");
INSERT INTO pending_commision VALUES("383","2018-10-22","SSC000061","0");
INSERT INTO pending_commision VALUES("384","2018-10-22","SSC000062","0");
INSERT INTO pending_commision VALUES("385","2018-10-22","SSC000063","0");
INSERT INTO pending_commision VALUES("386","2018-10-22","SSC000064","0");
INSERT INTO pending_commision VALUES("387","2018-10-22","SSC000065","0");
INSERT INTO pending_commision VALUES("388","2018-10-22","SSC000066","0");
INSERT INTO pending_commision VALUES("389","2018-10-22","SSC000067","0");
INSERT INTO pending_commision VALUES("390","2018-10-22","SSC000068","0");
INSERT INTO pending_commision VALUES("391","2018-10-22","SSC000069","0");
INSERT INTO pending_commision VALUES("392","2018-10-22","SSC000070","0");
INSERT INTO pending_commision VALUES("393","2018-10-22","SSC000071","0");
INSERT INTO pending_commision VALUES("394","2018-10-22","SSC000072","0");
INSERT INTO pending_commision VALUES("395","2018-10-22","SSC000073","0");
INSERT INTO pending_commision VALUES("396","2018-10-22","SSC000074","0");
INSERT INTO pending_commision VALUES("397","2018-10-22","SSC000075","0");
INSERT INTO pending_commision VALUES("398","2018-10-22","SSC000076","0");
INSERT INTO pending_commision VALUES("399","2018-10-22","SSC000077","0");
INSERT INTO pending_commision VALUES("400","2018-10-22","SSC000078","0");
INSERT INTO pending_commision VALUES("401","2018-10-22","SSC000079","0");
INSERT INTO pending_commision VALUES("402","2018-10-22","SSC000080","0");
INSERT INTO pending_commision VALUES("403","2018-10-22","SSC000081","0");
INSERT INTO pending_commision VALUES("404","2018-10-22","SSC000082","0");
INSERT INTO pending_commision VALUES("405","2018-10-22","SSC000083","0");
INSERT INTO pending_commision VALUES("406","2018-10-22","SSC000084","0");
INSERT INTO pending_commision VALUES("407","2018-10-22","SSC000085","0");
INSERT INTO pending_commision VALUES("408","2018-10-22","SSC000086","0");
INSERT INTO pending_commision VALUES("409","2018-10-22","SSC000087","0");
INSERT INTO pending_commision VALUES("410","2018-10-22","SSC000088","0");
INSERT INTO pending_commision VALUES("411","2018-10-22","SSC000089","0");
INSERT INTO pending_commision VALUES("412","2018-10-22","SSC000090","0");
INSERT INTO pending_commision VALUES("413","2018-10-22","SSC000091","0");
INSERT INTO pending_commision VALUES("414","2018-10-22","SSC000092","0");
INSERT INTO pending_commision VALUES("415","2018-10-22","SSC000093","0");
INSERT INTO pending_commision VALUES("416","2018-10-22","SSC000094","0");
INSERT INTO pending_commision VALUES("417","2018-10-22","SSC000095","0");
INSERT INTO pending_commision VALUES("418","2018-10-22","SSC000096","0");
INSERT INTO pending_commision VALUES("419","2018-10-22","SSC000097","0");
INSERT INTO pending_commision VALUES("420","2018-10-22","SSC000098","0");
INSERT INTO pending_commision VALUES("421","2018-10-22","SSC000099","0");
INSERT INTO pending_commision VALUES("422","2018-10-22","SSC000100","0");
INSERT INTO pending_commision VALUES("423","2018-10-22","SSC000101","0");
INSERT INTO pending_commision VALUES("424","2018-10-22","SSC000102","0");
INSERT INTO pending_commision VALUES("425","2018-10-22","SSC000103","0");
INSERT INTO pending_commision VALUES("426","2018-10-22","SSC000104","0");
INSERT INTO pending_commision VALUES("427","2018-10-22","SSC000105","0");
INSERT INTO pending_commision VALUES("428","2018-10-22","SSC000106","0");
INSERT INTO pending_commision VALUES("429","2018-10-22","SSC000107","0");
INSERT INTO pending_commision VALUES("430","2018-10-22","SSC000108","0");
INSERT INTO pending_commision VALUES("431","2018-10-22","SSC000109","0");
INSERT INTO pending_commision VALUES("432","2018-10-22","SSC000110","0");
INSERT INTO pending_commision VALUES("433","2018-10-22","SSC000111","0");
INSERT INTO pending_commision VALUES("434","2018-10-22","SSC000112","0");
INSERT INTO pending_commision VALUES("435","2018-10-22","SSC000113","0");
INSERT INTO pending_commision VALUES("436","2018-10-22","SSC000114","0");
INSERT INTO pending_commision VALUES("437","2018-10-22","SSC000115","0");
INSERT INTO pending_commision VALUES("438","2018-10-22","SSC000116","0");
INSERT INTO pending_commision VALUES("439","2018-10-22","SSC000117","0");
INSERT INTO pending_commision VALUES("440","2018-10-22","SSC000118","0");
INSERT INTO pending_commision VALUES("441","2018-10-22","SSC000119","0");
INSERT INTO pending_commision VALUES("442","2018-10-22","SSC000120","0");
INSERT INTO pending_commision VALUES("443","2018-10-22","SSC000121","0");
INSERT INTO pending_commision VALUES("444","2018-10-22","SSC000122","0");
INSERT INTO pending_commision VALUES("445","2018-10-22","SSC000123","0");
INSERT INTO pending_commision VALUES("446","2018-10-22","SSC000124","0");
INSERT INTO pending_commision VALUES("447","2018-10-22","SSC000125","0");
INSERT INTO pending_commision VALUES("448","2018-10-22","SSC000126","0");
INSERT INTO pending_commision VALUES("449","2018-10-22","SSC000127","0");
INSERT INTO pending_commision VALUES("450","2018-10-22","SSC000128","0");
INSERT INTO pending_commision VALUES("451","2018-10-22","SSC000129","0");
INSERT INTO pending_commision VALUES("452","2018-10-22","SSC000130","0");
INSERT INTO pending_commision VALUES("453","2018-10-22","SSC000131","0");
INSERT INTO pending_commision VALUES("454","2018-10-22","SSC000132","0");
INSERT INTO pending_commision VALUES("455","2018-10-22","SSC000133","0");
INSERT INTO pending_commision VALUES("456","2018-10-22","SSC000134","0");
INSERT INTO pending_commision VALUES("457","2018-10-22","SSC000135","0");
INSERT INTO pending_commision VALUES("458","2018-10-22","SSC000136","0");
INSERT INTO pending_commision VALUES("459","2018-10-22","SSC000137","0");
INSERT INTO pending_commision VALUES("460","2018-10-22","SSC000138","0");
INSERT INTO pending_commision VALUES("461","2018-10-22","SSC000139","0");
INSERT INTO pending_commision VALUES("462","2018-10-22","SSC000140","0");
INSERT INTO pending_commision VALUES("463","2018-10-22","SSC000141","0");
INSERT INTO pending_commision VALUES("464","2018-10-22","SSC000142","0");
INSERT INTO pending_commision VALUES("465","2018-10-22","SSC000143","0");
INSERT INTO pending_commision VALUES("466","2018-10-22","SSC000144","0");
INSERT INTO pending_commision VALUES("467","2018-10-22","SSC000145","0");
INSERT INTO pending_commision VALUES("468","2018-10-22","SSC000146","0");
INSERT INTO pending_commision VALUES("469","2018-10-22","SSC000147","0");
INSERT INTO pending_commision VALUES("470","2018-10-22","SSC000148","0");
INSERT INTO pending_commision VALUES("471","2018-10-22","SSC000149","0");
INSERT INTO pending_commision VALUES("472","2018-10-22","SSC000150","0");
INSERT INTO pending_commision VALUES("473","2018-10-22","SSC000151","0");
INSERT INTO pending_commision VALUES("474","2018-10-22","SSC000152","0");
INSERT INTO pending_commision VALUES("475","2018-10-22","SSC000153","0");
INSERT INTO pending_commision VALUES("476","2018-10-22","SSC000154","0");
INSERT INTO pending_commision VALUES("477","2018-10-22","SSC000155","0");
INSERT INTO pending_commision VALUES("478","2018-10-22","SSC000156","0");
INSERT INTO pending_commision VALUES("479","2018-10-22","SSC000157","0");
INSERT INTO pending_commision VALUES("480","2018-10-22","SSC000158","0");
INSERT INTO pending_commision VALUES("481","2018-10-22","SSC000159","0");
INSERT INTO pending_commision VALUES("482","2018-10-22","SSC000160","0");
INSERT INTO pending_commision VALUES("483","2018-10-22","SSC000161","0");
INSERT INTO pending_commision VALUES("484","2018-10-28","SSC000001","0");
INSERT INTO pending_commision VALUES("485","2018-10-28","SSC000002","0");
INSERT INTO pending_commision VALUES("486","2018-10-28","SSC000003","0");
INSERT INTO pending_commision VALUES("487","2018-10-28","SSC000004","0");
INSERT INTO pending_commision VALUES("488","2018-10-28","SSC000005","0");
INSERT INTO pending_commision VALUES("489","2018-10-28","SSC000006","0");
INSERT INTO pending_commision VALUES("490","2018-10-28","SSC000007","0");
INSERT INTO pending_commision VALUES("491","2018-10-28","SSC000008","0");
INSERT INTO pending_commision VALUES("492","2018-10-28","SSC000009","0");
INSERT INTO pending_commision VALUES("493","2018-10-28","SSC000010","0");
INSERT INTO pending_commision VALUES("494","2018-10-28","SSC000011","0");
INSERT INTO pending_commision VALUES("495","2018-10-28","SSC000012","0");
INSERT INTO pending_commision VALUES("496","2018-10-28","SSC000013","0");
INSERT INTO pending_commision VALUES("497","2018-10-28","SSC000014","0");
INSERT INTO pending_commision VALUES("498","2018-10-28","SSC000015","0");
INSERT INTO pending_commision VALUES("499","2018-10-28","SSC000016","0");
INSERT INTO pending_commision VALUES("500","2018-10-28","SSC000017","0");
INSERT INTO pending_commision VALUES("501","2018-10-28","SSC000018","0");
INSERT INTO pending_commision VALUES("502","2018-10-28","SSC000019","0");
INSERT INTO pending_commision VALUES("503","2018-10-28","SSC000020","0");
INSERT INTO pending_commision VALUES("504","2018-10-28","SSC000021","0");
INSERT INTO pending_commision VALUES("505","2018-10-28","SSC000022","0");
INSERT INTO pending_commision VALUES("506","2018-10-28","SSC000023","0");
INSERT INTO pending_commision VALUES("507","2018-10-28","SSC000024","0");
INSERT INTO pending_commision VALUES("508","2018-10-28","SSC000025","0");
INSERT INTO pending_commision VALUES("509","2018-10-28","SSC000026","0");
INSERT INTO pending_commision VALUES("510","2018-10-28","SSC000027","0");
INSERT INTO pending_commision VALUES("511","2018-10-28","SSC000028","0");
INSERT INTO pending_commision VALUES("512","2018-10-28","SSC000029","0");
INSERT INTO pending_commision VALUES("513","2018-10-28","SSC000030","0");
INSERT INTO pending_commision VALUES("514","2018-10-28","SSC000031","0");
INSERT INTO pending_commision VALUES("515","2018-10-28","SSC000032","0");
INSERT INTO pending_commision VALUES("516","2018-10-28","SSC000033","0");
INSERT INTO pending_commision VALUES("517","2018-10-28","SSC000034","0");
INSERT INTO pending_commision VALUES("518","2018-10-28","SSC000035","0");
INSERT INTO pending_commision VALUES("519","2018-10-28","SSC000036","0");
INSERT INTO pending_commision VALUES("520","2018-10-28","SSC000037","0");
INSERT INTO pending_commision VALUES("521","2018-10-28","SSC000038","0");
INSERT INTO pending_commision VALUES("522","2018-10-28","SSC000039","0");
INSERT INTO pending_commision VALUES("523","2018-10-28","SSC000040","0");
INSERT INTO pending_commision VALUES("524","2018-10-28","SSC000041","0");
INSERT INTO pending_commision VALUES("525","2018-10-28","SSC000042","0");
INSERT INTO pending_commision VALUES("526","2018-10-28","SSC000043","0");
INSERT INTO pending_commision VALUES("527","2018-10-28","SSC000044","0");
INSERT INTO pending_commision VALUES("528","2018-10-28","SSC000045","0");
INSERT INTO pending_commision VALUES("529","2018-10-28","SSC000046","0");
INSERT INTO pending_commision VALUES("530","2018-10-28","SSC000047","0");
INSERT INTO pending_commision VALUES("531","2018-10-28","SSC000048","0");
INSERT INTO pending_commision VALUES("532","2018-10-28","SSC000049","0");
INSERT INTO pending_commision VALUES("533","2018-10-28","SSC000050","0");
INSERT INTO pending_commision VALUES("534","2018-10-28","SSC000051","0");
INSERT INTO pending_commision VALUES("535","2018-10-28","SSC000052","0");
INSERT INTO pending_commision VALUES("536","2018-10-28","SSC000053","0");
INSERT INTO pending_commision VALUES("537","2018-10-28","SSC000054","0");
INSERT INTO pending_commision VALUES("538","2018-10-28","SSC000055","0");
INSERT INTO pending_commision VALUES("539","2018-10-28","SSC000056","0");
INSERT INTO pending_commision VALUES("540","2018-10-28","SSC000057","0");
INSERT INTO pending_commision VALUES("541","2018-10-28","SSC000058","0");
INSERT INTO pending_commision VALUES("542","2018-10-28","SSC000059","0");
INSERT INTO pending_commision VALUES("543","2018-10-28","SSC000060","0");
INSERT INTO pending_commision VALUES("544","2018-10-28","SSC000061","0");
INSERT INTO pending_commision VALUES("545","2018-10-28","SSC000062","0");
INSERT INTO pending_commision VALUES("546","2018-10-28","SSC000063","0");
INSERT INTO pending_commision VALUES("547","2018-10-28","SSC000064","0");
INSERT INTO pending_commision VALUES("548","2018-10-28","SSC000065","0");
INSERT INTO pending_commision VALUES("549","2018-10-28","SSC000066","0");
INSERT INTO pending_commision VALUES("550","2018-10-28","SSC000067","0");
INSERT INTO pending_commision VALUES("551","2018-10-28","SSC000068","0");
INSERT INTO pending_commision VALUES("552","2018-10-28","SSC000069","0");
INSERT INTO pending_commision VALUES("553","2018-10-28","SSC000070","0");
INSERT INTO pending_commision VALUES("554","2018-10-28","SSC000071","0");
INSERT INTO pending_commision VALUES("555","2018-10-28","SSC000072","0");
INSERT INTO pending_commision VALUES("556","2018-10-28","SSC000073","0");
INSERT INTO pending_commision VALUES("557","2018-10-28","SSC000074","0");
INSERT INTO pending_commision VALUES("558","2018-10-28","SSC000075","0");
INSERT INTO pending_commision VALUES("559","2018-10-28","SSC000076","0");
INSERT INTO pending_commision VALUES("560","2018-10-28","SSC000077","0");
INSERT INTO pending_commision VALUES("561","2018-10-28","SSC000078","0");
INSERT INTO pending_commision VALUES("562","2018-10-28","SSC000079","0");
INSERT INTO pending_commision VALUES("563","2018-10-28","SSC000080","0");
INSERT INTO pending_commision VALUES("564","2018-10-28","SSC000081","0");
INSERT INTO pending_commision VALUES("565","2018-10-28","SSC000082","0");
INSERT INTO pending_commision VALUES("566","2018-10-28","SSC000083","0");
INSERT INTO pending_commision VALUES("567","2018-10-28","SSC000084","0");
INSERT INTO pending_commision VALUES("568","2018-10-28","SSC000085","0");
INSERT INTO pending_commision VALUES("569","2018-10-28","SSC000086","0");
INSERT INTO pending_commision VALUES("570","2018-10-28","SSC000087","0");
INSERT INTO pending_commision VALUES("571","2018-10-28","SSC000088","0");
INSERT INTO pending_commision VALUES("572","2018-10-28","SSC000089","0");
INSERT INTO pending_commision VALUES("573","2018-10-28","SSC000090","0");
INSERT INTO pending_commision VALUES("574","2018-10-28","SSC000091","0");
INSERT INTO pending_commision VALUES("575","2018-10-28","SSC000092","0");
INSERT INTO pending_commision VALUES("576","2018-10-28","SSC000093","0");
INSERT INTO pending_commision VALUES("577","2018-10-28","SSC000094","0");
INSERT INTO pending_commision VALUES("578","2018-10-28","SSC000095","0");
INSERT INTO pending_commision VALUES("579","2018-10-28","SSC000096","0");
INSERT INTO pending_commision VALUES("580","2018-10-28","SSC000097","0");
INSERT INTO pending_commision VALUES("581","2018-10-28","SSC000098","0");
INSERT INTO pending_commision VALUES("582","2018-10-28","SSC000099","0");
INSERT INTO pending_commision VALUES("583","2018-10-28","SSC000100","0");
INSERT INTO pending_commision VALUES("584","2018-10-28","SSC000101","0");
INSERT INTO pending_commision VALUES("585","2018-10-28","SSC000102","0");
INSERT INTO pending_commision VALUES("586","2018-10-28","SSC000103","0");
INSERT INTO pending_commision VALUES("587","2018-10-28","SSC000104","0");
INSERT INTO pending_commision VALUES("588","2018-10-28","SSC000105","0");
INSERT INTO pending_commision VALUES("589","2018-10-28","SSC000106","0");
INSERT INTO pending_commision VALUES("590","2018-10-28","SSC000107","0");
INSERT INTO pending_commision VALUES("591","2018-10-28","SSC000108","0");
INSERT INTO pending_commision VALUES("592","2018-10-28","SSC000109","0");
INSERT INTO pending_commision VALUES("593","2018-10-28","SSC000110","0");
INSERT INTO pending_commision VALUES("594","2018-10-28","SSC000111","0");
INSERT INTO pending_commision VALUES("595","2018-10-28","SSC000112","0");
INSERT INTO pending_commision VALUES("596","2018-10-28","SSC000113","0");
INSERT INTO pending_commision VALUES("597","2018-10-28","SSC000114","0");
INSERT INTO pending_commision VALUES("598","2018-10-28","SSC000115","0");
INSERT INTO pending_commision VALUES("599","2018-10-28","SSC000116","0");
INSERT INTO pending_commision VALUES("600","2018-10-28","SSC000117","0");
INSERT INTO pending_commision VALUES("601","2018-10-28","SSC000118","0");
INSERT INTO pending_commision VALUES("602","2018-10-28","SSC000119","0");
INSERT INTO pending_commision VALUES("603","2018-10-28","SSC000120","0");
INSERT INTO pending_commision VALUES("604","2018-10-28","SSC000121","0");
INSERT INTO pending_commision VALUES("605","2018-10-28","SSC000122","0");
INSERT INTO pending_commision VALUES("606","2018-10-28","SSC000123","0");
INSERT INTO pending_commision VALUES("607","2018-10-28","SSC000124","0");
INSERT INTO pending_commision VALUES("608","2018-10-28","SSC000125","0");
INSERT INTO pending_commision VALUES("609","2018-10-28","SSC000126","0");
INSERT INTO pending_commision VALUES("610","2018-10-28","SSC000127","0");
INSERT INTO pending_commision VALUES("611","2018-10-28","SSC000128","0");
INSERT INTO pending_commision VALUES("612","2018-10-28","SSC000129","0");
INSERT INTO pending_commision VALUES("613","2018-10-28","SSC000130","0");
INSERT INTO pending_commision VALUES("614","2018-10-28","SSC000131","0");
INSERT INTO pending_commision VALUES("615","2018-10-28","SSC000132","0");
INSERT INTO pending_commision VALUES("616","2018-10-28","SSC000133","0");
INSERT INTO pending_commision VALUES("617","2018-10-28","SSC000134","0");
INSERT INTO pending_commision VALUES("618","2018-10-28","SSC000135","0");
INSERT INTO pending_commision VALUES("619","2018-10-28","SSC000136","0");
INSERT INTO pending_commision VALUES("620","2018-10-28","SSC000137","0");
INSERT INTO pending_commision VALUES("621","2018-10-28","SSC000138","0");
INSERT INTO pending_commision VALUES("622","2018-10-28","SSC000139","0");
INSERT INTO pending_commision VALUES("623","2018-10-28","SSC000140","0");
INSERT INTO pending_commision VALUES("624","2018-10-28","SSC000141","0");
INSERT INTO pending_commision VALUES("625","2018-10-28","SSC000142","0");
INSERT INTO pending_commision VALUES("626","2018-10-28","SSC000143","0");
INSERT INTO pending_commision VALUES("627","2018-10-28","SSC000144","0");
INSERT INTO pending_commision VALUES("628","2018-10-28","SSC000145","0");
INSERT INTO pending_commision VALUES("629","2018-10-28","SSC000146","0");
INSERT INTO pending_commision VALUES("630","2018-10-28","SSC000147","0");
INSERT INTO pending_commision VALUES("631","2018-10-28","SSC000148","0");
INSERT INTO pending_commision VALUES("632","2018-10-28","SSC000149","0");
INSERT INTO pending_commision VALUES("633","2018-10-28","SSC000150","0");
INSERT INTO pending_commision VALUES("634","2018-10-28","SSC000151","0");
INSERT INTO pending_commision VALUES("635","2018-10-28","SSC000152","0");
INSERT INTO pending_commision VALUES("636","2018-10-28","SSC000153","0");
INSERT INTO pending_commision VALUES("637","2018-10-28","SSC000154","0");
INSERT INTO pending_commision VALUES("638","2018-10-28","SSC000155","0");
INSERT INTO pending_commision VALUES("639","2018-10-28","SSC000156","0");
INSERT INTO pending_commision VALUES("640","2018-10-28","SSC000157","0");
INSERT INTO pending_commision VALUES("641","2018-10-28","SSC000158","0");
INSERT INTO pending_commision VALUES("642","2018-10-28","SSC000159","0");
INSERT INTO pending_commision VALUES("643","2018-10-28","SSC000160","0");
INSERT INTO pending_commision VALUES("644","2018-10-28","SSC000161","0");



CREATE TABLE `tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `left` varchar(20) NOT NULL,
  `right` varchar(20) NOT NULL,
  `leftcount` int(3) NOT NULL,
  `rightcount` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=latin1;

INSERT INTO tree VALUES("8","SSC000001","SSC000003","SSC000002","128","34");
INSERT INTO tree VALUES("9","SSC000002","SSC000005","SSC000004","22","11");
INSERT INTO tree VALUES("12","SSC000003","SSC000007","SSC000006","57","70");
INSERT INTO tree VALUES("14","SSC000004","SSC000009","SSC000008","3","7");
INSERT INTO tree VALUES("15","SSC000005","SSC000011","SSC000010","9","12");
INSERT INTO tree VALUES("16","SSC000006","SSC000013","SSC000012","66","3");
INSERT INTO tree VALUES("17","SSC000007","SSC000015","SSC000014","53","3");
INSERT INTO tree VALUES("18","SSC000008","SSC000030","SSC000031","1","5");
INSERT INTO tree VALUES("19","SSC000009","SSC000028","SSC000029","1","1");
INSERT INTO tree VALUES("20","SSC000010","SSC000024","SSC000025","1","10");
INSERT INTO tree VALUES("21","SSC000011","SSC000026","SSC000027","1","7");
INSERT INTO tree VALUES("22","SSC000012","SSC000022","SSC000023","1","1");
INSERT INTO tree VALUES("23","SSC000013","SSC000020","SSC000021","35","30");
INSERT INTO tree VALUES("24","SSC000014","SSC000017","SSC000016","1","1");
INSERT INTO tree VALUES("25","SSC000015","SSC000018","SSC000019","22","30");
INSERT INTO tree VALUES("26","SSC000016","","","0","0");
INSERT INTO tree VALUES("27","SSC000017","","","0","0");
INSERT INTO tree VALUES("28","SSC000018","SSC000062","SSC000135","20","1");
INSERT INTO tree VALUES("29","SSC000019","SSC000081","SSC000148","26","3");
INSERT INTO tree VALUES("30","SSC000020","SSC000032","SSC000113","28","6");
INSERT INTO tree VALUES("31","SSC000021","SSC000098","","29","0");
INSERT INTO tree VALUES("32","SSC000022","","","0","0");
INSERT INTO tree VALUES("33","SSC000023","","","0","0");
INSERT INTO tree VALUES("34","SSC000024","","","0","0");
INSERT INTO tree VALUES("35","SSC000025","SSC000043","","9","0");
INSERT INTO tree VALUES("36","SSC000026","","","0","0");
INSERT INTO tree VALUES("37","SSC000027","SSC000134","","6","0");
INSERT INTO tree VALUES("38","SSC000028","","","0","0");
INSERT INTO tree VALUES("39","SSC000029","","","0","0");
INSERT INTO tree VALUES("40","SSC000030","","","0","0");
INSERT INTO tree VALUES("41","SSC000031","","SSC000073","0","4");
INSERT INTO tree VALUES("42","SSC000032","SSC000033","SSC000034","8","19");
INSERT INTO tree VALUES("43","SSC000033","SSC000037","SSC000038","5","2");
INSERT INTO tree VALUES("44","SSC000034","SSC000036","SSC000035","3","15");
INSERT INTO tree VALUES("45","SSC000035","SSC000039","SSC000094","13","1");
INSERT INTO tree VALUES("46","SSC000036","SSC000097","SSC000096","1","1");
INSERT INTO tree VALUES("47","SSC000037","SSC000052","SSC000055","3","1");
INSERT INTO tree VALUES("48","SSC000038","","SSC000095","0","1");
INSERT INTO tree VALUES("49","SSC000039","SSC000040","SSC000041","9","3");
INSERT INTO tree VALUES("50","SSC000040","SSC000042","SSC000158","7","1");
INSERT INTO tree VALUES("51","SSC000041","","SSC000093","0","2");
INSERT INTO tree VALUES("52","SSC000042","SSC000056","SSC000057","3","3");
INSERT INTO tree VALUES("53","SSC000043","SSC000044","SSC000045","7","1");
INSERT INTO tree VALUES("54","SSC000044","SSC000046","SSC000051","5","1");
INSERT INTO tree VALUES("55","SSC000045","","","0","0");
INSERT INTO tree VALUES("56","SSC000046","SSC000047","SSC000048","3","1");
INSERT INTO tree VALUES("57","SSC000047","SSC000049","SSC000050","1","1");
INSERT INTO tree VALUES("58","SSC000048","","","0","0");
INSERT INTO tree VALUES("59","SSC000049","","","0","0");
INSERT INTO tree VALUES("60","SSC000050","","","0","0");
INSERT INTO tree VALUES("61","SSC000051","","","0","0");
INSERT INTO tree VALUES("62","SSC000052","SSC000053","SSC000054","1","1");
INSERT INTO tree VALUES("63","SSC000053","","","0","0");
INSERT INTO tree VALUES("64","SSC000054","","","0","0");
INSERT INTO tree VALUES("65","SSC000055","","","0","0");
INSERT INTO tree VALUES("66","SSC000056","SSC000058","SSC000059","1","1");
INSERT INTO tree VALUES("67","SSC000057","SSC000060","SSC000061","1","1");
INSERT INTO tree VALUES("68","SSC000058","","","0","0");
INSERT INTO tree VALUES("69","SSC000059","","","0","0");
INSERT INTO tree VALUES("70","SSC000060","","","0","0");
INSERT INTO tree VALUES("71","SSC000061","","","0","0");
INSERT INTO tree VALUES("72","SSC000062","SSC000063","SSC000066","9","10");
INSERT INTO tree VALUES("73","SSC000063","SSC000064","SSC000065","4","4");
INSERT INTO tree VALUES("74","SSC000064","SSC000072","SSC000077","1","2");
INSERT INTO tree VALUES("75","SSC000065","SSC000079","SSC000078","1","2");
INSERT INTO tree VALUES("76","SSC000066","SSC000067","SSC000068","4","5");
INSERT INTO tree VALUES("77","SSC000067","SSC000080","SSC000151","2","1");
INSERT INTO tree VALUES("78","SSC000068","SSC000069","SSC000109","3","1");
INSERT INTO tree VALUES("79","SSC000069","SSC000070","SSC000071","1","1");
INSERT INTO tree VALUES("80","SSC000070","","","0","0");
INSERT INTO tree VALUES("81","SSC000071","","","0","0");
INSERT INTO tree VALUES("82","SSC000072","","","0","0");
INSERT INTO tree VALUES("83","SSC000073","SSC000074","SSC000075","1","2");
INSERT INTO tree VALUES("84","SSC000074","","","0","0");
INSERT INTO tree VALUES("85","SSC000075","SSC000076","","1","0");
INSERT INTO tree VALUES("86","SSC000076","","","0","0");
INSERT INTO tree VALUES("87","SSC000077","SSC000160","","1","0");
INSERT INTO tree VALUES("88","SSC000078","SSC000159","","1","0");
INSERT INTO tree VALUES("89","SSC000079","","","0","0");
INSERT INTO tree VALUES("90","SSC000080","SSC000161","","1","0");
INSERT INTO tree VALUES("91","SSC000081","SSC000082","SSC000083","10","15");
INSERT INTO tree VALUES("92","SSC000082","SSC000090","SSC000110","5","4");
INSERT INTO tree VALUES("93","SSC000083","SSC000084","SSC000087","9","5");
INSERT INTO tree VALUES("94","SSC000084","SSC000085","SSC000086","7","1");
INSERT INTO tree VALUES("95","SSC000085","SSC000126","SSC000123","3","3");
INSERT INTO tree VALUES("96","SSC000086","","","0","0");
INSERT INTO tree VALUES("97","SSC000087","SSC000088","SSC000089","3","1");
INSERT INTO tree VALUES("98","SSC000088","SSC000154","SSC000157","1","1");
INSERT INTO tree VALUES("99","SSC000089","","","0","0");
INSERT INTO tree VALUES("100","SSC000090","SSC000091","SSC000092","3","1");
INSERT INTO tree VALUES("101","SSC000091","SSC000153","","2","0");
INSERT INTO tree VALUES("102","SSC000092","","","0","0");
INSERT INTO tree VALUES("103","SSC000093","","","0","0");
INSERT INTO tree VALUES("104","SSC000094","","","0","0");
INSERT INTO tree VALUES("105","SSC000095","","","0","0");
INSERT INTO tree VALUES("106","SSC000096","","","0","0");
INSERT INTO tree VALUES("107","SSC000097","","","0","0");
INSERT INTO tree VALUES("108","SSC000098","SSC000099","SSC000100","17","11");
INSERT INTO tree VALUES("109","SSC000099","SSC000101","SSC000102","15","1");
INSERT INTO tree VALUES("110","SSC000100","SSC000103","SSC000104","4","6");
INSERT INTO tree VALUES("111","SSC000101","SSC000139","SSC000105","1","12");
INSERT INTO tree VALUES("112","SSC000102","","","0","0");
INSERT INTO tree VALUES("113","SSC000103","SSC000129","","3","0");
INSERT INTO tree VALUES("114","SSC000104","","SSC000116","0","5");
INSERT INTO tree VALUES("116","SSC000105","","SSC000106","0","11");
INSERT INTO tree VALUES("117","SSC000106","SSC000107","SSC000108","1","9");
INSERT INTO tree VALUES("118","SSC000107","","","0","0");
INSERT INTO tree VALUES("119","SSC000108","","SSC000117","0","8");
INSERT INTO tree VALUES("120","SSC000109","","","0","0");
INSERT INTO tree VALUES("121","SSC000110","SSC000111","SSC000112","2","1");
INSERT INTO tree VALUES("122","SSC000111","SSC000155","","1","0");
INSERT INTO tree VALUES("123","SSC000112","","","0","0");
INSERT INTO tree VALUES("124","SSC000113","SSC000114","","5","0");
INSERT INTO tree VALUES("125","SSC000114","SSC000115","","4","0");
INSERT INTO tree VALUES("126","SSC000115","SSC000132","SSC000133","2","1");
INSERT INTO tree VALUES("127","SSC000116","","SSC000119","0","4");
INSERT INTO tree VALUES("128","SSC000117","","SSC000118","0","7");
INSERT INTO tree VALUES("129","SSC000118","","SSC000140","0","6");
INSERT INTO tree VALUES("130","SSC000119","SSC000121","SSC000120","1","2");
INSERT INTO tree VALUES("131","SSC000120","","SSC000122","0","1");
INSERT INTO tree VALUES("132","SSC000121","","","0","0");
INSERT INTO tree VALUES("133","SSC000122","","","0","0");
INSERT INTO tree VALUES("134","SSC000123","SSC000124","SSC000125","1","1");
INSERT INTO tree VALUES("135","SSC000124","","","0","0");
INSERT INTO tree VALUES("136","SSC000125","","","0","0");
INSERT INTO tree VALUES("137","SSC000126","SSC000127","SSC000128","1","1");
INSERT INTO tree VALUES("138","SSC000127","","","0","0");
INSERT INTO tree VALUES("139","SSC000128","","","0","0");
INSERT INTO tree VALUES("140","SSC000129","SSC000130","SSC000131","1","1");
INSERT INTO tree VALUES("141","SSC000130","","","0","0");
INSERT INTO tree VALUES("142","SSC000131","","","0","0");
INSERT INTO tree VALUES("143","SSC000132","","SSC000147","0","1");
INSERT INTO tree VALUES("144","SSC000133","","","0","0");
INSERT INTO tree VALUES("145","SSC000134","SSC000136","SSC000137","3","2");
INSERT INTO tree VALUES("146","SSC000135","","","0","0");
INSERT INTO tree VALUES("147","SSC000136","SSC000146","SSC000152","1","1");
INSERT INTO tree VALUES("148","SSC000137","SSC000138","","1","0");
INSERT INTO tree VALUES("149","SSC000138","","","0","0");
INSERT INTO tree VALUES("150","SSC000139","","","0","0");
INSERT INTO tree VALUES("151","SSC000140","SSC000141","SSC000142","1","4");
INSERT INTO tree VALUES("152","SSC000141","","","0","0");
INSERT INTO tree VALUES("153","SSC000142","","SSC000143","0","3");
INSERT INTO tree VALUES("154","SSC000143","SSC000144","SSC000145","1","1");
INSERT INTO tree VALUES("155","SSC000144","","","0","0");
INSERT INTO tree VALUES("156","SSC000145","","","0","0");
INSERT INTO tree VALUES("157","SSC000146","","","0","0");
INSERT INTO tree VALUES("158","SSC000147","","","0","0");
INSERT INTO tree VALUES("159","SSC000148","SSC000149","SSC000150","1","1");
INSERT INTO tree VALUES("160","SSC000149","","","0","0");
INSERT INTO tree VALUES("161","SSC000150","","","0","0");
INSERT INTO tree VALUES("162","SSC000151","","","0","0");
INSERT INTO tree VALUES("163","SSC000152","","","0","0");
INSERT INTO tree VALUES("165","SSC000153","SSC000156","","1","0");
INSERT INTO tree VALUES("166","SSC000154","","","0","0");
INSERT INTO tree VALUES("167","SSC000155","","","0","0");
INSERT INTO tree VALUES("168","SSC000156","","","0","0");
INSERT INTO tree VALUES("169","SSC000157","","","0","0");
INSERT INTO tree VALUES("170","SSC000158","","","0","0");
INSERT INTO tree VALUES("171","SSC000159","","","0","0");
INSERT INTO tree VALUES("172","SSC000160","","","0","0");
INSERT INTO tree VALUES("173","SSC000161","","","0","0");



CREATE TABLE `tree_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(15) NOT NULL,
  `parent_id` varchar(15) NOT NULL,
  `amount` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

INSERT INTO tree_2 VALUES("1","SSC000001","","500");
INSERT INTO tree_2 VALUES("2","SSC000002","SSC000001","500");
INSERT INTO tree_2 VALUES("3","SSC000003","SSC000001","500");
INSERT INTO tree_2 VALUES("4","SSC000004","SSC000001","500");
INSERT INTO tree_2 VALUES("5","SSC000005","SSC000001","500");
INSERT INTO tree_2 VALUES("6","SSC000006","SSC000001","500");
INSERT INTO tree_2 VALUES("7","SSC000007","SSC000001","300");
INSERT INTO tree_2 VALUES("8","SSC000008","SSC000001","0");
INSERT INTO tree_2 VALUES("9","SSC000009","SSC000001","0");
INSERT INTO tree_2 VALUES("10","SSC000010","SSC000001","0");
INSERT INTO tree_2 VALUES("11","SSC000011","SSC000001","0");
INSERT INTO tree_2 VALUES("12","SSC000012","SSC000002","0");
INSERT INTO tree_2 VALUES("13","SSC000013","SSC000002","0");
INSERT INTO tree_2 VALUES("14","SSC000014","SSC000002","0");
INSERT INTO tree_2 VALUES("15","SSC000015","SSC000002","0");
INSERT INTO tree_2 VALUES("16","SSC000018","SSC000002","0");
INSERT INTO tree_2 VALUES("17","SSC000019","SSC000002","0");
INSERT INTO tree_2 VALUES("18","SSC000020","SSC000002","0");
INSERT INTO tree_2 VALUES("19","SSC000032","SSC000002","0");
INSERT INTO tree_2 VALUES("20","SSC000033","SSC000002","0");
INSERT INTO tree_2 VALUES("21","SSC000034","SSC000002","0");
INSERT INTO tree_2 VALUES("22","SSC000035","SSC000003","0");
INSERT INTO tree_2 VALUES("23","SSC000036","SSC000003","0");
INSERT INTO tree_2 VALUES("24","SSC000037","SSC000003","0");
INSERT INTO tree_2 VALUES("25","SSC000039","SSC000003","0");
INSERT INTO tree_2 VALUES("26","SSC000040","SSC000003","0");
INSERT INTO tree_2 VALUES("27","SSC000042","SSC000003","0");
INSERT INTO tree_2 VALUES("28","SSC000043","SSC000003","0");
INSERT INTO tree_2 VALUES("29","SSC000044","SSC000003","0");
INSERT INTO tree_2 VALUES("30","SSC000046","SSC000003","0");
INSERT INTO tree_2 VALUES("31","SSC000047","SSC000003","0");
INSERT INTO tree_2 VALUES("32","SSC000052","SSC000004","0");
INSERT INTO tree_2 VALUES("33","SSC000056","SSC000004","0");
INSERT INTO tree_2 VALUES("34","SSC000057","SSC000004","0");
INSERT INTO tree_2 VALUES("35","SSC000062","SSC000004","0");
INSERT INTO tree_2 VALUES("36","SSC000063","SSC000004","0");
INSERT INTO tree_2 VALUES("37","SSC000064","SSC000004","0");
INSERT INTO tree_2 VALUES("38","SSC000065","SSC000004","0");
INSERT INTO tree_2 VALUES("39","SSC000066","SSC000004","0");
INSERT INTO tree_2 VALUES("40","SSC000067","SSC000004","0");
INSERT INTO tree_2 VALUES("41","SSC000068","SSC000004","0");
INSERT INTO tree_2 VALUES("42","SSC000069","SSC000005","0");
INSERT INTO tree_2 VALUES("43","SSC000073","SSC000005","0");
INSERT INTO tree_2 VALUES("44","SSC000081","SSC000005","0");
INSERT INTO tree_2 VALUES("45","SSC000082","SSC000005","0");
INSERT INTO tree_2 VALUES("46","SSC000083","SSC000005","0");
INSERT INTO tree_2 VALUES("47","SSC000084","SSC000005","0");
INSERT INTO tree_2 VALUES("48","SSC000085","SSC000005","0");
INSERT INTO tree_2 VALUES("49","SSC000087","SSC000005","0");
INSERT INTO tree_2 VALUES("50","SSC000088","SSC000005","0");
INSERT INTO tree_2 VALUES("51","SSC000090","SSC000005","0");
INSERT INTO tree_2 VALUES("52","SSC000098","SSC000006","0");
INSERT INTO tree_2 VALUES("53","SSC000099","SSC000006","0");
INSERT INTO tree_2 VALUES("54","SSC000100","SSC000006","0");
INSERT INTO tree_2 VALUES("55","SSC000101","SSC000006","0");
INSERT INTO tree_2 VALUES("56","SSC000106","SSC000006","0");
INSERT INTO tree_2 VALUES("57","SSC000110","SSC000006","0");
INSERT INTO tree_2 VALUES("58","SSC000115","SSC000006","0");
INSERT INTO tree_2 VALUES("59","SSC000119","SSC000006","0");
INSERT INTO tree_2 VALUES("60","SSC000123","SSC000006","0");
INSERT INTO tree_2 VALUES("61","SSC000126","SSC000006","0");
INSERT INTO tree_2 VALUES("62","SSC000129","SSC000007","0");
INSERT INTO tree_2 VALUES("63","SSC000134","SSC000007","0");
INSERT INTO tree_2 VALUES("64","SSC000136","SSC000007","0");
INSERT INTO tree_2 VALUES("65","SSC000140","SSC000007","0");
INSERT INTO tree_2 VALUES("66","SSC000143","SSC000007","0");
INSERT INTO tree_2 VALUES("67","SSC000148","SSC000007","0");

