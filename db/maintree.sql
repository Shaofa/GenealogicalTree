-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-09-27 07:31:02
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `genealogy`
--

-- --------------------------------------------------------

--
-- 表的结构 `maintree`
--

CREATE TABLE IF NOT EXISTS `maintree` (
  `id` int(8) unsigned NOT NULL,
  `pId` int(8) NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL DEFAULT '',
  `generation` int(4) NOT NULL DEFAULT '0',
  `rank` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `maintree`
--

INSERT INTO `maintree` (`id`, `pId`, `name`,  `generation`, `rank`) VALUES
(0, -1, '赖氏颖川堂', 0, 0),
(1,  0, '赖朝元', 1, 1),
(2,  1, '赖秀a',  2, 1),
(3,  1, '赖秀b',  2, 2),
(4,  1, '赖秀c',  2, 3),
(5,  1, '赖秀d',  2, 1),
(6,  2, '赖成a',  3, 1),
(7,  2, '赖成b',  3, 2),
(8,  2, '赖成c',  3, 1),
(9,  3, '赖成d',  3, 1),
(10, 3, '赖成e',  3, 1),
(11, 4, '赖成f',  3, 1),
(12, 5, '赖成g',  3, 1),
(13, 6, '赖启a',  4, 1),
(14, 6, '赖启b',  4, 1),
(15, 7, '赖启c',  4, 1),
(16, 9, '赖启d',  4, 1),
(17, 11,'赖启e',  4, 1),
(18, 13,'赖九庆', 5, 1),
(19, 15,'赖九b',  5, 1),
(20, 16,'赖九c',  5, 1),
(21, 18,'赖景顺', 6, 1),
(22, 18,'赖景秋', 6, 2),
(23, 21,'赖延斌', 7, 1),
(24, 21,'赖延波', 7, 2),
(25, 21,'赖延巧', 7, 1),
(26, 21,'赖延琴', 7, 2),
(27, 22,'赖小卫', 7, 1),
(28, 22,'赖延康', 7, 2),
(29, 22,'赖晓莉', 7, 1),
(30, 23,'赖贞武', 8, 1),
(31, 23,'赖风兰', 8, 1),
(32, 24,'赖少发', 8, 1),
(33, 24,'赖小菊', 8, 1),
(34, 24,'赖桂芳', 8, 2),
(35, 27,'赖梁',   8, 1),
(36, 28,'赖欣雨', 8, 1),
(37, 30,'赖钊杨', 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maintree`
--
ALTER TABLE `maintree`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maintree`
--
ALTER TABLE `maintree`
  MODIFY `id` int(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
