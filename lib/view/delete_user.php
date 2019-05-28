<!-- 作成者：山田 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<title>ユーザ退会画面</title>
</head>
<body>
  <div class="back">
<header>
  <nav>
    <img src="image/titlelogo.png" height="90px">
    <ul>
      <li><a href="top.php" class="li_a">トップページ</a></li>
      <?php if (login_check()) { ?>
        <li><a href="logout.php" onclick="return confirm('本当にログアウトしますか？');" class="li_a">ログアウト</a></li>
        <li><a href="user.php?user_id=<?php ph($_SESSION["user_id"]); ?>" class="li_a">マイページ</a></li>
      <?php } else { ?>
      <li><a href="login.php" class="li_a">ログイン</a></li>
      <li><a href="insert_user.php" class="li_a">新規会員登録</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>
<h1>退会画面</h1>
<br>
<br>
<table id="table_search">
  <tr><th>メールアドレス</th><td><?php ph($sth["mail_address"]) ?></td></tr>
</table><br>
<br>
<br>
<p>本当に退会しますか？</p>
<br>
<form action="delete_exec_user.php" method="post">
  <input type="hidden" name="user_id" value="<?php ph($_SESSION["user_id"]); ?>">
  <input type="submit" value="退会" class="blue_button">
  <a href="user.php?user_id=<?php ph($_SESSION["user_id"]); ?>"></a>
  <input type="button" value="キャンセル" onclick="window.history.back();" class="blue_button">
</form>

<br>
</div>
</body>
</html>
