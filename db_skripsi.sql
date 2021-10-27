-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 05:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_sempro`
--

CREATE TABLE `berkas_sempro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proposal` bigint(20) UNSIGNED NOT NULL,
  `id_plot_dosbing` bigint(20) UNSIGNED NOT NULL,
  `berkas_sempro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu Dijadwalkan',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berkas_sempro`
--

INSERT INTO `berkas_sempro` (`id`, `nim`, `id_proposal`, `id_plot_dosbing`, `berkas_sempro`, `status`, `created_at`, `updated_at`) VALUES
(5, '201851081', 2, 45, 'sempro - Copy.zip', 'Terjadwal', '2021-10-24 23:11:56', '2021-10-24 23:11:56'),
(6, '201851048', 6, 44, 'sempro.zip', 'Terjadwal', '2021-10-27 07:03:59', '2021-10-27 07:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nidn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `name`, `email`, `created_at`, `updated_at`) VALUES
(8, '0406107004', 'Ahmad Jazuli S.Kom., M.Kom', 'ahmad.jazuli@umk.ac.id', '2021-10-11 07:38:13', '2021-10-11 07:38:13'),
(9, '0608068502', 'Tutik Khotimah S.Kom., M.Kom', 'tutik.khotimah@umk.ac.id', '2021-10-11 07:39:56', '2021-10-11 07:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_sempro`
--

CREATE TABLE `hasil_sempro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proposal` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal_sempro` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_sempro`
--

INSERT INTO `hasil_sempro` (`id`, `nim`, `id_proposal`, `id_jadwal_sempro`, `status`, `nilai`, `created_at`, `updated_at`) VALUES
(4, '201851081', 2, 6, 'Lulus', 'B', '2021-10-26 19:59:20', '2021-10-26 19:59:20'),
(5, '201851048', 6, 7, 'Lulus', 'AB', '2021-10-27 07:11:58', '2021-10-27 07:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sempro`
--

CREATE TABLE `jadwal_sempro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_berkas_sempro` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_sempro`
--

INSERT INTO `jadwal_sempro` (`id`, `nim`, `id_berkas_sempro`, `tanggal`, `jam`, `tempat`, `ket`, `status`, `created_at`, `updated_at`) VALUES
(6, '201851081', 5, '2021-10-28', '09:00:00', 'Zoom', 'Oke', 'Sudah', '2021-10-26 19:45:59', '2021-10-26 19:45:59'),
(7, '201851048', 6, '2021-10-29', '09:00:00', 'Zoom', 'link njum', 'Sudah', '2021-10-27 07:08:34', '2021-10-27 07:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `name`, `email`, `hp`, `created_at`, `updated_at`) VALUES
(12, '201851048', 'LEONANTA PRAMUDYA KUSUMA', 'leonantapramudya7@gmail.com', '089855655451', '2021-10-11 07:42:53', '2021-10-11 07:42:53'),
(13, '201851081', 'SITI WIDAYANTI', 'sitiw@gmail.com', '089855655452', '2021-10-11 07:42:53', '2021-10-11 07:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_10_08_052033_create_dosen_table', 2),
(5, '2021_10_08_120045_create_mahasiswa_table', 3),
(6, '2021_10_11_120126_create_plot_dosbing_table', 4),
(7, '2021_10_11_121722_create_table_dosen', 5),
(8, '2021_10_11_130028_create_plot_dosbing_table', 6),
(9, '2021_10_12_020848_create_proposal_table', 7),
(10, '2021_10_12_143001_create_berkas_sempro_table', 8),
(11, '2021_10_13_131031_create_jadwal_sempro_table', 9),
(12, '2021_10_18_005758_create_semester_table', 10),
(13, '2021_10_27_020205_create_hasil_sempro_table', 11),
(14, '2021_10_27_021334_create_hasil_sempro_table', 12),
(15, '2021_10_27_022758_create_hasil_sempro_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('leonantapramudya7@gmail.com', '$2y$10$UfTytnMY.xaEc2.g9fxME.OdAjrgrT3yoDmwoPcdnUeCsDqrCkcD.', '2021-10-27 08:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `plot_dosbing`
--

CREATE TABLE `plot_dosbing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `smt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosbing1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosbing2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plot_dosbing`
--

INSERT INTO `plot_dosbing` (`id`, `smt`, `nim`, `name`, `dosbing1`, `dosbing2`) VALUES
(44, 'GASAL 2021/2022', '201851048', 'LEONANTA PRAMUDYA KUSUMA', 'Ahmad Jazuli S.Kom., M.Kom', 'Tutik Khotimah S.Kom., M.Kom'),
(45, 'GASAL 2021/2022', '201851081', 'SITI WIDAYANTI', 'Tutik Khotimah S.Kom., M.Kom', 'Ahmad Jazuli S.Kom., M.Kom');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_semester` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu ACC',
  `ket2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu ACC',
  `id_plot_dosbing` bigint(20) UNSIGNED NOT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `komentar1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `komentar2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `id_semester`, `nim`, `topik`, `judul`, `proposal`, `ket1`, `ket2`, `id_plot_dosbing`, `komentar`, `komentar1`, `komentar2`, `created_at`, `updated_at`) VALUES
(2, 3, '201851081', 'Jaringan', 'Jaringan', 'Test - Copy.pdf', 'Disetujui', 'Disetujui', 45, 'Terimakasih', 'ACC ya', 'ACC ya', '2021-10-12 06:30:07', '2021-10-12 06:30:07'),
(5, 3, '201851048', 'Website', 'Sistem Monitoring Skripsi', 'Test.pdf', 'Ditolak', 'Ditolak', 44, 'Upload Proposal', '-', '-', '2021-10-27 06:59:29', '2021-10-27 06:59:29'),
(6, 3, '201851048', 'Android', 'Sistem Monitoring Skripsi ACC', 'Test.pdf', 'Disetujui', 'Disetujui', 44, 'Upload Proposal Lagi', '-', '-', '2021-10-27 07:00:13', '2021-10-27 07:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `tahun`, `aktif`, `created_at`, `updated_at`) VALUES
(3, 'Genap', '2021/2022', 'Y', '2021-10-18 04:50:29', '2021-10-18 04:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','dosen','mahasiswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mahasiswa',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `no_induk`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, '12345678910', 'Admin', 'adminskripsi', NULL, '2021-09-22 02:52:53', '$2y$10$f3DuEvp3mflK9tvKe3.FD.FHUqsL167dYWwCXkJwcXnZtcaU/mMoO', NULL, 'admin', '2021-09-22 02:52:53', NULL),
(19, '0406107004', 'Ahmad Jazuli S.Kom., M.Kom', '0406107004', NULL, NULL, '$2y$10$y8rS69rzSE.PMKc.I35gQ.4CrAr2HV79EJ0DWcdkAUV7lwk8MPGce', NULL, 'dosen', '2021-10-11 14:38:13', '2021-10-11 14:38:13'),
(20, '0608068502', 'Tutik Khotimah S.Kom., M.Kom', '0608068502', NULL, NULL, '$2y$10$VZjx.qVQNgCiGuRzZg4zZ.f3/sydrYFHv2ne288km3nLiBQM6iCcK', NULL, 'dosen', '2021-10-11 14:39:56', '2021-10-11 14:39:56'),
(21, '201851048', 'LEONANTA PRAMUDYA KUSUMA', '201851048', 'leonantapramudya7@gmail.com', NULL, '$2y$10$bTFEDPnym280mf5v9CZWpO9ZHSnDthJG7Z5YtulBXGWd9W1YvgEJi', 'jtNcEn0zPEQ084hy3rKiHm7kgcOqJh402HrCzHMpkj3u6i9nYvuZAcY8w4NM', 'mahasiswa', '2021-10-11 14:42:53', '2021-10-11 14:42:53'),
(22, '201851081', 'SITI WIDAYANTI', '201851081', 'sitiw@gmail.com', NULL, '$2y$10$nrsPl2ifLokZhShvk9BemeEariQepvjxuCrPYnQ6oQDRpFQDf62TC', NULL, 'mahasiswa', '2021-10-11 14:42:53', '2021-10-11 14:42:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_sempro`
--
ALTER TABLE `berkas_sempro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berkas_sempro_nim_foreign` (`nim`),
  ADD KEY `berkas_sempro_id_proposal_foreign` (`id_proposal`),
  ADD KEY `berkas_sempro_id_plot_dosbing_foreign` (`id_plot_dosbing`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_sempro`
--
ALTER TABLE `hasil_sempro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_sempro_nim_foreign` (`nim`),
  ADD KEY `hasil_sempro_id_proposal_foreign` (`id_proposal`),
  ADD KEY `hasil_sempro_id_jadwal_sempro_foreign` (`id_jadwal_sempro`);

--
-- Indexes for table `jadwal_sempro`
--
ALTER TABLE `jadwal_sempro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_sempro_nim_foreign` (`nim`),
  ADD KEY `jadwal_sempro_id_berkas_sempro_foreign` (`id_berkas_sempro`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `plot_dosbing`
--
ALTER TABLE `plot_dosbing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosbing1` (`dosbing1`),
  ADD KEY `dosbing2` (`dosbing2`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_id_plot_dosbing_foreign` (`id_plot_dosbing`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_semester` (`id_semester`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_sempro`
--
ALTER TABLE `berkas_sempro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_sempro`
--
ALTER TABLE `hasil_sempro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal_sempro`
--
ALTER TABLE `jadwal_sempro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `plot_dosbing`
--
ALTER TABLE `plot_dosbing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkas_sempro`
--
ALTER TABLE `berkas_sempro`
  ADD CONSTRAINT `berkas_sempro_id_plot_dosbing_foreign` FOREIGN KEY (`id_plot_dosbing`) REFERENCES `plot_dosbing` (`id`),
  ADD CONSTRAINT `berkas_sempro_id_proposal_foreign` FOREIGN KEY (`id_proposal`) REFERENCES `proposal` (`id`),
  ADD CONSTRAINT `berkas_sempro_nim_foreign` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `hasil_sempro`
--
ALTER TABLE `hasil_sempro`
  ADD CONSTRAINT `hasil_sempro_id_jadwal_sempro_foreign` FOREIGN KEY (`id_jadwal_sempro`) REFERENCES `jadwal_sempro` (`id`),
  ADD CONSTRAINT `hasil_sempro_id_proposal_foreign` FOREIGN KEY (`id_proposal`) REFERENCES `proposal` (`id`),
  ADD CONSTRAINT `hasil_sempro_nim_foreign` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `jadwal_sempro`
--
ALTER TABLE `jadwal_sempro`
  ADD CONSTRAINT `jadwal_sempro_id_berkas_sempro_foreign` FOREIGN KEY (`id_berkas_sempro`) REFERENCES `berkas_sempro` (`id`),
  ADD CONSTRAINT `jadwal_sempro_nim_foreign` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `plot_dosbing`
--
ALTER TABLE `plot_dosbing`
  ADD CONSTRAINT `plot_dosbing_ibfk_1` FOREIGN KEY (`dosbing1`) REFERENCES `dosen` (`name`),
  ADD CONSTRAINT `plot_dosbing_ibfk_2` FOREIGN KEY (`dosbing2`) REFERENCES `dosen` (`name`);

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `proposal_ibfk_2` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `proposal_id_plot_dosbing_foreign` FOREIGN KEY (`id_plot_dosbing`) REFERENCES `plot_dosbing` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
