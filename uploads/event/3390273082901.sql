-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 03:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `refund_to_id` int(11) NOT NULL,
  `orderNo` varchar(255) NOT NULL,
  `memship_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'normal',
  `payment_id` int(11) NOT NULL COMMENT 'primary key of order_card_detail',
  `payment_method` varchar(20) NOT NULL,
  `payment_type` int(1) NOT NULL DEFAULT '1',
  `watched` int(11) NOT NULL,
  `notes` text NOT NULL,
  `started` tinyint(1) NOT NULL DEFAULT '0',
  `delivery_note` text NOT NULL,
  `delivered_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `created_on`, `amount`, `status`, `refund_to_id`, `orderNo`, `memship_id`, `type`, `payment_id`, `payment_method`, `payment_type`, `watched`, `notes`, `started`, `delivery_note`, `delivered_file`) VALUES
(1, 99, '2020-02-24 14:03:26', 250, 1, 0, '5e53d7fdd5d9c', 3, 'normal', 4, 'paypal', 1, 0, '', 0, '', ''),
(2, 99, '2020-02-24 14:10:55', 250, 1, 0, '5e53d982478bd', 4, 'normal', 5, 'paypal', 1, 0, '', 0, '', ''),
(3, 99, '2020-02-24 14:16:48', 750, 1, 0, '5e53dae4c81a6', 5, 'normal', 6, 'paypal', 1, 0, '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
