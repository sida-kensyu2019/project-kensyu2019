<?php

//ユーザトップページ表示SQL実行プログラム
//平均評価の降順ですべて取得
//ビュープログラムで繰り返し20回までで表示件数制御
//美術品の繰り返し一回ごとに上位コメント取得処理実行
//コメントを美術品の配列に追加結合→返り値とする
function get_material_top($dbh)
{
    try {
        // SQLを構築
        $sql = "SELECT m_material.material_id, m_material.material_name, ";
        $sql .= "m_material.author_name, m_material.picture, AVG(star) ";
        $sql .= "FROM t_grade INNER JOIN m_material ";
        $sql .= "ON m_material.material_id = t_grade.material_id ";
        $sql .= "GROUP BY material_id ORDER BY AVG(star) DESC;";
        $sth = $dbh->prepare($sql); // SQLを準備

        // SQLを発行
        $sth->execute();
        $idx = 0;
        $rowTop = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach($rowTop as $rowTop_idx){
            try {
                  // プレースホルダ付きSQLを構築
                  $sql = "SELECT t_grade.grade_id, t_grade.comment, COUNT(*) ";
                  $sql .= "FROM t_good INNER JOIN t_grade ";
                  $sql .= "ON t_good.grade_id = t_grade.grade_id ";
                  $sql .= "WHERE material_id = ";
                  $sql .= "{$rowTop_idx["material_id"]} ";
                  $sql .= "GROUP BY t_good.grade_id ";
                  $sql .= "ORDER BY COUNT(*) DESC; ";
                  $sth2 = $dbh->prepare($sql); // SQLを準備

                  // SQLを発行
                  $sth2->execute();
            } catch (PDOException $e) {
                  exit("SQL発行エラー：{$e->getMessage()}");
            }

            while($row_Comment = $sth2->fetch(PDO::FETCH_ASSOC)){
              $rowTop[$idx]["comment"] = $row_Comment["comment"];
              $idx++;
              break;
            }
        }

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
    return $rowTop;

}


//美術品詳細画面表示用の処理
// データベースのデータをIDを指定して1件取得する
//$id: GET["id"]
//return $row  連想配列 関数内でfetch
function get_material_by_id($dbh, $id)
{
    try {
        // SQLを構築
        $sql = "SELECT * FROM m_material ";
        $sql .= "INNER JOIN m_genre ";
        $sql .= "ON m_material.material_id = m_genre.genre_id ";
        $sql .= "WHERE m_material.material_id=:material_id ";
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        $sth->bindValue(":material_id", $id);

        // SQLを発行
        $sth->execute();

        $row = $sth->fetch(PDO::FETCH_ASSOC);

        // データを戻す
        return $row;

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
}


/*
    データベースのデータを取得する
    検索結果も反映
*/
function get_material($dbh)
{
    try {

        $where = [];
        $bind = [];

        if (!empty($_POST["material_name"])) {
            $where[] = "material_name LIKE :material_name";
            $bind[] = "material_name";
        }
        if (!empty($_POST["material_kana"])) {
            $where[] = "material_kana LIKE :material_kana";
            $bind[] = "material_kana";
        }
        if (!empty($_POST["author_name"])) {
            $where[] = "author_name LIKE :author_name";
            $bind[] = "author_name";
        }
        if (!empty($_POST["author_kana"])) {
            $where[] = "author_kana LIKE :author_kana";
            $bind[] = "author_kana";
        }
        if (!empty($_POST["genre_id"])) {
            $where[] = "m_material.genre_id = :genre_id";
            $bind[] = "genre_id";
        }
        if (!empty($_POST["material_year"])) {
            $where[] = "material_year LIKE :material_year";
            $bind[] = "material_year";
        }

        if (!empty($where)) {
            $where_sql = implode(" AND ", $where);
            // SQLを構築
            $sql = "SELECT * FROM m_material ";
            $sql .= "INNER JOIN m_genre ";
            $sql .= "ON m_material.genre_id = m_genre.genre_id ";
            $sql .= "WHERE " . $where_sql ;

            $sth = $dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            foreach ($bind as $bind_value) {
                if ($bind_value == "genre_id") {
                    $sth->bindValue(":genre_id", $_POST["genre_id"]);
                } else {
                    $sth->bindValue(":{$bind_value}", "%{$_POST[$bind_value]}%");
                }
            }

            // SQLを発行
            $sth->execute();
            // データを戻す
            return $sth;

        } else {
            // SQLを構築
            $sql = "SELECT * FROM m_material ";
            $sql .= "INNER JOIN m_genre ";
            $sql .= "ON m_material.genre_id = m_genre.genre_id ";

            $sth = $dbh->prepare($sql); // SQLを準備

            // SQLを発行
            $sth->execute();
            // データを戻す
            return $sth;
        }

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
}


// データベースのデータを更新する
// $input: array 入力値 主に$_POST
function insert_material($dbh, $input)
{
    try {
        // プレースホルダ付きSQLを構築
        $sql = "INSERT INTO m_material ";
        $sql .= "(material_name, material_kana, author_name, author_kana, genre_id, material_year, picture, caption) ";
        $sql .= "VALUES (:material_name, :material_kana, :author_name, :author_kana, :genre_id, :material_year, :picture, :caption)";
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        $sth->bindValue(":material_name", $input["material_name"]);
        $sth->bindValue(":material_kana", $input["material_kana"]);
        $sth->bindValue(":author_name", $input["author_name"]);
        $sth->bindValue(":author_kana", $input["author_kana"]);
        $sth->bindValue(":genre_id", $input["genre_id"]);
        $sth->bindValue(":material_year", $input["material_year"]);
        $sth->bindValue(":picture", $input["picture"]);
        $sth->bindValue(":caption", $input["caption"]);

        // SQLを発行
        $sth->execute();

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
}

// データベースのデータを削除する
// $id: 削除するデータのid
function delete_material($dbh, $id)
{
    try {
        // プレースホルダ付きSQLを構築
        $sql = "DELETE FROM m_material ";
        $sql .= "WHERE material_id=:material_id";
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        $sth->bindValue(":material_id", (int) $id);

        // SQLを発行
        $sth->execute();
    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
}


// データベースのデータを更新する
// $input: array 入力値
function update_material($dbh, $input)
{
    try {
        // プレースホルダ付きSQLを構築
        $sql = "UPDATE m_material ";
        $sql .= "SET material_name=:material_name, material_kana=:material_kana, author_name=:author_name, author_kana=:author_kana, ";
        $sql .= "genre_id=:genre_id, material_yaer=:material_year, picture=:picture, caption=:caption ";
        $sql .= "WHERE material_id=:material_id";
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        $sth->bindValue(":material_name", $input["material_name"]);
        $sth->bindValue(":material_kana", $input["material_kana"]);
        $sth->bindValue(":author_name", $input["author_name"]);
        $sth->bindValue(":author_kana", $input["author_kana"]);
        $sth->bindValue(":genre_id", $input["genre_id"]);
        $sth->bindValue(":material_year", $input["material_year"]);
        $sth->bindValue(":picture", $input["picture"]);
        $sth->bindValue(":caption", $input["caption"]);
        $sth->bindValue(":material_id", $input["material_id"]);

        // SQLを発行
        $sth->execute();

        $row = $sth->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
}
