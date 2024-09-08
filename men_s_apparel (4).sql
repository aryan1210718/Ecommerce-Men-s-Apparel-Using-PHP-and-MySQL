-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 06:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `men's_apparel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'aryan', '123'),
(2, 'yash', '456'),
(3, 'taxil', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cart_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `p_id` int(7) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`cart_id`, `user_id`, `p_id`, `p_name`, `p_price`, `quantity`, `time`) VALUES
(5, 6, 29, '', 0, 11, '2024-04-17 11:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `cat_tbl`
--

CREATE TABLE `cat_tbl` (
  `cat_id` int(6) NOT NULL,
  `cat_img` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat_tbl`
--

INSERT INTO `cat_tbl` (`cat_id`, `cat_img`, `cat_name`, `date`) VALUES
(146, '1712307222.JPEG', 'Pants', '2024-04-05 14:23:42'),
(147, '1712307275.JPEG', 'T-Shirts', '2024-04-05 14:24:35'),
(148, '1712307368.JPEG', 'Cargos', '2024-04-05 14:26:08'),
(150, '1712307517.JPEG', 'Shirts', '2024-04-05 14:28:37'),
(218, '1713374842_1135479.jpg', 'aryan rami 123', '2024-04-08 11:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `debit_details`
--

CREATE TABLE `debit_details` (
  `card_id` int(6) NOT NULL,
  `order_id` int(10) NOT NULL,
  `card_name` text NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `expiry_date` date NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `debit_details`
--

INSERT INTO `debit_details` (`card_id`, `order_id`, `card_name`, `card_number`, `expiry_date`, `cvv`) VALUES
(1, 83, '', '123456798', '0000-00-00', 0),
(2, 0, '', '1111111111111111', '0000-00-00', 0),
(3, 89, '', '0000000000000000', '0000-00-00', 0),
(4, 90, '', '2222222222222222', '0000-00-00', 0),
(5, 91, 'fsdf sdfs', '4444444444444444', '0000-00-00', 12),
(6, 92, 'zxc', '1', '0000-00-00', 123),
(7, 96, 'axis bank', '123456789', '0000-00-00', 123),
(14, 97, 'axis bank', '781758100', '2024-11-10', 123),
(15, 99, 'axis bank', '12345566', '2024-04-25', 123),
(16, 101, 'axis bank', '21345679001', '2024-10-21', 123),
(17, 102, 'axis bank', '2556586645', '2024-10-21', 123);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `quantity` int(255) NOT NULL,
  `p_price` int(20) NOT NULL,
  `total_price` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pin` int(255) NOT NULL,
  `mobile` int(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `p_id`, `quantity`, `p_price`, `total_price`, `user_id`, `address`, `pin`, `mobile`, `payment_method`, `date`) VALUES
(92, 2, 1, 1590, 1590, 1, '30 Tapovan Society , Near Sabar Cable , Sahkarijin Road ,Himatngar', 383001, 2147483647, 'Debit Card', '2024-04-10 20:26:21'),
(93, 2, 4, 1590, 6360, 2, 'mansa', 123123, 2147483647, 'Cash on Delivery', '2024-04-10 20:26:21'),
(95, 1, 2, 1249, 2498, 3, 'sdd', 123123, 2147483647, 'Debit Card', '2024-04-10 20:26:21'),
(96, 2, 2, 1590, 3180, 3, 'sdd', 123123, 2147483647, 'Debit Card', '2024-04-10 20:26:21'),
(97, 1, 5, 1249, 6245, 1, '2,street armour', 383001, 1234567890, 'Debit Card', '2024-04-10 20:26:21'),
(98, 1, 7, 1249, 8743, 2, 'mansa', 84894, 8484848, 'Debit Card', '2024-04-15 12:36:05'),
(99, 29, 5, 2345, 11725, 2, 'mansa', 84894, 8484848, 'Debit Card', '2024-04-15 12:36:05'),
(100, 34, 8, 1234, 9872, 1, '2,street armour', 123123, 2147483647, 'Debit Card', '2024-04-21 13:22:30'),
(101, 29, 3, 1234, 3702, 1, '2,street armour', 123123, 2147483647, 'Debit Card', '2024-04-21 13:22:30'),
(102, 34, 6, 1234, 7404, 1, '2,sambhavnath', 123123, 2147483647, 'Debit Card', '2024-04-21 20:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `total_price` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pin` int(6) NOT NULL,
  `mobile` int(10) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `p_id` int(7) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_name` text NOT NULL,
  `p_price` int(6) NOT NULL,
  `c_id` int(7) NOT NULL,
  `p_features` varchar(255) NOT NULL,
  `p_desc` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`p_id`, `p_img`, `p_name`, `p_price`, `c_id`, `p_features`, `p_desc`, `timestamp`) VALUES
(29, '1713419009_IMG_5712.JPEG', 'plain cargo y', 1234, 148, 'best durable ', 'wr are we', '2024-04-14 14:45:38'),
(34, '1713685535.JPEG', 'green oversize tees', 1234, 147, 'best durable ', 'cotton fabric imported', '2024-04-21 13:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(3) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `e_mail` varchar(35) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `password`, `e_mail`, `mobile`, `dt`) VALUES
(1, 'aryan', '$2y$10$OtHOq7jMJ.o0FsLnFt/VfO5DcOHJqIFzSRI8DSgsU0S2zrHzgLZIC', '123@gmail.com', '951057076', '2024-03-04 11:42:11'),
(13, 'yash', '$2y$10$SxLPsXVbJVzxmH7OPxwjhOsnJGRroJrzD154Z8k9qNpR3vGOS3poG', '123@gmail.com', '2147483647', '2024-04-17 10:32:29'),
(18, 'jam', '$2y$10$P8nHzLPp6UwROyMdDzxwj.7qx8siSmNQRpbAIgGjOqUjT/W0mDopO', '123@gmail.com', '4567891230', '2024-04-17 10:39:04'),
(19, 'sdf', '$2y$10$ImayEXP5I8771vmuSt0/K.3uGX0yLxLCVB9aJxn9f1.nXyYG2VCFi', '123@gmail.com', '123eyuo', '2024-04-17 10:46:38'),
(20, 'taxil', '$2y$10$fqml9hCzStMX538vnqQn7OHjyl33zJBW9htOdM8WGnhmTEgalrCJu', '123@gmail.com', 'dsffjghg', '2024-04-17 10:52:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cat_tbl`
--
ALTER TABLE `cat_tbl`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `debit_details`
--
ALTER TABLE `debit_details`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `mobile_2` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cat_tbl`
--
ALTER TABLE `cat_tbl`
  MODIFY `cat_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `debit_details`
--
ALTER TABLE `debit_details`
  MODIFY `card_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `p_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
