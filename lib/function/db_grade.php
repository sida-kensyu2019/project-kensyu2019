<?php

    //ユーザマイページでの評価一覧表示
    // データベースのデータを取得する
    function get_grade_by_user($dbh, $id)
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM t_grade ";
            $sql .= "INNER JOIN m_material ";
            $sql .= "ON t_grade.material_id = m_material.material_id ";
            $sql .= "WHERE t_grade.user_id=:user_id";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":user_id", (int) $id);

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
        $sql = "SELECT m_user.user_id, m_user.user_name, t_grade.grade_id, t_grade.star, ";
        $sql .= "t_grade.comment, t_grade.grade_date, t_grade.material_id, t1.cnt ";
        $sql .= "FROM t_grade INNER JOIN m_user ON t_grade.user_id = m_user.user_id ";
        $sql .= "LEFT OUTER JOIN (SELECT COUNT(*) cnt, grade_id FROM t_good GROUP BY grade_id) t1 ";
        $sql .= "ON t_grade.grade_id = t1.grade_id ";
        $sql .= "WHERE t_grade.material_id = $input ";
        $sql .= "ORDER BY t1.cnt DESC; ";
        $sth = $dbh->prepare($sql); // SQLを準備

            // SQLを発行
        $sth->execute();

        //$sth->bindValue(":material_id", $input);

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
            $sql .= "VALUES (:material_id, :user_id, :grade_date, :star, :comment);";
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
            $sql .= "WHERE grade_id=:grade_id;";
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
            $sql .= "WHERE user_id=:user_id;";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":user_id", (int) $id);

            // SQLを発行
            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    //評価件数集計
    function grade_count($dbh, $material_id){
        try {
          $sql = "SELECT COUNT(*) FROM t_grade ";
          $sql .= "WHERE t_grade.material_id=:material_id ";
          $sql .= "GROUP BY t_grade.material_id ";

          $sth = $dbh->prepare($sql); // SQLを準備

          $sth->bindValue(":material_id", $material_id);

          $sth->execute();
          $row = $sth->fetch(PDO::FETCH_ASSOC);

          return $row;

        } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
        }

    }
