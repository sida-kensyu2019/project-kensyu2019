<?php //作成者：山田 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザ情報入力確認画面</title>
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
      <li><a href="insert_user.php" class="li_a">新規会員登録</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>
<h1>以下の内容に変更しますか？</h1>
<br>
<br>
<form action="update_exec_user.php?user_id=<?php ph($_SESSION["user_id"]); ?>" method="post" id="form_update">
  <table id="table_search">
    <tr><th>メールアドレス</th><td><?php ph($sth["mail_address"]) ?></td></tr>
    <tr><th>パスワード</th><td><?php ph($_POST["password"]) ?></td></tr>
    <tr><th>表示名</th><td><?php ph($_POST["user_name"]) ?></td></tr>
    <tr><th>職業</th><td><?php ph($_POST["job_name"]) ?></td></tr>
    <tr><th>プロフィールコメント</th><td><?php ph($_POST["profile"]) ?></td></tr>
  </table><br>
  <input type="hidden" name="mail_address" value="<?php ph($sth["mail_address"]); ?>">
  <input type="hidden" name="password" value="<?php ph($_POST["password"]); ?>">
  <input type="hidden" name="job_id" value="<?php ph($_POST["job_id"]); ?>">
  <input type="hidden" name="user_name" value="<?php ph($_POST["user_name"]); ?>">
  <input type="hidden" name="user_id" value="<?php ph($_SESSION["user_id"]); ?>">
  <input type="hidden" name="profile" value="<?php ph($_POST["profile"]); ?>">
  <br>
  <div class="right">
    <input type="submit" value="更新">
    <a href="update_user.php?user_id=<?php ph($_SESSION["user_id"]); ?>">
    <input type="button" value="キャンセル">
    </a>
  </div>
</form>
<br>
</div>
</body>
</html>
