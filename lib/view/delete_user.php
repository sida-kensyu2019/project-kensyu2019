<!-- 作成者：山田 -->
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
  <tr><th>メールアドレス</th><td><?php ph($sth["mail_address"]) ?></td></tr>
</table><br>
<br>
<br>
<p>本当に退会しますか？</p>
<br>
<form action="delete_exec_user.php" method="post">
  <input type="hidden" name="user_id" value="<?php ph($_SESSION["user_id"]); ?>">
  <input type="submit" value="退会">
</form>


<a href="user.php?user_id=<?php ph($_SESSION["user_id"]); ?>">
<input type="button" value="キャンセル">
</a>
</body>
</html>
