
DROP TABLE IF EXISTS `hb_admin`;
CREATE TABLE `hb_admin` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) DEFAULT '',
  `upwd` varchar(50) DEFAULT '',
  `ustate` tinyint(4) DEFAULT '0',
  `uqx` varchar(200) DEFAULT '',
  `uflag` tinyint(4) DEFAULT '1',
  `uloginauth` varchar(30) DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


INSERT INTO `hb_admin` VALUES ('1', 'admin', 'b3dc237b15e4dc64b1f00d90bcedede8', '1', '', '9', 'admin');


DROP TABLE IF EXISTS `hb_article`;
CREATE TABLE `hb_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `seotitle` varchar(200) DEFAULT '',
  `title` varchar(200) DEFAULT '',
  `kwd` varchar(120) DEFAULT '',
  `descript` varchar(300) DEFAULT '',
  `url` varchar(300) DEFAULT '',
  `price` float DEFAULT '1.01',
  `danwei` varchar(10) DEFAULT NULL,
  `pic` varchar(120) DEFAULT '',
  `pic2` varchar(120) DEFAULT '',
  `content` text,
  `ctime` datetime DEFAULT NULL,
  `uptime` datetime DEFAULT NULL,
  `state` tinyint(4) DEFAULT '0',
  `sortnum` int(11) DEFAULT '50',
  `likeart` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hb_ask`;
CREATE TABLE `hb_ask` (
  `askid` int(11) NOT NULL AUTO_INCREMENT,
  `kcid` int(11) DEFAULT NULL,
  `asktitle` varchar(80) DEFAULT NULL,
  `askcontent` text,
  `uid` int(11) DEFAULT '0',
  `askflag` tinyint(4) DEFAULT '0',
  `askkwd` varchar(50) DEFAULT '',
  `askname` varchar(30) DEFAULT NULL,
  `askmail` varchar(50) DEFAULT NULL,
  `askgg` tinyint(4) DEFAULT '0',
  `askzd` tinyint(4) DEFAULT '0',
  `askjh` tinyint(4) DEFAULT '0',
  `asktime` datetime DEFAULT NULL,
  `askuptime` datetime DEFAULT NULL,
  `askhits` int(11) DEFAULT '18',
  PRIMARY KEY (`askid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hb_ask_hf`;
CREATE TABLE `hb_ask_hf` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `askid` int(11) DEFAULT NULL,
  `hname` varchar(30) DEFAULT NULL,
  `hcontent` text,
  `hflag` tinyint(4) DEFAULT '0',
  `hstate` tinyint(4) DEFAULT '0',
  `htime` datetime DEFAULT NULL,
  `hdd` int(4) DEFAULT '0',
  `hcc` int(4) DEFAULT '0',
  `hlxfs` varchar(255) DEFAULT '',
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hb_ask_kclass`;
CREATE TABLE `hb_ask_kclass` (
  `kcid` int(11) NOT NULL AUTO_INCREMENT,
  `kbid` int(11) DEFAULT '0',
  `kcseotitle` varchar(120) DEFAULT NULL,
  `kctitle` varchar(50) DEFAULT '',
  `kcsortnum` int(11) DEFAULT '100',
  `kckwd` varchar(120) DEFAULT '',
  `kcdescript` varchar(200) DEFAULT '',
  `kcpagename` varchar(30) DEFAULT '',
  `kcflag` tinyint(4) DEFAULT NULL,
  `kcmx` varchar(10) DEFAULT '100000000',
  PRIMARY KEY (`kcid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hb_class`;
CREATE TABLE `hb_class` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) DEFAULT '0',
  `ctitle` varchar(50) DEFAULT '',
  `cseotitle` varchar(200) DEFAULT '',
  `ckwd` varchar(100) DEFAULT '',
  `cdescript` varchar(300) DEFAULT '',
  `cpic` varchar(200) DEFAULT '',
  `cflag` tinyint(4) DEFAULT '0',
  `csortnum` int(11) DEFAULT '50',
  `mx` varchar(10) DEFAULT '000000',
  `cidxs` tinyint(4) DEFAULT '0',
  `pagename` varchar(255) DEFAULT '',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `hb_cp_order`;
CREATE TABLE `hb_cp_order` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `price` float DEFAULT '0',
  `danwei` varchar(10) DEFAULT NULL,
  `onum` int(11) DEFAULT '0',
  `lname` varchar(50) DEFAULT '',
  `ltel` varchar(20) DEFAULT '',
  `laddress` varchar(200) DEFAULT '',
  `ltime` datetime DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `hb_lyb`;
CREATE TABLE `hb_lyb` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `ltitle` varchar(100) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `lsex` varchar(2) DEFAULT NULL,
  `lhead` tinyint(4) DEFAULT NULL,
  `lmail` varchar(100) DEFAULT NULL,
  `lcontent` text,
  `lface` tinyint(4) DEFAULT NULL,
  `lstate` tinyint(4) DEFAULT '0',
  `lflag` tinyint(4) DEFAULT '0',
  `ltime` datetime DEFAULT NULL,
  `lreply` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hb_system`;
CREATE TABLE `hb_system` (
  `wid` int(11) NOT NULL AUTO_INCREMENT,
  `wseotitle` varchar(120) DEFAULT '',
  `wtitle` varchar(50) DEFAULT '',
  `wcompany` varchar(50) DEFAULT NULL,
  `wlogo` varchar(50) DEFAULT '',
  `wkwd` varchar(200) DEFAULT '',
  `wdescript` varchar(400) DEFAULT '',
  `wswitch` tinyint(4) DEFAULT '0',
  `wcopyright` varchar(400) DEFAULT '',
  `wkfclose` tinyint(4) DEFAULT '0',
  `wurl` varchar(200) DEFAULT '',
  `wauth` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`wid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `hb_system` VALUES ('1', '五常大米_五常大米批发_稻花香大米批发_五常大米生产基地_五常大米种植_五常市五稻源米业公司', '五常市五稻源米业有限公司', '五常市五稻源米业有限公司', '/images/logo.jpg', '五常大米,五常大米批发,稻花香大米批发,五常大米生产基地', '五常市五稻源米业公司是一家集五常大米生产，五常大米加工，稻花香大米生产基地', '1', '版权所有：北京恒博教育网站培训基地  京ICP备8423422号<br/>\r\n联系方式：北京市丰台区南三环刘家窑桥东嘉业大厦一期B座1505室 <br/>\r\n\r\n联系人：黄老师 联系电话：010-52877560', '0', 'aaaaa', '0');

-- ----------------------------
-- Table structure for `hb_tag`
-- ----------------------------
DROP TABLE IF EXISTS `hb_tag`;
CREATE TABLE `hb_tag` (
  `tid` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `tag` varchar(120) DEFAULT '',
  `ttime` datetime DEFAULT NULL,
  `tflag` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `hb_tagurl`;
CREATE TABLE `hb_tagurl` (
  `tuid` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) DEFAULT NULL,
  `tagurl` varchar(100) DEFAULT '',
  `idstr` varchar(200) DEFAULT '',
  `aidstr` varchar(200) DEFAULT '',
  `descript` varchar(300) DEFAULT '',
  PRIMARY KEY (`tuid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hb_tag_main`;
CREATE TABLE `hb_tag_main` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `tflag` tinyint(4) DEFAULT '0',
  `tnum` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



-- ----------------------------
-- Table structure for `hb_uclass`
-- ----------------------------
DROP TABLE IF EXISTS `hb_uclass`;
CREATE TABLE `hb_uclass` (
  `ucid` int(11) NOT NULL AUTO_INCREMENT,
  `uctitle` varchar(100) DEFAULT NULL,
  `umx` varchar(6) DEFAULT NULL,
  `usortnum` int(11) DEFAULT '50',
  PRIMARY KEY (`ucid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hb_uclass
-- ----------------------------
INSERT INTO `hb_uclass` VALUES ('1', '友情链接管理', '11111', '1');
INSERT INTO `hb_uclass` VALUES ('2', '导航管理', '00000', '50');

-- ----------------------------
-- Table structure for `hb_url`
-- ----------------------------
DROP TABLE IF EXISTS `hb_url`;
CREATE TABLE `hb_url` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `ucid` int(4) DEFAULT '0',
  `utitle` varchar(60) DEFAULT '',
  `url` varchar(100) DEFAULT '',
  `ustate` tinyint(4) DEFAULT '1',
  `upic` varchar(100) DEFAULT '',
  `ulxr` varchar(100) DEFAULT '',
  `ulxfs` varchar(100) DEFAULT '',
  `utime` datetime DEFAULT NULL,
  `ucontent` varchar(400) DEFAULT '',
  `usortnum` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

