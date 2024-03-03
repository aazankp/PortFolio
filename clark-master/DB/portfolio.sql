-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 07:28 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `address`, `zipcode`, `mobile`, `DOB`, `password`, `profile`) VALUES
(1, 'Aazan Khan Pathan', 'aazank517@gmail.com', 'House # 18 Pathan Goth Hussainabad Qasimabad Hyderabad', 71000, 2147483647, '2001-05-08', '7f9b44c276597ec3d17f9289daa07dcb', '7153_Profile.PNG'),
(2, 'Kenyon Sanchez', 'qipag@example.com', '46 New Street', 89269, 30, '2005-12-26', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '10_bg img.jpg'),
(3, 'Carissa Lowery', 'cujic@example.com', '21 First Road', 77322, 60, '1970-12-26', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '6210_192779187_2991997431021759_4470940711388425728_n.jpg'),
(4, 'Cooper Larson', 'dumazytene@example.com', '42 Old Avenue', 31326, 61, '2011-07-05', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1951_AAZAN.jpg'),
(5, 'Cooper Larson', 'dumazytene@example.com', '42 Old Avenue', 31326, 61, '2011-07-05', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2028_AAZAN.jpg'),
(6, 'Cooper Larson', 'dumazytene@example.com', '42 Old Avenue', 31326, 61, '2011-07-05', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '265_AAZAN.jpg'),
(7, 'Lillian Maddox', 'votetipuz@example.com', '953 Nobel Street', 48260, 53, '1989-04-11', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '8526_Cursor types.jpeg'),
(8, 'Felix Whitfield', 'tenewa@example.com', '37 White Hague Extension', 66244, 75, '1997-10-22', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1705_AAZAN.jpg'),
(9, 'Alvin Pope', 'ficosu@example.com', '28 South Green Fabien Extension', 87210, 14, '1994-09-14', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '3123_DiriliÅŸ-ErtuÄŸrul-....jpg'),
(10, 'Fallon Mccarthy', 'fypysoc@example.com', '905 First Extension', 43544, 43, '1970-05-16', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2867_DiriliÅŸ-ErtuÄŸrul-....jpg'),
(11, 'Rashad Mcclure', 'fusikon@example.com', '55 First Extension', 21269, 44, '2015-04-22', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '7235_00e0830cf439d2599b2d21374a7ed2e1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
