-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2025 at 07:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computers`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_amount`, `order_date`) VALUES
(1, 1, 5196.00, '2025-11-17 22:30:44'),
(2, 1, 1199.00, '2025-11-17 22:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `price`, `quantity`) VALUES
(1, 1, 10, 'Dell XPS 13', NULL, 1299.00, 3),
(2, 1, 3, 'MacBook Pro 13 M1', NULL, 1299.00, 1),
(3, 2, 2, 'MacBook Air M2', NULL, 1199.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_image`, `product_description`) VALUES
(1, 'MacBook Air M1', 999.00, 'mac_air_m1.png', 'Lightweight, fast, perfect for school and office'),
(2, 'MacBook Air M2', 1199.00, 'mac_air_m2.png', 'Powerful thin laptop with modern Apple Silicon'),
(3, 'MacBook Pro 13 M1', 1299.00, 'mac_pro13_m1.png', 'High speed performance for creators'),
(4, 'MacBook Pro 16 M1', 2499.00, 'mac_pro16_m1.png', 'Premium performance for professionals'),
(5, 'MacBook Pro 14 M2', 2199.00, 'mac_pro14_m2.png', 'Great balance of performance and portability'),
(6, 'HP Pavilion 15', 799.00, 'hp_pavilion15.png', 'Perfect for students and work at home'),
(7, 'HP Spectre x360', 1399.00, 'hp_spectre.png', '2-in-1 convertible touchscreen laptop'),
(8, 'HP Omen Gaming', 1499.00, 'hp_omen.png', 'High performance gaming laptop'),
(9, 'Dell Inspiron 15', 699.00, 'dell_inspiron15.png', 'Everyday laptop at great price'),
(10, 'Dell XPS 13', 1299.00, 'dell_xps13.png', 'Premium ultrabook with thin bezels'),
(11, 'Dell G15 Gaming', 1399.00, 'dell_g15.png', 'Affordable gaming machine with RGB keyboard'),
(12, 'Acer Aspire 5', 599.00, 'acer_aspire5.png', 'Great for internet browsing and homework'),
(13, 'Acer Nitro 5', 1099.00, 'acer_nitro5.png', 'Popular gaming laptop with strong graphics'),
(14, 'Lenovo IdeaPad 3', 549.00, 'lenovo_ideapad3.png', 'Budget friendly and lightweight'),
(15, 'Lenovo Legion 5', 1299.00, 'lenovo_legion5.png', 'Gaming laptop with high refresh display'),
(16, 'ASUS VivoBook 15', 649.00, 'asus_vivobook15.png', 'Slim, stylish, and great battery life'),
(17, 'ASUS ROG Strix', 1599.00, 'asus_rogstrix.png', 'RGB gaming laptop with powerful GPU'),
(18, 'Razer Blade 15', 2499.00, 'razer_blade15.png', 'Ultra premium gaming and editing machine'),
(19, 'Microsoft Surface Laptop 4', 1299.00, 'surface_laptop4.png', 'Touchscreen thin design for professionals'),
(20, 'Samsung Galaxy Book Pro', 1199.00, 'galaxy_bookpro.png', 'Super thin AMOLED screen and long battery life');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `email`, `user_role`) VALUES
(1, 'sid', '827ccb0eea8a706c4c34a16891f84e7b', 'kcsiddartha9@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
