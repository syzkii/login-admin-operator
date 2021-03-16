-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2021 at 12:38 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sppadminop`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE IF NOT EXISTS `data_siswa` (
  `no_induk` int(5) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(255) NOT NULL,
  `alamat_siswa` varchar(255) NOT NULL,
  `no_hp_siswa` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  PRIMARY KEY (`no_induk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=210 ;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`no_induk`, `nama_siswa`, `alamat_siswa`, `no_hp_siswa`, `kelas`) VALUES
(208, 'asa', 'aser', '2323aa111', '10'),
(209, 'asaww', 'ddad', '2323', '12');

-- --------------------------------------------------------

--
-- Table structure for table `userkiki`
--

CREATE TABLE IF NOT EXISTS `userkiki` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hak_akses` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `userkiki`
--

INSERT INTO `userkiki` (`id`, `username`, `password`, `hak_akses`) VALUES
(1, 'kiki', '123', 'admin'),
(14, 'kiki', 'root', 'operator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
