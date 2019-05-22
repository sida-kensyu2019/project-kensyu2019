<?php
    $dbh = connectDb();  //ここでPDOインスタンスを変数に持っておく

    function connectDb()
    {
        $dsn = "mysql:dbname=ramen_db;host=localhost;charset=utf8";
        $user = "trainee";
        $password = "password";

        try {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //①
        } catch (PDOException $e) {
            exit("データベース接続エラー：{$e->getMessage()}");
        }

        return $dbh;
    }

    function h($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
    }

    function ph($str)
    {
        print h($str);
    }
