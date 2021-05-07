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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `gachas` */

insert  into `gachas`(`gacha_id`,`name`,`start_date`,`end_date`,`price`,`shipping_fee`,`estimated_delivery_time`,`remarks`,`image`,`status`,`vogue_status`,`open_state`) values 
(1,'ラジ天×ウェブポン','2021-05-01','2021-05-25',550,'50','3','','2bvezTbtPXLMgUDOMJsCoc6uOvzNxSXK.png','近日発売',0,0),
(2,'舞鶴よかと第2弾','2021-05-01','2021-05-25',550,'50','3','','b7Y7rsIi0YnXQeob5kr5Z7b9nWocQorA.png','近日発売',0,0),
(3,'冷水ぬるめ×ウェブポン','2021-05-01','2021-05-25',550,'50','3','','GgcT5jz5JrAXmpTabqLNapcUHsOwAles.png','近日発売',0,0),
(4,'天開司 第2弾','2021-05-01','2021-05-25',550,'50','3','','mOjD8Gvt3yd1JNjDOFzKNLOjxzus1tdf.png','近日発売',0,0),
(5,'尾塚ロキ×ウェブポン','2021-05-01','2021-05-25',550,'50','3','','4kbuU3kYIRDvgIhJg4aPDUGWzLI2voDj.png','近日発売',0,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `gachas_cn` */

insert  into `gachas_cn`(`gacha_id`,`name`,`start_date`,`end_date`,`price`,`shipping_fee`,`estimated_delivery_time`,`remarks`,`image`,`status`,`vogue_status`,`open_state`) values 
(1,'拉吉顿x Webpon','2021-05-01','2021-05-25',1000,'100','5','','2bvezTbtPXLMgUDOMJsCoc6uOvzNxSXK.png','近日発売',0,0),
(2,'舞鹤Yokato 2nd','2021-05-01','2021-05-25',1000,'100','4','','b7Y7rsIi0YnXQeob5kr5Z7b9nWocQorA.png','近日発売',0,0),
(3,'冷水温水x Webpon','2021-05-01','2021-05-25',1000,'100','5','','GgcT5jz5JrAXmpTabqLNapcUHsOwAles.png','近日発売',0,0),
(4,'天海寺第二','2021-05-01','2021-05-25',1000,'100','5','','mOjD8Gvt3yd1JNjDOFzKNLOjxzus1tdf.png','近日発売',0,0),
(5,'Loki Otsuka x Webpon','2021-05-01','2021-05-25',1000,'100','6','','4kbuU3kYIRDvgIhJg4aPDUGWzLI2voDj.png','近日発売',0,0);

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
  `item_list` varchar(1024) DEFAULT NULL,
  `prize_img` varchar(255) DEFAULT NULL,
  `goods` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `prize` */

insert  into `prize`(`id`,`gacha_id`,`prize_name`,`item_list`,`prize_img`,`goods`) values 
(1,2,'激レア賞','(激レア賞,超级稀有奖,アクリルプレート,亚克力板,6yFmkvATNSMfwvWbA6UpFR9bRGaUvvtZ.png)(激レア賞,超级稀有奖,ITEM A,ITEM A,mrfY7AsGeBzrcfe3id7bsa3wDjRvIuRk.png)(激レア賞,超级稀有奖,ITEM B,ITEM B,WTc7UI0Ui8TAajhP7omatru0mj6jxhSz.png)','pddTtw3uYsf4ZNhkeX06sqdGI2GX4QyR.png','あなたへのボイスメッセージ'),
(2,2,'レア賞','(レア賞,稀有奖,ITEM A,ITEM A,wyWvUn9US0qUdhdHGlIxvHp0fmDJvQCS.png)(レア賞,稀有奖,ITEM B,ITEM B,M9MClze15qJFiNErhjLRLoKp3mc4a22t.png)(レア賞,稀有奖,ITEM C,ITEM C,Fn2Py7g1iwZehz8E3ZhBKWseGCBm8U3Z.png)','G1kyKA7ykDJ0xdRvhtXN7n1S8Bt0jPvs.png','アクリルキーホルダー'),
(3,2,'A賞','(A賞,A奖,ITEM A,ITEM A,kIVdyTrZdG9eJMj4Y8DFEvPK2HS3PP4u.png)(A賞,A奖,ITEM B,ITEM B,Fqr2tdf4Jjhr70igCRJ1UiNhf3PHDjnb.png)(A賞,A奖,ITEM C,ITEM C,4qtIbDq0iw4mPeoGE4UXAnctWaFCNzXc.png)','S81DLc1DWcHWdsfBlqN4SxFr3EIbkn1A.png','アクリルプレート'),
(4,2,'B賞','(B賞,B奖,ITEM A,ITEM A,c732pk0hmFfhGUEI8pdcj3lKUQGCpnLH.png)(B賞,B奖,ITEM B,ITEM B,GiC3hNl0ctAMWuyKCdadsfo9vL0Jhr9y.png)(B賞,B奖,ITEM C,ITEM C,JQPPflBO6HFAsyCNOi24raAKOhNulJq7.png)','VS1tyYRe7iwrLHiv9WkM3rjQPDz5freY.png','直筆サイン入りブロマイド'),
(5,1,'激レア賞','(激レア賞,超级稀有奖,アクリルプレート,亚克力板,wZjExhDHY0rDvisiSRGrhbdBhBJEcQQe.png)(激レア賞,超级稀有奖,ITEM A,ITEM A,EkAcQ6nz7EARTs7qkxHNYJUWOPlWDPyT.png)(激レア賞,超级稀有奖,ITEM B,ITEM B,aN0jVIdM36BbIqsGbzyXgaEDxNBO1uVg.png)','dWbtMcCL0K5eIOikVH841j7UAkb8dPb5.png','あなたへのボイスメッセージ'),
(6,1,'レア賞','(レア賞,稀有奖,ITEM A,ITEM A,BT52QQjOV0YLnsiliOb1VonD69yakICD.png)(レア賞,稀有奖,ITEM B,ITEM B,cVAcmz0MrUFXw3Swg267DshWzTj4pyyb.png)(レア賞,稀有奖,ITEM C,ITEM C,oRXsFCSxYlrXqkGUu3MFOL5J5HWulhCC.png)','qbJPulfslHUW4MO8byzgdP2q7grfCbam.png','BIGクッション'),
(7,1,'D賞','(D賞,D奖,ITEM D,ITEM D,t9twtcAAqTBed5PwLf4rQky9rlO6yOxp.png)','xd3K5fZXJIaQMFBj7ZYLKO92SBl2dZDM.png','スクエア缶バッジ'),
(8,3,'激レア賞','(激レア賞,超级稀有奖,アクリルプレート,亚克力板,pT4e4sIDAQ7Jouq7kztg6ayq6Z8nvQ6h.png)(激レア賞,超级稀有奖,ITEM A,ITEM A,kc0zRAl2yE1qdBhSit4gQ5o3HVN2B8bM.png)(激レア賞,超级稀有奖,ITEM B,ITEM B,3neGPXnnCyuriQpdhaNCdU1Jy0udbh9o.png)','qo3IMNXvoaNqi9q7mRsiamRzjc3BYXTF.png','あなたへのボイスメッセージ'),
(9,3,'レア賞','(レア賞,稀有奖,ITEM B,ITEM B,jLHan4ne3q5WqegyuTO83OvqKuZ0ERch.png)(レア賞,稀有奖,ITEM C,ITEM C,bK2RXOMePq7vai9dB0lgBgpSPzWUP0zB.png)(レア賞,稀有奖,ITEM C,ITEM C,H4LFH5dM56zNGlw8MfaopVauTFvje4mO.png)','HjkyW49ZlEK6b47zOjTcKi6F3JZt05EV.png','BIGクッション'),
(10,3,'D賞','(D賞,D奖,ITEM D,ITEM D,xf9U8TAeR1YOF4oh3mIPeGiYC6hI81gh.png)(D賞,D奖,ITEM B,ITEM B,LBiyZfgmfoUgnV0gkKds8ASZEWlrgoGx.png)','2Obf6RtaAXXFFAgYt0NtBVEJeQnAjUkY.png','スクエア缶バッジ'),
(11,5,'激レア賞','(激レア賞,超级稀有奖,アクリルプレート,亚克力板,tEJSY2uB13yh5C94OofZMxBRsHL3uBkS.png)(激レア賞,超级稀有奖,ITEM A,ITEM A,9Y3qPa1RTY1k9C1gbSCUG8kltjoQ5tt9.png)(激レア賞,超级稀有奖,ITEM B,ITEM B,e9xfLBnkHAA8nvMrBV6PzjDhyELNNqMT.png)','eGFBGs0nrSunHMoFhsXfiYeHHfwJlZFL.png','あなたへのボイスメッセージ'),
(12,5,'A賞','(A賞,A奖,ITEM A,ITEM A,sMvY9OvP72aahre4sWdc93ztVAYuwbho.png)(A賞,A奖,ITEM B,ITEM B,2CjaEDsuCkupjWg4aP5ZDwL71fHHszx8.png)(A賞,A奖,ITEM C,ITEM C,rHn6rPKFgn0hPPCrb55Q9u3zYtjboVBU.png)','G9iNC6lY2lGR083edf2Rz53AMw3C6z8x.png','アクリルプレート'),
(13,5,'B賞','(B賞,B奖,ITEM A,ITEM A,27YAjTUSTgrvelgjVQ1UPRm80M9MGVw7.png)(B賞,B奖,ITEM B,ITEM B,Yudgh80IXP5bwJ7yWA9hJMtZvs0OyUMz.png)(B賞,B奖,ITEM C,ITEM C,zGNHTxDfjRctJKxisKMUvHlf9r6aeDKH.png)','TLCr9yHyect8Y9FwqbVcfaZnYMog9zg8.png','直筆サイン入りブロマイド'),
(14,5,'D賞','(D賞,D奖,ITEM D,ITEM D,Fp9CX8cQnz9pVRK9w7xkpqaKrLH6NDUu.png)','1jtCK1gQUWvbQqzLoaAwkJV6hDqgoKlI.png','スクエア缶バッジ'),
(15,4,'レア賞','(レア賞,稀有奖,ITEM A,ITEM A,wBH1aJaSEgYA94L7UFw6XrTP53QiZpyV.png)(レア賞,稀有奖,ITEM B,ITEM B,1e960Y0R5FRBHFqzfKBrD19P6FItkIFg.png)(レア賞,稀有奖,ITEM C,ITEM C,9lvPXxbMWHT9xwEe1IaLvXJN7fERTvDt.png)(レア賞,稀有奖,ITEM D,ITEM D,taHAnMd7TmA8MGJoGXm9YUT309JosbYQ.png)(レア賞,稀有奖,ITEM E,ITEM E,UDCRiGwlgs0NWENOfcyi9mF15KhadKBp.png)','CBq6aUiqL47pYhPRTXPGmGHgfnLG3YKR.png','直筆サイン入りブロマイド'),
(16,4,'E賞','(E賞,E奖,ITEM A,ITEM A,9XvrMhcv8M6wHkbBd9YKUnqeUV6tBA2j.png)(E賞,E奖,ITEM B,ITEM B,16wBJXZpbPRs5ktw00USKN8qYgpyMJQa.png)(E賞,E奖,ITEM C,ITEM C,9RN6bkJ3b2sWmhve4hq9qEs8tayVJmMr.png)(E賞,E奖,ITEM D,ITEM D,7dBnVSjTaNdrXLMls0AeEleuAo9bhdKw.png)(E賞,E奖,ITEM E,ITEM E,RBZ3IaeaMREvw6c3pTkStiJ5aDfZWCc3.png)(E賞,E奖,ITEM F,ITEM F,lG5js5GYsODvmq1AP4CrBMQ0MON00DFz.png)','CpvLRFPn98FjlAQt9AcrSgJvrEL99EBK.png','缶バッジ');

/*Table structure for table `prize_cn` */

DROP TABLE IF EXISTS `prize_cn`;

CREATE TABLE `prize_cn` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `gacha_id` int(255) DEFAULT NULL,
  `prize_name` varchar(255) DEFAULT NULL,
  `item_list` varchar(1024) DEFAULT NULL,
  `prize_img` varchar(255) DEFAULT NULL,
  `goods` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `prize_cn` */

insert  into `prize_cn`(`id`,`gacha_id`,`prize_name`,`item_list`,`prize_img`,`goods`) values 
(1,2,'超级稀有奖','(激レア賞,超级稀有奖,アクリルプレート,亚克力板,6yFmkvATNSMfwvWbA6UpFR9bRGaUvvtZ.png)(激レア賞,超级稀有奖,ITEM A,ITEM A,mrfY7AsGeBzrcfe3id7bsa3wDjRvIuRk.png)(激レア賞,超级稀有奖,ITEM B,ITEM B,WTc7UI0Ui8TAajhP7omatru0mj6jxhSz.png)','pddTtw3uYsf4ZNhkeX06sqdGI2GX4QyR.png','语音留言给您'),
(2,2,'稀有奖','(レア賞,稀有奖,ITEM A,ITEM A,wyWvUn9US0qUdhdHGlIxvHp0fmDJvQCS.png)(レア賞,稀有奖,ITEM B,ITEM B,M9MClze15qJFiNErhjLRLoKp3mc4a22t.png)(レア賞,稀有奖,ITEM C,ITEM C,Fn2Py7g1iwZehz8E3ZhBKWseGCBm8U3Z.png)','G1kyKA7ykDJ0xdRvhtXN7n1S8Bt0jPvs.png','亚克力钥匙扣'),
(3,2,'A奖','(A賞,A奖,ITEM A,ITEM A,kIVdyTrZdG9eJMj4Y8DFEvPK2HS3PP4u.png)(A賞,A奖,ITEM B,ITEM B,Fqr2tdf4Jjhr70igCRJ1UiNhf3PHDjnb.png)(A賞,A奖,ITEM C,ITEM C,4qtIbDq0iw4mPeoGE4UXAnctWaFCNzXc.png)','S81DLc1DWcHWdsfBlqN4SxFr3EIbkn1A.png','亚克力板'),
(4,2,'B奖','(B賞,B奖,ITEM A,ITEM A,c732pk0hmFfhGUEI8pdcj3lKUQGCpnLH.png)(B賞,B奖,ITEM B,ITEM B,GiC3hNl0ctAMWuyKCdadsfo9vL0Jhr9y.png)(B賞,B奖,ITEM C,ITEM C,JQPPflBO6HFAsyCNOi24raAKOhNulJq7.png)','VS1tyYRe7iwrLHiv9WkM3rjQPDz5freY.png','亲笔签名的溴化物'),
(5,1,'超级稀有奖','(激レア賞,超级稀有奖,アクリルプレート,亚克力板,6yFmkvATNSMfwvWbA6UpFR9bRGaUvvtZ.png)(激レア賞,超级稀有奖,ITEM A,ITEM A,mrfY7AsGeBzrcfe3id7bsa3wDjRvIuRk.png)(激レア賞,超级稀有奖,ITEM B,ITEM B,WTc7UI0Ui8TAajhP7omatru0mj6jxhSz.png)','dWbtMcCL0K5eIOikVH841j7UAkb8dPb5.png','给您的语音留言'),
(6,1,'稀有奖','(レア賞,稀有奖,ITEM A,ITEM A,wyWvUn9US0qUdhdHGlIxvHp0fmDJvQCS.png)(レア賞,稀有奖,ITEM B,ITEM B,M9MClze15qJFiNErhjLRLoKp3mc4a22t.png)(レア賞,稀有奖,ITEM C,ITEM C,Fn2Py7g1iwZehz8E3ZhBKWseGCBm8U3Z.png)','qbJPulfslHUW4MO8byzgdP2q7grfCbam.png','大垫子'),
(7,1,'D奖','(D賞,D奖,ITEM D,ITEM D,LTvj5jNBYgRMlIgzRDgNWB6EUlfKPNdk.png)','xd3K5fZXJIaQMFBj7ZYLKO92SBl2dZDM.png','方形铁皮徽章'),
(8,3,'超级稀有奖','(激レア賞,超级稀有奖,アクリルプレート,亚克力板,6yFmkvATNSMfwvWbA6UpFR9bRGaUvvtZ.png)(激レア賞,超级稀有奖,ITEM A,ITEM A,mrfY7AsGeBzrcfe3id7bsa3wDjRvIuRk.png)(激レア賞,超级稀有奖,ITEM B,ITEM B,WTc7UI0Ui8TAajhP7omatru0mj6jxhSz.png)','qo3IMNXvoaNqi9q7mRsiamRzjc3BYXTF.png','给您的语音留言'),
(9,3,'稀有奖','(レア賞,稀有奖,ITEM B,ITEM B,M9MClze15qJFiNErhjLRLoKp3mc4a22t.png)(レア賞,稀有奖,ITEM C,ITEM C,Fn2Py7g1iwZehz8E3ZhBKWseGCBm8U3Z.png)(レア賞,稀有奖,ITEM C,ITEM C,H4LFH5dM56zNGlw8MfaopVauTFvje4mO.png)','HjkyW49ZlEK6b47zOjTcKi6F3JZt05EV.png','大垫子'),
(10,3,'D奖','(D賞,D奖,ITEM D,ITEM D,LTvj5jNBYgRMlIgzRDgNWB6EUlfKPNdk.png)(D賞,D奖,ITEM B,ITEM B,LBiyZfgmfoUgnV0gkKds8ASZEWlrgoGx.png)','2Obf6RtaAXXFFAgYt0NtBVEJeQnAjUkY.png','给您的语音留言'),
(11,5,'超级稀有奖','(激レア賞,超级稀有奖,アクリルプレート,亚克力板,6yFmkvATNSMfwvWbA6UpFR9bRGaUvvtZ.png)(激レア賞,超级稀有奖,ITEM A,ITEM A,mrfY7AsGeBzrcfe3id7bsa3wDjRvIuRk.png)(激レア賞,超级稀有奖,ITEM B,ITEM B,WTc7UI0Ui8TAajhP7omatru0mj6jxhSz.png)','eGFBGs0nrSunHMoFhsXfiYeHHfwJlZFL.png','语音留言给您'),
(12,5,'A奖','(A賞,A奖,ITEM A,ITEM A,kIVdyTrZdG9eJMj4Y8DFEvPK2HS3PP4u.png)(A賞,A奖,ITEM B,ITEM B,Fqr2tdf4Jjhr70igCRJ1UiNhf3PHDjnb.png)(A賞,A奖,ITEM C,ITEM C,4qtIbDq0iw4mPeoGE4UXAnctWaFCNzXc.png)','G9iNC6lY2lGR083edf2Rz53AMw3C6z8x.png','亚克力板'),
(13,5,'B奖','(B賞,B奖,ITEM A,ITEM A,c732pk0hmFfhGUEI8pdcj3lKUQGCpnLH.png)(B賞,B奖,ITEM B,ITEM B,GiC3hNl0ctAMWuyKCdadsfo9vL0Jhr9y.png)(B賞,B奖,ITEM C,ITEM C,JQPPflBO6HFAsyCNOi24raAKOhNulJq7.png)','TLCr9yHyect8Y9FwqbVcfaZnYMog9zg8.png','亲笔签名的溴化物'),
(14,5,'D奖','(D賞,D奖,ITEM D,ITEM D,LTvj5jNBYgRMlIgzRDgNWB6EUlfKPNdk.png)','1jtCK1gQUWvbQqzLoaAwkJV6hDqgoKlI.png','方形铁皮徽章'),
(15,4,'稀有奖','(レア賞,稀有奖,ITEM A,ITEM A,wBH1aJaSEgYA94L7UFw6XrTP53QiZpyV.png)(レア賞,稀有奖,ITEM B,ITEM B,1e960Y0R5FRBHFqzfKBrD19P6FItkIFg.png)(レア賞,稀有奖,ITEM C,ITEM C,9lvPXxbMWHT9xwEe1IaLvXJN7fERTvDt.png)(レア賞,稀有奖,ITEM D,ITEM D,taHAnMd7TmA8MGJoGXm9YUT309JosbYQ.png)(レア賞,稀有奖,ITEM E,ITEM E,UDCRiGwlgs0NWENOfcyi9mF15KhadKBp.png)','CBq6aUiqL47pYhPRTXPGmGHgfnLG3YKR.png','亲笔签名的溴化物'),
(16,4,'E奖','(E賞,E奖,ITEM A,ITEM A,9XvrMhcv8M6wHkbBd9YKUnqeUV6tBA2j.png)(E賞,E奖,ITEM B,ITEM B,16wBJXZpbPRs5ktw00USKN8qYgpyMJQa.png)(E賞,E奖,ITEM C,ITEM C,9RN6bkJ3b2sWmhve4hq9qEs8tayVJmMr.png)(E賞,E奖,ITEM D,ITEM D,7dBnVSjTaNdrXLMls0AeEleuAo9bhdKw.png)(E賞,E奖,ITEM E,ITEM E,RBZ3IaeaMREvw6c3pTkStiJ5aDfZWCc3.png)(E賞,E奖,ITEM F,ITEM F,lG5js5GYsODvmq1AP4CrBMQ0MON00DFz.png)','CpvLRFPn98FjlAQt9AcrSgJvrEL99EBK.png','纽扣徽章');

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
