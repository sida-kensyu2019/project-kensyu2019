<?php
    require_once("lib/function.php");

    // モデルファイルを読み込む
    require_once("lib/model/M_taste.php");

    // モデルクラスのインスタンスを生成
    $taste = new M_taste($dbh);

    // 味データを取得する
    $sth = $taste->getData();

    
    if (empty($_POST)) {
        $message = "";
        require_once("lib/view/insert.php");
    } else {
        //入力チェックも関数に入れてもよい
        if (empty($_POST["ramen_name_kanji"]) or empty($_POST["ramen_name_kana"]) or empty($_POST["taste_id"])) {
            $message = "すべての項目を入力してください";
            require_once("lib/view/insert.php");
        } elseif (mb_strlen($_POST["ramen_name_kanji"]) >50 or mb_strlen($_POST["ramen_name_kana"]) >50) {
            $message = "文字数は５０文字以内です。";
            require_once("lib/view/insert.php");
        }else {
            //入力チェッククリア

            // 確認画面のViewを呼び出す
            require_once("lib/view/insert_check.php");

        }
    }