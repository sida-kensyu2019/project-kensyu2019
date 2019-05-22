<!DOCTYPE html>
<!--
 * 管理美術品登録画面
 *
 * システム名：愛パワー美術品評価管理システム
 * 作成者：佐藤瑠菜
 * 作成日：2019/5/22
 * 最終更新日：
 * レビュー担当者：
 * レビュー日：
 * バージョン：0.1
  -->
<html>
<head>
<meta charset="utf-8">
<title>管理美術品登録画面</title>
</head>
<body>

  <?php
      // require_once("../init.php");
      //
      // try {
      //     // SQLを構築
      //     $sql = "SELECT * FROM eye_power_db.m_material";
      //     $sth = $dbh->prepare($sql); // SQLを準備
      //
      //     // SQLを発行
      //     $sth->execute();
      // } catch (PDOException $e) {
      //     exit("SQL発行エラー：{$e->getMessage()}");
      // }
  ?>

<form action="m_insert_exec_material.php" method="post">

美術品名 <input type="text" name="material_name"><br>
美術品読み <input type="text" name="material_kana"><br>
作者名 <input type="text" name="author_name"><br>
作者名読み <input type="text" name="author_kana"><br>
ジャンル <select name="jenre_id">
        <?php //while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
          <option value="<?php //ph($row["jenre_id"]);?>"><?php //ph($row["jenre_name"]);?></option>
        <?php //} ?>
        </select><br>
制作年 <input type="text" name="mateial_year"><br>
写真 <input type="text" name="picture"><br>
説明<br>
<textarea cols="100" rows="10" name="caption"></textarea><br>

<input type="submit" value= "登録"> <input type="reset" value="クリア"><br>
<input type="button" value="登録中止" onclick="location.href='m_select_material.php'">

</form>
</body>
</html>
