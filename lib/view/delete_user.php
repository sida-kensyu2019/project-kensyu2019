<?php //作成者：山田 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<title>ユーザ退会画面</title>
</head>
<body>
<header>
  <nav>
    <h1>愛パワー美術館</h1>
    <ul>
      <li><a href="top.php">トップページ</a></li>
      <?php if (login_check()) { ?>
        <li><a href="logout.php" onclick="return confirm('本当にログアウトしますか？');">ログアウト</a></li>
        <li><a href="user.php?user_id=<?php ph($_SESSION["user_id"]); ?>">マイページ</a></li>
      <?php } else { ?>
      <li><a href="login.php">ログイン</a></li>
      <li><a href="insert_user.php">新規登録</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>
<h1>退会画面</h1>
<br>
<br>
<table>
  <tr><th>メールアドレス</th><td><?php ph($_POST["mail_address"]) ?></td></tr>
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
