<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// ユーザ情報変更登録処理
require_once("lib/init.php");

// 変更されたユーザの情報が送信されたものを
// データベースに登録するためのコントローラ

// 確認画面から飛んできた$_POSTを処理するモデルを出力
require_once("/lib/function/db_user.php");

// 美術品詳細データをデータベースから取得
$sth = get_user_by_id($dbh, $_GET["user_id"]);
// 美術品の評価をデータベースに追加する
update_user($dbh,$_POST);

// 追加しましたダイアログ表示
// require_once(".js"); // 未作成のため、コメントアウト

// 美術品詳細画面ビュー出力
require_once("/view/user.php");
