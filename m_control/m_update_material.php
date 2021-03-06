<?php
// 制作者:増井 2019/05/23：ver1.0
// 管理美術品編集画面コントローラ

	require_once("../lib/init.php");
	//不正なアクセスを無効化
	m_access_check();

	//美術品テーブルの処理関数呼び出し
	require_once("../lib/function/db_material.php");

	//選択した美術品詳細データをデータベースから取得する
	$row = get_material_by_id($dbh, $_GET["material_id"]); //美術品ひとつを取得する関数

	//ジャンルテーブルの処理関数呼び出し
	require_once("../lib/function/db_genre.php");

	//選択したジャンルデータをデータベースから取得する
	$sth = get_genre($dbh);


	if (empty($_POST)) {
		$msg = "";

		//美術品編集画面ビュー出力
			require_once("../lib/m_view/m_update_material.php");

	} else {
		// 内容漏れチェック

		if (empty($_POST["material_name"]) || empty($_POST["material_kana"])
     || empty($_POST["author_name"]) || empty($_POST["author_kana"])
     || empty($_POST["genre_id"]) || empty($_POST["material_year"])
     || empty($_POST["picture"]) || empty($_POST["caption"])
     || mb_strlen($_POST["material_name"]) > 50 //50文字以内
     || !preg_match("/^[ぁ-ゞ・＝゛ー～？！＆（、）]{1,70}$/u", $_POST["material_kana"]) //ひらがな全角、・、＝、゛、ー、～、？、！、＆、（、）、1～70文字
     || mb_strlen($_POST["author_name"]) > 50 //50文字以内
     || !preg_match("/^[ぁ-ゞ・＝゛ー～？！＆（、）]{1,70}$/u", $_POST["author_kana"]) //ひらがな全角、・、＝、゛、ー、～、？、！、＆、（、）、1～70文字
     || mb_strlen($_POST["material_year"]) > 20 //20文字以内
		 || mb_strlen($_POST["picture"]) > 100 //100文字以内
     || mb_strlen($_POST["caption"]) > 200) //200文字以内
		 {
			// require_once(".js"); // 入力エラー表示、JavaScriptがないためコメントアウト

			$msg = "すべての項目を正しく入力してください";
			require_once("../lib/m_view/m_update_material.php");
		} else {

			// 入力OK
			//データベースに管理ユーザを追加

			require_once("../lib/function/db_material.php");
			update_material($dbh, $_POST);
			require_once("../lib/m_view/m_update_exec_material.php");
		}
	}
