-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 03:07 AM
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
  `pertemuan` char(2) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` enum('mod','tgs') NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_tambah` date DEFAULT NULL,
  `tgl_ubah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`id_file`, `id_mapel`, `pertemuan`, `nama`, `tipe`, `file`, `tgl_tambah`, `tgl_ubah`) VALUES
(14, 2, '1', 'Modul Aritmatika dan Geometri', 'mod', 'dokumen/materi/Modul Matematika - Pertemuan 1.pdf', '2021-01-27', '2021-01-28'),
(15, 2, '3', 'Modul Aljabar', 'mod', 'dokumen/materi/Modul Matematika - Pertemuan 3.pdf', '2021-01-27', '2021-01-28'),
(16, 2, '3', 'Tugas 3 Matematika', 'tgs', 'dokumen/tugas/Tugas Matematika - Pertemuan 2.pdf', '2021-01-27', '2021-01-28'),
(21, 2, '1', 'Tugas 1 Matematika', 'tgs', 'dokumen/tugas/Tugas Matematika - Pertemuan 1.pdf', '2021-01-28', NULL),
(22, 1, '5', 'Modul Statistika', 'mod', 'dokumen/materi/Modul Matematika - Pertemuan 5.pdf', '2021-01-29', NULL),
(23, 1, '7', 'Tugas Matematika X - Pertemuan 7', 'tgs', 'dokumen/tugas/Tugas Matematika - Pertemuan 7.pdf', '2021-01-29', '2021-01-31'),
(24, 3, '4', 'Modul Kata Tunggal dan Majemuk', 'mod', 'dokumen/materi/Modul Bahasa Indonesia - Pertemuan 4.pdf', '2021-01-30', NULL),
(25, 1, '3', 'Modul - Aljabar Kelas X Pertemuan 3', 'mod', 'dokumen/materi/Modul Matematika X - Pertemuan 3.pdf', '2021-01-31', '2021-01-31'),
(26, 1, '5', 'Tugas Matematika X - Pertemuan 5', 'tgs', 'dokumen/tugas/Tugas Matematika - Pertemuan 5.pdf', '2021-01-31', '2021-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `tingkat` char(2) NOT NULL,
  `jurusan` enum('ipa','ips') NOT NULL,
  `kelas` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `tingkat`, `jurusan`, `kelas`) VALUES
(1, '10', 'ipa', '1'),
(2, '10', 'ipa', '2'),
(3, '10', 'ipa', '3'),
(4, '10', 'ipa', '4'),
(5, '10', 'ipa', '5'),
(8, '10', 'ips', '1'),
(9, '10', 'ips', '2'),
(10, '10', 'ips', '3'),
(11, '10', 'ips', '4'),
(12, '10', 'ips', '5'),
(15, '11', 'ipa', '1'),
(16, '11', 'ipa', '2'),
(17, '11', 'ipa', '3'),
(18, '11', 'ipa', '4'),
(19, '11', 'ipa', '5'),
(22, '11', 'ips', '1'),
(23, '11', 'ips', '2'),
(24, '11', 'ips', '3'),
(25, '11', 'ips', '4'),
(26, '11', 'ips', '5'),
(29, '12', 'ipa', '1'),
(30, '12', 'ipa', '2'),
(31, '12', 'ipa', '3'),
(32, '12', 'ipa', '4'),
(33, '12', 'ipa', '5'),
(36, '12', 'ips', '1'),
(37, '12', 'ips', '2'),
(38, '12', 'ips', '3'),
(39, '12', 'ips', '4'),
(40, '12', 'ips', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `id_user`, `id_kelas`, `mapel`) VALUES
(1, 3, 3, 'Matematika'),
(2, 3, 9, 'Matematika'),
(4, 7, 3, 'Bahasa Inggris'),
(5, 6, 3, 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tugas`
--

CREATE TABLE `tbl_tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `pertemuan` char(2) NOT NULL,
  `tugas` varchar(100) NOT NULL,
  `tgl_up` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tugas`
--

INSERT INTO `tbl_tugas` (`id_tugas`, `id_user`, `id_mapel`, `pertemuan`, `tugas`, `tgl_up`) VALUES
(2, 9, 1, '3', 'dokumen/tugas/tugas3_faris.pdf', '2021-01-27'),
(3, 10, 2, '3', 'dokumen/tugas/tugas3_gilbert.pdf', '2021-01-27'),
(4, 11, 2, '3', 'dokumen/tugas/tugas3_abdullah.pdf', '2021-01-28'),
(5, 5, 2, '3', 'dokumen/tugas/tugas3_kurniawan.pdf', '0000-00-00'),
(11, 5, 2, '1', 'dokumen/tugas/tugas1_kurniawan.pdf', '2021-01-30'),
(13, 5, 1, '5', 'dokumen/tugas/tugas5_kurniawan.pdf', '2021-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(13) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` enum('usr','gur','adm') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_kelas`, `nama`, `jenkel`, `tgl_lahir`, `telp`, `username`, `password`, `akses`) VALUES
(1, NULL, 'Administrator', 'L', '2021-01-05', '0856467587', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'adm'),
(2, NULL, 'User', 'P', '2021-01-05', '084535667', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr'),
(3, NULL, 'Siti Fatimah, S.Kom., M.Pd.', 'P', '1999-10-09', '0895333093116', 'SitiF46@smanim.com', '77e69c137812518e359196bb2f5e9bb9', 'gur'),
(5, 3, 'Muhammad Kurniawan', 'L', '1998-10-07', '085718093600', 'FiqriA08@smanim.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr'),
(6, NULL, 'Muhammad Nasution, S.Pd., M.Pd.', 'L', '1999-12-10', '085718093600', 'MuhammadN17@smanim.com', '77e69c137812518e359196bb2f5e9bb9', 'gur'),
(7, NULL, 'Faturrahim Abdul Aziz., S.Pd., M.Pd.', 'L', '1960-10-10', '088878758282', 'Faturrahim AbdulA55@smanim.com', '77e69c137812518e359196bb2f5e9bb9', 'gur'),
(9, 3, 'Faris Ali Yafie', 'L', '2000-06-07', '089533309411', 'FarisA53@smanim.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr'),
(10, 9, 'Gilbert Nasution', 'L', '2000-10-10', '089345627781', 'GilbertN27@smanim.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr'),
(11, 9, 'Muhammad Abdullah', 'L', '2000-12-25', '081281567741', 'MuhammadA54@smanim.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr'),
(13, 3, 'Asti Sopian', 'P', '2000-03-18', '081281567752', 'AstiS00-03@smanim.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

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
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
