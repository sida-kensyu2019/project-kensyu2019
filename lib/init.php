<?php


    //データベースに接続
    $dbh = connectDb();  //ここでPDOインスタンスを変数に持っておく

    function connectDb()
    {
        $dsn = "mysql:dbname=eye_power_db;host=localhost;charset=utf8";
        $user = "administrator";
        $password = "kensyu2019";

        try {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit("データベース接続エラー：{$e->getMessage()}");
        }

        return $dbh;
    }

    //セッションの開始
    session_start();
    //キャッシュ
    header('Expires:');
    header('Cache-Control:');
    header('Pragma:');

    //文字コード設定
    mb_internal_encoding("UTF-8");

     //共通に必要な関数は呼び出される
     require_once("function/function.php");

