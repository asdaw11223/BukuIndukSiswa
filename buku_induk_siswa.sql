-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 09:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_induk_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_catatan`
--

CREATE TABLE `tb_catatan` (
  `id_catatan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `pkl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftarsiswakelas`
--

CREATE TABLE `tb_daftarsiswakelas` (
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahunajaran` varchar(255) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_krs`
--

CREATE TABLE `tb_krs` (
  `id_krs` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_matapelajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_matapelajaran`
--

CREATE TABLE `tb_matapelajaran` (
  `id_matapelajaran` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kurikulum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile_siswa`
--

CREATE TABLE `tb_profile_siswa` (
  `id_profile` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `NISN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rapor`
--

CREATE TABLE `tb_rapor` (
  `id_rapor` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_matapelajaran` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `semester` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `NISN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_catatan`
--
ALTER TABLE `tb_catatan`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_daftarsiswakelas`
--
ALTER TABLE `tb_daftarsiswakelas`
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_matapelajaran` (`id_matapelajaran`);

--
-- Indexes for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  ADD PRIMARY KEY (`id_matapelajaran`);

--
-- Indexes for table `tb_profile_siswa`
--
ALTER TABLE `tb_profile_siswa`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `Siswakeprofile` (`NISN`);

--
-- Indexes for table `tb_rapor`
--
ALTER TABLE `tb_rapor`
  ADD PRIMARY KEY (`id_rapor`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_matapelajaran` (`id_matapelajaran`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `NISN` (`NISN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_catatan`
--
ALTER TABLE `tb_catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_krs`
--
ALTER TABLE `tb_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  MODIFY `id_matapelajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_profile_siswa`
--
ALTER TABLE `tb_profile_siswa`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rapor`
--
ALTER TABLE `tb_rapor`
  MODIFY `id_rapor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_catatan`
--
ALTER TABLE `tb_catatan`
  ADD CONSTRAINT `tb_catatan_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_catatan_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_daftarsiswakelas`
--
ALTER TABLE `tb_daftarsiswakelas`
  ADD CONSTRAINT `tb_daftarsiswakelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_daftarsiswakelas_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD CONSTRAINT `tb_krs_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_krs_ibfk_2` FOREIGN KEY (`id_matapelajaran`) REFERENCES `tb_matapelajaran` (`id_matapelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_profile_siswa`
--
ALTER TABLE `tb_profile_siswa`
  ADD CONSTRAINT `Siswakeprofile` FOREIGN KEY (`NISN`) REFERENCES `tb_siswa` (`NISN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rapor`
--
ALTER TABLE `tb_rapor`
  ADD CONSTRAINT `tb_rapor_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rapor_ibfk_2` FOREIGN KEY (`id_matapelajaran`) REFERENCES `tb_matapelajaran` (`id_matapelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
