-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 02:42 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `db_spprizky`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
    `id_kelas` int(11) NOT NULL,
    `nama_kelas` varchar(10) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
    `id_pembayaran` int(11) NOT NULL,
    `id_petugas` int(11) NOT NULL,
    `nisn` varchar(11) NOT NULL,
    `tgl_bayar` date NOT NULL,
    `transfer_bank` varchar(25) NOT NULL,
    `jenis_pembayaran` varchar(25) NOT NULL,
    `jumlah_bayar` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `pembayaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
    `id_petugas` int(11) NOT NULL,
    `username` varchar(25) NOT NULL,
    `password` varchar(32) NOT NULL,
    `nama_petugas` varchar(35) NOT NULL,
    `level` enum(
        'admin',
        'wali siswa',
        'siswa'
    ) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO
    `petugas` (
        `id_petugas`,
        `username`,
        `password`,
        `nama_petugas`,
        `level`
    )
VALUES (
        1,
        'April',
        'admin',
        'admin',
        'admin'
    ),
    (
        2,
        'Suharti',
        'walisiswa',
        'walisiswa',
        'wali siswa'
    ),
    (
        3,
        'Aditya',
        'siswa',
        'siswa',
        'siswa'
    );

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
    `nisn` varchar(11) NOT NULL,
    `nis` varchar(11) NOT NULL,
    `nama` varchar(35) NOT NULL,
    `nama_kelas` varchar(10) NOT NULL,
    `alamat` text NOT NULL,
    `no_telp` varchar(13) NOT NULL,
    `jenis_pembayaran` varchar(25) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
    `id_spp` int(11) NOT NULL,
    `jenis_pembayaran` varchar(20) NOT NULL,
    `tahun` date NOT NULL,
    `nominal` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas` ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
ADD PRIMARY KEY (`id_pembayaran`),
ADD KEY `id_petugas` (`id_petugas`),
ADD KEY `nisn` (`nisn`),
ADD KEY `jenis_pembayaran` (`jenis_pembayaran`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas` ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
ADD PRIMARY KEY (`nisn`),
ADD KEY `nama_kelas` (`nama_kelas`),
ADD KEY `jenis_pembayaran` (`jenis_pembayaran`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp` ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 9;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

--
-- Constraints for dumped tables
--

--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;