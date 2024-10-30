-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2024 at 08:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serviceclient`
--
CREATE DATABASE IF NOT EXISTS `serviceclient` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `serviceclient`;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(8) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `telepon`) VALUES
('111', 'test345', 'test', '0851624892'),
('1247012', 'Ghani', 'Blitar, Jawa Timur', '084218411132'),
('1298712', 'Aqila Nur Habibah', 'Blitar, Jawa Timur', '08641244642'),
('13650123', 'Rahma Dita', 'Malang, Jawa Timur', '08516663314'),
('13650125', 'Ahmad Ridho', 'Legok, Tangerang', '0814152334'),
('13650126', 'Santi Sanata', 'Jakarta, Kuningan', '08516663312'),
('14650009', 'Ana Safitri', 'Blitar, Jawa Timur', '08516663314'),
('14650011', 'Ratna', 'Bogor, Jawa Barat', '08516663415'),
('15650123', 'Ahmad Syafi\'i ', 'Magelang, Jawa Tengah', '085166423841');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
