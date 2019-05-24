<?php
	//制作者：増井 日時：2019/05/23-24 ver1.0
	//ログイン画面コントローラ

	require_once("lib/init.php");
	require_once("lib/function/function.php");
	require_once("lib/function/db_user.php");

	if(empty($_POST)){ //初回アクセス時
		$_SESSION["login"]="";//$_SESSIONの初期化
		$errorMessage = ""; //エラーメッセージの初期化
		require_once("lib/view/login.php"); //ログイン画面を表示
	}else if($_SESSION["login"]==true){ //既にログインしたユーザがアクセスした時
 		require_once("index.php"); //トップ画面に遷移
 	}else{
		if(empty($_POST["mail_address"] || $_POST["password"])){ //入力されてない時
			$errorMessage="メールアドレスまたはパスワードが未入力です";
			require_once("lib/view/login.php"); //ログイン画面をもう一度表示
		}else{ //入力された時データベースに問い合わせる
			$sth=get_user_by_mail($dbh, $_POST);
			$row=$sth->fetch(PDO::FETCH_ASSOC); //入力されたメールアドレスのユーザデータを配列にして取得
			if(empty($row)){ //メールアドレスがデータベースに無い時
				$errorMessage="メールアドレスまたはパスワードが違います";
				require_once("lib/view/login.php"); //ログイン画面をもう一度表示
			}else if($_POST["password"]===$row["password"]){ //メールアドレスとパスワードが正しかった時
				$_SESSION["user_id"]=$row["user_id"]; //$_SESSIONにユーザIDを持たせる
				$_SESSION["user_lv"]=$row["user_lv"]; //$_SESSIONにユーザLVを持たせる
				$_SESSION["login"]=true; //$_SESSIONのログイン状態を切り替え
				require_once("index.php"); //トップ画面に遷移
			}else{
				$errorMessage="メールアドレスまたはパスワードが違います";
				require_once("lib/view/login.php"); //ログイン画面をもう一度表示
			}
		}
	}

	?>
