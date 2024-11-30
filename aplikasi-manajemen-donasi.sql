-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Nov 2024 pada 07.30
-- Versi server: 8.0.30
-- Versi PHP: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi-manajemen-donasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donations`
--

CREATE TABLE `donations` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `manage_donation_id` int DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donation_transactions`
--

CREATE TABLE `donation_transactions` (
  `id` int NOT NULL,
  `donation_id` int NOT NULL,
  `donator_name` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `infaq`
--

CREATE TABLE `infaq` (
  `infaq_id` int NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text,
  `nama_donatur` varchar(255) NOT NULL,
  `status` enum('pending','terverifikasi') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `manage_donations`
--

CREATE TABLE `manage_donations` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `target_amount` decimal(15,2) NOT NULL,
  `deadline` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `collected_amount` decimal(15,2) DEFAULT '0.00',
  `donator_name` varchar(255) DEFAULT NULL,
  `status_donation` enum('pilihan','darurat') NOT NULL DEFAULT 'pilihan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `manage_donations`
--

INSERT INTO `manage_donations` (`id`, `image`, `description`, `target_amount`, `deadline`, `created_at`, `collected_amount`, `donator_name`, `status_donation`) VALUES
(2, 'adaf20eb-be5c-4f0c-bb24-b40404bedab0.jpeg', 'apa aka', 500000.00, '2024-12-07 00:00:00', '2024-11-29 08:30:01', 0.00, 'abdul', 'darurat'),
(3, 'GZI7c_SbMAAwI7s.jpeg', 'hiyaaaa', 600000.00, '2024-12-04 00:00:00', '2024-11-29 12:07:02', 0.00, 'joko', 'pilihan'),
(4, 'GZI7c_TakAAT0E-.jpeg', 'seiklasnya', 400000.00, '2024-12-01 00:00:00', '2024-11-29 14:21:29', 0.00, 'hari', 'darurat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manage_donation_categories`
--

CREATE TABLE `manage_donation_categories` (
  `manage_donation_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan_infaq_sodaqoh_zakat`
--

CREATE TABLE `pemasukan_infaq_sodaqoh_zakat` (
  `id` int NOT NULL,
  `kategori` enum('infaq','sodaqoh','zakat') NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text,
  `nama_donatur` varchar(255) NOT NULL,
  `status` enum('pending','terverifikasi') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sodaqoh`
--

CREATE TABLE `sodaqoh` (
  `sodaqoh_id` int NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text,
  `nama_donatur` varchar(255) NOT NULL,
  `status` enum('pending','terverifikasi') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `donation_id` int DEFAULT NULL,
  `type` enum('donation','withdrawal') NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `transaction_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code` varchar(10) DEFAULT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `reset_token`, `reset_token_expiry`, `password`, `role`, `created_at`, `code`, `updated_time`) VALUES
(1, 'admin', 'admin@admin.com', NULL, NULL, '$2y$10$DCfouvDEiC0P14Ydsz1fYex5P7TOyXg3lWUl0XXkTUaBBVGt/Vm4a', 'admin', '2024-11-17 16:19:21', NULL, '2024-11-17 16:28:19'),
(2, 'Hari Rizky', 'hari@gmail.com', NULL, NULL, '$2y$10$mbao7DCm65ER8EY9QWgIRes9w0Jm6D4lJhnyulw2UtcEEVIxmHIrm', 'user', '2024-11-17 16:26:37', NULL, '2024-11-17 16:26:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int NOT NULL,
  `manage_donation_id` int DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `withdrawal_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `zakat`
--

CREATE TABLE `zakat` (
  `id_zakat` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` enum('pekerja','non pekerja') NOT NULL,
  `penghasilan` decimal(15,2) NOT NULL,
  `jumlah_zakat` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeks untuk tabel `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `manage_donation_id` (`manage_donation_id`);

--
-- Indeks untuk tabel `donation_transactions`
--
ALTER TABLE `donation_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_id` (`donation_id`);

--
-- Indeks untuk tabel `infaq`
--
ALTER TABLE `infaq`
  ADD PRIMARY KEY (`infaq_id`);

--
-- Indeks untuk tabel `manage_donations`
--
ALTER TABLE `manage_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `manage_donation_categories`
--
ALTER TABLE `manage_donation_categories`
  ADD PRIMARY KEY (`manage_donation_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `pemasukan_infaq_sodaqoh_zakat`
--
ALTER TABLE `pemasukan_infaq_sodaqoh_zakat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sodaqoh`
--
ALTER TABLE `sodaqoh`
  ADD PRIMARY KEY (`sodaqoh_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_id` (`donation_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manage_donation_id` (`manage_donation_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indeks untuk tabel `zakat`
--
ALTER TABLE `zakat`
  ADD PRIMARY KEY (`id_zakat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donation_transactions`
--
ALTER TABLE `donation_transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `infaq`
--
ALTER TABLE `infaq`
  MODIFY `infaq_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `manage_donations`
--
ALTER TABLE `manage_donations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemasukan_infaq_sodaqoh_zakat`
--
ALTER TABLE `pemasukan_infaq_sodaqoh_zakat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sodaqoh`
--
ALTER TABLE `sodaqoh`
  MODIFY `sodaqoh_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `zakat`
--
ALTER TABLE `zakat`
  MODIFY `id_zakat` int NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`manage_donation_id`) REFERENCES `manage_donations` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `donation_transactions`
--
ALTER TABLE `donation_transactions`
  ADD CONSTRAINT `donation_transactions_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `manage_donations` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `manage_donation_categories`
--
ALTER TABLE `manage_donation_categories`
  ADD CONSTRAINT `manage_donation_categories_ibfk_1` FOREIGN KEY (`manage_donation_id`) REFERENCES `manage_donations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `manage_donation_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_ibfk_1` FOREIGN KEY (`manage_donation_id`) REFERENCES `manage_donations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `withdrawals_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
