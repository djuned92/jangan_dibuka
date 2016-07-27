-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2016 at 06:35 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jangan_dibuka`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai`
--

CREATE TABLE IF NOT EXISTS `detail_nilai` (
`id_detail_nilai` int(3) NOT NULL,
  `id_nilai_pegawai` int(3) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `bobot_nilai` decimal(3,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `detail_nilai`
--

INSERT INTO `detail_nilai` (`id_detail_nilai`, `id_nilai_pegawai`, `id_kriteria`, `bobot_nilai`) VALUES
(11, 1, 1, '0.55'),
(12, 1, 3, '0.30'),
(13, 1, 5, '0.60'),
(14, 1, 4, '0.10'),
(15, 1, 2, '0.30'),
(16, 2, 1, '1.00'),
(17, 2, 3, '1.00'),
(18, 2, 5, '0.80'),
(19, 2, 4, '0.90'),
(20, 2, 2, '0.90');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
`id_jabatan` int(3) NOT NULL,
  `kode_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(75) NOT NULL,
  `status_jabatan` enum('Ada','Kosong') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `kode_jabatan`, `nama_jabatan`, `status_jabatan`) VALUES
(1, 'C.1', 'Manajer Area', 'Kosong'),
(2, 'C.7', 'Asisten Manajer Keuangan, SDM, dan Administrasi', 'Ada'),
(3, 'C.7.3', 'Supervisor Pengendalian Anggaran dan Keuangan', 'Ada'),
(4, 'C.7.3.1', 'Staff Pengendalian Anggaran dan Keuangan', 'Ada'),
(5, 'C.7.4', 'Supervisor Pengawasan Pendapatan', 'Kosong'),
(6, 'C.7.4.1', 'Staff Pengawasan Pendapatan', 'Ada'),
(7, 'C.7.5', 'Supervisor Akuntansi', 'Ada'),
(8, 'C.7.5.1', 'Staff Akuntansi', 'Ada'),
(9, 'C.7.6', 'Supervisor SDM', 'Ada'),
(10, 'C.7.6.1', 'Staff SDM', 'Ada'),
(11, 'C.7.7', 'Supervisor Logistik', 'Kosong'),
(12, 'C.7.7.1', 'Staff Logistik', 'Ada'),
(13, 'C.7.8', 'Supervisor Sekretariat', 'Kosong'),
(14, 'C.7.8.1', 'Staff Sekretariat', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(3) NOT NULL,
  `nama_kriteria` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(1, 'Disiplin'),
(2, 'Tanggung Jawab'),
(3, 'Kepemimpinan'),
(4, 'Prestasi'),
(5, 'Pengalaman'),
(6, 'Kesetiaan'),
(7, 'Loyalitas'),
(8, 'Kejujuran'),
(9, 'Lama Bekerja'),
(10, 'Keberanian'),
(11, 'Bejo'),
(12, 'Jobdesk'),
(13, 'Test'),
(14, 'Tsadis');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_tahunan`
--

CREATE TABLE IF NOT EXISTS `kriteria_tahunan` (
`id_kriteria_tahunan` int(5) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `bobot` decimal(3,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `kriteria_tahunan`
--

INSERT INTO `kriteria_tahunan` (`id_kriteria_tahunan`, `tahun`, `id_kriteria`, `bobot`) VALUES
(96, 2016, 1, '0.20'),
(97, 2016, 2, '0.20'),
(98, 2016, 3, '0.30'),
(99, 2016, 4, '0.15'),
(100, 2016, 5, '0.15'),
(101, 2017, 6, '3.00'),
(102, 2017, 7, '1.00'),
(103, 2017, 8, '4.00'),
(104, 2017, 9, '2.00'),
(105, 2015, 2, '0.30'),
(106, 2015, 4, '0.20'),
(107, 2015, 6, '0.10'),
(108, 2018, 7, '2.00'),
(109, 2018, 8, '2.00'),
(110, 2018, 9, '2.00'),
(111, 2014, 1, '0.30'),
(112, 2010, 2, '2.00'),
(113, 2010, 3, '3.00'),
(114, 2010, 4, '4.00'),
(115, 2010, 5, '5.00'),
(116, 2010, 6, '6.00'),
(117, 2010, 7, '7.00'),
(118, 2009, 1, '0.50'),
(119, 2009, 2, '0.50'),
(120, 2020, 1, '0.25'),
(121, 2020, 2, '0.50'),
(122, 2020, 3, '0.25'),
(132, 2021, 7, '3.00'),
(133, 2021, 8, '1.00'),
(134, 2021, 9, '2.00'),
(138, 2007, 1, '0.15'),
(139, 2007, 2, '0.25'),
(140, 2007, 3, '0.60'),
(141, 2000, 1, '0.80'),
(142, 2000, 2, '0.20'),
(143, 2001, 2, '0.20'),
(144, 2001, 3, '0.30'),
(145, 2001, 4, '0.20'),
(146, 2001, 5, '0.10'),
(147, 2001, 6, '0.10'),
(148, 2001, 7, '0.10');

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE IF NOT EXISTS `level_user` (
`id_level_user` int(3) NOT NULL,
  `nama_level` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id_level_user`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Asman'),
(4, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_pegawai`
--

CREATE TABLE IF NOT EXISTS `nilai_pegawai` (
`id_nilai_pegawai` int(3) NOT NULL,
  `id_pegawai` varchar(25) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nilai_pegawai`
--

INSERT INTO `nilai_pegawai` (`id_nilai_pegawai`, `id_pegawai`, `tahun`) VALUES
(1, '5', 2016),
(2, '6', 2016),
(3, '5', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
`id_pegawai` int(3) NOT NULL,
  `id_jabatan` int(3) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `pendidikan` enum('SMA/SMK','D3','S1','S2') NOT NULL,
  `mulai_bekerja` int(4) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` enum('Kawin','Belum Kawin') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_jabatan`, `nip`, `nama`, `tempat`, `tanggal_lahir`, `email`, `alamat`, `jenis_kelamin`, `pendidikan`, `mulai_bekerja`, `foto`, `status`) VALUES
(1, 9, '88111189z', 'Herlina Wulan Sari', 'Jakarta', '1988-01-20', '', 'Bojong Pondok Gede', 'P', 'D3', 2008, '', 'Kawin'),
(3, 2, '8711137z', 'Zulkarnaen', 'Bekasi', '1970-04-17', '', 'Komplek graha indah jati asih', 'L', 'S1', 2001, '', 'Kawin'),
(5, 3, 'qwerty123', 'Isyana Sarasvati', 'Klaten', '1990-05-17', '', 'Jawa Timur', 'P', 'S1', 2002, '', 'Belum Kawin'),
(6, 10, 'r41111sa', 'Raisa', 'Jonggol', '1988-06-15', 'raisa@gmail.com', 'Jawa Barat', 'P', 'S1', 2005, 'tes.png', 'Belum Kawin'),
(7, 10, '56888894b', 'Tulus', 'Kepulauan Seribu', '2987-01-20', 'tulus@gmail.com', 'Jakarta', 'L', 'SMA/SMK', 2003, 'tes.png', 'Belum Kawin'),
(9, 12, '19580904 198003 2 001', 'Prawitasari, Apt, M.Kes', 'Bali', '1976-12-31', 'a@gmail.com', 'jakarta selatan kp. utan', 'P', 'S2', 2000, 'Hydrangeas.jpg', 'Kawin'),
(10, 8, '19580904 198003 2 001', 'Ahmad Djunaedi', 'Bali', '1976-12-31', 'a@gmail.com', 'Bali', 'L', 'S2', 1992, 'Penguins.jpg', 'Belum Kawin');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`id_pesan` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `isi_pesan` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `email`, `isi_pesan`, `create_at`) VALUES
(1, 'ahmad djunaedi', 'bla bla bla bla', '2016-05-16 15:08:18'),
(2, 'budi', 'ini pesan budi', '2016-05-16 15:57:20'),
(3, 'hana', 'ini pesan hana', '2016-05-16 15:57:20'),
(4, 'azmi', 'ini pesan azmi', '2016-05-16 15:57:36'),
(6, 'Ahmad Djunaedi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-05-17 06:09:35'),
(7, 'djuned', 'aktif user, nip 1111093000016', '2016-06-04 10:25:28'),
(8, 'samsudingoceng@gmail.com', 'username 1111093000018 belum terdaftar nih min.\r\nemail sho@gmail.com', '2016-06-09 14:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat_diklat`
--

CREATE TABLE IF NOT EXISTS `sertifikat_diklat` (
`id_serdik` int(3) NOT NULL,
  `id_pegawai` int(3) NOT NULL,
  `no_serdik` varchar(25) NOT NULL,
  `nama_serdik` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `bukti_serdik` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sertifikat_diklat`
--

INSERT INTO `sertifikat_diklat` (`id_serdik`, `id_pegawai`, `no_serdik`, `nama_serdik`, `tanggal_mulai`, `tanggal_selesai`, `nilai`, `bukti_serdik`) VALUES
(1, 3, 'P.25.001.17052016', 'Pengadaan Barang / Jasa', '2016-05-17', '2016-05-20', 'A (Sangat Baik)', 'Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(3) NOT NULL,
  `id_pegawai` int(3) NOT NULL,
  `level_user` enum('Admin','SPV SDM','Asman','Manager') NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_pegawai`, `level_user`, `username`, `password`, `status`, `create_at`) VALUES
(1, 1, 'Admin', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Aktif', '2016-06-08 06:51:02'),
(3, 3, 'Asman', 'asman', '23353ae93a992075419250ed11e0ae34ce22c239', 'Aktif', '2016-06-23 01:53:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_nilai`
--
ALTER TABLE `detail_nilai`
 ADD PRIMARY KEY (`id_detail_nilai`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_tahunan`
--
ALTER TABLE `kriteria_tahunan`
 ADD PRIMARY KEY (`id_kriteria_tahunan`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
 ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `nilai_pegawai`
--
ALTER TABLE `nilai_pegawai`
 ADD PRIMARY KEY (`id_nilai_pegawai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `sertifikat_diklat`
--
ALTER TABLE `sertifikat_diklat`
 ADD PRIMARY KEY (`id_serdik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_nilai`
--
ALTER TABLE `detail_nilai`
MODIFY `id_detail_nilai` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kriteria_tahunan`
--
ALTER TABLE `kriteria_tahunan`
MODIFY `id_kriteria_tahunan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
MODIFY `id_level_user` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nilai_pegawai`
--
ALTER TABLE `nilai_pegawai`
MODIFY `id_nilai_pegawai` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
MODIFY `id_pegawai` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `id_pesan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sertifikat_diklat`
--
ALTER TABLE `sertifikat_diklat`
MODIFY `id_serdik` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
