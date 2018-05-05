CREATE TABLE `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
CREATE TABLE `bk_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
CREATE TABLE `bk_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `bk_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `level` int(11) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
CREATE TABLE `bk_auth_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `tel` char(11) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `qq` varchar(11) DEFAULT NULL,
  `twitter` varchar(20) DEFAULT NULL,
  `Intro` varchar(255) DEFAULT NULL,
  `inputtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
CREATE TABLE `dz_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1男性0女性',
  `email` varchar(32) NOT NULL COMMENT '邮箱',
  `telphone` bigint(11) unsigned NOT NULL COMMENT '电话',
  `inputtime` int(11) unsigned NOT NULL COMMENT '创建时间',
  `remark` text NOT NULL COMMENT '备注',
  `photo` varchar(100) NOT NULL COMMENT '头像',
  `trash` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '删除 0表示删除 1表示启用',
  `status` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1表示启用 2表示禁用',
  `group` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
CREATE TABLE `dz_auth_group` (
  `Id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(255) NOT NULL DEFAULT '',
  `remark` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;
CREATE TABLE `dz_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `group_id` (`group_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;
CREATE TABLE `dz_auth_rule` (
  `Id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `level` int(11) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;
CREATE TABLE `dz_backdb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `puttime` int(11) DEFAULT NULL COMMENT '备份时间',
  `adminid` tinyint(3) DEFAULT NULL COMMENT '管理员id',
  `location` varchar(100) DEFAULT NULL COMMENT '备份文件地址',
  `dbsize` float(6,3) DEFAULT NULL COMMENT '占用大小',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='备份数据';
CREATE TABLE `dz_category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `catId` int(11) NOT NULL COMMENT '栏目id',
  `siteid` int(11) NOT NULL COMMENT '站点id',
  `template` smallint(6) NOT NULL COMMENT '模板',
  `catname` varchar(30) NOT NULL COMMENT '栏目名称',
  `description` mediumtext NOT NULL COMMENT '描述',
  `image` varchar(100) NOT NULL COMMENT '栏目图爿',
  `parentid` tinyint(4) NOT NULL COMMENT '父id',
  `child` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否存在子栏目 1存在',
  `arrchildid` mediumtext NOT NULL COMMENT '所有子栏目id',
  `url` varchar(100) NOT NULL COMMENT '链接地址',
  `ismenu` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否在导航显示 1为显示',
  `letter` varchar(50) NOT NULL COMMENT '栏目英文名称',
  `isdel` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除  1已删除',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `dz_comment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(5) NOT NULL COMMENT '评论人id',
  `comment_content` varchar(100) COLLATE utf8_bin NOT NULL COMMENT '评论内容',
  `comment_time` int(11) NOT NULL COMMENT '评论时间',
  `news_id` int(5) NOT NULL COMMENT '文章id',
  `good_id` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '点赞人id',
  `cai_id` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '踩过的人id',
  `good_num` smallint(5) NOT NULL DEFAULT '0' COMMENT '被赞数量',
  `cai_num` smallint(5) NOT NULL DEFAULT '0' COMMENT '踩数',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='评论表';
CREATE TABLE `dz_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` smallint(6) NOT NULL COMMENT '栏目id',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `shorttitle` varchar(20) NOT NULL,
  `content` text NOT NULL COMMENT '内容',
  `image` varchar(100) NOT NULL COMMENT '图爿地址',
  `smallimage` varchar(100) NOT NULL,
  `keywords` varchar(40) NOT NULL COMMENT '关键字',
  `description` varchar(100) NOT NULL COMMENT '描述',
  `url` varchar(100) NOT NULL COMMENT '链接地址',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '审核状态 0为待审核 1为通过 2为不通过',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `copyfrom` varchar(30) NOT NULL COMMENT '来源',
  `allow_comment` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否允许评论 0 不允许',
  `look_num` int(7) NOT NULL COMMENT '浏览数',
  `inputtime` int(11) NOT NULL COMMENT '添加时间',
  `updatetime` int(11) NOT NULL COMMENT '更新时间',
  `isdel` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否删除 1为删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `dz_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `fengmian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `zuozhe` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `neirong` varchar(1000) DEFAULT NULL,
  `inputtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
CREATE TABLE `h_use` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `yx` varchar(20) DEFAULT NULL,
  `dh` int(11) DEFAULT NULL,
  `qq` varchar(255) DEFAULT '11',
  `wb` varchar(20) DEFAULT NULL,
  `jj` varchar(255) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `inputtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
CREATE TABLE `students` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(2) DEFAULT NULL,
  `password` char(32) NOT NULL DEFAULT '',
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
CREATE TABLE `think_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
CREATE TABLE `think_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `think_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `level` int(11) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
CREATE TABLE `xin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `time` date DEFAULT NULL,
  `zz` varchar(30) DEFAULT NULL,
  `seo` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `nr` varchar(255) DEFAULT NULL,
  `yc` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
CREATE TABLE `zhuce` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telphone` varchar(12) DEFAULT NULL,
  `qq` varchar(12) DEFAULT NULL,
  `weibo` varchar(100) DEFAULT NULL,
  `jianjie` varchar(255) DEFAULT NULL,
  `inputtime` int(11) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
