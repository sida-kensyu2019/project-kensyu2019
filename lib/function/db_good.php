<?php
    /*
    覚書
    いいねボタンを押すと、評価idとユーザidを飛ばす
    これは、いいねの更新、削除共に同じ
    */

    //データベースにデータを追加する
    //$input: $_POST
    function insert_good($dbh, $input)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "INSERT INTO t_good (grade_id, user_id) ";
            $sql .= "VALUES (:grade_id, :user_id)";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":grade_id", $input["grade_id"]);
            $sth->bindValue(":user_id", $input["user_id"]);

            // SQLを発行
            $sth->execute();

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースのデータを削除する
    //データベースにデータを追加する
    //$input: $_POST
    function delete_good($dbh, $input)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "DELETE FROM t_good ";
            $sql .= "WHERE grade_id=:grade_id AND user_id=:user_id";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":grade_id", $input["grade_id"]);
            $sth->bindValue(":user_id", $input["user_id"]);

            // SQLを発行
            $sth->execute();

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースのデータを削除する
    //$id: $_GET
    function delete_good_by_user($dbh, $id)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "DELETE FROM t_good ";
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

    // データベースのデータを削除する
    //$id: $_GET
    function delete_good_by_user_grade($dbh, $id)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "DELETE FROM t_good ";
            $sql .= "WHERE grade_id IN ";
            $sql .= "(SELECT grade_id FROM t_grade ";
            $sql .= "WHERE user_id = :user_id)";
            $sth = $dbh->prepare($sql); //SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":user_id", (int) $id);

            // SQLを発行
            $sth->execute();

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースのデータを削除する
    //$id: $_GET
    function delete_good_by_grade($dbh, $id)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "DELETE FROM t_good ";
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

    //データベースのデータを削除する
    function delete_good_by_material($dbh, $id)
    {
        try{
          // プレースホルダ付きSQLを構築
          $sql = "DELETE FROM t_good ";
          $sql .= "WHERE grade_id IN ";
          $sql .= "(SELECT grade_id FROM t_grade ";
          $sql .= "WHERE material_id=:material_id)";
          $sth = $dbh->prepare($sql); //SQLを準備

          //プレースホルダに値をバインド
          $sth->bindValue(":material_id", (int) $id);

          //SQLを発行
          $sth->execute();

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    function get_goodCount_by_user($dbh, $user_id){
      try{
        // プレースホルダ付きSQLを構築
        $sql = "SELECT COUNT(*) FROM t_good ";
        $sql .= "INNER JOIN t_grade ";
        $sql .= "ON t_good.grade_id = t_grade.grade_id ";
        $sql .= "WHERE t_grade.user_id = :user_id;";
        $sth = $dbh->prepare($sql); //SQLを準備

        //プレースホルダに値をバインド
        $sth->bindValue(":user_id", $user_id);

        //SQLを発行
        $sth->execute();

        $cnt = $sth->fetch(PDO::FETCH_ASSOC);

        return $cnt = $cnt["COUNT(*)"];

      } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }
    }

     function get_good_by_user($dbh, $id)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "SELECT * ";
            $sql .= "FROM t_good ";
            $sql .= "WHERE t_good.user_id = :user_id";
            $sth = $dbh->prepare($sql); // SQLを準備

            //プレースホルダに値をバインド
            $sth->bindValue(":user_id", (int) $id);

            // SQLを発行
            $sth->execute();

            return $sth;

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }
