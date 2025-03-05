-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 06:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fish`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_item_tbl`
--

CREATE TABLE `bill_item_tbl` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_item_tbl`
--

INSERT INTO `bill_item_tbl` (`id`, `bill_id`, `product_id`, `quantity`, `price`, `total`) VALUES
(5, 5, 1, 0, 254.00, 254.00),
(6, 6, 2, 1, 312.00, 312.00),
(7, 7, 1, 1, 254.00, 254.00),
(8, 8, 2, 1, 312.00, 312.00);

-- --------------------------------------------------------

--
-- Table structure for table `bill_tbl`
--

CREATE TABLE `bill_tbl` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rent` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `out_box` int(11) NOT NULL,
  `return_box` int(11) NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_tbl`
--

INSERT INTO `bill_tbl` (`id`, `customer_id`, `rent`, `paid_amount`, `discount`, `out_box`, `return_box`, `total_amount`, `created_at`, `status`) VALUES
(1, 1, 200.00, 500.00, 50, 2, 1, 624.00, '2025-02-22 08:12:22', 'Active'),
(2, 2, 20.00, 300.00, 20, 20, 20, 312.00, '2025-02-22 08:15:05', 'Active'),
(3, 4, 0.00, 0.00, 0, 0, 0, 0.00, '2025-02-22 08:18:02', 'Active'),
(4, 3, 10.00, 300.00, 10, 10, 10, 624.00, '2025-02-22 08:21:30', 'Active'),
(5, 1, 10.00, 250.00, 10, 10, 10, 254.00, '2025-02-22 08:27:08', 'Active'),
(6, 2, 10.00, 300.00, 10, 10, 10, 312.00, '2025-02-22 08:28:01', 'Active'),
(7, 1, 10.00, 200.00, 10, 10, 10, 254.00, '2025-02-22 08:32:12', 'Active'),
(8, 2, 10.00, 250.00, 1, 2, 10, 312.00, '2025-02-22 08:35:09', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `box_tbl`
--

CREATE TABLE `box_tbl` (
  `id` int(11) NOT NULL,
  `box` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `box_tbl`
--

INSERT INTO `box_tbl` (`id`, `box`) VALUES
(1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `balance` float NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`id`, `name`, `mobile`, `address`, `balance`, `status`, `created_at`) VALUES
(1, 'vasanth m', '9894688091', '11/145 perumal kovil street kallikulam sathiram', 201, 'Active', '2025-02-21 11:41:49'),
(2, 'raja', '9894688094', 'kalakad', 100, 'Active', '2025-02-21 12:36:48'),
(3, 'akash', '9894688095', 'aaa', 74, 'Active', '2025-02-21 12:38:55'),
(4, '', '', '', 0, 'Active', '2025-02-22 08:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `food_tbl`
--

CREATE TABLE `food_tbl` (
  `id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_type` enum('Veg','Non-Veg') NOT NULL,
  `category` enum('Breakfast','Lunch','Dinner') NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `food_image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_tbl`
--

INSERT INTO `food_tbl` (`id`, `food_name`, `food_type`, `category`, `price`, `food_image`, `created_at`, `status`) VALUES
(1, 'biryani', 'Non-Veg', 'Lunch', 300.00, 'uploads/1741150447_product7.png', '2025-03-04 19:19:12', 'Active'),
(2, 'sappathi', 'Veg', 'Breakfast', 0.00, '', '2025-03-04 19:25:21', 'Active'),
(3, 'sappathi1', 'Veg', 'Breakfast', 0.00, '', '2025-03-04 19:27:28', 'Active'),
(4, 'sappathi3', 'Veg', 'Breakfast', 0.00, '', '2025-03-04 19:28:40', 'Active'),
(5, 'porotta', 'Veg', 'Lunch', 200.00, 'uploads/1741151322_product4.png', '2025-03-04 19:30:20', 'Active'),
(6, 'porotta 3', 'Non-Veg', 'Lunch', 150.00, 'uploads/1741150884_product1.png', '2025-03-05 10:31:24', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `id` int(11) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`id`, `product_code`, `product_name`, `price`, `status`, `created_at`) VALUES
(1, '001', 'product 0ne', 254, 'Active', '2025-02-21 13:31:02'),
(2, '002', 'product 2', 312, 'Active', '2025-02-21 13:48:15'),
(3, '003', 'product 3', 125, 'Active', '2025-02-21 13:51:35'),
(4, '0045', 'product 4', 4, 'Active', '2025-02-21 13:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `name`, `username`, `password`, `status`, `created_at`) VALUES
(1, 'admin', 'admin', '123', 'Active', '2025-02-21 11:28:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_item_tbl`
--
ALTER TABLE `bill_item_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `box_tbl`
--
ALTER TABLE `box_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_tbl`
--
ALTER TABLE `food_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product name` (`product_name`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_item_tbl`
--
ALTER TABLE `bill_item_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `box_tbl`
--
ALTER TABLE `box_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_tbl`
--
ALTER TABLE `food_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_item_tbl`
--
ALTER TABLE `bill_item_tbl`
  ADD CONSTRAINT `bill_id` FOREIGN KEY (`bill_id`) REFERENCES `bill_tbl` (`id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`id`);

--
-- Constraints for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
