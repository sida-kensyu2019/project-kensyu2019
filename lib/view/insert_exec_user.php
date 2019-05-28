<?php //作成者：山田 //レビュー担当者：村上：2019/5/24更新 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新規登録完了画面</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="back">
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
      <li><a href="insert_user.php" class="li_a">新規会員登録</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>
<h1>登録完了</h1>
<br>
ユーザを登録しました。
<br>
<br>
<br>
<a href="top.php">
<input type="button" value="美術館トップに戻る" onclick="window.location.href='top.php';">
</a>
</div>
</body>
</html>
