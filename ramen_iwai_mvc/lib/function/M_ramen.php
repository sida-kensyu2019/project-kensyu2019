<?php
//ラーメン店モデルクラス
class M_ramen
{
    private $dbh; // PDOインスタンス

    // コンストラクタ
    // $dbh:PDOインスタンス
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    /*
        データベースのデータを取得する
        検索結果も反映
    */
    public function getData()
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM m_ramen ";
            $sql .= "INNER JOIN m_taste ";
            $sql .= "ON m_ramen.taste_id = m_taste.taste_id ";
    
            if (!empty($_POST["key_taste_id"])) {
                $sql .= "WHERE m_ramen.taste_id = :key_taste_id ";
    
                if (!empty($_POST["keyword"])) {
                    //セレクトボックス入力済み、検索フォーム入力済み
    
                    $sql .= "AND (m_ramen.ramen_name_kanji LIKE :keyword ";
                    $sql .= "OR m_ramen.ramen_name_kana LIKE :keyword) ";
                    $sth = $this->dbh->prepare($sql); // SQLを準備
                    $sth->bindValue(":key_taste_id", $_POST["key_taste_id"]);
                    $sth->bindValue(":keyword", "%{$_POST["keyword"]}%");
                    // SQLを発行
                    $sth->execute();
                } else {
                    //セレクトボックス入力済み、検索フォーム未入力
    
                    $sth = $this->dbh->prepare($sql); // SQLを準備
                    $sth->bindValue(":key_taste_id", $_POST["key_taste_id"]);
                    // SQLを発行
                    $sth->execute();
                }
                
            } elseif (!empty($_POST["keyword"])) {
                //セレクトボックス未入力、検索フォーム入力済み
    
                $sql .= "WHERE m_ramen.ramen_name_kanji LIKE :keyword ";
                $sql .= "OR m_ramen.ramen_name_kana LIKE :keyword ";
                $sth = $this->dbh->prepare($sql); // SQLを準備
                $sth->bindValue(":keyword", "%{$_POST["keyword"]}%");
                // SQLを発行
                $sth->execute();
            } else {
                //セレクトボックス、検索フォーム共に未入力
    
                $sth = $this->dbh->prepare($sql); // SQLを準備
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
    public function insert($input)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "INSERT INTO m_ramen (ramen_name_kanji, ramen_name_kana, taste_id) ";
            $sql .= "VALUES (:ramen_name_kanji, :ramen_name_kana, :taste_id)";
            $sth = $this->dbh->prepare($sql); // SQLを準備
    
            // プレースホルダに値をバインド
            $sth->bindValue(":ramen_name_kanji",     $input["ramen_name_kanji"]);
            $sth->bindValue(":ramen_name_kana",     $input["ramen_name_kana"]);
            $sth->bindValue(":taste_id",   $input["taste_id"]);
    
            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth;
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースのデータを削除する
    // $id: 削除するデータのid
    public function delete($id)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "DELETE FROM m_ramen ";
            $sql .= "WHERE ramen_id=:ramen_id";
            $sth = $this->dbh->prepare($sql); // SQLを準備
    
            // プレースホルダに値をバインド
            $sth->bindValue(":ramen_id", (int) $id);
    
            // SQLを発行
            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースのデータをIDを指定して1件取得する
    // $id:idを指定
    public function getDataById($id)
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM m_ramen ";
            $sql .= "WHERE ramen_id = :ramen_id";

            $sth = $this->dbh->prepare($sql); // SQLを準備

            // プレースホルダに値をバインド
            $sth->bindValue(":ramen_id", (int) $id);

            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }

    // データベースのデータを更新する
    // $input: array 入力値
    public function update($input)
    {
        try {
            // プレースホルダ付きSQLを構築
            $sql = "UPDATE m_ramen ";
            $sql .= "SET ramen_name_kanji=:ramen_name_kanji, ramen_name_kana=:ramen_name_kana, taste_id=:taste_id ";
            $sql .= "WHERE ramen_id=:ramen_id";
            $sth = $this->dbh->prepare($sql); // SQLを準備
    
            // プレースホルダに値をバインド
            $sth->bindValue(":ramen_name_kanji", $input["ramen_name_kanji"]);
            $sth->bindValue(":ramen_name_kana", $input["ramen_name_kana"]);
            $sth->bindValue(":taste_id", $input["taste_id"]);
            $sth->bindValue(":ramen_id", $input["ramen_id"]);
    
            // SQLを発行
            $sth->execute();
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }
}