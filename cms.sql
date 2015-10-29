-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2015 at 07:23 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `ACTION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NEXT` varchar(255) NOT NULL,
  `SAVE` varchar(255) NOT NULL,
  `SEARCH` int(255) NOT NULL,
  `STATUS` int(9) NOT NULL,
  PRIMARY KEY (`ACTION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `divs`
--

CREATE TABLE IF NOT EXISTS `divs` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `ELEMENT` text NOT NULL,
  `HTML_CSS_ID` int(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `divs`
--

INSERT INTO `divs` (`ID`, `NAME`, `ELEMENT`, `HTML_CSS_ID`) VALUES
(4, 'test', '<label>test</label><textarea name="test" id="test"></textarea></div>', 45),
(5, '420', '<label>test</label><textarea name="test" id="test"></textarea></div>', 46),
(6, '', '<label>test2</label><textarea name="test1" id="test1"></textarea></div>', 47),
(7, '', '<label>label</label><textarea name="variable" id="variable"></textarea></div>', 48),
(8, '', '<label>lable</label><textarea name="var" id="var"></textarea></div>', 49),
(9, 'container', '<button type="button" name="waqas" id="waqas">Search</button>', 50),
(10, 'test', '<label>golu</label><textarea name="test" id="test"></textarea></div>', 51),
(11, '', '<label>label</label><textarea name="var_name" id="var_name"></textarea></div>', 52),
(12, '', '<label>tz</label><input type="text" name="tez" value="" id="tez">', 53),
(13, '', '<label>asd</label><textarea name="waqas" id="waqas"></textarea></div>', 54),
(14, '', '<label>test1</label><textarea name="test1" id="test1"></textarea></div>', 55),
(15, '', '<label>waqas</label><textarea name="waqas" id="waqas"></textarea></div>', 56),
(16, '', '<label>test</label><textarea name="test" id="test"></textarea></div>', 57),
(17, '', '<label>b</label><textarea name="a" id="a"></textarea></div>', 58),
(18, '', '<label></label><textarea name="waqas1" id="waqas1"></textarea></div>', 59);

-- --------------------------------------------------------

--
-- Table structure for table `html_css`
--

CREATE TABLE IF NOT EXISTS `html_css` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `HTML` text NOT NULL,
  `CSS` text NOT NULL,
  `CLASS` varchar(255) NOT NULL,
  `PAGE_ID` int(9) NOT NULL,
  `FORM_ID` int(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `html_css`
--

INSERT INTO `html_css` (`ID`, `NAME`, `HTML`, `CSS`, `CLASS`, `PAGE_ID`, `FORM_ID`, `STATUS`) VALUES
(30, '', '<button type="button" name="waqas" id="waqas">waqas</button>', '#waqas{background-color:#8000ff;width:200px;height:30px;margin-top:px;margin-bottom:px;z-index:;font-size:12;color:#ff0080;};', 'div1', 0, 10, 'SAVEDD'),
(31, '', '<button type="button" name="test" id="test">test</button>', '#test{background-color:#00ff40;width:200px;height:30px;margin-top:px;margin-bottom:px;z-index:;font-size:12;color:#000000;};', 'red', 0, 11, 'SAVEDD'),
(32, '', '<label>test</label><textarea name="test" id="test"></textarea></div>', '#test{background-color:#800040;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#00ffff;};', 'test', 0, 12, 'SAVEDD'),
(33, '', '<label>test</label><textarea name="test" id="test"></textarea></div>', '#test{background-color:#000000;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:test;color:#8080ff;};', 'test', 0, 13, 'SAVEDD'),
(34, '', '<label>2</label><textarea name="1" id="1"></textarea></div>', '#1{background-color:#000000;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#000000;};', '3', 0, 14, 'SAVEDD'),
(35, '', '<button type="button" name="test1" id="test1">test12</button>', '#test1{background-color:#ff0000;width:500px;height:30px;margin-top:px;margin-bottom:px;z-index:;font-size:12;color:#ffff00;};', 'div_name', 0, 15, 'SAVEDD'),
(36, '', '<label>999</label><textarea name="999" id="999"></textarea></div>', '#999{background-color:#000000;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#000000;};', '999', 0, 16, 'SAVEDD'),
(37, '', '<label>t</label><textarea name="t" id="t"></textarea></div>', '#t{background-color:#000000;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#000000;};', 'g', 0, 17, 'SAVEDD'),
(38, '', '<label>ter</label><textarea name="ter" id="ter"></textarea></div>', '#ter{background-color:#000080;width:px;height:12px;margin-top:px;margin-bottom:px;z-index:;font-size:12;color:#000000;position:relative;};', 'tert', 0, 18, 'SAVEDD'),
(39, '', '<button type="button" name="hhh" id="hhh">hhh</button>', '#hhh{background-color:#ff0080;width:555px;height:44px;margin-top:px;margin-bottom:px;z-index:;font-size:12;color:#ffff00;position:relative;};', 'mmm', 0, 19, 'SAVEDD'),
(40, '', '<button type="button" name="test" id="test">test</button>', '#test{background-color:#8000ff;width:333px;height:222px;margin-top:px;margin-bottom:px;z-index:;font-size:12;color:#000000;position:relative;}', 'test', 0, 20, 'SAVEDD'),
(41, 'ter', '<label>ter</label><textarea name="ter" id="ter"></textarea></div>', '#ter{background-color:#000000;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#000000;position:relative;}', 'ter', 0, 21, 'SAVEDD'),
(42, 'tetst', '<label>tetst</label><input type="text" name=test value="" id="test">', '#test{background-color:#ffffff;width:222px;height:222px;margin-top:px;margin-bottom:px;z-index:;font-size:12;color:#ffffff;position:relative;}', 'terst', 0, 22, 'SAVEDD'),
(43, 'test', '<label id="test">test</label>', '#test{background-color:#ffffff;width:px;height:testpx;margin-top:px;margin-bottom:px;z-index:;font-size:test;color:#ffffff;position:relative;}', 'ggg', 0, 23, 'SAVEDD'),
(44, 'test', '<label>test</label><textarea name="test" id="test"></textarea></div>', '#test{background-color:#ffffff;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#ffffff;position:relative;}', 'test', 0, 24, 'SAVEDD'),
(45, 'test', '<label>test</label><textarea name="test" id="test"></textarea></div>', '#test{background-color:#ffffff;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#ffffff;position:relative;}', 'test', 0, 25, 'SAVEDD'),
(46, 'test', '<label>test</label><textarea name="test" id="test"></textarea></div>', '#test{background-color:#ffffff;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#ffffff;position:relative;}', '420', 0, 26, 'SAVEDD'),
(47, 'test2', '<label>test2</label><textarea name="test1" id="test1"></textarea></div>', '#test1{background-color:#ffffff;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#ffffff;position:relative;}', 'container', 0, 27, 'SAVEDD'),
(48, 'label', '<label>label</label><textarea name="variable" id="variable"></textarea></div>', '#variable{background-color:#ffffff;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#ffffff;position:relative;}', 'container', 0, 27, 'SAVEDD'),
(49, 'lable', '<label>lable</label><textarea name="var" id="var"></textarea></div>', '#var{background-color:#ffffff;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#ffffff;position:relative;}', 'container', 0, 27, 'SAVEDD'),
(50, 'Search', '<button type="button" name="waqas" id="waqas">Search</button>', '#waqas{background-color:#800040;width:200px;height:30px;margin-top:px;margin-bottom:px;z-index:;font-size:12;color:#00ff00;position:relative;}', 'container', 0, 27, 'SAVEDD'),
(51, 'golu', '<label>golu</label><textarea name="test" id="test"></textarea></div>', '#test{background-color:#00ff40;width:200px;height:50px;margin-top:px;margin-bottom:px;z-index:;font-size:15;color:#ffffff;position:relative;}', 'test', 0, 28, 'SAVEDD'),
(52, 'label', '<label>label</label><textarea name="var_name" id="var_name"></textarea></div>', '#var_name{background-color:#ffffff;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#ffffff;position:relative;}', '', 0, 29, '1'),
(53, 'tz', '<label>tz</label><input type="text" name="tez" value="" id="tez">', '#tez{background-color:#0000ff;width:px;height:12px;margin-top:px;margin-bottom:px;z-index:;font-size:12;color:#ffffff;position:relative;}', '', 0, 29, '1'),
(54, 'asd', '<label>asd</label><textarea name="waqas" id="waqas"></textarea></div>', '#waqas{background-color:#ffffff;width:px;height:12px;margin-top:px;margin-bottom:px;z-index:;font-size:12;color:#ffffff;position:relative;}', '', 0, 29, '1'),
(55, 'test1', '<label>test1</label><textarea name="test1" id="test1"></textarea></div>', '#test1{background-color:#ffffff;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#ffffff;position:relative;}', '', 0, 29, '1'),
(56, 'waqas', '<label>waqas</label><textarea name="waqas" id="waqas"></textarea></div>', '#waqas{background-color:#ffffff;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#ffffff;position:relative;}', '', 0, 29, '1'),
(57, 'test', '<label>test</label><textarea name="test" id="test"></textarea></div>', '#test{background-color:#000040;width:13px;height:12px;margin-top:23px;margin-bottom:34px;z-index:1;font-size:12;color:#00ff00;position:relative;}', '', 0, 29, '1'),
(58, 'b', '<label>b</label><textarea name="a" id="a"></textarea></div>', '#a{background-color:#ffffff;width:12px;height:12px;margin-top:2px;margin-bottom:3px;z-index:1;font-size:12;color:#ffffff;position:relative;}', '', 0, 29, '1'),
(59, '', '<label></label><textarea name="waqas1" id="waqas1"></textarea></div>', '#waqas1{background-color:#ffffff;width:px;height:px;margin-top:px;margin-bottom:px;z-index:;font-size:;color:#ffffff;position:relative;}', '', 0, 29, '1');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `PAGE_ID` int(9) NOT NULL AUTO_INCREMENT,
  `PAGE_TITLE` varchar(255) NOT NULL,
  `PROJECT_ID` int(9) NOT NULL,
  `NEXT_PAGE` text NOT NULL,
  `STATUS` int(9) NOT NULL,
  PRIMARY KEY (`PAGE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`PAGE_ID`, `PAGE_TITLE`, `PROJECT_ID`, `NEXT_PAGE`, `STATUS`) VALUES
(1, 'PAGE1', 1, 'a', 1),
(2, 'PAGE2', 1, 'b', 1),
(3, 'PAGE3', 1, 'c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `PROJECT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROJECT_NAME` varchar(255) NOT NULL,
  `STATUS` int(9) NOT NULL,
  PRIMARY KEY (`PROJECT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`PROJECT_ID`, `PROJECT_NAME`, `STATUS`) VALUES
(1, 'Project1', 1),
(7, 'waqas', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
