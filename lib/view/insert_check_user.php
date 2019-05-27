<?php //作成者：山田 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<title>新規入力確認画面</title>
</head>
<body>
<header>
  <nav>
    <h1>愛パワー美術館</h1>
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
<h1>入力確認</h1>
<br>
<br>

<table>
  <tr><th>メールアドレス</th><th><?php ph($_POST["mail_address"]) ?></th></tr>
  <tr><th>パスワード</th><th><?php ph($_POST["password"]) ?></th></tr>
  <tr><th>表示名</th><th><?php ph($_POST["user_name"]) ?></th></tr>
  <tr><th>職業</th>
    <th>
        <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                if ($row["job_id"] == $_POST["job_id"]) {
                  ph($row["job_name"]);
                }
              }?>
    </th>
  </tr>
</table><br>
<br>
<br>
<br>
<form action="insert_exec_user.php" method="post">
<input type="hidden" name="mail_address" value="<?php ph($_POST["mail_address"]);?>">
<input type="hidden" name="password" value="<?php ph($_POST["password"]);?>">
<input type="hidden" name="user_name" value="<?php ph($_POST["user_name"]);?>">
<input type="hidden" name="job_id" value="<?php ph($_POST["job_id"]);?>">
<input type="submit" value="登録">
<input type="button" value="修正" onclick="history.back();">
</form>
</body>
</html>
