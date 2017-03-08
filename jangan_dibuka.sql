-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 01:19 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `detail_nilai`
--

INSERT INTO `detail_nilai` (`id_detail_nilai`, `id_nilai_pegawai`, `id_kriteria`, `bobot_nilai`) VALUES
(1, 1, 15, '0.70'),
(2, 1, 16, '0.90'),
(3, 1, 17, '0.60'),
(4, 2, 15, '0.80'),
(5, 2, 16, '0.70'),
(6, 2, 17, '0.80'),
(7, 3, 15, '1.00'),
(8, 3, 17, '1.00'),
(9, 3, 20, '1.00'),
(10, 3, 24, '1.00'),
(11, 3, 25, '1.00'),
(12, 3, 26, '1.00'),
(13, 4, 15, '1.00'),
(14, 4, 17, '1.00'),
(15, 4, 20, '0.90'),
(16, 4, 24, '1.00'),
(17, 4, 25, '0.80'),
(18, 4, 26, '1.00'),
(19, 5, 15, '1.00'),
(20, 5, 17, '1.00'),
(21, 5, 20, '1.00'),
(22, 5, 24, '1.00'),
(23, 5, 25, '1.00'),
(24, 5, 26, '1.00'),
(25, 6, 15, '1.00'),
(26, 6, 17, '1.00'),
(27, 6, 20, '1.00'),
(28, 6, 24, '0.80'),
(29, 6, 25, '0.80'),
(30, 6, 26, '1.00'),
(31, 7, 15, '0.80'),
(32, 7, 17, '0.80'),
(33, 7, 20, '1.00'),
(34, 7, 24, '0.80'),
(35, 7, 25, '0.80'),
(36, 7, 26, '1.00'),
(37, 8, 15, '0.60'),
(38, 8, 17, '1.00'),
(39, 8, 20, '1.00'),
(40, 8, 24, '0.60'),
(41, 8, 25, '0.80'),
(42, 8, 26, '1.00'),
(43, 9, 15, '0.60'),
(44, 9, 16, '1.00');

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
(1, 'C.1', 'Manajer Area', 'Ada'),
(2, 'C.7', 'Asisten Manajer Keuangan, SDM, dan Administrasi', 'Ada'),
(3, 'C.7.3', 'Supervisor Pengendalian Anggaran dan Keuangan', 'Ada'),
(4, 'C.7.3.1', 'Staff Pengendalian Anggaran dan Keuangan', 'Ada'),
(5, 'C.7.4', 'Supervisor Pengawasan Pendapatan', 'Ada'),
(6, 'C.7.4.1', 'Staff Pengawasan Pendapatan', 'Ada'),
(7, 'C.7.5', 'Supervisor Akuntansi', 'Ada'),
(8, 'C.7.5.1', 'Staff Akuntansi', 'Ada'),
(9, 'C.7.6', 'Supervisor SDM', 'Ada'),
(10, 'C.7.6.1', 'Staff SDM', 'Ada'),
(11, 'C.7.7', 'Supervisor Logistik', 'Ada'),
(12, 'C.7.7.1', 'Staff Logistik', 'Ada'),
(13, 'C.7.8', 'Supervisor Sekretariat', 'Kosong'),
(14, 'C.7.8.1', 'Staff Sekretariat', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(3) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(15, 'Disiplin'),
(16, 'Masa Kerja'),
(17, 'Pendidikan'),
(18, 'Kepemimpinan'),
(19, 'Kerja Sama'),
(20, 'Prestasi'),
(21, 'Loyalitas'),
(22, 'Giat'),
(23, 'Motivasi'),
(24, 'Lama Bekerja'),
(25, 'Sertifikat Diklat'),
(26, 'Mengerjakan Diluar Jobdesk'),
(27, 'Keuletan');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_tahunan`
--

CREATE TABLE IF NOT EXISTS `kriteria_tahunan` (
`id_kriteria_tahunan` int(5) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `bobot` decimal(3,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `kriteria_tahunan`
--

INSERT INTO `kriteria_tahunan` (`id_kriteria_tahunan`, `tahun`, `id_kriteria`, `bobot`) VALUES
(1, 2015, 15, '0.30'),
(2, 2015, 16, '0.60'),
(3, 2015, 17, '0.10'),
(4, 2016, 15, '0.10'),
(5, 2016, 17, '0.10'),
(6, 2016, 20, '0.30'),
(7, 2016, 24, '0.20'),
(8, 2016, 25, '0.10'),
(9, 2016, 26, '0.20'),
(10, 2017, 15, '0.10'),
(11, 2017, 17, '0.10'),
(12, 2017, 20, '0.30'),
(13, 2017, 24, '0.20'),
(14, 2017, 25, '0.10'),
(15, 2017, 26, '0.20'),
(16, 2018, 15, '0.30'),
(17, 2018, 16, '0.70');

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
  `id_jabatan` int(3) NOT NULL,
  `tahun` int(4) NOT NULL,
  `status_nilai_pegawai` enum('Dipromosikan','Tidak Dipromosikan') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `nilai_pegawai`
--

INSERT INTO `nilai_pegawai` (`id_nilai_pegawai`, `id_pegawai`, `id_jabatan`, `tahun`, `status_nilai_pegawai`) VALUES
(1, '7', 3, 2015, 'Tidak Dipromosikan'),
(2, '6', 3, 2015, 'Tidak Dipromosikan'),
(3, '7', 7, 2016, 'Dipromosikan'),
(4, '6', 7, 2016, 'Tidak Dipromosikan'),
(5, '15', 13, 2017, 'Dipromosikan'),
(6, '12', 13, 2017, 'Tidak Dipromosikan'),
(7, '10', 13, 2017, 'Tidak Dipromosikan'),
(8, '9', 13, 2017, 'Tidak Dipromosikan'),
(9, '12', 13, 2018, 'Tidak Dipromosikan');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_jabatan`, `nip`, `nama`, `tempat`, `tanggal_lahir`, `email`, `alamat`, `jenis_kelamin`, `pendidikan`, `mulai_bekerja`, `foto`, `status`) VALUES
(1, 9, '88111189z', 'Herlina Wulan Sari', 'Jakarta', '1988-01-20', 'herila@rocketmail.com', 'Bojong Pondok Gede', 'P', 'S1', 2008, 'Penguins1.jpg', 'Kawin'),
(3, 2, '8711137z', 'Zulkarnaen', 'Yogyakarta', '1970-04-17', 'irvan.prastya22@gmail.com', 'Komplek graha indah jati asih', 'L', 'S1', 2001, '', 'Kawin'),
(5, 3, '90345678y', 'Santi Yenedi', 'Klaten', '1990-05-17', 'santi@yen.com', 'Jawa Timur', 'P', 'S1', 2002, '', 'Belum Kawin'),
(6, 10, '88092380y', 'Herri Irawan', 'Jonggol', '1988-06-15', 'herri@gmail.com', 'Jawa Barat', 'L', 'D3', 2005, 'Lighthouse.jpg', 'Kawin'),
(7, 14, '90121278y', 'Elyana', 'Kepulauan Seribu', '2987-01-20', 'tulus@gmail.com', 'Jakarta', 'L', 'SMA/SMK', 2003, 'tes.png', 'Belum Kawin'),
(9, 12, '85098765z', 'Munirah', 'Bali', '1976-12-31', 'munirah@yahoo.com', 'jakarta selatan kp. utan', 'P', 'S2', 2000, 'Hydrangeas.jpg', 'Kawin'),
(10, 12, '92134567y', 'Sujadmiko', 'Bali', '1992-04-17', 'sud@miko.com', 'Bali', 'L', 'S2', 2005, 'Penguins.jpg', 'Belum Kawin'),
(11, 1, '65851234z', 'Firman Ansyari', 'Bandung', '1965-01-20', 'manajer@gmail.com', 'Bandung Lautan Api', 'L', 'S2', 1985, '', 'Kawin'),
(12, 8, 'dummy123', 'Dummy', 'Yogyakarta', '1957-12-31', 'a@gmail.com', 'Yogyakarta', 'L', 'D3', 2000, 'busana-gamis-terbarugrosir-baju-gamis-modern.jpg', 'Kawin'),
(13, 14, '65858898z', 'Dzaelani', 'Jonggol', '1984-12-31', 'Dzaelani@gmail.com', 'Jonggol', 'L', 'D3', 2004, 'Lighthouse1.jpg', 'Kawin'),
(14, 14, '65856789z', 'Ayu Diah Pitaloka', 'Bogor', '1978-12-31', 'ayu@yahoo.com', 'Bogor', 'P', 'S1', 2002, 'Chrysanthemum2.jpg', 'Kawin'),
(15, 12, '79851122z', 'Budi Haryanto', 'Jember', '1988-12-31', 'budi@rocketmail.com', 'Jember', 'L', 'D3', 2005, 'Koala.jpg', 'Kawin');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`id_pesan` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `masalah` enum('Lupa Password','Status Tidak Aktif') NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `username`, `masalah`, `create_at`) VALUES
(7, 'djuned', 'Lupa Password', '2016-07-21 14:48:54'),
(8, 'samsudingoceng@gmail.com', 'Lupa Password', '2016-07-21 14:48:48'),
(9, '1111093000016', 'Status Tidak Aktif', '2016-07-21 15:06:34'),
(10, 'ahmad djunaedi', 'Lupa Password', '2016-07-24 16:02:31'),
(11, 'djuned92', 'Status Tidak Aktif', '2016-08-14 18:58:18'),
(12, 'manajer', 'Status Tidak Aktif', '2016-08-16 09:12:35'),
(13, '1111093000020', 'Lupa Password', '2016-08-20 10:24:50'),
(14, 'djuned92', 'Lupa Password', '2016-08-20 10:25:24'),
(15, '1111093000016', 'Lupa Password', '2016-12-07 14:02:41');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sertifikat_diklat`
--

INSERT INTO `sertifikat_diklat` (`id_serdik`, `id_pegawai`, `no_serdik`, `nama_serdik`, `tanggal_mulai`, `tanggal_selesai`, `nilai`, `bukti_serdik`) VALUES
(1, 3, 'P.25.001.17052016', 'Pengadaan Barang / Jasa', '2016-05-17', '2016-05-20', 'A (Sangat Baik)', 'Jellyfish.jpg'),
(2, 10, 'K.1001.001.05052015', 'Pelatihan baca skala listrik rumah tangga', '2015-09-24', '2015-10-25', 'B (Baik)', 'Tulips.jpg'),
(3, 10, 'P.11.002.2016', 'Pelatihan kelistrikan', '2016-07-11', '2016-07-12', 'A (Sangat Baik)', 'Tulips.jpg'),
(4, 9, 'P.15.007.2014', 'Pengadaan kabel listrik', '2016-07-03', '2016-07-03', 'C (Cukup)', 'Jellyfish.jpg'),
(5, 6, '00.11333.44', 'ADM/Administrasi Perkantoran Dasar', '2016-08-18', '2016-08-18', 'A (Sangat Baik)', 'gamis1.jpg'),
(6, 6, 'P.25.001.1705204', 'ADM/ Sertifikat', '2013-12-31', '2013-12-31', 'A (Sangat Baik)', 'Desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(3) NOT NULL,
  `id_pegawai` int(3) NOT NULL,
  `level_user` enum('Admin','SPV SDM','Asman','Manajer') NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_pegawai`, `level_user`, `username`, `password`, `status`, `create_at`) VALUES
(1, 6, 'Admin', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Aktif', '2016-12-19 16:28:13'),
(3, 3, 'Asman', 'asman', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Aktif', '2016-10-04 08:24:32'),
(4, 1, 'SPV SDM', 'spvsdm', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Aktif', '2016-12-19 16:28:20'),
(5, 11, 'Manajer', 'manajer', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Aktif', '2016-09-02 06:43:45');

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
MODIFY `id_detail_nilai` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `kriteria_tahunan`
--
ALTER TABLE `kriteria_tahunan`
MODIFY `id_kriteria_tahunan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
MODIFY `id_level_user` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nilai_pegawai`
--
ALTER TABLE `nilai_pegawai`
MODIFY `id_nilai_pegawai` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
MODIFY `id_pegawai` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `id_pesan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sertifikat_diklat`
--
ALTER TABLE `sertifikat_diklat`
MODIFY `id_serdik` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
