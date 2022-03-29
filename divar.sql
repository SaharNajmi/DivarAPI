-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2022 at 10:32 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divar`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation`
--

DROP TABLE IF EXISTS `activation`;
CREATE TABLE IF NOT EXISTS `activation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) NOT NULL,
  `activation_key` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=225 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activation`
--

INSERT INTO `activation` (`id`, `mobile`, `activation_key`) VALUES
(224, '09105569632', '6210'),
(222, '09198886245', '8625'),
(223, '09124449636', '8312'),
(218, '09187171026', '2598');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `price` varchar(15) NOT NULL,
  `userID` int(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `img1` varchar(500) NOT NULL DEFAULT 'images/',
  `img2` varchar(500) NOT NULL DEFAULT 'images/',
  `img3` varchar(500) DEFAULT 'images/',
  `date` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=264 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `price`, `userID`, `city`, `category`, `img1`, `img2`, `img3`, `date`, `status`) VALUES
(169, 'تبلت سامسونگ مدل  A7  SM-T505', 'قابلیت مکالمه:\nدارد\nمقدار رم:\n3 گیگابایت\nبازه اندازه صفحه نمایش:\nبین 10 تا 13 اینچ\nحافظه داخلی:\n32 گیگابایت\nقابلیت پشتیبانی از سیم کارت:\nدارد - یک سیم کارت\nسیستم عامل: اندروید\nفناوری‌های ارتباطی: بلوتوث- وای فای', '4800000', 3, 'تهران', '3,2', 'images/22-03-27-10-37-53-24065.jpg', 'images/22-03-27-10-37-53-1190.png', 'images/22-03-27-10-37-53-16103.jpg', '2022-02-27 22:37:53', 1),
(190, 'لپ تاپ 11 اینچی لنوو مدل IdeaPad 1 - A', 'ظرفیت حافظه RAM: 4 گیگابایت\r\nظرفیت حافظه داخلی: 128 گیگابایت\r\nسازنده پردازنده گرافیکی: Intel\r\nاندازه صفحه نمایش: 11.6 اینچ\r\n\r\nبرخی از لپ ‌تاپ‌ها کاملا برای کاربری عمومی و انجام امور معمول روزمره تولید شده‌اند و در طراحی آن‌ها به تمامی نکات مهم توجه شده است. یکی از این لپ‌تاپ‌ها، مدل «Ideapad 1» لنوو است. این لپ‌تاپ صفحه ‌نمایش 11.6 اینچی دارد و به دلیل ابعاد نسبتا کوچک بدنه، ضخامت 1.79 سانتی‌متری و وزن 1200 گرمی، می‌توان به ‌راحتی و در یک کیف دستی معمولی آن را در هر شرایطی با خود حمل کرد. بدنه‌ی این لپ‌تاپ کاملا از پلاستیک ساخته شده است تا هم باعث کاهش وزن آن شود و هم قیمت تمام‌ شده‌ی آن را پایین آورد.  با این‌ حال ظاهر Ideapad 1 همچنان شیک و جذاب است و مقاومت خوبی هم در برابر فشار و خمش دارد و از یک شاسی قوی بهره می‌برد. برای چنین محصولی با توجه به رده‌ی کاربری و ابعاد، انتظار مواجهه با سخت‌افزارهای چندان رده‌ بالایی را نداشتیم. بر همین ‌اساس، پردازنده‌ی مرکزی Celeron N4020 اینتل، پردازشگر گرافیکی  آنبرد، 4 گیگابایت رم DDR4 و 128 گیگابایت حافظه‌ی داخلی از نوع SSD، این سخت‌افزارها را تشکیل می‌دهند. از طرفی باتری دو سلولی این محصول عملکرد خوبی دارد و در شرایط وب ‌گردی با اتصال WiFi و نور متوسط صفحه ‌نمایش، تا هشت ساعت روشن ‌ماندن لپ‌تاپ را تضمین می‌کند که یک روز کامل کاری را پوشش خواهد داد .صفحه ‌نمایش این لپ‌تاپ یک نمونه‌ی ساده با پنل TN، وضوح HD و روکش مات است و در ضمن صفحه ‌نمایش این لپ‌تاپ تا 180 درجه باز می شود. از امکانات قابل توجه این لپ‌تاپ کوچک می‌توان به کیبورد جزیره‌ای و تاچ ‌پد یک‌ تکه اشاره کرد.\r\n', '8500000', 3, 'تهران', '3,3', 'images/22-03-27-10-30-33-22898.jpg', 'images/22-03-27-10-30-33-451.jpg', 'images/22-03-27-10-30-33-23104.jpg', '2022-03-27 22:30:33', 1),
(189, 'لپ تاپ 15.6 اینچی اچ‌پی مدل 255 G7-R3C', 'ظرفیت حافظه RAM:\n8 گیگابایت\nظرفیت حافظه داخلی:\nیک ترابایت و 256 گیگابایت\nسازنده پردازنده گرافیکی:\nAMD\nاندازه صفحه نمایش:\n15.6 اینچ', '13500000', 2, 'شیراز', '3,3', 'images/22-03-27-10-32-21-7545.jpg', 'images/22-03-27-10-32-21-6846.jpg', 'images/22-03-27-10-32-21-30495.jpg', '2022-03-15 22:32:21', 1),
(187, 'لپ تاپ 15 اینچی لنوو مدل IdeaPad 3 - 15IML05 - B', 'ظرفیت حافظه RAM: \r\n8 GB\r\nظرفیت حافظه داخلی:\r\n1 TB\r\nسازنده پردازنده گرافیکی:\r\nNVIDIA\r\nاندازه صفحه نمایش:\r\n15.6 Inch\r\nسری پردازنده:\r\nCore i5\r\nنوع حافظه RAM:\r\nDDR4\r\nدقت صفحه نمایش:\r\nFull HD| 1920 x1080\r\nصفحه نمایش مات:\r\nبله\r\nصفحه نمایش لمسی:\r\nخیر\r\nسیستم عامل:\r\nبدون سیستم‌عامل\r\nپورت HDMI:\r\nدارد\r\n', '19200000', 3, 'تهران', '3,3', 'images/22-03-27-10-36-40-3066.jpg', 'images/22-03-27-10-36-40-30123.jpg', 'images/22-03-27-10-36-40-25608.jpg', '2022-03-11 22:36:40', 1),
(262, 'شیائومی poco x3', 'حافظه داخلی: 64گیگابایت\nشبکه های ارتباطی:\n 4G، 3G، 2G\nدوربین‌های پشت گوشی: 4 ماژول دوربین\nسیستم عامل: Android\nمقدار RAM: 6 گیگابایت\nرزولوشن عکس: 48 مگاپیکسل', '5100000', 1, 'مشهد', '1,1', 'images/22-03-28-7-32-36-28897.jpg', 'images/22-03-28-7-32-36-19974.jpg', 'images/22-03-28-7-32-36-15559.jpg', '2022-03-28 19:32:36', 1),
(191, 'خودرو تویوتا Landcruiser اتوماتیک سال 2016', 'نوع ترمزهای جلو و عقب: دیسکی\r\nنوع جعبه دنده (گیربکس): اتوماتیک\r\nسنسور دنده عقب: دارد\r\nتعداد سیلندر: هشت سیلندر\r\nنوع سوخت: بنزینی', '950000000', 4, 'تهران', '2,1', 'images/22-03-27-10-47-27-23148.jpg', 'images/22-03-27-10-47-27-6197.jpg', 'images/22-03-27-10-47-27-9418.jpg', '2022-03-16 22:47:27', 1),
(192, 'ماشین شارژی طرح بنز', 'تعداد چرخ:\nچهار چرخ\nنوع چرخ‌ها:\nپلاستیک EVA\nاهرم هدایت فرمان:\nدارد\nکمک فنر:\nدارد\nمحافظ صندلی:\nدارد', '4500000', 4, 'بابل', '2,1', 'images/22-03-27-10-29-27-27175.jpg', 'images/22-03-27-10-29-27-17620.jpg', 'images/22-03-27-10-29-27-5757.jpg', '2022-03-16 22:29:27', 1),
(193, 'پژو 206 SD V8 مدل 1398', 'برند و مدل\n\nپژو 206 SD V8\n\nوضعیت بدنه\n\nبدون رنگ\n\nسال ساخت\n\n۲۰۱۶ - ۱۳۹۵\n\nکارکرد\n\n۱۴۰,۹۱۸ کیلومتر\n\nرنگ\n\nمشکی', '215000000', 4, 'یزد', '2,1', 'images/22-03-27-10-28-46-28200.jpg', 'images/22-03-27-10-28-46-18241.jpg', 'images/22-03-27-10-28-46-21734.jpg', '2022-03-25 22:28:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bannerID` int(11) NOT NULL,
  `bannerTitle` varchar(50) NOT NULL,
  `bannerImage` varchar(200) NOT NULL,
  `sender` varchar(11) NOT NULL,
  `receiver` varchar(11) NOT NULL,
  `message` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=273 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `bannerID`, `bannerTitle`, `bannerImage`, `sender`, `receiver`, `message`) VALUES
(251, 191, 'خودرو تویوتا Landcruiser اتوماتیک سال 2016', 'images/22-03-27-10-47-27-23148.jpg', '09198886245', '09187171026', 'ساعت پنج میتونید بیاید؟'),
(252, 191, 'خودرو تویوتا Landcruiser اتوماتیک سال 2016', 'images/22-03-27-10-47-27-23148.jpg', '09187171026', '09198886245', 'بله'),
(253, 191, 'خودرو تویوتا Landcruiser اتوماتیک سال 2016', 'images/22-03-27-10-47-27-23148.jpg', '09198886245', '09187171026', 'قبلش تماس بگیرین آدرس رو بهتون میگم'),
(254, 191, 'خودرو تویوتا Landcruiser اتوماتیک سال 2016', 'images/22-03-27-10-47-27-23148.jpg', '09187171026', '09198886245', 'اکی ممنون'),
(259, 253, 'شیائومی poco x3', 'images/22-03-27-10-03-41-21445.jpg', '09187171026', '09198886245', 'بله'),
(257, 253, 'شیائومی poco x3', 'images/22-03-27-10-03-41-21445.jpg', '09198886245', '09187171026', 'سلام'),
(258, 253, 'شیائومی poco x3', 'images/22-03-27-10-03-41-21445.jpg', '09198886245', '09187171026', 'آکبنده؟'),
(248, 191, 'خودرو تویوتا Landcruiser اتوماتیک سال 2016', 'images/22-03-27-10-47-27-23148.jpg', '09187171026', '09198886245', 'سلام وقتتون بخیر'),
(250, 191, 'خودرو تویوتا Landcruiser اتوماتیک سال 2016', 'images/22-03-27-10-47-27-23148.jpg', '09198886245', '09187171026', 'سلام'),
(249, 191, 'خودرو تویوتا Landcruiser اتوماتیک سال 2016', 'images/22-03-27-10-47-27-23148.jpg', '09187171026', '09198886245', 'امروز میتونم بیام ببینمش؟'),
(242, 190, 'لپ تاپ 11 اینچی لنوو مدل IdeaPad 1 - A', 'images/22-03-27-10-30-33-22898.jpg', '09187171026', '09124449636', 'سلام \nروز بخیر'),
(243, 190, 'لپ تاپ 11 اینچی لنوو مدل IdeaPad 1 - A', 'images/22-03-27-10-30-33-22898.jpg', '09187171026', '09124449636', 'اس اس دی هم داره؟');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tell` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8470 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `tell`) VALUES
(1, '09187171026'),
(4, '09198886245'),
(3, '09124449636'),
(2, '09105569632');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
