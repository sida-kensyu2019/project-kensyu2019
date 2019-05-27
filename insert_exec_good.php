<?php

  require_once("lib/init.php");

  require_once("lib/function/db_good.php");

  $sth=get_good_by_user($dbh, $_POST["user_id"]);

  //$no_good = true;

  // while($row=$sth->fetch(PDO::FETCH_ASSOC)){
  //   if($row["grade_id"] == $_POST["grade_id"]){
  //     delete_good($dbh, $_POST);
  //     $no_good = false;
  //   }
  // }
  //
  // if ($no_good){
  //   insert_good($dbh, $_POST);
  // }

  while($row=$sth->fetch(PDO::FETCH_ASSOC)){
    if($row["grade_id"] == $_POST["grade_id"]){
      delete_good($dbh, $_POST);
      } else {
    insert_good($dbh, $_POST);
      }
  }

  header("Location:material_detail.php?material_id={$_POST["material_id"]}");
