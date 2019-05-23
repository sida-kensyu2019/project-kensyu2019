<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// 美術品詳細画面コントローラ
requie_once("lib/init.php");

  // 美術品テーブルの処理関数呼び出し
  require_once("/lib/function/db_material.php");

  // 美術品詳細データをデータベースから取得
  $sth = get_material_by_id($dbh, $_GET["material_id"]);

  // 美術品詳細画面ビュー出力
  require_once("/view/material_detail.php");
