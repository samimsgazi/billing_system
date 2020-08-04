-- phpMyAdmin SQL Dump
-- version 4.2.0
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2035 at 12:48 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `billing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_master`
--

CREATE TABLE IF NOT EXISTS `company_master` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `dist` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL,
  `ph_no` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `servcetax` varchar(100) NOT NULL,
  `CST` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `company_master`
--

INSERT INTO `company_master` (`id`, `name`, `tag_name`, `address`, `city`, `dist`, `pin`, `ph_no`, `email`, `servcetax`, `CST`, `image`) VALUES
(3, 'VIVA', 'A new gen', 'kolkata', 'kolkata', 'kolkata', 700029, 978698555, 'ad@gmail.com', 'SJK234', '123', 'image/1455961100_Chrysanthemum.jpg'),
(4, 'TEST COMP', 'TC', 'KAIKHALI', 'KOLKATA', 'KOLKATA', 700136, 2147483647, 'optimumsoln@gmail.com', '', '', 'image/1485603257_');

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE IF NOT EXISTS `customer_master` (
`id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Dist` varchar(255) NOT NULL,
  `cust_pincode` varchar(6) DEFAULT NULL,
  `cust_phno` varchar(50) NOT NULL,
  `cust_mail` varchar(100) NOT NULL,
  `cust_vat` varchar(50) NOT NULL,
  `cust_servtaxno` varchar(50) NOT NULL,
  `cust_cst` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `customer_master`
--

INSERT INTO `customer_master` (`id`, `cust_name`, `Code`, `address1`, `City`, `Dist`, `cust_pincode`, `cust_phno`, `cust_mail`, `cust_vat`, `cust_servtaxno`, `cust_cst`) VALUES
(17, 'raja das', '', 'sds', 'kolkata', 'kolkata', '700019', '9999999', 'dd@dada.com', 'asdasd', 'asdasd', 'sadsad');

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

CREATE TABLE IF NOT EXISTS `employee_master` (
`id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `joining` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Dist` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `ph` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee_master`
--

INSERT INTO `employee_master` (`id`, `Name`, `joining`, `address`, `City`, `Dist`, `pincode`, `ph`, `mail`) VALUES
(1, 'ujjal ghosh', '2016-02-25', 'kolkata', 'amtala', '24pgs', 743398, 2147483647, 'ujjaal@rediffmail.com'),
(2, 'aditi roy', '2016-02-08', '1/C MC road', 'santragachi', 'howrah', 700001, 2147483647, 'meaditi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment_trns`
--

CREATE TABLE IF NOT EXISTS `payment_trns` (
`id` int(11) NOT NULL,
  `Invoice` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `Rcv_amt` double NOT NULL,
  `Pay_mode` varchar(100) NOT NULL,
  `Chque_no` varchar(50) NOT NULL,
  `Chque_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `payment_trns`
--

INSERT INTO `payment_trns` (`id`, `Invoice`, `Date`, `Rcv_amt`, `Pay_mode`, `Chque_no`, `Chque_date`) VALUES
(22, 'VI/S/000002', '1970-01-01', 122, 'Cash', '', '1970-01-01'),
(24, 'VI/S/000002', '2016-02-02', 0, 'Cheque', '', '2016-02-26'),
(25, 'VI/S/000002', '2016-02-02', 30, 'Cheque', '', '2016-02-26'),
(26, 'VI/S/000002', '2016-02-26', 20, 'Cheque', '123', '2016-02-24'),
(27, 'VI/S/000002', '2016-02-25', 28, 'Cheque', '', '2016-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `product_bill_trans`
--

CREATE TABLE IF NOT EXISTS `product_bill_trans` (
`id` int(11) NOT NULL,
  `SlNo` int(11) NOT NULL,
  `serv_bill_id` varchar(255) NOT NULL,
  `serv_id` varchar(255) NOT NULL,
  `DoBy` varchar(200) NOT NULL,
  `serv_rate` varchar(255) NOT NULL,
  `serv_qty` varchar(255) NOT NULL,
  `serv_amt` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_bill_trans`
--

INSERT INTO `product_bill_trans` (`id`, `SlNo`, `serv_bill_id`, `serv_id`, `DoBy`, `serv_rate`, `serv_qty`, `serv_amt`) VALUES
(1, 0, 'VI/P/000001', 'RAM', 'ujjal ghosh', '100', '2', '200'),
(2, 0, 'VI/P/000001', 'water', 'ujjal ghosh', '34', '3', '102');

-- --------------------------------------------------------

--
-- Table structure for table `prod_bill_master`
--

CREATE TABLE IF NOT EXISTS `prod_bill_master` (
`id` int(11) NOT NULL,
  `serv_bill_no` varchar(100) NOT NULL,
  `bill_date` date NOT NULL,
  `cust_id` varchar(50) NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `Address1` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Dist` varchar(255) NOT NULL,
  `PinCode` varchar(255) NOT NULL,
  `CellNo` varchar(255) NOT NULL,
  `tax_id` varchar(50) NOT NULL,
  `taxPer` double NOT NULL,
  `tax_amt` varchar(100) NOT NULL,
  `total_amt` varchar(100) NOT NULL,
  `Net_Amt` int(11) NOT NULL,
  `In_Word` varchar(255) NOT NULL,
  `referns` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `prod_bill_master`
--

INSERT INTO `prod_bill_master` (`id`, `serv_bill_no`, `bill_date`, `cust_id`, `CustomerName`, `Address1`, `City`, `Dist`, `PinCode`, `CellNo`, `tax_id`, `taxPer`, `tax_amt`, `total_amt`, `Net_Amt`, `In_Word`, `referns`) VALUES
(1, 'VI/P/000001', '2016-03-03', '', 'avish ghosh', '2/A br Road', 'Behala', 'kolkata', '', '978698555', 'Ssc', 2, '6.04', '302', 308, 'Three Hundred and Eight only ', '------Referance------');

-- --------------------------------------------------------

--
-- Table structure for table `prod_group`
--

CREATE TABLE IF NOT EXISTS `prod_group` (
`prgroup_id` int(11) NOT NULL,
  `prod_group_name` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `prod_group`
--

INSERT INTO `prod_group` (`prgroup_id`, `prod_group_name`, `Code`) VALUES
(3, 'Delux Ac', 'PG0001'),
(4, 'Non Ac', 'PG0002');

-- --------------------------------------------------------

--
-- Table structure for table `prod_master`
--

CREATE TABLE IF NOT EXISTS `prod_master` (
`prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `prgroup_id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `madeby` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `prod_master`
--

INSERT INTO `prod_master` (`prod_id`, `prod_name`, `Quantity`, `prgroup_id`, `date`, `madeby`) VALUES
(1, 'iron', 0, '3', '0000-00-00', ''),
(2, 'water', 0, '3', '0000-00-00', ''),
(3, 'RAM', 25, '4', '0000-00-00', ''),
(4, 'Knee message', 0, '3', '0000-00-00', ''),
(5, 'RAM', 25, '4', '0000-00-00', ''),
(6, 'RAM', 12, '3', '0000-00-00', ''),
(7, 'RAM', 50, '3', '0000-00-00', ''),
(8, 'RAM', 25, '3', '2016-03-03', 'Ziony'),
(9, 'asas', 12, '4', '2016-03-04', '');

-- --------------------------------------------------------

--
-- Table structure for table `service_bill_trans`
--

CREATE TABLE IF NOT EXISTS `service_bill_trans` (
`id` int(11) NOT NULL,
  `SlNo` int(11) NOT NULL,
  `serv_bill_id` varchar(255) NOT NULL,
  `serv_id` varchar(255) NOT NULL,
  `DoBy` varchar(200) NOT NULL,
  `serv_rate` varchar(255) NOT NULL,
  `serv_qty` varchar(255) NOT NULL,
  `serv_amt` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `service_bill_trans`
--

INSERT INTO `service_bill_trans` (`id`, `SlNo`, `serv_bill_id`, `serv_id`, `DoBy`, `serv_rate`, `serv_qty`, `serv_amt`) VALUES
(1, 0, 'VI/S/000001', 'Asas', '', '125', '2', '250'),
(5, 0, 'VI/S/000005', 'aaaa', '', '100', '2', '200'),
(7, 0, 'VI/S/000007', '-------Select Srvice------', '', '100', '3', '300'),
(8, 0, 'VI/S/000007', '-------Select Srvice------', '', '100', '3', '300'),
(9, 0, 'VI/S/000007', '-------Select Srvice------', '', '100', '3', '300'),
(10, 0, 'VI/S/000007', '-------Select Srvice------', '', '100', '3', '300'),
(11, 0, 'VI/S/000007', '-------Select Srvice------', '', '100', '3', '300'),
(12, 0, 'VI/S/000008', '-------Select Srvice------', '', '100', '2', '200'),
(13, 0, 'VI/S/000009', '-------Select Srvice------', '', '100', '2', '200'),
(14, 0, 'VI/S/000009', '-------Select Srvice------', '', '100', '2', '200'),
(15, 0, 'VI/S/000009', '-------Select Srvice------', '', '100', '2', '200'),
(16, 0, 'VI/S/000010', '-------Select Srvice------', '', '100', '2', '200'),
(17, 0, 'VI/S/000010', '-------Select Srvice------', '', '100', '2', '200'),
(18, 0, 'VI/S/000010', '-------Select Srvice------', '', '100', '2', '200'),
(19, 0, 'VI/S/000010', '-------Select Srvice------', '', '100', '2', '200'),
(20, 0, 'VI/S/000010', '-------Select Srvice------', '', '100', '2', '200'),
(21, 0, 'VI/S/000010', '-------Select Srvice------', '', '100', '2', '200'),
(25, 0, 'VI/S/000011', 'Asas', '', '100', '2', '200'),
(26, 0, 'VI/S/000012', 'Asas', '', '100', '3', '300'),
(27, 0, 'VI/S/000013', 'Asas', '', '100', '2', '200'),
(28, 0, 'VI/S/000014', '-------Select Srvice------', '', '100', '3', '300'),
(29, 0, 'VI/S/000001', '-------Select Srvice------', '', '100', '2', '200'),
(30, 0, 'VI/S/000002', '-------Select Srvice------', '', '34', '5', '170'),
(31, 0, 'VI/S/000003', '-------Select Srvice------', '', '100', '5', '500'),
(32, 0, 'VI/S/000004', 'hair cut', '', '100', '2', '200'),
(33, 0, 'VI/S/000005', 'Asas', 'Array', '100', '2', '200'),
(34, 0, 'VI/S/000005', 'hair cut', 'Array', '100', '1', '100'),
(37, 0, 'VI/S/000007', 'hair cut', 'ujjal ghosh', '100', '2', '200'),
(38, 0, 'VI/S/000007', 'aaaa', 'aditi roy', '100', '3', '300'),
(39, 0, 'VI/S/000006', 'Asas', '', '100', '2', '200'),
(40, 0, 'VI/S/000006', 'Asas', '', '100', '2', '200'),
(41, 0, 'VI/S/000006', 'Asas', '', '100', '1', '100');

-- --------------------------------------------------------

--
-- Table structure for table `service_master`
--

CREATE TABLE IF NOT EXISTS `service_master` (
`serv_id` int(11) NOT NULL,
  `serv_details` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `serv_rate` int(50) NOT NULL,
  `Emp_per` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `service_master`
--

INSERT INTO `service_master` (`serv_id`, `serv_details`, `Code`, `serv_rate`, `Emp_per`) VALUES
(5, 'Asas', 'C0001', 111, 0),
(6, 'We', 'C0001', 33, 0),
(7, 'aaaa', '', 234, 0),
(8, 'hair cut', '', 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `serv_bill_master`
--

CREATE TABLE IF NOT EXISTS `serv_bill_master` (
`id` int(11) NOT NULL,
  `serv_bill_no` varchar(100) NOT NULL,
  `bill_date` date NOT NULL,
  `cust_id` varchar(50) NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `Address1` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Dist` varchar(255) NOT NULL,
  `PinCode` varchar(255) NOT NULL,
  `CellNo` varchar(255) NOT NULL,
  `tax_id` varchar(50) NOT NULL,
  `taxPer` double NOT NULL,
  `tax_amt` varchar(100) NOT NULL,
  `total_amt` varchar(100) NOT NULL,
  `Net_Amt` int(11) NOT NULL,
  `In_Word` varchar(255) NOT NULL,
  `referns` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `serv_bill_master`
--

INSERT INTO `serv_bill_master` (`id`, `serv_bill_no`, `bill_date`, `cust_id`, `CustomerName`, `Address1`, `City`, `Dist`, `PinCode`, `CellNo`, `tax_id`, `taxPer`, `tax_amt`, `total_amt`, `Net_Amt`, `In_Word`, `referns`) VALUES
(26, 'VI/S/000001', '2016-02-23', '', 'avish ghosh', '2/A br Road', 'Behala', 'kolkata', '', '978698555', 'Null', 0, '0', '200', 200, 'two hundred ', ''),
(27, 'VI/S/000002', '2016-02-23', '', 'avish ghosh', '2/A br Road', 'Behala', 'kolkata', '', '978698555', 'Null', 0, '0', '170', 170, 'one hundred and Seventy only ', ''),
(28, 'VI/S/000003', '2016-02-21', '', 'avish ghosh', '2/A br Road', 'Behala', 'kolkata', '', '978698555', 'Null', 0, '0', '500', 500, 'five hundred ', ''),
(29, 'VI/S/000004', '2016-02-23', '', 'avish ghosh', '2/A br Road', 'Behala', 'kolkata', '', '978698555', 'Null', 0, '0', '200', 200, 'two hundred ', ''),
(30, 'VI/S/000005', '2016-02-25', '', 'avish ghosh', '2/A br Road', 'Behala', 'kolkata', '', '978698555', 'Service Tax @ 4.2%', 4.2, '12.6', '300', 313, 'three hundred and thirteen only ', ''),
(31, 'VI/S/000006', '2016-02-25', '', 'avish ghosh', '2/A br Road', 'Behala', 'kolkata', '', '978698555', 'Service Tax @ 4.2%', 4.2, '12.6', '300', 313, 'three hundred and thirteen only ', ''),
(32, 'VI/S/000007', '2016-02-25', '', 'avish ghosh', '2/A br Road', 'Behala', 'kolkata', '', '978698555', 'Service Tax @ 4.2%', 4.2, '21', '500', 521, 'five hundred and Twenty one only ', 'ujjal ghosh');

-- --------------------------------------------------------

--
-- Table structure for table `stock_master`
--

CREATE TABLE IF NOT EXISTS `stock_master` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `Name` varchar(200) NOT NULL,
  `madeBy` varchar(200) NOT NULL,
  `serialNo` varchar(50) NOT NULL,
  `batchNo` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Accountin_year` varchar(100) NOT NULL,
  `Opening_Stock` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stock_master`
--

INSERT INTO `stock_master` (`id`, `date`, `Name`, `madeBy`, `serialNo`, `batchNo`, `Quantity`, `Accountin_year`, `Opening_Stock`) VALUES
(1, '2016-02-26', 'lamp', 'philips', 'V215s364', '125463', 50, '', 0),
(2, '2016-03-02', 'dalisay', 'sdd', 'edfe33', 'c24333', 12, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tax_master`
--

CREATE TABLE IF NOT EXISTS `tax_master` (
`tax_id` int(11) NOT NULL,
  `tax_details` varchar(255) NOT NULL,
  `taxrate` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tax_master`
--

INSERT INTO `tax_master` (`tax_id`, `tax_details`, `taxrate`) VALUES
(4, 'Service Tax @ 4.2%', '4.2'),
(5, 'Ssc', '2'),
(6, 'VAT @5%', '5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'doraemon', 'dora123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_master`
--
ALTER TABLE `company_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_master`
--
ALTER TABLE `employee_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_trns`
--
ALTER TABLE `payment_trns`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_bill_trans`
--
ALTER TABLE `product_bill_trans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod_bill_master`
--
ALTER TABLE `prod_bill_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod_group`
--
ALTER TABLE `prod_group`
 ADD PRIMARY KEY (`prgroup_id`);

--
-- Indexes for table `prod_master`
--
ALTER TABLE `prod_master`
 ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `service_bill_trans`
--
ALTER TABLE `service_bill_trans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_master`
--
ALTER TABLE `service_master`
 ADD PRIMARY KEY (`serv_id`);

--
-- Indexes for table `serv_bill_master`
--
ALTER TABLE `serv_bill_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_master`
--
ALTER TABLE `stock_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_master`
--
ALTER TABLE `tax_master`
 ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_master`
--
ALTER TABLE `company_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `employee_master`
--
ALTER TABLE `employee_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_trns`
--
ALTER TABLE `payment_trns`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `product_bill_trans`
--
ALTER TABLE `product_bill_trans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prod_bill_master`
--
ALTER TABLE `prod_bill_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prod_group`
--
ALTER TABLE `prod_group`
MODIFY `prgroup_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prod_master`
--
ALTER TABLE `prod_master`
MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `service_bill_trans`
--
ALTER TABLE `service_bill_trans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `service_master`
--
ALTER TABLE `service_master`
MODIFY `serv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `serv_bill_master`
--
ALTER TABLE `serv_bill_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `stock_master`
--
ALTER TABLE `stock_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tax_master`
--
ALTER TABLE `tax_master`
MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
