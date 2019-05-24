<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// 美術品詳細画面コントローラ
  require_once("lib/init.php");

  // 美術品テーブルの処理関数呼び出し
  require_once("lib/function/db_material.php");

  // 美術品詳細データをデータベースから取得
  $sth_material = get_material_by_id($dbh, 2);

  //該当美術品IDの評価件数を取得
  require_once("lib/function/db_grade.php");
  $count = grade_count($dbh, 2);

  // 評価詳細一覧表示取得
  $sth_grade = get_grade_by_material($dbh, 2);

  // 美術品詳細画面ビュー出力
  require_once("lib/view/material_detail.php");
