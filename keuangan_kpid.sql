-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2023 at 01:17 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan_kpid`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `bank_id` int NOT NULL AUTO_INCREMENT,
  `periode` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `bank_pemilik` varchar(255) NOT NULL,
  `bank_saldo` bigint NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `periode`, `bank_pemilik`, `bank_saldo`) VALUES
(1, 'RKA-KPID-2023', 'RKA-KPID-2023', 0),
(4, 'RKA-KPI-2022', '2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

DROP TABLE IF EXISTS `hutang`;
CREATE TABLE IF NOT EXISTS `hutang` (
  `hutang_id` int NOT NULL AUTO_INCREMENT,
  `hutang_tanggal` date NOT NULL,
  `hutang_nominal` int NOT NULL,
  `hutang_keterangan` text NOT NULL,
  PRIMARY KEY (`hutang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`hutang_id`, `hutang_tanggal`, `hutang_nominal`, `hutang_keterangan`) VALUES
(3, '2022-12-20', 300000, 'Pengeluaran Tak Terduga'),
(4, '2022-12-01', 100000, 'Pembelian ATK Dengan Dana Staff');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(1, 'LAINNYA'),
(2, '<b>BELANJA DAERAH</b>'),
(3, '<b>BELANJA LANGSUNG</b>'),
(4, '<b>BELANJA PEGAWAI</b>'),
(5, '<b>BELANJA BARANG DAN JASA</b>');

-- --------------------------------------------------------

--
-- Table structure for table `nphd`
--

DROP TABLE IF EXISTS `nphd`;
CREATE TABLE IF NOT EXISTS `nphd` (
  `id_nphd` int NOT NULL AUTO_INCREMENT,
  `uraian_nphd` varchar(100) NOT NULL,
  `kategori_nphd` varchar(100) NOT NULL,
  `volume_nphd` varchar(100) NOT NULL,
  `satuan_nphd` varchar(100) NOT NULL,
  `tarif_nphd` varchar(100) NOT NULL,
  `bank_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_nphd`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nphd`
--

INSERT INTO `nphd` (`id_nphd`, `uraian_nphd`, `kategori_nphd`, `volume_nphd`, `satuan_nphd`, `tarif_nphd`, `bank_id`) VALUES
(1, 'BELANJA DAERAH', '2', '1', '', '1020000000', '1'),
(39, '3', '3', '1', '', '1020000000', '1'),
(40, '4', '4', '1', '', '280800000', '1'),
(41, 'Honorarium Non PNS', '4', '0', '', '0', '1'),
(42, 'Honorarium Pegawai Tidak Tetap', '4', '1', '', '280800000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

DROP TABLE IF EXISTS `piutang`;
CREATE TABLE IF NOT EXISTS `piutang` (
  `piutang_id` int NOT NULL AUTO_INCREMENT,
  `piutang_tanggal` date NOT NULL,
  `piutang_nominal` int NOT NULL,
  `piutang_keterangan` text NOT NULL,
  PRIMARY KEY (`piutang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`piutang_id`, `piutang_tanggal`, `piutang_nominal`, `piutang_keterangan`) VALUES
(1, '2022-06-14', 2600000, 'Pembayaran Gaji Lebih Awal Staff Andi'),
(4, '2022-12-13', 2600000, 'Pembayaran Gaji Lebih Awal Staff Budi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `transaksi_id` int NOT NULL AUTO_INCREMENT,
  `transaksi_tanggal` date NOT NULL,
  `transaksi_jenis` enum('Pengeluaran','Pemasukan') NOT NULL,
  `transaksi_kategori` int NOT NULL,
  `kode_rekening` varchar(100) NOT NULL,
  `transaksi_nominal` int NOT NULL,
  `transaksi_keterangan` text NOT NULL,
  `transaksi_foto` varchar(255) NOT NULL,
  `transaksi_bank` int NOT NULL,
  PRIMARY KEY (`transaksi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_tanggal`, `transaksi_jenis`, `transaksi_kategori`, `kode_rekening`, `transaksi_nominal`, `transaksi_keterangan`, `transaksi_foto`, `transaksi_bank`) VALUES
(1, '2022-12-01', 'Pemasukan', 1, '', 1000000000, 'RKA', '1339360425_90f3a63344c02e77080ef6bbaca2b1e3_1503668638.jpg', 1),
(2, '2022-12-24', 'Pengeluaran', 2, '', 1000000, 'wifi', '805602762_WhatsApp Image 2022-12-09 at 6.14.44 PM.jpeg', 1),
(3, '2022-12-02', 'Pengeluaran', 5, '', 100000, 'Belanja Aja', '325422368_flash4.jpg', 1),
(4, '2022-12-15', 'Pemasukan', 5, '', 1200000, '123', '226632962_flash1.jpg', 1),
(5, '2022-12-01', 'Pengeluaran', 2, 'kode', 10000000, 'baju', '866290220_IMG_97811.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uraian`
--

DROP TABLE IF EXISTS `uraian`;
CREATE TABLE IF NOT EXISTS `uraian` (
  `uraian_id` int NOT NULL AUTO_INCREMENT,
  `nama_uraian` varchar(100) NOT NULL,
  PRIMARY KEY (`uraian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `uraian`
--

INSERT INTO `uraian` (`uraian_id`, `nama_uraian`) VALUES
(1, 'Lainnya'),
(2, 'Honorarium Pegawai Tidak Tetap'),
(3, 'Honorarium Pegawai Non PNS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `user_level` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
(1, 'Administrator', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1293879237_NBLSTORELOGO.jpg', 'administrator'),
(2, 'manajemen', 'manajemen', '19b51f1cbb6146adcacbce46d5bdc3f2', '1215276191_NBLSTORELOGO.jpg', 'manajemen');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `bank_ibfk_1` FOREIGN KEY (`bank_id`) REFERENCES `transaksi` (`transaksi_id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `kategori` (`kategori_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
