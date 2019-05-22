<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>管理美術品検索画面</title>
    <link rel="stylesheet" href="m_search_material.css">
  </head>
  <body>
  <!-- 製作者：井田 -->
    <?php
    require_once("../init.php");
     ?>
    <h1>美術品検索画面</h1>
    <table>
      <form action="m_select_material.php" method="post">
        <tr><th>美術品名</th><th><input type="text" size="30" name ="material_name"></th></tr>
        <tr><th>美術品名読み</th><th><input type="text" size="30" name ="material_kana"></th></tr>
        <tr><th>作者名</th><th><input type="text" size="30" name ="author_name"></th></tr>
        <tr><th>作者名読み</th><th><input type="text" size="30" name ="author_kana"></th></tr>
        <tr><th>ジャンル</th>
          <th>
            <!-- ジャンルテーブルのジャンルネームとジャンルIDを出力してジャンルを表示する（未実装） -->
          <select name="genre_id">
            <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php ph($row["genre_id"]); ?>"><?php ph($row["genre_name"]) ?></option>
            <?php } ?>
          </select>
          </th>
        </tr>
        <tr><th>制作年</th><th><input type="text" size="30" name ="material_year"></th></tr>
        <input type="submit" name="検索">
        <input type="reset" name="クリア">
      </form>
    </table>
  </body>
</html>
