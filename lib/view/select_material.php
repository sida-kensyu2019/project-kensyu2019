<!DOCTYPE html>
<!--
 * 検索結果表示画面
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
<title>検索結果表示画面</title>
</head>
<body>

<!-- 検索ボックス -->
  <table id="search">
    <form action="select_material.php" method="post">
      <tr><th>美術品名</th><th><input type="text" size="30" name ="material_name"></th></tr>
      <tr><th>作者名</th><th><input type="text" size="30" name ="author_name"></th></tr>
      <tr><th>ジャンル</th>
        <th>
        <select name="genre_id">
          <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php ph($row["genre_id"]); ?>"><?php ph($row["genre_name"]) ?></option>
          <?php } ?>
        </select>
        </th>
      </tr>
      <tr><th>制作年</th><th><input type="text" size="30" name ="material_year"></th></tr>
  </table>
      <input type="submit" value="検索">
      <input type="reset" value="クリア">
    </form>

<!-- 検索結果 -->
<h2>美術品検索結果</h2>
<table>
    <tr>
      <th>画像</th>
      <th>美術品名</th>
      <th>作者名</th>
      <th>ジャンル</th>
      <th>制作年</th>
    </tr>
    <?php var_dump($sth); ?>
    <?php while ($row=$sth->fetch(PDO::FETCH_ASSOC)) { ?>
      
    <?php var_dump($row); ?>
    <tr>
			<td><?php ph($row["picture"]); ?></td>
			<td><?php ph($row["material_name"]); ?></td>
			<td><?php ph($row["author_name"]); ?></td>
			<td><?php ph($row["genre_name"]); ?></td>
			<td><?php ph($row["material_year"]); ?></td>
    </tr>
    <?php } ?>

</table>

<a href="#search">条件を絞り込む</a>
<!-- ページ上部の検索フォームへのページ内リンク -->

</body>
</html>
