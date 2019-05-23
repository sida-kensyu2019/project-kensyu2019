<?php
// 制作者:増井 2019/05/23：ver1.0
// 管理ユーザ削除完了画面コントローラ

	require_once("../lib/init.php");

	//ユーザテーブルの処理関数呼び出し
	require_once("../lib/funtion/db_user.php");

	//ユーザのデータをデータベースから削除する
	$sth = delete_user($dbh, $id); //ユーザデータを削除する関数

	//管理ユーザ削除完了画面ビュー出力
	require_once("../lib/m_view/m_delete_exec_user.php");
	
