-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 07:08 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tokoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

CREATE TABLE IF NOT EXISTS `bukutamu` (
`id_bukutamu` int(11) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `pesan` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`id_bukutamu`, `nama_lengkap`, `telepon`, `email`, `pesan`) VALUES
(1, 'Adi Hernawan', '0896662519713', 'adiherna2210@bsi.ac.id', 'asdasdsacasxmaksmxksaxksamkmvksmckmsakcmsaascsc'),
(3, 'Roni siwalun', '089666251975', 'ronisiwalun@gmail.com', 'asdsadsadssadsadsasasa'),
(6, 'Rina Marcel', '0812424559', 'rina90@gmail.com', 'Cemilan Favorite  akuuu baso aci donggg');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
`id_gambar` int(11) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `judul_gambar` varchar(15) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(9, '9', 'Moring', 'mor.jpeg', '2019-04-17 10:15:58'),
(29, 'PRDK016', 'Baci Instan', 'baci.jpeg', '2019-07-12 15:07:32'),
(30, 'PRDK016', 'Baci Instan', 'Baso_Aci1.jpeg', '2019-07-12 15:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE IF NOT EXISTS `header_transaksi` (
`id_header` int(11) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(35) DEFAULT NULL,
  `rekening_pelanggan` varchar(35) DEFAULT NULL,
  `bukti_bayar` varchar(50) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(10) DEFAULT NULL,
  `nama_bank` varchar(15) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `ongkir`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`) VALUES
(1, 'PLGN002', 'Dwi guntoro', 'dwiguntoro56@gmail.com', '089666251972', 'Perum Bumi Cikarang Makmur', 'TRK001', '2019-07-14', 38000, 16000, 'Selesai', 38000, '12214214', 'Adi Hernawan', 'LOGO_MOTOR.png', 3, '14-07-2019', 'BANK MANDIRI', '2019-07-14 12:49:22'),
(2, 'PLGN002', 'Dwi guntoro', 'dwiguntoro56@gmail.com', '089666251972', 'Perum Bumi Cikarang Makmur', 'TRK002', '2019-07-19', 33000, 10000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-19 15:35:21'),
(3, 'PLGN001', 'Adi Hernawan', 'adihernawan5@gmail.com', '089666251975', 'Jl.Raya Serang Cibarusah ', 'TRK003', '2019-07-22', 72000, 7000, 'Selesai', 72000, '2242555', 'Andri Sutanto', 'default2.jpg', 2, '30-07-2019', 'BANK BRI SYARIA', '2019-07-22 02:09:00'),
(4, 'PLGN001', 'Adi Hernawan', 'adihernawan5@gmail.com', '089666251975', 'Jl.Raya Serang Cibarusah ', 'TRK004', '2019-07-30', 28000, 15000, 'Selesai', 28000, '912938213214', 'Andri Sutanto', '20180704-aplikasi-tik-tok_20180704_073242.jpg', 2, '19-12-2019', 'BANK BRI SYARIA', '2019-07-30 11:51:51'),
(5, 'PLGN002', 'Dwi guntoro', 'dwiguntoro56@gmail.com', '089666251972', 'Perum Bumi Cikarang Makmur', 'TRK005', '2019-08-04', 40000, 7000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-04 16:49:59'),
(6, 'PLGN001', 'Adi Hernawan', 'adihernawan5@gmail.com', '089666251975', 'Jl.Raya Serang Cibarusah ', 'TRK006', '2019-08-05', 25000, 15000, 'Selesai', 25000, '01124245325', 'Andri Sutanto', 'default11.jpg', 3, '05-08-2019', 'BANK BNI SYARIA', '2019-08-05 08:29:01'),
(7, 'PLGN001', 'Adi Hernawan', 'adihernawan5@gmail.com', '089666251975', 'Jl.Raya Serang Cibarusah ', 'TRK007', '2019-08-13', 17000, 7000, 'Selesai', 17000, '8566586586', 'Andri Sutanto', 'amazon-icon1.png', 3, '13-08-2019', 'BANK MANDIRI', '2019-08-13 12:22:35'),
(8, 'PLGN001', 'Adi Hernawan', 'adihernawan5@gmail.com', '089666251975', 'Jl.Raya Serang Cibarusah ', 'TRK009', '2019-12-19', 19000, 10000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-19 06:28:35'),
(9, 'PLGN001', 'Adi Hernawan', 'adihernawan5@gmail.com', '089666251975', 'Jl.Raya Serang Cibarusah ', 'TRK010', '2019-12-19', 166000, 10000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-19 06:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `slug_kategori` varchar(15) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
('KTGR003', 'manis', 'Manis', 3, '2019-07-13 07:53:09'),
('KTGR004', 'original', 'Original', 2, '2019-07-13 07:53:15'),
('KTGR005', 'pedas', 'Pedas', 1, '2019-07-12 15:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE IF NOT EXISTS `konfigurasi` (
`id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(25) NOT NULL,
  `tagline` varchar(20) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `keywords` text,
  `metatext` text,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `instagram` varchar(30) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(15) DEFAULT NULL,
  `icon` varchar(15) DEFAULT NULL,
  `banner` varchar(50) DEFAULT NULL,
  `rekening_pembayaran` varchar(50) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `banner`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Toko Cemilan Online', 'Cemilan Kekinian ', 'tokocemilan45@gmail.com', 'http://tokoku.com', 'makroni,baso aci instan, kripik kaca, kripik kebab, siomay', 'OK', '08123213421', 'Jl.Serang-Cibarusah Bekasi - Jawa Barat ', 'https://facebook.com/tokocemil', 'https://instagram.com/tokocemi', 'Penjualan cemilan online berbasis web ', 'logo3.png', 'icon.png', 'banner_copy2.png', 'BANK BNI SYARIAH    0120292312	RIFANA NANDAYANI', '2019-06-24 03:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE IF NOT EXISTS `ongkir` (
`id_ongkir` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `ongkos_kirim` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kota`, `ongkos_kirim`) VALUES
(1, 'Jakarta', 10000),
(2, 'Bekasi', 7000),
(3, 'Depok', 13000),
(4, 'Tanggerang', 15000),
(5, 'Bogor', 13000),
(6, 'Bandung', 15000),
(7, 'Cirebon', 14000),
(8, 'Garut', 12000),
(9, 'Cianjur', 7000),
(10, 'Tasikmalaya', 9000),
(11, 'Sukabumi', 9000),
(12, 'Purwakarta', 7500),
(13, 'Ciamis', 8000),
(14, 'Subang', 7000),
(15, 'Cikampek', 7500),
(16, 'Karawang', 5000),
(17, 'Tanggerang', 12000),
(18, 'Indramayu', 10000),
(19, 'Semarang', 16000),
(20, 'Yogyakarta', 20000),
(21, 'Solo', 18000),
(22, 'Malang', 22000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
('PLGN001', 'Aktif', 'Adi Hernawan', 'adihernawan5@gmail.com', '31275f0516c421c99c9f2c9a2c272ac697b277f5', '089666251975', 'Jl.Raya Serang Cibarusah ', '2019-07-12 17:34:41', '2019-07-18 10:05:34'),
('PLGN002', 'Aktif', 'Dwi guntoro', 'dwiguntoro56@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '089666251972', 'Perum Bumi Cikarang Makmur', '2019-07-12 17:35:24', '2019-08-13 10:36:57'),
('PLGN003', 'Aktif', 'Rangga Rainalfi', 'rangga21@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '08123213421', 'Kp.Serang ', '2019-08-05 08:22:14', '2019-11-10 13:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `slug_produk` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(15) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
('PRDK009', 4, 'KTGR005', 'PDS014', 'Moring pedas', 'moring-pedas-pds014', '<p>MORING adalah singkatan dari cimol kering. Makanan ii hampir mirip dengan keripik tapi berjenis tunggal. Yang membedakan MORING dengan keripik lainnya adalah proses pembuatannya, karena MORING harus diolah terlebih dahulu sebelum disaji sedangkan keripik lainnya tidak perlu diolah.</p>\r\n\r\n<p>MORING dibuat berbentuk bulat dan bentuknya sama dengan kemplang mentah yang ada dipasaran, tetapi MORING tidak mentah karena siap disaji dan rasanya berbeda dengan keripik biasa.</p>\r\n\r\n<p>Komposisi : Tepung Tapiokan, Tepung Terigu, Bawang Putih, Cabai Merah dan Penyedap rasa lainnya, sehingga menghasilkan kualitas rasa yang renyah, gurih dan pedas.</p>\r\n', 'Moring Pedas ', 13000, 26, 'mor1.jpeg', 150, '5X5', 'Publish', '2019-07-12 11:46:46', '2019-08-27 13:19:45'),
('PRDK010', 4, 'KTGR005', 'PDS015', 'Tiktuk', 'tiktuk-pds015', '<p>Tiktuk dengan rasa pedas cocok untuk anda yang suka rasa pedas</p>\r\n\r\n<p>Komposisi : Tepung tapioka, terigu, bubuk cabe, daun jeruk&nbsp;</p>\r\n', 'Tiktuk Rasa Pedas ', 14000, 16, 'tiktuk.jpeg', 150, '10X10', 'Publish', '2019-07-12 12:20:15', '2019-08-27 13:20:46'),
('PRDK011', 4, 'KTGR005', 'PDS016', 'Siomay Kering ', 'siomay-kering-pds016', '<p>Jika siomay biasanya dikukus kali ini siomay diaajikan dengan cara digoreng kering dengan tekstur yang renyah.<br />\r\nSalah satu variasi&nbsp;ini bisa dinikmati dalam sajian makanan atau bisa dimakan begitu saja</p>\r\n', 'Siomay Kering Pedas ', 13000, 21, 'Siomay.jpeg', 100, '5X5', 'Publish', '2019-07-12 12:23:33', '2019-08-27 13:20:34'),
('PRDK012', 4, 'KTGR004', 'ORI004', 'Makaroni Original', 'makaroni-original-or', '<p>Makaroni dengan rasa original, selain varian rasa pedas</p>\r\n\r\n<p>Komposisi : Makaroni, Bumbu Perasa, Minyak Nabati, Garam, Penyedap Rasa,&nbsp;</p>\r\n', 'Makaroni Original', 10000, 26, 'ori.jpeg', 100, '5X5', 'Publish', '2019-07-12 16:05:37', '2019-08-27 13:18:17'),
('PRDK013', 4, 'KTGR005', 'PDS001', 'Makaroni Pedas', 'makaroni-pedas-pds00', '<p>Komposisi : makaroni, bumbu perasa ,bumbu pedas,&nbsp;daun jeruk</p>\r\n', 'Makaroni  Pedas', 14000, 16, 'Makroni_pedas.jpeg', 100, '10X10', 'Publish', '2019-07-12 16:07:41', '2019-08-27 13:19:16'),
('PRDK014', 4, 'KTGR005', 'PDS017', 'Krupuk Pedas ', 'krupuk-pedas-pds017', '<p>Kerupuk Warna dengan varian rasa pedas, cocok untuk dicampur makanan lain,misal : mie instan, baso aci,&nbsp;</p>\r\n\r\n<p>Komposisi : Krupuk warna,penyedap rasa,bubuk cabe</p>\r\n', 'Krupuk Pedas', 8000, 31, 'WhatsApp_Image_2019-05-17_at_11_25_56.jpeg', 100, '5X5', 'Publish', '2019-07-12 16:10:34', '2019-08-27 13:20:58'),
('PRDK015', 4, 'KTGR005', 'PDS003', 'Seblak Instan ', 'seblak-instan-pds003', '<p>Seblak Instan dengan campuran mie dan kerupuk,&nbsp;</p>\r\n\r\n<p>Komposisi :&nbsp;</p>\r\n\r\n<p>Mie, Mie, macam&quot; krupuk, siomay kering, cuankie kering, bumbu, bubuk cabe</p>\r\n', 'Seblak Instan ', 10000, 16, 'WhatsApp_Image_2019-05-17_at_11_27_35.jpeg', 100, '5X5', 'Publish', '2019-07-12 16:16:20', '2019-07-13 13:55:05'),
('PRDK016', 4, 'KTGR005', 'PDS019', 'Baso Aci Instan ', 'baso-aci-instan-pds0', '<p>Baso Aci yang siap disajikan dalam kemasa, dengan cara di rebus seperti mie instan.&nbsp;</p>\r\n\r\n<p>Komposisi : Baso Aci, Cuankie lidah, Cuankie tahu, siomay, Sukro cikur, Bumbu, Bubuk Cabe, Minyak Bawang, Jeruk Limau</p>\r\n', 'Baso Aci Instan Pedas ', 16000, 21, 'Baci_siap1.jpeg', 100, '10X10', 'Publish', '2019-07-12 16:28:18', '2019-07-13 13:55:05'),
('PRDK017', 4, 'KTGR003', 'MNS007', 'Makaroni Greentea', 'makaroni-greentea-mn', '<p>Makaroni dengan varian rasa greentea dengan warna hijau sangat cocok untuk anda yang penasaran dan menyukai varian rasa dari makaroni selain pedas dan original.&nbsp;</p>\r\n\r\n<p>Komposisi : Makaroni, penyedap rasa, greentea&nbsp;</p>\r\n', 'Makaroni Manis rasa greentea', 12000, 26, 'Greentea.jpeg', 100, '10X10', 'Publish', '2019-07-12 17:29:35', '2019-07-13 13:55:05'),
('PRDK018', 4, 'KTGR003', 'MNS008', 'Makaroni Tiramisu ', 'makaroni-tiramisu-mn', '<p>Makaroni dengan perubahan rasa,</p>\r\n\r\n<p>komposisi : Makaroni, penyedap rasa, coklat varian</p>\r\n', 'Makaroni Varian  Coklat', 12000, 26, 'Tiramisu.jpeg', 150, '10X10', 'Publish', '2019-07-13 09:26:49', '2019-07-13 13:55:05'),
('PRDK019', 4, 'KTGR003', 'MNS003', 'Makaroni Strawbery', 'makaroni-strawbery-m', '<p>Rasa baru makaroni dengan rasa strawberry.</p>\r\n\r\n<p>Komposisi : Makaroni, penyedap rasa, strawberry&nbsp;</p>\r\n', 'Makaroni Strawbery ', 12000, 26, 'Strawberry.jpeg', 100, '5X5', 'Publish', '2019-07-13 09:29:20', '2019-07-13 13:55:05'),
('PRDK020', 4, 'KTGR003', 'MNS004', 'Makaroni Coklat', 'makaroni-coklat-mns0', '<p>Makaroni full coklat, dengan rasa manis yang menambahkan citra rasa makaroni ini</p>\r\n\r\n<p>Komposisi : Makaroni, penyedap rasa, coklat</p>\r\n', 'Makaroni Coklat ', 12000, 26, 'Coklat.jpeg', 100, '5X5', 'Publish', '2019-07-13 09:31:10', '2019-07-13 13:55:05'),
('PRDK021', 4, 'KTGR003', 'MNS005', 'Makaroni Melon', 'makaroni-melon-mns00', '<p>Makaroni dengan rasa buah melon, yang diciptakan dengan variasi buah buahan&nbsp;</p>\r\n\r\n<p>Komposisi : Makaroni, penyedap rasa, melon</p>\r\n', 'Makaroni Melon  ', 12000, 21, 'Melon.jpeg', 100, '5X5', 'Publish', '2019-07-13 09:33:02', '2019-07-13 13:55:05'),
('PRDK022', 4, 'KTGR003', 'MNS009', 'Makaroni Anggur ', 'makaroni-anggur-mns0', '<p>Makaroni dengan varian buah buahan rasa anggur, sangat cocok untuk anda pneyuka variasi rasa makaroni</p>\r\n\r\n<p>Komposisi : Makaroni, penyedap rasa, anggur</p>\r\n', 'Makaroni Anggur ', 12000, 16, 'anggur.jpeg', 100, '5X5', 'Publish', '2019-07-13 09:34:41', '2019-08-27 13:17:41'),
('PRDK023', 4, 'KTGR005', 'PDS005', 'Kripik Kaca', 'kripik-kaca-pds005', '<p>Kripik kaca rasa pedas, gurih dan siap untuk dinikmati.</p>\r\n\r\n<p>Komposisi : Singkong,bon cabe, penyedap rasa</p>\r\n', 'Kripik Kaca Pedas ', 8000, 26, 'kripik_kaca.jpeg', 100, '5X5', 'Publish', '2019-07-13 09:36:30', '2019-07-13 13:55:05'),
('PRDK024', 4, 'KTGR005', 'PDS020', 'Makaroni Spiral ', 'makaroni-spiral-pds0', '<p>Makaroni berbentuk spiral dengan varian rasa pedas.</p>\r\n\r\n<p>Komposisi : Makaroni spiral, tepung terigu, bubuk cabe, bubuk tabur</p>\r\n', 'Makaroni Spiral Pedas ', 13000, 1, 'WhatsApp_Image_2019-05-17_at_11_25_52.jpeg', 100, '5X5', 'Publish', '2019-07-13 09:46:33', '2019-12-19 05:43:37'),
('PRDK025', 4, 'KTGR005', 'PDS021', 'Lumpia Krispi', 'lumpia-krispi-pds021', '<p>Lumpia krispi dengan rasa pedas&nbsp;</p>\r\n\r\n<p>Komposisi : lumpia, bubuk cabe, penyedap rasa</p>\r\n', 'Lumpia Krispi Pedas  ', 13000, 8, 'WhatsApp_Image_2019-05-17_at_11_25_50.jpeg', 100, '10X10', 'Publish', '2019-07-13 10:53:18', '2019-09-04 06:17:53'),
('PRDK026', 4, 'KTGR004', 'ORI006', 'Makaroni Spiral ', 'makaroni-spiral-ori0', '<p>Makroni Spiral dengan rasa original&nbsp;</p>\r\n', 'Makaroni Spiral ', 10000, 26, 'MakaroSpiralOri.jpg', 100, '5X5', 'Publish', '2019-07-13 10:59:28', '2019-07-13 13:55:05'),
('PRDK027', 4, 'KTGR005', 'PDS022', 'Baso Goreng Pedas', 'baso-goreng-pedas-pd', '<p>Baso goreng dengan rasa pedas,&nbsp;</p>\r\n\r\n<p>Komposisi : penyedap rasa, baso goreng kering, daun jeruk</p>\r\n', 'Baso Goreng Pedas ', 8000, 27, 'WhatsApp_Image_2019-05-17_at_11_25_51.jpeg', 100, '5X5', 'Publish', '2019-07-14 12:28:34', '2019-08-04 14:49:59'),
('PRDK028', 4, 'KTGR005', 'PDS023', 'Krupuk Gulung', 'krupuk-gulung-pds023', '<p>Kerupuk gulung pedas lebih mantapp dan lebih nikmat dicampur dengan makanan lain, seperti mie rebus,soto, atau seblak dan baso &nbsp;aci</p>\r\n\r\n<p>Komposisi:: Kerupuk gulung,bubuk cabe, penyedap rasa</p>\r\n', 'Gelung', 9000, 27, 'WhatsApp_Image_2019-05-17_at_11_25_54.jpeg', 100, '5X5', 'Publish', '2019-07-14 12:37:55', '2019-12-19 05:28:35'),
('PRDK029', 4, 'KTGR005', 'PDS024', 'Krupuk Noni', 'krupuk-noni-pds024', '<p>Krupuk Noni noni dengan rasa pedas &nbsp;yang cocok untuk dicampur dengan &nbsp;makanan lain.&nbsp;</p>\r\n\r\n<p>Komposisi &nbsp;: Krupuk Noni, &nbsp;Penyedap rasa, Bubuk Cabe</p>\r\n', 'Noni ', 10000, 27, 'WhatsApp_Image_2019-05-17_at_11_25_55.jpeg', 100, '5X5', 'Publish', '2019-07-14 12:39:00', '2019-08-13 10:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
`id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(25) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 'BANK BNI SYARIAH', '0120292312', 'RIFANA NANDAYANI', NULL, '2019-06-16 07:31:22'),
(2, 'BANK MANDIRI', '01284919248', 'ADI HERNAWAN', NULL, '2019-05-10 04:27:24'),
(3, 'BANK BCA ', '0228132481', 'DWI GUNTORO', NULL, '2019-05-10 04:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id_slider` int(11) NOT NULL,
  `judul_slider` varchar(25) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `judul_slider`, `gambar`, `active`) VALUES
(9, 'Makroni  Spiral', 'banSpiral1.jpg', 0),
(10, 'Baso Aci Instan', 'BACI1.jpg', 0),
(11, 'Lumpia Krispi', 'kulitbanlumpia.jpg', 0),
(12, 'Siomay Kering', 'maxresdefault1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `ongkir`, `total_harga`, `tanggal_transaksi`) VALUES
(1, 'PLGN002', 'TRK001', 'PRDK028', 9000, 1, 16000, 9000, '2019-07-14 00:00:00'),
(2, 'PLGN002', 'TRK001', 'PRDK024', 13000, 1, 16000, 13000, '2019-07-14 00:00:00'),
(3, 'PLGN002', 'TRK002', 'PRDK024', 13000, 1, 10000, 13000, '2019-07-19 00:00:00'),
(4, 'PLGN002', 'TRK002', 'PRDK029', 10000, 1, 10000, 10000, '2019-07-19 00:00:00'),
(5, 'PLGN001', 'TRK003', 'PRDK025', 13000, 5, 7000, 65000, '2019-07-22 00:00:00'),
(6, 'PLGN001', 'TRK004', 'PRDK025', 13000, 1, 15000, 13000, '2019-07-30 00:00:00'),
(7, 'PLGN002', 'TRK005', 'PRDK027', 8000, 3, 7000, 24000, '2019-08-04 00:00:00'),
(8, 'PLGN002', 'TRK005', 'PRDK028', 9000, 1, 7000, 9000, '2019-08-04 00:00:00'),
(9, 'PLGN001', 'TRK006', 'PRDK029', 10000, 1, 15000, 10000, '2019-08-05 00:00:00'),
(10, 'PLGN001', 'TRK007', 'PRDK029', 10000, 1, 7000, 10000, '2019-08-13 00:00:00'),
(11, 'PLGN001', 'TRK008', 'PRDK025', 13000, 2, 7000, 26000, '2019-09-04 00:00:00'),
(12, 'PLGN001', 'TRK009', 'PRDK028', 9000, 1, 10000, 9000, '2019-12-19 00:00:00'),
(13, 'PLGN001', 'TRK010', 'PRDK024', 13000, 12, 10000, 156000, '2019-12-19 00:00:00');

--
-- Triggers `transaksi`
--
DELIMITER //
CREATE TRIGGER `Penjualan_produk` AFTER INSERT ON `transaksi`
 FOR EACH ROW begin
	UPDATE produk SET stok=stok-NEW.jumlah
    WHERE id_produk = NEW.id_produk;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(4, 'Adi Hernawan', 'adihernawan5@gmail.com', 'adiher', '31275f0516c421c99c9f2c9a2c272ac697b277f5', 'Admin', '2019-07-09 08:42:12'),
(5, 'Rivai Sihombing', 'rivai23@gmail.com', 'rivailae', '8cb2237d0679ca88db6464eac60da96345513964', 'User', '2019-07-09 08:43:58'),
(6, 'Dwi Guntoro', 'dwiguntoro56@gmail.com', 'guntoro', '8cb2237d0679ca88db6464eac60da96345513964', 'User', '2019-07-09 08:46:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
 ADD PRIMARY KEY (`id_bukutamu`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
 ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
 ADD PRIMARY KEY (`id_header`), ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
 ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
 ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`), ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
 ADD PRIMARY KEY (`id_rekening`), ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`), ADD UNIQUE KEY `nomor_rekening_2` (`nomor_rekening`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
MODIFY `id_bukutamu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
