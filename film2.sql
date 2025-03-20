-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Mar 2025 pada 06.15
-- Versi server: 8.0.30
-- Versi PHP: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktor`
--

CREATE TABLE `aktor` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_aktor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aktor`
--

INSERT INTO `aktor` (`id`, `nama_aktor`, `created_at`, `updated_at`) VALUES
(1, 'Raffi Ahmad', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(2, 'Christopher Nolan', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(3, 'Rimuru Tempest', '2025-03-18 23:48:53', '2025-03-18 23:48:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `films`
--

CREATE TABLE `films` (
  `id` bigint UNSIGNED NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `durasi` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `films`
--

INSERT INTO `films` (`id`, `author_id`, `nama`, `gambar`, `trailer`, `deskripsi`, `tahun_id`, `negara_id`, `rating`, `durasi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Inception', 'images/inception.jpg', 'https://youtu.be/8hP9D6kZseM?si=CEPySdHsrdIo2xAA', 'A mind-bending thriller by Christopher Nolan.', '4', '4', 9, 148, '2025-03-18 23:48:53', '2025-03-19 18:29:59'),
(2, 1, 'Parasite', 'images/parasite.jpg', 'https://youtu.be/SEUXfv87Wpk?si=w_yrxUKcQh5bFRzO', 'A dark comedy thriller from Bong Joon-ho.', '2', '3', 9, 132, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(3, 1, 'Avengers: Endgame', 'images/endgame.jpg', 'https://youtu.be/TcMBFSGVi1c?si=KfItqkXUwi-pP84Z', 'The epic conclusion to the Marvel Cinematic Universe saga.', '2', '1', 8, 181, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(4, 1, 'Spirited Away', 'images/Spirited_Away_Japanese_poster.png', 'https://youtu.be/ByXuk9QqQkk?si=vuibyBcFiOiKoDaW', 'A magical journey by Studio Ghibli.', '3', '2', 9, 125, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(5, 1, 'The Raid', 'images/the raid.jpg', 'https://youtu.be/m6Q7KnXpNOg?si=K3MJrInsLl6QQp15', 'An intense Indonesian action film.', '4', '4', 8, 101, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(6, 1, 'Wahid Muhammad Djati', 'films/GD71R6PvCDo2apaUB7tjecGCT5eWUIzFNeOpTbln.jpg', 'https://youtu.be/gqrkjNpoeQM?si=N6U3Zmb0i-XwE9If', 'et43t44t443t3fdfdf', '1', '2', 0, 35, '2025-03-18 23:58:34', '2025-03-18 23:58:34'),
(7, 3, 'Wahid Muhammad Djati', 'films/jyDscte4S5OoIMkDFxb3HmlYx4wX08sZhMiHQDdI.jpg', 'https://youtu.be/gqrkjNpoeQM?si=N6U3Zmb0i-XwE9If', 'efqefqfqfqefqe', '3', '5', 0, 32, '2025-03-19 18:13:20', '2025-03-19 21:47:31'),
(8, 3, 'musmus', 'films/Q2cHdZTIqNwBvZZEb7ac0jMGJzOUrZZwaaUEAdnL.jpg', 'https://youtu.be/gqrkjNpoeQM?si=N6U3Zmb0i-XwE9If', 'eeheeth', '3', '3', 0, 67, '2025-03-19 19:22:25', '2025-03-19 19:22:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `film_aktor`
--

CREATE TABLE `film_aktor` (
  `id` bigint UNSIGNED NOT NULL,
  `film_id` bigint UNSIGNED NOT NULL,
  `aktor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `film_aktor`
--

INSERT INTO `film_aktor` (`id`, `film_id`, `aktor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(3, 2, 1, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(4, 2, 2, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(5, 3, 1, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(6, 3, 2, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(7, 4, 1, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(8, 4, 2, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(9, 5, 1, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(10, 5, 2, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(11, 6, 1, NULL, NULL),
(12, 6, 3, NULL, NULL),
(15, 7, 2, NULL, NULL),
(16, 8, 1, NULL, NULL),
(17, 8, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `film_genre`
--

CREATE TABLE `film_genre` (
  `id` bigint UNSIGNED NOT NULL,
  `film_id` bigint UNSIGNED NOT NULL,
  `genre_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `film_genre`
--

INSERT INTO `film_genre` (`id`, `film_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(2, 1, 2, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(3, 2, 2, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(4, 2, 3, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(5, 3, 1, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(6, 3, 5, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(7, 4, 2, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(8, 4, 3, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(9, 5, 1, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(10, 5, 4, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(11, 6, 1, NULL, NULL),
(12, 6, 2, NULL, NULL),
(13, 6, 3, NULL, NULL),
(14, 6, 4, NULL, NULL),
(15, 7, 2, NULL, NULL),
(17, 7, 4, NULL, NULL),
(18, 8, 1, NULL, NULL),
(19, 8, 2, NULL, NULL),
(20, 8, 3, NULL, NULL),
(21, 8, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id`, `nama_genre`, `created_at`, `updated_at`) VALUES
(1, 'Action', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(2, 'Drama', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(3, 'Comedy', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(4, 'Horror', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(5, 'Sci-Fi', '2025-03-18 23:48:53', '2025-03-18 23:48:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentars`
--

CREATE TABLE `komentars` (
  `id` bigint UNSIGNED NOT NULL,
  `film_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `isi_komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komentars`
--

INSERT INTO `komentars` (`id`, `film_id`, `user_id`, `isi_komentar`, `created_at`, `updated_at`, `parent_id`) VALUES
(1, 1, 2, 'trwrhrwwrhhw', '2025-03-19 18:48:51', '2025-03-19 18:48:51', NULL),
(2, 1, 2, 'tytrhyyfrhwdh', '2025-03-19 21:45:04', '2025-03-19 21:45:04', NULL),
(3, 1, 2, 'tejrytkuthjykh', '2025-03-19 21:45:10', '2025-03-19 21:45:10', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_10_010511_create_film_table', 1),
(5, '2025_02_13_064650_create_genre_table', 1),
(6, '2025_02_14_010743_create_tahun_table', 1),
(7, '2025_02_14_013914_create_negara_table', 1),
(8, '2025_02_21_064417_create_film_genre_table', 1),
(9, '2025_03_04_134343_create_komentar_table', 1),
(10, '2025_03_05_035320_create_watchlists_table', 1),
(11, '2025_03_06_053929_create_ratings_table', 1),
(12, '2025_03_06_063213_add_parent_id_to_komentars_table', 1),
(13, '2025_03_18_065210_create_aktor_table', 1),
(14, '2025_03_19_060042_create_film_aktor_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `negara`
--

CREATE TABLE `negara` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_negara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `negara`
--

INSERT INTO `negara` (`id`, `nama_negara`, `created_at`, `updated_at`) VALUES
(1, 'USA', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(2, 'Japan', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(3, 'Korea', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(4, 'Indonesia', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(5, 'France', '2025-03-18 23:48:53', '2025-03-18 23:48:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `film_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `film_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 8, '2025-03-19 18:48:56', '2025-03-19 21:44:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NCiR1GgIszZDPH3oBIZyEd2VIN8Zfnp6EaEaMs33', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibmJxNjY0ejBTQ3Rjc3lvUzF4RktCNlV3dGJVcWF2VTB3bUtCdXNKcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9maWxtMi50ZXN0L2Rhc2hib2FyZCI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjM6Imh0dHA6Ly9maWxtMi50ZXN0L2FkbWluIjt9fQ==', 1742451205);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_tahun` year NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`id`, `nama_tahun`, `created_at`, `updated_at`) VALUES
(1, '2010', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(2, '2019', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(3, '2001', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(4, '2011', '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(5, '2024', '2025-03-18 23:48:53', '2025-03-18 23:48:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin','author') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$f2NXnauwcBxuHKUWoAES3.kJ5U4IiNxMsR7AdDr.Yo8FE5ZvqBxd6', 'admin', NULL, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(2, 'User', 'Apalah@gmail.com', NULL, '$2y$12$FtAPlY8fkWXXQy8BW.Bv4ON0/fKQdvO7.eV4MHBWSzx1chKgQ9ZCC', 'user', NULL, '2025-03-18 23:48:53', '2025-03-18 23:48:53'),
(3, 'Author', 'author@gmail.com', NULL, '$2y$12$r4kWXToijdRONyEuGudUxeY421pO1ojNMWjZmHoD9LVs.niKeBHXu', 'author', NULL, '2025-03-18 23:48:53', '2025-03-18 23:48:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `watchlists`
--

CREATE TABLE `watchlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `film_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `watchlists`
--

INSERT INTO `watchlists` (`id`, `user_id`, `film_id`, `created_at`, `updated_at`) VALUES
(5, 2, 1, '2025-03-19 21:44:20', '2025-03-19 21:44:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktor`
--
ALTER TABLE `aktor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aktor_nama_aktor_unique` (`nama_aktor`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `films_author_id_foreign` (`author_id`);

--
-- Indeks untuk tabel `film_aktor`
--
ALTER TABLE `film_aktor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_aktor_film_id_foreign` (`film_id`),
  ADD KEY `film_aktor_aktor_id_foreign` (`aktor_id`);

--
-- Indeks untuk tabel `film_genre`
--
ALTER TABLE `film_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_genre_film_id_foreign` (`film_id`),
  ADD KEY `film_genre_genre_id_foreign` (`genre_id`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genre_nama_genre_unique` (`nama_genre`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentars_film_id_foreign` (`film_id`),
  ADD KEY `komentars_user_id_foreign` (`user_id`),
  ADD KEY `komentars_parent_id_foreign` (`parent_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `negara_nama_negara_unique` (`nama_negara`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_film_id_foreign` (`film_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tahun_nama_tahun_unique` (`nama_tahun`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `watchlists`
--
ALTER TABLE `watchlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `watchlists_user_id_foreign` (`user_id`),
  ADD KEY `watchlists_film_id_foreign` (`film_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktor`
--
ALTER TABLE `aktor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `film_aktor`
--
ALTER TABLE `film_aktor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `film_genre`
--
ALTER TABLE `film_genre`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `negara`
--
ALTER TABLE `negara`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `watchlists`
--
ALTER TABLE `watchlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `film_aktor`
--
ALTER TABLE `film_aktor`
  ADD CONSTRAINT `film_aktor_aktor_id_foreign` FOREIGN KEY (`aktor_id`) REFERENCES `aktor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `film_aktor_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `film_genre`
--
ALTER TABLE `film_genre`
  ADD CONSTRAINT `film_genre_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `film_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentars`
--
ALTER TABLE `komentars`
  ADD CONSTRAINT `komentars_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentars_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `komentars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `watchlists`
--
ALTER TABLE `watchlists`
  ADD CONSTRAINT `watchlists_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watchlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
