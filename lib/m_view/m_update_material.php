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
<link rel="stylesheet" href="../css/m_style.css">
</head>
<body>
<br>
      <header>
        <nav>
          <ul>
            <li><a href="../lib/m_view/m_top.php">トップページ</a></li>
            <li><a href="m_select_material.php">美術品一覧</a></li>
            <li><a href="m_select_user.php">管理者一覧</a></li>
            <li><a href="m_select_genre.php">ジャンル一覧</a></li>
            <li><a href="m_select_job.php">職種一覧</a></li>
            <li><a href="m_select_closed.php">休館日一覧</a></li>
            <li><a href="../logout.php" onclick="return confirm('本当にログアウトしますか？'); ">ログアウト</a></li>
          </ul>
        </nav>
      </header>
<br>
<h1>美術品編集</h1>
<form action="m_update_material.php?material_id=<?php ph($row["material_id"]);?>" method="post">
<table>
<tr><td>美術品名</td><td><input type="text" name="material_name" value="<?php ph($row["material_name"]);?>"></td></tr>
<tr><td>美術品読み</td><td><input type="text" name="material_kana" value="<?php ph($row["material_kana"]);?>"></td></tr>
<tr><td>作者名</td><td><input type="text" name="author_name" value="<?php ph($row["author_name"]);?>"></td></tr>
<tr><td>作者名読み</td><td><input type="text" name="author_kana" value="<?php ph($row["author_kana"]);?>"></td></tr>
<tr><td>ジャンル</td><td><select name="genre_id">
  <?php while ($row_genre = $sth->fetch(PDO::FETCH_ASSOC)) {?>
    <option <?php if ($row_genre["genre_id"] == $row["genre_id"]) {print "selected";} ?>
    value="<?php ph($row_genre["genre_id"]);?>"><?php ph($row_genre["genre_name"]);?></option>
  <?php } ?>
</select></td></tr>
<tr><td>制作年</td><td><input type="text" name="material_year" value="<?php ph($row["material_year"]);?>"></td></tr>
<tr><td>写真</td><td><input type="text" name="picture" value="<?php ph($row["picture"]);?>"></td></tr>
<tr><td>説明</td><td><textarea cols="100" rows="10" name="caption" value="<?php ph($row["caption"]);?>"><?php ph($row["caption"]);?></textarea></td></tr>
</table>
<br>
<div>
<input type="hidden" name="material_id" value="<?php ph($row["material_id"]);?>">
<input type="submit" value="登録"> <input type="reset" value="クリア"><br>
<!-- 美術品一覧画面に戻る -->
<br>
<input type="button" value="編集中止" onclick="location.href='m_select_material.php'">
</div>
</form>
<?php print $msg; ?>
</body>
</html>
