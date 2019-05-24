<?php
// 制作者:佐藤 2019/05/23：ver1.0
// 美術品一覧画面コントローラ

	require_once("lib/init.php");

	//ジャンルテーブルの処理関数呼び出し
	require_once("lib/function/db_genre.php");
	//検索フォーム用
	$sth = get_genre($dbh); //ジャンルすべてを取得する関数

	//美術品テーブルの処理関数呼び出し
	require_once("lib/function/db_material.php");
	//検索結果表示用
	$sth_result = get_material($dbh);

	//美術品一覧画面ビュー出力
	require_once("lib/view/select_material.php");
