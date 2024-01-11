-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 05:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'e00cf25ad42683b3df678c61f42c6bda', '2023-12-21 14:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `Emailid` varchar(100) DEFAULT NULL,
  `Barang` int(11) DEFAULT NULL,
  `Daritanggal` varchar(20) DEFAULT NULL,
  `Sampaitanggal` varchar(20) DEFAULT NULL,
  `Pesan` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Tanggalkirim` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblhubungikami`
--

CREATE TABLE `tblhubungikami` (
  `id` int(11) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Notelpon` char(15) DEFAULT NULL,
  `Pesan` longtext DEFAULT NULL,
  `Tanggalkirim` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhubungikami`
--

INSERT INTO `tblhubungikami` (`id`, `Nama`, `Email`, `Notelpon`, `Pesan`, `Tanggalkirim`, `Status`) VALUES
(17, 'MUH RADIFANSYAH R', 'muhradifansyah17@gmail.com', '082259263823', 'aaa', '2023-12-21 14:23:24', NULL),
(18, 'MUH RADIFANSYAH R', 'muhradifansyah17@gmail.com', '082259263823', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque dolores quae accusantium aliquid dolorum modi, ex ipsum cupiditate rerum deserunt maxime amet ullam beatae similique delectus repudiandae facere. Nam, suscipit.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque dolores quae accusantium aliquid dolorum modi, ex ipsum cupiditate rerum deserunt maxime amet ullam beatae similique delectus repudiandae facere. Nam, suscipit.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque dolores quae accusantium aliquid dolorum modi, ex ipsum cupiditate rerum deserunt maxime amet ullam beatae similique delectus repudiandae facere. Nam, suscipit.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque dolores quae accusantium aliquid dolorum modi, ex ipsum cupiditate rerum deserunt maxime amet ullam beatae similique delectus repudiandae facere. Nam, suscipit.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque dolores quae accusantium aliquid dolorum modi, ex ipsum cupiditate rerum deserunt maxime amet ullam beatae similique delectus repudiandae facere. Nam, suscipit.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque dolores quae accusantium aliquid dolorum modi, ex ipsum cupiditate rerum deserunt maxime amet ullam beatae similique delectus repudiandae facere. Nam, suscipit.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque dolores quae accusantium aliquid dolorum modi, ex ipsum cupiditate rerum deserunt maxime amet ullam beatae similique delectus repudiandae facere. Nam, suscipit.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque dolores quae accusantium aliquid dolorum modi, ex ipsum cupiditate rerum deserunt maxime amet ullam beatae similique delectus repudiandae facere. Nam, suscipit.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque dolores quae accusantium aliquid dolorum modi, ex ipsum cupiditate rerum deserunt maxime amet ullam beatae similique delectus repudiandae facere. Nam, suscipit.', '2024-01-11 03:51:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblkategori`
--

CREATE TABLE `tblkategori` (
  `id` int(11) NOT NULL,
  `namaKategori` varchar(120) NOT NULL,
  `tanggalBuat` timestamp NULL DEFAULT current_timestamp(),
  `tanggalUpdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkategori`
--

INSERT INTO `tblkategori` (`id`, `namaKategori`, `tanggalBuat`, `tanggalUpdate`) VALUES
(37, 'Erang-Erang ', '2023-12-24 03:57:13', '2024-01-11 02:35:21'),
(38, 'Buket', '2023-12-24 04:11:15', NULL),
(39, 'Dekorasi', '2023-12-29 06:02:05', NULL),
(40, 'Sovenir', '2023-12-29 06:02:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduk`
--

CREATE TABLE `tblproduk` (
  `id` int(11) NOT NULL,
  `Namaproduk` varchar(150) DEFAULT NULL,
  `Kategori` int(11) DEFAULT NULL,
  `Deskripsi` longtext DEFAULT NULL,
  `Harga` varchar(50) DEFAULT NULL,
  `Penjualan` varchar(100) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `Vimage6` varchar(120) DEFAULT NULL,
  `Vimage7` varchar(120) DEFAULT NULL,
  `Vimage8` varchar(120) DEFAULT NULL,
  `Vimage9` varchar(120) DEFAULT NULL,
  `Vimage10` varchar(120) DEFAULT NULL,
  `Vimage11` varchar(120) DEFAULT NULL,
  `Vimage12` varchar(120) DEFAULT NULL,
  `Vimage13` varchar(120) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `Vimage14` varchar(120) DEFAULT NULL,
  `Vimage15` varchar(120) DEFAULT NULL,
  `Vimage16` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduk`
--

INSERT INTO `tblproduk` (`id`, `Namaproduk`, `Kategori`, `Deskripsi`, `Harga`, `Penjualan`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `Vimage6`, `Vimage7`, `Vimage8`, `Vimage9`, `Vimage10`, `Vimage11`, `Vimage12`, `Vimage13`, `Vimage14`, `Vimage15`, `Vimage16`) VALUES
(83, 'Gold', 37, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident perferendis aliquam adipisci ut quos veritatis fugiat consequatur facere vel architecto! Deserunt itaque nulla mollitia assumenda magnam, tenetur perferendis cum laudantium.\r\n', '100.000/Hari', 'Disewakan', 'pmmm.jpeg', 'pmmm.jpeg', 'pmmm.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(84, 'Premium', 37, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident perferendis aliquam adipisci ut quos veritatis fugiat consequatur facere vel architecto! Deserunt itaque nulla mollitia assumenda magnam, tenetur perferendis cum laudantium.\r\n', '100.000/Hari', 'Dijual', 'pmmm.jpeg', 'pmmm.jpeg', 'pmmm.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, 'Premium Z', 37, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque dolores quae accusantium aliquid dolorum modi, ex ipsum cupiditate rerum deserunt maxime amet ullam beatae similique delectus repudiandae facere. Nam, suscipit.', '100.000/Hari', 'Disewakan', 'pmmm.jpeg', 'pmmm.jpeg', 'pmmm.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(86, 'Akrigin', 37, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque dolores quae accusantium aliquid dolorum modi, ex ipsum cupiditate rerum deserunt maxime amet ullam beatae similique delectus repudiandae facere. Nam, suscipit.', '100.000/Hari', 'Disewakan', 'pmmm.jpeg', 'pmmm.jpeg', 'pmmm.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Testimoni` mediumtext NOT NULL,
  `Tanggalkirim` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `Email`, `Testimoni`, `Tanggalkirim`, `Status`) VALUES
(23, 'muhradifansyah17@gmail.com', 'Produknya Sangat Bagus Dan Harganya Terjangkau', '2024-01-11 03:53:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `Namalengkap` varchar(120) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Notelpon` char(20) DEFAULT NULL,
  `Tanggaldaftar` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `Namalengkap`, `Email`, `Password`, `Notelpon`, `Tanggaldaftar`, `UpdationDate`) VALUES
(69, 'MUH RADIFANSYAH R', 'muhradifansyah17@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '082259263823', '2023-12-20 21:43:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblhubungikami`
--
ALTER TABLE `tblhubungikami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblkategori`
--
ALTER TABLE `tblkategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduk`
--
ALTER TABLE `tblproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblhubungikami`
--
ALTER TABLE `tblhubungikami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblkategori`
--
ALTER TABLE `tblkategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblproduk`
--
ALTER TABLE `tblproduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
