-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2025 at 10:19 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u237663512_dbunv`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `title` varchar(2555) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `store` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `fname`, `title`, `status`, `store`, `created`) VALUES
(13, 'اترك تعليق\r\n                          good service', 'haifa', 'service', 1, 38, '2024-12-28 13:37:52');

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `fname`, `content`, `status`, `created`) VALUES
(18, 1, 'haifa', 'اترك تعليق\r\n                          good service', 0, '2024-12-28 13:37:52'),
(19, 0, 'aaa', 'contact me', 0, '2024-12-28 13:38:42'),
(20, 0, 'aaa', 'contact me', 0, '2024-12-28 13:39:36'),
(21, 0, 'aaa', 'contact me', 0, '2024-12-28 13:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descr` longtext NOT NULL,
  `discount` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `map` varchar(2555) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `descr`, `discount`, `image`, `userid`, `url`, `map`, `created`) VALUES
(4, 'بولينج', 'خصم 50% كل يوم ثلاثاء', '50', '44326_بولينج.jpeg', 37, '', 'https://maps.app.goo.gl/mfSjDrTg5jfA1AHf6?g_st=com.google.maps.preview.copy', '2024-12-28 13:05:15'),
(5, 'سينما', 'تمتع بالعروض مع بطاقات بنك الراجحي', '70', '72539_vox.png', 37, '', 'https://maps.app.goo.gl/e2qcAcPeWFPrMogG8?g_st=com.google.maps.preview.copy', '2024-12-28 13:07:56'),
(7, 'Virgin Megastore', 'Exclusive in-store deal: Buy one pair of wireless earbuds, get a free charging cable!', '', '2757_virgin.png', 38, '', '', '2024-12-28 13:16:53'),
(8, 'zara', 'خصم نهاية العام بنسبة 40 %', '40', '52836_zara.png', 38, 'https://www.zara.com', '', '2025-01-15 23:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
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
  `os` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `aboutus`, `aboutus_img`, `logo`, `favicon`, `h_image`, `h_title`, `h_paragraph`, `h_image2`, `h_image3`, `phone`, `email`, `privacy`, `h_image4`, `terms`, `sname`, `os`) VALUES
(1, 'من نحن\r\n\r\nمرحبًا بكم في YourGuide – حيث نعيد تعريف تجربة التسوق الخاصة بك!\r\n\r\nفي YourGuide، نلتزم بتحسين تجربتكم داخل المراكز التجارية باستخدام تقنية البلوتوث منخفض الطاقة (BLE) المبتكرة. من خلال حلول ذكية وآنية، نقدم إشعارات مخصصة، وعروضًا حصرية، وتوجيهًا سلسًا إلى المتاجر بناءً على موقعكم داخل المركز التجاري.\r\n\r\nمنصتنا تربط بين المتسوقين وتجار التجزئة، مما يوفر رحلة تسوق أكثر تفاعلًا وفعالية ومتعة. سواء كنت تبحث عن أحدث العروض، أو تحاول العثور على متاجرك المفضلة، أو تحتاج إلى الوصول إلى الخدمات الأساسية داخل المركز التجاري، فإن YourGuide هنا لضمان حصولك على أقصى استفادة من كل زيارة.\r\n\r\nانضم إلينا في إعادة تشكيل مستقبل التسوق، حيث يلتقي الابتكار بالراحة.\r\n\r\nYourGuide – رفيقك الذكي في التسوق.', '15766_2.gif', '13246_5870ce50-68c6-40b4-bb18-486f00e31ed9-removebg-preview(1).png', '65341_5870ce50-68c6-40b4-bb18-486f00e31ed9-removebg-preview(1).png', '73608_Unknown.jpeg', 'welcome', '', '3075_b5.png', '24282_39222_64155_pexels-photo-4724487.jpeg', '+966555885303', ' support@yourguide.com', 'في YourGuide، نحن ملتزمون بحماية خصوصيتك مع تحسين تجربتك داخل المراكز التجارية. نقوم بجمع معلومات محدودة، مثل بيانات الموقع عبر تقنية البلوتوث منخفض الطاقة (BLE)، وتفاصيل الجهاز، وتفضيلات التفاعل، لتقديم إشعارات فورية، وعروض مخصصة، وتوجيه دقيق للمتاجر، وإتاحة الوصول إلى خدمات المركز التجاري. يتم الحفاظ على أمان معلوماتك باستخدام تقنيات تشفير متقدمة، ولا نقوم ببيع بياناتك أو مشاركتها مع أطراف ثالثة لأغراض تسويقية.\r\n\r\nلديك تحكم كامل في إعدادات الخصوصية الخاصة بك، بما في ذلك تمكين أو تعطيل خدمات الموقع والإشعارات. لأي استفسار حول خصوصيتك أو لطلب الوصول إلى بياناتك أو حذفها، يُرجى التواصل معنا عبر البريد الإلكتروني: support@yourguide.com.', '48116_cinma.jpeg', '<p>Because the acceleration of development has become a feature of this modern era, so companies and institutions must simulate this development in various ways and methods, especially in everything related to management, production, marketing and selling, as well as after-sales and follow-up services... We at Horizon have harnessed all capabilities for you to cover what you need of modern technologies, as we provide you with all the needs of companies and institutions technically, accounting and technically through our advanced cloud systems, to contribute to saving time and effort and reducing costs, and with this integration we are distinguished from other competitors. We at \"Horizon\" are a passionate, enthusiastic and specialized team. We set out in the world of different businesses in many fields, in order to become success partners and companions on the path</p>\r\n', 'Your Guide', '<br />\r\n<b>Warning</b>:  Undefined array key \"os\" in <b>C:\\xampp\\htdocs\\moul\\admin\\pages2.php</b> on line <b>75</b><br />\r\nc');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `content_en` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `visibility` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `userid` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `title_en`, `content`, `content_en`, `image`, `visibility`, `type`, `userid`, `created`) VALUES
(27, 'استمتعوا بأجواء فريدة تجمع بين التسوق والترفيه في مكان واحد! نقدم لكم:', '', ' منطقة ترفيهية مميزة للأطفال والكبار للاستمتاع بأوقات لا تُنسى.\r\n\r\nعروض خاصة وخصومات مدهشة طوال الأسبوع.', '', '9229_rpActivi.jpeg', 1, 1, 5, '2024-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `image` varchar(5000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL DEFAULT 0,
  `storename` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `image`, `password`, `fname`, `email`, `phone`, `gender`, `type`, `storename`, `joined`) VALUES
(5, 'admin', '36515_admin.png', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'yourGuide@gmail.com', '0512345678', 1, 2, '', '2021-02-28'),
(37, '', '23406_activities.jpeg', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 'activities', '', 1, 0, '', '2024-12-28'),
(38, '', '85416_stores.png', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 'stores', '', 1, 0, '', '2024-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `user` varchar(2555) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;


--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
