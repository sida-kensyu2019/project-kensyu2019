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
