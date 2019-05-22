<?php //作成者：山田 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザ情報入力確認画面</title>
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
  <tr><th>職業</th><th><?php// ph($_POST["job_id"]) ?></th></tr>
</table><br>
<br>
<br>
<br>
</body>
<a href="update_exec_user.php">
<input type="button" value="更新">
</a>　
<a href="update_user.php">
<input type="button" value="キャンセル">
</a>
</html>
