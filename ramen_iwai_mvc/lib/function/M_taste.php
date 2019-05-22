<?php
// 味モデルクラス
class M_taste
{
    private $dbh; // PDOインスタンス

    // コンストラクタ
    // $dbh:PDOインスタンス
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    // データベースのデータを取得する
    public function getData()
    {
        try {
            // SQLを構築
            $sql = "SELECT * FROM m_taste;";
            $sth = $this->dbh->prepare($sql); // SQLを準備
    
            // SQLを発行
            $sth->execute();

            // データを戻す
            return $sth;
            
        } catch (PDOException $e) {
            exit("SQL発行エラー：{$e->getMessage()}");
        }
    }
}