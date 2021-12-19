-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2018 at 10:36 PM
-- Server version: 10.1.26-MariaDB-1
-- PHP Version: 7.0.22-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `id_pengelola` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `biaya` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `id_transaksi`, `id_lapangan`, `id_pengelola`, `id_user`, `date`, `time`, `biaya`) VALUES
(24, 18, 14, 'fahrul', 'andi', '2021-12-19', '10:00:00', 100000),
(26, 19, 13, 'anggi', 'andi', '2021-12-20', '07:00:00', 120000),
(27, 19, 13, 'anggi', 'andi', '2021-12-20', '08:00:00', 120000),
(28, 20, 12, 'nurul', 'andi', '2021-12-21', '13:00:00', 100000),
(29, 20, 12, 'nurul', 'andi', '2021-12-21', '14:00:00', 100000),
(30, 21, 12, 'nurul', 'jamal', '2021-12-19', '20:00:00', 100000),
(31, 21, 12, 'nurul', 'jamal', '2021-12-19', '21:00:00', 100000),
(32, 22, 13, 'anggi', 'jamal', '2021-12-20', '20:00:00', 120000),
(33, 22, 13, 'anggi', 'jamal', '2021-12-20', '21:00:00', 120000),
(34, 23, 14, 'fahrul', 'jamal', '2021-12-21', '21:00:00', 100000),
(35, 23, 14, 'fahrul', 'jamal', '2021-12-21', '22:00:00', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(11) NOT NULL,
  `id_pengelola` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text,
  `deskripsi` text,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `foto` varchar(500) NOT NULL,
  `biaya` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `id_pengelola`, `nama`, `alamat`, `deskripsi`, `lat`, `lng`, `foto`, `biaya`) VALUES
(12, 'nurul', 'Accasia', 'PANAM', 'REGULER', 0.475222, 101.359, 'acassia.jpg', 100000),
(13, 'anggi', 'Elang', 'PANAM', 'VIP', 0.462725, 101.357, 'elang.png', 120000),
(14, 'fahrul', 'Laliga', 'PANAM', 'REGULER', 0.467446, 101.352, 'laliga.png', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `deskripsi` text,
  `id_pengelola` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id`, `nama`, `foto`, `deskripsi`, `id_pengelola`) VALUES
(1, 'Elang', 'elang.png', 'PROMO TAHUN BARU DISC 5% (1 - 2 Januari)', 'anggi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `id_pengelola` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` text,
  `total_biaya` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_lapangan`, `id_pengelola`, `id_user`, `date`, `time`, `total_biaya`) VALUES
(18, 14, 'fahrul', 'andi', '2021-12-19', '10:00:00|11:00:00|', 200000),
(19, 13, 'anggi', 'andi', '2021-12-20', '07:00:00|08:00:00|', 240000),
(20, 12, 'nurul', 'andi', '2021-12-21', '13:00:00|14:00:00|', 200000),
(21, 12, 'nurul', 'jamal', '2021-12-19', '20:00:00|21:00:00|', 200000)
(22, 13, 'anggi', 'jamal', '2021-12-20', '20:00:00|21:00:00|', 240000),
(23, 14, 'fahrul', 'jamal', '2021-12-21', '21:00:00|22:00:00|', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `nama`, `hp`, `foto`, `alamat`) VALUES
('Admin', '123', 'admin', 'Administrator', '082390945175', 'person.png', 'MARPOYAN'),
('Andi', '123', 'user', 'Andi', '081378019836', 'person.png', 'PANAM'),
('Anggi', '123', 'pengelola', 'Anggi', '089623132421', 'anggi.jpeg', 'PANAM'),
('Fahrul', '123', 'pengelola', 'Fahrul', '089623545562', 'fahrul.jpg', 'PANAM'),
('Jamal', '123', 'user', 'Jamal', '089234912342', 'person.png', 'PANAM'),
('Nurul', '123', 'pengelola', 'Nurul', '089723743847', 'nurul.jpeg', 'PANAM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
