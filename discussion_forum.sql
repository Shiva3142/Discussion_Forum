-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 11:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discussion_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `thread_id` int(10) NOT NULL,
  `thread_title` text NOT NULL,
  `thread_description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `referance_documentation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`thread_id`, `thread_title`, `thread_description`, `timestamp`, `referance_documentation`) VALUES
(1, 'Python Programming', 'Python is a general-purpose, versatile, and powerful programming language. It’s a great first language because it’s concise and easy to read. Whatever you want to do, Python can do it. From web development to machine learning to data science, Python is the language for you.', '2021-01-23 23:48:41', 'https://www.python.org/doc/'),
(2, 'C Programming', 'C is a powerful general-purpose programming language. It can be used to develop software like operating systems, databases, compilers, and so on. C programming is an excellent language to learn to program for beginners.', '2021-01-23 07:42:38', 'https://www.programiz.com/c-programming'),
(3, 'Java Programming', 'Java is at the heart of our digital lifestyle. It\'s the platform for launching careers, exploring human-to-digital interfaces, architecting the world\'s best applications, and unlocking innovation everywhere—from garages to global organizations.', '2021-01-23 23:48:49', 'https://docs.oracle.com/javase/tutorial/java/index.html'),
(4, 'PHP', 'PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.\r\nPHP is a widely-used, free, and efficient alternative to competitors such as Microsoft\'s ASP.\r\nPHP 7 is the latest stable release', '2021-01-23 07:46:41', 'https://www.php.net/manual/en/');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sr_no` int(10) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `number` bigint(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `massege` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `discussion_id` int(10) NOT NULL,
  `discussion` text NOT NULL,
  `topic_id` int(10) NOT NULL,
  `posted_by` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `topic_id` int(10) NOT NULL,
  `topic_title` text NOT NULL,
  `posted_by` varchar(256) NOT NULL,
  `thread_cat_id` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `topic_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_no` int(10) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`discussion_id`),
  ADD UNIQUE KEY `discussion` (`discussion`) USING HASH,
  ADD KEY `discussion_3` (`discussion`(768));
ALTER TABLE `thread` ADD FULLTEXT KEY `discussion_2` (`discussion`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`topic_id`),
  ADD UNIQUE KEY `topic_title` (`topic_title`) USING HASH;
ALTER TABLE `threads` ADD FULLTEXT KEY `topic_title_2` (`topic_title`,`topic_description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_no`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sr_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `discussion_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `topic_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
