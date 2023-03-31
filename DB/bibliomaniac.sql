-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 08:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliomaniac`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `email`, `password`, `address`) VALUES
(17, 'Orlando', 'orlando@gmail.com', '1234', 'Taal, Pulilan, Bulacan');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `totalPrice` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phoneNum` varchar(50) NOT NULL,
  `placed_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `quantity`, `totalPrice`, `address`, `phoneNum`, `placed_at`) VALUES
(65, 'Orlando', '12', '6,240', 'Taal, Pulilan, Bulacan', '091234567', '2022-12-13 16:46:21'),
(66, 'Elvin', '4', '2,300', 'Taal, Pulilan, Bulacan', '097896543', '2022-12-13 17:02:41'),
(67, 'Orlando', '13', '6,892', 'Taal, Pulilan, Bulacan', '094563218', '2022-12-14 08:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `bookCover` varchar(50) NOT NULL,
  `bookName` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `genre` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `bookCover`, `bookName`, `price`, `genre`, `author`) VALUES
(12, 'book2.jpg', 'Book2', 400, 'Self Help', 'Paulene'),
(13, 'book3.jpg', 'Book3', 700, 'Thriller', 'Kaycee'),
(15, 'book4.jpg', 'Book4', 590, 'Comedy', 'Anjo'),
(16, 'book5.jpg', 'Book5', 300, 'Comedy', 'Paulene'),
(17, 'book6.jpg', 'Book6', 450, 'Romance', 'Orly'),
(18, 'book7.jpg', 'Book7', 800, 'Self Help', 'Anjo'),
(20, 'book9.jpg', 'Book9', 456, 'Fantasy', 'Kaycee'),
(21, 'book10.jpg', 'Book10', 600, 'Fantasy', 'Anjo'),
(22, 'book11.jpg', 'Book11', 650, 'Romance', 'Paulene'),
(23, 'book2.jpg', 'Book2', 450, 'Comedy', 'Paulene');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
