<?php
// 制作者：井田、増井　日時：2019.05.23 Ver1.0
// 美術品評価書き込み画面コントローラ
require_once("lib/init.php");

// ユーザログイン判定
if (login_check()) { // ログインユーザ
  // 評価書込画面コントローラ遷移 -> 評価書込画面ビュー出力
  if (empty($_POST)) {
    $msg="";
    require_once("lib/view/insert_grade.php"); // 評価書込画面ビュー出力
  } elseif (empty($_POST["comment"]) || mb_strlen($_POST["comment"]) > 5000) { // 書き込みない場合
    $msg="コメントを入力してください<br>";
    require_once("lib/view/insert_grade.php"); // 評価書込画面ビュー出力
  } else {  // ある場合
    // 評価書込み確認画面ビュー出力
    if ($_POST["star"] > 5 or $_POST["star"] < 0) {
      setcookie("access_error", true, time()+60*60*24*30, "/");
      header("Location:top.php");
      exit();
    }
    require_once("lib/view/insert_check_grade.php");
  }
} else { // 非ログインユーザ
  // ダイアログ「ログインしてください」表示
  //require_once(".js");
  // 美術品詳細表示
  setcookie("access_error", true, time()+60*60*24*30, "/");
  header("Location:top.php");

  /*
    評価書き込みクリック時にログインチェックに変更
    インサート画面でセッション切れたら、トップに飛ばす
  */
}
