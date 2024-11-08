-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 07:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'brian', 'morais', 'brian@l.com', 'brian@123');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointmentid` varchar(15) NOT NULL,
  `pid` varchar(15) NOT NULL,
  `Licenseno` varchar(15) NOT NULL,
  `pfname` varchar(15) NOT NULL,
  `plname` varchar(15) NOT NULL,
  `phone` int(11) NOT NULL,
  `diagnosis` mediumtext DEFAULT NULL,
  `appointmentdate` date NOT NULL,
  `appointmenttime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentid`, `pid`, `Licenseno`, `pfname`, `plname`, `phone`, `diagnosis`, `appointmentdate`, `appointmenttime`) VALUES
('ap16', 'p1', 'GMC1', 'patient2', 'patient', 84758494, NULL, '2024-04-04', '13:30:00'),
('AP2', 'hms4', 'GMC1', 'john', 'doe', 987384938, 'heart rate-120bt/min\r\npressure 120/mg', '2024-03-31', '03:51:00'),
('AP5', 'hms3', 'GMC2', 'john', 'Martin', 0, NULL, '2024-03-30', '17:00:00'),
('AP6', 'hms5', 'GMC1', 'jenca', 'Martin', 2147483647, NULL, '2024-04-05', '06:40:00'),
('AP7', 'hms46', 'GMC1', 'Roycy', 'ferns', 2147483647, NULL, '2024-04-03', '11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Licenseno` varchar(15) NOT NULL,
  `docfname` varchar(15) NOT NULL,
  `doclname` varchar(15) NOT NULL,
  `dept` varchar(15) NOT NULL,
  `docemail` varchar(15) NOT NULL,
  `docnumber` int(11) NOT NULL,
  `certificate` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Licenseno`, `docfname`, `doclname`, `dept`, `docemail`, `docnumber`, `certificate`, `password`) VALUES
('gmc', 'doctor', 'doc', 'General', 'gmc@hms', 2147483647, 'c:/Users/vaz/Downloads/OIP (2).jpg', 'd0a7d5862b764dd'),
('GMC1', 'SARAH', 'VAZ', 'Cardiology', 'sarah@hms', 845948596, 'c:/Users/vaz/Downloads/OIP (2).jpg', '4665cae1e3ae81d9f371020f95c5382fb3e013d0'),
('GMC2', 'doctor1', 'doctor', 'Gynacology', 'doctor1@hms', 948584888, 'c:/Users/vaz/Downloads/OIP (2).jpg', 'cd4855e92cc67e19d4e9df92beae23f5a72ea060'),
('GMC233', 'Aniket', 'Chowgule', 'Cardiology', 'aniket@gmail.co', 2147483647, 'c:/Users/vaz/Downloads/OIP (2).jpg', '749cce0c27c13cc'),
('gmc234', 'sarah', 'vaz', 'cardiac', 'svaz@gmail.com', 916822332, 'putting.jpg', 'vazsarah'),
('GMC3', 'doctor2', 'doctor', 'General', 'doctor2@hms', 948584888, 'c:/Users/vaz/Downloads/OIP (2).jpg', '89dd91ae1741d267c2b0bdaa27d33d68e8b7be96'),
('GMC4', 'doctor6', 'doctor', 'General', 'doctor4@hms', 948584888, 'c:/Users/vaz/Downloads/OIP (2).jpg', 'e7316fd32faaa8c7761976d45c7795b04146307b'),
('GMC456', 'Prachi', 'naik', 'Cardiology', 'prachil@wellnes', 2147483647, 'c:/Users/vaz/Downloads/OIP (2).jpg', 'd8806dd7ace52e6'),
('gmc738', 'meera', 'rajput', 'Gynacology', 'meera@hms', 9183949, 'c:/Users/vaz/Downloads/OIP (2).jpg', '6bd5fefcd64507e'),
('gmc904', 'Jay', 'Gupta', 'Neurologist', 'Jay@gmail.com', 918474839, 'c:/Users/vaz/Downloads/OIP (2).jpg', '3a1ca13656332a1'),
('GMC95', 'John', 'Martin', 'Gynacology', 'john@gmail.com', 927183489, 'c:/Users/vaz/Downloads/OIP (2).jpg', '8b7f6d7358baeb1');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pid` varchar(15) NOT NULL,
  `pfname` varchar(15) NOT NULL,
  `plname` varchar(15) NOT NULL,
  `phone` int(15) NOT NULL,
  `address` varchar(15) NOT NULL,
  `age` int(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  `ailment` varchar(15) NOT NULL,
  `docid` varchar(10) NOT NULL,
  `diagnosis` longtext DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `datejoined` timestamp(6) NULL DEFAULT current_timestamp(6),
  `dichargestatus` varchar(200) DEFAULT NULL,
  `dischargedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pid`, `pfname`, `plname`, `phone`, `address`, `age`, `type`, `ailment`, `docid`, `diagnosis`, `dob`, `datejoined`, `dichargestatus`, `dischargedate`) VALUES
('4', 'priya', 'naik', 2147483647, 'panjim', 34, 'Outpatient', 'stroke', 'gmc234', NULL, '1995-03-08', '2024-02-26 17:09:30.471310', NULL, NULL),
('hm32', 'breena', 'jain', 2147483647, 'goa', 31, 'Inpatient', 'thyroid', 'GMC1', NULL, '1994-07-12', '2024-03-28 19:19:42.111026', 'discharged', '2024-04-01 00:00:00'),
('hms11', 'patient1', 'patient', 847584758, 'margao', 21, 'Inpatient', 'cancer', 'GMC1', NULL, '2014-06-12', '2024-04-01 06:46:11.468119', 'discharged', '2024-04-01 00:00:00'),
('hms23', 'fina', 'labas', 2147483647, 'Madhya Pradesh', 56, 'Inpatient', 'malaria', '', NULL, '1973-07-17', '2024-03-03 08:28:17.724899', 'discharged', '2024-04-04 00:00:00'),
('hms250', 'devon', 'fernandes', 2147483647, 'margao', 45, 'Inpatient', 'cardiac arrest', '', NULL, '1980-06-18', '2024-03-31 06:47:42.977661', 'discharged', '2024-03-31 00:00:00'),
('hms4', 'radhika', 'merchant', 2147483647, 'mumbai', 27, 'Outpatient', 'flu', '', 'jjjjjj', '1990-02-03', '2024-03-03 08:21:01.277215', 'discharged', '2024-03-31 00:00:00'),
('hms42', 'jabal', 'lsm', 2147483647, 'nepal', 34, 'Inpatient', 'dengue', '', NULL, '1984-07-19', '2024-03-03 08:31:03.823909', 'discharged', NULL),
('hms43', 'jabal', 'lsm', 2147483647, 'nepal', 34, 'Inpatient', 'dengue', '', NULL, '', '2024-03-03 08:48:20.880377', 'discharged', '2024-03-29 00:00:00'),
('hms47', 'jabal', 'lsm', 384758593, 'nepal', 34, 'Inpatient', 'dengue', '', NULL, '', '2024-03-03 08:49:13.566572', NULL, NULL),
('HMS900', 'Meena', 'lhan', 78654567, 'goa', 0, 'Inpatient', '', '', NULL, '2024-03-12', '2024-03-03 09:47:52.798404', NULL, NULL),
('p13', 'patient4', 'patient', 345564948, 'margao', 21, 'Inpatient', 'dengue', 'GMC1', NULL, '2024-04-01', '2024-04-01 07:53:08.846199', NULL, NULL);

--
-- Triggers `patients`
--
DELIMITER $$
CREATE TRIGGER `update_discharge_date` BEFORE UPDATE ON `patients` FOR EACH ROW BEGIN
    IF NEW.dichargestatus = 'discharged' THEN
        SET NEW.dischargedate = CURDATE();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` varchar(10) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `amt` int(10) NOT NULL,
  `paid` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `pid`, `mode`, `amt`, `paid`) VALUES
('pay1', 'hms23', 'cash', 500, 'paid'),
('pay2', 'hms23', 'cash', 5000, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescriptionid` int(11) NOT NULL,
  `appointmentid` varchar(5) NOT NULL,
  `pid` varchar(5) NOT NULL,
  `prescription_details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescriptionid`, `appointmentid`, `pid`, `prescription_details`) VALUES
(0, 'AP2', 'hms4', 'paracetamol\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `rid` varchar(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`rid`, `fname`, `lname`, `email`, `password`, `phone`) VALUES
('HMSR1', 'Mahek', 'Shaikh', 'mahek@hms', '0b5acacfa098c3c6329df12e15599791a5bde5da', 2147483647),
('hmsr3', 'meera', 'rajput', 'meera@hms', '6bd5fefcd64507e0ef8feba30e6e6ee9f985a2bd', 9183949),
('hmsr4', 'maira ', 'cardoso', 'maira@gmail.com', '4ef125838635503566c8a9ab7c6f09d48d8db080', 2147483647),
('hmsr5', 'sarah', 'vaz', 'sarah@hms', '4665cae1e3ae81d9f371020f95c5382fb3e013d0', 2147483647);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewpatients`
-- (See below for the actual view)
--
CREATE TABLE `viewpatients` (
`pfname` varchar(15)
,`plname` varchar(15)
,`type` varchar(15)
);

-- --------------------------------------------------------

--
-- Structure for view `viewpatients`
--
DROP TABLE IF EXISTS `viewpatients`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewpatients`  AS SELECT `patients`.`pfname` AS `pfname`, `patients`.`plname` AS `plname`, `patients`.`type` AS `type` FROM `patients` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentid`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Licenseno`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescriptionid`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
