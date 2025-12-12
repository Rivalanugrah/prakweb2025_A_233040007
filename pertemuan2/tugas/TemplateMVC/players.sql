-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 12 Nov 2025 pada 03.24
-- Versi server: 5.7.39
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakweb2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `nationality` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `players`
--

INSERT INTO `players` (`id`, `name`, `position`, `number`, `age`, `nationality`) VALUES
(1, 'Thibaut Courtois', 'Goalkeeper', 1, 33, 'Belgium'),
(2, 'Dani Carvajal', 'Defender', 2, 33, 'Spain'),
(3, 'Éder Militão', 'Defender', 3, 27, 'Brazil'),
(4, 'Luka Modrić', 'Midfielder', 10, 40, 'Croatia'),
(5, 'Vinícius Júnior', 'Forward', 7, 25, 'Brazil'),
(6, 'Jude Bellingham', 'Midfielder', 5, 22, 'England');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
