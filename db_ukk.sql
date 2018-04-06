-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2018 at 09:38 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL,
  `id_pegawai_pengirim` int(11) NOT NULL,
  `id_pegawai_penerima` int(11) NOT NULL,
  `tgl_disposisi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `id_surat_masuk`, `id_pegawai_pengirim`, `id_pegawai_penerima`, `tgl_disposisi`, `keterangan`) VALUES
(13, 1, 1, 2, '2018-02-15 00:24:52', 'Pak, ada surat'),
(14, 1, 2, 3, '2018-02-15 00:25:01', 'tolong pak'),
(15, 1, 3, 4, '2018-02-15 00:25:13', 'mohon ditindak'),
(16, 8, 1, 2, '2018-02-15 01:06:04', 'ada surat'),
(17, 8, 2, 3, '2018-02-15 01:06:54', 'surat'),
(18, 9, 1, 2, '2018-02-15 02:30:43', 'aaa'),
(20, 1, 2, 4, '2018-02-15 04:00:23', '2352323'),
(21, 9, 1, 4, '2018-02-15 04:02:21', 'fywehgfwe');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `level`) VALUES
(1, 'Admin', 0),
(2, 'Manager Marketing', 1),
(3, 'Supervisor', 2),
(4, 'Pegawai', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `nip` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `password`, `id_jabatan`) VALUES
(1, 'Si Admin', 123, '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Saya Manajer', 111, '21232f297a57a5a743894a0e4a801fc3', 2),
(3, 'Saya Supervisor', 222, '21232f297a57a5a743894a0e4a801fc3', 3),
(4, 'Saya Pegawai', 333, '21232f297a57a5a743894a0e4a801fc3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `file_surat` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `nomor_surat`, `tgl_kirim`, `penerima`, `perihal`, `file_surat`, `status`) VALUES
(1, 'nomor/01', '2018-02-13', 'SMK Telkom', 'Reply prakerin', 'UPLOAD_FILE_CI2.pdf', 0),
(2, 'NMR/01011', '2018-02-15', 'SMK Telkom', 'Pengajuan recruitment', 'UPLOAD_FILE_CI.pdf', 0),
(3, 'januari', '2018-01-31', 'januari', 'januari', 'UPLOAD_FILE_CI1.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `file_surat` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `nomor_surat`, `tgl_kirim`, `tgl_terima`, `pengirim`, `perihal`, `file_surat`, `status`) VALUES
(1, 'SMKTELKOM/01', '2018-02-01', '2018-02-02', 'SMK TELKOM MALANG', 'Kerja sama prakerin', 'PAGINATION1.pdf', '1'),
(8, 'PJM/0001', '2018-02-01', '2018-02-15', 'PT. JAYA MAKMUR', 'Kerja sama', 'SELECT_DATA_SISWA_PSB1.pdf', '1'),
(9, 'aaa', '2018-02-14', '2018-02-15', 'aaa', 'aaa', 'VALIDASI_FORM_CODEIGNITER.pdf', '0'),
(10, 'januari', '2018-01-02', '2018-01-03', 'januari', 'januari', 'INSERT_DATA_CODEIGNITER1.pdf', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_surat_masuk` (`id_surat_masuk`),
  ADD KEY `id_pegawai_penerima` (`id_pegawai_penerima`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_surat_masuk`) REFERENCES `surat_masuk` (`id_surat_masuk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`id_pegawai_penerima`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
