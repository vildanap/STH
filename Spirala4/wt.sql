-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 06:38 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id` int(11) NOT NULL,
  `odgovor` text COLLATE utf8_slovenian_ci,
  `redni` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id`, `odgovor`, `redni`) VALUES
(1, 'Seher', 1),
(2, 'Vrhbosna', 2),
(3, 'Seher', 3),
(4, 'Vrhbosna', 4),
(5, 'Seher', 5),
(25, 'Seher', 6),
(26, 'Seher', 7),
(27, 'Vrhbosna', 8),
(28, 'Seher', 9),
(29, 'Seher', 10);

-- --------------------------------------------------------

--
-- Table structure for table `dogadjaji`
--

CREATE TABLE `dogadjaji` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `mjesto` varchar(30) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `vrijeme` varchar(40) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `tip` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `dogadjaji`
--

INSERT INTO `dogadjaji` (`id`, `naziv`, `mjesto`, `vrijeme`, `tip`) VALUES
(1, 'Zmaja od Bosne', 'Narodno pozorište', '20.00h 30.12.2016.', 'predstava'),
(2, 'James Zabiela', 'Bjelašnica', '21.00 25.12.2016.', 'koncert'),
(3, 'Balkan Photo Awards', 'Vijećnica', '19.00 27.1.2017.', 'izložba'),
(4, 'Van Gogh', 'Cinemas ', '21.00 30.12.2016.', 'koncert'),
(26, 'Balkan Photo Award', 'Vijećnica', '19.00 27.1.2017.', 'izložba');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(2, 'vildana', 'e10adc3949ba59abbe56e057f20f883e', 'vildanapanjeta96@gmail.com'),
(3, 'vildana2', 'e10adc3949ba59abbe56e057f20f883e', 'vildapanjeta96@gmail.com'),
(6, 'vildana3', 'e10adc3949ba59abbe56e057f20f883e', 'vildanapanjeta96@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `ime` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `prezime` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `spol` varchar(7) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `tekst` text COLLATE utf8_slovenian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `ime`, `prezime`, `spol`, `tekst`) VALUES
(1, 'Vildana', 'Panjeta', 'Žensko', 'Ukoliko se sve najave najvećeg proizvođača električnih automobila ostvare, 2017. bi zaista mogla biti godina u kojoj će Tesla industriji električnih vozila dati još veći zamah, a time i učvrstiti svoju poziciju lidera.\r\n\r\nPrvo, Tesla za 2017. godinu planira početak prodaje Modela 3 namijenjenog „običnim smrtnicima“ za cijenu od 30.000 dolara. Ovaj automobil će se prodavati brže i lakše, a pretpostavlja se da će i proizvodnja biti manje problematična te da se neće ponoviti spora proizvodnja Modela X.\r\n\r\nDrugo, Tesla planira otvoriti još više stanica za punjenje širom svijeta, a posebno u Sjedinjenim Američkim Državama i Evropi. Cilj kompanije Elona Muska jeste kreirati mrežu koja će osigurati dugotrajna putovanja električnim automobilima.\r\n'),
(2, 'Amina', 'Puce', 'Žensko', 'Pete - Tesla Motors bi mogao pristupiti starom principu proizvodnje pod nazivom vertikalna integracija. Kao što je nekada davno Henry Ford pokrenuo biznis upravo koristeći ovaj princip, Elon Musk bi kroz vertikalnu integraciju koja je napuštena u posljednjih 40 godina, proces dobavljanja dijelova i materijala stavio pod jedinstven menadžment Tesla Motorsa. Danas, sve tvornice automobila dobavljanje djelov ai materijala prepuštaju partnerskim firmama.\r\n\r\nŠesto, Tesla će najvjerovatnije u narednoj godini još više poraditi na usavršavanju svog autopilota, u smislu i hardvera i softvera.\r\n'),
(3, 'Neko', 'Neko', 'Muško', 'Novi Roadster je sedmi razlog zbog kojeg bi Tesla mogao imati jako dobru godinu. Naime, prvi Teslin automobil mogao bi dobiti svoga nasljednika ili u najmanju ruku značajan update. Osmi razlog jeste spekulacija o Modelu Y, automobilu koji bi trebao biti prezentovan 2017., a navodno je riječ o crossoveru Modela 3. Deveti razlog je također nezvanična najava Teslinog pickupa.');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `ocjena` int(11) NOT NULL,
  `dogadjaj` int(11) NOT NULL,
  `korisnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `ocjena`, `dogadjaj`, `korisnik`) VALUES
(19, 4, 2, 2),
(20, 5, 3, 2),
(22, 5, 1, 3),
(23, 4, 3, 3),
(24, 2, 4, 2),
(26, 5, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dogadjaji`
--
ALTER TABLE `dogadjaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dogadjaj` (`dogadjaj`),
  ADD KEY `korisnik` (`korisnik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `dogadjaji`
--
ALTER TABLE `dogadjaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`dogadjaj`) REFERENCES `dogadjaji` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`korisnik`) REFERENCES `korisnici` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
