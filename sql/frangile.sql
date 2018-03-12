-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 02:57 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frangile`
--

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`id`, `name`, `image`, `created_date`, `updated_date`) VALUES
(1, 'Tomato', 'tomato.jpg', '2018-03-09 10:33:14', '0000-00-00 00:00:00'),
(2, 'Onion', 'onion.jpg', '2018-03-09 10:33:50', '0000-00-00 00:00:00'),
(3, 'Betroot', 'betroot.png', '2018-03-09 10:34:10', '0000-00-00 00:00:00'),
(4, 'Carrot', 'carrot.png', '2018-03-09 10:34:21', '0000-00-00 00:00:00'),
(5, 'Beans', 'beans.jpg', '2018-03-09 10:34:36', '0000-00-00 00:00:00'),
(6, 'Potato', 'potato.jpg', '2018-03-09 10:34:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_crops`
--

CREATE TABLE `farmer_crops` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer_crops`
--

INSERT INTO `farmer_crops` (`id`, `farmer_id`, `crop_id`, `quantity`, `price`, `created_date`, `updated_date`) VALUES
(1, 2, 1, 20, '50.00', '2018-03-09 11:50:48', '0000-00-00 00:00:00'),
(2, 2, 2, 50, '45.00', '2018-03-09 11:50:48', '0000-00-00 00:00:00'),
(3, 3, 2, 50, '35.00', '2018-03-09 11:50:48', '0000-00-00 00:00:00'),
(4, 3, 1, 20, '40.00', '2018-03-09 11:50:48', '0000-00-00 00:00:00'),
(5, 3, 3, 100, '24.00', '2018-03-09 11:52:47', '0000-00-00 00:00:00'),
(6, 3, 4, 15, '150.00', '2018-03-09 11:52:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `crop_id`, `farmer_id`, `quantity`, `price`, `total_price`, `created_date`, `updated_date`) VALUES
(1, 1, 2, 2, 10, '45.00', '450.00', '2018-03-10 08:38:43', '0000-00-00 00:00:00'),
(2, 1, 1, 3, 1, '40.00', '40.00', '2018-03-10 08:41:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`, `address1`, `address2`, `city`, `state`, `zip`, `created_date`, `updated_date`) VALUES
(1, 'Ramkumar', 'ramkumar.izaap@gmail.com', 'password', 1, '9876543210', '', '', '', '', '', '2018-03-09 10:26:41', '0000-00-00 00:00:00'),
(2, 'Sathish', 'sathish.izaap@gmail.com', 'password', 2, '94448484296', 'SVS Nagar', 'Valasaravakkam', 'Chennai', 'Tamilnadu', '600041', '2018-03-09 10:26:41', '0000-00-00 00:00:00'),
(3, 'Nirmal', 'nirmal.izaap@gmail.com', 'password', 2, '44546', '2nd Main Road', 'Adyar', 'Chennai', 'Tamilnadu', '600042', '2018-03-09 10:26:41', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer_crops`
--
ALTER TABLE `farmer_crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `farmer_crops`
--
ALTER TABLE `farmer_crops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
