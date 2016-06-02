CREATE TABLE `m_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(512) DEFAULT NULL,
  `content` mediumtext,
  `type` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `creator` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


CREATE TABLE `m_article_draft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `content` mediumtext,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aid_index` (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


