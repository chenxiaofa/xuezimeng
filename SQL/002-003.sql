
CREATE TABLE `m_resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(128) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `url` varchar(128) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `owner` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`owner`),
  CONSTRAINT `uid` FOREIGN KEY (`owner`) REFERENCES `m_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

