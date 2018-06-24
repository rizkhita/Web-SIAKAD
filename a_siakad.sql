-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 05:26 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kelas`
--

CREATE TABLE `anggota_kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `NISN` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_kelas`
--

INSERT INTO `anggota_kelas` (`id`, `kode_kelas`, `NISN`) VALUES
(3, '7A', '140'),
(5, '7A', '115');

-- --------------------------------------------------------

--
-- Table structure for table `data_absensi`
--

CREATE TABLE `data_absensi` (
  `id` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `tgl1` date DEFAULT NULL,
  `status1` enum('hadir','izin','sakit','alfa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_absensi`
--

INSERT INTO `data_absensi` (`id`, `NISN`, `tgl1`, `status1`) VALUES
(1, '123', '2018-05-18', 'sakit'),
(2, '131', '2018-05-18', 'hadir'),
(3, '115', '2018-05-18', 'sakit'),
(4, '123', '2018-05-18', 'izin'),
(5, '123', '2018-05-18', 'sakit'),
(8, '115', '2018-05-18', 'sakit');

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `id` int(11) NOT NULL,
  `NIP` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('laki-laki','perempuan','','') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id`, `NIP`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `nohp`) VALUES
(8, '111', 'tes', 'bandung', '2018-05-14', 'laki-laki', 'tes', '123'),
(10, '222', 'hmm', 'hmm', '2018-05-05', 'perempuan', 'fkjds', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `NIP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id`, `kode_kelas`, `NIP`) VALUES
(3, '7A', '222'),
(2, '8A', '111');

-- --------------------------------------------------------

--
-- Table structure for table `data_mapel`
--

CREATE TABLE `data_mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(5) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mapel`
--

INSERT INTO `data_mapel` (`id`, `kode_mapel`, `nama_mapel`, `kode_kelas`) VALUES
(1, 'M02', 'Matematikan', '8A');

-- --------------------------------------------------------

--
-- Table structure for table `data_nilai`
--

CREATE TABLE `data_nilai` (
  `id` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `kode_mapel` varchar(5) DEFAULT NULL,
  `nilai_uts` int(2) DEFAULT NULL,
  `nilai_uas` int(2) DEFAULT NULL,
  `nilai_ulha` int(2) DEFAULT NULL,
  `nilai_tugas` int(2) DEFAULT NULL,
  `nilai_akhir` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_nilai`
--

INSERT INTO `data_nilai` (`id`, `NISN`, `kode_mapel`, `nilai_uts`, `nilai_uas`, `nilai_ulha`, `nilai_tugas`, `nilai_akhir`) VALUES
(7, '140', 'M02', 80, 80, 80, 80, 80);

-- --------------------------------------------------------

--
-- Table structure for table `data_ortu`
--

CREATE TABLE `data_ortu` (
  `id` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ortu`
--

INSERT INTO `data_ortu` (`id`, `NISN`, `nama_ortu`, `alamat`, `nohp`) VALUES
(1, '140', 'Dia', 'Bandung', '0006'),
(3, '152', 'Aku', 'Dimana', '088880');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengumuman`
--

CREATE TABLE `data_pengumuman` (
  `id` int(11) NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengumuman`
--

INSERT INTO `data_pengumuman` (`id`, `tgl_pengumuman`, `isi`) VALUES
(1, '2018-05-14', 'Duh pingin libur'),
(3, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('laki-laki','perempuan','','') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `NISN`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `nama_ayah`, `nama_ibu`) VALUES
(7, '100', 'h', 'h', '2018-05-08', 'perempuan', 'h', 'h', 'h'),
(10, '115', 'nikko', 'dimana', '2018-05-16', 'laki-laki', 'gatau', 'gatau', 'gatau'),
(8, '123', 'sayang', 'semuanya', '2018-05-30', 'perempuan', 'dimana', 'luipa', 'manatau'),
(9, '131', 'rahma', 'bandng', '2018-05-15', 'perempuan', 'gatau', 'gatau', 'gatau'),
(4, '140', 'siapa', 'dimana', '2018-05-14', 'laki-laki', 'oke', 'gatau', 'gatau'),
(2, '152', 'jajang', 'bandung', '2018-05-14', 'perempuan', 'Apa', 'NAnya', 'nanya');

-- --------------------------------------------------------

--
-- Table structure for table `info_sekolah`
--

CREATE TABLE `info_sekolah` (
  `id_info` int(11) NOT NULL,
  `gambar` int(11) NOT NULL,
  `info` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `tgl_info` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_sekolah`
--

INSERT INTO `info_sekolah` (`id_info`, `gambar`, `info`, `detail`, `tgl_info`) VALUES
(131, 221212, 'nadnadmmamadmmmdm', 'mcsmm,cm,cm,acm,cm,', '2018-05-01 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id_admin` int(11) NOT NULL,
  `NIP` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id_admin`, `NIP`, `password`, `level`) VALUES
(1, 'lalala', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `login_guru`
--

CREATE TABLE `login_guru` (
  `id_guru` int(11) NOT NULL,
  `NIP` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_guru`
--

INSERT INTO `login_guru` (`id_guru`, `NIP`, `password`, `level`) VALUES
(2, '222', 'isme', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `login_ortu`
--

CREATE TABLE `login_ortu` (
  `id_ortu` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_ortu`
--

INSERT INTO `login_ortu` (`id_ortu`, `NISN`, `password`, `level`) VALUES
(1, '152', 'okeey', 'ortu'),
(2, '140', 'ouch', 'ortu');

-- --------------------------------------------------------

--
-- Table structure for table `login_siswa`
--

CREATE TABLE `login_siswa` (
  `id_siswa` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_siswa`
--

INSERT INTO `login_siswa` (`id_siswa`, `NISN`, `password`, `level`) VALUES
(1, '140', 'apasih', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `surat_izin`
--

CREATE TABLE `surat_izin` (
  `id` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `NIP` varchar(15) NOT NULL,
  `tgl_surat` timestamp NULL DEFAULT NULL,
  `nama_surat` varchar(100) DEFAULT NULL,
  `isi_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_izin`
--

INSERT INTO `surat_izin` (`id`, `NISN`, `NIP`, `tgl_surat`, `nama_surat`, `isi_surat`) VALUES
(1, '140', '111', '2018-05-07 17:00:00', 'idzin', 'ajnakdnakdnkadnakdnakdna'),
(4, '152', '1234', '2018-05-15 17:00:00', 'idzin aja', 'saya ingin idzin'),
(5, '152', '1234', '2018-05-15 17:00:00', 'idzin aja', 'saya ingin idzin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD KEY `id` (`id`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `NISN` (`NISN`);

--
-- Indexes for table `data_absensi`
--
ALTER TABLE `data_absensi`
  ADD KEY `id` (`id`),
  ADD KEY `NISN` (`NISN`);

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD KEY `id` (`id`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `data_mapel`
--
ALTER TABLE `data_mapel`
  ADD PRIMARY KEY (`kode_mapel`),
  ADD KEY `id` (`id`),
  ADD KEY `NIP` (`kode_kelas`);

--
-- Indexes for table `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD KEY `id` (`id`),
  ADD KEY `NISN` (`NISN`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `data_ortu`
--
ALTER TABLE `data_ortu`
  ADD KEY `id` (`id`),
  ADD KEY `NISN` (`NISN`);

--
-- Indexes for table `data_pengumuman`
--
ALTER TABLE `data_pengumuman`
  ADD KEY `id` (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`NISN`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `info_sekolah`
--
ALTER TABLE `info_sekolah`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD KEY `id` (`id_admin`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `login_guru`
--
ALTER TABLE `login_guru`
  ADD KEY `id` (`id_guru`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `login_ortu`
--
ALTER TABLE `login_ortu`
  ADD KEY `id` (`id_ortu`),
  ADD KEY `NISN` (`NISN`);

--
-- Indexes for table `login_siswa`
--
ALTER TABLE `login_siswa`
  ADD KEY `id` (`id_siswa`),
  ADD KEY `NISN` (`NISN`);

--
-- Indexes for table `surat_izin`
--
ALTER TABLE `surat_izin`
  ADD KEY `id` (`id`),
  ADD KEY `NISN` (`NISN`),
  ADD KEY `NIP` (`NIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `data_absensi`
--
ALTER TABLE `data_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_mapel`
--
ALTER TABLE `data_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_nilai`
--
ALTER TABLE `data_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `data_ortu`
--
ALTER TABLE `data_ortu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_pengumuman`
--
ALTER TABLE `data_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_guru`
--
ALTER TABLE `login_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_ortu`
--
ALTER TABLE `login_ortu`
  MODIFY `id_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_siswa`
--
ALTER TABLE `login_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `surat_izin`
--
ALTER TABLE `surat_izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD CONSTRAINT `anggota_kelas_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`),
  ADD CONSTRAINT `anggota_kelas_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `data_kelas` (`kode_kelas`);

--
-- Constraints for table `data_absensi`
--
ALTER TABLE `data_absensi`
  ADD CONSTRAINT `data_absensi_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD CONSTRAINT `data_kelas_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_guru` (`NIP`);

--
-- Constraints for table `data_mapel`
--
ALTER TABLE `data_mapel`
  ADD CONSTRAINT `data_mapel_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `data_kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD CONSTRAINT `data_nilai_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`),
  ADD CONSTRAINT `data_nilai_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `data_mapel` (`kode_mapel`);

--
-- Constraints for table `data_ortu`
--
ALTER TABLE `data_ortu`
  ADD CONSTRAINT `data_ortu_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_guru`
--
ALTER TABLE `login_guru`
  ADD CONSTRAINT `login_guru_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_guru` (`NIP`);

--
-- Constraints for table `login_ortu`
--
ALTER TABLE `login_ortu`
  ADD CONSTRAINT `login_ortu_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_ortu` (`NISN`);

--
-- Constraints for table `login_siswa`
--
ALTER TABLE `login_siswa`
  ADD CONSTRAINT `login_siswa_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`);

--
-- Constraints for table `surat_izin`
--
ALTER TABLE `surat_izin`
  ADD CONSTRAINT `surat_izin_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
