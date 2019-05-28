-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: eye_power_db
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `m_closed`
--

DROP TABLE IF EXISTS `m_closed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_closed` (
  `closed` date NOT NULL,
  PRIMARY KEY (`closed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_closed`
--

LOCK TABLES `m_closed` WRITE;
/*!40000 ALTER TABLE `m_closed` DISABLE KEYS */;
INSERT INTO `m_closed` VALUES ('2019-05-20'),('2019-05-30'),('2019-06-06');
/*!40000 ALTER TABLE `m_closed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_genre`
--

DROP TABLE IF EXISTS `m_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_genre` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(10) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_genre`
--

LOCK TABLES `m_genre` WRITE;
/*!40000 ALTER TABLE `m_genre` DISABLE KEYS */;
INSERT INTO `m_genre` VALUES (1,'西洋絵画'),(2,'日本絵画'),(3,'日本彫刻'),(4,'西洋彫刻'),(5,'写真'),(6,'陶磁器'),(7,'現代美術絵画'),(8,'ポスト印象派'),(9,'木版画');
/*!40000 ALTER TABLE `m_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_job`
--

DROP TABLE IF EXISTS `m_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(10) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_job`
--

LOCK TABLES `m_job` WRITE;
/*!40000 ALTER TABLE `m_job` DISABLE KEYS */;
INSERT INTO `m_job` VALUES (1,'大学教授'),(2,'学生'),(3,'主婦'),(4,'ラーメン屋'),(5,'警察官'),(6,'プロレスラー'),(7,'カレー屋'),(8,'ユーチューバー');
/*!40000 ALTER TABLE `m_job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_material`
--

DROP TABLE IF EXISTS `m_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_material` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(50) NOT NULL,
  `material_kana` varchar(70) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `author_kana` varchar(70) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `material_year` varchar(20) NOT NULL,
  `picture` varchar(500) DEFAULT 'not_found.jpg',
  `caption` varchar(2000) NOT NULL,
  PRIMARY KEY (`material_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `m_material_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `m_genre` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_material`
--

LOCK TABLES `m_material` WRITE;
/*!40000 ALTER TABLE `m_material` DISABLE KEYS */;
INSERT INTO `m_material` VALUES (1,'悲しみの聖母','かなしみのせいぼ','カルロ・ドルチ','かるろ・どるち',1,'1665','https://www.nmwa.go.jp/jp/collection/img/im_1998-0002.gif','両手を合わせた聖母の構図はティツィアーノの聖母像にその原型を認めることができるが、むしろティツアーノの作品を原型として16-17世紀にスペインで人気を博した聖母像の形式をふまえたものと考えられる。'),(2,'金剛界八十一尊曼荼羅','こんごうかいはちじゅういっそんまんだら','円仁','えんにん',2,'1200','http://www.nezu-muse.or.jp/jp/collection/02/images/10012_1.jpg','本図に描かれた諸尊は、面長の面部に表された厳しい目鼻立ち、細く引き締まったプロポーション、そして肉身や着衣に強い隈取りを施す点に特徴があり、唐風を色濃くとどめる作風として注目される。'),(3,'弥勒菩薩立像','みろくぼさつりゅうぞう','作者不詳','さくしゃふしょう',3,'３世紀','http://www.nezu-muse.or.jp/jp/collection/03/images/20097.jpg','紀元１世紀半ば頃から3世紀前半にかけて、現在のパキスタン西北部に繁栄したガンダーラ美術は、それまで造形化されることのなかった仏の姿を表す先駆けとなったことで知られる。本像はその典型的な作品。'),(4,'嵐の海の風景','あらしのうみのふうけい','アレッサンドロ・マニャスコ','あれっさんどろ・まにゃすこ',1,'1718','https://www.nmwa.go.jp/jp/collection/img/im_1973-0002.gif','17世紀のバロック的伝統を踏まえた教訓的理想の風景画であり、強調されるのは壮大な自然の美と威力に対する人間の技の卑小さと生のはかなさです。'),(5,'羊飼いのいる風景','ひつじかいのいるふうけい','アレッサンドロ・マニャスコ','あれっさんどろ・まにゃすこ',1,'1749','https://www.nmwa.go.jp/jp/collection/img/im_1974-0006.gif','17世紀のバロック的伝統を踏まえた教訓的理想の風景画であり、強調されるのは壮大な自然の美と威力に対する人間の技の卑小さと生のはかなさです。'),(6,'マリ=アンリエット=ベルトレ・ド・プルヌフ夫人の肖像','まり＝あんりえっと＝べるとれ・ど・ぷるぬふふじんのしょうぞう','ジャン=マルク・ナティエ','じゃん＝まるく・なてぃえ',1,'1739','https://www.nmwa.go.jp/jp/collection/img/im_1979-0002.gif','ナティエはニコラ・ド・ラルジリエールの影響を受けて、宮廷の貴婦人たちを神話の中の人物の姿を借りて描くというフォンテーヌブロー派の伝統を復活させた。'),(7,'聖母の教育','せいぼのきょういく','ウジェーヌ・ドラクロワ','うじぇーぬ・どらくろわ',1,'1852','https://www.nmwa.go.jp/jp/collection/img/im_1970-0001.gif','この作品はその10年後に同じ主題で描かれたもので、画面はひとまわり小さくなっているが、背景への関心が増し、また犬も加えられている。一般にドラクロワの作品といえば華麗な色彩と力強い動感に満ちたドラマティックな大作を連想し、またそうした作品にこそ彼の本領は遺憾なく発揮されたが、深い緑を主調として、全体に夜想曲のような静かな安らぎをたたえた本作品は、幅広い彼の芸術のまた別の一面を示している。'),(8,'眠れる裸婦','ねむれるらふ','ギュスターヴ・クールベ','ぎゅすたーう゛・くるーべ',1,'1858','https://www.nmwa.go.jp/jp/collection/img/im_1996-0001.gif','《眠れる裸婦》は、窓辺の寝台で眠る裸婦を描いた閨房画だが、ジョルジョーネやティツィアーノ以来のヴェネツィア派の「風景の中の裸婦」の系譜に属するとされてきた。'),(9,'睡蓮','すいれん','クロード・モネ','くろーど・もね',1,'1916','https://www.nmwa.go.jp/jp/collection/img/im_1959-0151.gif','庭の隅にガラス張りの大きなアトリエを建て、自由に移動できるように車をつけたイーゼルを立てて、朝から夕方まで、時とともに移り変わる池の様子、水面の反映と鮮やかな花の美しさを捉えようと試みたのである。'),(10,'ブルックリン橋','ぶるっくりんはし','ウォーカー・エヴァンズ','うぉーかー・えう゛ぁんず',5,'1929','https://i.pinimg.com/originals/6e/6e/d8/6e6ed8696cb7dd93f64a0aaec48bb8bb.png','大恐慌直前の1927年、世界経済の中心地として摩天楼が形成されていくマンハッタンで、工事現場や高層ビルから見下ろす街角など、変わりゆくニューヨークの都市風景を精力的に記録した。本作はブルックリン橋を様々な角度から撮影した初期のエヴァンズ作品を代表するシリーズからの1点で、ダイナミックな構図で捉えた巨大な橋梁と遠景の摩天楼とがマシン・エイジ（機械の時代）特有の都市イメージを構成している。'),(11,'舟遊び','ふねあそび','クロード・モネ','くろーど・もね',1,'1887','https://www.nmwa.go.jp/jp/collection/img/im_1959-0148.gif','本作品は、それら一連の「舟遊び」の主題を描いた作品の中でも、特に完成度の高い作例である。'),(12,'冨嶽三十六景（神奈川沖浪裏）','ふがくさんじゅうろっけい（かながわおきなみうら）','葛飾北斎','かつしかほくさい',2,'1831-33','https://www.adachi-hanga.com/ukiyo-e/assets_c/2012/11/hokusai040_main-thumb-480x480-942.jpg','富士山を描いた葛飾北斎の冨嶽三十六景の中でも人気の高い「神奈川沖浪裏」。これはタイトル通りだとすると、横浜市神奈川沖となります(神奈川県の意味ではない)。富士山を描いた葛飾北斎の冨嶽三十六景の中でも人気の高い「神奈川沖浪裏」。これはタイトル通りだとすると、横浜市神奈川沖となります(神奈川県の意味ではない)。'),(13,'弓をひくヘラクレス','ゆみをひくへらくれす','エミール=アントワーヌ・ブールデル','えみーる＝あんとわーぬ・ぶーるでる',4,'1909','https://www.nmwa.go.jp/jp/collection/img/im_1966-0002.gif','隆々たる筋肉におおわれた緊張感あふれるヘラクレスの肉体は、ロダンのなまなましく息づいているような人体と比較するならば、驚嘆すべきエネルギーに満ちている。'),(14,'イル=ド=フランス','いる＝ど＝ふらんす','アリスティード・マイヨール','ありすてぃーど・まいよーる',4,'1925','https://www.nmwa.go.jp/jp/collection/img/im_1963-0002.gif','マイヨールにとって、自然はあらゆる行動と思索の源であった。自然こそ彼の唯一の信仰の対象であった。そして女性の肉体は、大自然の秩序と調和、平和と美を集約する小宇宙であった。'),(15,'青磁筍花生','せいじたけのこはないけ','不明','ふめい',6,'12世紀','http://www.nezu-muse.or.jp/jp/collection/05/images/40346.jpg','筍形とは、首から胴にかけて数条巡らされた凸帯に筍を連想して、わが国で付けられた名称である。この姿の瓶は、わが国に相当数将来されたものと思われるが、これは、その中でも姿の美しさ、釉調のみごとさで、もっとも優れた作品と言われている。'),(16,'涙','なみだ','マン・レイ','まん・れい',5,'1932','https://www.atgetphotography.com/Images/Photos/ManRay/ray1.jpg','「涙」は、1932年にかけてマン・レイによって制作された写真シリーズ。マン・レイ作品の中で最も評価の高い作品の１つ。オリジナルプリントは、ロンドンのサザビーズで、2000万円で落札された。片目だけにトリミングされたバージョン「ガラスの涙」も存在している。'),(17,'指月布袋画賛','しげつほていがさん','仙厓','せんがい',2,'江戸時代','https://casabrutus.com/wp-content/uploads/2019/10/1006sengai01_666.jpg','子供たちと戯れる布袋さんのほのぼのとした情景のようですが、「月」を暗示する賛文「を月様幾ツ、十三七ツ」の存在から、禅の根本を説いた教訓「指月布袋」の図であることがわかります。月は円満な悟りの境地を、指し示す指は経典を象徴していますが、月が指の遙か彼方の天空にあるように、「不立文字」を説く禅の悟りは経典学習などでは容易に到達できず、厳しい修行を通して獲得するものであることを説いています。'),(18,'こけし','こけし','イサム・ノグチ','いさむ・のぐち',3,'1951','http://bunka.nii.ac.jp/heritage/12483/_99257/12483_99257090224154248545_300.jpg','1952年に神奈川県立近代美術館 鎌倉で開催されたイサム・ノグチの個展の際に発表された、一対の男女からなる彫刻作品です。その頃鎌倉に暮らし始めたノグチは、本作で現代彫刻に日本の古代的あるいは民俗的なかたちを導入することを試みています。'),(19,'見返り美人図','みかえりびじんず','菱川師宣','ひしかわもろのぶ',2,'江戸時代（17世紀）','https://hobbytimes.jp/images/20171027d01.jpg','緋色の衣裳をまとった美人がふと見返る一瞬を描いている。縫箔師であった師宣の描く艶やかな衣装の女性像は「師宣の美女こそ江戸女」と賞賛され人気を博した。落款の「房陽」は出身地房州(千葉)、「友竹」は晩年の雅号である。'),(20,'吉野龍田図','よしのたつたず','不明','ふめい',2,'17世紀','http://www.nezu-muse.or.jp/jp/collection/02/images/10325_right.jpg','爛漫の桜に埋もれる春の吉野と、錦繡の紅葉に染まる秋の龍田川を画面いっぱいに描いて一双とする、まことに華麗な屏風である。枝に結ばれ翻る、あるいは水に流され漂う短冊には、『古今和歌集』および『玉葉和歌集』におさめられた吉野と龍田、桜と紅葉の名所を詠んだ和歌が書されている。'),(21,'まぼろしの犬のピラミッド','まぼろしのいぬのぴらみっど','奈良美智','ならよしとも',7,'1991','https://inukoroblog.com/wp-content/uploads/2018/08/%E3%82%B9%E3%83%A9%E3%82%A4%E3%83%898-1.jpg','一番上から1匹、2匹、3匹と増えていき、全33匹います。最下段には8匹の犬がいるはずが、5匹の犬と「犬がいた」という言葉。3匹の犬がいたという意味でしょうか。'),(22,'貨物列車','かもつれっしゃ','クロード・モネ','くろーど・もね',1,'1872','https://stat.ameba.jp/user_images/20090724/13/art-meigakan/68/28/j/o0739052910219314407.jpg','灰色の煙を吐き出す煙突がたくさんある工場の前を、もくもくと白い噴煙をあげて貨物列車が走り抜けていきます。これは、フランス北西部ノルマンディー地方の中心都市ルーアンの西に位置する町デヴィルの風景です。モネは、この風景をやや高い視点からとらえています。'),(23,'吉原格子先の図','よしわらこうしさきのず','葛飾応為','かつしかおうい',2,'1818~1844頃','https://pbs.twimg.com/media/DuREJcMUYAAVyMA.jpg','吉原遊廓の妓楼、和泉屋の張見世の様子を描く。時はすでに夜。提灯が無くては足元もおぼつかないほどの真っ暗闇だが、格子の中の張見世は、まるで別世界のように赤々と明るく輝き、遊女たちはきらびやかな色彩に身を包まれている。馴染みの客が来たのだろうか、一人の遊女が格子のそばまで近寄って言葉を交わしているが、その姿は黒いシルエットとなり、表情を読み取ることができない。'),(24,'名所江戸百景大はしあたけの夕立','めいしょえどひゃっけいおおはしあたけのゆうだち','歌川広重','うたがわひろしげ',2,'1857','http://blog-imgs-30.fc2.com/h/i/r/hiroshige100/20100627190706e8f.jpg','『名所江戸百景』は目録をあわせて120図からなる広重晩年の大作。突然の夏の夕立、橋の上には慌てて走り抜けていく人々の姿が見える。「大はしあたけの夕立」は、ファン・ゴッホが模写したことでも知られる。ごく早い摺りで対岸近くに船が二艘描かれているものだけはきわめて早い時期に修正され、本図のように船がなく、「あてなしぼかし」の雨雲のあるタイプが標準的な初摺と考えられている。'),(25,'小面　銘 楢野','こおもてならの','井関河内','いぜきかわち',3,'18世紀','http://www.nezu-muse.or.jp/jp/collection/03/images/20213.jpg','年若い女の、清純な美しさをあらわした面。「小」は可愛らしさを意味します。裏側に「古（いにしへ）の奈良の都の八重桜（やえざくら）　今日九重（ここのえ）に匂（にほ）ひぬるかな」と記され、銘（めい）の由来が分かります。'),(26,'ひまわり','ひまわり','フィンセント・ファン・ゴッホ','ふぃんせんと・ふぁん・ごっほ',8,'1888','http://www.salvastyle.net/images/collect/gogh_tournesols01.jpg','本作は日本の浮世絵から強い影響を受け、同国を光に溢れた国だと想像し、そこへ赴くことを願ったゴッホが、ゴーギャンを始めとする同時代の画家達を誘い向かった、日差しの強い南仏の町アルルで描かれた作品'),(27,'雨漏茶碗','あまもりちゃわん','不明','ふめい',6,'15世紀','http://www.nezu-muse.or.jp/jp/collection/05/images/40271_1.jpg','姫路酒井家に伝わり、蔵帳には「古堅手(かたで)雨漏茶碗」と記されているため、雨漏堅手茶碗とも称されている。ねっとりとした淡黄色の素地で薄く成型され、高台際は力強く削られ、ちぢれが表れている。透明釉がたっぷりと掛かるが、焼けが柔らかいためか気泡からしみが生じて雨漏り状の斑となっている。口縁の薄さとどっしりとした腰の形から、釉調だけでなく姿も美しい茶碗である。'),(28,'タンギー爺さんの肖像','だんぎーじいさんのしょうぞう','フィンセント・ファン・ゴッホ','ふぃんせんと・ふぁん・ごっほ',8,'1887','http://www.salvastyle.net/images/collect/gogh_tanguy01.jpg','モンマルトルのクローゼル通りで画材店を営んでいたジュリアン・タンギー氏、通称≪タンギー爺さん≫を描いた作品である。タンギー爺さんはパリの若い画家たちを熱心に支持しており、金銭的に苦しい画家に対しては画材代金の代わりに作品を受け取る場合も多かったと伝えられている。'),(29,'大威徳明王像','だいいとくみょうおうぞう','作者不詳','さくしゃふしょう',2,'13世紀','http://www.nezu-muse.or.jp/jp/collection/02/images/10002.jpg','六面六臂六足(ろくめんろっぴろくそく)の大威徳明王が、疾駆する水牛の背に置いた金剛輪(こんごうりん)の上に、左脚の三足を乗せて立つ。'),(30,'空間の鳥','くうかんのとり','コンスタンティン・ブランクーシ','こんすたんてぃん・ぶらんくーし',4,'1926','https://cdn-ak.f.st-hatena.com/images/fotolife/s/shoyo3/20170624/20170624083359.jpg','ブランクーシが突詰めた鳥は直立している。その体は先端が斜めにカットされ、下に向かってゆるやかに膨らみ、脚の付け根に収束していく。脚部は僅かに波打ちながら広がり、作家考案の三段式台座に載る。全体は左右対称で、鳥の先端から台座の最下段までを貫く中心線が天と地を結ぶ。羽毛に替えて輝きを纏う肌。形とポジションと光。モチーフは作者の祖国ルーマニアの伝説の鳥マイアストラ。'),(31,'藤原保昌 月下弄笛図','ふじわらのやすまさげっかろうてきず','月岡芳年','つきおかよしとし',9,'1883','https://stat.ameba.jp/user_images/20120927/00/umenao625/24/bd/j/o0800040412207837890.jpg','藤原保昌は平安中期の貴族で、和泉式部の夫。武勇に長けた人物としても知られる。本作は盗賊の首領、袴垂保輔が朧月夜に一人笛を吹きながら歩く藤原保昌を付け狙うが、保昌が全く隙を見せないために襲い掛かることができず、遂には従ったという「今昔物語」の説話に基づく。緊迫感溢れるダイナミックな構図は、芳年の得意としたところである。');
/*!40000 ALTER TABLE `m_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_user`
--

DROP TABLE IF EXISTS `m_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_lv` int(11) NOT NULL,
  `profile` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `mail_address` (`mail_address`),
  KEY `job_id` (`job_id`),
  CONSTRAINT `m_user_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `m_job` (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_user`
--

LOCK TABLES `m_user` WRITE;
/*!40000 ALTER TABLE `m_user` DISABLE KEYS */;
INSERT INTO `m_user` VALUES (1,'abc@abc.com','12345678','administrator',1,1,'管理者用アカウントです'),(2,'def@def.co.jp','4567890','nomaluser1',2,2,'一般ユーザ1です'),(3,'ghi@ghi.ne.jp','1357913','nomaluser2',3,2,'一般ユーザ2です'),(4,'root@root.com','rootroot','root',2,1,'          よろしくお願いします。        '),(5,'iwai@iwai.com','iwaiiwai','iwai@iwai.com',3,2,'自慢じゃないですけど、高校時代は美術館で寝泊まりしていました。'),(6,'aaa@aaa.com','aaaaaaaa','あべし',6,2,'よろしくお願いします。');
/*!40000 ALTER TABLE `m_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_good`
--

DROP TABLE IF EXISTS `t_good`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_good` (
  `good_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`good_id`),
  KEY `grade_id` (`grade_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `t_good_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `t_grade` (`grade_id`),
  CONSTRAINT `t_good_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_good`
--

LOCK TABLES `t_good` WRITE;
/*!40000 ALTER TABLE `t_good` DISABLE KEYS */;
INSERT INTO `t_good` VALUES (1,1,1),(2,2,2),(3,3,3);
/*!40000 ALTER TABLE `t_good` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_grade`
--

DROP TABLE IF EXISTS `t_grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_grade` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grade_date` datetime NOT NULL,
  `star` int(11) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  PRIMARY KEY (`grade_id`),
  KEY `material_id` (`material_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `t_grade_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `m_material` (`material_id`),
  CONSTRAINT `t_grade_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_grade`
--

LOCK TABLES `t_grade` WRITE;
/*!40000 ALTER TABLE `t_grade` DISABLE KEYS */;
INSERT INTO `t_grade` VALUES (1,1,1,'2019-05-21 00:00:00',3,'すばらしい作品だと思います'),(2,2,2,'2019-05-22 05:00:00',1,'好きか嫌いかでいうと嫌い'),(3,3,3,'2019-05-22 07:00:00',5,'この時代に生まれてよかった'),(4,18,5,'2019-05-28 12:18:01',2,'小学校のとき、似たようなやつ作ったわ。');
/*!40000 ALTER TABLE `t_grade` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-28 14:00:35
