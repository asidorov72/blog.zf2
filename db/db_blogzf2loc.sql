-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_blogzf2loc.blogpost
CREATE TABLE IF NOT EXISTS `blogpost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `intro` tinytext,
  `fulltext` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Dumping data for table db_blogzf2loc.blogpost: ~30 rows (approximately)
/*!40000 ALTER TABLE `blogpost` DISABLE KEYS */;
REPLACE INTO `blogpost` (`id`, `title`, `intro`, `fulltext`, `created`, `updated`, `user_id`) VALUES
	(1, 'My newest post!!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'dasf sdgf sadfg', '2018-01-30 17:25:10', '2018-02-01 20:59:55', 0),
	(2, '21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. dgfhgf', '', '2018-01-30 17:25:10', NULL, 0),
	(3, 'Wrecking Ball (Deluxe)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '', '2018-01-30 17:25:10', NULL, 0),
	(4, 'Born To Die', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'rteweryterwy', '2018-01-30 17:25:10', '2018-02-02 08:17:53', 0),
	(5, 'Making Mirrors', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '', '2018-01-30 17:25:10', NULL, 0),
	(9, 'My test hrenov post', 'In Zend Framework 2.1.4 I am using the standard form view helpers to render out my form elements.', 'I had always wanted to go to Greece, and when I finally went, it was better than I could have imagined. The first part of my trip was to Santorini, and the island’s beauty was breathtaking. If you’re lucky enough to find yourself on this small dot in the Aegean Sea, here are some fun activities to make your trip memorable.\r\n\r\nI had always wanted to go to Greece, and when I finally went, it was better than I could have imagined. The first part of my trip was to Santorini, and the island’s beauty was breathtaking. If you’re lucky enough to find yourself on this small dot in the Aegean Sea, here are some fun activities to make your trip memorable', '2018-01-30 17:25:10', NULL, 0),
	(10, 'dasgfsadg', 'sfdgdsfgh', 'dsfghdfgh', '2018-01-31 10:36:57', NULL, 0),
	(11, 'dasgfsadg', 'sfdgdsfgh', 'dsfghdfgh', '2018-01-31 10:37:42', '2018-01-31 10:40:19', 0),
	(12, 'dasgfsadg', 'sfdgdsfgh', 'dsfghdfgh', '2018-01-31 10:37:50', NULL, 0),
	(13, 'dasgfsadg', 'sfdgdsfgh', 'dsfghdfgh', '2018-01-31 10:37:52', NULL, 0),
	(14, 'dasgfsadg', 'sfdgdsfgh', 'dsfghdfgh', '2018-01-31 10:37:54', NULL, 0),
	(15, 'dasgfsadg', 'sfdgdsfgh', 'dsfghdfgh', '2018-01-31 10:37:55', NULL, 0),
	(16, 'dasgfsadg', 'sfdgdsfgh', 'dsfghdfgh', '2018-01-31 10:58:01', NULL, 0),
	(17, 'eeee', 'eeeeee', 'eeeeeee', '2018-01-31 10:58:18', NULL, 0),
	(18, 'rrrrrrrrr3', 'rrrr3', 'rrrrrrrrrr3', '2018-01-31 10:58:47', '2018-01-31 16:08:27', 0),
	(19, 'wwwww', 'wwwwww', 'wwwwwwwwwww', '2018-01-31 18:13:32', NULL, 0),
	(20, 'sdafsd', 'fsdfsdaf', 'sadfasdf', '2018-02-01 12:09:14', NULL, 0),
	(21, 'yyyyyyyyyyyyyyy 44', 'yyyyyyy44', 'yyyyyyyyyyyyyyy44', '2018-02-01 20:41:01', '2018-02-02 20:27:41', 1),
	(22, 'fffffff', 'ffffffffffff', 'ffffffffffffff', '2018-02-02 10:08:21', NULL, 0),
	(23, 'yyyyyy44', 'yyyyyyyyy44', 'yyyyyyyyy55', '2018-02-02 10:10:30', '2018-02-02 08:11:18', 0),
	(24, 'gggggggg5', 'gggg5', 'ggggggggg5', '2018-02-02 10:15:30', '2018-02-02 08:15:42', 3),
	(25, 'hhh77', 'hhh77', 'hhhh6655', '2018-02-02 10:19:04', '2018-02-02 08:21:39', 3),
	(26, 'qqq', 'qqqq', 'qqqqq', '2018-02-02 10:26:43', NULL, 1),
	(27, 'nnnnnnn', 'nnnnnnnn', 'nnnnnnn', '2018-02-02 10:39:19', NULL, 0),
	(28, 'k', 'kkkkkkkk', 'kkkkkk', '2018-02-02 10:47:05', NULL, 0),
	(29, 'bbbbbb4466', 'bbbbbbbbbbbbbb7766 77', 'bbbbbbbbbbbbbb9966', '2018-02-02 10:49:23', '2018-02-02 08:54:14', 1),
	(31, 'dfsgfdg', 'dsfgdfg', 'dfgdfs', '2018-02-02 12:08:38', '2018-02-02 10:10:49', 1),
	(32, 'Post from Vasya', 'safsad gfsdh gdjh gdfj gh', 'fgdj dfhjk fghjk', '2018-02-02 16:51:52', NULL, 3),
	(33, 'fffffffffffffffffffff', 'ffffffffffffffffff', 'fffffffffffffffffffffffff', '2018-02-02 20:10:43', NULL, 1),
	(35, 'vvv', 'vvv', 'vvv', '2018-02-02 20:45:25', NULL, 1);
/*!40000 ALTER TABLE `blogpost` ENABLE KEYS */;

-- Dumping structure for table db_blogzf2loc.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `state` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table db_blogzf2loc.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`user_id`, `username`, `email`, `display_name`, `password`, `state`) VALUES
	(1, NULL, 'alexsidorov1972@gmail.com', 'Alejandro', '$2y$14$Xi/LCLNcpvo69G/Gk96VXOQlYOGZNxZbk4PaXrRQYtbQ8pyjhOJZy', NULL),
	(3, 'vasyapupkin', 'vpupkin@gmail.com', 'Vasya Pupkin', '$2y$14$TpFJBdcWrZP7AVWZPBaWGeev9sCFkI6zFPnHmCdKgw5YmjFDB4fl.', NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
