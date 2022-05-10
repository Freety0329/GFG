-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2022 at 10:39 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gfg`
--
CREATE DATABASE IF NOT EXISTS `gfg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gfg`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `Account_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Member_Telephone` int(11) NOT NULL,
  `Member_Email` varchar(255) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Member_Address` varchar(255) NOT NULL,
  `Bank_Card_No` varchar(16) NOT NULL,
  `User_Type` text NOT NULL,
  PRIMARY KEY (`Account_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_ID`, `Name`, `Member_Telephone`, `Member_Email`, `Password`, `Member_Address`, `Bank_Card_No`, `User_Type`) VALUES
(1, 'admin', 1245678963, 'admin', 'admin', 'Central Residence @ Suria, 366, Jalan Sungai Besi, Sungai Besi, 57100 Kuala Lumpur, Federal Territory of Kuala Lumpur', '0', 'Admin'),
(2, 'Kayaball', 1234567896, 'kayaball', 'kayaball', 'Taman Serdang Perdana, 43300 Seri Kembangan, Selangor', '0', 'Member'),
(3, 'Jack Teo', 127412125, 'jack@mail.com', 'jackteo', 'Jalan 19/27b, Desa Setapak, Setapak, Kuala Lumpur', '1231234552221123', 'Member'),
(5, 'ali', 127474745, 'ali@mail.com', '123456', 'Jalan Raya 4, 43300 Seri Kembangan, Selangor', '0123654789632541', 'Member'),
(6, 'Chin Xin Da', 127452145, 'xinda@mail.com', 'chinxinda', 'Jalan Sri Hartamas 1, Taman Sri Hartamas, Sri Hartamas, Kuala Lumpur', '1452369852145635', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

DROP TABLE IF EXISTS `background`;
CREATE TABLE IF NOT EXISTS `background` (
  `Background` text NOT NULL,
  `Mission` text NOT NULL,
  `Vision` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`Background`, `Mission`, `Vision`) VALUES
('Game For Gamers, in short GFG, is one among popular video game retail company. We provide large number of video games from distinct categories as well as different video game consoles and allow customers to view feedbacks and rating for each video game on sale. We begin since 2006 as small store which provide hard copy of PS3 video games. As the business develops through our continuous effort, the product line had expanded to include a large variety of video games available on different video game consoles. Today, GFG has succeed to accomplish part of its vision and had growth into one among popular trusted video game retail company.', 'To increase the number of available categories and video game console of video games for customers.', 'To be one among the top trusted video game retail company nationwide and provide first-rate and fine video games for all customers to enjoy.');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

DROP TABLE IF EXISTS `cart_item`;
CREATE TABLE IF NOT EXISTS `cart_item` (
  `Cart_Item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Game_ID` int(11) NOT NULL,
  `CQuantity` int(11) NOT NULL,
  `Account_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Cart_Item_ID`),
  KEY `GID` (`Game_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`Cart_Item_ID`, `Game_ID`, `CQuantity`, `Account_ID`) VALUES
(10, 15, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `Game_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Video_Game_Console` varchar(255) NOT NULL,
  `Publisher_ID` int(11) NOT NULL,
  `Price` decimal(6,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` longtext NOT NULL,
  `Game_Pic` varchar(255) NOT NULL,
  PRIMARY KEY (`Game_ID`),
  KEY `PID` (`Publisher_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`Game_ID`, `Title`, `Video_Game_Console`, `Publisher_ID`, `Price`, `Quantity`, `Description`, `Game_Pic`) VALUES
(14, 'FIFA 2022', 'PS5', 3, '24.00', 22, 'Soccer Game', 'image_2022-02-18_155215.png'),
(15, 'Battlefield 1', 'XBOX', 3, '23.00', 27, 'First-person shooting game', 'image_2022-02-18_105004.png'),
(16, 'Dying Light 2', 'PS5', 4, '34.00', 48, 'First-person survival game', 'image_2022-02-18_105042.png'),
(17, 'Dying Light', 'PS4', 3, '40.00', 23, 'First-person survival game', 'image_2022-02-18_105224.png'),
(18, 'Battlefield 2042', 'PS5', 3, '32.00', 16, 'First-person shooting game', 'image_2022-02-18_105322.png');

-- --------------------------------------------------------

--
-- Table structure for table `game_cart`
--

DROP TABLE IF EXISTS `game_cart`;
CREATE TABLE IF NOT EXISTS `game_cart` (
  `Cart_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Account_ID` int(11) NOT NULL,
  `Total_Price` decimal(6,2) DEFAULT NULL,
  `Title` varchar(255) NOT NULL,
  `Game_ID` int(11) NOT NULL,
  `Game_Pic` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Date_of_purchase` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Cart_ID`),
  KEY `MID` (`Account_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_cart`
--

INSERT INTO `game_cart` (`Cart_ID`, `Account_ID`, `Total_Price`, `Title`, `Game_ID`, `Game_Pic`, `Quantity`, `Date_of_purchase`) VALUES
(7, 2, '24.00', 'FIFA 2022', 14, 'image_2022-02-18_155215.png', 2, '2022-03-21 11:29:52'),
(8, 5, '23.00', 'Battlefield 1', 15, 'image_2022-02-18_105004.png', 1, '2022-03-21 15:33:47'),
(9, 5, '24.00', 'FIFA 2022', 14, 'image_2022-02-18_155215.png', 1, '2022-03-21 15:35:42'),
(10, 2, '34.00', 'Dying Light 2', 16, 'image_2022-02-18_105042.png', 1, '2022-03-25 12:09:53'),
(11, 2, '23.00', 'Battlefield 1', 15, 'image_2022-02-18_105004.png', 1, '2022-03-25 12:10:20'),
(12, 2, '23.00', 'Battlefield 1', 15, 'image_2022-02-18_105004.png', 1, '2022-03-25 12:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE IF NOT EXISTS `publisher` (
  `Publisher_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Publisher_Name` varchar(225) NOT NULL,
  `Publisher_Address` varchar(225) NOT NULL,
  `Publisher_Telephone` int(11) NOT NULL,
  `Publisher_Email` text NOT NULL,
  PRIMARY KEY (`Publisher_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`Publisher_ID`, `Publisher_Name`, `Publisher_Address`, `Publisher_Telephone`, `Publisher_Email`) VALUES
(3, 'Electronic Arts', 'Redwood City, California, United States', 0, 'ea@mail.com'),
(4, 'Techland', 'WrocÅ‚aw, Poland', 166243080, 'support@techland.p'),
(5, 'Nintendo', 'Nintendo of America 4600 150th Ave NE Redmond, WA 98052', 1, 'nintendo@noa.nintendo.com'),
(6, 'Square Enix', '999 North Pacific Coast Highway Third Floor El Segundo, CA 90245 USA', 131, 'PrivacyNotice@us.square-enix.com'),
(7, 'BANDAI NAMCO', 'The Ascent B-5-1, Paradigm, No, 1, Jalan SS 7/26a, Ss 3, 47302 Petaling Jaya, Selangor', 378877434, 'community@bandainamcoent.com');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `Review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Rating` int(10) NOT NULL,
  `Review` longtext NOT NULL,
  `Game_ID` int(11) NOT NULL,
  `Account_ID` int(11) NOT NULL,
  PRIMARY KEY (`Review_ID`),
  KEY `GIDR` (`Game_ID`),
  KEY `MIDR` (`Account_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Review_ID`, `Rating`, `Review`, `Game_ID`, `Account_ID`) VALUES
(14, 1, 'terrible', 18, 2),
(15, 3, 'ok', 14, 3),
(16, 2, 'Behold the inevitable unstoppable hovercraft', 18, 3),
(17, 2, 'meh, same as usual.', 14, 2),
(18, 4, 'good', 15, 2),
(20, 3, 'ok', 17, 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `GID` FOREIGN KEY (`Game_ID`) REFERENCES `game` (`Game_ID`);

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `PID` FOREIGN KEY (`Publisher_ID`) REFERENCES `publisher` (`Publisher_ID`);

--
-- Constraints for table `game_cart`
--
ALTER TABLE `game_cart`
  ADD CONSTRAINT `MID` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `GIDR` FOREIGN KEY (`Game_ID`) REFERENCES `game` (`Game_ID`),
  ADD CONSTRAINT `MIDR` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
