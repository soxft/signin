SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` mediumtext,
  `name` mediumtext,
  `time` mediumtext NOT NULL,
  `ip` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


