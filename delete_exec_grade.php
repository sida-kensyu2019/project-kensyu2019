<?php
// 制作者:山田 2019/05/23：ver1.0
// ユーザ削除完了画面コントローラ

//悪意のあるユーザを避けるためにGETでなく、POSTを使う。ユーザマイページ注意！！

	require_once("../lib/init.php");

	//ユーザのいいねをデータベースから削除する
	require_once("../lib/function/db_good.php");
	$sth=delete_good_by_user($dbh, $_POST["user_id"]);

	//ユーザの評価をデータベースから削除する
	require_once("../lib/function/db_grade.php");
	$sth=delete_grade_by_user($dbh, $_POST["user_id"]);


	//ユーザテーブルの処理関数呼び出し
	require_once("../lib/funtion/db_user.php");

	//ユーザのデータをデータベースから削除する
	$sth = delete_user($dbh, $_POST["user_id"]); //ユーザデータを削除する関数

	//美術館トップビュー出力
	header("Location:index.php");
