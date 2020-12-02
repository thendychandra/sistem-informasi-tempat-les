-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 07:51 AM
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
-- Database: `absensi_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_pb`
--

CREATE TABLE `absen_pb` (
  `id_absen` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `hari` enum('1','2','3','4','5','6') NOT NULL,
  `sesi` int(10) NOT NULL,
  `id_tgl` varchar(255) NOT NULL,
  `jam_msk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_pb`
--

INSERT INTO `absen_pb` (`id_absen`, `id_user`, `hari`, `sesi`, `id_tgl`, `jam_msk`) VALUES
(1, 9, '4', 5, '27-02-2020', '19.40 WIB'),
(2, 18, '4', 5, '27-02-2020', '19.52 WIB'),
(3, 9, '1', 1, '29-06-2020', '12.45 WIB');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bln` int(10) NOT NULL,
  `nama_bln` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_cat` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_bln` int(10) NOT NULL,
  `id_hri` int(10) NOT NULL,
  `id_tgl` int(10) NOT NULL,
  `isi_cat` longtext NOT NULL,
  `status_cat` enum('Menunggu','Dikonfirmasi','Ditolak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_cat`, `id_user`, `id_bln`, `id_hri`, `id_tgl`, `isi_cat`, `status_cat`) VALUES
(31, 2, 1, 4, 14, 'Fixed : Navbar link, bug absen pulang, empty input data', 'Dikonfirmasi'),
(32, 4, 1, 4, 14, 'Tes fixes bug empty note', 'Dikonfirmasi'),
(33, 4, 1, 4, 14, 'Tidak ada kegiatan, rencannya mau beresin kabel tapi wktunya ngga memungkinkan jadi di tunda.dikasih minum es kelapa muda. :D', 'Dikonfirmasi'),
(34, 4, 1, 5, 15, 'Identifikasi pc yg tidak bisa masuk bios, ternyata masalah di power supplynya. Setelah di ganti power supplynya baru bisa masuk bios kemudian di install ulang paki windows 7', 'Dikonfirmasi'),
(35, 4, 1, 5, 15, 'Identifikasi pc yg tidak bisa masuk bios, ternyata masalah di power supplynya. Setelah di ganti power supplynya baru bisa masuk bios kemudian di install ulang paki windows 7', 'Dikonfirmasi'),
(44, 3, 1, 7, 17, 'Semoga lebih baik :D', ''),
(43, 2, 1, 7, 17, 'Tes ya', 'Menunggu'),
(39, 4, 1, 7, 17, 'Mysqli fix bug real escape string', 'Dikonfirmasi'),
(40, 4, 1, 7, 17, 'Testing 2nd Migration to MySQLi', 'Dikonfirmasi'),
(41, 2, 1, 7, 17, 'Testing 2nd Migrations To MySQLi', 'Menunggu'),
(45, 4, 1, 2, 19, 'Senin bersihin Ram trus install ulang', ''),
(46, 5, 2, 5, 19, 'Hemmm tes aja deh :D Hahaha :*', 'Dikonfirmasi'),
(47, 3, 2, 5, 19, 'Terimakasih Untuk hari ini :D\\r\\nTerimakasih atas semua kebaikan ini :D', ''),
(48, 3, 2, 5, 19, 'Tes fix Bug :D\r\nSemangaaatt :D \'\'\" <- tesss', ''),
(49, 3, 2, 5, 7, 'coba gaes', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_absen`
--

CREATE TABLE `data_absen` (
  `id_absen` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `hari` enum('1','2','3','4','5','6') NOT NULL,
  `sesi` enum('1','2','3','4','5') NOT NULL,
  `id_pb` int(100) NOT NULL,
  `id_tgl` varchar(255) NOT NULL,
  `jam_msk` varchar(50) NOT NULL,
  `st_jam_msk` enum('Menunggu','Dikonfirmasi','Ditolak') NOT NULL,
  `jam_klr` varchar(50) NOT NULL,
  `st_jam_klr` enum('Belum Absen','Menunggu','Dikonfirmasi','Ditolak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_absen`
--

INSERT INTO `data_absen` (`id_absen`, `id_user`, `hari`, `sesi`, `id_pb`, `id_tgl`, `jam_msk`, `st_jam_msk`, `jam_klr`, `st_jam_klr`) VALUES
(3, '1', '6', '5', 9, '15-02-2020', '19.15 WIB', 'Dikonfirmasi', '', 'Belum Absen'),
(6, '1', '1', '2', 9, '17-02-2020', '14.59 WIB', 'Ditolak', '', 'Belum Absen'),
(11, '1', '1', '2', 9, '24-02-2020', '18.03 WIB', 'Ditolak', '', 'Belum Absen'),
(9, '1', '3', '2', 9, '19-02-2020', '22.31 WIB', 'Ditolak', '', 'Belum Absen'),
(13, '1', '1', '2', 9, '29-06-2020', '12.49 WIB', 'Dikonfirmasi', '', 'Belum Absen');

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` int(100) NOT NULL,
  `id_user` int(10) NOT NULL,
  `hari` enum('1','2','3','4','5','6') NOT NULL,
  `sesi` enum('1','2','3','4','5') NOT NULL,
  `note` varchar(255) NOT NULL,
  `id_pb` int(10) NOT NULL,
  `status` enum('Hadir','Izin','Sakit','Pindah','N/A') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `id_user`, `hari`, `sesi`, `note`, `id_pb`, `status`) VALUES
(1, 20, '1', '1', '', 9, ''),
(2, 21, '1', '2', '', 9, 'Hadir'),
(3, 22, '1', '2', '', 9, 'Hadir'),
(4, 23, '1', '2', '', 9, 'Hadir'),
(5, 24, '1', '2', '', 9, 'Hadir'),
(6, 25, '1', '3', '', 9, 'Hadir'),
(7, 26, '1', '3', '', 9, 'Hadir'),
(8, 27, '1', '3', '', 9, 'Hadir'),
(9, 28, '1', '3', '', 9, 'Hadir'),
(10, 29, '1', '3', '', 9, 'Hadir'),
(11, 30, '1', '3', '', 9, 'Hadir'),
(12, 31, '1', '3', '', 9, 'Hadir'),
(13, 32, '1', '4', '', 9, 'Hadir'),
(14, 33, '1', '4', '', 9, 'Hadir'),
(15, 22, '2', '3', '', 9, 'Hadir'),
(16, 21, '2', '3', '', 9, 'Hadir'),
(17, 34, '2', '2', '', 9, 'Hadir'),
(18, 35, '2', '2', '', 9, 'Hadir'),
(19, 36, '2', '2', '', 9, 'Hadir'),
(20, 37, '2', '2', '', 9, 'Hadir'),
(21, 38, '2', '2', '', 9, 'Hadir'),
(22, 39, '2', '2', '', 9, 'Hadir'),
(23, 40, '2', '2', '', 9, 'Hadir'),
(24, 41, '2', '2', '', 9, 'Hadir'),
(25, 42, '2', '3', '', 9, 'Hadir'),
(26, 43, '2', '3', '', 9, 'Hadir'),
(27, 44, '3', '1', '', 9, 'Hadir'),
(28, 45, '3', '1', '', 9, 'Hadir'),
(29, 46, '3', '2', '', 9, 'Hadir'),
(30, 47, '3', '2', '', 9, 'Hadir'),
(31, 48, '3', '2', '', 9, 'Hadir'),
(32, 49, '3', '2', '', 9, 'Hadir'),
(33, 23, '3', '2', '', 9, 'Hadir'),
(34, 24, '3', '2', '', 9, 'Hadir'),
(35, 25, '3', '3', '', 9, 'Hadir'),
(36, 26, '3', '3', '', 9, 'Hadir'),
(37, 27, '3', '3', '', 9, 'Hadir'),
(38, 28, '3', '3', '', 9, 'Hadir'),
(39, 31, '3', '3', '', 9, 'Hadir'),
(40, 50, '3', '3', '', 9, 'Hadir'),
(41, 20, '4', '1', '', 9, 'Hadir'),
(42, 34, '4', '2', '', 9, 'Hadir'),
(43, 35, '4', '2', '', 9, 'Hadir'),
(44, 47, '4', '2', '', 9, 'Hadir'),
(45, 51, '4', '2', '', 9, 'Hadir'),
(46, 52, '4', '2', '', 9, 'Hadir'),
(47, 53, '4', '2', '', 9, 'Hadir'),
(48, 54, '4', '2', '', 9, 'Hadir'),
(49, 42, '4', '3', '', 9, 'Hadir'),
(50, 43, '4', '3', '', 9, 'Hadir'),
(51, 55, '4', '3', '', 9, 'Hadir'),
(52, 56, '4', '3', '(18.00)', 9, 'Hadir'),
(53, 22, '4', '3', '', 9, 'Hadir'),
(54, 57, '5', '2', '', 9, 'Hadir'),
(55, 32, '5', '3', '', 9, 'Hadir'),
(56, 33, '5', '3', '', 9, 'Hadir'),
(57, 44, '5', '3', '(16.00)', 9, 'Hadir'),
(58, 45, '5', '3', '(16.00)', 9, 'Hadir'),
(59, 48, '5', '3', '', 9, 'Hadir'),
(60, 56, '5', '4', '', 9, 'Hadir'),
(61, 24, '6', '1', '', 9, 'Hadir'),
(62, 46, '6', '1', '', 9, 'Hadir'),
(63, 54, '6', '1', '', 9, 'Hadir'),
(64, 58, '6', '1', '', 9, 'Hadir'),
(65, 59, '6', '1', '', 9, 'Hadir'),
(66, 60, '6', '1', '', 9, 'Hadir'),
(67, 21, '6', '2', '', 9, 'Hadir'),
(68, 38, '6', '2', '', 9, 'Hadir'),
(69, 39, '6', '2', '', 9, 'Hadir'),
(70, 40, '6', '2', '', 9, 'Hadir'),
(71, 41, '6', '2', '', 9, 'Hadir'),
(72, 55, '6', '2', '', 9, 'Hadir'),
(73, 57, '6', '3', '', 9, 'Hadir'),
(74, 25, '6', '4', '', 9, 'Hadir'),
(75, 26, '6', '4', '', 9, 'Hadir'),
(76, 36, '6', '4', '', 9, 'Hadir'),
(77, 37, '6', '4', '', 9, 'Hadir'),
(78, 52, '6', '4', '', 9, 'Hadir'),
(79, 61, '6', '4', '', 9, 'Hadir'),
(80, 1, '1', '2', '', 9, ''),
(82, 1, '3', '2', '', 9, ''),
(83, 1, '1', '2', '', 9, ''),
(84, 1, '4', '5', '', 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_adm`
--

CREATE TABLE `detail_adm` (
  `id_user` int(10) NOT NULL,
  `name_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_adm`
--

INSERT INTO `detail_adm` (`id_user`, `name_user`) VALUES
(6, 'Pangki Pramawidi'),
(8, 'Thendy Chandra');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pb`
--

CREATE TABLE `detail_pb` (
  `id_user` int(10) NOT NULL,
  `name_user` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pb`
--

INSERT INTO `detail_pb` (`id_user`, `name_user`) VALUES
(9, 'Albert'),
(12, 'Ruddy'),
(10, 'Anderson'),
(11, 'Fany'),
(13, 'Ericca'),
(14, 'Lin'),
(15, 'Andre'),
(16, 'Patricia'),
(17, 'Viola'),
(18, 'Albert Febriano');

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id_user` int(10) NOT NULL,
  `nis_user` bigint(25) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `sklh_user` varchar(255) NOT NULL,
  `jk_user` varchar(5) NOT NULL,
  `mac_addr` varchar(225) NOT NULL,
  `user_status` enum('Verified','unverified','unknown') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id_user`, `nis_user`, `name_user`, `sklh_user`, `jk_user`, `mac_addr`, `user_status`) VALUES
(4, 14151051, 'Maulana Rizal Hilman', 'SMK INFORMATIKA', 'L', '', 'unverified'),
(1, 120158151, 'Fauzi', 'SMK INFORMATIKA', 'L', '', 'unverified'),
(3, 1234567, 'Yasmin', 'SMK INFORMATIKA', 'P', '', 'unverified'),
(19, 2147483647, 'Abel', 'SMK IT', 'P', '', 'unverified'),
(7, 2147483647, 'Haekal', 'Universitas Diponegoro', 'L', '', 'unverified'),
(20, 202002100001, 'Reyner', 'SMA Kolese Loyola', 'L', '', 'unverified'),
(21, 202002100002, 'CS', 'SMAN 6', 'P', '', 'unverified'),
(22, 202002100003, 'Bernie', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(23, 202002100004, 'Aurell', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(24, 202002100005, 'Gaby', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(25, 202002100006, 'Audriana', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(26, 202002100007, 'Adelita', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(27, 202002100008, 'Felicia', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(28, 202002100009, 'Jansen', 'SMA Kolese Loyola', 'L', '', 'unverified'),
(29, 202002100010, 'Michelline', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(30, 202002100011, 'Eugene', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(31, 202002100012, 'Audrey', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(32, 202002100013, 'Janice F', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(33, 202002100014, 'Janice A', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(34, 202002100015, 'Vio', 'SMA Karang Turi', 'L', '', 'unverified'),
(35, 202002100016, 'Darryn', 'SMA Karang Turi', 'P', '', 'unverified'),
(36, 202002100017, 'Sharon K', 'SMA Karang Turi', 'P', '', 'unverified'),
(37, 202002100018, 'Natasha Mogi', 'SMA Karang Turi', 'P', '', 'unverified'),
(38, 202002100019, 'Brendan', 'SMA Karang Turi', 'P', '', 'unverified'),
(39, 202002100020, 'Melia', 'SMA Karang Turi', 'P', '', 'unverified'),
(40, 202002100021, 'Michelle M', 'SMA Karang Turi', 'P', '', 'unverified'),
(41, 202002100022, 'Bara', 'SMA Karang Turi', 'L', '', 'unverified'),
(42, 202002100023, 'Joceline', 'SMA Karang Turi', 'P', '', 'unverified'),
(43, 202002100024, 'Oliv', 'SMA Karang Turi', 'P', '', 'unverified'),
(44, 202002100025, 'Kay', 'SMAN 6', 'L', '', 'unverified'),
(45, 202002100026, 'Mike', 'SMAN 6', 'L', '', 'unverified'),
(46, 202002100027, 'Patrice', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(47, 202002100028, 'Michelle', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(48, 202002100029, 'Dylan', 'SMA Kolese Loyola', 'L', '', 'unverified'),
(49, 202002100030, 'Vicky', 'SMA Kolese Loyola', 'L', '', 'unverified'),
(50, 202002100031, 'Iyona', 'SMA Kolese Loyola', 'P', '', 'unverified'),
(51, 202002100032, 'Will', 'SMA Karang Turi', 'L', '', 'unverified'),
(52, 202002100033, 'Jung Won', 'SMAN 6', 'L', '', 'unverified'),
(53, 202002100034, 'Calista', 'SMA Karang Turi', 'P', '', 'unverified'),
(54, 202002100035, 'Hugo', 'SMA Karang Turi', 'L', '', 'unverified'),
(55, 202002100036, 'Radith', 'SMAN 6', 'L', '', 'unverified'),
(56, 202002100037, 'Kenneth', 'SMA Kolese Loyola', 'L', '', 'unverified'),
(57, 202002100038, 'Sebastian', 'SMA Kolese Loyola', 'L', '', 'unverified'),
(58, 202002100039, 'Mingta', 'SMAN 6', 'P', '', 'unverified'),
(59, 202002100040, 'Yinta', 'SMAN 6', 'P', '', 'unverified'),
(60, 202002100041, 'Denise', 'SMA Karang Turi', 'L', '', 'unverified'),
(61, 202002100042, 'Clarissa A', 'SMA Kolese Loyola', 'P', '', 'unverified');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hri` int(10) NOT NULL,
  `nama_hri` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum\'at'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal`
--

CREATE TABLE `tanggal` (
  `id_tgl` int(10) NOT NULL,
  `nama_tgl` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggal`
--

INSERT INTO `tanggal` (`id_tgl`, `nama_tgl`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05'),
(6, '06'),
(7, '07'),
(8, '08'),
(9, '09'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13'),
(14, '14'),
(15, '15'),
(16, '16'),
(17, '17'),
(18, '18'),
(19, '19'),
(20, '20'),
(21, '21'),
(22, '22'),
(23, '23'),
(24, '24'),
(25, '25'),
(26, '26'),
(27, '27'),
(28, '28'),
(29, '29'),
(30, '30'),
(31, '31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `pwd_user` varchar(255) NOT NULL,
  `level_user` enum('sw','pb','adm') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email_user`, `pwd_user`, `level_user`) VALUES
(1, 'fauzi@gmail.com', '31383f56e8ffca55b083f1b2bbf0444059a77949', 'sw'),
(4, 'rizal@gmail.com', '7c6d1abd196ae7d105998f689b9d17a259bcfa96', 'sw'),
(7, 'haekal@gmail.com', 'b480c074d6b75947c02681f31c90c668c46bf6b8', 'sw'),
(3, 'yasmuz@gmail.com', 'b480c074d6b75947c02681f31c90c668c46bf6b8', 'sw'),
(6, 'pangkipramawidi@gmail.com', '46b85526f990b4983e620b2d7417d6fcbce1929b', 'adm'),
(8, 'thendychandra@gmail.com', '95691397dad5d36b6a1facab9496f2a3565ee3fa', 'adm'),
(9, 'albert@gmail.com', '7aa129f67fde68c6d88aa58b8b8c5c28eb7dd3a3', 'pb'),
(10, 'anderson@gmail.com', '52db9057163f2b831a5452d895239a249597d1cc', 'pb'),
(11, 'fany@gmail.com', 'cdee077e3c98724546b5f21f186b75e451aaac66', 'pb'),
(12, 'ruddy@gmail.com', '256c866cd74358ce60f2f5e8fc626b9d16a8c27b', 'pb'),
(13, 'ericca@gmail.com', '4660d3ed30d1745654b7568da0101613d63773e1', 'pb'),
(14, 'lin@gmail.com', 'c512f8ea4f95ad17761dd6f6dd1e533a195ef436', 'pb'),
(15, 'andre@gmail.com', 'bc9800b9d52a24cce72a73dd528afed53f10e5fc', 'pb'),
(16, 'patricia@gmail.com', '04e6f3bca0d940b47b477d89cc9d3e92d03f22dd', 'pb'),
(17, 'viola@gmail.com', '2f9d8b5e27798bf51c229378bbd7d472e1ab6648', 'pb'),
(18, 'albertfebriano@gmail.com', '546ecd70f81787e82c7683ae9c701f8b0192760c', 'pb'),
(19, 'abel@gmail.com', '270ccadd491759f6149d7c6344907790b31eec91', 'sw'),
(20, 'reyner@gmail.com', 'e4984a9d1c08440f2de144062a63ef09603a6379', 'sw'),
(21, 'cs@gmail.com', '67f994533a5d976eed69aeae05e381bf6fa851e8', 'sw'),
(22, 'bernie@gmail.com', '853520c0eaeb91fa22b7d2c2bb860b746e447d45', 'sw'),
(23, 'aurell@gmail.com', 'f5b24785332dacb53bce6d7c078e3b982731a5d1', 'sw'),
(24, 'gaby@gmail.com', '263a5b07b4ab80f18c831193c7f85249548cb9f9', 'sw'),
(25, 'audriana@gmail.com', '9607727b4c96839e6cd6051305ee3e507c623909', 'sw'),
(26, 'adelita@gmail.com', '10068bb6af0c96030e6dedf4e840180f53b4e3b5', 'sw'),
(27, 'felicia@gmail.com', 'bc40dc7343108692d9132295f8bd82942052b021', 'sw'),
(28, 'jansen@gmail.com', 'af3a4f12ca527d012127cd060074a4c3348cdbc2', 'sw'),
(29, 'michelline@gmail.com', 'a74a74a520a899b2fbd470bed444fe73d626db20', 'sw'),
(30, 'eugene@gmail.com', '9ca3a9f70b33e046bab2e2acccb982c72f85783a', 'sw'),
(31, 'audrey@gmail.com', '8716254880101d372f24828e590aee83812cc1c2', 'sw'),
(32, 'janicef@gmail.com', '3e8508911a4ddca884448c2d7da4347e22aba6ee', 'sw'),
(33, 'janicea@gmail.com', 'b3d80bee8db21d80551c4aeb143e4ea9165874b9', 'sw'),
(34, 'vio@gmail.com', 'b7cc0bf183c4c935a8c9922389894a6860618246', 'sw'),
(35, 'darryn@gmail.com', 'b941d657110cdbe31d0353d09924256302e8d6ba', 'sw'),
(36, 'sharonk@gmail.com', '97af8ddd30eb6d083b0c1d51a49588c9ff022794', 'sw'),
(37, 'natashamogi@gmail.com', '246df50777b11ad306c3fa58e1e7f1aa9d762205', 'sw'),
(38, 'brendan@gmail.com', 'd88b10c6bc7c38a4ffb541994aef7d8a7f8e3819', 'sw'),
(39, 'melia@gmail.com', 'ee4fb160b4f1aeab7a37f2570599feb0ef0a4add', 'sw'),
(40, 'michellem@gmail.com', '0984455b3296ae94b4db55705605714fd986f5d2', 'sw'),
(41, 'bara@gmail.com', 'f1f50edb3521976079adb835780ae88216b88c86', 'sw'),
(42, 'joceline@gmail.com', 'bf3f354a1d7ea814567526cfe11bbb2a66a61d4b', 'sw'),
(43, 'oliv@gmail.com', '2d31eb16cfd11c294ded0703c648f5caa95a9770', 'sw'),
(44, 'kay@gmail.com', 'e9264147b413746293e539868c8edff71715e1e3', 'sw'),
(45, 'mike@gmail.com', 'a17fed27eaa842282862ff7c1b9c8395a26ac320', 'sw'),
(46, 'patrice@gmail.com', 'edadd0771c4216ced81a23a1a27d6d4e3d1d33fa', 'sw'),
(47, 'michelle@gmail.com', '7212a9e01329ea93a57f574bd9bf77695d5fdca4', 'sw'),
(48, 'dylan@gmail.com', 'dd378c4ca75f71f527acddef5b43fc35b68d5b7a', 'sw'),
(49, 'vicky@gmail.com', 'e79cab55eab4c0a1a63610829a51fd51d5cfb294', 'sw'),
(50, 'iyona@gmail.com', 'fb92cbaa0de0875a00d6ea2ad6bf1c02ac1cf9f5', 'sw'),
(51, 'will@gmail.com', '37d41699bdee4fcb969ca499eb0f8b82c60d59cc', 'sw'),
(52, 'jungwon@gmail.com', '1a8c2fe4058612a85d5fed71acac509c66e69c56', 'sw'),
(53, 'calista@gmail.com', 'dffd5f07467b689568f0d2058bc7dbcdcf76ae5a', 'sw'),
(54, 'hugo@gmail.com', '3faf7ed52fa83d583fc670a96bcf92da270d0767', 'sw'),
(55, 'radith@gmail.com', '893b5e637685e5e7579ddfbbdd9193deacedbe44', 'sw'),
(56, 'kenneth@gmail.com', 'bd2562f754ec92342f93f61c25d731e290a2ffa8', 'sw'),
(57, 'sebastian@gmail.com', 'db043b2055cb3a47b2eb0b5aebf4e114a8c24a5a', 'sw'),
(58, 'mingta@gmail.com', '2c20bcf98ab0b311b6dc4ce17f1122a5bbd38de8', 'sw'),
(59, 'yinta@gmail.com', '57808d06c6f7d8b44f5781d3e59a873e19a4dc5a', 'sw'),
(60, 'denise@gmail.com', '471359c4f08c72d1faf32a973da3b7b4018e6365', 'sw'),
(61, 'clarissaa@gmail.com', '8bb12b3c42b10583862ca2e42b49e18bbb49ce99', 'sw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_pb`
--
ALTER TABLE `absen_pb`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bln`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `data_absen`
--
ALTER TABLE `data_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `detail_adm`
--
ALTER TABLE `detail_adm`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `detail_pb`
--
ALTER TABLE `detail_pb`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_user`,`nis_user`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hri`);

--
-- Indexes for table `tanggal`
--
ALTER TABLE `tanggal`
  ADD PRIMARY KEY (`id_tgl`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`,`email_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_pb`
--
ALTER TABLE `absen_pb`
  MODIFY `id_absen` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bln` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_cat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `data_absen`
--
ALTER TABLE `data_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  MODIFY `id_jadwal` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hri` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tanggal`
--
ALTER TABLE `tanggal`
  MODIFY `id_tgl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
