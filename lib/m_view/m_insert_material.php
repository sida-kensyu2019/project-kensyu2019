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
<link rel="stylesheet" href="../css/m_style.css">
</head>
<body>
      <header>
        <nav>
          <ul>
            <li><a href="../lib/m_view/m_top.html">トップページ</a></li>
            <li><a href="m_select_material.php">美術品一覧</a></li>
            <li><a href="m_select_user.php">管理者一覧</a></li>
            <li><a href="m_select_genre.php">ジャンル一覧</a></li>
            <li><a href="m_select_job.php">職種一覧</a></li>
            <li><a href="m_select_closed.php">休館日一覧</a></li>
            <li><a href="../logout.php" onclick="return confirm('本当にログアウトしますか？'); ">ログアウト</a></li>
          </ul>
        </nav>
      </header>

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
<br>
<h1>管理美術品登録画面</h1>
<form action="m_insert_material.php" method="post">
<table>
<tr><th>美術品名</th><td><input type="text" name="material_name"></td></tr>
<tr><th>美術品読み</th><td><input type="text" name="material_kana"></td></tr>
<tr><th>作者名</th><td><input type="text" name="author_name"></td></tr>
<tr><th>作者名読み</th><td><input type="text" name="author_kana"></td></tr>
<tr><th>ジャンル</th><td><select name="genre_id">
        <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
          <option value="<?php ph($row["genre_id"]);?>"><?php ph($row["genre_name"]);?></option>
        <?php } ?>
      </select></td></tr>
<tr><th>制作年</th><td><input type="text" name="material_year"></td></tr>
<tr><th>写真</th><td><input type="text" name="picture"></td></tr>
<tr><th>説明</th><td><textarea cols="100" rows="10" name="caption"></textarea></td></tr>
</table>
<br>
<div>
<input type="submit" value= "登録"> <input type="reset" value="クリア"><br>
<input type="hidden" name="genre_name">
<br>
<!-- 美術品一覧画面に戻る -->
<input type="button" value="登録中止" onclick="location.href='m_select_material.php'">
</div>
</form>
</body>
</html>
