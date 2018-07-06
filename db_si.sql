-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2018 pada 12.17
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_si`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` varchar(11) NOT NULL,
  `generatednum` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `foto`, `keterangan`, `tanggal`, `active`, `generatednum`) VALUES
(23, 'Agung Wicaksono', 'agungwicaksono1412@gmail.com', 'agungwcksn', '01e1c180d8c73505cc28631b61712ccf', 'Administrator', NULL, NULL, '2018-07-04 09:17:22', '1', '115eab11099226dd72444533'),
(24, 'James Bond', 'agungwicaksono1212@gmail.com', 'jamesbond', '01e1c180d8c73505cc28631b61712ccf', 'Karyawan', NULL, NULL, '2018-07-04 09:19:00', '1', 'a5162f033dcea3483de67f5d'),
(25, 'Billy Joe', 'agung_wicaksono@outlook.co.id', 'billyjoe', '01e1c180d8c73505cc28631b61712ccf', 'Manager', NULL, NULL, '2018-07-04 09:19:04', '1', 'b370d1f3bdb2205e3d06300e');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
