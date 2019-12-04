-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 06:59 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `kode` int(11) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `keluar` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`kode`, `keterangan`, `tgl`, `jumlah`, `jenis`, `keluar`) VALUES
(10, 'UANG BEM 2017/2018', '0000-00-00', 1201400, 'Masuk', 0),
(1, 'KAS BEM 2018/2019', '0000-00-00', 2360000, 'Masuk', 0),
(100, 'Foto kabinet', '0000-00-00', 0, 'Keluar', 100000),
(2, 'MUBES PROKER (FC, DLL)', '0000-00-00', 265000, 'Masuk', 0),
(3, 'Sisa Makrab', '0000-00-00', 479000, 'Masuk', 0),
(4, 'Siswa Pelatihan KWU 2018', '0000-00-00', 375000, 'Masuk', 0),
(5, 'SE 2019 Pengembalian', '0000-00-00', 613000, 'Masuk', 0),
(6, 'Pengembalian SE pinjam sertif', '0000-00-00', 150000, 'Masuk', 0),
(7, 'Bebras', '2019-12-05', 172000, 'Masuk', 0),
(8, 'Rapidminer', '0000-00-00', 280000, 'Masuk', 0),
(9, 'Pengembalian baju encode', '0000-00-00', 220000, 'Masuk', 0),
(101, 'Air minum untuk forum ormawa', '0000-00-00', 0, 'Keluar', 15000),
(102, 'Banner BEM', '0000-00-00', 0, 'Keluar', 75000),
(103, 'Pinjam Kue', '0000-00-00', 0, 'Keluar', 185000),
(104, 'KWU Pinjam untuk FS', '0000-00-00', 0, 'Keluar', 200000),
(106, 'MUBES proker pinjam (fc,dll)', '0000-00-00', 0, 'Keluar', 295000),
(105, 'KWU proker pinjam', '0000-00-00', 0, 'Keluar', 200000),
(107, 'XBanner BEM', '0000-00-00', 0, 'Keluar', 67000),
(108, 'Subsidi ngopi di alfamart', '0000-00-00', 0, 'Keluar', 10900),
(109, 'Transport jaket', '0000-00-00', 0, 'Keluar', 20000),
(110, 'SARASEHAN 2019 Fakultas Teknik', '0000-00-00', 0, 'Keluar', 97000),
(111, 'SE 2019 Pinjam', '0000-00-00', 0, 'Keluar', 613000),
(112, 'ILKOM MENGAJAR ', '0000-00-00', 0, 'Keluar', 50000),
(113, 'ILKOM MENGAJAR', '0000-00-00', 0, 'Keluar', 50000),
(114, 'Sewa sner', '0000-00-00', 0, 'Keluar', 50000),
(115, 'SE pinjam print sertif', '0000-00-00', 0, 'Keluar', 150000),
(116, 'Giveaway', '0000-00-00', 0, 'Keluar', 500000),
(117, 'SARASEHAN 2019 Fakultas Keperawatan', '0000-00-00', 0, 'Keluar', 60000),
(119, 'Pinjam baju encode', '0000-00-00', 0, 'Keluar', 440000),
(120, 'Mubes LPJ konsumsi', '0000-00-00', 0, 'Keluar', 80500),
(118, 'Takziah ke mas SI', '0000-00-00', 0, 'Keluar', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(200) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`, `foto`) VALUES
(1, 'admin', 'admin', 'MIRA', 'admin', 'DSCN7247.JPG.jpeg'),
(3, 'user', 'user', 'user', 'user', 'anggota.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
