-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2015 at 04:31 PM
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
  `file_biodata` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_entrepreneur`
--

INSERT INTO `m_entrepreneur` (`id`, `email`, `password`, `nama`, `alamat`, `jenis_kelamin`, `no_telepon`, `ttl`, `file_biodata`) VALUES
('1b8a1a89-7477-45b9-af45-8386aa8b5f88', 'lsdkf@jksh.com', 'skjdhf', 'Test', 'wfjowieufowifuwoiu', 'Laki-Laki', '32987427', 'skjdfhskj, 06/06/2015', '1b8a1a89-7477-45b9-af45-8386aa8b5f88.jpg');

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
('a72a8470-6f8c-4075-83ee-a503e05db0f9', 'SABANA FRIED CHICKEN', '021878777473', 'Franchise Makanan', '35000000', 2, '<p><span style="font-weight: bold;">DESKRIPSI <span style="text-decoration: line-through;">INI <span style="color: rgb(156, 0, 0);">sdhkjdfhkshfskjdhfsdf</span></span></span></p>', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file1.png', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file2.jpg', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file3.', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file4.', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file_doc.docx', 0);

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
  `max_jumlah_investor` int(3) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
