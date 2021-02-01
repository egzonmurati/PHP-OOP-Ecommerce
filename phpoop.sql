-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 03:25 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `model` varchar(150) NOT NULL,
  `id_admin` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `display` varchar(150) NOT NULL,
  `hardware` varchar(255) NOT NULL,
  `camera` varchar(255) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `images` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `model`, `id_admin`, `title`, `price`, `display`, `hardware`, `camera`, `battery`, `qty`, `images`, `created_at`) VALUES
(9, 'Samsung', 0, 'Samsung Galaxy S20 ', 540, '6.5 inches ', '6GB ', '12 megapixels; 8 MP; 12 MP', '4500 mAh', 20, 'Samsung_Galaxy_S20_FE_5G.png', '2020-12-11 12:34:43'),
(10, 'Samsung', 0, 'Samsung Galaxy A20', 150, '6.4 inches', '3GB ', '13 MP, f/1.9, 28mm (wide), AF 5 MP, f/2.2, 12mm (ultrawide)', 'Li-Po 4000 mAh', 25, 'a20.png', '2020-12-11 12:52:18'),
(11, 'iPhone ', 0, 'iPhone12 Pro Max', 1150, '6.4 inches', '6GB ', '12 MP, f/1.6, 26mm (wide), 1.7Âµm, dual pixel PDAF, sensor-shift stabilization (IBIS)', 'Li-Ion 3687 mAh', 21, 'apple-iphone-12-pro-max-.jpg', '2020-12-11 12:55:13'),
(12, 'Huawei ', 0, 'Huawei P40 Pro', 250, '6.5 inches ', '8GB ', '50 MP, f/1.9, 23mm (wide), 1/1.28"', 'Li-Po 4200 mAh', 10, 'Huawei P40 Pro Plus 256GB.jpg', '2020-12-11 13:02:31'),
(13, 'Xiaomi ', 0, 'Xiaomi Mi 10T', 270, '6.7 inches', '8GB ', '108 MP, f/1.7, 26mm (wide)', 'Li-Po 5000 mAh', 10, 'Xiaomi Mi 10T.jpg', '2020-12-11 13:13:58'),
(14, 'Samsung', 0, 'Samsung Galaxy M51', 320, '6.7 inches', '8GB ', '64 megapixels; 5 MP; 12 MP', '7000 mAh', 11, '51860.jpg', '2020-12-17 15:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `license_date` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `online` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `create_date`, `license_date`, `active_status`, `status`, `role`, `online`) VALUES
(37, 'Egzon', 'Muratii', 'egzon.murati@live.com', '$2y$10$h6sdxOGG/.WnXJBkXSfVH.q.jxO3r8CydQKm4CGMtOcEE5TBgWyBK', '2020-12-08 14:47:00', '2021-12-08', 'verified', 0, 'admin', 0),
(38, 'Egzon', 'Muratii', 'egzoni@live.com', '$2y$10$4.5GwhdC8r0Wj.QEgAwZnuCFlZ6w.g19Kj93yip2tBBWAT.nafcjW', '2020-12-13 19:01:33', '2021-12-13', 'verified', 0, 'user', 0),
(39, 'Egzon', 'Muratii', 'egzoni2@live.com', '$2y$10$0YGV1xI7fG.Xwj/3VBr7oe19h.n1XZW91RArKfJPIOEbPqBiTqHkK', '2020-12-23 14:56:34', '2021-12-23', 'verified', 0, 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
