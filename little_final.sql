-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2015 at 01:09 AM
-- Server version: 5.5.42-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `little_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE IF NOT EXISTS `age` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `age` varchar(200) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`id`, `uid`, `age`, `flag`) VALUES
(1, 0, '0 - 3 Months', 1),
(2, 0, '3 - 6 Months', 1),
(3, 0, '6 - 9 Months', 1),
(4, 0, '9 - 12 Months', 1),
(5, 0, '12-18 Months', 1),
(6, 0, '18 - 24 Months', 1),
(7, 0, '2-4 Years', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_name`, `image`, `flag`) VALUES
(6, 'Banner1', 'images/banners/BannMainMainslider1.jpg', 1),
(7, 'Banner2', 'images/banners/BannMainMainslider2.jpg', 1),
(8, 'Banner3', 'images/banners/BannMainMainslider3.jpg', 1),
(10, 'Banner5', 'images/banners/BannMainMainslide1.jpg', 1),
(11, 'Main Banner5', 'images/banners/MainMainMainslide2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `uid`, `brand_name`, `image`, `flag`) VALUES
(6, 0, 'Tiny Baby', 'images/brands/Tiny', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `uid`, `category_name`, `flag`) VALUES
(2, 0, 'Baby  Clothes', 1),
(3, 0, 'Kids Clothes', 1),
(4, 0, 'Footwear', 1),
(5, 0, 'Feeding & Nursing', 1),
(6, 0, 'Bath , Care & Diapering', 1),
(7, 0, 'Mom Essentials', 1),
(8, 0, 'Baby Gear', 1),
(9, 0, 'Birthday Decorations &   Return Gifts', 1),
(10, 0, 'Offers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE IF NOT EXISTS `collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `banner_name` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `type`, `banner_name`, `image`, `flag`) VALUES
(1, 1, 'Infant Collections', 'images/banners/Infabannerimg4.jpg', 1),
(2, 2, 'Toddlers Collection', 'images/banners/Toddbannerimg2.jpg', 1),
(3, 3, 'Baby Accessories', 'images/banners/Babybannerimg3.png', 1),
(4, 4, 'TU - Tu Collections', 'images/banners/TU -tutucollections1.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `collection_products`
--

CREATE TABLE IF NOT EXISTS `collection_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `age` longtext NOT NULL,
  `price` longtext NOT NULL,
  `offerprice` varchar(100) NOT NULL,
  `loyalitycash` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `brandinf` longtext NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `uid`, `color`, `flag`) VALUES
(1, 0, 'Yellow', 1),
(2, 0, 'Blue', 1),
(3, 0, 'Red', 1),
(4, 0, 'Pink', 1),
(5, 0, 'White', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon` varchar(100) NOT NULL,
  `percentage` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `percentage`, `flag`) VALUES
(1, 'Sample', '10', 0),
(2, 'coupon', '5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `subcat_name` varchar(100) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `uid`, `cat_id`, `subcat_name`, `menu_name`, `flag`) VALUES
(3, 0, '2', '2', 'Onesies & Rompers', 1),
(4, 0, '2', '2', 'Frocks', 1),
(5, 0, '2', '2', 'Party Wear ', 1),
(6, 0, '2', '2', 'Casual Wear', 1),
(7, 0, '2', '2', 'Caps,Mittens and Gloves', 1),
(8, 0, '2', '2', 'Hankies', 1),
(9, 0, '2', '2', 'See All', 1),
(10, 0, '2', '3', 'New Born(0-3M)', 1),
(11, 0, '2', '3', '3-6 Months', 1),
(12, 0, '2', '3', '6-9 Months', 1),
(13, 0, '2', '3', '9-12 Months', 1),
(14, 0, '2', '3', '12-18 Months', 1),
(15, 0, '2', '3', '18-24 Months', 1),
(16, 0, '2', '4', 'Black', 1),
(17, 0, '2', '4', 'White', 1),
(18, 0, '2', '4', 'Red', 1),
(19, 0, '2', '4', 'Green', 1),
(20, 0, '2', '4', 'Yellow', 1),
(21, 0, '2', '4', 'Peach', 1),
(22, 0, '2', '4', 'Pink', 1),
(23, 0, '2', '4', 'Orange', 1),
(24, 0, '2', '4', 'Blue', 1),
(25, 0, '2', '5', 'Toffy House', 1),
(26, 0, '2', '5', 'ShopperTree', 1),
(27, 0, '2', '5', 'Tiny Baby', 1),
(28, 0, '2', '6', 'Girl', 1),
(29, 0, '2', '6', 'Boy', 1),
(30, 0, '2', '6', 'Unisex', 1),
(31, 0, '5', '18', 'Bottles', 1),
(32, 0, '5', '18', 'Sippers', 1),
(33, 0, '5', '18', 'Feeding Bowls', 1),
(34, 0, '5', '18', 'Spoons', 1),
(35, 0, '5', '19', 'Chicco', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE IF NOT EXISTS `notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `product_id`, `user_id`, `added`) VALUES
(1, 0, 1, '13-08-2015 18:32:58'),
(2, 0, 1, '13-08-2015 18:39:29'),
(3, 0, 1, '13-08-2015 18:41:34'),
(4, 0, 1, '13-08-2015 18:42:30'),
(5, 2858, 1, '13-08-2015 18:42:47'),
(6, 2858, 1, '13-08-2015 18:43:01'),
(7, 2858, 1, '13-08-2015 18:43:07'),
(8, 2858, 1, '13-08-2015 18:43:10'),
(9, 2858, 1, '13-08-2015 18:43:32'),
(10, 2858, 3, '13-08-2015 18:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_name` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) NOT NULL,
  `txnid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` longtext NOT NULL,
  `productinfo` longtext NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `txnid`, `name`, `email`, `phone`, `address`, `productinfo`, `amount`, `status`, `added`) VALUES
(1, '1', '1', 'phanendra kumar', 'phani@winspectsolutions.com', '9959742195', '21-69 Girinagar', '3', 500, 2, 11),
(2, '1', '2', 'phanendra kumar', 'phani@winspectsolutions.com', '9959742195', 'Giirnagar opp; IDPL COLONY', '3', 1000, 2, 11),
(3, '1', '3', 'phanendra kumar', 'phani@winspectsolutions.com', '9959742195', '', '3', 10, 2, 11),
(4, '1', '4', 'phanendra kumar', 'phani@winspectsolutions.com', '9959742195', '21-69, Girinagar, opp: Idpl Colony, Near: Balanagar ', '3', 10, 2, 11),
(5, '1', '5', 'phanendra kumar', 'phani@winspectsolutions.com', '9959742195', '21-69 girinGr', '4', 2000, 2, 11),
(6, '1', '6', 'phanendra kumar', 'phani@winspectsolutions.com', '9959742195', 'girinagar', '4', 20, 2, 11),
(7, '3', '7', 'Hari', 'dhkrishna.28@gmail.com', '9032517171', 'Sample', '4,1', 40, 2, 13),
(8, '3', '8', 'Hari', 'dhkrishna.28@gmail.com', '9032517171', 'sa', '4', 20, 2, 13),
(9, '1', '9', 'phanendra kumar', 'phani@winspectsolutions.com', '9959742195', '', '6', 500, 2, 18),
(10, '1', '10', 'phanendra kumar', 'phani@winspectsolutions.com', '9959742195', 'GIRNINAGAR', '6', 500, 2, 18),
(11, '1', '11', 'phanendra kumar', 'phani@winspectsolutions.com', '9959742195', '', '6', 500, 2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `subcategory` varchar(100) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `age` longtext NOT NULL,
  `price` longtext NOT NULL,
  `offerprice` varchar(100) NOT NULL,
  `loyalitycash` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `brandinf` longtext NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `uid`, `category`, `subcategory`, `menu`, `brand`, `color`, `age`, `price`, `offerprice`, `loyalitycash`, `gender`, `image`, `product_name`, `quantity`, `description`, `brandinf`, `flag`) VALUES
(6, '6472', 0, '2', '2', '6', '6', '2', '5, 6, 7', '500, 550, 575', '10', 0, '2', '', 'Blue -Party Wear Dress', 2, 'Blue  Party Wear Dress For Your Princess', 'Tiny Baby', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `category`, `image`) VALUES
(1, '4190', 'Products', '1439211988sam.png'),
(2, '9650', 'Products', '1439216984D.JPG'),
(3, '8091', 'Products', '1439217212D.JPG'),
(4, '2858', 'Products', '1439299927IMG_3593.JPG'),
(5, '2858', 'Products', '1439217212D.JPG'),
(6, '2858', 'Products', '1439211988sam.png'),
(7, '1857', 'Products', '1439625332Non_Tears_Shampoo.jpg'),
(8, '6472', 'Products', '1439829254259-Blue1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_name` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `uid`, `cat_id`, `subcat_name`, `flag`) VALUES
(2, 0, 2, 'Shop By Category', 1),
(3, 0, 2, ' Age ', 1),
(4, 0, 2, 'Color', 1),
(5, 0, 2, 'Brand', 1),
(6, 0, 2, '  Gender', 1),
(7, 0, 3, 'Shop By Category', 1),
(8, 0, 3, '  Age', 1),
(9, 0, 3, 'Color', 1),
(10, 0, 3, 'Brand', 1),
(11, 0, 3, 'Gender', 1),
(13, 0, 4, 'Boy', 1),
(14, 0, 4, 'Girl', 1),
(15, 0, 4, 'Uni sex', 1),
(16, 0, 4, 'Color', 1),
(17, 0, 4, 'Brand', 1),
(18, 0, 5, 'Feeding  Products', 1),
(19, 0, 5, 'Brands', 1),
(20, 0, 5, 'Sterilisers & Cleaning Accessories', 1),
(21, 0, 5, 'Warmers', 1),
(22, 0, 5, 'Teethers  &  Pacifiers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `toprated`
--

CREATE TABLE IF NOT EXISTS `toprated` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `brand` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `age` longtext NOT NULL,
  `price` longtext NOT NULL,
  `offerprice` varchar(100) NOT NULL,
  `loyalitycash` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `brandinf` longtext NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trending`
--

CREATE TABLE IF NOT EXISTS `trending` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `brand` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `age` longtext NOT NULL,
  `price` longtext NOT NULL,
  `offerprice` varchar(100) NOT NULL,
  `loyalitycash` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `brandinf` longtext NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `added` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `mobile`, `added`, `flag`) VALUES
(1, 'phanendra kumar', 'phani@winspectsolutions.com', 'phani', 'jaihanuman@41', '9959742195', '', 0),
(3, 'Hari', 'dhkrishna.28@gmail.com', 'dhkrishna', 'password', '9032517171', '12-08-2015 14:27:35', 0),
(4, 'pavan', 'pk98866@gmail.com', 'pavan', 'qwerty', '9032518181', '13-08-2015 12:24:21', 0),
(5, 'rakesh bajjuri', 'rakeshbajjuri@gmail.com', 'rakesh', 'rakesh12#', '9908763343', '13-08-2015 19:18:26', 0),
(6, 'Anusha', 'anushapala@gmail.com', '', 'Anusha@04', '9885283281', '13-08-2015 22:29:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE IF NOT EXISTS `user_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_num` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `reference_num`, `name`, `username`, `email`, `password`, `mobile`, `flag`) VALUES
(1, 'BroU2LYing', 'phanendra kumar', 'phanendra', 'phani.pp143@gmail.com', 'jaihanuman@41', '9959742195', 1),
(2, 'IPdQmo0uTL', 'sample', 'test', 'sample@test.com', 'test', '9032517171', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
