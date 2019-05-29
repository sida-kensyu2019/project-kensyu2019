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
<h1>美術品登録</h1>
<form action="m_insert_material.php" method="post">
<table>
<tr><th>美術品名</th><td><input type="text" name="material_name" value="<?php if(!empty($_POST["material_name"])){ph($_POST["material_name"]);} ?>"></td></tr>
<tr><th>美術品読み</th><td><input type="text" name="material_kana" value="<?php if(!empty($_POST["material_kana"])){ph($_POST["material_kana"]);} ?>"></td></tr>
<tr><th>作者名</th><td><input type="text" name="author_name" value="<?php if(!empty($_POST["author_name"])){ph($_POST["author_name"]);} ?>"></td></tr>
<tr><th>作者名読み</th><td><input type="text" name="author_kana" value="<?php if(!empty($_POST["author_kana"])){ph($_POST["author_kana"]);} ?>"></td></tr>
<tr><th>ジャンル</th><td><select name="genre_id">
        <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
          <option <?php if(!empty($_POST["genre_id"]) and $row["genre_id"] == $_POST["genre_id"]) {print "selected";} else {print "";} ?> value="<?php ph($row["genre_id"]);?>"><?php ph($row["genre_name"]);?></option>
        <?php } ?>
      </select></td></tr>
<tr><th>制作年</th><td><input type="text" name="material_year" value="<?php if(!empty($_POST["material_year"])){ph($_POST["material_year"]);} ?>"></td></tr>
<tr><th>写真</th><td><input type="text" name="picture" value="<?php if(!empty($_POST["picture"])){ph($_POST["picture"]);} ?>"></td></tr>
<tr><th>説明</th><td><textarea cols="100" rows="10" name="caption"><?php if(!empty($_POST["caption"])){ph($_POST["caption"]);} ?></textarea></td></tr>
</table>
<br>
<div>
<span class="error"><?php print $msg; ?></span>
<br>
<br>
<input type="submit" value= "登録"> <input type="reset" value="クリア"><br>
<input type="hidden" name="genre_name">
<br>
<!-- 美術品一覧画面に戻る -->
<input type="button" value="登録中止" onclick="location.href='m_select_material.php'">
</div>
<br>
</form>
</body>
</html>
