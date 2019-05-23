<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>職種一覧画面</title>
    <link rel="stylesheet" href="m_select_job.css">
  </head>
  <body>
    <form action="m_control/m_insert_exec_job.php" method="post">
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
    </table>
    <?php } ?>
  </body>
</html>
