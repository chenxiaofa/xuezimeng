CREATE TABLE `m_setting` (
  `key` varchar(128) NOT NULL COMMENT 'key',
  `value` text COMMENT 'value',
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 comment '网站设置';
INSERT INTO `m_setting`(`key`,`value`)VALUES('contact_phone','13800138000'),('contact_qq','10000');