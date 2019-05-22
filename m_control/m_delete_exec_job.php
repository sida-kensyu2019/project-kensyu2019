<?php
//制作者村上：2019.5.22：Ver1.0
//ジョブ削除SQL発行プログラム（該当ID変数は$_GET["job_id"]）
 ?>
<?php
    require_once("../lib/init.php");

    try {
        // プレースホルダ付きSQLを構築
        $sql = "DELETE FROM eye_power_db.m_job ";
        $sql .= "WHERE job_id=:id;";
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        $sth->bindValue(":id", $_GET["job_id"]);

        // SQLを発行
        $sth->execute();
    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
