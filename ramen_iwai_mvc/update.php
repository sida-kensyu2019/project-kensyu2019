<?php
    // ラーメン店情報編集入力画面コントローラ

    require_once("lib/function.php");

    // モデルファイルを読み込む
    require_once("lib/model/M_ramen.php");
    require_once("lib/model/M_taste.php");

    // モデルクラスのインスタンスを生成
    $ramen = new M_ramen($dbh);
    $taste = new M_taste($dbh);

    // 編集する山データを取得する
    $row_ramen = $ramen->getDataById($_GET["ramen_id"]);

    // ラーメン店データを取得する
    $sth = $taste->getData();

    // 入力画面のViewを呼び出す
    if (empty($_POST)) {
        $message = "";
        require_once("lib/view/update.php");
    } else {
        if (empty($_POST["ramen_name_kanji"]) or empty($_POST["ramen_name_kana"]) or empty($_POST["taste_id"])) {
            $message = "すべての項目を入力してください";
            require_once("lib/view/update.php");
        } elseif (mb_strlen($_POST["ramen_name_kanji"]) >50 or mb_strlen($_POST["ramen_name_kana"]) >50) {
            $message = "文字数は５０文字以内です。";
            require_once("lib/view/update.php");
        }else {
            //入力チェッククリア

            // 確認画面のViewを呼び出す
            require_once("lib/view/update_check.php");
        }
    }