-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for your_guide
CREATE DATABASE IF NOT EXISTS `your_guide` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `your_guide`;

-- Dumping structure for table your_guide.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comment` varchar(5000) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `title` varchar(2555) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `store` int NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table your_guide.comments: ~6 rows (approximately)
INSERT IGNORE INTO `comments` (`id`, `comment`, `fname`, `title`, `status`, `store`, `created`) VALUES
	(14, 'A                          ', 'A', 'A', 1, 38, '2025-01-29 14:19:05');
INSERT IGNORE INTO `comments` (`id`, `comment`, `fname`, `title`, `status`, `store`, `created`) VALUES
	(15, 'اترك تعليق\r\nسينما\r\n\r\nتمتع بالعروض مع بطاقات بنك الراجحي\r\n                          ', ' سينما  تمتع بالعروض مع بطاقات بنك الراجحي', ' سينما  تمتع بالعروض مع بطاقات بنك الراجحي', 0, 39, '2025-01-29 14:42:27');
INSERT IGNORE INTO `comments` (`id`, `comment`, `fname`, `title`, `status`, `store`, `created`) VALUES
	(16, 'اترك تعليقAAAAAAAAAAAAAAAAAAAAA\r\n                          ', 'AAAAAA', 'AAAAAAA', 0, 39, '2025-01-29 14:42:48');
INSERT IGNORE INTO `comments` (`id`, `comment`, `fname`, `title`, `status`, `store`, `created`) VALUES
	(17, 'AAA\r\n                          ', 'AA', 'AA', 0, 39, '2025-02-01 10:03:39');
INSERT IGNORE INTO `comments` (`id`, `comment`, `fname`, `title`, `status`, `store`, `created`) VALUES
	(18, 'اترك تعليق\r\n                          ', 'اماممم', 'رساله تجربه', 1, 39, '2025-02-01 22:55:04');

-- Dumping structure for table your_guide.consultation
CREATE TABLE IF NOT EXISTS `consultation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `whats` varchar(255) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table your_guide.consultation: ~5 rows (approximately)
INSERT IGNORE INTO `consultation` (`id`, `fname`, `title`, `email`, `content`, `whats`, `created`) VALUES
	(26, 'aaa', '', 'aaa', 'contact me', '123', '2024-12-28');
INSERT IGNORE INTO `consultation` (`id`, `fname`, `title`, `email`, `content`, `whats`, `created`) VALUES
	(27, 'aaa', '', 'haifa.att02@gmail.com', 'contact me', '123', '2024-12-28');
INSERT IGNORE INTO `consultation` (`id`, `fname`, `title`, `email`, `content`, `whats`, `created`) VALUES
	(28, 'aaa', '', 'haifa.att02@gmail.com', 'contact me', '123', '2024-12-28');
INSERT IGNORE INTO `consultation` (`id`, `fname`, `title`, `email`, `content`, `whats`, `created`) VALUES
	(29, 'AAA', NULL, 'AA@AA.AA', 'AAAA', '12345', '2025-01-29');
INSERT IGNORE INTO `consultation` (`id`, `fname`, `title`, `email`, `content`, `whats`, `created`) VALUES
	(31, 'aaa', NULL, 'aa@aa,com', 'تفاصيل الرساله', '1231221', '2025-02-02');
INSERT IGNORE INTO `consultation` (`id`, `fname`, `title`, `email`, `content`, `whats`, `created`) VALUES
	(32, 'adham', NULL, 'adham@gmail.com', 'hLLLLL', '0100000000', '2025-03-09');

-- Dumping structure for table your_guide.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL DEFAULT '0',
  `fname` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table your_guide.notifications: ~11 rows (approximately)
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(18, 1, 'haifa', 'اترك تعليق\r\n                          good service', 0, '2024-12-28 13:37:52');
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(19, 0, 'aaa', 'contact me', 0, '2024-12-28 13:38:42');
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(20, 0, 'aaa', 'contact me', 0, '2024-12-28 13:39:36');
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(21, 0, 'aaa', 'contact me', 0, '2024-12-28 13:39:38');
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(22, 0, 'AAA', 'AAAA', 0, '2025-01-29 13:35:14');
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(23, 1, 'A', 'A                          ', 0, '2025-01-29 14:19:05');
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(24, 1, ' سينما  تمتع بالعروض مع بطاقات بنك الراجحي', 'اترك تعليق\r\nسينما\r\n\r\nتمتع بالعروض مع بطاقات بنك الراجحي\r\n                          ', 0, '2025-01-29 14:42:27');
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(25, 1, 'AAAAAA', 'اترك تعليقAAAAAAAAAAAAAAAAAAAAA\r\n                          ', 0, '2025-01-29 14:42:48');
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(26, 1, 'AA', 'AAA\r\n                          ', 0, '2025-02-01 10:03:39');
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(27, 1, 'اماممم', 'اترك تعليق\r\n                          ', 0, '2025-02-01 22:55:04');
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(28, 0, 'aaa', 'تفاصيل الرساله', 0, '2025-02-02 01:43:14');
INSERT IGNORE INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
	(29, 0, 'adham', 'hLLLLL', 0, '2025-03-09 22:16:48');

-- Dumping structure for table your_guide.offers
CREATE TABLE IF NOT EXISTS `offers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `descr` longtext NOT NULL,
  `discount` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `userid` int NOT NULL,
  `url` varchar(255) NOT NULL,
  `map` varchar(2555) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table your_guide.offers: ~8 rows (approximately)
INSERT IGNORE INTO `offers` (`id`, `title`, `descr`, `discount`, `image`, `userid`, `url`, `map`, `created`) VALUES
	(4, 'بولينج', 'خصم 50% كل يوم ثلاثاء', '50', '44326_بولينج.jpeg', 37, '', 'https://maps.app.goo.gl/mfSjDrTg5jfA1AHf6?g_st=com.google.maps.preview.copy', '2024-12-28 13:05:15');
INSERT IGNORE INTO `offers` (`id`, `title`, `descr`, `discount`, `image`, `userid`, `url`, `map`, `created`) VALUES
	(5, 'سينما', 'تمتع بالعروض مع بطاقات بنك الراجحي', '70', '72539_vox.png', 37, '', 'https://maps.app.goo.gl/e2qcAcPeWFPrMogG8?g_st=com.google.maps.preview.copy', '2024-12-28 13:07:56');
INSERT IGNORE INTO `offers` (`id`, `title`, `descr`, `discount`, `image`, `userid`, `url`, `map`, `created`) VALUES
	(7, 'Virgin Megastore', 'Exclusive in-store deal: Buy one pair of wireless earbuds, get a free charging cable!', '', '2757_virgin.png', 38, '', '', '2024-12-28 13:16:53');
INSERT IGNORE INTO `offers` (`id`, `title`, `descr`, `discount`, `image`, `userid`, `url`, `map`, `created`) VALUES
	(8, 'zara', 'خصم نهاية العام بنسبة 40 %', '40', '52836_zara.png', 38, 'https://www.zara.com', '', '2025-01-15 23:45:57');
INSERT IGNORE INTO `offers` (`id`, `title`, `descr`, `discount`, `image`, `userid`, `url`, `map`, `created`) VALUES
	(11, ' سينما  تمتع بالعروض مع بطاقات بنك الراجحي', '\r\nسينما\r\n\r\nتمتع بالعروض مع بطاقات بنك الراجحي', ' سينما  تمتع بالعروض مع بطاقات بنك الراجحي', '56593_13459_48116_cinma.jpeg', 39, ' سينما  تمتع بالعروض مع بطاقات بنك الراجحي', ' سينما  تمتع بالعروض مع بطاقات بنك الراجحي', '2025-01-29 14:42:11');
INSERT IGNORE INTO `offers` (`id`, `title`, `descr`, `discount`, `image`, `userid`, `url`, `map`, `created`) VALUES
	(12, 'linkksksskskk', 'linkksksskskk', 'linkksksskskk', '23162_3075_b5.png', 39, 'linkksksskskk', 'https://www.google.com/maps/@31.018275,31.4048897,14z?entry=ttu&g_ep=EgoyMDI1MDEyNi4wIKXMDSoASAFQAw%3D%3D', '2025-01-29 14:43:46');
INSERT IGNORE INTO `offers` (`id`, `title`, `descr`, `discount`, `image`, `userid`, `url`, `map`, `created`) VALUES
	(13, 'عرض السينما', 'عرض السينما الافضل علي الاطلاق', '20', '27987_9229_rpActivi.jpeg', 40, '', '', '2025-02-01 10:01:21');
INSERT IGNORE INTO `offers` (`id`, `title`, `descr`, `discount`, `image`, `userid`, `url`, `map`, `created`) VALUES
	(14, 'Offer 1', 'descritption', '20', '2882_2757_virgin.png', 40, 'link', 'linek', '2025-02-01 23:01:11');

-- Dumping structure for table your_guide.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `aboutus` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `aboutus_img` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `favicon` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `h_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `h_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `h_paragraph` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_estonian_ci NOT NULL,
  `h_image2` varchar(255) NOT NULL,
  `h_image3` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `privacy` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `h_image4` varchar(255) NOT NULL,
  `terms` longtext NOT NULL,
  `sname` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table your_guide.pages: ~0 rows (approximately)
INSERT IGNORE INTO `pages` (`id`, `aboutus`, `aboutus_img`, `logo`, `favicon`, `h_image`, `h_title`, `h_paragraph`, `h_image2`, `h_image3`, `phone`, `email`, `privacy`, `h_image4`, `terms`, `sname`, `os`) VALUES
	(1, 'من نحن\r\n\r\nمرحبًا بكم في YourGuide – حيث نعيد تعريف تجربة التسوق الخاصة بك!\r\n\r\nفي YourGuide، نلتزم بتحسين تجربتكم داخل المراكز التجارية باستخدام تقنية البلوتوث منخفض الطاقة (BLE) المبتكرة. من خلال حلول ذكية وآنية، نقدم إشعارات مخصصة، وعروضًا حصرية، وتوجيهًا سلسًا إلى المتاجر بناءً على موقعكم داخل المركز التجاري.\r\n\r\nمنصتنا تربط بين المتسوقين وتجار التجزئة، مما يوفر رحلة تسوق أكثر تفاعلًا وفعالية ومتعة. سواء كنت تبحث عن أحدث العروض، أو تحاول العثور على متاجرك المفضلة، أو تحتاج إلى الوصول إلى الخدمات الأساسية داخل المركز التجاري، فإن YourGuide هنا لضمان حصولك على أقصى استفادة من كل زيارة.\r\n\r\nانضم إلينا في إعادة تشكيل مستقبل التسوق، حيث يلتقي الابتكار بالراحة.\r\n\r\nYourGuide – رفيقك الذكي في التسوق.', '15766_2.gif', '13246_5870ce50-68c6-40b4-bb18-486f00e31ed9-removebg-preview(1).png', '65341_5870ce50-68c6-40b4-bb18-486f00e31ed9-removebg-preview(1).png', '85550_map-first.png', 'welcome', '', '3075_b5.png', '24282_39222_64155_pexels-photo-4724487.jpeg', '+966555885303', ' support@yourguide.com', 'في YourGuide، نحن ملتزمون بحماية خصوصيتك مع تحسين تجربتك داخل المراكز التجارية. نقوم بجمع معلومات محدودة، مثل بيانات الموقع عبر تقنية البلوتوث منخفض الطاقة (BLE)، وتفاصيل الجهاز، وتفضيلات التفاعل، لتقديم إشعارات فورية، وعروض مخصصة، وتوجيه دقيق للمتاجر، وإتاحة الوصول إلى خدمات المركز التجاري. يتم الحفاظ على أمان معلوماتك باستخدام تقنيات تشفير متقدمة، ولا نقوم ببيع بياناتك أو مشاركتها مع أطراف ثالثة لأغراض تسويقية.\r\n\r\nلديك تحكم كامل في إعدادات الخصوصية الخاصة بك، بما في ذلك تمكين أو تعطيل خدمات الموقع والإشعارات. لأي استفسار حول خصوصيتك أو لطلب الوصول إلى بياناتك أو حذفها، يُرجى التواصل معنا عبر البريد الإلكتروني: support@yourguide.com.', '48116_cinma.jpeg', '<p>Because the acceleration of development has become a feature of this modern era, so companies and institutions must simulate this development in various ways and methods, especially in everything related to management, production, marketing and selling, as well as after-sales and follow-up services... We at Horizon have harnessed all capabilities for you to cover what you need of modern technologies, as we provide you with all the needs of companies and institutions technically, accounting and technically through our advanced cloud systems, to contribute to saving time and effort and reducing costs, and with this integration we are distinguished from other competitors. We at "Horizon" are a passionate, enthusiastic and specialized team. We set out in the world of different businesses in many fields, in order to become success partners and companions on the path</p>\r\n', 'Your Guide', '<br />\r\n<b>Warning</b>:  Undefined array key "os" in <b>C:\\xampp\\htdocs\\moul\\admin\\pages2.php</b> on line <b>75</b><br />\r\nc');

-- Dumping structure for table your_guide.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `content` longtext NOT NULL,
  `content_en` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `image` varchar(255) NOT NULL,
  `visibility` int NOT NULL DEFAULT '0',
  `userid` int NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table your_guide.posts: ~1 rows (approximately)
INSERT IGNORE INTO `posts` (`id`, `title`, `title_en`, `content`, `content_en`, `image`, `visibility`, `userid`, `created`) VALUES
	(27, 'استمتعوا بأجواء فريدة تجمع بين التسوق والترفيه في مكان واحد! نقدم لكم:', '', ' منطقة ترفيهية مميزة للأطفال والكبار للاستمتاع بأوقات لا تُنسى.\r\n\r\nعروض خاصة وخصومات مدهشة طوال الأسبوع.', '', '9229_rpActivi.jpeg', 1, 5, '2024-12-28');

-- Dumping structure for table your_guide.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `image` varchar(5000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gender` int NOT NULL DEFAULT '1',
  `type` int NOT NULL DEFAULT '0',
  `storename` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `joined` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Dumping data for table your_guide.users: ~9 rows (approximately)
INSERT IGNORE INTO `users` (`id`, `username`, `image`, `password`, `fname`, `email`, `phone`, `gender`, `type`, `storename`, `joined`) VALUES
	(5, 'admin', '63660_72539_vox.png', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'yourGuide@gmail.com', '0512345678', 1, 2, '', '2021-02-28');
INSERT IGNORE INTO `users` (`id`, `username`, `image`, `password`, `fname`, `email`, `phone`, `gender`, `type`, `storename`, `joined`) VALUES
	(37, '', '21946_72539_vox.png', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 'activities', '', 1, 0, '', '2024-12-28');
INSERT IGNORE INTO `users` (`id`, `username`, `image`, `password`, `fname`, `email`, `phone`, `gender`, `type`, `storename`, `joined`) VALUES
	(38, '', '41991_72539_vox.png', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 'stores', '', 1, 0, '', '2024-12-28');
INSERT IGNORE INTO `users` (`id`, `username`, `image`, `password`, `fname`, `email`, `phone`, `gender`, `type`, `storename`, `joined`) VALUES
	(39, 'AA', '55278_72539_vox.png', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'AA', 'a@a.a', '12345', 1, 0, 'AA', '2025-01-29');
INSERT IGNORE INTO `users` (`id`, `username`, `image`, `password`, `fname`, `email`, `phone`, `gender`, `type`, `storename`, `joined`) VALUES
	(40, 'ADAA', NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'adhham', 'adham@gmail.com', '1123432143', 1, 0, 'TOOT', '2025-02-01');
INSERT IGNORE INTO `users` (`id`, `username`, `image`, `password`, `fname`, `email`, `phone`, `gender`, `type`, `storename`, `joined`) VALUES
	(41, NULL, NULL, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL, 'mohame@gmail.com', NULL, 1, 0, NULL, '2025-02-01');
INSERT IGNORE INTO `users` (`id`, `username`, `image`, `password`, `fname`, `email`, `phone`, `gender`, `type`, `storename`, `joined`) VALUES
	(42, NULL, '43209_2882_2757_virgin.png', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL, 'mohame@gmail.com', NULL, 1, 0, NULL, '2025-02-01');
INSERT IGNORE INTO `users` (`id`, `username`, `image`, `password`, `fname`, `email`, `phone`, `gender`, `type`, `storename`, `joined`) VALUES
	(43, 'aaa', '24170_811_david-van-dijk-3LTht2nxd34-unsplash.jpg', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'aaaaa', 'a@a.a', NULL, 1, 2, NULL, '2025-02-01');
INSERT IGNORE INTO `users` (`id`, `username`, `image`, `password`, `fname`, `email`, `phone`, `gender`, `type`, `storename`, `joined`) VALUES
	(45, NULL, '81998_josep-pines-0QpAbH2i-Cs-unsplash.jpg', '8cb2237d0679ca88db6464eac60da96345513964', NULL, 'adham@gmail.com', NULL, 1, 0, NULL, '2025-03-09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
