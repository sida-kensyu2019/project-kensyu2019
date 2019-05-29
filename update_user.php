<?php
// 制作者：井田　日時：2019.05.27 Ver1.0
// ユーザ情報変更画面
require_once("lib/init.php");

if (!(login_check())) {
  //ユーザマイページでセッションが切れた場合のエラー対処
  setcookie("access_error", true, time()+60*60*24*30, "/");
  header("Location:top.php");
  exit();
}

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
    if (empty($_POST["password"])
      || empty($_POST["user_name"]) || empty($_POST["job_id"])
      || !(preg_match("/^[a-zA-Z0-9]{6,20}$/", $_POST["password"])) //6文字以上20文字以下
      || mb_strlen($_POST["user_name"]) > 50 //50文字以内
      || mb_strlen($_POST["profile"]) > 5000 //5000文字以内
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
      require_once("lib/view/update_check_user.php");

    }
  }
} else {
  //エラーメッセージ表示
  setcookie("access_error", true, time()+60*60*24*30, "/");
  header("location:top.php");
}
