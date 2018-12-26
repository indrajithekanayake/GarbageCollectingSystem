-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2018 at 04:41 PM
-- Server version: 10.2.19-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GarbageCollectionSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `GuestMessages`
--

CREATE TABLE `GuestMessages` (
  `MessageNumber` int(11) NOT NULL,
  `GuestName` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GuestMessages`
--

INSERT INTO `GuestMessages` (`MessageNumber`, `GuestName`, `Email`, `Message`) VALUES
(1, 'as', 'asd@asd.com', 'asda'),
(2, 'Asiri Iroshan', 'asiriiroshan@hotmail.com', 'asdasdasdasdasdasdasda');

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE `Posts` (
  `PostNumber` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `PostTopic` varchar(100) NOT NULL,
  `PostDescription` varchar(250) NOT NULL,
  `ImageContent` longblob DEFAULT NULL,
  `ImageName` longblob DEFAULT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserDetails`
--

CREATE TABLE `UserDetails` (
  `UserName` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ContactNumber` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `UserType` varchar(10) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserDetails`
--

INSERT INTO `UserDetails` (`UserName`, `Email`, `ContactNumber`, `password`, `UserType`) VALUES
('asd', 'asdasd@sad.com', '0222222222', '$2y$10$2XJ6tiqy6qMXeqTVO8LcPeOIIkYLa7YOnCf6FnvZJ2K1nIpQ4.Hry', 'normal'),
('Ashvinda', 'ashvindajayanathranasinghe@gmail.com', '0713083296', '$2y$10$AyTf/31z1qk9c2RqD7Q9wO1Ua7uG4hIuMvoo0GjM5eWk.Wd2HxTv6', 'normal'),
('Asiri', 'asiriiroshan@hotmail.com', '0768386669', '$2y$10$1iIiPWUPexaqavI8kV30J.ZUsQ8KpsFMtPn1SvNSysFxl9nvSIkty', 'admin'),
('Ayesh', 'ayesh@dulanja.com', '0365241578', '$2y$10$qOs8iXpLmr8WIdIVl69YsO8c/yArW78eDg9FUvErv03ly3OyTt1cG', 'normal'),
('Boobamba', 'bla@vampire.com', '0365241258', '$2y$10$gOOrDiDYc0/7bJUTwnkZwOqVs2qMvw21V4D1/9LO.Sw3WjgTktTDq', 'normal'),
('GasGemba', 'asd@a.com', '0885965845', '$2y$10$73my2ijnA2In8c.zrqbPo.F5jYAVkX4O6/ASa44lXmY5teFshfA5y', 'normal'),
('Iroshan', 'iroshan@gmail.com', '0332294189', '$2y$10$6vVP3vz9DM5qt5N5uUzzA.R/HUVdffZxBUN7i5FZtf22lckUUqb7O', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GuestMessages`
--
ALTER TABLE `GuestMessages`
  ADD PRIMARY KEY (`MessageNumber`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`PostNumber`),
  ADD KEY `fk_UserName` (`UserName`);

--
-- Indexes for table `UserDetails`
--
ALTER TABLE `UserDetails`
  ADD PRIMARY KEY (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `GuestMessages`
--
ALTER TABLE `GuestMessages`
  MODIFY `MessageNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `PostNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `fk_UserName` FOREIGN KEY (`UserName`) REFERENCES `UserDetails` (`UserName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
