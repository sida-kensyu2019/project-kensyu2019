<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>管理トップページ</title>
    <link rel="stylesheet" href="m_select_genre.css">
</head>
<body>
  <h1>美術品ジャンル一覧</h1>
  <form action="m_insert_exec_genre.php" method="post">
    <input type="text" size="30" name="genre_name">
    <input type="submit" value="新規追加">
  </form>
    <table border=1>
      <tr>
        <th>ジャンルID</th>
        <th>ジャンル名</th>
        <th>削除</th>
      </tr>
      <?php while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr>
        <td><?php ph($row["genre_id"]); ?></td>
        <td><?php ph($row["genre_name"]); ?></td>
        <td><a href="m_delete_exec_genre.php?genre_id=<?php ph($row["genre_id"]);?>">削除</a></td>
      <tr>
      <?php } ?>
    </table>
</body>
</html>
