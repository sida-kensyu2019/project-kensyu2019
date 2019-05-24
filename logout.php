<?php
	//制作者：岩井 日時： ver1.0
	//ログアウト画面コントローラ

	require_once("lib/init.php");
	$_SESSION["user_id"]=false; //$_SESSIONにユーザIDを持たせる
	$_SESSION["user_lv"]=false; //$_SESSIONにユーザLVを持たせる
	$_SESSION["login"]=false; //$_SESSIONのログイン状態を切り替え
	header("Location:../project-kensyu2019/"); //トップ画面に遷移
