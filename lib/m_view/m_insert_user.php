<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>新規管理者登録画面</title>
    <link rel="stylesheet" href="m_insert_user.css">
  </head>
  <body>

    <h1>新規管理者登録画面</h1>
    <table>
      <form action="../m_control/m_insert_user.php" method="post">
        <tr><th>メールアドレス</th><th><input type="text" size="30" name ="mail_address"></th></tr>
        <tr><th>パスワード</th><th><input type="text" size="30" name ="password"></th></tr>
        <tr><th>表示名</th><th><input type="text" size="30" name ="user_name"></th></tr>
        <tr><th>職業</th>
          <th>
          <select name="job_id">
            <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php ph($row["job_id"]); ?>"><?php ph($row["job_name"]); ?></option>
            <?php } ?>
          </select>
          </th>
        </tr>
        <br>
        <tr><th>
          <input type="submit" name="登録">
          <input type="reset" name="クリア">
      </th></tr>
      </form>
    </table>
    <a href="m_select_user.php">管理者一覧画面に戻る</a>
  </body>
</html>
