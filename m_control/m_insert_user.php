<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// 管理ユーザ登録画面コントローラ
require_once("../lib/init.php");

//ユーザログイン確認
//if ($_SESSION["login"]) {
// ログイン時

  // ユーザレベル判定
  //  if($_SESSION["user_lv"] == 2) { // 管理者のとき

    // 管理ユーザ登録画面ビュー出力
    require_once("../lib/m_view/m_insert_user.php");

//  } else {  // 管理者でないとき

    // 美術館トップページビュー出力
//    require_once("../lib/view/top.php");
  //}

//} else { // ログインしていない場合

  // 美術館トップページビュー表示
//  require_once("../lib/view/top.php");
//}
