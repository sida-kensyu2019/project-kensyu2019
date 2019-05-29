<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// ユーザ情報変更登録処理
require_once("lib/init.php");

if (!(login_check())) {
    //ユーザ情報編集入力確認画面でセッションが切れた場合のエラー対処
    setcookie("access_error", true, time()+60*60*24*30, "/");
    header("Location:top.php");
    exit();
}

// 変更されたユーザの情報が送信されたものを
// データベースに登録するためのコントローラ
// 確認画面から飛んできた$_POSTを処理するモデルを出力
require_once("lib/function/db_user.php");

// ユーザデータをデータベースから取得
$sth = get_user_by_id($dbh, $_SESSION["user_id"]);
// ユーザ情報をデータベースに更新する
update_user($dbh, $_POST);

// 追加しましたダイアログ表示
// require_once(".js"); // 未作成のため、コメントアウト

// ユーザ情報変更完了画面ビュー出力
require_once("lib/view/update_exec_user.php");
