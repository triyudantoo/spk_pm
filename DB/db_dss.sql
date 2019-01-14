-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 14, 2018 at 02:37 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `pm_aspek`
--

CREATE TABLE `pm_aspek` (
  `id_aspek` varchar(6) NOT NULL,
  `namaaspek` varchar(100) NOT NULL,
  `persentase` float NOT NULL,
  `bobot_core` float NOT NULL,
  `bobot_secondary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_aspek`
--

INSERT INTO `pm_aspek` (`id_aspek`, `namaaspek`, `persentase`, `bobot_core`, `bobot_secondary`) VALUES
('A001', 'Kapasitas Intelektual', 20, 60, 40),
('A002', 'Sikap Kerja', 30, 60, 40),
('A003', 'Perilaku', 50, 60, 40);

-- --------------------------------------------------------

--
-- Table structure for table `pm_intelektual`
--

CREATE TABLE `pm_intelektual` (
  `kdnilai1` int(2) NOT NULL,
  `kdpegawai` varchar(10) NOT NULL,
  `nilai_vi` int(3) NOT NULL,
  `target_vi` int(3) NOT NULL,
  `selisih_vi` float NOT NULL,
  `nilai_bobot_vi` float NOT NULL,
  `nilai_sb` int(3) NOT NULL,
  `target_sb` int(3) NOT NULL,
  `selisih_sb` float NOT NULL,
  `nilai_bobot_sb` float NOT NULL,
  `nilai_kn` int(3) NOT NULL,
  `target_kn` int(3) NOT NULL,
  `selisih_kn` float NOT NULL,
  `nilai_bobot_kn` float NOT NULL,
  `nilai_lp` int(3) NOT NULL,
  `target_lp` int(3) NOT NULL,
  `selisih_lp` float NOT NULL,
  `nilai_bobot_lp` float NOT NULL,
  `nilai_ik` int(3) NOT NULL,
  `target_ik` int(3) NOT NULL,
  `selisih_ik` float NOT NULL,
  `nilai_bobot_ik` float NOT NULL,
  `nilai_cf_A1` float DEFAULT NULL,
  `nilai_sf_A1` float DEFAULT NULL,
  `nilai_tot_A1` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_intelektual`
--

INSERT INTO `pm_intelektual` (`kdnilai1`, `kdpegawai`, `nilai_vi`, `target_vi`, `selisih_vi`, `nilai_bobot_vi`, `nilai_sb`, `target_sb`, `selisih_sb`, `nilai_bobot_sb`, `nilai_kn`, `target_kn`, `selisih_kn`, `nilai_bobot_kn`, `nilai_lp`, `target_lp`, `selisih_lp`, `nilai_bobot_lp`, `nilai_ik`, `target_ik`, `selisih_ik`, `nilai_bobot_ik`, `nilai_cf_A1`, `nilai_sf_A1`, `nilai_tot_A1`) VALUES
(4, 'P001', 3, 3, 0, 5, 3, 4, -1, 4, 3, 4, -1, 4, 2, 3, -1, 4, 4, 3, 1, 4.5, 4.33333, 4.25, 4.3),
(5, 'P002', 3, 3, 0, 5, 4, 4, 0, 5, 3, 4, -1, 4, 2, 3, -1, 4, 4, 3, 1, 4.5, 4.66667, 4.25, 4.5),
(6, 'P003', 2, 3, -1, 4, 3, 4, -1, 4, 4, 4, 0, 5, 3, 3, 0, 5, 2, 3, -1, 4, 4.33333, 4.5, 4.4),
(7, 'P004', 2, 3, -1, 4, 3, 4, -1, 4, 4, 4, 0, 5, 3, 3, 0, 5, 3, 3, 0, 5, 4.33333, 5, 4.6),
(8, 'P005', 1, 3, -2, 3, 1, 4, -3, 2, 1, 4, -3, 2, 1, 3, -2, 3, 1, 3, -2, 3, 2.33333, 3, 2.6),
(9, 'P006', 4, 3, 1, 4.5, 2, 3, -1, 4, 4, 4, 0, 5, 3, 2, 1, 4.5, 5, 4, 1, 4.5, 4.33333, 4.5, 4.4),
(10, 'P007', 4, 3, 1, 4.5, 3, 4, -1, 4, 4, 4, 0, 5, 3, 3, 0, 5, 3, 3, 0, 5, 4.33, 4, 4.7);

-- --------------------------------------------------------

--
-- Table structure for table `pm_kriteria`
--

CREATE TABLE `pm_kriteria` (
  `kdkriteria` varchar(4) NOT NULL,
  `id_aspek` varchar(6) DEFAULT NULL,
  `nmkriteria` varchar(30) NOT NULL,
  `jenis` set('Core','Secondary') DEFAULT NULL,
  `target` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_kriteria`
--

INSERT INTO `pm_kriteria` (`kdkriteria`, `id_aspek`, `nmkriteria`, `jenis`, `target`) VALUES
('VI', 'A001', 'Verbalisasi Ide', 'Core', 3),
('SB', 'A001', 'Sistematika Berpikir', 'Core', 4),
('KN', 'A001', 'Konsentrasi', 'Core', 4),
('LP', 'A001', 'Logika Praktis', 'Secondary', 3),
('IK', 'A001', 'Imajinasi Kreatif', 'Secondary', 3),
('EP', 'A002', 'Energi Psikis', 'Core', 3),
('KTJ', 'A002', 'Ketelitian dan Tanggung Jawab', 'Core', 3),
('KH', 'A002', 'Kehati-hatian', 'Secondary', 3),
('DB', 'A002', 'Dorongan Berprestasi', 'Secondary', 4),
('DM', 'A003', 'Dominance (Kekuasaan)', 'Core', 3),
('IF', 'A003', 'Influences (Pengaruh)', 'Core', 2),
('STD', 'A003', 'Steadiness (Keteguhan Hati)', 'Secondary', 3),
('CP', 'A003', 'Compliance (Pemenuhan)', 'Secondary', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pm_pegawai`
--

CREATE TABLE `pm_pegawai` (
  `kdpegawai` varchar(10) NOT NULL,
  `namapegawai` varchar(100) NOT NULL,
  `thn_masuk` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_pegawai`
--

INSERT INTO `pm_pegawai` (`kdpegawai`, `namapegawai`, `thn_masuk`) VALUES
('P001', 'Cahya hidayat', 2014),
('P002', 'Edi Kurniawan', 2014),
('P003', 'Joko Suprabowo', 2014),
('P004', 'Rianto Sapto Aji', 2014),
('P005', 'Syahrul Nuzaman', 2015),
('P006', 'Teguh Sutoro', 2015),
('P007', 'Yayan Cahyadi', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `pm_pengguna`
--

CREATE TABLE `pm_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_pengguna`
--

INSERT INTO `pm_pengguna` (`id_pengguna`, `nama_pengguna`, `email`, `password`) VALUES
(1, 'Admin', 'admin@sjp.com', '3af36822e70517efee60e28af87be999');

-- --------------------------------------------------------

--
-- Table structure for table `pm_perilaku`
--

CREATE TABLE `pm_perilaku` (
  `kdnilai3` int(2) NOT NULL,
  `kdpegawai` varchar(10) NOT NULL,
  `nilai_dm` int(3) NOT NULL,
  `target_dm` int(3) NOT NULL,
  `selisih_dm` float NOT NULL,
  `nilai_bobot_dm` float NOT NULL,
  `nilai_if` int(3) NOT NULL,
  `target_if` int(3) NOT NULL,
  `selisih_if` float NOT NULL,
  `nilai_bobot_if` float NOT NULL,
  `nilai_std` int(3) NOT NULL,
  `target_std` int(3) NOT NULL,
  `selisih_std` float NOT NULL,
  `nilai_bobot_std` float NOT NULL,
  `nilai_cp` int(3) NOT NULL,
  `target_cp` int(3) NOT NULL,
  `selisih_cp` float NOT NULL,
  `nilai_bobot_cp` float NOT NULL,
  `nilai_cf_A3` float NOT NULL,
  `nilai_sf_A3` float NOT NULL,
  `nilai_tot_A3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_perilaku`
--

INSERT INTO `pm_perilaku` (`kdnilai3`, `kdpegawai`, `nilai_dm`, `target_dm`, `selisih_dm`, `nilai_bobot_dm`, `nilai_if`, `target_if`, `selisih_if`, `nilai_bobot_if`, `nilai_std`, `target_std`, `selisih_std`, `nilai_bobot_std`, `nilai_cp`, `target_cp`, `selisih_cp`, `nilai_bobot_cp`, `nilai_cf_A3`, `nilai_sf_A3`, `nilai_tot_A3`) VALUES
(1, 'P001', 2, 3, -1, 4, 3, 2, 1, 4.5, 3, 3, 0, 5, 3, 4, -1, 4, 4.25, 4.5, 4),
(2, 'P002', 2, 3, -1, 4, 3, 2, 1, 4.5, 2, 3, -1, 4, 3, 4, -1, 4, 4.25, 4, 4),
(3, 'P003', 3, 3, 0, 5, 2, 2, 0, 5, 3, 3, 0, 5, 4, 4, 0, 5, 5, 5, 5),
(4, 'P004', 3, 3, 0, 5, 3, 2, 1, 4.5, 4, 3, 1, 4.5, 4, 4, 0, 5, 4.75, 4.75, 5),
(5, 'P005', 1, 3, -2, 3, 1, 2, -1, 4, 1, 3, -2, 3, 1, 4, -3, 2, 3.5, 2.5, 3),
(6, 'P006', 4, 3, 1, 4.5, 2, 2, 0, 5, 3, 3, 0, 5, 1, 4, -3, 2, 4.75, 3.5, 4),
(7, 'P007', 4, 3, 1, 4.5, 2, 2, 0, 5, 3, 3, 0, 5, 1, 4, -3, 2, 4.5, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pm_sikap`
--

CREATE TABLE `pm_sikap` (
  `kdnilai2` int(2) NOT NULL,
  `kdpegawai` varchar(10) NOT NULL,
  `nilai_ep` int(3) NOT NULL,
  `target_ep` int(3) NOT NULL,
  `selisih_ep` float NOT NULL,
  `nilai_bobot_ep` float NOT NULL,
  `nilai_ktj` int(3) NOT NULL,
  `target_ktj` int(3) NOT NULL,
  `selisih_ktj` float NOT NULL,
  `nilai_bobot_ktj` float NOT NULL,
  `nilai_kh` int(3) NOT NULL,
  `target_kh` int(3) NOT NULL,
  `selisih_kh` float NOT NULL,
  `nilai_bobot_kh` float NOT NULL,
  `nilai_db` int(3) NOT NULL,
  `target_db` int(3) NOT NULL,
  `selisih_db` float NOT NULL,
  `nilai_bobot_db` float NOT NULL,
  `nilai_cf_A2` float NOT NULL,
  `nilai_sf_A2` float NOT NULL,
  `nilai_tot_A2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_sikap`
--

INSERT INTO `pm_sikap` (`kdnilai2`, `kdpegawai`, `nilai_ep`, `target_ep`, `selisih_ep`, `nilai_bobot_ep`, `nilai_ktj`, `target_ktj`, `selisih_ktj`, `nilai_bobot_ktj`, `nilai_kh`, `target_kh`, `selisih_kh`, `nilai_bobot_kh`, `nilai_db`, `target_db`, `selisih_db`, `nilai_bobot_db`, `nilai_cf_A2`, `nilai_sf_A2`, `nilai_tot_A2`) VALUES
(1, 'P001', 3, 3, 0, 5, 2, 3, -1, 4, 2, 3, -1, 4, 3, 4, -1, 4, 4.5, 4, 4.3),
(2, 'P002', 3, 3, 0, 5, 4, 3, 1, 4.5, 2, 3, -1, 4, 4, 4, 0, 5, 4.75, 4.5, 4.65),
(3, 'P003', 2, 3, -1, 4, 3, 3, 0, 5, 3, 3, 0, 5, 3, 4, -1, 4, 4.5, 4.5, 4.5),
(4, 'P004', 2, 3, -1, 4, 3, 3, 0, 5, 4, 3, 1, 4.5, 2, 4, -2, 3, 4.5, 3.75, 4.2),
(5, 'P005', 1, 3, -2, 3, 1, 3, -2, 3, 1, 3, -2, 3, 1, 4, -3, 2, 3, 2.5, 2.8),
(6, 'P006', 4, 3, 1, 4.5, 2, 3, -1, 4, 3, 3, 0, 5, 1, 4, -3, 2, 4.25, 3.5, 3.95),
(7, 'P007', 5, 3, 2, 3.5, 3, 3, 0, 5, 2, 3, -1, 4, 4, 4, 0, 5, 4.25, 4.5, 4.35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pm_aspek`
--
ALTER TABLE `pm_aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `pm_intelektual`
--
ALTER TABLE `pm_intelektual`
  ADD PRIMARY KEY (`kdnilai1`);

--
-- Indexes for table `pm_kriteria`
--
ALTER TABLE `pm_kriteria`
  ADD PRIMARY KEY (`kdkriteria`);

--
-- Indexes for table `pm_pegawai`
--
ALTER TABLE `pm_pegawai`
  ADD PRIMARY KEY (`kdpegawai`);

--
-- Indexes for table `pm_pengguna`
--
ALTER TABLE `pm_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pm_perilaku`
--
ALTER TABLE `pm_perilaku`
  ADD PRIMARY KEY (`kdnilai3`);

--
-- Indexes for table `pm_sikap`
--
ALTER TABLE `pm_sikap`
  ADD PRIMARY KEY (`kdnilai2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pm_intelektual`
--
ALTER TABLE `pm_intelektual`
  MODIFY `kdnilai1` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pm_pengguna`
--
ALTER TABLE `pm_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pm_perilaku`
--
ALTER TABLE `pm_perilaku`
  MODIFY `kdnilai3` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pm_sikap`
--
ALTER TABLE `pm_sikap`
  MODIFY `kdnilai2` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
