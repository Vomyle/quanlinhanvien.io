-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2024 at 10:39 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlnv`
--

-- --------------------------------------------------------

--
-- Table structure for table `bophan`
--

DROP TABLE IF EXISTS `bophan`;
CREATE TABLE IF NOT EXISTS `bophan` (
  `mabp` int NOT NULL AUTO_INCREMENT,
  `tenbp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`mabp`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bophan`
--

INSERT INTO `bophan` (`mabp`, `tenbp`) VALUES
(1, 'Ban giám hiệu'),
(2, 'Bộ phận hành chính'),
(3, 'Phòng giáo vụ'),
(4, 'Phòng tài chính - kế toán'),
(5, 'Bộ phận học vụ'),
(6, 'Bộ phận cố vấn học tập và sinh viên'),
(7, 'Bộ phận an ninh và an toàn'),
(8, 'Bộ phận vệ sinh và bảo dưỡng'),
(9, '');

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

DROP TABLE IF EXISTS `chucvu`;
CREATE TABLE IF NOT EXISTS `chucvu` (
  `macv` int NOT NULL AUTO_INCREMENT,
  `tencv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thutu` int NOT NULL,
  PRIMARY KEY (`macv`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`macv`, `tencv`, `thutu`) VALUES
(1, 'Hiệu trưởng', 0),
(2, 'Phó hiệu trưởng', 0),
(3, 'Hiệu phó', 0),
(4, 'Trưởng bộ môn', 0),
(5, 'Giáo viên', 0),
(6, 'Nhân viên hành chính', 0),
(7, 'Tổ trưởng', 0),
(8, 'Thư ký', 0),
(9, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `luong`
--

DROP TABLE IF EXISTS `luong`;
CREATE TABLE IF NOT EXISTS `luong` (
  `maluong` int NOT NULL AUTO_INCREMENT,
  `manv` int NOT NULL,
  `tienthuong` int NOT NULL,
  `sotienluong` int NOT NULL,
  PRIMARY KEY (`maluong`),
  KEY `luong_nhanvien` (`manv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `id_nv` int NOT NULL AUTO_INCREMENT,
  `ten_nv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mabp` int NOT NULL,
  `matd` int NOT NULL,
  `macv` int NOT NULL,
  `id_pb` int NOT NULL,
  `cccd` int NOT NULL,
  `gioitinh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `nvthoiviec` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_nv`),
  KEY `fk_nhanvien_bophan` (`mabp`),
  KEY `fk_nhanvien_trinhdo` (`matd`),
  KEY `nhanvien_chucvu` (`macv`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id_nv`, `ten_nv`, `email`, `mabp`, `matd`, `macv`, `id_pb`, `cccd`, `gioitinh`, `diachi`, `ngaysinh`, `nvthoiviec`) VALUES
(1, 'Nguyễn Văn Anh', 'nva@example.com', 1, 1, 4, 6, 123456789, 'Nam', '123 Đường ABC, Thành phố X', '2019-02-12', 0),
(2, 'Trần Thị Bình', 'ttb@example.com', 5, 2, 3, 1, 987654321, 'Nữ', '456 Đường XYZ, Thành phố Y', '2002-02-20', 1),
(3, 'Lê Văn C', 'lvc@example.com', 2, 2, 3, 6, 456123789, 'Nam', '789 Đường MNO, Thành phố Z', '1988-10-20', 1),
(9, 'sjd', 'vole@gmail.com', 4, 1, 1, 1, 0, 'Nam', 'ưdeksk', '2024-02-26', 1),
(10, 'ddđ', 'dtak279@gmail.com', 2, 2, 3, 4, 0, 'Nam', 'ddddddddd', '2024-04-18', NULL),
(11, '............', 'aaaa1111@gmail.com', 3, 1, 5, 3, 0, 'Nam', 'ddddddddd', '2015-06-17', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nne`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `nne`;
CREATE TABLE IF NOT EXISTS `nne` (
);

-- --------------------------------------------------------

--
-- Table structure for table `nvthoiviec`
--

DROP TABLE IF EXISTS `nvthoiviec`;
CREATE TABLE IF NOT EXISTS `nvthoiviec` (
  `nvthoiviec` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

DROP TABLE IF EXISTS `phongban`;
CREATE TABLE IF NOT EXISTS `phongban` (
  `id_pb` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tenpb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pb`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`id_pb`, `tenpb`) VALUES
(1, 'Kế toánn'),
(2, 'Lao công'),
(3, 'quản trị'),
(4, 'toán'),
(5, 'sd'),
(6, 'sd'),
(7, 'á'),
(8, 'ww'),
(9, ''),
(10, ''),
(11, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `email`, `password`) VALUES
(1, 'admin', 'example@gmail.com', '123'),
(2, 'tuanbhu', 'tuananhbhu@gmail.com', 'tuanbhu25');

-- --------------------------------------------------------

--
-- Table structure for table `thoiviec`
--

DROP TABLE IF EXISTS `thoiviec`;
CREATE TABLE IF NOT EXISTS `thoiviec` (
  `id_tv` int NOT NULL,
  `id_nv` int NOT NULL,
  `HoTen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaynghi` date NOT NULL,
  `ghichu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `id_nv` (`id_nv`),
  UNIQUE KEY `id_tv` (`id_tv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thoiviec`
--

INSERT INTO `thoiviec` (`id_tv`, `id_nv`, `HoTen`, `ngaynghi`, `ghichu`) VALUES
(1, 1, 'le thanh nhan', '2024-04-17', '........'),
(0, 2, 'nguyễn trình duy tân', '2024-04-10', 'ggggggggg');

-- --------------------------------------------------------

--
-- Table structure for table `trinhdo`
--

DROP TABLE IF EXISTS `trinhdo`;
CREATE TABLE IF NOT EXISTS `trinhdo` (
  `matd` int NOT NULL AUTO_INCREMENT,
  `tentd` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`matd`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trinhdo`
--

INSERT INTO `trinhdo` (`matd`, `tentd`) VALUES
(1, 'bằng cử nhân'),
(2, 'bằng thạc sĩ'),
(3, 'bằng tiến sĩ');

-- --------------------------------------------------------

--
-- Structure for view `nne`
--
DROP TABLE IF EXISTS `nne`;

DROP VIEW IF EXISTS `nne`;
CREATE ALGORITHM=UNDEFINED DEFINER=`hà`@`%` SQL SECURITY DEFINER VIEW `nne`  AS SELECT `thoiviec`.`id_tv` AS `id_tv`, `thoiviec`.`id_nv` AS `id_nv`, `thoiviec`.`HoTen` AS `HoTen`, `thoiviec`.`ngaynghi` AS `ngaynghi`, `thoiviec`.`ghichu` AS `ghichu` FROM `thoiviec` ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `luong`
--
ALTER TABLE `luong`
  ADD CONSTRAINT `luong_nhanvien` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`id_nv`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nhanvien_bophan` FOREIGN KEY (`mabp`) REFERENCES `bophan` (`mabp`),
  ADD CONSTRAINT `fk_nhanvien_trinhdo` FOREIGN KEY (`matd`) REFERENCES `trinhdo` (`matd`),
  ADD CONSTRAINT `nhanvien_bophan` FOREIGN KEY (`mabp`) REFERENCES `bophan` (`mabp`),
  ADD CONSTRAINT `nhanvien_chucvu` FOREIGN KEY (`macv`) REFERENCES `chucvu` (`macv`);

--
-- Constraints for table `thoiviec`
--
ALTER TABLE `thoiviec`
  ADD CONSTRAINT `thoiviec_pk_nhanvien` FOREIGN KEY (`id_nv`) REFERENCES `nhanvien` (`id_nv`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
