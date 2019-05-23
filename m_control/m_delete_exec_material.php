<?php
//制作者村上：2019.5.22：Ver1.0
//美術品削除SQL発行プログラム（該当ID変数は$_GET["material_id"]）
//更新者佐藤：2019.5.23
    require_once("../lib/init.php");

    require_once("../lib/function/db_material.php");
    $sth=delete_material($dbh);

    require_once("../lib/m_view/m_delete_exec_material.php");
