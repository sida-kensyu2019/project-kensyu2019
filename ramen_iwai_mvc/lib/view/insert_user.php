<?php //作成者：山田 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新規管理者登録画面</title>
</head>
<body>
<?php
//require_once("../init.php");
 ?>
<h1>新規登録画面</h1>
<table>
  <form action="comtrol/insert_user.php" method="post">
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
  </form>
</table>
<br>
<br>
<br>
<a href="insert_check_user.php">
<input type="button" value="登録">
</a>　
<input type="reset" value="クリア">
<br>
<a href="login.php">
<input type="button" value="ログイン画面">
</a>
</body>
</html>
