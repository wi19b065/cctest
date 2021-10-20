-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2021 at 04:51 PM
-- Server version: 10.2.40-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cctest`
--

-- --------------------------------------------------------

--
-- Table structure for table `crypto_data`
--

CREATE TABLE crypto_data (id int(11) NOT NULL,
  email varchar(50) NOT NULL,
  symbol varchar(50) NOT NULL,
  name varchar(50) NOT NULL,
  price double NOT NULL,
  currency varchar(50) NOT NULL,
  timestamp timestamp NOT NULL DEFAULT current_timestamp()
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crypto_data`
--
ALTER TABLE `crypto_data`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crypto_data`
--
ALTER TABLE `crypto_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
