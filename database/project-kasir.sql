-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2024 pada 18.27
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifki_detail_transaksi`
--

CREATE TABLE `rifki_detail_transaksi` (
  `rifki_id_detail_trans` int(11) NOT NULL,
  `rifki_id_transaksi` varchar(11) NOT NULL,
  `rifki_id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rifki_detail_transaksi`
--

INSERT INTO `rifki_detail_transaksi` (`rifki_id_detail_trans`, `rifki_id_transaksi`, `rifki_id_menu`, `qty`) VALUES
(32, 'TRS007', 9, 1),
(33, 'TRS007', 11, 3),
(34, 'TRS008', 10, 2),
(35, 'TRS009', 12, 4),
(36, 'TRS010', 10, 1),
(37, 'TRS012', 9, 3),
(38, 'TRS013', 11, 3),
(39, 'TRS014', 10, 2),
(40, 'TRS017', 9, 1),
(41, 'TRS017', 10, 1),
(42, 'TRS017', 11, 1),
(43, 'TRS017', 12, 1),
(44, '', 9, 1),
(45, '', 10, 1),
(46, 'TRS018', 10, 1),
(47, 'TRS018', 11, 1),
(48, 'TRS019', 11, 2),
(49, 'TRS020', 10, 1),
(50, 'TRS021', 11, 1),
(51, 'TRS021', 10, 1),
(52, 'TRS021', 9, 1),
(53, 'TRS022', 11, 1),
(54, 'TRS022', 10, 1),
(55, 'TRS022', 9, 1),
(56, 'TRS022', 12, 1),
(57, 'TRS023', 9, 1),
(58, 'TRS023', 10, 1),
(59, 'TRS024', 11, 1),
(60, 'TRS025', 9, 1),
(61, 'TRS025', 10, 1),
(62, 'TRS026', 11, 1),
(63, 'TRS007', 11, 1),
(64, 'TRS007', 10, 1),
(65, 'TRS007', 11, 1),
(66, 'TRS007', 11, 1),
(67, 'TRS007', 10, 1),
(68, 'TRS007', 9, 1),
(69, 'TRS007', 11, 1),
(70, 'TRS007', 11, 1),
(71, 'TRS028', 9, 1),
(72, 'TRS029', 13, 1),
(73, 'TRS029', 10, 1),
(74, 'TRS030', 11, 2),
(75, 'TRS030', 10, 1),
(76, 'TRS030', 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifki_kategori`
--

CREATE TABLE `rifki_kategori` (
  `rifki_id_kategori` int(11) NOT NULL,
  `rifki_nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rifki_kategori`
--

INSERT INTO `rifki_kategori` (`rifki_id_kategori`, `rifki_nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'desert'),
(5, 'JAJANAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifki_log_pegawai`
--

CREATE TABLE `rifki_log_pegawai` (
  `rifki_id_log` int(11) NOT NULL,
  `rifki_waktu` datetime NOT NULL,
  `rifki_id_user` int(11) NOT NULL,
  `rifki_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rifki_log_pegawai`
--

INSERT INTO `rifki_log_pegawai` (`rifki_id_log`, `rifki_waktu`, `rifki_id_user`, `rifki_ket`) VALUES
(0, '2022-03-18 14:44:45', 20, 'Tambah Data Di Tabel Transaksi'),
(112, '2022-03-17 11:45:09', 20, 'Tambah Data Di Tabel Transaksi'),
(113, '2022-03-17 11:50:12', 20, 'Hapus Data Transaksi'),
(114, '2022-03-17 11:56:03', 20, 'Tambah Data Di Tabel Transaksi'),
(115, '2022-03-17 12:11:26', 20, 'Tambah Data Di Tabel Transaksi'),
(116, '2022-03-17 12:12:31', 20, 'Tambah Data Di Tabel Transaksi'),
(117, '2022-03-17 12:13:01', 20, 'Tambah Data Di Tabel Transaksi'),
(118, '2022-03-17 12:22:56', 20, 'Tambah Data Di Tabel Transaksi'),
(119, '2022-03-18 16:21:30', 20, 'Update Data Di Tabel Transaksi'),
(120, '2022-03-18 16:21:36', 20, 'Update Data Di Tabel Transaksi'),
(121, '2022-03-18 16:21:38', 20, 'Update Data Di Tabel Transaksi'),
(122, '2022-03-18 16:21:41', 20, 'Update Data Di Tabel Transaksi'),
(123, '2022-03-18 16:21:43', 20, 'Update Data Di Tabel Transaksi'),
(124, '2022-03-18 16:21:45', 20, 'Update Data Di Tabel Transaksi'),
(125, '2022-03-18 16:24:32', 20, 'Hapus Data Transaksi'),
(126, '2022-03-21 19:14:28', 20, 'Tambah Data Di Tabel Transaksi'),
(127, '2022-03-21 19:19:18', 20, 'Tambah Data Di Tabel Transaksi'),
(128, '2022-03-21 19:19:25', 20, 'Update Data Di Tabel Transaksi'),
(129, '2022-03-21 19:50:50', 20, 'Tambah Data Di Tabel Transaksi'),
(130, '2022-03-21 19:51:27', 20, 'Update Data Di Tabel Transaksi'),
(131, '2022-03-21 20:36:34', 20, 'Tambah Data Di Tabel Transaksi'),
(132, '2022-03-21 20:53:39', 20, 'Update Data Di Tabel Transaksi'),
(133, '2022-03-22 13:42:32', 20, 'Tambah Data Di Tabel Transaksi'),
(134, '2022-03-22 14:37:44', 20, 'Update Data Di Tabel Transaksi'),
(135, '2022-03-22 14:41:13', 20, 'Tambah Data Di Tabel Transaksi'),
(136, '2022-03-22 14:42:01', 20, 'Tambah Data Di Tabel Transaksi'),
(137, '2022-03-22 14:49:51', 20, 'Update Data Di Tabel Transaksi'),
(138, '2022-03-22 14:49:56', 20, 'Update Data Di Tabel Transaksi'),
(139, '2022-03-22 14:49:59', 20, 'Update Data Di Tabel Transaksi'),
(140, '2022-03-22 14:57:15', 20, 'Tambah Data Di Tabel Transaksi'),
(141, '2022-03-22 15:08:39', 20, 'Tambah Data Di Tabel Transaksi'),
(142, '2022-03-22 15:09:03', 20, 'Update Data Di Tabel Transaksi'),
(143, '2022-03-22 15:09:28', 20, 'Tambah Data Di Tabel Transaksi'),
(144, '2022-03-22 15:17:29', 20, 'Tambah Data Di Tabel Transaksi'),
(145, '2022-03-23 07:44:42', 20, 'Tambah Data Di Tabel Transaksi'),
(146, '2022-03-23 09:42:02', 20, 'Tambah Data Di Tabel Transaksi'),
(147, '2022-03-23 09:42:29', 20, 'Update Data Di Tabel Transaksi'),
(148, '2022-03-23 09:42:35', 20, 'Update Data Di Tabel Transaksi'),
(149, '2022-03-23 09:42:37', 20, 'Update Data Di Tabel Transaksi'),
(150, '2022-03-23 09:42:50', 20, 'Update Data Di Tabel Transaksi'),
(151, '2022-03-23 09:43:00', 20, 'Update Data Di Tabel Transaksi'),
(152, '2022-03-23 09:43:52', 20, 'Tambah Data Di Tabel Transaksi'),
(153, '2022-03-23 10:06:52', 20, 'Tambah Data Di Tabel Transaksi'),
(154, '2022-03-23 10:20:08', 20, 'Tambah Data Di Tabel Transaksi'),
(155, '2022-03-23 10:22:11', 20, 'Update Data Di Tabel Transaksi'),
(156, '2022-03-23 10:24:00', 0, 'Tambah Data Di Tabel Transaksi'),
(157, '2022-03-23 10:24:03', 0, 'Update Data Di Tabel Transaksi'),
(158, '2022-03-23 10:28:31', 0, 'Tambah Data Di Tabel Transaksi'),
(159, '2022-03-23 10:34:02', 0, 'Tambah Data Di Tabel Transaksi'),
(160, '2022-03-23 10:38:27', 0, 'Update Data Di Tabel Transaksi'),
(161, '2022-03-23 10:55:25', 0, 'Update Data Di Tabel Transaksi'),
(162, '2022-03-23 11:09:44', 0, 'Tambah Data Di Tabel Transaksi'),
(163, '2022-03-23 13:18:59', 20, 'Tambah Data Di Tabel Transaksi'),
(164, '2022-03-23 13:19:35', 20, 'Tambah Data Di Tabel Transaksi'),
(165, '2022-03-23 13:20:40', 20, 'Update Data Di Tabel Transaksi'),
(166, '2022-03-23 13:27:52', 20, 'Update Data Di Tabel Transaksi'),
(167, '2022-03-24 08:36:47', 20, 'Update Data Di Tabel Transaksi'),
(168, '2022-03-24 09:52:30', 22, 'Tambah Data Di Tabel Transaksi'),
(169, '2022-03-24 09:52:36', 22, 'Update Data Di Tabel Transaksi'),
(170, '2022-03-24 09:55:46', 22, 'Tambah Data Di Tabel Transaksi'),
(171, '2022-03-24 11:35:40', 20, 'Tambah Data Di Tabel Transaksi'),
(172, '2022-03-24 11:37:35', 20, 'Update Data Di Tabel Transaksi'),
(173, '2022-03-24 11:37:37', 20, 'Update Data Di Tabel Transaksi'),
(174, '2022-03-24 11:38:31', 22, 'Update Data Di Tabel Transaksi'),
(175, '2022-03-25 12:49:08', 20, 'Tambah Data Di Tabel Transaksi'),
(176, '2022-03-25 12:49:29', 20, 'Tambah Data Di Tabel Transaksi'),
(177, '2022-03-25 12:49:36', 20, 'Update Data Di Tabel Transaksi'),
(178, '2023-06-05 09:56:39', 22, 'Tambah Data Di Tabel Transaksi'),
(179, '2023-06-05 09:57:29', 22, 'Update Data Di Tabel Transaksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifki_meja`
--

CREATE TABLE `rifki_meja` (
  `rifki_id_meja` int(11) NOT NULL,
  `rifki_nama_meja` varchar(100) NOT NULL,
  `rifki_status` enum('tersedia','terisi','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rifki_meja`
--

INSERT INTO `rifki_meja` (`rifki_id_meja`, `rifki_nama_meja`, `rifki_status`) VALUES
(15, 'MJ-001', 'tersedia'),
(16, 'MJ-002', 'terisi'),
(17, 'MJ-003', 'tersedia'),
(18, 'MJ-004', 'tersedia'),
(19, 'MJ-005', 'tersedia'),
(20, 'MJ-006', 'tersedia'),
(21, 'MJ-007', 'tersedia'),
(22, 'MJ-008', 'tersedia'),
(23, 'MJ-009', 'tersedia'),
(24, 'MJ-010', 'tersedia'),
(25, 'MJ-011', 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifki_menu_kasir`
--

CREATE TABLE `rifki_menu_kasir` (
  `rifki_id_menu` int(11) NOT NULL,
  `rifki_id_kategori` int(11) NOT NULL,
  `rifki_nama_menu` varchar(100) NOT NULL,
  `rifki_image` varchar(255) NOT NULL,
  `rifki_harga` double NOT NULL,
  `rifki_status_menu` enum('tersedia','habis','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rifki_menu_kasir`
--

INSERT INTO `rifki_menu_kasir` (`rifki_id_menu`, `rifki_id_kategori`, `rifki_nama_menu`, `rifki_image`, `rifki_harga`, `rifki_status_menu`) VALUES
(9, 1, 'Seblak', '623449a46ea3d.jpg', 11000, 'tersedia'),
(10, 3, 'Franch Fries', '62344a16d9bdc.jpg', 14000, 'tersedia'),
(11, 3, 'Pisang Keju', '62344958eed82.jpg', 12000, 'tersedia'),
(12, 2, 'Juice', '62344a7d79a11.jpg', 8000, 'tersedia'),
(13, 1, 'Cireng', '623a98208f468.jpg', 13000, 'tersedia'),
(14, 2, 'Cappucion Latte', '623d588ff3c16.jpg', 23000, 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifki_role`
--

CREATE TABLE `rifki_role` (
  `rifki_id_role` int(11) NOT NULL,
  `rifki_nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rifki_role`
--

INSERT INTO `rifki_role` (`rifki_id_role`, `rifki_nama_role`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifki_transaksi`
--

CREATE TABLE `rifki_transaksi` (
  `rifki_id_transaksi` varchar(11) NOT NULL,
  `rifki_invoice` varchar(25) NOT NULL,
  `rifki_id_user` int(11) NOT NULL,
  `rifki_id_meja` int(11) NOT NULL,
  `rifki_tgl_transaksi` date NOT NULL,
  `rifki_keterangan` text NOT NULL,
  `rifki_bayar` double NOT NULL,
  `rifki_tot_bayar` double NOT NULL,
  `rifki_status_order` enum('belum bayar','sudah bayar','','') NOT NULL,
  `rifki_kembali` double NOT NULL,
  `rifki_progres` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rifki_transaksi`
--

INSERT INTO `rifki_transaksi` (`rifki_id_transaksi`, `rifki_invoice`, `rifki_id_user`, `rifki_id_meja`, `rifki_tgl_transaksi`, `rifki_keterangan`, `rifki_bayar`, `rifki_tot_bayar`, `rifki_status_order`, `rifki_kembali`, `rifki_progres`) VALUES
('TRS002', 'IVC002', 20, 16, '2022-03-17', 'aaaa', 5000, 2000, 'sudah bayar', 3000, 'selesai'),
('TRS003', 'IVC003', 20, 17, '2022-03-17', 'iqj', 5000, 2000, 'sudah bayar', 3000, 'selesai'),
('TRS004', 'IVC004', 20, 18, '2022-03-17', 'dasadsa', 10000, 6000, 'sudah bayar', 4000, 'selesai'),
('TRS005', 'IVC005', 20, 19, '2022-03-17', 'dsasda', 100000, 81000, 'sudah bayar', 19000, 'selesai'),
('TRS006', 'IVC006', 20, 20, '2022-03-18', 'jangan manis teing', 45000, 42000, 'sudah bayar', 3000, 'selesai'),
('TRS007', 'IVC007', 20, 15, '2022-03-21', 'jangan manis teing', 40000, 36000, 'sudah bayar', 4000, 'selesai'),
('TRS008', 'IVC008', 20, 16, '2022-03-21', 'pol pedas', 25000, 22000, 'sudah bayar', 3000, 'selesai'),
('TRS009', 'IVC009', 20, 24, '2022-03-21', 'jangan lama', 50000, 45000, 'sudah bayar', 5000, 'selesai'),
('TRS010', 'IVC010', 20, 15, '2022-03-21', 'jangan lama', 15000, 14000, 'sudah bayar', 1000, 'selesai'),
('TRS011', 'IVC007', 20, 24, '2022-04-07', 'mantap', 10000, 8000, 'belum bayar', 2000, 'selesai'),
('TRS012', 'IVC011', 20, 15, '2022-03-22', 'okelah', 40000, 37000, 'sudah bayar', 3000, 'selesai'),
('TRS013', 'IVC012', 20, 17, '2022-03-22', 'ah', 40000, 37000, 'sudah bayar', 3000, 'selesai'),
('TRS014', 'IVC013', 20, 15, '2022-03-22', 'ah', 28000, 25000, 'sudah bayar', 3000, 'selesai'),
('TRS015', 'IVC014', 20, 17, '2022-03-22', 'okelah', 40000, 37000, 'sudah bayar', 3000, 'selesai'),
('TRS016', 'IVC015', 20, 16, '2022-03-22', 'okelah', 60000, 57000, 'sudah bayar', 3000, 'selesai'),
('TRS017', 'IVC016', 20, 17, '2022-03-22', 'ah', 50000, 45000, 'sudah bayar', 5000, 'selesai'),
('TRS018', 'IVC017', 20, 19, '2022-03-23', 'oh', 30000, 26000, 'sudah bayar', 4000, 'selesai'),
('TRS019', 'IVC018', 20, 20, '2022-03-23', 'jangan terlalu manis', 25000, 24000, 'sudah bayar', 1000, 'selesai'),
('TRS020', 'IVC019', 20, 15, '2022-03-23', 'Kasih Saos Yang Banyak', 20000, 14000, 'sudah bayar', 6000, 'selesai'),
('TRS021', 'IVC020', 20, 16, '2022-03-23', 'JANGAN LAMA', 40000, 37000, 'sudah bayar', 3000, 'selesai'),
('TRS022', 'IVC021', 20, 17, '2022-03-23', 'JANGAN LAMA', 50000, 45000, 'sudah bayar', 5000, 'selesai'),
('TRS023', 'IVC022', 20, 16, '2022-03-23', 'jangan terlalu manis', 30000, 26000, 'sudah bayar', 4000, 'selesai'),
('TRS024', 'IVC023', 20, 17, '2022-03-23', 'Kasih Saos Yang Banyak', 15000, 12000, 'sudah bayar', 3000, 'selesai'),
('TRS025', 'IVC024', 22, 19, '2022-03-24', 'fast', 40000, 37000, 'sudah bayar', 3000, 'selesai'),
('TRS026', 'IVC025', 22, 15, '2022-03-24', 'cepat', 20000, 12000, 'sudah bayar', 8000, 'selesai'),
('TRS027', 'IVC026', 20, 19, '2022-03-24', 'mantap', 15000, 12000, 'sudah bayar', 3000, 'selesai'),
('TRS028', 'IVC027', 20, 15, '2022-03-25', 'p', 15000, 11000, 'sudah bayar', 4000, 'selesai'),
('TRS029', 'IVC028', 20, 16, '2022-03-25', 's', 30000, 27000, 'sudah bayar', 3000, 'belum selesai'),
('TRS030', 'IVC029', 22, 17, '2023-06-05', 'cepet', 50000, 49000, 'sudah bayar', 1000, 'selesai');

--
-- Trigger `rifki_transaksi`
--
DELIMITER $$
CREATE TRIGGER `delete_transaksi` BEFORE DELETE ON `rifki_transaksi` FOR EACH ROW INSERT INTO rifki_log_pegawai(rifki_id_log,rifki_waktu,rifki_id_user,rifki_ket)VALUES('',NOW(),old.rifki_id_user,'Hapus Data Transaksi')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_transaksi` AFTER INSERT ON `rifki_transaksi` FOR EACH ROW INSERT INTO rifki_log_pegawai(rifki_id_log,rifki_waktu,rifki_id_user,rifki_ket)VALUES(NULL,NOW(),new.rifki_id_user,'Tambah Data Di Tabel Transaksi')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_transaksi` AFTER UPDATE ON `rifki_transaksi` FOR EACH ROW INSERT INTO rifki_log_pegawai(rifki_id_log,rifki_waktu,rifki_id_user,rifki_ket)VALUES(NULL,NOW(),new.rifki_id_user,'Update Data Di Tabel Transaksi')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rifki_user`
--

CREATE TABLE `rifki_user` (
  `rifki_id_user` int(11) NOT NULL,
  `rifki_id_role` int(10) NOT NULL,
  `rifki_kd_user` varchar(10) NOT NULL,
  `rifki_username` varchar(100) NOT NULL,
  `rifki_password` varchar(100) NOT NULL,
  `rifki_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rifki_user`
--

INSERT INTO `rifki_user` (`rifki_id_user`, `rifki_id_role`, `rifki_kd_user`, `rifki_username`, `rifki_password`, `rifki_nama`) VALUES
(1, 2, 'USR003', 'koko', '37f525e2b6fc3cb4abd882f708ab80eb', 'koko'),
(3, 1, '', 'jajang', 'b56b57039c86f8626ece5a1a35f86175', 'jajang'),
(9, 2, 'USR001', 'mama', 'eeafbf4d9b3957b139da7b7f2e7f2d4a', 'mamak'),
(20, 3, 'USR002', 'popo', '3b2285b348e95774cb556cb36e583106', 'popo'),
(21, 3, 'USR004', 'jojo', '7510d498f23f5815d3376ea7bad64e29', 'jojo'),
(22, 3, 'USR005', 'lala', '2e3817293fc275dbee74bd71ce6eb056', 'lala');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rifki_detail_transaksi`
--
ALTER TABLE `rifki_detail_transaksi`
  ADD PRIMARY KEY (`rifki_id_detail_trans`),
  ADD KEY `rifki_id_transaksi` (`rifki_id_transaksi`,`rifki_id_menu`) USING BTREE;

--
-- Indeks untuk tabel `rifki_kategori`
--
ALTER TABLE `rifki_kategori`
  ADD PRIMARY KEY (`rifki_id_kategori`);

--
-- Indeks untuk tabel `rifki_log_pegawai`
--
ALTER TABLE `rifki_log_pegawai`
  ADD PRIMARY KEY (`rifki_id_log`);

--
-- Indeks untuk tabel `rifki_meja`
--
ALTER TABLE `rifki_meja`
  ADD PRIMARY KEY (`rifki_id_meja`);

--
-- Indeks untuk tabel `rifki_menu_kasir`
--
ALTER TABLE `rifki_menu_kasir`
  ADD PRIMARY KEY (`rifki_id_menu`),
  ADD KEY `rifki_id_kategori` (`rifki_id_kategori`) USING BTREE;

--
-- Indeks untuk tabel `rifki_role`
--
ALTER TABLE `rifki_role`
  ADD PRIMARY KEY (`rifki_id_role`);

--
-- Indeks untuk tabel `rifki_transaksi`
--
ALTER TABLE `rifki_transaksi`
  ADD PRIMARY KEY (`rifki_id_transaksi`),
  ADD KEY `rifki_id_user` (`rifki_id_user`,`rifki_id_meja`),
  ADD KEY `rifki_id_meja` (`rifki_id_meja`);

--
-- Indeks untuk tabel `rifki_user`
--
ALTER TABLE `rifki_user`
  ADD PRIMARY KEY (`rifki_id_user`),
  ADD KEY `id_role` (`rifki_id_role`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rifki_detail_transaksi`
--
ALTER TABLE `rifki_detail_transaksi`
  MODIFY `rifki_id_detail_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `rifki_kategori`
--
ALTER TABLE `rifki_kategori`
  MODIFY `rifki_id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rifki_log_pegawai`
--
ALTER TABLE `rifki_log_pegawai`
  MODIFY `rifki_id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT untuk tabel `rifki_meja`
--
ALTER TABLE `rifki_meja`
  MODIFY `rifki_id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `rifki_menu_kasir`
--
ALTER TABLE `rifki_menu_kasir`
  MODIFY `rifki_id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `rifki_role`
--
ALTER TABLE `rifki_role`
  MODIFY `rifki_id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `rifki_user`
--
ALTER TABLE `rifki_user`
  MODIFY `rifki_id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rifki_menu_kasir`
--
ALTER TABLE `rifki_menu_kasir`
  ADD CONSTRAINT `rifki_menu_kasir_ibfk_1` FOREIGN KEY (`rifki_id_kategori`) REFERENCES `rifki_kategori` (`rifki_id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rifki_transaksi`
--
ALTER TABLE `rifki_transaksi`
  ADD CONSTRAINT `rifki_transaksi_ibfk_1` FOREIGN KEY (`rifki_id_user`) REFERENCES `rifki_user` (`rifki_id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rifki_transaksi_ibfk_2` FOREIGN KEY (`rifki_id_meja`) REFERENCES `rifki_meja` (`rifki_id_meja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rifki_user`
--
ALTER TABLE `rifki_user`
  ADD CONSTRAINT `rifki_user_ibfk_1` FOREIGN KEY (`rifki_id_role`) REFERENCES `rifki_role` (`rifki_id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
