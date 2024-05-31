-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 10:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insiden`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_insiden`
--

CREATE TABLE `list_insiden` (
  `id` int(11) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `nama_lokasi` varchar(30) NOT NULL,
  `hari_mulai` varchar(20) NOT NULL,
  `waktu_mulai` varchar(10) NOT NULL,
  `hari_berhenti` varchar(20) NOT NULL,
  `waktu_berhenti` varchar(10) NOT NULL,
  `durasi` varchar(10) NOT NULL,
  `downtime` varchar(5) NOT NULL,
  `cause` text NOT NULL,
  `impact` text NOT NULL,
  `detail_solution` varchar(20) NOT NULL,
  `solved` varchar(5) NOT NULL,
  `executor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_insiden`
--

INSERT INTO `list_insiden` (`id`, `kategori`, `lokasi`, `nama_lokasi`, `hari_mulai`, `waktu_mulai`, `hari_berhenti`, `waktu_berhenti`, `durasi`, `downtime`, `cause`, `impact`, `detail_solution`, `solved`, `executor`) VALUES
(4, 'Server', 'Store', 'Pasuruan', '01 Oktober', '21:40', '01 Oktober', '22:00', '20 menit', 'No', 'Tidak dapat IP DHCP', 'Tidak dapat diakses', 'Restart VM', 'done', 'DC'),
(7, 'Server', 'Store', 'Airforce Mart Adisutjipto', '23 Agustus 2023', '13:59', '23 Agustus 2023', '14:24', '25 menit', 'No', 'Performa CPU Tinggi, Hang', 'Tidak dapat diakses', 'Restart VM', 'done', 'DC'),
(8, 'HO', 'Store', 'Head Office', '5 September 2023', '05:13', '5 September 2023', '05:22', '9 menit', 'No', 'Performa CPU Tinggi,Hang', 'tidak dapat diakses', 'restart VM', 'done', 'Yudi'),
(9, 'Server', 'Store', 'DC Cikarang', '8 April 2023', '18:22', '8 April 2023', '20:15', '113 menit', 'No', 'Listrik Ngetrip', 'Server down', 'Nyalakan VM', 'done', 'Oky');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('datacenter_trans', '113333555555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_insiden`
--
ALTER TABLE `list_insiden`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_insiden`
--
ALTER TABLE `list_insiden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
