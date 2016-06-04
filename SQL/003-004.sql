CREATE TABLE `m_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(512) NOT NULL COMMENT '文章标题',
  `content` mediumtext NOT NULL COMMENT '文章内容',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '文章类型:1.首页模块,2.课程介绍,3.学子梦动态',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态:0.不显示,1.显示',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `creator` int(11) NOT NULL DEFAULT '0' COMMENT '创建者',
  `image_url` varchar(128) DEFAULT '' COMMENT '标题配图',
  `summarization` varchar(2048) DEFAULT '' COMMENT '摘要',
  `alias` varchar(64) DEFAULT '' COMMENT 'url别名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

CREATE TABLE `m_article_draft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `content` mediumtext,
  `create_time` int(11) DEFAULT NULL,
  `title` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aid_index` (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8