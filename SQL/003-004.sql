
CREATE TABLE `m_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) DEFAULT NULL,
  `content` mediumtext,
  `type` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT NULL,
  `creator` int(11) DEFAULT '0',
  `image_url` varchar(128) DEFAULT NULL,
  `introduction` varchar(2048) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8

CREATE TABLE `m_article_draft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `content` mediumtext,
  `create_time` int(11) DEFAULT NULL,
  `title` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aid_index` (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

