-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 05:13 AM
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
(11, 'rinso', 5000, 50, 1),
(12, 'wasabi', 3000, 20, 0),
(13, 'ayam', 1000, 30, 0),
(14, 'keset', 4000, 40, 0),
(15, 'gitar', 5000, 5, 0),
(16, 'buku', 7000, 700, 0),
(17, 'laptop', 5000, 50, 0),
(18, 'xiaomi', 40000, 400, 0),
(19, 'botol', 3000, 30, 0),
(20, 'postit', 6000, 60, 0);

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
(19, 16, 9, 's7 cuy', '2017-11-01 18:27:37'),
(30, 17, 18, 'norak lu', '2017-11-01 19:09:20'),
(31, 17, 18, 'eh komen diri sendiri', '2017-11-01 19:09:30'),
(32, 12, 18, 'sambalado', '2017-11-01 19:53:08'),
(33, 11, 18, 'wow', '2017-11-01 19:57:55'),
(34, 12, 18, 'wih', '2017-11-01 19:58:33'),
(35, 15, 18, 'komen ah', '2017-11-01 19:58:52'),
(36, 14, 18, 'bagus', '2017-11-01 20:00:12'),
(37, 16, 18, 'wih', '2017-11-01 20:01:10'),
(38, 16, 18, 'saya lagi', '2017-11-01 20:01:40'),
(39, 18, 18, 'oke juga', '2017-11-01 20:01:55'),
(40, 18, 18, 'ya bagus', '2017-11-01 20:02:12'),
(41, 18, 18, 'ya bagus', '2017-11-01 20:07:37'),
(42, 19, 18, 'aku juga', '2017-11-01 20:07:53'),
(43, 11, 18, 'yey', '2017-11-01 20:08:19'),
(44, 17, 18, 'aku doang yg komen nih?', '2017-11-01 20:10:55'),
(45, 12, 18, 'sushi!', '2017-11-01 20:11:08'),
(46, 11, 18, 'wow\r\n', '2017-11-01 20:14:07'),
(47, 13, 18, 'wih', '2017-11-01 20:14:21'),
(48, 13, 18, 'ayam goreng', '2017-11-01 20:24:57'),
(49, 20, 18, 'iya', '2017-11-01 20:25:28'),
(50, 19, 18, 'komen dulu\r\n', '2017-11-01 20:25:56'),
(51, 16, 18, 'oke', '2017-11-01 20:34:59'),
(52, 11, 18, 'hore\r\n', '2017-11-01 20:35:12'),
(53, 12, 18, 'enak', '2017-11-01 20:38:16'),
(54, 11, 18, 'ntap', '2017-11-01 22:11:50'),
(55, 13, 18, 'ayam', '2017-11-01 22:22:51'),
(56, 11, 18, 'bersih', '2017-11-01 22:41:20'),
(57, 12, 18, 'aa', '2017-11-01 22:55:07'),
(58, 12, 18, 'aa', '2017-11-01 22:55:17'),
(59, 12, 18, 'aa', '2017-11-01 22:55:21'),
(60, 12, 18, 'sf', '2017-11-01 22:55:27'),
(61, 13, 18, 'ok', '2017-11-01 22:55:53'),
(62, 13, 18, 'Isi Commsent', '2017-11-01 22:56:25'),
(63, 13, 18, 's', '2017-11-01 22:56:28'),
(64, 14, 18, 'ff', '2017-11-01 22:56:39'),
(65, 17, 18, 'ok', '2017-11-01 23:03:24'),
(66, 19, 18, 'wh', '2017-11-01 23:03:58'),
(67, 19, 18, 'boleh?', '2017-11-01 23:04:04'),
(68, 14, 18, 'spam', '2017-11-01 23:04:15'),
(69, 14, 18, 'boleh\r\n', '2017-11-01 23:05:09'),
(70, 14, 18, 'keset', '2017-11-01 23:05:23'),
(71, 16, 18, 't', '2017-11-01 23:05:34'),
(72, 16, 18, 'comm', '2017-11-01 23:10:29'),
(73, 12, 18, 's', '2017-11-01 23:10:47'),
(74, 11, 18, 'hey', '2017-11-01 23:27:22'),
(75, 14, 18, 'f', '2017-11-01 23:27:50'),
(76, 14, 18, 'seharusnya hilang', '2017-11-01 23:28:02'),
(77, 15, 18, 'sf', '2017-11-01 23:28:20'),
(78, 18, 18, 'f', '2017-11-01 23:29:13'),
(79, 16, 18, 's', '2017-11-01 23:29:51'),
(80, 16, 18, 'f', '2017-11-01 23:30:00'),
(81, 15, 18, 'bisa', '2017-11-01 23:31:55'),
(82, 18, 18, 'x', '2017-11-01 23:32:06'),
(83, 19, 18, 'f', '2017-11-01 23:32:22'),
(84, 19, 18, '-_-', '2017-11-01 23:32:31'),
(85, 11, 18, 'yay', '2017-11-01 23:32:43'),
(86, 11, 18, 'yay', '2017-11-01 23:36:20'),
(87, 11, 18, 'y', '2017-11-01 23:36:40'),
(88, 12, 18, 's', '2017-11-01 23:36:54'),
(89, 11, 18, 'fff', '2017-11-01 23:38:22'),
(90, 15, 18, 'ff', '2017-11-01 23:38:36'),
(91, 15, 18, 'dd', '2017-11-01 23:38:51'),
(92, 11, 18, 'w', '2017-11-01 23:43:02'),
(93, 13, 18, 'wih', '2017-11-01 23:43:17'),
(94, 15, 18, 's', '2017-11-01 23:44:13'),
(95, 14, 18, 'f', '2017-11-01 23:45:04'),
(96, 16, 18, 'ss', '2017-11-01 23:46:49'),
(97, 20, 18, 'f', '2017-11-01 23:50:14'),
(98, 18, 18, 'f', '2017-11-01 23:51:25'),
(99, 13, 18, 'f', '2017-11-01 23:51:35'),
(100, 19, 18, 'yay', '2017-11-02 00:00:49'),
(101, 14, 18, 'ss', '2017-11-02 00:02:07'),
(102, 12, 18, 'wasabi\r\n', '2017-11-02 00:02:21'),
(103, 12, 18, 's', '2017-11-02 00:02:32'),
(104, 13, 18, 'hey', '2017-11-02 00:02:45'),
(105, 19, 18, 'hey', '2017-11-02 00:04:37'),
(106, 16, 18, 'buku', '2017-11-02 00:04:47'),
(107, 14, 18, 'f', '2017-11-02 00:04:58'),
(108, 17, 18, 'f', '2017-11-02 00:05:08'),
(109, 20, 18, 'w', '2017-11-02 00:05:24'),
(110, 11, 18, 't', '2017-11-02 00:10:17'),
(111, 12, 18, 'f', '2017-11-02 00:11:19'),
(112, 14, 18, 'kk', '2017-11-02 00:11:32'),
(113, 17, 18, 'af', '2017-11-02 00:11:48'),
(114, 15, 18, 'dd', '2017-11-02 00:12:01'),
(115, 16, 18, 'f', '2017-11-02 00:13:23'),
(116, 20, 18, 'ww', '2017-11-02 00:15:45'),
(117, 20, 18, 'ww', '2017-11-02 00:16:29'),
(118, 13, 18, 'f', '2017-11-02 00:19:51'),
(119, 11, 18, 'rinso\r\n', '2017-11-02 00:20:03'),
(120, 12, 18, 'f', '2017-11-02 00:20:15'),
(121, 15, 18, 'f', '2017-11-02 00:20:24'),
(122, 18, 18, 'x', '2017-11-02 00:20:35'),
(123, 14, 18, 'k\r\n', '2017-11-02 00:20:56'),
(124, 19, 18, 'f', '2017-11-02 00:21:10'),
(125, 20, 18, 's', '2017-11-02 00:29:30'),
(126, 14, 18, 'mm', '2017-11-02 00:29:43'),
(127, 15, 18, 'ss', '2017-11-02 00:29:58'),
(128, 16, 18, 'd', '2017-11-02 00:30:08'),
(129, 12, 18, 's', '2017-11-02 00:43:31'),
(130, 13, 18, 'd', '2017-11-02 00:43:43'),
(131, 16, 18, 'd', '2017-11-02 00:44:05'),
(132, 16, 18, 'd', '2017-11-02 00:44:17'),
(133, 13, 18, 's', '2017-11-02 00:44:29'),
(134, 13, 18, 'd', '2017-11-02 00:44:39'),
(135, 19, 18, 's', '2017-11-02 00:47:40'),
(136, 11, 18, 's', '2017-11-02 00:47:50'),
(137, 11, 18, 's', '2017-11-02 00:47:58'),
(138, 15, 18, 's', '2017-11-02 00:48:08'),
(139, 18, 18, 's', '2017-11-02 00:48:18'),
(140, 13, 18, 'Isdt', '2017-11-02 00:48:31'),
(141, 19, 18, 'd', '2017-11-02 00:48:48'),
(142, 19, 18, 'Isi Commentd', '2017-11-02 00:49:37'),
(143, 11, 18, 'Isi Commentd', '2017-11-02 00:49:46'),
(144, 14, 18, 'd', '2017-11-02 00:53:06'),
(145, 14, 18, 'd', '2017-11-02 00:53:16'),
(146, 14, 18, 'd', '2017-11-02 00:54:07'),
(147, 11, 18, 'a', '2017-11-02 00:54:16'),
(148, 13, 18, 'd', '2017-11-02 00:56:20'),
(149, 14, 18, 'd', '2017-11-02 00:56:31'),
(150, 17, 18, 'dd', '2017-11-02 01:00:04'),
(151, 13, 18, 'd', '2017-11-02 01:00:21'),
(152, 14, 18, 'd', '2017-11-02 01:02:37'),
(153, 13, 18, 'f', '2017-11-02 01:02:45'),
(154, 13, 18, 'd', '2017-11-02 01:04:46'),
(155, 11, 18, 'd', '2017-11-02 01:27:48'),
(156, 13, 18, 'a', '2017-11-02 01:32:30'),
(157, 16, 18, 'buku', '2017-11-02 01:32:45'),
(158, 16, 18, 'Isi Commdent', '2017-11-02 01:33:00'),
(159, 12, 18, 'd', '2017-11-02 01:33:15'),
(160, 12, 18, 's', '2017-11-02 01:34:15'),
(161, 13, 18, 'ayam', '2017-11-02 01:37:03'),
(162, 11, 18, 'Isi Comment', '2017-11-02 01:37:14'),
(163, 12, 18, 's', '2017-11-02 01:37:28'),
(164, 14, 18, 'ddd', '2017-11-02 01:37:39'),
(165, 13, 18, 's', '2017-11-02 01:38:12'),
(166, 14, 18, 'ee', '2017-11-02 01:42:09'),
(167, 11, 18, 'lc', '2017-11-02 01:42:22'),
(168, 13, 18, 'Isi Commendt', '2017-11-02 01:42:45'),
(169, 11, 18, 'dment', '2017-11-02 01:43:09'),
(170, 11, 18, 's', '2017-11-02 01:43:29'),
(171, 12, 18, 'Isi Commentenak', '2017-11-03 06:47:22'),
(172, 11, 18, 'www', '2017-11-03 06:48:08'),
(173, 13, 10, 'hey', '2017-11-08 15:50:38'),
(174, 12, 10, 'fff', '2017-11-08 15:50:52'),
(175, 14, 10, 'Isi Comment', '2017-11-08 15:51:14'),
(176, 11, 10, 'Isi Comments', '2017-11-08 19:13:57'),
(177, 12, 10, 'www', '2017-11-09 01:19:51'),
(178, 17, 18, 'test', '2017-11-09 03:09:19'),
(179, 11, 10, 'ey', '2017-11-09 03:40:51'),
(180, 11, 10, 'ss', '2017-11-09 03:46:29'),
(181, 11, 10, 'aa', '2017-11-09 03:46:34'),
(182, 12, 10, 'wasabi!', '2017-11-09 03:46:49'),
(183, 14, 10, 'keset', '2017-11-09 03:47:08'),
(184, 13, 10, 'hayam gorenggg', '2017-11-09 03:47:35'),
(185, 15, 10, 'ss', '2017-11-09 03:49:43'),
(186, 16, 10, 'ss', '2017-11-09 03:50:49');

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
(15, 11, 'despacito', 'bosen', '2017-11-01 18:23:39'),
(16, 18, 'dd', 'dd', '2017-11-02 01:43:51'),
(17, 10, 'sdfs', 'ss', '2017-11-09 03:55:41');

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
(21, 'Nella Kharisma', 'nellanella', 'nella1234', 'j@mail.com', 1, 0),
(22, 'oi', 'Halohalo', 'asdf1234', 'halo@mail.com', 1, 0),
(23, 'oioi', 'Mishamisha', 'qwer1234', 'misha@mail.com', 1, 0),
(24, 'poly', 'polypoly', 'qwer1234', 'poly@mail.com', 1, 0),
(25, 'tyui', 'tyuityui', 'tyui1234', 'tyui@mail.com', 1, 0),
(26, 'yaelah', 'cobacoba', 'coba1234', 'coba@mail.com', 1, 0);

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
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `contact_user`
--
ALTER TABLE `contact_user`
  MODIFY `ID_CONTACT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `ID_IKLAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
