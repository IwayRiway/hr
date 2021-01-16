-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2021 pada 03.43
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `dari` date NOT NULL,
  `sampai` date NOT NULL,
  `jumlah` int(2) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) DEFAULT NULL,
  `karyawan_id` int(11) NOT NULL,
  `atasan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id`, `tgl_pengajuan`, `dari`, `sampai`, `jumlah`, `keterangan`, `status`, `karyawan_id`, `atasan_id`) VALUES
(1, '2021-01-16', '2021-01-16', '2021-01-16', 1, 'Test Cuti', NULL, 6, 0),
(2, '2021-01-16', '2021-01-16', '2021-01-16', 1, 'test cuti dummy', 0, 4, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `department`
--

INSERT INTO `department` (`id`, `nama`) VALUES
(10, 'HRD'),
(1, 'IT'),
(9, 'root');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(3, 'Manager'),
(4, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `tgl_lahir`, `department_id`, `jabatan_id`, `email`, `username`, `password`) VALUES
(4, 'Staff IT', '2021-01-16', 1, 4, 'staff@staff.com', 'staff', '$2y$10$lTIPhScjPNgHySkB6SLchuTOPteiMBqF.La8osOf6i7q7VohIhKaC'),
(5, 'Manager IT', '2021-01-16', 1, 3, 'manager@manager.com', 'manager', '$2y$10$Q6495AmpNheE/3xqTG98vOJMeX8cD0xcvc0WiKoGBOqDQB4oGOT8W'),
(6, 'Root', '2021-01-16', 9, 3, 'root@root.com', 'root', '$2y$10$XnKihIGyZmsHsqxAp8icjOOaddYG5RYeXDlCfMXmT3UazlM/0K.Oy'),
(7, 'HRD', '2021-01-16', 10, NULL, 'hrd@hrd.com', 'hrd', '$2y$10$UUEkIkInLsqi9BQ6tYj5luAHkKOgIz6E31q.UvRq.J7Q5/h/7I3x6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_detail`
--

CREATE TABLE `karyawan_detail` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan_detail`
--

INSERT INTO `karyawan_detail` (`id`, `karyawan_id`, `nik`, `alamat`) VALUES
(3, 4, '123', 'Staff Bekasi'),
(4, 5, '456', 'Manager Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembur`
--

CREATE TABLE `lembur` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `atasan_id` int(11) NOT NULL,
  `tgl_lembur` date NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lembur`
--

INSERT INTO `lembur` (`id`, `karyawan_id`, `atasan_id`, `tgl_lembur`, `tgl_pengajuan`, `keterangan`, `status`) VALUES
(1, 4, 5, '2021-01-16', '2021-01-16', 'test lembur', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `keterangan` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `posisi`, `tgl_pengajuan`, `keterangan`, `department_id`, `karyawan_id`, `status`) VALUES
(1, 'Programmer', '2021-01-16', '<ul><li>Menguasi CI</li><li>Menguasi Laravel</li><li>Menguasai dummy</li></ul>', 1, 5, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `karyawan_detail`
--
ALTER TABLE `karyawan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `karyawan_detail`
--
ALTER TABLE `karyawan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
