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
VALUES ('���{�G��');
INSERT INTO eye_power_db.m_genre(genre_name)
VALUES ('���{����');

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
  VALUES ('�߂��݂̐���', '���Ȃ��݂̂�����', '�J�����E�h���`', '�����E�ǂ邿', 1, '1665', 'https://www.nmwa.go.jp/jp/collection/img/im_1998-0002.gif','��������킹������̍\�}�̓e�B�c�B�A�[�m�̐��ꑜ�ɂ��̌��^��F�߂邱�Ƃ��ł��邪�A�ނ���e�B�c�A�[�m�̍�i�����^�Ƃ���16-17���I�ɃX�y�C���Ől�C�𔎂������ꑜ�̌`�����ӂ܂������̂ƍl������B');
 INSERT INTO eye_power_db.m_material(material_name, material_kana, author_name, author_kana, genre_id, material_year, picture, caption)
  VALUES ('�����E���\�ꑸ��䶗�', '���񂲂������͂����イ��������܂񂾂�', '�~�m', '����ɂ�', 2, '1200', 'http://www.nezu-muse.or.jp/jp/collection/02/images/10012_1.jpg','�{�}�ɕ`���ꂽ�����́A�ʒ��̖ʕ��ɕ\���ꂽ�������ڕ@�����A�ׂ��������܂����v���|�[�V�����A�����ē��g�⒅�߂ɋ����G�����{���_�ɓ���������A������F�Z���Ƃǂ߂�앗�Ƃ��Ē��ڂ����B');
 INSERT INTO eye_power_db.m_material(material_name, material_kana, author_name, author_kana, genre_id, material_year, picture, caption)
  VALUES ('���ӕ�F����', '�݂낭�ڂ���イ����', '��ҕs��', '��������ӂ��傤',3,'300', 'http://www.nezu-muse.or.jp/jp/collection/03/images/20097.jpg','�I���P���I���΍�����3���I�O���ɂ����āA���݂̃p�L�X�^�����k���ɔɉh�����K���_�[�����p�́A����܂ő��`������邱�Ƃ̂Ȃ��������̎p��\����삯�ƂȂ������ƂŒm����B�{���͂��̓T�^�I�ȍ�i�B');

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
  VALUES (1, 1, '2019-05-21 00:00:00', 3, '���΂炵����i���Ǝv���܂�');
 INSERT INTO eye_power_db.t_grade(material_id, user_id, grade_date, star, comment)
  VALUES (2, 2, '2019-05-22 05:00:00', 1, '�D�����������ł����ƌ���');
 INSERT INTO eye_power_db.t_grade(material_id, user_id, grade_date, star, comment)
  VALUES (3, 3, '2019-05-22 07:00:00', 5, '���̎���ɐ��܂�Ă悩����');


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
