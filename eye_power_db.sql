/* DB作成 */
DROP DATABASE IF EXISTS eye_power_db;
CREATE DATABASE eye_power_db CHARACTER SET utf8 COLLATE utf8_general_ci;

/* 管理者ユーザを作成 */
DROP USER IF EXISTS 'administrator'@'localhost';
CREATE USER 'administrator'@'localhost' IDENTIFIED BY 'kensyu2019';

/* 一般ユーザを作成 */
DROP USER IF EXISTS 'user'@'localhost';
CREATE USER 'user'@'localhost' IDENTIFIED BY 'kensyu2019';

/* 管理者ユーザ権限付与 */
GRANT ALL PRIVILEGES ON eye_power_db.* TO 'administrator'@'localhost';

/* 一般ユーザ権限付与 */
GRANT SELECT ON eye_power_db.* TO 'user'@'localhost';

/* AUTOCOMMIT無効 */
SET AUTOCOMMIT=1;

/* DB選択 */
USE eye_power_db;

/* m_genre作成 */
CREATE TABLE
eye_power_db.m_genre (
  genre_id INT PRIMARY KEY AUTO_INCREMENT,
  genre_name VARCHAR(10) NOT NULL
);

/* ジャンルテーブルINSERT */
INSERT INTO eye_power_db.m_genre(genre_name)
VALUES ('西洋絵画');
INSERT INTO eye_power_db.m_genre(genre_name)
VALUES ('日本絵画');
INSERT INTO eye_power_db.m_genre(genre_name)
VALUES ('日本彫刻');

/* m_material作成 */
CREATE TABLE
 eye_power_db.m_material (
  material_id INT PRIMARY KEY AUTO_INCREMENT,
  material_name VARCHAR(50) NOT NULL,
  material_kana VARCHAR(70) NOT NULL,
  author_name VARCHAR(50) NOT NULL,
  author_kana VARCHAR(70) NOT NULL,
  genre_id INT NOT NULL,
  material_year VARCHAR(20) NOT NULL,
  picture VARCHAR(500) DEFAULT 'not_found.jpg',
  caption VARCHAR(2000) NOT NULL,
  FOREIGN KEY (genre_id) REFERENCES m_genre(genre_id)
);

/* 美術品テーブルINSERT */
 INSERT INTO eye_power_db.m_material(material_name, material_kana, author_name, author_kana, genre_id, material_year, picture, caption)
  VALUES ('悲しみの聖母', 'かなしみのせいぼ', 'カルロ・ドルチ', 'かるろ・どるち', 1, '1665', 'https://www.nmwa.go.jp/jp/collection/img/im_1998-0002.gif','両手を合わせた聖母の構図はティツィアーノの聖母像にその原型を認めることができるが、むしろティツアーノの作品を原型として16-17世紀にスペインで人気を博した聖母像の形式をふまえたものと考えられる。');
 INSERT INTO eye_power_db.m_material(material_name, material_kana, author_name, author_kana, genre_id, material_year, picture, caption)
  VALUES ('金剛界八十一尊曼荼羅', 'こんごうかいはちじゅういっそんまんだら', '円仁', 'えんにん', 2, '1200', 'http://www.nezu-muse.or.jp/jp/collection/02/images/10012_1.jpg','本図に描かれた諸尊は、面長の面部に表された厳しい目鼻立ち、細く引き締まったプロポーション、そして肉身や着衣に強い隈取りを施す点に特徴があり、唐風を色濃くとどめる作風として注目される。');
 INSERT INTO eye_power_db.m_material(material_name, material_kana, author_name, author_kana, genre_id, material_year, picture, caption)
  VALUES ('弥勒菩薩立像', 'みろくぼさつりゅうぞう', '作者不詳', 'さくしゃふしょう',3,'300', 'http://www.nezu-muse.or.jp/jp/collection/03/images/20097.jpg','紀元１世紀半ば頃から3世紀前半にかけて、現在のパキスタン西北部に繁栄したガンダーラ美術は、それまで造形化されることのなかった仏の姿を表す先駆けとなったことで知られる。本像はその典型的な作品。');

/* m_job作成 */

 CREATE TABLE
  eye_power_db.m_job (
   job_id INT PRIMARY KEY AUTO_INCREMENT,
   job_name VARCHAR(10) NOT NULL
  );

 /* 職種テーブルINSERT */
 INSERT INTO eye_power_db.m_job(job_name)
  VALUES ('大学教授');
 INSERT INTO eye_power_db.m_job(job_name)
  VALUES ('学生');
 INSERT INTO eye_power_db.m_job(job_name)
  VALUES ('主婦');
  
  /* m_user作成 */
  CREATE TABLE
  eye_power_db.m_user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    mail_address VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    user_name VARCHAR(50) NOT NULL,
    job_id INT NOT NULL,
    user_lv INT NOT NULL,
    profile VARCHAR(5000) DEFAULT NULL,
    FOREIGN KEY (job_id) REFERENCES m_job(job_id)
  );

  /* ユーザテーブルINSERT */
  INSERT INTO eye_power_db.m_user(mail_address, password, user_name, job_id, user_lv, profile)
  VALUES ('abc@abc.com', '12345678', 'administrator', 1, 1, '管理者用アカウントです');
  INSERT INTO eye_power_db.m_user(mail_address, password, user_name, job_id, user_lv, profile)
  VALUES ('def@def.co.jp', '4567890', 'nomaluser1', 2, 2, '一般ユーザ1です');
  INSERT INTO eye_power_db.m_user(mail_address, password, user_name, job_id, user_lv, profile)
  VALUES ('ghi@ghi.ne.jp', '1357913', 'nomaluser2', 3, 2, '一般ユーザ2です');

 /* t_grade作成 */
 CREATE TABLE
  eye_power_db.t_grade (
   grade_id INT PRIMARY KEY AUTO_INCREMENT,
   material_id INT NOT NULL,
   user_id INT NOT NULL,
   grade_date DATETIME NOT NULL,
   star INT NOT NULL,
   comment VARCHAR(5000) NOT NULL,
   FOREIGN KEY (material_id) REFERENCES m_material(material_id),
   FOREIGN KEY (user_id) REFERENCES m_user(user_id)
 );

 /* 評価テーブルINSERT */
 INSERT INTO eye_power_db.t_grade(material_id, user_id, grade_date, star, comment)
  VALUES (1, 1, '2019-05-21 00:00:00', 3, 'すばらしい作品だと思います');
 INSERT INTO eye_power_db.t_grade(material_id, user_id, grade_date, star, comment)
  VALUES (2, 2, '2019-05-22 05:00:00', 1, '好きか嫌いかでいうと嫌い');
 INSERT INTO eye_power_db.t_grade(material_id, user_id, grade_date, star, comment)
  VALUES (3, 3, '2019-05-22 07:00:00', 5, 'この時代に生まれてよかった');


 /* t_good作成 */
 CREATE TABLE
  eye_power_db.t_good (
   good_id INT PRIMARY KEY AUTO_INCREMENT,
   grade_id INT NOT NULL,
   user_id INT NOT NULL,
   FOREIGN KEY (grade_id) REFERENCES t_grade(grade_id),
   FOREIGN KEY (user_id) REFERENCES m_user(user_id)
  );

 /* いいねテーブルINSERT */
 INSERT INTO eye_power_db.t_good(grade_id, user_id)
  VALUES (1, 1);
 INSERT INTO eye_power_db.t_good(grade_id, user_id)
  VALUES (2, 2);
 INSERT INTO eye_power_db.t_good(grade_id, user_id)
  VALUES (3, 3);

 /* m_closed作成 */
 CREATE TABLE
  eye_power_db.m_closed (
   closed DATE PRIMARY KEY
  );

 /* 休館日テーブル */
 INSERT INTO eye_power_db.m_closed
  VALUES ('2019-05-20');
 INSERT INTO eye_power_db.m_closed
  VALUES ('2019-05-30');
 INSERT INTO eye_power_db.m_closed
  VALUES ('2019-06-06');
