-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2021 at 10:30 PM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safetylens`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_admin_download`
--

CREATE TABLE `ad_admin_download` (
  `ad_id` int(11) NOT NULL,
  `ad_title` varchar(255) NOT NULL,
  `ad_file_path` text NOT NULL,
  `ad_status` enum('1','2') NOT NULL,
  `ad_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ad_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_admin_download`
--

INSERT INTO `ad_admin_download` (`ad_id`, `ad_title`, `ad_file_path`, `ad_status`, `ad_added`, `ad_update`) VALUES
(1, 'testing', 'tenor.gif', '1', '2020-04-22 22:57:27', '2020-04-22 22:57:27'),
(2, 'dfgdgf', 'Desert.jpg', '2', '2020-04-27 11:43:58', '2020-04-27 11:44:53'),
(3, 'wetw', 'Desert1.jpg', '2', '2020-04-27 14:58:32', '2020-04-27 15:00:50'),
(4, 'fsrg', 'Penguins.jpg', '2', '2020-04-27 14:59:01', '2020-04-27 15:00:44'),
(5, 'yhtjytjy', 'Lighthouse.jpg', '2', '2020-04-27 14:59:24', '2020-04-27 15:00:39'),
(6, 'detrer', 'Lighthouse1.jpg', '2', '2020-04-27 15:00:05', '2020-04-27 15:00:31'),
(7, 'abcdefg', 'banner16.jpg', '1', '2020-04-29 19:31:39', '2020-04-29 19:31:39'),
(8, 'ext, and a search for &#039;lorem ies by accident, sometimes on purpose (injected humour and the like).', 'Desert2.jpg', '2', '2020-04-29 20:10:53', '2020-04-29 20:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `b_blog`
--

CREATE TABLE `b_blog` (
  `b_id` int(11) NOT NULL,
  `b_title` varchar(255) DEFAULT NULL,
  `b_content` text NOT NULL,
  `b_img` text NOT NULL,
  `b_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `b_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `b_status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `b_blog`
--

INSERT INTO `b_blog` (`b_id`, `b_title`, `b_content`, `b_img`, `b_added`, `b_update`, `b_status`) VALUES
(1, 'demooo', '<p>gerge</p><p><br></p>', 'Hydrangeas.jpg', '2020-04-20 14:01:20', '2020-04-20 14:07:08', '1'),
(2, 'test', '<p><br></p><ul><li><b xss=removed>ress</b></li></ul><p><br></p>', '6.png', '2020-04-20 14:03:03', '2020-04-21 09:48:29', '2'),
(3, 'My first Blog', '<p><br></p><p>HI TESTINGshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort testAshort te</p><p><br></p>', 'avatar3.png', '2020-04-21 19:21:26', '2020-04-27 14:23:05', '1'),
(4, 'abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd', '<p><br></p><p>abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd abcddd <br></p><p><br></p>', 'Selection_0041.png', '2020-04-29 19:27:12', '2021-01-26 23:44:27', '1'),
(5, 'dxgfhfghcjgjhv', '<p><span xss=removed>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><span xss=removed>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><span xss=removed>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>', 'Chrysanthemum1.jpg', '2020-04-29 20:08:32', '2020-04-29 20:09:23', '2');

-- --------------------------------------------------------

--
-- Table structure for table `b_brand`
--

CREATE TABLE `b_brand` (
  `b_id` int(11) NOT NULL,
  `b_title` varchar(255) NOT NULL,
  `b_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `b_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `b_status` enum('1','2') NOT NULL DEFAULT '1',
  `b_gender` enum('1','2','3','4') NOT NULL COMMENT '1 = Men 2 = Women 3 = Kids 4 = Unisex',
  `b_seo_title` varchar(55) NOT NULL,
  `b_seo_description` text NOT NULL,
  `b_brand_logo` varchar(255) NOT NULL,
  `b_brand_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_brand`
--

INSERT INTO `b_brand` (`b_id`, `b_title`, `b_added`, `b_update`, `b_status`, `b_gender`, `b_seo_title`, `b_seo_description`, `b_brand_logo`, `b_brand_img`) VALUES
(1, 'Pentax Safety Frames', '2021-01-24 17:45:34', '2021-01-24 17:45:34', '1', '1', '', '', '', ''),
(2, 'Pentax Safety Frames', '2021-01-24 17:47:11', '2021-01-24 17:47:11', '1', '1', '', '', '', ''),
(3, 'UVEX Safety Frames', '2021-01-26 13:05:39', '2021-01-26 13:57:14', '1', '4', 'UVEX  Safety Frames', ' Shop a wide range of Safety Glasses and Safety Frames at Best Price. Get your prescription eyeglasses from SafetyLensUSA. We offer UVEX, ArmouRx, Pentax Safety Glasses and more..                   ', 'thumb_2020080516390269244741.png', 'thumb_2020081110153594042912.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cr_cart`
--

CREATE TABLE `cr_cart` (
  `cr_id` int(11) NOT NULL,
  `cr_l_id` int(11) NOT NULL,
  `cr_products_id` varchar(255) NOT NULL,
  `cr_quantity` int(11) NOT NULL,
  `cr_added_by` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1-self,2->admin,3->other',
  `cr_status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1-active,2-inactive',
  `cr_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cr_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cr_cart`
--

INSERT INTO `cr_cart` (`cr_id`, `cr_l_id`, `cr_products_id`, `cr_quantity`, `cr_added_by`, `cr_status`, `cr_added`, `cr_updated`) VALUES
(1, 52, '5', 1, '1', '2', '2020-04-20 11:51:02', '2020-04-20 11:54:13'),
(2, 52, '3', 1, '1', '2', '2020-04-20 11:51:17', '2020-04-20 11:54:13'),
(3, 50, '6', 1, '1', '2', '2020-04-20 13:18:39', '2020-04-20 13:26:11'),
(4, 50, '5', 1, '1', '2', '2020-04-20 13:18:41', '2020-04-20 13:26:11'),
(5, 50, '4', 1, '1', '2', '2020-04-20 13:18:43', '2020-04-20 13:26:11'),
(6, 50, '3', 1, '1', '2', '2020-04-20 13:18:48', '2020-04-20 13:26:11'),
(7, 53, '6', 1, '1', '2', '2020-04-20 14:14:18', '2020-04-20 14:15:13'),
(8, 54, '5', 2, '1', '2', '2020-04-20 14:35:10', '2020-04-20 14:36:54'),
(9, 50, '3', 1, '1', '1', '2020-04-20 14:53:47', '2020-04-20 14:53:47'),
(10, 54, '6', 1, '1', '2', '2020-04-20 15:37:04', '2020-04-20 17:09:38'),
(11, 53, '5', 1, '1', '1', '2020-04-20 16:17:47', '2020-04-20 16:17:47'),
(12, 54, '6', 1, '1', '2', '2020-04-20 17:13:39', '2020-04-20 17:13:55'),
(13, 54, '6', 1, '1', '2', '2020-04-20 17:19:22', '2020-04-20 17:23:57'),
(14, 54, '6', 1, '1', '2', '2020-04-20 17:49:22', '2020-04-20 17:49:45'),
(15, 54, '6', 1, '1', '2', '2020-04-20 17:53:12', '2020-04-20 17:53:45'),
(16, 54, '5', 1, '1', '2', '2020-04-20 17:53:14', '2020-04-20 17:53:45'),
(17, 59, '5', 3, '1', '2', '2020-04-20 20:09:02', '2020-04-20 20:09:48'),
(18, 1, '10', 1, '1', '2', '2020-04-21 12:05:00', '2020-04-21 19:12:04'),
(19, 72, '11', 1, '1', '2', '2020-04-21 12:27:20', '2020-04-21 12:29:48'),
(20, 71, '11', 1, '1', '2', '2020-04-21 12:44:01', '2020-04-21 12:44:58'),
(21, 71, '10', 1, '1', '2', '2020-04-21 12:44:02', '2020-04-21 12:44:58'),
(22, 71, '6', 1, '1', '2', '2020-04-21 12:44:05', '2020-04-21 12:44:58'),
(23, 54, '11', 5, '1', '2', '2020-04-21 14:31:18', '2020-04-24 12:17:47'),
(24, 54, '10', 3, '1', '2', '2020-04-21 14:31:20', '2020-04-24 12:28:49'),
(25, 54, '6', 1, '1', '2', '2020-04-21 14:31:22', '2020-04-21 14:54:21'),
(26, 72, '5', 1, '1', '1', '2020-04-21 15:17:25', '2020-04-21 15:17:25'),
(27, 72, '11', 1, '1', '1', '2020-04-21 15:20:51', '2020-04-21 15:20:51'),
(28, 71, '11', 1, '1', '2', '2020-04-21 15:46:00', '2020-04-21 15:59:22'),
(29, 71, '10', 1, '1', '2', '2020-04-21 15:46:04', '2020-04-21 15:59:22'),
(30, 71, '6', 1, '1', '2', '2020-04-21 15:46:09', '2020-04-21 15:59:22'),
(31, 1, '3', 1, '1', '2', '2020-04-21 18:23:20', '2020-04-21 19:12:04'),
(32, 1, '11', 1, '1', '2', '2020-04-21 18:24:24', '2020-04-21 19:12:04'),
(33, 71, '5', 1, '1', '2', '2020-04-21 19:32:28', '2020-04-21 19:33:27'),
(34, 71, '4', 1, '1', '2', '2020-04-21 19:32:28', '2020-04-21 19:33:27'),
(35, 71, '3', 1, '1', '2', '2020-04-21 19:32:31', '2020-04-21 19:33:27'),
(36, 59, '10', 4, '1', '2', '2020-04-21 19:50:21', '2020-04-21 23:55:03'),
(37, 54, '11', 5, '1', '2', '2020-04-21 22:19:31', '2020-04-24 12:17:47'),
(38, 54, '10', 3, '1', '2', '2020-04-21 22:19:33', '2020-04-24 12:28:49'),
(39, 54, '5', 1, '1', '2', '2020-04-21 22:19:35', '2020-04-21 22:20:52'),
(40, 54, '11', 5, '1', '2', '2020-04-21 22:31:20', '2020-04-24 12:17:47'),
(41, 54, '10', 3, '1', '2', '2020-04-21 22:31:25', '2020-04-24 12:28:49'),
(42, 54, '6', 1, '1', '2', '2020-04-21 22:31:32', '2020-04-21 22:32:05'),
(43, 54, '10', 3, '1', '2', '2020-04-21 22:41:58', '2020-04-24 12:28:49'),
(44, 54, '11', 5, '1', '2', '2020-04-21 22:42:02', '2020-04-24 12:17:47'),
(45, 54, '10', 3, '1', '2', '2020-04-21 23:32:50', '2020-04-24 12:28:49'),
(46, 59, '11', 1, '1', '2', '2020-04-21 23:48:49', '2020-04-21 23:52:17'),
(47, 59, '10', 4, '1', '2', '2020-04-21 23:54:48', '2020-04-21 23:55:26'),
(48, 49, '10', 1, '1', '1', '2020-04-22 00:20:59', '2020-04-22 00:20:59'),
(49, 74, '11', 2, '1', '2', '2020-04-22 10:06:14', '2020-04-22 10:11:13'),
(50, 74, '5', 1, '1', '1', '2020-04-22 10:34:24', '2020-04-22 10:34:24'),
(51, 54, '11', 5, '1', '2', '2020-04-24 12:17:26', '2020-04-24 12:18:58'),
(52, 54, '10', 3, '1', '2', '2020-04-24 12:20:25', '2020-04-24 12:28:49'),
(53, 54, '11', 1, '1', '2', '2020-04-24 12:27:33', '2020-04-24 12:29:06'),
(54, 54, '10', 3, '1', '2', '2020-04-24 12:27:38', '2020-04-24 12:29:06'),
(55, 54, '6', 1, '1', '2', '2020-04-24 12:27:41', '2020-04-24 12:29:06'),
(56, 59, '1', 2, '1', '2', '2020-04-24 15:29:31', '2020-04-27 12:34:03'),
(57, 76, '11', 1, '1', '2', '2020-04-24 16:45:26', '2020-04-24 16:58:24'),
(58, 76, '5', 1, '1', '2', '2020-04-24 16:57:37', '2020-04-24 16:58:24'),
(59, 54, '11', 1, '1', '2', '2020-04-24 17:03:54', '2020-04-24 17:04:37'),
(60, 54, '10', 1, '1', '2', '2020-04-24 17:03:57', '2020-04-24 17:04:37'),
(61, 77, '11', 2, '1', '1', '2020-04-24 17:41:16', '2020-04-24 17:41:26'),
(62, 76, '5', 1, '1', '2', '2020-04-25 09:45:16', '2020-04-25 09:49:00'),
(63, 84, '5', 1, '1', '2', '2020-04-25 10:13:08', '2020-04-25 10:14:49'),
(64, 84, '11', 1, '1', '2', '2020-04-25 10:22:18', '2020-04-27 11:39:45'),
(65, 54, '11', 1, '1', '2', '2020-04-26 18:26:40', '2020-04-26 18:27:57'),
(66, 54, '11', 1, '1', '2', '2020-04-26 18:30:50', '2020-04-26 18:31:08'),
(67, 54, '10', 1, '1', '2', '2020-04-26 18:30:53', '2020-04-26 18:31:08'),
(68, 54, '11', 1, '1', '2', '2020-04-26 18:32:17', '2020-04-26 18:32:34'),
(69, 54, '11', 1, '1', '2', '2020-04-26 18:32:54', '2020-04-26 18:39:09'),
(70, 54, '10', 1, '1', '2', '2020-04-26 18:33:02', '2020-04-26 18:39:09'),
(71, 54, '11', 1, '1', '2', '2020-04-26 18:42:40', '2020-04-26 18:43:06'),
(72, 54, '11', 1, '1', '2', '2020-04-26 19:16:29', '2020-04-27 11:58:01'),
(73, 85, '12', 1, '1', '2', '2020-04-27 01:07:59', '2020-04-27 07:52:42'),
(74, 85, '11', 1, '1', '2', '2020-04-27 01:08:01', '2020-04-27 07:52:42'),
(75, 85, '10', 2, '1', '2', '2020-04-27 01:08:02', '2020-04-27 07:52:42'),
(76, 85, '8', 2, '1', '2', '2020-04-27 01:08:04', '2020-04-27 07:52:42'),
(77, 85, '7', 1, '1', '2', '2020-04-27 08:18:10', '2020-04-27 08:20:13'),
(78, 76, '12', 1, '1', '2', '2020-04-27 09:51:56', '2020-04-27 09:58:19'),
(79, 76, '10', 1, '1', '2', '2020-04-27 09:59:38', '2020-04-27 14:27:21'),
(80, 54, '12', 1, '1', '2', '2020-04-27 11:56:09', '2020-04-27 11:58:01'),
(81, 84, '9', 1, '1', '2', '2020-04-27 12:02:32', '2020-04-27 12:32:15'),
(82, 59, '10', 1, '1', '2', '2020-04-27 12:24:35', '2020-04-27 12:33:50'),
(83, 84, '12', 1, '1', '2', '2020-04-27 12:24:36', '2020-04-27 12:32:15'),
(84, 84, '7', 1, '1', '2', '2020-04-27 12:31:51', '2020-04-27 12:32:15'),
(85, 59, '12', 1, '1', '2', '2020-04-27 12:34:26', '2020-04-27 12:34:40'),
(86, 85, '7', 1, '1', '2', '2020-04-27 13:18:00', '2020-04-27 13:44:23'),
(87, 85, '7', 1, '1', '2', '2020-04-27 14:25:53', '2020-04-27 14:27:21'),
(88, 76, '11', 1, '1', '2', '2020-04-27 14:28:28', '2020-04-27 14:36:23'),
(89, 85, '12', 1, '1', '1', '2020-04-27 14:36:23', '2020-04-27 14:36:23'),
(90, 76, '10', 1, '1', '2', '2020-04-27 14:44:43', '2020-04-27 14:45:13'),
(91, 84, '8', 1, '1', '2', '2020-04-27 14:55:25', '2020-04-27 14:56:39'),
(92, 54, '12', 1, '1', '2', '2020-04-27 15:20:57', '2020-04-27 15:29:19'),
(93, 84, '6', 1, '1', '2', '2020-04-27 15:26:16', '2020-04-27 15:26:44'),
(94, 76, '4', 1, '1', '2', '2020-04-27 17:12:37', '2020-04-27 17:13:47'),
(95, 76, '5', 1, '1', '2', '2020-04-28 11:03:23', '2020-04-28 11:03:57'),
(96, 76, '14', 1, '1', '2', '2020-04-29 19:27:55', '2020-04-29 19:28:23'),
(97, 71, '11', 1, '1', '2', '2020-05-30 19:48:12', '2020-05-30 19:49:23'),
(98, 71, '10', 1, '1', '2', '2020-05-30 19:48:13', '2020-05-30 19:49:23'),
(99, 71, '9', 2, '1', '2', '2020-05-30 19:48:15', '2020-05-30 19:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `ct_checkout_type`
--

CREATE TABLE `ct_checkout_type` (
  `ct_id` int(11) NOT NULL,
  `ct_type` varchar(50) NOT NULL,
  `ct_display_name` varchar(50) NOT NULL,
  `ct_status` enum('1','2') NOT NULL,
  `ct_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ct_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ct_checkout_type`
--

INSERT INTO `ct_checkout_type` (`ct_id`, `ct_type`, `ct_display_name`, `ct_status`, `ct_added`, `ct_modified`) VALUES
(1, 'cod', 'Cash On Delivery', '1', '2020-04-26 21:43:01', '2020-04-26 22:22:42'),
(2, 'payment_gateway', 'Online Payment', '1', '2020-04-26 21:43:15', '2020-04-26 22:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `c_category`
--

CREATE TABLE `c_category` (
  `c_id` int(11) NOT NULL,
  `c_title` varchar(60) NOT NULL,
  `c_status` enum('1','2') NOT NULL DEFAULT '1',
  `c_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_category`
--

INSERT INTO `c_category` (`c_id`, `c_title`, `c_status`, `c_added`, `c_updated`) VALUES
(1, 'Safety Frames', '1', '2021-01-31 14:04:14', '2021-01-31 14:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `c_contact`
--

CREATE TABLE `c_contact` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_email` text NOT NULL,
  `c_phone` varchar(55) NOT NULL,
  `c_message` text NOT NULL,
  `c_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_contact`
--

INSERT INTO `c_contact` (`c_id`, `c_name`, `c_email`, `c_phone`, `c_message`, `c_added`, `c_modified`) VALUES
(1, 'shil', 'shil@gmail.com', '7896541230', 'Test', '2020-04-19 15:47:22', '2020-04-19 15:47:22'),
(2, 'shil', 'shil@gmail.com', '7896541230', 'Test', '2020-04-19 15:48:07', '2020-04-19 15:48:07'),
(3, 'shiko', 'jd@gmail.com', '7896541230', 'jdhdfhjdf', '2020-04-19 15:57:32', '2020-04-19 15:57:32'),
(4, 'shilpa', 'shilpathreeseas@gmail.com', '8965412301', 'test', '2020-04-19 17:24:24', '2020-04-19 17:24:24'),
(5, 'fdf', 'sajanthreeseas@gmail.com', '09447798554', 'dggfg', '2020-04-19 18:29:18', '2020-04-19 18:29:18'),
(6, 'soumya', 'soumyathreeseas@gmail.com', '8797678765', 'hdhgdhg', '2020-04-20 04:07:39', '2020-04-20 04:07:39'),
(7, 'soumya', 'soumyathreeseas@gmail.com', '8606123973', 'cdsfs', '2020-04-20 07:16:46', '2020-04-20 07:16:46'),
(8, 'shilpa', 'shilpathreeseas@gmail.com', '9874563210', 'Test from gmail', '2020-04-21 05:52:15', '2020-04-21 05:52:15'),
(9, 'shilpa', 'shilpathreeseas@gmail.com', '9874563210', 'Test from gmail', '2020-04-21 05:54:17', '2020-04-21 05:54:17'),
(10, 'shilpa', 'shilpathreeseas@gmail.com', '9874563210', 'Test', '2020-04-21 05:55:01', '2020-04-21 05:55:01'),
(11, 'shilpa', 'shilpathreeseas@gmail.com', '9874563210', 'test', '2020-04-21 06:00:37', '2020-04-21 06:00:37'),
(12, 'shilpa', 'shilpathreeseas@gmail.com', '7896541230', 'Test kjs', '2020-04-21 06:37:33', '2020-04-21 06:37:33'),
(13, 'soumya', 'soumyathreeseas@gmail.com', '8606456789', 'fdfdsdsd', '2020-04-21 07:23:57', '2020-04-21 07:23:57'),
(14, 'soumya', 'soumyathreeseas@gmail.com', '8697890987', 'csdcsdc', '2020-04-22 04:51:42', '2020-04-22 04:51:42'),
(15, 'Soumya', 'Soumya@gmail.com', '8606123876', 'Hhhh', '2020-04-24 04:49:21', '2020-04-24 04:49:21'),
(16, 'soumya', 'soumyathreeseas@gmail.com', '8696123973', 'bgdb', '2020-04-25 05:07:12', '2020-04-25 05:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `i_invoice`
--

CREATE TABLE `i_invoice` (
  `i_id` int(11) NOT NULL,
  `i_unique_id` varchar(100) NOT NULL,
  `i_lid` int(11) NOT NULL,
  `i_summary` mediumtext,
  `i_billing_id` int(11) NOT NULL,
  `i_delivery_id` int(11) NOT NULL,
  `i_cart_ids` text NOT NULL,
  `i_product_types` int(11) NOT NULL,
  `i_no_of_pieces` int(11) NOT NULL,
  `i_total_mrp` varchar(10) NOT NULL,
  `i_total_selling_price` varchar(10) NOT NULL,
  `i_your_savings` varchar(10) NOT NULL,
  `i_delivery_charge` varchar(10) NOT NULL,
  `i_new_total` varchar(10) NOT NULL,
  `i_net_payable` varchar(10) NOT NULL,
  `i_payment_mode` enum('1','2','3','4','5','6','7') NOT NULL DEFAULT '1' COMMENT '1=unpaid 2=cc 3=dc 4=online_banking 5=wallet 6=cod 7=cheque',
  `i_payment_status` enum('1','2','3','4') NOT NULL DEFAULT '1' COMMENT '1=unpaid 2=success 3=cancelled 4=failed',
  `i_delivery_status` enum('1','2','3','4','5','6','7','8','9') NOT NULL COMMENT '1=pending,2=packing,3=delivery_initiated,5=intransit,5=collected_at_next_center,6=waiting_for_delivery,7=delivered,8=cancelled,9=undelivered',
  `i_delivery_remarks` text,
  `i_pdf` varchar(255) DEFAULT NULL,
  `i_status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1=active 2=completed 3=deleted',
  `i_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `i_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `i_invoice`
--

INSERT INTO `i_invoice` (`i_id`, `i_unique_id`, `i_lid`, `i_summary`, `i_billing_id`, `i_delivery_id`, `i_cart_ids`, `i_product_types`, `i_no_of_pieces`, `i_total_mrp`, `i_total_selling_price`, `i_your_savings`, `i_delivery_charge`, `i_new_total`, `i_net_payable`, `i_payment_mode`, `i_payment_status`, `i_delivery_status`, `i_delivery_remarks`, `i_pdf`, `i_status`, `i_added`, `i_update`) VALUES
(1, '5E9B480B0B446', 1, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":null,\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa \",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"150\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}],[{\"cr_id\":\"b3o0MXhrclF6ZE1xdmVnTXU0L1A4dz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa\",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"500\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}],[{\"cr_id\":\"VHFrOUR5Qm9PdWllNHA4UkhEMWcxZz09\",\"cr_quantity\":\"2\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa\",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"600\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}]],\"added_date\":\"2020-04-19 00:03:47\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"629151\",\"ma_distrct\":\"Kanyakumari\",\"ma_state\":\"Tamilnadu\"},{\"ma_address\":\"asdgfgds44\",\"ma_pincode\":\"777788\",\"ma_distrct\":\"ajhgds\",\"ma_state\":\"dasd\"}]}', 1, 8, '7,8,9', 3, 4, '480.00', '1850.00', '-1370.00', '', '1850.00', '1850.00', '6', '2', '1', NULL, NULL, '2', '2020-04-18 18:33:47', '2020-04-18 18:52:35'),
(2, '5E9B4C9FB9209', 1, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":null,\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa \",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"150\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}],[{\"cr_id\":\"b3o0MXhrclF6ZE1xdmVnTXU0L1A4dz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa\",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"500\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}],[{\"cr_id\":\"VHFrOUR5Qm9PdWllNHA4UkhEMWcxZz09\",\"cr_quantity\":\"2\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa\",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"600\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}]],\"added_date\":\"2020-04-19 00:23:19\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"629151\",\"ma_distrct\":\"Kanyakumari\",\"ma_state\":\"Tamilnadu\"},{\"ma_address\":\"asdgfgds44\",\"ma_pincode\":\"777788\",\"ma_distrct\":\"ajhgds\",\"ma_state\":\"dasd\"}]}', 1, 8, '7,8,9', 3, 4, '480.00', '1850.00', '-1370.00', '', '1850.00', '1850.00', '6', '2', '1', NULL, NULL, '2', '2020-04-18 18:53:19', '2020-04-18 18:54:29'),
(3, '5E9B4D2619A25', 1, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":null,\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa \",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"150\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}],[{\"cr_id\":\"b3o0MXhrclF6ZE1xdmVnTXU0L1A4dz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa\",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"500\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}],[{\"cr_id\":\"VHFrOUR5Qm9PdWllNHA4UkhEMWcxZz09\",\"cr_quantity\":\"2\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa\",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"600\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}]],\"added_date\":\"2020-04-19 00:25:34\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"629151\",\"ma_distrct\":\"Kanyakumari\",\"ma_state\":\"Tamilnadu\"},{\"ma_address\":\"asdgfgds44\",\"ma_pincode\":\"777788\",\"ma_distrct\":\"ajhgds\",\"ma_state\":\"dasd\"}]}', 1, 8, '7,8,9', 3, 4, '480.00', '1850.00', '-1370.00', '', '1850.00', '1850.00', '6', '2', '1', NULL, NULL, '2', '2020-04-18 18:55:34', '2020-04-18 18:55:42'),
(4, '5E9B4D5B74A47', 1, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":null,\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa \",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"150\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}],[{\"cr_id\":\"b3o0MXhrclF6ZE1xdmVnTXU0L1A4dz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa\",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"500\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}],[{\"cr_id\":\"VHFrOUR5Qm9PdWllNHA4UkhEMWcxZz09\",\"cr_quantity\":\"2\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa\",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"600\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}]],\"added_date\":\"2020-04-19 00:26:27\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"629151\",\"ma_distrct\":\"Kanyakumari\",\"ma_state\":\"Tamilnadu\"},{\"ma_address\":\"asdgfgds44\",\"ma_pincode\":\"777788\",\"ma_distrct\":\"ajhgds\",\"ma_state\":\"dasd\"}]}', 1, 8, '7,8,9', 3, 4, '480.00', '1850.00', '-1370.00', '', '1850.00', '1850.00', '6', '2', '1', NULL, NULL, '2', '2020-04-18 18:56:27', '2020-04-18 18:56:33'),
(5, '5E9B4D8B7001E', 1, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":null,\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa ljksdshdfksasa \",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"150\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}],[{\"cr_id\":\"b3o0MXhrclF6ZE1xdmVnTXU0L1A4dz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa\",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"500\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}],[{\"cr_id\":\"VHFrOUR5Qm9PdWllNHA4UkhEMWcxZz09\",\"cr_quantity\":\"2\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"test1\",\"pr_tiny_description\":\"ljksdshdfksasa\",\"pr_detailed_description\":\"jhzgsfyaduskdhasdas\",\"pr_selling_price\":\"600\",\"pr_mrp\":\"120\",\"pr_thumb_image\":\"051.jpg\",\"pr_gallery_image\":\"051.jpg,052.jpg,053.jpg\",\"pr_terms_and_conditions\":\"hjgadjsadfd\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"Computer\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"demo 1\"}]],\"added_date\":\"2020-04-19 00:27:15\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"629151\",\"ma_distrct\":\"Kanyakumari\",\"ma_state\":\"Tamilnadu\"},{\"ma_address\":\"asdgfgds44\",\"ma_pincode\":\"777788\",\"ma_distrct\":\"ajhgds\",\"ma_state\":\"dasd\"}]}', 1, 8, '7,8,9', 3, 4, '480.00', '1850.00', '-1370.00', '', '1850.00', '1850.00', '6', '2', '1', NULL, NULL, '2', '2020-04-18 18:57:15', '2020-04-18 18:57:20'),
(6, '5E9B4DF450AB5', 1, NULL, 1, 8, '10', 1, 1, '120.00', '500.00', '-380.00', '', '500.00', '500.00', '1', '1', '1', NULL, NULL, '1', '2020-04-18 18:59:00', '2020-04-18 18:59:00'),
(7, '5E9C356373C7D', 47, '{\"user\":[{\"m_name\":\"Suthan\",\"m_photo\":\"WIN_20200328_09_32_18_Pro.jpg\",\"m_email\":\"suthankumaraswamy2@gmail.com\",\"m_phone\":\"+918056834240\"}],\"prod_detail\":[[{\"cr_id\":\"VHFrOUR5Qm9PdWllNHA4UkhEMWcxZz09\",\"cr_quantity\":\"3\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,WhatsApp_Image_2020-04-15_at_17_20_35.jpeg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}]],\"added_date\":\"2020-04-19 16:56:27\",\"address\":[{\"ma_address\":\"Nagercoil\",\"ma_pincode\":\"629002\",\"ma_distrct\":\"KK\",\"ma_state\":\"TN\"},{\"ma_address\":\"Nagercoil\",\"ma_pincode\":\"629002\",\"ma_distrct\":\"Kanyakumari\",\"ma_state\":\"TamilNadu\"}],\"delivery_status\":[{\"d_status\":\"3\",\"d_status_time\":\"2020-04-19 01:24:09\"}]}', 10, 11, '9', 1, 3, '13332.00', '7272.00', '6060.00', '', '7272.00', '7272.00', '6', '2', '3', NULL, NULL, '2', '2020-04-19 11:26:27', '2020-04-19 13:24:09'),
(8, '5E9C5BDDC60CA', 40, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"pr_title\":\"watch\",\"pr_tiny_description\":\"testing\",\"pr_detailed_description\":\"testing\",\"pr_selling_price\":\"200\",\"pr_mrp\":\"212\",\"pr_thumb_image\":\"51.png\",\"pr_gallery_image\":\" \",\"pr_terms_and_conditions\":\"testing\",\"pr_is_featured\":\"1\",\"c_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"c_title\":\"test\",\"sb_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"sb_title\":\"jhf\"}],[{\"cr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"Q2YraVZkSkhQNStZQWNqaXMvbXg2dz09\",\"pr_title\":\"demo\",\"pr_tiny_description\":\"safda\",\"pr_detailed_description\":\"sdasdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"123\",\"pr_thumb_image\":\"Chrysanthemum1.jpg\",\"pr_gallery_image\":\"Chrysanthemum1.jpg\",\"pr_terms_and_conditions\":\"dsvsd\",\"pr_is_featured\":\"1\",\"c_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"c_title\":\"demoo\",\"sb_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"sb_title\":\"first test\"}],[{\"cr_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"cr_quantity\":\"2\",\"pr_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"pr_title\":\"laptop\",\"pr_tiny_description\":\"sadaksjdasdas\",\"pr_detailed_description\":\"sadkaslkdasdasd\",\"pr_selling_price\":\"9999\",\"pr_mrp\":\"10000\",\"pr_thumb_image\":\"admiria1.png\",\"pr_gallery_image\":\"admiria1.png,agroxa1.png\",\"pr_terms_and_conditions\":\"zj,cnaskdasdasd\",\"pr_is_featured\":\"1\",\"c_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"c_title\":\"demoo\",\"sb_id\":\"RzBoVFRIandoZVlGejBvTzR1VUJBQT09\",\"sb_title\":\"rich\"}]],\"added_date\":\"2020-04-19 19:40:49\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"657656\",\"ma_distrct\":\"sdfhgsdf\",\"ma_state\":\"sfgshf\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"657656\",\"ma_distrct\":\"sdfhgsdf\",\"ma_state\":\"sfgshf\"}]}', 12, 13, '6,5,7', 3, 4, '20335.00', '20210.00', '125.00', '', '20210.00', '20210.00', '6', '2', '1', NULL, NULL, '2', '2020-04-19 14:10:37', '2020-04-19 14:11:21'),
(9, '5E9C5C933AF56', 40, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"cr_quantity\":\"1\",\"pr_id\":\"Q2YraVZkSkhQNStZQWNqaXMvbXg2dz09\",\"pr_title\":\"demo\",\"pr_tiny_description\":\"safda\",\"pr_detailed_description\":\"sdasdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"123\",\"pr_thumb_image\":\"Chrysanthemum1.jpg\",\"pr_gallery_image\":\"Chrysanthemum1.jpg\",\"pr_terms_and_conditions\":\"dsvsd\",\"pr_is_featured\":\"1\",\"c_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"c_title\":\"demoo\",\"sb_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"sb_title\":\"first test\"}]],\"added_date\":\"2020-04-19 19:43:39\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"657656\",\"ma_distrct\":\"sdfhgsdf\",\"ma_state\":\"sfgshf\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"657656\",\"ma_distrct\":\"sdfhgsdf\",\"ma_state\":\"sfgshf\"}]}', 12, 13, '11', 1, 1, '123.00', '12.00', '111.00', '', '12.00', '12.00', '6', '2', '1', NULL, NULL, '2', '2020-04-19 14:13:39', '2020-04-19 14:14:10'),
(10, '5E9C5DB958F52', 40, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"NmtNS3Riemh1T0hYTjVobGZrakFoUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"pr_title\":\"laptop\",\"pr_tiny_description\":\"sadaksjdasdas\",\"pr_detailed_description\":\"sadkaslkdasdasd\",\"pr_selling_price\":\"9999\",\"pr_mrp\":\"10000\",\"pr_thumb_image\":\"admiria1.png\",\"pr_gallery_image\":\"admiria1.png,agroxa1.png\",\"pr_terms_and_conditions\":\"zj,cnaskdasdasd\",\"pr_is_featured\":\"1\",\"c_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"c_title\":\"demoo\",\"sb_id\":\"RzBoVFRIandoZVlGejBvTzR1VUJBQT09\",\"sb_title\":\"rich\"}]],\"added_date\":\"2020-04-19 19:48:33\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"657656\",\"ma_distrct\":\"sdfhgsdf\",\"ma_state\":\"sfgshf\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"657656\",\"ma_distrct\":\"sdfhgsdf\",\"ma_state\":\"sfgshf\"}]}', 12, 13, '12', 1, 1, '10000.00', '9999.00', '1.00', '', '9999.00', '9999.00', '6', '2', '1', NULL, '5E9C5DB958F52.pdf', '2', '2020-04-19 14:18:33', '2020-04-19 14:18:48'),
(11, '5E9C61602D0E4', 40, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,WhatsApp_Image_2020-04-15_at_17_20_35.jpeg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}]],\"added_date\":\"2020-04-19 20:37:37\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"657656\",\"ma_distrct\":\"sdfhgsdf\",\"ma_state\":\"sfgshf\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"657656\",\"ma_distrct\":\"sdfhgsdf\",\"ma_state\":\"sfgshf\"}]}', 12, 13, '13', 1, 1, '4444.00', '2424.00', '2020.00', '', '2424.00', '2424.00', '6', '2', '5', NULL, '5E9C61602D0E4.pdf', '2', '2020-04-19 14:34:08', '2020-04-19 15:20:53'),
(12, '5E9C6EF627E2E', 40, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"RzBoVFRIandoZVlGejBvTzR1VUJBQT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,WhatsApp_Image_2020-04-15_at_17_20_35.jpeg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}]],\"added_date\":\"2020-04-19 21:02:06\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"657656\",\"ma_distrct\":\"sdfhgsdf\",\"ma_state\":\"sfgshf\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"657656\",\"ma_distrct\":\"sdfhgsdf\",\"ma_state\":\"sfgshf\"}]}', 12, 13, '14', 1, 1, '4444.00', '2424.00', '2020.00', '', '2424.00', '2424.00', '6', '2', '1', NULL, '5E9C6EF627E2E.pdf', '2', '2020-04-19 15:32:06', '2020-04-19 15:32:35'),
(13, '5E9CA160421A2', 49, '{\"user\":[{\"m_name\":\"Sajan S S1\",\"m_photo\":\"hh.png\",\"m_email\":\"sajanthreeseas@gmail.com\",\"m_phone\":\"9447798554\"}],\"prod_detail\":[[{\"cr_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"cr_quantity\":\"3\",\"pr_id\":\"Q2YraVZkSkhQNStZQWNqaXMvbXg2dz09\",\"pr_title\":\"demo\",\"pr_tiny_description\":\"safda\",\"pr_detailed_description\":\"sdasdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"123\",\"pr_thumb_image\":\"Chrysanthemum1.jpg\",\"pr_gallery_image\":\"Chrysanthemum1.jpg\",\"pr_terms_and_conditions\":\"dsvsd\",\"pr_is_featured\":\"1\",\"c_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"c_title\":\"demoo\",\"sb_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"sb_title\":\"first test\"}]],\"added_date\":\"2020-04-20 00:37:12\",\"address\":[{\"ma_address\":\"Sasina Gardens\\nKuruvikkala , Mulluvila PO\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"TVM\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"Sasina Gardens\\nKuruvikkala , Mulluvila PO\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"TVM\",\"ma_state\":\"Kerala\"}]}', 14, 15, '15', 1, 3, '369.00', '36.00', '333.00', '', '36.00', '36.00', '6', '2', '1', NULL, '5E9CA160421A2.pdf', '2', '2020-04-19 19:07:12', '2020-04-19 19:07:22'),
(14, '5E9D3FFEE37F4', 52, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"Hydrangeas.jpg\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8696789087\"}],\"prod_detail\":[[{\"cr_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,WhatsApp_Image_2020-04-15_at_17_20_35.jpeg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}],[{\"cr_id\":\"N1hrTkszRlk0ZitsV083N3FuKzI5QT09\",\"cr_quantity\":\"1\",\"pr_id\":\"Q2YraVZkSkhQNStZQWNqaXMvbXg2dz09\",\"pr_title\":\"demo\",\"pr_tiny_description\":\"safda\",\"pr_detailed_description\":\"sdasdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"123\",\"pr_thumb_image\":\"Chrysanthemum1.jpg\",\"pr_gallery_image\":\"Chrysanthemum1.jpg\",\"pr_terms_and_conditions\":\"dsvsd\",\"pr_is_featured\":\"1\",\"c_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"c_title\":\"demoo\",\"sb_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"sb_title\":\"first test\"}]],\"added_date\":\"2020-04-20 11:53:58\",\"address\":[{\"ma_address\":\"demo\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"dfg\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"demo\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"dfg\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"2\",\"d_status_time\":\"2020-04-20 12:15:53\"},{\"d_status\":\"4\",\"d_status_time\":\"2020-04-20 12:18:37\"}]}', 16, 17, '1,2', 2, 2, '4567.00', '2436.00', '2131.00', '', '2436.00', '2436.00', '6', '2', '4', NULL, '5E9D3FFEE37F4.pdf', '2', '2020-04-20 06:23:58', '2020-04-20 06:48:37'),
(15, '5E9D5595ED182', 50, '{\"user\":[{\"m_name\":\"shilpa\",\"m_photo\":\"\",\"m_email\":\"shilpathreeseas@gmail.com\",\"m_phone\":\"9874563210\"}],\"prod_detail\":[[{\"cr_id\":\"Q2YraVZkSkhQNStZQWNqaXMvbXg2dz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"Chrysanthemum2.jpg\",\"pr_gallery_image\":\"Chrysanthemum2.jpg\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}],[{\"cr_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,WhatsApp_Image_2020-04-15_at_17_20_35.jpeg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}],[{\"cr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"pr_title\":\"laptop\",\"pr_tiny_description\":\"sadaksjdasdas\",\"pr_detailed_description\":\"sadkaslkdasdasd\",\"pr_selling_price\":\"9999\",\"pr_mrp\":\"10000\",\"pr_thumb_image\":\"admiria1.png\",\"pr_gallery_image\":\"admiria1.png,agroxa1.png\",\"pr_terms_and_conditions\":\"zj,cnaskdasdasd\",\"pr_is_featured\":\"1\",\"c_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"c_title\":\"demoo\",\"sb_id\":\"RzBoVFRIandoZVlGejBvTzR1VUJBQT09\",\"sb_title\":\"rich\"}],[{\"cr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"Q2YraVZkSkhQNStZQWNqaXMvbXg2dz09\",\"pr_title\":\"demo\",\"pr_tiny_description\":\"safda\",\"pr_detailed_description\":\"sdasdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"123\",\"pr_thumb_image\":\"Chrysanthemum1.jpg\",\"pr_gallery_image\":\"Chrysanthemum1.jpg\",\"pr_terms_and_conditions\":\"dsvsd\",\"pr_is_featured\":\"1\",\"c_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"c_title\":\"demoo\",\"sb_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"sb_title\":\"first test\"}]],\"added_date\":\"2020-04-20 13:26:05\",\"address\":[{\"ma_address\":\"Sreyas(H)\\nthengeli PO, Kuttoor\",\"ma_pincode\":\"689106\",\"ma_distrct\":\"Thiruvalla\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"Sreyas(H)\\nthengeli PO, Kuttoor\",\"ma_pincode\":\"689106\",\"ma_distrct\":\"Thiruvalla\",\"ma_state\":\"Kerala\"}]}', 24, 25, '3,4,5,6', 4, 4, '15800.00', '12447.00', '3353.00', '', '12447.00', '12447.00', '6', '2', '1', NULL, '5E9D5595ED182.pdf', '2', '2020-04-20 07:56:05', '2020-04-20 07:56:12'),
(16, '5E9D6114B3C44', 53, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"Chrysanthemum2.jpg\",\"pr_gallery_image\":\"Chrysanthemum2.jpg\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-20 14:15:08\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"df\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"df\",\"ma_state\":\"Kerala\"}]}', 26, 27, '7', 1, 1, '1233.00', '12.00', '1221.00', '', '12.00', '12.00', '6', '2', '1', NULL, '5E9D6114B3C44.pdf', '2', '2020-04-20 08:45:08', '2020-04-20 08:45:14'),
(17, '5E9D6621AA7CD', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"b3o0MXhrclF6ZE1xdmVnTXU0L1A4dz09\",\"cr_quantity\":\"2\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,WhatsApp_Image_2020-04-15_at_17_20_35.jpeg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}]],\"added_date\":\"2020-04-20 14:36:41\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"}]}', 28, 29, '8', 1, 2, '8888.00', '4848.00', '4040.00', '', '4848.00', '4848.00', '6', '2', '1', NULL, '5E9D6621AA7CD.pdf', '2', '2020-04-20 09:06:41', '2020-04-20 09:06:55'),
(18, '5E9D7458BF5EF', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"Chrysanthemum2.jpg\",\"pr_gallery_image\":\"Chrysanthemum2.jpg\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-20 17:07:41\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"}]}', 28, 29, '10', 1, 1, '1233.00', '12.00', '1221.00', '', '12.00', '12.00', '6', '2', '1', NULL, '5E9D7458BF5EF.pdf', '2', '2020-04-20 10:07:20', '2020-04-20 11:39:39'),
(19, '5E9D7DEBE69DC', 53, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,WhatsApp_Image_2020-04-15_at_17_20_35.jpeg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}]],\"added_date\":\"2020-04-20 16:18:11\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"df\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"df\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"4\",\"d_status_time\":\"2020-04-21 11:27:12\"}]}', 26, 27, '11', 1, 1, '4444.00', '2424.00', '2020.00', '', '2424.00', '2424.00', '1', '1', '4', NULL, NULL, '1', '2020-04-20 10:48:11', '2020-04-21 05:57:12'),
(20, '5E9D8AF579E2C', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"NmtNS3Riemh1T0hYTjVobGZrakFoUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"Chrysanthemum2.jpg\",\"pr_gallery_image\":\"Chrysanthemum2.jpg\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-20 17:13:49\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"}]}', 28, 29, '12', 1, 1, '1233.00', '12.00', '1221.00', '', '12.00', '12.00', '6', '2', '1', NULL, '5E9D8AF579E2C.pdf', '2', '2020-04-20 11:43:49', '2020-04-20 11:43:56'),
(21, '5E9D8C519204D', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"Chrysanthemum2.jpg\",\"pr_gallery_image\":\"Chrysanthemum2.jpg\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-20 17:19:37\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"}]}', 28, 29, '13', 1, 1, '1233.00', '12.00', '1221.00', '', '12.00', '12.00', '6', '2', '1', NULL, '5E9D8C519204D.pdf', '2', '2020-04-20 11:49:37', '2020-04-20 11:53:58'),
(22, '5E9D9354AAF80', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"RzBoVFRIandoZVlGejBvTzR1VUJBQT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"Chrysanthemum2.jpg\",\"pr_gallery_image\":\"Chrysanthemum2.jpg\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-20 17:49:32\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"}],\"delivery_status\":[{\"d_status\":\"3\",\"d_status_time\":\"2020-04-21 03:44:01\"}]}', 28, 29, '14', 1, 1, '1233.00', '12.00', '1221.00', '', '12.00', '12.00', '6', '2', '3', NULL, '5E9D9354AAF80.pdf', '2', '2020-04-20 12:19:32', '2020-04-20 22:14:01'),
(23, '5E9D944CA8E17', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"bm5JYWZFTWdUWFR2bzZydzFpc3ZIZz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,WhatsApp_Image_2020-04-15_at_17_20_35.jpeg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}],[{\"cr_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"Chrysanthemum2.jpg\",\"pr_gallery_image\":\"Chrysanthemum2.jpg\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-20 17:53:40\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"}]}', 28, 29, '16,15', 2, 2, '5677.00', '2436.00', '3241.00', '', '2436.00', '2436.00', '6', '2', '1', NULL, '5E9D944CA8E17.pdf', '2', '2020-04-20 12:23:40', '2020-04-20 12:23:46'),
(24, '5E9DB4245FF8A', 59, '{\"user\":[{\"m_name\":\"Suthan\",\"m_photo\":\"513.png\",\"m_email\":\"suthankumaraswamy2@gmail.com\",\"m_phone\":\"+918056834240\"}],\"prod_detail\":[[{\"cr_id\":\"Z3grSnhlSzgwUXpFbkZoNmRqN0loQT09\",\"cr_quantity\":\"3\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,PPE-Kit-Available-Banner.jpg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}]],\"added_date\":\"2020-04-20 20:09:32\",\"address\":[{\"ma_address\":\"126e,chety street,kottar,nagercoil\",\"ma_pincode\":\"629002\",\"ma_distrct\":\"KK\",\"ma_state\":\"Tamilnadu\"},{\"ma_address\":\"126e,chety street,kottar,nagercoil\",\"ma_pincode\":\"629002\",\"ma_distrct\":\"KK\",\"ma_state\":\"Tamilnadu\"}],\"delivery_status\":[{\"d_status\":\"2\",\"d_status_time\":\"2020-04-20 08:11:28\"},{\"d_status\":\"3\",\"d_status_time\":\"2020-04-20 08:13:10\"},{\"d_status\":\"2\",\"d_status_time\":\"2020-04-20 08:19:38\"},{\"d_status\":\"3\",\"d_status_time\":\"2020-04-20 08:20:47\"},{\"d_status\":\"4\",\"d_status_time\":\"2020-04-20 08:22:44\"},{\"d_status\":\"5\",\"d_status_time\":\"2020-04-20 08:23:59\"},{\"d_status\":\"6\",\"d_status_time\":\"2020-04-20 08:24:40\"},{\"d_status\":\"7\",\"d_status_time\":\"2020-04-20 08:33:10\"},{\"d_status\":\"8\",\"d_status_time\":\"2020-04-20 08:34:57\"},{\"d_status\":\"9\",\"d_status_time\":\"2020-04-20 08:35:11\"},{\"d_status\":\"1\",\"d_status_time\":\"2020-04-20 08:36:29\"},{\"d_status\":\"2\",\"d_status_time\":\"2020-04-20 08:46:31\"},{\"d_status\":\"3\",\"d_status_time\":\"2020-04-20 08:52:30\"},{\"d_status\":\"4\",\"d_status_time\":\"2020-04-20 09:55:18\"},{\"d_status\":\"5\",\"d_status_time\":\"2020-04-20 10:00:07\"},{\"d_status\":\"1\",\"d_status_time\":\"2020-04-20 10:03:49\"},{\"d_status\":\"2\",\"d_status_time\":\"2020-04-20 10:04:33\"},{\"d_status\":\"3\",\"d_status_time\":\"2020-04-21 07:46:05\"},{\"d_status\":\"4\",\"d_status_time\":\"2020-04-21 07:48:56\"},{\"d_status\":\"5\",\"d_status_time\":\"2020-04-21 08:15:22\"},{\"d_status\":\"6\",\"d_status_time\":\"2020-04-21 08:21:04\"}]}', 38, 39, '17', 1, 3, '13332.00', '7272.00', '6060.00', '', '7272.00', '7272.00', '6', '2', '6', NULL, '5E9DB4245FF8A.pdf', '2', '2020-04-20 14:39:32', '2020-04-21 14:51:04'),
(25, '5E9E99DC2BACF', 72, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123987\"}],\"prod_detail\":[[{\"cr_id\":\"RHJpN1lpek1TQzdVWm9UUVhIbmcwUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}]],\"added_date\":\"2020-04-21 12:29:40\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"dfsf\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"dfsf\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"2\",\"d_status_time\":\"2020-04-21 12:41:01\"},{\"d_status\":\"3\",\"d_status_time\":\"2020-04-21 12:41:51\"}]}', 51, 52, '19', 1, 1, '1200.00', '1000.00', '200.00', '', '1000.00', '1000.00', '6', '2', '3', NULL, '5E9E99DC2BACF.pdf', '2', '2020-04-21 06:59:40', '2020-04-21 07:11:51'),
(26, '5E9E9D670CAF4', 71, '{\"user\":[{\"m_name\":\"shilpa\",\"m_photo\":\"\",\"m_email\":\"shilpathreeseas@gmail.com\",\"m_phone\":\"7896541230\"}],\"prod_detail\":[[{\"cr_id\":\"dVJZZ3JzQkdtOU5pSzBtbGhSV01Ydz09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"aSsvck5LVmMrMkN1VndtMkJZYTV3UT09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}],[{\"cr_id\":\"TlF0YlVYWXFqaG9PMEhPNG5OUjZ6Zz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"kjsdkalsdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"6.png\",\"pr_gallery_image\":\"6.png,admiria2.png,53.png,2.png\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-21 12:44:47\",\"address\":[{\"ma_address\":\"Sreyas(H)\\nthengeli PO, Kuttoor\",\"ma_pincode\":\"689106\",\"ma_distrct\":\"Thiruvalla\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"Sreyas(H)\\nthengeli PO, Kuttoor\",\"ma_pincode\":\"689106\",\"ma_distrct\":\"Thiruvalla\",\"ma_state\":\"Kerala\"}]}', 54, 55, '20,21,22', 3, 3, '2463.00', '1032.00', '1431.00', '', '1032.00', '1032.00', '6', '2', '1', NULL, '5E9E9D670CAF4.pdf', '2', '2020-04-21 07:14:47', '2020-04-21 07:14:59'),
(27, '5E9EBB9DE41C2', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"S0k1aTdpRC9jeDlWTEo0MitKU0tHdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"Rmh4SjBxOHkyN2U4S0RXaHZNSnhqQT09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}],[{\"cr_id\":\"UW5PVHY2UW5IaFpseHFmaHl3WVNDZz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"kjsdkalsdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"6.png\",\"pr_gallery_image\":\"6.png,admiria2.png,53.png,2.png\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-21 14:53:41\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"}]}', 28, 29, '23,24,25', 3, 3, '2463.00', '1032.00', '1431.00', '', '1032.00', '1032.00', '6', '2', '1', NULL, '5E9EBB9DE41C2.pdf', '2', '2020-04-21 09:23:41', '2020-04-21 09:24:22'),
(28, '5E9EC1409AD25', 72, '{\"delivery_status\":[{\"d_status\":\"3\",\"d_status_time\":\"2020-04-21 07:08:16\"}]}', 51, 52, '26', 1, 1, '4444.00', '2424.00', '2020.00', '', '2424.00', '2424.00', '1', '1', '3', NULL, NULL, '1', '2020-04-21 09:47:44', '2020-04-21 13:38:16'),
(29, '5E9EC810B3EB8', 71, '{\"user\":[{\"m_name\":\"shilpa\",\"m_photo\":\"\",\"m_email\":\"shilpathreeseas@gmail.com\",\"m_phone\":\"7896541230\"}],\"prod_detail\":[[{\"cr_id\":\"akR0UGI4ZHQrZFBlbTgvdnhuVnk2UT09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"RExtRHp1TXVvSDRmZlNYVGhCaGk2UT09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}],[{\"cr_id\":\"akNoSGduRjVXZUxaUXZkWXpUU3BxUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"kjsdkalsdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"6.png\",\"pr_gallery_image\":\"6.png,admiria2.png,53.png,2.png\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-21 15:46:48\",\"address\":[{\"ma_address\":\"Sreyas(H)\\nthengeli PO, Kuttoor\",\"ma_pincode\":\"689106\",\"ma_distrct\":\"Thiruvalla\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"Sreyas(H)\\nthengeli PO, Kuttoor\",\"ma_pincode\":\"689106\",\"ma_distrct\":\"Thiruvalla\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"2\",\"d_status_time\":\"2020-04-21 04:35:55\"},{\"d_status\":\"1\",\"d_status_time\":\"2020-04-21 04:36:03\"},{\"d_status\":\"2\",\"d_status_time\":\"2020-04-21 05:06:31\"},{\"d_status\":\"3\",\"d_status_time\":\"2020-04-21 05:06:43\"},{\"d_status\":\"4\",\"d_status_time\":\"2020-04-21 05:07:05\"},{\"d_status\":\"5\",\"d_status_time\":\"2020-04-21 05:07:13\"},{\"d_status\":\"6\",\"d_status_time\":\"2020-04-21 05:07:23\"},{\"d_status\":\"7\",\"d_status_time\":\"2020-04-21 05:07:34\"},{\"d_status\":\"8\",\"d_status_time\":\"2020-04-21 05:07:42\"},{\"d_status\":\"9\",\"d_status_time\":\"2020-04-21 05:08:05\"}]}', 54, 55, '28,29,30', 3, 3, '2463.00', '1032.00', '1431.00', '', '1032.00', '1032.00', '6', '2', '9', NULL, '5E9EC810B3EB8.pdf', '2', '2020-04-21 10:16:48', '2020-04-21 11:38:05');
INSERT INTO `i_invoice` (`i_id`, `i_unique_id`, `i_lid`, `i_summary`, `i_billing_id`, `i_delivery_id`, `i_cart_ids`, `i_product_types`, `i_no_of_pieces`, `i_total_mrp`, `i_total_selling_price`, `i_your_savings`, `i_delivery_charge`, `i_new_total`, `i_net_payable`, `i_payment_mode`, `i_payment_status`, `i_delivery_status`, `i_delivery_remarks`, `i_pdf`, `i_status`, `i_added`, `i_update`) VALUES
(30, '5E9EFD213EA64', 71, '{\"user\":[{\"m_name\":\"shilpa\",\"m_photo\":\"\",\"m_email\":\"shilpathreeseas@gmail.com\",\"m_phone\":\"7896541230\"}],\"prod_detail\":[[{\"cr_id\":\"dmhwdEpmYitkeE1ZZDRYbnphemN6QT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,face.png,fb.jpg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}],[{\"cr_id\":\"SWpwUUN4RU5YUnVWM3NNTjk3cDNXUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"pr_title\":\"laptop\",\"pr_tiny_description\":\"sadaksjdasdas\",\"pr_detailed_description\":\"sadkaslkdasdasd\",\"pr_selling_price\":\"9999\",\"pr_mrp\":\"10000\",\"pr_thumb_image\":\"admiria1.png\",\"pr_gallery_image\":\"admiria1.png,agroxa1.png\",\"pr_terms_and_conditions\":\"zj,cnaskdasdasd\",\"pr_is_featured\":\"1\",\"c_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"c_title\":\"demoo\",\"sb_id\":\"RzBoVFRIandoZVlGejBvTzR1VUJBQT09\",\"sb_title\":\"rich\"}],[{\"cr_id\":\"UjltRmFhMW1VcW5xc1NMYWp2OHN4dz09\",\"cr_quantity\":\"1\",\"pr_id\":\"Q2YraVZkSkhQNStZQWNqaXMvbXg2dz09\",\"pr_title\":\"demo\",\"pr_tiny_description\":\"safda\",\"pr_detailed_description\":\"sdasdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"123\",\"pr_thumb_image\":\"Chrysanthemum1.jpg\",\"pr_gallery_image\":\"Chrysanthemum1.jpg\",\"pr_terms_and_conditions\":\"dsvsd\",\"pr_is_featured\":\"1\",\"c_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"c_title\":\"demoo\",\"sb_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"sb_title\":\"first test\"}]],\"added_date\":\"2020-04-21 19:33:13\",\"address\":[{\"ma_address\":\"Sreyas(H)\\nthengeli PO, Kuttoor\",\"ma_pincode\":\"689106\",\"ma_distrct\":\"Thiruvalla\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"Sreyas(H)\\nthengeli PO, Kuttoor\",\"ma_pincode\":\"689106\",\"ma_distrct\":\"Thiruvalla\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"2\",\"d_status_time\":\"2020-04-21 07:35:30\"},{\"d_status\":\"3\",\"d_status_time\":\"2020-04-27 09:37:10\"},{\"d_status\":\"4\",\"d_status_time\":\"2020-04-27 09:37:31\"}]}', 54, 55, '33,34,35', 3, 3, '14567.00', '12435.00', '2132.00', '', '12435.00', '12435.00', '6', '2', '4', NULL, '5E9EFD213EA64.pdf', '2', '2020-04-21 14:03:13', '2020-04-27 04:07:31'),
(31, '5E9F013833370', 59, '{\"user\":[{\"m_name\":\"Suthan\",\"m_photo\":\"avatar.png\",\"m_email\":\"suthankumaraswamy2@gmail.com\",\"m_phone\":\"+918056834240\"}],\"prod_detail\":[[{\"cr_id\":\"VWJJdExscmZqMjI2MS9VZy9kWTVUZz09\",\"cr_quantity\":\"3\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-21 19:50:40\",\"address\":[{\"ma_address\":\"126e,chety street,kottar,nagercoil\",\"ma_pincode\":\"629002\",\"ma_distrct\":\"KK\",\"ma_state\":\"Tamilnadu\"},{\"ma_address\":\"126e,chety street,kottar,nagercoil\",\"ma_pincode\":\"629002\",\"ma_distrct\":\"KK\",\"ma_state\":\"Tamilnadu\"}]}', 38, 39, '36', 1, 3, '90.00', '60.00', '30.00', '', '60.00', '60.00', '6', '2', '1', NULL, '5E9F013833370.pdf', '2', '2020-04-21 14:20:40', '2020-04-21 14:20:48'),
(32, '5E9F2464AD8D6', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"TkZSbFc1SkRndFJkcE0xT2FrYVozdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"Z25SZTF4NXNxNjZmcERocTRtQzNYdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}],[{\"cr_id\":\"TUtaRmNselBtNFdnM01sZHl3Mmdmdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,face.png,fb.jpg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}]],\"added_date\":\"2020-04-21 22:20:44\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"}]}', 28, 29, '37,38,39', 3, 3, '5674.00', '3444.00', '2230.00', '', '3444.00', '3444.00', '6', '2', '1', NULL, '5E9F2464AD8D6.pdf', '2', '2020-04-21 16:50:44', '2020-04-21 16:50:53'),
(33, '5E9F2707248AD', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"TFU2WSs0d21qbERCTkJDb1NJQ3hRQT09\",\"cr_quantity\":\"2\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"MGlPKzlnRWQ4SHFxMGExa01YTlRFUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}],[{\"cr_id\":\"TmV2NTEwcjc4ditFZTVHMUc4Mm1Rdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"kjsdkalsdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"6.png\",\"pr_gallery_image\":\"6.png,admiria2.png,53.png,2.png\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-21 22:31:59\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"}]}', 28, 29, '40,41,42', 3, 4, '3663.00', '2032.00', '1631.00', '', '2032.00', '2032.00', '6', '2', '1', NULL, '5E9F2707248AD.pdf', '2', '2020-04-21 17:01:59', '2020-04-21 17:02:06'),
(34, '5E9F2983103C2', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"Y2ZHS09UVFArVEF0bWh4eG1tdGF2QT09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}],[{\"cr_id\":\"aTYwRlUzSG5CWmRRWnpNYko2dHp4Zz09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}]],\"added_date\":\"2020-04-21 22:42:35\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"}]}', 28, 29, '43,44', 2, 2, '1230.00', '1020.00', '210.00', '', '1020.00', '1020.00', '6', '2', '1', NULL, '5E9F2983103C2.pdf', '2', '2020-04-21 17:12:35', '2020-04-21 17:12:43'),
(35, '5E9F35683BE9A', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"R1owMGxOZFBoT09GdXh6YmhIMUt5dz09\",\"cr_quantity\":\"3\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-22 00:07:50\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address222\",\"ma_pincode\":\"666777\",\"ma_distrct\":\"ahdgfjsf\",\"ma_state\":\"jahsdjahgd\"}]}', 57, 29, '45', 1, 3, '90.00', '60.00', '30.00', '', '60.00', '60.00', '6', '2', '1', NULL, '5E9F35683BE9A.pdf', '2', '2020-04-21 18:03:20', '2020-04-21 18:38:07'),
(36, '5E9F3A8E90ED3', 59, '{\"user\":[{\"m_name\":\"Suthan\",\"m_photo\":\"avatar.png\",\"m_email\":\"suthankumaraswamy2@gmail.com\",\"m_phone\":\"+918056834240\"}],\"prod_detail\":[[{\"cr_id\":\"VkFIQStzck82Z1BOMkYrWXdJb29aQT09\",\"cr_quantity\":\"4\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-21 23:55:18\",\"address\":[{\"ma_address\":\"126e,chety street,kottar,nagercoil\",\"ma_pincode\":\"629002\",\"ma_distrct\":\"KK\",\"ma_state\":\"Tamilnadu\"},{\"ma_address\":\"126e,chety street,kottar,nagercoil\",\"ma_pincode\":\"629002\",\"ma_distrct\":\"KK\",\"ma_state\":\"Tamilnadu\"}]}', 38, 39, '47', 1, 4, '120.00', '80.00', '40.00', '', '80.00', '80.00', '6', '2', '1', NULL, '5E9F3A8E90ED3.pdf', '2', '2020-04-21 18:25:18', '2020-04-21 18:25:27'),
(37, '5E9FC9F7A06A5', 74, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"TTdOZlBGc010aGV3M2Y4RklxcFEzQT09\",\"cr_quantity\":\"2\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}]],\"added_date\":\"2020-04-22 10:11:01\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"ddfg\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"ddfg\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"2\",\"d_status_time\":\"2020-04-22 10:13:44\"},{\"d_status\":\"1\",\"d_status_time\":\"2020-04-22 10:17:32\"},{\"d_status\":\"7\",\"d_status_time\":\"2020-04-22 10:29:43\"}]}', 58, 59, '49', 1, 2, '2400.00', '2000.00', '400.00', '', '2000.00', '2000.00', '6', '2', '7', NULL, '5E9FC9F7A06A5.pdf', '2', '2020-04-22 04:37:11', '2020-04-22 04:59:43'),
(38, '5E9FD2110A86C', 74, NULL, 58, 59, '50', 1, 1, '4444.00', '2424.00', '2020.00', '', '2424.00', '2424.00', '1', '1', '1', NULL, NULL, '1', '2020-04-22 05:11:45', '2020-04-22 05:11:45'),
(39, '5EA28BC0D7098', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"aHRId1pSOE5PK1RjeUxHUExhdVdaZz09\",\"cr_quantity\":\"5\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}]],\"added_date\":\"2020-04-24 12:18:32\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address222\",\"ma_pincode\":\"666777\",\"ma_distrct\":\"ahdgfjsf\",\"ma_state\":\"jahsdjahgd\"}]}', 57, 29, '51', 1, 5, '6000.00', '5000.00', '1000.00', '', '5000.00', '5000.00', '6', '2', '1', NULL, '5EA28BC0D7098.pdf', '2', '2020-04-24 06:48:32', '2020-04-24 06:48:58'),
(40, '5EA28C5072F74', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"Uk1oOTJIN2VRMVQ4Rm90b3FsaHFIQT09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-24 12:20:56\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address222\",\"ma_pincode\":\"666777\",\"ma_distrct\":\"ahdgfjsf\",\"ma_state\":\"jahsdjahgd\"}]}', 57, 29, '52', 1, 1, '30.00', '20.00', '10.00', '', '20.00', '20.00', '6', '2', '1', NULL, '5EA28C5072F74.pdf', '2', '2020-04-24 06:50:56', '2020-04-24 06:51:06'),
(41, '5EA28E347FAA6', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"M1hLa25CaXBGOElkZzJtcGI1aVZNdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"dVdXSmNXVEFvZ08zTVVTS3lFTEVSQT09\",\"cr_quantity\":\"3\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}],[{\"cr_id\":\"YUU2TWlTN2ZBZy83ZklLYStHcVBQdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"kjsdkalsdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"6.png\",\"pr_gallery_image\":\"6.png,admiria2.png,53.png,2.png\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-24 12:29:00\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address222\",\"ma_pincode\":\"666777\",\"ma_distrct\":\"ahdgfjsf\",\"ma_state\":\"jahsdjahgd\"}]}', 57, 29, '53,54,55', 3, 5, '2523.00', '1072.00', '1451.00', '', '1072.00', '1072.00', '6', '2', '1', NULL, '5EA28E347FAA6.pdf', '2', '2020-04-24 06:59:00', '2020-04-24 06:59:07'),
(42, '5EA2B88DCEEC5', 59, '{\"user\":[{\"m_name\":\"Suthan\",\"m_photo\":\"avatar.png\",\"m_email\":\"suthankumaraswamy2@gmail.com\",\"m_phone\":\"+918056834240\"}],\"prod_detail\":[[{\"cr_id\":\"TlZTQVVnM1h1aEtKNGJUQ2tNU2JEUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"NmtNS3Riemh1T0hYTjVobGZrakFoUT09\",\"pr_title\":\"ring\",\"pr_tiny_description\":\"short testA\",\"pr_detailed_description\":\"short testA\",\"pr_selling_price\":\"900\",\"pr_mrp\":\"1000\",\"pr_thumb_image\":\"avatar12.png\",\"pr_gallery_image\":\"avatar12.png,fb8.jpg,linkedin1.png\",\"pr_terms_and_conditions\":\"short testA\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 12:34:35\",\"address\":[{\"ma_address\":\"126e,chety street,kottar,nagercoil\",\"ma_pincode\":\"629002\",\"ma_distrct\":\"KK\",\"ma_state\":\"Tamilnadu\"},{\"ma_address\":\"126e,chety street,kottar,nagercoil\",\"ma_pincode\":\"629002\",\"ma_distrct\":\"KK\",\"ma_state\":\"Tamilnadu\"}]}', 38, 39, '85', 1, 1, '1000.00', '900.00', '100.00', '', '900.00', '900.00', '6', '2', '5', NULL, '5EA2B88DCEEC5.pdf', '2', '2020-04-24 09:59:41', '2020-04-27 07:04:41'),
(43, '5EA2CD535D0C2', 76, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"SmExY2dBMVd2Z1Y2MVp4TUwvcXduQT09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"a0QrK3B6MU5uaEppTWVQTUtWSzNZUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,face.png,fb.jpg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}]],\"added_date\":\"2020-04-24 16:58:19\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fsv\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fsv\",\"ma_state\":\"Kerala\"}]}', 61, 62, '57,58', 2, 2, '5644.00', '3424.00', '2220.00', '', '3424.00', '3424.00', '6', '2', '1', NULL, '5EA2CD535D0C2.pdf', '2', '2020-04-24 11:28:19', '2020-04-24 11:28:34'),
(44, '5EA2CEB1C5554', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"cDhBVXBHQjIrbVR0NE1VKzFRZ2xhdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"eXNEaDhXUUxiVm81VWg0b1NOeFFDZz09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-24 17:04:09\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address222\",\"ma_pincode\":\"666777\",\"ma_distrct\":\"ahdgfjsf\",\"ma_state\":\"jahsdjahgd\"}]}', 57, 29, '59,60', 2, 2, '1230.00', '1020.00', '210.00', '', '1020.00', '1020.00', '6', '2', '1', NULL, '5EA2CEB1C5554.pdf', '2', '2020-04-24 11:34:09', '2020-04-24 11:34:38'),
(45, '5EA3BA2824CEC', 76, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"Vk5wZEhWdFprbEN0azNpVExodGdSQT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,face.png,fb.jpg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}]],\"added_date\":\"2020-04-25 09:48:48\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fsv\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fsv\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"2\",\"d_status_time\":\"2020-04-25 10:00:11\"}]}', 61, 62, '62', 1, 1, '4444.00', '2424.00', '2020.00', '', '2424.00', '2424.00', '6', '2', '2', NULL, '5EA3BA2824CEC.pdf', '2', '2020-04-25 04:18:48', '2020-04-25 04:30:11'),
(46, '5EA3C039D6444', 84, '{\"user\":[{\"m_name\":\"demo\",\"m_photo\":\"\",\"m_email\":\"-\",\"m_phone\":\"7356560711\"}],\"prod_detail\":[[{\"cr_id\":\"djlIN1dkVi9ZcUFMQ0tEWGpxdGVyUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,face.png,fb.jpg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}]],\"added_date\":\"2020-04-25 10:14:41\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fs\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fs\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"2\",\"d_status_time\":\"2020-04-25 10:25:57\"},{\"d_status\":\"4\",\"d_status_time\":\"2020-04-25 10:26:20\"},{\"d_status\":\"5\",\"d_status_time\":\"2020-04-25 01:18:40\"},{\"d_status\":\"6\",\"d_status_time\":\"2020-04-25 01:23:58\"},{\"d_status\":\"7\",\"d_status_time\":\"2020-04-25 01:25:11\"},{\"d_status\":\"4\",\"d_status_time\":\"2020-04-25 01:26:41\"},{\"d_status\":\"1\",\"d_status_time\":\"2020-04-25 01:28:02\"},{\"d_status\":\"2\",\"d_status_time\":\"2020-04-25 01:28:38\"}]}', 65, 66, '63', 1, 1, '4444.00', '2424.00', '2020.00', '', '2424.00', '2424.00', '6', '2', '2', NULL, '5EA3C039D6444.pdf', '2', '2020-04-25 04:44:41', '2020-04-25 07:58:38'),
(47, '5EA5854DD7146', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"Z0JjcE5iM1FSdzlSZ2pPbk9lemh5UT09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}]],\"added_date\":\"2020-04-26 18:27:49\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address222\",\"ma_pincode\":\"666777\",\"ma_distrct\":\"ahdgfjsf\",\"ma_state\":\"jahsdjahgd\"}]}', 57, 29, '65', 1, 1, '1200.00', '1000.00', '200.00', '', '1000.00', '1000.00', '6', '2', '1', NULL, '5EA5854DD7146.pdf', '2', '2020-04-26 12:57:49', '2020-04-26 12:57:59'),
(48, '5EA5860D447EA', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"YlV1UEREZUhkNW1uL1l3dFc3TmVTUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"UTVVTUZJN1pkdXhNelAzbW9NamlPUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-26 18:31:01\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address222\",\"ma_pincode\":\"666777\",\"ma_distrct\":\"ahdgfjsf\",\"ma_state\":\"jahsdjahgd\"}]}', 57, 29, '66,67', 2, 2, '1230.00', '1020.00', '210.00', '', '1020.00', '1020.00', '6', '2', '1', NULL, '5EA5860D447EA.pdf', '2', '2020-04-26 13:01:01', '2020-04-26 13:01:09'),
(49, '5EA586642BB05', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"RGZVamZHWkdHdzU1V2oxenNsbXE2dz09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}]],\"added_date\":\"2020-04-26 18:32:28\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address222\",\"ma_pincode\":\"666777\",\"ma_distrct\":\"ahdgfjsf\",\"ma_state\":\"jahsdjahgd\"}]}', 57, 29, '68', 1, 1, '1200.00', '1000.00', '200.00', '', '1000.00', '1000.00', '6', '2', '1', NULL, '5EA586642BB05.pdf', '2', '2020-04-26 13:02:28', '2020-04-26 13:02:35'),
(50, '5EA587DA8129B', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"eXNuREFncURKZlFCZjhCRW8vd0R2QT09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"aGV0VnpuQ0FIN0Y5VmtoaXgyMkxFdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-26 18:38:42\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address222\",\"ma_pincode\":\"666777\",\"ma_distrct\":\"ahdgfjsf\",\"ma_state\":\"jahsdjahgd\"}]}', 57, 29, '69,70', 2, 2, '1230.00', '1020.00', '210.00', '', '1020.00', '1020.00', '6', '2', '1', NULL, '5EA587DA8129B.pdf', '2', '2020-04-26 13:08:42', '2020-04-26 13:09:10'),
(51, '5EA588D7729A4', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"M0FRdzVCVnpwbVJLQkRjZWNkc0w0Zz09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}]],\"added_date\":\"2020-04-26 18:42:55\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address222\",\"ma_pincode\":\"666777\",\"ma_distrct\":\"ahdgfjsf\",\"ma_state\":\"jahsdjahgd\"}]}', 57, 29, '71', 1, 1, '1200.00', '1000.00', '200.00', '', '1000.00', '1000.00', '6', '2', '1', NULL, '5EA588D7729A4.pdf', '2', '2020-04-26 13:12:55', '2020-04-26 13:13:08'),
(52, '5EA590C1CB69A', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"Yjk1bFErTTY5Sis5ekIxZmUxR0Z1dz09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"WjRHazVTN04zSE1qeFR6Y3E4bUYrUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"NmtNS3Riemh1T0hYTjVobGZrakFoUT09\",\"pr_title\":\"ring\",\"pr_tiny_description\":\"short testA\",\"pr_detailed_description\":\"short testA\",\"pr_selling_price\":\"900\",\"pr_mrp\":\"1000\",\"pr_thumb_image\":\"avatar12.png\",\"pr_gallery_image\":\"avatar12.png,fb8.jpg,linkedin1.png\",\"pr_terms_and_conditions\":\"short testA\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 11:56:31\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"565656\",\"ma_distrct\":\"jshdfgfd\",\"ma_state\":\"ghfasd\"},{\"ma_address\":\"Address222\",\"ma_pincode\":\"666777\",\"ma_distrct\":\"ahdgfjsf\",\"ma_state\":\"jahsdjahgd\"}]}', 57, 29, '72,80', 2, 2, '2200.00', '1900.00', '300.00', '', '1900.00', '1900.00', '6', '2', '1', NULL, '5EA590C1CB69A.pdf', '2', '2020-04-26 13:46:41', '2020-04-27 06:28:02'),
(53, '5EA5E34776B25', 85, '{\"user\":[{\"m_name\":\"sajan\",\"m_photo\":\"\",\"m_email\":\"sajanthreeseas@gmail.com\",\"m_phone\":\"09447798554\"}],\"prod_detail\":[[{\"cr_id\":\"eE5kaTNFTUFlb1J0bTgvQW9OSlROQT09\",\"cr_quantity\":\"1\",\"pr_id\":\"NmtNS3Riemh1T0hYTjVobGZrakFoUT09\",\"pr_title\":\"ring\",\"pr_tiny_description\":\"short testA\",\"pr_detailed_description\":\"short testA\",\"pr_selling_price\":\"900\",\"pr_mrp\":\"1000\",\"pr_thumb_image\":\"avatar12.png\",\"pr_gallery_image\":\"avatar12.png,fb8.jpg,linkedin1.png\",\"pr_terms_and_conditions\":\"short testA\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}],[{\"cr_id\":\"TnMrNDhHblh6VlZDYTNyV3Q5SERrQT09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"Q3ZyTnREVFdQellkYVFZUkh6RTAvUT09\",\"cr_quantity\":\"2\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}],[{\"cr_id\":\"SkhyMXJaQmxRSzZhRlN6UEplbC9kZz09\",\"cr_quantity\":\"2\",\"pr_id\":\"b3o0MXhrclF6ZE1xdmVnTXU0L1A4dz09\",\"pr_title\":\"sdf\",\"pr_tiny_description\":\"dfsdf\",\"pr_detailed_description\":\"\",\"pr_selling_price\":\"123\",\"pr_mrp\":\"12\",\"pr_thumb_image\":\"Desert2.jpg\",\"pr_gallery_image\":\"Desert2.jpg\",\"pr_terms_and_conditions\":\"zdsasd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 02:48:50\",\"address\":[{\"ma_address\":\"Sasina Gardens\\nKuruvikkala , Mulluvila PO\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"ffff\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"Sasina Gardens\\nKuruvikkala , Mulluvila PO\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"ffff\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"4\",\"d_status_time\":\"2020-04-27 08:08:50\"},{\"d_status\":\"5\",\"d_status_time\":\"2020-04-27 09:38:30\"}]}', 67, 68, '73,74,75,76', 4, 6, '2284.00', '2186.00', '98.00', '', '2186.00', '2186.00', '4', '2', '5', NULL, '5EA5E34776B25.pdf', '2', '2020-04-26 19:38:47', '2020-04-27 04:08:30'),
(54, '5EA647F8785D3', 85, '{\"user\":[{\"m_name\":\"sajan\",\"m_photo\":\"\",\"m_email\":\"sajanthreeseas@gmail.com\",\"m_phone\":\"09447798554\"}],\"prod_detail\":[[{\"cr_id\":\"WGt2QVdsQXRnc3p6R3pXSWcwZHIwUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"pr_title\":\"xzx\",\"pr_tiny_description\":\"zx\",\"pr_detailed_description\":\"xz\",\"pr_selling_price\":\"2\",\"pr_mrp\":\"12\",\"pr_thumb_image\":\"Desert1.jpg\",\"pr_gallery_image\":\"Desert1.jpg,Penguins.jpg\",\"pr_terms_and_conditions\":\"zxzx\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"N1hrTkszRlk0ZitsV083N3FuKzI5QT09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 08:18:24\",\"address\":[{\"ma_address\":\"Sasina Gardens\\nKuruvikkala , Mulluvila PO\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"ffff\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"Sasina Gardens\\nKuruvikkala , Mulluvila PO\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"ffff\",\"ma_state\":\"Kerala\"}]}', 67, 68, '77', 1, 1, '12.00', '2.00', '10.00', '', '2.00', '2.00', '4', '2', '1', NULL, '5EA647F8785D3.pdf', '2', '2020-04-27 02:48:24', '2020-04-27 02:50:14'),
(55, '5EA65F4E15BC8', 76, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"QlRvTjArd2VPZmVSYzg5NzNmeU5OZz09\",\"cr_quantity\":\"1\",\"pr_id\":\"NmtNS3Riemh1T0hYTjVobGZrakFoUT09\",\"pr_title\":\"ring\",\"pr_tiny_description\":\"short testA\",\"pr_detailed_description\":\"short testA\",\"pr_selling_price\":\"900\",\"pr_mrp\":\"1000\",\"pr_thumb_image\":\"avatar12.png\",\"pr_gallery_image\":\"avatar12.png,fb8.jpg,linkedin1.png\",\"pr_terms_and_conditions\":\"short testA\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 09:57:58\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fsv\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fsv\",\"ma_state\":\"Kerala\"}]}', 61, 62, '78', 1, 1, '1000.00', '900.00', '100.00', '', '900.00', '900.00', '6', '2', '1', NULL, '5EA65F4E15BC8.pdf', '2', '2020-04-27 04:27:58', '2020-04-27 04:28:20'),
(56, '5EA65FBDEB8EB', 76, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"SWhPU3hqQlhoZHp6S3JqdFNkVkJvQT09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 10:27:21\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fsv\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"demoo demmoo\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fde\",\"ma_state\":\"Kerala\"}]}', 61, 62, '79', 1, 1, '30.00', '20.00', '10.00', '', '20.00', '20.00', '6', '2', '2', NULL, '5EA65FBDEB8EB.pdf', '2', '2020-04-27 04:29:49', '2020-04-27 08:57:23'),
(57, '5EA677160A00F', 84, '{\"user\":[{\"m_name\":\"demo\",\"m_photo\":\"\",\"m_email\":\"-\",\"m_phone\":\"7356560711\"}],\"prod_detail\":[[{\"cr_id\":\"bEpXQ1BSVEx6Wm1US0ZiWDhOSWNidz09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}]],\"added_date\":\"2020-04-27 11:39:26\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fs\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fs\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"3\",\"d_status_time\":\"2020-04-27 11:40:36\"},{\"d_status\":\"5\",\"d_status_time\":\"2020-04-27 11:40:46\"}]}', 65, 66, '64', 1, 1, '1200.00', '1000.00', '200.00', '', '1000.00', '1000.00', '6', '2', '5', NULL, '5EA677160A00F.pdf', '2', '2020-04-27 06:09:26', '2020-04-27 06:10:46'),
(58, '5EA67C8DE9271', 84, '{\"user\":[{\"m_name\":\"demo\",\"m_photo\":\"\",\"m_email\":\"-\",\"m_phone\":\"7356560711\"}],\"prod_detail\":[[{\"cr_id\":\"LzU3ZEx6alF5Qk5KeU9HRE9wK0dQdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"VHFrOUR5Qm9PdWllNHA4UkhEMWcxZz09\",\"pr_title\":\"testttt\",\"pr_tiny_description\":\"xzncbznxc\",\"pr_detailed_description\":\"ANDBANSBDASD\",\"pr_selling_price\":\"999\",\"pr_mrp\":\"1000\",\"pr_thumb_image\":\"Leica-M-Sample-Image.jpg\",\"pr_gallery_image\":\"Leica-M-Sample-Image.jpg\",\"pr_terms_and_conditions\":\"SNDBVSNDF\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"Sjc0QmN3d2tBUjR5c3NPYnl6UjFjdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"NmtNS3Riemh1T0hYTjVobGZrakFoUT09\",\"pr_title\":\"ring\",\"pr_tiny_description\":\"short testA\",\"pr_detailed_description\":\"short testA\",\"pr_selling_price\":\"900\",\"pr_mrp\":\"1000\",\"pr_thumb_image\":\"avatar12.png\",\"pr_gallery_image\":\"avatar12.png,fb8.jpg,linkedin1.png\",\"pr_terms_and_conditions\":\"short testA\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}],[{\"cr_id\":\"MlRTdGVzaXRzYzIzUmJicnNZUHBMdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"pr_title\":\"xzx\",\"pr_tiny_description\":\"zx\",\"pr_detailed_description\":\"xz\",\"pr_selling_price\":\"2\",\"pr_mrp\":\"12\",\"pr_thumb_image\":\"Desert1.jpg\",\"pr_gallery_image\":\"Desert1.jpg,Penguins.jpg\",\"pr_terms_and_conditions\":\"zxzx\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"N1hrTkszRlk0ZitsV083N3FuKzI5QT09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 12:32:02\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fs\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fs\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"2\",\"d_status_time\":\"2020-04-27 12:40:04\"},{\"d_status\":\"3\",\"d_status_time\":\"2020-04-27 12:40:20\"}]}', 65, 66, '81,83,84', 3, 3, '2012.00', '1901.00', '111.00', '', '1901.00', '1901.00', '6', '2', '3', NULL, '5EA67C8DE9271.pdf', '2', '2020-04-27 06:32:45', '2020-04-27 07:10:20'),
(59, '5EA68E3C3BE9F', 85, '{\"user\":[{\"m_name\":\"sajan\",\"m_photo\":\"\",\"m_email\":\"sajanthreeseas@gmail.com\",\"m_phone\":\"09447798554\"}],\"prod_detail\":[[{\"cr_id\":\"TUxpQjN0UjJqWWt6T25FQ3FIeXVlZz09\",\"cr_quantity\":\"1\",\"pr_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"pr_title\":\"xzx\",\"pr_tiny_description\":\"zx\",\"pr_detailed_description\":\"xz\",\"pr_selling_price\":\"2\",\"pr_mrp\":\"12\",\"pr_thumb_image\":\"Desert1.jpg\",\"pr_gallery_image\":\"Desert1.jpg,Penguins.jpg\",\"pr_terms_and_conditions\":\"zxzx\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"N1hrTkszRlk0ZitsV083N3FuKzI5QT09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 13:19:22\",\"address\":[{\"ma_address\":\"Sasina Gardens\\nKuruvikkala , Mulluvila PO\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"ffff\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"Sasina Gardens\\nKuruvikkala , Mulluvila PO\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"ffff\",\"ma_state\":\"Kerala\"}]}', 67, 68, '86', 1, 1, '12.00', '2.00', '10.00', '', '2.00', '2.00', '4', '2', '1', NULL, '5EA68E3C3BE9F.pdf', '2', '2020-04-27 07:48:12', '2020-04-27 08:14:24'),
(60, '5EA69E21B5CE0', 85, '{\"user\":[{\"m_name\":\"sajan\",\"m_photo\":\"\",\"m_email\":\"sajanthreeseas@gmail.com\",\"m_phone\":\"09447798554\"}],\"prod_detail\":[[{\"cr_id\":\"NDQ0ZnR2OFpWbjdmVlhoTllVZjJRQT09\",\"cr_quantity\":\"1\",\"pr_id\":\"SjAxeWlXay9Fcm9wdE0zRWlKb3dZdz09\",\"pr_title\":\"xzx\",\"pr_tiny_description\":\"zx\",\"pr_detailed_description\":\"xz\",\"pr_selling_price\":\"2\",\"pr_mrp\":\"12\",\"pr_thumb_image\":\"Desert1.jpg\",\"pr_gallery_image\":\"Desert1.jpg,Penguins.jpg\",\"pr_terms_and_conditions\":\"zxzx\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"N1hrTkszRlk0ZitsV083N3FuKzI5QT09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 14:26:01\",\"address\":[{\"ma_address\":\"Sasina Gardens\\nKuruvikkala , Mulluvila PO\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"ffff\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"Sasina Gardens\\nKuruvikkala , Mulluvila PO\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"ffff\",\"ma_state\":\"Kerala\"}]}', 67, 68, '87', 1, 1, '12.00', '2.00', '10.00', '', '2.00', '2.00', '4', '2', '1', NULL, '5EA69E21B5CE0.pdf', '2', '2020-04-27 08:56:01', '2020-04-27 08:57:22');
INSERT INTO `i_invoice` (`i_id`, `i_unique_id`, `i_lid`, `i_summary`, `i_billing_id`, `i_delivery_id`, `i_cart_ids`, `i_product_types`, `i_no_of_pieces`, `i_total_mrp`, `i_total_selling_price`, `i_your_savings`, `i_delivery_charge`, `i_new_total`, `i_net_payable`, `i_payment_mode`, `i_payment_status`, `i_delivery_status`, `i_delivery_remarks`, `i_pdf`, `i_status`, `i_added`, `i_update`) VALUES
(61, '5EA69EBDB8EEF', 76, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"RkhsMi9YTjVwMW9Pd3BxWEd3NUl0Zz09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}]],\"added_date\":\"2020-04-27 14:35:20\",\"address\":[{\"ma_address\":\"demoo demmoo\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fde\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"test\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"dsfsr\",\"ma_state\":\"Kerala\"}]}', 69, 70, '88', 1, 1, '1200.00', '1000.00', '200.00', '', '1000.00', '1000.00', '6', '2', '1', NULL, '5EA69EBDB8EEF.pdf', '2', '2020-04-27 08:58:37', '2020-04-27 09:06:23'),
(62, '5EA6A096BD91D', 85, NULL, 67, 68, '89', 1, 1, '1000.00', '900.00', '100.00', '', '900.00', '900.00', '1', '1', '1', NULL, NULL, '1', '2020-04-27 09:06:30', '2020-04-27 09:06:30'),
(63, '5EA6A28E3966D', 76, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"R0QxL0NHWGszU1o3Y3FUalhGUEgwdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 14:44:54\",\"address\":[{\"ma_address\":\"demoo demmoo\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fde\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"test\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"dsfsr\",\"ma_state\":\"Kerala\"}]}', 69, 70, '90', 1, 1, '30.00', '20.00', '10.00', '', '20.00', '20.00', '6', '2', '1', NULL, '5EA6A28E3966D.pdf', '2', '2020-04-27 09:14:54', '2020-04-27 09:15:26'),
(64, '5EA6A50FA79B0', 84, '{\"user\":[{\"m_name\":\"demo\",\"m_photo\":\"\",\"m_email\":\"-\",\"m_phone\":\"7356560711\"}],\"prod_detail\":[[{\"cr_id\":\"TlR1OGZ6ZDN3dHBhY3doVnhMWGRvZz09\",\"cr_quantity\":\"1\",\"pr_id\":\"b3o0MXhrclF6ZE1xdmVnTXU0L1A4dz09\",\"pr_title\":\"sdf\",\"pr_tiny_description\":\"dfsdf\",\"pr_detailed_description\":\"\",\"pr_selling_price\":\"123\",\"pr_mrp\":\"12\",\"pr_thumb_image\":\"Desert2.jpg\",\"pr_gallery_image\":\"Desert2.jpg\",\"pr_terms_and_conditions\":\"zdsasd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 14:56:32\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fs\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fs\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"4\",\"d_status_time\":\"2020-04-27 02:57:10\"}]}', 65, 66, '91', 1, 1, '12.00', '123.00', '-111.00', '', '123.00', '123.00', '6', '2', '4', NULL, '5EA6A50FA79B0.pdf', '2', '2020-04-27 09:25:35', '2020-04-27 09:27:10'),
(65, '5EA6AC1C5EC3D', 54, '{\"user\":[{\"m_name\":\"Athira\",\"m_photo\":\"\",\"m_email\":\"kuttyathira0@gmail.com\",\"m_phone\":\"9488829285\"}],\"prod_detail\":[[{\"cr_id\":\"Q0pJckpJMzd4Mzc2SC9CZXNpRUs2dz09\",\"cr_quantity\":\"1\",\"pr_id\":\"NmtNS3Riemh1T0hYTjVobGZrakFoUT09\",\"pr_title\":\"ring\",\"pr_tiny_description\":\"short testA\",\"pr_detailed_description\":\"short testA\",\"pr_selling_price\":\"900\",\"pr_mrp\":\"1000\",\"pr_thumb_image\":\"avatar12.png\",\"pr_gallery_image\":\"avatar12.png,fb8.jpg,linkedin1.png\",\"pr_terms_and_conditions\":\"short testA\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-27 15:25:40\",\"address\":[{\"ma_address\":\"Address1\",\"ma_pincode\":\"629151\",\"ma_distrct\":\"Kanya Kumari\",\"ma_state\":\"Tamil Nadu\"},{\"ma_address\":\"Address2\",\"ma_pincode\":\"629152\",\"ma_distrct\":\"ahdjasd\",\"ma_state\":\"dagd\"}]}', 71, 72, '92', 1, 1, '1000.00', '900.00', '100.00', '', '900.00', '900.00', '6', '2', '1', NULL, '5EA6AC1C5EC3D.pdf', '2', '2020-04-27 09:55:40', '2020-04-27 09:59:20'),
(66, '5EA6AC4D602FE', 84, '{\"user\":[{\"m_name\":\"demo\",\"m_photo\":\"\",\"m_email\":\"-\",\"m_phone\":\"7356560711\"}],\"prod_detail\":[[{\"cr_id\":\"c2ZYK1Z6SzIxeUJWQ3VBVmFzRmdKUT09\",\"cr_quantity\":\"1\",\"pr_id\":\"cElCaSt5cWpaNEx1UStPdmp2MW5zdz09\",\"pr_title\":\"fhfhg\",\"pr_tiny_description\":\"fdfdft h\",\"pr_detailed_description\":\"kjsdkalsdasd\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"1233\",\"pr_thumb_image\":\"6.png\",\"pr_gallery_image\":\"6.png,admiria2.png,53.png,2.png\",\"pr_terms_and_conditions\":\"fytytf\",\"pr_is_featured\":\"2\",\"c_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"c_title\":\"demoo\",\"sb_id\":\"UDhZVkR3akZZbzFKVnFweks4TDNWZz09\",\"sb_title\":\"fghj\"}]],\"added_date\":\"2020-04-27 15:26:29\",\"address\":[{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fs\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"MULLUVILA P O\\nNEYYATTINKARA THIRUVANANTHAPURAM\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"fs\",\"ma_state\":\"Kerala\"}]}', 65, 66, '93', 1, 1, '1233.00', '12.00', '1221.00', '', '12.00', '12.00', '6', '2', '1', NULL, '5EA6AC4D602FE.pdf', '2', '2020-04-27 09:56:29', '2020-04-27 09:56:45'),
(67, '5EA6C540A90FA', 76, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"b2ZzTmFpRlFuK0kxSENLRGRScVV2QT09\",\"cr_quantity\":\"1\",\"pr_id\":\"SVFkT3VkdGxlZHBONGcxZUZKZEFvZz09\",\"pr_title\":\"laptop\",\"pr_tiny_description\":\"sadaksjdasdas\",\"pr_detailed_description\":\"sadkaslkdasdasd\",\"pr_selling_price\":\"9999\",\"pr_mrp\":\"10000\",\"pr_thumb_image\":\"admiria1.png\",\"pr_gallery_image\":\"admiria1.png,agroxa1.png\",\"pr_terms_and_conditions\":\"zj,cnaskdasdasd\",\"pr_is_featured\":\"1\",\"c_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"c_title\":\"demoo\",\"sb_id\":\"RzBoVFRIandoZVlGejBvTzR1VUJBQT09\",\"sb_title\":\"rich\"}]],\"added_date\":\"2020-04-27 17:13:40\",\"address\":[{\"ma_address\":\"test\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"dsfsr\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"abc\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"asd\",\"ma_state\":\"Kerala\"}]}', 73, 70, '94', 1, 1, '10000.00', '9999.00', '1.00', '', '9999.00', '9999.00', '6', '2', '1', NULL, '5EA6C540A90FA.pdf', '2', '2020-04-27 11:42:56', '2020-04-27 11:43:48'),
(68, '5EA7C02DD95EB', 76, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"MEpNaDNDUHdBYmFMbmgvWDFjY2xpdz09\",\"cr_quantity\":\"1\",\"pr_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"pr_title\":\"ffff\",\"pr_tiny_description\":\"dfdf\",\"pr_detailed_description\":\"dfdfdf\",\"pr_selling_price\":\"2424\",\"pr_mrp\":\"4444\",\"pr_thumb_image\":\"bg.jpg\",\"pr_gallery_image\":\"bg.jpg,WhatsApp_Image_2020-04-15_at_16_56_42.jpeg,face.png,fb.jpg\",\"pr_terms_and_conditions\":\"dfdfd\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"a3o2RGJwTXcyWkhGVzNSTGxzSUY0QT09\",\"sb_title\":\"sdsdsd\"}]],\"added_date\":\"2020-04-28 11:03:33\",\"address\":[{\"ma_address\":\"test\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"dsfsr\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"abc\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"asd\",\"ma_state\":\"Kerala\"}]}', 73, 70, '95', 1, 1, '4444.00', '2424.00', '2020.00', '', '2424.00', '2424.00', '6', '2', '1', NULL, '5EA7C02DD95EB.pdf', '2', '2020-04-28 05:33:33', '2020-04-28 05:33:58'),
(69, '5EA987EDBCDFD', 76, '{\"user\":[{\"m_name\":\"soumya\",\"m_photo\":\"\",\"m_email\":\"soumyathreeseas@gmail.com\",\"m_phone\":\"8606123973\"}],\"prod_detail\":[[{\"cr_id\":\"Zlc1cGtseEpab092dG42VVVDYUo5dz09\",\"cr_quantity\":\"1\",\"pr_id\":\"RzBoVFRIandoZVlGejBvTzR1VUJBQT09\",\"pr_title\":\"dsfd\",\"pr_tiny_description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using\",\"pr_detailed_description\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"pr_selling_price\":\"12\",\"pr_mrp\":\"23\",\"pr_thumb_image\":\"download_(2)2.jpg\",\"pr_gallery_image\":\"download_(2)2.jpg\",\"pr_terms_and_conditions\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}]],\"added_date\":\"2020-04-29 19:28:05\",\"address\":[{\"ma_address\":\"test\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"dsfsr\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"abc\",\"ma_pincode\":\"695133\",\"ma_distrct\":\"asd\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"3\",\"d_status_time\":\"2020-04-29 07:28:45\"}]}', 73, 70, '96', 1, 1, '23.00', '12.00', '11.00', '', '12.00', '12.00', '6', '2', '3', NULL, '5EA987EDBCDFD.pdf', '2', '2020-04-29 13:58:05', '2020-04-29 13:58:45'),
(70, '5ED26B3D0D71E', 71, '{\"user\":[{\"m_name\":\"shilpa1\",\"m_photo\":\"\",\"m_email\":\"shilpathreeseas@gmail.com\",\"m_phone\":\"7896541230\"}],\"prod_detail\":[[{\"cr_id\":\"dHRpRWlxcmE3VW40Q0ExTjIwUWR5UT09\",\"cr_quantity\":\"1\",\"pr_id\":\"UXZiVkllR1U4MW9GbXJBYTNSeVk0Zz09\",\"pr_title\":\"nbvh\",\"pr_tiny_description\":\"jhvhgcghcgcgx\",\"pr_detailed_description\":\"gffdssddsadas\",\"pr_selling_price\":\"1000\",\"pr_mrp\":\"1200\",\"pr_thumb_image\":\"Nikon-1-V3-sample-photo1.jpg\",\"pr_gallery_image\":\"Nikon-1-V3-sample-photo1.jpg,Nikon-1-V3-sample-photo2.jpg\",\"pr_terms_and_conditions\":\"hghgggfgfgf\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}],[{\"cr_id\":\"elRQdVluUzZKaXFnL2NyK2VFUGgwQT09\",\"cr_quantity\":\"1\",\"pr_id\":\"Wk1WTG9QTlRCS2I5TUZMTmxtTUtXUT09\",\"pr_title\":\"ball\",\"pr_tiny_description\":\"testtttingggg\",\"pr_detailed_description\":\"sddsasdasddsfsdfsdf\",\"pr_selling_price\":\"20\",\"pr_mrp\":\"30\",\"pr_thumb_image\":\"avatar.png\",\"pr_gallery_image\":\"avatar.png,fb1.jpg,linkedin.png\",\"pr_terms_and_conditions\":\"testtttting\",\"pr_is_featured\":\"2\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"sb_title\":\"2\"}],[{\"cr_id\":\"Z3d6aFJTT0gwWTFZYWFqU1cveWdNQT09\",\"cr_quantity\":\"2\",\"pr_id\":\"VHFrOUR5Qm9PdWllNHA4UkhEMWcxZz09\",\"pr_title\":\"testttt\",\"pr_tiny_description\":\"xzncbznxc\",\"pr_detailed_description\":\"ANDBANSBDASD\",\"pr_selling_price\":\"999\",\"pr_mrp\":\"1000\",\"pr_thumb_image\":\"Leica-M-Sample-Image.jpg\",\"pr_gallery_image\":\"Leica-M-Sample-Image.jpg\",\"pr_terms_and_conditions\":\"SNDBVSNDF\",\"pr_is_featured\":\"1\",\"c_id\":\"R2p3dkk5T1I2dk1wSHVldjFCQ1NTZz09\",\"c_title\":\"first\",\"sb_id\":\"cWo5OWlLVGdkTytHa2V6N3RhclgzUT09\",\"sb_title\":\"test\"}]],\"added_date\":\"2020-05-30 19:48:37\",\"address\":[{\"ma_address\":\"Sreyas(H)\\nthengeli PO, Kuttoor\",\"ma_pincode\":\"689106\",\"ma_distrct\":\"Thiruvalla\",\"ma_state\":\"Kerala\"},{\"ma_address\":\"Sreyas(H)\\nthengeli PO, Kuttoor\",\"ma_pincode\":\"689106\",\"ma_distrct\":\"Thiruvalla\",\"ma_state\":\"Kerala\"}],\"delivery_status\":[{\"d_status\":\"3\",\"d_status_time\":\"2020-08-01 11:39:24\"}]}', 54, 55, '97,98,99', 3, 4, '3230.00', '3018.00', '212.00', '', '3018.00', '3018.00', '6', '2', '3', NULL, '5ED26B3D0D71E.pdf', '2', '2020-05-30 14:18:37', '2020-08-01 06:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `ld_lead_data`
--

CREATE TABLE `ld_lead_data` (
  `ld_id` int(11) NOT NULL,
  `ld_name` varchar(55) DEFAULT NULL,
  `ld_phone` varchar(55) DEFAULT NULL,
  `ld_email` varchar(55) DEFAULT NULL,
  `ld_status` enum('1','2') NOT NULL DEFAULT '1',
  `ld_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ld_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ld_lead_data`
--

INSERT INTO `ld_lead_data` (`ld_id`, `ld_name`, `ld_phone`, `ld_email`, `ld_status`, `ld_added`, `ld_update`) VALUES
(1, 'suthan', '8056834248', 'suthan@abc.com', '1', '2020-04-18 03:38:13', '2020-04-18 03:48:43'),
(2, NULL, '1234123412', NULL, '2', '2020-04-19 06:49:21', '2020-04-21 19:18:04'),
(3, NULL, '23423423423423', NULL, '1', '2020-04-19 07:17:30', '2020-04-19 07:17:30'),
(4, NULL, '9605909990', NULL, '1', '2020-04-19 07:35:42', '2020-04-19 07:35:42'),
(5, NULL, '23423423423423', NULL, '1', '2020-04-20 00:30:31', '2020-04-20 00:30:31'),
(6, '', '', 'ffdf@dfdf.dfdfd', '1', '2020-04-20 02:35:44', '2020-04-20 02:35:44'),
(7, 'erer Saj', '09447798554', 'sajanthreeseas@gmail.com', '1', '2020-04-20 02:36:58', '2020-04-20 02:36:58'),
(8, 'soumya', '8606123973', 'soumyathreeseas@gmail.com', '2', '2020-04-20 12:07:18', '2020-04-24 16:24:25'),
(9, 'Athira', '9855567678', 'kuttyathira0@gmail.com', '1', '2020-04-20 13:36:31', '2020-04-20 13:36:31'),
(10, '', '8606123973', '', '2', '2020-04-20 14:09:55', '2020-04-20 14:28:37'),
(11, 'soumya', '8606123973', 'soumyathreeseas@gmail.com', '2', '2020-04-20 14:28:19', '2020-04-24 16:24:31'),
(12, 'soumya', '8606123973', 'soumyathreeseas@gmail.com', '2', '2020-04-21 16:38:04', '2020-04-24 16:24:15'),
(13, 'dfsdf', '9877736364', 'werwr@sfg.dfg', '1', '2020-04-21 22:31:15', '2020-04-21 22:31:15'),
(14, 'ghfh', '9788848475', 'hgfsdf@jsdf.sdfh', '1', '2020-04-21 22:42:27', '2020-04-21 22:42:27'),
(15, 'soumya', '8606123973', 'soumyathreeseas@gmail.com', '2', '2020-04-22 10:03:47', '2020-04-24 16:24:09'),
(16, 'soumya', '8606123973', 'soumya@gmail.com', '2', '2020-04-24 09:38:03', '2020-04-24 09:55:31'),
(17, '', '8606123973', '', '2', '2020-04-24 09:38:37', '2020-04-25 10:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `lg_lead_generation`
--

CREATE TABLE `lg_lead_generation` (
  `lg_id` int(11) NOT NULL,
  `lg_title` varchar(255) NOT NULL,
  `lg_image` varchar(255) NOT NULL,
  `lg_lead` enum('1','2') DEFAULT NULL COMMENT '1=>''enable'',2=>''disable''',
  `lg_u_name` enum('1','2') DEFAULT NULL COMMENT '1=>''enable'',2=>''disable''',
  `lg_phone` enum('1','2') DEFAULT NULL COMMENT '	1=>''enable'',2=>''disable''	',
  `lg_email` enum('1','2') DEFAULT NULL COMMENT '	1=>''enable'',2=>''disable''	',
  `lg_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lg_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lg_lead_generation`
--

INSERT INTO `lg_lead_generation` (`lg_id`, `lg_title`, `lg_image`, `lg_lead`, `lg_u_name`, `lg_phone`, `lg_email`, `lg_added`, `lg_update`) VALUES
(1, 'My first campaign.', 'product_zoom_img1.jpg', '2', '1', '1', '1', '2020-04-18 02:20:47', '2020-04-28 21:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `lo_login_otp_settings`
--

CREATE TABLE `lo_login_otp_settings` (
  `lo_id` int(11) NOT NULL,
  `lo_status` enum('1','2') NOT NULL,
  `lo_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lo_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lo_login_otp_settings`
--

INSERT INTO `lo_login_otp_settings` (`lo_id`, `lo_status`, `lo_added`, `lo_update`) VALUES
(1, '1', '2020-04-24 23:20:57', '2020-04-28 20:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `l_login`
--

CREATE TABLE `l_login` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `l_username` varchar(50) NOT NULL,
  `l_phone` varchar(15) NOT NULL,
  `l_password` varchar(111) NOT NULL,
  `l_unique_id` varchar(255) NOT NULL,
  `l_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1-login,2->user',
  `l_login_status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1-active,2-inactive',
  `l_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `l_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_login`
--

INSERT INTO `l_login` (`l_id`, `l_name`, `l_username`, `l_phone`, `l_password`, `l_unique_id`, `l_type`, `l_login_status`, `l_added`, `l_updated`) VALUES
(1, 'admin', 'admin@ecommerce.com', '', '26a0425db14b021550f7bd1901895fd5', '6d740024fa4fcec9e3b3439924ef99f6', '1', '1', '2020-04-16 19:45:33', '2020-04-21 19:22:53'),
(50, 'shilpa', 'shilpathreeseas@gmail.com', '', 'b31c354bdfbbf7c8c520690b713a73d1', 'ZO861914675084797246147457109442', '2', '2', '2020-04-20 11:23:00', '2020-04-20 19:29:45'),
(51, 'shilpa', 'shilpapradeep424@gmail.com', '', 'a80d1d861e38b19e3d74f97e8d3d1f27', 'AM286473526585730431978967520270', '2', '2', '2020-04-20 11:24:26', '2020-04-21 20:34:06'),
(52, 'soumya', 'soumyathreeseas@gmail.com', '', '376ea683fe2a213a44c3a8f168ecb5b5', 'DL449168449569092273226098560473', '2', '2', '2020-04-20 11:48:56', '2020-04-20 12:42:34'),
(53, 'soumya', 'soumyathreeseas@gmail.com', '', '6653862ee828f1c21563d6aec802e8d7', 'HX202551632242341519976180180651', '2', '2', '2020-04-20 12:46:12', '2020-04-21 12:24:03'),
(54, 'Athira', 'kuttyathira0@gmail.com', '', '5fb3b62e34039dd18b61ee2d8ab11ceb', 'XS198997730070525978200487629266', '2', '1', '2020-04-20 14:34:47', '2020-04-20 14:34:47'),
(55, 'suthan', 'suthanthreeseas@gmail.com', '', 'da4c7a7636d015a77bf650f60df81ef5', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-20 15:36:31', '2020-04-20 22:29:34'),
(56, 'suthan', 'suthankumaraswamy2@gmail.com', '', '1b150384f95f9b25799c4f715b738794', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-20 15:37:58', '2020-04-20 16:49:41'),
(57, 'suthan', 'suthankumaraswamy2@gmail.com', '', '21e646cf28ee553870336645edfd1e13', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-20 15:47:25', '2020-04-20 16:49:41'),
(58, 'suthan', 'suthanthreeseas@gmail.com', '', '67cb8e5810809d498884b498d1333839', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-20 15:51:06', '2020-04-20 22:14:21'),
(59, 'Suthan', 'suthankumaraswamy2@gmail.com', '', 'af8bfd1e181339476ff0b5ec3219fa56', '6d740024fa4fcec9e3b3439924ef99f6', '2', '1', '2020-04-20 16:50:34', '2020-04-24 16:47:16'),
(60, 'Suthan', 'suthanthreeseas@gmail.com', '', '0e1ca1fd5134b33fc88c6972b2ed0162', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-20 22:16:28', '2020-04-20 22:29:34'),
(61, 'Suthan', 'suthanthreeseas@gmail.com', '', 'b44000f46252f679a8924c7ff30be85e', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-20 22:19:50', '2020-04-20 22:22:52'),
(62, 'suthan', 'suthanthreeseas@gmail.com', '', '3d825ee80238ab0c649473e8fd2a7cc1', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-20 22:24:55', '2020-04-20 22:29:34'),
(63, 'suthan', 'suthanthreeseas@gmail.com', '', 'a7396dd25ff4bae62858186ba1566df1', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-20 22:30:34', '2020-04-20 22:33:19'),
(64, 'suthan', 'suthanthreeseas@gmail.com', '', '11eeff1ae40374a83158a209364145d5', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-20 22:36:53', '2020-04-21 19:14:30'),
(66, 'shilpa', 'shilpathreeseas@gmail.com', '', 'c20d2e3344c5fff799e6451742a85044', 'SD963342968983153453857753893420', '2', '2', '2020-04-21 10:11:23', '2020-04-21 10:16:24'),
(67, 'shilpa', 'shilpathreeseas@gmail.com', '', '76bdf2fa2ea2c652fdd03f6fb9b4ea6a', 'TE504216325639534201372597958534', '2', '2', '2020-04-21 10:18:05', '2020-04-21 10:22:37'),
(68, 'shilpa', 'shilpathreeseas@gmail.com', '', '42c8a16940a8b0f4ccad404ccd14005a', 'ZO509986947301058509236212064392', '2', '2', '2020-04-21 10:23:44', '2020-04-21 10:27:07'),
(69, 'shilpa', 'shilpathreeseas@gmail.com', '', '7ed4475a69cd41a3c9594f969aeb6160', 'BZ126213893470704613579318923209', '2', '2', '2020-04-21 10:27:41', '2020-04-21 10:28:33'),
(70, 'shilpa', 'shilpathreeseas@gmail.com', '', 'ef29c2d37f853dcb3e4a9ceef41fee8c', 'VD830738796821737522573947380553', '2', '2', '2020-04-21 10:31:21', '2020-04-21 12:22:00'),
(71, 'shilpa1', 'shilpathreeseas@gmail.com', '', 'f6f99ecb5364166649a3e9d290f0b5b7', 'QR177605785986947352517462278553', '2', '1', '2020-04-21 12:22:56', '2020-04-22 10:55:18'),
(72, 'soumyaaa', 'soumyathreeseas@gmail.com', '', '98dc12c8638036d58efb01f7db82bc7e', 'RH667373833648757238580766575794', '2', '2', '2020-04-21 12:26:15', '2020-04-22 10:02:44'),
(73, 'shilpa', 'shilpapradeep424@gmail.com', '', '21e305b02c606982b788dcaa8b759886', 'UA125570818288876359476215867939', '2', '2', '2020-04-21 20:34:46', '2020-04-22 10:02:35'),
(74, 'soumya', 'soumyathreeseas@gmail.com', '', 'b3a9ef5f9b8033b5d82e4b4ef8d1293f', 'RX199470435759506000383498514403', '2', '2', '2020-04-22 10:03:31', '2020-04-24 16:23:46'),
(75, 'Soumya', 'soumyajh9313@gmail.com', '', '8905bb1d62f458e79700190c3edd77ec', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-24 10:22:10', '2020-04-24 16:23:33'),
(76, 'soumya', 'soumyathreeseas@gmail.com', '', 'f2274dabef05ecd2d43d23c2fa8e028b', 'CU261758169140685297174072457756', '2', '1', '2020-04-24 16:45:03', '2020-04-24 16:45:03'),
(77, 'suthan', 'suthanthreeseas@gmail.com', '', 'a301e8fc13be87726fd120497042049d', 'TG053696568149509757073254872170', '2', '2', '2020-04-24 17:40:56', '2020-04-25 01:02:58'),
(78, 'suthan', 'suthanthreeseas@gmail.com', '', '045f7c7b3d6f0f99f81b01ccc60638ae', 'PX563826470923444692848313854597', '2', '2', '2020-04-25 01:04:14', '2020-04-25 01:06:09'),
(79, 'suthan', 'suthanthreeseas@gmail.com', '', '705395166e8a43bcec70e7c0e5d8be63', 'DA137802226549767218558799792116', '2', '2', '2020-04-25 01:07:10', '2020-04-25 01:17:30'),
(80, 'suthan', 'suthanthreeseas@gmail.com', '', 'a4e1d3de4a66e896f5843d007e93e551', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-25 01:18:05', '2020-04-25 01:52:37'),
(81, 'suthan', 'suthanthreeseas@gmail.com', '8056834240', '20fb7e9782ab4e07b79e17cb190fb9bb', 'FO803917195641186692332419721913', '2', '2', '2020-04-25 01:54:23', '2020-04-25 02:18:49'),
(82, 'muthu', '-', '9952572003', '29a7315faac90532d66377e514c470c9', 'DN462407607753605439290775302186', '2', '1', '2020-04-25 02:02:32', '2020-04-25 02:02:32'),
(83, 'suthan', 'suthanthreeseas@gmail.com', '8056834240', 'b5029c68b097fc3080f09e9f358a228b', 'HO261808035164740224888986621848', '2', '1', '2020-04-25 02:20:23', '2020-04-25 02:20:23'),
(84, 'demo', '-', '7356560711', 'e86b07e4b389508293398dc908793a96', 'AU737910606378493170221547328893', '2', '1', '2020-04-25 10:08:56', '2020-04-25 10:08:56'),
(85, 'sajan', 'sajanthreeseas@gmail.com', '09447798554', 'f28b4b558910d5d83a77d6ae0872e8bb', 'AJ096217732100913416535905171021', '2', '1', '2020-04-25 20:24:48', '2020-04-25 20:24:48'),
(86, 'test', '-', '9534632570', 'd84364f1a6cada308f3ecfe203de8291', 'TT237262183583683364316005788577', '2', '1', '2020-04-27 15:24:25', '2020-04-27 15:24:25'),
(87, 'gfhgdfhg', 'demo@gmail.com', '8606789098', '308a562fb71a4d6aabb02d4b59a30ad9', '6d740024fa4fcec9e3b3439924ef99f6', '2', '2', '2020-04-29 20:02:49', '2020-04-29 20:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `ma_member_address`
--

CREATE TABLE `ma_member_address` (
  `ma_id` int(11) NOT NULL,
  `ma_l_id` int(11) NOT NULL,
  `ma_address` varchar(255) NOT NULL,
  `ma_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1-billing Address, 2-delivery Address',
  `ma_pincode` varchar(6) NOT NULL,
  `ma_distrct` varchar(60) NOT NULL,
  `ma_state` varchar(60) NOT NULL,
  `ma_is_default` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1-yes,2->no',
  `ma_status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1-active,2-inactive',
  `ma_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ma_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ma_member_address`
--

INSERT INTO `ma_member_address` (`ma_id`, `ma_l_id`, `ma_address`, `ma_type`, `ma_pincode`, `ma_distrct`, `ma_state`, `ma_is_default`, `ma_status`, `ma_added`, `ma_updated`) VALUES
(1, 1, 'Address1', '1', '629151', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-18 22:20:04', '2020-04-18 23:29:35'),
(2, 1, 'Address1', '2', '629151', 'Kanyakumari', 'Tamilnadu', '2', '1', '2020-04-18 22:45:28', '2020-04-18 23:05:24'),
(3, 1, 'Address1', '1', '629151', 'Kanyakumari', 'Tamilnadu', '2', '1', '2020-04-18 22:54:44', '2020-04-18 23:05:36'),
(4, 1, 'Address1', '1', '629151', 'Kanyakumari', 'Tamilnadu', '2', '1', '2020-04-18 22:55:50', '2020-04-18 23:05:36'),
(5, 1, 'Address1', '1', '629151', 'Kanyakumari', 'Tamilnadu', '2', '1', '2020-04-18 22:56:20', '2020-04-18 23:29:13'),
(6, 1, 'Address1', '1', '629151', 'Kanyakumari', 'Tamilnadu', '2', '1', '2020-04-18 22:57:06', '2020-04-18 23:05:36'),
(7, 1, 'Address2', '1', '666655', 'sadasd', 'sasd', '2', '1', '2020-04-18 23:06:30', '2020-04-18 23:09:02'),
(8, 1, 'asdgfgds44', '2', '777788', 'ajhgds', 'dasd', '1', '1', '2020-04-18 23:08:41', '2020-04-18 23:08:41'),
(9, 1, 'dsasdasd', '1', '999777', 'adasd', 'sdasbd', '2', '1', '2020-04-18 23:29:13', '2020-04-18 23:29:35'),
(10, 47, 'Nagercoil', '1', '629002', 'KK', 'TN', '1', '1', '2020-04-19 13:20:43', '2020-04-19 13:20:43'),
(11, 47, 'Nagercoil', '2', '629002', 'Kanyakumari', 'TamilNadu', '1', '1', '2020-04-19 13:21:16', '2020-04-19 13:21:16'),
(12, 40, 'Address1', '1', '657656', 'sdfhgsdf', 'sfgshf', '1', '1', '2020-04-19 19:20:48', '2020-04-19 19:20:48'),
(13, 40, 'Address1', '2', '657656', 'sdfhgsdf', 'sfgshf', '1', '1', '2020-04-19 19:40:33', '2020-04-19 19:40:33'),
(14, 49, 'Sasina Gardens\nKuruvikkala , Mulluvila PO', '1', '695133', 'TVM', 'Kerala', '1', '1', '2020-04-20 00:37:00', '2020-04-20 00:37:00'),
(15, 49, 'Sasina Gardens\nKuruvikkala , Mulluvila PO', '2', '695133', 'TVM', 'Kerala', '1', '1', '2020-04-20 00:37:08', '2020-04-20 00:37:08'),
(16, 52, 'demo', '1', '695133', 'dfg', 'Kerala', '1', '2', '2020-04-20 11:53:47', '2020-04-20 12:20:19'),
(17, 52, 'demo', '2', '695133', 'dfg', 'Kerala', '1', '2', '2020-04-20 11:53:55', '2020-04-20 12:20:46'),
(18, 52, 'zxc', '1', '695133', '', '', '1', '1', '2020-04-20 12:20:19', '2020-04-20 12:20:19'),
(19, 52, 'cx', '2', '695433', 'cc', 'xc', '1', '1', '2020-04-20 12:20:46', '2020-04-20 12:20:46'),
(20, 50, 'Sreyas(H)\nthengeli PO, Kuttoor', '1', '689106', 'Thiruvalla', 'Kerala', '2', '1', '2020-04-20 13:25:51', '2020-04-20 13:25:51'),
(21, 50, 'Sreyas(H)\nthengeli PO, Kuttoor', '1', '689106', 'Thiruvalla', 'Kerala', '2', '1', '2020-04-20 13:25:51', '2020-04-20 13:25:52'),
(22, 50, 'Sreyas(H)\nthengeli PO, Kuttoor', '1', '689106', 'Thiruvalla', 'Kerala', '2', '1', '2020-04-20 13:25:52', '2020-04-20 13:25:52'),
(23, 50, 'Sreyas(H)\nthengeli PO, Kuttoor', '1', '689106', 'Thiruvalla', 'Kerala', '2', '1', '2020-04-20 13:25:52', '2020-04-20 13:25:53'),
(24, 50, 'Sreyas(H)\nthengeli PO, Kuttoor', '1', '689106', 'Thiruvalla', 'Kerala', '1', '1', '2020-04-20 13:25:53', '2020-04-20 13:25:53'),
(25, 50, 'Sreyas(H)\nthengeli PO, Kuttoor', '2', '689106', 'Thiruvalla', 'Kerala', '1', '1', '2020-04-20 13:26:02', '2020-04-20 13:26:02'),
(26, 53, 'MULLUVILA P O\nNEYYATTINKARA THIRUVANANTHAPURAM', '1', '695133', 'df', 'Kerala', '1', '1', '2020-04-20 14:15:00', '2020-04-20 14:15:00'),
(27, 53, 'MULLUVILA P O\nNEYYATTINKARA THIRUVANANTHAPURAM', '2', '695133', 'df', 'Kerala', '1', '1', '2020-04-20 14:15:05', '2020-04-20 14:15:05'),
(30, 55, '113,chetty street,kottar,nagercoil', '1', '629002', 'Kanyakumari', 'TamilNadu', '1', '1', '2020-04-20 15:36:31', '2020-04-20 15:36:31'),
(31, 55, '113,chetty street,kottar,nagercoil', '2', '629002', 'Kanyakumari', 'TamilNadu', '1', '1', '2020-04-20 15:36:31', '2020-04-20 15:36:31'),
(32, 56, '126e,chety street,kottar,nagercoil', '1', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 15:37:58', '2020-04-20 15:37:58'),
(33, 56, '126e,chety street,kottar,nagercoil', '2', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 15:37:58', '2020-04-20 15:37:58'),
(34, 57, '126e,chety street,kottar,nagercoil', '1', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 15:47:25', '2020-04-20 15:47:25'),
(35, 57, '126e,chety street,kottar,nagercoil', '2', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 15:47:25', '2020-04-20 15:47:25'),
(36, 58, 'Nagercoil', '1', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 15:51:06', '2020-04-20 15:51:06'),
(37, 58, 'Nagercoil', '2', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 15:51:06', '2020-04-20 15:51:06'),
(38, 59, '126e,chety street,kottar,nagercoil', '1', '629002', 'KK', 'Tamilnadu', '1', '1', '2020-04-20 16:50:34', '2020-04-24 16:51:18'),
(39, 59, '126e,chety street,kottar,nagercoil', '2', '629002', 'KK', 'Tamilnadu', '1', '1', '2020-04-20 16:50:34', '2020-04-20 16:50:34'),
(40, 60, '113,Nagercoil', '1', '629002', 'Kanyakumari', 'Tamilnadu', '1', '2', '2020-04-20 22:16:28', '2020-04-20 22:16:28'),
(41, 60, '113,Nagercoil', '2', '629002', 'Kanyakumari', 'Tamilnadu', '1', '2', '2020-04-20 22:16:28', '2020-04-20 22:16:28'),
(42, 61, '113,Nagercoil', '1', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 22:19:50', '2020-04-20 22:19:50'),
(43, 61, '113,Nagercoil', '2', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 22:19:50', '2020-04-20 22:19:50'),
(44, 62, '113,chetty street,kottar,Nagercoil', '1', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 22:24:55', '2020-04-20 22:24:55'),
(45, 62, '113,chetty street,kottar,Nagercoil', '2', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 22:24:55', '2020-04-20 22:24:55'),
(46, 63, '126e,chety street,kottar,nagercoil', '1', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 22:30:34', '2020-04-20 22:30:34'),
(47, 63, '126e,chety street,kottar,nagercoil', '2', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 22:30:34', '2020-04-20 22:30:34'),
(48, 64, '113,Nagercoil', '1', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 22:36:53', '2020-04-20 22:36:53'),
(49, 64, '113,Nagercoil', '2', '629002', 'Kanyakumari', 'Tamilnadu', '1', '1', '2020-04-20 22:36:53', '2020-04-20 22:36:53'),
(50, 72, 'MULLUVILA P O\nNEYYATTINKARA THIRUVANANTHAPURAM', '1', '695133', 'dfsf', 'Kerala', '2', '1', '2020-04-21 12:29:27', '2020-04-21 12:29:31'),
(51, 72, 'MULLUVILA P O\nNEYYATTINKARA THIRUVANANTHAPURAM', '1', '695133', 'dfsf', 'Kerala', '1', '1', '2020-04-21 12:29:31', '2020-04-21 12:29:31'),
(52, 72, 'MULLUVILA P O\nNEYYATTINKARA THIRUVANANTHAPURAM', '2', '695133', 'dfsf', 'Kerala', '1', '1', '2020-04-21 12:29:36', '2020-04-21 12:29:36'),
(53, 71, 'Sreyas(H)\nthengeli PO, Kuttoor', '1', '689106', 'Thiruvalla', 'Kerala', '2', '1', '2020-04-21 12:44:38', '2020-04-21 12:44:38'),
(54, 71, 'Sreyas(H)\nthengeli PO, Kuttoor', '1', '689106', 'Thiruvalla', 'Kerala', '1', '1', '2020-04-21 12:44:38', '2020-04-21 12:44:38'),
(55, 71, 'Sreyas(H)\nthengeli PO, Kuttoor', '2', '689106', 'Thiruvalla', 'Kerala', '1', '1', '2020-04-21 12:44:43', '2020-04-21 12:44:43'),
(58, 74, 'MULLUVILA P O\nNEYYATTINKARA THIRUVANANTHAPURAM', '1', '695133', 'ddfg', 'Kerala', '1', '1', '2020-04-22 10:07:04', '2020-04-22 10:07:04'),
(59, 74, 'MULLUVILA P O\nNEYYATTINKARA THIRUVANANTHAPURAM', '2', '695133', 'ddfg', 'Kerala', '1', '1', '2020-04-22 10:07:08', '2020-04-22 10:07:08'),
(60, 75, '', '1', '123456', '', '', '1', '1', '2020-04-24 16:15:58', '2020-04-24 16:15:58'),
(61, 76, 'MULLUVILA P O\nNEYYATTINKARA THIRUVANANTHAPURAM', '1', '695133', 'fsv', 'Kerala', '2', '1', '2020-04-24 16:58:12', '2020-04-27 14:27:02'),
(62, 76, 'MULLUVILA P O\nNEYYATTINKARA THIRUVANANTHAPURAM', '2', '695133', 'fsv', 'Kerala', '2', '1', '2020-04-24 16:58:16', '2020-04-27 14:34:59'),
(63, 80, '', '1', '629002', '', '', '1', '1', '2020-04-25 01:18:05', '2020-04-25 01:18:05'),
(64, 80, '', '2', '629002', '', '', '1', '1', '2020-04-25 01:18:05', '2020-04-25 01:18:05'),
(65, 84, 'MULLUVILA P O\nNEYYATTINKARA THIRUVANANTHAPURAM', '1', '695133', 'fs', 'Kerala', '1', '1', '2020-04-25 10:14:34', '2020-04-25 10:14:34'),
(66, 84, 'MULLUVILA P O\nNEYYATTINKARA THIRUVANANTHAPURAM', '2', '695133', 'fs', 'Kerala', '1', '1', '2020-04-25 10:14:38', '2020-04-25 10:14:38'),
(67, 85, 'Sasina Gardens\nKuruvikkala , Mulluvila PO', '1', '695133', 'ffff', 'Kerala', '1', '1', '2020-04-27 01:08:41', '2020-04-27 01:08:41'),
(68, 85, 'Sasina Gardens\nKuruvikkala , Mulluvila PO', '2', '695133', 'ffff', 'Kerala', '1', '1', '2020-04-27 01:08:45', '2020-04-27 01:08:45'),
(69, 76, 'demoo demmoo', '1', '695133', 'fde', 'Kerala', '2', '1', '2020-04-27 14:27:02', '2020-04-27 17:13:19'),
(70, 76, 'test', '2', '695133', 'dsfsr', 'Kerala', '1', '1', '2020-04-27 14:34:59', '2020-04-27 14:34:59'),
(71, 54, 'Address1', '1', '629151', 'Kanya Kumari', 'Tamil Nadu', '1', '1', '2020-04-27 15:22:25', '2020-04-27 15:22:25'),
(72, 54, 'Address2', '2', '629152', 'ahdjasd', 'dagd', '1', '1', '2020-04-27 15:25:38', '2020-04-27 15:25:38'),
(73, 76, 'abc', '1', '695133', 'asd', 'Kerala', '1', '1', '2020-04-27 17:13:19', '2020-04-27 17:13:19'),
(76, 87, '', '1', '876788', '', '', '1', '1', '2020-04-29 20:02:49', '2020-04-29 20:02:49'),
(77, 87, '', '2', '657899', '', '', '1', '1', '2020-04-29 20:02:49', '2020-04-29 20:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `mf_mail_failed`
--

CREATE TABLE `mf_mail_failed` (
  `mf_mail_failed_id` int(11) NOT NULL,
  `mf_to_mail` varchar(45) NOT NULL,
  `mf_content_array` varchar(255) NOT NULL,
  `mf_design_page` text NOT NULL,
  `mf_mail_type` varchar(10) NOT NULL,
  `mf_error_reason` text NOT NULL,
  `mf_from_mail` varchar(45) NOT NULL,
  `mf_status` tinyint(2) NOT NULL,
  `mf_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mf_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mt_media_type`
--

CREATE TABLE `mt_media_type` (
  `mt_id` int(11) NOT NULL,
  `mt_title` varchar(111) NOT NULL,
  `mt_max_file` varchar(11) NOT NULL,
  `mt_height` varchar(11) NOT NULL,
  `mt_width` varchar(11) NOT NULL,
  `mt_description` varchar(255) DEFAULT NULL,
  `mt_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mt_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mt_status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mt_media_type`
--

INSERT INTO `mt_media_type` (`mt_id`, `mt_title`, `mt_max_file`, `mt_height`, `mt_width`, `mt_description`, `mt_added`, `mt_update`, `mt_status`) VALUES
(1, 'Home slider', '3', '500', '1125', 'Home slider ', '2020-04-23 11:36:08', '2020-04-28 18:05:49', '1'),
(2, 'Latest product', '1', '535', '385', NULL, '2020-04-23 11:37:33', '2020-04-23 11:37:33', '1'),
(3, 'Sale Banner 1', '3', '300', '540', NULL, '2020-04-23 12:02:44', '2020-04-23 12:02:44', '1'),
(4, 'Featured Products', '1', '535', '385', NULL, '2020-04-23 12:04:11', '2020-04-23 12:04:11', '1'),
(5, 'Popular Products', '1', '535', '385', NULL, '2020-04-23 12:04:11', '2020-04-23 12:04:11', '1'),
(6, 'Sale Banner 2', '3', '300', '540', NULL, '2020-04-23 12:07:12', '2020-04-23 12:07:12', '1'),
(7, 'Most Selling Product', '1', '535', '385', NULL, '2020-04-23 12:07:12', '2020-04-23 12:07:12', '1'),
(8, 'Upcoming Products', '1', '535', '385', NULL, '2020-04-23 12:09:14', '2020-04-23 12:09:14', '1'),
(9, 'Categories Shop Now', '1', '350', '255', NULL, '2020-04-23 12:09:14', '2020-04-23 12:09:14', '1'),
(10, 'Product Shop Now', '1', '350', '255', NULL, '2020-04-23 12:09:40', '2020-04-23 12:09:40', '1'),
(11, 'Shop Banner', '2', '355', '250', NULL, '2020-04-23 12:09:40', '2020-04-28 21:35:10', '1'),
(12, 'Shop Banner 2', '2', '300', '540', NULL, '2020-04-23 12:09:40', '2020-04-28 21:35:32', '1'),
(13, 'Shop Banner 3', '2', '250', '450', NULL, '2020-04-23 12:09:40', '2020-04-28 21:35:47', '1'),
(14, 'Big Sale', '1', '600', '1920', NULL, '2020-04-23 12:09:40', '2020-04-28 21:15:55', '1'),
(15, 'Tranding Product', '1', '460', '420', NULL, '2020-04-23 12:09:40', '2020-04-28 21:17:27', '1');

-- --------------------------------------------------------

--
-- Table structure for table `m_media`
--

CREATE TABLE `m_media` (
  `m_id` int(11) NOT NULL,
  `m_type_id` int(11) NOT NULL,
  `m_file_path` text NOT NULL,
  `m_file_link` text NOT NULL,
  `m_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_media`
--

INSERT INTO `m_media` (`m_id`, `m_type_id`, `m_file_path`, `m_file_link`, `m_added`, `m_update`, `m_status`) VALUES
(1, 1, 'banner16.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:11:53', '2020-04-26 21:54:22', '1'),
(2, 1, 'banner17.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:12:22', '2020-04-23 20:12:22', '1'),
(3, 1, 'banner18.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:12:38', '2020-04-26 21:54:30', '1'),
(4, 2, 'shop_banner_img6.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:54:40', '2020-04-23 20:54:40', '1'),
(5, 3, 'shop_banner_img7.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:55:38', '2020-04-23 20:55:38', '1'),
(6, 3, 'shop_banner_img8.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:55:58', '2020-04-23 20:55:58', '1'),
(7, 3, 'shop_banner_img9.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:56:20', '2020-04-23 20:56:20', '1'),
(8, 4, 'shop_banner_img10.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:56:44', '2020-04-23 20:56:44', '1'),
(9, 5, 'shop_banner_img101.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:57:07', '2020-04-23 20:57:07', '1'),
(10, 6, 'shop_banner_img71.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:57:52', '2020-04-23 20:57:52', '1'),
(11, 6, 'shop_banner_img91.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:58:25', '2020-04-23 20:58:25', '1'),
(12, 6, 'shop_banner_img81.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:58:49', '2020-04-23 20:58:49', '1'),
(13, 7, 'shop_banner_img102.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:59:18', '2020-04-23 20:59:18', '1'),
(14, 8, 'shop_banner_img103.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 20:59:38', '2020-04-23 20:59:38', '1'),
(15, 9, '1212.png', 'https://ecommerce.a4aim.com/', '2020-04-23 21:00:08', '2020-04-23 22:32:53', '1'),
(16, 10, 'sidebar_banner_img1.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 21:00:28', '2020-04-23 21:00:28', '1'),
(17, 1, 'sidebar_banner_img1.jpg', '', '2020-04-24 10:39:05', '2020-04-24 10:39:23', '2'),
(18, 11, 'shop_banner_img6.png', 'https://ecommerce.a4aim.com/', '2020-04-23 21:00:28', '2020-04-25 10:31:14', '1'),
(19, 11, 'shop_banner_img6.png', 'https://ecommerce.a4aim.com/', '2020-04-24 10:39:05', '2020-04-25 10:32:41', '1'),
(20, 12, 'shop_banner_img1.jpg', 'https://ecommerce.a4aim.com/', '2020-04-24 10:39:05', '2020-04-25 10:32:41', '1'),
(21, 12, 'shop_banner_img2.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 21:00:28', '2020-04-25 10:31:14', '1'),
(22, 13, 'shop_banner_img3.jpg', 'https://ecommerce.a4aim.com/', '2020-04-23 21:00:28', '2020-04-25 10:31:14', '1'),
(23, 13, 'shop_banner_img4.jpg', 'https://ecommerce.a4aim.com/', '2020-04-24 10:39:05', '2020-04-25 10:32:41', '1'),
(24, 13, 'shop_banner_img51.jpg', 'https://ecommerce.a4aim.com/', '2020-04-24 10:39:05', '2020-04-28 21:36:38', '1'),
(25, 14, 'furniture_banner31.jpg', 'https://ecommerce.a4aim.com/', '2020-04-24 10:39:05', '2020-04-28 21:23:45', '1'),
(26, 15, 'ass.png', 'https://ecommerce.a4aim.com/', '2020-04-24 10:39:05', '2020-04-28 15:22:46', '2'),
(27, 15, 'ass1.png', 'https://ecommerce.a4aim.com/', '2020-04-28 15:23:10', '2020-04-28 15:32:10', '2'),
(28, 15, 'ass4.png', 'https://ecommerce.a4aim.com/', '2020-04-28 15:37:40', '2020-04-28 15:39:22', '2'),
(29, 15, 'ass5.png', 'https://ecommerce.a4aim.com/', '2020-04-28 15:39:39', '2020-04-28 17:57:17', '2'),
(30, 15, 'ass6.png', 'https://ecommerce.a4aim.com/', '2020-04-28 17:57:05', '2020-04-28 18:22:28', '2'),
(31, 15, 'ass10.png', 'https://ecommerce.a4aim.com/', '2020-04-28 18:24:49', '2020-04-28 21:13:20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `m_member`
--

CREATE TABLE `m_member` (
  `m_id` int(11) NOT NULL,
  `m_l_id` int(11) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_phone` varchar(15) NOT NULL,
  `m_email` varchar(60) NOT NULL,
  `m_photo` varchar(255) DEFAULT NULL,
  `m_status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1-active,2-inactive',
  `m_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_member`
--

INSERT INTO `m_member` (`m_id`, `m_l_id`, `m_name`, `m_phone`, `m_email`, `m_photo`, `m_status`, `m_added`, `m_updated`) VALUES
(2, 50, 'shilpa', '9874563210', 'shilpathreeseas@gmail.com', '', '2', '2020-04-20 11:23:00', '2020-04-20 19:29:45'),
(3, 51, 'shilpa', '7896541330', 'shilpapradeep424@gmail.com', '', '2', '2020-04-20 11:24:26', '2020-04-21 20:34:06'),
(4, 52, 'soumya', '8696789087', 'soumyathreeseas@gmail.com', 'Hydrangeas.jpg', '2', '2020-04-20 11:48:56', '2020-04-20 12:42:34'),
(5, 53, 'soumya', '8606123973', 'soumyathreeseas@gmail.com', '', '2', '2020-04-20 12:46:12', '2020-04-21 12:24:03'),
(6, 54, 'Athira', '9488829285', 'kuttyathira0@gmail.com', '', '1', '2020-04-20 14:34:47', '2020-04-20 14:34:47'),
(7, 55, 'suthan', '8056834240', 'suthanthreeseas@gmail.com', '510.png', '2', '2020-04-20 15:36:31', '2020-04-20 15:36:31'),
(8, 56, 'suthan', '+918056834240', 'suthankumaraswamy2@gmail.com', '511.png', '2', '2020-04-20 15:37:58', '2020-04-20 15:37:58'),
(9, 57, 'suthan', '+918056834240', 'suthankumaraswamy2@gmail.com', '511.png', '2', '2020-04-20 15:47:25', '2020-04-20 16:49:41'),
(10, 58, 'suthan', '8056834240', 'suthanthreeseas@gmail.com', '512.png', '2', '2020-04-20 15:51:06', '2020-04-20 22:14:21'),
(11, 59, 'Suthan', '+918056834240', 'suthankumaraswamy2@gmail.com', 'avatar.png', '1', '2020-04-20 16:50:34', '2020-04-21 19:16:57'),
(12, 60, 'Suthan', '8056834240', 'suthanthreeseas@gmail.com', 'fb.png', '2', '2020-04-20 22:16:28', '2020-04-20 22:16:28'),
(13, 61, 'Suthan', '8056834240', 'suthanthreeseas@gmail.com', 'fb.png', '2', '2020-04-20 22:19:50', '2020-04-20 22:22:52'),
(14, 62, 'suthan', '8056834240', 'suthanthreeseas@gmail.com', 'linkedin.png', '2', '2020-04-20 22:24:54', '2020-04-20 22:29:34'),
(15, 63, 'suthan', '8056834240', 'suthanthreeseas@gmail.com', 'linkedin1.png', '2', '2020-04-20 22:30:34', '2020-04-20 22:33:19'),
(16, 64, 'suthan', '8056834240', 'suthanthreeseas@gmail.com', 'twitter.png', '2', '2020-04-20 22:36:53', '2020-04-21 19:14:29'),
(18, 66, 'shilpa', '7896541230', 'shilpathreeseas@gmail.com', '', '2', '2020-04-21 10:11:23', '2020-04-21 10:16:24'),
(19, 67, 'shilpa', '7854123690', 'shilpathreeseas@gmail.com', '', '2', '2020-04-21 10:18:05', '2020-04-21 10:22:37'),
(20, 68, 'shilpa', '7896541230', 'shilpathreeseas@gmail.com', '', '2', '2020-04-21 10:23:44', '2020-04-21 10:27:07'),
(21, 69, 'shilpa', '7896541235', 'shilpathreeseas@gmail.com', '', '2', '2020-04-21 10:27:41', '2020-04-21 10:28:33'),
(22, 70, 'shilpa', '7896541301', 'shilpathreeseas@gmail.com', '', '2', '2020-04-21 10:31:21', '2020-04-21 12:22:00'),
(23, 71, 'shilpa1', '7896541230', 'shilpathreeseas@gmail.com', '', '1', '2020-04-21 12:22:56', '2020-04-22 10:35:04'),
(24, 72, 'soumyaaa', '8606123987', 'soumyathreeseas@gmail.com', '', '2', '2020-04-21 12:26:15', '2020-04-22 10:02:44'),
(25, 73, 'shilpa', '9874563201', 'shilpapradeep424@gmail.com', '', '2', '2020-04-21 20:34:46', '2020-04-22 10:02:35'),
(26, 74, 'soumya', '8606123973', 'soumyathreeseas@gmail.com', '', '2', '2020-04-22 10:03:31', '2020-04-24 16:23:46'),
(27, 75, 'Soumya', '7356560711', 'soumyajh9313@gmail.com', '', '2', '2020-04-24 10:22:10', '2020-04-24 16:23:33'),
(28, 76, 'soumya', '8606123973', 'soumyathreeseas@gmail.com', '', '1', '2020-04-24 16:45:03', '2020-04-24 16:45:03'),
(29, 77, 'suthan', '8056834240', 'suthanthreeseas@gmail.com', '', '2', '2020-04-24 17:40:56', '2020-04-25 01:02:57'),
(30, 78, 'suthan', '9952572003', 'suthanthreeseas@gmail.com', '', '2', '2020-04-25 01:04:14', '2020-04-25 01:06:09'),
(31, 79, 'suthan', '9952572004', 'suthanthreeseas@gmail.com', '', '2', '2020-04-25 01:07:10', '2020-04-25 01:17:30'),
(32, 80, 'suthan', '9952572003', 'suthanthreeseas@gmail.com', '1212.png', '2', '2020-04-25 01:18:05', '2020-04-25 01:52:37'),
(35, 81, 'suthan', '8056834240', 'suthanthreeseas@gmail.com', '', '2', '2020-04-25 01:54:23', '2020-04-25 02:18:49'),
(36, 82, 'muthu', '9952572003', '-', '', '1', '2020-04-25 02:02:32', '2020-04-25 02:02:32'),
(37, 83, 'suthan', '8056834240', 'suthanthreeseas@gmail.com', '', '1', '2020-04-25 02:20:23', '2020-04-25 02:20:23'),
(38, 84, 'demo', '7356560711', '-', '', '1', '2020-04-25 10:08:56', '2020-04-25 10:08:56'),
(39, 85, 'sajan', '09447798554', 'sajanthreeseas@gmail.com', '', '1', '2020-04-25 20:24:48', '2020-04-25 20:24:48'),
(40, 86, 'test', '9534632570', '-', '', '1', '2020-04-27 15:24:25', '2020-04-27 15:24:25'),
(41, 87, 'gfhgdfhg', '8606789098', 'demo@gmail.com', 'download_(2)2.jpg', '2', '2020-04-29 20:02:49', '2020-04-29 20:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `pr_product`
--

CREATE TABLE `pr_product` (
  `pr_id` int(11) NOT NULL,
  `pr_title` varchar(255) DEFAULT NULL,
  `pr_model` varchar(255) DEFAULT NULL,
  `pr_product_no` int(11) DEFAULT NULL,
  `pr_cat_id` int(11) DEFAULT NULL,
  `pr_brand` int(11) DEFAULT NULL,
  `pr_style` int(11) DEFAULT NULL,
  `pr_product_color` varchar(255) DEFAULT NULL,
  `pr_detailed_description` text,
  `pr_order_no` int(11) DEFAULT NULL,
  `pr_mrp` float DEFAULT NULL,
  `pr_selling_price` float DEFAULT NULL,
  `pr_thumb_image` text,
  `pr_gallery_image` text,
  `pr_is_featured` enum('1','2') DEFAULT '1',
  `pr_popular` enum('1','2') DEFAULT '2',
  `pr_latest` enum('1','2') DEFAULT '2',
  `pr_most_selling` enum('1','2') DEFAULT '2',
  `pr_prescription_glass` enum('1','2') DEFAULT '2',
  `pr_seo_title` varchar(255) DEFAULT NULL,
  `pr_slug` varchar(55) DEFAULT NULL,
  `pr_seo_keywords` varchar(1000) DEFAULT NULL,
  `pr_seo_desp` text,
  `pr_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pr_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pr_status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr_product`
--

INSERT INTO `pr_product` (`pr_id`, `pr_title`, `pr_model`, `pr_product_no`, `pr_cat_id`, `pr_brand`, `pr_style`, `pr_product_color`, `pr_detailed_description`, `pr_order_no`, `pr_mrp`, `pr_selling_price`, `pr_thumb_image`, `pr_gallery_image`, `pr_is_featured`, `pr_popular`, `pr_latest`, `pr_most_selling`, `pr_prescription_glass`, `pr_seo_title`, `pr_slug`, `pr_seo_keywords`, `pr_seo_desp`, `pr_added`, `pr_updated`, `pr_status`) VALUES
(1, 'ZT200 Gray/Yellow', 'ZT200', 97, 0, 2, 3, 'Gray/Yellow', '', 1, 0, 50, NULL, NULL, '2', '2', '2', '2', '2', '', '', '', '', '2021-01-31 22:45:39', '2021-01-31 22:45:39', '1'),
(2, 'ZT200 Gray/Yellow', 'ZT200', 97, 0, 2, 3, 'Gray/Yellow', '', 1, 0, 50, NULL, NULL, '2', '2', '2', '2', '2', '', '', '', '', '2021-01-31 22:47:29', '2021-01-31 22:47:29', '1'),
(3, 'ZT200 Gray/Yellow', 'ZT200', 97, 0, 2, 3, 'Gray/Yellow', '', 1, 0, 50, NULL, NULL, '2', '2', '2', '2', '2', '', '', '', '', '2021-01-31 22:48:43', '2021-01-31 22:48:43', '1'),
(4, 'ZT200 Gray/Yellow', 'ZT200', 97, 0, 2, 3, 'Gray/Yellow', '', 1, 0, 50, NULL, NULL, '2', '2', '2', '2', '2', '', '', '', '', '2021-01-31 22:49:06', '2021-01-31 22:49:06', '1'),
(5, 'ZT200 Gray/Yellow', 'ZT200', 97, 0, 2, 3, 'Gray/Yellow', '', 1, 0, 50, NULL, NULL, '2', '2', '2', '2', '2', 'Pentax ZT200 Gray | Pentax ZT200 safety glasses | Pentax ZT200', 'zt200-grayyellow', 'Pentax ZT200 Gray Pentax ZT200 Pentax ZT200 safety glasses Pentax ZT200 safety frames Pentax safety glasses Pentax safety frames', '', '2021-01-31 22:52:24', '2021-01-31 22:52:24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pv_variation`
--

CREATE TABLE `pv_variation` (
  `pv_id` int(11) NOT NULL,
  `pv_product_id` int(11) NOT NULL,
  `pv_eye_size` int(11) NOT NULL,
  `pv_bridge` int(11) NOT NULL,
  `pv_ed` int(11) NOT NULL,
  `pv_temple` int(11) NOT NULL,
  `pv_b_measurement` int(11) NOT NULL,
  `pv_price` int(11) NOT NULL,
  `pv_cost` int(11) NOT NULL,
  `pv_height_progressive` int(11) NOT NULL,
  `pv_height_bifocal` int(11) NOT NULL,
  `pv_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pv_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pv_status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pv_variation`
--

INSERT INTO `pv_variation` (`pv_id`, `pv_product_id`, `pv_eye_size`, `pv_bridge`, `pv_ed`, `pv_temple`, `pv_b_measurement`, `pv_price`, `pv_cost`, `pv_height_progressive`, `pv_height_bifocal`, `pv_added`, `pv_updated`, `pv_status`) VALUES
(1, 3, 54, 20, 56, 126, 34, 50, 19, 0, 0, '2021-01-31 17:18:43', '2021-01-31 17:18:43', '1'),
(2, 4, 54, 20, 56, 126, 34, 50, 19, 0, 0, '2021-01-31 17:19:06', '2021-01-31 17:19:06', '1'),
(3, 5, 54, 20, 56, 126, 34, 50, 19, 0, 0, '2021-01-31 17:22:24', '2021-01-31 17:22:24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `p_payment`
--

CREATE TABLE `p_payment` (
  `p_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `p_order_id` varchar(50) NOT NULL,
  `country` tinytext,
  `udf10` tinytext,
  `discount` tinytext,
  `mode` tinytext,
  `cardhash` tinytext,
  `error_Message` tinytext,
  `state` tinytext,
  `bankcode` tinytext,
  `txnid` tinytext,
  `surl` tinytext,
  `net_amount_debit` tinytext,
  `lastname` tinytext,
  `zipcode` tinytext,
  `phone` tinytext,
  `productinfo` tinytext,
  `hash` text,
  `status` tinytext,
  `firstname` tinytext,
  `city` tinytext,
  `isConsentPayment` tinytext,
  `error` tinytext,
  `addedon` tinytext,
  `udf9` tinytext,
  `udf7` tinytext,
  `udf8` tinytext,
  `encryptedPaymentId` tinytext,
  `bank_ref_num` tinytext,
  `key` tinytext,
  `email` tinytext,
  `amount` tinytext,
  `unmappedstatus` tinytext,
  `address2` tinytext,
  `payuMoneyId` tinytext,
  `address1` tinytext,
  `udf5` tinytext,
  `mihpayid` tinytext,
  `udf6` tinytext,
  `udf3` tinytext,
  `udf4` tinytext,
  `udf1` tinytext,
  `udf2` tinytext,
  `field1` tinytext,
  `cardnum` tinytext,
  `field7` tinytext,
  `field6` tinytext,
  `furl` tinytext,
  `field9` tinytext,
  `field8` tinytext,
  `amount_split` tinytext,
  `field3` tinytext,
  `field2` tinytext,
  `field5` tinytext,
  `PG_TYPE` tinytext,
  `field4` tinytext,
  `meCode` text,
  `name_on_card` tinytext,
  `txnStatus` tinytext,
  `txnMessage` tinytext,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_payment`
--

INSERT INTO `p_payment` (`p_id`, `l_id`, `p_order_id`, `country`, `udf10`, `discount`, `mode`, `cardhash`, `error_Message`, `state`, `bankcode`, `txnid`, `surl`, `net_amount_debit`, `lastname`, `zipcode`, `phone`, `productinfo`, `hash`, `status`, `firstname`, `city`, `isConsentPayment`, `error`, `addedon`, `udf9`, `udf7`, `udf8`, `encryptedPaymentId`, `bank_ref_num`, `key`, `email`, `amount`, `unmappedstatus`, `address2`, `payuMoneyId`, `address1`, `udf5`, `mihpayid`, `udf6`, `udf3`, `udf4`, `udf1`, `udf2`, `field1`, `cardnum`, `field7`, `field6`, `furl`, `field9`, `field8`, `amount_split`, `field3`, `field2`, `field5`, `PG_TYPE`, `field4`, `meCode`, `name_on_card`, `txnStatus`, `txnMessage`, `added_date`, `modified_date`) VALUES
(1, 85, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-27 02:05:52', '2020-04-27 02:05:52'),
(2, 85, '', '', '', '0.00', 'CC', 'This field is no longer supported in postback params.', 'Validation of secure hash failed', '', 'VISA', '4beffd419e7604e0f4a0', NULL, '0.00', '', '', '09447798554', 'No. of Products : 4, No. of Pieces : 6', '47fbe520501d1cb743869ddf120b8d03606ad75b3060657823fc65e302c8e52197cbc8f320857400fcc4613f1354f0fa78a68d3d35dc261d235cde24a12f464a', 'failure', 'ftewd', '', '0', 'E700', '2020-04-27 07:10:43', '', '', '', NULL, '', 'PKI1zstB', 'sajanthreeseas@gmail.com', '2186.00', 'failed', '', '250238801', '', 'BOLT_KIT_PHP7', '9083854077', '', '', '', '', '', '', '401200XXXXXX1112', 'AUCERROR', '', NULL, ' Verification of Secure Hash Failed: E700', 'Incorrect request received', '{\"PAYU\":\"2186.00\"}', '', '', '', 'AXISPG', '', NULL, 'Test', 'FAILED', 'Validation of secure hash failed', '2020-04-27 02:06:08', '2020-04-27 02:06:08'),
(3, 85, '', '', '', '0.00', 'CC', 'This field is no longer supported in postback params.', 'Validation of secure hash failed', '', 'VISA', '4beffd419e7604e0f4a0', NULL, '0.00', '', '', '09447798554', 'No. of Products : 4, No. of Pieces : 6', '47fbe520501d1cb743869ddf120b8d03606ad75b3060657823fc65e302c8e52197cbc8f320857400fcc4613f1354f0fa78a68d3d35dc261d235cde24a12f464a', 'failure', 'ftewd', '', '0', 'E700', '2020-04-27 07:10:43', '', '', '', NULL, '', 'PKI1zstB', 'sajanthreeseas@gmail.com', '2186.00', 'failed', '', '250238801', '', 'BOLT_KIT_PHP7', '9083854077', '', '', '', '', '', '', '401200XXXXXX1112', 'AUCERROR', '', NULL, ' Verification of Secure Hash Failed: E700', 'Incorrect request received', '{\"PAYU\":\"2186.00\"}', '', '', '', 'AXISPG', '', NULL, 'Test', 'FAILED', 'Validation of secure hash failed', '2020-04-27 02:06:41', '2020-04-27 02:06:41'),
(4, 85, '', '', '', '0.00', 'CC', 'This field is no longer supported in postback params.', 'Validation of secure hash failed', '', 'VISA', '4beffd419e7604e0f4a0', NULL, '0.00', '', '', '09447798554', 'No. of Products : 4, No. of Pieces : 6', '47fbe520501d1cb743869ddf120b8d03606ad75b3060657823fc65e302c8e52197cbc8f320857400fcc4613f1354f0fa78a68d3d35dc261d235cde24a12f464a', 'failure', 'ftewd', '', '0', 'E700', '2020-04-27 07:10:43', '', '', '', NULL, '', 'PKI1zstB', 'sajanthreeseas@gmail.com', '2186.00', 'failed', '', '250238801', '', 'BOLT_KIT_PHP7', '9083854077', '', '', '', '', '', '', '401200XXXXXX1112', 'AUCERROR', '', NULL, ' Verification of Secure Hash Failed: E700', 'Incorrect request received', '{\"PAYU\":\"2186.00\"}', '', '', '', 'AXISPG', '', NULL, 'Test', 'FAILED', 'Validation of secure hash failed', '2020-04-27 02:08:15', '2020-04-27 02:08:15'),
(5, 85, '', '', '', '0.00', 'CC', 'This field is no longer supported in postback params.', 'Validation of secure hash failed', '', 'VISA', '4beffd419e7604e0f4a0', NULL, '0.00', '', '', '09447798554', 'No. of Products : 4, No. of Pieces : 6', '47fbe520501d1cb743869ddf120b8d03606ad75b3060657823fc65e302c8e52197cbc8f320857400fcc4613f1354f0fa78a68d3d35dc261d235cde24a12f464a', 'failure', 'ftewd', '', '0', 'E700', '2020-04-27 07:10:43', '', '', '', NULL, '', 'PKI1zstB', 'sajanthreeseas@gmail.com', '2186.00', 'failed', '', '250238801', '', 'BOLT_KIT_PHP7', '9083854077', '', '', '', '', '', '', '401200XXXXXX1112', 'AUCERROR', '', NULL, ' Verification of Secure Hash Failed: E700', 'Incorrect request received', '{\"PAYU\":\"2186.00\"}', '', '', '', 'AXISPG', '', '{\"vpc_Merchant\":\"TESTIBIBOWEB\",\"vpc_AccessCode\":\"BDEF182C\",\"hash_secret\":\"98561C2735A8AFB53BCB1FEAC93C3ECC\",\"vpc_User_Refund\":\"IBIBOWEBAMA\",\"vpc_Passw', 'Test', 'FAILED', 'Validation of secure hash failed', '2020-04-27 02:11:30', '2020-04-27 02:11:30'),
(6, 85, '', '', '', '0.00', 'CC', 'This field is no longer supported in postback params.', 'Validation of secure hash failed', '', 'VISA', '4beffd419e7604e0f4a0', NULL, '0.00', '', '', '09447798554', 'No. of Products : 4, No. of Pieces : 6', '47fbe520501d1cb743869ddf120b8d03606ad75b3060657823fc65e302c8e52197cbc8f320857400fcc4613f1354f0fa78a68d3d35dc261d235cde24a12f464a', 'failure', 'ftewd', '', '0', 'E700', '2020-04-27 07:10:43', '', '', '', NULL, '', 'PKI1zstB', 'sajanthreeseas@gmail.com', '2186.00', 'failed', '', '250238801', '', 'BOLT_KIT_PHP7', '9083854077', '', '', '', '', '', '', '401200XXXXXX1112', 'AUCERROR', '', NULL, ' Verification of Secure Hash Failed: E700', 'Incorrect request received', '{\"PAYU\":\"2186.00\"}', '', '', '', 'AXISPG', '', '{\"vpc_Merchant\":\"TESTIBIBOWEB\",\"vpc_AccessCode\":\"BDEF182C\",\"hash_secret\":\"98561C2735A8AFB53BCB1FEAC93C3ECC\",\"vpc_User_Refund\":\"IBIBOWEBAMA\",\"vpc_Passw', 'Test', 'FAILED', 'Validation of secure hash failed', '2020-04-27 02:22:41', '2020-04-27 02:22:41'),
(7, 85, '', '', '', NULL, 'DC', NULL, 'No Error', '', 'VISA', 'c825c65142ae549669b2', 'https://ecommerce.a4aim.com/payment-status-update', '2', '', '', '09447798554', 'No. of Products : 1, No. of Pieces : 1', '07e768769e0a7ab6f0dd133259fb4483c068f081b9f2a7c1483d7f6fd15b2ade694e1dde01417ee0a5e47b476afa4c05c834ac94493492c61e60d3ba2be37019', 'success', 'Sajan', '', '0', 'E000', '2020-04-27 08:19:32', '', '', '', '2FAAFAAEF3DED82802D0400000C32E31', '202011872098180', 'PKI1zstB', 'sajanthreeseas@gmail.com', '2.00', 'captured', '', '317471275', '', 'BOLT_KIT_PHP7', '10246033805', '', '', '', '', '', '', '459200XXXXXX8805', '', '', 'https://ecommerce.a4aim.com/payment-status-update', 'success', '', '{\"PAYU\":\"2.00\"}', '', '244392', '', 'SBIFSSPG', '', NULL, 'SajanSaj', 'SUCCESS', 'Transaction Successful', '2020-04-27 02:50:12', '2020-04-27 02:50:12'),
(8, 85, 'cDhBVXBHQjIrbVR0NE1VKzFRZ2xhdz09', '', '', NULL, 'DC', NULL, 'No Error', '', 'VISA', '92ae07d8115972708a6c', 'https://ecommerce.a4aim.com/payment-status-update', '2', '', '', '09447798554', 'No. of Products : 1, No. of Pieces : 1', '57f1a6fa05b84f66cbbbfd0ba6d6543c4b9d16003c010e63740bd0e7af2143a00d0d3c09ccff62123967ea5e4a37584a5f7e187be8454d3da39c753005d7f594', 'success', 'Sajan', '', '0', 'E000', '2020-04-27 13:18:53', '', '', '', 'CD01991726059E3927EB6DE6C7658629', '202011863121872', 'PKI1zstB', 'sajanthreeseas@gmail.com', '2.00', 'captured', '', '317541521', '', 'BOLT_KIT_PHP7', '10247644669', '', '', '', '', '', '', '459200XXXXXX8805', '', '', 'https://ecommerce.a4aim.com/payment-status-update', 'success', '', '{\"PAYU\":\"2.00\"}', '', '277878', '', 'SBIFSSPG', '', NULL, 'SajanSaj', 'SUCCESS', 'Transaction Successful', '2020-04-27 07:49:21', '2020-04-27 07:49:21'),
(9, 85, '59', '', '', NULL, 'DC', NULL, 'No Error', '', 'VISA', '00f754bb748404ba1da7', 'https://ecommerce.a4aim.com/payment-status-update', '2', '', '', '09447798554', 'No. of Products : 1, No. of Pieces : 1', '938fe558ed6d11ecc05554cdfc5c9b7cc802d73a4b1c52c1067d9777a14bb39bc6eb319dbec1821bc19cec8dffe2407c7ada9c3bc6cdda36d58b65204770d24f', 'success', 'sajan', '', '0', 'E000', '2020-04-27 13:41:56', '', '', '', 'D0EBD624A0B13E22ADB48FF2FC950BC1', '202011862431550', 'PKI1zstB', 'sajanthreeseas@gmail.com', '2.00', 'captured', '', '317547252', '', 'BOLT_KIT_PHP7', '10247772357', '', '', '', '', '', '', '459200XXXXXX8805', '', '', 'https://ecommerce.a4aim.com/payment-status-update', 'success', '', '{\"PAYU\":\"2.00\"}', '', '607668', '', 'SBIFSSPG', '', NULL, 'SajanSaj', 'SUCCESS', 'Transaction Successful', '2020-04-27 08:12:22', '2020-04-27 08:12:22'),
(10, 85, '59', '', '', NULL, 'DC', NULL, 'No Error', '', 'VISA', '00f754bb748404ba1da7', 'https://ecommerce.a4aim.com/payment-status-update', '2', '', '', '09447798554', 'No. of Products : 1, No. of Pieces : 1', '938fe558ed6d11ecc05554cdfc5c9b7cc802d73a4b1c52c1067d9777a14bb39bc6eb319dbec1821bc19cec8dffe2407c7ada9c3bc6cdda36d58b65204770d24f', 'success', 'sajan', '', '0', 'E000', '2020-04-27 13:41:56', '', '', '', 'D0EBD624A0B13E22ADB48FF2FC950BC1', '202011862431550', 'PKI1zstB', 'sajanthreeseas@gmail.com', '2.00', 'captured', '', '317547252', '', 'BOLT_KIT_PHP7', '10247772357', '', '', '', '', '', '', '459200XXXXXX8805', '', '', 'https://ecommerce.a4aim.com/payment-status-update', 'success', '', '{\"PAYU\":\"2.00\"}', '', '607668', '', 'SBIFSSPG', '', NULL, 'SajanSaj', 'SUCCESS', 'Transaction Successful', '2020-04-27 08:13:18', '2020-04-27 08:13:18'),
(11, 85, '59', '', '', NULL, 'DC', NULL, 'No Error', '', 'VISA', '00f754bb748404ba1da7', 'https://ecommerce.a4aim.com/payment-status-update', '2', '', '', '09447798554', 'No. of Products : 1, No. of Pieces : 1', '938fe558ed6d11ecc05554cdfc5c9b7cc802d73a4b1c52c1067d9777a14bb39bc6eb319dbec1821bc19cec8dffe2407c7ada9c3bc6cdda36d58b65204770d24f', 'success', 'sajan', '', '0', 'E000', '2020-04-27 13:41:56', '', '', '', 'D0EBD624A0B13E22ADB48FF2FC950BC1', '202011862431550', 'PKI1zstB', 'sajanthreeseas@gmail.com', '2.00', 'captured', '', '317547252', '', 'BOLT_KIT_PHP7', '10247772357', '', '', '', '', '', '', '459200XXXXXX8805', '', '', 'https://ecommerce.a4aim.com/payment-status-update', 'success', '', '{\"PAYU\":\"2.00\"}', '', '607668', '', 'SBIFSSPG', '', NULL, 'SajanSaj', 'SUCCESS', 'Transaction Successful', '2020-04-27 08:14:22', '2020-04-27 08:14:22'),
(12, 85, '60', '', '', NULL, 'DC', NULL, 'No Error', '', 'VISA', '8d04da525923136c11d1', 'https://ecommerce.a4aim.com/payment-status-update', '2', '', '', '09447798554', 'No. of Products : 1, No. of Pieces : 1', '43744dbee7cc00ac220d12aad41217d496828955ec8bdf1d20635533b4a4bfb842d558bc70607e06b4766fc0e06b4bcee32a6091712ef41b241e3ef6348e1e16', 'success', 'sajan', '', '0', 'E000', '2020-04-27 14:26:36', '', '', '', '7CAC43A062BC9EF0470B5DF367E49015', '202011838916497', 'v4Fqqv13', 'sajanthreeseas@gmail.com', '2.00', 'captured', '', '317557176', '', 'BOLT_KIT_PHP7', '10248005895', '', '', '', '', '', '', '459200XXXXXX8805', '', '', 'https://ecommerce.a4aim.com/payment-status-update', 'success', '', '{\"PAYU\":\"2.00\"}', '', '172275', '', 'SBIFSSPG', '', NULL, 'SajanSaj', 'SUCCESS', 'Transaction Successful', '2020-04-27 08:57:18', '2020-04-27 08:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `sb_sub_category`
--

CREATE TABLE `sb_sub_category` (
  `sb_id` int(11) NOT NULL,
  `sb_cat_id` int(11) NOT NULL,
  `sb_title` varchar(60) NOT NULL,
  `sb_status` enum('1','2') NOT NULL DEFAULT '1',
  `sb_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sb_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_sub_category`
--

INSERT INTO `sb_sub_category` (`sb_id`, `sb_cat_id`, `sb_title`, `sb_status`, `sb_added`, `sb_updated`) VALUES
(1, 1, '2', '1', '2020-04-16 23:07:36', '2020-04-19 02:14:01'),
(2, 1, '2', '1', '2020-04-17 01:36:18', '2020-04-19 02:27:22'),
(3, 1, '2', '1', '2020-04-17 02:09:02', '2020-04-19 02:27:22'),
(4, 1, '2', '1', '2020-04-17 10:01:05', '2020-04-19 02:14:05'),
(5, 1, 'test', '1', '2020-04-17 10:32:41', '2020-04-17 10:32:41'),
(6, 1, 'jhf', '1', '2020-04-17 14:33:00', '2020-04-19 02:27:22'),
(7, 1, 'first test', '1', '2020-04-17 15:19:28', '2020-04-19 02:27:22'),
(8, 1, 'rerere', '1', '2020-04-17 23:40:19', '2020-04-19 02:27:22'),
(9, 1, 'test sub', '1', '2020-04-18 14:53:26', '2020-04-19 02:27:22'),
(10, 1, 'test sub2', '1', '2020-04-18 14:53:38', '2020-04-19 02:27:22'),
(11, 1, 'test5', '1', '2020-04-18 14:54:01', '2020-04-19 02:27:22'),
(12, 1, 'demoooo', '1', '2020-04-18 15:19:13', '2020-04-19 02:27:22'),
(13, 1, 'sdsdsd', '1', '2020-04-18 17:18:12', '2020-04-19 02:27:22'),
(14, 1, 'rich', '1', '2020-04-18 17:29:09', '2020-04-19 02:27:22'),
(15, 15, 'fghj', '1', '2020-04-20 12:23:46', '2020-04-20 12:23:46'),
(16, 16, 'sss', '1', '2020-04-21 11:29:34', '2020-04-21 11:29:34'),
(17, 17, 'Mobiles', '1', '2020-04-21 19:20:46', '2020-04-21 19:20:46'),
(18, 13, 'fddddddddddd', '1', '2020-04-29 18:14:18', '2020-04-29 18:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `s_size`
--

CREATE TABLE `s_size` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(55) NOT NULL,
  `s_status` enum('1','2') NOT NULL DEFAULT '1',
  `s_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `s_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_size`
--

INSERT INTO `s_size` (`s_id`, `s_name`, `s_status`, `s_added`, `s_updated`) VALUES
(1, 'XL', '1', '2020-06-29 16:33:13', '2020-06-29 16:33:13'),
(2, 'kj', '2', '2020-06-29 16:44:09', '2020-06-29 16:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `s_style`
--

CREATE TABLE `s_style` (
  `s_id` int(11) NOT NULL,
  `s_title` varchar(255) NOT NULL,
  `s_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `s_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `s_status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_style`
--

INSERT INTO `s_style` (`s_id`, `s_title`, `s_added`, `s_updated`, `s_status`) VALUES
(1, 'Classic', '2021-01-31 07:50:20', '2021-01-31 07:50:20', '1'),
(2, 'Cool/Trendy', '2021-01-31 07:51:07', '2021-01-31 07:51:07', '1'),
(3, 'Stylish Designer', '2021-01-31 07:51:38', '2021-01-31 07:51:38', '1'),
(4, 'Stylish Designer1', '2021-01-31 08:02:33', '2021-01-31 08:10:44', '2'),
(5, 'Stylish Designer2', '2021-01-31 08:06:28', '2021-01-31 08:10:41', '2'),
(6, 'jhhhj', '2021-01-31 08:06:57', '2021-01-31 08:10:35', '2');

-- --------------------------------------------------------

--
-- Table structure for table `u_user_permission`
--

CREATE TABLE `u_user_permission` (
  `u_id` int(11) NOT NULL,
  `u_url` text NOT NULL,
  `u_description` varchar(255) DEFAULT NULL,
  `u_user_type1` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1= permission 2= no permission (super admin)',
  `u_user_type2` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1= permission 2= no permission (member)',
  `u_guest_user` enum('1','2') NOT NULL DEFAULT '2',
  `u_status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1= active 2=deactivated',
  `u_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_user_permission`
--

INSERT INTO `u_user_permission` (`u_id`, `u_url`, `u_description`, `u_user_type1`, `u_user_type2`, `u_guest_user`, `u_status`, `u_added`, `u_modified`) VALUES
(1, 'login', NULL, '1', '1', '1', '1', '2020-04-21 08:13:15', '2020-04-21 12:32:18'),
(2, 'submit_login', NULL, '1', '1', '1', '1', '2020-04-21 08:13:40', '2020-04-21 12:36:51'),
(3, 'logout', NULL, '1', '1', '1', '1', '2020-04-21 08:14:02', '2020-04-21 12:38:38'),
(4, 'forgot-password', NULL, '1', '1', '1', '1', '2020-04-21 08:15:33', '2020-04-21 12:38:47'),
(5, 'user_email_check', NULL, '1', '1', '1', '1', '2020-04-21 08:15:33', '2020-04-21 12:39:11'),
(6, 'submit_new_password', NULL, '1', '1', '1', '1', '2020-04-21 08:16:50', '2020-04-21 12:39:17'),
(7, 'profile', NULL, '2', '1', '1', '1', '2020-04-21 08:17:34', '2020-04-21 15:07:15'),
(8, 'view_profile', NULL, '2', '1', '1', '1', '2020-04-21 08:17:34', '2020-04-21 15:08:35'),
(9, 'edit_profile', NULL, '2', '1', '1', '1', '2020-04-21 08:17:55', '2020-04-21 15:33:47'),
(10, 'profile-img-upload', NULL, '2', '1', '1', '1', '2020-04-21 08:17:55', '2020-04-21 15:10:25'),
(11, 'profile_edit', NULL, '2', '1', '2', '1', '2020-04-21 08:18:22', '2020-04-21 15:23:17'),
(12, 'signup', NULL, '1', '1', '1', '1', '2020-04-21 08:18:22', '2020-04-21 12:40:59'),
(13, 'submit_reg', NULL, '2', '2', '1', '1', '2020-04-21 08:18:53', '2020-04-21 12:41:36'),
(14, 'sign_otp_check', NULL, '1', '1', '1', '1', '2020-04-21 08:18:53', '2020-04-26 19:26:44'),
(15, 'order-history', NULL, '2', '1', '2', '1', '2020-04-21 08:19:20', '2020-04-21 12:42:07'),
(16, 'your-order-details', NULL, '2', '1', '2', '1', '2020-04-21 08:19:20', '2020-04-21 12:42:16'),
(17, 'error', NULL, '1', '1', '1', '1', '2020-04-21 08:20:07', '2020-04-21 12:42:34'),
(18, 'about-us', NULL, '1', '1', '1', '1', '2020-04-21 08:20:07', '2020-04-21 11:52:44'),
(19, 'contact-us', NULL, '1', '1', '1', '1', '2020-04-21 08:20:35', '2020-04-21 12:43:29'),
(20, 'submit_contact', NULL, '1', '1', '1', '1', '2020-04-21 08:20:35', '2020-04-26 19:25:34'),
(21, 'dashboard', NULL, '1', '2', '2', '1', '2020-04-21 08:21:05', '2020-04-21 08:21:28'),
(22, 'ploat-order-graph', NULL, '1', '2', '2', '1', '2020-04-21 08:21:05', '2020-04-21 08:21:39'),
(23, 'fill-year', NULL, '1', '2', '2', '1', '2020-04-21 08:22:03', '2020-04-21 08:22:03'),
(24, 'fill-month', NULL, '1', '2', '2', '1', '2020-04-21 08:22:03', '2020-04-21 08:22:03'),
(25, 'add-product', NULL, '1', '2', '2', '1', '2020-04-21 08:22:30', '2021-01-24 06:08:05'),
(26, 'list-product', NULL, '1', '2', '2', '1', '2020-04-21 08:22:30', '2020-04-21 08:22:30'),
(27, 'submit-product', NULL, '1', '2', '2', '1', '2020-04-21 08:22:53', '2020-04-21 08:22:53'),
(28, 'list-product-tbl', NULL, '1', '2', '2', '1', '2020-04-21 08:22:53', '2020-04-21 08:22:53'),
(29, 'delete-product', NULL, '1', '2', '2', '1', '2020-04-21 08:23:27', '2020-04-21 08:23:27'),
(30, 'edit-product', NULL, '1', '2', '2', '1', '2020-04-21 08:23:27', '2020-04-21 08:23:27'),
(31, 'edit-product-data', NULL, '1', '2', '2', '1', '2020-04-21 08:23:54', '2020-04-21 08:23:54'),
(32, 'member', NULL, '1', '2', '2', '1', '2020-04-21 08:23:54', '2020-04-21 08:23:54'),
(33, 'member-details', NULL, '1', '2', '2', '1', '2020-04-21 08:24:21', '2020-04-21 08:24:21'),
(34, 'list-member-tbl', NULL, '1', '2', '2', '1', '2020-04-21 08:24:21', '2020-04-21 08:24:21'),
(35, 'submit-member', NULL, '1', '2', '2', '1', '2020-04-21 08:24:50', '2020-04-21 08:24:50'),
(36, 'delete-member', NULL, '1', '2', '2', '1', '2020-04-21 08:24:50', '2020-04-21 08:24:50'),
(37, 'edit-member-data', NULL, '1', '2', '2', '1', '2020-04-21 08:25:20', '2020-04-21 08:25:20'),
(39, 'submit-address', NULL, '1', '2', '2', '1', '2020-04-21 08:25:58', '2020-04-21 08:25:58'),
(40, 'member-d-address-back', NULL, '1', '2', '2', '1', '2020-04-21 08:25:58', '2020-04-21 08:25:58'),
(41, 'member-b-address-back', NULL, '1', '2', '2', '1', '2020-04-21 08:26:31', '2020-04-21 08:26:31'),
(42, 'admin-change-user-password', NULL, '1', '2', '2', '1', '2020-04-21 08:26:31', '2020-04-21 08:26:31'),
(43, 'get-category-data', NULL, '1', '2', '2', '1', '2020-04-21 08:26:59', '2020-04-21 08:26:59'),
(44, 'get-sub-category-data', NULL, '1', '2', '2', '1', '2020-04-21 08:26:59', '2020-04-21 08:26:59'),
(45, 'cart-list', NULL, '1', '2', '2', '1', '2020-04-21 08:27:25', '2020-04-21 08:27:25'),
(46, 'list-cart-tbl', NULL, '1', '2', '2', '1', '2020-04-21 08:27:25', '2020-04-21 08:27:25'),
(47, 'cart-details', NULL, '1', '2', '2', '1', '2020-04-21 08:27:53', '2020-04-21 08:27:53'),
(48, 'cart-details-data', NULL, '1', '2', '2', '1', '2020-04-21 08:27:53', '2020-04-21 08:27:53'),
(49, 'delete-single-cart', NULL, '1', '2', '2', '1', '2020-04-21 08:28:25', '2020-04-21 08:28:25'),
(50, 'delete-cart', NULL, '1', '2', '2', '1', '2020-04-21 08:28:25', '2020-04-21 08:28:25'),
(51, 'all-order-list', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:53'),
(52, 'order-details', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:37:03'),
(53, 'list-order-tbl', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(54, 'order-details-data', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(55, 'order-status-change', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(56, 'pending-order-list', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(57, 'packing-order-list', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(58, 'delivery_initiated-order-list', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(59, 'intransit-order-list', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(60, 'collected_at_next_center-order-list', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(61, 'waiting_for_delivery-order-list', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(62, 'delivered-order-list', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(63, 'cancelled-order-list', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(64, 'undelivered-order-list', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(65, 'change-password', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(66, 'submit-change-password', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(67, 'category-add', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(68, 'submit_category', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(69, 'preview', NULL, '1', '1', '1', '1', '2020-04-21 08:36:17', '2020-04-21 12:44:28'),
(70, 'img-upload', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(71, 'fill-category', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(74, 'category_tbl', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(75, 'get-category', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(76, 'delete-category', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(77, 'sub-category-add', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(78, 'submit_sub_category', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(79, 'sub_category_tbl', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(80, 'get-sub-category', NULL, '1', '2', '2', '1', '2020-04-21 08:36:17', '2020-04-21 08:36:17'),
(81, 'delete-sub-category', NULL, '1', '2', '2', '1', '2020-04-21 08:37:46', '2020-04-21 08:37:46'),
(82, 'lead-submit', NULL, '1', '1', '1', '1', '2020-04-21 08:37:46', '2020-04-21 12:44:55'),
(83, 'lead-submit-close', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:45:03'),
(84, 'all-products', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:08:22'),
(85, 'product-list', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:45:35'),
(87, 'product-detail', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:45:41'),
(88, 'product-category-wise', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:45:56'),
(89, 'add_to_cart_id', NULL, '2', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-26 09:13:41'),
(90, 'add_to_wishlist_id', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:46:08'),
(91, 'favourites', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:46:12'),
(92, 'delete-wishlist', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:46:18'),
(93, 'search-product', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:46:23'),
(94, 'product-load-ajax', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:46:45'),
(95, 'add_to_compare_id', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:46:51'),
(96, 'compare', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:46:55'),
(97, 'delete-compare', NULL, '1', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-21 12:47:00'),
(98, 'cart', NULL, '2', '1', '1', '1', '2020-04-21 09:04:47', '2020-04-26 08:52:30'),
(99, 'update-cart-quantity', NULL, '2', '1', '2', '1', '2020-04-21 09:04:47', '2020-04-21 12:47:18'),
(100, 'delete-cart-id', NULL, '1', '1', '2', '1', '2020-04-21 09:04:47', '2020-04-21 09:04:47'),
(101, 'checkout', NULL, '2', '1', '2', '1', '2020-04-21 09:04:47', '2020-04-21 12:47:41'),
(102, 'get_all_address', NULL, '2', '1', '2', '1', '2020-04-21 09:04:47', '2020-04-21 12:47:49'),
(103, 'add_address', NULL, '2', '1', '2', '1', '2020-04-21 09:04:47', '2020-04-21 12:47:54'),
(104, 'update_address', NULL, '2', '1', '2', '1', '2020-04-21 09:04:47', '2020-04-21 12:47:58'),
(105, 'same_as_address', NULL, '2', '1', '2', '1', '2020-04-21 09:04:47', '2020-04-21 12:48:02'),
(106, 'place-order', NULL, '2', '1', '2', '1', '2020-04-21 09:04:47', '2020-04-21 12:48:06'),
(107, 'payment', NULL, '2', '1', '2', '1', '2020-04-21 09:04:47', '2020-04-21 12:48:10'),
(108, 'order-success', NULL, '2', '1', '2', '1', '2020-04-21 09:04:47', '2020-04-21 12:48:16'),
(109, 'blog-add', NULL, '1', '2', '2', '1', '2020-04-21 09:04:47', '2020-04-21 09:08:03'),
(110, 'submit-blog', NULL, '1', '2', '2', '1', '2020-04-21 09:04:47', '2020-04-21 09:07:57'),
(111, 'list-blog', NULL, '1', '2', '2', '1', '2020-04-21 09:04:47', '2020-04-21 09:07:50'),
(112, 'edit-blog-data', NULL, '1', '2', '2', '1', '2020-04-21 09:04:47', '2020-04-21 09:07:47'),
(113, 'delete-blog', NULL, '1', '2', '2', '1', '2020-04-21 09:07:34', '2020-04-21 09:07:34'),
(114, 'messages', NULL, '1', '2', '2', '1', '2020-04-21 09:07:34', '2020-04-21 09:07:34'),
(115, 'message-list', NULL, '1', '2', '2', '1', '2020-04-21 09:08:39', '2020-04-21 09:08:39'),
(116, 'blog', NULL, '1', '1', '1', '1', '2020-04-21 09:08:39', '2020-04-21 12:48:29'),
(117, 'blog-details', NULL, '1', '1', '1', '1', '2020-04-21 09:11:09', '2020-04-21 12:48:33'),
(118, 'lead-generation', NULL, '1', '2', '2', '1', '2020-04-21 09:11:09', '2020-04-21 09:11:44'),
(119, 'lead-active', NULL, '1', '2', '2', '1', '2020-04-21 09:11:09', '2020-04-21 09:11:09'),
(120, 'title-active', NULL, '1', '2', '2', '1', '2020-04-21 09:11:09', '2020-04-21 09:11:09'),
(121, 'image-active', NULL, '1', '2', '2', '1', '2020-04-21 09:11:09', '2020-04-21 09:11:09'),
(122, 'name-active', NULL, '1', '2', '2', '1', '2020-04-21 09:11:09', '2020-04-21 09:11:09'),
(123, 'phone-active', NULL, '1', '2', '2', '1', '2020-04-21 09:11:09', '2020-04-21 09:11:09'),
(124, 'email-active', NULL, '1', '2', '2', '1', '2020-04-21 09:11:09', '2020-04-21 09:11:09'),
(125, 'lead-status', NULL, '1', '2', '2', '1', '2020-04-21 09:13:09', '2020-04-21 09:13:25'),
(126, 'lead-data-tbl', NULL, '1', '2', '2', '1', '2020-04-21 09:13:09', '2020-04-21 09:13:09'),
(127, 'delete-lead-back-data', NULL, '1', '2', '2', '1', '2020-04-21 09:13:09', '2020-04-21 09:13:09'),
(128, '404_override', NULL, '1', '1', '1', '1', '2020-04-21 09:18:56', '2020-04-21 12:49:41'),
(129, 'default_controller', NULL, '1', '1', '1', '1', '2020-04-21 09:18:56', '2020-04-21 12:49:46'),
(130, 'change-my-password', NULL, '1', '1', '2', '1', '2020-04-21 10:01:32', '2020-04-21 10:01:32'),
(131, 'submit_user_password', NULL, '1', '1', '2', '1', '2020-04-21 10:01:32', '2020-04-21 10:01:32'),
(134, 'view-product', NULL, '1', '2', '2', '1', '2020-04-21 17:09:31', '2020-04-21 17:09:31'),
(135, 'view-product-data', NULL, '1', '2', '2', '1', '2020-04-21 17:09:31', '2020-04-21 17:09:31'),
(136, 'download-add', NULL, '1', '2', '2', '1', '2020-04-22 17:22:24', '2020-04-22 17:22:24'),
(137, 'download-submit', NULL, '1', '2', '2', '1', '2020-04-22 17:22:24', '2020-04-22 17:22:24'),
(138, 'list-download', NULL, '1', '2', '2', '1', '2020-04-22 17:22:37', '2020-04-22 17:22:37'),
(139, 'delete-download', NULL, '1', '2', '2', '1', '2020-04-22 17:22:50', '2020-04-22 17:22:50'),
(140, 'downloads', NULL, '1', '1', '1', '1', '2020-04-22 17:23:15', '2020-04-22 17:23:15'),
(141, 'media', NULL, '1', '2', '2', '1', '2020-04-23 14:33:10', '2020-04-23 14:33:10'),
(142, 'media-submit', NULL, '1', '2', '2', '1', '2020-04-23 14:33:10', '2020-04-23 14:33:10'),
(143, 'list-media', NULL, '1', '2', '2', '1', '2020-04-23 14:33:10', '2020-04-23 14:33:10'),
(144, 'delete-media', NULL, '1', '2', '2', '1', '2020-04-23 14:33:10', '2020-04-23 14:33:10'),
(145, 'edit-media', NULL, '1', '2', '2', '1', '2020-04-23 14:33:10', '2020-04-23 14:33:10'),
(146, 'get-media-type', NULL, '1', '1', '2', '1', '2020-04-23 14:33:38', '2020-04-23 14:33:38'),
(147, 'get-media-type-data', NULL, '1', '1', '2', '1', '2020-04-23 14:33:38', '2020-04-23 14:33:38'),
(148, 'user_otp_check', NULL, '1', '1', '1', '1', '2020-04-24 09:11:08', '2020-04-24 09:11:08'),
(149, 'otp-settings', NULL, '1', '2', '2', '1', '2020-04-24 20:44:58', '2020-04-24 20:44:58'),
(150, 'otp-active', NULL, '1', '2', '2', '1', '2020-04-24 20:44:58', '2020-04-24 20:44:58'),
(151, 'otp-default', NULL, '1', '2', '2', '1', '2020-04-24 20:44:58', '2020-04-24 20:44:58'),
(152, 'payment_type', NULL, '2', '1', '2', '1', '2020-04-26 22:36:03', '2020-04-26 22:36:37'),
(153, 'payment-status-update', NULL, '2', '1', '2', '1', '2020-04-26 22:36:03', '2020-04-27 01:11:45'),
(154, 'payment-details', NULL, '1', '2', '2', '1', '2020-04-27 11:28:56', '2020-04-27 11:28:56'),
(155, 'dash-board', NULL, '1', '2', '2', '1', '2020-05-16 07:25:31', '2020-05-16 07:25:31'),
(156, 'add-brand', NULL, '1', '2', '2', '1', '2021-01-24 17:15:09', '2021-01-24 17:15:09'),
(157, 'submit-brand', NULL, '1', '2', '2', '1', '2021-01-24 17:15:09', '2021-01-24 17:15:09'),
(158, 'list-brand', NULL, '1', '2', '2', '1', '2021-01-24 17:15:30', '2021-01-24 17:15:30'),
(159, 'edit-brand-data', NULL, '1', '2', '2', '1', '2021-01-24 17:15:30', '2021-01-24 17:15:30'),
(160, 'delete-brand', NULL, '1', '2', '2', '1', '2021-01-24 17:15:42', '2021-01-24 17:15:42'),
(163, 'add-styles', NULL, '1', '2', '2', '1', '2021-01-31 07:19:37', '2021-01-31 07:19:37'),
(164, 'submit-styles', NULL, '1', '2', '2', '1', '2021-01-31 07:19:37', '2021-01-31 07:19:37'),
(165, 'list-styles', NULL, '1', '2', '2', '1', '2021-01-31 07:20:27', '2021-01-31 07:20:27'),
(166, 'edit-styles-data', NULL, '1', '2', '2', '1', '2021-01-31 07:20:27', '2021-01-31 07:20:27'),
(167, 'delete-styles', NULL, '1', '2', '2', '1', '2021-01-31 07:20:44', '2021-01-31 07:20:44'),
(168, 'get-brand-data', NULL, '1', '2', '2', '1', '2021-01-31 10:06:47', '2021-01-31 10:06:47'),
(169, 'get-style-data', NULL, '1', '1', '2', '1', '2021-01-31 10:18:31', '2021-01-31 10:18:31'),
(170, 'add_more_variation', NULL, '1', '2', '2', '1', '2021-01-31 13:14:16', '2021-01-31 13:14:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_admin_download`
--
ALTER TABLE `ad_admin_download`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `b_blog`
--
ALTER TABLE `b_blog`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `b_brand`
--
ALTER TABLE `b_brand`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cr_cart`
--
ALTER TABLE `cr_cart`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `ct_checkout_type`
--
ALTER TABLE `ct_checkout_type`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `c_category`
--
ALTER TABLE `c_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `c_contact`
--
ALTER TABLE `c_contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `i_invoice`
--
ALTER TABLE `i_invoice`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `ld_lead_data`
--
ALTER TABLE `ld_lead_data`
  ADD PRIMARY KEY (`ld_id`);

--
-- Indexes for table `lg_lead_generation`
--
ALTER TABLE `lg_lead_generation`
  ADD PRIMARY KEY (`lg_id`);

--
-- Indexes for table `lo_login_otp_settings`
--
ALTER TABLE `lo_login_otp_settings`
  ADD PRIMARY KEY (`lo_id`);

--
-- Indexes for table `l_login`
--
ALTER TABLE `l_login`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `ma_member_address`
--
ALTER TABLE `ma_member_address`
  ADD PRIMARY KEY (`ma_id`);

--
-- Indexes for table `mf_mail_failed`
--
ALTER TABLE `mf_mail_failed`
  ADD PRIMARY KEY (`mf_mail_failed_id`);

--
-- Indexes for table `mt_media_type`
--
ALTER TABLE `mt_media_type`
  ADD PRIMARY KEY (`mt_id`);

--
-- Indexes for table `m_media`
--
ALTER TABLE `m_media`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `m_member`
--
ALTER TABLE `m_member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `pr_product`
--
ALTER TABLE `pr_product`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `pv_variation`
--
ALTER TABLE `pv_variation`
  ADD PRIMARY KEY (`pv_id`);

--
-- Indexes for table `p_payment`
--
ALTER TABLE `p_payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sb_sub_category`
--
ALTER TABLE `sb_sub_category`
  ADD PRIMARY KEY (`sb_id`);

--
-- Indexes for table `s_size`
--
ALTER TABLE `s_size`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `s_style`
--
ALTER TABLE `s_style`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `u_user_permission`
--
ALTER TABLE `u_user_permission`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_admin_download`
--
ALTER TABLE `ad_admin_download`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `b_blog`
--
ALTER TABLE `b_blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `b_brand`
--
ALTER TABLE `b_brand`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cr_cart`
--
ALTER TABLE `cr_cart`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `ct_checkout_type`
--
ALTER TABLE `ct_checkout_type`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `c_category`
--
ALTER TABLE `c_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `c_contact`
--
ALTER TABLE `c_contact`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `i_invoice`
--
ALTER TABLE `i_invoice`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `ld_lead_data`
--
ALTER TABLE `ld_lead_data`
  MODIFY `ld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `lg_lead_generation`
--
ALTER TABLE `lg_lead_generation`
  MODIFY `lg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lo_login_otp_settings`
--
ALTER TABLE `lo_login_otp_settings`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `l_login`
--
ALTER TABLE `l_login`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `ma_member_address`
--
ALTER TABLE `ma_member_address`
  MODIFY `ma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `mf_mail_failed`
--
ALTER TABLE `mf_mail_failed`
  MODIFY `mf_mail_failed_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mt_media_type`
--
ALTER TABLE `mt_media_type`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `m_media`
--
ALTER TABLE `m_media`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `m_member`
--
ALTER TABLE `m_member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `pr_product`
--
ALTER TABLE `pr_product`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pv_variation`
--
ALTER TABLE `pv_variation`
  MODIFY `pv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `p_payment`
--
ALTER TABLE `p_payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sb_sub_category`
--
ALTER TABLE `sb_sub_category`
  MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `s_size`
--
ALTER TABLE `s_size`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `s_style`
--
ALTER TABLE `s_style`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `u_user_permission`
--
ALTER TABLE `u_user_permission`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
