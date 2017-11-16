-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Mar 2017, 21:07
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `footballnews`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `game`
--

CREATE TABLE `game` (
  `ID` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `team1_id` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `game`
--

INSERT INTO `game` (`ID`, `date`, `team1_id`, `team2_id`) VALUES
(1, 'dziś', 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team`
--

CREATE TABLE `team` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `team`
--

INSERT INTO `team` (`ID`, `name`) VALUES
(1, 'Odra Opole'),
(2, 'WKS');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `updates`
--

CREATE TABLE `updates` (
  `ID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `goals_team_1` int(11) NOT NULL,
  `goals_team_2` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `verified` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `updates`
--

INSERT INTO `updates` (`ID`, `date`, `goals_team_1`, `goals_team_2`, `game_id`, `verified`) VALUES
(1, '2017-03-29 17:41:04', 1, 2, 1, 1),
(2, '2017-03-29 17:43:44', 3, 3, 1, 1),
(3, '2017-03-29 18:09:42', 3, 4, 1, 1),
(4, '2017-03-29 18:19:05', 4, 4, 1, 1),
(5, '2017-03-29 18:19:31', 4, 4, 1, 1),
(6, '2017-03-29 18:19:58', 4, 4, 1, 1),
(7, '2017-03-29 18:34:57', 5, 5, 1, 1),
(8, '2017-03-29 18:40:08', 6, 6, 1, 1),
(9, '2017-03-29 18:48:45', 7, 7, 1, 0),
(10, '2017-03-29 18:50:50', 7, 7, 1, 0),
(11, '2017-03-29 18:51:26', 9, 9, 1, 0),
(12, '2017-03-29 18:51:44', 10, 10, 1, 0),
(13, '2017-03-29 18:52:26', 11, 11, 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `ID` int(10) UNSIGNED NOT NULL,
  `user` varchar(25) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`ID`, `user`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `game`
--
ALTER TABLE `game`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `team`
--
ALTER TABLE `team`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `updates`
--
ALTER TABLE `updates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
