-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2020 at 06:55 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_futsal_bandung`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar_booking`
--

CREATE TABLE `tb_bayar_booking` (
  `id` int(11) NOT NULL,
  `bank_rek_pengirim` varchar(50) NOT NULL,
  `nama_rek_pengirim` varchar(50) NOT NULL,
  `no_rek_pengirim` varchar(50) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `bukti_bayar` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `no` int(5) NOT NULL,
  `id` varchar(15) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_member` int(11) NOT NULL,
  `id_lapangan` varchar(15) NOT NULL,
  `id_bayar_booking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapangan`
--

CREATE TABLE `tb_lapangan` (
  `no` int(5) NOT NULL,
  `id` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `open_at` time NOT NULL,
  `close_at` time NOT NULL,
  `keterangan` text NOT NULL,
  `foto_lapangan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_provider` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto_profil` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id`, `nama`, `no_telepon`, `alamat`, `foto_profil`, `username`) VALUES
(1, 'Marx Monroe', '0812374882', 'Jalan Ir. H. Djuanda', '1.png', 'member'),
(2, 'Hitler', '087123884722', 'Jauh disana', '4.png', 'member2'),
(3, 'Atlas', '', '', '6.png', 'member3'),
(4, 'Suyo\'on', '088982766473', 'Jalan Dipatiukur, Bandung', '3.png', 'member4'),
(5, 'Althea 5', '089777271263', 'Jalan Siliwangi Indah 2', '3.png', 'member5'),
(6, 'Tashya', '0862716621', 'Jalan terus pantang mundur', '6.png', 'member6'),
(7, 'Dio Ilham Djatiadi', '+6287717071998', 'Jalan terus pantang mundur', '6.png', 'member7');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provider`
--

CREATE TABLE `tb_provider` (
  `no` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota_kabupaten` varchar(100) NOT NULL DEFAULT 'Kota Bandung',
  `open_at` time NOT NULL,
  `close_at` time NOT NULL,
  `jumlah_lapangan` int(2) NOT NULL,
  `logo` varchar(50) NOT NULL DEFAULT 'futsal.png',
  `foto_tempat` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_provider`
--

INSERT INTO `tb_provider` (`no`, `id`, `nama`, `no_telepon`, `alamat`, `kota_kabupaten`, `open_at`, `close_at`, `jumlah_lapangan`, `logo`, `foto_tempat`, `keterangan`, `username`) VALUES
(1, 'pro_campnou', 'Camp Nou', '08771299983', 'Barcelona, Spanyol', 'Kota Bandung', '08:00:00', '21:00:00', 3, 'futsal.png', '', 'Tes aja doang', 'pro_campnou'),
(2, 'pro_gbk', 'Gelora Bung Karno', '089389292771', 'Jalan kenangan diatas lembu\r\n', 'Kota Bandung', '07:00:00', '21:00:00', 0, 'futsal.png', '', 'Silakan isi keterangan tambahan yang dibutuhkan sebagai penunjang untuk member memahami.', 'pro_gbk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_random_code`
--

CREATE TABLE `tb_random_code` (
  `no` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `verification_code` varchar(250) DEFAULT NULL,
  `reset_password_code` varchar(250) DEFAULT NULL,
  `email_code` varchar(250) DEFAULT NULL,
  `created_at_code` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_random_code`
--

INSERT INTO `tb_random_code` (`no`, `email`, `created_at`, `expired_at`, `verification_code`, `reset_password_code`, `email_code`, `created_at_code`) VALUES
(1, 'member6@msn.com', '2020-01-28 01:48:45', '0000-00-00 00:00:00', 'WloJgW8NCBMDJnrRahGLP6ncDHstXyTpE', NULL, 'jJG0hwED9X7IzJeLGLSA61rIsBV11K0Io', 'Xo1zJPHoieF0aJkzIMfLn6VffTiGpFTQh'),
(2, 'dioilham123@gmail.com', '2020-01-28 01:53:09', '2021-01-28 01:53:09', 'gYCuYcE6AdhSSHs1suNJHuD3iZKvrnGld', NULL, '8cXq4xfgzXVEyPBh1nQQiPIEUb4FZ6mmu', '4feD9Asa41WMmTWbi7dffvnVud1b2xt8O');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `no` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `privilege` varchar(25) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`no`, `email`, `username`, `password`, `privilege`, `is_active`, `created_at`) VALUES
(3, 'member@msn.com', 'member', '$2y$12$mDa.TIpH8XNiecp30uTD3eDki/pdWzwwMK8h0WXZPhBvi9NKkENzu', 'member', '1', '2020-01-17 06:55:06'),
(4, 'member2@msn.com', 'member2', '$2y$12$wHGEVinFK4/13eoI8sPaH.LVmIsD9aMc3uxMkY0zzgSGLPTYUaPMa', 'member', '1', '2020-01-17 10:03:53'),
(5, 'member3@msn.com', 'member3', '$2y$12$vYWXpUpG2NPAqXyQ80PD8u9ofdhofqeqXREN6MBzNwc2NBC7QCAhK', 'member', '1', '2020-01-20 18:46:24'),
(7, 'member4@msn.com', 'member4', '$2y$12$vYWXpUpG2NPAqXyQ80PD8u9ofdhofqeqXREN6MBzNwc2NBC7QCAhK', 'member', '1', '2020-01-21 01:46:32'),
(8, 'member5@msn.com', 'member5', '$2y$12$IF0.IASU3QNI.EjgFqQfrehJ4Igy53M./C30p1es0R.oCYt8CgHbi', 'member', '1', '2020-01-21 01:56:21'),
(9, 'member6@msn.com', 'member6', '$2y$10$iVc4x39KZ8SPN3k/7CV/tOd080w8zfqZMUONrogpxAkSCSNsMLUnW', 'member', '1', '2020-01-28 01:48:45'),
(10, 'dioilham123@gmail.com', 'member7', '$2y$10$TYCREcWxhZsqwpREQV8PI.XJ8yzaLmQKy1zalVW9PbENB.AxEL7a2', 'member', '1', '2020-01-28 01:53:09'),
(2, 'campnou@msn.com', 'pro_campnou', '$2y$12$IF0.IASU3QNI.EjgFqQfrehJ4Igy53M./C30p1es0R.oCYt8CgHbi', 'provider', '1', '2020-01-17 06:39:05'),
(6, 'gbk@msn.com', 'pro_gbk', '$2y$12$QqQupWGWnKUPnTs3vOAqnOrbDlo5byQwsAWd1knqFWixz6Kqj2HFq', 'provider', '1', '2020-01-20 19:07:07'),
(1, 'superadmin@msn.com', 'superadmin', '$2y$12$s2ogzvgfjehEcAp9sL6ycepCXbQGSRXKuJnLnB68Vyfuh3QcSgg.6', 'superadmin', '1', '2020-01-16 23:55:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bayar_booking`
--
ALTER TABLE `tb_bayar_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMember` (`id_member`),
  ADD KEY `idLapangan` (`id_lapangan`),
  ADD KEY `idBayarBooking` (`id_bayar_booking`);

--
-- Indexes for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProvider` (`id_provider`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_provider`
--
ALTER TABLE `tb_provider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no2` (`no`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_random_code`
--
ALTER TABLE `tb_random_code`
  ADD PRIMARY KEY (`no`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no` (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bayar_booking`
--
ALTER TABLE `tb_bayar_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_provider`
--
ALTER TABLE `tb_provider`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_random_code`
--
ALTER TABLE `tb_random_code`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `tb_lapangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_booking_ibfk_2` FOREIGN KEY (`id_bayar_booking`) REFERENCES `tb_bayar_booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_booking_ibfk_3` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  ADD CONSTRAINT `tb_lapangan_ibfk_1` FOREIGN KEY (`id_provider`) REFERENCES `tb_provider` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD CONSTRAINT `tb_member_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_provider`
--
ALTER TABLE `tb_provider`
  ADD CONSTRAINT `tb_provider_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_random_code`
--
ALTER TABLE `tb_random_code`
  ADD CONSTRAINT `tb_random_code_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tb_user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
