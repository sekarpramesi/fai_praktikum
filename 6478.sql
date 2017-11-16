-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 04:32 AM
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
CREATE DATABASE IF NOT EXISTS `6478` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `6478`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `NAMA_BARANG` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `JUMLAH_BARANG` int(11) NOT NULL,
  `HOT_BARANG` int(1) NOT NULL DEFAULT '0',
  `BARANG_FILE` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `NAMA_BARANG`, `HARGA_BARANG`, `JUMLAH_BARANG`, `HOT_BARANG`, `BARANG_FILE`) VALUES
(1, 'rinso', 7000, 12, 1, 'download.jpg'),
(2, 'buku', 9000, 22, 1, '1398034.jpg'),
(3, 'gitar', 5000, 34, 1, 'CORT-Gitar-Akustik-AC-100-OP-Open-Pore-SKU00216236-2016115105142.jpg'),
(4, 'laptop', 5554, 23, 0, 'laptop.png'),
(5, 'roti', 4566, 4, 0, 'roti.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `ID_COMMENT` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ISI_COMMENT` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `COMMENT_FILE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID_COMMENT`, `ID_BARANG`, `ID_USER`, `ISI_COMMENT`, `COMMENT_FILE`, `TIMESTAMP`) VALUES
(1, 1, 1, 'troll', 'kom2.jpg', '2017-11-16 03:28:45'),
(2, 2, 1, 'hehe', 'kom3.jpg', '2017-11-16 03:29:02'),
(3, 3, 1, 'what', 'kom4.jpg', '2017-11-16 03:29:14'),
(4, 4, 1, 'aaaa', 'kom5.jpg', '2017-11-16 03:29:40'),
(5, 3, 1, 'hehe', NULL, '2017-11-16 03:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact_user`
--

DROP TABLE IF EXISTS `contact_user`;
CREATE TABLE `contact_user` (
  `ID_CONTACT` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `SUBJECT_CONTACT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ISI_CONTACT` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `CONTACT_FILE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_user`
--

INSERT INTO `contact_user` (`ID_CONTACT`, `ID_USER`, `SUBJECT_CONTACT`, `ISI_CONTACT`, `CONTACT_FILE`, `TIMESTAMP`) VALUES
(5, 1, ':(', 'sadboi', 'con5.png', '2017-11-16 03:30:10'),
(6, 1, 'again', 'ss', 'con4.jpg', '2017-11-16 03:30:30'),
(7, 4, ':((', 'ssss', 'con3.jpg', '2017-11-16 03:30:51'),
(8, 4, 'nooo', 'yes', 'con41.jpg', '2017-11-16 03:31:03'),
(9, 5, 'hey', 'ss', 'con2.png', '2017-11-16 03:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

DROP TABLE IF EXISTS `iklan`;
CREATE TABLE `iklan` (
  `ID_IKLAN` int(11) NOT NULL,
  `JUDUL_IKLAN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ISI_IKLAN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FILE_IKLAN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`ID_IKLAN`, `JUDUL_IKLAN`, `ISI_IKLAN`, `FILE_IKLAN`, `TIMESTAMP`) VALUES
(1, 'hehe', 'meme', 'kom1.jpg', '2017-11-16 03:25:14'),
(2, 'yayayaya', 'ini iklan', 'ad1.jpg', '2017-11-16 03:25:33'),
(3, 'sss', 'gee', 'ad4.jpg', '2017-11-16 03:25:57'),
(4, 'sss', 'gaaa', 'ad5.jpg', '2017-11-16 03:26:11'),
(5, 'aaa', 'ttt', 'ad3.jpeg', '2017-11-16 03:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `NAME_USER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `USERNAME_USER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD_USER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL_USER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `STATUS_USER` int(11) NOT NULL DEFAULT '1',
  `FILE_USER` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CREDIT_USER` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAME_USER`, `USERNAME_USER`, `PASSWORD_USER`, `EMAIL_USER`, `STATUS_USER`, `FILE_USER`, `CREDIT_USER`) VALUES
(1, 'John Mayer', 'johnjohn', 'asdf1234', 'j@m.com', 1, 'pQC2vwZT.jpg', 0),
(2, 'Gal Gadot', 'galggalg', 'asdf1234', 'g@m.com', 1, 'gal.jpg', 0),
(3, 'Pramoedya Ananta Toer', 'prampram', 'asdf1234', 'p@mail.com', 1, 'pram.jpg', 0),
(4, 'Ada Lovelace', 'adaladal', 'asdf1234', 'ad@m.com', 1, 'ada.jpg', 0),
(5, 'David Gilmour', 'daviddavid', 'asdf1234', 'd@mail.com', 1, 'david.jpg', 0);

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
-- Indexes for table `contact_user`
--
ALTER TABLE `contact_user`
  ADD PRIMARY KEY (`ID_CONTACT`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`ID_IKLAN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_user`
--
ALTER TABLE `contact_user`
  MODIFY `ID_CONTACT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `ID_IKLAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `contact_user`
--
ALTER TABLE `contact_user`
  ADD CONSTRAINT `contact_user_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
