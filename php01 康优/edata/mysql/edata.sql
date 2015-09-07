-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-09-06 14:49:03
-- 服务器版本： 5.5.19
-- PHP Version: 5.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `edata`
--

-- --------------------------------------------------------

--
-- 表的结构 `e_dxal`
--

CREATE TABLE IF NOT EXISTS `e_dxal` (
  `e_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',
  `e_title` varchar(100) NOT NULL COMMENT '//标题',
  `e_cont` text NOT NULL COMMENT '//内容',
  `e_time` datetime NOT NULL COMMENT '//上传时间',
  `e_see` int(10) NOT NULL COMMENT '//查看次数',
  `e_name` varchar(100) NOT NULL COMMENT '//用户',
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//典型案例表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `e_dxal`
--

INSERT INTO `e_dxal` (`e_id`, `e_title`, `e_cont`, `e_time`, `e_see`, `e_name`) VALUES
(1, '测试中典型案例', '<p><img src="http://img.baidu.com/hi/jx2/j_0002.gif"/></p>', '2015-08-11 08:59:54', 1, 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `e_fkzx`
--

CREATE TABLE IF NOT EXISTS `e_fkzx` (
  `e_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',
  `e_title` varchar(100) NOT NULL COMMENT '//标题',
  `e_cont` text NOT NULL COMMENT '//内容',
  `e_type` smallint(6) NOT NULL COMMENT '//类型',
  `e_time` datetime NOT NULL COMMENT '//上传时间',
  `e_see` int(10) NOT NULL COMMENT '//查看次数',
  `e_name` varchar(100) NOT NULL COMMENT '//用户',
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//妇科中心表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `e_fkzx`
--

INSERT INTO `e_fkzx` (`e_id`, `e_title`, `e_cont`, `e_type`, `e_time`, `e_see`, `e_name`) VALUES
(1, '测试中妇科中心', '<p><img src="http://img.baidu.com/hi/jx2/j_0004.gif"/></p>', 1, '2015-08-11 08:57:29', 5, 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `e_jhsy`
--

CREATE TABLE IF NOT EXISTS `e_jhsy` (
  `e_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',
  `e_title` varchar(100) NOT NULL COMMENT '//标题',
  `e_cont` text NOT NULL COMMENT '//内容',
  `e_type` smallint(6) NOT NULL COMMENT '//类型',
  `e_time` datetime NOT NULL COMMENT '//上传时间',
  `e_see` int(10) NOT NULL COMMENT '//查看次数',
  `e_name` varchar(100) NOT NULL COMMENT '//用户',
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//计划生育表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `e_jhsy`
--

INSERT INTO `e_jhsy` (`e_id`, `e_title`, `e_cont`, `e_type`, `e_time`, `e_see`, `e_name`) VALUES
(1, '测试中计划生育', '<p><img src="http://img.baidu.com/hi/jx2/j_0003.gif"/></p>', 3, '2015-08-11 08:57:58', 3, 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `e_nkzx`
--

CREATE TABLE IF NOT EXISTS `e_nkzx` (
  `e_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',
  `e_title` varchar(100) NOT NULL COMMENT '//标题',
  `e_cont` text NOT NULL COMMENT '//内容',
  `e_type` smallint(6) NOT NULL COMMENT '//类型',
  `e_time` datetime NOT NULL COMMENT '//上传时间',
  `e_see` int(10) NOT NULL COMMENT '//查看次数',
  `e_name` varchar(100) NOT NULL COMMENT '//用户',
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//男科中心表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `e_nkzx`
--

INSERT INTO `e_nkzx` (`e_id`, `e_title`, `e_cont`, `e_type`, `e_time`, `e_see`, `e_name`) VALUES
(1, '测试中男科中心', '<p><img src="http://img.baidu.com/hi/jx2/j_0013.gif"/></p>', 1, '2015-08-11 08:57:42', 9, 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `e_tsjs`
--

CREATE TABLE IF NOT EXISTS `e_tsjs` (
  `e_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',
  `e_title` varchar(100) NOT NULL COMMENT '//标题',
  `e_cont` text NOT NULL COMMENT '//内容',
  `e_time` datetime NOT NULL COMMENT '//上传时间',
  `e_see` int(10) NOT NULL COMMENT '//查看次数',
  `e_name` varchar(100) NOT NULL COMMENT '//用户',
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//特色技术表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `e_tsjs`
--

INSERT INTO `e_tsjs` (`e_id`, `e_title`, `e_cont`, `e_time`, `e_see`, `e_name`) VALUES
(1, '测试中特色技术', '<p><img src="http://img.baidu.com/hi/jx2/j_0003.gif"/></p>', '2015-08-11 09:00:54', 3, 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `e_user`
--

CREATE TABLE IF NOT EXISTS `e_user` (
  `e_name` varchar(100) NOT NULL COMMENT '//用户',
  `e_pwd` varchar(100) NOT NULL COMMENT '//密码',
  `e_time` datetime NOT NULL COMMENT '//上传时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `e_user`
--

INSERT INTO `e_user` (`e_name`, `e_pwd`, `e_time`) VALUES
('chaoyi', 'e10adc3949ba59abbe56e057f20f883e', '2015-08-11 08:52:42'),
('admin', '21232f297a57a5a743894a0e4a801fc3', '2015-08-11 08:55:01'),
('admin', '21232f297a57a5a743894a0e4a801fc3', '2015-08-11 17:41:55');

-- --------------------------------------------------------

--
-- 表的结构 `e_yyzj`
--

CREATE TABLE IF NOT EXISTS `e_yyzj` (
  `e_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',
  `e_title` varchar(100) NOT NULL COMMENT '//标题',
  `e_img` varchar(250) NOT NULL COMMENT '//图片路径',
  `e_cont` text NOT NULL COMMENT '//内容',
  `e_time` datetime NOT NULL COMMENT '//上传时间',
  `e_see` int(10) NOT NULL COMMENT '//查看次数',
  `e_name` varchar(100) NOT NULL COMMENT '//用户',
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//医院专家表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `e_yyzj`
--

INSERT INTO `e_yyzj` (`e_id`, `e_title`, `e_img`, `e_cont`, `e_time`, `e_see`, `e_name`) VALUES
(1, '测试中医院专家', 'a88c344d92901a6763f13b87be3a9932.png', '<p><img src="http://img.baidu.com/hi/jx2/j_0002.gif"/></p><p>1982年毕业于武汉大学医学院，在襄樊102医院从事泌尿外科，男性病诊断与治疗工作，曾任科主任职务。2000年成立襄樊男科病研究所并担 任所长。近十年来致力于微创手术的研究，在腹腔镜、宫腔镜、膀胱镜等离子电切镜的应用方面有丰富经验，擅长泌尿男科手术及中西医结合治疗男科疾病，尤擅长 运用微创技术治疗前列腺增生（肥大）。</p>', '2015-08-11 08:58:15', 6, 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
