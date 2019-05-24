<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// 管理美術品検索画面コントローラ
require_once("../init.php");

// ユーザログイン判定
// if ($_SESSION["login"]) {
// ログイン時
  // ユーザレベル判定
  // if($_SESSION["user_lv"] == 2) {
    // 管理者のとき
    // 検索画面ビュー出力
    if (empty($_POST)) {
      // 一度も入力していないとき
     require_once("../lib/m_view/m_search_material.php");
      //検索画面入力チェック
    } else {  // 何かしらの入力があったとき

      if (isset($_POST["material_name"]) || isset($_POST["material_kana"])
          || isset($_POST["author_name"] || isset($_POST["author_kana"])
          || isset($_POST["material_year"]) {
        // 検索画面の項目が埋まっているとき
        require_once("../lib/function/db_material.php");
        get_material($dbh);
        require_once("../lib/m_view/m_select_material.php"); // 美術品一覧表示
      } else {
        // 埋まっていないとき
        // require_once(".js"); // エラー表示
        require_once("../lib/m_view/m_search_material.php"); // 検索画面ビュー出力
      }
    }

  // } else {  // 管理者でないとき
    // 美術館トップページビュー表示
    // require_once("../lib/view/top.php");
  // }
// } else { // ログインしていない場合
  // 美術館トップページビュー表示
  // require_once("../lib/view/top.php");
// }
