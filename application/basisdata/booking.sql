-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 08:03 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` varchar(5) NOT NULL,
  `noKtp` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `noHp` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `noKtp`, `nama`, `email`, `noHp`, `username`, `password`) VALUES
('A06', '22224444455555', 'rizki agusti ghofur', 'rizkiagusti@gmail.com', '085723656531', 'rizki', '330701e54f1bf47876c4fc6b649aab0d'),
('A07', '1111111111111', 'rizki agusti ', 'rizkiagusti@gmail.com', '08572656531110', 'ATEP', '86e3c0a629914473e9315f8f68b29e01');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `idBok` varchar(5) NOT NULL,
  `tiket` varchar(5) DEFAULT NULL,
  `idUser` varchar(5) NOT NULL,
  `idAdmin` varchar(5) DEFAULT NULL,
  `idJadwal` varchar(5) NOT NULL,
  `keter` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`idBok`, `tiket`, `idUser`, `idAdmin`, `idJadwal`, `keter`) VALUES
('T01', 'N01', 'U02', NULL, 'J02', NULL),
('T02', 'N01', 'U02', NULL, 'J01', NULL),
('T03', 'N02', 'U02', NULL, 'J02', NULL),
('T04', 'N03', 'U01', NULL, 'J02', NULL),
('T05', 'N02', 'U02', NULL, 'J01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` varchar(5) NOT NULL,
  `tgl` date NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idJadwal`, `tgl`, `kuota`) VALUES
('J01', '2017-05-28', 28),
('J02', '2017-05-31', 28);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `idKen` varchar(5) NOT NULL,
  `noPol` varchar(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `idUser` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`idKen`, `noPol`, `nama`, `idUser`) VALUES
('K01', 'D1010EC', 'vario', 'U01'),
('K02', 'D2003C', 'honda', 'U02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` varchar(5) NOT NULL,
  `noKtp` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `noHp` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `noKtp`, `nama`, `email`, `noHp`, `username`, `password`) VALUES
('U01', '11111', 'ujang tea', 'rizkiagusti@gmail', '08572', 'dodo', '721c6ff80a6d3e4ad4ffa52a04c60085'),
('U02', '1111111111111', 'Michel essien', 'essien@gmail.com', '085756660000000', 'rizki', '3e089c076bf1ec3a8332280ee35c28d4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idBok`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idAdmin` (`idAdmin`),
  ADD KEY `idJadwal` (`idJadwal`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`idKen`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`idJadwal`) REFERENCES `jadwal` (`idJadwal`);

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
