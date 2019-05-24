<?php
    // データベースのデータを取得する
    function get_closed($dbh)
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM m_closed;";
            $sth = $dbh->prepare($sql); // SQLを準備

            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth;

        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    //休館日の入力値を配列[year, month, day]に格納
    function create_date($input)
    {
        $date["year"] = $input["year"];
        $date["month"] = $input["month"];
        $date["day"] = $input["day"];

        return $date;
    }


    //データベースにデータを追加する
    //$input: 入力値、$_POST
    // $date: 追加する日付、function.php/convert_date()の戻り値を代入
    function insert_closed($dbh, $input)
    {
        $ary_date = create_date($input);
        $date = implode("-", $ary_date);

        try {
            // プレースホルダ付きSQLを構築
            $sql = "INSERT INTO m_closed (closed) ";
            $sql .= "VALUES (:closed)";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":closed", $date);

            // SQLを発行
            $sth->execute();

        } catch (PDOException $e) {
            print "指定された日付はすでに休館日として登録されています。<br>";
            print "<a href=\"m_select_closed.php\">ジャンル一覧</a><br><br>";
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースのデータを削除する
    // $closed: 削除するデータの日付
    function delete_closed($dbh, $closed)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "DELETE FROM m_closed ";
            $sql .= "WHERE closed=:closed";
            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":closed", $closed);

            // SQLを発行
            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }
