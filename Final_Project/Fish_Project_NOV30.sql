-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 30, 2021 at 11:08 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Fish_Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin1`
--

CREATE TABLE `Admin1` (
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `email` char(32) DEFAULT NULL,
  `username` char(100) NOT NULL,
  `password` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Admin1`
--

INSERT INTO `Admin1` (`firstname`, `lastname`, `email`, `username`, `password`) VALUES
('admin', 'admin', 'admin@gmail.com', 'admin@gmail.com', 'test'),
('Jiarui', 'Wang', 'jr@gmail.com', 'jr@gmail.com', '$2y$10$eE3MPmsjxJS9Bj2exFxPkOTiPenGpG8Ddi5U55RHIsXR.w2NZ5AMa');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `method` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `method`) VALUES
(1, 'Free-7days'),
(2, 'standard-3days'),
(3, 'Express-1day');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `question_title` varchar(100) NOT NULL,
  `answer` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`question_title`, `answer`) VALUES
('Can I get a refund?', 'Unfortunately, we do not except refund from any products that are food.'),
('How can I make changes to my orders?', 'Simply email us within 12 hours. Be sure to include your information such as username and order number.'),
('How long does for internationl shipping to deliver the package?', 'The delivery time will vary a lot from location to location. In short, the shipping time alone could be around,\r\nFor non-US orders:Free - 14 - 23 business days Standard - 7 - 14 business days Express - 3 - 7 business days'),
('How to sign-up for an account?', 'In order to sign-up for an account, you need to have your name and birthday. To sign up, go ahead and click \"Registration Page\" on the bottom of this page.'),
('What payment do you expect?', 'We accept major debit cards and credit cards (American Express, Mastercard, Visa and Paypal).');

-- --------------------------------------------------------

--
-- Table structure for table `Fish_food`
--

CREATE TABLE `Fish_food` (
  `Name` char(50) NOT NULL,
  `Price` double(10,2) NOT NULL,
  `Weight` char(10) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Fish_food`
--

INSERT INTO `Fish_food` (`Name`, `Price`, `Weight`, `ProductID`) VALUES
('Omega™ Blood Worms', 10.37, '10', 1),
('TetraPro™ Color Crisps', 4.99, '20', 2),
('Omega™ Carnivore', 5.99, '30', 3),
('Omega™ Dried Brine Shrimp', 5.89, '40', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Fish_type`
--

CREATE TABLE `Fish_type` (
  `Name` char(50) NOT NULL,
  `Price` double(10,2) NOT NULL,
  `Color` char(10) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Fish_type`
--

INSERT INTO `Fish_type` (`Name`, `Price`, `Color`, `ProductID`) VALUES
('Gold Fish', 10.62, 'gold', 5),
('Arrow Fish', 21.26, 'blue', 6),
('Purple Fish', 31.26, 'purple', 7),
('Red Fish', 41.26, 'red', 8);

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `Name` char(50) NOT NULL,
  `Price` double(10,2) NOT NULL,
  `Type` char(15) NOT NULL,
  `Available` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` (`Name`, `Price`, `Type`, `Available`, `ProductID`) VALUES
('Omega™ Blood Worms', 19.98, 'Food', 100, 1),
('TetraPro™ Color Crisps', 4.99, 'Food', 11, 2),
('Omega™ Carnivore', 5.99, 'Food', 39, 3),
('Omega™ Dried Brine Shrimp', 5.89, 'Food', 7, 4),
('Gold Fish', 10.62, 'Fish', 8, 5),
('Arrow Fish', 21.26, 'Fish', 100, 6),
('Purple Fish', 31.26, 'Fish', 100, 7),
('Red Fish', 41.26, 'Fish', 46, 8);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `username` char(100) NOT NULL,
  `ProductID` int(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `delivery` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `username`, `ProductID`, `Quantity`, `delivery`) VALUES
(1, 'test', 1, 15, 1),
(5, 'test', 1, 15, 1),
(6, 'test', 1, 11, 2),
(7, 'test', 1, 4, 3),
(8, 'test', 1, 2, 3),
(10, 'jr@gmail.com', 1, 2, 2),
(18, 'tiktok@gmail.com', 6, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `ProductID` int(10) NOT NULL,
  `Inventory_Num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Store`
--

CREATE TABLE `Store` (
  `Address` char(100) NOT NULL,
  `Open_hour` char(50) NOT NULL,
  `Name` char(50) NOT NULL,
  `Phone` char(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Store`
--

INSERT INTO `Store` (`Address`, `Open_hour`, `Name`, `Phone`) VALUES
('12270 S 700 E, Draper, UT 84020', 'pen hour:  Mon-Sat 11-6p.m.     Sun     Closed', 'Live Fish Direct', '(801) 572-1111'),
('2196 W 3500 S C-6, West Valley City, UT 84119', 'open hour:   Mon-Fri 12-8p.m.   Sat     11-6p.m. S', 'The Fish Tank', '(435)-680-7018'),
('4010 Highland Dr #1,Millcreek, UT 84124', 'open hour:    Mon-Fri 12-7p.m.      Sat     11-6p.', 'Fish4u', '(801) 274-0113'),
('4875 S Redwood Rd, Taylorsville, UT 84123', 'open hour: Mon-Sat 11-7p.m.  Sun     12-5p.m.', 'Mark\'s Ark Inc', '(801) 261-0466');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `birthday` varchar(16) DEFAULT NULL,
  `email` char(32) DEFAULT NULL,
  `username` char(100) NOT NULL,
  `password` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`firstname`, `lastname`, `birthday`, `email`, `username`, `password`) VALUES
('Jiarui', 'Wang', '10/16/1998', 'jerrywong1016@gmail.com', 'jerrywong1016@gmail.com', '$2y$10$83htfbANU1t8SBMQWXrM/Ox0m4LG3V1LDKwZaoB.S7FZ0MZLyaq02'),
('y', 'l', '06/01/1998', 'test@gmail.com', 'test', '$2y$10$JtJu2GB4FuEbzPgXV70eR.ewVziY4tKH8MCQF4RtV6zxpic3gWB12'),
('test2021', 'test2021', 'test2021', 'test2021@gmail.com', 'test2021', '$2y$10$OCPGuyQdw5g7RGWJKuIO.u3rGdCkBHQnJlOVWSutmmsgGxAV0VkQy'),
('Tik', 'Tok', '10/10/2010', 'tiktok@gmail.com', 'tiktok@gmail.com', '$2y$10$u88aRbNprlmmBpHOhj52peot8xfEqAm17sAap8JXOQndSWomTraOy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin1`
--
ALTER TABLE `Admin1`
  ADD PRIMARY KEY (`username`,`password`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `lastname` (`lastname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD UNIQUE KEY `delivery_id` (`delivery_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`question_title`),
  ADD UNIQUE KEY `question_title` (`question_title`);

--
-- Indexes for table `Fish_food`
--
ALTER TABLE `Fish_food`
  ADD PRIMARY KEY (`ProductID`,`Name`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `Fish_type`
--
ALTER TABLE `Fish_type`
  ADD PRIMARY KEY (`ProductID`,`Name`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`ProductID`,`Name`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD UNIQUE KEY `OrderID` (`OrderID`),
  ADD KEY `delivery` (`delivery`),
  ADD KEY `username` (`username`) USING BTREE,
  ADD KEY `ProductID` (`ProductID`) USING BTREE;

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`ProductID`,`Inventory_Num`);

--
-- Indexes for table `Store`
--
ALTER TABLE `Store`
  ADD PRIMARY KEY (`Address`),
  ADD UNIQUE KEY `Address` (`Address`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`username`,`password`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `lastname` (`lastname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `delivery` FOREIGN KEY (`delivery`) REFERENCES `delivery` (`delivery_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
