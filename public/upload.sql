-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2019 pada 09.46
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upload`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_02_14_043445_upload_function', 1),
(10, '2019_02_24_042207_create_model_users_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_users`
--

CREATE TABLE `model_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_users`
--

INSERT INTO `model_users` (`id`, `email`, `password`, `name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'salwaahmadz888@gmail.com', '12345678', 'Salwa Ahmad Zanjabila', NULL, '2019-02-10 04:22:17', '2019-02-10 04:22:17'),
(2, 'salwaahmadz777@gmail.com', '123', 'Ahmad Zanjabila', NULL, '2019-02-10 04:22:17', '2019-02-10 04:22:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload`
--

CREATE TABLE `upload` (
  `id_upload` int(10) UNSIGNED NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `upload`
--

INSERT INTO `upload` (`id_upload`, `version`, `file_name`, `created_at`, `updated_at`) VALUES
(48, '1.3.0', '26 November 2018.txt', '2019-02-24 09:13:12', '2019-02-24 09:13:12'),
(49, '1.4.0', 'CodeIgniter.txt', '2019-02-25 00:10:37', '2019-02-25 00:10:37'),
(51, '1.6.0', 'ERD.txt', '2019-02-25 00:11:04', '2019-02-25 00:11:04'),
(55, '1.1.0', '12 November 2018.txt', '2019-02-26 21:43:49', '2019-02-26 21:43:49'),
(56, '1.2.0', 'Itulah pokoknya.txt', '2019-02-26 21:44:19', '2019-02-26 21:44:49'),
(57, '1.5.0', 'Framework.txt', '2019-02-26 21:46:52', '2019-02-26 21:46:52'),
(58, '1.7.0', 'Soal Pak Yusuf.txt', '2019-02-26 21:47:15', '2019-02-26 21:47:15'),
(59, '1.8.0', 'Query 24 September 2018.txt', '2019-02-26 21:47:43', '2019-02-26 21:47:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Salwa Ahmad Zanjabila', 'salwaahmadz888@gmail.com', '$2y$10$kkaUdCuW9Y8OCb0WZagU4.JnYOgnxo8b2.ssuAaSgfqWicG5l24Cm', NULL, '2019-02-24 21:21:27', '2019-02-24 21:21:27'),
(4, 'Ahmad Zanjabila', 'salwaahmadz777@gmail.com', '$2y$10$ijMzTaoBkBIyF64U6wijn.u3PpWeE5MOkz/2W7zN/RVuLXUJSNT3e', NULL, '2019-02-24 21:38:58', '2019-02-24 21:38:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_users`
--
ALTER TABLE `model_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `model_users_email_unique` (`email`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `model_users`
--
ALTER TABLE `model_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `upload`
--
ALTER TABLE `upload`
  MODIFY `id_upload` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
