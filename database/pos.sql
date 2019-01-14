-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 02:18 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'Indian', '2018-09-17 09:05:55', '2018-09-17 09:05:55'),
(2, 'Indian', '2018-09-17 09:08:11', '2018-09-17 09:08:11'),
(3, 'Chaina', '2018-09-17 09:12:05', '2018-09-17 09:12:05'),
(4, 'Japan', '2018-09-17 09:12:18', '2018-09-17 09:12:18'),
(5, 'Coriea', '2018-09-17 09:12:26', '2018-09-17 09:12:26'),
(6, 'Bangladeshi', '2018-09-27 07:47:35', '2018-09-27 07:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', '2018-09-17 08:11:58', '2018-09-17 08:11:58'),
(2, 'Pents', '2018-09-17 08:13:59', '2018-09-17 08:13:59'),
(3, 'SHOes', '2018-09-17 08:15:16', '2018-09-17 08:15:16'),
(4, 'Shari', '2018-09-17 08:15:57', '2018-09-17 08:15:57'),
(5, 'Shari', '2018-09-17 08:21:32', '2018-09-17 08:21:32'),
(6, 'T-shirt', '2018-09-17 13:46:26', '2018-09-17 13:46:26'),
(7, 'T-shirt', '2018-09-17 13:46:30', '2018-09-17 13:46:30'),
(8, 'Tupi', '2018-09-27 07:47:22', '2018-09-27 07:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_system`
--

CREATE TABLE `tbl_grade_system` (
  `grade_system_id` int(11) UNSIGNED NOT NULL,
  `subject_code` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `subject_name` varchar(50) NOT NULL DEFAULT '0',
  `subject_marks` double(12,2) NOT NULL DEFAULT '0.00',
  `grade` varchar(50) NOT NULL DEFAULT '0',
  `gpa` float(11,2) NOT NULL DEFAULT '0.00',
  `final_gpa` float(11,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_grade_system`
--

INSERT INTO `tbl_grade_system` (`grade_system_id`, `subject_code`, `subject_name`, `subject_marks`, `grade`, `gpa`, `final_gpa`, `created_at`, `updated_at`) VALUES
(1, 101, 'Bangla', 85.00, 'A+', 5.00, 0.00, '2018-09-29 05:07:21', '2018-09-29 05:07:21'),
(2, 102, 'English', 72.00, 'A', 4.00, 0.00, '2018-09-29 05:11:06', '2018-09-29 05:11:06'),
(3, 104, 'Physics', 25.00, 'F', 0.00, 0.00, '2018-09-29 05:16:29', '2018-09-29 05:16:29'),
(4, 108, 'Chemistry', 42.00, 'C', 2.00, 0.00, '2018-09-29 05:19:36', '2018-09-29 05:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(11) UNSIGNED NOT NULL,
  `sale_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `sale_id`) VALUES
(30, 288),
(31, 289),
(32, 290),
(33, 291),
(34, 292),
(35, 293),
(36, 294),
(37, 295),
(38, 296),
(39, 297),
(40, 298);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_iteminfo`
--

CREATE TABLE `tbl_iteminfo` (
  `item_id` int(11) UNSIGNED NOT NULL,
  `item_name` varchar(50) DEFAULT '0',
  `category_id` int(11) UNSIGNED DEFAULT '0',
  `brand_id` int(11) UNSIGNED DEFAULT '0',
  `supplier_id` int(11) UNSIGNED DEFAULT '0',
  `item_quantity` int(11) UNSIGNED DEFAULT '0',
  `item_description` text,
  `item_price` double(10,2) DEFAULT '0.00',
  `item_image` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_iteminfo`
--

INSERT INTO `tbl_iteminfo` (`item_id`, `item_name`, `category_id`, `brand_id`, `supplier_id`, `item_quantity`, `item_description`, `item_price`, `item_image`, `created_at`, `updated_at`) VALUES
(17, 'OPPO', 2, 1, 6, 99, 'Hello', 200.00, '180926082842-1938-17.jpg', '2018-09-26 08:28:42', '2018-10-23 11:31:43'),
(18, 'Mouse', 2, 2, 9, 53, 'hello', 300.00, '180926082913-811-18.jpg', '2018-09-26 08:29:13', '2018-09-27 08:13:41'),
(19, 'Keyboard', 7, 4, 5, 24, 'hello', 100.00, '180926082941-1153-19.jpg', '2018-09-26 08:29:41', '2018-09-27 08:14:06'),
(20, 'Book', 8, 6, 10, 41, 'hello', 100.00, '180927074854-1721-20.jpg', '2018-09-27 07:48:54', '2018-09-27 08:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchaseinvoice`
--

CREATE TABLE `tbl_purchaseinvoice` (
  `purchase_invoice_id` int(11) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double(12,3) UNSIGNED NOT NULL DEFAULT '0.000',
  `discount` double(12,3) UNSIGNED DEFAULT '0.000',
  `paid` double(12,3) UNSIGNED NOT NULL DEFAULT '0.000',
  `due` double(12,3) UNSIGNED NOT NULL DEFAULT '0.000',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchaseinvoice`
--

INSERT INTO `tbl_purchaseinvoice` (`purchase_invoice_id`, `date`, `amount`, `discount`, `paid`, `due`, `created_at`, `updated_at`) VALUES
(92, '2018-09-27', 600.000, 100.000, 100.000, 400.000, '2018-09-27 08:00:08', '2018-09-27 08:00:08'),
(93, '2018-09-27', 500.000, 100.000, 400.000, 0.000, '2018-09-27 08:01:15', '2018-09-27 08:01:15'),
(94, '2018-09-27', 600.000, 50.000, 200.000, 350.000, '2018-09-27 08:11:19', '2018-09-27 08:11:19'),
(95, '2018-09-27', 500.000, 100.000, 300.000, 100.000, '2018-09-27 08:11:48', '2018-09-27 08:11:48'),
(96, '2018-09-27', 500.000, 50.000, 200.000, 250.000, '2018-09-27 08:13:41', '2018-09-27 08:13:41'),
(97, '2018-09-27', 200.000, 20.000, 80.000, 100.000, '2018-09-27 08:14:06', '2018-09-27 08:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_invoice_details`
--

CREATE TABLE `tbl_purchase_invoice_details` (
  `purchase_invoice_details_id` int(11) UNSIGNED NOT NULL,
  `purchase_invoice_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `item_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `purchase_invoice_number_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `price` double(12,3) UNSIGNED NOT NULL DEFAULT '0.000',
  `quantity` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `discount` double(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `amount` double(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_invoice_details`
--

INSERT INTO `tbl_purchase_invoice_details` (`purchase_invoice_details_id`, `purchase_invoice_id`, `item_id`, `purchase_invoice_number_id`, `price`, `quantity`, `discount`, `amount`, `created_at`, `updated_at`) VALUES
(90, 92, 17, 23, 200.000, 1, 100.00, 600.00, '2018-09-27 08:00:08', '2018-09-27 08:00:08'),
(91, 92, 18, 23, 300.000, 1, 100.00, 600.00, '2018-09-27 08:00:08', '2018-09-27 08:00:08'),
(92, 92, 20, 23, 100.000, 1, 100.00, 600.00, '2018-09-27 08:00:08', '2018-09-27 08:00:08'),
(93, 93, 17, 24, 200.000, 1, 100.00, 500.00, '2018-09-27 08:01:15', '2018-09-27 08:01:15'),
(94, 93, 18, 24, 300.000, 1, 100.00, 500.00, '2018-09-27 08:01:15', '2018-09-27 08:01:15'),
(95, 94, 17, 25, 200.000, 1, 50.00, 600.00, '2018-09-27 08:11:19', '2018-09-27 08:11:19'),
(96, 94, 18, 25, 300.000, 1, 50.00, 600.00, '2018-09-27 08:11:19', '2018-09-27 08:11:19'),
(97, 94, 20, 25, 100.000, 1, 50.00, 600.00, '2018-09-27 08:11:19', '2018-09-27 08:11:19'),
(98, 95, 17, 26, 200.000, 1, 100.00, 500.00, '2018-09-27 08:11:49', '2018-09-27 08:11:49'),
(99, 95, 18, 26, 300.000, 1, 100.00, 500.00, '2018-09-27 08:11:49', '2018-09-27 08:11:49'),
(100, 96, 17, 27, 200.000, 1, 50.00, 500.00, '2018-09-27 08:13:41', '2018-09-27 08:13:41'),
(101, 96, 18, 27, 300.000, 1, 50.00, 500.00, '2018-09-27 08:13:42', '2018-09-27 08:13:42'),
(102, 97, 20, 28, 100.000, 1, 20.00, 200.00, '2018-09-27 08:14:06', '2018-09-27 08:14:06'),
(103, 97, 19, 28, 100.000, 1, 20.00, 200.00, '2018-09-27 08:14:06', '2018-09-27 08:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_invoice_number`
--

CREATE TABLE `tbl_purchase_invoice_number` (
  `purchase_invoice_number_id` int(11) UNSIGNED NOT NULL,
  `purchase_invoice_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_invoice_number`
--

INSERT INTO `tbl_purchase_invoice_number` (`purchase_invoice_number_id`, `purchase_invoice_id`, `created_at`, `updated_at`) VALUES
(23, 92, '2018-09-27 08:00:08', '2018-09-27 08:00:08'),
(24, 93, '2018-09-27 08:01:15', '2018-09-27 08:01:15'),
(25, 94, '2018-09-27 08:11:19', '2018-09-27 08:11:19'),
(26, 95, '2018-09-27 08:11:49', '2018-09-27 08:11:49'),
(27, 96, '2018-09-27 08:13:41', '2018-09-27 08:13:41'),
(28, 97, '2018-09-27 08:14:06', '2018-09-27 08:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `sale_id` int(11) UNSIGNED NOT NULL,
  `amount` double(12,3) DEFAULT NULL,
  `discount` double(12,3) DEFAULT NULL,
  `paid` double(12,3) DEFAULT NULL,
  `due` double(12,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`sale_id`, `amount`, `discount`, `paid`, `due`, `created_at`, `updated_at`) VALUES
(288, 4200.000, 200.000, 3000.000, 1000.000, '2018-09-27 05:10:32', '2018-09-27 05:10:32'),
(289, 500.000, 10.000, 10.000, 480.000, '2018-09-27 07:41:11', '2018-09-27 07:41:11'),
(290, 400.000, 50.000, 350.000, 0.000, '2018-09-27 07:41:37', '2018-09-27 07:41:37'),
(291, 4600.000, 100.000, 4000.000, 500.000, '2018-09-27 07:50:47', '2018-09-27 07:50:47'),
(292, 300.000, NULL, NULL, 300.000, '2018-09-27 07:55:28', '2018-09-27 07:55:28'),
(293, 500.000, 100.000, 400.000, 0.000, '2018-09-27 08:06:36', '2018-09-27 08:06:36'),
(294, 500.000, 100.000, 400.000, 0.000, '2018-09-27 08:07:29', '2018-09-27 08:07:29'),
(295, 500.000, 100.000, 100.000, 300.000, '2018-09-27 08:07:59', '2018-09-27 08:07:59'),
(296, 300.000, 100.000, 200.000, 0.000, '2018-09-27 08:09:52', '2018-09-27 08:09:52'),
(297, 200.000, 50.000, 100.000, 50.000, '2018-09-27 08:10:21', '2018-09-27 08:10:21'),
(298, 400.000, 100.000, 200.000, 100.000, '2018-10-23 11:31:43', '2018-10-23 11:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_details`
--

CREATE TABLE `tbl_sale_details` (
  `sale_details_id` int(11) UNSIGNED NOT NULL,
  `item_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `sale_id` int(11) UNSIGNED DEFAULT '0',
  `invoice_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `sale_item_quantity` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `price` double(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `discount` double(12,2) UNSIGNED DEFAULT '0.00',
  `total_amount` double(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale_details`
--

INSERT INTO `tbl_sale_details` (`sale_details_id`, `item_id`, `sale_id`, `invoice_id`, `sale_item_quantity`, `price`, `discount`, `total_amount`, `created_at`, `updated_at`) VALUES
(373, 18, 288, 30, 10, 300.00, 200.00, 4200.00, '2018-09-27 05:10:32', '2018-09-27 05:10:32'),
(374, 17, 288, 30, 1, 200.00, 200.00, 4200.00, '2018-09-27 05:10:32', '2018-09-27 05:10:32'),
(375, 19, 288, 30, 10, 100.00, 200.00, 4200.00, '2018-09-27 05:10:32', '2018-09-27 05:10:32'),
(376, 17, 289, 31, 1, 200.00, 10.00, 500.00, '2018-09-27 07:41:12', '2018-09-27 07:41:12'),
(377, 18, 289, 31, 1, 300.00, 10.00, 500.00, '2018-09-27 07:41:12', '2018-09-27 07:41:12'),
(378, 19, 290, 32, 1, 100.00, 50.00, 400.00, '2018-09-27 07:41:37', '2018-09-27 07:41:37'),
(379, 18, 290, 32, 1, 300.00, 50.00, 400.00, '2018-09-27 07:41:37', '2018-09-27 07:41:37'),
(380, 18, 291, 33, 10, 300.00, 100.00, 4600.00, '2018-09-27 07:50:47', '2018-09-27 07:50:47'),
(381, 17, 291, 33, 3, 200.00, 100.00, 4600.00, '2018-09-27 07:50:47', '2018-09-27 07:50:47'),
(382, 20, 291, 33, 10, 100.00, 100.00, 4600.00, '2018-09-27 07:50:48', '2018-09-27 07:50:48'),
(383, 17, 292, 34, 1, 200.00, NULL, 300.00, '2018-09-27 07:55:28', '2018-09-27 07:55:28'),
(384, 20, 292, 34, 1, 100.00, NULL, 300.00, '2018-09-27 07:55:28', '2018-09-27 07:55:28'),
(385, 17, 293, 35, 1, 200.00, 100.00, 500.00, '2018-09-27 08:06:36', '2018-09-27 08:06:36'),
(386, 18, 293, 35, 1, 300.00, 100.00, 500.00, '2018-09-27 08:06:36', '2018-09-27 08:06:36'),
(387, 17, 294, 36, 1, 200.00, 100.00, 500.00, '2018-09-27 08:07:29', '2018-09-27 08:07:29'),
(388, 18, 294, 36, 1, 300.00, 100.00, 500.00, '2018-09-27 08:07:29', '2018-09-27 08:07:29'),
(389, 17, 295, 37, 1, 200.00, 100.00, 500.00, '2018-09-27 08:07:59', '2018-09-27 08:07:59'),
(390, 18, 295, 37, 1, 300.00, 100.00, 500.00, '2018-09-27 08:07:59', '2018-09-27 08:07:59'),
(391, 17, 296, 38, 1, 200.00, 100.00, 300.00, '2018-09-27 08:09:52', '2018-09-27 08:09:52'),
(392, 19, 296, 38, 1, 100.00, 100.00, 300.00, '2018-09-27 08:09:52', '2018-09-27 08:09:52'),
(393, 19, 297, 39, 1, 100.00, 50.00, 200.00, '2018-09-27 08:10:21', '2018-09-27 08:10:21'),
(394, 20, 297, 39, 1, 100.00, 50.00, 200.00, '2018-09-27 08:10:21', '2018-09-27 08:10:21'),
(395, 17, 298, 40, 2, 200.00, 100.00, 400.00, '2018-10-23 11:31:43', '2018-10-23 11:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updaated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_name`, `created_at`, `updaated_at`) VALUES
(1, 'Ashraf', '2018-09-17 13:28:36', '2018-09-17 13:28:36'),
(2, 'Ashraf', '2018-09-17 13:29:19', '2018-09-17 13:29:19'),
(3, 'Saiful', '2018-09-17 13:29:43', '2018-09-17 13:29:43'),
(4, 'Pavel', '2018-09-17 13:31:26', '2018-09-17 13:31:26'),
(5, 'Pavel', '2018-09-17 13:32:06', '2018-09-17 13:32:06'),
(6, 'Murad', '2018-09-17 13:33:49', '2018-09-17 13:33:49'),
(7, 'ARAFAT', '2018-09-17 13:34:59', '2018-09-17 13:34:59'),
(8, 'Riyad', '2018-09-17 13:43:16', '2018-09-17 13:43:16'),
(9, 'Rasel', '2018-09-17 13:45:25', '2018-09-17 13:45:25'),
(10, 'Top  Ten', '2018-09-27 07:47:56', '2018-09-27 07:47:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_grade_system`
--
ALTER TABLE `tbl_grade_system`
  ADD PRIMARY KEY (`grade_system_id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tbl_invoice_tbl_sale` (`sale_id`);

--
-- Indexes for table `tbl_iteminfo`
--
ALTER TABLE `tbl_iteminfo`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_purchaseinvoice`
--
ALTER TABLE `tbl_purchaseinvoice`
  ADD PRIMARY KEY (`purchase_invoice_id`);

--
-- Indexes for table `tbl_purchase_invoice_details`
--
ALTER TABLE `tbl_purchase_invoice_details`
  ADD PRIMARY KEY (`purchase_invoice_details_id`);

--
-- Indexes for table `tbl_purchase_invoice_number`
--
ALTER TABLE `tbl_purchase_invoice_number`
  ADD PRIMARY KEY (`purchase_invoice_number_id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tbl_sale_details`
--
ALTER TABLE `tbl_sale_details`
  ADD PRIMARY KEY (`sale_details_id`),
  ADD KEY `FK_tbl_sale_details_tbl_iteminfo` (`item_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_grade_system`
--
ALTER TABLE `tbl_grade_system`
  MODIFY `grade_system_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_iteminfo`
--
ALTER TABLE `tbl_iteminfo`
  MODIFY `item_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_purchaseinvoice`
--
ALTER TABLE `tbl_purchaseinvoice`
  MODIFY `purchase_invoice_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `tbl_purchase_invoice_details`
--
ALTER TABLE `tbl_purchase_invoice_details`
  MODIFY `purchase_invoice_details_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_purchase_invoice_number`
--
ALTER TABLE `tbl_purchase_invoice_number`
  MODIFY `purchase_invoice_number_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `sale_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `tbl_sale_details`
--
ALTER TABLE `tbl_sale_details`
  MODIFY `sale_details_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `FK_tbl_invoice_tbl_sale` FOREIGN KEY (`sale_id`) REFERENCES `tbl_sale` (`sale_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
