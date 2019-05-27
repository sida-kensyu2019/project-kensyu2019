<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// 美術品評価登録処理
require_once("lib/init.php");

// 美術品の評価書き込んで送信されたものを
// データベースに登録するためのコントローラ

// 確認画面から飛んできた$_POSTを処理するモデルを出力
require_once("lib/function/db_grade.php");

// 美術品の評価をデータベースに追加する
insert_grade($dbh,$_POST);

// 追加しましたダイアログ表示
// require_once(".js"); // 未作成のため、コメントアウト

// 美術品詳細画面遷移
header("Location:material_detail.php?material_id={$_POST['material_id']}");
