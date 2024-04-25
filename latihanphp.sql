-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2024 pada 14.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihanphp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `no` int(5) NOT NULL,
  `gambar` text DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `kampus` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`no`, `gambar`, `nama`, `alamat`, `jenis_kelamin`, `agama`, `kampus`, `jurusan`) VALUES
(1, '1ENTJ.png', 'Nida Aulia Karima', 'Pemalang', 'Perempuan', 'Islam', 'Universitas Dian Nuswantoro Semarang ', 'Teknik Informatika'),
(2, '2INFJ.png', 'Kharafi Dwi Andika', 'Brebes', 'Laki-laki', 'Islam', 'Universitas Dian Nuswantoro Semarang', 'Teknik Informatika'),
(3, '3INTP.png', 'Avila Difa Adhiguna', 'Tangerang Selatan', 'Laki-laki', 'Islam', 'Amikom Yogyakarta', 'Sistem Informasi'),
(4, '4ISTP.png', 'Valentino Aldo', 'Semarang', 'Laki-laki', 'Islam', 'Universitas Dian Nuswantoro Semarang', 'Teknik Informatika'),
(5, '5ENTP.png', 'Ahmad Shodiqin', 'Pati', 'Laki-laki', 'Islam', 'Universitas Islam Sultan Agung Semarang', 'Teknik Informatika');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
