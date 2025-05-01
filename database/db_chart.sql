-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Bulan Mei 2025 pada 11.47
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cashflow_analysis`
--

CREATE TABLE `cashflow_analysis` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` enum('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') NOT NULL,
  `pemasukan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cashflow_analysis`
--

INSERT INTO `cashflow_analysis` (`id`, `tahun`, `bulan`, `pemasukan`, `pengeluaran`) VALUES
(1, '2024', 'Jan', 120, 80),
(2, '2024', 'Feb', 130, 95),
(3, '2024', 'Mar', 150, 100),
(4, '2024', 'Apr', 140, 90),
(5, '2024', 'Mei', 160, 120),
(6, '2024', 'Jun', 170, 110),
(7, '2024', 'Jul', 180, 150),
(8, '2024', 'Agu', 200, 160),
(9, '2024', 'Sep', 210, 180),
(10, '2024', 'Okt', 190, 170),
(11, '2024', 'Nov', 220, 190),
(12, '2024', 'Des', 250, 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `revenue_expenses`
--

CREATE TABLE `revenue_expenses` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` enum('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') NOT NULL,
  `revenue` int(11) NOT NULL,
  `expenses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `revenue_expenses`
--

INSERT INTO `revenue_expenses` (`id`, `tahun`, `bulan`, `revenue`, `expenses`) VALUES
(1, '2025', 'Jan', 150, 100),
(2, '2025', 'Feb', 160, 120),
(3, '2025', 'Mar', 180, 130),
(4, '2025', 'Apr', 200, 150),
(5, '2025', 'Mei', 220, 170),
(6, '2025', 'Jun', 250, 180),
(7, '2025', 'Jul', 230, 190),
(8, '2025', 'Agu', 240, 200),
(9, '2025', 'Sep', 260, 210),
(10, '2025', 'Okt', 270, 220),
(11, '2025', 'Nov', 290, 230),
(12, '2025', 'Des', 310, 250);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cashflow_analysis`
--
ALTER TABLE `cashflow_analysis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `revenue_expenses`
--
ALTER TABLE `revenue_expenses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cashflow_analysis`
--
ALTER TABLE `cashflow_analysis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `revenue_expenses`
--
ALTER TABLE `revenue_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
