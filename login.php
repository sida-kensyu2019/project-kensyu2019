/**
 * このファイルの概要説明
 * ログイン画面
 * このファイルの詳細説明
 * 非ログインユーザが、管理者、ログインユーザとしての操作権限を得るためにログインする機能
 * システム名：愛パワー美術品評価管理システム
 * 作成者：山田美波
 * 作成日：2019/05/22
 * 最終更新日：2019/05/22
 * レビュー担当者：
 * レビュー日：
 * バージョン：0.1
 */

<?php require_once("lib/init.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ログイン画面</title>
</head>
<body>
  //あとで、一画面遷移ができるように
  <form action="login.php" method="post">

    ID:<input type="text" name="user_id" value="<?php
    if(!empty($_POST["user_id"])){
      ph($_POST["user_id"]);
    } else {
      print "";
    }
     ?>"><br>
    パスワード:<input type="password" name="password"  value="<?php
    if(!empty($_POST["password"])){
      ph($_POST["password"]);
    } else {
      print "";
    }
     ?>"><br>
    <input type="submit" value="ログイン"><br>

  </form>

  <?php
    if(empty($_POST)){

    } else {
      //データベースに問い合わせる
      if($_POST["user_id"]=="user_id" and $_POST["password"]=="password"){
        //ログインをして、美術館トップ画面に遷移
        $_SESSION["login"]=true;
        header("top.php");
      } else {
        print "IDまたはパスワードが違います";
        $_SESSION["login"]=false;
      }
    }

  ?>

</body>
</html>
