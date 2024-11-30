-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 04:35 AM
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
-- Database: `lms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication_system`
--

CREATE TABLE `authentication_system` (
  `Login_ID` varchar(20) NOT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authentication_system`
--

INSERT INTO `authentication_system` (`Login_ID`, `Password`) VALUES
('eadams888', 'password888'),
('emdavis101', 'password101'),
('janesmith456', 'password456'),
('johndoe123', 'password123'),
('mj789', 'password789'),
('ohernandez999', 'password999');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` varchar(20) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Edition` int(11) DEFAULT NULL,
  `Author` varchar(100) DEFAULT NULL,
  `Publisher_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `Title`, `Category`, `Price`, `Edition`, `Author`, `Publisher_ID`) VALUES
('ISBN123', 'Book Title 1', 'Fiction', 19.99, 1, 'Author 1', 1),
('ISBN456', 'Book Title 2', 'Non-Fiction', 24.99, 2, 'Author 2', 2),
('ISBN888', 'Book Title 29', 'Science Fiction', 14.99, 3, 'Author 29', 29),
('ISBN999', 'Book Title 30', 'Fantasy', 17.99, 4, 'Author 30', 30);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `User_ID` int(11) NOT NULL,
  `Email_Address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `Publisher_ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `YearOfPublication` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `readers`
--

CREATE TABLE `readers` (
  `User_ID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `ContactNo` varchar(20) DEFAULT NULL,
  `Login_ID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `Report_ID` int(11) NOT NULL,
  `Book_ID` varchar(20) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `ISBN` varchar(20) DEFAULT NULL,
  `Issue_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `Reserve_ID` int(11) NOT NULL,
  `Book_ID` varchar(20) DEFAULT NULL,
  `ReserveDate` date DEFAULT NULL,
  `DueDate` date DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Login_ID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Name`, `Login_ID`) VALUES
(1, 'John Doe', 'johndoe123'),
(2, 'Jane Smith', 'janesmith456'),
(3, 'Michael Johnson', 'mj789'),
(4, 'Emily Davis', 'emdavis101'),
(5, 'Ethan Adams', 'eadams888'),
(6, 'Olivia Hernandez', 'ohernandez999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication_system`
--
ALTER TABLE `authentication_system`
  ADD PRIMARY KEY (`Login_ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`Publisher_ID`);

--
-- Indexes for table `readers`
--
ALTER TABLE `readers`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Login_ID` (`Login_ID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`Report_ID`),
  ADD KEY `Book_ID` (`Book_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`Reserve_ID`),
  ADD KEY `Book_ID` (`Book_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `Publisher_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `readers`
--
ALTER TABLE `readers`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `Report_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `Reserve_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `readers` (`User_ID`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `readers` (`User_ID`);

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `readers` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
