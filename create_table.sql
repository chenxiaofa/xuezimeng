CREATE TABLE `m_exam_fillable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `esid` int(11) DEFAULT NULL COMMENT 'exam_session 关联 id',
  `eqid` int(11) DEFAULT NULL COMMENT 'exam_questions 关联ID',
  `content` text,
  PRIMARY KEY (`id`),
  KEY `esid_eqid_index` (`esid`,`eqid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ;

CREATE TABLE `m_exam_question_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '选项ID',
  `eqid` int(11) DEFAULT NULL COMMENT '问题ID',
  `content` text COMMENT '选项内容',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `m_exam_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '问题ID',
  `question` text COMMENT '问题内容',
  `type` tinyint(4) DEFAULT '0' COMMENT '问题类型：0.单选，1.多选，3.填空',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(4) DEFAULT '1' COMMENT '是否启用',
  `order` int(11) DEFAULT '0',
  `placeholder` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



CREATE TABLE `m_exam_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `openid` varchar(32) DEFAULT NULL COMMENT '微信OPENID',
  `name` varchar(8) DEFAULT NULL COMMENT '姓名',
  `phone` varchar(11) DEFAULT NULL COMMENT '电话',
  `sex` tinyint(4) DEFAULT NULL COMMENT '性别,1男,2女,0保密',
  `age` tinyint(4) DEFAULT NULL COMMENT '年龄',
  `stage` tinyint(4) DEFAULT NULL COMMENT '就读阶段:1小学,2初中,3高中',
  `score` tinyint(4) DEFAULT NULL COMMENT '得分',
  `exam_time` int(11) DEFAULT NULL COMMENT '考试时间',
  `waid` int(11) DEFAULT NULL,
  `qq` varchar(16) DEFAULT NULL,
  `eqoid` text,
  `school` varchar(64) DEFAULT NULL,
  `class` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `m_php_session` (
  `id` char(40) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `m_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) DEFAULT NULL COMMENT '用户名',
  `email` varchar(64) DEFAULT NULL COMMENT '邮箱',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `salt` varchar(32) DEFAULT NULL COMMENT '加密辅助',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `last_login_time` int(11) DEFAULT NULL COMMENT '最后登录时间',
  `auth_key` varchar(100) DEFAULT NULL COMMENT '授权Key',
  `role_id` int(11) DEFAULT NULL COMMENT '角色ID',
  PRIMARY KEY (`id`),
  KEY `name_key` (`username`),
  KEY `email_key` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户信息表';


CREATE TABLE `m_wx_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID,app_id',
  `name` varchar(128) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL COMMENT '所有者ID',
  `status` tinyint(4) DEFAULT NULL,
  `wx_app_id` varchar(64) NOT NULL COMMENT '应用ID',
  `wx_app_sec` varchar(64) NOT NULL COMMENT '应用Sec',
  `wx_token` varchar(64) NOT NULL COMMENT '应用token',
  `wx_encoding_aes_key` varchar(64) DEFAULT 'null' COMMENT '加密密钥',
  `wx_is_encrypted` tinyint(1) DEFAULT NULL COMMENT '是否启用加密',
  `wx_access_token` varchar(256) DEFAULT NULL COMMENT 'access_token',
  `wx_access_token_expire` int(11) DEFAULT NULL COMMENT 'Token过期时间',
  `create_time` int(11) DEFAULT NULL COMMENT '应用创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '应用更新时间',
  PRIMARY KEY (`id`),
  KEY `app_id_index` (`wx_app_id`),
  KEY `token_index` (`wx_access_token`(255)),
  KEY `name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='微信信息表';





CREATE TABLE `m_wx_app_permission` (
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `app_id` int(11) NOT NULL COMMENT 'APPID',
  `type` int(11) NOT NULL COMMENT '权限类型',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='微信管理权限表';


CREATE TABLE `m_wx_bind` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户绑定微信账号关系ID',
  `waid` int(11) NOT NULL COMMENT '微信APPID',
  `wuid` int(11) NOT NULL COMMENT '微信用户ID',
  `openid` varchar(64) NOT NULL COMMENT '微信openid',
  `groupid` int(11) DEFAULT NULL COMMENT '用户分组ID',
  `subscribe` int(11) DEFAULT NULL COMMENT '是否订阅',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `m_wx_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜单ID',
  `parent_id` int(11) DEFAULT NULL COMMENT '父节点ID',
  `app_id` int(11) NOT NULL COMMENT 'appid',
  `type` tinyint(4) NOT NULL COMMENT '按钮类型',
  `name` varchar(40) DEFAULT NULL COMMENT '按钮名称',
  `param` varchar(1024) DEFAULT NULL COMMENT '按钮参数',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '是否启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='微信信息表';

CREATE TABLE `m_wx_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '微信用户ID',
  `nickname` varchar(128) NOT NULL COMMENT '微信昵称',
  `sex` tinyint(4) NOT NULL COMMENT '微信性别',
  `language` varchar(16) DEFAULT NULL COMMENT '微信语言',
  `city` varchar(16) DEFAULT NULL COMMENT '城市',
  `province` varchar(16) DEFAULT NULL COMMENT '省份',
  `openid` varchar(64) DEFAULT NULL COMMENT 'openid',
  `headimgurl` varchar(128) DEFAULT NULL COMMENT '头像URL',
  `unionid` varchar(64) DEFAULT NULL COMMENT '联合ID',
  `remark` text COMMENT '备注',
  `groupid` int(11) DEFAULT NULL COMMENT '分组ID',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




