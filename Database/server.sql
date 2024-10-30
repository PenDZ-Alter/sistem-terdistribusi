-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2024 at 08:32 AM
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
-- Database: `serviceserver`
--
CREATE DATABASE IF NOT EXISTS `serviceserver` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `serviceserver`;

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
('13650123', 'Rahma Dita', 'Malang, Jawa Timur', '08516663314'),
('13650126', 'Santi Sanata', 'Jakarta, Kuningan', '08516663312'),
('13650125', 'Ahmad Ridho', 'Legok, Tangerang', '0814152334'),
('14650009', 'Ana Safitri', 'Blitar, Jawa Timur', '08516663314'),
('14650011', 'Ratna', 'Bogor, Jawa Barat', '08516663415'),
('15650123', 'Ahmad Syafi\'i ', 'Magelang, Jawa Tengah', '085166423841'),
('1298712', 'Aqila Nur Habibah', 'Blitar, Jawa Timur', '08641244642'),
('1247012', 'Ghani', 'Blitar, Jawa Timur', '084218411132');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` char(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `pin` char(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `pin`) VALUES
('111', 'AHMAD', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `toko`
--
CREATE DATABASE IF NOT EXISTS `toko` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `toko`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`) VALUES
(111, 'Pensil'),
(222, 'Penghapus'),
(333, 'Buku Paket'),
(444, 'Papan'),
(555, 'Tas'),
(777, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pin` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `pin`) VALUES
('111', 'Muhammad', 'bcbe3365e6ac95ea2c0343a2395834dd'),
('i1', 'test-noenc', '12341234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=778;
--
-- Database: `uts`
--
CREATE DATABASE IF NOT EXISTS `uts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uts`;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `telepon`, `email`, `alamat`, `jenis_kelamin`) VALUES
(111, 'Ahmad Darwin', '0862147211', 'darwin@gmail.com', 'Malang', 'Perempuan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
