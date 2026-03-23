-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2026 at 08:16 PM
-- Server version: 10.11.16-MariaDB-cll-lve
-- PHP Version: 8.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msengcpa_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Sr.no` int(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Sr.no`, `Name`, `Email`, `Subject`, `Message`, `status`) VALUES
(85, 'Daniella O\'Callaghan', 'ocallaghan.daniella@gmail.com', 'Dear msengg.in Owner!', 'Hello, we have checked your website and it looks like your SEO needs significant improvement, and it\'s also not ready for AI-based ranking. We can get you into the TOP3 search results for a very affordable price. You can WhatsApp us: +48 794 972 985\r\n', 'read'),
(86, 'Nishant Sharma', 'nishant.developer22@gmail.com', 'Re: Website not popping up on google', 'Hello msengg.in,\r\n\r\nI visited your website online and discovered that it was not showing up in any search results for the majority of keywords related to your company on Google, Yahoo, or Bing.\r\n\r\nDo you want more targeted visitors on your website?\r\n\r\nWe can place your website on Google’s 1st Page. yahoo, AOL, Bing. Etc.\r\n\r\nIf interested, kindly provide me your name, phone number, and email.\r\n\r\nWell wishes,\r\nNishant Sharma | Digital Marketing Manager\r\n\r\n\r\n\r\n\r\n\r\nNote: - If you’re not Interested in our Services, send us &quot;opt-out&quot;\r\n\r\n\r\n\r\n', 'read'),
(87, 'Abdul Scrivener', 'scrivener.abdul30@outlook.com', 'Full access to all AI models in one place', 'Multiverse AI - The Only Platform That Gives You Access To Every Top AI Model — In Every Version — All Inside A Single, Beautifully Simple Dashboard.\r\n\r\nhttps://ai108.online/MultiverseAI\r\n\r\nChatGPT (3.5 → 4.5 → 4o → 5 → Turbo → Nano)\r\nGemini (1.5 Pro → 2.0 Flash)\r\nClaude (3 Opus → Sonnet → Haiku)\r\nGrok (1 through 4)\r\nDALL·E, Veo, Kling, ElevenLabs, DeepSeek, FLUX, LLaMA &amp; more\r\nAnd yes — you get every future version included automatically.\r\n\r\nhttps://ai108.online/MultiverseAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://ai108.online/unsubscribe?domain=msengg.in\r\nAddress: 108 West Street Comstock Park, MI 48721', 'read'),
(88, 'Ed Bruton', 'bruton.ed73@gmail.com', 'Increase msengg.in Seo Backlinks + Website Traffic', 'Boost msengg.in seo with trusted seo services! \r\nBonusBacklinks.com - we provide daily backlinks and drive organic traffic to your page EVERY DAY:\r\n\r\n+ Take 85% SALE\r\n+ Strong daily seo backlinks\r\n+ Organic website visits\r\n+ Prices start from $1\r\n+ Bonus discount codes\r\n\r\nhttps://tiny.cc/bonusbacklinks-coupons\r\n\r\nBonusBacklinks.com - daily backlinks and website clicks to skyrocket your webpage every day', 'read'),
(89, 'Leelow', 'zekisuquc419@gmail.com', 'Hi,   wrote about   the prices', 'Ola, quería saber o seu prezo.', 'read'),
(90, 'Robertlow', 'zekisuquc419@gmail.com', 'Hallo,   write about     price', 'Sawubona, bengifuna ukwazi intengo yakho.', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `pro`
--

CREATE TABLE `pro` (
  `Sr.no` int(225) NOT NULL,
  `product_name` varchar(70) NOT NULL,
  `product_description` text NOT NULL,
  `img` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro`
--

INSERT INTO `pro` (`Sr.no`, `product_name`, `product_description`, `img`) VALUES
(1, 'Aluminium Profile', '', 'home page img/1.png'),
(2, 'Accessories for Aluminium Profile', '', 'home page img/2.jpg'),
(3, 'Cable Trays', '', 'home page img/3.jpg'),
(4, 'Rollers', '', 'home page img/4.png'),
(5, 'Flexible Conveyor', '', 'home page img/5.jpg'),
(6, 'Endless Belt Conveyor', '', 'home page img/6.jpg'),
(7, 'Conveyor Guides', '', 'home page img/7.jpg'),
(8, 'WL Series', '', 'home page img/8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Sr.no` int(255) NOT NULL,
  `pro_name` varchar(90) NOT NULL,
  `pro_part` varchar(90) NOT NULL,
  `pro_part_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Sr.no`, `pro_name`, `pro_part`, `pro_part_img`) VALUES
(1, 'Aluminium Profile', '20 Group', 'aluminium profile img/ap_1.jpg'),
(2, 'Aluminium Profile', '30 Group', 'aluminium profile img/ap_2.jpg'),
(3, 'Aluminium Profile', '40 Group', 'aluminium profile img/ap_3.jpg'),
(4, 'Aluminium Profile', '45 Group', 'aluminium profile img/ap_4.jpg'),
(5, 'Aluminium Profile', '60 Group', 'aluminium profile img/ap_5.jpg'),
(6, 'Aluminium Profile', 'others', 'aluminium profile img/ap_6.jpg'),
(9, 'Accessories for Aluminium Profile', 'Fastening Elements', 'Accessories for aluminium profiles/aap_1.jpg'),
(10, 'Accessories for Aluminium Profile', 'Connecting Elements', 'Accessories for aluminium profiles/aap_2.jpg'),
(11, 'Accessories for Aluminium Profile', 'Profile Accessories', 'Accessories for aluminium profiles/aap_3.jpg'),
(12, 'Accessories for Aluminium Profile', 'Floor Elements', 'Accessories for aluminium profiles/aap_4.jpg'),
(13, 'Accessories for Aluminium Profile', 'Panel Installation', 'Accessories for aluminium profiles/aap_5.jpg'),
(14, 'Accessories for Aluminium Profile', 'Door and Window Accessories', 'Accessories for aluminium profiles/aap_6.jpg'),
(15, 'Accessories for Aluminium Profile', 'Additional Accessories', 'Accessories for aluminium profiles/aap_7.jpg'),
(16, 'Cable Trays', 'Aluminium Profile', 'Cable Trays/ct_1.jpg\r\n'),
(17, 'Cable Trays', 'Connecting Elements of cable trays', 'Cable Trays/ct_2.jpg'),
(18, 'Cable Trays', 'Support Structure', 'Cable Trays/ct_3.jpg'),
(19, 'Rollers', '25 MM Idler Roller', 'Rollers/r_1.jpg'),
(20, 'Rollers', '38 MM Idler Roller', 'Rollers/r_2.jpg'),
(21, 'Rollers', '50 MM Idler Roller', 'Rollers/r_3.jpg'),
(22, 'Rollers', '50 MM Driven roller', 'Rollers/r_4.jpg'),
(23, 'Rollers', 'Taper roller', 'Rollers/r_5.jpg'),
(24, 'Rollers', 'Roller conveyor profile', 'Rollers/r_6.jpg'),
(25, 'Flexible Conveyor', '65 mm Flexible', 'Flexible Conveyor/fc_1.jpg'),
(28, 'Flexible Conveyor', '85 mm Flexible', 'Flexible Conveyor/fc_2.jpg'),
(29, 'Flexible Conveyor', '105 mm Flexible', 'Flexible Conveyor/fc_3.jpg'),
(30, 'Flexible Conveyor', '300 mm Flexible', 'Flexible Conveyor/fc_4.jpg'),
(31, 'Flexible Conveyor', 'Guides for flexible conveyor', 'Flexible Conveyor/fc_5.jpg'),
(32, 'Flexible Conveyor', 'Width actuator 660 mm', 'Flexible Conveyor/fc_6.jpg'),
(35, 'Endless Belt Conveyor', '40 MM Series', 'ebc/ebc_1.jpeg'),
(36, 'Endless Belt Conveyor', '60 MM Series', 'ebc/ebc_2.jpeg'),
(37, 'Endless Belt Conveyor', '80 MM Series', 'ebc/ebc_3.jpeg'),
(38, 'Conveyor Guides', 'Conveyor Guides', 'home page img/7.jpg'),
(39, 'WL Series', 'WL210', 'WL Series/wl_1.jpg'),
(40, 'WL Series', 'WL322', 'WL Series/wl_2.jpg'),
(41, 'WL Series', 'WL424', 'WL Series/wl_3.jpg'),
(42, 'WL Series', 'WL525', 'WL Series/wl_4.jpg'),
(43, 'WL Series', 'WL626', 'WL Series/wl_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pro_master`
--

CREATE TABLE `pro_master` (
  `Sr.no` int(11) NOT NULL,
  `pro_part` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `col_count` int(10) NOT NULL DEFAULT 0,
  `pro_pdf_name` varchar(90) NOT NULL,
  `pro_pdf_img` varchar(255) NOT NULL,
  `pro_pdf_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_master`
--

INSERT INTO `pro_master` (`Sr.no`, `pro_part`, `col_count`, `pro_pdf_name`, `pro_pdf_img`, `pro_pdf_file`) VALUES
(1, '20 Group', 0, '2020S', 'aluminium profile img/ap_1/ap_1_1.jpg', 'aluminium profile img/ap_1/20/2020S.jpg'),
(2, '20 Group', 0, '2020 R90', 'aluminium profile img/ap_1/ap_1_2.jpg', 'aluminium profile img/ap_1/20/2020_R90.jpg'),
(3, '20 Group', 0, '2040', 'aluminium profile img/ap_1/ap_1_3.jpg', 'aluminium profile img/ap_1/20/2040.jpg'),
(4, '20 Group', 0, '2060', 'aluminium profile img/ap_1/ap_1_4.jpg', 'aluminium profile img/ap_1/20/2060.jpg'),
(5, '30 Group', 0, '3030S', 'aluminium profile img/ap_2/ap_2_1.jpg', 'aluminium profile img/ap_2/30/3030S.jpg'),
(10, '30 Group', 0, '3030H', 'aluminium profile img/ap_2/ap_2_2.jpg', 'aluminium profile img/ap_2/30/3030H.jpg'),
(11, '30 Group', 0, '3030R45', 'aluminium profile img/ap_2/ap_2_3.jpg', 'aluminium profile img/ap_2/30/3030R45.jpg'),
(12, '30 Group', 0, '3030R90', 'aluminium profile img/ap_2/ap_2_4.jpg', 'aluminium profile img/ap_2/30/3030R90.jpg'),
(13, '30 Group', 0, '3060', 'aluminium profile img/ap_2/ap_2_5.jpg', 'aluminium profile img/ap_2/30/3060.jpg'),
(14, '30 Group', 0, '3090', 'aluminium profile img/ap_2/ap_2_6.jpg', 'aluminium profile img/ap_2/30/3090.jpg'),
(15, '30 Group', 0, '3030 OSC', 'aluminium profile img/ap_2/ap_2_7.jpg', 'aluminium profile img/ap_2/30/3030_OSC.jpg'),
(16, '30 Group', 0, '3030 2SSC', 'aluminium profile img/ap_2/ap_2_8.jpg', 'aluminium profile img/ap_2/30/3030_2SSC.jpg'),
(17, '30 Group', 0, '3030 2OCS', 'aluminium profile img/ap_2/ap_2_9.jpg', 'aluminium profile img/ap_2/30/3030_2OCS.jpg'),
(18, '30 Group', 0, '3030 3SC', 'aluminium profile img/ap_2/ap_2_10.jpg', 'aluminium profile img/ap_2/30/3030_3SC.jpg'),
(19, '30 Group', 0, '3060 3SC', 'aluminium profile img/ap_2/ap_2_11.jpg', 'aluminium profile img/ap_2/30/3060_3SC.jpg'),
(20, '30 Group', 0, '6060', 'aluminium profile img/ap_2/ap_2_12.jpg', 'aluminium profile img/ap_2/30/6060.jpg'),
(21, '30 Group', 0, '30R100', 'aluminium profile img/ap_2/ap_2_13.jpg', 'aluminium profile img/ap_2/30/30R100.jpg'),
(22, '40 Group', 0, '4040S', 'aluminium profile img/ap_3/ap_3_1.jpg', 'aluminium profile img/ap_3/40/4040S.jpg'),
(23, '40 Group', 0, '4040M', 'aluminium profile img/ap_3/ap_3_2.jpg', 'aluminium profile img/ap_3/40/4040M.jpg'),
(24, '40 Group', 0, '4040H', 'aluminium profile img/ap_3/ap_3_3.jpg', 'aluminium profile img/ap_3/40/4040H.jpg'),
(25, '40 Group', 0, '4040XH', 'aluminium profile img/ap_3/ap_3_4.jpg', 'aluminium profile img/ap_3/40/4040XH.jpg'),
(26, '40 Group', 0, '4040R45', 'aluminium profile img/ap_3/ap_3_5.jpg', 'aluminium profile img/ap_3/40/4040R45.jpg'),
(27, '40 Group', 0, 'PG40 4040S R90', 'aluminium profile img/ap_3/ap_3_6.jpg', 'aluminium profile img/ap_3/40/4040S_R90.jpg'),
(28, '40 Group', 0, '4080S', 'aluminium profile img/ap_3/ap_3_7.jpg', 'aluminium profile img/ap_3/40/4080S.jpg'),
(29, '40 Group', 0, '4040R90', 'aluminium profile img/ap_3/ap_3_8.jpg', 'aluminium profile img/ap_3/40/4040R90.jpg'),
(30, '40 Group', 0, '4080H', 'aluminium profile img/ap_3/ap_3_9.jpg', 'aluminium profile img/ap_3/40/4080H.jpg'),
(31, '40 Group', 0, '4080M', 'aluminium profile img/ap_3/ap_3_10.jpg', 'aluminium profile img/ap_3/40/4080M.jpg'),
(32, '40 Group', 0, '40120H', 'aluminium profile img/ap_3/ap_3_11.jpg', 'aluminium profile img/ap_3/40/40120H.jpg'),
(33, '40 Group', 0, '8080H', 'aluminium profile img/ap_3/ap_3_12.jpg', 'aluminium profile img/ap_3/40/8080H.jpg'),
(34, '40 Group', 0, '8080M', 'aluminium profile img/ap_3/ap_3_13.jpg', 'aluminium profile img/ap_3/40/8080M.jpg'),
(35, '40 Group', 0, '80160', 'aluminium profile img/ap_3/ap_3_14.jpg', 'aluminium profile img/ap_3/40/80160.jpg'),
(36, '40 Group', 0, '4040 OSC', 'aluminium profile img/ap_3/ap_3_15.jpg', 'aluminium profile img/ap_3/40/4040_OSC.jpg'),
(37, '40 Group', 0, '4040S OSC', 'aluminium profile img/ap_3/ap_3_16.jpg', 'aluminium profile img/ap_3/40/4040S_OSC.jpg'),
(38, '40 Group', 0, '4040 2SSC', 'aluminium profile img/ap_3/ap_3_17.jpg', 'aluminium profile img/ap_3/40/4040_2SSC.jpg'),
(39, '40 Group', 0, '4040 2OSC', 'aluminium profile img/ap_3/ap_3_18.jpg', 'aluminium profile img/ap_3/40/4040_2OSC.jpg'),
(40, '40 Group', 0, '4040 3SC', 'aluminium profile img/ap_3/ap_3_19.jpg', 'aluminium profile img/ap_3/40/4040_3SC.jpg'),
(41, '40 Group', 0, '4040 Hollow', 'aluminium profile img/ap_3/ap_3_20.jpg', 'aluminium profile img/ap_3/40/4040_Hollow.jpg'),
(42, '45 Group', 0, '4545S', 'aluminium profile img/ap_4/ap_4_1.jpg', 'aluminium profile img/ap_4/45/4545S.jpg'),
(43, '45 Group', 0, '4545M', 'aluminium profile img/ap_4/ap_4_2.jpg', 'aluminium profile img/ap_4/45/4545M.jpg'),
(44, '45 Group', 0, '4545H', 'aluminium profile img/ap_4/ap_4_3.jpg', 'aluminium profile img/ap_4/45/4545H.jpg'),
(45, '45 Group', 0, '4590', 'aluminium profile img/ap_4/ap_4_4.jpg', 'aluminium profile img/ap_4/45/4590.jpg'),
(46, '45 Group', 0, '9090', 'aluminium profile img/ap_4/ap_4_5.jpg', 'aluminium profile img/ap_4/45/9090.jpg'),
(47, '45 Group', 0, '15180', 'aluminium profile img/ap_4/ap_4_6.jpg', 'aluminium profile img/ap_4/45/15180.jpg'),
(48, '60 Group', 0, '6060 M', 'aluminium profile img/ap_5/ap_5_1.jpg', 'aluminium profile img/ap_5/60/6060M.jpg'),
(49, '60 Group', 0, '6060 H', 'aluminium profile img/ap_5/ap_5_2.jpg', 'aluminium profile img/ap_5/60/6060H.jpg'),
(50, '60 Group', 0, '6060R90', 'aluminium profile img/ap_5/ap_5_3.jpg', 'aluminium profile img/ap_5/60/6060R90.jpg'),
(51, '60 Group', 0, '6060R90H', 'aluminium profile img/ap_5/ap_5_4.jpg', 'aluminium profile img/ap_5/60/6060R90H.jpg'),
(52, 'others', 0, '1560', 'aluminium profile img/other/oth_1.jpg', 'aluminium profile img/other/other/1560.jpg'),
(53, 'others', 0, '1580', 'aluminium profile img/other/oth_2.jpg', 'aluminium profile img/other/other/1580.jpg'),
(54, 'others', 0, '1830', 'aluminium profile img/other/oth_3.jpg', 'aluminium profile img/other/other/1830.jpg'),
(55, 'Fastening Elements', 0, 'T Nut', 'Accessories for aluminium profiles/aap_1/aap_1_1.jpg', 'Accessories for aluminium profiles/aap_1/fe/fe1.jpg'),
(56, 'Fastening Elements', 0, 'Hammer Nut', 'Accessories for aluminium profiles/aap_1/aap_1_2.jpg', 'Accessories for aluminium profiles/aap_1/fe/fe2.jpg'),
(57, 'Fastening Elements', 0, 'Ball Screw', 'Accessories for aluminium profiles/aap_1/aap_1_3.jpg', 'Accessories for aluminium profiles/aap_1/fe/fe3.jpg'),
(58, 'Fastening Elements', 0, 'Spring Nut', 'Accessories for aluminium profiles/aap_1/aap_1_4.jpg', 'Accessories for aluminium profiles/aap_1/fe/fe4.jpg'),
(59, 'Fastening Elements', 0, 'Subsequent Nut', 'Accessories for aluminium profiles/aap_1/aap_1_5.jpg', 'Accessories for aluminium profiles/aap_1/fe/fe5.jpg'),
(60, 'Fastening Elements', 0, 'Diamond Nut', 'Accessories for aluminium profiles/aap_1/aap_1_6.jpg', 'Accessories for aluminium profiles/aap_1/fe/fe6.jpg'),
(61, 'Connecting Elements', 0, 'Die Cast Bracket A', 'Accessories for aluminium profiles/aap_2/aap_2_1.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce1.jpg'),
(62, 'Connecting Elements', 0, 'Die Cast Bracket B', 'Accessories for aluminium profiles/aap_2/aap_2_2.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce2.jpg'),
(63, 'Connecting Elements', 0, 'Die Cast Bracket C', 'Accessories for aluminium profiles/aap_2/aap_2_3.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce3.jpg'),
(64, 'Connecting Elements', 0, 'Aluminium Angle', 'Accessories for aluminium profiles/aap_2/aap_2_4.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce4.jpg'),
(65, 'Connecting Elements', 0, 'Anchor Connector Standard', 'Accessories for aluminium profiles/aap_2/aap_2_5.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce5.jpg'),
(66, 'Connecting Elements', 0, 'Anchor Connector Universal', 'Accessories for aluminium profiles/aap_2/aap_2_6.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce6.jpg'),
(67, 'Connecting Elements', 0, 'Hidden Bracket', 'Accessories for aluminium profiles/aap_2/aap_2_7.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce7.jpg'),
(68, 'Connecting Elements', 0, 'Joint Angle', 'Accessories for aluminium profiles/aap_2/aap_2_8.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce8.jpg'),
(69, 'Connecting Elements', 0, 'Quick Insert', 'Accessories for aluminium profiles/aap_2/aap_2_9.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce9.jpg'),
(70, 'Connecting Elements', 0, '3 Way Joint', 'Accessories for aluminium profiles/aap_2/aap_2_10.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce10.jpg'),
(71, 'Connecting Elements', 0, 'Lock Fastener', 'Accessories for aluminium profiles/aap_2/aap_2_11.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce11.jpg'),
(72, 'Connecting Elements', 0, 'Square Round Anchor Connector', 'Accessories for aluminium profiles/aap_2/aap_2_12.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce12.jpg'),
(73, 'Connecting Elements', 0, 'Joint Bar', 'Accessories for aluminium profiles/aap_2/aap_2_13.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce13.jpg'),
(74, 'Connecting Elements', 0, 'One Way Anchor Connector', 'Accessories for aluminium profiles/aap_2/aap_2_14.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce14.jpg'),
(75, 'Connecting Elements', 0, 'Two Way Anchor Connector', 'Accessories for aluminium profiles/aap_2/aap_2_15.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce15.jpg'),
(76, 'Connecting Elements', 0, 'Insert', 'Accessories for aluminium profiles/aap_2/aap_2_16.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce16.jpg'),
(77, 'Connecting Elements', 0, 'Core Reducer', 'Accessories for aluminium profiles/aap_2/aap_2_17.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce17.jpg'),
(78, 'Connecting Elements', 0, 'Inner Joint Angle', 'Accessories for aluminium profiles/aap_2/aap_2_18.jpg', 'Accessories for aluminium profiles/aap_2/ce/ce18.jpg'),
(79, 'Profile Accessories', 0, 'End Cap', 'Accessories for aluminium profiles/aap_3/aap_3_1.jpg', 'Accessories for aluminium profiles/aap_3/pa/pa1.jpg'),
(81, 'Profile Accessories', 0, 'End Cap 1830', 'Accessories for aluminium profiles/aap_3/aap_3_2.jpg', 'Accessories for aluminium profiles/aap_3/pa/pa2.jpg'),
(82, 'Profile Accessories', 0, 'T-Slot Cover', 'Accessories for aluminium profiles/aap_3/aap_3_3.jpg', 'Accessories for aluminium profiles/aap_3/pa/pa3.jpg'),
(83, 'Floor Elements', 0, 'Mounting Plate square', 'Accessories for aluminium profiles/aap_4/aap_4_1.jpg', 'Accessories for aluminium profiles/aap_4/floor_e/floor_1.jpg'),
(84, 'Floor Elements', 0, 'Mounting Plate Round', 'Accessories for aluminium profiles/aap_4/aap_4_2.jpg', 'Accessories for aluminium profiles/aap_4/floor_e/floor_2.jpg'),
(85, 'Floor Elements', 0, 'Caster Wheel', 'Accessories for aluminium profiles/aap_4/aap_4_3.jpg', 'Accessories for aluminium profiles/aap_4/floor_e/floor_3.jpg'),
(86, 'Floor Elements', 0, 'Leveller Caster', 'Accessories for aluminium profiles/aap_4/aap_4_4.jpg', 'Accessories for aluminium profiles/aap_4/floor_e/floor_4.jpg'),
(87, 'Floor Elements', 0, 'Die-Cast Foot', 'Accessories for aluminium profiles/aap_4/aap_4_5.jpg', 'Accessories for aluminium profiles/aap_4/floor_e/floor_5.jpg'),
(88, 'Floor Elements', 0, 'Base Angle', 'Accessories for aluminium profiles/aap_4/aap_4_6.jpg', 'Accessories for aluminium profiles/aap_4/floor_e/floor_6.jpg'),
(89, 'Floor Elements', 0, 'Base Angle2', 'Accessories for aluminium profiles/aap_4/aap_4_7.jpg', 'Accessories for aluminium profiles/aap_4/floor_e/floor_7.jpg'),
(90, 'Floor Elements', 0, 'Levelling Base', 'Accessories for aluminium profiles/aap_4/aap_4_8.jpg', 'Accessories for aluminium profiles/aap_4/floor_e/floor_8.jpg'),
(91, 'Panel Installation', 0, 'Panel Mounting Block', 'Accessories for aluminium profiles/aap_5/aap_5_1.jpg', 'Accessories for aluminium profiles/aap_5/pi/pi1.jpg'),
(92, 'Panel Installation', 0, 'Tslot Reducing Profile', 'Accessories for aluminium profiles/aap_5/aap_5_2.jpg', 'Accessories for aluminium profiles/aap_5/pi/pi2.jpg'),
(93, 'Door and Window Accessories', 0, 'Polymer Hinge', 'Accessories for aluminium profiles/aap_6/aap_6_1.jpg', 'Accessories for aluminium profiles/aap_6/dwa/dwa1.jpg'),
(94, 'Door and Window Accessories', 0, 'Aluminium Hinge E01', 'Accessories for aluminium profiles/aap_6/aap_6_2.jpg', 'Accessories for aluminium profiles/aap_6/dwa/dwa2.jpg'),
(95, 'Door and Window Accessories', 0, 'Aluminium Hinge E02', 'Accessories for aluminium profiles/aap_6/aap_6_3.jpg', 'Accessories for aluminium profiles/aap_6/dwa/dwa3.jpg'),
(96, 'Door and Window Accessories', 0, 'Aluminium Hinge E03', 'Accessories for aluminium profiles/aap_6/aap_6_4.jpg', 'Accessories for aluminium profiles/aap_6/dwa/dwa4.jpg'),
(97, 'Door and Window Accessories', 0, 'Polymer Handle', 'Accessories for aluminium profiles/aap_6/aap_6_5.jpg', 'Accessories for aluminium profiles/aap_6/dwa/dwa5.jpg'),
(98, 'Door and Window Accessories', 0, 'Aluminium Handle', 'Accessories for aluminium profiles/aap_6/aap_6_6.jpg', 'Accessories for aluminium profiles/aap_6/dwa/dwa6.jpg'),
(99, 'Additional Accessories', 0, 'Angle Adjuster', 'Accessories for aluminium profiles/aap_7/aap_7_1.jpg', 'Accessories for aluminium profiles/aap_7/aa/aa1.jpg'),
(100, 'Additional Accessories', 0, 'Pivot Joint 40x40', 'Accessories for aluminium profiles/aap_7/aap_7_2.jpg', 'Accessories for aluminium profiles/aap_7/aa/aa2.jpg'),
(101, 'Additional Accessories', 0, 'Pivot Joint 40x80', 'Accessories for aluminium profiles/aap_7/aap_7_3.jpg', 'Accessories for aluminium profiles/aap_7/aa/aa3.jpg'),
(102, 'Additional Accessories', 0, 'Suspended Glider', 'Accessories for aluminium profiles/aap_7/aap_7_4.jpg', 'Accessories for aluminium profiles/aap_7/aa/aa4.jpg'),
(104, 'Aluminium Profile', 0, 'Cable Tray 4444', 'Cable Trays/ct_1/ct_1_1.jpg', 'Cable Trays/ct_1/ap/ap1.jpg'),
(105, 'Aluminium Profile', 0, 'Cable Tray 4488', 'Cable Trays/ct_1/ct_1_2.jpg', 'Cable Trays/ct_1/ap/ap2.jpg'),
(106, 'Aluminium Profile', 0, 'Cable Tray 8888', 'Cable Trays/ct_1/ct_1_3.jpg', 'Cable Trays/ct_1/ap/ap3.jpg'),
(107, 'Connecting Elements of cable trays', 0, 'SMRW20', 'Cable Trays/ct_2/ct_2_1.jpg', 'Cable Trays/ct_2/cec/cec1.jpg'),
(108, 'Connecting Elements of cable trays', 0, 'SMRX20', 'Cable Trays/ct_2/ct_2_2.jpg', 'Cable Trays/ct_2/cec/cec2.jpg'),
(109, 'Connecting Elements of cable trays', 0, 'SMRW 20*40', 'Cable Trays/ct_2/ct_2_3.jpg', 'Cable Trays/ct_2/cec/cec3.jpg'),
(110, 'Connecting Elements of cable trays', 0, 'SLCJ 5*140', 'Cable Trays/ct_2/ct_2_4.jpg', 'Cable Trays/ct_2/cec/cec4.jpg'),
(111, 'Support Structure', 0, 'End Cap', 'Cable Trays/ct_3/ct_3_1.jpg', 'Cable Trays/ct_3/ss/ss1.jpg'),
(112, 'Support Structure', 0, 'HEX Nut', 'Cable Trays/ct_3/ct_3_2.jpg', 'Cable Trays/ct_3/ss/ss2.jpg'),
(113, 'Support Structure', 0, 'T Bolt', 'Cable Trays/ct_3/ct_3_3.jpg', 'Cable Trays/ct_3/ss/ss3.jpg'),
(114, 'Support Structure', 0, 'Rhombus Nut', 'Cable Trays/ct_3/ct_3_4.jpg', 'Cable Trays/ct_3/ss/ss4.jpg'),
(115, 'Support Structure', 0, 'Square Nut', 'Cable Trays/ct_3/ct_3_5.jpg', 'Cable Trays/ct_3/ss/ss5.jpg'),
(116, 'Support Structure', 0, 'Support Bracket', 'Cable Trays/ct_3/ct_3_6.jpg', 'Cable Trays/ct_3/ss/ss6.jpg'),
(117, '25 MM Idler Roller', 0, 'Male thread', 'Rollers/r_1/r_1_1.jpg', 'Rollers/r_1/ir/ir1.jpg'),
(118, '25 MM Idler Roller╥', 0, 'Female thread', 'Rollers/r_1/r_1_2.jpg', 'Rollers/r_1/ir/ir2.jpg'),
(119, '25 MM Idler Roller', 0, 'ACROSS FLAT', 'Rollers/r_1/r_1_3.jpg', 'Rollers/r_1/ir/ir3.jpg'),
(120, '25 MM Idler Roller', 0, 'SPRING LOADED', 'Rollers/r_1/r_1_4.jpg', 'Rollers/r_1/ir/ir4.jpg'),
(121, '25 MM Idler Roller', 0, 'ACROSS FEMALE FLAT', 'Rollers/r_1/r_1_5.jpg', 'Rollers/r_1/ir/ir5.jpg'),
(122, '38 MM Idler Roller', 0, 'Male Thread', 'Rollers/r_2/r_2_1.jpg', 'Rollers/r_2/38ir/38ir1.jpg'),
(123, '38 MM Idler Roller', 0, 'Female Thread', 'Rollers/r_2/r_2_2.jpg', 'Rollers/r_2/38ir/38ir2.jpg'),
(124, '38 MM Idler Roller', 0, 'Across Flat', 'Rollers/r_2/r_2_3.jpg', 'Rollers/r_2/38ir/38ir3.jpg'),
(125, '38 MM Idler Roller', 0, 'Spring Loaded', 'Rollers/r_2/r_2_4.jpg', 'Rollers/r_2/38ir/38ir4.jpg'),
(126, '38 MM Idler Roller', 0, 'Across Flat Female Thread', 'Rollers/r_2/r_2_5.jpg', 'Rollers/r_2/38ir/38ir5.jpg'),
(127, '38 MM Idler Roller', 0, 'PU Coated Roller', 'Rollers/r_2/r_2_6.jpg', 'Rollers/r_2/38ir/38ir6.jpg'),
(128, '50 MM Idler Roller', 0, 'Male Thread', 'Rollers/r_3/r_3_1.jpg', 'Rollers/r_3/50ir/50ir1.jpg'),
(129, '50 MM Idler Roller', 0, 'Female Thread', 'Rollers/r_3/r_3_2.jpg', 'Rollers/r_3/50ir/50ir2.jpg'),
(130, '50 MM Idler Roller', 0, 'Across Flat', 'Rollers/r_3/r_3_3.jpg', 'Rollers/r_3/50ir/50ir3.jpg'),
(131, '50 MM Idler Roller', 0, 'Spring Loaded', 'Rollers/r_3/r_3_4.jpg', 'Rollers/r_3/50ir/50ir4.jpg'),
(132, '50 MM Idler Roller', 0, 'Across Flat Female Thread', 'Rollers/r_3/r_3_5.jpg', 'Rollers/r_3/50ir/50ir5.jpg'),
(133, '50 MM Idler Roller', 0, 'PU coated roller', 'Rollers/r_3/r_3_6.jpg', 'Rollers/r_3/50ir/50ir6.jpg'),
(134, '50 MM Driven roller', 0, 'Sprocket Roller Female Thread', 'Rollers/r_4/r_4_1.jpg', 'Rollers/r_4/50dr/50dr1.jpg'),
(135, '50 MM Driven roller', 0, 'Power free polymer sprocket roller', 'Rollers/r_4/r_4_2.jpg', 'Rollers/r_4/50dr/50dr2.jpg'),
(136, '50 MM Driven roller', 0, 'Power free metal sprocket roller', 'Rollers/r_4/r_4_3.jpg', 'Rollers/r_4/50dr/50dr3.jpg'),
(137, '50 MM Driven roller', 0, 'PolyVee roller', 'Rollers/r_4/r_4_4.jpg', 'Rollers/r_4/50dr/50dr4.jpg'),
(138, '50 MM Driven roller', 0, 'Roller with Grooves', 'Rollers/r_4/r_4_5.jpg', 'Rollers/r_4/50dr/50dr5.jpg'),
(139, 'Taper roller', 1, 'Taper Idler Roller', 'Rollers/r_5/r_5_1.jpg', 'Taper Idler Roller'),
(140, 'Taper roller', 1, 'Taper driven roller', 'Rollers/r_5/r_5_2.jpg', 'Taper driven roller'),
(143, 'Roller conveyor profile', 0, 'Roller conveyor profile', 'Rollers/r_6/r_6_1.jpg', 'Rollers/r_6/rcp/rcp1.jpg'),
(145, '65 mm Flexible', 1, 'Beams', 'Flexible Conveyor/fc_1/fc_1_1.jpeg', 'Beams'),
(146, '65 mm Flexible', 1, 'Chains', 'Flexible Conveyor/fc_1/fc_1_2.jpeg', 'Chains'),
(147, '65 mm Flexible', 1, 'Idler unit', 'Flexible Conveyor/fc_1/fc_1_3.jpeg', 'Idler Unit'),
(148, '65 mm Flexible', 1, 'Drive unit', 'Flexible Conveyor/fc_1/fc_1_4.jpeg', 'Drive Unit'),
(149, '65 mm Flexible', 1, 'Wheel Bends', 'Flexible Conveyor/fc_1/fc_1_5.jpeg', 'Wheel Bends'),
(150, '65 mm Flexible', 1, 'Plain Bends', 'Flexible Conveyor/fc_1/fc_1_6.jpeg', 'Plain Bends'),
(151, '65 mm Flexible', 1, 'Vertical Bends', 'Flexible Conveyor/fc_1/fc_1_7.jpeg', 'Vertical Bends'),
(152, '65 mm Flexible', 1, 'Drip Trays', 'Flexible Conveyor/fc_1/fc_1_8.jpeg', 'Drip Trays'),
(153, '65 mm Flexible', 1, 'Front Piece', 'Flexible Conveyor/fc_1/fc_1_9.jpeg', 'Front Piece'),
(154, '65 mm Flexible', 1, 'Stand system for 65 mm conveyor', 'Flexible Conveyor/fc_1/fc_1_10.jpeg', 'Stand system for 65 mm conveyor'),
(157, '85 mm Flexible', 1, '85 mm Beams', 'Flexible Conveyor/fc_2/fc_2_1.jpeg', '85 mm Beams'),
(158, '85 mm Flexible', 1, '85 mm Chains', 'Flexible Conveyor/fc_2/fc_2_2.jpeg', '85 mm Chains'),
(159, '85 mm Flexible', 1, '85 mm Idler unit', 'Flexible Conveyor/fc_2/fc_2_3.jpeg', '85 mm Idler Unit'),
(160, '85 mm Flexible', 1, '85 mm Drive unit', 'Flexible Conveyor/fc_2/fc_2_4.jpeg', '85 mm Drive Unit'),
(161, '85 mm Flexible', 1, '85 mm Wheel Bends', 'Flexible Conveyor/fc_2/fc_2_5.jpeg', '85 mm Wheel Bends'),
(162, '85 mm Flexible', 1, '85 mm Plain Bends', 'Flexible Conveyor/fc_2/fc_2_6.jpeg', '85 mm Plain Bends'),
(163, '85 mm Flexible', 1, '85 mm Vertical Bends', 'Flexible Conveyor/fc_2/fc_2_7.jpeg', '85 mm Vertical Bends'),
(164, '85 mm Flexible', 1, '85 mm Drip Trays', 'Flexible Conveyor/fc_2/fc_2_8.jpeg', '85 mm Drip Trays'),
(165, '85 mm Flexible', 1, '85 mm Front Piece', 'Flexible Conveyor/fc_2/fc_2_9.jpeg', '85 mm Front Piece'),
(166, '85 mm Flexible', 1, 'Stand system for 65 mm conveyor', 'Flexible Conveyor/fc_2/fc_2_10.jpeg', 'Stand system for 85 mm conveyor'),
(167, '105 mm Flexible', 1, '105 mm Beams', 'Flexible Conveyor/fc_3/fc_3_1.jpeg', '105 mm Beams'),
(168, '105 mm Flexible', 1, '105 mm Chains', 'Flexible Conveyor/fc_3/fc_3_2.jpeg', '105 mm Chains'),
(169, '105 mm Flexible', 1, '105 mm Idler unit', 'Flexible Conveyor/fc_3/fc_3_3.jpeg', '105 mm Idler Unit'),
(170, '105 mm Flexible', 1, '105 mm Drive unit', 'Flexible Conveyor/fc_3/fc_3_4.jpeg', '105 mm Drive Unit'),
(171, '105 mm Flexible', 1, '105 mm Wheel Bends', 'Flexible Conveyor/fc_3/fc_3_5.jpeg', '105 mm Wheel Bends'),
(172, '105 mm Flexible', 1, '105 mm Plain Bends', 'Flexible Conveyor/fc_3/fc_3_6.jpeg', '105 mm Plain Bends'),
(173, '105 mm Flexible', 1, '105 mm Vertical Bends', 'Flexible Conveyor/fc_3/fc_3_7.jpeg', '105 mm Vertical Bends'),
(174, '105 mm Flexible', 1, '105 mm Drip Trays', 'Flexible Conveyor/fc_3/fc_3_8.jpeg', '105 mm Drip Trays'),
(175, '105 mm Flexible', 1, '105 mm Front Piece', 'Flexible Conveyor/fc_3/fc_3_9.jpeg', '105 mm Front Piece'),
(176, '105 mm Flexible', 1, 'Stand system for 105 mm conveyor', 'Flexible Conveyor/fc_3/fc_3_10.jpeg', 'Stand system for 105 mm conveyor'),
(177, '300 mm Flexible', 1, '300 mm Beams', 'Flexible Conveyor/fc_4/fc_4_1.jpg', '300 mm Beams'),
(178, '300 mm Flexible', 1, '300 mm Chains', 'Flexible Conveyor/fc_4/fc_4_2.jpg', '300 mm Chains'),
(179, '300 mm Flexible', 1, '300 mm Idler unit', 'Flexible Conveyor/fc_4/fc_4_3.jpg', '300 mm Idler Unit'),
(180, '300 mm Flexible', 1, '300 mm Drive unit', 'Flexible Conveyor/fc_4/fc_4_4.jpg', '300 mm Drive Unit'),
(181, '300 mm Flexible', 1, '300 mm Plain Bends', 'Flexible Conveyor/fc_4/fc_4_5.jpg', '300 mm Plain Bends'),
(182, '300 mm Flexible', 1, '300 mm Vertical Bends', 'Flexible Conveyor/fc_4/fc_4_6.jpg', '300 mm Vertical Bends'),
(183, '300 mm Flexible', 1, 'Stand system for 300 mm conveyor', 'Flexible Conveyor/fc_4/fc_4_7.jpg', 'Stand system for 300 mm conveyor'),
(184, 'Guides for flexible conveyor', 0, 'Guide system 220.1', 'Flexible Conveyor/fc_5/fc_5_1.jpg', 'Flexible Conveyor/fc_5/fc_5_1/fc_5_1_1.jpg'),
(185, 'Guides for flexible conveyor', 0, 'Guide system 220.2', 'Flexible Conveyor/fc_5/fc_5_2.jpg', 'Flexible Conveyor/fc_5/fc_5_2/fc_5_2_1.jpg'),
(186, 'Guides for flexible conveyor', 0, 'side bracket 1', 'Flexible Conveyor/fc_5/fc_5_3.jpg', 'Flexible Conveyor/fc_5/fc_5_3/fc_5_3_1.jpg'),
(187, 'Guides for flexible conveyor', 0, 'side bracket 2', 'Flexible Conveyor/fc_5/fc_5_4.jpg', 'Flexible Conveyor/fc_5/fc_5_4/fc_5_4_1.jpg'),
(188, 'Width actuator 660 mm', 0, 'Width actuator 660 mm', 'Flexible Conveyor/fc_6/fc_6_1.jpg', 'Flexible Conveyor/fc_6/fc_6_1/fc_6_1_1.jpg\r\n'),
(189, '40 MM Series', 1, 'Conveyor', 'ebc/ebc_1/ebc_1_1.jpeg', 'Conveyor'),
(190, '40 MM Series', 1, 'Guides', 'ebc/ebc_1/ebc_1_2.jpeg', 'Guides'),
(191, '40 MM Series', 1, 'Stands', 'ebc/ebc_1/ebc_1_3.jpeg', 'Stands'),
(192, '60 MM Series', 1, '60 mm Conveyor', 'ebc/ebc_2/ebc_2_1.jpeg', '60 mm Conveyor'),
(193, '60 MM Series', 1, '60 mm Guides', 'ebc/ebc_2/ebc_2_2.jpeg', '60 mm Guides'),
(194, '60 MM Series', 1, '60 mm Stands', 'ebc/ebc_2/ebc_2_3.jpeg', '60 mm Stands'),
(195, '80 MM Series', 1, '80 mm Conveyor', 'ebc/ebc_3/ebc_3_1.jpeg', '80 mm Conveyor'),
(196, '80 MM Series', 1, '80 mm Guides', 'ebc/ebc_3/ebc_3_2.jpeg', '80 mm Guides'),
(197, '80 MM Series', 1, '80 mm Stands', 'ebc/ebc_3/ebc_3_3.jpeg', '80 mm Stands'),
(198, 'Conveyor Guides', 0, 'T Clamp', 'Conveyor Guides/cg_1.jpg', 'Conveyor Guides/cg_file/cgf1.jpg'),
(199, 'Conveyor Guides', 0, 'Cross Clamp', 'Conveyor Guides/cg_2.jpg', 'Conveyor Guides/cg_file/cgf2.jpg'),
(200, 'Conveyor Guides', 0, 'Guide rail Clamp S2823', 'Conveyor Guides/cg_3.jpg', 'Conveyor Guides/cg_file/cgf3.jpg'),
(201, 'Conveyor Guides', 0, 'Guide rail Clamp S5025', 'Conveyor Guides/cg_4.jpg', 'Conveyor Guides/cg_file/cgf4.jpg'),
(202, 'Conveyor Guides', 0, 'Guide rail Clamp D50', 'Conveyor Guides/cg_5.jpg', 'Conveyor Guides/cg_file/cgf5.jpg'),
(203, 'Conveyor Guides', 0, 'Guide rail Clamp D100', 'Conveyor Guides/cg_6.jpg', 'Conveyor Guides/cg_file/cgf6.jpg'),
(204, 'Conveyor Guides', 0, 'Side Bracket 215.50', 'Conveyor Guides/cg_7.jpg', 'Conveyor Guides/cg_file/cgf7.jpg'),
(205, 'Conveyor Guides', 0, 'CSide Bracket 215.30', 'Conveyor Guides/cg_8.jpg', 'Conveyor Guides/cg_file/cgf8.jpg'),
(206, 'Conveyor Guides', 0, 'Side Bracket 150.30.L1', 'Conveyor Guides/cg_9.jpg', 'Conveyor Guides/cg_file/cgf9.jpg'),
(207, 'Conveyor Guides', 0, 'Sensor Bracket', 'Conveyor Guides/cg_10.jpg', 'Conveyor Guides/cg_file/cgf10.jpg'),
(208, 'Conveyor Guides', 0, 'Aluminium Guide 1', 'Conveyor Guides/cg_11.jpg', 'Conveyor Guides/cg_file/cgf11.jpg'),
(209, 'Conveyor Guides', 0, 'Aluminium Guide 2', 'Conveyor Guides/cg_12.jpg', 'Conveyor Guides/cg_file/cgf12.jpg'),
(210, 'Conveyor Guides', 0, 'SPROCKET PA', 'Conveyor Guides/cg_13.jpg', 'Conveyor Guides/cg_file/cgf13.jpg'),
(211, 'Conveyor Guides', 0, 'SPROCKET SS', 'Conveyor Guides/cg_14.jpg', 'Conveyor Guides/cg_file/cgf14.jpg'),
(212, 'Conveyor Guides', 0, 'Roller', 'Conveyor Guides/cg_15.jpg', 'Conveyor Guides/cg_file/cgf15.jpg'),
(213, 'Conveyor Guides', 0, 'Support Bracket 1', 'Conveyor Guides/cg_16.jpg', 'Conveyor Guides/cg_file/cgf16.jpg'),
(214, 'Conveyor Guides', 0, 'Support Bracket 2', 'Conveyor Guides/cg_17.jpg', 'Conveyor Guides/cg_file/cgf17.jpg'),
(215, 'Conveyor Guides', 0, 'Side Bracket 1', 'Conveyor Guides/cg_18.jpg', 'Conveyor Guides/cg_file/cgf18.jpg'),
(216, 'Conveyor Guides', 0, 'Side Bracket 2', 'Conveyor Guides/cg_19.jpg', 'Conveyor Guides/cg_file/cgf19.jpg'),
(217, 'Conveyor Guides', 0, 'Guide Rail', 'Conveyor Guides/cg_20.jpg', 'Conveyor Guides/cg_file/cgf20.jpg'),
(218, 'Conveyor Guides', 0, 'SS Components', 'Conveyor Guides/cg_21.jpg', 'Conveyor Guides/cg_file/cgf21.jpg'),
(219, 'WL210', 1, 'Beam 210', 'WL Series/wl_1/wl_1_1.jpg', 'Beam 210'),
(220, 'WL210', 1, 'Chain 210', 'WL Series/wl_1/wl_1_2.jpg', 'Chain 210'),
(221, 'WL210', 1, 'Drive Unit 210', 'WL Series/wl_1/wl_1_3.jpg', 'Drive Unit 210'),
(222, 'WL210', 1, 'Idler Unit 210', 'WL Series/wl_1/wl_1_4.jpg', 'Idler Unit 210'),
(223, 'WL210', 1, 'Plain Bends 210', 'WL Series/wl_1/wl_1_5.jpg', 'Plain Bends 210'),
(224, 'WL210', 1, 'Vertical Bends 210', 'WL Series/wl_1/wl_1_6.jpg', 'Vertical Bends 210'),
(225, 'WL210', 1, 'Stands 210', 'WL Series/wl_1/wl_1_7.jpg', 'Stands 210'),
(226, 'WL322', 1, 'Beam 322', 'WL Series/wl_2/wl_2_1.jpg', 'Beam 322'),
(227, 'WL322', 1, 'Chain 322', 'WL Series/wl_2/wl_2_2.jpg', 'Chain 322'),
(228, 'WL322', 1, 'Drive Unit 322', 'WL Series/wl_2/wl_2_3.jpg', 'Drive Unit 322'),
(229, 'WL322', 1, 'Idler Unit 322', 'WL Series/wl_2/wl_2_4.jpg', 'Idler Unit 322'),
(230, 'WL322', 1, 'Plain Bends 322', 'WL Series/wl_2/wl_2_5.jpg', 'Plain Bends 322'),
(231, 'WL322', 1, 'Vertical Bends 322', 'WL Series/wl_2/wl_2_6.jpg', 'Vertical Bends 322'),
(232, 'WL322', 1, 'Stands 322', 'WL Series/wl_2/wl_2_7.jpg', 'Stands 322'),
(233, 'WL424', 1, 'Beam 424', 'WL Series/wl_3/wl_3_1.jpg', 'Beam 424'),
(234, 'WL424', 1, 'Chain 424', 'WL Series/wl_3/wl_3_2.jpg', 'Chain 424'),
(235, 'WL424', 1, 'Drive Unit 424', 'WL Series/wl_3/wl_3_3.jpg', 'Drive Unit 424'),
(236, 'WL424', 1, 'Idler Unit 424', 'WL Series/wl_3/wl_3_4.jpg', 'Idler Unit 424'),
(237, 'WL424', 1, 'Plain Bends 424', 'WL Series/wl_3/wl_3_5.jpg', 'Plain Bends 424'),
(238, 'WL424', 1, 'Vertical Bends 424', 'WL Series/wl_3/wl_3_6.jpg', 'Vertical Bends 424'),
(239, 'WL424', 1, 'Stands 424', 'WL Series/wl_3/wl_3_7.jpg', 'Stands 424 '),
(240, 'WL525', 1, 'Beam 525', 'WL Series/wl_4/wl_4_1.jpg', 'Beam 525'),
(241, 'WL525', 1, 'Chain 525', 'WL Series/wl_4/wl_4_2.jpg', 'Chain 525'),
(242, 'WL525', 1, 'Drive Unit 525', 'WL Series/wl_4/wl_4_3.jpg', 'Drive Unit 525'),
(243, 'WL525', 1, 'Idler Unit 525', 'WL Series/wl_4/wl_4_4.jpg', 'Idler Unit 525'),
(244, 'WL525', 1, 'Plain Bends 525', 'WL Series/wl_4/wl_4_5.jpg', 'Plain Bends 525'),
(245, 'WL525', 1, 'Vertical Bends 525', 'WL Series/wl_4/wl_4_6.jpg', 'Vertical Bends 525'),
(246, 'WL525', 1, 'Stands 525', 'WL Series/wl_4/wl_4_7.jpg', 'Stands 525'),
(247, 'WL626', 1, 'Beam 626', 'WL Series/wl_5/wl_5_1.jpg', 'Beam 626'),
(248, 'WL626', 1, 'Chain 626', 'WL Series/wl_5/wl_5_2.jpg', 'Chain 626'),
(249, 'WL626', 1, 'Drive Unit 626', 'WL Series/wl_5/wl_5_3.jpg', 'Drive Unit 626'),
(250, 'WL626', 1, 'Idler Unit 626', 'WL Series/wl_5/wl_5_4.jpg', 'Idler Unit 626'),
(251, 'WL626', 1, 'Plain Bends 626', 'WL Series/wl_5/wl_5_5.jpg', 'Plain Bends 626'),
(252, 'WL626', 1, 'Vertical Bends 626', 'WL Series/wl_5/wl_5_6.jpg', 'Vertical Bends 626'),
(253, 'WL626', 1, 'Stands 626', 'WL Series/wl_5/wl_5_7.jpg', 'Stands 626');

-- --------------------------------------------------------

--
-- Table structure for table `pro_master2`
--

CREATE TABLE `pro_master2` (
  `SR.no` int(255) NOT NULL,
  `pro_part2` varchar(40) NOT NULL,
  `pro_pdf_img` varchar(100) NOT NULL,
  `pro_pdf_name` varchar(100) NOT NULL,
  `pro_pdf_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_master2`
--

INSERT INTO `pro_master2` (`SR.no`, `pro_part2`, `pro_pdf_img`, `pro_pdf_name`, `pro_pdf_file`) VALUES
(1, 'Taper driven roller', 'Rollers/r_5/r_5_2/r_5_2_1.jpg', 'Taper roller with metal sprocket', 'Rollers/r_5/r_5_2/tdr/tdr1.jpg'),
(2, 'Taper driven roller', 'Rollers/r_5/r_5_2/r_5_2_2.jpg', 'Trapered Roller With PolyVee Drive Head', 'Rollers/r_5/r_5_2/tdr/tdr2.jpg'),
(3, 'Taper Idler Roller', 'Rollers/r_5/r_5_1/r_5_1_1.jpg', 'Taper roller female', 'Rollers/r_5/r_5_1/tir/tir1.jpg'),
(4, 'Taper Idler Roller', 'Rollers/r_5/r_5_1/r_5_1_2.jpg', 'Taper roller male', 'Rollers/r_5/r_5_1/tir/tir2.jpg'),
(6, 'Beams', 'Flexible Conveyor/fc_1/fc_1_1/fc_1_1_1.jpg', 'Conveyor Beam', 'Flexible Conveyor/fc_1/fc_1_1/beams/beam1.jpg'),
(7, 'Beams', 'Flexible Conveyor/fc_1/fc_1_1/fc_1_1_2.jpg', 'Split beam', 'Flexible Conveyor/fc_1/fc_1_1/beams/beam2.jpg'),
(8, 'Beams', 'Flexible Conveyor/fc_1/fc_1_1/fc_1_1_3.jpg', 'Slide Rail', 'Flexible Conveyor/fc_1/fc_1_1/beams/beam3.jpg'),
(9, 'Beams', 'Flexible Conveyor/fc_1/fc_1_1/fc_1_1_4.jpg', 'Beam Section for Chain', 'Flexible Conveyor/fc_1/fc_1_1/beams/beam4.jpg'),
(10, 'Beams', 'Flexible Conveyor/fc_1/fc_1_1/fc_1_1_5.jpg', 'Connecting strip', 'Flexible Conveyor/fc_1/fc_1_1/beams/beam4.jpg'),
(11, 'Chains', 'Flexible Conveyor/fc_1/fc_1_2/fc_1_2_1.jpg', 'SLTL65', 'Flexible Conveyor/fc_1/fc_1_2/cha/cha1.jpg'),
(12, 'Chains', 'Flexible Conveyor/fc_1/fc_1_2/fc_1_2_2.jpg', 'SLTL65A', 'Flexible Conveyor/fc_1/fc_1_2/cha/cha2.jpg'),
(13, 'Chains', 'Flexible Conveyor/fc_1/fc_1_2/fc_1_2_3.jpg', 'SLTL65B', 'Flexible Conveyor/fc_1/fc_1_2/cha/cha3.jpg'),
(14, 'Chains', 'Flexible Conveyor/fc_1/fc_1_2/fc_1_2_4.jpg', 'SLTL65C', 'Flexible Conveyor/fc_1/fc_1_2/cha/cha4.jpg'),
(15, 'Chains', 'Flexible Conveyor/fc_1/fc_1_2/fc_1_2_5.jpg', 'SLTL65D', 'Flexible Conveyor/fc_1/fc_1_2/cha/cha5.jpg'),
(16, 'Chains', 'Flexible Conveyor/fc_1/fc_1_2/fc_1_2_6.jpg', 'SLTL65E', 'Flexible Conveyor/fc_1/fc_1_2/cha/cha6.jpg'),
(17, 'Chains', 'Flexible Conveyor/fc_1/fc_1_2/fc_1_2_7.jpg', 'SLTL65F', 'Flexible Conveyor/fc_1/fc_1_2/cha/cha7.jpg'),
(18, 'Chains', 'Flexible Conveyor/fc_1/fc_1_2/fc_1_2_8.jpg', 'SR39465', 'Flexible Conveyor/fc_1/fc_1_2/cha/cha8.jpg'),
(19, 'Chains', 'Flexible Conveyor/fc_1/fc_1_2/fc_1_2_9.jpg', 'SL39465', 'Flexible Conveyor/fc_1/fc_1_2/cha/cha9.jpg'),
(21, 'Idler Unit', 'Flexible Conveyor/fc_1/fc_1_3/fc_1_3_1.jpg', '65mm Idler Unit', 'Flexible Conveyor/fc_1/fc_1_3/fc_1_3_1/fc_1_3_1.jpg'),
(22, 'Drive Unit', 'Flexible Conveyor/fc_1/fc_1_4/fc_1_4_1.jpg', '65mm Drive Unit G', 'Flexible Conveyor/fc_1/fc_1_4/du/du1.jpg'),
(23, 'Drive Unit', 'Flexible Conveyor/fc_1/fc_1_4/fc_1_4_2.jpg', '65mm Drive Unit', 'Flexible Conveyor/fc_1/fc_1_4/du/du2.jpg'),
(24, 'Wheel Bends', 'Flexible Conveyor/fc_1/fc_1_5/fc_1_5_1.jpg', 'Wheel Bend 30 degree', 'Flexible Conveyor/fc_1/fc_1_5/wb/wb1.jpg'),
(25, 'Wheel Bends', 'Flexible Conveyor/fc_1/fc_1_5/fc_1_5_2.jpg', 'Wheel Bend 45 degree', 'Flexible Conveyor/fc_1/fc_1_5/wb/wb2.jpg'),
(26, 'Wheel Bends', 'Flexible Conveyor/fc_1/fc_1_5/fc_1_5_3.jpg', 'Wheel Bend 60 degree', 'Flexible Conveyor/fc_1/fc_1_5/wb/wb3.jpg'),
(27, 'Wheel Bends', 'Flexible Conveyor/fc_1/fc_1_5/fc_1_5_4.jpg', 'Wheel Bend 90 degree', 'Flexible Conveyor/fc_1/fc_1_5/wb/wb4.jpg'),
(28, 'Wheel Bends', 'Flexible Conveyor/fc_1/fc_1_5/fc_1_5_5.jpg', 'Wheel Bend 120 degree', 'Flexible Conveyor/fc_1/fc_1_5/wb/wb5.jpg'),
(29, 'Wheel Bends', 'Flexible Conveyor/fc_1/fc_1_5/fc_1_5_6.jpg', 'Wheel Bend 180 degree', 'Flexible Conveyor/fc_1/fc_1_5/wb/wb6.jpg'),
(30, 'Plain Bends', 'Flexible Conveyor/fc_1/fc_1_6/fc_1_6_1.jpg', 'Plain Bends 30 degree', 'Flexible Conveyor/fc_1/fc_1_6/pb/pb1.jpg'),
(31, 'Plain Bends', 'Flexible Conveyor/fc_1/fc_1_6/fc_1_6_2.jpg', 'Plain Bends 45 degree', 'Flexible Conveyor/fc_1/fc_1_6/pb/pb2.jpg'),
(32, 'Plain Bends', 'Flexible Conveyor/fc_1/fc_1_6/fc_1_6_3.jpg', 'Plain Bends 60 degree', 'Flexible Conveyor/fc_1/fc_1_6/pb/pb3.jpg'),
(33, 'Plain Bends', 'Flexible Conveyor/fc_1/fc_1_6/fc_1_6_3.jpg', 'Plain Bends 90 degree', 'Flexible Conveyor/fc_1/fc_1_6/pb/pb4.jpg'),
(34, 'Vertical Bends', 'Flexible Conveyor/fc_1/fc_1_7/fc_1_7_1.jpg', 'Vertical Bend 5degree', 'Flexible Conveyor/fc_1/fc_1_7/vb/vb1.jpg'),
(35, 'Vertical Bends', 'Flexible Conveyor/fc_1/fc_1_7/fc_1_7_2.jpg', 'Vertical Bend 7degree', 'Flexible Conveyor/fc_1/fc_1_7/vb/vb2.jpg'),
(36, 'Vertical Bends', 'Flexible Conveyor/fc_1/fc_1_7/fc_1_7_3.jpg', 'Vertical Bend 15degree', 'Flexible Conveyor/fc_1/fc_1_7/vb/vb3.jpg'),
(37, 'Vertical Bends', 'Flexible Conveyor/fc_1/fc_1_7/fc_1_7_4.jpg', 'Vertical Bend 30degree', 'Flexible Conveyor/fc_1/fc_1_7/vb/vb4.jpg'),
(38, 'Vertical Bends', 'Flexible Conveyor/fc_1/fc_1_7/fc_1_7_5.jpg', 'Vertical Bend 45degree', 'Flexible Conveyor/fc_1/fc_1_7/vb/vb5.jpg'),
(39, 'Vertical Bends', 'Flexible Conveyor/fc_1/fc_1_7/fc_1_7_6.jpg', 'Vertical Bend 60degree', 'Flexible Conveyor/fc_1/fc_1_7/vb/vb6.jpg'),
(40, 'Vertical Bends', 'Flexible Conveyor/fc_1/fc_1_7/fc_1_7_7.jpg', 'Vertical Bend 90degree', 'Flexible Conveyor/fc_1/fc_1_7/vb/vb7.jpg'),
(41, 'Drip Trays', 'Flexible Conveyor/fc_1/fc_1_8/fc_1_8_1.jpg', 'Drip Trays Aluminium', 'Flexible Conveyor/fc_1/fc_1_8/dt/dt1.jpg'),
(42, 'Drip Trays', 'Flexible Conveyor/fc_1/fc_1_8/fc_1_8_2.jpg', 'Drip Trays Bracket', 'Flexible Conveyor/fc_1/fc_1_8/dt/dt2.jpg'),
(43, 'Drip Trays', 'Flexible Conveyor/fc_1/fc_1_8/fc_1_8_3.jpg', 'Drip Trays Connector', 'Flexible Conveyor/fc_1/fc_1_8/dt/dt3.jpg'),
(44, 'Front Piece', 'Flexible Conveyor/fc_1/fc_1_9/fc_1_9_1.jpg', 'Front Piece Aluminium', 'Flexible Conveyor/fc_1/fc_1_9/fp/fp1.jpg'),
(45, 'Front Piece', 'Flexible Conveyor/fc_1/fc_1_9/fc_1_9_2.jpg', 'Front Piece Lower Bend', 'Flexible Conveyor/fc_1/fc_1_9/fp/fp2.jpg'),
(46, 'Front Piece', 'Flexible Conveyor/fc_1/fc_1_9/fc_1_9_3.jpg', 'Front Piece Sliding', 'Flexible Conveyor/fc_1/fc_1_9/fp/fp3.jpg'),
(47, 'Front Piece', 'Flexible Conveyor/fc_1/fc_1_9/fc_1_9_4.jpg', 'Front Piece Upper Bend', 'Flexible Conveyor/fc_1/fc_1_9/fp/fp4.jpg'),
(53, 'Stand system for 65 mm conveyor', 'Flexible Conveyor/fc_1/fc_1_10/fc_1_10_1.jpg', 'Conveyor Stand system A', 'Flexible Conveyor/fc_1/fc_1_10/ssc/ssc1.jpg'),
(54, 'Stand system for 65 mm conveyor', 'Flexible Conveyor/fc_1/fc_1_10/fc_1_10_2.jpg', 'Beam support bracket SLC565', 'Flexible Conveyor/fc_1/fc_1_10/ssc/ssc2.jpg'),
(55, 'Stand system for 65 mm conveyor', 'Flexible Conveyor/fc_1/fc_1_10/fc_1_10_3.jpg', 'Die-cast foot 64 x 64', 'Flexible Conveyor/fc_1/fc_1_10/ssc/ssc3.jpg'),
(56, 'Stand system for 65 mm conveyor', 'Flexible Conveyor/fc_1/fc_1_10/fc_1_10_4.jpg', 'Conveyor Stand system B', 'Flexible Conveyor/fc_1/fc_1_10/ssc/ssc4.jpg'),
(57, 'Stand system for 65 mm conveyor', 'Flexible Conveyor/fc_1/fc_1_10/fc_1_10_5.jpg', 'Support bracket slct 21.100.40', 'Flexible Conveyor/fc_1/fc_1_10/ssc/ssc5.jpg'),
(58, 'Stand system for 65 mm conveyor', 'Flexible Conveyor/fc_1/fc_1_10/fc_1_10_6.jpg', 'Fastening element for conveyor stand', 'Flexible Conveyor/fc_1/fc_1_10/ssc/ssc6.jpg'),
(59, '85 mm Beams', 'Flexible Conveyor/fc_2/fc_2_1/fc_1_2_1.jpg', 'Conveyor Beam', 'Flexible Conveyor/fc_2/fc_2_1/beams/beam1.jpg'),
(60, '85 mm Beams', 'Flexible Conveyor/fc_2/fc_2_1/fc_1_2_2.jpg', 'Split beam', 'Flexible Conveyor/fc_2/fc_2_1/beams/beam2.jpg'),
(61, '85 mm Beams', 'Flexible Conveyor/fc_2/fc_2_1/fc_1_2_3.jpg', 'Slide Rail', 'Flexible Conveyor/fc_2/fc_2_1/beams/beam3.jpg'),
(62, '85 mm Beams', 'Flexible Conveyor/fc_2/fc_2_1/fc_1_2_4.jpg', 'Beam Section for Chain', 'Flexible Conveyor/fc_2/fc_2_1/beams/beam4.jpg'),
(63, '85 mm Beams', 'Flexible Conveyor/fc_2/fc_2_1/fc_1_2_5.jpg', 'Connecting strip', 'Flexible Conveyor/fc_2/fc_2_1/beams/beam4.jpg'),
(64, '85 mm Chains', 'Flexible Conveyor/fc_2/fc_2_2/fc_2_2_1.jpg', 'SMTL85', 'Flexible Conveyor/fc_2/fc_2_2/cha/cha1.jpg'),
(65, '85 mm Chains', 'Flexible Conveyor/fc_2/fc_2_2/fc_2_2_2.jpg', 'SMTL85A', 'Flexible Conveyor/fc_2/fc_2_2/cha/cha2.jpg'),
(66, '85 mm Chains', 'Flexible Conveyor/fc_2/fc_2_2/fc_2_2_3.jpg', 'SMTL85B', 'Flexible Conveyor/fc_2/fc_2_2/cha/cha3.jpg'),
(67, '85 mm Chains', 'Flexible Conveyor/fc_2/fc_2_2/fc_2_2_4.jpg', 'SMTL85C', 'Flexible Conveyor/fc_2/fc_2_2/cha/cha4.jpg'),
(68, '85 mm Chains', 'Flexible Conveyor/fc_2/fc_2_2/fc_2_2_5.jpg', 'SMTL85D', 'Flexible Conveyor/fc_2/fc_2_2/cha/cha5.jpg'),
(69, '85 mm Chains', 'Flexible Conveyor/fc_2/fc_2_2/fc_2_2_6.jpg', 'SMTL85E', 'Flexible Conveyor/fc_2/fc_2_2/cha/cha6.jpg'),
(70, '85 mm Chains', 'Flexible Conveyor/fc_2/fc_2_2/fc_2_2_7.jpg', 'SMTL85F', 'Flexible Conveyor/fc_2/fc_2_2/cha/cha7.jpg'),
(71, '85 mm Chains', 'Flexible Conveyor/fc_2/fc_2_2/fc_2_2_8.jpg', 'SMTL85FA', 'Flexible Conveyor/fc_2/fc_2_2/cha/cha8.jpg'),
(72, '85 mm Chains', 'Flexible Conveyor/fc_2/fc_2_2/fc_2_2_9.jpg', 'SMTL85U', 'Flexible Conveyor/fc_2/fc_2_2/cha/cha9.jpg'),
(73, '85 mm Idler Unit', 'Flexible Conveyor/fc_2/fc_2_3/fc_2_3_1.jpg', '85mm Idler Unit', 'Flexible Conveyor/fc_2/fc_2_3/ieu/ieu.jpg'),
(74, '85 mm Drive Unit', 'Flexible Conveyor/fc_2/fc_2_4/fc_2_4_1.jpg', '85mm Drive Unit G', 'Flexible Conveyor/fc_2/fc_2_4/du/du1.jpg'),
(75, '85 mm Drive Unit', 'Flexible Conveyor/fc_2/fc_2_4/fc_2_4_2.jpg', '85mm Drive Unit', 'Flexible Conveyor/fc_2/fc_2_4/du/du2.jpg'),
(76, '85 mm Wheel Bends', 'Flexible Conveyor/fc_2/fc_2_5/fc_2_5_1.jpg', 'Wheel Bend 30 degree', 'Flexible Conveyor/fc_2/fc_2_5/wb/wb1.jpg'),
(77, '85 mm Wheel Bends', 'Flexible Conveyor/fc_2/fc_2_5/fc_2_5_2.jpg', 'Wheel Bend 45 degree', 'Flexible Conveyor/fc_2/fc_2_5/wb/wb2.jpg'),
(78, '85 mm Wheel Bends', 'Flexible Conveyor/fc_2/fc_2_5/fc_2_5_3.jpg', 'Wheel Bend 60 degree', 'Flexible Conveyor/fc_2/fc_2_5/wb/wb3.jpg'),
(79, '85 mm Wheel Bends', 'Flexible Conveyor/fc_2/fc_2_5/fc_2_5_4.jpg', 'Wheel Bend 90 degree', 'Flexible Conveyor/fc_2/fc_2_5/wb/wb4.jpg'),
(80, '85 mm Wheel Bends', 'Flexible Conveyor/fc_2/fc_2_5/fc_2_5_5.jpg', 'Wheel Bend 120 degree', 'Flexible Conveyor/fc_2/fc_2_5/wb/wb5.jpg'),
(81, '85 mm Wheel Bends', 'Flexible Conveyor/fc_2/fc_2_5/fc_2_5_6.jpg', 'Wheel Bend 180 degree', 'Flexible Conveyor/fc_2/fc_2_5/wb/wb6.jpg'),
(82, '85 mm Plain Bends', 'Flexible Conveyor/fc_2/fc_2_6/fc_2_6_1.jpg', 'Plain Bends 30 degree', 'Flexible Conveyor/fc_2/fc_2_6/pb/pb1.jpg'),
(83, '85 mm Plain Bends', 'Flexible Conveyor/fc_2/fc_2_6/fc_2_6_2.jpg', 'Plain Bends 45 degree', 'Flexible Conveyor/fc_2/fc_2_6/pb/pb2.jpg'),
(84, '85 mm Plain Bends', 'Flexible Conveyor/fc_2/fc_2_6/fc_2_6_3.jpg', 'Plain Bends 60 degree', 'Flexible Conveyor/fc_2/fc_2_6/pb/pb3.jpg'),
(85, '85 mm Plain Bends', 'Flexible Conveyor/fc_2/fc_2_6/fc_2_6_3.jpg', 'Plain Bends 90 degree', 'Flexible Conveyor/fc_2/fc_2_6/pb/pb4.jpg'),
(86, '85 mm Vertical Bends', 'Flexible Conveyor/fc_2/fc_2_7/fc_2_7_1.jpg', 'Vertical Bend 5degree', 'Flexible Conveyor/fc_2/fc_2_7/vb/vb1.jpg'),
(87, '85 mm Vertical Bends', 'Flexible Conveyor/fc_2/fc_2_7/fc_2_7_2.jpg', 'Vertical Bend 7degree', 'Flexible Conveyor/fc_2/fc_2_7/vb/vb2.jpg'),
(88, '85 mm Vertical Bends', 'Flexible Conveyor/fc_2/fc_2_7/fc_2_7_3.jpg', 'Vertical Bend 15degree', 'Flexible Conveyor/fc_2/fc_2_7/vb/vb3.jpg'),
(89, '85 mm Vertical Bends', 'Flexible Conveyor/fc_2/fc_2_7/fc_2_7_4.jpg', 'Vertical Bend 30degree', 'Flexible Conveyor/fc_2/fc_2_7/vb/vb4.jpg'),
(90, '85 mm Vertical Bends', 'Flexible Conveyor/fc_2/fc_2_7/fc_2_7_5.jpg', 'Vertical Bend 45degree', 'Flexible Conveyor/fc_2/fc_2_7/vb/vb5.jpg'),
(91, '85 mm Vertical Bends', 'Flexible Conveyor/fc_2/fc_2_7/fc_2_7_6.jpg', 'Vertical Bend 60degree', 'Flexible Conveyor/fc_2/fc_2_7/vb/vb6.jpg'),
(92, '85 mm Vertical Bends', 'Flexible Conveyor/fc_2/fc_2_7/fc_2_7_7.jpg', 'Vertical Bend 90degree', 'Flexible Conveyor/fc_2/fc_2_7/vb/vb7.jpg'),
(93, '85 mm Drip Trays', 'Flexible Conveyor/fc_2/fc_2_8/fc_2_8_1.jpg', 'Drip Trays Aluminium', 'Flexible Conveyor/fc_2/fc_2_8/dt/dt1.jpg'),
(94, '85 mm Drip Trays', 'Flexible Conveyor/fc_2/fc_2_8/fc_2_8_2.jpg', 'Drip Trays Bracket', 'Flexible Conveyor/fc_2/fc_2_8/dt/dt2.jpg'),
(95, '85 mm Drip Trays', 'Flexible Conveyor/fc_2/fc_2_8/fc_2_8_3.jpg', 'Drip Trays Connector', 'Flexible Conveyor/fc_2/fc_2_8/dt/dt3.jpg'),
(96, '85 mm Front Piece', 'Flexible Conveyor/fc_2/fc_2_9/fc_2_9_1.jpg', 'Front Piece Aluminium', 'Flexible Conveyor/fc_2/fc_2_9/fp/fp1.jpg'),
(97, '85 mm Front Piece', 'Flexible Conveyor/fc_2/fc_2_9/fc_2_9_2.jpg', 'Front Piece Lower Bend', 'Flexible Conveyor/fc_2/fc_2_9/fp/fp2.jpg'),
(98, '85 mm Front Piece', 'Flexible Conveyor/fc_2/fc_2_9/fc_2_9_3.jpg', 'Front Piece Sliding', 'Flexible Conveyor/fc_2/fc_2_9/fp/fp3.jpg'),
(99, '85 mm Front Piece', 'Flexible Conveyor/fc_2/fc_2_9/fc_2_9_4.jpg', 'Front Piece Upper Bend', 'Flexible Conveyor/fc_2/fc_2_9/fp/fp4.jpg'),
(100, 'Stand system for 85 mm conveyor', 'Flexible Conveyor/fc_2/fc_2_10/fc_2_10_1.jpg', 'Conveyor Stand system A', 'Flexible Conveyor/fc_2/fc_2_10/ssc/ssc1.jpg'),
(101, 'Stand system for 85 mm conveyor', 'Flexible Conveyor/fc_2/fc_2_10/fc_2_10_2.jpg', 'Beam support bracket SLC565', 'Flexible Conveyor/fc_2/fc_2_10/ssc/ssc2.jpg'),
(102, 'Stand system for 85 mm conveyor', 'Flexible Conveyor/fc_2/fc_2_10/fc_2_10_3.jpg', 'Die-cast foot 64 x 64', 'Flexible Conveyor/fc_1/fc_1_10/ssc/ssc3.jpg'),
(103, 'Stand system for 85 mm conveyor', 'Flexible Conveyor/fc_2/fc_2_10/fc_2_10_4.jpg', 'Conveyor Stand system B', 'Flexible Conveyor/fc_2/fc_2_10/ssc/ssc4.jpg'),
(104, 'Stand system for 85 mm conveyor', 'Flexible Conveyor/fc_2/fc_2_10/fc_2_10_5.jpg', 'Support bracket slct 21.100.40', 'Flexible Conveyor/fc_2/fc_2_10/ssc/ssc5.jpg'),
(105, 'Stand system for 85 mm conveyor', 'Flexible Conveyor/fc_2/fc_2_10/fc_2_10_6.jpg', 'Fastening element for conveyor stand', 'Flexible Conveyor/fc_2/fc_2_10/ssc/ssc6.jpg'),
(106, '105 mm Beams', 'Flexible Conveyor/fc_3/fc_3_1/fc_1_3_1.jpg', 'Conveyor Beam', 'Flexible Conveyor/fc_3/fc_3_1/beams/beam1.jpg'),
(107, '105 mm Beams', 'Flexible Conveyor/fc_3/fc_3_1/fc_1_3_2.jpg', 'Split beam', 'Flexible Conveyor/fc_3/fc_3_1/beams/beam2.jpg'),
(108, '105 mm Beams', 'Flexible Conveyor/fc_3/fc_3_1/fc_1_3_3.jpg', 'Slide Rail', 'Flexible Conveyor/fc_3/fc_3_1/beams/beam3.jpg'),
(109, '105 mm Beams', 'Flexible Conveyor/fc_3/fc_3_1/fc_1_3_4.jpg', 'Beam Section for Chain', 'Flexible Conveyor/fc_3/fc_3_1/beams/beam4.jpg'),
(110, '105 mm Beams', 'Flexible Conveyor/fc_3/fc_3_1/fc_1_3_5.jpg', 'Connecting strip', 'Flexible Conveyor/fc_3/fc_3_1/beams/beam4.jpg'),
(111, '105 mm Chains', 'Flexible Conveyor/fc_3/fc_3_2/fc_3_2_1.jpg', 'SHTL105', 'Flexible Conveyor/fc_3/fc_3_2/cha/cha1.jpg'),
(112, '105 mm Chains', 'Flexible Conveyor/fc_3/fc_3_2/fc_3_2_2.jpg', 'SHTL105x15A', 'Flexible Conveyor/fc_3/fc_3_2/cha/cha2.jpg'),
(113, '105 mm Chains', 'Flexible Conveyor/fc_3/fc_3_2/fc_3_2_3.jpg', 'SHTL105F', 'Flexible Conveyor/fc_3/fc_3_2/cha/cha3.jpg'),
(114, '105 mm Chains', 'Flexible Conveyor/fc_3/fc_3_2/fc_3_2_4.jpg', 'SHTL105A', 'Flexible Conveyor/fc_3/fc_3_2/cha/cha4.jpg'),
(115, '105 mm Chains', 'Flexible Conveyor/fc_3/fc_3_2/fc_3_2_5.jpg', 'SHTL20X105C', 'Flexible Conveyor/fc_3/fc_3_2/cha/cha5.jpg'),
(120, '105 mm Idler Unit', 'Flexible Conveyor/fc_3/fc_3_3/fc_3_3_1.jpg', '105mm Idler Unit', 'Flexible Conveyor/fc_3/fc_3_3/ieu/ieu1.jpg'),
(121, '105 mm Drive Unit', 'Flexible Conveyor/fc_3/fc_3_4/fc_3_4_1.jpg', '105mm Drive Unit G', 'Flexible Conveyor/fc_3/fc_3_4/du/du1.jpg'),
(122, '105 mm Drive Unit', 'Flexible Conveyor/fc_3/fc_3_4/fc_3_4_2.jpg', '105mm Drive Unit', 'Flexible Conveyor/fc_3/fc_3_4/du/du2.jpg'),
(123, '105 mm Wheel Bends', 'Flexible Conveyor/fc_3/fc_3_5/fc_3_5_1.jpg', 'Wheel Bend 30 degree', 'Flexible Conveyor/fc_3/fc_3_5/wb/wb1.jpg'),
(124, '105 mm Wheel Bends', 'Flexible Conveyor/fc_3/fc_3_5/fc_3_5_2.jpg', 'Wheel Bend 45 degree', 'Flexible Conveyor/fc_3/fc_3_5/wb/wb2.jpg'),
(125, '105 mm Wheel Bends', 'Flexible Conveyor/fc_3/fc_3_5/fc_3_5_3.jpg', 'Wheel Bend 60 degree', 'Flexible Conveyor/fc_3/fc_3_5/wb/wb3.jpg'),
(126, '105 mm Wheel Bends', 'Flexible Conveyor/fc_3/fc_3_5/fc_3_5_4.jpg', 'Wheel Bend 90 degree', 'Flexible Conveyor/fc_3/fc_3_5/wb/wb4.jpg'),
(127, '105 mm Wheel Bends', 'Flexible Conveyor/fc_3/fc_3_5/fc_3_5_5.jpg', 'Wheel Bend 120 degree', 'Flexible Conveyor/fc_3/fc_3_5/wb/wb5.jpg'),
(128, '105 mm Wheel Bends', 'Flexible Conveyor/fc_3/fc_3_5/fc_3_5_6.jpg', 'Wheel Bend 180 degree', 'Flexible Conveyor/fc_3/fc_3_5/wb/wb6.jpg'),
(129, '105 mm Plain Bends', 'Flexible Conveyor/fc_3/fc_3_6/fc_3_6_1.jpg', 'Plain Bends 30 degree', 'Flexible Conveyor/fc_3/fc_3_6/pb/pb1.jpg'),
(130, '105 mm Plain Bends', 'Flexible Conveyor/fc_3/fc_3_6/fc_3_6_2.jpg', 'Plain Bends 45 degree', 'Flexible Conveyor/fc_3/fc_3_6/pb/pb2.jpg'),
(131, '105 mm Plain Bends', 'Flexible Conveyor/fc_3/fc_3_6/fc_3_6_3.jpg', 'Plain Bends 60 degree', 'Flexible Conveyor/fc_3/fc_3_6/pb/pb3.jpg'),
(132, '105 mm Plain Bends', 'Flexible Conveyor/fc_3/fc_3_6/fc_3_6_3.jpg', 'Plain Bends 90 degree', 'Flexible Conveyor/fc_3/fc_3_6/pb/pb4.jpg'),
(133, '105 mm Vertical Bends', 'Flexible Conveyor/fc_3/fc_3_7/fc_3_7_1.jpg', 'Vertical Bend 5degree', 'Flexible Conveyor/fc_3/fc_3_7/vb/vb1.jpg'),
(134, '105 mm Vertical Bends', 'Flexible Conveyor/fc_3/fc_3_7/fc_3_7_2.jpg', 'Vertical Bend 7degree', 'Flexible Conveyor/fc_3/fc_3_7/vb/vb2.jpg'),
(135, '105 mm Vertical Bends', 'Flexible Conveyor/fc_3/fc_3_7/fc_3_7_3.jpg', 'Vertical Bend 15degree', 'Flexible Conveyor/fc_3/fc_3_7/vb/vb3.jpg'),
(136, '105 mm Vertical Bends', 'Flexible Conveyor/fc_3/fc_3_7/fc_3_7_4.jpg', 'Vertical Bend 30degree', 'Flexible Conveyor/fc_3/fc_3_7/vb/vb4.jpg'),
(137, '105 mm Vertical Bends', 'Flexible Conveyor/fc_3/fc_3_7/fc_3_7_5.jpg', 'Vertical Bend 45degree', 'Flexible Conveyor/fc_3/fc_3_7/vb/vb5.jpg'),
(138, '105 mm Vertical Bends', 'Flexible Conveyor/fc_3/fc_3_7/fc_3_7_6.jpg', 'Vertical Bend 60degree', 'Flexible Conveyor/fc_3/fc_3_7/vb/vb6.jpg'),
(139, '105 mm Vertical Bends', 'Flexible Conveyor/fc_3/fc_3_7/fc_3_7_7.jpg', 'Vertical Bend 90degree', 'Flexible Conveyor/fc_3/fc_3_7/vb/vb7.jpg'),
(140, '105 mm Drip Trays', 'Flexible Conveyor/fc_3/fc_3_8/fc_3_8_1.jpg', 'Drip Trays Aluminium', 'Flexible Conveyor/fc_3/fc_3_8/dt/dt1.jpg'),
(141, '105 mm Drip Trays', 'Flexible Conveyor/fc_3/fc_3_8/fc_3_8_2.jpg', 'Drip Trays Bracket', 'Flexible Conveyor/fc_3/fc_3_8/dt/dt2.jpg'),
(142, '105 mm Drip Trays', 'Flexible Conveyor/fc_3/fc_3_8/fc_3_8_3.jpg', 'Drip Trays Connector', 'Flexible Conveyor/fc_3/fc_3_8/dt/dt3.jpg'),
(143, '105 mm Front Piece', 'Flexible Conveyor/fc_3/fc_3_9/fc_3_9_1.jpg', 'Front Piece Aluminium', 'Flexible Conveyor/fc_3/fc_3_9/fp/fp1.jpg'),
(144, '105 mm Front Piece', 'Flexible Conveyor/fc_3/fc_3_9/fc_3_9_2.jpg', 'Front Piece Lower Bend', 'Flexible Conveyor/fc_3/fc_3_9/fp/fp2.jpg'),
(145, '105 mm Front Piece', 'Flexible Conveyor/fc_3/fc_3_9/fc_3_9_3.jpg', 'Front Piece Sliding', 'Flexible Conveyor/fc_3/fc_3_9/fp/fp3.jpg'),
(146, '105 mm Front Piece', 'Flexible Conveyor/fc_3/fc_3_9/fc_3_9_4.jpg', 'Front Piece Upper Bend', 'Flexible Conveyor/fc_3/fc_3_9/fp/fp4.jpg'),
(147, 'Stand system for 105 mm conveyor', 'Flexible Conveyor/fc_3/fc_3_10/fc_3_10_1.jpg', 'Conveyor Stand system A', 'Flexible Conveyor/fc_3/fc_3_10/ssc/ssc1.jpg'),
(148, 'Stand system for 105 mm conveyor', 'Flexible Conveyor/fc_3/fc_3_10/fc_3_10_2.jpg', 'Beam support bracket SHCS105', 'Flexible Conveyor/fc_3/fc_3_10/ssc/ssc2.jpg'),
(149, 'Stand system for 105 mm conveyor', 'Flexible Conveyor/fc_3/fc_3_10/fc_3_10_3.jpg', 'Die-cast foot 64 x 64', 'Flexible Conveyor/fc_3/fc_3_10/ssc/ssc3.jpg'),
(150, 'Stand system for 105 mm conveyor', 'Flexible Conveyor/fc_3/fc_3_10/fc_3_10_4.jpg', 'Conveyor Stand system B', 'Flexible Conveyor/fc_3/fc_3_10/ssc/ssc4.jpg'),
(151, 'Stand system for 105 mm conveyor', 'Flexible Conveyor/fc_3/fc_3_10/fc_3_10_5.jpg', 'Support bracket slct 21.100.40', 'Flexible Conveyor/fc_3/fc_3_10/ssc/ssc5.jpg'),
(152, 'Stand system for 105 mm conveyor', 'Flexible Conveyor/fc_3/fc_3_10/fc_3_10_6.jpg', 'Fastening element for conveyor stand', 'Flexible Conveyor/fc_3/fc_3_10/ssc/ssc6.jpg'),
(153, '300 mm Beams', 'Flexible Conveyor/fc_4/fc_4_1/fc_4_1_1.jpeg', '300 Beam', 'Flexible Conveyor/fc_4/fc_4_1/beams/beam1.jpg'),
(154, '300 mm Beams', 'Flexible Conveyor/fc_4/fc_4_1/fc_4_1_2.jpeg', 'Beam Section for Chain 300 mm', 'Flexible Conveyor/fc_4/fc_4_1/beams/beam2.jpg'),
(155, '300 mm Beams', 'Flexible Conveyor/fc_4/fc_4_1/fc_4_1_3.jpeg', 'Slide Rail', 'Flexible Conveyor/fc_4/fc_4_1/beams/beam3.jpg'),
(156, '300 mm Beams', 'Flexible Conveyor/fc_4/fc_4_1/fc_4_1_4.jpeg', 'connecting strip', 'Flexible Conveyor/fc_4/fc_4_1/beams/beam4.jpg'),
(157, '300 mm Chains', 'Flexible Conveyor/fc_4/fc_4_2/fc_4_2_1.jpg', '300 Chain', 'Flexible Conveyor/fc_4/fc_4_2/cha/cha1.jpg'),
(158, '300 mm Idler Unit', 'Flexible Conveyor/fc_4/fc_4_3/fc_4_3_1.jpg', '300mm Idler Unit', 'Flexible Conveyor/fc_4/fc_4_3/ieu/ieu1.jpg'),
(159, '300 mm Drive Unit', 'Flexible Conveyor/fc_4/fc_4_4/fc_4_4_1.jpg', '300 Drive Unit', 'Flexible Conveyor/fc_4/fc_4_4/du/du1.jpg'),
(160, '300 mm Plain Bends', 'Flexible Conveyor/fc_4/fc_4_5/fc_4_5_1.jpg', 'Plain Bends 30 degree', 'Flexible Conveyor/fc_4/fc_4_5/pb/pb1.jpg'),
(161, '300 mm Plain Bends', 'Flexible Conveyor/fc_4/fc_4_5/fc_4_5_2.jpg', 'Plain Bends 45 degree', 'Flexible Conveyor/fc_4/fc_4_5/pb/pb2.jpg'),
(162, '300 mm Plain Bends', 'Flexible Conveyor/fc_4/fc_4_5/fc_4_5_3.jpg', 'Plain Bends 60 degree', 'Flexible Conveyor/fc_4/fc_4_5/pb/pb3.jpg'),
(163, '300 mm Plain Bends', 'Flexible Conveyor/fc_4/fc_4_5/fc_4_5_4.jpg', 'Plain Bends 90 degree', 'Flexible Conveyor/fc_4/fc_4_5/pb/pb4.jpg'),
(164, '300 mm Vertical Bends', 'Flexible Conveyor/fc_4/fc_4_6/fc_4_6_1.jpg', '300 mm Vertical Bend 5degree', 'Flexible Conveyor/fc_4/fc_4_6/vb/vb1.jpg'),
(165, '300 mm Vertical Bends', 'Flexible Conveyor/fc_4/fc_4_6/fc_4_6_2.jpg', '300 mm Vertical Bend 7degree', 'Flexible Conveyor/fc_4/fc_4_6/vb/vb2.jpg'),
(166, 'Stand system for 300 mm conveyor', 'Flexible Conveyor/fc_4/fc_4_7/fc_4_7_1.jpg', 'Conveyor Stand system ', 'Flexible Conveyor/fc_4/fc_4_7/ssc/ssc1.jpg'),
(167, 'Stand system for 300 mm conveyor', 'Flexible Conveyor/fc_4/fc_4_7/fc_4_7_2.jpg', 'Support bracket SLCT21.100.40', 'Flexible Conveyor/fc_4/fc_4_7/ssc/ssc2.jpg'),
(168, 'Stand system for 300 mm conveyor', 'Flexible Conveyor/fc_4/fc_4_7/fc_4_7_3.jpg', 'Fastening elements for conveyor stand', 'Flexible Conveyor/fc_4/fc_4_7/ssc/ssc3.jpg'),
(169, 'Conveyor', 'ebc/ebc_1/ebc_1_1/ebc_1_1_1.jpeg', 'Assembelly EBC4040', 'ebc/ebc_1/ebc_1_1/c/c1.jpg'),
(170, 'Conveyor', 'ebc/ebc_1/ebc_1_1/ebc_1_1_2.jpeg', 'Assembelly EBC40D19', 'ebc/ebc_1/ebc_1_1/c/c2.jpg'),
(171, 'Conveyor', 'ebc/ebc_1/ebc_1_1/ebc_1_1_3.jpeg', 'EBC 4040 Plate', 'ebc/ebc_1/ebc_1_1/c/c3.jpg'),
(172, 'Conveyor', 'ebc/ebc_1/ebc_1_1/ebc_1_1_4.jpeg', 'EBC 4040 D19 Plate right', 'ebc/ebc_1/ebc_1_1/c/c4.jpg'),
(173, 'Conveyor', 'ebc/ebc_1/ebc_1_1/ebc_1_1_5.jpeg', 'EBC 4040 D19 Plate left', 'ebc/ebc_1/ebc_1_1/c/c5.jpg'),
(174, 'Guides', 'ebc/ebc_1/ebc_1_2/ebc_1_2_1.jpeg', 'Guide System 220.1', 'ebc/ebc_1/ebc_1_2/g/g1.jpg'),
(175, 'Guides', 'ebc/ebc_1/ebc_1_2/ebc_1_2_2.jpeg', 'Guide System 220.2', 'ebc/ebc_1/ebc_1_2/g/g2.jpg'),
(176, 'Guides', 'ebc/ebc_1/ebc_1_2/ebc_1_2_3.jpeg', 'Guide System 220.3', 'ebc/ebc_1/ebc_1_2/g/g3.jpg'),
(177, 'Guides', 'ebc/ebc_1/ebc_1_2/ebc_1_2_4.jpeg', 'Guide System 220.4', 'ebc/ebc_1/ebc_1_2/g/g4.jpg'),
(178, 'Guides', 'ebc/ebc_1/ebc_1_2/ebc_1_2_5.jpeg', 'Guide System 220.5', 'ebc/ebc_1/ebc_1_2/g/g5.jpg'),
(179, 'Guides', 'ebc/ebc_1/ebc_1_2/ebc_1_2_6.jpeg', 'Guide System 220.6', 'ebc/ebc_1/ebc_1_2/g/g6.jpg'),
(181, 'Stands', 'ebc/ebc_1/ebc_1_3/ebc_1_3_1.jpg', 'Stand 01', 'ebc/ebc_1/ebc_1_3/s/s1.jpg'),
(182, 'Stands', 'ebc/ebc_1/ebc_1_3/ebc_1_3_2.jpg', 'Stand 02', 'ebc/ebc_1/ebc_1_3/s/s2.jpg'),
(183, 'Stands', 'ebc/ebc_1/ebc_1_3/ebc_1_3_3.jpg', 'Stand 03', 'ebc/ebc_1/ebc_1_3/s/s3.jpg'),
(184, 'Stands', 'ebc/ebc_1/ebc_1_3/ebc_1_3_4.jpg', 'Stand 04', 'ebc/ebc_1/ebc_1_3/s/s4.jpg'),
(185, '60 mm Conveyor ', 'ebc/ebc_2/ebc_2_1/ebc_2_1_1.jpeg', '1', 'ebc/ebc_2/ebc_2_1/c/c1.jpg'),
(186, '60 mm Conveyor', 'ebc/ebc_2/ebc_2_1/ebc_2_1_2.jpeg', '2', 'ebc/ebc_2/ebc_2_1/c/c2.jpg'),
(187, '60 mm Conveyor', 'ebc/ebc_2/ebc_2_1/ebc_2_1_3.jpeg', '3', 'ebc/ebc_2/ebc_2_1/c/c3.jpg'),
(188, '60 mm Conveyor', 'ebc/ebc_2/ebc_2_1/ebc_2_1_4.jpeg', '4', 'ebc/ebc_2/ebc_2_1/c/c4.jpg'),
(189, '60 mm Guides', 'ebc/ebc_2/ebc_2_2/ebc_2_2_1.jpeg', 'Guide System 220.1', 'ebc/ebc_2/ebc_2_2/g/g1.jpg'),
(190, '60 mm Guides', 'ebc/ebc_2/ebc_2_2/ebc_2_2_2.jpeg', 'Guide System 220.2', 'ebc/ebc_2/ebc_2_2/g/g2.jpg'),
(191, '60 mm Guides', 'ebc/ebc_2/ebc_2_2/ebc_2_2_3.jpeg', 'Guide System 220.3', 'ebc/ebc_2/ebc_2_2/g/g3.jpg'),
(192, '60 mm Guides', 'ebc/ebc_2/ebc_2_2/ebc_2_2_4.jpeg', 'Guide System 220.4', 'ebc/ebc_2/ebc_2_2/g/g4.jpg'),
(193, '60 mm Guides', 'ebc/ebc_2/ebc_2_2/ebc_2_2_5.jpeg', 'Guide System 220.5', 'ebc/ebc_2/ebc_2_2/g/g5.jpg'),
(194, '60 mm Guides', 'ebc/ebc_2/ebc_2_2/ebc_2_2_6.jpeg', 'Guide System 220.6', 'ebc/ebc_2/ebc_2_2/g/g6.jpg'),
(195, '60 mm Stands', 'ebc/ebc_2/ebc_2_3/ebc_2_3_1.jpg', 'Stand 01', 'ebc/ebc_2/ebc_2_3/s/s1.jpg'),
(196, '60 mm Stands', 'ebc/ebc_2/ebc_2_3/ebc_2_3_2.jpg', 'Stand 02', 'ebc/ebc_2/ebc_2_3/s/s2.jpg'),
(197, '60 mm Stands', 'ebc/ebc_2/ebc_2_3/ebc_2_3_3.jpg', 'Stand 03', 'ebc/ebc_2/ebc_2_3/s/s3.jpg'),
(198, '60 mm Stands', 'ebc/ebc_2/ebc_2_3/ebc_2_3_4.jpg', 'Stand 04', 'ebc/ebc_2/ebc_2_3/s/s4.jpg'),
(199, '80 mm Conveyor ', 'ebc/ebc_3/ebc_3_1/ebc_3_1_1.jpeg', '1', 'ebc/ebc_3/ebc_3_1/c/c1.jpg'),
(200, '80 mm Conveyor ', 'ebc/ebc_3/ebc_3_1/ebc_3_1_2.jpeg', '2', 'ebc/ebc_3/ebc_3_1/c/c2.jpg'),
(201, '80 mm Conveyor ', 'ebc/ebc_3/ebc_3_1/ebc_3_1_3.jpeg', '3', 'ebc/ebc_3/ebc_3_1/c/c3.jpg'),
(202, '80 mm Conveyor ', 'ebc/ebc_3/ebc_3_1/ebc_3_1_4.jpeg', '4', 'ebc/ebc_3/ebc_3_1/c/c4.jpg'),
(203, '80 mm Guides', 'ebc/ebc_3/ebc_3_2/ebc_3_2_1.jpeg', 'Guide System 220.1', 'ebc/ebc_3/ebc_3_2/g/g1.jpg'),
(204, '80 mm Guides', 'ebc/ebc_3/ebc_3_2/ebc_3_2_2.jpeg', 'Guide System 220.2', 'ebc/ebc_3/ebc_3_2/g/g2.jpg'),
(205, '80 mm Guides', 'ebc/ebc_3/ebc_3_2/ebc_3_2_3.jpeg', 'Guide System 220.3', 'ebc/ebc_3/ebc_3_2/g/g3.jpg'),
(206, '80 mm Guides', 'ebc/ebc_3/ebc_3_2/ebc_3_2_4.jpeg', 'Guide System 220.4', 'ebc/ebc_3/ebc_3_2/g/g4.jpg'),
(207, '80 mm Guides', 'ebc/ebc_3/ebc_3_2/ebc_3_2_5.jpeg', 'Guide System 220.5', 'ebc/ebc_3/ebc_3_2/g/g5.jpg'),
(208, '80 mm Guides', 'ebc/ebc_3/ebc_3_2/ebc_3_2_6.jpeg', 'Guide System 220.6', 'ebc/ebc_3/ebc_3_2/g/g6.jpg'),
(209, '80 mm Stands', 'ebc/ebc_3/ebc_3_3/ebc_3_3_1.jpg', 'Stand 01', 'ebc/ebc_3/ebc_3_3/s/s1.jpg'),
(210, '80 mm Stands', 'ebc/ebc_3/ebc_3_3/ebc_3_3_2.jpg', 'Stand 02', 'ebc/ebc_3/ebc_3_3/s/s2.jpg'),
(211, '80 mm Stands', 'ebc/ebc_3/ebc_3_3/ebc_3_3_3.jpg', 'Stand 03', 'ebc/ebc_3/ebc_3_3/s/s3.jpg'),
(212, '80 mm Stands', 'ebc/ebc_3/ebc_3_3/ebc_3_3_4.jpg', 'Stand 04', 'ebc/ebc_3/ebc_3_3/s/s4.jpg'),
(213, 'Beam 210', 'WL Series/wl_1/wl_1_1/wl_1_1_1.jpg', 'Conveyor Beam', 'WL Series/wl_1/wl_1_1/bm/bm1.jpg'),
(214, 'Beam 210', 'WL Series/wl_1/wl_1_1/wl_1_1_2.jpg', 'Beam Section', 'WL Series/wl_1/wl_1_1/bm/bm2.jpg'),
(215, 'Beam 210', 'WL Series/wl_1/wl_1_1/wl_1_1_3.jpg', 'Frame Profile', 'WL Series/wl_1/wl_1_1/bm/bm3.jpg'),
(216, 'Beam 210', 'WL Series/wl_1/wl_1_1/wl_1_1_4.jpg', 'Center Support Profile', 'WL Series/wl_1/wl_1_1/bm/bm4.jpg'),
(217, 'Beam 210', 'WL Series/wl_1/wl_1_1/wl_1_1_5.jpg', 'Spacer Beam', 'WL Series/wl_1/wl_1_1/bm/bm5.jpg'),
(218, 'Beam 210', 'WL Series/wl_1/wl_1_1/wl_1_1_6.jpg', 'Support rail', 'WL Series/wl_1/wl_1_1/bm/bm6.jpg'),
(219, 'Beam 210', 'WL Series/wl_1/wl_1_1/wl_1_1_7.jpg', 'Slide rail', 'WL Series/wl_1/wl_1_1/bm/bm7.jpg'),
(220, 'Beam 210', 'WL Series/wl_1/wl_1_1/wl_1_1_8.jpg', 'Connecting strip', 'WL Series/wl_1/wl_1_1/bm/bm8.jpg'),
(221, 'Chain 210', 'WL Series/wl_1/wl_1_2/wl_1_2_1.jpg', 'Chain', 'WL Series/wl_1/wl_1_2/c/c1.jpg'),
(222, 'Drive Unit 210', 'WL Series/wl_1/wl_1_3/wl_1_3_1.jpg', 'Drive unit', 'WL Series/wl_1/wl_1_3/du/du1.jpg'),
(223, 'Drive Unit 210', 'WL Series/wl_1/wl_1_3/wl_1_3_2.jpg', '	Split shaft collar', 'WL Series/wl_1/wl_1_3/du/du2.jpg'),
(224, 'Idler Unit 210', 'WL Series/wl_1/wl_1_4/wl_1_4_1.jpg', 'Idler Unit', 'WL Series/wl_1/wl_1_4/iu/iu1.jpg'),
(225, 'Plain Bends 210', 'WL Series/wl_1/wl_1_5/wl_1_5_1.jpg', 'plain bend 30 degree', 'WL Series/wl_1/wl_1_5/pb/pb1.jpg'),
(226, 'Plain Bends 210', 'WL Series/wl_1/wl_1_5/wl_1_5_2.jpg', 'plain bend 45 degree', 'WL Series/wl_1/wl_1_5/pb/pb2.jpg'),
(227, 'Plain Bends 210', 'WL Series/wl_1/wl_1_5/wl_1_5_3.jpg', 'plain bend 60 degree', 'WL Series/wl_1/wl_1_5/pb/pb3.jpg'),
(228, 'Plain Bends 210', 'WL Series/wl_1/wl_1_5/wl_1_5_4.jpg', 'plain bend 90 degree', 'WL Series/wl_1/wl_1_5/pb/pb4.jpg'),
(229, 'Vertical Bends 210', 'WL Series/wl_1/wl_1_6/wl_1_6_1.jpg', 'vertical bend 5 degree', 'WL Series/wl_1/wl_1_6/vb/vb1.jpg'),
(230, 'Vertical Bends 210', 'WL Series/wl_1/wl_1_6/wl_1_6_2.jpg', 'vertical bend 15 degree', 'WL Series/wl_1/wl_1_6/vb/vb2.jpg'),
(231, 'Stands 210', 'WL Series/wl_1/wl_1_7/wl_1_7_1.jpg', 'stand system WL01', 'WL Series/wl_1/wl_1_7/s/s1.jpg'),
(232, 'Stands 210', 'WL Series/wl_1/wl_1_7/wl_1_7_2.jpg', 'stand system WL02', 'WL Series/wl_1/wl_1_7/s/s2.jpg'),
(233, 'Beam 322', 'WL Series/wl_2/wl_2_1/wl_2_1_1.jpg', 'Conveyor Beam', 'WL Series/wl_2/wl_2_1/bm/bm1.jpg'),
(234, 'Beam 322', 'WL Series/wl_2/wl_2_1/wl_2_1_2.jpg', 'Beam Section', 'WL Series/wl_2/wl_2_1/bm/bm2.jpg'),
(235, 'Beam 322', 'WL Series/wl_2/wl_2_1/wl_2_1_3.jpg', 'Frame Profile', 'WL Series/wl_2/wl_2_1/bm/bm3.jpg'),
(236, 'Beam 322', 'WL Series/wl_2/wl_2_1/wl_2_1_4.jpg', 'Center Support Profile', 'WL Series/wl_2/wl_2_1/bm/bm4.jpg'),
(237, 'Beam 322', 'WL Series/wl_2/wl_2_1/wl_2_1_5.jpg', 'Spacer Beam', 'WL Series/wl_2/wl_2_1/bm/bm5.jpg'),
(238, 'Beam 322', 'WL Series/wl_2/wl_2_1/wl_2_1_6.jpg', 'Support rail', 'WL Series/wl_2/wl_2_1/bm/bm6.jpg'),
(239, 'Beam 322', 'WL Series/wl_2/wl_2_1/wl_2_1_7.jpg', 'Slide rail', 'WL Series/wl_2/wl_2_1/bm/bm7.jpg'),
(240, 'Beam 322', 'WL Series/wl_2/wl_2_1/wl_2_1_8.jpg', 'Connecting strip', 'WL Series/wl_2/wl_2_1/bm/bm8.jpg'),
(241, 'Chain 322', 'WL Series/wl_2/wl_2_2/wl_2_2_1.jpg', 'Chain ', 'WL Series/wl_2/wl_2_2/c/c1.jpg'),
(242, 'Drive Unit 322', 'WL Series/wl_2/wl_2_3/wl_2_3_1.jpg', 'Drive unit', 'WL Series/wl_2/wl_2_3/du/du1.jpg'),
(243, 'Drive Unit 322', 'WL Series/wl_2/wl_2_3/wl_2_3_2.jpg', 'Split shaft collar', 'WL Series/wl_2/wl_2_3/du/du2.jpg'),
(244, 'Idler Unit 322', 'WL Series/wl_2/wl_2_4/wl_2_4_1.jpg', 'Idler Unit', 'WL Series/wl_2/wl_2_4/iu/iu1.jpg'),
(245, 'Plain Bends 322', 'WL Series/wl_2/wl_2_5/wl_2_5_1.jpg', 'plain bend 30 degree', 'WL Series/wl_2/wl_2_5/pb/pb1.jpg'),
(246, 'Plain Bends 322', 'WL Series/wl_2/wl_2_5/wl_2_5_2.jpg', 'plain bend 45 degree', 'WL Series/wl_2/wl_2_5/pb/pb2.jpg'),
(247, 'Plain Bends 322', 'WL Series/wl_2/wl_2_5/wl_2_5_3.jpg', 'plain bend 60 degree', 'WL Series/wl_2/wl_2_5/pb/pb3.jpg'),
(248, 'Plain Bends 322', 'WL Series/wl_2/wl_2_5/wl_2_5_4.jpg', 'plain bend 90 degree', 'WL Series/wl_2/wl_2_5/pb/pb4.jpg'),
(249, 'Vertical Bends 322', 'WL Series/wl_2/wl_2_6/wl_2_6_1.jpg', 'vertical bend 5 degree', 'WL Series/wl_2/wl_2_6/vb/vb1.jpg'),
(250, 'Vertical Bends 322', 'WL Series/wl_2/wl_2_6/wl_2_6_2.jpg', 'vertical bend 15 degree', 'WL Series/wl_2/wl_2_6/vb/vb2.jpg'),
(251, 'Stands 322', 'WL Series/wl_2/wl_2_7/wl_2_7_1.jpg', 'stand system WL01', 'WL Series/wl_2/wl_2_7/s/s1.jpg'),
(252, 'Stands 322', 'WL Series/wl_2/wl_2_7/wl_2_7_2.jpg', 'stand system WL02', 'WL Series/wl_2/wl_2_7/s/s2.jpg'),
(253, 'Beam 424', 'WL Series/wl_3/wl_3_1/wl_3_1_1.jpg', 'Conveyor Beam', 'WL Series/wl_3/wl_3_1/bm/bm1.jpg'),
(254, 'Beam 424', 'WL Series/wl_3/wl_3_1/wl_3_1_2.jpg', 'Beam Section', 'WL Series/wl_3/wl_3_1/bm/bm2.jpg'),
(255, 'Beam 424', 'WL Series/wl_3/wl_3_1/wl_3_1_3.jpg', 'Frame Profile', 'WL Series/wl_3/wl_3_1/bm/bm3.jpg'),
(256, 'Beam 424', 'WL Series/wl_3/wl_3_1/wl_3_1_4.jpg', 'Center Support Profile', 'WL Series/wl_3/wl_3_1/bm/bm4.jpg'),
(257, 'Beam 424', 'WL Series/wl_3/wl_3_1/wl_3_1_5.jpg', 'Spacer Beam', 'WL Series/wl_3/wl_3_1/bm/bm5.jpg'),
(258, 'Beam 424', 'WL Series/wl_3/wl_3_1/wl_3_1_6.jpg', 'Support rail', 'WL Series/wl_3/wl_3_1/bm/bm6.jpg'),
(259, 'Beam 424', 'WL Series/wl_3/wl_3_1/wl_3_1_7.jpg', 'Slide rail', 'WL Series/wl_3/wl_3_1/bm/bm7.jpg'),
(260, 'Beam 424', 'WL Series/wl_3/wl_3_1/wl_3_1_8.jpg', 'Connecting strip', 'WL Series/wl_3/wl_3_1/bm/bm8.jpg'),
(261, 'Chain 424', 'WL Series/wl_3/wl_3_2/wl_3_2_1.jpg', 'Chain ', 'WL Series/wl_3/wl_3_2/c/c1.jpg'),
(262, 'Drive Unit 424', 'WL Series/wl_3/wl_3_3/wl_3_3_1.jpg', 'Drive unit', 'WL Series/wl_3/wl_3_3/du/du1.jpg'),
(263, 'Drive Unit 424', 'WL Series/wl_3/wl_3_3/wl_3_3_2.jpg', 'Split shaft collar', 'WL Series/wl_3/wl_3_3/du/du2.jpg'),
(264, 'Idler Unit 424', 'WL Series/wl_3/wl_3_4/wl_3_4_1.jpg', 'Idler Unit', 'WL Series/wl_3/wl_3_4/iu/iu1.jpg'),
(265, 'Plain Bends 424', 'WL Series/wl_3/wl_3_5/wl_3_5_1.jpg', 'plain bend 30 degree', 'WL Series/wl_3/wl_3_5/pb/pb1.jpg'),
(266, 'Plain Bends 424', 'WL Series/wl_3/wl_3_5/wl_3_5_2.jpg', 'plain bend 45 degree', 'WL Series/wl_3/wl_3_5/pb/pb2.jpg'),
(267, 'Plain Bends 424', 'WL Series/wl_3/wl_3_5/wl_3_5_3.jpg', 'plain bend 60 degree', 'WL Series/wl_3/wl_3_5/pb/pb3.jpg'),
(268, 'Plain Bends 424', 'WL Series/wl_3/wl_3_5/wl_3_5_4.jpg', 'plain bend 90 degree', 'WL Series/wl_3/wl_3_5/pb/pb4.jpg'),
(269, 'Vertical Bends 424', 'WL Series/wl_3/wl_3_6/wl_3_6_1.jpg', 'vertical bend 5 degree', 'WL Series/wl_3/wl_3_6/vb/vb1.jpg'),
(270, 'Vertical Bends 424', 'WL Series/wl_3/wl_3_6/wl_3_6_2.jpg', 'vertical bend 15 degree', 'WL Series/wl_3/wl_3_6/vb/vb2.jpg'),
(271, 'Stands 424', 'WL Series/wl_3/wl_3_7/wl_3_7_1.jpg', 'stand system WL01', 'WL Series/wl_3/wl_3_7/s/s1.jpg'),
(272, 'Stands 424', 'WL Series/wl_3/wl_3_7/wl_3_7_2.jpg', 'stand system WL02', 'WL Series/wl_3/wl_3_7/s/s2.jpg'),
(273, 'Beam 525', 'WL Series/wl_4/wl_4_1/wl_4_1_1.jpg', 'Conveyor Beam', 'WL Series/wl_4/wl_4_1/bm/bm1.jpg'),
(274, 'Beam 525', 'WL Series/wl_4/wl_4_1/wl_4_1_2.jpg', 'Beam Section', 'WL Series/wl_4/wl_4_1/bm/bm2.jpg'),
(275, 'Beam 525', 'WL Series/wl_4/wl_4_1/wl_4_1_3.jpg', 'Frame Profile', 'WL Series/wl_4/wl_4_1/bm/bm3.jpg'),
(276, 'Beam 525', 'WL Series/wl_4/wl_4_1/wl_4_1_4.jpg', 'Center Support Profile', 'WL Series/wl_4/wl_4_1/bm/bm4.jpg'),
(277, 'Beam 525', 'WL Series/wl_4/wl_4_1/wl_4_1_5.jpg', 'Spacer Beam', 'WL Series/wl_4/wl_4_1/bm/bm5.jpg'),
(278, 'Beam 525', 'WL Series/wl_4/wl_4_1/wl_4_1_6.jpg', 'Support rail', 'WL Series/wl_4/wl_4_1/bm/bm6.jpg'),
(279, 'Beam 525', 'WL Series/wl_4/wl_4_1/wl_4_1_7.jpg', 'Slide rail', 'WL Series/wl_4/wl_4_1/bm/bm7.jpg'),
(280, 'Beam 525', 'WL Series/wl_4/wl_4_1/wl_4_1_8.jpg', 'Connecting strip', 'WL Series/wl_4/wl_4_1/bm/bm8.jpg'),
(281, 'Chain 525', 'WL Series/wl_4/wl_4_2/wl_4_2_1.jpg', 'Chain ', 'WL Series/wl_4/wl_4_2/c/c1.jpg'),
(282, 'Drive Unit 525', 'WL Series/wl_4/wl_4_3/wl_4_3_1.jpg', 'Drive unit', 'WL Series/wl_4/wl_4_3/du/du1.jpg'),
(283, 'Drive Unit 525', 'WL Series/wl_4/wl_4_3/wl_4_3_2.jpg', 'Split shaft collar', 'WL Series/wl_4/wl_4_3/du/du2.jpg'),
(284, 'Idler Unit 525', 'WL Series/wl_4/wl_4_4/wl_4_4_1.jpg', 'Idler Unit', 'WL Series/wl_4/wl_4_4/iu/iu1.jpg'),
(285, 'Plain Bends 525', 'WL Series/wl_4/wl_4_5/wl_4_5_1.jpg', 'plain bend 30 degree', 'WL Series/wl_4/wl_4_5/pb/pb1.jpg'),
(286, 'Plain Bends 525', 'WL Series/wl_4/wl_4_5/wl_4_5_2.jpg', 'plain bend 45 degree', 'WL Series/wl_4/wl_4_5/pb/pb2.jpg'),
(287, 'Plain Bends 525', 'WL Series/wl_4/wl_4_5/wl_4_5_3.jpg', 'plain bend 60 degree', 'WL Series/wl_4/wl_4_5/pb/pb3.jpg'),
(288, 'Plain Bends 525', 'WL Series/wl_4/wl_4_5/wl_4_5_4.jpg', 'plain bend 90 degree', 'WL Series/wl_4/wl_4_5/pb/pb4.jpg'),
(289, 'Vertical Bends 525', 'WL Series/wl_4/wl_4_6/wl_4_6_1.jpg', 'vertical bend 5 degree', 'WL Series/wl_4/wl_4_6/vb/vb1.jpg'),
(290, 'Vertical Bends 525', 'WL Series/wl_4/wl_4_6/wl_4_6_2.jpg', 'vertical bend 15 degree', 'WL Series/wl_4/wl_4_6/vb/vb2.jpg'),
(291, 'Stands 525', 'WL Series/wl_4/wl_4_7/wl_4_7_1.jpg', 'stand system WL01', 'WL Series/wl_4/wl_4_7/s/s1.jpg'),
(292, 'Stands 525', 'WL Series/wl_4/wl_4_7/wl_4_7_2.jpg', 'stand system WL02', 'WL Series/wl_4/wl_4_7/s/s2.jpg'),
(293, 'Beam 626', 'WL Series/wl_5/wl_5_1/wl_5_1_1.jpg', 'Conveyor Beam', 'WL Series/wl_5/wl_5_1/bm/bm1.jpg'),
(294, 'Beam 626', 'WL Series/wl_5/wl_5_1/wl_5_1_2.jpg', 'Beam Section', 'WL Series/wl_5/wl_5_1/bm/bm2.jpg'),
(295, 'Beam 626', 'WL Series/wl_5/wl_5_1/wl_5_1_3.jpg', 'Frame Profile', 'WL Series/wl_5/wl_5_1/bm/bm3.jpg'),
(296, 'Beam 626', 'WL Series/wl_5/wl_5_1/wl_5_1_4.jpg', 'Center Support Profile', 'WL Series/wl_5/wl_5_1/bm/bm4.jpg'),
(297, 'Beam 626', 'WL Series/wl_5/wl_5_1/wl_5_1_5.jpg', 'Spacer Beam', 'WL Series/wl_5/wl_5_1/bm/bm5.jpg'),
(298, 'Beam 626', 'WL Series/wl_5/wl_5_1/wl_5_1_6.jpg', 'Support rail', 'WL Series/wl_5/wl_5_1/bm/bm6.jpg'),
(299, 'Beam 626', 'WL Series/wl_5/wl_5_1/wl_5_1_7.jpg', 'Slide rail', 'WL Series/wl_5/wl_5_1/bm/bm7.jpg'),
(300, 'Beam 626', 'WL Series/wl_5/wl_5_1/wl_5_1_8.jpg', 'Connecting strip', 'WL Series/wl_5/wl_5_1/bm/bm8.jpg'),
(301, 'Chain 626', 'WL Series/wl_5/wl_5_2/wl_5_2_1.jpg', 'Chain ', 'WL Series/wl_5/wl_5_2/c/c1.jpg'),
(302, 'Drive Unit 626', 'WL Series/wl_5/wl_5_3/wl_5_3_1.jpg', 'Drive unit', 'WL Series/wl_5/wl_5_3/du/du1.jpg'),
(303, 'Drive Unit 626', 'WL Series/wl_5/wl_5_3/wl_5_3_2.jpg', 'Split shaft collar', 'WL Series/wl_5/wl_5_3/du/du2.jpg'),
(304, 'Idler Unit 626', 'WL Series/wl_5/wl_5_4/wl_5_4_1.jpg', 'Idler Unit', 'WL Series/wl_5/wl_5_4/iu/iu1.jpg'),
(305, 'Plain Bends 626', 'WL Series/wl_5/wl_5_5/wl_5_5_1.jpg', 'plain bend 30 degree', 'WL Series/wl_5/wl_5_5/pb/pb1.jpg'),
(306, 'Plain Bends 626', 'WL Series/wl_5/wl_5_5/wl_5_5_2.jpg', 'plain bend 45 degree', 'WL Series/wl_5/wl_5_5/pb/pb2.jpg'),
(307, 'Plain Bends 626', 'WL Series/wl_5/wl_5_5/wl_5_5_3.jpg', 'plain bend 60 degree', 'WL Series/wl_5/wl_5_5/pb/pb3.jpg'),
(308, 'Plain Bends 626', 'WL Series/wl_5/wl_5_5/wl_5_5_4.jpg', 'plain bend 90 degree', 'WL Series/wl_5/wl_5_5/pb/pb4.jpg'),
(309, 'Vertical Bends 626', 'WL Series/wl_5/wl_5_6/wl_5_6_1.jpg', 'vertical bend 5 degree', 'WL Series/wl_5/wl_5_6/vb/vb1.jpg'),
(310, 'Vertical Bends 626', 'WL Series/wl_5/wl_5_6/wl_5_6_2.jpg', 'vertical bend 15 degree', 'WL Series/wl_5/wl_5_6/vb/vb2.jpg'),
(311, 'Stands 626', 'WL Series/wl_5/wl_5_7/wl_5_7_1.jpg', 'stand system WL01', 'WL Series/wl_5/wl_5_7/s/s1.jpg'),
(312, 'Stands 626', 'WL Series/wl_5/wl_5_7/wl_5_7_2.jpg', 'stand system WL02', 'WL Series/wl_5/wl_5_7/s/s2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `created_at`, `role`) VALUES
(10, 'Dhruv Pandya', '+91 7096705844', 'dhruvpandya0204@gmail.com', '$2y$10$IJqrZnduHzTLt/4wdtKkkuAFAGuVsgfi/tLf8B43NVozLSyIDO1L2', '2024-05-17 19:19:31', 'user'),
(11, 'Uday', '07411888230', 'udaymk5858@gmail.com', '$2y$10$YB63i6ejhMWH5X5nEYwyCuKfzCJEI3s5FJyOh/YC/KLyNdCv6FPKq', '2025-05-07 10:11:30', 'user'),
(12, 'Maulik', '+91 9978 144 27', 'maulik@sica.in', '$2y$10$p1szYeRkW.lASC8BO.t2NeHDNcMps8rtMJ5DpIQOYtop7f3Gk.f32', '2025-10-17 16:38:06', 'admin'),
(14, 'smit', '7096705844', 'hardik@gmail.com', '$2y$10$QZF25EvFapqFMIOH1YVXxOe21K/37R7c4YWaoQtfHQu04KE9fbQKK', '2025-12-26 12:50:56', 'admin'),
(15, 'HETAL ADHVARYU', '6351223440', 'sales@msengg.in', '$2y$10$g1/LBhE7vbKeJwkZwzy42uNRIXRgTeep/Ieu7lFoCGN5HdcsI139q', '2026-03-02 07:58:07', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Sr.no`);

--
-- Indexes for table `pro`
--
ALTER TABLE `pro`
  ADD PRIMARY KEY (`Sr.no`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Sr.no`);

--
-- Indexes for table `pro_master`
--
ALTER TABLE `pro_master`
  ADD PRIMARY KEY (`Sr.no`);

--
-- Indexes for table `pro_master2`
--
ALTER TABLE `pro_master2`
  ADD PRIMARY KEY (`SR.no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Sr.no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `pro`
--
ALTER TABLE `pro`
  MODIFY `Sr.no` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Sr.no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pro_master`
--
ALTER TABLE `pro_master`
  MODIFY `Sr.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `pro_master2`
--
ALTER TABLE `pro_master2`
  MODIFY `SR.no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
