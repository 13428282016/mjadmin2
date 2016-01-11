
-- 影视基本信息表
-- ----------------------------
-- Table structure for movie_info
-- ----------------------------
DROP TABLE IF EXISTS `movie_info`;
CREATE TABLE `movie_info` (
  `movieid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `resourceid` int(11) unsigned DEFAULT NULL COMMENT '资源id,对应看看的movieid,videoid等外部资源id',
  `resource_from` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '资源方:0 本地资源，1 长视频库，2 短视频库',
  `title` varchar(100) DEFAULT NULL,
  `en_title` varchar(255) DEFAULT NULL,
  `demo` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0只有正片，1只有非正片，2两者都有',
  `type` varchar(50) NOT NULL DEFAULT 'movie',
  `vip_enable` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 vip，0非vip',
  `vod_num`  int(11) unsigned DEFAULT '0' COMMENT '可播子集总数',
  `play_times` int(11) DEFAULT NULL COMMENT '播放次数',
  `img_poster` varchar(255) DEFAULT NULL COMMENT '竖版海报图',
  `img_stills` varchar(255) DEFAULT NULL COMMENT '横版海报图',
  `img_background` varchar(255) DEFAULT NULL COMMENT '虚化背景图',
  `keys` varchar(255) DEFAULT NULL COMMENT '关键字',
  `release_date` timestamp  DEFAULT NULL COMMENT '发布时间',
  `last_week_pageview` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上周vv',
  `yesterday_pageview` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '昨日VV',
  `desc` varchar(500) DEFAULT NULL,
  `rating` float DEFAULT NULL COMMENT '评分',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1上架，0正常 -1 删除',
  `cpid` int(11) NOT NULL DEFAULT '1' COMMENT '版权商id',  -- 直接去影视库读
  `audit_userid` varchar(20) NOT NULL DEFAULT '' COMMENT '最后更新用户',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`movieid`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='影视基本信息';


-- 影视子集信息表
-- ----------------------------
-- Table structure for submovie_info
-- ----------------------------
DROP TABLE IF EXISTS `submovie_info`;
CREATE TABLE `submovie_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `submovieid` int(11) unsigned NOT NULL COMMENT '子集id',
  `number` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `attract` varchar(255) DEFAULT NULL COMMENT '看点,子标题',
  `desc` varchar(500) DEFAULT NULL COMMENT '描述',
  `img_thumb` varchar(255) DEFAULT NULL COMMENT '子集截图',
  `vodurl` varchar(255) DEFAULT NULL,
  `vodurl_md5` varchar(32) DEFAULT NULL,
  `gcid` varchar(40) DEFAULT NULL,
  `cid` varchar(40) DEFAULT NULL,
  `chaptertype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1正片，2预告片，3片花，4花絮，5独家片花，6精彩片段',
  `file_size` int(11) NOT NULL,
  `file_ext` varchar(40) DEFAULT NULL,
  `play_length` int(11) NOT NULL,
  `byte_type`  tinyint(1) NOT NULL DEFAULT '1' COMMENT '1,2,3,4(320P,480P,720P,1080P)',
  `substatus` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 表示可播 0,未审核，1 已通过，2已屏蔽，3 修改待审，4预发布，6灰发布',
  `audit_userid` varchar(20) NOT NULL DEFAULT '' COMMENT '最后更新用户',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  PRIMARY KEY (`id`),
  KEY `movieid` (`movieid`,`byte_type`,`chaptertype`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='影视子集信息';

-- 影视库频道表
-- ----------------------------
-- Table structure for movie_channel
-- ----------------------------
DROP TABLE IF EXISTS `movie_channel`;
CREATE TABLE `movie_channel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(100) DEFAULT NULL COMMENT '频道icon',
  `title` varchar(100) DEFAULT NULL COMMENT '频道名称',
  `img_background` varchar(255) DEFAULT NULL  COMMENT '频道背景图',
  `desc` varchar(500) DEFAULT NULL COMMENT '描述',
  `sorts` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1上架，0正常 -1 删除',
  `audit_userid` varchar(20) NOT NULL DEFAULT '' COMMENT '最后更新用户',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='影视库频道信息表';


-- 影视标签
-- ----------------------------
-- Table structure for movie_tag
-- ----------------------------
DROP TABLE IF EXISTS `movie_tag`;
CREATE TABLE `movie_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NULL COMMENT '标签名称',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='影视库分类表';


-- 影视标签关系表
-- ----------------------------
-- Table structure for movie_relation_tag
-- ----------------------------
DROP TABLE IF EXISTS `movie_relation_tag`;
CREATE TABLE `movie_relation_tag` (
  `movieid` int(11) unsigned NOT NULL DEFAULT '0',
  `tagid` int(11) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  UNIQUE KEY `movieid` (`movieid`,`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='影视库影视标签关系表';

-- 游戏频道表
-- ----------------------------
-- Table structure for game_channel
-- ----------------------------
DROP TABLE IF EXISTS `game_channel`;
CREATE TABLE `game_channel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(100) NULL COMMENT '频道icon',
  `title` varchar(200) NULL COMMENT '频道名称',
  `img_background` varchar(255) NULL  COMMENT '频道背景图',
  `desc` varchar(500) NULL COMMENT '描述',
  `sorts` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1上架，0正常 -1 删除',
  `audit_userid` varchar(20) NOT NULL DEFAULT '' COMMENT '最后更新用户',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='游戏频道信息表';

-- 游戏基本信息表
-- ----------------------------
-- Table structure for game_info
-- ----------------------------
DROP TABLE IF EXISTS `game_info`;
CREATE TABLE `game_info` (
  `gameid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '游戏id',
  `channel_id` int(11) unsigned DEFAULT NULL COMMENT '所属频道',
  `title` varchar(100) NULL COMMENT '标题',
  `subtitle` varchar(50) NULL COMMENT '子标题',
  `desc` varchar(500) NULL COMMENT '游戏简介',
  `icon` varchar(100) NULL COMMENT '应用图标',
  `file_size` int(11) DEFAULT NULL COMMENT '文件大小',
  `rating` varchar(50) DEFAULT NULL COMMENT '评分',
  `package_name` varchar(100) NULL COMMENT '包名',
  `package_path` varchar(255) NULL COMMENT '本地路径',
  `version_code` int(11) DEFAULT NULL,
  `version_name` varchar(100) NULL,
  `platform` varchar(50) NULL COMMENT '平台类型:android,ipad,ihone,wp',
  `link_url` varchar(255) NULL COMMENT '外部跳转链接',
  `download_url` varchar(255) NULL COMMENT '下载链接',
  `download_count` int(11) DEFAULT NULL COMMENT '下载量',
  `team` varchar(200) NULL COMMENT '开发者',
  `teamid` int(11) DEFAULT NULL COMMENT '开发者id',
  `img1_poster` varchar(100) NULL  COMMENT '介绍图1',
  `img2_poster` varchar(100) NULL  COMMENT '介绍图2',
  `img3_poster` varchar(100) NULL  COMMENT '介绍图3',
  `img4_poster` varchar(100) NULL  COMMENT '介绍图4',
  `img5_poster` varchar(100) NULL  COMMENT '介绍图5',
  `status` int(11) DEFAULT NULL COMMENT '状态 1 白名单，0正常， -1 黑名单',
  `audit_userid` varchar(20) NOT NULL DEFAULT '' COMMENT '最后更新用户',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  PRIMARY KEY (`gameid`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='游戏信息表';


-- 游戏标签
-- ----------------------------
-- Table structure for movie_tag
-- ----------------------------
DROP TABLE IF EXISTS `game_tag`;
CREATE TABLE `game_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NULL COMMENT '标签名称',
  `type` varchar(100) NULL COMMENT '标签类型',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='影视库分类表';


-- 游戏标签关系表
-- ----------------------------
-- Table structure for movie_tag
-- ----------------------------
DROP TABLE IF EXISTS `game_relation_tag`;
CREATE TABLE `game_relation_tag` (
  `gameid` int(11) unsigned NOT NULL DEFAULT '0',
  `tagid` int(11) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  UNIQUE KEY `gameid` (`gameid`,`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='游戏库影视标签关系表';


-- 模板-轮播图
-- ----------------------------
-- Table structure for block_home_banner
-- ----------------------------
DROP TABLE IF EXISTS `block_home_banner`;
CREATE TABLE `block_home_banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NULL,
  `img_url` varchar(255) NULL,
  `link_path` varchar(255) NULL,
  `is_ad` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 广告，0非广告',
  `desc` varchar(255) NULL,
  `status` int(11) DEFAULT NULL COMMENT '状态 1上架，0正常， -1 删除',
  `sorts` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `up_time` varchar(11) DEFAULT NULL COMMENT '上架时间',
  `down_time` varchar(11) DEFAULT NULL COMMENT '下架时间',
  `audit_userid` varchar(20) NOT NULL DEFAULT '' COMMENT '最后更新用户',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='焦点轮播图信息';

-- 模板 -- 排行榜
-- ----------------------------
-- Table structure for block_home_rangking
-- ----------------------------
DROP TABLE IF EXISTS `block_home_rangking`;
CREATE TABLE `block_home_rangking` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `objectid` int(11) unsigned DEFAULT NULL COMMENT '资源id',
  `img_url` varchar(255) NULL,
  `title` varchar(50) NULL,
  `rating` varchar(50) DEFAULT NULL COMMENT '评分',
  `rating_reason` varchar(100) NULL COMMENT '上榜理由',
  `sorts` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(11) DEFAULT NULL COMMENT '状态 1上架，0正常， -1 删除',
  `up_time` varchar(11) DEFAULT NULL COMMENT '上架时间',
  `down_time` varchar(11) DEFAULT NULL COMMENT '下架时间',
  `audit_userid` varchar(20) NOT NULL DEFAULT '' COMMENT '最后更新用户',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='栏目信息';


-- 模板-栏目管理
-- ----------------------------
-- Table structure for block_column
-- ----------------------------
DROP TABLE IF EXISTS `block_column`;
CREATE TABLE `block_column` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '栏目组id，预留字段，默认组id为0 首页显示',
  `title` varchar(50) NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '栏目类型：1影视，2游戏',
  `desc` varchar(255) NULL,
  `format` int(10) NOT NULL DEFAULT '1' COMMENT '版式 1(2n)，2(2n+1)，3(3n)，4(3n+1)',
  `status` int(11) DEFAULT NULL COMMENT '状态 1上架，0正常 -1 删除',
  `sorts` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `up_time` varchar(11) DEFAULT NULL COMMENT '上架时间',
  `down_time` varchar(11) DEFAULT NULL COMMENT '下架时间',
  `audit_userid` varchar(20) NOT NULL DEFAULT '' COMMENT '最后更新用户',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='栏目信息';

-- 模板-栏目管理
-- ----------------------------
-- Table structure for block_column_content
-- ----------------------------
DROP TABLE IF EXISTS `block_column_content`;
CREATE TABLE `block_home_column_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `columnid` int(11) unsigned DEFAULT NULL COMMENT '栏目id',
  `title` varchar(100) NULL COMMENT '标题',
  `attract` varchar(100) NULL COMMENT '看点,子标题',
  `objectid` int(11) DEFAULT NULL,
  `img_poster` varchar(255) DEFAULT NULL COMMENT '竖版图',
  `img_stills` varchar(255) DEFAULT NULL COMMENT '横版图',
  `badge` int(11) NOT NULL DEFAULT '0' COMMENT '角标类型：1预告，2vip，3独家等',
  `desc` varchar(255) NULL COMMENT '资源描述',
  `status` int(11) DEFAULT NULL COMMENT '状态 1上架，0正常 -1 删除',
  `audit_userid` varchar(20) NOT NULL DEFAULT '' COMMENT '最后更新用户',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='栏目信息';


-- 图片库
-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `imageid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `objectid` int(11) unsigned DEFAULT NULL,  
  `object_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1 影视，2游戏',
  `file_name` varchar(50) NOT NULL DEFAULT '' COMMENT '文件名',
  `file_size` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `file_type` varchar(50) NOT NULL DEFAULT 'unknow/unknow' COMMENT '文件类型',
  `w_h` varchar(20) NOT NULL DEFAULT '' COMMENT '宽高',
  `audit_userid` varchar(20) NOT NULL DEFAULT '' COMMENT '最后更新用户',
  `created_at` timestamp NOT NULL COMMENT '创建时间', 
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL '删除时间,未删除即为空',
  PRIMARY KEY (`imageid`),
  KEY `objectid` (`objectid`),
  KEY `userid` (`audit_userid`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='图片信息';