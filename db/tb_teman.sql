-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 09:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_teman`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_teman`
--

CREATE TABLE `tb_teman` (
  `id_teman` int(11) NOT NULL,
  `nim_teman` char(8) NOT NULL,
  `nama_teman` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_teman`
--

INSERT INTO `tb_teman` (`id_teman`, `nim_teman`, `nama_teman`, `photo`) VALUES
(1, '41226052', 'Rika Qodriah', 'P.png'),
(2, '41226143', 'Aldiyansyah Kurniawan', 'L.png'),
(3, '41215294', 'Arya Nuryana', 'L.png'),
(4, '41200123', 'Krisna Mulyana', 'L.png'),
(5, '41215421', 'M.Ikhwan Adholf Hermansyah', 'L.png'),
(6, '41226204', 'Nanda Putri Sugianto', 'P.png'),
(7, '41215666', 'Indra Ikhsani', 'L.png'),
(8, '41226103', 'Gita Antar Wulan', 'P.png'),
(9, '41200124', 'Ali Ikbal', 'L.png'),
(10, '41226185', 'Nafisa maysa Salma', 'P.png'),
(11, '41200108', 'Khofifah Indir Nurwulan Sari', 'P.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_teman`
--
ALTER TABLE `tb_teman`
  ADD PRIMARY KEY (`id_teman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_teman`
--
ALTER TABLE `tb_teman`
  MODIFY `id_teman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
