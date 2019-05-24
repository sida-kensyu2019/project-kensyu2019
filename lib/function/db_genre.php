<?php
    // データベースのデータを取得する
    function get_genre($dbh)
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM m_genre;";
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
    //$input: 入力値、$_POST
    function insert_genre($dbh, $input)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "INSERT INTO m_genre (genre_name) ";
            $sql .= "VALUES (:genre_name)";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":genre_name", $input["genre_name"]);

            // SQLを発行
            $sth->execute();

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースのデータを削除する
    // $id: 削除するデータのid
    function delete_genre($dbh, $id)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "DELETE FROM m_genre ";
            $sql .= "WHERE genre_id=:genre_id";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":genre_id", (int) $id);

            // SQLを発行
            $sth->execute();
        } catch (PDOException $e) {
            print "このジャンルはすでに使用されているので、削除できません。<br>";
            print "<a href=\"m_select_genre.php\">ジャンル一覧</a><br><br>";
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }
