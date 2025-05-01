-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Bulan Mei 2025 pada 14.44
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
-- Struktur dari tabel `audit_compliance`
--

CREATE TABLE `audit_compliance` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` enum('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') NOT NULL,
  `audit_dilakukan` int(11) NOT NULL,
  `tingkat_kepatuhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `audit_compliance`
--

INSERT INTO `audit_compliance` (`id`, `tahun`, `bulan`, `audit_dilakukan`, `tingkat_kepatuhan`) VALUES
(1, '2025', 'Jan', 5, 90),
(2, '2025', 'Feb', 4, 85),
(3, '2025', 'Mar', 6, 92),
(4, '2025', 'Apr', 3, 88),
(5, '2025', 'Mei', 7, 94),
(6, '2025', 'Jun', 5, 91),
(7, '2025', 'Jul', 6, 89),
(8, '2025', 'Agu', 4, 87),
(9, '2025', 'Sep', 6, 93),
(10, '2025', 'Okt', 5, 90),
(11, '2025', 'Nov', 7, 95),
(12, '2025', 'Des', 4, 88);

-- --------------------------------------------------------

--
-- Struktur dari tabel `budget_actual`
--

CREATE TABLE `budget_actual` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` enum('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') NOT NULL,
  `budget` int(11) NOT NULL,
  `actual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `budget_actual`
--

INSERT INTO `budget_actual` (`id`, `tahun`, `bulan`, `budget`, `actual`) VALUES
(1, '2025', 'Jan', 200, 180),
(2, '2025', 'Feb', 220, 210),
(3, '2025', 'Mar', 240, 230),
(4, '2025', 'Apr', 260, 250),
(5, '2025', 'Mei', 280, 270),
(6, '2025', 'Jun', 300, 290),
(7, '2025', 'Jul', 320, 310),
(8, '2025', 'Agu', 340, 330),
(9, '2025', 'Sep', 360, 350),
(10, '2025', 'Okt', 380, 370),
(11, '2025', 'Nov', 400, 390),
(12, '2025', 'Des', 420, 410);

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
-- Struktur dari tabel `cost_savings`
--

CREATE TABLE `cost_savings` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `cost_saving` int(11) DEFAULT NULL,
  `total_spend` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cost_savings`
--

INSERT INTO `cost_savings` (`id`, `bulan`, `tahun`, `cost_saving`, `total_spend`) VALUES
(1, 'Jan', 2024, 5000, 15000),
(2, 'Feb', 2024, 6200, 14000),
(3, 'Mar', 2024, 7000, 15500),
(4, 'Apr', 2024, 6800, 16000),
(5, 'Mei', 2024, 7200, 15800),
(6, 'Jun', 2024, 7500, 16500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_conversion`
--

CREATE TABLE `customer_conversion` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` enum('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') NOT NULL,
  `conversion_rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer_conversion`
--

INSERT INTO `customer_conversion` (`id`, `tahun`, `bulan`, `conversion_rate`) VALUES
(26, '2024', 'Feb', 2.5),
(27, '2024', 'Mar', 2.8),
(28, '2024', 'Apr', 3),
(29, '2024', 'Mei', 3.2),
(30, '2024', 'Jun', 3.5),
(31, '2024', 'Jul', 3.7),
(32, '2024', 'Agu', 3.9),
(33, '2024', 'Sep', 4.1),
(34, '2024', 'Okt', 4.3),
(35, '2024', 'Nov', 4.5),
(36, '2024', 'Des', 4.7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery_performance`
--

CREATE TABLE `delivery_performance` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `late` int(11) DEFAULT NULL,
  `pending` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `delivery_performance`
--

INSERT INTO `delivery_performance` (`id`, `bulan`, `tahun`, `on_time`, `late`, `pending`) VALUES
(1, 'Jan', 2024, 80, 10, 5),
(2, 'Feb', 2024, 85, 8, 4),
(3, 'Mar', 2024, 78, 12, 6),
(4, 'Apr', 2024, 90, 7, 3),
(5, 'Mei', 2024, 88, 9, 2),
(6, 'Jun', 2024, 92, 6, 2),
(7, 'Jul', 2024, 89, 7, 3),
(8, 'Agu', 2024, 86, 9, 2),
(9, 'Sep', 2024, 87, 8, 3),
(10, 'Okt', 2024, 90, 7, 2),
(11, 'Nov', 2024, 91, 6, 2),
(12, 'Des', 2024, 93, 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `demand_forecasting`
--

CREATE TABLE `demand_forecasting` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `actual_demand` int(11) DEFAULT NULL,
  `forecasted_demand` int(11) DEFAULT NULL,
  `planned_production` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `demand_forecasting`
--

INSERT INTO `demand_forecasting` (`id`, `bulan`, `tahun`, `actual_demand`, `forecasted_demand`, `planned_production`) VALUES
(1, 'Jan', 2024, 1000, 1020, 1050),
(2, 'Feb', 2024, 1150, 1120, 1100),
(3, 'Mar', 2024, 980, 1000, 990),
(4, 'Apr', 2024, 1300, 1270, 1250),
(5, 'Mei', 2024, 1250, 1220, 1230),
(6, 'Jun', 2024, 1280, 1300, 1290),
(7, 'Jul', 2024, 1200, 1220, 1250),
(8, 'Agu', 2024, 1100, 1150, 1130),
(9, 'Sep', 2024, 1050, 1070, 1080),
(10, 'Okt', 2024, 1180, 1170, 1190),
(11, 'Nov', 2024, 1120, 1100, 1110),
(12, 'Des', 2024, 1250, 1240, 1260);

-- --------------------------------------------------------

--
-- Struktur dari tabel `downtime_maintenance`
--

CREATE TABLE `downtime_maintenance` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `downtime_jam` int(11) DEFAULT NULL,
  `jumlah_maintenance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `downtime_maintenance`
--

INSERT INTO `downtime_maintenance` (`id`, `bulan`, `tahun`, `downtime_jam`, `jumlah_maintenance`) VALUES
(1, 'Jan', 2024, 10, 2),
(2, 'Feb', 2024, 12, 3),
(3, 'Mar', 2024, 8, 1),
(4, 'Apr', 2024, 14, 4),
(5, 'Mei', 2024, 11, 2),
(6, 'Jun', 2024, 9, 3),
(7, 'Jul', 2024, 7, 2),
(8, 'Agu', 2024, 13, 5),
(9, 'Sep', 2024, 10, 3),
(10, 'Okt', 2024, 15, 2),
(11, 'Nov', 2024, 9, 4),
(12, 'Des', 2024, 8, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `expense_breakdown`
--

CREATE TABLE `expense_breakdown` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `expense_breakdown`
--

INSERT INTO `expense_breakdown` (`id`, `tahun`, `kategori`, `jumlah`) VALUES
(1, '2024', 'Gaji Karyawan', 250),
(2, '2024', 'Operasional', 150),
(3, '2024', 'Pemasaran', 100),
(4, '2024', 'Transportasi', 80),
(5, '2024', 'Lain-lain', 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `financial_data`
--

CREATE TABLE `financial_data` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` enum('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') NOT NULL,
  `accounts_receivable` int(11) NOT NULL,
  `accounts_payable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `financial_data`
--

INSERT INTO `financial_data` (`id`, `tahun`, `bulan`, `accounts_receivable`, `accounts_payable`) VALUES
(1, '2025', 'Jan', 150, 100),
(2, '2025', 'Feb', 160, 110),
(3, '2025', 'Mar', 170, 120),
(4, '2025', 'Apr', 180, 130),
(5, '2025', 'Mei', 190, 140),
(6, '2025', 'Jun', 200, 150),
(7, '2025', 'Jul', 210, 160),
(8, '2025', 'Agu', 220, 170),
(9, '2025', 'Sep', 230, 180),
(10, '2025', 'Okt', 240, 190),
(11, '2025', 'Nov', 250, 200),
(12, '2025', 'Des', 260, 210);

-- --------------------------------------------------------

--
-- Struktur dari tabel `financial_forecast`
--

CREATE TABLE `financial_forecast` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` enum('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') NOT NULL,
  `revenue` int(11) NOT NULL,
  `expenses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `financial_forecast`
--

INSERT INTO `financial_forecast` (`id`, `tahun`, `bulan`, `revenue`, `expenses`) VALUES
(1, '2024', 'Jan', 200, 150),
(2, '2024', 'Feb', 220, 160),
(3, '2024', 'Mar', 230, 170),
(4, '2024', 'Apr', 250, 180),
(5, '2024', 'Mei', 260, 190),
(6, '2024', 'Jun', 270, 200),
(7, '2024', 'Jul', 280, 210),
(8, '2024', 'Agu', 290, 220),
(9, '2024', 'Sep', 300, 230),
(10, '2024', 'Okt', 310, 240),
(11, '2024', 'Nov', 320, 250),
(12, '2024', 'Des', 330, 260);

-- --------------------------------------------------------

--
-- Struktur dari tabel `freight_costs`
--

CREATE TABLE `freight_costs` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `biaya_pengiriman` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `freight_costs`
--

INSERT INTO `freight_costs` (`id`, `bulan`, `tahun`, `biaya_pengiriman`) VALUES
(1, 'Jan', 2024, 45),
(2, 'Feb', 2024, 50),
(3, 'Mar', 2024, 48),
(4, 'Apr', 2024, 52),
(5, 'Mei', 2024, 55),
(6, 'Jun', 2024, 60),
(7, 'Jul', 2024, 58),
(8, 'Agu', 2024, 54),
(9, 'Sep', 2024, 56),
(10, 'Okt', 2024, 59),
(11, 'Nov', 2024, 57),
(12, 'Des', 2024, 61);

-- --------------------------------------------------------

--
-- Struktur dari tabel `general_ledger`
--

CREATE TABLE `general_ledger` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` enum('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') NOT NULL,
  `revenue` int(11) NOT NULL,
  `expenses` int(11) NOT NULL,
  `assets` int(11) NOT NULL,
  `liabilities` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `general_ledger`
--

INSERT INTO `general_ledger` (`id`, `tahun`, `bulan`, `revenue`, `expenses`, `assets`, `liabilities`) VALUES
(1, '2024', 'Jan', 200, 150, 500, 300),
(2, '2024', 'Feb', 210, 160, 520, 310),
(3, '2024', 'Mar', 220, 170, 540, 320),
(4, '2024', 'Apr', 230, 180, 560, 330),
(5, '2024', 'Mei', 240, 190, 580, 340),
(6, '2024', 'Jun', 250, 200, 600, 350),
(7, '2024', 'Jul', 260, 210, 620, 360),
(8, '2024', 'Agu', 270, 220, 640, 370),
(9, '2024', 'Sep', 280, 230, 660, 380),
(10, '2024', 'Okt', 290, 240, 680, 390),
(11, '2024', 'Nov', 300, 250, 700, 400),
(12, '2024', 'Des', 310, 260, 720, 410);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_purchase`
--

CREATE TABLE `inventory_purchase` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `purchased` int(11) DEFAULT NULL,
  `used` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inventory_purchase`
--

INSERT INTO `inventory_purchase` (`id`, `bulan`, `tahun`, `purchased`, `used`) VALUES
(1, 'Jan', 2024, 300, 280),
(2, 'Feb', 2024, 350, 330),
(3, 'Mar', 2024, 400, 390),
(4, 'Apr', 2024, 380, 370),
(5, 'Mei', 2024, 420, 400),
(6, 'Jun', 2024, 450, 430);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_turnover`
--

CREATE TABLE `inventory_turnover` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `turnover_ratio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inventory_turnover`
--

INSERT INTO `inventory_turnover` (`id`, `bulan`, `tahun`, `turnover_ratio`) VALUES
(1, 'Jan', 2024, 5.1),
(2, 'Feb', 2024, 4.8),
(3, 'Mar', 2024, 5.4),
(4, 'Apr', 2024, 5.6),
(5, 'Mei', 2024, 6),
(6, 'Jun', 2024, 5.9),
(7, 'Jul', 2024, 6.2),
(8, 'Agu', 2024, 5.8),
(9, 'Sep', 2024, 5.5),
(10, 'Okt', 2024, 5.7),
(11, 'Nov', 2024, 6.1),
(12, 'Des', 2024, 6.3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lead_time_delivery`
--

CREATE TABLE `lead_time_delivery` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `lead_time` int(11) DEFAULT NULL,
  `on_time_delivery` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lead_time_delivery`
--

INSERT INTO `lead_time_delivery` (`id`, `bulan`, `tahun`, `lead_time`, `on_time_delivery`) VALUES
(1, 'Jan', 2024, 5, 92.00),
(2, 'Feb', 2024, 7, 88.00),
(3, 'Mar', 2024, 6, 90.00),
(4, 'Apr', 2024, 8, 85.00),
(5, 'Mei', 2024, 6, 89.00),
(6, 'Jun', 2024, 7, 91.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `machine_utilization`
--

CREATE TABLE `machine_utilization` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `utilization_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `machine_utilization`
--

INSERT INTO `machine_utilization` (`id`, `bulan`, `tahun`, `utilization_rate`) VALUES
(1, 'Jan', 2024, 75),
(2, 'Feb', 2024, 82),
(3, 'Mar', 2024, 68),
(4, 'Apr', 2024, 79),
(5, 'Mei', 2024, 85),
(6, 'Jun', 2024, 90),
(7, 'Jul', 2024, 88),
(8, 'Agu', 2024, 76),
(9, 'Sep', 2024, 70),
(10, 'Okt', 2024, 73),
(11, 'Nov', 2024, 80),
(12, 'Des', 2024, 77);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_fulfillment`
--

CREATE TABLE `order_fulfillment` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `cycle_time` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_fulfillment`
--

INSERT INTO `order_fulfillment` (`id`, `bulan`, `tahun`, `cycle_time`) VALUES
(1, 'Jan', 2024, 5),
(2, 'Feb', 2024, 4.8),
(3, 'Mar', 2024, 5.2),
(4, 'Apr', 2024, 4.6),
(5, 'Mei', 2024, 4.9),
(6, 'Jun', 2024, 4.5),
(7, 'Jul', 2024, 4.7),
(8, 'Agu', 2024, 5.1),
(9, 'Sep', 2024, 4.8),
(10, 'Okt', 2024, 4.4),
(11, 'Nov', 2024, 4.6),
(12, 'Des', 2024, 4.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `production_output`
--

CREATE TABLE `production_output` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `target` int(11) DEFAULT NULL,
  `actual_output` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `production_output`
--

INSERT INTO `production_output` (`id`, `bulan`, `tahun`, `target`, `actual_output`) VALUES
(1, 'Jan', 2024, 1000, 950),
(2, 'Feb', 2024, 1100, 1150),
(3, 'Mar', 2024, 1050, 980),
(4, 'Apr', 2024, 1200, 1250),
(5, 'Mei', 2024, 1150, 1180),
(6, 'Jun', 2024, 1250, 1220),
(7, 'Jul', 2024, 1300, 1290),
(8, 'Agu', 2024, 1280, 1300),
(9, 'Sep', 2024, 1100, 1080),
(10, 'Okt', 2024, 1200, 1170),
(11, 'Nov', 2024, 1150, 1130),
(12, 'Des', 2024, 1250, 1260);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profit_loss`
--

CREATE TABLE `profit_loss` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` enum('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') NOT NULL,
  `revenue` int(11) NOT NULL,
  `expenses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profit_loss`
--

INSERT INTO `profit_loss` (`id`, `tahun`, `bulan`, `revenue`, `expenses`) VALUES
(1, '2024', 'Jan', 200, 150),
(2, '2024', 'Feb', 220, 180),
(3, '2024', 'Mar', 250, 200),
(4, '2024', 'Apr', 270, 210),
(5, '2024', 'Mei', 300, 250),
(6, '2024', 'Jun', 320, 290),
(7, '2024', 'Jul', 340, 310),
(8, '2024', 'Agu', 360, 330),
(9, '2024', 'Sep', 380, 340),
(10, '2024', 'Okt', 400, 360),
(11, '2024', 'Nov', 420, 380),
(12, '2024', 'Des', 440, 400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order_tracking`
--

CREATE TABLE `purchase_order_tracking` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `orders_created` int(11) DEFAULT NULL,
  `orders_completed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `purchase_order_tracking`
--

INSERT INTO `purchase_order_tracking` (`id`, `bulan`, `tahun`, `orders_created`, `orders_completed`) VALUES
(1, 'Jan', 2024, 120, 100),
(2, 'Feb', 2024, 150, 140),
(3, 'Mar', 2024, 170, 160),
(4, 'Apr', 2024, 160, 150),
(5, 'May', 2024, 180, 170),
(6, 'Jun', 2024, 190, 185);

-- --------------------------------------------------------

--
-- Struktur dari tabel `quality_control_metrics`
--

CREATE TABLE `quality_control_metrics` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `defect_rate` float DEFAULT NULL,
  `yield_percentage` float DEFAULT NULL,
  `rework_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `quality_control_metrics`
--

INSERT INTO `quality_control_metrics` (`id`, `bulan`, `tahun`, `defect_rate`, `yield_percentage`, `rework_count`) VALUES
(1, 'Jan', 2024, 2.5, 97, 15),
(2, 'Feb', 2024, 3, 96.5, 20),
(3, 'Mar', 2024, 2, 98, 10),
(4, 'Apr', 2024, 2.2, 97.5, 13),
(5, 'Mei', 2024, 3.5, 96, 25),
(6, 'Jun', 2024, 2.8, 97, 18),
(7, 'Jul', 2024, 2.1, 98.2, 11),
(8, 'Agu', 2024, 2.7, 97.8, 19),
(9, 'Sep', 2024, 2.4, 97.6, 14),
(10, 'Okt', 2024, 3.1, 96.9, 22),
(11, 'Nov', 2024, 2.6, 97.3, 17),
(12, 'Des', 2024, 2.3, 97.7, 13);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_performance`
--

CREATE TABLE `sales_performance` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` enum('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') NOT NULL,
  `target` int(11) NOT NULL,
  `pencapaian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sales_performance`
--

INSERT INTO `sales_performance` (`id`, `tahun`, `bulan`, `target`, `pencapaian`) VALUES
(1, '2024', 'Jan', 200, 180),
(2, '2024', 'Feb', 210, 190),
(3, '2024', 'Mar', 220, 200),
(4, '2024', 'Apr', 230, 220),
(5, '2024', 'Mei', 240, 210),
(6, '2024', 'Jun', 250, 230),
(7, '2024', 'Jul', 260, 240),
(8, '2024', 'Agu', 270, 250),
(9, '2024', 'Sep', 280, 260),
(10, '2024', 'Okt', 290, 270),
(11, '2024', 'Nov', 300, 280),
(12, '2024', 'Des', 310, 290);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_pipeline`
--

CREATE TABLE `sales_pipeline` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `leads` int(11) DEFAULT NULL,
  `qualified_leads` int(11) DEFAULT NULL,
  `proposals` int(11) DEFAULT NULL,
  `deals_closed` int(11) DEFAULT NULL,
  `forecast` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sales_pipeline`
--

INSERT INTO `sales_pipeline` (`id`, `bulan`, `tahun`, `leads`, `qualified_leads`, `proposals`, `deals_closed`, `forecast`) VALUES
(1, 'Jan', 2024, 50, 30, 20, 10, 12),
(2, 'Feb', 2024, 60, 35, 25, 15, 18),
(3, 'Mar', 2024, 70, 45, 30, 20, 24),
(4, 'Apr', 2024, 80, 50, 40, 25, 28),
(5, 'Mei', 2024, 90, 60, 45, 30, 32),
(6, 'Jun', 2024, 100, 70, 55, 35, 38),
(7, 'Jul', 2024, 110, 75, 60, 40, 44),
(8, 'Agu', 2024, 130, 85, 70, 50, 52),
(9, 'Sep', 2024, 120, 80, 65, 45, 48),
(10, 'Okt', 2024, 110, 75, 60, 40, 42),
(11, 'Nov', 2024, 100, 70, 55, 35, 36),
(12, 'Des', 2024, 90, 60, 50, 30, 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_rep_performance`
--

CREATE TABLE `sales_rep_performance` (
  `id` int(11) NOT NULL,
  `nama_sales` varchar(100) DEFAULT NULL,
  `total_penjualan` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sales_rep_performance`
--

INSERT INTO `sales_rep_performance` (`id`, `nama_sales`, `total_penjualan`, `tahun`) VALUES
(1, 'ken', 150, 2024),
(2, 'aji', 200, 2024),
(3, 'bisma', 180, 2024),
(4, 'kupluk', 220, 2024),
(5, 'acyl', 170, 2024);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_reorder`
--

CREATE TABLE `stock_reorder` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `stock_saat_ini` int(11) DEFAULT NULL,
  `reorder_point` int(11) DEFAULT NULL,
  `minimum_stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stock_reorder`
--

INSERT INTO `stock_reorder` (`id`, `nama_barang`, `bulan`, `tahun`, `stock_saat_ini`, `reorder_point`, `minimum_stock`) VALUES
(1, 'Item A', 'Apr', 2024, 60, 50, 30),
(2, 'Item B', 'Apr', 2024, 40, 50, 30),
(3, 'Item C', 'Apr', 2024, 20, 50, 30),
(4, 'Item D', 'Apr', 2024, 50, 50, 30),
(5, 'Item E', 'Apr', 2024, 80, 50, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier_lead_time`
--

CREATE TABLE `supplier_lead_time` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `lead_time` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier_lead_time`
--

INSERT INTO `supplier_lead_time` (`id`, `nama_supplier`, `tahun`, `lead_time`) VALUES
(1, 'Supplier A', 2024, 7),
(2, 'Supplier B', 2024, 10),
(3, 'Supplier C', 2024, 6),
(4, 'Supplier D', 2024, 9),
(5, 'Supplier E', 2024, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier_performance`
--

CREATE TABLE `supplier_performance` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `on_time_delivery` decimal(5,2) DEFAULT NULL,
  `quality_rating` decimal(2,1) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier_performance`
--

INSERT INTO `supplier_performance` (`id`, `nama_supplier`, `on_time_delivery`, `quality_rating`, `tahun`) VALUES
(1, 'Supplier A', 93.00, 4.9, 2024),
(2, 'Supplier B', 87.00, 4.4, 2024),
(3, 'Supplier C', 90.00, 4.6, 2024),
(4, 'Supplier D', 84.00, 4.1, 2024),
(5, 'Supplier E', 91.00, 4.7, 2024);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supply_demand`
--

CREATE TABLE `supply_demand` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `supply` int(11) DEFAULT NULL,
  `demand` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supply_demand`
--

INSERT INTO `supply_demand` (`id`, `bulan`, `tahun`, `supply`, `demand`) VALUES
(1, 'Jan', 2024, 1000, 950),
(2, 'Feb', 2024, 1100, 1150),
(3, 'Mar', 2024, 1200, 1180),
(4, 'Apr', 2024, 1300, 1270),
(5, 'Mei', 2024, 1250, 1300),
(6, 'Jun', 2024, 1350, 1280),
(7, 'Jul', 2024, 1400, 1370),
(8, 'Agu', 2024, 1380, 1320),
(9, 'Sep', 2024, 1300, 1280),
(10, 'Okt', 2024, 1250, 1230),
(11, 'Nov', 2024, 1200, 1190),
(12, 'Des', 2024, 1300, 1350);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tax_compliance`
--

CREATE TABLE `tax_compliance` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `kategori` enum('Patuh','Terlambat','Tidak Patuh') NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tax_compliance`
--

INSERT INTO `tax_compliance` (`id`, `tahun`, `kategori`, `jumlah`) VALUES
(1, '2024', 'Patuh', 120),
(2, '2024', 'Terlambat', 45),
(3, '2024', 'Tidak Patuh', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `top_selling`
--

CREATE TABLE `top_selling` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `jumlah_terjual` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `top_selling`
--

INSERT INTO `top_selling` (`id`, `nama_produk`, `jumlah_terjual`, `tahun`) VALUES
(1, 'Produk A', 500, 2024),
(2, 'Produk B', 450, 2024),
(3, 'Produk C', 400, 2024),
(4, 'Produk D', 350, 2024),
(5, 'Produk E', 300, 2024);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warehouse_capacity`
--

CREATE TABLE `warehouse_capacity` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `kapasitas_terpakai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `warehouse_capacity`
--

INSERT INTO `warehouse_capacity` (`id`, `bulan`, `tahun`, `kapasitas_terpakai`) VALUES
(1, 'Jan', 2024, 78),
(2, 'Feb', 2024, 82),
(3, 'Mar', 2024, 85),
(4, 'Apr', 2024, 90),
(5, 'Mei', 2024, 87),
(6, 'Jun', 2024, 88),
(7, 'Jul', 2024, 92),
(8, 'Agu', 2024, 89),
(9, 'Sep', 2024, 86),
(10, 'Okt', 2024, 83),
(11, 'Nov', 2024, 80),
(12, 'Des', 2024, 81);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wip_tracking`
--

CREATE TABLE `wip_tracking` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `jumlah_wip` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wip_tracking`
--

INSERT INTO `wip_tracking` (`id`, `bulan`, `tahun`, `jumlah_wip`) VALUES
(1, 'Jan', 2024, 320),
(2, 'Feb', 2024, 280),
(3, 'Mar', 2024, 350),
(4, 'Apr', 2024, 370),
(5, 'Mei', 2024, 340),
(6, 'Jun', 2024, 390),
(7, 'Jul', 2024, 410),
(8, 'Agu', 2024, 400),
(9, 'Sep', 2024, 380),
(10, 'Okt', 2024, 360),
(11, 'Nov', 2024, 370),
(12, 'Des', 2024, 390);

-- --------------------------------------------------------

--
-- Struktur dari tabel `work_order`
--

CREATE TABLE `work_order` (
  `id` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `completed` int(11) DEFAULT NULL,
  `in_progress` int(11) DEFAULT NULL,
  `pending` int(11) DEFAULT NULL,
  `cancelled` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `work_order`
--

INSERT INTO `work_order` (`id`, `bulan`, `tahun`, `completed`, `in_progress`, `pending`, `cancelled`) VALUES
(1, 'Jan', 2024, 20, 10, 5, 2),
(2, 'Feb', 2024, 25, 12, 6, 1),
(3, 'Mar', 2024, 22, 14, 4, 3),
(4, 'Apr', 2024, 30, 13, 7, 2),
(5, 'Mei', 2024, 28, 15, 6, 2),
(6, 'Jun', 2024, 32, 14, 5, 1),
(7, 'Jul', 2024, 35, 13, 6, 1),
(8, 'Agu', 2024, 33, 12, 7, 2),
(9, 'Sep', 2024, 30, 11, 8, 1),
(10, 'Okt', 2024, 31, 13, 6, 2),
(11, 'Nov', 2024, 29, 14, 5, 2),
(12, 'Des', 2024, 34, 12, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `audit_compliance`
--
ALTER TABLE `audit_compliance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `budget_actual`
--
ALTER TABLE `budget_actual`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cashflow_analysis`
--
ALTER TABLE `cashflow_analysis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cost_savings`
--
ALTER TABLE `cost_savings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer_conversion`
--
ALTER TABLE `customer_conversion`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `delivery_performance`
--
ALTER TABLE `delivery_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `demand_forecasting`
--
ALTER TABLE `demand_forecasting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `downtime_maintenance`
--
ALTER TABLE `downtime_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `expense_breakdown`
--
ALTER TABLE `expense_breakdown`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `financial_data`
--
ALTER TABLE `financial_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `financial_forecast`
--
ALTER TABLE `financial_forecast`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `freight_costs`
--
ALTER TABLE `freight_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `general_ledger`
--
ALTER TABLE `general_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventory_purchase`
--
ALTER TABLE `inventory_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventory_turnover`
--
ALTER TABLE `inventory_turnover`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lead_time_delivery`
--
ALTER TABLE `lead_time_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `machine_utilization`
--
ALTER TABLE `machine_utilization`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_fulfillment`
--
ALTER TABLE `order_fulfillment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `production_output`
--
ALTER TABLE `production_output`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profit_loss`
--
ALTER TABLE `profit_loss`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchase_order_tracking`
--
ALTER TABLE `purchase_order_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quality_control_metrics`
--
ALTER TABLE `quality_control_metrics`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `revenue_expenses`
--
ALTER TABLE `revenue_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sales_performance`
--
ALTER TABLE `sales_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sales_pipeline`
--
ALTER TABLE `sales_pipeline`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sales_rep_performance`
--
ALTER TABLE `sales_rep_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stock_reorder`
--
ALTER TABLE `stock_reorder`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier_lead_time`
--
ALTER TABLE `supplier_lead_time`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier_performance`
--
ALTER TABLE `supplier_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supply_demand`
--
ALTER TABLE `supply_demand`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tax_compliance`
--
ALTER TABLE `tax_compliance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `top_selling`
--
ALTER TABLE `top_selling`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `warehouse_capacity`
--
ALTER TABLE `warehouse_capacity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wip_tracking`
--
ALTER TABLE `wip_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `work_order`
--
ALTER TABLE `work_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `audit_compliance`
--
ALTER TABLE `audit_compliance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `budget_actual`
--
ALTER TABLE `budget_actual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `cashflow_analysis`
--
ALTER TABLE `cashflow_analysis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `cost_savings`
--
ALTER TABLE `cost_savings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `customer_conversion`
--
ALTER TABLE `customer_conversion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `delivery_performance`
--
ALTER TABLE `delivery_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `demand_forecasting`
--
ALTER TABLE `demand_forecasting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `downtime_maintenance`
--
ALTER TABLE `downtime_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `expense_breakdown`
--
ALTER TABLE `expense_breakdown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `financial_data`
--
ALTER TABLE `financial_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `financial_forecast`
--
ALTER TABLE `financial_forecast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `freight_costs`
--
ALTER TABLE `freight_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `general_ledger`
--
ALTER TABLE `general_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `inventory_purchase`
--
ALTER TABLE `inventory_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `inventory_turnover`
--
ALTER TABLE `inventory_turnover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `lead_time_delivery`
--
ALTER TABLE `lead_time_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `machine_utilization`
--
ALTER TABLE `machine_utilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `order_fulfillment`
--
ALTER TABLE `order_fulfillment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `production_output`
--
ALTER TABLE `production_output`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `profit_loss`
--
ALTER TABLE `profit_loss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `purchase_order_tracking`
--
ALTER TABLE `purchase_order_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `quality_control_metrics`
--
ALTER TABLE `quality_control_metrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `revenue_expenses`
--
ALTER TABLE `revenue_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sales_performance`
--
ALTER TABLE `sales_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sales_pipeline`
--
ALTER TABLE `sales_pipeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sales_rep_performance`
--
ALTER TABLE `sales_rep_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stock_reorder`
--
ALTER TABLE `stock_reorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `supplier_lead_time`
--
ALTER TABLE `supplier_lead_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `supplier_performance`
--
ALTER TABLE `supplier_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `supply_demand`
--
ALTER TABLE `supply_demand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tax_compliance`
--
ALTER TABLE `tax_compliance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `top_selling`
--
ALTER TABLE `top_selling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `warehouse_capacity`
--
ALTER TABLE `warehouse_capacity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `wip_tracking`
--
ALTER TABLE `wip_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `work_order`
--
ALTER TABLE `work_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
