<?php
// 制作者:岩井 2019/05/23：ver1.0
// 評価削除完了画面コントローラ

	require_once("lib/init.php");
	if (!(login_check())) {
		//美術品詳細画面でセッションが切れた場合のエラー対処
		setcookie("access_error", true, time()+60*60*24*30, "/");
		header("Location:top.php");
		exit();
	}

	//評価に対するいいねをデータベースから削除する
	require_once("lib/function/db_good.php");
	$sth=delete_good_by_grade($dbh, $_GET["grade_id"]);

	//評価をデータベースから削除する
	require_once("lib/function/db_grade.php");
	$sth=delete_grade($dbh, $_GET["grade_id"]);

	//美術品詳細画面に飛ばす
	header("Location:material_detail.php?material_id={$_GET["material_id"]}");
