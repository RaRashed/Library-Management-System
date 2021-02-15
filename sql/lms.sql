-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 04:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `book_image` varchar(255) DEFAULT NULL,
  `book_author_name` varchar(255) DEFAULT NULL,
  `book_publication_name` varchar(255) DEFAULT NULL,
  `book_purchase_date` varchar(255) DEFAULT NULL,
  `book_price` varchar(255) DEFAULT NULL,
  `book_qty` int(5) DEFAULT NULL,
  `available_qty` int(5) DEFAULT NULL,
  `librarian_username` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`, `datetime`) VALUES
(5, 'virus Bhai', '20210128024642.jpg', 'Rashed', 'virus', '2021-01-30', '501', 20, 19, 'Rashed', '2021-01-28 13:46:42'),
(6, 'Hey Bro', '20210201020911.PNG', 'Virus', 'Rashed', '2021-02-01', '300', 10, 8, 'Rashed', '2021-02-01 13:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(1, 1, 6, '01-02-2021', '03-02-21', '2021-02-01 13:29:14'),
(2, 2, 6, '01-02-2021', '03-02-21', '2021-02-01 13:32:01'),
(3, 2, 5, '01-02-2021', '03-02-21', '2021-02-01 13:38:41'),
(4, 2, 6, '02-02-2021', '03-02-21', '2021-02-02 17:18:39'),
(5, 1, 5, '02-02-2021', '03-02-21', '2021-02-02 20:40:45'),
(6, 2, 5, '03-02-2021', '03-02-21', '2021-02-03 15:58:21'),
(7, 3, 6, '03-02-2021', '03-02-21', '2021-02-03 16:00:08'),
(8, 3, 5, '03-02-2021', '03-02-21', '2021-02-03 16:00:50'),
(9, 2, 5, '04-02-2021', '', '2021-02-04 18:22:55'),
(10, 4, 6, '05-02-2021', '', '2021-02-05 22:50:23'),
(11, 8, 6, '15-02-2021', '', '2021-02-15 15:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(3) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'Rashedul AZiz', 'Rashed', 'rnrashedrn@gmail.com', 'Rashed', '123456', '2021-01-26 21:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(50) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `department` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `department`, `email`, `username`, `password`, `phone`, `image`, `status`, `datetime`) VALUES
(1, 'Rashedul Aziz', 'Rashed', 123456, 123456, 'LLB', 'rnrashedrn@gmail.com', 'rashed', '$2y$10$x96F.t8YCvrKUqPpsHHyXOo', 1827801715, NULL, 1, '2021-01-26 17:16:35'),
(2, 'mahatab', 'mahatab', 654321, 654321, 'BBA', 'mahatab@gmail.com', 'mahatab', '123456', 1306537697, NULL, 1, '2021-01-26 18:20:57'),
(3, 'Rashedul Aziz Rashed', 'Rashed', 123412, 123412, 'EEE', 'rashedvirus00@gmail.com', 'virus000', '654321', 1827801715, NULL, 1, '2021-01-26 20:14:09'),
(4, 'A', 'A', 111111, 111111, 'Civil', '1@gmail.com', 'aaaaaa', '111111', 1827801715, NULL, 1, '2021-02-05 16:31:32'),
(5, 'B', 'B', 222222, 222222, 'BBA', '2@gmail.com', 'bbbbbb', '222222', 1324567864, NULL, 1, '2021-02-05 16:32:34'),
(6, 'C', 'C', 333333, 333333, 'EEE', '3@gmail.com', 'CCCCCC', '333333', 1827801715, NULL, 1, '2021-02-05 16:33:13'),
(7, 'asdfghjk', 'asdfgh', 123098, 529076, 'Bsc In CSE', 'aaa@gmail.com', 'CSE111', '123456', 1827801715, NULL, 1, '2021-02-05 16:50:42'),
(8, 'Rahatul ', 'Karim', 666666, 666666, 'Civil', 'Rahat@gmail.com', 'rahat1', '666666', 1621796596, NULL, 1, '2021-02-05 16:55:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
