-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 10:18 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etnaestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonime`
--

CREATE TABLE `abonime` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `abonim_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abonime`
--

INSERT INTO `abonime` (`id`, `email`, `abonim_date`) VALUES
(2, 'xhenidautaj2@gmail.com', '2020-01-28'),
(3, 'joni@gmail.com', '2020-01-28'),
(4, 'xhentila.dautaj@gmail.com', '2020-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `role_id` int(100) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `role_id`, `surname`, `email`, `password`, `name`) VALUES
(1, 1, 'Dautaj', 'xhdautaj18@beder.edu', 'dbd14bafafad389bb9e6e4b9153a35d9', 'Xhentila'),
(2, 2, 'Shkurti', 'ashkurti18@beder.edu', '16b00d94c826380a260211f65fcb0f58', 'Artan'),
(3, 2, 'Dollani', 'rdollani@beder.edu.a', '22cf2afe18902eb9391c7a2c0b94787b', 'Redi'),
(4, 2, 'Lleshi', 'blleshi@beder.edu.al', 'a44c4a8e885abe183c1e1a28c4966557', 'Blerim');

-- --------------------------------------------------------

--
-- Table structure for table `adresa`
--

CREATE TABLE `adresa` (
  `adresa_id` int(11) NOT NULL,
  `qyteti_id` int(50) NOT NULL,
  `zona` text NOT NULL,
  `rruga` text NOT NULL,
  `numri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adresa`
--

INSERT INTO `adresa` (`adresa_id`, `qyteti_id`, `zona`, `rruga`, `numri`) VALUES
(37, 6, 'Yzberisht', 'Rruga Joklin Persi ', 9),
(44, 5, '21 Dhjetori', 'Rruga Joklin Persi ', 9),
(45, 1, 'Qender', 'Rruga Joklin Persi ', 11),
(46, 1, 'Qender', 'Rr Barrikadave', 4);

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(100) NOT NULL,
  `emri` varchar(30) NOT NULL,
  `mbiemri` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mosha` int(30) NOT NULL,
  `gjinia` varchar(1) NOT NULL,
  `eksperience` int(50) NOT NULL,
  `passw` varchar(100) NOT NULL,
  `nipt` int(50) NOT NULL,
  `telefon` int(50) NOT NULL,
  `register_date` int(50) NOT NULL,
  `qyteti_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `emri`, `mbiemri`, `email`, `mosha`, `gjinia`, `eksperience`, `passw`, `nipt`, `telefon`, `register_date`, `qyteti_id`) VALUES
(3, 'Ledison', 'Dautaj', 'ledison@gmail.com', 26, 'M', 5, '8637e5e6e1ddbccef4027b947fe0fc25', 51, 684800428, 2020, 6),
(9, 'Xheni', 'Dautaj', 'xhenidautaj2@gmail.com', 25, 'F', 1, 'b75f38d54b5838b260313f92d3f662ae', 21638, 4800428, 2020, 6),
(10, 'Redi', 'Dollani', 'joni@gmail.com', 25, 'M', 1, '8637e5e6e1ddbccef4027b947fe0fc25', 159, 85, 2020, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lloji_prones`
--

CREATE TABLE `lloji_prones` (
  `lloji_prones_id` int(11) NOT NULL,
  `lloji` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lloji_prones`
--

INSERT INTO `lloji_prones` (`lloji_prones_id`, `lloji`) VALUES
(1, 'Vila'),
(2, 'Apartament'),
(3, 'Ambient Biznesi');

-- --------------------------------------------------------

--
-- Table structure for table `ngjarje`
--

CREATE TABLE `ngjarje` (
  `ngjarje_id` int(11) NOT NULL,
  `ngjarja` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngjarje`
--

INSERT INTO `ngjarje` (`ngjarje_id`, `ngjarja`) VALUES
(2, 'Shitje'),
(3, 'Qera');

-- --------------------------------------------------------

--
-- Table structure for table `prona`
--

CREATE TABLE `prona` (
  `prona_id` int(100) NOT NULL,
  `agent_id` int(50) NOT NULL,
  `ngjarje_id` int(11) NOT NULL,
  `lloji_id` int(50) NOT NULL,
  `hapsira` text NOT NULL,
  `certi_prones` text NOT NULL,
  `cmimi` int(100) NOT NULL,
  `titulli` text NOT NULL,
  `pershkrimi` text NOT NULL,
  `qyteti_id` int(50) NOT NULL,
  `content_img` varchar(400) NOT NULL,
  `nr_kontakti` mediumint(9) NOT NULL,
  `register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prona`
--

INSERT INTO `prona` (`prona_id`, `agent_id`, `ngjarje_id`, `lloji_id`, `hapsira`, `certi_prones`, `cmimi`, `titulli`, `pershkrimi`, `qyteti_id`, `content_img`, `nr_kontakti`, `register_date`) VALUES
(32, 3, 3, 1, '120', '4', 501, 'Vile me qera', ' Jepet me qera vila ne zonen e Yzberishtit. E mobiluar ne menyre bashkohore secila prej ambienteve te brendshme. Gjithashtu kemi dhe oborrin e jashtem i cili ka nevoje per mirembajtje nga ana juaj per t\\\\\\\'ju ofruar gjithmone kenaqesine e pushimit.', 1, 'web_photo/home.jpg', 8388607, '2020-03-25'),
(39, 3, 3, 3, '8', '8', 8, 'Ambient me qera', ' Ambient me qera', 5, 'web_photo/about.png', 8, '2020-02-06'),
(40, 3, 2, 1, '123', '23475', 500, 'Shitet Vila 3+1', ' Shitet Vila 3+1', 1, 'web_photo/sale.jpg', 4800428, '2020-02-04'),
(41, 3, 3, 2, '80', '153684', 230, 'Jepet me qera Apartament 2+1', ' Jepet me qera Apartament 2+1', 1, 'web_photo/about.png', 4800428, '2020-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `prona_adresa`
--

CREATE TABLE `prona_adresa` (
  `id` int(50) NOT NULL,
  `prona_id` int(100) NOT NULL,
  `qyteti_id` int(100) NOT NULL,
  `adresa_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prona_adresa`
--

INSERT INTO `prona_adresa` (`id`, `prona_id`, `qyteti_id`, `adresa_id`) VALUES
(1, 32, 1, 37),
(2, 39, 5, 44),
(3, 40, 1, 45),
(4, 41, 1, 46);

-- --------------------------------------------------------

--
-- Table structure for table `qyteti`
--

CREATE TABLE `qyteti` (
  `qyteti_id` int(11) NOT NULL,
  `qyteti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qyteti`
--

INSERT INTO `qyteti` (`qyteti_id`, `qyteti`) VALUES
(1, 'Tirana'),
(2, 'Durresi'),
(3, 'Shkodra'),
(4, 'Elbasan'),
(5, 'Korce'),
(6, 'Sarande');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `votime`
--

CREATE TABLE `votime` (
  `id` int(10) NOT NULL,
  `vota` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votime`
--

INSERT INTO `votime` (`id`, `vota`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `votime_prona`
--

CREATE TABLE `votime_prona` (
  `id` int(100) NOT NULL,
  `prona_id` int(100) NOT NULL,
  `votim_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonime`
--
ALTER TABLE `abonime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `Foreign` (`role_id`);

--
-- Indexes for table `adresa`
--
ALTER TABLE `adresa`
  ADD PRIMARY KEY (`adresa_id`) USING BTREE,
  ADD KEY `adresa_ibfk_1` (`qyteti_id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qyteti_id` (`qyteti_id`);

--
-- Indexes for table `lloji_prones`
--
ALTER TABLE `lloji_prones`
  ADD PRIMARY KEY (`lloji_prones_id`);

--
-- Indexes for table `ngjarje`
--
ALTER TABLE `ngjarje`
  ADD PRIMARY KEY (`ngjarje_id`);

--
-- Indexes for table `prona`
--
ALTER TABLE `prona`
  ADD PRIMARY KEY (`prona_id`),
  ADD KEY `ngjarje_id` (`ngjarje_id`),
  ADD KEY `lloji_id` (`lloji_id`),
  ADD KEY `adress_id` (`qyteti_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `prona_adresa`
--
ALTER TABLE `prona_adresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prona_id` (`prona_id`),
  ADD KEY `qyteti_id` (`qyteti_id`),
  ADD KEY `adresa_id` (`adresa_id`);

--
-- Indexes for table `qyteti`
--
ALTER TABLE `qyteti`
  ADD PRIMARY KEY (`qyteti_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votime`
--
ALTER TABLE `votime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votime_prona`
--
ALTER TABLE `votime_prona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prona_id` (`prona_id`),
  ADD KEY `votim_id` (`votim_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonime`
--
ALTER TABLE `abonime`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adresa`
--
ALTER TABLE `adresa`
  MODIFY `adresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lloji_prones`
--
ALTER TABLE `lloji_prones`
  MODIFY `lloji_prones_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ngjarje`
--
ALTER TABLE `ngjarje`
  MODIFY `ngjarje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prona`
--
ALTER TABLE `prona`
  MODIFY `prona_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `prona_adresa`
--
ALTER TABLE `prona_adresa`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qyteti`
--
ALTER TABLE `qyteti`
  MODIFY `qyteti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `votime`
--
ALTER TABLE `votime`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `votime_prona`
--
ALTER TABLE `votime_prona`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `adresa`
--
ALTER TABLE `adresa`
  ADD CONSTRAINT `adresa_ibfk_1` FOREIGN KEY (`qyteti_id`) REFERENCES `qyteti` (`qyteti_id`) ON UPDATE CASCADE;

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_ibfk_1` FOREIGN KEY (`qyteti_id`) REFERENCES `qyteti` (`qyteti_id`);

--
-- Constraints for table `prona`
--
ALTER TABLE `prona`
  ADD CONSTRAINT `prona_ibfk_1` FOREIGN KEY (`ngjarje_id`) REFERENCES `ngjarje` (`ngjarje_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prona_ibfk_2` FOREIGN KEY (`lloji_id`) REFERENCES `lloji_prones` (`lloji_prones_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prona_ibfk_3` FOREIGN KEY (`qyteti_id`) REFERENCES `qyteti` (`qyteti_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prona_ibfk_4` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `prona_adresa`
--
ALTER TABLE `prona_adresa`
  ADD CONSTRAINT `prona_adresa_ibfk_1` FOREIGN KEY (`prona_id`) REFERENCES `prona` (`prona_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prona_adresa_ibfk_2` FOREIGN KEY (`qyteti_id`) REFERENCES `qyteti` (`qyteti_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prona_adresa_ibfk_3` FOREIGN KEY (`adresa_id`) REFERENCES `adresa` (`adresa_id`) ON UPDATE CASCADE;

--
-- Constraints for table `votime_prona`
--
ALTER TABLE `votime_prona`
  ADD CONSTRAINT `votime_prona_ibfk_1` FOREIGN KEY (`prona_id`) REFERENCES `prona` (`prona_id`),
  ADD CONSTRAINT `votime_prona_ibfk_2` FOREIGN KEY (`votim_id`) REFERENCES `votime` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
