<?php

    function connectDb()
    {
        $dsn = "mysql:dbname=php_db_programming;host=localhost;charset=utf8";
        $user = "embex";
        $password = "embex";

        try {
            //PDO,ExceptionはPHPの標準クラスライブラリ
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("データベース接続エラー：{$e->getMessage()}");
        }

        return $dbh;
    }    



