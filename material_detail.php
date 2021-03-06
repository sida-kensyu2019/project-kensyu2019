<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// 美術品詳細画面コントローラ
  require_once("lib/init.php");
  //動作確認用 $_GET["material_id"] = 2;
  //動作確認用 $_SESSION["user_id"] = 3;

  // 美術品テーブルの処理関数呼び出し
  require_once("lib/function/db_material.php");

  // 美術品詳細データをデータベースから取得
  $sth_material = get_material_by_id($dbh, $_GET["material_id"]);
  if (empty($sth_material)) {
    require_once("material_not_found.php");
  } else {

  //該当美術品IDの評価件数を取得
  require_once("lib/function/db_grade.php");
  $count = grade_count($dbh, $_GET["material_id"]);

  // 評価詳細一覧表示取得
  $sth_grade = get_grade_by_material($dbh, $_GET["material_id"]);

  if (login_check()) {
    //ログインユーザがいいねした評価を取り出す
    require_once("lib/function/db_good.php");
    $sth_good=get_good_by_user($dbh, $_SESSION["user_id"]);
    $row_goodList=$sth_good->fetchall(PDO::FETCH_ASSOC);
  }

  // 美術品詳細画面ビュー出力
  require_once("lib/view/material_detail.php");
  }
