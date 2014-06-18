-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Cze 2014, 20:56
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `basketmania`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_login` varchar(20) NOT NULL,
  `login_password` varchar(40) NOT NULL,
  `login_email` varchar(40) NOT NULL,
  `login_firstname` varchar(20) NOT NULL,
  `login_lastname` varchar(30) NOT NULL,
  `login_sex` enum('M','K') DEFAULT NULL,
  `login_dataur` date NOT NULL,
  `teamid` int(11) DEFAULT NULL,
  `isLeader` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `login`
--

INSERT INTO `login` (`login_id`, `login_login`, `login_password`, `login_email`, `login_firstname`, `login_lastname`, `login_sex`, `login_dataur`, `teamid`, `isLeader`) VALUES
(1, 'login', 'password', 'email@w.pl', 'blah', 'blahblah', 'M', '0000-00-00', 21, 1),
(2, 'login1', 'password1', '2222222', 'balhh', 'blahblah', 'M', '1000-10-10', NULL, NULL),
(3, 'login2', 'password2', 'sdfasds@sd.ps', 'damian', 'chyb', 'M', '0000-00-00', NULL, NULL),
(4, 'login3', 'password4', 'sdfasds@sd.ps', 'damian', 'chyb', 'M', '0000-00-00', NULL, NULL),
(5, 'login10', 'dsfasdfa', 'dasfasd', 'asdfads', 'adsfa', 'K', '0000-00-00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team_info`
--

CREATE TABLE IF NOT EXISTS `team_info` (
  `tmi_teamid` int(11) NOT NULL AUTO_INCREMENT,
  `tmi_name` varchar(50) NOT NULL,
  `leader` int(11) DEFAULT NULL,
  PRIMARY KEY (`tmi_teamid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Zrzut danych tabeli `team_info`
--

INSERT INTO `team_info` (`tmi_teamid`, `tmi_name`, `leader`) VALUES
(15, 'aaadddcsds', 1),
(16, 'Whaazuup', 1),
(17, 'qqqqqqq', 1),
(18, 'asdfasdfasd', 1),
(19, 'sadfasdfasd', 1),
(20, 'gaesrgrsthadezrtghaes', 1),
(21, 'dasfasdfas', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `turniej_tes1_mecze`
--

CREATE TABLE IF NOT EXISTS `turniej_tes1_mecze` (
  `mecz_id` int(11) NOT NULL AUTO_INCREMENT,
  `team1_id` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL,
  `team1_score` int(11) DEFAULT NULL,
  `team2_score` int(11) DEFAULT NULL,
  `mecz_data` date DEFAULT NULL,
  PRIMARY KEY (`mecz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `turniej_tes1_mecze`
--

INSERT INTO `turniej_tes1_mecze` (`mecz_id`, `team1_id`, `team2_id`, `team1_score`, `team2_score`, `mecz_data`) VALUES
(1, 2, 3, NULL, NULL, '2014-10-05'),
(2, 15, 16, 3, 5, '0000-00-00'),
(3, 16, 17, 31, 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `turniej_tes1_zespoly`
--

CREATE TABLE IF NOT EXISTS `turniej_tes1_zespoly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `turniej_tes1_zespoly`
--

INSERT INTO `turniej_tes1_zespoly` (`id`, `teamid`) VALUES
(16, 15);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
