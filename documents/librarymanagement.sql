-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 07:59 PM
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
-- Database: `librarymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication system`
--

CREATE TABLE `authentication system` (
  `Login_id` int(10) NOT NULL,
  `password` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authentication system`
--

INSERT INTO `authentication system` (`Login_id`, `password`) VALUES
(167890123, 13421342),
(313142042, 14614677),
(1010101010, 18181818),
(1111111111, 13131313),
(1231231231, 12412412),
(1241351879, 12341234),
(1331331308, 34231214),
(1331331334, 14214212),
(1451451600, 67467460),
(1451541230, 35253525),
(1520152015, 15201520),
(1532086062, 45454545),
(1561461360, 12314315),
(1561561659, 16515600),
(1781780032, 67867867),
(1791791790, 12312342),
(1801801849, 13214212),
(1821820042, 34534534),
(1894545043, 12121211),
(2138464642, 12121212);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` int(10) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Price` int(4) NOT NULL,
  `Edition` int(2) NOT NULL,
  `Author` varchar(30) NOT NULL,
  `Publisher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `Title`, `Category`, `Price`, `Edition`, `Author`, `Publisher_id`) VALUES
(123000000, 'Glory Glory', 'Romantic', 900, 5, 'Mark Schlabach', 1234561213),
(145350000, 'Lost December', 'Science fiction', 680, 3, 'Richard Evans', 1234561214),
(1000000000, 'Sweet Tooth', 'Fantasy', 500, 2, 'Sarah Fennel', 1234561212),
(1200000000, 'Flush', 'Mystery', 350, 8, 'Carl Hiaasen', 1234561212),
(1231241250, 'The Lemonade War', 'Fantasy', 500, 1, 'Jacqueline Davies', 1234561216),
(1231241450, 'Charlotte\'s Web', 'Fantasy', 400, 4, 'E.B. White', 1234561216),
(1234000000, 'Your Lion eyes', 'Romance', 560, 1, 'Christine Warren', 1234561213),
(1234123450, 'After', 'Romance', 2500, 1, 'Anna Todd', 1234561214),
(1234500000, 'Alphaville', 'Romance', 300, 9, 'Evgeny Morozov', 1234561213),
(1234512300, 'Pet Sematary', 'Mystery', 400, 25, 'Stephen King', 1234561214),
(1234567000, 'The Soul of Healing', 'Self-help', 1000, 13, 'Tia Levings', 1234561213),
(1234567890, 'Love me Tomorrow', 'Young adult', 200, 13, 'Emiko Jean', 1234561213),
(1300000000, 'Waiting', 'Autobiography ', 850, 1, 'Ha Jin', 1234561212),
(1321321320, 'The Wildes', 'History', 600, 4, 'Louis Bayard', 1234561215),
(1340000000, 'Chill Factor', 'Thriller', 1050, 2, 'Sanra Brown', 1234561214),
(1345000000, 'Cruel Intent', 'Thriller', 2000, 6, 'J.A. Jance', 1234561214),
(1371371300, 'BIG', 'Science Fiction', 780, 4, 'Vashti Harrison', 1234561215),
(1381281300, 'Hillbilly Elegy', 'Fantasy', 4000, 3, 'J.D. Vance', 1234561216),
(1381281380, 'The Alchemist', 'History', 960, 6, 'Paulo Coelho', 1234561215),
(1400000000, 'Swimmy', 'Thriller', 440, 5, 'Leo Lionni', 1234561212),
(1701700000, 'Deja Brew', 'Mystery', 300, 2, 'Celestine Martin', 1234561215),
(1701701700, 'Famioy', 'self-help', 1600, 4, 'N.K. Jemisin', 1234561215),
(2000000000, 'Into The Grass', 'Fantasy', 670, 7, 'Trevor Noah', 1234561212);

-- --------------------------------------------------------

--
-- Table structure for table `contactno`
--

CREATE TABLE `contactno` (
  `User_id` int(10) NOT NULL,
  `PhoneNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactno`
--

INSERT INTO `contactno` (`User_id`, `PhoneNum`) VALUES
(1010101010, 1712163318),
(1111111111, 1309187620),
(1231231231, 1705514059),
(1241351879, 1611296659),
(1331331308, 1714390311),
(1331331334, 1827755455),
(1451451600, 1303471085),
(1451541230, 1792213077),
(1520152015, 1712163318),
(1532086062, 1744191755),
(1561461360, 1758212110),
(1561561659, 1855915518),
(1781780032, 1537530213),
(1791791790, 1323874128),
(1801801849, 1711244134),
(1894545043, 1516563635),
(1894545043, 1611806888);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `User_id` int(10) NOT NULL,
  `Email_address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`User_id`, `Email_address`) VALUES
(1010101010, 'antaratamoha@gmail.com'),
(1111111111, 'anisha.alam@gmail.com'),
(1231231231, 'atiyaibnat@gmail.com'),
(1241351879, 'maishakhan124@gmail.com'),
(1331331308, 'miftahuljan@gmail.com'),
(1331331334, 'barbie1234@gmail.com'),
(1331331334, 'sarahabarbie33@gmail.com'),
(1451451600, 'basoritabassum566@gmail.com'),
(1451541230, 'dipua6mohammad@gmail.com'),
(1520152015, 'ayshachoudhuryy@gmail.com'),
(1532086062, 'anikahossain76@gmail.com'),
(1561461360, 'bornaahmeddd743@gmail.com'),
(1561561659, 'saimoommohammad139@gmail.com'),
(1561561659, 'saimoommohammad@hotmail.com'),
(1781780032, 'ananya.paul@gmail.com'),
(1791791790, 'fahmidalvee@gmail.com'),
(1801801849, 'fahmidafarbin@gmail.com'),
(1894545043, 'aalokfahim@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `keeps_trackoff`
--

CREATE TABLE `keeps_trackoff` (
  `User_id` int(10) NOT NULL,
  `Staff_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keeps_trackoff`
--

INSERT INTO `keeps_trackoff` (`User_id`, `Staff_id`) VALUES
(1010101010, 1894545043),
(1111111111, 1894545043),
(1231231231, 1894545043),
(1241351879, 1781780032),
(1331331308, 1894545043),
(1331331334, 1532086062),
(1331331334, 1821820042),
(1451451600, 1781780032),
(1451541230, 1781780032),
(1520152015, 1821820042),
(1532086062, 1532086062),
(1532086062, 1894545043),
(1561461360, 1781780032),
(1561561659, 1781780032),
(1781780032, 1532086062),
(1791791790, 1894545043),
(1801801849, 1894545043),
(1894545043, 1532086062);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `Publisher_id` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`Publisher_id`, `Name`) VALUES
(1234561212, 'Penguin Random House'),
(1234561213, 'Macmillan'),
(1234561214, 'Simon & Schuster '),
(1234561215, 'Hachette'),
(1234561216, 'HarperCollins');

-- --------------------------------------------------------

--
-- Table structure for table `readers`
--

CREATE TABLE `readers` (
  `User_id` int(10) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LasteName` varchar(20) NOT NULL,
  `Address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `readers`
--

INSERT INTO `readers` (`User_id`, `FirstName`, `LasteName`, `Address`) VALUES
(1010101010, 'Antara', 'Tamoha', 'Uttara'),
(1111111111, 'Anisha', 'Alam', 'Dhanmondi'),
(1231231231, 'Atiya', 'Ibnat', 'Gulshan'),
(1241351879, 'Maisha', 'Khan', 'Bashundhara'),
(1331331308, 'Miftahul', 'Jannat', 'Banani'),
(1331331334, 'Sarah', 'Barbie', 'Uttara'),
(1451451600, 'Basori', 'Tabassum', 'Bashundhara'),
(1451541230, 'Dipu', 'Mohammad', 'Ashulia'),
(1520152015, 'Aysha', 'Choudhury', NULL),
(1532086062, 'Anika', 'Hossain', 'Ashulia'),
(1561461360, 'Borna', 'Ahmed', 'Mohakhali'),
(1561561659, 'Saimoom', 'Mohammad', 'Gulshan'),
(1781780032, 'Ananya', 'Paul', 'Badda'),
(1791791790, 'Fahmid', 'Alvee', 'Mirpur'),
(1801801849, 'Fahmida', 'Farbin', 'Ashulia'),
(1894545043, 'Aalok', 'Fahim', 'Mirpur');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `Reg_no` int(8) NOT NULL,
  `User_id` int(10) NOT NULL,
  `Staff_id` int(10) NOT NULL,
  `ISBN` int(10) NOT NULL,
  `Issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`Reg_no`, `User_id`, `Staff_id`, `ISBN`, `Issue_date`) VALUES
(12121230, 1241351879, 1532086062, 1231241250, '2024-05-30'),
(12121231, 1520152015, 1532086062, 1321321320, '2024-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `ReserveDate` date NOT NULL,
  `Duedate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `ISBN` int(10) NOT NULL,
  `User_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`ReserveDate`, `Duedate`, `ReturnDate`, `ISBN`, `User_id`) VALUES
('2024-02-16', '2024-04-27', '2024-04-26', 1231241250, 1241351879),
('2024-03-06', '2024-03-16', '2024-03-26', 1321321320, 1520152015),
('2024-03-14', '2024-03-26', '2024-03-24', 1234567890, 1331331334),
('2024-03-15', '2024-03-25', '2024-03-26', 1381281380, 1532086062),
('2024-03-16', '2024-03-09', '2024-03-08', 123000000, 1010101010),
('2024-04-16', '2024-04-19', '2024-04-17', 1321321320, 1894545043),
('2024-06-16', '2014-06-20', '2024-06-17', 1381281380, 1791791790),
('2024-07-03', '2024-07-16', '2024-07-16', 1234123450, 1331331308),
('2024-08-04', '2024-08-07', '2024-08-09', 1371371300, 1532086062),
('2024-08-16', '2024-08-20', '2024-08-30', 1200000000, 1231231231),
('2024-09-13', '2024-09-16', '2024-09-16', 1701701700, 1781780032);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_id` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_id`, `Name`) VALUES
(1532086062, 'Anika'),
(1781780032, 'Ananya'),
(1821820042, 'Kavi'),
(1894545043, 'Aalok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication system`
--
ALTER TABLE `authentication system`
  ADD PRIMARY KEY (`Login_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `contactno`
--
ALTER TABLE `contactno`
  ADD PRIMARY KEY (`User_id`,`PhoneNum`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`User_id`,`Email_address`);

--
-- Indexes for table `keeps_trackoff`
--
ALTER TABLE `keeps_trackoff`
  ADD PRIMARY KEY (`User_id`,`Staff_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`Publisher_id`);

--
-- Indexes for table `readers`
--
ALTER TABLE `readers`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`Reg_no`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`ReserveDate`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
