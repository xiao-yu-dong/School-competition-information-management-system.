-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-06-03 13:55:51
-- 服务器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `jingsai`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `regtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `userpass`, `email`, `regtime`) VALUES
(1, 'tuiu18', 'qwqwqw', 'email', '2019-05-14 01:06:30'),
(2, '567838', 'qwqwqw', 'email', '2019-05-14 01:07:34'),
(3, 'jhgfdsfs', 'qweasd', 'email', '2019-05-19 19:58:10'),
(4, 'gtdgdf', 'asdzxc', 'email', '2019-05-19 20:01:57'),
(5, 'asdasd', 'asdasd', 'email', '2019-05-19 20:02:23'),
(6, 'fdsfsdf', 'asdzxc', 'email', '2019-05-20 20:46:21'),
(7, 'tuiu1811', 'tuiu1811', 'email', '2019-05-21 10:15:10'),
(8, '123123', 'asdzxc', 'email', '2019-05-21 10:58:00'),
(9, 'tuiuuu', 'qiuchuijie', 'email', '2019-05-21 16:23:50'),
(10, 'asdzxc', 'dengdeng', 'email', '2019-05-23 18:58:20'),
(11, 'qweqwe', 'qweqwe', 'email', '2019-05-28 21:43:01'),
(12, 'qweqweq', 'asdasd', 'email', '2019-05-28 22:20:15'),
(13, 'yuhaoy', 'zxcvbnm', 'email', '2019-05-30 21:07:23');

-- --------------------------------------------------------

--
-- 表的结构 `xinxi`
--

CREATE TABLE `xinxi` (
  `id` int(11) NOT NULL,
  `Event_name` text NOT NULL COMMENT '赛事名字',
  `Event_type_select` text NOT NULL COMMENT '赛事类型',
  `sponsor` text NOT NULL COMMENT '主办单位',
  `synopsis` text NOT NULL COMMENT '赛事简介',
  `Event_details` text NOT NULL COMMENT '赛事详情',
  `teacher` text NOT NULL COMMENT '相关教师名字',
  `phone` tinytext NOT NULL COMMENT '相关教师电话',
  `time` datetime NOT NULL COMMENT '发布时间',
  `fabuzhe` varchar(50) NOT NULL COMMENT '发布者',
  `Dow` varchar(50) DEFAULT NULL COMMENT 'word下载地址',
  `word` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `xinxi`
--
ALTER TABLE `xinxi`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `xinxi`
--
ALTER TABLE `xinxi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
