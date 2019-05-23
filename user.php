<?php
// 制作者:佐藤 2019/05/23：ver1.0
//ユーザマイページ

	require_once("lib/init.php");

	//ユーザテーブルの処理関数呼び出し
	require_once("lib/function/db_user.php");

	//ユーザデータをデータベースから取得する
	$sth =get_m_user($dbh); //美術品すべてを取得する関数

	//美術品一覧画面ビュー出力
	require_once("lib/view/user.php");
