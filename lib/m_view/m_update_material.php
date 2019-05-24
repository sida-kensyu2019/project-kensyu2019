<!DOCTYPE html>
<!--
 * 管理美術品編集画面
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
<title>管理美術品編集画面</title>
<link rel="stylesheet" href="../../css/m_style.css">
</head>
<body>
  <header>
    <nav>
      <h1>管理者画面</h1>
      <ul>
        <li><a href="m_top.html">トップページ</a></li>
        <li><a href="../../m_control/m_select_material.php">美術品一覧</a></li>
        <li><a href="../../m_control/m_select_user.php">管理者一覧</a></li>
        <li><a href="../../m_control/m_select_genre.php">ジャンル一覧</a></li>
        <li><a href="../../m_control/m_select_job.php">職種一覧</a></li>
        <li><a href="../../m_control/m_select_closed.php">休館日一覧</a></li>
        <li><a href="">ログアウト</a></div>
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

<h2>管理美術品編集画面</h2>
<form action="m_update_exec_material.php" method="post">
<table>
<tr><td>美術品名</td><td><input type="text" name="material_name"></td></tr>
<tr><td>美術品読み</td><td><input type="text" name="material_kana"></td></tr>
<tr><td>作者名</td><td><input type="text" name="author_name"></td></tr>
<tr><td>作者名読み</td><td><input type="text" name="author_kana"></td></tr>
<tr><td>ジャンル</td><td><select name="jenre_id">
        <?php //while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
          <option value="<?php //ph($row["jenre_id"]);?>"><?php //ph($row["jenre_name"]);?></option>
        <?php //} ?>
      </select></td></tr>
<tr><td>制作年</td><td><input type="text" name="mateial_year"></td></tr>
<tr><td>写真</td><td><input type="text" name="picture"></td></tr>
<tr><td>説明</td><td><textarea cols="100" rows="10" name="caption"></textarea></td></tr>
</table>
<input type="submit" value= "登録"> <input type="reset" value="クリア"><br>

<!-- 美術品一覧画面に戻る -->
<input type="button" value="編集中止" onclick="location.href='m_select_material.php'">

</form>
</body>
</html>
