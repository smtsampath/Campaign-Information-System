-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2011 at 10:32 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE IF NOT EXISTS `campaign` (
  `Campaignid` varchar(5) NOT NULL,
  `Campaign_name` varchar(100) NOT NULL,
  `Campaign_type` varchar(100) NOT NULL,
  `Campaign_budget` double NOT NULL,
  `Campaign_description` text NOT NULL,
  PRIMARY KEY (`Campaignid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`Campaignid`, `Campaign_name`, `Campaign_type`, `Campaign_budget`, `Campaign_description`) VALUES
('CA001', 'Life Insurance Campaign', 'Television', 600000, 'All Television channels are included');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `Groupid` varchar(4) NOT NULL,
  `Group_name` varchar(30) NOT NULL,
  PRIMARY KEY (`Groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`Groupid`, `Group_name`) VALUES
('GP01', 'ABC'),
('GP02', 'XYZ'),
('GP03', 'PQR'),
('GP04', 'NYP'),
('GP05', 'DEF');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Productid` varchar(5) NOT NULL,
  `Product_name` varchar(100) NOT NULL,
  `Product_type` varchar(100) NOT NULL,
  `Product_price` double NOT NULL,
  `Product_description` text NOT NULL,
  PRIMARY KEY (`Productid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Productid`, `Product_name`, `Product_type`, `Product_price`, `Product_description`) VALUES
('PD001', 'Divithilina', 'Life Insurance', 5000, 'This plan is designed to provide  considerable life insurance cover for an affordable premium, whilst rewarding the Life assured with  maturity  proceeds quite in excess of what he/she has invested'),
('PD002', 'Fire Policy', 'Corporate Insurance', 25000, 'This Policy is issued to cover the stocks on a monthly declaration basis. This means that, since the stocks tend to move and their values tend to fluctuate, the premium is charged at inception on a 75% basis. The annual premium is finally adjusted at the end of 12 months on the basis of the monthly stock figures declared by the insured and any excess premium is refundable or any additional premium is charged to the insured.');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `Salesid` int(11) NOT NULL AUTO_INCREMENT,
  `Campaignid` varchar(5) NOT NULL,
  `Productid` varchar(5) NOT NULL,
  `Starting_date` varchar(15) NOT NULL,
  `Ending_date` varchar(15) NOT NULL,
  `Estimated_sales` int(5) NOT NULL,
  `Estimated_budget` double NOT NULL,
  `Achived_sales` int(5) NOT NULL,
  `Achived_budget` double NOT NULL,
  PRIMARY KEY (`Salesid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Salesid`, `Campaignid`, `Productid`, `Starting_date`, `Ending_date`, `Estimated_sales`, `Estimated_budget`, `Achived_sales`, `Achived_budget`) VALUES
(1, 'CA001', 'PD001', 'May-01-2011', 'May-12-2011', 100, 500000, 30, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Userid` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  `Groupid` varchar(4) NOT NULL DEFAULT '0',
  `Dateofjoin` date NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  PRIMARY KEY (`Userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Userid`, `Username`, `Password`, `Admin`, `Groupid`, `Dateofjoin`, `Firstname`, `Lastname`, `Address`, `Email`, `Mobile`) VALUES
(1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, '', '2011-05-08', 'S. M. Thushara', 'Sampath', '24/20, Balapokuna Place, Kirulapona, Colombo - 06', 'smtsampath@gmail.com', '+94787053744'),
(3, 'nuwanpradeepa', 'f7560dd79cc37f037aab66663e96a7ffbe8bf92c', 0, 'GP03', '2011-05-29', 'H.S. Nuwan', 'Pradeepa', 'Godagama Rd, Godagama', 'npradeepa@gmail.com', '+94779477814'),
(4, 'sudarakagamage', '6b5775d9971de3a78891e4436f5ee30eacf2d41c', 0, 'GP04', '2011-05-29', 'Sameera', 'Gamage', 'Galle', 'sameera@yahoo.com', '+94757053755'),
(5, 'sgkaruna', '8d4d46ea3ab7456e27356bfcceaa7e457c1f7a37', 0, 'GP03', '2011-05-29', 'Sajitha Gihan', 'Karunagoda', 'Rajagiriya', 'sgkarunagoda@live.com', '+94112433873');
