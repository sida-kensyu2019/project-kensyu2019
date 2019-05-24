<?php
/**
 * このファイルの概要説明
 * 新規登録完了画面コントロール
 * このファイルの詳細説明
 * 新規登録完了画面コントロール
 * システム名：愛パワー美術品評価管理システム
 * 作成者：山田美波
 * 作成日：2019/05/24
 * 最終更新日：2019/05/24
 * レビュー担当者：村上
 * レビュー日：2019/05/24
 * バージョン：0.1
 */

require_once("lib/init.php");

require_once("lib/function/db_user.php");
$sth=insert_user($dbh, $_POST);

require_once("lib/view/insert_exec_user.php");
