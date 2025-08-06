-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2018 at 06:10 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grace`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `car_license` varchar(200) NOT NULL,
  `car_model` varchar(200) NOT NULL,
  `car_color` varchar(100) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `routeid` int(11) NOT NULL,
  PRIMARY KEY (`car_license`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_license`, `car_model`, `car_color`, `driver`, `routeid`) VALUES
('YG-1234', 'Townace', 'White', 'Pyae Sone Aung', 1),
('YG-5678', 'Townace', 'White', 'Kyaw Kyaw', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `category_name`) VALUES
(1, 'Cloth'),
(2, 'Food'),
(3, 'Bags'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `deliveryid` int(11) NOT NULL AUTO_INCREMENT,
  `deliverydate` date NOT NULL,
  `completiondate` date NOT NULL,
  `received_payment` int(11) NOT NULL,
  `car_license` varchar(110) NOT NULL,
  `remark` varchar(2000) NOT NULL,
  `orderid` int(11) NOT NULL,
  PRIMARY KEY (`deliveryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`deliveryid`, `deliverydate`, `completiondate`, `received_payment`, `car_license`, `remark`, `orderid`) VALUES
(2, '2018-03-28', '2018-03-29', 15650, '0', 'completed', 0),
(3, '2018-03-29', '2018-04-09', 12500, 'YG-1234', 'completed', 0),
(4, '2018-03-29', '2018-04-09', 17800, 'YG-5678', 'completed', 0),
(5, '2018-03-29', '2018-04-09', 200, 'YG-1234', 'completed', 0),
(6, '2018-03-29', '0000-00-00', 200, 'YG-1234', 'onprocess', 0),
(7, '2018-03-29', '2018-03-29', 0, 'YG-5678', 'competed', 0),
(8, '2018-03-30', '2018-03-30', 7800, 'YG-1234', 'completed', 0),
(9, '2018-03-30', '2018-03-30', 4100, 'YG-1234', 'completed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `osub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderid`, `productid`, `order_qty`, `order_price`, `osub_total`) VALUES
(5, 2, 3, 7000, 21000),
(5, 3, 5, 1500, 7500),
(6, 1, 5, 5000, 25000),
(7, 2, 6, 7000, 42000),
(8, 3, 7, 1500, 10500),
(9, 2, 4, 7000, 28000),
(10, 2, 6, 7000, 42000),
(11, 2, 7, 7000, 49000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deliver-date` date NOT NULL,
  `complete_date` date NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `deliver_township` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'z',
  `advanced_payment` int(11) NOT NULL,
  `final_payment` int(11) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `ogrand` int(11) NOT NULL,
  `ototal` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `promotionid` int(11) NOT NULL,
  `deliveryid` int(11) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `order_date`, `deliver-date`, `complete_date`, `customer_name`, `customer_address`, `customer_phone`, `deliver_township`, `status`, `advanced_payment`, `final_payment`, `payment_status`, `userid`, `ogrand`, `ototal`, `discount`, `promotionid`, `deliveryid`) VALUES
(5, '2018-03-29 16:38:03', '0000-00-00', '2018-03-29', 'Shwe', 'Yangon', '0934343748', '10Mile', 'completed', 10000, 15650, '15650', 'John', 25650, 28500, 2850, 0, 2),
(6, '2018-04-09 06:50:43', '0000-00-00', '2018-04-09', 'Maung Maung', 'Yangon', '0995585', 'Latha', 'completed', 10000, 12500, '12500', 'John', 22500, 25000, 2500, 0, 3),
(7, '2018-04-09 06:53:56', '0000-00-00', '2018-04-09', 'Kyaw', 'Yangon', '059555', 'MyayNiGone', 'completed', 20000, 17800, '17800', 'John', 37800, 42000, 4200, 0, 4),
(8, '2018-03-29 16:37:09', '0000-00-00', '2018-03-29', 'Pyae', 'Yangon', '0888', 'MyayNiGone', 'competed', 10500, 0, 'Complete', 'Admin', 10500, 10500, 0, 0, 7),
(9, '2018-03-29 16:06:36', '0000-00-00', '0000-00-00', 'kyaw', 'Yangon', '0959595', 'Latha', 'f', 25000, 0, '200', 'Admin', 25200, 28000, 2800, 0, 6),
(10, '2018-03-30 03:32:26', '0000-00-00', '2018-03-30', 'Pann', 'Yangon', '0488484', 'Latha', 'completed', 30000, 7800, '7800', 'John', 37800, 42000, 4200, 0, 8),
(11, '2018-03-30 05:04:48', '0000-00-00', '2018-03-30', 'Ei Ei', 'Yangon', '084844', 'Latha', 'completed', 40000, 4100, '4100', 'John', 44100, 49000, 4900, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(100) NOT NULL,
  `supplierid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `alert_qty` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `wholesaleprice` int(11) NOT NULL,
  `wholesaleqty` int(11) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `supplierid`, `categoryid`, `product_price`, `product_qty`, `alert_qty`, `photo`, `wholesaleprice`, `wholesaleqty`) VALUES
(1, 'Tree Food', 3, 2, 5000, 40, 0, 'upload/Tree Food Jaggery Lime Bag_1521606772_1522134139.jpg', 4500, 10),
(2, 'TG Bag', 1, 3, 7000, 220, 0, 'upload/Inwa Handbag 12x15_1522134167.jpg', 6000, 10),
(3, 'Bookmark', 1, 4, 1500, 395, 1300, 'upload/Felicity BookMark_1522134193.jpg', 1300, 10),
(4, 'Myanmar Kritta Souvenirs T-shirt Size-S XXXL', 1, 1, 5000, 22, 0, 'upload/Myanmar Kritta Souvenirs T-shirt Size-S XXXL_1524721260.png', 0, 0),
(5, 'Felicity Good Luck Clothes', 1, 1, 5000, 34, 0, 'upload/Tee Good Luck Shirt_1524721325.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `promotionid` int(11) NOT NULL AUTO_INCREMENT,
  `PRName` varchar(100) NOT NULL,
  `threashloe` int(11) NOT NULL,
  `promo_strdate` date NOT NULL,
  `promo_enddate` date NOT NULL,
  `discount_percentage` int(11) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'NA',
  PRIMARY KEY (`promotionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotionid`, `PRName`, `threashloe`, `promo_strdate`, `promo_enddate`, `discount_percentage`, `Status`) VALUES
(1, 'Thingyan Sale', 15000, '2018-03-27', '2018-03-31', 10, 'EX'),
(2, 'TGn', 50000, '2018-05-03', '2018-05-30', 10, 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `pruchase`
--

CREATE TABLE IF NOT EXISTS `pruchase` (
  `purchaseid` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_date` date NOT NULL,
  `supplierid` int(11) NOT NULL,
  `p_total` int(11) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `pstatus` varchar(10) NOT NULL,
  PRIMARY KEY (`purchaseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `pruchase`
--

INSERT INTO `pruchase` (`purchaseid`, `purchase_date`, `supplierid`, `p_total`, `payment_status`, `userid`, `pstatus`) VALUES
(20, '2018-04-04', 1, 100000, '', 'Admin', 'complete'),
(21, '2018-04-04', 3, 40000, '', 'Admin', 'complete'),
(22, '2018-04-05', 1, 3500, '', 'Admin', 'complete'),
(23, '2018-04-05', 1, 16, '', 'Admin', 'complete'),
(24, '2018-04-05', 1, 85525, '', 'Admin', 'complete'),
(25, '2018-04-09', 3, 238885, '', 'Admin', 'complete'),
(26, '2018-04-09', 1, 65549, '', 'Admin', 'complete'),
(27, '2018-04-09', 1, 100000, '', 'Admin', 'complete'),
(28, '2018-04-09', 3, 60000, '', 'Admin', 'complete'),
(29, '2018-04-11', 1, 50000, '', 'Admin', 'complete'),
(30, '2018-04-26', 1, 8000, '', 'Admin', 'complete'),
(31, '2018-04-26', 1, 23000, '', 'Admin', 'complete'),
(32, '2018-04-26', 1, 1000, '', 'Admin', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetail`
--

CREATE TABLE IF NOT EXISTS `purchasedetail` (
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `pruchase_price` int(11) NOT NULL,
  `psub_total` int(11) NOT NULL,
  `pdstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasedetail`
--

INSERT INTO `purchasedetail` (`purchaseid`, `productid`, `purchase_qty`, `pruchase_price`, `psub_total`, `pdstatus`) VALUES
(20, 2, 20, 2000, 40000, 'complete'),
(20, 3, 20, 3000, 60000, 'complete'),
(21, 1, 20, 2000, 40000, 'complete'),
(22, 3, 7, 500, 3500, 'complete'),
(23, 3, 4, 4, 16, 'complete'),
(24, 3, 55, 1555, 85525, 'complete'),
(25, 1, 5, 47777, 238885, 'complete'),
(26, 2, 6, 4444, 26664, 'complete'),
(26, 3, 7, 5555, 38885, 'complete'),
(27, 2, 30, 3000, 90000, 'complete'),
(27, 3, 10, 1000, 10000, 'complete'),
(28, 1, 30, 2000, 60000, 'complete'),
(29, 2, 10, 5000, 50000, 'complete'),
(30, 5, 4, 2000, 8000, 'complete'),
(31, 5, 10, 2000, 20000, 'complete'),
(31, 4, 1, 3000, 3000, 'complete'),
(32, 4, 1, 1000, 1000, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `routeid` int(11) NOT NULL AUTO_INCREMENT,
  `route` varchar(100) NOT NULL,
  PRIMARY KEY (`routeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`routeid`, `route`) VALUES
(1, 'route A'),
(2, 'route B');

-- --------------------------------------------------------

--
-- Table structure for table `route_township`
--

CREATE TABLE IF NOT EXISTS `route_township` (
  `routeid` int(11) NOT NULL,
  `township` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_township`
--

INSERT INTO `route_township` (`routeid`, `township`) VALUES
(1, 'Latha'),
(1, 'Lanmadaw'),
(1, 'KyiMyintDaing'),
(1, 'BoTaHtaung'),
(2, 'MyayNiGone'),
(2, 'SanChaung'),
(2, 'HlaeDan'),
(2, '8Mile'),
(2, '9Mile'),
(2, '10Mile');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `salesid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `sales_total` int(11) NOT NULL,
  `promotionid` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `grandtotal` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `changee` int(11) NOT NULL,
  `sale_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`salesid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesid`, `userid`, `sales_total`, `promotionid`, `discount`, `grandtotal`, `paid_amount`, `changee`, `sale_date`) VALUES
(1, 'John', 19000, 0, 1900, 17100, 100000, 82900, '0000-00-00 00:00:00'),
(2, 'John', 21000, 0, 2100, 18900, 20000, 1100, '2018-03-27 07:10:59'),
(3, 'Wick', 35000, 0, 0, 35000, 50000, 15000, '2018-04-08 05:51:55'),
(4, 'Wick', 3000, 0, 0, 3000, 5000, 2000, '2018-04-08 05:53:27'),
(5, 'Wick', 60000, 0, 0, 60000, 60000, 0, '2018-04-08 05:54:24'),
(6, 'Wick', 21000, 0, 0, 21000, 21000, 0, '2018-04-08 15:20:40'),
(7, 'Wick', 7000, 0, 0, 7000, 10000, 3000, '2018-04-08 15:24:34'),
(8, 'John', 178500, 0, 0, 178500, 111111111, 110932611, '2018-04-23 08:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE IF NOT EXISTS `sales_detail` (
  `salesid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `sales_qty` int(11) NOT NULL,
  `s_price` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_detail`
--

INSERT INTO `sales_detail` (`salesid`, `productid`, `sales_qty`, `s_price`, `sub_total`) VALUES
(0, 2, 2, 7000, 14000),
(0, 1, 1, 5000, 5000),
(2, 2, 3, 7000, 21000),
(3, 2, 5, 7000, 35000),
(4, 3, 2, 1500, 3000),
(5, 1, 12, 5000, 60000),
(6, 2, 3, 7000, 21000),
(7, 2, 1, 7000, 7000),
(8, 2, 10, 7000, 70000),
(8, 1, 19, 5000, 95000);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplierid` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_address` varchar(150) NOT NULL,
  `supplier_phone` varchar(20) NOT NULL,
  PRIMARY KEY (`supplierid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplierid`, `supplier_name`, `supplier_address`, `supplier_phone`) VALUES
(1, 'Felicity', 'Yangon', '094484'),
(3, 'ABC', 'Mandalay', '0932432423'),
(4, 'Neo', 'Yangon', '0943433434'),
(5, 'CM', 'Yangon', '0985552623'),
(6, 'Feel', 'Yangon', '09484848');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `ichi` int(11) NOT NULL,
  `ni` int(11) NOT NULL,
  `san` int(11) NOT NULL,
  `yon` int(11) NOT NULL,
  `one` varchar(100) NOT NULL,
  `two` varchar(100) NOT NULL,
  `three` varchar(100) NOT NULL,
  `four` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `township`
--

CREATE TABLE IF NOT EXISTS `township` (
  `township` varchar(255) NOT NULL,
  PRIMARY KEY (`township`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `township`
--

INSERT INTO `township` (`township`) VALUES
('10Mile'),
('7Mile'),
('8Mile'),
('9Mile'),
('BoTaHtaung'),
('HlaeDan'),
('InnSein'),
('KyiMyintDaing'),
('Lanmadaw'),
('Latha'),
('MinGalaDone'),
('MyayNiGone'),
('Other'),
('PannSoeDan'),
('SanChaung');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'Admin', 'Admin'),
(3, 'John', 'John', 'Sale');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
