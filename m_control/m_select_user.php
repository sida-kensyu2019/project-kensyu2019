<?php
/**
 * このファイルの概要説明
 * 管理者一覧画面
 * このファイルの詳細説明
 * ジャンル一覧
 * システム名：愛パワー美術品評価管理システム
 * 作成者：佐藤瑠菜
 * 作成日：2019/05/23
 * 最終更新日：2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン：0.1
 */


require_once("../lib/init.php");

require_once("../lib/function/db_user.php");
$sth=get_m_user($dbh);
require_once("../lib/m_view/m_select_user.php");
