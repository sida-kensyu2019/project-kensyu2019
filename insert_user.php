<?php
// 制作者：山田　日時：2019.05.24 Ver1.0
// 新規登録画面コントローラ
require_once("lib/init.php");

// 最初にアクセスした場合
if (empty($_POST)) {
  // 新規登録画面ビュー出力
  require_once("lib/function/db_job.php");
  $sth=get_job($dbh);
  $msg = "";
  require_once("lib/view/insert_user.php");
} else {
  // 内容漏れチェック
  if (empty($_POST["mail_address"]) || empty($_POST["password"])
    || empty($_POST["user_name"]) || empty($_POST["job_id"])) {
    // require_once(".js"); // 入力エラー表示、JavaScriptがないためコメントアウト
    require_once("lib/function/db_job.php");
    $sth=get_job($dbh);
    $msg = "すべて入力してください";

    require_once("lib/view/insert_user.php");
  } else {

    // 入力OK
    require_once("lib/function/db_job.php");
    $sth=get_job($dbh);
    require_once("lib/view/insert_check_user.php");
  }
}
