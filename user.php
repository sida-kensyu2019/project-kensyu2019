<?php
// 制作者:佐藤 2019/05/23：ver1.0
//ユーザマイページ

	require_once("lib/init.php");

	//ユーザテーブルの処理関数呼び出し
	require_once("lib/function/db_user.php");

	//ユーザデータをデータベースから取得する
	$row=get_user_by_id($dbh,$_GET["user_id"]);
	if (empty($row)) {
		require_once("user_not_found.php");
	} else {

	//評価テーブルの処理関数呼び出し
	require_once("lib/function/db_grade.php");

	//評価データをデータベースから取得する
	$sth=get_grade_by_user($dbh,$_GET["user_id"]);

	//マイページビュー出力
	require_once("lib/view/user.php");
	}
