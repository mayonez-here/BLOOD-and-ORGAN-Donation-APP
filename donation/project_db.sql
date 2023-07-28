-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2017 at 04:40 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(1, 'admin', 'adminpass');

-- --------------------------------------------------------

--
-- Table structure for table `bloodonor`
--

CREATE TABLE `bloodonor` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `id_num` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `age` int(11) NOT NULL,
  `weight` int(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `postal` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodonor`
--

INSERT INTO `bloodonor` (`id`, `uname`, `pwd`, `fname`, `lname`, `id_num`, `email`, `gender`, `bday`, `age`, `weight`, `county`, `phone`, `postal`, `address`) VALUES
(7, 'John', '527bd5b5d689e2c32ae974c6229ff785', 'Jamlick', 'Gatumbi', 312456378, 'jammerbigboy@gmail.com', 'male', '1995-08-16', 21, 56, 'Nakuru', '07134563883', '', 'Lanet'),
(9, 'Remy', '6967cabefd763ac1a1a88e11159957db', 'Jeremy', 'Ndiritu', 32415783, 'jeremyndiritu@gmail.com', 'male', '1998-12-10', 18, 67, 'Nyeri', '0712825290', '', 'Kigwandi');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `phone`, `email`, `msg`) VALUES
(1, 'Janet Auma', '0713243567', 'janetauma@gmail.com', 'HI. I NEED BLOOD URGENTLY.');

-- --------------------------------------------------------

--
-- Table structure for table `doc_register`
--

CREATE TABLE `doc_register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `docid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hostype` varchar(50) NOT NULL,
  `hospital` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_register`
--

INSERT INTO `doc_register` (`id`, `username`, `name`, `email`, `docid`, `password`, `hostype`, `hospital`, `county`) VALUES
(1, 'Joyce', 'Joyce Andisi', 'joyceandisi@gmail.com', '2341-90', '19053d1f43416ad98dd9443425753488', 'private', 'Mt.Kenya Hospital', 'Nyeri'),
(2, 'Jeremy', 'Jeremy Ndiritu', 'jeremy@gmail.com', '4353-80', '6967cabefd763ac1a1a88e11159957db', 'public', 'Kenyatta', 'Nairobi'),
(3, 'Jackie', 'Jackline Maina', 'jackiemaina8@gmail.com', '35363-78', '81a57538bea3f6e953f6a459eb767357', 'private', 'Marie Stopes', 'Mombasa');

-- --------------------------------------------------------

--
-- Table structure for table `submit_details`
--

CREATE TABLE `submit_details` (
  `sub_id` int(11) NOT NULL,
  `dtype` varchar(50) NOT NULL,
  `organ` varchar(50) NOT NULL,
  `regdate` date NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submit_details`
--

INSERT INTO `submit_details` (`sub_id`, `dtype`, `organ`, `regdate`, `b_id`) VALUES
(25, 'Blood', 'cornea', '2017-06-20', 7),
(26, 'Blood', 'cornea', '2017-06-21', 7),
(27, 'Organ', 'heart', '2017-06-21', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloodonor`
--
ALTER TABLE `bloodonor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_register`
--
ALTER TABLE `doc_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_details`
--
ALTER TABLE `submit_details`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `b_id` (`b_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bloodonor`
--
ALTER TABLE `bloodonor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `doc_register`
--
ALTER TABLE `doc_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `submit_details`
--
ALTER TABLE `submit_details`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `submit_details`
--
ALTER TABLE `submit_details`
  ADD CONSTRAINT `donorid` FOREIGN KEY (`b_id`) REFERENCES `bloodonor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
