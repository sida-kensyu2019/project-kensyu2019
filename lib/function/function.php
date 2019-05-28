<?php

    //XSS対策
    function h($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
    }

    function ph($str)
    {
        print h($str);
    }


    //ログイン判断関数
    function login_check()
    {
      if (empty($_SESSION["login"])){
        //セッションがない場合
        return false;
      } else {
        return true;
      }
    }

    //ユーザレベル判断関数
    function user_lv_check()
    {
      if (empty(login_check())){
          return false;
      } elseif ($_SESSION["user_lv"] == 1){
          return true; //管理者の場合true
      } else {
          return false; //一般ユーザの場合faise
      }
    }

    //管理ユーザー以外が管理ページにアクセスした場合トップページへ遷移
    //トップページでアクセスエラーの旨をダイアログ表示
    function m_access_check()
    {
      if (!(user_lv_check())) {
        setcookie("access_error", true, time()+60*60*24*30, "/");
        header("Location:../top.php");
      }
    }

    function m_access_check_view()
    {
      if (!(user_lv_check())) {
        setcookie("access_error", true, time()+60*60*24*30, "/");
        header("Location:../../top.php");
      }
    }
