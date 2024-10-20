-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2024 at 09:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparta`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id` bigint UNSIGNED NOT NULL,
  `mata_kuliah_id` bigint UNSIGNED NOT NULL,
  `ruangan_id` bigint UNSIGNED NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`id`, `mata_kuliah_id`, `ruangan_id`, `hari`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Senin', '08:00:00', '10:00:00', NULL, NULL),
(2, 2, 1, 'Rabu', '10:00:00', '12:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `angkatan` varchar(255) NOT NULL,
  `dosen_wali` varchar(255) NOT NULL,
  `semester` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliahs`
--

CREATE TABLE `mata_kuliahs` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sks` int NOT NULL,
  `semester` int NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mata_kuliahs`
--

INSERT INTO `mata_kuliahs` (`id`, `kode`, `nama`, `sks`, `semester`, `prodi`, `created_at`, `updated_at`) VALUES
(1, 'IF1234', 'Pemrograman Berbasis Objek', 3, 3, 'Teknik Informatika', NULL, NULL),
(2, 'IF1235', 'Pemrograman Web', 3, 3, 'Teknik Informatika', NULL, NULL),
(3, 'IF1236', 'Pemrograman Mobile', 3, 3, 'Teknik Informatika', NULL, NULL),
(4, 'IF1237', 'Pemrograman Desktop', 3, 3, 'Teknik Informatika', NULL, NULL),
(5, 'IF1238', 'Pemrograman Jaringan', 3, 3, 'Teknik Informatika', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_09_23_112441_users', 1),
(2, '2024_09_23_133432_create_sessions_table', 1),
(3, '2024_09_29_142337_mahasiswas', 1),
(4, '2024_09_29_142350_dosen', 1),
(5, '2024_09_30_062444_mata_kuliah', 1),
(6, '2024_09_30_062455_ruangan', 1),
(7, '2024_09_30_062502_jadwal_kuliah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kapasitas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id`, `kode`, `nama`, `kapasitas`, `created_at`, `updated_at`) VALUES
(1, 'R001', 'Ruang 1', '50', NULL, NULL),
(2, 'R002', 'Ruang 2', '50', NULL, NULL),
(3, 'R003', 'Ruang 3', '50', NULL, NULL),
(4, 'R004', 'Ruang 4', '50', NULL, NULL),
(5, 'R005', 'Ruang 5', '50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rq4jy23dWTT76LvDZqbbcHAarSiqQeH1NzJDF5dD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVnRWZjZ2dDIzS0dwZkpoQmhjQVRjZWI1WmhnUFZZUjF4MURKUzlJYiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkTWFoYXNpc3dhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1727686984);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim_nip` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `kp` tinyint(1) NOT NULL,
  `dk` tinyint(1) NOT NULL,
  `pa` tinyint(1) NOT NULL,
  `ba` tinyint(1) NOT NULL,
  `ma` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama`, `nim_nip`, `status`, `kp`, `dk`, `pa`, `ba`, `ma`, `created_at`, `updated_at`) VALUES
(1, 'naufalrizki@students.sparta.ac.id', 'c23ff576b099ad9d63451d0df246cead', 'Naufal Rizki', '24060122120011', 'aktif', 0, 0, 0, 0, 1, NULL, NULL),
(2, 'rockygerung@lecturer.sparta.ac.id', 'a1109fb84511bc88d90dff250a110477', 'Rocky Gerung', '212345678910', 'aktif', 0, 1, 0, 0, 0, NULL, NULL),
(3, 'buyahamka@lecturer.sparta.ac.id', '6aa5fc9d3bf43b2092e642037f7cb011', 'Buya Hamka', '212345678910', 'aktif', 0, 0, 1, 0, 0, NULL, NULL),
(4, 'mulyono@lecturer.sparta.ac.id', 'acb94d4fb5fefabc2507c52f4aa4666a', 'mulyono', '212345678910', 'aktif', 1, 0, 1, 0, 0, NULL, NULL),
(5, 'gemoy@lecturer.sparta.ac.id', 'e680d01facbfd23a41aa10f676c44d0f', 'Gemoy', '212345678910', 'aktif', 0, 0, 0, 1, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_kuliah_mata_kuliah_id_foreign` (`mata_kuliah_id`),
  ADD KEY `jadwal_kuliah_ruangan_id_foreign` (`ruangan_id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswas_user_id_foreign` (`user_id`);

--
-- Indexes for table `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD CONSTRAINT `jadwal_kuliah_mata_kuliah_id_foreign` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliahs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_kuliah_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
