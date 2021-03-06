<?php
  //入力されたメールアドレスのユーザ情報をセレクトする
  //$input: $_POST
  //return $row 連想配列  関数内でfetch
  function get_user_by_mail($dbh, $input)
  {
      try {
          // プレースホルダ付きSQLを構築
          $sql = "SELECT * FROM m_user WHERE mail_address = :mail_address";
          $sth = $dbh->prepare($sql); // SQLを準備

          // プレースホルダに値をバインド
          $sth->bindValue(":mail_address", $input["mail_address"]);
          // SQLを発行
          $sth->execute();

          $row = $sth->fetch(PDO::FETCH_ASSOC);

          // データを戻す
          return $row;

      } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }
  }

  function get_m_user($dbh)
  {
      try {
          // SQLを構築
          $sql = "SELECT * FROM m_user ";
          $sql .= "INNER JOIN m_job ";
          $sql .= "ON m_user.job_id = m_job.job_id ";
          $sql .= "WHERE m_user.user_lv=1";
          $sth = $dbh->prepare($sql); // SQLを準備

          // SQLを発行
          $sth->execute();

          // データを戻す
          return $sth;

      } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }
  }

// 一般ユーザのデータ更新
//$input: $_POST
  function update_user($dbh, $input)
  {
      try {
          // プレースホルダ付きSQLを構築
          $sql = "UPDATE m_user ";
          $sql .= "SET password=:password, user_name=:user_name, ";
          $sql .= "job_id=:job_id, profile=:profile ";
          $sql .= "WHERE user_id=:user_id;";
          $sth = $dbh->prepare($sql); // SQLを準備

          // プレースホルダに値をバインド
          $sth->bindValue(":password", $input["password"]);
          $sth->bindValue(":user_name", $input["user_name"]);
          $sth->bindValue(":job_id", $input["job_id"]);
          $sth->bindValue(":profile", $input["profile"]);
          $sth->bindValue(":user_id", $input["user_id"]);

          // SQLを発行
          $sth->execute();

          return $sth;
      } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }
  }


    //return $row 連想配列  関数内でfetch
  function get_user_by_id($dbh, $id)
  {
      try {
          // SQLを構築
          $sql = "SELECT * FROM m_user ";
          $sql .= "INNER JOIN m_job ";
          $sql .= "ON m_user.job_id = m_job.job_id ";
          $sql .= "WHERE m_user.user_id=:user_id";
          $sth = $dbh->prepare($sql); // SQLを準備

          // プレースホルダに値をバインド
          $sth->bindValue(":user_id", (int) $id);

          // SQLを発行
          $sth->execute();

          $row = $sth->fetch(PDO::FETCH_ASSOC);

          // データを戻す
          return $row;

      } catch (PDOException $e) {
          exit("SQL発行エラー：{$e->getMessage()}");
      }
  }


  //データベースに管理ユーザのデータを追加する
  function insert_m_user($dbh, $input)
  {
    try {
        // プレースホルダ付きSQLを構築
        $sql = "INSERT INTO m_user (mail_address, password, user_name, job_id, user_lv) ";
        $sql .= "VALUES (:mail_address, :password, :user_name, :job_id, 1)";
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        $sth->bindValue(":mail_address", $input["mail_address"]);
        $sth->bindValue(":password", $input["password"]);
        $sth->bindValue(":user_name", $input["user_name"]);
        $sth->bindValue(":job_id", $input["job_id"]);

        // SQLを発行
        $sth->execute();

        // データを戻す
        return $sth;

        } catch (PDOException $e) {
            header("Location:../lib/m_view/m_user_error.php");
            exit();
        }
  }



  //データベースに一般ユーザのデータを追加する
  function insert_user($dbh, $input)
  {
    try {
        // プレースホルダ付きSQLを構築
        $sql = "INSERT INTO m_user (mail_address, password, user_name, job_id, user_lv) ";
        $sql .= "VALUES (:mail_address, :password, :user_name, :job_id, 2)";
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        $sth->bindValue(":mail_address", $input["mail_address"]);
        $sth->bindValue(":password", $input["password"]);
        $sth->bindValue(":user_name", $input["user_name"]);
        $sth->bindValue(":job_id", $input["job_id"]);

        // SQLを発行
        $sth->execute();

        // データを戻す
        return $sth;

        } catch (PDOException $e) {
            header("Location:lib/view/user_error.php");
            exit();
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
