<?php


//美術品詳細画面表示用の処理
// データベースのデータをIDを指定して1件取得する
//$id: GET["id"]
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

        // データを戻す
        return $sth;
        
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
        // SQLを構築
        $sql = "SELECT * FROM m_material ";
        $sql .= "INNER JOIN m_genre ";
        $sql .= "ON m_material.material_id = m_genre.genre_id ";

        if (empty($_POST)) {


            $sql .= "WHERE m_material.taste_id = :key_taste_id ";

            if (!empty($_POST["keyword"])) {
                //セレクトボックス入力済み、検索フォーム入力済み

                $sql .= "AND (m_material.material_name_kanji LIKE :keyword ";
                $sql .= "OR m_material.material_name_kana LIKE :keyword) ";
                $sth = $dbh->prepare($sql); // SQLを準備
                $sth->bindValue(":key_taste_id", $_POST["key_taste_id"]);
                $sth->bindValue(":keyword", "%{$_POST["keyword"]}%");
                // SQLを発行
                $sth->execute();
            } else {
                //セレクトボックス入力済み、検索フォーム未入力

                $sth = $dbh->prepare($sql); // SQLを準備
                $sth->bindValue(":key_taste_id", $_POST["key_taste_id"]);
                // SQLを発行
                $sth->execute();
            }
            
        } elseif (!empty($_POST["keyword"])) {
            //セレクトボックス未入力、検索フォーム入力済み

            $sql .= "WHERE m_material.material_name_kanji LIKE :keyword ";
            $sql .= "OR m_material.material_name_kana LIKE :keyword ";
            $sth = $dbh->prepare($sql); // SQLを準備
            $sth->bindValue(":keyword", "%{$_POST["keyword"]}%");
            // SQLを発行
            $sth->execute();
        } else {
            //セレクトボックス、検索フォーム共に未入力

            $sth = $dbh->prepare($sql); // SQLを準備
            // SQLを発行
            $sth->execute();
        }
    
    // データを戻す
    return $sth;

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
        $sth->bindValue(":material_id", $input["material_id"]);

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
    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
}
