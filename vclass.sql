-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2021 pada 11.56
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `tbl_file`
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
-- Dumping data untuk tabel `tbl_file`
--

INSERT INTO `tbl_file` (`id_file`, `id_mapel`, `pertemuan`, `nama`, `tipe`, `file`, `tgl_tambah`, `tgl_ubah`) VALUES
(14, 2, '1', 'Modul Aritmatika dan Geometri', 'mod', 'dokumen/materi/Modul Matematika - Pertemuan 1.pdf', '2021-01-27', '2021-01-28'),
(15, 2, '3', 'Modul Aljabar', 'mod', 'dokumen/materi/Modul Matematika - Pertemuan 3.pdf', '2021-01-27', '2021-01-28'),
(16, 2, '3', 'Tugas 3 Matematika', 'tgs', 'dokumen/tugas/Tugas Matematika - Pertemuan 2.pdf', '2021-01-27', '2021-01-28'),
(21, 2, '1', 'Tugas 1 Matematika', 'tgs', 'dokumen/tugas/Tugas Matematika - Pertemuan 1.pdf', '2021-01-28', NULL),
(22, 1, '5', 'Modul Statistika', 'mod', 'dokumen/materi/Modul Matematika - Pertemuan 5.pdf', '2021-01-29', NULL),
(23, 1, '3', 'Tugas 3', 'tgs', 'dokumen/tugas/Tugas Matematika - Pertemuan 7.pdf', '2021-01-29', NULL),
(24, 3, '4', 'Modul Kata Tunggal dan Majemuk', 'mod', 'dokumen/materi/Modul Bahasa Indonesia - Pertemuan 4.pdf', '2021-01-30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `kelas` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `id_user`, `mapel`, `kelas`) VALUES
(1, 3, 'Matematika', 'A'),
(2, 3, 'Matematika', 'B'),
(3, 6, 'Bahasa Indonesia', 'B'),
(4, 7, 'Bahasa Inggris', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tugas`
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
-- Dumping data untuk tabel `tbl_tugas`
--

INSERT INTO `tbl_tugas` (`id_tugas`, `id_user`, `id_mapel`, `pertemuan`, `tugas`, `tgl_up`) VALUES
(1, 5, 1, '3', 'dokumen/tugas/tugas3_kurniawan.pdf', '2021-01-27'),
(2, 9, 1, '3', 'dokumen/tugas/tugas3_faris.pdf', '2021-01-27'),
(3, 10, 2, '3', 'dokumen/tugas/tugas3_gilbert.pdf', '2021-01-27'),
(4, 11, 2, '3', 'dokumen/tugas/tugas3_abdullah.pdf', '2021-01-28'),
(5, 5, 2, '3', 'dokumen/tugas/tugas3_kurniawan.pdf', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(13) NOT NULL,
  `kelas` char(1) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` enum('usr','gur','adm') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `jenkel`, `tgl_lahir`, `telp`, `kelas`, `username`, `password`, `akses`) VALUES
(1, 'Administrator', 'L', '2021-01-05', '0856467587', NULL, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'adm'),
(2, 'User', 'P', '2021-01-05', '084535667', NULL, 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr'),
(3, 'Siti Fatimah, S.Kom., M.Pd.', 'P', '1999-10-09', '0895333093116', '', 'SitiF46@smanim.com', '77e69c137812518e359196bb2f5e9bb9', 'gur'),
(5, 'Muhammad Kurniawan', 'L', '1998-10-07', '085718093600', 'B', 'FiqriA08@smanim.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr'),
(6, 'Muhammad Nasution, S.Pd., M.Pd.', 'L', '1999-12-10', '085718093600', '', 'MuhammadN17@smanim.com', '77e69c137812518e359196bb2f5e9bb9', 'gur'),
(7, 'Faturrahim Abdul Aziz., S.Pd., M.Pd.', 'L', '1960-10-10', '088878758282', '', 'Faturrahim AbdulA55@smanim.com', '77e69c137812518e359196bb2f5e9bb9', 'gur'),
(9, 'Faris Ali Yafie', 'L', '2000-06-07', '089533309411', 'A', 'FarisA53@smanim.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr'),
(10, 'Gilbert Nasution', 'L', '2000-10-10', '089345627781', 'A', 'GilbertN27@smanim.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr'),
(11, 'Muhammad Abdullah', 'L', '2000-12-25', '081281567741', 'B', 'MuhammadA54@smanim.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
