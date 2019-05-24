<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>職種一覧画面</title>
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

    <form action="m_insert_exec_job.php" method="post">
      <input type="text" name="job_name">
      <input type="submit" value="新規追加">
    </form>
    <table>
      <tr>
        <th>職種ID</th>
        <th>職種名</th>
        <th>削除</th>
      </tr>
      <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>
        <td><?php ph($row["job_id"]);?></td>
        <td><?php ph($row["job_name"]);?></td>
        <td><a href="m_delete_exec_job.php?job_id=<?php ph($row["job_id"]);?>">削除</a></td>
      </tr>
      <?php } ?>
    </table>
  </body>
</html>
