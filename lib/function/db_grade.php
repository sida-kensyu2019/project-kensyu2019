<?php

    //ユーザマイページでの評価一覧表示
    // データベースのデータを取得する
    function get_grade_by_user($dbh, $input)
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM t_grade;";
            $sql .= "WHERE user_id=:user_id ";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":user_id", $input["user_id"]);

            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth;

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    //美術品詳細画面での評価一覧表示
    // データベースのデータを取得する
    function get_grade_by_material($dbh, $input)
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM t_grade;";
            $sql .= "WHERE material_id=:material_id ";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":material_id", $input["material_id"]);

            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth;

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }


    //データベースにデータを追加する
    //grade_dateは評価をPOSTする段階で取得する
    //$input: 入力値、$_POST
    function insert_grade($dbh, $input)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "INSERT INTO t_grade (material_id, user_id, grade_date, star, comment) ";
            $sql .= "VALUES (:material_id, :user_id, :grade_date, :star, :comment)";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":material_id", $input["material_id"]);
            $sth->bindValue(":user_id", $input["user_id"]);
            $sth->bindValue(":grade_date", $input["grade_date"]);
            $sth->bindValue(":star", $input["star"]);
            $sth->bindValue(":comment", $input["comment"]);

            // SQLを発行
            $sth->execute();

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースのデータを削除する
    // $id: 削除するデータのid
    function delete_grade($dbh, $id)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "DELETE FROM t_grade ";
            $sql .= "WHERE grade_id=:grade_id";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":grade_id", (int) $id);

            // SQLを発行
            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースのデータを削除する
    // $id: 削除するデータのid
    function delete_grade_by_user($dbh, $id)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "DELETE FROM t_grade ";
            $sql .= "WHERE user_id=:user_id";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":user_id", (int) $id);

            // SQLを発行
            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }
