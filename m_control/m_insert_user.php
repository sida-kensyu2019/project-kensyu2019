<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// 管理ユーザ登録画面コントローラ
require_once("../lib/init.php");
//不正なアクセスを無効化
m_access_check();

    // 最初にアクセスした場合
    if (empty($_POST)) {
      // 管理ユーザ登録画面ビュー出力
      require_once("../lib/function/db_job.php");
      $sth=get_job($dbh);
      $msg = "";
      require_once("../lib/m_view/m_insert_user.php");
    } else {
      // 内容漏れチェック
      if (empty($_POST["mail_address"]) || empty($_POST["password"])
        || empty($_POST["user_name"]) || empty($_POST["job_id"])
        || !(filter_var($_POST["mail_address"], FILTER_VALIDATE_EMAIL)) //正しいメールアドレスが入力されているか確認
        || mb_strlen($_POST["mail_address"]) > 50 //メールアドレス50文字以内
        || !(preg_match("/^[a-zA-Z0-9]{6,20}$/", $_POST["password"])) //6文字以上20文字以下
        || mb_strlen($_POST["user_name"]) > 50 //50文字以内
        ) {
        // require_once(".js"); // 入力エラー表示、JavaScriptがないためコメントアウト
        require_once("../lib/function/db_job.php");
        $sth=get_job($dbh);
        $msg = "入力エラーです";
        require_once("../lib/m_view/m_insert_user.php");
      } else {

        // 入力OK
        //データベースに管理ユーザを追加
        require_once("../lib/function/db_user.php");
        $sth=insert_m_user($dbh, $_POST);
        require_once("../lib/m_view/m_insert_exec_user.php");
      }
    }
