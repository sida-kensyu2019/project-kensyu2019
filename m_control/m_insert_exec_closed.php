<?php
/**
 * このファイルの概要説明
 * 休館日新規追加
 * このファイルの詳細説明
 * 休館日新規追加
 * システム名：愛パワー美術品評価管理システム
 * 作成者：山田美波
 * 作成日：2019/05/23
 * 最終更新日：2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン：0.1
 */

require_once("../lib/init.php");
//不正なアクセスを無効化
m_access_check();

require_once("../lib/function/db_closed.php");
$sth=insert_closed($dbh, $_POST);

require_once("m_select_closed.php");
