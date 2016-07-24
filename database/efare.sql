-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2016 at 09:06 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `efare`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `B_ID` int(11) NOT NULL AUTO_INCREMENT,
  `B_password` varchar(50) NOT NULL,
  `B_c_ID` int(11) NOT NULL,
  `B_cpnumber` varchar(11) NOT NULL,
  `B_username` varchar(30) NOT NULL,
  `B_access_token` varchar(100) NOT NULL,
  PRIMARY KEY (`B_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`B_ID`, `B_password`, `B_c_ID`, `B_cpnumber`, `B_username`, `B_access_token`) VALUES
(1, 'b993e4526238d62f6b1b90e605532ff8', 2, '9268498947', 'allan', 'H4S-7CuXmGRFdpT_z6Lyuwsky0Gy1MQNY5d9CZ217zI'),
(4, '40f8d706ea7595c7bd3a19e7e9b00964', 22, '9167321875', 'luz', 'eg6dl4GQDjz43QXavoly4fuUfNuK_wv3RIX18qEsMqE');

-- --------------------------------------------------------

--
-- Table structure for table `bus_company`
--

CREATE TABLE IF NOT EXISTS `bus_company` (
  `BC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BC_name` varchar(30) NOT NULL,
  `BC_password` varchar(50) NOT NULL,
  `BC_manager` varchar(40) NOT NULL,
  PRIMARY KEY (`BC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bus_company`
--

INSERT INTO `bus_company` (`BC_ID`, `BC_name`, `BC_password`, `BC_manager`) VALUES
(2, 'Jayross', '5552213ca4e076e9e14e3d0584c75f53', 'Bin Ladden');

-- --------------------------------------------------------

--
-- Table structure for table `commuter`
--

CREATE TABLE IF NOT EXISTS `commuter` (
  `C_ID` int(11) NOT NULL AUTO_INCREMENT,
  `C_password` varchar(50) NOT NULL,
  `C_firstname` varchar(15) NOT NULL,
  `C_lastname` varchar(15) NOT NULL,
  `C_cpnumber` varchar(11) NOT NULL,
  `C_access_token` varchar(100) NOT NULL,
  `C_points` int(20) NOT NULL,
  `C_username` varchar(30) NOT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `commuter`
--

INSERT INTO `commuter` (`C_ID`, `C_password`, `C_firstname`, `C_lastname`, `C_cpnumber`, `C_access_token`, `C_points`, `C_username`) VALUES
(14, '61a3dd5599a14ade5de91c212073acc2', 'Matt Jensen', 'Colon', '9177761137', 'QdIw5JDtSp3OVOIoDZazjI1tMzwEyRP0hAOzpvoPDnE', 0, 'jayjay'),
(20, '7b774effe4a349c6dd82ad4f4f21d34c', 'gregory', 'u', '9268498947', 'H4S-7CuXmGRFdpT_z6Lyuwsky0Gy1MQNY5d9CZ217zI', 0, 'u'),
(22, '40f8d706ea7595c7bd3a19e7e9b00964', 'luzer', 'luzerlastname', '9167321875', 'eg6dl4GQDjz43QXavoly4fuUfNuK_wv3RIX18qEsMqE', 0, 'hhh'),
(23, 'de15806759cb3732f16d4f49ff58be01', 'juris', 'gavilsan', '9268498947', '8e0QV1Z_qB1DXJNdMORP9d8xXsoalGWNDZTYAxnw_q4', 0, 'juris'),
(24, '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `L_ID` int(11) NOT NULL AUTO_INCREMENT,
  `L_name` varchar(25) NOT NULL,
  `latitude` double(8,4) NOT NULL,
  `longitude` double(8,4) NOT NULL,
  PRIMARY KEY (`L_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`L_ID`, `L_name`, `latitude`, `longitude`) VALUES
(2, 'Guandalupe', 14.5665, 121.0454),
(3, 'Shaw Boulevard', 14.5822, 121.0543);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `R_b_ID` int(11) NOT NULL,
  `R_l_ID` int(11) NOT NULL,
  `R_ID` int(11) NOT NULL AUTO_INCREMENT,
  `R_name` varchar(30) NOT NULL,
  PRIMARY KEY (`R_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`R_b_ID`, `R_l_ID`, `R_ID`, `R_name`) VALUES
(1, 2, 1, 'SM Fairview'),
(2, 3, 2, 'Malanday');

-- --------------------------------------------------------

--
-- Table structure for table `shortcode`
--

CREATE TABLE IF NOT EXISTS `shortcode` (
  `shortcode` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shortcode`
--

INSERT INTO `shortcode` (`shortcode`) VALUES
(41941000007);

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE IF NOT EXISTS `stops` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
  `S_R_ID` int(11) NOT NULL,
  `S_Pickup_ID` int(11) NOT NULL,
  `S_Dest_ID` int(11) NOT NULL,
  `S_Fare` int(11) NOT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`S_ID`, `S_R_ID`, `S_Pickup_ID`, `S_Dest_ID`, `S_Fare`) VALUES
(1, 1, 2, 3, 12),
(2, 1, 3, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `T_c_ID` int(11) NOT NULL,
  `T_b_ID` int(11) NOT NULL,
  `T_price` int(11) NOT NULL,
  `T_date` date NOT NULL,
  `T_expiry_date` date NOT NULL,
  `T_pick_up` int(11) NOT NULL,
  `T_destination` int(11) NOT NULL,
  `T_status` varchar(20) NOT NULL,
  PRIMARY KEY (`T_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`T_ID`, `T_c_ID`, `T_b_ID`, `T_price`, `T_date`, `T_expiry_date`, `T_pick_up`, `T_destination`, `T_status`) VALUES
(1, 14, 1, 12, '2016-07-24', '2016-07-31', 2, 3, 'unused'),
(2, 12, 0, 12, '0000-00-00', '2016-07-24', 2, 3, 'unused'),
(10, 15, 3, 12, '2016-07-24', '2016-07-24', 2, 3, 'on_trip'),
(11, 23, 0, 12, '2016-07-24', '2016-07-24', 2, 3, 'unused'),
(12, 23, 0, 12, '2016-07-24', '2016-07-24', 2, 3, 'unused'),
(15, 20, 1, 1, '2016-07-24', '2016-07-24', 2, 3, 'on_trip');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
