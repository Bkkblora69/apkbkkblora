-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 07:45 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiketbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `no` varchar(255) NOT NULL,
  `request` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `handle_by` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `no`, `request`, `user_id`, `kategori`, `file`, `priority`, `handle_by`, `status`, `created_at`) VALUES
(2, 'TIC1707737698', 'Request1112', 14, 'kategori', '', 'Medium', 'qq', 'Pending', '2024-02-12 18:42:36'),
(3, 'TIC1707872868', 'qq', 14, 'hh', 'uploads/1707872868jeruk.jpg', '', '', 'Pending', '2024-02-14 02:07:48'),
(4, 'TIC122402190001\n', 'q', 14, 'q', 'uploads/1708356031jeruk.jpg', '', '', 'Pending', '2024-02-19 16:20:31'),
(5, 'TIC122402190002\n', 'q', 14, 'd', 'uploads/1708356046jeruk.jpg', '', '', 'Pending', '2024-02-19 16:20:46'),
(6, 'TIC122402190003\n', 'y', 14, 'y', 'uploads/1708356098jeruk.jpg', '', '', 'Pending', '2024-02-19 16:21:38'),
(7, 'TIC062402200001\n', 'jaringan trouble', 16, 'kredit', 'uploads/1708395597Beige and Black Vintage Newspaper Birthday Party Poster.png', '', '', 'Pending', '2024-02-20 03:19:57'),
(8, 'TIC062402200002\n', 'internet mati', 16, 'tabungan', 'uploads/1708397348ISI KORAN-fotor-20240219151616.jpg', '', '', 'Pending', '2024-02-20 03:49:08'),
(9, 'TIC06202402200003\n', 'kabel mati', 16, 'kredit', 'uploads/1708398559Beige and Black Simple Elegant Blog Instagram Story.png', '', '', 'Pending', '2024-02-20 04:09:19'),
(10, 'TIC06202402200004\n', 'wifi los merah', 16, 'kredit', 'uploads/1708399314logo_bkk1.png', '', '', 'Pending', '2024-02-20 04:21:54'),
(11, 'TIC03202402200001\n', 'jaringan error', 18, 'tabungan', 'uploads/1708404313Beige and Black Vintage Newspaper Birthday Party Poster.png', '', '', 'Pending', '2024-02-20 05:45:13'),
(12, 'TIC06202402210001\n', 'permintaan tabungan ditolak', 16, 'tabungan', 'uploads/1708476204publikasi-koran (2).jpg', 'High', 'pak yasin', 'Selesai', '2024-02-21 01:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `nomor_telepon` varchar(50) DEFAULT NULL,
  `kode_cabang` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `nomor_telepon`, `kode_cabang`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '08765445678', NULL, 'admin'),
(14, 'user', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'user', 'user@gmail.com', '12', 'user'),
(16, 'cabang ngawen', 'c35c8624348f4d2cab1cbc8b6964d149fa0cb71a', 'BKK CABANG NGAWEN', '0895412719138', '06', 'user'),
(17, 'cabang kedungtuban', 'a2ed55980ca71fa19c86a88e2a8790142a04a6c5', 'BKK CABANG KEDUNGTUBAN', '085290357573', '02', 'user'),
(18, 'cabang sambong', '45c9aaa81aa216c2ea6efb272b58bdefd7537fa3', 'BKK CABANG SAMBONG', '08123456789', '03', 'user'),
(19, 'cabang todanan', '545246e0057966da03af8b71e5466ab33fcbe5a3', 'BKK CABANG TODANAN', '088744445555', '04', 'user'),
(20, 'cabang banjarejo', 'c719fd13666927cc4b0f840581c20109739a7f49', 'BKK CABANG BANJAREJO', '08954432222', '05', 'user'),
(21, 'cabang cepu', '113ec686c03c4682f937aba81836874465da3da8', 'BKK CABANG CEPU', '087766554444', '07', 'user'),
(22, 'cabang tunjungan', '916f396bb692743b1fa59819bbb2526534f350e3', 'BKK CABANG TUNJUNGAN', '087766665555', '08', 'user'),
(23, 'cabang jiken', '13e3d238f5492370da359c1028b1409508a0d4c7', 'BKK CABANG JIKEN', '088899990033', '09', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
