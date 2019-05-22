<?php
//制作者村上：2019.5.22：Ver1.0
//美術品削除SQL発行プログラム（該当ID変数は$_GET["material_id"]）
 ?>
<?php
    require_once("../lib/init.php");

    try {
        // プレースホルダ付きSQLを構築
        $sql = "DELETE FROM eye_power_db.m_material ";
        $sql .= "WHERE material_id=:id;";
        $sth = $dbh->prepare($sql); // SQLを準備

        // プレースホルダに値をバインド
        $sth->bindValue(":id", $_GET["material_id"]);

        // SQLを発行
        $sth->execute();
    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }

    require_once("../lib/m_view/m_delete_exec_material.php");
?>
