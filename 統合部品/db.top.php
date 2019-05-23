
<?php
//ユーザトップページ表示SQL実行プログラム
//平均評価の降順ですべて取得
//ビュープログラムで繰り返し20回までで表示件数制御
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

        // データを戻す
        return $sth;

    } catch (PDOException $e) {
        exit("SQL発行エラー：{$e->getMessage()}");
    }
}
