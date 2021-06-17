-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 11:00 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urbanbasket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` text NOT NULL,
  `contact` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` varchar(12) NOT NULL,
  `email_verification_token` varchar(100) NOT NULL,
  `password_request` varchar(10) DEFAULT NULL,
  `password_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `username`, `fullname`, `contact`, `email`, `password`, `is_verified`, `email_verification_token`, `password_request`, `password_token`) VALUES
(74, 'fsfsghjgfjh@1', 'rushikesh', '0808 121 6970', 'rushikeshlandgepatil2@gmail.com', 'qWerty@1', 'false', '10f99ccfff83b27e91cfffe32490a5e0', 'inactive', NULL),
(75, 'sarvesh@123', 'Sarvesh Singh', '07570000843', 'monusarveshsingh@gmail.com', 'qWerty@1', 'true', '954af465e7100a15711f0c88c3d78490', 'inactive', NULL),
(76, 'SARVESH6611', 'Thakur Sarvesh Singh', '7570000843', 'sarveshthakur0412@gmail.com', '456321', 'true', '2eac2fb9fba993731b80bd15e6046d1d', 'inactive', '598f215354ccca8241b14a950d66f5cf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
