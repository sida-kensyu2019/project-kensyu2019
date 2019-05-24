<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新規登録画面</title>
<link rel="stylesheet" href="pass">
</head>
<body>

<h1>新規登録画面</h1>
<table>
  <form action="insert_user.php" method="post">
    <tr><th>メールアドレス</th><th><input type="text" size="30" name ="mail_address"></th></tr>
    <tr><th>パスワード</th><th><input type="text" size="30" name ="password"></th></tr>
    <tr><th>表示名</th><th><input type="text" size="30" name ="user_name"></th></tr>
    <tr><th>職業</th>
      <th>
      <select name="job_id">
        <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
          <option value="<?php ph($row["job_id"]); ?>"><?php ph($row["job_name"]) ?></option>
        <?php } ?>
      </select>
      </th>
    </tr>
</table>
<br>
<br>
  <input type="submit" value="登録">
  <input type="reset" value="クリア">
  </form>
<br>
<br>

<input type="button" value="ログイン画面" onclick="window.location.href='login.php';">

<?php print $msg; ?>
</body>
</html>
