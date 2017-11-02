-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 07:30 PM
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

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `NAMA_BARANG` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `JUMLAH_BARANG` int(11) NOT NULL,
  `HOT_BARANG` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `NAMA_BARANG`, `HARGA_BARANG`, `JUMLAH_BARANG`, `HOT_BARANG`) VALUES
(11, 'rinso', 5000, 50, 0),
(12, 'wasabi', 3000, 20, 0),
(13, 'ayam', 1000, 30, 0),
(14, 'keset', 4000, 40, 0),
(15, 'gitar', 5000, 5, 0),
(16, 'buku', 7000, 700, 0),
(17, 'laptop', 5000, 50, 0),
(18, 'xiaomi', 40000, 400, 0),
(19, 'botol', 3000, 30, 0),
(20, 'post it', 6000, 60, 0);

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
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID_COMMENT`, `ID_BARANG`, `ID_USER`, `ISI_COMMENT`, `TIMESTAMP`) VALUES
(10, 13, 17, 'whoa chicken', '2017-11-01 18:27:37'),
(11, 14, 21, 'keset bagus', '2017-11-01 18:27:37'),
(12, 16, 10, 'bacalah,bacalah,bacalah,merdeka!', '2017-11-01 18:27:37'),
(13, 17, 18, 'wahh dunia modern', '2017-11-01 18:27:37'),
(14, 15, 13, 'don\'t leave me dryyy', '2017-11-01 18:27:37'),
(15, 12, 21, 'pedes', '2017-11-01 18:27:37'),
(16, 18, 15, 'hp baru cuy', '2017-11-01 18:27:37'),
(17, 20, 15, 'tempel pesan', '2017-11-01 18:27:37'),
(18, 19, 20, 'kini aku bisa minum', '2017-11-01 18:27:37'),
(19, 16, 9, 's7 cuy', '2017-11-01 18:27:37');

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
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_user`
--

INSERT INTO `contact_user` (`ID_CONTACT`, `ID_USER`, `SUBJECT_CONTACT`, `ISI_CONTACT`, `TIMESTAMP`) VALUES
(6, 18, 'important', 'just trolling lol', '2017-11-01 18:23:39'),
(7, 16, 'ntap', 'ntap juga', '2017-11-01 18:23:39'),
(8, 19, 'wah dunia modern', 'wah aku terkesima', '2017-11-01 18:23:39'),
(9, 17, 'pale blue dot', 'Look again at that dot. That\'s here. That\'s home. That\'s us. ', '2017-11-01 18:23:39'),
(10, 20, 'woi', 'berjasa banget w', '2017-11-01 18:23:39'),
(11, 21, 'lagu', 'aku cah kerjo', '2017-11-01 18:23:39'),
(12, 12, 'apa iya?', 'apa betul?', '2017-11-01 18:23:39'),
(13, 9, 'lagu', 'sayang,opo kowe krungu?', '2017-11-01 18:23:39'),
(14, 15, 'lanjut', 'jerite atiku', '2017-11-01 18:23:39'),
(15, 11, 'despacito', 'bosen', '2017-11-01 18:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

DROP TABLE IF EXISTS `iklan`;
CREATE TABLE `iklan` (
  `ID_IKLAN` int(11) NOT NULL,
  `JUDUL_IKLAN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ISI_IKLAN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`ID_IKLAN`, `JUDUL_IKLAN`, `ISI_IKLAN`, `TIMESTAMP`) VALUES
(4, 'woroworo', 'OII', '2017-11-01 18:20:00'),
(5, 'curhat', 'needed kasih sayang plis', '2017-11-01 18:20:00'),
(6, 'sad:(', 'sadboi:(', '2017-11-01 18:20:00'),
(7, 'sad juga:(', 'sadgirl:(', '2017-11-01 18:20:00'),
(8, 'laper', 'laperz', '2017-11-01 18:20:00'),
(9, 'omg', 'did you know? no.', '2017-11-01 18:20:00'),
(10, 'ini iklan', 'dijual rumah tapi boong', '2017-11-01 18:20:00'),
(11, 'lucu kamu', 'iya kamu', '2017-11-01 18:20:00'),
(12, 'iklan lagi', 'dasar spam', '2017-11-01 18:20:00'),
(13, 'okelah', 'jadi ini iklan?', '2017-11-01 18:20:00');

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
  `CREDIT_USER` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAME_USER`, `USERNAME_USER`, `PASSWORD_USER`, `EMAIL_USER`, `STATUS_USER`, `CREDIT_USER`) VALUES
(9, 'niya', 'niyaniya', 'niya123', 'a@mail.com', 0, 0),
(10, 'pram', 'prampram', 'pram123', 'b@mail.com', 1, 0),
(11, 'susi', 'susisusi', 'susi1234', 'c@mail.com', 1, 0),
(12, 'malaka', 'malamala', 'mala1234', 'b@mail.com', 1, 0),
(13, 'thom yorke', 'radioradio', 'radio1234', 'c@mail.com', 1, 0),
(14, 'budi', 'budibudi', 'budi1234', 'c@mail.com', 1, 0),
(15, 'angga', 'anggaangga', 'angga1234', 'd@mail.com', 1, 0),
(16, 'john', 'johnjohn', 'john1234', 'e@mail.com', 1, 0),
(17, 'Carl Sagan', 'carlcarl', 'carl1234', 'f@mail.com', 1, 0),
(18, 'Ada Lovelace', 'adaladal', 'adal1234', 'g@mail.com', 1, 0),
(19, 'Alan Turing', 'alanalan', 'alan1234', 'h@mail.com', 1, 0),
(20, 'John von Neumann', 'johnjohn', 'john1234', 'i@mail.com', 1, 0),
(21, 'Nella Kharisma', 'nellanella', 'nella1234', 'j@mail.com', 1, 0);

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
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contact_user`
--
ALTER TABLE `contact_user`
  MODIFY `ID_CONTACT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `ID_IKLAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
