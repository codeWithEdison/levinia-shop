-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 24, 2024 at 07:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavinia_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductCode` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductCode`, `ProductName`) VALUES
(1, 'Product A'),
(2, 'Product B'),
(3, 'Product C'),
(4, 'Product D'),
(5, 'Product E');

-- --------------------------------------------------------

--
-- Table structure for table `productin`
--

CREATE TABLE `productin` (
  `ProductInId` int(11) NOT NULL,
  `ProductCode` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `UniquePrice` decimal(10,2) DEFAULT NULL,
  `TotalPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productin`
--

INSERT INTO `productin` (`ProductInId`, `ProductCode`, `Date`, `Quantity`, `UniquePrice`, `TotalPrice`) VALUES
(1, 1, '2024-04-01', 10, 5.00, 50.00),
(2, 2, '2024-04-02', 15, 8.00, 120.00),
(3, 3, '2024-04-03', 20, 7.50, 150.00),
(4, 4, '2024-04-04', 8, 10.00, 80.00),
(5, 5, '2024-04-05', 12, 6.50, 78.00);

-- --------------------------------------------------------

--
-- Table structure for table `productout`
--

CREATE TABLE `productout` (
  `ProductOutId` int(11) NOT NULL,
  `ProductCode` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `UniquePrice` decimal(10,2) DEFAULT NULL,
  `TotalPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productout`
--

INSERT INTO `productout` (`ProductOutId`, `ProductCode`, `Date`, `Quantity`, `UniquePrice`, `TotalPrice`) VALUES
(1, 1, '2024-04-01', 5, 6.00, 30.00),
(2, 2, '2024-04-02', 8, 9.00, 72.00),
(3, 3, '2024-04-03', 10, 8.50, 85.00),
(4, 4, '2024-04-04', 3, 11.00, 33.00),
(5, 5, '2024-04-05', 6, 7.00, 42.00);

-- --------------------------------------------------------

--
-- Table structure for table `shopkeeper`
--

CREATE TABLE `shopkeeper` (
  `ShopkeeperId` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopkeeper`
--

INSERT INTO `shopkeeper` (`ShopkeeperId`, `UserName`, `Password`) VALUES
(1, 'user1', 'password1'),
(2, 'user2', 'password2'),
(3, 'user3', 'password3'),
(4, 'user4', 'password4'),
(5, 'user5', 'password5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductCode`);

--
-- Indexes for table `productin`
--
ALTER TABLE `productin`
  ADD PRIMARY KEY (`ProductInId`),
  ADD KEY `ProductCode` (`ProductCode`);

--
-- Indexes for table `productout`
--
ALTER TABLE `productout`
  ADD PRIMARY KEY (`ProductOutId`),
  ADD KEY `ProductCode` (`ProductCode`);

--
-- Indexes for table `shopkeeper`
--
ALTER TABLE `shopkeeper`
  ADD PRIMARY KEY (`ShopkeeperId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productin`
--
ALTER TABLE `productin`
  MODIFY `ProductInId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productout`
--
ALTER TABLE `productout`
  MODIFY `ProductOutId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shopkeeper`
--
ALTER TABLE `shopkeeper`
  MODIFY `ShopkeeperId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productin`
--
ALTER TABLE `productin`
  ADD CONSTRAINT `productin_ibfk_1` FOREIGN KEY (`ProductCode`) REFERENCES `product` (`ProductCode`);

--
-- Constraints for table `productout`
--
ALTER TABLE `productout`
  ADD CONSTRAINT `productout_ibfk_1` FOREIGN KEY (`ProductCode`) REFERENCES `product` (`ProductCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
