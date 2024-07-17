-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2024 at 06:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `analisaLan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataKonsultasi`
--

CREATE TABLE `dataKonsultasi` (
  `idKonsultasi` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `kodeKerusakan` varchar(500) NOT NULL,
  `namaKerusakan` varchar(500) NOT NULL,
  `gejala` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataKonsultasi`
--

INSERT INTO `dataKonsultasi` (`idKonsultasi`, `idUser`, `username`, `kodeKerusakan`, `namaKerusakan`, `gejala`) VALUES
(5, 29, 'jejow', 'K009', 'Kerusakan Pada Switch', 'Swich Port error');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kodeGejala` varchar(500) NOT NULL,
  `namaGejala` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kodeGejala`, `namaGejala`) VALUES
('G001', 'Lampu indikator power Hub/Switch mati'),
('G002', 'Lampu indikator workstation yang tidak menyala'),
('G003', 'Network wireless adapter yang tidak\r\nterpasang dengan baik'),
('G004', 'Driver dari network wireless adapter yang mungkin tidak terinstall dengan baik'),
('G005', 'Konektor LAN yang mungkin tidak\r\nterpasang dengan sempurna'),
('G006', 'Driver belum terinstal'),
('G007', 'Kartu jaringan rusak'),
('G008', 'Kabel yang terjepit'),
('G009', 'Kesalahan pada saat menyusun\r\nkabel'),
('G010', 'Kondisi kabel yang sudah tidak baik\r\nkualitasnya'),
('G011', 'Kabel yang digigit oleh hewan\r\npengerat'),
('G012', 'kesibukan pada server'),
('G013', 'kondisi komputer server yang sedang tidak baik seperti bad sector, ataupun diserang oleh virus-virus.'),
('G014', 'kegagalan switch pada komputer'),
('G015', 'Pemakaian bandwidth sudah penuh'),
('G016', 'Firewall dalam keadaan hidup'),
('G017', 'Sinyal Koneksi internet Rendah'),
('G018', 'Wifi tidak memakai DHCP ataupun\r\nIP secara otomatis.'),
('G019', 'Loading page lelet dikala browsing'),
('G020', 'Hotspot tidak menggunakan DHCP atau IP secara otomatis.'),
('G021', 'Simbol Wifi bertanda seru kuning'),
('G022', 'Swich Port Error');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `kodeKerusakan` varchar(500) NOT NULL,
  `namaKerusakan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`kodeKerusakan`, `namaKerusakan`) VALUES
('K001', 'Kerusakan pada HUB dan Switch'),
('K002', 'Local area connection yang tidak muncul'),
('K003', 'Icon LAN yang tidak berkedip'),
('K004', 'Kabel dan Konektor Jaringan'),
('K005', 'Kegagalan Server'),
('K006', 'RTO (Request Time Out)'),
('K007', 'Kegagalan Piranti Jaringan'),
('K008', 'Internet Limited Acces'),
('K009', 'Kerusakan Pada Switch');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `idRule` int(11) NOT NULL,
  `kodeKerusakan` varchar(500) NOT NULL,
  `kodeGejala` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`idRule`, `kodeKerusakan`, `kodeGejala`) VALUES
(1, 'K001', 'G001'),
(2, 'K001', 'G002'),
(3, 'K002', 'G003'),
(4, 'K002', 'G004'),
(5, 'K003', 'G005'),
(6, 'K003', 'G006'),
(7, 'K003', 'G007'),
(8, 'K004', 'G004'),
(9, 'K004', 'G008'),
(10, 'K004', 'G009'),
(11, 'K004', 'G010'),
(12, 'K004', 'G011'),
(13, 'K005', 'G007'),
(14, 'K005', 'G012'),
(15, 'K005', 'G013'),
(16, 'K005', 'G014'),
(17, 'K006', 'G015'),
(18, 'K006', 'G016'),
(19, 'K006', 'G017'),
(20, 'K007', 'G007'),
(21, 'K007', 'G018'),
(22, 'K008', 'G003'),
(23, 'K008', 'G015'),
(24, 'K008', 'G019'),
(25, 'K008', 'G020'),
(26, 'K008', 'G021'),
(35, 'K009', 'G022');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `idSolusi` int(11) NOT NULL,
  `kodeKerusakan` varchar(500) NOT NULL,
  `solusi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`idSolusi`, `kodeKerusakan`, `solusi`) VALUES
(1, 'K001', 'Mengganti dengan yang baru. Namun, apabila hub atau SWITCH anda masih masuk ke dalam\r\nmasa garansi, anda bisa melakukan\r\nproses klaim garansi'),
(2, 'K002', 'melakukan pembetulan dari proses\r\npemasangan network wireless adapter, ataupun melakukan penginstalan ulang pada driver adapter network tersebut, agar LAN dan juga local area connection bisa dijalankan dengan benar.'),
(3, 'K003', 'caranya mencoba untuk mencabut dan memasang kembali konektor LAN anda dan juga melakukan pengecekan terhadap perangkat keras seperti hub dan juga switch.'),
(4, 'K004', 'mengganti kabel yang\r\nmegalami kerusakan, sehingga bisa\r\nbekerja dengan lebih optimal lagi'),
(5, 'K005', 'bisa mematikan jaringan terlebih dahulu, lalu melakukan pengecekan terhadap server anda. Bersihkan server anda dari malware dan program lainnya yang mencurigakan, atau bisa juga merestar koneksi dan juga server anda.'),
(6, 'K006', 'Memperhatikan setiap penggunaan bandwidth secara rutin dan Matikan Windows Firewall dan Pastikan tidak terlalu jauh jarak\r\nanda menggunakan jaringan, letakan router di dalam ruangan hal ini dapat meminimalisir jarak dari router untuk membagi jaringan dengan pengguna lain.'),
(7, 'K007', 'Dengan cara mengganti dengan\r\nnetwork card yang baru atau dalam\r\nkeadaan baik.'),
(13, 'K008', 'Dengan cara melakukan reset pada TCP/IP Jika Hotspot tidak menggunakan DHCP atau IP secara otomatis, Loading page lambat saat browsing, Terlalu banyak Pengguna caranya dengan masuk ke cmd administrator pada cmd ketik perintah netsh int ip reset c: esetlog.txt lalu restart laptop/pc dan lakukan pembersihan pada cache pada browser yang digunakan, kurangi kegiatan download file yang melebihi batas dan hindari pengguna jaringan yang melebihi batas, dan lakukan secara berkala penggantian password jaringan yang anda gunakan dan jika kabel tidak terpasang dengan baik/rusak coba lakukan pengecekan kebel menggunakan LAN tester dan jika simbol wifi tanda seru kuning coba lakukan reset modem atau Router, Instal ulang driver wifi, cek hardware wifi card apakah masih berfungsi atau tidak.'),
(16, 'K009', 'Ganti port');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `role`) VALUES
(27, 'ballee', '$2y$10$oFT5VZ7hha9NunSw5ZuIkuuPcFHEJ2LiYFSWK3UK0uPLwtdqDnVV.', 'user'),
(28, 'admin gue', '$2y$10$FXGB6./1EY.OK6ptM4oQuOqEQ5.uPSQVDpmMLDCIcnPCss1spoVQ.', 'admin'),
(29, 'jejow', '$2y$10$Z8N2z1T4H6wyfNExGBJdo.xS6Hh7IQmrT/MpyRtlyup7r5FIG8IaS', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataKonsultasi`
--
ALTER TABLE `dataKonsultasi`
  ADD PRIMARY KEY (`idKonsultasi`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kodeGejala`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`kodeKerusakan`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`idRule`),
  ADD KEY `kodeKerusakan` (`kodeKerusakan`),
  ADD KEY `kodeGejala` (`kodeGejala`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`idSolusi`),
  ADD KEY `kodeKerusakan` (`kodeKerusakan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataKonsultasi`
--
ALTER TABLE `dataKonsultasi`
  MODIFY `idKonsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `idRule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `idSolusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dataKonsultasi`
--
ALTER TABLE `dataKonsultasi`
  ADD CONSTRAINT `dataKonsultasi_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Constraints for table `rule`
--
ALTER TABLE `rule`
  ADD CONSTRAINT `rule_ibfk_1` FOREIGN KEY (`kodeKerusakan`) REFERENCES `kerusakan` (`kodeKerusakan`),
  ADD CONSTRAINT `rule_ibfk_2` FOREIGN KEY (`kodeGejala`) REFERENCES `gejala` (`kodeGejala`);

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_ibfk_1` FOREIGN KEY (`kodeKerusakan`) REFERENCES `kerusakan` (`kodeKerusakan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
