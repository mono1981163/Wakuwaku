/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - wakuwaku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wakuwaku` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `wakuwaku`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `admin_id` varchar(10) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `grade` int(5) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admins` */

insert  into `admins`(`admin_id`,`password`,`grade`) values 
('test2021','827ccb0eea8a706c4c34a16891f84e7b',NULL);

/*Table structure for table `gachas` */

DROP TABLE IF EXISTS `gachas`;

CREATE TABLE `gachas` (
  `gacha_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `shipping_fee` varchar(100) DEFAULT NULL,
  `estimated_delivery_time` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT '近日発売',
  `vogue_status` tinyint(1) DEFAULT 0,
  `open_state` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`gacha_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `gachas` */

/*Table structure for table `gachas_cn` */

DROP TABLE IF EXISTS `gachas_cn`;

CREATE TABLE `gachas_cn` (
  `gacha_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `shipping_fee` varchar(100) DEFAULT NULL,
  `estimated_delivery_time` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT '近日発売',
  `vogue_status` tinyint(1) DEFAULT 0,
  `open_state` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`gacha_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `gachas_cn` */

/*Table structure for table `gained_item` */

DROP TABLE IF EXISTS `gained_item`;

CREATE TABLE `gained_item` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `gacha_id` int(255) DEFAULT NULL,
  `prize_name` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_img` varchar(255) DEFAULT NULL,
  `gained_count` int(255) DEFAULT 0,
  `play_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `gained_item` */

/*Table structure for table `prize` */

DROP TABLE IF EXISTS `prize`;

CREATE TABLE `prize` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `gacha_id` int(255) DEFAULT NULL,
  `prize_name` varchar(255) DEFAULT NULL,
  `item_list` varchar(255) DEFAULT NULL,
  `prize_img` varchar(255) DEFAULT NULL,
  `goods` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `prize` */

/*Table structure for table `prize_cn` */

DROP TABLE IF EXISTS `prize_cn`;

CREATE TABLE `prize_cn` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `gacha_id` int(255) DEFAULT NULL,
  `prize_name` varchar(255) DEFAULT NULL,
  `item_list` varchar(255) DEFAULT NULL,
  `prize_img` varchar(255) DEFAULT NULL,
  `goods` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `prize_cn` */

/*Table structure for table `purchase` */

DROP TABLE IF EXISTS `purchase`;

CREATE TABLE `purchase` (
  `purchase_id` int(255) NOT NULL AUTO_INCREMENT,
  `gacha_id` int(255) DEFAULT NULL,
  `customer_id` bigint(255) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_times` int(255) DEFAULT NULL,
  `delivery_state` varchar(255) DEFAULT '未発送',
  `method` varchar(255) DEFAULT NULL,
  `shipment_date` date DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `track_number` varchar(255) DEFAULT NULL,
  `manage_memo` varchar(255) DEFAULT NULL,
  `remainder` int(20) DEFAULT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `purchase` */

/*Table structure for table `topimages` */

DROP TABLE IF EXISTS `topimages`;

CREATE TABLE `topimages` (
  `image_id` int(255) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `image_sp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `topimages` */

insert  into `topimages`(`image_id`,`image`,`image_sp`) values 
(1,'1.png','1_sp.png'),
(2,'2.png','2_sp.png'),
(3,'3.png','3_sp.png');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `surname1` varchar(255) DEFAULT NULL,
  `name1` varchar(255) DEFAULT NULL,
  `surname2` varchar(255) DEFAULT NULL,
  `name2` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `prefecture` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `roomno` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mail_magazine` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `is_email_verified` varchar(255) DEFAULT 'no',
  `verification_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`user_id`,`surname1`,`name1`,`surname2`,`name2`,`country`,`zip_code`,`prefecture`,`city`,`roomno`,`phone`,`email`,`password`,`mail_magazine`,`created_at`,`update_at`,`is_email_verified`,`verification_key`) values 
(1,'a774a03f5e147a56a9360c0a438a02933fb86da83b75764eb8827554b67ff522df56157c173b00b668cb45de8f52a99201c0882ca35b78371a4b9d5e96c1c2f8nUH/SU4dw9IaGPwG+5wI249hZMevPKz/9YtHmguaTHs=','f8f803a518f7cc0410011bed591dac480e5c65db6e4871f10bfbce3155c8439e603daab77aeb2e0335543ddec976dea8bf58c818567774e16ce4da4909614b65lIvHq6oF6UtfvrIV20Akyy9lT20S8V+ghy/dA3zG2MQ=','e369b78a76b299c80f0b9c84769e3d399ee782f569e69af74750bb64f4beef78251d3f3ad4d9b1fff8330fe0dc4b7337320eb01c72f475b94428a423d021d171UrJGk5n1K2HYFb4uO3SwJozV1DPQsFDj4uGX+sjh6ls=','51495db3c566622b4fd686781a357348658ee2f974b0982a22cb709290252673d4b9d932b72426ad649f71cc6d57ff18f1d3f2c4aad2550d4595b329d09d7c98fFK9rtuKVRtPj0yCv5mbEHIR+BRC90U1KBvbxSfbKwA=','3210c63736994afc822440ba7290bf188994827aa285413c5c444fd82a701a78c7a7334e27d85cc9537538cbfb102ab26499b440fd9535584f500828ded52de6LepLxwBzIBQ2dRX0MtQUndIMw7aNs70E2HoKOypPnkY=','f6f395d01dfbe064374219dbb7f5081dc85a776b0ccd2025307a0fa29ec45fbc27e1b2b2ffe426190abb34257f45852922ccb50ccab7ac44bad6e513305fbf23hZY7Y/PBQzQxLo4nRDCkC+k15v+OsK6gwTbQP5CJcdU=','182ab00cfa3a6be0ce4f134b75ad5ba7d30b8cdd27f133816a6f88e02f55d841206bf963c83101ba56f34a6f9d5c483d72441bdbd2b09122b8ea38ca892c3fb5JMJeyz48jS3eO/Pg7/cenu7HtfJNQ0HRP9UZPWz+eQg=','04cdd666f20d412e2525ed3cd3554461732e6af599b41df4a8e2f161b7de96f25f912d404ed7029d845c67a1b34c66aaf8bc1f4b21c7373a92a0652ed53ca494pKtH1e/DAmioRdIzIeMrT2mvTYZ+cmUnashTTNc4DZqCh7xNmQpDWYdWxEEXle9m','f7c39f4cd6f548a368526a883b18798fda9b13ca12a66acebe5b74a6a114d133007b6918d56be5ad37aa77cc1ccb1a78cc074bf79589dfa43da0dce6e4597c2fzNUqiv2n2dYLuEWRft7QVGuNULav69XA8W49OD61r+hyS2SFGAJrqYJA6bExe+NvbAxTj2SWCh3fFRX3cv0o4w==','ae8831a56871610c4d18980fc2a85c685f281d338f644cb4c2ecd1d91e98b777116bf21f344967b1d8110b0fef99d92004876fbd4a9a2c3b879c646caa6364f8w4QsT6GvKcrN/oI9H3yOYMNcrtXyMfn5T8K9+sAUMcg=','test@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,'2021-03-28','2021-04-28','yes','02e226a68a402adaa9171923f12c850e');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
