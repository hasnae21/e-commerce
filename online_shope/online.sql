-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 09:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerCode` int(11) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `adress` varchar(254) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerCode`, `lastName`, `firstName`, `adress`, `phone`, `email`, `password`) VALUES
(24, 'Ahouzi', 'Hasnae', 'RUE IBN BAJA N1 MARCHE AUX BOEUFS TANGER MOROCCO', '+33634905444', 'ahouzihasnae@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `orderedQuantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerCode` int(11) NOT NULL,
  `orderDate` datetime DEFAULT NULL,
  `deliveryAddress` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(254) DEFAULT NULL,
  `description` varchar(254) DEFAULT NULL,
  `unitPrice` decimal(8,0) DEFAULT NULL,
  `quantityInStock` int(11) DEFAULT NULL,
  `image` varchar(254) DEFAULT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `description`, `unitPrice`, `quantityInStock`, `image`, `category`) VALUES
(67, 'skine care', 'best solution for a unique color skin ', '258', 40, './images/pexels-alesia-kozik-7795765.jpg', 'Skin care'),
(68, 'sun shine ', 'take care of your self and smell always freshly ', '43', 27, './images/pexels-alesia-kozik-7796460.jpg', 'Skin care'),
(69, 'shampoo ', 'take care of your self and smell always freshly ', '35', 41, './images/pexels-alesia-kozik-7795451.jpg', 'Skin care'),
(70, 'perfume ', 'take care of your self and smell always freshly ', '56', 16, './images/pexels-anastasiya-lobanovskaya-4110341.jpg', 'partums'),
(71, 'perfume ', 'take care of your self and smell always freshly ', '98', 55, './images/pexels-pnw-production-8490110.jpg', 'partums'),
(72, 'perfume ', 'take care of your self and smell always freshly ', '44', 8, './images/pexels-julia-isaeva-9147987.jpg', 'partums'),
(73, 'sun shine ', 'best solution for a unique color skin ', '39', 15, './images/pexels-ksenia-chernaya-8054394.jpg', 'Skin care'),
(74, 'sun shine ', 'best solution for a unique color skin ', '25', 27, './images/pexels-daria-shevtsova-1619488.jpg', 'Skin care'),
(75, 'perfume nights ', 'take care of your self and smell always freshly ', '29', 34, './images/pexels-yusuf-arslan-3640668.jpg', 'partums'),
(76, 'perfume day ', 'for both men and women ', '114', 15, './images/pexels-julia-isaeva-9148082.jpg', 'partums'),
(77, 'perfume every day ', 'take care of your self and smell always freshly ', '27', 337, './images/pexels-mareefe-932577.jpg', 'partums'),
(78, 'shampoo ', 'best shampoo for all types of hear \r\n', '879', 98, './images/pexels-alesia-kozik-7797449.jpg', 'Skin care');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerCode`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderID`,`productID`),
  ADD KEY `FK_commande_dans` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `FK_commander` (`customerCode`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `FK_Contient` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `FK_commande_dans` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_commander` FOREIGN KEY (`customerCode`) REFERENCES `customers` (`customerCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
