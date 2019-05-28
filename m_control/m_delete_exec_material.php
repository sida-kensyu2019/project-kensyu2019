<?php
//制作者村上：2019.5.22：Ver1.0
//美術品削除SQL発行プログラム（該当ID変数は$_GET["material_id"]）
//更新者佐藤：2019.5.23
    require_once("../lib/init.php");
    //不正なアクセスを無効化
    m_access_check();

    //いいねテーブルの削除関数呼び出し
    require_once("../lib/function/db_good.php");
    $sth=delete_good_by_material($dbh, $_GET["material_id"]);

    //評価テーブルの削除関数呼び出し
    require_once("../lib/function/db_grade.php");
    $sth=delete_grade_by_material($dbh, $_GET["material_id"]);

    //美術品テーブルの削除関数呼び出し
    require_once("../lib/function/db_material.php");
    $sth=delete_material($dbh, $_GET["material_id"]);

    require_once("../lib/m_view/m_delete_exec_material.php");
