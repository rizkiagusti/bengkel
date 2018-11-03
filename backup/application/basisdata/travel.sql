-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2017 at 01:48 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `armada`
--

CREATE TABLE `armada` (
  `idArmada` varchar(5) NOT NULL,
  `namaKen` varchar(30) NOT NULL,
  `noPol` varchar(15) NOT NULL,
  `max` int(11) NOT NULL,
  `idRute` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `armada`
--

INSERT INTO `armada` (`idArmada`, `namaKen`, `noPol`, `max`, `idRute`) VALUES
('A01', 'BUDIMAN', 'D 1111 AE', 30, 'R01'),
('A02', 'BUDIMAN', 'D 70 YA', 30, 'R02');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` varchar(5) NOT NULL,
  `tgl` date NOT NULL,
  `idRute` varchar(5) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idJadwal`, `tgl`, `idRute`, `max`) VALUES
('J01', '2017-01-22', 'R01', 27),
('J02', '2017-01-23', 'R03', 26);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` varchar(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `nama`, `username`, `password`, `email`) VALUES
('1', 'rizki agusti', 'rizki', 'agusti', 'rizkiagusti@gmai.com'),
('G01', 'Rizki AGusti GHofur', 'mantap', 'atep', 'rizkiagusti@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `noKtp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `nama`, `noKtp`) VALUES
('P01', 'RIZKI AGUSTI GHOFUR', '1112225555'),
('P02', 'TITO', '1112227777'),
('P03', 'ANGGA TRY', '1112229999');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `idPesan` varchar(5) NOT NULL,
  `idPelanggan` varchar(5) NOT NULL,
  `idPegawai` varchar(3) NOT NULL,
  `idRute` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`idPesan`, `idPelanggan`, `idPegawai`, `idRute`) VALUES
('T01', 'P01', '1', 'R01');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `idRute` varchar(5) NOT NULL,
  `rutePP` varchar(30) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`idRute`, `rutePP`, `harga`) VALUES
('R01', 'BANDUNG-SURABAYA', 600000),
('R02', 'BANDUNG-JAKARTA', 30000),
('R03', 'BANDUNG-SEMARANG', 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`idArmada`),
  ADD KEY `idRute` (`idRute`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`),
  ADD KEY `idRute` (`idRute`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`idPesan`),
  ADD KEY `idRute` (`idRute`),
  ADD KEY `idPegawai` (`idPegawai`),
  ADD KEY `idPelanggan` (`idPelanggan`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`idRute`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `armada`
--
ALTER TABLE `armada`
  ADD CONSTRAINT `armada_ibfk_1` FOREIGN KEY (`idRute`) REFERENCES `rute` (`idRute`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`idRute`) REFERENCES `rute` (`idRute`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`idRute`) REFERENCES `rute` (`idRute`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`),
  ADD CONSTRAINT `pesan_ibfk_3` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
