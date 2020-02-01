-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 02:25 PM
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
(3, 'Atlas', '', '', '6.png', 'member3');

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

INSERT INTO `tb_provider` (`no`, `id`, `nama`, `no_telepon`, `alamat`, `open_at`, `close_at`, `jumlah_lapangan`, `logo`, `foto_tempat`, `keterangan`, `username`) VALUES
(1, 'pro_campnou', 'Camp Nou', '08771299983', 'Barcelona, Spanyol', '08:00:00', '21:00:00', 3, 'futsal.png', '', 'Tes aja doang', 'pro_campnou'),
(2, 'pro_gbk', 'Gelora Bung Karno', '089389292771', 'Jalan kenangan diatas lembu', '09:00:00', '21:00:00', 0, 'futsal.png', '', 'Silakan isi keterangan tambahan yang dibutuhkan sebagai penunjang untuk member memahami.', 'pro_gbk');

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
(3, 'member@msn.com', 'member', '$argon2i$v=19$m=1024,t=2,p=2$RlNKTExKRnduQWxjZnBESA$3vhBjQyc0Sn4zw2593LnSgt7RyeM+XeEEblvhrpZXHs', 'member', '1', '2020-01-17 06:55:06'),
(4, 'member2@msn.com', 'member2', '$argon2i$v=19$m=1024,t=2,p=2$V004M0VQcmQyb2tKTG5ZVg$af9vJRxvmWpDoNFPI4DeshaMHNItn75BUh3C+hs4yzU', 'member', '1', '2020-01-17 10:03:53'),
(5, 'member3@msn.com', 'member3', '$argon2i$v=19$m=1024,t=2,p=2$OUtvd1ZJeWw5WC9UaHdXTQ$5HSyEp+8UTpCoMApCAgjG7Hw7pZHSkYTZQ7bHpV3JpU', 'member', '1', '2020-01-20 18:46:24'),
(2, 'campnou@msn.com', 'pro_campnou', '$argon2i$v=19$m=1024,t=2,p=2$WHpzZk02dDlGM3F1TWJOcg$bzTmglnqxGU7YmVZO9n5ZbtZvvT0JqwfbcFyhp2bM5A', 'provider', '1', '2020-01-17 06:39:05'),
(6, 'gbk@msn.com', 'pro_gbk', '$argon2i$v=19$m=1024,t=2,p=2$SjF1Uy8vL3ZyMnNGR3Q5Tw$9vQaNkmwkvDJuZ+OAcMlYVijQWg0jvUtb98E7TLrq6Q', 'provider', '1', '2020-01-20 19:07:07'),
(1, 'superadmin@msn.com', 'superadmin', '$argon2i$v=19$m=1024,t=2,p=2$UWhEcW5GaHlwUXdpTFpDdQ$wt+SjHHZMRVoQ/nGMjewkgFMr+W11ssQaStiEEYigb0', 'superadmin', '1', '2020-01-16 23:55:01');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_provider`
--
ALTER TABLE `tb_provider`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
