# Host: localhost  (Version: 5.5.53)
# Date: 2017-09-22 15:36:03
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "dz_category"
#

DROP TABLE IF EXISTS `dz_category`;
CREATE TABLE `dz_category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `catId` int(11) NOT NULL DEFAULT '0' COMMENT '栏目id',
  `siteid` int(11) NOT NULL DEFAULT '0' COMMENT '站点id',
  `template` int(11) NOT NULL DEFAULT '0' COMMENT '模板',
  `catname` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `description` mediumtext NOT NULL COMMENT '描述',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目图片',
  `parentid` varchar(255) NOT NULL DEFAULT '' COMMENT '父id',
  `chilid` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否存在子栏目 1存在',
  `arrchildid` mediumtext NOT NULL COMMENT '所有子栏目id',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `ismenu` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否在导航显示 1显示',
  `letter` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目英文名称',
  `isdel` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否删除  1已删除',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目表';

#
# Data for table "dz_category"
#

/*!40000 ALTER TABLE `dz_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `dz_category` ENABLE KEYS */;

#
# Structure for table "dz_comment"
#

DROP TABLE IF EXISTS `dz_comment`;
CREATE TABLE `dz_comment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL DEFAULT '0' COMMENT '评论人id',
  `comment_content` varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `comment_time` int(11) NOT NULL DEFAULT '0' COMMENT '评论时间',
  `news_id` int(11) NOT NULL DEFAULT '0' COMMENT '文章id',
  `good_id` varchar(255) NOT NULL DEFAULT '' COMMENT '点赞人id',
  `good_num` smallint(6) NOT NULL DEFAULT '0' COMMENT '点赞数',
  `cai_id` int(11) NOT NULL DEFAULT '0' COMMENT '踩过的人id',
  `cai_num` smallint(6) NOT NULL DEFAULT '0' COMMENT '踩数',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表';

#
# Data for table "dz_comment"
#

/*!40000 ALTER TABLE `dz_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `dz_comment` ENABLE KEYS */;

#
# Structure for table "dz_news"
#

DROP TABLE IF EXISTS `dz_news`;
CREATE TABLE `dz_news` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` smallint(6) NOT NULL DEFAULT '0' COMMENT '栏目id',
  `title` varchar(25) NOT NULL DEFAULT '' COMMENT '标题',
  `shorttitle` varchar(25) NOT NULL DEFAULT '' COMMENT '小标题',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '内容',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '图片地址',
  `smallimage` varchar(255) NOT NULL DEFAULT '' COMMENT '小图片',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
  `copyfrom` varchar(255) NOT NULL DEFAULT '' COMMENT '来源',
  `allow_comment` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否允许评论',
  `looknum` int(11) NOT NULL DEFAULT '0' COMMENT '浏览数量',
  `inputtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `datatetime` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `isdel` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容表';

#
# Data for table "dz_news"
#

/*!40000 ALTER TABLE `dz_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `dz_news` ENABLE KEYS */;
