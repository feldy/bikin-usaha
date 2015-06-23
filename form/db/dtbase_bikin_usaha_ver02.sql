-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2015 at 01:06 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dtbase_bikin_usaha`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_entrepreneur`
--

CREATE TABLE IF NOT EXISTS `m_entrepreneur` (
  `id` varchar(36) NOT NULL,
  `email` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL,
  `nama` varchar(36) NOT NULL,
  `alamat` text,
  `jenis_kelamin` varchar(36) DEFAULT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `file_photo` varchar(50) DEFAULT NULL,
  `file_biodata` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_entrepreneur`
--

INSERT INTO `m_entrepreneur` (`id`, `email`, `password`, `nama`, `alamat`, `jenis_kelamin`, `no_telepon`, `ttl`, `file_photo`, `file_biodata`) VALUES
('1b8a1a89-7477-45b9-af45-8386aa8b5f88', 'user@user.com', '12345', 'Test', 'wfjowieufowifuwoiu', 'Laki-Laki', '32987427', 'skjdfhskj, 06/06/2015', '1b8a1a89-7477-45b9-af45-8386aa8b5f88.jpg', '1b8a1a89-7477-45b9-af45-8386aa8b5f88.jpg'),
('858ee057-2ea9-40bf-9b5e-8ee842cff391', 'feldy.ys@gmail.com', '12345', 'Feldy Yusuf', 'Depok', 'Laki-Laki', '1234567890', 'Jakarta, 09/06/2015', '858ee057-2ea9-40bf-9b5e-8ee842cff391.jpg', '858ee057-2ea9-40bf-9b5e-8ee842cff391.docx');

-- --------------------------------------------------------

--
-- Table structure for table `m_jenis_usaha`
--

CREATE TABLE IF NOT EXISTS `m_jenis_usaha` (
  `id` varchar(36) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `contact_supplier` varchar(20) NOT NULL,
  `kategori_jenis` varchar(25) NOT NULL,
  `modal` decimal(19,0) NOT NULL DEFAULT '0',
  `max_jumlah_pegawai` int(2) NOT NULL,
  `deskripsi` text NOT NULL,
  `pic_1` varchar(50) DEFAULT NULL,
  `pic_2` varchar(50) DEFAULT NULL,
  `pic_3` varchar(50) DEFAULT NULL,
  `pic_4` varchar(50) DEFAULT NULL,
  `doc` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jenis_usaha`
--

INSERT INTO `m_jenis_usaha` (`id`, `nama`, `contact_supplier`, `kategori_jenis`, `modal`, `max_jumlah_pegawai`, `deskripsi`, `pic_1`, `pic_2`, `pic_3`, `pic_4`, `doc`, `is_active`) VALUES
('a72a8470-6f8c-4075-83ee-a503e05db0f9', 'SABANA FRIED CHICKEN', '021878777473', 'Franchise Makanan', '35000000', 1, '<p><span style="font-weight: bold;">DESKRIPSI <span style="text-decoration: line-through;">INI <span style="color: rgb(156, 0, 0);">sdhkjdfhkshfskjdhfsdf</span></span></span></p>', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file1.png', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file2.jpg', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file3.', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file4.', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file_doc.docx', 1),
('af38d7e2-db9a-4097-99e3-fc0cd11dfe9f', 'DE BESTO', '564789364', 'Franchise Makanan', '50000000', 3, 'INI AYAM', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f_file1.jpg', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f_file2.jpg', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f_file3.jpg', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f_file4.jpg', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f_file_doc.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_pegawai_not_user`
--

CREATE TABLE IF NOT EXISTS `m_pegawai_not_user` (
  `id` varchar(36) NOT NULL,
  `id_entrepreneur_reff` varchar(36) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `ttl` varchar(30) NOT NULL,
  `file_biodata` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_schedule`
--

CREATE TABLE IF NOT EXISTS `m_schedule` (
  `id` varchar(36) NOT NULL,
  `id_proposal` varchar(36) NOT NULL,
  `id_entreprener` varchar(36) NOT NULL,
  `tanggal` datetime NOT NULL,
  `title` varchar(25) NOT NULL,
  `deskripsi` text,
  `status` varchar(15) DEFAULT NULL COMMENT 'APPROVE,\r\nREJECT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_undangan`
--

CREATE TABLE IF NOT EXISTS `m_undangan` (
  `id` varchar(36) NOT NULL,
  `from_id` varchar(36) NOT NULL,
  `to_id` varchar(36) NOT NULL,
  `proposal_id` varchar(36) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `keterangan` text,
  `is_read` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_undangan`
--

INSERT INTO `m_undangan` (`id`, `from_id`, `to_id`, `proposal_id`, `tanggal`, `keterangan`, `is_read`) VALUES
('1d2d5f14-eccd-4fc2-a4c1-6e465ea32888', '858ee057-2ea9-40bf-9b5e-8ee842cff391', '858ee057-2ea9-40bf-9b5e-8ee842cff391', '7e39ecc8-c923-4c59-bac7-5d6eb622b72d', '2015-06-20 23:44:04', 'Undangan Join Usaha', 0),
('8fc496f5-958b-433e-b552-8d7ab8edd8d8', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', '858ee057-2ea9-40bf-9b5e-8ee842cff391', '3e276ad9-44a1-4793-ae68-728c9f56bc24', '2015-06-20 12:35:29', 'Undangan Join Usaha', 0),
('ef76b9e3-f78a-4756-8d70-3eec6be9ccd2', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', '3e276ad9-44a1-4793-ae68-728c9f56bc24', '2015-06-20 12:35:29', 'Undangan Join Usaha', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_anggota_proposal_usaha`
--

CREATE TABLE IF NOT EXISTS `t_anggota_proposal_usaha` (
  `id` varchar(36) NOT NULL,
  `id_proposal_usaha` varchar(36) NOT NULL,
  `id_entrepreneur` varchar(36) DEFAULT NULL,
  `id_pegawai_not_user` varchar(36) DEFAULT NULL,
  `nilai_investasi` decimal(19,0) NOT NULL DEFAULT '0',
  `tipe_anggota` varchar(20) NOT NULL,
  `gaji` decimal(19,0) NOT NULL DEFAULT '0',
  `status` varchar(15) NOT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_proposal_usaha`
--

CREATE TABLE IF NOT EXISTS `t_proposal_usaha` (
  `id` varchar(36) NOT NULL,
  `id_owner` varchar(36) NOT NULL,
  `id_jenis_usaha` varchar(36) NOT NULL,
  `nama_proposal` varchar(50) NOT NULL,
  `informasi_proposal` text,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `max_jumlah_investor` int(3) NOT NULL,
  `nilai_persentase_investor` varchar(50) NOT NULL,
  `nilai_persentase_owner` int(3) NOT NULL DEFAULT '0',
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_proposal_usaha`
--

INSERT INTO `t_proposal_usaha` (`id`, `id_owner`, `id_jenis_usaha`, `nama_proposal`, `informasi_proposal`, `alamat`, `kota`, `max_jumlah_investor`, `nilai_persentase_investor`, `nilai_persentase_owner`, `tanggal`) VALUES
('3e276ad9-44a1-4793-ae68-728c9f56bc24', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', 'a72a8470-6f8c-4075-83ee-a503e05db0f9', 'Proposal 1', 'Proposal <span style="text-decoration: line-through;">1</span>', '', 'Jakarta Selatan', 2, '25,25', 50, '2015-06-20'),
('7e39ecc8-c923-4c59-bac7-5d6eb622b72d', '858ee057-2ea9-40bf-9b5e-8ee842cff391', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f', 'BESTO MERAPI', 'hehehe', '', 'Depok', 3, '10,20,20', 50, '2015-06-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_entrepreneur`
--
ALTER TABLE `m_entrepreneur`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jenis_usaha`
--
ALTER TABLE `m_jenis_usaha`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pegawai_not_user`
--
ALTER TABLE `m_pegawai_not_user`
 ADD PRIMARY KEY (`id`), ADD KEY `m_pegawai_not_user_fk1` (`id_entrepreneur_reff`);

--
-- Indexes for table `m_schedule`
--
ALTER TABLE `m_schedule`
 ADD PRIMARY KEY (`id`), ADD KEY `m_schedule_fk1` (`id_proposal`), ADD KEY `m_schedule_fk2` (`id_entreprener`);

--
-- Indexes for table `m_undangan`
--
ALTER TABLE `m_undangan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_anggota_proposal_usaha`
--
ALTER TABLE `t_anggota_proposal_usaha`
 ADD PRIMARY KEY (`id`), ADD KEY `t_anggota_proposal_usaha_fk1` (`id_proposal_usaha`), ADD KEY `t_anggota_proposal_usaha_fk2` (`id_entrepreneur`), ADD KEY `t_anggota_proposal_usaha_fk3` (`id_pegawai_not_user`);

--
-- Indexes for table `t_proposal_usaha`
--
ALTER TABLE `t_proposal_usaha`
 ADD PRIMARY KEY (`id`), ADD KEY `t_proposal_usaha_fk1` (`id_owner`), ADD KEY `t_proposal_usaha_fk2` (`id_jenis_usaha`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_pegawai_not_user`
--
ALTER TABLE `m_pegawai_not_user`
ADD CONSTRAINT `m_pegawai_not_user_fk1` FOREIGN KEY (`id_entrepreneur_reff`) REFERENCES `m_entrepreneur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `m_schedule`
--
ALTER TABLE `m_schedule`
ADD CONSTRAINT `m_schedule_fk1` FOREIGN KEY (`id_proposal`) REFERENCES `t_proposal_usaha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `m_schedule_fk2` FOREIGN KEY (`id_entreprener`) REFERENCES `m_entrepreneur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_anggota_proposal_usaha`
--
ALTER TABLE `t_anggota_proposal_usaha`
ADD CONSTRAINT `t_anggota_proposal_usaha_fk1` FOREIGN KEY (`id_proposal_usaha`) REFERENCES `t_proposal_usaha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `t_anggota_proposal_usaha_fk2` FOREIGN KEY (`id_entrepreneur`) REFERENCES `m_entrepreneur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `t_anggota_proposal_usaha_fk3` FOREIGN KEY (`id_pegawai_not_user`) REFERENCES `m_pegawai_not_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_proposal_usaha`
--
ALTER TABLE `t_proposal_usaha`
ADD CONSTRAINT `t_proposal_usaha_fk1` FOREIGN KEY (`id_owner`) REFERENCES `m_entrepreneur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `t_proposal_usaha_fk2` FOREIGN KEY (`id_jenis_usaha`) REFERENCES `m_jenis_usaha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
