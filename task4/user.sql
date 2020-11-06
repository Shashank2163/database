-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 03:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

CREATE TABLE `addproduct` (
  `image` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addproduct`
--

INSERT INTO `addproduct` (`image`, `id`, `price`) VALUES
('basketball.png', 'PRODUCT-101', '190'),
('football.png', 'PRODUCT-102', '187'),
('soccer.png', 'PRODUCT-103', '123'),
('table-tennis.png', 'PRODUCT-104', '140'),
('tennis.png', 'PRODUCT-105', '140');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`filename`) VALUES
('Screenshot (18).png'),
('Screenshot (26).png'),
('Screenshot (14).png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `admin`) VALUES
('shashank', '123', 'dfj@ergk.com', NULL),
('shashank', '1234', 'dfj@ergk.com', NULL),
('shashank', '1234', 'dfj@ergk.com', NULL),
('erty', 'ert', 'wert@dfg', NULL),
('dfb', '123', 'dfj@ergk.com', NULL),
('shashank', '123', 'dfj@ergk.com', NULL),
('dfb', 'ertyu', 'dfj@ergk.com', NULL),
('shashank', '1234', 'dfj@ergk.com', NULL),
('shashank', '1234', 'dfj@ergk.com', NULL),
('shashank', '1234', 'dfj@ergk.com', NULL),
('shashank123', '123', 'dfg@dfg', NULL),
('shashank', '123', '123@werf', NULL),
('dfb', '12', 'dfj@ergk.com', NULL),
('shashank', '123', 'dfj@ergk.com', NULL),
('sha1234', 'sha1234', 'sha@123', NULL),
('shashank11111', '12345', 'asdgm@fdzf', NULL),
('shashank678', '123', 'wert@dfg', NULL),
('shashankwewdef', '123', 'sad@errr', NULL),
('shashankwe', '123', '123@1', NULL),
('shashank123sd', '234', 'sds@sdf', NULL),
('shashank', '123', 'dffsdf@ert', NULL),
('shashank', '123', 'fdgestn@df', NULL),
('shashankdfghj', '123', 'sdnjynr@fgfh', NULL),
('shashank', '1234', 'j.j@zfg', NULL),
('shashank8765', '123', 'rtumrttttu@asdat', NULL),
('shashank', '123', 'ff@gamdm', NULL),
('shashank', '123', '1234567@dfghj', NULL),
('test', 'test', 'test@test.io', NULL),
('admin', 'admin', 'admin', 'admin'),
('rahul', '1234', 'rahul@111', ''),
('ragh', 'ragh', 'ragh@ragh', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
