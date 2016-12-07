-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Lis 2016, 13:21
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt_serwis`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `auctions`
--

CREATE TABLE `auctions` (
  `id` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `typ` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `koniec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cena` decimal(10,2) NOT NULL,
  `id_wlasciciela` int(10) UNSIGNED NOT NULL,
  `id_zwyciezcy` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `auctions`
--

INSERT INTO `auctions` (`id`, `nazwa`, `typ`, `opis`, `koniec`, `cena`, `id_wlasciciela`, `id_zwyciezcy`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', '3', 'test', '2016-11-20 23:11:18', '55.94', 1, 1, NULL, '2016-11-20 23:00:00', NULL),
(2, 'tes5', '1', '15221521512', '2016-11-26 00:01:51', '9.00', 1, 1, NULL, '2016-11-18 23:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `od` int(11) NOT NULL,
  `do` int(11) NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `messages`
--

INSERT INTO `messages` (`id`, `od`, `do`, `tresc`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Czesc', '2016-11-12 18:45:14', '0000-00-00 00:00:00'),
(2, 2, 1, 'No cześć', '2016-11-12 18:45:14', '0000-00-00 00:00:00'),
(3, 1, 2, 'co tam', '2016-11-12 18:45:37', '0000-00-00 00:00:00'),
(4, 2, 1, 'w porządku', '2016-11-12 18:45:37', '0000-00-00 00:00:00'),
(5, 2, 3, 'A ciebie nie lubie', '2016-11-12 18:46:03', '0000-00-00 00:00:00'),
(6, 1, 2, 'To git', '2016-11-12 20:13:37', '2016-11-12 20:13:37'),
(7, 1, 3, 'Cześć', '2016-11-12 20:34:24', '2016-11-12 20:34:24'),
(8, 1, 3, 'Cześć!!!!', '2016-11-12 20:34:36', '2016-11-12 20:34:36');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `id_aukcji` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `photos`
--

INSERT INTO `photos` (`id`, `id_aukcji`, `photo`) VALUES
(1, 2, 'icon-garden4.png'),
(2, 2, 'aha.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stories`
--

CREATE TABLE `stories` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_aukcji` int(10) UNSIGNED NOT NULL,
  `id_użytkownika` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `stories`
--

INSERT INTO `stories` (`id`, `id_aukcji`, `id_użytkownika`, `cena`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '6.00', NULL, NULL, NULL),
(2, 1, '1', '10.00', NULL, '2016-11-11 17:21:07', '2016-11-11 17:21:07'),
(3, 1, '1', '20.00', NULL, '2016-11-11 18:09:47', '2016-11-11 18:09:47'),
(4, 1, '2', '100.00', NULL, '2016-11-11 18:47:59', '2016-11-11 18:47:59'),
(5, 1, '2', '101.00', NULL, '2016-11-11 19:02:05', '2016-11-11 19:02:05'),
(0, 2, '1', '9.00', NULL, '2016-11-21 10:11:59', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `udzial`
--

CREATE TABLE `udzial` (
  `id` int(10) UNSIGNED DEFAULT NULL,
  `nazwa` varchar(255) DEFAULT NULL,
  `typ` varchar(255) DEFAULT NULL,
  `opis` varchar(255) DEFAULT NULL,
  `zdjęcie` varchar(255) DEFAULT NULL,
  `czas` float DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL,
  `id_wlasciciela` int(10) UNSIGNED DEFAULT NULL,
  `id_zwyciezcy` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_użytkownika` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `imie` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `imie`, `nazwisko`, `email`, `password`) VALUES
(1, 'Andrzej', 'Duda', 'duda@duda.pl', '1234');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aukcji` (`id_aukcji`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
