<?php

  //$input: $_POST
  function get_user_by_mail($dbh, $input)
  {
      try {
          // プレースホルダ付きSQLを構築
          sql = "SELECT * FROM m_user WHERE mail_address = :mail_address";
          $sth = $dbh->prepare($sql); // SQLを準備

          // プレースホルダに値をバインド
          $sth->bindValue(":mail_address", $input["mail_address"]);
          // SQLを発行
          $sth->execute();
          // データを戻す
          return $sth;

      } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }
  }

  //データベースに管理ユーザのデータを追加する
  function m_insert_user($dbh, $input)
  {
    try {
        // プレースホルダ付きSQLを構築
        $sql = "INSERT INTO m_user (mail_address, password, user_name, job_id, user_lv, profile) ";
        $sql .= "VALUES (:mail_address, :password, :user_name, :job_id, 2, :profile)";
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        $sth->bindValue(":mail_address", $_POST["mail_address"]);
        $sth->bindValue(":password", $_POST["password"]);
        $sth->bindValue(":user_name", $_POST["user_name"]);
        $sth->bindValue(":job_id", $_POST["job_id"]);
        $sth->bindValue(":profile", $_POST["profile"]);

        // SQLを発行
        $sth->execute();

        // データを戻す
        return $sth;

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
  }



  //データベースに一般ユーザのデータを追加する
  function insert_user($dbh, $input)
  {
    try {
        // プレースホルダ付きSQLを構築
        $sql = "INSERT INTO m_user (mail_address, password, user_name, job_id, user_lv, profile) ";
        $sql .= "VALUES (:mail_address, :password, :user_name, :job_id, 1, :profile)";
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        $sth->bindValue(":mail_address", $_POST["mail_address"]);
        $sth->bindValue(":password", $_POST["password"]);
        $sth->bindValue(":user_name", $_POST["user_name"]);
        $sth->bindValue(":job_id", $_POST["job_id"]);
        $sth->bindValue(":profile", $_POST["profile"]);

        // SQLを発行
        $sth->execute();

        // データを戻す
        return $sth;

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
  }


  // データベースのユーザのデータを削除する
  // $id: 削除するデータのid
  function delete_user($dbh, $id)
  {
      try {
          // プレースホルダ付きSQLを構築
          $sql = "DELETE FROM m_user ";
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
