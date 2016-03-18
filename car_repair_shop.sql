-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Sty 2016, 20:18
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `car_repair_shop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_model` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `car_brand` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `car_production_year` varchar(4) COLLATE utf8_polish_ci NOT NULL,
  `car_registration_number` varchar(7) COLLATE utf8_polish_ci NOT NULL,
  `car_mileage` int(11) NOT NULL,
  `car_vin_number` varchar(17) COLLATE utf8_polish_ci NOT NULL,
  `car_engine_capacity` smallint(6) NOT NULL,
  `car_fuel_type` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `car_power` smallint(6) NOT NULL,
  `car_next_technical_examination` date NOT NULL,
  `car_comment` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `cars`
--

INSERT INTO `cars` (`car_id`, `car_model`, `car_brand`, `car_production_year`, `car_registration_number`, `car_mileage`, `car_vin_number`, `car_engine_capacity`, `car_fuel_type`, `car_power`, `car_next_technical_examination`, `car_comment`) VALUES
(2, '307', 'Peugeot', '2005', 'KLI3215', 2222222, '2GAHG39N5P4105332', 1600, 'Diesel', 44, '2015-06-06', 'srebny'),
(3, 'FOCUS', 'FORD', '2015', 'KLI5324', 256485, '5DSW554684D5648', 1700, 'Benzyna+LPG', 45, '2004-12-02', 'żalowe auto2'),
(4, '206', 'PEUGEOT', '1989', 'KLO2564', 165489, '654D654DDW6548', 1900, 'Hybryda', 66, '2015-06-06', 'asdsadasda'),
(5, 'PUNTO', 'FIAT', '1996', 'KLI22AG', 239272904, 'JS7292Hd8sH92', 1200, 'Benzyna', 44, '2016-06-07', 'Szuper czerwony samochód\r\nnikt nie ma lepszego'),
(6, 'CORSA', 'OPEL', '2002', 'KLI2932', 2345643, 'JI2938JKO2973267H', 1700, 'Diesel', 45, '2015-11-19', 'Niebieski'),
(7, 'MATIZ', 'DAEWO', '2008', 'KGR1239', 1234938, 'JI9283H8273625T', 1000, 'Benzyna+LPG', 36, '2015-10-14', 'ddd'),
(9, '307', 'PEUGEOT', '2013', 'KLI3457', 2000, 'JD(3901dJd', 1600, 'Diesel', 78, '2015-11-18', 'lda'),
(10, 'MUSTANG', 'FORD', '2013', 'KBC 230', 1000, 'HD820J98WED891', 2000, 'Diesel', 100, '2016-01-16', 'Komentarz\r\n');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `client_surname` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `client_post_code` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  `client_postoffice` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `client_street` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `client_house_number` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  `client_local_number` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  `client_phone_number` varchar(15) COLLATE utf8_polish_ci DEFAULT NULL,
  `client_mail_address` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `client_sms_notice` tinyint(1) DEFAULT NULL,
  `client_mail_notice` tinyint(1) DEFAULT NULL,
  `client_comment` text COLLATE utf8_polish_ci,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_surname`, `client_post_code`, `client_postoffice`, `client_street`, `client_house_number`, `client_local_number`, `client_phone_number`, `client_mail_address`, `client_sms_notice`, `client_mail_notice`, `client_comment`) VALUES
(3, 'Jan', 'Kowalski', '12-303', 'Slopnice', 'Słopnice', '231', NULL, '500524163', 'janK@we.pl', 1, 1, ''),
(4, 'Paweł', 'Wróbel', '34-600', 'Limanowa', 'Laskowa', '12', NULL, '12593251', 'djescape18@gmail.com', 1, 1, ''),
(6, 'Jan', 'Wróbel', '12-123', 'Nowy Sącz', 'Stara Wieś', '231', NULL, '1231231', 'djescape18@gmail.com', NULL, 1, 'bmvbn'),
(7, 'Marek', 'marecki', '12-304', 'Inna', 'Lipowe', '12', '', '926348353', 'email@email.com', 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel volutpat magna. Fusce euismod rutrum lorem, in venenatis justo semper ut. Suspendisse at justo a urna sodales volutpat. Suspendisse auctor enim sed dui vulputate, necc '),
(8, 'Franciszek', 'Kimono', '34-600', 'Limanowa', 'Rzeźna ', '123', '13', '1227323', 'mail@mail.pl', 1, NULL, 'Ten koleś jest jakiś chory'),
(9, 'Sylwia', 'Król', '34-600', 'Limanowa', 'Stara Wieś ', '388', '', '514746516', 'sylwia3114@gmail.com', NULL, 1, 'Nowy użytkownik'),
(10, 'Jan', 'Kowalski', '60-893', 'Niziny', 'Leśna 23', '', '45', '509234193', 'adres@klienta.pl', 1, 1, 'Komentarz dotyczący klienta');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients_cars`
--

CREATE TABLE IF NOT EXISTS `clients_cars` (
  `clients_cars_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  PRIMARY KEY (`clients_cars_id`),
  KEY `client_id` (`client_id`,`car_id`),
  KEY `car_id` (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `clients_cars`
--

INSERT INTO `clients_cars` (`clients_cars_id`, `client_id`, `car_id`) VALUES
(3, 4, 3),
(4, 4, 4),
(6, 4, 6),
(7, 4, 7),
(9, 6, 9),
(2, 7, 2),
(5, 8, 5),
(10, 10, 10);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `currentrepairs`
--
CREATE TABLE IF NOT EXISTS `currentrepairs` (
`client_name` varchar(30)
,`client_surname` varchar(30)
,`client_id` int(11)
,`car_model` varchar(40)
,`car_brand` varchar(40)
,`car_registration_number` varchar(7)
,`car_mileage` int(11)
,`repair_id` int(11)
,`repair_status` varchar(20)
,`repair_date_start` date
,`repair_date_finish` date
,`repair_comment` text
,`first_name` varchar(50)
,`last_name` varchar(50)
);
-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `finishrepairs`
--
CREATE TABLE IF NOT EXISTS `finishrepairs` (
`client_name` varchar(30)
,`client_surname` varchar(30)
,`client_id` int(11)
,`car_model` varchar(40)
,`car_brand` varchar(40)
,`car_registration_number` varchar(7)
,`car_mileage` int(11)
,`repair_id` int(11)
,`repair_status` varchar(20)
,`repair_date_start` date
,`repair_date_finish` date
,`repair_comment` text
,`first_name` varchar(50)
,`last_name` varchar(50)
);
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'mechanik', 'mechanik który może tylko dopisywać dane'),
(3, 'super_mechanik', 'mechanik który może przeglądać historię');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `repairs`
--

CREATE TABLE IF NOT EXISTS `repairs` (
  `repair_id` int(11) NOT NULL AUTO_INCREMENT,
  `repair_mechanic_id` int(11) NOT NULL,
  `repair_client_id` int(11) NOT NULL,
  `repair_car_id` int(11) NOT NULL,
  `repair_date_start` date NOT NULL,
  `repair_date_finish` date DEFAULT NULL,
  `repair_comment` text COLLATE utf8_polish_ci,
  `repair_status` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`repair_id`),
  KEY `repair_mechanic_id` (`repair_mechanic_id`,`repair_client_id`,`repair_car_id`),
  KEY `repair_mechanic_id_2` (`repair_mechanic_id`),
  KEY `repair_client_id` (`repair_client_id`),
  KEY `repair_car_id` (`repair_car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=24 ;

--
-- Zrzut danych tabeli `repairs`
--

INSERT INTO `repairs` (`repair_id`, `repair_mechanic_id`, `repair_client_id`, `repair_car_id`, `repair_date_start`, `repair_date_finish`, `repair_comment`, `repair_status`) VALUES
(8, 2, 4, 7, '2015-10-30', '2015-11-08', NULL, 'ZAKOŃCZONO'),
(16, 2, 4, 3, '2015-11-07', '2015-12-04', 'Lekko obity prawy bok', 'ZAKOŃCZONO'),
(17, 3, 6, 9, '2015-11-21', '2015-12-04', '', 'ZAKOŃCZONO'),
(18, 2, 4, 3, '2015-12-04', NULL, '', 'W TRAKCIE'),
(19, 2, 4, 6, '2015-12-05', NULL, '', 'W TRAKCIE'),
(20, 2, 4, 7, '2015-12-05', NULL, '', 'W TRAKCIE'),
(21, 1, 4, 3, '2015-12-08', NULL, '', 'W TRAKCIE'),
(22, 2, 10, 10, '2015-12-08', NULL, '', 'W TRAKCIE'),
(23, 2, 6, 9, '2016-01-08', NULL, 'fsd', 'W TRAKCIE');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `repair_services`
--

CREATE TABLE IF NOT EXISTS `repair_services` (
  `repair_service_id` int(11) NOT NULL AUTO_INCREMENT,
  `repair_service_repair_id` int(11) NOT NULL,
  `repair_service_service_id` int(11) NOT NULL,
  `repair_service_other_service` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `repair_service_mechanic_id` int(11) NOT NULL,
  `repair_service_cost` int(11) NOT NULL,
  `repair_service_comment` text COLLATE utf8_polish_ci,
  PRIMARY KEY (`repair_service_id`),
  KEY `repair_service_repair_id` (`repair_service_repair_id`,`repair_service_service_id`),
  KEY `repair_service_service_id` (`repair_service_service_id`),
  KEY `repair_service_mechanic_id` (`repair_service_mechanic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=29 ;

--
-- Zrzut danych tabeli `repair_services`
--

INSERT INTO `repair_services` (`repair_service_id`, `repair_service_repair_id`, `repair_service_service_id`, `repair_service_other_service`, `repair_service_mechanic_id`, `repair_service_cost`, `repair_service_comment`) VALUES
(19, 8, 4, '', 2, 1200, 'Continental R16/55 Zima'),
(20, 8, 1, 'Regeneracja Turbiny', 2, 900, 'Gwarancja do 31-10-2016'),
(21, 8, 1, 'Wymiana świateł', 2, 40, 'Prawa i Lewa'),
(22, 16, 5, '', 2, 50, 'mb'),
(23, 19, 4, '', 2, 40, ''),
(27, 18, 4, '', 2, 40, ''),
(28, 22, 5, '', 2, 50, 'Castrol GTX magnatec 10w40');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `service_likely_cost` float NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_likely_cost`) VALUES
(1, 'INNE', 0),
(2, 'Wymiana płynu hamulcowego', 122),
(3, 'Wymiana hamulców', 34),
(4, 'Wymiana Opon', 40),
(5, 'Wymiana Oleju', 50),
(6, 'Wymiana turbiny', 1000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_group` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `setting_desc` text COLLATE utf8_polish_ci NOT NULL,
  `setting_desc1` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=21 ;

--
-- Zrzut danych tabeli `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_group`, `name`, `value`, `setting_desc`, `setting_desc1`) VALUES
(1, 'sms', 'sms_api_login', 'slawek513@gmail.com', '', 'Nazwa użytkownika SMSApi'),
(2, 'sms', 'sms_api_password', 'nowehaslo', '', 'Hasło użytkownika SMSApi'),
(3, 'sms', 'sms_api_from', 'Warsztat', '', 'Pole nadawcy/Typ SMS'),
(8, 'sms', 'sms_finish_repair', '     Witamy. Naprawa pojazdu została zakończona, zapraszamy po odbiór pojazdu w godzinach Pn-Pt 8:00-18:00', '', 'Treść SMS o zakończeniu naprawy'),
(9, 'sms', 'sms_technical_exam', '     Nadchodzi data kolejnego przeglądu. Uprzejmie zapraszamy na przegląd w promocyjnej cenie 99zł: EUROBUS swidnik 20', '', 'Treść SMS o przeglądzie'),
(10, 'sms', 'sms_notice', 'TAK', '', 'Czy wysyłać powiadomienia SMS'),
(11, 'mail', 'mail_login', 'slawek513@gmail.com', '', 'Adres nadawcy maila'),
(12, 'mail', 'mail_password', 'mojezajebistehaslo', '', 'Hasło maila do wysyłki powiadomień'),
(13, 'mail', 'mail_smtp', 'smtp.gmail.com', '', 'Serwer SMTP poczty'),
(14, 'mail', 'mail_port', '25', '', 'Port serwera pocztowego'),
(15, 'mail', 'mail_finish_repair', '    Witamy. Naprawa pojazdu została zakończona, zapraszamy po odbiór pojazdu w godzinach Pn-Pt 8:00-18:00', '', 'Mail o zakończonej naprawie'),
(16, 'mail', 'mail_technical_exam', '    Nadchodzi data kolejnego przeglądu. Uprzejmie zapraszamy na przegląd w promocyjnej cenie 99zł: EUROBUS swidnik 20', '', 'Mail o przeglądzie'),
(17, 'mail', 'mail_notice', 'NIE', '', 'Czy wysyłać powiadomienia E-mail'),
(18, 'mail', 'mail_title_finish', 'Earztat - EUROBUS - zakończenie naprawy', '', 'Tytuł maila o zkończeniu naprawy'),
(19, 'mail', 'mail_title_exam', 'Earztat - EUROBUS - Przegląd', '', 'Tytuł maila o przeglądzie'),
(20, 'mail', 'mail_default_title', 'Warsztat EUROBUS', '', 'Domyślny tytuł wiadomości');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_polish_ci NOT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `first_name`, `last_name`, `phone`) VALUES
(1, 'admin', '$2y$08$8DbSKYNDMNO0TuGOFMPM1OLKl1fdPGFBQ/.hfFmOAzp6nYWBKXG/W', 1, 'Admin', 'istrator', '0'),
(2, 'skrol', '$2y$08$Y37nhKMmFkEqy5vu7FLF1uX5oE9Tq55kpD33f8XQBLZ7Mhs7ZSkh6', 1, 'Sławek', 'Król', '500524163'),
(3, 'franek', '$2y$08$sbzAJ5Bo0doXbjVW8CKN3eGfoPUZL6c0aK0sHMBPsZtkg.hsfYEne', 1, 'Franciszek', 'Kimono', '500524189'),
(6, 'nowy', '$2y$08$WHY8G/yH7msjFV9IOSmNeu1HPhLCod5wCZKGKW5j6d7FBAdeG0uPa', 0, 'nowy', 'nowy', '1234567890');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=25 ;

--
-- Zrzut danych tabeli `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(13, 1, 1),
(14, 1, 2),
(17, 2, 2),
(21, 6, 2),
(24, 3, 2);

-- --------------------------------------------------------

--
-- Struktura widoku `currentrepairs`
--
DROP TABLE IF EXISTS `currentrepairs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `currentrepairs` AS select `clients`.`client_name` AS `client_name`,`clients`.`client_surname` AS `client_surname`,`clients`.`client_id` AS `client_id`,`cars`.`car_model` AS `car_model`,`cars`.`car_brand` AS `car_brand`,`cars`.`car_registration_number` AS `car_registration_number`,`cars`.`car_mileage` AS `car_mileage`,`repairs`.`repair_id` AS `repair_id`,`repairs`.`repair_status` AS `repair_status`,`repairs`.`repair_date_start` AS `repair_date_start`,`repairs`.`repair_date_finish` AS `repair_date_finish`,`repairs`.`repair_comment` AS `repair_comment`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name` from (((`cars` join `repairs` on((`cars`.`car_id` = `repairs`.`repair_car_id`))) join `users` on((`repairs`.`repair_mechanic_id` = `users`.`id`))) join `clients` on((`repairs`.`repair_client_id` = `clients`.`client_id`))) where (`repairs`.`repair_status` = 'W TRAKCIE');

-- --------------------------------------------------------

--
-- Struktura widoku `finishrepairs`
--
DROP TABLE IF EXISTS `finishrepairs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `finishrepairs` AS select `clients`.`client_name` AS `client_name`,`clients`.`client_surname` AS `client_surname`,`clients`.`client_id` AS `client_id`,`cars`.`car_model` AS `car_model`,`cars`.`car_brand` AS `car_brand`,`cars`.`car_registration_number` AS `car_registration_number`,`cars`.`car_mileage` AS `car_mileage`,`repairs`.`repair_id` AS `repair_id`,`repairs`.`repair_status` AS `repair_status`,`repairs`.`repair_date_start` AS `repair_date_start`,`repairs`.`repair_date_finish` AS `repair_date_finish`,`repairs`.`repair_comment` AS `repair_comment`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name` from (((`cars` join `repairs` on((`cars`.`car_id` = `repairs`.`repair_car_id`))) join `users` on((`repairs`.`repair_mechanic_id` = `users`.`id`))) join `clients` on((`repairs`.`repair_client_id` = `clients`.`client_id`))) where (`repairs`.`repair_status` = 'ZAKOŃCZONO');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `clients_cars`
--
ALTER TABLE `clients_cars`
  ADD CONSTRAINT `clients_cars_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_cars_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `repairs_ibfk_1` FOREIGN KEY (`repair_client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `repairs_ibfk_2` FOREIGN KEY (`repair_car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `repair_services`
--
ALTER TABLE `repair_services`
  ADD CONSTRAINT `repair_services_ibfk_1` FOREIGN KEY (`repair_service_repair_id`) REFERENCES `repairs` (`repair_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `repair_services_ibfk_2` FOREIGN KEY (`repair_service_service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
