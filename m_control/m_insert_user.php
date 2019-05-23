<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// 管理ユーザ登録画面コントローラ
require_once("../lib/init.php");

//ユーザログイン確認
//if ($_SESSION["login"]) {
// ログイン時

  // ユーザレベル判定
  //  if($_SESSION["user_lv"] == 2) { // 管理者のとき

    // 最初にアクセスした場合
    if (empty($_POST)) {
      // 管理ユーザ登録画面ビュー出力
      require_once("../lib/function/db_job.php");
      $sth=get_job($dbh);
      require_once("../lib/m_view/m_insert_user.php");
    } else {
      // 内容漏れチェック
      if (empty($_POST["mail_address"]) || empty($_POST["password"])
        || empty($_POST["user_name"]) || empty($_POST["job_id"])) {
        // require_once(".js"); // 入力エラー表示、JavaScriptがないためコメントアウト
        require_once("../lib/m_view/m_insert_user.php");
      } else {

        // 入力OK
        //データベースに管理ユーザを追加
        require_once("../lib/function/db_user.php");
        $sth=insert_m_user($dbh, $input);
        require_once("../lib/m_view/m_insert_exec_user.php");
      }
    }




//  } else {  // 管理者でないとき

    // 美術館トップページビュー出力
//    require_once("../lib/view/top.php");
  //}

//} else { // ログインしていない場合

  // 美術館トップページビュー表示
//  require_once("../lib/view/top.php");
//}
