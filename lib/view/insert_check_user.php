<?php //作成者：山田 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新規入力確認画面</title>
</head>
<body>
<h1>入力確認</h1>
<br>
<br>
<?php
//require_once("../init.php");
?>
<table>
  <tr><th>メールアドレス</th><th><?php// ph($_POST["mail_address"]) ?></th></tr>
  <tr><th>パスワード</th><th><?php// ph($_POST["password"]) ?></th></tr>
  <tr><th>表示名</th><th><?php// ph($_POST["user_name"]) ?></th></tr>
  <tr><th>職業</th>
    <th>
      <select name="job_id">
        <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
          <option value="<?php ph($row["job_id"]); ?>"><?php ph($row["job_name"]) ?></option>
        <?php } ?>
      </select>
    </th>
  </tr>
</table><br>
<br>
<br>
<br>
<a href="insert_exec_user.php">
<input type="button" value="登録">
</a>　
<a href="insert_user.php">
<input type="button" value="修正">
</a>
</body>
</html>
