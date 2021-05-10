-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2021 at 01:58 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virlab_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `commandtoplc`
--

DROP TABLE IF EXISTS `commandtoplc`;
CREATE TABLE IF NOT EXISTS `commandtoplc` (
  `Command` char(8) NOT NULL,
  `Value` tinyint(1) NOT NULL,
  PRIMARY KEY (`Command`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commandtoplc`
--

INSERT INTO `commandtoplc` (`Command`, `Value`) VALUES
('start', 0),
('stop', 0);

-- --------------------------------------------------------

--
-- Table structure for table `datafromplc`
--

DROP TABLE IF EXISTS `datafromplc`;
CREATE TABLE IF NOT EXISTS `datafromplc` (
  `cylinder` char(8) CHARACTER SET utf8 NOT NULL,
  `state` int(1) NOT NULL,
  `PRE` tinyint(1) NOT NULL,
  PRIMARY KEY (`cylinder`),
  UNIQUE KEY `cylinder` (`cylinder`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datafromplc`
--

INSERT INTO `datafromplc` (`cylinder`, `state`, `PRE`) VALUES
('c1', 0, 0),
('c2', 0, 0),
('c3', 0, 0),
('c4', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exp_result`
--

DROP TABLE IF EXISTS `exp_result`;
CREATE TABLE IF NOT EXISTS `exp_result` (
  `name` char(8) NOT NULL,
  `result` char(20) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exp_result`
--

INSERT INTO `exp_result` (`name`, `result`) VALUES
('res', 'Failed!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(16) NOT NULL,
  `passwd` char(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `passwd`, `email`) VALUES
('lihainuo', '41bd770036fce61924abb82f74ebf1a73c1486cb', '2415061768@qq.com'),
('asdfgh', 'cbf2510a5f9f7eece23428da7125c06115839e2b', '2415061768@qq.com'),
('qwerty', 'a7d579ba76398070eae654c30ff153a4c273272a', '2415061768@qq.com'),
('honggs', 'b93dde2783257656a66098321cebc5944d4cd860', 'mpehgs@nus.edu.sg'),
('lihainuo3', '7c222fb2927d828af22f592134e8932480637c0d', '2415061768@qq.com'),
('flanker', '728a262860378b443dcffde31f61ffd4c6a6657b', '2415061768@qq.com'),
('fhlielts8', '7c4a8d09ca3762af61e59520943dc26494f8941b', '164931787@qq.com'),
('_lol123', '54fc77580c1e61ecb343bf8b7ad7891be10f0001', 'yh589@rutgers.edu'),
('longma', '2c8509df0df65f9826dc872a9acfea532c1f53c7', '114514@nmsl.com'),
('Shenmedongxi', '7c222fb2927d828af22f592134e8932480637c0d', '2415061768@qq.com'),
('longmaa', 'dca0345dd224ae6821347ab1c71613bbc8f72401', 'nmsl11451419198100@163.com'),
('LeHAINUO', 'a7d579ba76398070eae654c30ff153a4c273272a', '2415061768@qq.com'),
('13110516556', '1d1d000bcac780875b64549292b15954e1b64293', '1046933293@qq.com'),
('frank6', 'ea62ed6ee7897a6071646560f364172cb959a5be', '414@qq.com'),
('GAWXYtd', '1a931adfeb4a84e26e2a531e0715ed85ba21f7e9', '1215431159@qq.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
