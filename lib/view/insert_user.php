<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新規登録画面</title>
<link rel="stylesheet" href="css/style.css">
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
      <li><a href="insert_user.php" class="li_a">新規登録</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>
<h1>会員登録</h1>
  <form action="insert_user.php" method="post" id="form_update">
    <table class="insert_user">
      <tr><th>メールアドレス</th><th><input type="text" size="30" name ="mail_address"></th></tr>
      <tr><th>パスワード</th><th><input type="text" size="30" name ="password"></th></tr>
      <tr><th>表示名</th><th><input type="text" size="30" name ="user_name"></th></tr>
      <tr><th>職業</th>
        <th>
        <select name="job_id" id="select_genre">
          <option value="" selected disabled>選択してください</option>
          <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php ph($row["job_id"]); ?>"><?php ph($row["job_name"]) ?></option>
          <?php } ?>
        </select>
        </th>
      </tr>
    </table>
    <br>
    <?php print $msg; ?>
    <br>
    <div class="right">
      <input type="submit" value="登録">
      <input type="reset" value="クリア">
    </div>
  </form>
<br>
<input type="button" value="ログイン画面" onclick="window.location.href='login.php';">
<br>
<br>

</div>
</body>
</html>
