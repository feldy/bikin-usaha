-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2015 at 07:33 PM
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
-- Table structure for table `m_chat`
--

CREATE TABLE IF NOT EXISTS `m_chat` (
  `id` varchar(36) NOT NULL,
  `id_entrepreneur` varchar(36) NOT NULL,
  `id_proposal` varchar(36) NOT NULL,
  `message` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_chat`
--

INSERT INTO `m_chat` (`id`, `id_entrepreneur`, `id_proposal`, `message`, `tanggal`) VALUES
('80117f9b-a0ce-4889-9157-be6512ec77fd', '858ee057-2ea9-40bf-9b5e-8ee842cff391', '1bd13079-2969-4ee4-a6d0-6de41d45c93b', '1', '2015-07-15 00:15:04'),
('968182fb-6aae-436c-b47d-55fe79a27d3e', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', '3e276ad9-44a1-4793-ae68-728c9f56bc24', 'apa', '2015-07-15 00:16:11'),
('9887bb75-f9d8-4159-97a7-6ca2ec6886c6', '858ee057-2ea9-40bf-9b5e-8ee842cff391', '7e39ecc8-c923-4c59-bac7-5d6eb622b72d', '2', '2015-07-15 00:15:15'),
('addcd80e-acb2-4b94-ab3f-1b36a324cede', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', '3e276ad9-44a1-4793-ae68-728c9f56bc24', 'apa', '2015-07-15 00:16:15'),
('b285f1c8-d328-4ec3-836e-e79bb37902df', '858ee057-2ea9-40bf-9b5e-8ee842cff391', '3e276ad9-44a1-4793-ae68-728c9f56bc24', 'gak apa2', '2015-07-15 00:29:31'),
('c4b0acb8-31b6-48ba-bc5c-4b211a3bfee6', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', '3e276ad9-44a1-4793-ae68-728c9f56bc24', 'kamu dmana', '2015-07-15 00:23:18'),
('c67a2eec-0519-412a-8b55-fd5f1f1fabd1', '858ee057-2ea9-40bf-9b5e-8ee842cff391', '3e276ad9-44a1-4793-ae68-728c9f56bc24', '3', '2015-07-15 00:15:31'),
('d0b659e9-739c-42f0-93e6-00704d1cabdb', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', '3e276ad9-44a1-4793-ae68-728c9f56bc24', 'apa sih', '2015-07-15 00:29:25'),
('f0890dbb-4a59-46bc-9500-9043f680d86b', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', '3e276ad9-44a1-4793-ae68-728c9f56bc24', '1', '2015-07-15 00:23:30');

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
  `file_biodata` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_entrepreneur`
--

INSERT INTO `m_entrepreneur` (`id`, `email`, `password`, `nama`, `alamat`, `jenis_kelamin`, `no_telepon`, `ttl`, `file_photo`, `file_biodata`, `tanggal`) VALUES
('1b8a1a89-7477-45b9-af45-8386aa8b5f88', 'user@user.com', '12345', 'Yusuf Abidin', 'Jl. Depok 2 Timur', 'Laki-Laki', '32987427', 'Jakarta, 06/06/2015', '1b8a1a89-7477-45b9-af45-8386aa8b5f88.jpg', '1b8a1a89-7477-45b9-af45-8386aa8b5f88.jpg', '2015-07-02'),
('858ee057-2ea9-40bf-9b5e-8ee842cff391', 'feldy.ys@gmail.com', '12345', 'Feldy Yusuf', 'Depok', 'Laki-Laki', '1234567890', 'Jakarta, 09/06/2015', '858ee057-2ea9-40bf-9b5e-8ee842cff391.jpg', '858ee057-2ea9-40bf-9b5e-8ee842cff391.docx', '2015-07-02'),
('d54db59f-4454-4223-bbdc-31cb54206325', '1@1.com', '12345', 'Halooooo', 'Jakarta Selatan', 'Laki-Laki', '3453534534535', 'Jakarta, 18/07/2015', 'd54db59f-4454-4223-bbdc-31cb54206325.png', 'd54db59f-4454-4223-bbdc-31cb54206325.', '2015-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `m_investasi`
--

CREATE TABLE IF NOT EXISTS `m_investasi` (
  `id` varchar(36) NOT NULL,
  `id_proposal` varchar(36) NOT NULL,
  `nilai` decimal(19,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_investasi`
--

INSERT INTO `m_investasi` (`id`, `id_proposal`, `nilai`) VALUES
('0ea911d4-19c0-11e5-af81-1c4bd610cb0e', '7e39ecc8-c923-4c59-bac7-5d6eb622b72d', '20.00'),
('0ea922b0-19c0-11e5-af81-1c4bd610cb0e', '7e39ecc8-c923-4c59-bac7-5d6eb622b72d', '20.00'),
('0ea922b0-29c0-11e5-af81-1c4bd610cb0e', '7e39ecc8-c923-4c59-bac7-5d6eb622b72d', '10.00'),
('0fc911d4-19c0-11e4-af81-1c4bd610cb0e', '3e276ad9-44a1-4793-ae68-728c9f56bc24', '25.00'),
('0fc911d4-19c0-11e5-af81-1c4bd610cb0e', '3e276ad9-44a1-4793-ae68-728c9f56bc24', '25.00'),
('b712becd-f212-4d9d-9aad-25375778c478', '1bd13079-2969-4ee4-a6d0-6de41d45c93b', '25.00'),
('e992d516-a5d6-4bb2-861d-7ba9463e2cf9', '1bd13079-2969-4ee4-a6d0-6de41d45c93b', '25.00');

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
  `tanggal` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jenis_usaha`
--

INSERT INTO `m_jenis_usaha` (`id`, `nama`, `contact_supplier`, `kategori_jenis`, `modal`, `max_jumlah_pegawai`, `deskripsi`, `pic_1`, `pic_2`, `pic_3`, `pic_4`, `doc`, `tanggal`, `is_active`) VALUES
('23cfa4a8-e484-47a0-b187-ad7e766256bc', 'Cappucino Cincau', '08128548100', 'Franchise Minuman', '8800000', 2, '<p style="line-height: 22.2222232818604px;"><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">Paket terlengkap untuk Anda yang tidak mau repot membuat meja counter sendiri. Meja counter dengan material thick block finishing duco (bukan aluminium murahan) dengan signage thick block dilapis acrylic bening dan tiang stainless steel yang terlihat elegan. Gratis Ongkos Kirim untuk area kirim Jakarta dan Tangerang. Tanpa survey, tanpa biaya franchise, tanpa biaya lain. Semua item dalam paket (meja counter, peralatan, dan bahan baku cappucino cincau) jadi milik Anda, bukan dipinjamkan. Tidak ada bagi hasil. Jika bahan baku habis bisa langsung pesan lalu kami kirim</span></p><p style="line-height: 22.2222232818604px;"><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">Anda akan mendapatkan:</span></p><ul style="line-height: 22.2222232818604px;"><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">1 unit meja counter (knock down untuk kemudahan pengiriman ke luar kota) dengan material thick block finishing duco, panjang 1,2 m yang dilengkapi dengan signage thick block dilapis acrylic bening dan tiang stainless steel.</span></li><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">1 unit mesin cup sealer + plastik roll printing berlogo "Cappucin"</span></li><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">1 unit Roll Up Banner ukuran 60x160cm</span></li><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">1 buah printing menu tangan ukuran 45 x 20 cm.</span></li><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">13 rasa powder @1kg (Creamy chocolate, royal chocolatte, cappuccino, caramello, coffee caramel, choco caramel, mochaccino, vanilla, bubble gum, taro, green tea, peppermint, milk tea)</span></li><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">2 jerigen gula cair @6,5kg</span></li><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">1 pack (10 sachet) instant grass jelly powder kualitas premium.</span></li><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">300 pcs cup</span></li><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">300 pcs lid (tutup) cup</span><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">1 pack sedotan</span></li><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">1 kg kantong kresek panjang</span></li><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">1 pcs Jigger (takaran gula cair stainless steel)</span></li><li><span style="color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 20px;">1 pcs measuring spoon (sendok takar powder)</span></li><li></li></ul>', '23cfa4a8-e484-47a0-b187-ad7e766256bc_file1.png', '23cfa4a8-e484-47a0-b187-ad7e766256bc_file2.jpg', NULL, NULL, NULL, '2015-07-08', 1),
('a72a8470-6f8c-4075-83ee-a503e05db0f9', 'SABANA FRIED CHICKEN', '021878777473', 'Franchise Makanan', '35000000', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file1.png', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file2.jpg', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file3.', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file4.', 'a72a8470-6f8c-4075-83ee-a503e05db0f9_file_doc.docx', '2015-07-01', 1),
('af38d7e2-db9a-4097-99e3-fc0cd11dfe9f', 'DE BESTO', '564789364', 'Franchise Makanan', '50000000', 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f_file1.jpg', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f_file2.jpg', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f_file3.jpg', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f_file4.jpg', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f_file_doc.jpg', '2015-07-05', 1),
('d0fb2dcf-64eb-47fb-b49d-657559b74f4e', 'JAMUR CRISPY TIRAM', '08128998341', 'Franchise Makanan', '3200000', 1, '<p style="line-height: 22.2222232818604px;"><span style="font-family: ''Open Sans'', Helvetica, Arial, sans-serif; line-height: 24px; text-align: justify;">Franchise Bisnis Jamur Crispy Gratis Ongkos Kirim Jakarta Bogor Depok Tangerang Bekasi, Tanpa Uang Muka, Bayar Pas Terima Barang (COD), Tanpa Survey, Tanpa Biaya Franchise, Tanpa Biaya Lain, Peralatan Dan Bahan Jadi Hak Milik, Tidak Bagi Hasil. Jika Bahan Baku Habis Dapat Langsung Pesan Lalu Kami Kirim.</span></p><p style="line-height: 22.2222232818604px;">asda</p>', 'd0fb2dcf-64eb-47fb-b49d-657559b74f4e_file1.jpg', 'd0fb2dcf-64eb-47fb-b49d-657559b74f4e_file2.jpg', 'd0fb2dcf-64eb-47fb-b49d-657559b74f4e_file3.jpg', 'd0fb2dcf-64eb-47fb-b49d-657559b74f4e_file4.jpg', 'd0fb2dcf-64eb-47fb-b49d-657559b74f4e_file_doc.docx', '2015-07-02', 1);

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
  `file_photo` varchar(50) DEFAULT NULL,
  `file_biodata` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pegawai_not_user`
--

INSERT INTO `m_pegawai_not_user` (`id`, `id_entrepreneur_reff`, `nama`, `alamat`, `jenis_kelamin`, `no_telepon`, `ttl`, `file_photo`, `file_biodata`, `tanggal`) VALUES
('b7dbc906-335f-4765-b545-e22f1e70487f', '858ee057-2ea9-40bf-9b5e-8ee842cff391', 'asdsdd', 'sffsdfsd', 'Laki-Laki', '2342423', '', 'b7dbc906-335f-4765-b545-e22f1e70487f.jpg', 'b7dbc906-335f-4765-b545-e22f1e70487f.pdf', '2015-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `m_schedule`
--

CREATE TABLE IF NOT EXISTS `m_schedule` (
  `id` varchar(36) NOT NULL,
  `id_proposal` varchar(36) NOT NULL,
  `id_entreprener` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `title` varchar(25) NOT NULL,
  `deskripsi` text,
  `status` varchar(15) DEFAULT NULL COMMENT 'APPROVE,\r\nREJECT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_schedule`
--

INSERT INTO `m_schedule` (`id`, `id_proposal`, `id_entreprener`, `tanggal`, `title`, `deskripsi`, `status`) VALUES
('0632fe24-5898-4628-88ba-5a6b106ba49b', '1bd13079-2969-4ee4-a6d0-6de41d45c93b', '858ee057-2ea9-40bf-9b5e-8ee842cff391', '2015-06-30', 'sdfsdf', 'sdfsdfsdf', 'NEW'),
('0ff093e3-b915-4d56-ba81-36927340160c', '3e276ad9-44a1-4793-ae68-728c9f56bc24', '858ee057-2ea9-40bf-9b5e-8ee842cff391', '2015-07-16', 'BAHAS MODAL', 'Tanggerang', 'NEW'),
('b486051b-bdef-43c6-b816-fccf48b7419b', '1bd13079-2969-4ee4-a6d0-6de41d45c93b', '858ee057-2ea9-40bf-9b5e-8ee842cff391', '2015-07-01', 'FEFE', 'RERE', 'NEW');

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
('ef76b9e3-f78a-4756-8d70-3eec6be9ccd2', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', '3e276ad9-44a1-4793-ae68-728c9f56bc24', '2015-06-20 12:35:29', 'Undangan Join Usaha', 0),
('f8430ea0-4aeb-448d-aa1b-ef55e5951cad', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', '858ee057-2ea9-40bf-9b5e-8ee842cff391', '1bd13079-2969-4ee4-a6d0-6de41d45c93b', '2015-07-07 22:22:50', 'UNDANGAN PEGAWAI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_anggota_proposal_usaha`
--

CREATE TABLE IF NOT EXISTS `t_anggota_proposal_usaha` (
  `id` varchar(36) NOT NULL,
  `id_proposal_usaha` varchar(36) NOT NULL,
  `id_entrepreneur` varchar(36) DEFAULT NULL,
  `id_pegawai_not_user` varchar(36) DEFAULT NULL,
  `id_nilai_investasi` varchar(36) DEFAULT NULL,
  `tipe_anggota` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_anggota_proposal_usaha`
--

INSERT INTO `t_anggota_proposal_usaha` (`id`, `id_proposal_usaha`, `id_entrepreneur`, `id_pegawai_not_user`, `id_nilai_investasi`, `tipe_anggota`, `status`, `tanggal`) VALUES
('1425346e-de1e-40f7-ae72-2235ec529177', '3e276ad9-44a1-4793-ae68-728c9f56bc24', '858ee057-2ea9-40bf-9b5e-8ee842cff391', NULL, '0fc911d4-19c0-11e5-af81-1c4bd610cb0e', 'investor', 'APPROVED', '2015-06-24 00:29:07'),
('4e0340bd-4fe1-4731-bace-e24b00301ecf', '7e39ecc8-c923-4c59-bac7-5d6eb622b72d', '858ee057-2ea9-40bf-9b5e-8ee842cff391', NULL, '0ea911d4-19c0-11e5-af81-1c4bd610cb0e', 'investor', 'NEW', '2015-06-30 21:47:05'),
('5b30ee64-ab20-440d-b8cf-5cc80a8908e6', '1bd13079-2969-4ee4-a6d0-6de41d45c93b', 'd54db59f-4454-4223-bbdc-31cb54206325', NULL, NULL, 'pegawai', 'APPROVED', '2015-07-14 11:54:28'),
('8260d1e0-670a-47de-b707-8f5b46d82f82', '7e39ecc8-c923-4c59-bac7-5d6eb622b72d', '858ee057-2ea9-40bf-9b5e-8ee842cff391', NULL, NULL, 'pegawai', 'NEW', '2015-06-30 21:47:52'),
('c118992c-0ccf-4ccd-a2ce-456b9b1a9a9c', '3e276ad9-44a1-4793-ae68-728c9f56bc24', '858ee057-2ea9-40bf-9b5e-8ee842cff391', NULL, NULL, 'pegawai', 'NEW', '2015-06-24 00:28:51');

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
  `alamat` text,
  `kota` varchar(50) NOT NULL,
  `max_jumlah_investor` int(3) NOT NULL,
  `nilai_persentase_investor` int(3) NOT NULL,
  `nilai_persentase_owner` int(3) NOT NULL DEFAULT '0',
  `gaji_pegawai` decimal(19,4) NOT NULL DEFAULT '0.0000',
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_proposal_usaha`
--

INSERT INTO `t_proposal_usaha` (`id`, `id_owner`, `id_jenis_usaha`, `nama_proposal`, `informasi_proposal`, `alamat`, `kota`, `max_jumlah_investor`, `nilai_persentase_investor`, `nilai_persentase_owner`, `gaji_pegawai`, `tanggal`) VALUES
('1bd13079-2969-4ee4-a6d0-6de41d45c93b', '858ee057-2ea9-40bf-9b5e-8ee842cff391', 'd0fb2dcf-64eb-47fb-b49d-657559b74f4e', 'Jamur Crispy YAYA', 'Salah satu peluang bisnis waralaba dengan modal kecil yang tergolong unik adalah dengan menjalankan usaha jamur. Jamur adalah kuliner yang nikmat, bahkan banyak rumah makan yang menggunakan jamur sebagai bahan pengganti untuk daging. Terutama bagi mereka yang menghindari makanan olahan serba daging, jamur sangat cocok sebagai penggantinya, ujar Bapak Suratman (51) yang saat ini beralih memulai bisnis franchise Mister R. Jamur Crispy. Dengan pengedukasikan seperti ini, masyarakat mempunyai pandagnan bahwa jamur merupakan camilan yang sehat.  Ratman panggilan akrabnya, memulai berbisnis franchise Mister R. Jamur Crispy pada saat itu tahun 2009 tanpa royalti. Berawal dari hobi wisata kuliner, Bapak Ratman tertarik pada usaha pembibitan jamur tiram oleh rekannya. Dari situlah ia mulai menangkap peluang usaha yang masih tergolong cukup unik, yaitu pengolahan jamur tiram putih untuk dijadikan cemilan yang sehat dengan bentuk crispy. Usaha yang masih cukup unik dengan pengolahan bahan baku yang mudah dan resiko usaha yang rendah.  Belajar otodidak dengan keluarga serta beberapa kali trial dan error hingga mendapatkan resep tentang pengolahan tepung dan jamur tiram yang baku, ungkap Bapak Ratman. Franchise jamur crispy dengan menggunakan jamur tiram ini memiliki banyak kandungan gizi dan bermanfaat untuk kesehatan diantaranya ialah menurunkan kolesterol, anti-bakterial dan anti tumor sehingga jamur tiram juga banyak dimanfaatkan untuk mengobati berbagai penyakit mulai dari diabetes, lever dan lainnya.', 'Jl. Pringgodani Timur G.37 Perum Guru Telukan Sukoharjo, Solo Jawa Tengah', 'DKI Jakarta', 2, 25, 50, '350000.0000', '2015-07-03'),
('3e276ad9-44a1-4793-ae68-728c9f56bc24', '1b8a1a89-7477-45b9-af45-8386aa8b5f88', 'a72a8470-6f8c-4075-83ee-a503e05db0f9', 'Proposal 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.', 'Jalan Gili Sampeng No. 7, Jakarta Barat, DKI Jakarta 11530', 'Jakarta Selatan', 2, 25, 50, '3000000.0000', '2015-06-20'),
('7e39ecc8-c923-4c59-bac7-5d6eb622b72d', '858ee057-2ea9-40bf-9b5e-8ee842cff391', 'af38d7e2-db9a-4097-99e3-fc0cd11dfe9f', 'BESTO MERAPI', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.', '', 'Depok', 3, 10, 50, '1500000.0000', '2015-06-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_chat`
--
ALTER TABLE `m_chat`
 ADD PRIMARY KEY (`id`), ADD KEY `m_chat_fk1` (`id_entrepreneur`), ADD KEY `m_chat_fk2` (`id_proposal`);

--
-- Indexes for table `m_entrepreneur`
--
ALTER TABLE `m_entrepreneur`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_investasi`
--
ALTER TABLE `m_investasi`
 ADD PRIMARY KEY (`id`), ADD KEY `m_investasi_fk1` (`id_proposal`);

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
 ADD PRIMARY KEY (`id`), ADD KEY `m_undangan_fk1` (`proposal_id`);

--
-- Indexes for table `t_anggota_proposal_usaha`
--
ALTER TABLE `t_anggota_proposal_usaha`
 ADD PRIMARY KEY (`id`), ADD KEY `t_anggota_proposal_usaha_fk1` (`id_proposal_usaha`), ADD KEY `t_anggota_proposal_usaha_fk2` (`id_entrepreneur`), ADD KEY `t_anggota_proposal_usaha_fk3` (`id_pegawai_not_user`), ADD KEY `t_anggota_proposal_usaha_fk4` (`id_nilai_investasi`);

--
-- Indexes for table `t_proposal_usaha`
--
ALTER TABLE `t_proposal_usaha`
 ADD PRIMARY KEY (`id`), ADD KEY `t_proposal_usaha_fk1` (`id_owner`), ADD KEY `t_proposal_usaha_fk2` (`id_jenis_usaha`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_chat`
--
ALTER TABLE `m_chat`
ADD CONSTRAINT `m_chat_fk1` FOREIGN KEY (`id_entrepreneur`) REFERENCES `m_entrepreneur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `m_chat_fk2` FOREIGN KEY (`id_proposal`) REFERENCES `t_proposal_usaha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `m_investasi`
--
ALTER TABLE `m_investasi`
ADD CONSTRAINT `m_investasi_fk1` FOREIGN KEY (`id_proposal`) REFERENCES `t_proposal_usaha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `m_undangan`
--
ALTER TABLE `m_undangan`
ADD CONSTRAINT `m_undangan_fk1` FOREIGN KEY (`proposal_id`) REFERENCES `t_proposal_usaha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_anggota_proposal_usaha`
--
ALTER TABLE `t_anggota_proposal_usaha`
ADD CONSTRAINT `t_anggota_proposal_usaha_fk1` FOREIGN KEY (`id_proposal_usaha`) REFERENCES `t_proposal_usaha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `t_anggota_proposal_usaha_fk2` FOREIGN KEY (`id_entrepreneur`) REFERENCES `m_entrepreneur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `t_anggota_proposal_usaha_fk3` FOREIGN KEY (`id_pegawai_not_user`) REFERENCES `m_pegawai_not_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `t_anggota_proposal_usaha_fk4` FOREIGN KEY (`id_nilai_investasi`) REFERENCES `m_investasi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_proposal_usaha`
--
ALTER TABLE `t_proposal_usaha`
ADD CONSTRAINT `t_proposal_usaha_fk1` FOREIGN KEY (`id_owner`) REFERENCES `m_entrepreneur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `t_proposal_usaha_fk2` FOREIGN KEY (`id_jenis_usaha`) REFERENCES `m_jenis_usaha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
