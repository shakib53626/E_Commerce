-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 10:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `mart_brand`
--

CREATE TABLE `mart_brand` (
  `ID` int(11) NOT NULL,
  `Brand_Name` varchar(50) NOT NULL,
  `Brand_Category` varchar(50) NOT NULL,
  `Brand_Image` varchar(255) DEFAULT '0',
  `Is_Parent` int(11) DEFAULT 0,
  `Brand_Status` int(11) DEFAULT 0 COMMENT '0 for Deactive 1 for Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mart_brand`
--

INSERT INTO `mart_brand` (`ID`, `Brand_Name`, `Brand_Category`, `Brand_Image`, `Is_Parent`, `Brand_Status`) VALUES
(18, 'Rolex', '', '1404813901WebCoders.png', 0, 1),
(19, 'Bata', '', '442055450greenline-logo.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mart_category`
--

CREATE TABLE `mart_category` (
  `ID` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_img` varchar(255) DEFAULT '0',
  `sub_cname` varchar(50) DEFAULT NULL,
  `is_parent` int(11) NOT NULL DEFAULT 0,
  `cat_status` int(11) DEFAULT 0 COMMENT '0 for Deactive 1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mart_category`
--

INSERT INTO `mart_category` (`ID`, `cat_name`, `cat_img`, `sub_cname`, `is_parent`, `cat_status`) VALUES
(42, 'Clothes', '1165926419clothes-hanger.png', NULL, 0, 1),
(43, 'T-Shirt', '869559200casual-t-shirt-.png', NULL, 42, 1),
(44, 'Jeans', '1445994462jeans.png', NULL, 42, 1),
(46, 'Watchs', '1024448412wristwatch.png', NULL, 0, 1),
(47, 'Ladies Watch', '685845677watch (1).png', NULL, 46, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mart_coupon`
--

CREATE TABLE `mart_coupon` (
  `ID` int(11) NOT NULL,
  `coupon_code` varchar(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `dis_on` int(11) DEFAULT NULL COMMENT '0 for % and 1 for fixed',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `dis_on_type` int(11) DEFAULT NULL COMMENT '0 for spaesic product, 1 for specific Category, 3 for specfic brand',
  `discount_on` varchar(255) DEFAULT NULL,
  `copon_status` int(11) NOT NULL COMMENT '0 for Deactive and 1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mart_coupon`
--

INSERT INTO `mart_coupon` (`ID`, `coupon_code`, `amount`, `dis_on`, `start_date`, `end_date`, `dis_on_type`, `discount_on`, `copon_status`) VALUES
(11, ' hnx7Dwd', 99, 1, '2023-02-20', '2023-02-22', 2, ',42,43,44', 1),
(13, ' BBtkt3D', 9, 0, '2023-02-20', '2023-02-21', 3, ',18,19', 1),
(14, ' wKJFKVZ', 99, 1, '2023-02-24', '2023-02-26', 1, ',52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mart_product`
--

CREATE TABLE `mart_product` (
  `ID` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_category` int(11) DEFAULT NULL,
  `p_sub_category` int(11) DEFAULT NULL,
  `p_brand` int(11) DEFAULT NULL,
  `p_reg_price` int(11) DEFAULT NULL,
  `p_offer_price` int(11) DEFAULT NULL,
  `p_featured_img` varchar(255) DEFAULT NULL,
  `p_img_gallery` text DEFAULT NULL,
  `p_short_desc` text NOT NULL,
  `p_long_desc` text DEFAULT NULL,
  `p_stock` int(11) DEFAULT NULL,
  `p_status` int(11) DEFAULT 0 COMMENT '0 for Deactive 1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mart_product`
--

INSERT INTO `mart_product` (`ID`, `p_name`, `p_category`, `p_sub_category`, `p_brand`, `p_reg_price`, `p_offer_price`, `p_featured_img`, `p_img_gallery`, `p_short_desc`, `p_long_desc`, `p_stock`, `p_status`) VALUES
(52, 'T-Shirt', 42, 43, 18, 40, 35, '1037233106casual-t-shirt-.png', NULL, 'asdfasdf', '<p>adsfgedfrg</p>\r\n', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mart_brand`
--
ALTER TABLE `mart_brand`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mart_category`
--
ALTER TABLE `mart_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mart_coupon`
--
ALTER TABLE `mart_coupon`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`);

--
-- Indexes for table `mart_product`
--
ALTER TABLE `mart_product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `p_category` (`p_category`),
  ADD KEY `p_sub_category` (`p_sub_category`),
  ADD KEY `p_brand` (`p_brand`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mart_brand`
--
ALTER TABLE `mart_brand`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mart_category`
--
ALTER TABLE `mart_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `mart_coupon`
--
ALTER TABLE `mart_coupon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mart_product`
--
ALTER TABLE `mart_product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mart_product`
--
ALTER TABLE `mart_product`
  ADD CONSTRAINT `mart_product_ibfk_1` FOREIGN KEY (`p_category`) REFERENCES `mart_category` (`ID`),
  ADD CONSTRAINT `mart_product_ibfk_2` FOREIGN KEY (`p_sub_category`) REFERENCES `mart_category` (`ID`),
  ADD CONSTRAINT `mart_product_ibfk_3` FOREIGN KEY (`p_brand`) REFERENCES `mart_brand` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
