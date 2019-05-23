<?php
/*
美術館トップページコントローラ
制作者：村上
制作日：2019/05/23
*/

require_once("lib/init.php");

//SQL召喚
require_once("lib/function/db_material.php");
 $sth = get_material_top($dbh);

//view呼び込み
require_once("lib/view/top.php");

?>
