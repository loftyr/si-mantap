-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 03:55 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simantap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_pegawai`
--

CREATE TABLE `tbl_data_pegawai` (
  `UID` int(11) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `NIP` varchar(250) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Berkala_Terakhir` varchar(250) NOT NULL,
  `Pangkat_Terakhir` varchar(250) NOT NULL,
  `No_Hp` int(11) NOT NULL,
  `Create_at` datetime NOT NULL,
  `Update_at` datetime DEFAULT NULL,
  `Delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data_pegawai`
--
ALTER TABLE `tbl_data_pegawai`
  ADD PRIMARY KEY (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
