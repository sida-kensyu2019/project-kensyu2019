<?php
    // ラーメン店情報削除画面コントローラ

    require_once("lib/function.php");

    // モデルファイルを読み込む
    require_once("lib/model/M_ramen.php");

    // モデルクラスのインスタンスを生成
    $ramen = new M_ramen($dbh);

    // データ削除
    $ramen->delete($_GET["ramen_id"]);

    // 完了画面のViewを呼び出す
    require_once("lib/view/delete_exec.php");
