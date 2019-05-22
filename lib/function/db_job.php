<?php
    // データベースのデータを取得する
    function get_job($dbh)
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM m_job;";
            $sth = $dbh->prepare($sql); // SQLを準備
    
            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth;
            
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    //データベースにデータを追加する
    //$input: 入力値、$_POST[]
    function insert_job($dbh, $input)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "INSERT INTO m_job (job_name) ";
            $sql .= "VALUES (:job_name)";
            $sth = $dbh->prepare($sql); // SQLを準備
    
            // プレースホルダに値をバインド
            $sth->bindValue(":job_name", $input["job_name"]);
    
            // SQLを発行
            $sth->execute();

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースのデータを削除する
    // $id: 削除するデータのid
    function delete_job($dbh, $id)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "DELETE FROM m_job ";
            $sql .= "WHERE job_id=:job_id";
            $sth = $dbh->prepare($sql); // SQLを準備
    
            // プレースホルダに値をバインド
            $sth->bindValue(":job_id", (int) $id);
    
            // SQLを発行
            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }
