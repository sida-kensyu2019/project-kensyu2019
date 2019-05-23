<?php
// 制作者：井田、増井　日時：2019.05.23 Ver1.0
// 美術品評価書き込み画面コントローラ
require_once("../init.php");

// ユーザログイン判定
if ($_SESSION["login"]) { // ログインユーザ
  // 評価書込画面コントローラ遷移 -> 評価書込画面ビュー出力
  if (!isset($_POST["star"] || $_POST["comment"]) { // 書き込みない場合
    // 評価書込画面ビュー出力
    require_once("../view/insert_grade.php");
  } else {  // ある場合
    // 評価書込み確認画面ビュー出力
    require_once("../view/insert_check_grade.php");
  }
} else { // 非ログインユーザ
  // ダイアログ「ログインしてください」表示
  require_once(".js");
  // 美術品詳細表示
  require_once("../view/material_detail.php");
}
