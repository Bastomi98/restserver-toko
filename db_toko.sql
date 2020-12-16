-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 07:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `harga_barang`, `stok_barang`) VALUES
('B0001', 'Rinso Anti Noda 900g', 15000, 20),
('B0002', 'Rinso Molto 900g', 15500, 15),
('B0003', 'Attack Softener 900g', 18000, 10),
('B0004', 'Attack Easy 900g', 16500, 20),
('B0005', 'Bimoli 2 liter', 25000, 10),
('B0006', 'Bimoli 1 liter', 13000, 20),
('B0007', 'Sunco 2 liter', 26500, 20),
('B0008', 'Sunco 1 liter', 14500, 20),
('B0009', 'Sunlight 800 ml', 10000, 15),
('B0010', 'Sunlight 400 ml', 5500, 20),
('B0011', 'Sunlight 200 ml', 3000, 14),
('B0012', 'Pepsodent Herbal 190 gr', 9500, 23),
('B0013', 'Pepsodent Gigi Berlubang 190 gr', 6500, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
