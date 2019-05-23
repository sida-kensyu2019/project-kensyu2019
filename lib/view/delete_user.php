<?php //作成者：山田 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザ退会画面</title>
</head>
<body>
<h1>退会画面</h1>
<br>
<br>
<?php
//require_once("../init.php");
?>
<table>
  <tr><th>メールアドレス</th><th><?php// ph($_POST["mail_address"]) ?></th></tr>
</table><br>
<br>
<br>
<p>本当に退会しますか？</p>
<br>
</body>
<a href="top.php">
<input type="button" value="退会">
</a>　

<a href="user.php">
<input type="button" value="キャンセル">
</a>
</html>
