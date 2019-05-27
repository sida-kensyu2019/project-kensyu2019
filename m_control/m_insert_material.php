<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// 管理美術品登録画面コントローラ
require_once("../lib/init.php");
//不正なアクセスを無効化
m_access_check();

//ユーザログイン確認
// if ($_SESSION["login"]) {
// ログイン時

  // ユーザレベル判定
  // if($_SESSION["user_lv"] == 2) { // 管理者のとき
   if (empty($_POST)) {
    // 美術品登録画面ビュー出力
    require_once("../lib/function/db_genre.php");
    $sth = get_genre($dbh);
    require_once("../lib/m_view/m_insert_material.php");
   } else {
    // 内容漏れチェック
    if (empty($_POST["material_name"]) || empty($_POST["material_kana"])
     || empty($_POST["author_name"]) || empty($_POST["author_kana"])
     || empty($_POST["genre_id"]) || empty($_POST["material_year"])
     || empty($_POST["picture"]) || empty($_POST["caption"])
     || preg_match("/^[^ -~｡-ﾟ]{1,50}$/", $_POST["material_name"])
     || preg_match("/^[あ-ん]{1,70}$/", $_POST["material_kana"])
     || preg_match("/^[^ -~｡-ﾟ]{1,50}$/", $_POST["author_name"])
     || preg_match("/^[あ-ん]{1,70}$/", $_POST["author_kana"])
     || $_POST["material_year"] > 20 || $_POST["picture"] > 100
     || $_POST["caption"] > 200) {

       // 入力NG
       // require_once(".js"); // 入力エラー表示
       require_once("../lib/function/db_genre.php");
       $sth = get_genre($dbh);
       require_once("../lib/m_view/m_insert_material.php"); // 美術品登録画面ビュー出力
     } else {

       // 入力OK
       require_once("../lib/function/db_genre.php");
       $sth=get_genre($dbh);
       require_once("../lib/function/db_material.php");
       insert_material($dbh, $_POST);
       require_once("../lib/m_view/m_insert_exec_material.php"); // 美術品登録完了画面出力
     }
   }
//   } else {  // 管理者でないとき
//
//     // 美術館トップページビュー出力
//     require_once("../lib/view/top.php");
//   }
// } else { // ログインしていない場合
//
//   // 美術館トップページビュー表示
//   require_once("../lib/view/top.php");
// }
