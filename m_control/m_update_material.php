<?php
// 制作者:増井 2019/05/23：ver1.0
// 管理美術品編集画面コントローラ

	require_once("../lib/init.php");

	//美術品テーブルの処理関数呼び出し
	require_once("../lib/function/db_material.php");

	//選択した美術品詳細データをデータベースから取得する
	$row = get_material_by_id($dbh, $_GET["material_id"]); //美術品ひとつを取得する関数

	//ジャンルテーブルの処理関数呼び出し
	require_once("../lib/function/db_genre.php");

	//選択したジャンルデータをデータベースから取得する
	$sth = get_genre($dbh);


		//美術品編集画面にアクセスしたとき
	if (empty($_POST)) {
		//美術品テーブルの処理関数呼び出し
		require_once("../lib/function/db_material.php");

		//選択した美術品詳細データをデータベースから取得する
		$row = get_material_by_id($dbh, $_GET["material_id"]); //美術品ひとつを取得する関数

		//ジャンルテーブルの処理関数呼び出し
		require_once("../lib/function/db_genre.php");

		//選択したジャンルデータをデータベースから取得する
		$sth = get_genre($dbh);

		//美術品編集画面ビュー出力
		require_once("../lib/m_view/m_update_material.php");
	} else {
		// 内容漏れチェック
		if (empty($_POST["material_name"]) || empty($_POST["material_kana"])
			|| empty($_POST["author_name"]) || empty($_POST["author_kana"])
			|| empty($_POST["genre_id"]) || empty($_POST["material_year"])
			|| empty($_POST["picture"]) || empty($_POST["caption"])) {
			// require_once(".js"); // 入力エラー表示、JavaScriptがないためコメントアウト
			require_once("../lib/m_view/m_update_material.php");
			ph ("すべての項目を入力してください");
		} else {

			// 入力OK
			//データベースに管理ユーザを追加
			require_once("../lib/function/db_material.php");
			$sth=update_material($dbh, $_POST);
			require_once("../lib/m_view/m_update_exec_material.php");
		}
	}
