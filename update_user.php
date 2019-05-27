<?php
// 制作者：井田　日時：2019.05.27 Ver1.0
// ユーザ情報変更画面
require_once("lib/init.php");

// ユーザIDとユーザページのIDがが同じかどうか
if ($_GET["user_id"] == $_SESSION["user_id"]) {

  // ユーザIDとユーザページのIDが一致
  // 最初にアクセスした場合
  if(empty($_POST)) {

    // ユーザ情報変更画面ビュー出力
    require_once("lib/function/db_user.php");
    $sth = get_user_by_id($dbh, $_SESSION["user_id"]);
    require_once("lib/function/db_job.php");
    $sth_job = get_job($dbh);
    $msg = "";
    require_once("lib/view/update_user.php");

  } else {

    // 内容漏れチェック
    if (empty($_POST["mail_address"]) || empty($_POST["password"])
      || empty($_POST["user_name"]) || empty($_POST["job_id"])
      || !(filter_var($_POST["mail_address"], FILTER_VALIDATE_EMAIL))
      || mb_strlen($_POST["mail_address"]) > 50
      || !(preg_match("/^[a-zA-Z0-9]{6,20}$/", $_POST["password"]))
      || !(preg_match("/^[^\x01-\x7E]{1,50}$/", $_POST["user_name"]))
      ) {

      //入力NG
      require_once("lib/function/db_user.php");
      $sth = get_user_by_id($dbh, $_SESSION["user_id"]);
      require_once("lib/function/db_job.php");
      $sth_job = get_job($dbh);
      $msg = "すべて入力してください";
      require_once("lib/view/update_user.php");

    } else {

      //入力OK
      require_once("lib/function/db_user.php");
      $sth = get_user_by_id($dbh, $_SESSION["user_id"]);
      require_once("lib/function/db_job.php");
      $sth_job = get_job($dbh);
      require_once("update_user.php");
    }
  }
}
