<?php
/*
美術館トップページコントローラ
制作者：村上
制作日：2019/05/23
最終更新日：2019/05/24
*/

require_once("lib/init.php");

//カレンダーSQL召喚
require_once("lib/function/db_closed.php");
  $sth_closed = get_closed($dbh);
require_once("lib/function/calender_function.php");
  $calender = mkCalender();
  //休館日データをすべて二次元配列に格納
  $closed_list = $sth_closed->fetchAll(PDO::FETCH_ASSOC);
  if(empty($closed_list)){
    $black = true;
  } else {
    $black = false;
  }
//検索ボックス用関数召喚
require_once("lib/function/db_genre.php");
  $sth = get_genre($dbh);

//表示する美術品召喚SQL
require_once("lib/function/db_material.php");
 $rowTop = get_material_top($dbh);

//view呼び込み
require_once("lib/view/top.php");

?>
