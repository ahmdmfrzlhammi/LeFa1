-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 02:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookinglab`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(50) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `waktu` date NOT NULL,
  `selesai` date NOT NULL,
  `status` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `nama_dosen`, `prodi`, `waktu`, `selesai`, `status`, `id_user`, `id_ruangan`) VALUES
(27, 'anam', 'Teknik Informatika', '2024-01-26', '2024-01-27', 'disetujui ', 8, 1),
(28, 'sifa', 'Bisnis Digital', '2024-01-26', '2024-01-31', 'disetujui ', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `jenis_ruangan` varchar(100) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `kapasitas` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `jenis_ruangan`, `nama_ruangan`, `kapasitas`, `status`) VALUES
(1, 'LAB COMPUTER   ', ' 1', '25   ', 1),
(2, 'LAB COMPUTER    ', ' 2', '25    ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `prodi`, `email`, `level`) VALUES
(2, 'rizal', '289dff07669d7a23de0ef88d2f7129e7', 'MekaTronika', 'ahmdmshdh', '1'),
(3, 'sifa', '202cb962ac59075b964b07152d234b70', 'Bisnis Digital', 'ahmadmufaridzal@gmail.com', '2'),
(4, 'fadiel', 'c6f057b86584942e415435ffb1fa93d4', 'Teknik Informatika', 'fadiel@gmail.com', '2'),
(5, 'tebak', '202cb962ac59075b964b07152d234b70', 'Bahasa Jepang', 'hbdfyvrf', '2'),
(6, 'apya', '202cb962ac59075b964b07152d234b70', 'MekaTronika', 'dbdg', '2'),
(7, 'aku', 'dcb76da384ae3028d6aa9b2ebcea01c9', 'Bisnis Digital', 'kamu', '2'),
(8, 'anam', '698d51a19d8a121ce581499d7b701668', 'Teknik Informatika', 'hugceygc', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
