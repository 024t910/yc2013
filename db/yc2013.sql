-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成日時: 2013 年 3 月 14 日 00:33
-- サーバのバージョン: 5.1.61
-- PHP のバージョン: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `yc2013`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `l_bw`
--

CREATE TABLE IF NOT EXISTS `l_bw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `csv` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `l_locate`
--

CREATE TABLE IF NOT EXISTS `l_locate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `longtitude` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `l_ss`
--

CREATE TABLE IF NOT EXISTS `l_ss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=219 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `r_bw`
--

CREATE TABLE IF NOT EXISTS `r_bw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `csv` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `r_locate`
--

CREATE TABLE IF NOT EXISTS `r_locate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `longtitude` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `r_ss`
--

CREATE TABLE IF NOT EXISTS `r_ss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=443 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `yc_master`
--

CREATE TABLE IF NOT EXISTS `yc_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `html_path` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `js_path` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `l_locate_id` int(11) NOT NULL,
  `r_locate_id` int(11) NOT NULL,
  `l_ss_id` int(11) NOT NULL,
  `r_ss_id` int(11) NOT NULL,
  `l_bw_id` int(11) NOT NULL,
  `r_bw_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=701 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
