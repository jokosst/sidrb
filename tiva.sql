-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Nov 2018 pada 12.37
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiva`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fuzzy`
--

CREATE TABLE `tbl_fuzzy` (
  `id_fuzzy` int(3) NOT NULL,
  `id_nilai` int(3) NOT NULL,
  `hasil_fuzzy` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_fuzzy`
--

INSERT INTO `tbl_fuzzy` (`id_fuzzy`, `id_nilai`, `hasil_fuzzy`) VALUES
(1, 1, 1.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(3) NOT NULL,
  `nilai_awal` float NOT NULL,
  `nilai_rendah` float NOT NULL,
  `nilai_sedang` float NOT NULL,
  `nilai_tinggi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nilai_awal`, `nilai_rendah`, `nilai_sedang`, `nilai_tinggi`) VALUES
(1, 0.8, 0.9667, 1.1334, 1.3),
(2, 1, 1.1667, 1.2334, 1.35),
(3, 1.1, 1.1833, 1.2663, 1.35),
(4, 1.15, 1.3167, 1.4834, 1.65),
(5, 1.25, 1.3333, 1.4166, 1.5),
(6, 1.3, 1.3667, 1.4334, 1.5),
(7, 1.35, 1.4, 1.45, 1.5),
(8, 1.375, 1.4677, 1.5604, 1.65),
(9, 1.4, 1.4333, 1.4666, 1.5),
(10, 1.45, 1.5167, 1.5834, 1.65),
(11, 1.5, 1.55, 1.6, 1.65),
(12, 1.6, 1.6667, 1.7334, 1.8),
(13, 1.6, 1.6667, 1.7334, 1.8),
(14, 1.65, 1.7, 1.75, 1.8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(3) NOT NULL,
  `waktu` varchar(25) NOT NULL,
  `tinggi_air` float NOT NULL,
  `curah_hujan` float NOT NULL,
  `hasil_fuzzy` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `waktu`, `tinggi_air`, `curah_hujan`, `hasil_fuzzy`) VALUES
(35, 'waktu', 1.9, 0, 0.84),
(36, '22/10/2018 09:00:00', 2.2, 0, 0.51),
(37, '22/10/2018 09:00:00', 2.2, 0, 0.51),
(38, '22/10/2018 09:10:00', 1.9, 0, 0.84),
(39, '22/10/2018 09:10:00', 1.9, 0, 0.84),
(40, '22/10/2018 09:10:00', 1.9, 0, 0.84),
(41, '22/10/2018 09:10:00', 1.9, 0, 0.84),
(42, '28/10/2018 10:00:00', 1.4, 0, 0.99),
(43, '28/10/2018 10:20:00', 1.4, 0, 0.99),
(44, '28/10/2018 10:20:00', 1.4, 0, 0.99),
(45, '28/10/2018 10:50:00', 1.3, 0, 0.96),
(46, '28/10/2018 10:50:00', 1.3, 0, 0.96),
(47, '29/10/2018 09:00:00', 2.2, 0, 0.51),
(48, '29/10/2018 09:20:00', 1.5, 0, 1),
(49, '29/10/2018 09:30:00', 1.5, 0, 1),
(50, '02/11/2018 05:30:00', 2.2, 11.4, 0.581538),
(51, '02/11/2018 05:30:00', 2.2, 11.4, 0.581538),
(52, '02/11/2018 05:30:00', 2.2, 11.4, 0.581538),
(53, '02/11/2018 05:30:00', 2.2, 11.4, 0.581538),
(54, '08/11/2018 01:50:00', 1.6, 0, 0.99),
(55, '08/11/2018 02:00:00', 1.6, 0, 0.99),
(56, '08/11/2018 02:00:00', 1.6, 0, 0.99),
(57, '08/11/2018 02:30:00', 1.5, 0, 1),
(58, '12/11/2018 16:30:00', 1, 0.6, 0.494764),
(59, '13/11/2018 08:50:00', 1.7, 0.2, 0.892146),
(60, '13/11/2018 08:50:00', 1.7, 0.2, 0.892146),
(61, '16/11/2018 16:10:00', 1.1, 20, 0.613916),
(62, '16/11/2018 16:20:00', 1.1, 20, 0.613916),
(63, '16/11/2018 16:50:00', 1.1, 20.2, 0.164443),
(67, '16/11/2018 18:10:00', 1.1, 20.2, 1.17111),
(68, '16/11/2018 18:10:00', 1.1, 20.2, 1.17111),
(69, '16/11/2018 18:20:00', 1.1, 20.2, -0.565541),
(70, '', 0, 0, 2.23039),
(71, '16/11/2018 18:30:00', 1.1, 20.2, 1.17111),
(72, '16/11/2018 18:30:00', 1.1, 20.2, 1.17111),
(73, '16/11/2018 18:40:00', 1.1, 20.2, 1.17111),
(74, '16/11/2018 18:40:00', 1.1, 20.2, 1.17111),
(75, '16/11/2018 19:40:00', 1.1, 20.2, 1.17111),
(76, '16/11/2018 19:40:00', 1.1, 20.2, 1.17111),
(77, '21/11/2018 00:40:00', 1.5, 0, 1.03241);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tempat`
--

CREATE TABLE `tbl_tempat` (
  `id_tempat` int(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kd` float NOT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tempat`
--

INSERT INTO `tbl_tempat` (`id_tempat`, `alamat`, `kd`, `lat`, `lng`) VALUES
(1, 'Jl. LetJend. S. Parman', 1, '-0.0356851', '109.3340688'),
(2, 'Jl. Alianyang', 1.35, '-0.0319111', '109.3212717'),
(3, 'Jl. Putri Candramidi', 1.35, '-0.0361267', '109.3231093'),
(4, 'Jl. WR. Supratman', 1.1, '-0.0352015', '109.3368797'),
(5, 'Jl. Purnama 2', 1.6, '-0.0704899', '109.3133426'),
(6, 'Jl. Purnama', 1.37, '-0.0530172', '109.3271812'),
(7, 'Jl. Parit Demang', 1.35, '-0.0659972', '109.3244059'),
(8, 'Gg. PGA Jl. Danau Sentarum', 1, '-0.0479455', '109.306005'),
(9, 'Jl. A. Yani', 1.5, '-0.0478271', '109.2921615'),
(10, 'Jl. Pancasila', 1.4, '-0.0271096', '109.3184143'),
(11, 'Jl. Harapan Jaya', 1.3, '-0.0481879 ', '109.2989313'),
(12, 'Jl Suprapto ', 1.3, '-0.0408857', '109.3383247'),
(13, 'Jl. Sutoyo', 1.45, '-0.04859 ', '109.3373328'),
(14, 'Jl. MT. Haryono', 1.25, '-0.0459629', '109.3336451'),
(15, 'Jl. Gajah Mada', 1.5, '-0.0356811', '109.3398446'),
(16, 'Jl. Veteran', 1.45, '-0.0439366', '109.3414217'),
(17, 'Daerah sekitar Sungai Kapuas', 1.25, '-0.0215568', '109.3371687'),
(18, 'Jl. 28 Oktober (Parit Nenas dan Parit Malaya', 1.15, '0.0001825', '109.3617953'),
(19, 'Jl. Gusti Situt Mahmud', 1.65, '-0.0337315', '109.3330622'),
(20, 'Jl. Agus Salim', 1.65, '-0.0283403', '109.338857'),
(21, 'Jl. Kh. Ahmad Dahlam', 1.65, '-0.0313409', '109.3278594'),
(22, 'Jl. Pangeran Natakusuma', 1.65, '-0.0383382', '109.3140092'),
(23, 'Jl. Sumatra', 1.65, '-0.0446422', '109.3295635'),
(24, 'Jl. M. Sohor', 1.65, '-0.0445871', '109.3297099'),
(25, 'Jl. Perdana Ujung(prt. demang)', 0.8, '-0.0617531', '109.3358407');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_fuzzy`
--
ALTER TABLE `tbl_fuzzy`
  ADD PRIMARY KEY (`id_fuzzy`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_fuzzy`
--
ALTER TABLE `tbl_fuzzy`
  MODIFY `id_fuzzy` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  MODIFY `id_tempat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
