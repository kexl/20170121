/*
Navicat MySQL Data Transfer

Source Server         : abcd
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : judian

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2016-12-28 15:45:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `hb_admin`
-- ----------------------------
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

-- ----------------------------
-- Records of hb_admin
-- ----------------------------
INSERT INTO `hb_admin` VALUES ('1', 'admin', 'b3dc237b15e4dc64b1f00d90bcedede8', '1', '', '9', 'admin');

-- ----------------------------
-- Table structure for `hb_article`
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hb_article
-- ----------------------------
INSERT INTO `hb_article` VALUES ('1', '1', '网站建设公司简介_北京网站建设公司介绍_北京聚点网站建设公司', '企业简介', '网站建设公司,北京网站建设公司,北京聚点网站建设公司', '本集团严格执行国家绿色食品操作规程，实行“从土地到餐桌”的全程质量监控，其主导产品，锦秋牌免洗、精制、特制大米，于1997年获得国家注册商标和绿色食品证书。 该产品集黑土地之精华，以其品优良，安全可靠，长期供应驻港、驻澳部队，辐射广东、江苏、河北、黑龙江等五省市场，有深圳市场百分之七十的份额，同全国各地100多家超市及200多家代理商和经销商保持稳定的供货关系，年销售总量呈快速增长态势。\r\n<p>\r\n本集团已获得自营产品进出品经营权，为了同国际市场接轨，已国家有关科研部门成功地开发了香米、胡萝卜米等营养米系列产品，现已批量生产，投放市场。\r\n本集团严格执行国家绿色食品操作规程，实行“从土地到餐', '', '0', '', '', '', '<p>&nbsp;<span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 16px; text-indent: 32px;\">本集团严格执行国家绿色食品操作规程，实行&ldquo;从土地到餐桌&rdquo;的全程质量监控，其主导产品，锦秋牌免洗、精制、特制大米，于1997年获得国家注册商标和绿色食品证书。 该产品集黑土地之精华，以其品优良，安全可靠，长期供应驻港、驻澳部队，辐射广东、江苏、河北、黑龙江等五省市场，有深圳市场百分之七十的份额，同全国各地100多家超市及200多家代理商和经销商保持稳定的供货关系，年销售总量呈快速增长态势。</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 16px; text-indent: 32px;\">本集团已获得自营产品进出品经营权，为了同国际市场接轨，已国家有关科研部门成功地开发了香米、胡萝卜米等营养米系列产品，现已批量生产，投放市场。</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 16px; text-indent: 32px;\">本集团严格执行国家绿色食品操作规程，实行&ldquo;从土地到餐桌&rdquo;的全程质量监控，其主导产品，锦秋牌免洗、精制、特制大米，于1997年获得国家注册商标和绿色食品证书。 该产品集黑土地之精华，以其品优良，安全可靠，长期供应驻港、驻澳部队，辐射广东、江苏、河北、黑龙江等五省市场，有深圳市场百分之七十的份额，同全国各地100多家超市及200多家代理商和经销商保持稳定的供货关系，年销售总量呈快速增长态势。</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 16px; text-indent: 32px;\">本集团已获得自营产品进出品经营权，为了同国际市场接轨，已国家有关科研部门成功地开发了香米、胡萝卜米等营养米系列产品，现已批量生产，投放市场。</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 16px; text-indent: 32px;\">本集团严格执行国家绿色食品操作规程，实行&ldquo;从土地到餐桌&rdquo;的全程质量监控，其主导产品，锦秋牌免洗、精制、特制大米，于1997年获得国家注册商标和绿色食品证书。 该产品集黑土地之精华，以其品优良，安全可靠，长期供应驻港、驻澳部队，辐射广东、江苏、河北、黑龙江等五省市场，有深圳市场百分之七十的份额，同全国各地100多家超市及200多家代理商和经销商保持稳定的供货关系，年销售总量呈快速增长态势。</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 16px; text-indent: 32px;\">本集团已获得自营产品进出品经营权，为了同国际市场接轨，已国家有关科研部门成功地开发了香米、胡萝卜米等营养米系列产品，现已批量生产，投放市场。</p>', '2016-12-28 14:17:24', '2016-12-28 14:37:07', '1', '50', '');
INSERT INTO `hb_article` VALUES ('2', '1', '企业文化', '企业文化', '企业文化', '企业文化', '', '0', '', '', '', '<p>&nbsp;企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化</p>\r\n<p>企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化</p>', '2016-12-28 14:17:49', '2016-12-28 14:17:49', '1', '50', '');
INSERT INTO `hb_article` VALUES ('3', '2', '阿里巴巴_马云的介绍', '阿里巴巴官方网站对马云的介绍', '马云的介绍', '马云 阿里巴巴集团主席兼首席执行官 阿里巴巴（B2B）公司主席及非执行董事 ', '', '0', '', '/statics/images/up/2016/12280621122_s.jpg', '/statics/images/up/2016/12280621129.jpg', '<p>&nbsp; 马云 阿里巴巴集团主席兼首席执行官 阿里巴巴（B2B）公司主席及非执行董事&nbsp;</p>\r\n<div>&nbsp; 马云先生为阿里巴巴集团的主要创办人，自一九九九年成立以来一直出任阿里巴巴集团的董事局主席及行政总裁。马云先生负责阿里巴巴集团及本公司的整体策略及方针。&nbsp;</div>\r\n<div>&nbsp; 马云先生为中国互联网行业的先锋人物，于一九九五年成立中国首家商业网站--中国黄页。一九九八年至一九九九年，马云先生领导由中国对外经济贸易合作部辖下中国国际电子商务中心成立的资讯科技公司。&nbsp;</div>\r\n<div>&nbsp; 马云先生目前担任软银集团董事。马云先生于二零零一年被世界经济论坛选为&ldquo;全球青年领袖&rdquo;，于二零零四年被中国中央电视台选为&ldquo;年度十大经济人物&rdquo;之一，于二零零五年被美国财富杂志评为&ldquo;亚洲最具权力的25 名商人&rdquo;之一。&nbsp;</div>\r\n<div>&nbsp; 马云先生也是亚太经济合作组织（APEC）下工商咨询委员会(ABAC)会员. 更多关注中小企业的发展。&nbsp;</div>\r\n<div>&nbsp; 马先生毕业于杭州师范学院，获英语学士学位。&nbsp;</div>', '2016-12-28 14:20:45', '2016-12-28 14:20:45', '1', '50', '');
INSERT INTO `hb_article` VALUES ('4', '2', '马云的个人小经历', '马云的个人小经历', '马云的个人小经历', '马云的个人小经历马云的个人小经历马云的个人小经历', '', '0', '', '/statics/images/up/2016/12280622155_s.jpg', '/statics/images/up/2016/12280622157.jpg', '<p>&nbsp;曾任杭州电子工学院英语教师。1995年，马云做为翻译首次访问美国，并且首次接触到了因特网。回国后，马云开设了制作主页的公司&ldquo;海博网路&rdquo;。之后又被任命为中国政府的电子商务推进组织的负责人。1999年3月，马云开设了通过电子商务联接全球中小企业的Alibaba.com。同年9月，在香港成功注册法人，出任首席执行官。&nbsp;</p>\r\n<div>&nbsp; 在中国互联网的发展中，不能不提及马云。马云以良好的口碑和卓越的领导才能赢得了广大站长的尊敬和拥护，这是其他企业家需要学习的地方。&nbsp;</div>', '2016-12-28 14:22:09', '2016-12-28 14:22:09', '1', '50', '');
INSERT INTO `hb_article` VALUES ('5', '2', '哈佛大学两次将他和阿里巴巴经营管理的实践收录为', '哈佛大学两次将他和阿里巴巴经营管理的实践收录为', '', '哈佛大学两次将他和阿里巴巴经营管理的实践收录为', '', '0', '', '/statics/images/up/2016/12280623125_s.jpg', '/statics/images/up/2016/12280623129.jpg', '<div>哈佛大学两次将他和阿里巴巴经营管理的实践收录为MBA案例。在2002年1月发布的阿里巴巴第二份MBA管理案例，哈佛引用了马云对阿里巴巴的核心价值的阐述，&quot;马云认为阿里巴巴的价值不在于每天的浏览量是多少，而在于能否给客户带来价值。&quot;以此来表明对阿里巴巴迅速发展的认可。&nbsp;</div>\r\n<div>&nbsp; 马云是中国大陆第一位登上国际权威财经杂志《福布斯》封面的企业家，并于2002年5月成为日本最大的《日经》杂志的封面人物，《日经》杂志高度评价阿里巴巴在中日贸易领域里的贡献 &quot;阿里巴巴已达到收支平衡，成为整个互联网世界的骄傲。自中国加入WTO以来，日本市场逐渐升温，大量的日本企业将目光投向阿里巴巴，并对她寄予了浓厚的兴趣和希望。&quot;&nbsp;</div>\r\n<div>&nbsp; 马云于1995年4月创办了&quot;中国黄页&quot;网站，这是全球第一家网上中文商业信息站点，在国内最早形成面向企业服务的互联网商业模式。1997年年底，马云和他的团队在北京开发了外经贸部官方站点、网上中国商品交易市场、网上中国技术出口交易会、中国招商、网上广交会和中国外经贸等一系列国家级站点。&nbsp;</div>\r\n<div>&nbsp; 1999年3月，马云和他的团队回到杭州，以50万元人民币创业，开发阿里巴巴网站。他根据长期以来在互联网商业服务领域的经验和体会，明确提出互联网产业界应重视和优先发展企业与企业间电子商务(B2B)，他的观点和阿里巴巴的发展模式很快引起国际互联网界的关注，被称为&quot;互联网的第四模式&quot;。&nbsp;</div>', '2016-12-28 14:22:56', '2016-12-28 14:22:56', '1', '50', '');
INSERT INTO `hb_article` VALUES ('6', '2', '如果一个事情比别人多付出5%的努力，就可能拿到别人200%的回报', '如果一个事情比别人多付出5%的努力，就可能拿到别人200%的回报', '', '如果一个事情比别人多付出5%的努力，就可能拿到别人200%的回报', '', '0', '', '/statics/images/up/2016/12280623560_s.jpg', '/statics/images/up/2016/12280623564.jpg', '<p>&nbsp; 李想定律：如果一个事情比别人多付出5%的努力，就可能拿到别人200%的回报。做事要认真。李想每天都在这样要求身边的每一个人，因为他自己就是这个方式的受益者。比如同去参加一个新品展示，李想就要求泡泡网的文章要比别的媒体先出来，哪怕就比人家快5分钟。&nbsp;</p>\r\n<div>&nbsp; 李想风格：&ldquo;在高速上保持预见性，把自己变成导演&rdquo;。除了互联网，车就是李想的最爱。他的车开得极猛。&nbsp;</div>\r\n<div>&nbsp; 李想父母是当地艺术学校的老师，家教宽松。李想儿时在乡间长大；中学时跟奶奶住在一起，很少被父母留在身边。李想有一个够大的空间，自由成长。李想不觉得自己是个商人，自小在农村长大，自称&ldquo;像农民般正直&rdquo;，因为诚恳待人，&ldquo;所以这些人才都一直跟着我&rdquo;。&nbsp;</div>\r\n<div>&nbsp; 李想的背后有很多&ldquo;老大哥&rdquo;。一群三四十岁的企业家都把他当作小兄弟来看，关键时刻就出手帮忙。薛蛮子算是一个忘年交，他是UT斯达康的创始人，做过8848的董事长。265.com看起来是一个再简单不过的导航网站，但跟创始人蔡文胜接触以后，李想总结，是因为这个人特别好，这个网站才特别好。&nbsp;</div>\r\n<div>&nbsp; 李想不喜欢课堂，他总要学习在实践中能快速使用的。需要什么才学什么，学了什么就马上用起来。但初中时候也曾经在课堂上拼命学习，就因为老师一句话的激励：&ldquo;学习不好不要紧，但一定要做个优秀的人&rdquo;。他认为这是他在课堂上所学到的最有价值的东西。&nbsp;</div>\r\n<div>&nbsp; 中学六年，李想把所有业余时间都给了计算机和互联网，&ldquo;它们就是为我而发明的&rdquo;。要转遍石家庄所有的邮局去买一张软件，整夜的呆在电脑前搭建自己的网上王国。白天在课堂上不愿同老师同学分享的观点，晚上在互联网上可以敞开自由地表达、遭遇到强烈地碰撞，在争执或者认同中被不断记录、被不断成就。&ldquo;新东西都是在互联网上学到的，传统的教育被抛开了。&rdquo;&nbsp;</div>\r\n<div>编辑本段成功秘诀&nbsp;</div>\r\n<div>&nbsp; 在网络经济时代，未完成学业就离开校园，年纪轻轻就建立起一家知名的大型网络公司的例子并不鲜见。19岁的迈克尔&middot;戴尔放弃了德州大学的学业，决定建立自己的电脑公司。今天，世界计算机领域里有了一家知名的&ldquo;戴尔公司&rdquo;。&nbsp;</div>', '2016-12-28 14:23:49', '2016-12-28 14:23:49', '1', '50', '');
INSERT INTO `hb_article` VALUES ('7', '2', '80后新贵李想 创业要学会妥协', '80后新贵李想 创业要学会妥协', '', '80后新贵李想 创业要学会妥协', '', '0', '', '/statics/images/up/2016/12280624344_s.jpg', '/statics/images/up/2016/12280624346.jpg', '<p>&nbsp; 80后新贵李想 创业要学会妥协&nbsp;</p>\r\n<div>&nbsp; 身价过亿的&ldquo;高中生&rdquo;李想1981年生，泡泡网CEO.从最初几千元的进账到一亿以上身价，时间不过短短四年。泡泡网是第三大中文IT专业网站。2005年营收近2千万，利润1千万。取20倍的市盈率，市场价值2亿。创始人李想一股独大，身价在1亿以上。这一年，李想24岁，创业6年。&nbsp;</div>\r\n<div>&nbsp; 做阳刚的事情，却善用稳妥的手法&nbsp;</div>\r\n<div>&nbsp; 其实6年创业跟开车跑一圈四环也是相似的风格，两个字：顺、稳。1999年，18岁小伙的个人网站靠送上门来的网络广告就赚了10万，这一年高中毕业、成绩平平。2002年，李想告别父母，从石家庄迁到北京，招兵买马，开始&ldquo;正式的商业运作&rdquo;。自此，泡泡网的广告销售每年以100%以上的速度增长，2005年，又从IT产品向汽车业扩张。&nbsp;</div>\r\n<div>&nbsp; 看看这些简单品质&nbsp;</div>\r\n<div>&nbsp; 李想定律：如果一个事情比别人多付出5%的努力，就可能拿到别人200%的回报。做事要认真。李想每天都在这样要求身边的每一个人，因为他自己就是这个方式的受益者。比如同去参加一个新品展示，李想就要求泡泡网的文章要比别的媒体先出来，哪怕就比人家快5分钟。&nbsp;</div>\r\n<div>&nbsp; 李想风格：&ldquo;在高速上保持预见性，把自己变成导演&rdquo;。除了互联网，车就是李想的最爱。他的车开得极猛。&nbsp;</div>\r\n<div>&nbsp; 李想父母是当地艺术学校的老师，家教宽松。李想儿时在乡间长大；中学时跟奶奶住在一起，很少被父母留在身边。李想有一个够大的空间，自由成长。李想不觉得自己是个商人，自小在农村长大，自称&ldquo;像农民般正直&rdquo;，因为诚恳待人，&ldquo;所以这些人才都一直跟着我&rdquo;。&nbsp;</div>\r\n<div>&nbsp; 李想的背后有很多&ldquo;老大哥&rdquo;。一群三四十岁的企业家都把他当作小兄弟来看，关键时刻就出手帮忙。薛蛮子算是一个忘年交，他是UT斯达康的创始人，做过8848的董事长。265.com看起来是一个再简单不过</div>', '2016-12-28 14:24:28', '2016-12-28 14:24:28', '1', '50', '');
INSERT INTO `hb_article` VALUES ('8', '2', '从普通执照到赛手驾照、拉力赛驾照.', '从普通执照到赛手驾照、拉力赛驾照.', '从普通执照到赛手驾照、拉力赛驾照.', '从普通执照到赛手驾照、拉力赛驾照.', '', '0', '', '/statics/images/up/2016/12280625278_s.jpg', '/statics/images/up/2016/12280625278.jpg', '<p>&nbsp;从普通执照到赛手驾照、拉力赛驾照... ...&nbsp;</p>\r\n<div>&nbsp; 4、李想的霸气&nbsp;</div>\r\n<div>&nbsp; 李想是一个腼腆的人。但当谈到股权分配的问题上，我们分明看到一个强势的李想。&nbsp;</div>\r\n<div>&nbsp; 5、李想的真诚&nbsp;</div>\r\n<div>&nbsp; 李想并不回避自己的失误，也乐于反省。 也并不回避评价竞争对手，他很认真地和你分析每一家的优劣短长， 甚至愿意交待自己的罗曼史。&nbsp;</div>\r\n<div>&nbsp; 6、郑渊洁之缘&nbsp;</div>\r\n<div>&nbsp; 小时候的李想是《童话大王》的读者，是郑渊洁的粉丝。郑渊洁对李想的影响隐约可见。李想的特立独行的风格似乎就像一个梦或一个童话。&nbsp;</div>\r\n<div>编辑本段李想特点&nbsp;</div>\r\n<div>&nbsp; 80后新贵李想 创业要学会妥协&nbsp;</div>\r\n<div>&nbsp; 身价过亿的&ldquo;高中生&rdquo;李想1981年生，泡泡网CEO.从最初几千元的进账到一亿以上身价，时间不过短短四年。泡泡网是第三大中文IT专业网站。2005年营收近2千万，利润1千万。取20倍的市盈率，市场价值2亿。创始人李想一股独大，身价在1亿以上。这一年，李想24岁，创业6年。&nbsp;</div>\r\n<div>&nbsp; 做阳刚的事情，却善用稳妥的手法&nbsp;</div>\r\n<div>&nbsp; 其实6年创业跟开车跑一圈四环也是相似的风格，两个字：顺、稳。1999年，18岁小伙的个人网站靠送上门来的网络广告就赚了10万，这一年高中毕业、成绩平平。2002年，李想告别父母，从石家庄迁到北京，招兵买马，开始&ldquo;正式的商业运作&rdquo;。自此，泡泡网的广告销售每年以100%以上的速度增长，2005年，又从IT产品向汽车业扩张。&nbsp;</div>\r\n<div>&nbsp; 看看这些简单品质&nbsp;</div>', '2016-12-28 14:25:17', '2016-12-28 14:25:17', '1', '50', '');
INSERT INTO `hb_article` VALUES ('9', '2', '阿里巴巴已达到收支平衡，成为整个互联网世界的骄傲', '阿里巴巴已达到收支平衡，成为整个互联网世界的骄傲', '', '阿里巴巴已达到收支平衡，成为整个互联网世界的骄傲', '', '0', '', '/statics/images/up/2016/12280626125_s.jpg', '/statics/images/up/2016/12280626128.jpg', '<p>&nbsp;马云是中国大陆第一位登上国际权威财经杂志《福布斯》封面的企业家，并于2002年5月成为日本最大的《日经》杂志的封面人物，《日经》杂志高度评价阿里巴巴在中日贸易领域里的贡献 &quot;阿里巴巴已达到收支平衡，成为整个互联网世界的骄傲。自中国加入WTO以来，日本市场逐渐升温，大量的日本企业将目光投向阿里巴巴，并对她寄予了浓厚的兴趣和希望。&quot;&nbsp;</p>\r\n<div>&nbsp; 马云于1995年4月创办了&quot;中国黄页&quot;网站，这是全球第一家网上中文商业信息站点，在国内最早形成面向企业服务的互联网商业模式。1997年年底，马云和他的团队在北京开发了外经贸部官方站点、网上中国商品交易市场、网上中国技术出口交易会、中国招商、网上广交会和中国外经贸等一系列国家级站点。&nbsp;</div>\r\n<div>&nbsp; 1999年3月，马云和他的团队回到杭州，以50万元人民币创业，开发阿里巴巴网站。他根据长期以来在互联网商业服务领域的经验和体会，明确提出互联网产业界应重视和优先发展企业与企业间电子商务(B2B)，他的观点和阿里巴巴的发展模式很快引起国际互联网界的关注，被称为&quot;互联网的第四模式&quot;。&nbsp;</div>\r\n<div>&nbsp; 1999年10月和2000年1月，阿里巴巴两次共获得国际风险资金2500万美元投入，马云以&quot;东方的智慧，西方的运作，全球的大市场&quot;的经营管理理念，迅速招揽国际人才，全力开拓国际市场，同时培育国内电子商务市场，为中国企业尤其是中小企业迎接&quot;入世&quot;挑战构建一个完善的电子商务平台。&nbsp;</div>', '2016-12-28 14:26:00', '2016-12-28 14:26:00', '1', '50', '');
INSERT INTO `hb_article` VALUES ('10', '2', '他和他的团队创造了中国互联网商务众多', '他和他的团队创造了中国互联网商务众多', '他和他的团队创造了中国互联网商务众多', '他和他的团队创造了中国互联网商务众多', '', '0', '', '/statics/images/up/2016/12280626517_s.jpg', '/statics/images/up/2016/12280626519.jpg', '<p>&nbsp;马云创立的阿里巴巴被国内外媒体、硅谷和国外风险投资家誉为与 Yahoo 、 Amazon 、 eBay 、 AOL 比肩的五大互联网商务流派代表之一。它的成立推动了中国商业信用的建立，在激烈的国际竞争中为中小企业创造了无限机会，&ldquo;让天下没有难做的生意&rdquo;。&nbsp;</p>\r\n<div>&nbsp; 马云创办的个人拍卖网站淘宝网，成功走出了一条中国本土化的独特道路，从2005年第一季度开始成为亚洲最大的个人拍卖网站。&nbsp;</div>\r\n<div>&nbsp; 马云是中国大陆第一位登上美国权威财经杂志《福布斯》封面的企业家；2002年5月，成为日本最大财经杂志《日经》的封面人物；2000 年 10 月，被&ldquo;世界经济论坛&rdquo;评为 2001 年全球 100 位&ldquo;未来领袖&rdquo;之一；美国亚洲商业协会评选他为2001年度&ldquo;商业领袖&rdquo;；2004年12月，荣获CCTV十大年度经济人物奖。&nbsp;</div>\r\n<div>&nbsp; 马云是最早在中国开拓电子商务应用并坚守在互联网领域的企业家，他和他的团队创造了中国互联网商务众多第一。他开办中国第一个互联网商业网站，他提出并实践面向亚洲中小企业的B2B电子商务模式，他于2002年3月10日起在中国网站全面推行&quot;诚信通&quot;计划，从而在全球首创企业间网上信用商务平台，他发起并策划了著名的&quot;西湖论剑&quot;大会，使之成为青年企业家交流与成长的平台。2002年成为杭州市政协委员。&nbsp;</div>\r\n<div>&nbsp; 哈佛大学两次将他和阿里巴巴经营管理的实践收录为MBA案例。在2002年1月发布的阿里巴巴第二份MBA管理案例，哈佛引用了马云对阿里巴巴的核心价值的阐述，&quot;马云认为阿里巴巴的价值不在于每天的浏览量是多少，而在于能否给客户带来价值。&quot;以此来表明对阿里巴巴迅速发展的认可。&nbsp;</div>\r\n<div>&nbsp; 马云是中国大陆第一位登上国际权威财经杂志《福布斯》封面的企业家，并于2002年5月成为日本最大的《日经》杂志的封面人物，《日经》杂志高度评价阿里巴巴在中日贸易领域里的贡献 &quot;阿里巴巴已达到收支平衡，成为整个互联网世界的骄傲。自中国加入WTO以来，日本市场逐渐升温，大量的日本企业将目光投向阿里巴巴，并对她寄予了浓厚的兴趣和希望。&quot;&nbsp;</div>\r\n<div>&nbsp; 马云于1995年4月创办了&quot;中国黄页&quot;网站，这是全球第一家网上中文商业信息站点，在国内最早形成面向企业服务的互联网商业模式。1997年年底，马云和他的团队在北京开发了外经贸部官方站点、网上中国商品交易</div>', '2016-12-28 14:26:37', '2016-12-28 14:26:37', '1', '50', '');
INSERT INTO `hb_article` VALUES ('12', '2', '当你陷入人为困境时，不要抱怨，你只能默默地吸取教训', '当你陷入人为困境时，不要抱怨，你只能默默地吸取教训', '', '当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训', '', '0', '', '', '', '<p>&nbsp;当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训当你陷入人为困境时，不要抱怨，你只能默默地吸取教训</p>', '2016-12-28 14:53:14', '2016-12-28 14:53:14', '1', '50', '');
INSERT INTO `hb_article` VALUES ('13', '2', '人们都喜欢看电视剧，但你不要看，那并不是你的生活', '人们都喜欢看电视剧，但你不要看，那并不是你的生活', '', '人们都喜欢看电视剧，但你不要看，那并不是你的生活', '', '0', '', '/statics/images/up/2016/12280700195_s.jpg', '/statics/images/up/2016/12280700197.jpg', '<p>&nbsp;人们都喜欢看电视剧，但你不要看，那并不是你的生活。只要在公司工作，你是无暇看电视剧的人们都喜欢看电视剧，但你不要看，那并不是你的生活。只要在公司工作，你是无暇看电视剧的人们都喜欢看电视剧，但你不要看，那并不是你的生活。只要在公司工作，你是无暇看电视剧的人们都喜欢看电视剧，但你不要看，那并不是你的生活。只要在公司工作，你是无暇看电视剧的人们都喜欢看电视剧，但你不要看，那并不是你的生活。只要在公司工作，你是无暇看电视剧的人们都喜欢看电视剧，但你不要看，那并不是你的生活。只要在公司工作，你是无暇看电视剧的人们都喜欢看电视剧，但你不要看，那并不是你的生活。只要在公司工作，你是无暇看电视剧的人们都喜欢看电视剧，但你不要看，那并不是你的生活。只要在公司工作，你是无暇看电视剧的人们都喜欢看电视剧，但你不要看，那并不是你的生活。只要在公司工作，你是无暇看电视剧的</p>', '2016-12-28 14:59:53', '2016-12-28 14:59:53', '1', '50', '');
INSERT INTO `hb_article` VALUES ('14', '1', '经营理念', '经营理念', '', '经营理念经营理念经营理念经营理念', '', '0', '', '', '', '<p>&nbsp;经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念经营理念<img src=\"/statics/userfiles/20161228072706_5.jpg\" width=\"515\" height=\"512\" alt=\"\" /></p>', '2016-12-28 15:27:12', '2016-12-28 15:27:21', '1', '50', '');

-- ----------------------------
-- Table structure for `hb_ask`
-- ----------------------------
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hb_ask
-- ----------------------------

-- ----------------------------
-- Table structure for `hb_ask_hf`
-- ----------------------------
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hb_ask_hf
-- ----------------------------

-- ----------------------------
-- Table structure for `hb_ask_kclass`
-- ----------------------------
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hb_ask_kclass
-- ----------------------------

-- ----------------------------
-- Table structure for `hb_class`
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hb_class
-- ----------------------------
INSERT INTO `hb_class` VALUES ('1', '0', '我们 ', '北京网站建设公司_北京聚点网站建建设公司_北京互联网开发专业公司', '北京网站建设公司,北京聚点网站建建设公司,北京互联网开发', '北京聚点网络公司是从事于网站建设服务，网站运营管理，企业互联网运营策划的专业型公司', '', '2', '50', '111101', '0', 'about');
INSERT INTO `hb_class` VALUES ('2', '0', '新闻', '网站建设公司新闻_互联网行业新闻_网络公司资讯', '网站建设公司新闻,互联网行业新闻,网络公司资讯', '网站建设公司新闻_互联网行业新闻_网络公司资讯', '', '0', '50', '111101', '0', 'news');
INSERT INTO `hb_class` VALUES ('3', '0', '业务', '网站建设_网站运营优化_北京聚点网络公司业务', '网站建设,网站运营优化', '网站建设_网站运营优化_北京聚点网络公司业务', '', '0', '50', '111101', '0', 'sale');
INSERT INTO `hb_class` VALUES ('4', '1', '企业荣誉', '企业荣誉', '企业荣誉企业荣誉企业荣誉', '企业荣誉企业荣誉企业荣誉企业荣誉', '', '0', '50', '100001', '0', 'about');
INSERT INTO `hb_class` VALUES ('5', '0', '伙伴', '伙伴', '伙伴', '伙伴', '', '0', '50', '100001', '0', 'sss');

-- ----------------------------
-- Table structure for `hb_cp_order`
-- ----------------------------
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hb_cp_order
-- ----------------------------

-- ----------------------------
-- Table structure for `hb_lyb`
-- ----------------------------
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

-- ----------------------------
-- Records of hb_lyb
-- ----------------------------

-- ----------------------------
-- Table structure for `hb_system`
-- ----------------------------
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

-- ----------------------------
-- Records of hb_system
-- ----------------------------
INSERT INTO `hb_system` VALUES ('1', '网站建设_北京网站建设公司_北京聚点网站建设公司', '北京聚点网络', '北京聚点网络科技有限公司', '/images/logo.jpg', '网站建设,北京网站建设公司,北京聚点网站建设公司', '网站建设,北京网站建设公司,北京聚点网站建设公司网站建设,北京网站建设公司,北京聚点网站建设公司', '1', '版权所有：北京恒博教育网站培训基地  京ICP备8423422号<br/>\r\n联系方式：北京市丰台区南三环刘家窑桥东嘉业大厦一期B座1505室 <br/>\r\n\r\n联系人：黄老师 联系电话：010-52877560', '0', 'aaaaa', '0');

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

-- ----------------------------
-- Records of hb_tag
-- ----------------------------

-- ----------------------------
-- Table structure for `hb_tagurl`
-- ----------------------------
DROP TABLE IF EXISTS `hb_tagurl`;
CREATE TABLE `hb_tagurl` (
  `tuid` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) DEFAULT NULL,
  `tagurl` varchar(100) DEFAULT '',
  `idstr` varchar(200) DEFAULT '',
  `aidstr` varchar(200) DEFAULT '',
  `descript` varchar(300) DEFAULT '',
  PRIMARY KEY (`tuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hb_tagurl
-- ----------------------------

-- ----------------------------
-- Table structure for `hb_tag_main`
-- ----------------------------
DROP TABLE IF EXISTS `hb_tag_main`;
CREATE TABLE `hb_tag_main` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `tflag` tinyint(4) DEFAULT '0',
  `tnum` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hb_tag_main
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hb_uclass
-- ----------------------------
INSERT INTO `hb_uclass` VALUES ('1', '友情链接管理', '11111', '1');
INSERT INTO `hb_uclass` VALUES ('2', '导航管理', '00000', '50');
INSERT INTO `hb_uclass` VALUES ('3', '伙伴', '10001', '50');
INSERT INTO `hb_uclass` VALUES ('4', '图片轮播', '10001', '50');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hb_url
-- ----------------------------
INSERT INTO `hb_url` VALUES ('1', '3', 'aaaa', '', '1', '/statics/images/up/2016/12280646541.jpg', '', '', '2016-12-28 14:45:24', '', '50');
INSERT INTO `hb_url` VALUES ('2', '3', 'bbb', '', '1', '/statics/images/up/2016/12280646489.jpg', '', '', '2016-12-28 14:45:27', '', '50');
INSERT INTO `hb_url` VALUES ('3', '3', 'cccc', '', '1', '/statics/images/up/2016/12280646428.jpg', '', '', '2016-12-28 14:45:30', '', '50');
INSERT INTO `hb_url` VALUES ('4', '3', 'ddd', '', '1', '/statics/images/up/2016/12280646379.jpg', '', '', '2016-12-28 14:45:32', '', '50');
INSERT INTO `hb_url` VALUES ('5', '3', 'ee', '', '1', '/statics/images/up/2016/12280647374.jpg', '', '', '2016-12-28 14:47:00', '', '50');
INSERT INTO `hb_url` VALUES ('6', '3', 'ff', '', '1', '/statics/images/up/2016/12280647432.jpg', '', '', '2016-12-28 14:47:03', '', '50');
INSERT INTO `hb_url` VALUES ('7', '3', 'gg', '', '1', '/statics/images/up/2016/12280648025.jpg', '', '', '2016-12-28 14:47:05', '', '50');
INSERT INTO `hb_url` VALUES ('8', '3', 'agg', '', '1', '/statics/images/up/2016/12280647559.jpg', '', '', '2016-12-28 14:47:08', '', '50');
INSERT INTO `hb_url` VALUES ('9', '3', 'abb', '', '1', '/statics/images/up/2016/12280647492.jpg', '', '', '2016-12-28 14:47:11', '', '50');
INSERT INTO `hb_url` VALUES ('10', '3', 'add', '', '1', '/statics/images/up/2016/12280648085.jpg', '', '', '2016-12-28 14:47:16', '', '50');
INSERT INTO `hb_url` VALUES ('11', '3', 'aee', '', '1', '/statics/images/up/2016/12280648144.jpg', '', '', '2016-12-28 14:47:20', '', '50');
INSERT INTO `hb_url` VALUES ('12', '3', 'baa', '', '1', '/statics/images/up/2016/12280648192.jpg', '', '', '2016-12-28 14:47:29', '', '50');
INSERT INTO `hb_url` VALUES ('13', '4', 'aaaaa', '', '1', '/statics/images/up/2016/12280702145.jpg', '', '', '2016-12-28 14:50:32', '', '50');
INSERT INTO `hb_url` VALUES ('14', '4', 'bbbbb', '', '1', '/statics/images/up/2016/12280702066.jpg', '', '', '2016-12-28 14:50:35', '', '50');
INSERT INTO `hb_url` VALUES ('15', '4', 'cccc', '', '1', '/statics/images/up/2016/12280708467.jpg', '', '', '2016-12-28 14:50:38', '', '50');
