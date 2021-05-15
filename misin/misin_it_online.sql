-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2020 at 10:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post`
--

-- --------------------------------------------------------

--
-- Table structure for table `misin_it_online`
--

CREATE TABLE `misin_it_online` (
  `counter` int(11) NOT NULL,
  `misin_day` varchar(10) NOT NULL,
  `misin_date` varchar(11) NOT NULL,
  `id` int(11) NOT NULL,
  `it_name` varchar(255) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `money_code` int(5) NOT NULL,
  `post_group` varchar(50) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `misin_type` varchar(5) NOT NULL,
  `start_time` varchar(5) NOT NULL,
  `end_time` varchar(5) NOT NULL,
  `Network_Status` varchar(10) NOT NULL,
  `Network_points` varchar(10) NOT NULL,
  `3G` varchar(15) NOT NULL,
  `LL` varchar(15) NOT NULL,
  `num_pc` int(3) NOT NULL,
  `num_monitor` int(3) NOT NULL,
  `num_printer` int(3) NOT NULL,
  `num_pos_post` int(3) NOT NULL,
  `num_pos_efinance` int(3) NOT NULL,
  `num_scale` int(3) NOT NULL,
  `num_printer_parcode` int(3) NOT NULL,
  `num_parcode_scanner` int(3) NOT NULL,
  `pc_damage` varchar(10) NOT NULL,
  `pc_prog` varchar(10) NOT NULL,
  `pc_os` varchar(10) NOT NULL,
  `pc_domain` varchar(10) NOT NULL,
  `num_pc_domain` int(3) NOT NULL,
  `domain_name` varchar(15) NOT NULL,
  `note_not_domain` varchar(100) NOT NULL,
  `shm` varchar(30) NOT NULL,
  `mn` varchar(30) NOT NULL,
  `hf` varchar(30) NOT NULL,
  `th` varchar(30) NOT NULL,
  `et` varchar(30) NOT NULL,
  `tw` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `bo` varchar(30) NOT NULL,
  `fo` varchar(30) NOT NULL,
  `khh` varchar(30) NOT NULL,
  `am` varchar(20) NOT NULL,
  `mnsh` varchar(20) NOT NULL,
  `hkh` varchar(20) NOT NULL,
  `des` varchar(20) NOT NULL,
  `toner` varchar(15) NOT NULL,
  `dram` varchar(20) NOT NULL,
  `keyboard` varchar(15) NOT NULL,
  `mouse` varchar(15) NOT NULL,
  `barscan` varchar(15) NOT NULL,
  `pc` varchar(15) NOT NULL,
  `monitor` varchar(15) NOT NULL,
  `printer` varchar(15) NOT NULL,
  `does` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `misin_it_online`
--
ALTER TABLE `misin_it_online`
  ADD UNIQUE KEY `counter` (`counter`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `misin_it_online`
--
ALTER TABLE `misin_it_online`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
