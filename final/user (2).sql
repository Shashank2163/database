-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 03:53 PM
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
('basketball.png', 'PRODUCT-101', '120'),
('tennis.png', 'PRODUCT-105', '450');

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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`username`, `image`, `id`, `price`, `quantity`) VALUES
('shashank', 'football.png', 'PRODUCT-103', '                            190', '2'),
('shashank', 'basketball.png', 'PRODUCT-101', '                            120', '1'),
('shashank', 'tennis.png', 'PRODUCT-105', '                            450', '3');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `cartdata` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `cartdata`, `date`, `status`) VALUES
(129, '', '0', '2020-10-07,Wednesday, 10:27:32am', 'succsess'),
(182, 'shashank', '200', '2020-10-07,Wednesday, 12:47:36pm', 'succsess'),
(183, 'shashank', '320', '2020-10-07,Wednesday, 12:54:04pm', 'succsess'),
(184, 'shashank', '320', '2020-10-07,Wednesday, 12:55:10pm', 'succsess'),
(185, 'shashank', '320', '2020-10-07,Wednesday, 12:55:36pm', 'succsess'),
(186, 'shashank', '520', '2020-10-07,Wednesday, 12:58:47pm', 'succsess'),
(187, 'shashank', '520', '2020-10-07,Wednesday, 12:59:08pm', 'succsess'),
(188, 'shashank', '240', '2020-10-07,Wednesday, 12:59:39pm', 'succsess'),
(189, 'shashank', '240', '2020-10-07,Wednesday, 01:00:30pm', 'succsess'),
(190, 'shashank', '320', '2020-10-07,Wednesday, 01:00:52pm', 'succsess'),
(191, 'shashank', '320', '2020-10-07,Wednesday, 01:07:00pm', 'succsess'),
(192, 'shashank', '320', '2020-10-07,Wednesday, 01:07:19pm', 'succsess'),
(193, 'shashank', '320', '2020-10-07,Wednesday, 01:09:37pm', 'succsess'),
(194, 'shashank', '320', '2020-10-07,Wednesday, 01:10:18pm', 'succsess'),
(195, 'shashank', '', '2020-10-07,Wednesday, 01:10:36pm', 'succsess'),
(196, 'shashank', '', '2020-10-07,Wednesday, 01:12:20pm', 'succsess'),
(197, 'shashank', '', '2020-10-07,Wednesday, 01:12:39pm', 'succsess'),
(198, 'shashank', '', '2020-10-07,Wednesday, 01:14:00pm', 'succsess'),
(199, 'shashank', '', '2020-10-07,Wednesday, 01:14:33pm', 'succsess'),
(200, 'shashank', '', '2020-10-07,Wednesday, 01:15:24pm', 'succsess'),
(201, 'shashank', '', '2020-10-07,Wednesday, 01:15:34pm', 'succsess'),
(202, 'shashank', '', '2020-10-07,Wednesday, 01:16:06pm', 'succsess'),
(203, 'shashank', '', '2020-10-07,Wednesday, 01:16:44pm', 'succsess'),
(204, 'shashank', '120', '2020-10-07,Wednesday, 01:17:53pm', 'succsess'),
(205, 'shashank', '120', '2020-10-07,Wednesday, 01:19:19pm', 'succsess'),
(206, 'shashank', '120', '2020-10-07,Wednesday, 01:20:09pm', 'succsess'),
(207, 'shashank', '630', '2020-10-07,Wednesday, 01:42:38pm', 'succsess'),
(208, 'shashank', '630', '2020-10-07,Wednesday, 01:43:38pm', 'succsess'),
(209, 'shashank', '630', '2020-10-07,Wednesday, 01:44:39pm', 'succsess'),
(210, 'shashank', '630', '2020-10-07,Wednesday, 01:47:06pm', 'succsess'),
(211, 'shashank', '750', '2020-10-07,Wednesday, 01:51:00pm', 'succsess'),
(212, 'shashank', '1350', '2020-10-07,Wednesday, 02:01:20pm', 'succsess'),
(213, 'shashank', '1320', '2020-10-07,Wednesday, 02:01:48pm', 'succsess'),
(214, 'shashank', '1320', '2020-10-07,Wednesday, 02:13:20pm', 'succsess'),
(215, 'shashank', '1320', '2020-10-07,Wednesday, 02:13:57pm', 'succsess'),
(216, 'shashank', '1320', '2020-10-07,Wednesday, 02:14:43pm', 'succsess'),
(217, 'shashank', '1320', '2020-10-07,Wednesday, 02:15:33pm', 'succsess'),
(218, '', '', '2020-10-07,Wednesday, 02:16:33pm', 'succsess'),
(219, 'shashank', '', '2020-10-07,Wednesday, 02:16:47pm', 'succsess'),
(220, 'shashank', '', '2020-10-07,Wednesday, 02:17:54pm', 'succsess'),
(221, 'shashank', '', '2020-10-07,Wednesday, 02:18:50pm', 'succsess'),
(222, 'shashank', '', '2020-10-07,Wednesday, 02:19:38pm', 'succsess'),
(223, 'shashank', '', '2020-10-07,Wednesday, 02:20:00pm', 'succsess'),
(224, 'shashank', '', '2020-10-07,Wednesday, 02:20:29pm', 'succsess'),
(225, 'shashank', '', '2020-10-07,Wednesday, 02:21:12pm', 'succsess'),
(226, 'shashank', '', '2020-10-07,Wednesday, 02:21:39pm', 'succsess'),
(227, 'shashank', '', '2020-10-07,Wednesday, 02:22:17pm', 'succsess'),
(228, 'shashank', '', '2020-10-07,Wednesday, 02:22:43pm', 'succsess'),
(229, 'shashank', '', '2020-10-07,Wednesday, 02:23:52pm', 'succsess'),
(230, 'shashank', '', '2020-10-07,Wednesday, 02:27:06pm', 'succsess'),
(231, '', '', '2020-10-07,Wednesday, 02:30:47pm', 'succsess'),
(232, 'shashank', '', '2020-10-07,Wednesday, 02:33:44pm', 'succsess'),
(233, 'shashank', '', '2020-10-07,Wednesday, 02:34:19pm', 'succsess'),
(234, 'shashank', '', '2020-10-07,Wednesday, 02:34:39pm', 'succsess'),
(235, '', '', '2020-10-07,Wednesday, 02:35:41pm', 'succsess'),
(236, 'shashank', '', '2020-10-07,Wednesday, 02:36:04pm', 'succsess'),
(237, 'shashank', '', '2020-10-07,Wednesday, 02:36:40pm', 'succsess'),
(238, 'shashank', '', '2020-10-07,Wednesday, 02:36:47pm', 'succsess'),
(239, 'shashank', '', '2020-10-07,Wednesday, 02:38:38pm', 'succsess'),
(240, 'shashank', '', '2020-10-07,Wednesday, 02:39:43pm', 'succsess'),
(241, 'shashank', '', '2020-10-07,Wednesday, 02:39:51pm', 'succsess'),
(242, 'shashank', '', '2020-10-07,Wednesday, 02:40:13pm', 'succsess'),
(243, 'shashank', '', '2020-10-07,Wednesday, 02:40:32pm', 'succsess'),
(244, 'shashank', '', '2020-10-07,Wednesday, 02:41:32pm', 'succsess'),
(245, 'shashank', '', '2020-10-07,Wednesday, 02:43:17pm', 'succsess'),
(246, 'shashank', '', '2020-10-07,Wednesday, 02:45:00pm', 'succsess'),
(247, 'shashank', '', '2020-10-07,Wednesday, 02:45:04pm', 'succsess'),
(248, 'shashank', '', '2020-10-07,Wednesday, 02:46:05pm', 'succsess'),
(249, 'shashank', '', '2020-10-07,Wednesday, 02:46:09pm', 'succsess'),
(250, 'shashank', '', '2020-10-07,Wednesday, 02:48:11pm', 'succsess'),
(251, 'shashank', '', '2020-10-07,Wednesday, 02:48:16pm', 'succsess'),
(252, 'shashank', '', '2020-10-07,Wednesday, 02:49:09pm', 'succsess'),
(253, 'shashank', '', '2020-10-07,Wednesday, 02:49:14pm', 'succsess'),
(254, 'shashank', '', '2020-10-07,Wednesday, 02:50:13pm', 'succsess'),
(255, '', '', '2020-10-07,Wednesday, 02:51:18pm', 'succsess'),
(256, 'shashank', '', '2020-10-07,Wednesday, 02:51:26pm', 'succsess'),
(257, 'shashank', '', '2020-10-07,Wednesday, 02:51:52pm', 'succsess'),
(258, 'shashank', '', '2020-10-07,Wednesday, 02:51:55pm', 'succsess'),
(259, '', '', '2020-10-07,Wednesday, 02:52:31pm', 'succsess'),
(260, 'shashank', '', '2020-10-07,Wednesday, 02:52:37pm', 'succsess'),
(261, 'shashank', '', '2020-10-07,Wednesday, 02:53:08pm', 'succsess'),
(262, 'shashank', '150', '2020-10-07,Wednesday, 02:53:13pm', 'succsess'),
(263, 'shashank', '150', '2020-10-07,Wednesday, 02:54:13pm', 'succsess'),
(264, 'shashank', '300', '2020-10-07,Wednesday, 02:54:49pm', 'succsess'),
(265, 'shashank', '210', '2020-10-07,Wednesday, 02:55:20pm', 'succsess'),
(266, '', '170', '2020-10-07,Wednesday, 02:57:14pm', 'succsess'),
(267, 'shashank', '170', '2020-10-07,Wednesday, 02:57:22pm', 'succsess'),
(268, '', '80', '2020-10-07,Wednesday, 02:58:07pm', 'succsess'),
(269, 'shashank', '80', '2020-10-07,Wednesday, 02:58:14pm', 'succsess'),
(270, '', '270', '2020-10-07,Wednesday, 03:01:37pm', 'succsess'),
(271, 'shashank', '270', '2020-10-07,Wednesday, 03:01:44pm', 'succsess'),
(272, '', '', '2020-10-07,Wednesday, 03:07:57pm', 'succsess'),
(273, 'shashank', '320', '2020-10-07,Wednesday, 03:10:11pm', 'succsess'),
(274, '', '210', '2020-10-07,Wednesday, 03:11:09pm', 'succsess'),
(275, '', '150', '2020-10-07,Wednesday, 03:12:15pm', 'succsess'),
(276, 'shashank', '300', '2020-10-07,Wednesday, 03:12:25pm', 'succsess'),
(277, 'shashank', '450', '2020-10-07,Wednesday, 03:12:38pm', 'succsess'),
(278, 'shashank', '600', '2020-10-07,Wednesday, 03:12:48pm', 'succsess'),
(279, '', '150', '2020-10-07,Wednesday, 03:13:55pm', 'succsess'),
(280, 'shashank', '230', '2020-10-07,Wednesday, 03:14:09pm', 'succsess'),
(281, 'shashank', '230', '2020-10-07,Wednesday, 03:15:16pm', 'succsess'),
(282, 'shashank', '150', '2020-10-07,Wednesday, 03:16:33pm', 'succsess'),
(283, '', '120', '2020-10-07,Wednesday, 03:18:20pm', 'succsess'),
(284, 'shashank', '270', '2020-10-07,Wednesday, 03:18:38pm', 'succsess'),
(285, 'shashank', '420', '2020-10-07,Wednesday, 03:21:48pm', 'succsess'),
(286, 'shashank', '240', '2020-10-07,Wednesday, 03:22:36pm', 'succsess'),
(287, 'shashank', '240', '2020-10-07,Wednesday, 03:24:47pm', 'succsess'),
(288, '', '150', '2020-10-07,Wednesday, 03:25:22pm', 'succsess'),
(289, 'shashank', '300', '2020-10-07,Wednesday, 03:25:31pm', 'succsess'),
(290, 'shashank', '380', '2020-10-07,Wednesday, 03:26:39pm', 'succsess'),
(291, '', '150', '2020-10-07,Wednesday, 03:27:26pm', 'succsess'),
(292, 'shashank', '300', '2020-10-07,Wednesday, 03:27:40pm', 'succsess');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `product_qty`, `product_price`, `userid`, `date`, `status`) VALUES
('268', 'Product105', '1', '80', '', '2020-10-07,Wednesday, 02:58:07pm', 'succsess'),
('270', 'Product101', '1', '150', '', '2020-10-07,Wednesday, 03:01:37pm', 'succsess'),
('270', 'Product102', '1', '120', '', '2020-10-07,Wednesday, 03:01:37pm', 'succsess'),
('274', 'Product102', '1', '120', '', '2020-10-07,Wednesday, 03:11:09pm', 'succsess'),
('274', 'Product103', '1', '90', '', '2020-10-07,Wednesday, 03:11:09pm', 'succsess'),
('275', 'Product101', '1', '150', '', '2020-10-07,Wednesday, 03:12:15pm', 'succsess'),
('279', 'Product101', '1', '150', '', '2020-10-07,Wednesday, 03:13:55pm', 'succsess'),
('283', 'Product102', '1', '120', '', '2020-10-07,Wednesday, 03:18:20pm', 'succsess'),
('288', 'Product101', '1', '150', '', '2020-10-07,Wednesday, 03:25:22pm', 'succsess'),
('291', 'Product101', '1', '150', '', '2020-10-07,Wednesday, 03:27:26pm', 'succsess');

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
('admin', 'admin', 'admin', 'admin'),
('ragh', 'ragh', 'ragh@gmail.co', ''),
('shashank', '123', 'shashankmishr007@gmail.com', ''),
('shashank', '1234', 'asdgm@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
