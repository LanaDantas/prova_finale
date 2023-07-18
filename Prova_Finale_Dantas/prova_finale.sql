-- Active: 1689588496791@@127.0.0.1@3306@prova_finale
-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Host: localhost:3306

-- Generation Time: Jul 11, 2023 at 06:58 AM

-- Server version: 8.0.30

-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `prova_finale`

--

CREATE DATABASE
    IF NOT EXISTS `prova_finale` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `prova_finale`;

-- --------------------------------------------------------

--

-- Table structure for table `biglietti`

--

DROP TABLE IF EXISTS `biglietti`;

CREATE TABLE
    `biglietti` (
        `COD_OPERAZIONE` int(6) NOT NULL,
        `COD_VISITATORE` varchar(4) NOT NULL,
        `FASCIA_ORARIA` int(1) DEFAULT NULL,
        `DATA` date DEFAULT NULL,
        `TIPO_PAGAMENTO` varchar(20) DEFAULT NULL,
        `QUANTITA` int(5) DEFAULT NULL,
        `COD_MOSTRA` varchar(4) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--

-- Dumping data for table `biglietti`

--

-- --------------------------------------------------------

--

-- Table structure for table `sedi`

--

DROP TABLE IF EXISTS `sedi`;

CREATE TABLE
    `sedi` (
        `COD_SEDE` varchar(4) NOT NULL,
        `NOME` varchar(70) DEFAULT NULL,
        `INDIRIZZO` varchar(30) DEFAULT NULL,
        `CITTA` varchar(25) DEFAULT NULL,
        `PROVINCIA` varchar(2) DEFAULT NULL,
        `TELEFONO` varchar(14) DEFAULT NULL,
        `CAPIENZA` int(5) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
--

-- Dumping data for table `sedi`

--

INSERT INTO `sedi`
VALUES (
        'S000',
        'Palazzo Ducale',
        'Piazza Matteotti 9',
        'Genova',
        'GE',
        '010/8171600',
        300
    ), (
        'S001',
        'Palazzo dei Diamanti',
        'C.so Porta mare 9',
        'Ferrara',
        'FE',
        '0532/209988',
        200
    ), (
        'S002',
        'Museo dei Fori Imperiali Mercati di Traiano',
        'Via Quattro Novembre, 94',
        'Roma',
        'RM',
        '06/0608',
        350
    ), (
        'S003',
        'MAO - Museo d\'arte orientale',
        'Via San Domenico, 11',
        'Torino',
        'TO',
        '011/4436932',
        150
    ), (
        'S004',
        'GAM - Galleria Civica d\'Arte Moderna e Contemporanea',
        'Via Magenta, 31',
        'Torino',
        'TO',
        '011/4429518',
        300
    );
-- --------------------------------------------------------

--

-- Table structure for table `mostre`

--

DROP TABLE IF EXISTS `mostre`;

CREATE TABLE
    `mostre` (
        `COD_MOSTRA` varchar(4) NOT NULL,
        `TITOLO` varchar(70) DEFAULT NULL,
        `DATA_INIZIO` date DEFAULT NULL,
        `DATA_FINE` date DEFAULT NULL,
        `PREZZO` decimal(4, 2) DEFAULT NULL,
        `COD_SEDE` varchar(4) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

--

-- Indexes for table `mostre`

--

INSERT INTO `mostre`
VALUES (
        'M001',
        'Progetto Superbarocco - La forma della meraviglia',
        '2023-03-27',
        '2023-08-24',
        11.00,
        'S000'
    ), (
        'M002',
        'Tina Modotti Donne, Messico e Libertà',
        '2023-04-08',
        '2023-10-09',
        11.00,
        'S000'
    ), (
        'M003',
        'Il sogno di Ferrara. Riccardo Adelchi Mantovani',
        '2023-03-05',
        '2023-10-09',
        13.00,
        'S001'
    ), (
        'M004',
        '1932, l\'elefante e il colle perduto',
        '2023-04-08',
        '2023-10-02',
        18.00,
        'S002'
    ), (
        'M005',
        'La veste del Buddha',
        '2023-03-28',
        '2023-09-29',
        14.50,
        'S003'
    ), (
        'M006',
        'Il Grande Vuoto',
        '2023-05-06',
        '2023-09-04',
        15.00,
        'S003'
    ), (
        'M007',
        'FLAVIO FAVELLI I Maestri Serie Oro',
        '2023-05-26',
        '2023-11-06',
        13.50,
        'S004'
    );


--

-- Table structure for table `visitatori`

--

DROP TABLE IF EXISTS `visitatori`;

CREATE TABLE
    `visitatori` (
        `COD_VISITATORE` varchar(4) NOT NULL,
        `COGNOME` varchar(20) DEFAULT NULL,
        `NOME` varchar(20) DEFAULT NULL,
        `TELEFONO` varchar(14) DEFAULT NULL,
        `EMAIL` varchar(30) DEFAULT NULL,
        `LOGIN` varchar(20) DEFAULT NULL,
        `PSW` varchar(20) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

--

-- Dumping data for table `visitatori`

--
INSERT INTO `visitatori`
VALUES (
        '0001',
        'Alfieri',
        'Valeria',
        '011/4328346',
        'alf@libero.it',
        'Alfieri',
        'Alfieri_01'
    ), (
        '0002',
        'Bellotti',
        'Cinzia',
        '011/79876658',
        'bel@tin.it',
        'Bellotti',
        'Bellotti_02'
    ), (
        '0003',
        'Morgeri',
        'Giuseppe',
        '011/76547648',
        'dig@email.it',
        'Morgeri',
        'Morgeri_03'
    ), (
        '0004',
        'Bastioni',
        'Gianluca',
        '011/76586548',
        'fai@virgilio.it',
        'Bastioni',
        'Bastioni_04'
    ), (
        '0005',
        'Francini',
        'Massimiliano',
        '011/543326565',
        'fra@libero.it',
        'Francini',
        'Arancini_05'
    ), (
        '0006',
        'Mattone',
        'Fabrizio',
        '011/98765762',
        'gat@tin.it',
        'Mattone',
        'Mattone_06'
    ), (
        '0007',
        'Maistoni',
        'Ivan',
        '011/5483678',
        'mai@email.it',
        'Maistoni',
        'Maistoni_07'
    ), (
        '0008',
        'Parenti',
        'Michele',
        '011/5367548',
        'mik@tin.it',
        'Parenti',
        'Parenti_08'
    ), (
        '0009',
        'Morrini',
        'Marco',
        '011/53645872',
        'mor@libero.it',
        'Morrini',
        'Murrini_09'
    ), (
        '0010',
        'Pagini',
        'Giuliana',
        '011/78363459',
        'pag@yahoo.it',
        'Pagini',
        'Pagini_10'
    ), (
        '0011',
        'Picati',
        'Annamaria',
        '011/67598721',
        'pic@email.it',
        'Picati',
        'Picati_11'
    ), (
        '0012',
        'Rugliese',
        'Antonio',
        '011/3678465',
        'pug@tin.it',
        'Rugliese',
        'Pugliese_12'
    ), (
        '0013',
        'Romanotti',
        'Davide',
        '011/34254367',
        'rom@libero.it',
        'Romanotti',
        'Romanotti_13'
    ), (
        '0014',
        'Straniti',
        'Annamaria',
        '011/845673865',
        'str@libero.it',
        'Straniti',
        'Straniti_14'
    );

--

-- Indexes for table `biglietti`

--

ALTER TABLE `biglietti`
ADD
    PRIMARY KEY (`COD_OPERAZIONE`),
ADD
    KEY `visitatori` (`COD_VISITATORE`),
ADD
    KEY `mostre` (`COD_MOSTRA`);

--

-- Indexes for table `sedi`

--

ALTER TABLE `sedi`
ADD
    PRIMARY KEY (`COD_SEDE`);

--

-- Indexes for table `spettacoli`

--

ALTER TABLE `mostre`
ADD
    PRIMARY KEY (`COD_MOSTRA`),
ADD KEY `sedi` (`COD_SEDE`);

--

-- Indexes for table `visitatori`

--

ALTER TABLE `visitatori` ADD PRIMARY KEY (`COD_VISITATORE`);

--

-- AUTO_INCREMENT per la tabella `biglietti`

--

ALTER TABLE
    `biglietti` MODIFY `COD_OPERAZIONE` int NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;