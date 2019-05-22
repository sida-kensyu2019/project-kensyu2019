<?php
// ラーメン店情報一覧コントローラ

    require_once("lib/function.php");

    // モデルファイルを読み込む
    require_once("lib/model/M_ramen.php");
    require_once("lib/model/M_taste.php");

    // モデルクラスのインスタンスを生成
    $ramen = new M_ramen($dbh);
    $taste = new M_taste($dbh);

    // ラーメン店データを取得する
    $sth_ramen = $ramen->getData();
    $sth_taste = $taste->getData();

    // 一覧画面のViewを呼び出す
    if (empty($_POST["keyword"]) and empty($_POST["key_taste_id"])) {
        $button = "";
    } else {
        $button = "　<input type=\"button\" value=\"全表示\" onclick=\"window.location.href='select.php';\">";
    }
    require_once("lib/view/select.php");

    