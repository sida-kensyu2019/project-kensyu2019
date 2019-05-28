<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>管理美術品検索画面</title>
  <link rel="stylesheet" href="../css/m_style.css">
  </head>
  <body>
  <br>
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

  <!-- 製作者：井田 -->
    <br>
    <h1>美術品検索</h1>
    <form action="m_search_material.php" method="post">
      <table>
        <tr><th>美術品名</th><th><input type="text" size="30" name ="material_name"></th></tr>
        <tr><th>美術品名読み</th><th><input type="text" size="30" name ="material_kana"></th></tr>
        <tr><th>作者名</th><th><input type="text" size="30" name ="author_name"></th></tr>
        <tr><th>作者名読み</th><th><input type="text" size="30" name ="author_kana"></th></tr>
        <tr><th>ジャンル</th>
          <td>
          <select name="genre_id">
              <option value=""></option>
            <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php ph($row["genre_id"]); ?>"><?php ph($row["genre_name"]) ?></option>
            <?php } ?>
          </select>
        </td>
        </tr>
        <tr><th>制作年</th><th><input type="text" size="30" name ="material_year"></th></tr>
        <tr><th>
        </th><th>
      </table>
      <br>
      <div>
        <input type="submit" name="検索">
        <input type="reset" name="クリア">
      </div>
    </form>
</body>
</html>
