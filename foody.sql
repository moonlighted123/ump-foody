-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 05:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foody`
--

-- --------------------------------------------------------

--
-- Table structure for table `amounts`
--

CREATE TABLE `amounts` (
  `id` int(50) NOT NULL,
  `total` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `average` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amounts`
--

INSERT INTO `amounts` (`id`, `total`, `date`, `average`) VALUES
(1, 200, '2022-06-15 23:52:52', 0.00),
(2, 200, '2022-06-15 23:54:06', 0.00),
(3, 299, '2022-06-15 23:57:14', 149.50),
(4, 200, '2022-06-16 01:22:10', 50.00),
(5, 200, '2022-06-16 01:22:38', 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `calc`
--

CREATE TABLE `calc` (
  `payment` varchar(255) NOT NULL,
  `commission` int(255) NOT NULL,
  `commissionfoody` int(255) NOT NULL,
  `rider` double(10,2) NOT NULL,
  `foody` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commision`
--

CREATE TABLE `commision` (
  `id` int(50) NOT NULL,
  `hour` int(50) NOT NULL,
  `wage` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `month` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commision`
--

INSERT INTO `commision` (`id`, `hour`, `wage`, `total`, `month`) VALUES
(4, 2, 2, 0, '2022-06-15 20:40:44'),
(5, 2, 2, 0, '2022-06-15 20:40:44'),
(6, 2, 2, 4, '2022-06-15 20:40:44'),
(7, 2, 3, 6, '0000-00-00 00:00:00'),
(8, 2, 3, 6, '2022-06-15 20:42:41'),
(9, 3, 3, 9, '2022-06-16 01:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `ComplaintID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `complaint_type` varchar(50) NOT NULL,
  `datetime` timestamp NULL DEFAULT current_timestamp(),
  `complaint_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`ComplaintID`, `Name`, `description`, `complaint_type`, `datetime`, `complaint_status`) VALUES
(2, '', 'Expired                    ', 'Damaged Food', '2022-06-08 13:54:39', 'In Investigation'),
(3, '', 'lambat sampai\r\n                    ', 'Late Delivery', '2022-06-08 13:53:55', 'In Investigation'),
(5, 'mal', 'lambat', 'Late Delivery', '2022-06-15 18:20:01', 'Done'),
(14, 'Hafizh', 'Makanan Busuk', 'Damage Food', '2022-06-15 23:59:24', 'In Investigation'),
(15, 'ikhmal', 'makanan lambat', 'Late Delivery', '2022-06-16 01:24:59', 'In Investigation'),
(16, 'syafik', 'Makanan Busuk', 'Damage Food', '2022-06-19 14:49:54', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `menureg`
--

CREATE TABLE `menureg` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` double(10,2) NOT NULL,
  `picture` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menureg`
--

INSERT INTO `menureg` (`id`, `name`, `price`, `picture`) VALUES
(1, 'Nasi Lemak Ayam', 7.00, 'http://localhost/ownerlist/images/nasilemak.png'),
(2, 'Nasi Goreng ', 6.00, 'http://localhost/ownerlist/images/kampung.jpg'),
(3, 'Nasi Ayam ', 7.00, 'http://localhost/ownerlist/images/nasiayam.jpeg'),
(4, 'Mi Goreng', 6.00, 'http://localhost/ownerlist/images/mi.jpg'),
(9, 'Laksa', 6.00, 'http://localhost/ump-foody/MODULE2/images/laksa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `Orderid` int(50) NOT NULL,
  `foodname` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `orderstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`Orderid`, `foodname`, `Address`, `orderstatus`) VALUES
(1, 'Nasi Goreng Cina', 'Blok A, Dhuam College, Pekan', 'Pending'),
(2, 'Nasi Ayam', 'No 92 jalan naluri taman jaya', 'Pending'),
(3, 'Laksa', 'Block B, Dhuam College, Pekan', 'Preparing');

-- --------------------------------------------------------

--
-- Table structure for table `regdes`
--

CREATE TABLE `regdes` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `picture` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regdes`
--

INSERT INTO `regdes` (`id`, `name`, `price`, `picture`) VALUES
(6, 'ABC', 5.00, 'http://localhost/ownerlist/images/ABC.jpg'),
(7, 'Cendol', 4.00, 'http://localhost/ownerlist/images/cendol.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `regsea`
--

CREATE TABLE `regsea` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `picture` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regsea`
--

INSERT INTO `regsea` (`id`, `name`, `price`, `picture`) VALUES
(8, 'Sotong Tepung', 10.00, 'http://localhost/ownerlist/images/sotong.jpg'),
(9, 'Kerang Bakar', 8.00, 'http://localhost/ownerlist/images/kerang.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `restdetails`
--

CREATE TABLE `restdetails` (
  `id` int(50) NOT NULL,
  `restname` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `operation` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `picture` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restdetails`
--

INSERT INTO `restdetails` (`id`, `restname`, `location`, `operation`, `contact`, `picture`) VALUES
(4, 'Farouk Maju', 'no 5 jalan kampung baru', '24 Hours', '0112364738', 'http://localhost/ownerlist/uploads/mamak.jpg'),
(9, 'ACAFE', 'Lot 1,Jalan Satria,26600, 26600 Pekan, Pahang', '5.00-12.00', '01123647389', 'http://localhost/ump-foody/MODULE2/images/cendol.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `id` int(50) NOT NULL,
  `namecust` varchar(100) NOT NULL,
  `addcust` varchar(100) NOT NULL,
  `pricefood` varchar(100) NOT NULL,
  `statusfood` varchar(100) NOT NULL,
  `custcomplain` varchar(100) NOT NULL,
  `comission` varchar(100) NOT NULL,
  `qrcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`id`, `namecust`, `addcust`, `pricefood`, `statusfood`, `custcomplain`, `comission`, `qrcode`) VALUES
(1, 'Afrina', 'Blok A, Dhuam College, Pekan', 'RM 8.00', 'Complete', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phonenum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `usertype`, `address`, `phonenum`) VALUES
(1, 'admin', '1234', 'admin', 'DRB HICOM,PEKAN', '01161012890'),
(4, 'rider', '1234', 'Rider', 'DRB College, Pekan', '0123448473'),
(7, 'user', '1234', 'User', 'segamat', '1223456'),
(13, 'owner', '1234', 'owner', 'Dhuam', '0125278382');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amounts`
--
ALTER TABLE `amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calc`
--
ALTER TABLE `calc`
  ADD PRIMARY KEY (`payment`);

--
-- Indexes for table `commision`
--
ALTER TABLE `commision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`ComplaintID`);

--
-- Indexes for table `menureg`
--
ALTER TABLE `menureg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`Orderid`);

--
-- Indexes for table `regdes`
--
ALTER TABLE `regdes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regsea`
--
ALTER TABLE `regsea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restdetails`
--
ALTER TABLE `restdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amounts`
--
ALTER TABLE `amounts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commision`
--
ALTER TABLE `commision`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `ComplaintID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menureg`
--
ALTER TABLE `menureg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `Orderid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regdes`
--
ALTER TABLE `regdes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `regsea`
--
ALTER TABLE `regsea`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `restdetails`
--
ALTER TABLE `restdetails`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
