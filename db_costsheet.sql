-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 19, 2019 at 02:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_costsheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `t001_liner`
--

CREATE TABLE `t001_liner` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t001_liner`
--

INSERT INTO `t001_liner` (`id`, `Name`) VALUES
(1, 'KMTC');

-- --------------------------------------------------------

--
-- Table structure for table `t002_shipper`
--

CREATE TABLE `t002_shipper` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t002_shipper`
--

INSERT INTO `t002_shipper` (`id`, `Name`) VALUES
(1, 'GELORA DJAJA, PT');

-- --------------------------------------------------------

--
-- Table structure for table `t003_chargecode`
--

CREATE TABLE `t003_chargecode` (
  `id` int(11) NOT NULL,
  `Charge_Code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t003_chargecode`
--

INSERT INTO `t003_chargecode` (`id`, `Charge_Code`) VALUES
(1, 'OCEAN FREIGHT'),
(2, 'AFS'),
(3, 'DOC FEE'),
(4, 'SCF'),
(5, 'SURRENDER BL');

-- --------------------------------------------------------

--
-- Table structure for table `t004_vendor`
--

CREATE TABLE `t004_vendor` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t004_vendor`
--

INSERT INTO `t004_vendor` (`id`, `Name`) VALUES
(1, 'VENDOR A'),
(2, 'VENDOR B'),
(3, 'VENDOR C'),
(4, 'VENDOR D'),
(5, 'VENDOR E');

-- --------------------------------------------------------

--
-- Table structure for table `t096_employees`
--

CREATE TABLE `t096_employees` (
  `EmployeeID` int(11) NOT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `TitleOfCourtesy` varchar(25) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `HireDate` datetime DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Region` varchar(15) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `HomePhone` varchar(24) DEFAULT NULL,
  `Extension` varchar(4) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Notes` longtext,
  `ReportsTo` int(11) DEFAULT NULL,
  `Password` varchar(50) NOT NULL DEFAULT '',
  `UserLevel` int(11) DEFAULT NULL,
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Activated` enum('Y','N') NOT NULL DEFAULT 'N',
  `Profile` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t096_employees`
--

INSERT INTO `t096_employees` (`EmployeeID`, `LastName`, `FirstName`, `Title`, `TitleOfCourtesy`, `BirthDate`, `HireDate`, `Address`, `City`, `Region`, `PostalCode`, `Country`, `HomePhone`, `Extension`, `Email`, `Photo`, `Notes`, `ReportsTo`, `Password`, `UserLevel`, `Username`, `Activated`, `Profile`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', -1, 'admin', 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t097_userlevels`
--

CREATE TABLE `t097_userlevels` (
  `userlevelid` int(11) NOT NULL,
  `userlevelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t097_userlevels`
--

INSERT INTO `t097_userlevels` (`userlevelid`, `userlevelname`) VALUES
(-2, 'Anonymous'),
(-1, 'Administrator'),
(0, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `t098_userlevelpermissions`
--

CREATE TABLE `t098_userlevelpermissions` (
  `userlevelid` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t098_userlevelpermissions`
--

INSERT INTO `t098_userlevelpermissions` (`userlevelid`, `tablename`, `permission`) VALUES
(-2, '{3F2C2F89-6B59-4B45-9D22-320ECC8F96AA}t001_liner', 0),
(-2, '{3F2C2F89-6B59-4B45-9D22-320ECC8F96AA}t096_employees', 0),
(-2, '{3F2C2F89-6B59-4B45-9D22-320ECC8F96AA}t097_userlevels', 0),
(-2, '{3F2C2F89-6B59-4B45-9D22-320ECC8F96AA}t098_userlevelpermissions', 0),
(-2, '{3F2C2F89-6B59-4B45-9D22-320ECC8F96AA}t099_audittrail', 0),
(0, '{3F2C2F89-6B59-4B45-9D22-320ECC8F96AA}t001_liner', 0),
(0, '{3F2C2F89-6B59-4B45-9D22-320ECC8F96AA}t096_employees', 0),
(0, '{3F2C2F89-6B59-4B45-9D22-320ECC8F96AA}t097_userlevels', 0),
(0, '{3F2C2F89-6B59-4B45-9D22-320ECC8F96AA}t098_userlevelpermissions', 0),
(0, '{3F2C2F89-6B59-4B45-9D22-320ECC8F96AA}t099_audittrail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t099_audittrail`
--

CREATE TABLE `t099_audittrail` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `script` varchar(80) DEFAULT NULL,
  `user` varchar(80) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `table` varchar(80) DEFAULT NULL,
  `field` varchar(80) DEFAULT NULL,
  `keyvalue` longtext,
  `oldvalue` longtext,
  `newvalue` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t099_audittrail`
--

INSERT INTO `t099_audittrail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
(1, '2019-07-19 16:49:32', '/costsheet/login.php', 'admin', 'login', '::1', '', '', '', ''),
(2, '2019-07-19 16:51:05', '/costsheet/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(3, '2019-07-19 16:51:07', '/costsheet/login.php', 'admin', 'login', '::1', '', '', '', ''),
(4, '2019-07-19 16:52:04', '/costsheet/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(5, '2019-07-19 16:52:06', '/costsheet/login.php', 'admin', 'login', '::1', '', '', '', ''),
(6, '2019-07-19 18:23:28', '/costsheet/t004_vendoredit.php', '1', 'U', 't004_vendor', 'Name', '1', 'VENDOR X', 'VENDOR A'),
(7, '2019-07-19 18:23:35', '/costsheet/t004_vendoradd.php', '1', 'A', 't004_vendor', 'Name', '2', '', 'VENDOR B'),
(8, '2019-07-19 18:23:35', '/costsheet/t004_vendoradd.php', '1', 'A', 't004_vendor', 'id', '2', '', '2'),
(9, '2019-07-19 18:23:42', '/costsheet/t004_vendoradd.php', '1', 'A', 't004_vendor', 'Name', '3', '', 'VENDOR C'),
(10, '2019-07-19 18:23:42', '/costsheet/t004_vendoradd.php', '1', 'A', 't004_vendor', 'id', '3', '', '3'),
(11, '2019-07-19 18:23:47', '/costsheet/t004_vendoradd.php', '1', 'A', 't004_vendor', 'Name', '4', '', 'VENDOR D'),
(12, '2019-07-19 18:23:47', '/costsheet/t004_vendoradd.php', '1', 'A', 't004_vendor', 'id', '4', '', '4'),
(13, '2019-07-19 18:23:53', '/costsheet/t004_vendoradd.php', '1', 'A', 't004_vendor', 'Name', '5', '', 'VENDOR E'),
(14, '2019-07-19 18:23:53', '/costsheet/t004_vendoradd.php', '1', 'A', 't004_vendor', 'id', '5', '', '5'),
(15, '2019-07-19 19:25:36', '/costsheet/logout.php', 'admin', 'logout', '::1', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t101_costsheethead`
--

CREATE TABLE `t101_costsheethead` (
  `id` int(11) NOT NULL,
  `liner_id` int(11) NOT NULL,
  `no_bl` varchar(50) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `top_1` enum('PREPAID','POSTPAID') NOT NULL DEFAULT 'PREPAID',
  `vol` tinyint(4) NOT NULL DEFAULT '1',
  `cont` enum('20','40') NOT NULL DEFAULT '20',
  `no_ref` varchar(50) NOT NULL,
  `vsl_voy` varchar(50) NOT NULL,
  `pol_pod` varchar(50) NOT NULL,
  `top_2` enum('PREPAID','POSTPAID') NOT NULL DEFAULT 'PREPAID',
  `no_cont` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t102_costsheetdetail`
--

CREATE TABLE `t102_costsheetdetail` (
  `id` int(11) NOT NULL,
  `costsheethead_id` int(11) NOT NULL,
  `chargecode_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `ptl_amount` float(14,2) NOT NULL DEFAULT '0.00',
  `ptl_total` float(14,2) NOT NULL DEFAULT '0.00',
  `rfc_amount` float(14,2) NOT NULL DEFAULT '0.00',
  `rfc_total` float(14,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t001_liner`
--
ALTER TABLE `t001_liner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t002_shipper`
--
ALTER TABLE `t002_shipper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t003_chargecode`
--
ALTER TABLE `t003_chargecode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t004_vendor`
--
ALTER TABLE `t004_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t096_employees`
--
ALTER TABLE `t096_employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `t097_userlevels`
--
ALTER TABLE `t097_userlevels`
  ADD PRIMARY KEY (`userlevelid`);

--
-- Indexes for table `t098_userlevelpermissions`
--
ALTER TABLE `t098_userlevelpermissions`
  ADD PRIMARY KEY (`userlevelid`,`tablename`);

--
-- Indexes for table `t099_audittrail`
--
ALTER TABLE `t099_audittrail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t101_costsheethead`
--
ALTER TABLE `t101_costsheethead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t102_costsheetdetail`
--
ALTER TABLE `t102_costsheetdetail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t001_liner`
--
ALTER TABLE `t001_liner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t002_shipper`
--
ALTER TABLE `t002_shipper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t003_chargecode`
--
ALTER TABLE `t003_chargecode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t004_vendor`
--
ALTER TABLE `t004_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t096_employees`
--
ALTER TABLE `t096_employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t099_audittrail`
--
ALTER TABLE `t099_audittrail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t101_costsheethead`
--
ALTER TABLE `t101_costsheethead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t102_costsheetdetail`
--
ALTER TABLE `t102_costsheetdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
