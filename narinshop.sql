-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 08:35 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `narinshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `username` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `orderdate` date NOT NULL,
  `pro_code` int(10) NOT NULL,
  `pro_qty` int(10) NOT NULL,
  `pro_price` float NOT NULL,
  `mobile` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(400) COLLATE utf8_persian_ci NOT NULL,
  `trackcode` varchar(24) COLLATE utf8_persian_ci NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_code` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `pro_name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `pro_qty` int(10) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_image` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `pro_detail` text COLLATE utf8_persian_ci NOT NULL,
  `category` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_code`, `pro_name`, `pro_qty`, `pro_price`, `pro_image`, `pro_detail`, `category`) VALUES
('NR2', 'انگشتر پروانه و گل', 130, 235000, '', 'استیل درجه یک، ضد حساسیت، دوام رنگ بسیار بالا، ترجیحا در برابر عطر، الکل، موادشوینده مراقبت شود، نگین جواهر،فری سایز، مناسب هدیه دادن، یه انگشتر با وایب پروانه‌ای، خیلی خوشگل و ناز، دلبرتر ازین انگشتر مگه داریم؟:))))', 'انگشتر'),
('NR3', 'انگشتر جواهری', 100, 250000, 'photo_2025-05-18_01-11-26.jpg', 'استیل، ضد حساسیت، نگین جواهر،  فری سایز،ترجیحا در مجاورت عطر، الکل، موادشوینده قرار نگیرد، برای هدیه دادن به اونی که عاشق اکسسوری‌های تک نگین و براق و خاصه، زیباییش دلتو میبره:>>', 'انگشتر'),
('NR4', 'پک انگشتر مارگریت', 58, 190000, 'photo_2025-05-18_01-12-44.jpg', 'ضد حساسیت، آبکاری شده، دوام رنگ بالا،  نیاز به مراقبت داره دربرابر آب، عطر، الکل، موادشوینده، از قشنگترین پک‌هایی که تا به حال دیدی، خیلی ظریف و مینیمال و زیباس داخل دست، عاشقشممم:))))\r\nمناسب ساز 7،8', 'انگشتر'),
('NR5', 'انگشتر پروانک', 24, 238000, 'photo_2025-05-18_01-14-06.jpg', 'استیل، ضد حساسیت، دوام رنگ بسیار بالا،فری سایز، نگین جواهر، ترجیحا در برابر عطر، الکل، موادشوینده مراقبت شود، مناسب هدیه دادن، این انگشتر از دل پینترست بیرون اومده با وایب پروانه‌های رنگارنگ، خیلی خوشگل و ناز و پرطرفداره:>>', 'انگشتر'),
('NR6', 'انگشتر ستاره', 110, 199000, 'photo_2025-05-18_01-16-40.jpg', 'استیل، ضد حساسیت، رنگ ثابت، نگین جواهر،فری سایز، در مجاورت عطر، الکل، مواد شوینده قرار نگیرد، اینو بهش هدیه بده و بگو: چرا به ستاره‌ها خیره بشم وقتی که بزرگترین ستاره توی زندگیمه، با بودن این انگشتر توی دستای قشنگت یادت نره که ستاره منی:))', 'انگشتر');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstname` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `email`, `tel`, `password`, `type`) VALUES
('نگار', 'عظیمی', 'sncisphbci@gmail.com', '0914524000', '1200', 0),
('مریم ', 'حداد', 'fatyss@gmail.com', '0914756174', '1402', 0),
('فاطمه', 'شیبانی', 'fatemehsheibaniui@gmail.com', '09176246488', '1387', 1),
('سارا', 'رضایی فر', 'sararezaeefar@gmail.com', '09176355052', '2571', 0),
('مریم ', 'حداد', 'fatyss@gmail.com', '0914756174', '1402', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
