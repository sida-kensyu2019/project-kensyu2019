<?php
/**
 * このファイルの概要説明
 * 職種削除
 * このファイルの詳細説明
 * 職種削除
 * システム名：愛パワー美術品評価管理システム
 * 作成者：山田美波
 * 作成日：2019/05/23
 * 最終更新日：2019/05/23
 * レビュー担当者：
 * レビュー日：
 * バージョン：0.1
 */

require_once("../lib/init.php");

require_once("../lib/function/db_job.php");
$sth=delete_job($dbh, $_GET["job_id"]);

header("Location:http://localhost/GitHub/project-kensyu2019/m_control/m_select_job.php");
