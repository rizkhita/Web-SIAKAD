-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2018 pada 14.55
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `anggota_kelas`
--

CREATE TABLE `anggota_kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `NISN` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota_kelas`
--

INSERT INTO `anggota_kelas` (`id`, `kode_kelas`, `NISN`) VALUES
(3, '7A', '140');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absensi`
--

CREATE TABLE `data_absensi` (
  `id` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `tgl1` date DEFAULT NULL,
  `status1` enum('hadir','izin','sakit','alfa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_absensi`
--

INSERT INTO `data_absensi` (`id`, `NISN`, `tgl1`, `status1`) VALUES
(1, '123', NULL, NULL),
(2, '131', NULL, NULL),
(3, '117', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
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
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`id`, `NIP`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `nohp`) VALUES
(8, '111', 'tes', 'bandung', '2018-05-14', 'laki-laki', 'tes', '123'),
(11, '1234', 'Desna', 'a', '2018-05-10', 'perempuan', 'a', 'a'),
(10, '222', 'hmm', 'hmm', '2018-05-05', 'perempuan', 'fkjds', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `NIP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kelas`
--

INSERT INTO `data_kelas` (`id`, `kode_kelas`, `NIP`) VALUES
(3, '7A', '222'),
(2, '8A', '111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mapel`
--

CREATE TABLE `data_mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(5) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nilai`
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
-- Dumping data untuk tabel `data_nilai`
--

INSERT INTO `data_nilai` (`id`, `NISN`, `kode_mapel`, `nilai_uts`, `nilai_uas`, `nilai_ulha`, `nilai_tugas`, `nilai_akhir`) VALUES
(3, '100', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '100', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ortu`
--

CREATE TABLE `data_ortu` (
  `id` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_ortu`
--

INSERT INTO `data_ortu` (`id`, `NISN`, `nama_ortu`, `alamat`, `nohp`) VALUES
(1, '140', 'Dia', 'Bandung', '0006'),
(3, '152', 'Aku', 'Dimana', '088880');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengumuman`
--

CREATE TABLE `data_pengumuman` (
  `id` int(11) NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pengumuman`
--

INSERT INTO `data_pengumuman` (`id`, `tgl_pengumuman`, `isi`) VALUES
(1, '2018-05-14', 'Duh pingin libur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
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
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `NISN`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `nama_ayah`, `nama_ibu`) VALUES
(7, '100', 'h', 'h', '2018-05-08', 'perempuan', 'h', 'h', 'h'),
(10, '117', 'Noni Wulandari', 'indragiri hulu', '2018-05-16', 'perempuan', 'a', 'aa', 'a'),
(8, '123', 'sayang', 'semuanya', '2018-05-30', 'perempuan', 'dimana', 'luipa', 'manatau'),
(9, '131', 'rahma', 'bandng', '2018-05-15', 'perempuan', 'gatau', 'gatau', 'gatau'),
(4, '140', 'siapa', 'dimana', '2018-05-14', 'laki-laki', 'oke', 'gatau', 'gatau'),
(2, '152', 'jajang', 'bandung', '2018-05-14', 'perempuan', 'Apa', 'NAnya', 'nanya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_admin`
--

CREATE TABLE `login_admin` (
  `id_admin` int(11) NOT NULL,
  `NIP` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login_admin`
--

INSERT INTO `login_admin` (`id_admin`, `NIP`, `password`, `level`) VALUES
(1, 'kiki', '123', 'admin'),
(3, '1157050117', 'noni', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_guru`
--

CREATE TABLE `login_guru` (
  `id_guru` int(11) NOT NULL,
  `NIP` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login_guru`
--

INSERT INTO `login_guru` (`id_guru`, `NIP`, `password`, `level`) VALUES
(2, '222', 'isme', 'guru'),
(6, '111', 'asdf', 'guru'),
(7, '1234', 'aaaa', 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_ortu`
--

CREATE TABLE `login_ortu` (
  `id_ortu` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login_ortu`
--

INSERT INTO `login_ortu` (`id_ortu`, `NISN`, `password`, `level`) VALUES
(1, '152', 'okeey', 'ortu'),
(2, '140', 'ouch', 'ortu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_siswa`
--

CREATE TABLE `login_siswa` (
  `id_siswa` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login_siswa`
--

INSERT INTO `login_siswa` (`id_siswa`, `NISN`, `password`, `level`) VALUES
(1, '117', 'Noni Wulan', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_izin`
--

CREATE TABLE `surat_izin` (
  `id` int(11) NOT NULL,
  `NISN` varchar(15) NOT NULL,
  `NIP` varchar(15) NOT NULL,
  `isi_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD KEY `id` (`id`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `NISN` (`NISN`);

--
-- Indeks untuk tabel `data_absensi`
--
ALTER TABLE `data_absensi`
  ADD KEY `id` (`id`),
  ADD KEY `NISN` (`NISN`);

--
-- Indeks untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD KEY `id` (`id`),
  ADD KEY `NIP` (`NIP`);

--
-- Indeks untuk tabel `data_mapel`
--
ALTER TABLE `data_mapel`
  ADD PRIMARY KEY (`kode_mapel`),
  ADD KEY `id` (`id`),
  ADD KEY `NIP` (`kode_kelas`);

--
-- Indeks untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD KEY `id` (`id`),
  ADD KEY `NISN` (`NISN`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indeks untuk tabel `data_ortu`
--
ALTER TABLE `data_ortu`
  ADD KEY `id` (`id`),
  ADD KEY `NISN` (`NISN`);

--
-- Indeks untuk tabel `data_pengumuman`
--
ALTER TABLE `data_pengumuman`
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`NISN`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `login_admin`
--
ALTER TABLE `login_admin`
  ADD KEY `id` (`id_admin`),
  ADD KEY `NIP` (`NIP`);

--
-- Indeks untuk tabel `login_guru`
--
ALTER TABLE `login_guru`
  ADD KEY `id` (`id_guru`),
  ADD KEY `NIP` (`NIP`);

--
-- Indeks untuk tabel `login_ortu`
--
ALTER TABLE `login_ortu`
  ADD KEY `id` (`id_ortu`),
  ADD KEY `NISN` (`NISN`);

--
-- Indeks untuk tabel `login_siswa`
--
ALTER TABLE `login_siswa`
  ADD KEY `id` (`id_siswa`),
  ADD KEY `NISN` (`NISN`);

--
-- Indeks untuk tabel `surat_izin`
--
ALTER TABLE `surat_izin`
  ADD KEY `id` (`id`),
  ADD KEY `NISN` (`NISN`),
  ADD KEY `NIP` (`NIP`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_absensi`
--
ALTER TABLE `data_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_mapel`
--
ALTER TABLE `data_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_ortu`
--
ALTER TABLE `data_ortu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_pengumuman`
--
ALTER TABLE `data_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `login_guru`
--
ALTER TABLE `login_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `login_ortu`
--
ALTER TABLE `login_ortu`
  MODIFY `id_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `login_siswa`
--
ALTER TABLE `login_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat_izin`
--
ALTER TABLE `surat_izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD CONSTRAINT `anggota_kelas_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`),
  ADD CONSTRAINT `anggota_kelas_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `data_kelas` (`kode_kelas`);

--
-- Ketidakleluasaan untuk tabel `data_absensi`
--
ALTER TABLE `data_absensi`
  ADD CONSTRAINT `data_absensi_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD CONSTRAINT `data_kelas_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_guru` (`NIP`);

--
-- Ketidakleluasaan untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD CONSTRAINT `data_nilai_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`),
  ADD CONSTRAINT `data_nilai_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `data_mapel` (`kode_mapel`);

--
-- Ketidakleluasaan untuk tabel `data_ortu`
--
ALTER TABLE `data_ortu`
  ADD CONSTRAINT `data_ortu_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `login_guru`
--
ALTER TABLE `login_guru`
  ADD CONSTRAINT `login_guru_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_guru` (`NIP`);

--
-- Ketidakleluasaan untuk tabel `login_ortu`
--
ALTER TABLE `login_ortu`
  ADD CONSTRAINT `login_ortu_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_ortu` (`NISN`);

--
-- Ketidakleluasaan untuk tabel `login_siswa`
--
ALTER TABLE `login_siswa`
  ADD CONSTRAINT `login_siswa_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_siswa` (`NISN`);

--
-- Ketidakleluasaan untuk tabel `surat_izin`
--
ALTER TABLE `surat_izin`
  ADD CONSTRAINT `surat_izin_ibfk_1` FOREIGN KEY (`NISN`) REFERENCES `data_ortu` (`NISN`),
  ADD CONSTRAINT `surat_izin_ibfk_2` FOREIGN KEY (`NIP`) REFERENCES `data_guru` (`NIP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
