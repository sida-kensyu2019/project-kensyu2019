<?php
// 制作者：井田　日時：2019.05.23 Ver1.0
// ユーザ退会画面コントローラ
require_once("lib/init.php");

if (!(login_check())) {
    //ユーザマイページでセッションが切れた場合のエラー対処
    setcookie("access_error", true, time()+60*60*24*30, "/");
    header("Location:top.php");
    exit();
}

require_once("lib/function/db_user.php");
$sth = get_user_by_id($dbh, $_SESSION["user_id"]);

require_once("lib/view/delete_user.php");
