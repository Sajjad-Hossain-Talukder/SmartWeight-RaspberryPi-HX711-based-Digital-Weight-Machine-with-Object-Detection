-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2023 at 09:08 PM
-- Server version: 10.5.19-MariaDB-0+deb11u2
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SmartWeight`
--

-- --------------------------------------------------------

--
-- Table structure for table `calibration`
--

CREATE TABLE `calibration` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `ratio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calibration`
--

INSERT INTO `calibration` (`id`, `status`, `ratio`) VALUES
(1, 1, 233.945),
(2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`) VALUES
(39, 'X');

-- --------------------------------------------------------

--
-- Table structure for table `products_price_list`
--

CREATE TABLE `products_price_list` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_price_list`
--

INSERT INTO `products_price_list` (`id`, `product_name`, `product_price`) VALUES
(1, 'orange', 150),
(2, 'banana', 60),
(3, 'garlic', 120),
(4, 'onion', 200),
(5, 'potato', 40);

-- --------------------------------------------------------

--
-- Table structure for table `sell_details`
--

CREATE TABLE `sell_details` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `weight` double NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell_details`
--

INSERT INTO `sell_details` (`id`, `cid`, `product`, `weight`, `price`) VALUES
(24, 1, 'banana', 16.888584923807, 1.0133150954284),
(25, 1, 'orange', 18.393212079762, 2.7589818119643);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calibration`
--
ALTER TABLE `calibration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_price_list`
--
ALTER TABLE `products_price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_details`
--
ALTER TABLE `sell_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calibration`
--
ALTER TABLE `calibration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products_price_list`
--
ALTER TABLE `products_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sell_details`
--
ALTER TABLE `sell_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
