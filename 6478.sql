-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2017 at 06:11 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `6478`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `NAMA_BARANG` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `JUMLAH_BARANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `NAMA_BARANG`, `HARGA_BARANG`, `JUMLAH_BARANG`) VALUES
(3, 'xcv', 22, 33);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID_COMMENT` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ISI_COMMENT` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID_COMMENT`, `ID_BARANG`, `ID_USER`, `ISI_COMMENT`, `TIMESTAMP`) VALUES
(1, 3, 1, 'Isi Comment', '2017-10-12 04:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `NAME_USER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `USERNAME_USER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD_USER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL_USER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `STATUS_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAME_USER`, `USERNAME_USER`, `PASSWORD_USER`, `EMAIL_USER`, `STATUS_USER`) VALUES
(1, 'aa', 'sukasuka', 'qwer1234', 'a@a.com', 1),
(2, 'aaa', 'niyaayus', 'asdf1234', 'm@m.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_barang`
--

CREATE TABLE `user_barang` (
  `ID_USER` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID_COMMENT`),
  ADD KEY `FK_BARANG_COMMENT` (`ID_BARANG`),
  ADD KEY `FK_USER_COMMENT` (`ID_USER`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `user_barang`
--
ALTER TABLE `user_barang`
  ADD PRIMARY KEY (`ID_USER`,`ID_BARANG`),
  ADD KEY `FK_USER_BARANG2` (`ID_BARANG`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_BARANG_COMMENT` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_USER_COMMENT` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `user_barang`
--
ALTER TABLE `user_barang`
  ADD CONSTRAINT `FK_USER_BARANG` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_USER_BARANG2` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
