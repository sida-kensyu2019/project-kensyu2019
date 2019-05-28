<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>管理トップページ</title>
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
            <li><a class="current" href="m_select_genre.php">ジャンル一覧</a></li>
            <li><a href="m_select_job.php">職種一覧</a></li>
            <li><a href="m_select_closed.php">休館日一覧</a></li>
            <li><a href="../logout.php" onclick="return confirm('本当にログアウトしますか？'); ">ログアウト</a></li>
          </ul>
        </nav>
      </header>

  <br>
  <h1>美術品ジャンル一覧</h1>
  <br>
  <div>
  <form action="m_select_genre.php" method="post">
    <input type="text" size="30" name="genre_name">
    <input type="submit" value="新規追加">
  </form>
  <?php ph($msg); ?>
  </div>
  <br>
    <table border=1>
      <tr>
        <th>ジャンルID</th>
        <th class="d4">ジャンル名</th>
        <th>削除</th>
      </tr>
      <?php while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr>
        <td class="d5"><?php ph($row["genre_id"]); ?></td>
        <td class="d5"><?php ph($row["genre_name"]); ?></td>
        <td><a href="m_delete_exec_genre.php?genre_id=<?php ph($row["genre_id"]);?>">削除</a></td>
      </tr>
      <?php } ?>
    </table>
</body>
</html>
