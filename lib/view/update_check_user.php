<?php //作成者：山田 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザ情報入力確認画面</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
  <nav>
    <h1>愛パワー美術館</h1>
    <ul>
      <li><a href="top.php">トップページ</a></li>
      <?php if (user_lv_check()) { ?>
        <li><a href="logout.php" onclick="return confirm('本当にログアウトしますか？');">ログアウト</a></li>
        <li><a href="usr.php?user_id=<?php ph($_SESSION["user_id"]); ?>">マイページ</a></li>
      <?php } else { ?>
      <li><a href="login.php">ログイン</a></li>
      <li><a href="insert_user.php">新規登録</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>
<h1>入力確認</h1>
<br>
<br>
<table>
  <tr><th>メールアドレス</th><td><?php ph($_POST["mail_address"]) ?></td></tr>
  <tr><th>パスワード</th><td><?php ph($_POST["password"]) ?></td></tr>
  <tr><th>表示名</th><td><?php ph($_POST["user_name"]) ?></td></tr>
  <tr><th>職業</th><td><?php ph($_POST["job_id"]) ?></td></tr>
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
