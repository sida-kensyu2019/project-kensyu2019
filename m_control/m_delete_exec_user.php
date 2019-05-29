<?php
// 制作者:増井 2019/05/23：ver1.0
// 管理ユーザ削除完了画面コントローラ

	require_once("../lib/init.php");
	//不正なアクセスを無効化
	m_access_check();

	//ユーザテーブルの処理関数呼び出し
	require_once("../lib/function/db_user.php");

	//ユーザのいいねをデータベースから削除する
	require_once("../lib/function/db_good.php");
	$sth=delete_good_by_user($dbh, $_GET["user_id"]);
	//ユーザの評価に対するいいねを削除
	delete_good_by_user_grade($dbh, $_GET["user_id"]);

	//ユーザの評価をデータベースから削除する
	require_once("../lib/function/db_grade.php");
	$sth=delete_grade_by_user($dbh, $_GET["user_id"]);

	//ユーザのデータをデータベースから削除する
	$sth = delete_user($dbh, $_GET["user_id"]); //ユーザデータを削除する関数

	//管理ユーザ削除完了画面ビュー出力
	require_once("../lib/m_view/m_delete_exec_user.php");
