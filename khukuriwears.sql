-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 03:17 AM
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
-- Database: `khukuriwears`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'admin', 'admin2', 'admin'),
(5, 'Tisha Maharjan', 'tisham', 'tisha'),
(6, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `pid` int(100) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_before`
--

CREATE TABLE `cart_before` (
  `id` int(11) DEFAULT NULL,
  `rand_id` int(200) DEFAULT NULL,
  `pid` int(100) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_before`
--

INSERT INTO `cart_before` (`id`, `rand_id`, `pid`, `title`, `size`, `price`, `quantity`, `image_name`) VALUES
(NULL, 5276, 14, 'Striped T-shirt', 'S', 1800.00, 1, 'Product_Name_5315.jpg'),
(NULL, 78, 1, 'Puffer Jacket', 'L', 5000.00, 1, 'Product_Name_4693.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart_orders`
--

CREATE TABLE `cart_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `total_products` varchar(1000) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `payment_mode` varchar(150) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_orders`
--

INSERT INTO `cart_orders` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `total_products`, `total_price`, `order_date`, `payment_mode`, `status`) VALUES
(30, 1, 'Tisha Maharjan', '9884901890', 'tisha1@gmail.com', 'Kohiti', ', Adidas Forum Mod Low- (1),41;, Loose Fit T-shirt- (1),S;', 3040.00, '2024-02-16 04:09:24', 'Khalti', 'Ordered'),
(31, 1, 'Tisha Maharjan', '9884901890', 'tisha1@gmail.com', 'Kohiti', ', LV Crossbody Bag- (1),None;', 3000.00, '2024-02-16 04:13:10', 'Khalti', 'Ordered'),
(32, 1, 'Tisha Maharjan', '9884901890', 'tisha1@gmail.com', 'Kohiti', ', Loose Fit T-shirt- (1),M;', 2500.00, '2024-02-19 04:48:51', 'Khalti', 'Ordered'),
(33, 1, 'Tisha Maharjan', '9884901890', 'tisha1@gmail.com', 'Kohiti', ', Loose Fit T-shirt- (1),S;', 2500.00, '2024-02-19 01:39:24', 'Khalti', 'Ordered'),
(34, 1, 'Tisha Maharjan', '9884901890', 'tisha1@gmail.com', 'Kohiti', ', Puffer Jacket- (1),S;', 5000.00, '2024-02-19 01:44:01', 'Khalti', 'Ordered'),
(35, 1, 'Tisha Maharjan', '9884901890', 'tisha1@gmail.com', 'Kohiti', ' Varsity Jacket- (1),S;', 4500.00, '2024-02-21 04:03:51', 'Khalti', 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Summer Collection', 'Category_245.jpg', 'Yes', 'Yes'),
(2, 'Winter Collection', 'Category251.jpg', 'Yes', 'Yes'),
(3, 'Footwear', 'Category_234.jpg', 'Yes', 'Yes'),
(10, 'Accessory', 'Category750.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(6, 'Tisha Maharjan', 'tisha@gmail.com', 'cjlcbhlPHcp');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `stock` int(100) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `image_name`, `stock`, `category_title`, `featured`, `active`) VALUES
(1, 'Puffer Jacket', 5000.00, 'Product_Name_4693.jpg', 19, 'Winter Collection', 'Yes', 'Yes'),
(2, 'Loose Fit T-shirt', 2500.00, 'Product_Name_6342.jpg', 8, 'Summer Collection', 'Yes', 'Yes'),
(3, 'Air Force 1', 4500.00, 'Product_Name_9511.jpg', 0, 'Footwear', 'Yes', 'Yes'),
(4, 'LV Crossbody Bag', 3000.00, 'Product_Name_9953.jpg', 0, 'Accessory', 'Yes', 'Yes'),
(5, 'Sweatshirts', 3000.00, 'Product_Name_5215.jpg', 0, 'Winter Collection', 'Yes', 'Yes'),
(6, 'Nike SB Dunk Low', 6500.00, 'Product_Name_2585.jpg', 9, 'Footwear', 'Yes', 'Yes'),
(7, 'Varsity Jacket', 4500.00, 'Product_Name_9093.jpg', 4, 'Winter Collection', 'Yes', 'Yes'),
(10, 'Cardigan', 3500.00, 'Product_Name_3986.jpg', 0, 'Winter Collection', 'Yes', 'Yes'),
(11, 'Gray Hoodie', 3000.00, 'Product_Name_2765.jpg', 39, 'Winter Collection', 'Yes', 'Yes'),
(12, 'Adidas Forum Mod Low', 540.00, 'Product_Name_9242.jpg', 3, 'Footwear', 'Yes', 'Yes'),
(14, 'Striped T-shirt', 1800.00, 'Product_Name_5315.jpg', 10, 'Summer Collection', 'Yes', 'Yes'),
(15, 'Side Pocket T-shirt', 2200.00, 'Product_Name_5233.jpg', 15, 'Summer Collection', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `phone`, `email`, `address`) VALUES
(1, 'Tisha Maharjan', 'tisham', 'tisha', '9884901890', 'tisha1@gmail.com', 'Kohiti'),
(3, 'Rojen Dangol', 'rojen', 'rojen', '9867172930', 'rojen@gmail.com', 'Chamati');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_orders`
--
ALTER TABLE `cart_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `cart_orders`
--
ALTER TABLE `cart_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
