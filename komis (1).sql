-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Lut 2023, 16:42
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `komis`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kolor`
--

CREATE TABLE `kolor` (
  `id_koloru` int(11) NOT NULL,
  `kolor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kolor`
--

INSERT INTO `kolor` (`id_koloru`, `kolor`) VALUES
(1, 'Biały'),
(2, 'Czarny'),
(3, 'Szary'),
(4, 'Srebrny'),
(5, 'Niebieski'),
(6, 'Brązowy-Beżowy'),
(7, 'Czerwony'),
(8, 'Zielony'),
(9, 'Żółty-Złoty'),
(10, 'Inny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `marka`
--

CREATE TABLE `marka` (
  `id_marki` int(2) NOT NULL,
  `nazwa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `marka`
--

INSERT INTO `marka` (`id_marki`, `nazwa`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'Citroen'),
(4, 'Dacia'),
(5, 'Fiat'),
(6, 'Ford'),
(7, 'Hyundai'),
(8, 'Kia'),
(9, 'Mercedes'),
(10, 'Nissan'),
(11, 'Opel'),
(12, 'Peugeot'),
(13, 'Renault'),
(14, 'SEAT'),
(15, 'Skoda'),
(16, 'Toyota'),
(17, 'Volkswagen'),
(18, 'Volvo');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `model`
--

CREATE TABLE `model` (
  `id_modelu` int(2) NOT NULL,
  `id_marki` int(2) NOT NULL,
  `nazwa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `model`
--

INSERT INTO `model` (`id_modelu`, `id_marki`, `nazwa`) VALUES
(1, 1, 'A1'),
(2, 1, 'A1'),
(3, 1, 'A3'),
(4, 1, 'A4'),
(5, 1, 'A5'),
(6, 1, 'A6'),
(7, 1, 'A7'),
(8, 1, 'A8'),
(9, 1, 'Q2'),
(10, 1, 'Q3'),
(11, 1, 'Q4'),
(12, 1, 'Q5'),
(13, 1, 'Q7'),
(14, 1, 'Q8'),
(15, 1, 'R8'),
(16, 1, 'TT'),
(17, 2, 'M1'),
(18, 2, 'M3'),
(19, 2, 'M5'),
(20, 2, 'M6'),
(21, 2, 'Seria 1'),
(22, 2, 'Seria 3'),
(23, 2, 'Seria 5'),
(24, 2, 'Seria 6'),
(25, 2, 'Seria 7'),
(26, 2, 'X1'),
(27, 2, 'X2'),
(28, 2, 'X3'),
(29, 2, 'X4'),
(30, 2, 'X5'),
(31, 2, 'X6'),
(32, 2, 'Z3'),
(33, 2, 'Z4'),
(34, 3, 'AX'),
(35, 3, 'Berlingo'),
(36, 3, 'BX'),
(37, 3, 'c-Crosser'),
(38, 3, 'C1'),
(39, 3, 'C2'),
(40, 3, 'C3'),
(41, 3, 'C3 Picasso'),
(42, 3, 'C4'),
(43, 3, 'C4 Picasso'),
(44, 3, 'C5'),
(45, 3, 'C6'),
(46, 3, 'C8'),
(47, 3, 'CX'),
(48, 3, 'DS'),
(49, 3, 'Evasion'),
(50, 3, 'GSA'),
(51, 3, 'Saxo'),
(52, 3, 'Xsara'),
(53, 3, 'ZX'),
(54, 4, 'Duster'),
(55, 4, 'Logan'),
(56, 4, 'Sandero'),
(57, 4, 'Lodgy'),
(58, 5, '125p'),
(59, 5, '126'),
(60, 5, '500'),
(61, 5, '600'),
(62, 5, 'Albea'),
(63, 5, 'Barchetta'),
(64, 5, 'Brava'),
(65, 5, 'Bravo'),
(66, 5, 'Cinquecento'),
(67, 5, 'Coupe'),
(68, 5, 'Doblo'),
(69, 5, 'Ducato'),
(70, 5, 'Freemont'),
(71, 5, 'Grande Punto'),
(72, 5, 'Idea'),
(73, 5, 'Multipla'),
(74, 5, 'Panda'),
(75, 5, 'Punto'),
(76, 5, 'Qubo'),
(77, 5, 'Scudo'),
(78, 5, 'Seicento'),
(79, 5, 'Stilo'),
(80, 5, 'Tipo'),
(81, 5, 'Uno'),
(82, 6, 'B-MAX'),
(83, 6, 'C-MAX'),
(84, 6, 'Cougar'),
(85, 6, 'Escape'),
(86, 6, 'Escort'),
(87, 6, 'Explorer'),
(88, 6, 'Fiesta'),
(89, 6, 'Focus'),
(90, 6, 'Fusion'),
(91, 6, 'Galaxy'),
(92, 6, 'KA'),
(93, 6, 'Kuga'),
(94, 6, 'Maverick'),
(95, 6, 'Mondeo'),
(96, 6, 'Mustang'),
(97, 6, 'Ranger'),
(98, 6, 'S-MAX'),
(99, 6, 'Tourneo'),
(100, 7, 'Accent'),
(101, 7, 'Coupe'),
(102, 7, 'Elantra'),
(103, 7, 'Getz'),
(104, 7, 'i10'),
(105, 7, 'i20'),
(106, 7, 'i30'),
(107, 7, 'i40'),
(108, 7, 'Lantra'),
(109, 7, 'Santa Fe'),
(110, 7, 'Terracan'),
(111, 7, 'Tucson'),
(112, 7, 'Veracruz'),
(113, 7, 'ix20'),
(114, 7, 'ix35'),
(115, 7, 'ix55'),
(116, 8, 'Ceed'),
(117, 8, 'Cerato'),
(118, 8, 'Joice'),
(119, 8, 'Magentis'),
(120, 8, 'Optima'),
(121, 8, 'Picanto'),
(122, 8, 'Rio'),
(123, 8, 'Sephia'),
(124, 8, 'Sorento'),
(125, 8, 'Soul'),
(126, 8, 'Sportage'),
(127, 8, 'Venga'),
(128, 9, 'A Klasa'),
(129, 9, 'B Klasa'),
(130, 9, 'C Klasa'),
(131, 9, 'CL Klasa'),
(132, 9, 'CLA'),
(133, 9, 'CLK Klasa'),
(134, 9, 'CLS Klasa'),
(135, 9, 'CLC'),
(136, 9, 'E Klasa'),
(137, 9, 'G Klasa'),
(138, 9, 'GL Klasa'),
(139, 9, 'GLK Klasa'),
(140, 9, 'S Klasa'),
(141, 9, 'SL Klasa'),
(142, 9, 'SLK Klasa'),
(143, 9, 'Seria 190'),
(144, 9, 'Seria 200'),
(145, 9, 'Seria 300'),
(146, 9, 'Vaneo'),
(147, 9, 'Viano'),
(148, 9, 'Vito'),
(149, 9, 'W123'),
(150, 9, 'W124'),
(151, 9, 'X Klasa'),
(152, 10, 'Almera'),
(153, 10, 'GT-R'),
(154, 10, 'Juke'),
(155, 10, 'Maxima'),
(156, 10, 'Micra'),
(157, 10, 'Murano'),
(158, 10, 'Navara'),
(159, 10, 'Note'),
(160, 10, 'Pixo'),
(161, 10, 'Primera'),
(162, 10, 'Qashqai'),
(163, 10, 'Sentra'),
(164, 10, 'Skyline'),
(165, 10, 'Terrano'),
(166, 10, 'X-Trail'),
(167, 11, 'Antara'),
(168, 11, 'Ascona'),
(169, 11, 'Astra'),
(170, 11, 'Calibra'),
(171, 11, 'Combo'),
(172, 11, 'Corsa'),
(173, 11, 'Crossland X'),
(174, 11, 'Grandland X'),
(175, 11, 'GT'),
(176, 11, 'Insignia'),
(177, 11, 'Kadett'),
(178, 11, 'Meriva'),
(179, 11, 'Mokka'),
(180, 11, 'Tigra'),
(181, 11, 'Vectra'),
(182, 11, 'Vivaro'),
(183, 11, 'Zafira'),
(184, 12, '106'),
(185, 12, '107'),
(186, 12, '205'),
(187, 12, '206'),
(188, 12, '207'),
(189, 12, '208'),
(190, 12, '301'),
(191, 12, '306'),
(192, 12, '307'),
(193, 12, '308'),
(194, 12, '309'),
(195, 12, '404'),
(196, 12, '405'),
(197, 12, '406'),
(198, 12, '407'),
(199, 12, '508'),
(200, 12, '605'),
(201, 12, '607'),
(202, 12, '806'),
(203, 12, '807'),
(204, 12, '1007'),
(205, 12, '3008'),
(206, 12, '4007'),
(207, 12, '5008'),
(208, 12, 'Expert'),
(209, 12, 'Partner'),
(210, 12, 'RCZ'),
(211, 13, 'Clio'),
(212, 13, 'Coupe'),
(213, 13, 'Espace'),
(214, 13, 'Fluence'),
(215, 13, 'Grand Espace'),
(216, 13, 'Grand Scenic'),
(217, 13, 'Kangoo'),
(218, 13, 'Koleos'),
(219, 13, 'Laguna'),
(220, 13, 'Megane'),
(221, 13, 'Modus'),
(222, 13, 'Scenic'),
(223, 13, 'Trafic'),
(224, 13, 'Twingo'),
(225, 14, 'Altea'),
(226, 14, 'Arona'),
(227, 14, 'Arosa'),
(228, 14, 'Cordoba'),
(229, 14, 'Exeo'),
(230, 14, 'Ibiza'),
(231, 14, 'Inca'),
(232, 14, 'Leon'),
(233, 14, 'Malaga'),
(234, 14, 'Mii'),
(235, 14, 'Terra'),
(236, 14, 'Toledo'),
(237, 15, '100'),
(238, 15, '105'),
(239, 15, '120'),
(240, 15, '135'),
(241, 15, 'Fabia'),
(242, 15, 'Favorit'),
(243, 15, 'Felicia'),
(244, 15, 'Kamiq'),
(245, 15, 'Kodiaq'),
(246, 15, 'Octavia'),
(247, 15, 'Rapid'),
(248, 15, 'Roomster'),
(249, 15, 'Superb'),
(250, 16, 'Auris'),
(251, 16, 'Avensis'),
(252, 16, 'Aygo'),
(253, 16, 'Camry'),
(254, 16, 'Celica'),
(255, 16, 'Corolla'),
(256, 16, 'Highlander'),
(257, 16, 'Hilux'),
(258, 16, 'Land Cruiser'),
(259, 16, 'Matrix'),
(260, 16, 'Paseo'),
(261, 16, 'Prius'),
(262, 16, 'RAV-4'),
(263, 16, 'Supra'),
(264, 16, 'Tacoma'),
(265, 16, 'Verso'),
(266, 16, 'Yaris'),
(267, 17, 'Amarok'),
(268, 17, 'Arteon'),
(269, 17, 'Beetle'),
(270, 17, 'Bora'),
(271, 17, 'Caddy'),
(272, 17, 'Caravelle'),
(273, 17, 'Corrado'),
(274, 17, 'Fox'),
(275, 17, 'Garbus'),
(276, 17, 'Golf'),
(277, 17, 'Jetta'),
(278, 17, 'Passat'),
(279, 17, 'Phaeton'),
(280, 17, 'Polo'),
(281, 17, 'Scirocco'),
(282, 17, 'Tiguan'),
(283, 17, 'Touareg'),
(284, 17, 'Touran'),
(285, 17, 'Up!'),
(286, 17, 'Vento'),
(287, 18, '240'),
(288, 18, '244'),
(289, 18, '440'),
(290, 18, '460'),
(291, 18, '480'),
(292, 18, '740'),
(293, 18, '760'),
(294, 18, '780'),
(295, 18, '850'),
(296, 18, '940'),
(297, 18, '945'),
(298, 18, '960'),
(299, 18, '965'),
(300, 18, 'Amazon'),
(301, 18, 'C30'),
(302, 18, 'C70'),
(303, 18, 'Polar'),
(304, 18, 'S40'),
(305, 18, 'S60'),
(306, 18, 'S70'),
(307, 18, 'S80'),
(308, 18, 'S90'),
(309, 18, 'V40'),
(310, 18, 'V50'),
(311, 18, 'V60'),
(312, 18, 'V70'),
(313, 18, 'V90'),
(314, 18, 'XC40'),
(315, 18, 'XC60'),
(316, 18, 'XC70'),
(317, 18, 'XC90');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinie`
--

CREATE TABLE `opinie` (
  `id_opini` int(3) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `tresc` text NOT NULL,
  `ocena` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `paliwo`
--

CREATE TABLE `paliwo` (
  `id` int(1) NOT NULL,
  `rodzaj_paliwa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `paliwo`
--

INSERT INTO `paliwo` (`id`, `rodzaj_paliwa`) VALUES
(1, 'Diesel'),
(2, 'Benzyna'),
(3, 'Beznyna+LPG'),
(4, 'Hybryda'),
(5, 'Elektryczny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pochodzenie`
--

CREATE TABLE `pochodzenie` (
  `id_kraju` int(2) NOT NULL,
  `kraj` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pochodzenie`
--

INSERT INTO `pochodzenie` (`id_kraju`, `kraj`) VALUES
(1, 'Austria'),
(2, 'Belgia'),
(3, 'Białoruś'),
(4, 'Bułgaria'),
(5, 'Chorwacja'),
(6, 'Czechy'),
(7, 'Dania'),
(8, 'Estonia'),
(9, 'Finlandia'),
(10, 'Grecja'),
(11, 'Holandia'),
(12, 'Hiszpania'),
(13, 'Irlandia'),
(14, 'Islandia'),
(15, 'Japonia'),
(16, 'Kanada'),
(17, 'Liechtenstein'),
(18, 'Litwa'),
(19, 'Luksemburg'),
(20, 'Łotwa'),
(21, 'Monako'),
(22, 'Niemcy'),
(23, 'Norwegia'),
(24, 'Polska'),
(25, 'Rosja'),
(26, 'Rumunia'),
(27, 'Słowacja'),
(28, 'Słowenia'),
(29, 'Stany Zjednoczo'),
(30, 'Szwajcaria'),
(31, 'Szwecja'),
(32, 'Turcja'),
(33, 'Ukraina'),
(34, 'Wielka Brytania'),
(35, 'Włochy'),
(36, 'Inny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `id_samochodu` int(3) NOT NULL,
  `tytul` varchar(50) NOT NULL,
  `marka` int(2) NOT NULL,
  `model` int(3) NOT NULL,
  `kolor` int(2) NOT NULL,
  `pochodzenie` int(2) NOT NULL,
  `stan` int(1) NOT NULL,
  `cena` int(7) NOT NULL,
  `rok_produkcji` int(4) NOT NULL,
  `rodzaj_paliwa` int(1) NOT NULL,
  `przebieg` varchar(7) NOT NULL,
  `pojemnosc_silnika` varchar(4) NOT NULL,
  `moc` varchar(10) NOT NULL,
  `foto` varchar(70) NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `samochody`
--

INSERT INTO `samochody` (`id_samochodu`, `tytul`, `marka`, `model`, `kolor`, `pochodzenie`, `stan`, `cena`, `rok_produkcji`, `rodzaj_paliwa`, `przebieg`, `pojemnosc_silnika`, `moc`, `foto`, `opis`) VALUES
(4, 'Skoda Octavia 2.0 TSI RS DSG', 15, 246, 3, 24, 1, 78888, 2016, 2, '130000', '1984', '220', '1_1.webp;1_2.webp;1_3.webp;1_4.webp;1_5.webp', 'Samochód kupiony w POLSKIM SALONIE SKODA dnia 01,07,2016r JAKO FABRYCZNIE NOWY !!!\r\n\r\nSamochód zarejestrowany na tylko 1 WŁAŚCICIELA OD NOWOŚCI !!!\r\n\r\nSamochód w BOGATEJ wersji wyposażeniowej !!!\r\n\r\nSamochód przygotowany do eksploatacji !!!\r\n\r\nSKODA OCTAVIA VRS 2,0 TSI 220 KM + AUTOMAT DSG Z ŁOPATKAMI + KOLOROWA NAVIGACJA + ELEKTRYKA + KLIMATRONIK x 2 + PARKTRONIK x 2 + TEMPOMAT + BI-XENONY + LEDY + PEŁNA SKÓRZANA TAPICERKA RS + PODGRZEWANE FOTELE + CANTON + SERWIS SKODA !!!\r\n\r\nSAMOCHÓD PREZENTUJE SIE BARDZO DOBRZE.'),
(5, 'BMW 3GT 330i XDrive Luxury Line Sport', 2, 22, 10, 24, 1, 94444, 2017, 2, '193000', '1998', '252', '2_1.webp;2_2.webp;2_3.webp;2_4.webp;2_5.webp', 'Samochód kupiony w POLSKIM SALONIE BMW dnia 07,07,2017r JAKO FABRYCZNIE NOWY !!!\r\n\r\nSamochód zarejestrowany na tylko 1 WŁAŚCICIELA OD NOWOŚCI !!!\r\n\r\nSamochód w BARDZO BOGATEJ wersji wyposażeniowej !!!\r\n\r\nSamochód serwisowany w 100% w ASO SERWIS BMW !!!\r\n\r\nSamochód przygotowany do eksploatacji !!!\r\n\r\nBMW GT INDIVIDUAL 330i 2,0i 252 KM + AUTOMAT Z ŁOPATKAMI + XDRIVE + KOLOROWA NAVIGACJA + KAMERA COFANIA + 360 + KLIMATRONIK x 2 + ELEKTRYKA + PARKTRONIK x 2 + TEMPOMAT + REFLEKTORY BMW ADAPTIVE LED + ASYSTENT PASA RUCHU + HEAD UP + HARMAN KARDON + 100 % SERWIS BMW !!!\r\n\r\nSAMOCHÓD PREZENTUJE SIE BARDZO DOBRZE.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stan`
--

CREATE TABLE `stan` (
  `id_stanu` int(2) NOT NULL,
  `stan_auta` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `stan`
--

INSERT INTO `stan` (`id_stanu`, `stan_auta`) VALUES
(1, 'Nieuszkodz'),
(2, 'Uszkodzony');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `telefon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kolor`
--
ALTER TABLE `kolor`
  ADD PRIMARY KEY (`id_koloru`);

--
-- Indeksy dla tabeli `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id_marki`);

--
-- Indeksy dla tabeli `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_modelu`),
  ADD KEY `id_marki` (`id_marki`);

--
-- Indeksy dla tabeli `opinie`
--
ALTER TABLE `opinie`
  ADD PRIMARY KEY (`id_opini`),
  ADD KEY `nazwa` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `paliwo`
--
ALTER TABLE `paliwo`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pochodzenie`
--
ALTER TABLE `pochodzenie`
  ADD PRIMARY KEY (`id_kraju`);

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`id_samochodu`),
  ADD KEY `kolor` (`kolor`),
  ADD KEY `stan` (`stan`),
  ADD KEY `pochodzenie` (`pochodzenie`),
  ADD KEY `marka` (`marka`),
  ADD KEY `model` (`model`),
  ADD KEY `rodzaj_paliwa` (`rodzaj_paliwa`);

--
-- Indeksy dla tabeli `stan`
--
ALTER TABLE `stan`
  ADD PRIMARY KEY (`id_stanu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kolor`
--
ALTER TABLE `kolor`
  MODIFY `id_koloru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `marka`
--
ALTER TABLE `marka`
  MODIFY `id_marki` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `model`
--
ALTER TABLE `model`
  MODIFY `id_modelu` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT dla tabeli `opinie`
--
ALTER TABLE `opinie`
  MODIFY `id_opini` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `paliwo`
--
ALTER TABLE `paliwo`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `pochodzenie`
--
ALTER TABLE `pochodzenie`
  MODIFY `id_kraju` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT dla tabeli `samochody`
--
ALTER TABLE `samochody`
  MODIFY `id_samochodu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `stan`
--
ALTER TABLE `stan`
  MODIFY `id_stanu` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(3) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`id_marki`) REFERENCES `marka` (`id_marki`);

--
-- Ograniczenia dla tabeli `opinie`
--
ALTER TABLE `opinie`
  ADD CONSTRAINT `nazwa` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`);

--
-- Ograniczenia dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD CONSTRAINT `kolor` FOREIGN KEY (`kolor`) REFERENCES `kolor` (`id_koloru`),
  ADD CONSTRAINT `samochody_ibfk_1` FOREIGN KEY (`pochodzenie`) REFERENCES `pochodzenie` (`id_kraju`),
  ADD CONSTRAINT `samochody_ibfk_2` FOREIGN KEY (`marka`) REFERENCES `marka` (`id_marki`),
  ADD CONSTRAINT `samochody_ibfk_3` FOREIGN KEY (`model`) REFERENCES `model` (`id_modelu`),
  ADD CONSTRAINT `samochody_ibfk_4` FOREIGN KEY (`rodzaj_paliwa`) REFERENCES `paliwo` (`id`),
  ADD CONSTRAINT `stan` FOREIGN KEY (`stan`) REFERENCES `stan` (`id_stanu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
