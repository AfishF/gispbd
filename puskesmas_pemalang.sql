-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 12:21 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas_pemalang`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(1) NOT NULL,
  `jenis_puskesmas` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis_puskesmas`) VALUES
(1, 'Rawat Inap'),
(2, 'Non Rawat Inap');

-- --------------------------------------------------------

--
-- Table structure for table `karakteristik_wilayah`
--

CREATE TABLE `karakteristik_wilayah` (
  `id_wilayah` int(1) NOT NULL,
  `karakteristik_wilayah` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karakteristik_wilayah`
--

INSERT INTO `karakteristik_wilayah` (`id_wilayah`, `karakteristik_wilayah`) VALUES
(1, 'Perkotaan'),
(2, 'Pedesaan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pusat_kesehatan_masyarakat`
-- (See below for the actual view)
--
CREATE TABLE `pusat_kesehatan_masyarakat` (
`kode_puskesmas` int(7)
,`nama_puskesmas` varchar(12)
,`alamat` varchar(62)
,`luas` decimal(5,2)
,`desa` int(2)
,`penduduk` int(8)
,`karakteristik_wilayah` varchar(9)
,`jenis_puskesmas` varchar(14)
);

-- --------------------------------------------------------

--
-- Table structure for table `puskesmas`
--

CREATE TABLE `puskesmas` (
  `kode_puskesmas` int(7) NOT NULL,
  `nama_puskesmas` varchar(12) DEFAULT NULL,
  `latitude` decimal(7,5) DEFAULT NULL,
  `longitude` decimal(7,4) DEFAULT NULL,
  `alamat` varchar(62) DEFAULT NULL,
  `luas` decimal(5,2) DEFAULT NULL,
  `desa` int(2) DEFAULT NULL,
  `penduduk` int(8) DEFAULT NULL,
  `karakteristik_wilayah` int(1) DEFAULT NULL,
  `jenis_puskesmas` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `puskesmas`
--

INSERT INTO `puskesmas` (`kode_puskesmas`, `nama_puskesmas`, `latitude`, `longitude`, `alamat`, `luas`, `desa`, `penduduk`, `karakteristik_wilayah`, `jenis_puskesmas`) VALUES
(1032090, 'BANYUMUDAL', '-7.12262', '109.2446', 'Jl. Raya Moga-Karangsari Km 1,  RT.01 RW.01 Desa Banyumudal', '41.41', 10, 63476, 2, 2),
(1032091, 'WARUNGPRING', '-7.07607', '109.2656', 'Jl. Raya Warungpring, No. 1, RT.04 RW.01 Desa Warungpring', '26.31', 6, 38846, 2, 2),
(1032092, 'PULOSARI', '-7.16928', '109.2630', 'Jl. Raya Pulosari-Karangsari Km 1,  RT.26 RW.06 Desa Pulosari ', '87.52', 12, 55855, 2, 2),
(1032093, 'BELIK', '-7.18706', '109.3304', 'Jl. Raya Belik-Watukumpul,  RT.04 RW.07 Desa Belik', '124.54', 12, 104453, 2, 1),
(1032094, 'WATUKUMPUL', '-7.15601', '109.4187', 'Jl. Raya Watukumpul No. 68, RT.01 RW.04 Desa Watukumpul', '129.02', 15, 64772, 2, 1),
(1032095, 'KEBANDARAN', '-6.97577', '109.4967', 'Jl. Raya Kebandaran Km 1, Desa Kebandaran', '85.98', 19, 54503, 2, 1),
(1032096, 'BANTARBOLANG', '-7.03218', '109.3807', 'Jl. Raya Bantarbolang No. 170, RT.05 RW.03 Desa Bantarbolang', '139.19', 17, 71855, 2, 2),
(1032097, 'RANDUDONGKAL', '-7.10160', '109.3287', 'Jl. Budi Utomo No. 541, RT.52 RW.05 Desa Randudongkal', '27.09', 9, 54397, 1, 1),
(1032098, 'KALIMAS', '-7.06473', '109.3170', 'Jl. Raya Kalimas No. 1, RT.01 RW.01 Desa Kalimas', '63.23', 9, 43034, 2, 2),
(1032099, 'PADURAKSA', '-6.93794', '109.3897', 'Jl. DI Panjaitan No. 218  RT.03 RW.01  Kel. Paduraksa', '63.69', 9, 44965, 1, 2),
(1032100, 'MULYOHARJO', '-6.88888', '109.3932', 'Jl. Veteran No. 277, RT.01 RW.03 Kel. Mulyoharjo', '15.90', 5, 75474, 1, 1),
(1032101, 'KEBONDALEM', '-6.89307', '109.3744', 'Jl. Cisadane No.13, Kel. Kebondalem', '22.34', 6, 57163, 1, 2),
(1032102, 'BANJARDAWA', '-6.91145', '109.4122', 'Jl. Piere Tendean No. 1, RT.01 RW.06 Desa Banjardawa ', '13.09', 5, 46646, 1, 2),
(1032103, 'KABUNAN', '-6.88342', '109.4161', 'Jl. Wora Wari No. 3, RT.01 RW.17 Desa Kabunan ', '19.83', 5, 51229, 1, 2),
(1032104, 'JEBED', '-6.94136', '109.4117', 'Jl. Jebed Selatan No. 66, Desa Jebed Selatan', '34.49', 11, 63867, 2, 2),
(1032105, 'PETARUKAN', '-6.89508', '109.4578', 'Jl. Raya Petarukan KM.11  RT.03 RW.15 Kel. Petarukan', '46.45', 12, 86245, 1, 1),
(1032106, 'KLAREYAN', '-6.84934', '109.4720', 'Jl. Raya Karangdempel No. 69 RT.05 RW.02  Desa Klareyan', '34.84', 8, 60516, 2, 2),
(1032107, 'LOSARI', '-6.91597', '109.5212', 'Jl. Raya Losari-Ampelgading, RT.01 RW.01 Desa Losari', '53.30', 16, 66468, 2, 2),
(1032108, 'PURWOHARJO', '-6.89847', '109.5378', 'Jl. Raya Sidorejo, RT.07 RW.07 Desa Purwoharjo', '15.14', 10, 55402, 1, 1),
(1032109, 'SARWODADI', '-6.86857', '109.5290', 'Jl. Pelita No. 1, RT.21 RW.04 Desa Sarwodadi', '11.40', 8, 33401, 2, 2),
(1032110, 'ROWOSARI', '6.88433', '109.5654', 'Jl. Raya Rowosari No. 9, RT.04 RW.02 Desa Rowosari', '11.90', 7, 30921, 2, 2),
(1032111, 'MOJO', '-6.83900', '109.5199', 'Jl. Raya Mojo, RT.01 RW.04 Desa Mojo', '48.65', 11, 69085, 2, 2),
(1033602, 'JATIROYOM', '-7.02140', '109.4848', 'Jl. Raya Kesesirejo, Desa Jatiroyom', '64.16', 9, 26757, 2, 2),
(1033603, 'KARANGASEM', '-6.92790', '109.4700', 'Jl. Raya Karangasem, Desa Karangasem', '25.80', 6, 38015, 2, 2),
(1033604, 'CIKADU', '-7.16586', '109.4755', 'Jl. Raya Cikadu, Desa Cikadu', '59.46', 7, 3472, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `name`, `password`, `access_level`) VALUES
(1, 'admin@email.com', 'admin1', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1),
(2, 'user@email.com', 'user1', '95c946bf622ef93b0a211cd0fd028dfdfcf7e39e', 2);

-- --------------------------------------------------------

--
-- Structure for view `pusat_kesehatan_masyarakat`
--
DROP TABLE IF EXISTS `pusat_kesehatan_masyarakat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pusat_kesehatan_masyarakat`  AS  select `puskesmas`.`kode_puskesmas` AS `kode_puskesmas`,`puskesmas`.`nama_puskesmas` AS `nama_puskesmas`,`puskesmas`.`alamat` AS `alamat`,`puskesmas`.`luas` AS `luas`,`puskesmas`.`desa` AS `desa`,`puskesmas`.`penduduk` AS `penduduk`,`karakteristik_wilayah`.`karakteristik_wilayah` AS `karakteristik_wilayah`,`jenis`.`jenis_puskesmas` AS `jenis_puskesmas` from ((`puskesmas` join `karakteristik_wilayah` on((`puskesmas`.`karakteristik_wilayah` = `karakteristik_wilayah`.`id_wilayah`))) join `jenis` on((`puskesmas`.`jenis_puskesmas` = `jenis`.`id_jenis`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `karakteristik_wilayah`
--
ALTER TABLE `karakteristik_wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- Indexes for table `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`kode_puskesmas`),
  ADD KEY `fk_wilayah` (`karakteristik_wilayah`),
  ADD KEY `fk_jenis` (`jenis_puskesmas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`jenis_puskesmas`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `fk_wilayah` FOREIGN KEY (`karakteristik_wilayah`) REFERENCES `karakteristik_wilayah` (`id_wilayah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
