-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Gru 2016, 12:53
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
  `opis` text COLLATE utf8_polish_ci NOT NULL,
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
(1, 'Gra Wiedźmin 3', '3', 'Wiedźmin 3: Dziki Gon to opracowana przez zespół CD Projekt RED gra cRPG. Ponownie wcielamy się w Geralta z Rivii, ale tym razem akcja osadzona jest w świecie o otwartej strukturze. Autorzy gruntownie przebudowali mechanikę walki, zaoferowali nowy silnik oraz położyli znacznie większy nacisk na zadania poboczne.', '2016-12-08 10:08:54', '55.94', 1, 1, NULL, '2016-11-20 23:00:00', NULL),
(2, 'Gra Skyrim', '1', 'The Elder Scrolls V: Skyrim to wyprodukowana przez firmę Bethesda Game Studios piąta odsłona popularnego cyklu cRPG. Akcja gry osadzona została 200 lat po wydarzeniach przedstawionych w The Elder Scrolls IV: Oblivion. Gracze wcielają się w rolę osoby władającej językiem smoków (Dovahkiin) i podążając tropem starożytnej przepowiedni próbują powstrzymać nadejście Alduina, boga zniszczenia, który zagraża całemu kontynentowi Tamriel. Wraz z postępami w grze postać nabywa nowe umiejętności i doskonali już posiadane.', '2016-12-08 10:02:03', '9.00', 1, 1, NULL, '2016-11-18 23:00:00', NULL),
(3, 'Pani Jeziora', '1', 'Andrzej Sapkowski, arcymistrz światowej fantasy, zaprasza do swojego Neverlandu i przedstawia uwielbianą przez czytelników i wychwalaną przez krytykę wiedźmińską sagę!\r\n\r\nCiri wpatruje się w wypukły relief\r\nprzedstawiający ogromnego łuskowatego węża.\r\nGad, zwinąwszy się w kształt ósemki,\r\nwgryzł się zębiskami we własny ogon.\r\n\r\nTo pradawny wąż Uroboros.\r\n\r\nSymbolizuje nieskończoność i sam jest nieskończonością.\r\nJest wiecznym odchodzeniem i wiecznym powracaniem.\r\nJest czymś, co nie ma ani początku, ani końca.\r\n\r\nA to, że Uroboros gryzie swój ogon,\r\noznacza, że koło jest zamknięte.\r\n\r\nCiri, córko Pavetty! Wjedź w portal,\r\npodążaj drogą wiodącą na spotkanie przeznaczenia!\r\nKoło się zamknęło – myśli Ciri, zamykając oczy.\r\n„Jadę, Geralt! Nie zostawię cię samego!”\r\n\r\nCoś się kończy, coś się zaczyna.\r\n\r\nW każdym momencie czasu kryje się wieczność.', '2016-12-16 13:00:29', '20.00', 2, 1, NULL, '2016-12-08 10:54:06', NULL),
(4, 'Sezon Burz', '3', 'Oto nowy Sapkowski i nowy wiedźmin. Mistrz polskiej fantastyki znowu zaskakuje. „Sezon burz” nie opowiada bowiem o młodzieńczych latach białowłosego zabójcy potworów ani o jego losach po śmierci/nieśmierci kończącej ostatni tom sagi. \r\n„Nigdy nie mów nigdy!” W powieści pojawiają się osoby doskonale czytelnikom znane, jak wierny druh Geralta – bard i poeta Jaskier – oraz jego ukochana, zwodnicza czarodziejka Yennefer, ale na scenę wkraczają też dosłownie i w przenośni postaci z zupełnie innych bajek. Ludzie, nieludzie i magiczną sztuką wyhodowane bestie. Opowieść zaczyna się wedle reguł gatunku: od trzęsienia ziemi, a potem napięcie rośnie. Wiedźmin stacza morderczą walkę z drapieżnikiem, który żyje tylko po to, żeby zabijać, wdaje się w bójkę z rosłymi, niezbyt sympatycznymi strażniczkami miejskimi, staje przed sądem, traci swe słynne miecze i przeżywa burzliwy romans z rudowłosą pięknością, zwaną Koral. A w tle toczą się królewskie i czarodziejskie intrygi. Pobrzmiewają pioruny i szaleją burze. I tak przez 404 strony porywającej lektury. \r\n\r\nWIEDŹMIN. SEZON BURZ to w wiedźmińskiej historii rzecz osobna, nie prapoczątek i nie kontynuacja. Jak pisze Autor: Opowieść trwa. Historia nie kończy się nigdy…', '2016-12-10 14:00:59', '100.00', 1, NULL, NULL, '2016-12-08 11:17:18', NULL);

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
(1, 2, 'icon-garden.png'),
(2, 2, 'aha.png'),
(3, 1, '76084339.jpg'),
(4, 3, 'Pani-Jeziora.jpg'),
(5, 4, '490986-352x500.jpg'),
(6, 4, '490986-352x5001.jpg'),
(7, 4, 'Sezon-Burz-okladka.jpg');

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
(0, 2, '1', '9.00', NULL, '2016-11-21 10:11:59', NULL),
(0, 3, '1', '20.00', NULL, '2016-12-08 11:12:15', NULL);

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
(1, 'Andrzej', 'Duda', 'duda@duda.pl', '1234'),
(2, 'Mariusz', 'Pudzianowski', 'pudzian@pudzian.pl', '1234');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
