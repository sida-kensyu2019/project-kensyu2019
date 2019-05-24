<?php
// 制作者:増井 2019/05/23：ver1.0
// 管理美術品編集画面コントローラ

	require_once("../lib/init.php");

	//美術品テーブルの処理関数呼び出し
	require_once("../lib/function/db_material.php");

	//選択した美術品詳細データをデータベースから取得する
	$row = get_material_by_id($dbh, $_GET["material_id"]); //美術品ひとつを取得する関数
	$row = update_material($dbh, $input);
	//美術品編集画面ビュー出力
	require_once("../lib/m_view/m_update_material.php");
