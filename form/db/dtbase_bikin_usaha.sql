-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2015 at 08:57 AM
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
('5a70a102-eb04-490f-9bdf-779a34d603d0', 'd04ff88a-76b2-4e04-ac2a-ed0eb6bbeef7', '8a9e9a9c-98a8-48da-99d1-d360a7e49337', 'halo', '2015-07-25 00:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `m_entrepreneur`
--

CREATE TABLE IF NOT EXISTS `m_entrepreneur` (
  `id` varchar(36) NOT NULL,
  `email` varchar(36) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(36) NOT NULL,
  `tipe_user` varchar(30) NOT NULL,
  `nama` varchar(36) NOT NULL,
  `alamat` text,
  `jenis_kelamin` varchar(36) DEFAULT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `file_photo` varchar(50) DEFAULT NULL,
  `file_biodata` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `file_ktp` varchar(50) DEFAULT NULL,
  `file_npwp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_entrepreneur`
--

INSERT INTO `m_entrepreneur` (`id`, `email`, `username`, `password`, `tipe_user`, `nama`, `alamat`, `jenis_kelamin`, `no_telepon`, `ttl`, `file_photo`, `file_biodata`, `tanggal`, `file_ktp`, `file_npwp`) VALUES
('0bca4a34-a2cb-4dbc-975e-d91349f13084', 'sdf@sdff.com', 'sdf@sdff.com', 'sldfk', 'Entrepreneur', 'sdf', 'sdfsdf', 'Laki-Laki', '32423', 'sdf, 08/07/2015', '0bca4a34-a2cb-4dbc-975e-d91349f13084.', '0bca4a34-a2cb-4dbc-975e-d91349f13084.', '2015-07-31', NULL, NULL),
('5f6e4b23-fde2-4f68-8e4d-758c2dce5f95', '2@2.com', '2@2.com', '12345', 'Entrepreneur', 'Sasuke Uchiha', 'Jl. Raya Citayam Kp. Ratujaya No.10 Cipayung', 'Laki-Laki', '0213456723', 'Konoha, 23/07/2009', '5f6e4b23-fde2-4f68-8e4d-758c2dce5f95.jpg', '5f6e4b23-fde2-4f68-8e4d-758c2dce5f95.', '2015-07-18', NULL, NULL),
('82cc5010-d740-42de-ae12-f9247937a523', 'user1@user1.com', 'user1@user1.com', '12345', 'Entrepreneur', 'User 1', 'Depok 2 Timur', 'Laki-Laki', '08987665435', 'jakarta, 06/02/1992', '82cc5010-d740-42de-ae12-f9247937a523.jpg', '82cc5010-d740-42de-ae12-f9247937a523.', '2015-07-25', NULL, NULL),
('9a32c54c-e781-4efc-b459-f677a4bc60d2', '1@1.com', '1@1.com', '12345', 'Entrepreneur', 'Naruto', 'Jl. Raya Muchtar Gg.Kopral Daman No. 48 - Sawangan Baru, Banjarmasin16511', 'Laki-Laki', '0219876543', 'Banjarmasin, 30/12/1995', '9a32c54c-e781-4efc-b459-f677a4bc60d2.png', '9a32c54c-e781-4efc-b459-f677a4bc60d2.', '2015-07-18', NULL, NULL),
('ce33f801-e9f4-4a53-ae68-711210e26003', 'admin@admin.com', 'admin@admin.com', '12345', 'Entrepreneur', 'Admin', '1234567890', 'Laki-Laki', '09876544567', 'Jakarta, 01/07/2015', 'ce33f801-e9f4-4a53-ae68-711210e26003.png', 'ce33f801-e9f4-4a53-ae68-711210e26003.', '2015-07-18', NULL, NULL),
('d04ff88a-76b2-4e04-ac2a-ed0eb6bbeef7', 'feldy.ys@gmail.com', 'feldy.ys@gmail.com', '12345', 'Entrepreneur', 'Feldy Yusuf', 'Depok 2 Timur', 'Laki-Laki', '0219999999999', 'Jakarta, 12/03/1992', 'd04ff88a-76b2-4e04-ac2a-ed0eb6bbeef7.jpg', 'd04ff88a-76b2-4e04-ac2a-ed0eb6bbeef7.', '2015-07-18', NULL, NULL),
('da0c7180-28e1-417f-bca8-76bdfb1171f5', 'asd@afsdf.com', 'investor', '12345', 'Investor', 'Investor', 'dfdgdfgdf', 'Laki-Laki', '23242342', 'FSDF, 20/08/2015', '', '', '2015-08-01', 'd04ff88a-76b2-4e04-ac2a-ed0eb6bbeef7_ktp.jpg', 'd04ff88a-76b2-4e04-ac2a-ed0eb6bbeef7_npwp.jpg'),
('eb90facc-8c98-44f8-96b5-9554f8ee02a8', 'sdf@sdff.com', 'sdf@sdff.com', 'sdfdfdf', 'Entrepreneur', 'sdfsf', 'sdfsdf', 'Laki-Laki', '142412', 'sdfsdf, 29/07/2015', '', '', '2015-08-01', '', ''),
('ffb37de8-3481-49be-826f-4d5b697d67ac', 'sdfsdf@lksfg.com', 'pegawai', '12345', 'Pegawai', 'Pegawai', 'dfgdfg', 'Laki-Laki', '34563', 'JKT, 26/08/2015', '', '', '2015-08-01', '', '');

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
('0153fa70-64c3-4360-814e-1ae17a9d73d1', '8a9e9a9c-98a8-48da-99d1-d360a7e49337', '5.00'),
('01d00782-9376-45e2-8cc2-4e296ba42668', '8a9e9a9c-98a8-48da-99d1-d360a7e49337', '5.00'),
('23897f31-ca11-4609-9510-e886a7461b6a', '8a9e9a9c-98a8-48da-99d1-d360a7e49337', '5.00'),
('3bc8073b-ca01-4e8b-bd74-b9c10fec3920', 'b36db587-1234-4b1e-ab82-b2a911f5fde3', '5.00'),
('53416216-5eb0-4142-bbc7-b31d63adbef4', 'b36db587-1234-4b1e-ab82-b2a911f5fde3', '10.00'),
('56b2fbff-be59-4c25-a93c-a673a41fc977', '8a9e9a9c-98a8-48da-99d1-d360a7e49337', '5.00'),
('70999da6-a626-4cf9-bdc1-ba1a5de98369', '6bc6936e-b9a9-46a9-9bf9-2c0163e3461a', '25.00'),
('8b932ff5-c4aa-4c1b-a1da-4f5506d4aabb', 'b36db587-1234-4b1e-ab82-b2a911f5fde3', '25.00'),
('b4df9076-cf92-466e-bacf-737e80b42959', '6bc6936e-b9a9-46a9-9bf9-2c0163e3461a', '25.00'),
('c4d24d80-1acb-42b0-bbe7-ffba864f4348', 'b36db587-1234-4b1e-ab82-b2a911f5fde3', '30.00'),
('d94db65a-be34-47fd-ad4d-a935eadbf40a', '8a9e9a9c-98a8-48da-99d1-d360a7e49337', '5.00'),
('e46db074-a32f-48c9-b043-08849e8630c6', 'b36db587-1234-4b1e-ab82-b2a911f5fde3', '10.00');

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
('0b6724b6-2dfc-4248-8185-bfa32d0bce5a', 'Bebek Jumbo', '08161880092', 'Franchise Makanan', '180000000', 10, '<p><p class="MsoNormal" style="margin-bottom:18.75pt;text-align:justify;line-height:18.75pt"><span style="font-size:12.0pt;font-family:&quot;Ubuntu&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;">bebek kini sudahtidak asing lagi di lidah masyarakat Indonesia. Bahkan, kepopulerannya mulaiâ€œmenggoyangâ€ monopoli menu ayam. Apagi bila bebek ini diolah sedemikian rupasehingga menghasilkan produk yang lezat, tidak amis, rendah kolesterol, dandengan ukuran porsi yang lebih besar. Dijamin, penyuka ayam akan dengansukarela beralih ke menu bebek. Dengan kata lain, diferensiasi atau inovasiadalah kata kunci di bisnis kuliner yang satu ini.<o:p></o:p></span></p><p class="MsoNormal" style="margin-bottom:18.75pt;text-align:justify;line-height:18.75pt"><span style="font-size:12.0pt;font-family:&quot;Ubuntu&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;">Ari Prayantomenyadari betapa pentingnya inovasi dan diferensiasi tersebut, sehingga ia punmenghadirkan bisnis dengan menu utama bebek yang penuh diferensiasi. BebekJumbosendiri mulai dikonsep Ari sejak 2010, hadir dan mengalir di â€œkota gudegâ€,Yogyakarta. Kenunikan merek yang satu ini Bukan hanya namanya saja yaitu JUMBO,tapi memang konsep dari resto BebekJumbo adalah bermain cantik pada porsinya.â€œKeunikan kami terletak pada ukuran semua menu yang Jumbo alias besar,â€ tukasAri.<o:p></o:p></span></p><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Ubuntu&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA">Namunbukan hanya mengandalkan hal tersebut, Ari juga menggabungkan menu unik dengantata ruang yang simple namun segar dengan paduan manajemen resto yang lincahdan modern. Ia pun menyasar kelas menengah ke samping, keluarga muda, danpecinta kuliner non mainstream. Mereka adalah jumlah terbanyak saat ini.</span></p><p class="MsoNormal" style="margin-bottom:18.75pt;text-align:justify;line-height:18.75pt"><span style="font-size:12.0pt;font-family:&quot;Ubuntu&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;">Ari mengungkapkan,BebekJumbo adalah rumah makan yang menawarkan menu-menu yang tidak biasa,diolah dengan resep warisan leluhur, yang hasilnya adalah cita rasa luar biasa,dalam porsi yang juga luar biasa. Lebih dari 50 jenis menu yang disiapkan olehManajemen Bebek Jumbo, dapat menjadi salah satu andalan untuk mulai membukabisnis rumah makan tanpa pusing memikirkan konsepnya. Selain enak dinikmati,Bebek Jumbo juga enak dan prospek untuk alternatif usaha Anda.<o:p></o:p></span></p><p class="MsoNormal" style="margin-bottom:18.75pt;text-align:justify;line-height:18.75pt"><span style="font-size:12.0pt;font-family:&quot;Ubuntu&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;">Pria yang memilikilatarbelakang Matematika dan Manajemen ini nyatanya memang tepat memilihstrategi tersebut. Reso BebekJumbo miliknya langsung meroket. Meseki demikian,ia mengakui sempat menikmati â€œpaceklikâ€ di minggu awal opening. Akan tetapi,menginjak minggu kedua. BebekJumbo benar-benar memberikan omset sebesar porsiproduk yang ditawarkannya.<o:p></o:p></span></p><p><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Ubuntu&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA">â€œItu(pendapatan di minggu kedua. Red) memang di louar dugaan saya. Bayangkan saja,di minggu pertama bahkan saya harus memotivasi tim karena banyak watu terbuangpercuma karena sepi. Akan tetapi, masuk minggu kedua dalam sehari kami mampumeraup omset Rp 10 juta per harinya dan mampu menembus Rp 100 jutaan lebih dibulan pertama,â€ ungkap Ari bersemangat</span><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Ubuntu&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA"><br></span></p>', '0b6724b6-2dfc-4248-8185-bfa32d0bce5a_file1.png', '0b6724b6-2dfc-4248-8185-bfa32d0bce5a_file2.jpg', '0b6724b6-2dfc-4248-8185-bfa32d0bce5a_file3.jpg', '0b6724b6-2dfc-4248-8185-bfa32d0bce5a_file4.jpg', '0b6724b6-2dfc-4248-8185-bfa32d0bce5a_file_doc.docx', '2015-07-18', 1),
('52015608-323d-40ec-8d53-a3edb73e3393', 'Bakmi Naga', '02126275168', 'Franchise Makanan', '1000000000', 10, '<p class="MsoNormal" style="margin-bottom:7.5pt;text-align:justify;line-height:normal"><b><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;">Waralaba Bakmi Naga Resto</span></b><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp;adalah salah satu resto bakmi terkemuka dan tertua diindonesia yang mempunyai ciri khas atau â€œuniqnessâ€ tersendiri dibandingkandengan bakmi-bakmi lain yang ada di Indonesia.<o:p></o:p></span></p><p class="MsoNormal" style="margin-bottom:7.5pt;text-align:justify;line-height:normal"><b><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;">Bakmi Naga Resto</span></b><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp;adalah restoran oriental yang bercita rasa indonesiadengan menu specialnya yakni Bakmi Special Naga dan ditambah dengan menu yanglebih dari 200 menu.<o:p></o:p></span></p><span style="font-size:12.0pt;line-height:107%;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA">Apabila anda memang mencari pecinta kuliner yangmemiliki â€œpassionâ€ dan mementingkan kualitas serta cita rasa di didang kuliner,maka marilah bergabung bersama kami dengan menjadi keluarga besar&nbsp;<b>BakmiNaga Resto</b></span>', '52015608-323d-40ec-8d53-a3edb73e3393_file1.jpg', '52015608-323d-40ec-8d53-a3edb73e3393_file2.jpg', '52015608-323d-40ec-8d53-a3edb73e3393_file3.jpg', '52015608-323d-40ec-8d53-a3edb73e3393_file4.jpg', '52015608-323d-40ec-8d53-a3edb73e3393_file_doc.docx', '2015-07-18', 1),
('59e32853-6d69-4ceb-849e-dc00d4af4a71', 'Sabana Fried Chicken', '02184900735', 'Franchise Makanan', '16000000', 2, '<p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;">Ayam goreng tepung atau yang biasa dikenal Fried Chicken, sangat digemari Masyarakat Indonesia. Sehingga jangan heran jika kini berjamuran, outlet-outlet yang menawarkan makanan ini.&nbsp;Tapi, apakah Fried Chicken yang ditawarkan sudah aman untuk dikonsumsi. Mulai dari cara pemotongan yang syar''i hingga memenuhi standar kesehatan.</p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;">Pada bulan Agustus 2006 Sabana Fried Chicken hadir, dengan outlet pertama di Duta Indah, Bekasi. Sabana fried Chicken hadir untuk memenuhi kebutuhan masyarakat, akan makanan fried chicken yang halal dan higienis. Karena proses pengolahannya sudah sesuai dengan standar kesehatan dan mendapatkan sertifikat dari Majelis Ulama Indonesia (MUI) dengan No. 01011028830208.</p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;">Menggunakan model kemitraan yang dikelola bersama-sama, Sabana Fried Chicken&nbsp;memenuhi kebutuhan masyarakat akan makanan cepat saji yang sudah teruji.</p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;">Kenapa harus Sabana? karena â€œUsaha kaki Lima yang memenuhi Standar Halan dan Kesehatanâ€</p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;"><strong>Misi Produk</strong></p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;">Menyediakan makanan yang halal, nikmat dan bergizi (halalan thoyiban) bagimasyarakat.</p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;"><strong>Misi Organisasi</strong></p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;">Mendukung pengembangan eunterpreneurship bagi masyarakat</p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;"><strong>Misi Ekonomi</strong></p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;">Tumbuh dengan tingkat keuntungan yang dapat menopang ekonomi keluarga</p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;"><strong>Kunci Sukses Mitra Sabana</strong></p><ol style="color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;"><li>Pemilihan posisi dan lokasi strategis</li><li>Menjual kualitas produk yang sudah diterima lapisan masyarakat</li><li>Menciptakan reputasi produk yang baik kepada konsumen</li><li>Membuat reputasi owner yang positif dilingkungan tempat berdagang</li><li>Memiliki produk dengan harga kaki lima rasa bintang lima</li></ol><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;"><strong>Tingkat Keuntungan</strong></p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;">Net Profit : Rp8.000 s/d Rp10.000 / ekor, penghasilan Rp 3 Juta s/d Rp15 Juta / bulan</p><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;"><strong>Keunggulan Produk</strong></p><ol style="color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;"><li style="text-align: justify;">Ayam pilihan disembelih sesuai dengan syariat Islam</li><li style="text-align: justify;">Bersertifikat halal dari majelis Ulama Indonesia (MUI)</li><li style="text-align: justify;">Lima kali proses pencucian dengan air mengalir</li><li style="text-align: justify;">Diolah secara modern higienis tanpa bahan pengawet</li><li style="text-align: justify;">100% milik bangsa Indonesia</li></ol><p style="padding: 0px; color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;"><strong>Syarat Menjadi Mitra</strong></p><ul style="color: rgb(0, 0, 0); font-family: Ubuntu; font-size: 16px; line-height: 25px; text-align: justify;"><li>Mempunyai niat untuk menjadi sukses</li><li>Menyediakan Investasi sebesar Rp16,5 juta&nbsp;</li><li>Sediakan tempat untuk berdagang</li><li>Mengisi Aplikasi</li></ul>', '59e32853-6d69-4ceb-849e-dc00d4af4a71_file1.png', '59e32853-6d69-4ceb-849e-dc00d4af4a71_file2.jpg', '', '', '59e32853-6d69-4ceb-849e-dc00d4af4a71_file_doc.docx', '2015-07-18', 1);

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
('d44a83d2-d1d2-4dc9-bd06-552d16f57056', '6bc6936e-b9a9-46a9-9bf9-2c0163e3461a', '9a32c54c-e781-4efc-b459-f677a4bc60d2', '2015-07-10', 'Pertemuan Modal', 'Ketemuan di Mall Taman Anggrek', 'NEW');

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
('8b377695-c48c-40b1-9a5e-087ec843c409', '5f6e4b23-fde2-4f68-8e4d-758c2dce5f95', 'd04ff88a-76b2-4e04-ac2a-ed0eb6bbeef7', 'b36db587-1234-4b1e-ab82-b2a911f5fde3', '2015-07-18 16:30:33', 'JOIN_USAHA', 0),
('a0547e15-7681-4627-8367-d75a6e713f39', '5f6e4b23-fde2-4f68-8e4d-758c2dce5f95', '9a32c54c-e781-4efc-b459-f677a4bc60d2', 'b36db587-1234-4b1e-ab82-b2a911f5fde3', '2015-07-18 16:30:33', 'JOIN_USAHA', 0);

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
('0812c2a4-f8df-4efe-bdbc-2a7b16e6078f', '8a9e9a9c-98a8-48da-99d1-d360a7e49337', 'ffb37de8-3481-49be-826f-4d5b697d67ac', NULL, NULL, 'pegawai', 'APPROVED', '2015-08-01 11:07:18'),
('2e007099-6504-4cd3-8a6d-8590e24cb7ac', 'b36db587-1234-4b1e-ab82-b2a911f5fde3', 'd04ff88a-76b2-4e04-ac2a-ed0eb6bbeef7', NULL, 'c4d24d80-1acb-42b0-bbe7-ffba864f4348', 'investor', 'APPROVED', '2015-07-18 17:02:01'),
('53eeab44-fbc2-4e6b-afe9-b64c9dd2fd72', 'b36db587-1234-4b1e-ab82-b2a911f5fde3', '9a32c54c-e781-4efc-b459-f677a4bc60d2', NULL, NULL, 'pegawai', 'APPROVED', '2015-07-25 09:34:17'),
('5414e2f6-8312-4638-989e-f778ff4b5f3c', '8a9e9a9c-98a8-48da-99d1-d360a7e49337', 'da0c7180-28e1-417f-bca8-76bdfb1171f5', NULL, 'd94db65a-be34-47fd-ad4d-a935eadbf40a', 'investor', 'APPROVED', '2015-08-01 10:54:13'),
('8cbe1f76-fa8c-41bc-9202-3b74face0536', '8a9e9a9c-98a8-48da-99d1-d360a7e49337', '9a32c54c-e781-4efc-b459-f677a4bc60d2', NULL, NULL, 'pegawai', 'NEW', '2015-07-18 16:15:42'),
('99e38e8d-0c19-4b88-8cd3-9e94ac78bbcf', '6bc6936e-b9a9-46a9-9bf9-2c0163e3461a', '9a32c54c-e781-4efc-b459-f677a4bc60d2', NULL, '70999da6-a626-4cf9-bdc1-ba1a5de98369', 'investor', 'APPROVED', '2015-07-25 10:10:05'),
('aea9fd12-f042-4721-99ea-8a89914b6ef7', '6bc6936e-b9a9-46a9-9bf9-2c0163e3461a', '5f6e4b23-fde2-4f68-8e4d-758c2dce5f95', NULL, 'b4df9076-cf92-466e-bacf-737e80b42959', 'investor', 'NEW', '2015-07-18 16:19:09');

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
('6bc6936e-b9a9-46a9-9bf9-2c0163e3461a', 'd04ff88a-76b2-4e04-ac2a-ed0eb6bbeef7', '59e32853-6d69-4ceb-849e-dc00d4af4a71', 'Sabana Fried Chicken Cab. Depok', '<span style="color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; line-height: 18px;">  Bisnis Franchise Yang Sangat Menguntungkan Dan Sesuai Syariat Ajaran Agama Islam, Halal, Juga Bermutu.&nbsp;</span><span style="color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; line-height: 18px;">  Memberikan Kontribusi Kepada masyarakat Tentang Ayam Goreng Yang Sehat, Bergizi Dan Halal</span>', '<span style="color: rgb(71, 71, 71); font-family: Tahoma, Geneva, sans-serif; font-size: 12px;">Jl. Jatijajar II no. 9 Tapos - Depok jawa barat 16541 INDONESIA fax, 021-70580978</span>', 'Jawa Barat', 2, 25, 50, '500000.0000', '2015-07-18'),
('8a9e9a9c-98a8-48da-99d1-d360a7e49337', 'd04ff88a-76b2-4e04-ac2a-ed0eb6bbeef7', '0b6724b6-2dfc-4248-8185-bfa32d0bce5a', 'Bebek Jumbo Bang. Ramli', '<span style="color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; line-height: 18px;">Bebek Jumbo, Resto khas anak muda dan keluarga muda yang punya selera makan luar biasa. Menu khas Bebek dengan Porsi Jumbo, Gurihnya Wow!</span>', '<span style="color: rgb(71, 71, 71); font-family: Tahoma, Geneva, sans-serif; font-size: 12px;">Jalan Masjid Baiturrahman No.7 Lembah Hijau Mekarsari Jakarta Timur</span>', 'DKI Jakarta', 5, 5, 75, '1200000.0000', '2015-07-18'),
('b36db587-1234-4b1e-ab82-b2a911f5fde3', '5f6e4b23-fde2-4f68-8e4d-758c2dce5f95', '52015608-323d-40ec-8d53-a3edb73e3393', 'Bakmi Naga Pluit', '<p style="padding: 0px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; line-height: 18px;">Bakmi merupakan makanan yang bukan hanya disukai oleh orang indoneisa saja, tetapi bakmi juga disukai oleh masyarakat international, hanya saja penyebutan namanya yang berbeda. Dijepang biasanya dikenal dengan makanannya yang bernama Udon, di Eropa khususnya di Italia dikenal dengan Spaghetti di Negara barat pun mereka sangat suka dengan berbagai macam pasta seperti Fettucine, Fussily dan Penne Kini Bakmi untuk sebagian orang sudah merupakan pengganti nasi, sehingga sangatlah tepat bagi anda untuk berinvestasi dengan membuka usaha waralaba Bakmi Naga Resto.</p>', '<span style="color: rgb(71, 71, 71); font-family: Tahoma, Geneva, sans-serif; font-size: 12px;">Tugu Tanah Baru blok C1/20 Jl. Raya Curug Agung Dapur: Jl. Kelinci, Kukusan, Pluit</span>', 'DKI Jakarta', 5, 10, 20, '900000.0000', '2015-07-18');

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
