CREATE TABLE `m_access_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `method` tinyint(4) DEFAULT NULL COMMENT 'HTTP方法',
  `module` varchar(32) NOT NULL COMMENT '访问模块',
  `controller` varchar(64) NOT NULL COMMENT '控制器',
  `action` varchar(64) NOT NULL COMMENT '方法',
  `from` varchar(16) NOT NULL COMMENT '来访IP',
  `request` blob COMMENT '请求内容',
  `access_time` int(11) NOT NULL COMMENT '来访时间',
  PRIMARY KEY (`id`),
  KEY `action_index` (`module`,`controller`,`action`),
  KEY `module_time_index` (`module`,`access_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 comment '来访日志';
