<?php
/**
 * このファイルの概要説明
 * 職種一覧
 * このファイルの詳細説明
 * 職種一覧
 * システム名：愛パワー美術品評価管理システム
 * 作成者：山田美波
 * 作成日：2019/05/23
 * 最終更新日：2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン：0.1
 */


require_once("../lib/init.php");
//不正なアクセスを無効化
m_access_check();

if (empty($_POST)) {
    require_once("../lib/function/db_job.php");
    $sth=get_job($dbh);
    $msg="";
    require_once("../lib/m_view/m_select_job.php");
} else {
    if (mb_strlen($_POST["job_name"]) > 10){
    require_once("../lib/function/db_job.php");
    $sth=get_job($dbh);
    $msg="10文字以内で入力してください";
    require_once("../lib/m_view/m_select_job.php");
    } else {
    require_once("../lib/function/db_job.php");
    insert_job($dbh, $_POST);
    $sth=get_job($dbh);
    $msg="";
    require_once("../lib/m_view/m_select_job.php");
    }
}
