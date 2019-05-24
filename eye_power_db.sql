/* DB�쐬 */
DROP DATABASE IF EXISTS eye_power_db;
CREATE DATABASE eye_power_db CHARACTER SET utf8 COLLATE utf8_general_ci;

/* �Ǘ��҃��[�U���쐬 */
DROP USER IF EXISTS 'administrator'@'localhost';
CREATE USER 'administrator'@'localhost' IDENTIFIED BY 'kensyu2019';

/* ��ʃ��[�U���쐬 */
DROP USER IF EXISTS 'user'@'localhost';
CREATE USER 'user'@'localhost' IDENTIFIED BY 'kensyu2019';

/* �Ǘ��҃��[�U�����t�^ */
GRANT ALL PRIVILEGES ON eye_power_db.* TO 'administrator'@'localhost';

/* ��ʃ��[�U�����t�^ */
GRANT SELECT ON eye_power_db.* TO 'user'@'localhost';

/* AUTOCOMMIT���� */
SET AUTOCOMMIT=1;

/* DB�I�� */
USE eye_power_db;

/* m_genre�쐬 */
CREATE TABLE
eye_power_db.m_genre (
  genre_id INT PRIMARY KEY AUTO_INCREMENT,
  genre_name VARCHAR(10) NOT NULL
);

/* �W�������e�[�u��INSERT */
INSERT INTO eye_power_db.m_genre(genre_name)
VALUES ('���m�G��');
INSERT INTO eye_power_db.m_genre(genre_name)
VALUES ('���{����');
INSERT INTO eye_power_db.m_genre(genre_name)
VALUES ('���m����');

/* m_material�쐬 */
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

/* ���p�i�e�[�u��INSERT */
 INSERT INTO eye_power_db.m_material(material_name, material_kana, author_name, author_kana, genre_id, material_year, picture, caption)
  VALUES ('�߂��݂̐���', '���Ȃ��݂̂�����', '�J�����E�h���`', '�����E�ǂ邿', 1, '1665', 'not_found.jpg','�e�X�g');
 INSERT INTO eye_power_db.m_material(material_name, material_kana, author_name, author_kana, genre_id, material_year, picture, caption)
  VALUES ('�e�X�g����', '�Ă��Ƃ��傤����', '�e�X�g���Y', '�Ă��Ƃ��낤', 2, '2000', 'not_found.jpg','�Ă��Ă�');
 INSERT INTO eye_power_db.m_material(material_name, material_kana, author_name, author_kana, genre_id, material_year, picture, caption)
  VALUES ('�e�X�g2����', '�Ă��Ƃ�����', '�e�X�g�E�n�i�[�R', '�Ă��ƁE�͂ȁ[��',3,'1500', 'not_found.jpg','testtesttest');

/* m_job�쐬 */

 CREATE TABLE
  eye_power_db.m_job (
   job_id INT PRIMARY KEY AUTO_INCREMENT,
   job_name VARCHAR(10) NOT NULL
  );

 /* �E��e�[�u��INSERT */
 INSERT INTO eye_power_db.m_job(job_name)
  VALUES ('��w����');
 INSERT INTO eye_power_db.m_job(job_name)
  VALUES ('�w��');
 INSERT INTO eye_power_db.m_job(job_name)
  VALUES ('��w');
  
  /* m_user�쐬 */
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

  /* ���[�U�e�[�u��INSERT */
  INSERT INTO eye_power_db.m_user(mail_address, password, user_name, job_id, user_lv, profile)
  VALUES ('abc@abc.com', '12345678', 'administrator', 1, 1, '�Ǘ��җp�A�J�E���g�ł�');
  INSERT INTO eye_power_db.m_user(mail_address, password, user_name, job_id, user_lv, profile)
  VALUES ('def@def.co.jp', '4567890', 'nomaluser1', 2, 2, '��ʃ��[�U1�ł�');
  INSERT INTO eye_power_db.m_user(mail_address, password, user_name, job_id, user_lv, profile)
  VALUES ('ghi@ghi.ne.jp', '1357913', 'nomaluser2', 3, 2, '��ʃ��[�U2�ł�');

 /* t_grade�쐬 */
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

 /* �]���e�[�u��INSERT */
 INSERT INTO eye_power_db.t_grade(material_id, user_id, grade_date, star, comment)
  VALUES (1, 1, '2019-05-21 00:00:00', 3, '���߂�ƂĂ���');
 INSERT INTO eye_power_db.t_grade(material_id, user_id, grade_date, star, comment)
  VALUES (2, 2, '2019-05-22 05:00:00', 1, '���߂�ƂĂ���');
 INSERT INTO eye_power_db.t_grade(material_id, user_id, grade_date, star, comment)
  VALUES (3, 3, '2019-05-22 07:00:00', 5, '���߂�ƂĂ���');


 /* t_good�쐬 */
 CREATE TABLE
  eye_power_db.t_good (
   good_id INT PRIMARY KEY AUTO_INCREMENT,
   grade_id INT NOT NULL,
   user_id INT NOT NULL,
   FOREIGN KEY (grade_id) REFERENCES t_grade(grade_id),
   FOREIGN KEY (user_id) REFERENCES m_user(user_id)
  );

 /* �����˃e�[�u��INSERT */
 INSERT INTO eye_power_db.t_good(grade_id, user_id)
  VALUES (1, 1);
 INSERT INTO eye_power_db.t_good(grade_id, user_id)
  VALUES (2, 2);
 INSERT INTO eye_power_db.t_good(grade_id, user_id)
  VALUES (3, 3);

 /* m_closed�쐬 */
 CREATE TABLE
  eye_power_db.m_closed (
   closed DATE PRIMARY KEY
  );

 /* �x�ٓ��e�[�u�� */
 INSERT INTO eye_power_db.m_closed
  VALUES ('2019-05-20');
 INSERT INTO eye_power_db.m_closed
  VALUES ('2019-05-30');
 INSERT INTO eye_power_db.m_closed
  VALUES ('2019-06-06');
