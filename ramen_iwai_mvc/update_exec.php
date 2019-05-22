<?php
    // ラーメン店情報編集入力画面コントローラ

    require_once("lib/function.php");

    // モデルファイルを読み込む
    require_once("lib/model/M_ramen.php");

    // モデルクラスのインスタンスを生成
    $ramen = new M_ramen($dbh);

    //データ変更
    $ramen->update($_POST);

    // 完了画面のViewを呼び出す
    require_once("lib/view/update_exec.php");