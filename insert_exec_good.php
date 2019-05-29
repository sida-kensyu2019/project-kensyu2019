<?php

  require_once("lib/init.php");

  if (!(login_check())) {
    //美術品詳細画面でセッションが切れた場合のエラー対処
    setcookie("access_error", true, time()+60*60*24*30, "/");
    header("Location:top.php");
    exit();
  }

  require_once("lib/function/db_good.php");

  $sth=get_good_by_user($dbh, $_SESSION["user_id"]);

  $no_good = true;

  $input = [
    "user_id" => $_SESSION["user_id"],
    "grade_id" => $_POST["grade_id"],
  ];

  while($row=$sth->fetch(PDO::FETCH_ASSOC)){
    if($row["grade_id"] == $_POST["grade_id"]){
      delete_good($dbh, $input);
      $no_good = false;
    }
  }

  if ($no_good){
    insert_good($dbh, $input);
  }



  header("Location:material_detail.php?material_id={$_POST["material_id"]}");
