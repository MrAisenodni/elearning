-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 10:35 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id_file` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `pertemuan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` enum('mod','tgs') NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl_up` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `id_user`, `mapel`, `kelas`) VALUES
(1, 3, 'Bahasa Indonesia', 'A'),
(2, 3, 'Matematika', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tugas`
--

CREATE TABLE `tbl_tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `tugas` varchar(100) NOT NULL,
  `tgl_up` date NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(13) NOT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` enum('usr','gur','adm') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `jenkel`, `tgl_lahir`, `telp`, `kelas`, `username`, `password`, `akses`) VALUES
(1, 'Administrator', 'L', '2021-01-05', '0856467587', NULL, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'adm'),
(2, 'User', 'P', '2021-01-05', '084535667', NULL, 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr'),
(3, 'Siti Fatimah', 'P', '1999-10-09', '0895333093116', '', 'SitiF46@sman1.sch.id', '77e69c137812518e359196bb2f5e9bb9', 'gur'),
(5, 'Fiqri Alfayed', 'L', '1998-10-07', '085718093600', 'B', 'FiqriA08@sman1.sch.id', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
