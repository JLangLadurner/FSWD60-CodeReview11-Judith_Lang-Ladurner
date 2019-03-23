-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 06:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_judith_travelmatic`
--

-- --------------------------------------------------------

--
-- Table structure for table `concert`
--

CREATE TABLE `concert` (
  `con_id` int(11) NOT NULL,
  `con_name` varchar(55) NOT NULL,
  `con_date` date NOT NULL,
  `con_start` time NOT NULL,
  `con_price` varchar(55) NOT NULL,
  `con_address` varchar(200) NOT NULL,
  `fk_loc_id` int(11) DEFAULT NULL,
  `con_web` mediumtext NOT NULL,
  `con_img` varchar(255) NOT NULL,
  `con_type` enum('classic','rock','pop','other') DEFAULT NULL,
  `available` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`con_id`, `con_name`, `con_date`, `con_start`, `con_price`, `con_address`, `fk_loc_id`, `con_web`, `con_img`, `con_type`, `available`) VALUES
(1, 'Groenemeyer', '2019-03-22', '19:30:00', '58,20', 'Wiener Stadthalle, Halle D', 13, 'https://www.wien-ticket.at/de/ticket/52891/herbert-groenemeyer-tour-2019-wiener-stadthalle-wiener-stadthalle-halle-d-wien', 'https://yt3.ggpht.com/a-/AAuE7mDTJLYimMl3NmTYXPF69h-xdTfkx6Pa4EHfoQ=s900-mo-c-c0xffffffff-rj-k-no', 'pop', 'yes'),
(2, 'AbbaMania', '2019-03-24', '19:00:00', '47,50', 'Wiener Stadthalle, Halle D', 13, 'https://www.wien-ticket.at/de/ticket/53814/abbamania-the-show-2019-wiener-stadthalle-wiener-stadthalle-halle-d-wien', 'https://lh3.googleusercontent.com/07JquNW86n7qEGSBxZ1SNdlezMiFKv1_wyy_wTTbyFUz0a1SzImIJkwVvFt_al3AUSXF3bc=s170', 'pop', 'yes'),
(3, 'Steve Hackett', '2019-04-27', '20:00:00', '63,00', 'MQ Halle E', 9, 'https://www.mqw.at/programm/steve-hackett-genesis-revisited-tour-2019/', 'https://ticketcrusader.com/wp-content/uploads/2019/01/steve-hackett.jpg', 'rock', 'yes'),
(4, 'Rebekka Bakken', '2019-04-05', '20:00:00', '69,89', 'MQ Halle E', 9, 'https://www.mqw.at/programm/rebekka-bakken-things-you-leave-behind/', 'https://nordische-musik.de/artikel/fotos/bakk_01.jpg', 'other', 'yes'),
(5, 'Swanlake', '2019-03-05', '19:00:00', '43,00', 'Wiener Staatsoper', 3, 'https://www.wiener-staatsoper.at/spielplan-tickets/detail/event/976435656-schwanensee/', 'https://www.wiener-staatsoper.at/fileadmin/_processed_/5/3/csm_Architektur_Teesalon_18849_6168f3209f.jpg', 'classic', 'no'),
(6, 'Elton John', '2019-05-01', '20:00:00', '110', 'Wiener Stadthalle, Halle D', 13, 'https://www.viennaticketoffice.com/elton-john-farewell-yellow-brick-tickets-356060-en.html', 'https://www.viennaticketoffice.com/multimedia/images/big/3/5/6/0/6/356060i2.jpg', 'pop', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `loc_id` int(11) NOT NULL,
  `loc_zip` int(11) DEFAULT NULL,
  `loc_city` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`loc_id`, `loc_zip`, `loc_city`) VALUES
(3, 1010, 'Vienna'),
(4, 1020, 'Vienna'),
(5, 1030, 'Vienna'),
(6, 1040, 'Vienna'),
(7, 1050, 'Vienna'),
(8, 1060, 'Vienna'),
(9, 1070, 'Vienna'),
(10, 1080, 'Vienna'),
(11, 1090, 'Vienna'),
(12, 1100, 'Vienna'),
(13, 1150, 'Vienna'),
(14, 1130, 'Vienna');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(55) NOT NULL,
  `place_address` varchar(100) NOT NULL,
  `fk_loc_id` int(11) DEFAULT NULL,
  `place_type` enum('Museum','Historical','must-see') NOT NULL,
  `p_description` varchar(100) NOT NULL,
  `place_web` mediumtext NOT NULL,
  `place_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `place_name`, `place_address`, `fk_loc_id`, `place_type`, `p_description`, `place_web`, `place_img`) VALUES
(1, 'Karlskirche', 'Karlsplatz 1', 3, 'Historical', 'Besuchen Sie die Karlskirche, die schoenste Barockkirche der Stadt', 'https://www.wien.info/de/sightseeing/sehenswuerdigkeiten/g-k/karlskirche', 'http://www.karlskirche.at/images/karlskirche.jpg'),
(2, 'Schoenbrunn Zoo', 'Marxingstrasse 13b', 14, 'must-see', 'Der Tiergarten Schoenbrunn ist der aelteste Zoo der Welt.', 'https://www.zoovienna.at/', 'https://www.imperial-austria.at/media/catalog/product/cache/2/image/9df78eab33525d08d6e5fb8d27136e95/t/i/tiergarten.jpg'),
(3, 'Schatzkammer', 'Hofburg', 3, 'Museum', 'The Secular Treasury offers a unique panorama covering over ...', 'https://www.kaiserliche-schatzkammer.at/en/visit/Historical', 'https://www.vienna-trips.at/wp-content/uploads/2015/02/AK_Rudolfskrone_Plakat_2-724x1024.jpg'),
(4, 'Riesenrad', 'Riesenradplatz 1', 4, 'must-see', 'If you havent once in your lifetime taken a ride on the Giant Ferris Wheel and enjoyed the breathtak', 'https://www.wienerriesenrad.com/', 'https://austria-forum.org/attach/AEIOU/Riesenrad/Riesenrad_neu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `res_id` int(11) NOT NULL,
  `res_name` varchar(100) NOT NULL,
  `res_address` varchar(55) NOT NULL,
  `fk_loc_id` int(11) DEFAULT NULL,
  `res_phone` varchar(55) NOT NULL,
  `res_type` enum('chinese','italian','austrian','other') NOT NULL,
  `res_description` varchar(255) NOT NULL,
  `res_web` mediumtext NOT NULL,
  `res_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`res_id`, `res_name`, `res_address`, `fk_loc_id`, `res_phone`, `res_type`, `res_description`, `res_web`, `res_img`) VALUES
(1, 'Lemon Leaf', 'Kettenbrueckengasse 20', 6, '0043 1 58 528 56', 'other', 'Thai kitchen at it\'s best. Reservations are welcome but not a must...', 'http://www.lemonleaf.at/', 'http://www.lemonleaf.at/images/gallery-seeda2.jpg'),
(2, 'Fabios', 'Tuchlauben 4-6', 3, '0043 1 532 22 22', 'italian', 'Best place to meet in the heart of vienna.', 'http://fabios.at/', 'https://media-cdn.tripadvisor.com/media/photo-s/02/d5/01/40/fabios.jpg'),
(3, 'Soba', 'Rechte Wienzeile 37', 6, '0043 1 286 57 60', 'chinese', 'Unser Lokal mitten im Herzen Wiens direkt am Naschmarkt', 'http://www.soba.wien/', 'http://www.soba.wien/wp-content/uploads/FQ2B3619-1.jpg'),
(4, 'Plachutta Gasthaus zur Oper', 'Walfischgasse 5-7', 3, '0043 1 51 222 51', 'austrian', 'The art of the perfect\r\nWiener Schnitzel', 'https://www.plachutta-oper.at/en', 'https://www.plachutta-oper.at/sites/plachutta-oper.at/files/gallery/gallery-13/plachuttas-gasthaus-zur-oper-gedeck.jpg'),
(6, 'Tian', 'Himmelpfortgasse 23', 3, '0043 1 8904665', 'chinese', 'according to falstaff one of the best', 'https://www.falstaff.at/ld/r/tian-wien/', 'https://www.falstaff.at/fileadmin/_processed_/csm_R-2848-Tian-55272_adce4cec32.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `usr_first_name` varchar(55) DEFAULT NULL,
  `usr_last_name` varchar(55) DEFAULT NULL,
  `usr_email` varchar(55) DEFAULT NULL,
  `passw` varchar(255) DEFAULT NULL,
  `admin` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `usr_first_name`, `usr_last_name`, `usr_email`, `passw`, `admin`) VALUES
(1, 'Rosetta', 'Stone', 'rosetta@email.com', '4b434e8eefb107c306b4cf997f55a52465e525189043a3d4658d8efeb121cf01', 'no'),
(2, 'Rosi', 'Admin', 'admin@email.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`con_id`),
  ADD KEY `fk_loc_id` (`fk_loc_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `fk_loc_id` (`fk_loc_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `restaurant_ibfk_1` (`fk_loc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concert`
--
ALTER TABLE `concert`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `concert_ibfk_1` FOREIGN KEY (`fk_loc_id`) REFERENCES `locations` (`loc_id`);

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`fk_loc_id`) REFERENCES `locations` (`loc_id`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`fk_loc_id`) REFERENCES `locations` (`loc_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
