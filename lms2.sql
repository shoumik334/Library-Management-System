-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 04:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
('max', 'password40'),
('mj789', 'password789'),
('ohernandez999', 'password999'),
('shoumik70', 'password60'),
('sum30', '30'),
('sum40', 'passwhat'),
('toki', 'passwhy'),
('toki2', 'password80');

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
('ISBN478', 'Title3', 'Fantasy', 15.99, 4, 'Author23', 0);

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

--
-- Dumping data for table `readers`
--

INSERT INTO `readers` (`User_ID`, `FirstName`, `LastName`, `Email`, `Address`, `ContactNo`, `Login_ID`) VALUES
(4, 'Sumyea', 'Choudhury', 'sumyeachoudhury@gmail.com', 'Dhaka', '01323273386', 'sum30'),
(5, 'Farhat ', 'lamisa', 'farhat.lamisa@gmail.com', 'Dhaka', '01712145578', 'lamisa30'),
(7, 'toki', 'marzia', 'tokichoudhury@gmail.com', 'Dhaka', '01712145578', 'toki'),
(9, 'shoumik', 'islam', 'shoumik@gmail.com', 'Dhaka', '01712453318', 'shoumik70');

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
  `User_ID` int(11) DEFAULT NULL,
  `fine` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`Reserve_ID`, `Book_ID`, `ReserveDate`, `DueDate`, `ReturnDate`, `User_ID`, `fine`) VALUES
(14, 'ISBN478', '2024-12-01', '2024-12-15', NULL, 0, 0.00),
(15, 'ISBN456', '2024-12-01', '2024-12-15', NULL, 0, 0.00),
(16, 'ISBN123', '2024-12-01', '2024-12-15', NULL, 0, 0.00),
(17, 'ISBN123', '2024-12-01', '2024-12-15', NULL, NULL, 0.00),
(18, 'ISBN123', '2024-12-01', '2024-12-15', NULL, NULL, 0.00),
(19, 'ISBN123', '2024-12-01', '2024-12-15', NULL, NULL, 0.00),
(20, 'ISBN123', '2024-12-01', '2024-12-15', NULL, 0, 0.00),
(21, 'ISBN456', '2024-12-01', '2024-12-15', NULL, 0, 0.00);

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
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `Reserve_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`ISBN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
