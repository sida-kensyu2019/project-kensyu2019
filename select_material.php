<?php
// 制作者:佐藤 2019/05/23：ver1.0
// 美術品一覧画面コントローラ

	require_once("lib/init.php");

	//美術品テーブルの処理関数呼び出し
	require_once("lib/function/db_material.php");

	//美術品データをデータベースから取得する
	$sth = get_material($dbh); //美術品すべてを取得する関数

	//美術品一覧画面ビュー出力
	require_once("lib/view/select_material.php");
