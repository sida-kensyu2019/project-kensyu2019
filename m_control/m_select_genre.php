<?php
/**
 * このファイルの概要説明
 * ジャンル一覧
 * このファイルの詳細説明
 * ジャンル一覧
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
    require_once("../lib/function/db_genre.php");
    $sth=get_genre($dbh);
    $msg="";
    require_once("../lib/m_view/m_select_genre.php");
} else {
    if (mb_strlen($_POST["genre_name"]) > 10){
        require_once("../lib/function/db_genre.php");
        $sth=get_genre($dbh);
        $msg="10文字以内で入力してください";
    require_once("../lib/m_view/m_select_genre.php");
    } else {
        require_once("../lib/function/db_genre.php");
        insert_genre($dbh, $_POST);
        $sth=get_genre($dbh);
        $msg="";
    require_once("../lib/m_view/m_select_genre.php");
    }
}

